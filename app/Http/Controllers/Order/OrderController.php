<?php

namespace App\Http\Controllers\Order;

use App\Modules\Menu\Models\Menu;
use App\Modules\Order\Models\Order;
use App\Modules\OrderDetail\Models\OrderDetail;
use App\Modules\Table\Models\Table;
use App\Modules\Customer\Models\Customer;
use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\TableType;
use Exception;
use PDF;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends BaseController
{
    public function show_create_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::all();
        $table = Table::all();
        $menu = Menu::all();
        $reservation = Reservation::orderby('reservation_id', 'desc')->get();
        return view('employee.page.order.create', [
            'table_type' => $table_type,
            'table' => $table,
            'menu' => $menu,
            'reservation' => $reservation
        ]);
    }

    public function show_list_order(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::orderby('order_id', 'desc')->paginate(15);
        $orderCount = Order::count();
        return view(
            'employee.page.order.list',
            [
                'order' => $order,
                'orderCount' => $orderCount,
            ]
        );
    }
    public function create_order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:10',
            'order_date' => 'required',
            'time' => 'required',
            'table_id' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.max' => 'Số điện thoại tối đa 10 ký tự!',
            'order_date.required' => 'Vui lòng chọn ngày!',
            'time.required' => 'Vui lòng chọn giờ!',
            'table_id.required' => 'Vui lòng chọn bàn!',
        ]);

        $customer = Customer::where('email', $request->input('email'))->first();

        // Nếu khách hàng chưa tồn tại, thêm mới
        if (!$customer) {
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->save();
        } else {
            // Nếu khách hàng đã tồn tại, cập nhật thông tin
            $customer->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);
        }

        $totalPrice = 0;
        $itemNames = $request->input('menu_id', []);
        $prices = $request->input('price', []);
        $quantities = $request->input('quantity', []);

        foreach ($itemNames as $index => $itemName) {
            if (isset($prices[$index]) && isset($quantities[$index])) {
                $totalPrice += $prices[$index] * $quantities[$index];
            }
        }

        $order = new Order();
        $order->customer_id = $customer->customer_id;
        $order->order_date = $request->order_date;
        $order->time = $request->time;
        $order->total_amount = $totalPrice;
        $order->table_id = $request->table_id;
        $order->reservation_id = $request->reservation_id;
        $order->table_type_id = $request->table_type_id;
        $order->save();

        foreach ($itemNames as $index => $itemName) {
            if (isset($prices[$index]) && isset($quantities[$index])) {
                $orderItem = new OrderDetail();
                $orderItem->order_id = $order->order_id;
                $orderItem->menu_id = $itemNames[$index];
                $orderItem->quantity = $quantities[$index];
                $orderItem->total = $prices[$index] * $quantities[$index];
                $orderItem->save();
            }
        }

        return redirect()->route('show_list_order.index')->with('success', 'Tạo hoá đơn thành công!');
    }


    public function destroy($id): RedirectResponse
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('show_list_order.index')->with('success', 'Đã được xóa thành công!');
    }

    public function show_update_order($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $table = Table::all();
        $table_type = TableType::all();
        $menu = Menu::all();
        $reservation = Reservation::all();
        return view(
            'employee.page.order.edit',
            [
                'order' => $order,
                'table_type' => $table_type,
                'table' => $table,
                'orderDetails' => $orderDetails,
                'menu' => $menu,
                'reservation' => $reservation
            ]
        );
    }
    public function update_order(Request $request, $id): RedirectResponse
    {
        $totalPrice = 0;
        $prices = $request->input('price', []);
        $quantities = $request->input('quantity', []);
        $menus = $request->input('menu_id', []);
        $orderDetailIds = $request->input('order_detail_id', []);

        try {
            DB::beginTransaction();

            // Tìm đơn hàng và cập nhật thông tin khách hàng
            $order = Order::findOrFail($id);
            $order->customer->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

            // Tính tổng giá
            foreach ($menus as $index => $menuId) {
                if (isset($prices[$index]) && isset($quantities[$index])) {
                    $totalPrice += $prices[$index] * $quantities[$index];
                }
            }

            // Cập nhật đơn hàng
            $order->update([
                'customer_id' => $order->customer->customer_id,
                'order_date' => $request->input('order_date'),
                'time' => $request->input('time'),
                'table_id' => $request->input('table_id'),
                'reservation_id' => $request->input('reservation_id'),
                'table_type_id' => $order->table_type_id,
                'total_amount' => $totalPrice,
            ]);

            // Lấy các chi tiết đơn hàng hiện có
            $existingDetails = OrderDetail::where('order_id', $id)->pluck('order_detail_id')->toArray();
            $updatedDetails = [];

            // Cập nhật hoặc tạo mới chi tiết đơn hàng
            foreach ($menus as $index => $menuId) {
                if (isset($prices[$index]) && isset($quantities[$index])) {
                    $orderDetailId = $orderDetailIds[$index];

                    if ($orderDetailId) {
                        $detail = OrderDetail::find($orderDetailId);
                        if ($detail) {
                            $detail->update([
                                'menu_id' => $menuId,
                                'quantity' => $quantities[$index],
                                'total' => $prices[$index] * $quantities[$index],
                            ]);
                            $updatedDetails[] = $orderDetailId;
                        }
                    } else {
                        $newDetail = OrderDetail::create([
                            'order_id' => $order->order_id,
                            'menu_id' => $menuId,
                            'quantity' => $quantities[$index],
                            'total' => $prices[$index] * $quantities[$index],
                        ]);
                        $updatedDetails[] = $newDetail->order_detail_id;
                    }
                }
            }

            // Xóa các chi tiết đơn hàng bị xóa
            $detailsToDelete = array_diff($existingDetails, $updatedDetails);
            if (!empty($detailsToDelete)) {
                OrderDetail::whereIn('order_detail_id', $detailsToDelete)->delete();
            }

            DB::commit();
            return redirect()->route('show_list_order.index')->with('success', 'Cập nhật hoá đơn thành công!');
        } catch (Exception $e) {
            DB::rollback();
            // Ghi log lỗi nếu cần thiết, ví dụ: Log::error($e);
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }

    public function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    // public function print_order_convert($id)
    // {
    //     $order = Order::find($id);

    //     $orderDetail = OrderDetail::with('menuItem')->with('order')->where('order_id', '=', $order->order_id)
    //         ->get();

    //     $listMenu = Menu::get();

    //     $orderDetails = OrderDetail::find($id);

    //     $table = Table::find($order->table_id);

    //     $user = Customer::find($order->customer_id);

    //     $output = '';
    //     // $output .= '
    //     // <title>Đơn hàng</title>
    //     // <style>
    //     // body{
    //     //     font-family:DejaVu Sans;
    //     // }
    //     // h2 {
    //     //     text-align: center;
    //     // }
    //     // i {
    //     //     font-size : 12px;
    //     // }
    //     // .table-order {
    //     //     margin-top: 20px;
    //     // }
    //     // table {
    //     //     border-collapse: collapse;
    //     //     width: 100%;
    //     //   }

    //     //   td, th {
    //     //     border: 1px solid #dddddd;
    //     //     text-align: center;
    //     //     padding: 0 8px 8px 8px;
    //     //   }

    //     //   tr:nth-child(even) {
    //     //     background-color: #dddddd;
    //     //   }
    //     // </style>

    //     // <h2>Thông tin đơn hàng</h2>

    //     // <i>Khách hàng: ' . $user->name . '</i><br>
    //     // <i style="text-align:right;">Số điện thoại: ' . $user->phone . '</i><br>
    //     // <i >Email: ' . $user->email . '</i><br>

    //     // <div>

    //     // </div>

    //     // <table class="table-order">
    //     //     <thead>
    //     //         <tr>
    //     //             <th>Đơn hàng</th>
    //     //             <th>Bàn</th>
    //     //             <th>Menu</th>
    //     //             <th>Số lượng</th>
    //     //             <th>Giá</th>
    //     //             <th>Tổng đơn hàng</th>
    //     //         </tr>
    //     //     </thead>
    //     //     <tbody>';

    //     // $total_paymeny = 0;
    //     // foreach ($orderDetail as $order) {
    //     //     $total_paymeny += $order->total;
    //     //     $output .= '
    //     //                     <tr>
    //     //                     <td>
    //     //                         <span class="d-block guest-bx" style="color: #0099FF;">' . $order->order_detail_id . '</span>
    //     //                     </td>
    //     //                     <td>
    //     //                         <h4 class="mb-0 mt-1"><a class="text-black">' . $table->name . '</a></h4>
    //     //                     </td>
    //     //                     <td>
    //     //                         <div class="guest-bx">
    //     //                             <img src="" alt="">
    //     //                             <div>
    //     //                                 <h4 class="mb-0 mt-1"><a class="text-black" href="">' . $order->menuItem->item_name . '</a></h4>
    //     //                             </div>
    //     //                         </div>
    //     //                     </td>
    //     //                     <td>
    //     //                         <span class="text-primary d-block guest-bx">' . $order->quantity . '<br></span>
    //     //                     </td>
    //     //                     <td>
    //     //                         <span class="text-primary d-block guest-bx">' . number_format($order->menuItem->price) . 'đ<br></span>
    //     //                     </td>
    //     //                     <td>
    //     //                         <span class="text-danger d-block guest-bx">' . number_format($order->total) . 'đ<br></span>
    //     //                     </td>
    //     //                 </tr>';
    //     // }


    public function print_order_convert($id)
    {
        // Fetch the order by ID
        $order = Order::with('reservation')->find($id);

        if (!$order) {
            return 'Order not found';
        }

        // Fetch related order details with menu items
        $orderDetails = OrderDetail::with('menuItem')
            ->where('order_id', $order->order_id)
            ->get();

        // Fetch the table and customer details
        $table = Table::find($order->table_id);
        $customer = Customer::find($order->customer_id);

        // Prepare the HTML output
        $output = '<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hóa Đơn Nhà Hàng DÉLICAT</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
            }
            .invoice-container {
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                display: block;
                text-align: left;
            }
            .header-main {
                width: 100%;
                margin-bottom: 3rem
            }
            .header {
                float: left;
                width: 50%;
            }
            .header img {
                height: 160px;
                width: 160px;
            }
            .info {
                float: right;
                width: 50%;
                text-align: right;
            }
            .info-container {
                width: 100%;
            }
            .info,
            .table-order,
            .footer {
                margin-bottom: 20px;
                clear: both;
            }
            .info p,
            .footer p {
                margin: 0;
            }
            .table-order {
                width: 100%;
                border-collapse: collapse;
            }
            .table-order th,
            .table-order td {
                border: 1px solid #dddddd;
                text-align: center;
                padding: 8px;
            }
            .total-payment {
                font-weight: bold;
            }
            .customer-date {
                width: 100%;
                margin-top: 20px; /* Khoảng cách trên 20px */
            }
            .customer {
                float: left;
                width: 40%;
            }
            .hd {
                float: right;
                width: 40%;
                text-align: right;
            }
            .date {
                float: right;
                width: 40%;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="invoice-container">
            <div class="info-container">
                <div class="header-main">
                    <div class="header">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBsP-H-BMiLJitC-Xvlm9nozJfAlcS6r_ZUA&s" alt="Nhà hàng DÉLICAT" />
                    </div>
                    <div class="info">
                        <h2>Nhà hàng DÉLICAT</h2>
                        <p>12, Trịnh Đình Thảo, Hòa Thanh, Tân Phú</p>
                        <p>Số điện thoại: 0948 504590</p>
                        <p>Email: chouu@gmail.com</p>
                        <p>Website: delicat.com.vn</p>
                    </div>
                </div>
                <h2 style="text-align: center; margin-top: 20px;">PHIẾU THANH TOÁN</h2>
                <hr />
                <div class="customer-date">
                    <div class="customer">
                        <p>Khách hàng: ' . htmlspecialchars($customer->name, ENT_QUOTES, 'UTF-8') . '</p>
                    </div>
                    <div class="date">
                        <p>Ngày: ' . htmlspecialchars($order->created_at->format('d/m/Y'), ENT_QUOTES, 'UTF-8') . '</p>
                    </div>
                    <div class="hd">
                        <p>Số hoá đơn: ' . htmlspecialchars('HD' . $order->order_id, ENT_QUOTES, 'UTF-8') . '</p>
                    </div>
                </div>
                <table class="table-order">
                    <thead>
                        <tr>
                            <th>Giờ vào</th>
                            <th>Giờ ra</th>
                            <th>Bàn ăn</th>
                            <th>Số khách hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . htmlspecialchars($order->reservation->time, ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($order->reservation->time_out, ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($table->name, ENT_QUOTES, 'UTF-8') . '</td>
                            <td>' . htmlspecialchars($order->reservation->number_of_guests, ENT_QUOTES, 'UTF-8') . '</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-order">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Menu</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>';

        $totalAmount = 0;
        foreach ($orderDetails as $index => $orderDetail) {
            $menuItem = $orderDetail->menuItem;
            $quantity = $orderDetail->quantity;
            $price = $menuItem->price;
            $total = $quantity * $price;
            $totalAmount += $total;

            $output .= '<tr>
                        <td>' . ($index + 1) . '</td>
                        <td>' . htmlspecialchars($menuItem->item_name, ENT_QUOTES, 'UTF-8') . '</td>
                        <td>' . htmlspecialchars($quantity, ENT_QUOTES, 'UTF-8') . '</td>
                        <td>' . number_format($price, 0, ',', '.') . ' đ</td>
                        <td>' . number_format($total, 0, ',', '.') . ' đ</td>
                    </tr>';
        }

        $output .= '</tbody>
                </table>
                <div class="footer" style="text-align: right; width: 100%;">
                    <div style="display: inline-block; text-align: right; width: 100%;">
                        <p class="total-payment" style="display: inline-block;">Tổng tiền:</p>
                        <p class="total-payment" style="display: inline-block; margin-left: 20px">' . number_format($totalAmount, 0, ',', '.') . ' đ</p>
                    </div>
                    <div style="display: inline-block; text-align: right; width: 100%; padding: 8px 0;">
                        <p style="display: inline-block;">Chiết khấu (%):</p>
                        <p style="display: inline-block; margin-left: 20px">0</p>
                    </div>
                    <div style="display: inline-block; text-align: right; width: 100%;">
                        <p style="display: inline-block;">Tiền thuế (VAT):</p>
                        <p style="display: inline-block; margin-left: 20px">0</p>
                    </div>
                    <div style="display: inline-block; text-align: right; width: 100%; padding-top: 8px;">
                        <p class="total-payment" style="display: inline-block;">Thành tiền:</p>
                        <p class="total-payment" style="display: inline-block; margin-left: 20px">' . number_format($totalAmount, 0, ',', '.') . ' đ</p>
                    </div>
                    <p style="margin-top: 15px; font-size: 14px"><i>(Hoá đơn chưa bao gồm 10% thuế VAT)</i></p>
                    <p style="padding: 5px 0px; font-size: 14px"><i>Phiếu này có giá trị viết hoá đơn VAT trong vòng 05 ngày</i></p>
                    <p style="font-size: 14px"><i>Vui lòng liên hệ trước theo số: 0948 504590</i></p>
                </div>
                <p style="text-align: center; font-weight: 700">Chân thành cảm ơn quý khách!</p>
            </div>
        </div>
    </body>
</html>';

        return $output;
    }
}

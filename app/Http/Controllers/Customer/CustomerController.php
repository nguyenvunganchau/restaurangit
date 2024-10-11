<?php

namespace App\Http\Controllers\Customer;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\Comment\Models\Comment;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Requests\BookTableRequest;
use App\Modules\Menu\Models\Menu;
use App\Modules\Message\Message;
use App\Modules\News\Models\News;
use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Thêm dòng này để import Log

class CustomerController extends BaseController
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function show_about_us(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        return view('customer.page.aboutUs', compact('table_type', 'name'));
    }

    public function show_booking_customer($table_type_id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        $table_type = TableType::find($table_type_id);
        $table = Table::find($table_type_id);
        return view('customer.page.booking_customer', ['table_type' => $table_type, 'table' => $table, 'name' => $name]);
    }
    public function show_book(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        return view('customer.page.booking', ['table_type' => $table_type, 'name' => $name]);
    }
    public function show_contact(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        return view('customer.page.contact', compact('name', 'table_type'));
    }
    public function create_contact(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name_customer.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'subject.required' => 'Vui lòng nhập số điện thoại!',
            'message.required' => 'Vui lòng chọn ngày!',
        ], []);

        $data = new Message(
            [
                'name_customer' => $request->name_customer,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]
        );
        $data->save();

        return redirect()->back()
            ->with('success', 'Gửi thành công! Chúng tôi sẽ phản hồi sớm nhất');
    }

    public function show_history_reservation(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $customerId = Auth::guard('customer')->user()->customer_id;
        $reservation = Reservation::where('customer_id', $customerId)->get();
        $order = Order::where('customer_id', $customerId)->get();
        return view('customer.page.history_reservation', [
            'reservation' => $reservation,
            'order' => $order,
            'name' => $name,
            'table_type' => $table_type
        ]);
    }

    public function show_list_customer(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $customerCount = Customer::count();
        $customer = Customer::orderby('customer_id', 'desc')->paginate(15);
        return view('employee.page.customer.list', [
            'customer' => $customer,
            'customerCount' => $customerCount,
            'name' => $name,
            'table_type' => $table_type
        ]);
    }
    public function show_history_customer($customerId, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $customer = Customer::find($customerId);
        $reservations = Reservation::where('customer_id', $customerId)->get();
        $orders = Order::where('customer_id', $customerId)->with('table_type_order')->get();
        return view('employee.page.customer.history', [
            'reservations' => $reservations,
            'orders' => $orders,
            'customer' => $customer,
            'name' => $name,
            'table_type' => $table_type
        ]);
    }

    public function profile($customer_id, Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $customer = Customer::findOrFail($customer_id);

        return view('customer.page.profile', [
            'customer' => $customer,
            'name' => $name,
            'table_type' => $table_type
        ]);
    }
    public function update_profile(Request $request, $customer_id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
        ]);

        $user = Customer::findOrFail($customer_id);
        $user->fill($request->except('customer_id'));
        $user->save();

        Session::flash('success', 'Cập nhật thành công!');
        return redirect()->back();
    }

    public function show_home(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        $countCustomer = Customer::count();
        $countTable = TableType::count();
        $countReservation = Reservation::count();
        $countFood = Menu::count();
        return view('customer.page.home', [
            'table_type' => $table_type,
            'countCustomer' => $countCustomer,
            'countTable' => $countTable,
            'countReservation' => $countReservation,
            'countFood' => $countFood,
            'name' => $name,
        ]);
    }

    public function show_offer(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        // $menu = Menu::orderBy('item_id', 'desc')->paginate(15);
        $menu = Menu::orderBy('item_id', 'desc')->get();
        $categories = CategoryFood::all();
        return view('customer.page.offer', compact('menu', 'categories', 'name', 'table_type'));
    }
    public function show_category($id, Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $categories = CategoryFood::get();
        $menu = Menu::where('category_id', $id)->orderBy('item_id', 'desc')->get();

        return view('customer.page.offer', compact('categories', 'menu', 'name', 'table_type'));
    }

    public function show_news(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        // $menu = Menu::orderBy('item_id', 'desc')->paginate(15);
        $new = News::orderBy('new_id', 'desc')->get();
        return view('customer.page.news', compact('new', 'name', 'table_type'));
    }
    public function show_detail_news($new_id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $new = News::find($new_id);
        return view('customer.page.news_detail', ['new' => $new, 'name' => $name, 'table_type' => $table_type]);
    }

    public function show_our_restaurant(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $menuItem = Menu::all();
        $categories = CategoryFood::all();
        return view(
            'customer.page.ourRestaurant',
            [
                'menuItem' => $menuItem,
                'categories' => $categories,
                'name' => $name,
                'table_type' => $table_type
            ]
        );
    }

    public function show_our_table(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        return view('customer.page.table', compact('name', 'table_type'));
    }
    public function show_detail_table_type($table_type_id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }
        $table_type = TableType::find($table_type_id);
        $comment = DB::table('comment')
            ->where('table_type_id', '=', $table_type->table_type_id)
            ->get();
        return view('customer.page.table_type_detail', ['table_type' => $table_type, 'comment' => $comment, 'name' => $name, 'table_type' => $table_type]);
    }

    public function create_comment(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'Vui lòng nhập nội dung!',
        ], []);

        try {
            DB::beginTransaction();

            $comment = new Comment();
            $comment->fill($request->all());

            $comment->save();

            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt bàn. Vui lòng thử lại sau.');
        }
    }
    public function comment_delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Đã được xóa thành công!');
    }

    public function book_table(Request $request): string
    {
        $this->v['email'] = $request->email;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:10',
            'reservation_date' => 'required',
            'time' => 'required',
            'table_type_id' => 'required',
            'number_of_guests' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Vui lòng nhập số điện thoiạ!',
            'phone.max' => 'Số điện thoại tối đa 10 ký tự!',
            'reservation_date.required' => 'Vui lòng chọn ngày!',
            'time.required' => 'Vui lòng chọn giờ!',
            'table_type_id.required' => 'Vui lòng chọn loại bàn!',
            'number_of_guests.required' => 'Vui lòng nhập số người!',
        ], []);
        try {
            DB::beginTransaction();
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->save();

            $reservation = new Reservation();
            $reservation->fill($request->input());
            $reservation->customer_id = $customer->customer_id;
            $reservation->time_out = intval($request->input('time')) + 2;
            $reservation->save();

            $reservationId = $reservation->reservation_id;
            $reservation->name = 'D' . $reservationId;
            $reservation->save();

            $this->v['user'] = Customer::find($customer->customer_id);
            $this->v['reservations'] = Reservation::with('table_reservation')->with('table_type_reservation')->find($reservation->reservation_id);

            try {
                Mail::send('email.order', $this->v, function ($email) {
                    $email->subject('Đơn đặt hàng của bạn!');
                    $email->to($this->v['user']->email, 'Nhà hàng DÉLICAT');
                });
            } catch (Exception $e) {
                Log::error('Lỗi khi gửi email: ' . $e->getMessage());
                throw new Exception('Lỗi khi gửi email.');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Đặt bàn thành công!');
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Lỗi khi đặt bàn: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt bàn. Vui lòng thử lại sau.');
        }
    }
    public function book_table_customer(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([
            'reservation_date' => 'required',
            'time' => 'required',
            'number_of_guests' => 'required',
        ], [
            'reservation_date.required' => 'Vui lòng chọn ngày!',
            'time.required' => 'Vui lòng chọn giờ!',
            'number_of_guests.required' => 'Vui lòng nhập số người!',
        ], []);

        try {
            DB::beginTransaction();

            // Tạo đối tượng Reservation và điền dữ liệu
            $reservation = new Reservation();
            $reservation->fill($request->all());

            // Tính toán và gán giá trị time_out
            $reservation->time_out = intval($request->input('time')) + 2;

            // Lưu thông tin đặt chỗ vào cơ sở dữ liệu
            $reservation->save();

            // Lấy ID của đặt chỗ vừa lưu và cập nhật lại trường name
            $reservationId = $reservation->reservation_id;
            $reservation->name = 'D' . $reservationId;
            $reservation->save();

            DB::commit();

            // Chuyển hướng lại trang trước đó với thông báo thành công
            return redirect()->back()->with('success', 'Đặt bàn thành công!');
        } catch (Exception $e) {
            // Quay lại giao dịch nếu có lỗi xảy ra
            DB::rollback();

            // Chuyển hướng lại trang trước đó với thông báo lỗi
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt bàn. Vui lòng thử lại sau.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('success', 'Xoá thành công!');
        return redirect()->route('show_list_customer.index')->with('success', 'Đã được xóa thành công!');
    }
}

@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Khách hàng</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $customer->name }}</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">{{ $customer->name }}</h1>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <!-- Card -->
            <div class="card">
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <h4 class="m-4">Lịch sử đặt bàn</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên đơn đặt bàn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Bàn</th>
                                <th scope="col">Loại bàn</th>
                                <th scope="col">Ngày ăn</th>
                                <th scope="col">Ngày đặt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservations as $key => $reservation)
                                @php
                                    // Lấy các order tương ứng với reservation hiện tại
                                    $relatedOrders = $orders->filter(function ($order) use ($reservation) {
                                        return $order->reservation_id == $reservation->id; // Giả sử bạn có trường reservation_id trong bảng orders để liên kết
                                    });
                                @endphp
                                @forelse ($relatedOrders as $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $reservation->name ?? '' }}</td>
                                        <td>{{ $reservation->status ?? '' }}</td>
                                        <td>{{ $reservation->table_id ?? '' }}</td>
                                        <td>{{ $item->table_type_order->name }}</td>
                                        <td>{{ $reservation->reservation_date ?? '' }}</td>
                                        <td>{{ $reservation && $reservation->created_at ? $reservation->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-danger text-center">Không có lịch sử đặt bàn</td>
                                    </tr>
                                @endforelse
                            @empty
                                <tr>
                                    <td colspan="7" class="text-danger text-center">Không có lịch sử đặt bàn</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card mt-6">
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <h4 class="m-4">Lịch sử hoá đơn</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên hoá đơn</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $key => $val)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $val->name ?? '' }}</td>
                                    <td>{{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}
                                    </td>
                                    <td>{{ $val->total_amount ?? '' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-danger text-center">Không có lịch sử hoá đơn</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
            </div>
            <!-- End Card -->
        </div>
        <!-- End Content -->
    </main>
@endsection

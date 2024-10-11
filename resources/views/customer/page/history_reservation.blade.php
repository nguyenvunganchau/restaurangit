@extends('customer.layout.main')
@section('content')
    <section class="container clearfix common-pad booknow">
        <h2>Lịch sử đặt bàn</h2>
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
                @forelse ($reservation as $key => $val)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $val->name ?? '' }}</td>
                        <td>{{ $val->status ?? '' }}</td>
                        <td>{{ $val->table_id ?? '' }}</td>
                        <td>{{ $val->table_type_reservation->name }}</td>
                        <td>{{ $val->reservation_date ?? '' }}</td>
                        <td> {{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger">Không có dữ liệu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h2 style="margin-top: 5rem">Lịch sử hoá đơn</h2>
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
                @forelse ($order as $key => $val)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $val->name ?? '' }}</td>
                        <td> {{ $val && $val->created_at ? $val->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i d/m/Y') : '' }}
                        </td>
                        <td>{{ number_fomat($val->total_amount ?? '') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger">Không có dữ liệu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection

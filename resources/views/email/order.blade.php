<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        i {
            font-size: 12px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .title {
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="title">
        <a href="#"><img width="120"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBsP-H-BMiLJitC-Xvlm9nozJfAlcS6r_ZUA&s"
                title="logo" alt="logo"></a>
        <h2 style="text-align: center;">Đơn đặt bàn DÉLICAT</h2>
    </div>

    <i>Khách hàng : {{ $user->name }}
    </i><br>
    <i style="text-align:right;">Số điện thoại :{{ $user->phone }}</i><br>
    <i>Email :{{ $user->email }}</i><br>
    <i>Ngày đặt: {{ $reservations->created_at->format('Y-m-d') }}</i>

    <div>
        <h5> <i class="far fa-calendar-minus scale3 me-3"></i>Trạng thái:
            {{ $reservations->status }} </h5>
        <h5>Ngày sử dụng bàn: {{ $reservations->reservation_date }}</h5>
    </div>

    <table class="me-3">
        <thead>
            <tr>
                <th>Đơn đặt</th>
                <th>Loại bàn</th>
                <th>Bàn</th>
                <th>Số người</th>
                <th>Giờ vào</th>
                <th>Giờ ra</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="color: #0099FF;"> <b>{{ $reservations->name }}</b></td>
                <td style="color: black;"> <b>
                        {{ $reservations->table_type_reservation->name }}
                    </b></td>
                <td>{{ $reservations->table_reservation->name }}</td>
                <td><i style="color: #006600;">{{ $reservations->number_of_guests }}</i>
                </td>
                <td style="color: #0099FF;">
                    {{ $reservations->time }}
                </td>
                <td style="color: #FF0000;">
                    {{ $reservations->time_out }}
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <div style="text-align:center;">
        <div class="me-10 mb-sm-0 mb-3">
            <h3 class="mb-2">Tổng hóa đơn</h3>
            <hr style="width:10%;">
            <h3 class="mb-0 card-title" style="color: blue;">
                <b><var> đ</var></b>
            </h3>
        </div>
    </div> --}}

    <div style="margin-top: 30px;">
        <span><i>Nếu có vấn đề vui lòng liên hệ qua hotline 0948 504590.</i></span>
    </div>

    <div style="margin-top: 30px;text-align: center;">
        <span><i style="font-weight: bold;color:orangered;">Nhà hàng DÉLICAT</i> - Dự án tốt nghiệp</span>
    </div>

</body>

</html>

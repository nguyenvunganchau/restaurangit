@extends('employee.layout.main')
@section('content')
    <style>
        .table-container {
            display: flex;
            flex-wrap: wrap;
            width: 1120px;
        }

        .table {
            width: 150px;
            height: 50px;
            margin: 50px;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
            border: 1px solid #ccc;
            transition: transform 0.3s;
        }

        .table.green {
            background-color: green;
            color: white;
        }

        .table.yellow {
            background-color: yellow;
            color: black;
        }

        .table.white {
            background-color: white;
            color: black;
        }

        /* Hover effect to enlarge the table */
        .table:hover {
            transform: scale(1.1);
        }

        .processing {
            background-color: #087561;
            color: #FFF;
        }

        .approved {
            background-color: #a8a85b;
            color: #FFF;
        }

        .table-status {
            display: flex;
            justify-content: space-between;
            padding-left: 70px;
        }

        .table-status .table {
            height: 50px;
            margin: 5px;
        }
    </style>
    <main id="content" role="main" class="main">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Bàn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>
                        <h1 class="page-header-title">Bàn</h1>
                    </div>
                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="{{ route('show_create_table.index') }}">
                            <i class="tio-user-add mr-1"></i> Thêm Bàn
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('check_table.post') }}" method="post">
                        @csrf
                        <div class="row justify-content-between align-items-center">
                            <div class="col-3">
                                <input type="date" id="date" class="form-control" name="reservation_date">
                            </div>
                            <div class="col-3">
                                <input type="number" id="start-time" class="form-control" name="time"
                                    placeholder="Giờ vào">
                            </div>
                            <div class="col-3">
                                <input type="number" id="end-time" class="form-control" name="time_out"
                                    placeholder="Giờ ra">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-status mt-3">
                        <div class="table">Bàn trống</div>
                        <div class="table processing">Bàn ăn</div>
                        <div class="table approved">Bàn đặt</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-container">
                    @foreach ($tables as $item)
                        @php
                            $colorClass = 'white';
                            if (isset($tableStatus[$item->id])) {
                                switch ($tableStatus[$item->id]) {
                                    case 'approved':
                                        $colorClass = 'green';
                                        break;
                                    case 'pending':
                                        $colorClass = 'yellow';
                                        break;
                                }
                            }
                        @endphp
                        <div class="table {{ $colorClass }}">{{ $item->name }}</div>
                    @endforeach
                </div>

            </div>
        </div>
    </main>
@endsection

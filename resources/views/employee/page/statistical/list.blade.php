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
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Thống kê</a></li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Thống kê</h1>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->
            <!-- Stats -->
            <div class="row gx-2 gx-lg-3">
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Tổng đơn đặt bàn hôm nay</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{ $reservationToday }}</span>

                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Tổng đơn thành công hôm nay</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{ $reservationCompletedToday }}</span>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Tổng đơn đang chờ hôm nay</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{ $reservationPendingToday }}</span>

                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                    <!-- Card -->
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">Tổng đơn đã xác nhận hôm nay</h6>

                            <div class="row align-items-center gx-2">
                                <div class="col">
                                    <span class="js-counter display-4 text-dark">{{ $reservationApprovedToday }}</span>

                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <section class="content booking Hotel">
                            <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                                <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active nav-link-statistical" data-bs-toggle="tab"
                                                href="#MoneyMonth" role="tab">Doanh thu tháng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-link-statistical" data-bs-toggle="tab" href="#MoneyYear"
                                                role="tab">Doanh
                                                thu năm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-link-statistical" data-bs-toggle="tab"
                                                href="#BookingMonth" role="tab">Đơn
                                                trong tháng</a>
                                        </li>
                                        <li class="nav-item nav-link-statistical">
                                            <a class="nav-link" data-bs-toggle="tab" href="#BookingYear" role="tab">Đơn
                                                cả năm</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <form action="{{ route('show_list_statistical.post') }}" method="POST"
                                        style="float: right;margin: 40px 40px 0 0;">
                                        @csrf
                                        <select name="month"
                                            style="padding: 5px;border-radius: 4px 0 0 4px;font-family: 'Courier New', Courier, monospace;">
                                            @for ($i = 1; $i <= 12; $i++)
                                                @if ($i == $monthToday)
                                                    <option value="{{ $i }}" selected="selected">Tháng
                                                        {{ $i }}</option>
                                                @else
                                                    <option value="{{ $i }}">Tháng {{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        <button type="submit"
                                            style="padding: 5px;border-radius: 0 4px 4px 0; background-color:#663366;color:white;border: none;font-family: 'Courier New', Courier, monospace;">Lọc</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active show" id="MoneyMonth">
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="container" style="margin-bottom:10px">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="MoneyYear">
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="container" style="margin-bottom:10px">
                                                <canvas id="moneyYearChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="BookingMonth">
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="container" style="margin-bottom:10px">
                                                <canvas id="bookingChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="BookingYear">
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="container" style="margin-bottom:10px">
                                                <canvas id="bookingYearChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let myChart = document.getElementById('myChart').getContext('2d');

            let massPopChart = new Chart(myChart, {
                type: 'line',
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16',
                        '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'
                    ],
                    datasets: [{
                        label: 'Số tiền',
                        data: [
                            {{ $totalMoney1 }},
                            {{ $totalMoney2 }},
                            {{ $totalMoney3 }},
                            {{ $totalMoney4 }},
                            {{ $totalMoney5 }},
                            {{ $totalMoney6 }},
                            {{ $totalMoney7 }},
                            {{ $totalMoney8 }},
                            {{ $totalMoney9 }},
                            {{ $totalMoney10 }},
                            {{ $totalMoney11 }},
                            {{ $totalMoney12 }},
                            {{ $totalMoney13 }},
                            {{ $totalMoney14 }},
                            {{ $totalMoney15 }},
                            {{ $totalMoney16 }},
                            {{ $totalMoney17 }},
                            {{ $totalMoney18 }},
                            {{ $totalMoney19 }},
                            {{ $totalMoney20 }},
                            {{ $totalMoney21 }},
                            {{ $totalMoney22 }},
                            {{ $totalMoney23 }},
                            {{ $totalMoney24 }},
                            {{ $totalMoney25 }},
                            {{ $totalMoney26 }},
                            {{ $totalMoney27 }},
                            {{ $totalMoney28 }},
                            {{ $totalMoney29 }},
                            {{ $totalMoney30 }},
                            {{ $totalMoney31 }},
                        ],
                        backgroundColor: 'rgba(255, 206, 86, 0.6)',
                        borderWidth: 1,
                        borderColor: '#777',
                        hoverBorderWidth: 3,
                        hoverBorderColor: '#000'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Thông kế doanh thu tháng {{ $monthToday }}',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 0,
                            bottom: 0,
                            top: 0
                        }
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
        </script>

        {{-- tab 2 --}}
        <script>
            let moneyYearChart = document.getElementById('moneyYearChart').getContext('2d');
            // Global Options
            Chart.defaults.global.defaultFontFamily = 'Lato';
            Chart.defaults.global.defaultFontSize = 18;
            Chart.defaults.global.defaultFontColor = '#777';

            let posmoneyYearChart = new Chart(moneyYearChart, {
                type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                    datasets: [{
                        label: 'Số tiền',
                        data: [
                            {{ $totalMoneyYear1 }},
                            {{ $totalMoneyYear2 }},
                            {{ $totalMoneyYear3 }},
                            {{ $totalMoneyYear4 }},
                            {{ $totalMoneyYear5 }},
                            {{ $totalMoneyYear6 }},
                            {{ $totalMoneyYear7 }},
                            {{ $totalMoneyYear8 }},
                            {{ $totalMoneyYear9 }},
                            {{ $totalMoneyYear10 }},
                            {{ $totalMoneyYear11 }},
                            {{ $totalMoneyYear12 }},
                            0,
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(25, 159, 64, 0.6)',
                            'rgba(13, 102, 255, 0.6)',
                            'rgba(25, 99, 132, 0.6)',
                            'rgba(725, 192, 192, 0.6)',
                            'rgba(0, 0, 0, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderWidth: 1,
                        borderColor: '#777',
                        hoverBorderWidth: 3,
                        hoverBorderColor: '#000'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Thông kế doanh thu trong năm',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 0,
                            bottom: 0,
                            top: 0
                        }
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
        </script>

        {{-- tab 3 --}}
        <script>
            let bookingChart = document.getElementById('bookingChart').getContext('2d');

            let posbookingChart = new Chart(bookingChart, {
                type: 'line',
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16',
                        '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'
                    ],
                    datasets: [{
                        label: 'Số đơn',
                        data: [
                            {{ $countBooking1 }},
                            {{ $countBooking2 }},
                            {{ $countBooking3 }},
                            {{ $countBooking4 }},
                            {{ $countBooking5 }},
                            {{ $countBooking6 }},
                            {{ $countBooking7 }},
                            {{ $countBooking8 }},
                            {{ $countBooking9 }},
                            {{ $countBooking10 }},
                            {{ $countBooking11 }},
                            {{ $countBooking12 }},
                            {{ $countBooking13 }},
                            {{ $countBooking14 }},
                            {{ $countBooking15 }},
                            {{ $countBooking16 }},
                            {{ $countBooking17 }},
                            {{ $countBooking18 }},
                            {{ $countBooking19 }},
                            {{ $countBooking20 }},
                            {{ $countBooking21 }},
                            {{ $countBooking22 }},
                            {{ $countBooking23 }},
                            {{ $countBooking24 }},
                            {{ $countBooking25 }},
                            {{ $countBooking26 }},
                            {{ $countBooking27 }},
                            {{ $countBooking28 }},
                            {{ $countBooking29 }},
                            {{ $countBooking30 }},
                            {{ $countBooking31 }},
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderWidth: 1,
                        borderColor: '#777',
                        hoverBorderWidth: 3,
                        hoverBorderColor: '#000'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Thông kế đơn đặt tháng {{ $monthToday }}',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 0,
                            bottom: 0,
                            top: 0
                        }
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
        </script>

        {{-- Tab 4 --}}
        <script>
            let bookingYearChart = document.getElementById('bookingYearChart').getContext('2d');
            // Global Options
            Chart.defaults.global.defaultFontFamily = 'Lato';
            Chart.defaults.global.defaultFontSize = 18;
            Chart.defaults.global.defaultFontColor = '#777';

            let posbookingYearChart = new Chart(bookingYearChart, {
                type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                    datasets: [{
                        label: 'Số đơn',
                        data: [
                            {{ $countBookingYear1 }},
                            {{ $countBookingYear2 }},
                            {{ $countBookingYear3 }},
                            {{ $countBookingYear4 }},
                            {{ $countBookingYear5 }},
                            {{ $countBookingYear6 }},
                            {{ $countBookingYear7 }},
                            {{ $countBookingYear8 }},
                            {{ $countBookingYear9 }},
                            {{ $countBookingYear10 }},
                            {{ $countBookingYear11 }},
                            {{ $countBookingYear12 }},
                            0,
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(25, 159, 64, 0.6)',
                            'rgba(13, 102, 255, 0.6)',
                            'rgba(25, 99, 132, 0.6)',
                            'rgba(725, 192, 192, 0.6)',
                            'rgba(0, 0, 0, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderWidth: 1,
                        borderColor: '#777',
                        hoverBorderWidth: 3,
                        hoverBorderColor: '#000'
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Thông kế đơn đặt trong năm',
                        fontSize: 25
                    },
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            fontColor: '#000'
                        }
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 0,
                            bottom: 0,
                            top: 0
                        }
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
        </script>

        <script>
            // Function to initialize and update the chart
            function initChart(id, labels, data, title) {
                let chartElement = document.getElementById(id).getContext('2d');

                let chart = new Chart(chartElement, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: title,
                            data: data,
                            backgroundColor: 'rgba(255, 206, 86, 0.6)',
                            borderWidth: 1,
                            borderColor: '#777',
                            hoverBorderWidth: 3,
                            hoverBorderColor: '#000'
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: title,
                            fontSize: 25
                        },
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                fontColor: '#000'
                            }
                        },
                        layout: {
                            padding: {
                                left: 50,
                                right: 0,
                                bottom: 0,
                                top: 0
                            }
                        },
                        tooltips: {
                            enabled: true
                        }
                    }
                });
            }

            // Function to update chart data
            function updateChart(id, labels, data, title) {
                let chart = Chart.getChart(id);
                chart.data.labels = labels;
                chart.data.datasets[0].data = data;
                chart.options.title.text = title;
                chart.update();
            }

            // Initialize charts on page load
            document.addEventListener('DOMContentLoaded', function() {
                initChart('myChart', [...], [...], 'Thông kế doanh thu tháng {{ $monthToday }}');
                initChart('moneyYearChart', [...], [...], 'Doanh thu năm');
                initChart('bookingChart', [...], [...], 'Thông kế đơn đặt tháng {{ $monthToday }}');
                initChart('bookingYearChart', [...], [...], 'Đơn cả năm');
            });

            // Event listener for tab change
            document.querySelectorAll('.nav-link').forEach(function(tab) {
                tab.addEventListener('click', function(event) {
                    let targetId = event.target.getAttribute('href').substring(1);
                    if (targetId === 'MoneyMonth') {
                        updateChart('myChart', [...], [...], 'Thông kế doanh thu tháng {{ $monthToday }}');
                    } else if (targetId === 'MoneyYear') {
                        // Update chart for MoneyYear
                    } else if (targetId === 'BookingMonth') {
                        updateChart('bookingChart', [...], [...],
                            'Thông kế đơn đặt tháng {{ $monthToday }}');
                    } else if (targetId === 'BookingYear') {
                        // Update chart for BookingYear
                    }
                });
            });
        </script>
        <script>
            document.querySelectorAll('.nav-link-statistical').forEach(function(tab) {
                tab.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

                    // Lấy ID của tab được nhấp
                    let targetId = event.target.getAttribute('href').substring(1);

                    // Xác định URL mới dựa trên ID của tab
                    let newUrl = window.location.pathname + '#' + targetId;

                    // Thay đổi URL
                    window.history.pushState({
                        path: newUrl
                    }, '', newUrl);

                    // Hiển thị nội dung của tab tương ứng
                    document.querySelectorAll('.tab-pane').forEach(function(tabContent) {
                        tabContent.classList.remove('active', 'show');
                    });

                    document.getElementById(targetId).classList.add('active', 'show');
                });
            });
        </script>

    </main>
@endsection

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
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Bình luận
                                    </a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Bình luận</h1>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <!-- Card -->
            <div class="card">
                <h3 class="page-header-title" style="padding: 15px; color: green">Loại bàn:
                    {{ $table_type->name }}</h3>
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable"
                        class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                        <thead class="thead-light">
                            <tr>
                                <th>Khách hàng</th>
                                <th>Email</th>
                                <th>Ngày bình luận</th>
                                <th>Nội dung</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($comment as $key => $val)
                                <tr>
                                    <td>{{ $val->name }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->date }}</td>
                                    <td>{{ $val->content }}</td>
                                    <td><a class="btn btn-sm btn-danger"
                                            href="{{ route('comment.delete', $val->comment_id) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                            <i class="tio-delete"></i>
                                        </a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <!-- Pagination -->
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="mr-2">Trang:</span>

                                <!-- Select -->
                                <select id="datatableEntries" class="js-select2-custom"
                                    data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                    <option value="10">10</option>
                                    <option value="15" selected="">15</option>
                                    <option value="20">20</option>
                                </select>
                                <!-- End Select -->

                                <span class="text-secondary mr-2">of</span>

                                <!-- Pagination Quantity -->
                                <span id="datatableWithPaginationInfoTotalQty"></span>
                            </div>
                        </div>

                        <div class="col-sm-auto">
                            <div class="d-flex justify-content-center justify-content-sm-end">
                                <!-- Pagination -->
                                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->
        </div>
        <!-- End Content -->

        <!-- Footer -->

    </main>
@endsection

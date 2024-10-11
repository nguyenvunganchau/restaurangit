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
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable"
                        class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 7],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                        <thead class="thead-light">
                            <tr>
                                <th class="table-column-pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                        <label class="custom-control-label" for="datatableCheckAll"></label>
                                    </div>
                                </th>
                                <th>Loại bàn</th>
                                <th>Số lượng bình luận</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($comment as $key => $val)
                                @php
                                    $commentCount = 0;
                                @endphp

                                {{-- Tìm số lượng bình luận cho sản phẩm hiện tại --}}
                                @foreach ($comment as $commentItem)
                                    @if ($commentItem->table_type_id == $val->table_type_id)
                                        @php
                                            $commentCount++;
                                        @endphp
                                    @endif
                                @endforeach

                                @foreach ($table_type as $item)
                                    @if ($item->table_type_id == $val->table_type_id)
                                        <tr>
                                            <td class="table-column-pr-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="usersDataCheck1">
                                                    <label class="custom-control-label" for="usersDataCheck1"></label>
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $commentCount }}</td>
                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('edit_comment.get', $val->table_type_id) }}">
                                                    {{-- <i class="tio-edit"></i> --}}Xem chi tiết
                                                </a></td>
                                        </tr>
                                    @endif
                                @endforeach
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

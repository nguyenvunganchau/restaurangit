@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="ecommerce-products.html">Trang</a>
                                </li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Bàn
                                        Đã đặt</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <form action="{{ route('update_reservation.post', $reservation->reservation_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Thông tin người đặt</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label for="productNameLabel" class="input-label"> Họ tên <span
                                            class="text-danger">*</span><i class="tio-help-outlined text-body ml-1"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Products are the goods or services you sell."></i></label>

                                    <input type="text" class="form-control" name="name" id="productNameLabel"
                                        aria-label="Shirt, t-shirts, etc." value="{{ $reservation->customer->name }}">
                                    @error('name')
                                        <div>
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <!-- End Form Group -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Số điện thoại <span
                                                    class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="phone" id="SKULabel"
                                                placeholder="eg. 348121032" aria-label="eg. 348121032"
                                                value="{{ $reservation->customer->phone }}">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Email <span
                                                    class="text-danger">*</span></label>

                                            <input type="email" class="form-control" name="email" id="SKULabel"
                                                placeholder="eg. 348121032" aria-label="eg. 348121032"
                                                value="{{ $reservation->customer->email }}">
                                            @error('email')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Thông tin Bàn Đặt {{ $reservation->name }}</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Ngày đặt <span
                                                    class="text-danger">*</span></label>

                                            <input type="date" class="form-control" name="reservation_date"
                                                id="SKULabel" value="{{ $reservation->reservation_date }}">
                                            @error('reservation_date')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Giờ <span
                                                    class="text-danger">*</span></label>

                                            <input type="number" class="form-control" name="time" id="SKULabel"
                                                value="{{ $reservation->time }}">
                                            @error('time')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Số người <span
                                                    class="text-danger">*</span></label>

                                            <input type="number" class="form-control" name="number_of_guests"
                                                id="SKULabel" placeholder="eg. 348121032" aria-label="eg. 348121032"
                                                value="{{ $reservation->number_of_guests }}">
                                            @error('number_of_guests')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="categoryLabel" class="input-label">Trạng thái <span
                                                    class="text-danger">*</span></label>

                                            <!-- Select -->
                                            <select class="js-select2-custom custom-select" size="1"
                                                style="opacity: 0;" id="categoryLabel"
                                                data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Sửa trạng thái"
                          }'
                                                name="status">
                                                <option value="pending"
                                                    {{ isset($reservation) && $reservation->status === 'pending' ? 'selected' : '' }}>
                                                    Chờ xác nhận</option>
                                                <option value="completed"
                                                    {{ isset($reservation) && $reservation->status === 'completed' ? 'selected' : '' }}>
                                                    Hoàn thành</option>
                                                <option value="rejected"
                                                    {{ isset($reservation) && $reservation->status === 'rejected' ? 'selected' : '' }}>
                                                    Đã hủy</option>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </select>
                                            <!-- End Select -->
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="collectionsLabel" class="input-label">Bàn <span
                                                    class="text-danger">*</span></label>

                                            <!-- Select -->
                                            <select class="js-select2-custom custom-select" size="1"
                                                style="opacity: 0;" id="collectionsLabel"
                                                data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Select options"
                          }'
                                                name="table_id">
                                                <option value="{{ $reservation->table_reservation->table_id ?? '' }}">
                                                    {{ $reservation->table_reservation->name ?? '' }}</option>
                                                @foreach ($table as $key => $val)
                                                    <option value="{{ $val->table_id ?? '' }}">{{ $val->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- End Select -->

                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label for="tablesLabel" class="input-label">Loại bàn <span
                                                    class="text-danger">*</span></label>

                                            <!-- Select -->
                                            <select class="js-select2-custom custom-select" size="1"
                                                style="opacity: 0;" id="tablesLabel"
                                                data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "Select options"
                          }'
                                                name="table_type_id">
                                                <option
                                                    value="{{ $reservation->table_type_reservation->table_type_id ?? '' }}">
                                                    {{ $reservation->table_type_reservation->name ?? '' }}</option>
                                                @foreach ($table_type as $key => $val)
                                                    <option value="{{ $val->table_type_id ?? '' }}">
                                                        {{ $val->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Select -->

                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productNameLabel" class="input-label"> Ghi chú</label>

                                    <input type="text" class="form-control" name="note" id="productNameLabel"
                                        aria-label="Shirt, t-shirts, etc." value="{{ $reservation->note }}">
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('show_list_reservation.index') }}"
                                class="btn btn-secondary waves-effect ml-1">Huỷ</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

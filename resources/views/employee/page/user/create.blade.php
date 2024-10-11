@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Step Form -->
            <form class="js-step-form py-md-5" method="post" action="{{ route('create_employee.post') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <!-- Content Step Form -->
                        <div id="addUserStepFormContent">
                            <!-- Card -->
                            <div id="addUserStepProfile" class="card card-lg active">
                                <!-- Body -->
                                <div class="card-body">
                                    <div class="row form-group">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Họ và tên
                                            <span class="text-danger">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="firstNameLabel"
                                                placeholder="Clarice" aria-label="Clarice">
                                            @error('name')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="emailLabel" class="col-sm-3 col-form-label input-label">Email <span
                                                class="text-danger">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" id="emailLabel"
                                                placeholder="clarice@example.com" aria-label="clarice@example.com">
                                            @error('email')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="js-add-field row form-group">
                                        <label for="phoneLabel" class="col-sm-3 col-form-label input-label">Số điện
                                            thoại <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="js-masked-input form-control" name="phone"
                                                id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Container For Input Field -->
                                        <div id="addPhoneFieldContainer"></div>
                                    </div>
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="organizationLabel" class="col-sm-3 col-form-label input-label">Địa
                                            chỉ <span class="text-danger">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" id="organizationLabel"
                                                placeholder="" aria-label="Htmlstream">
                                            @error('address')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="organizationLabel" class="col-sm-3 col-form-label input-label">Quyền
                                            <span class="text-danger">*</span></label>

                                        <div class="col-sm-9">
                                            <select class="js-select2-custom custom-select" size="1"
                                                style="opacity: 0;" id="collectionsLabel"
                                                data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "chọn quyền"
                          }'
                                                name="role_id">
                                                <option label="empty"></option>
                                                @foreach ($role as $key => $val)
                                                    <option value="{{ $val->role_id ?? '' }}">{{ $val->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <!-- End Body -->

                                <!-- Footer -->
                                <div class="card-footer d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary">
                                        Tạo người dùng
                                    </button>
                                    <a href="{{ route('show_list_employee.index') }}"
                                        class="btn btn-secondary waves-effect ml-1">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </form>
            <!-- End Step Form -->
        </div>
        <!-- End Content -->
    </main>
@endsection

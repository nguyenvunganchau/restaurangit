@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Step Form -->
            <form class="js-step-form py-md-5" method="post"
                action="{{ route('update_employee.post', ['id' => request()->route('id')]) }}" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="name"
                                                value="{{ isset($user) ? $user->name : old('name') }}" id="firstNameLabel"
                                                aria-label="Clarice">
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
                                            <input type="email" class="form-control" name="email"
                                                value="{{ isset($user) ? $user->email : old('email') }}" id="emailLabel"
                                                aria-label="clarice@example.com">
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
                                                id="phoneLabel" value="{{ isset($user) ? $user->phone : old('phone') }}">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group -->
                                    <div class="row form-group">
                                        <label for="organizationLabel" class="col-sm-3 col-form-label input-label">Địa
                                            chỉ <span class="text-danger">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" id="organizationLabel"
                                                value="{{ isset($user) ? $user->address : old('address') }}"
                                                aria-label="Htmlstream">
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
                                            "placeholder": "Chọn quyền"
                                          }'
                                                name="role_id">
                                                <option label="empty"></option>
                                                @foreach ($role as $key => $val)
                                                    <option value="{{ $val->role_id }}"
                                                        {{ isset($user) && $user->role_id === $val->role_id ? 'selected' : '' }}>
                                                        {{ $val->name ?? '' }}
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
                                        Cập nhật
                                    </button>
                                    <a href="{{ route('show_list_employee.index') }}"
                                        class="btn btn-secondary waves-effect ml-1">Huỷ</a>
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

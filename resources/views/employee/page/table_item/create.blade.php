@extends('employee.layout.main')
@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 mb-3 mb-lg-0">

            </div>

            <div class="col-lg-10">
                <!-- Card -->
                <div class="card">
                    <!-- Body -->
                    <form method="post" action="{{ route('create_table.post') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên Bàn <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="js-masked-input form-control" name="name"
                                    id="addresszipCodeLabel">
                                @error('name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Loại bàn <span
                                        class="text-danger">*</span></label>
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                    id="collectionsLabel" name="table_type_id">
                                    <option selected value=""> Loại bàn</option>
                                    @foreach ($table_type as $key => $val)
                                        <option value="{{ $val->table_type_id ?? '' }}">{{ $val->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('table_type_id')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <!-- End Form Group -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('show_list_table.index') }}"
                                    class="btn btn-secondary waves-effect ml-1">Quay lại</a>
                            </div>
                        </div>
                    </form>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection

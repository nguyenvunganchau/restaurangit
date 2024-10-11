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
                    <form method="post" action="{{ route('update_table_type.post', ['id' => request()->route('id')]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên loại bàn <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="js-masked-input form-control" name="name"
                                    id="addresszipCodeLabel"
                                    value="{{ isset($table_type) ? $table_type->name : old('name') }}">
                                @error('name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giá</label>

                                <input type="text" class="js-masked-input form-control" name="price"
                                    id="addresszipCodeLabel"
                                    value="{{ isset($table_type) ? $table_type->price : old('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Số lượng <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="js-masked-input form-control" name="amount"
                                    id="addresszipCodeLabel"
                                    value="{{ isset($table_type) ? $table_type->amount : old('amount') }}">
                                @error('amount')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Mô tả </label>

                                <input type="text" class="js-masked-input form-control" name="description"
                                    id="addresszipCodeLabel"
                                    value="{{ isset($table_type) ? $table_type->description : old('description') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-file">
                                        <input type="file" name="images" class="form-file-input form-control">
                                        @if (isset($table_type) && $table_type->image_table_type)
                                            <img src="{{ asset($table_type->image_table_type ? '' . Storage::url($table_type->image_table_type) : $table_type->name) }}"
                                                alt="{{ $table_type->name }}" width="100">
                                        @endif
                                        @error('images')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('show_list_table_type.index') }}"
                                    class="btn btn-secondary waves-effect ml-1">Huỷ</a>
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

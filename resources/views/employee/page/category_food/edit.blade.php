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
                    <form method="post" action="{{ route('update_category_food.post', ['id' => request()->route('id')]) }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên danh mục <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="js-masked-input form-control" name="name"
                                    id="addresszipCodeLabel"
                                    value="{{ isset($category_food) ? $category_food->name : old('name') }}">
                                @error('name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <!-- End Form Group -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('show_list_category_food.index') }}"
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

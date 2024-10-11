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
                    <form method="post" action="{{ route('create_menu.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên Món <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="js-masked-input form-control" name="item_name"
                                    id="addresszipCodeLabel" placeholder="Món ...">
                                @error('item_name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giá <span
                                        class="text-danger">*</span></label>

                                <input type="number" class="js-masked-input form-control" name="price"
                                    id="addresszipCodeLabel">
                                @error('price')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giảm giá </label>

                                <input type="number" class="js-masked-input form-control" name="discount"
                                    id="addresszipCodeLabel">
                            </div>
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Loại Món <span
                                        class="text-danger">*</span></label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                    id="collectionsLabel"
                                    data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "placeholder": "chọn loại món"
                          }'
                                    name="category_id">
                                    <option label="empty"></option>
                                    @foreach ($category as $key => $val)
                                        <option value="{{ $val->category_id ?? '' }}">{{ $val->name ?? '' }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Mô tả </label>

                                <input type="text" class="js-masked-input form-control" name="description"
                                    id="addresszipCodeLabel">
                            </div>
                            <div class="form-group">
                                <label class="input-label">Ảnh <span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-file">
                                        <input type="file" name="images" class="form-file-input form-control">
                                        @if (isset($user) && $user->avatar)
                                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" width="100">
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
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('show_list_menu.index') }}"
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

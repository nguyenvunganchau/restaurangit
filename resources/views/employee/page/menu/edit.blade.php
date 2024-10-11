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
                    <form method="post" action="{{ route('update_menu.post', ['id' => request()->route('id')]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tên Món <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="item_name" value="{{ $menu->item_name }}">
                                @error('item_name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giá <span
                                        class="text-danger">*</span></label>
                                <input type="number" class=" form-control" name="price" value="{{ $menu->price }}">
                                @error('price')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Giảm giá </label>
                                <input type="number" class=" form-control" name="discount" value="{{ $menu->discount }}">
                            </div>
                            <div class="form-group">
                                <label for="collectionsLabel" class="input-label">Loại Món <span
                                        class="text-danger">*</span></label>

                                <!-- Select -->
                                <select class="js-select2-custom custom-select" size="1" style="opacity: 0;"
                                    name="category_id">
                                    @foreach ($category as $key => $val)
                                        <option value="{{ $val->category_id }}"
                                            {{ isset($menu) && $menu->category_id === $val->category_id ? 'selected' : '' }}>
                                            {{ $val->name ?? '' }}</option>
                                        </option>
                                    @endforeach
                                </select>
                                <!-- End Select -->
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Mô tả </label>
                                <input type="text" class=" form-control" name="description"
                                    value="{{ $menu->description }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-file">
                                        <input type="file" name="images" class="form-file-input form-control">
                                        @if (isset($menu) && $menu->image_menu)
                                            <img src="{{ asset($menu->image_menu ? '' . Storage::url($menu->image_menu) : $menu->item_name) }}"
                                                alt="{{ $menu->item_name }}" width="100">
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

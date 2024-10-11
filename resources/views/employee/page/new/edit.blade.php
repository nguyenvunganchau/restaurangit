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
                    <form method="post" action="{{ route('update_new.post', ['id' => request()->route('id')]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Tiêu đề <span
                                        class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="title" value="{{ $new->title }}">
                                @error('title')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="addresszipCodeLabel" class="input-label">Mô tả <span
                                        class="text-danger">*</span></label>
                                {{-- <input type="text" class=" form-control" name="description"
                                    value="{{ $new->description }}"> --}}
                                <textarea name="description" id="" class=" form-control" cols="30" rows="7">{{ $new->description }}</textarea>
                                @error('description')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ảnh <span class="text-danger">*</span></label>
                                <div>
                                    <div class="form-file">
                                        <input type="file" name="images" class="form-file-input form-control">
                                        @if (isset($new) && $new->image_news)
                                            <img src="{{ asset($new->image_news ? '' . Storage::url($new->image_news) : $new->title) }}"
                                                alt="{{ $new->title }}" width="100">
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
                                <a href="{{ route('show_list_new.index') }}"
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

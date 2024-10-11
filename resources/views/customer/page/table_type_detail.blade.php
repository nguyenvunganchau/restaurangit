@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">Nhà hàng của chúng tôi</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Chi tiết loại bàn</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Our Restaurant style-->

    <!-- Our Restaurant style-->
    <!-- Our Special Dinning-->
    <section class="clearfix news-wrapper">
        <div class="container clearfix common-pad-room">
            <div class="row">
                <!-- One-->
                <div class="room-t-wrapper">
                    <div class="col-lg-7 col-md-12 img-wrap">
                        <div class="img-holder"><img
                                src="{{ $table_type->image_table_type ? Storage::url($table_type->image_table_type) : asset('images\table\1.jpg') }}"
                                alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 content">
                        <h2>{{ $table_type->name }}</h2>
                        <p>{{ $table_type->description }}</p>
                    </div>
                </div>
                <!-- One-->
            </div>
        </div>
    </section>
    <!-- Our Special Dinning-->
    <!-- Our Menu-->
    <section class="our-menu-wrapper container clearfix common-pad">
        {{-- <div class="sec-header">
            <h2>Menu</h2>
            <h3>Thưởng thức những hương vị độc đáo</h3>
        </div> --}}
        <div class="our-menu-tab">
            <ul role="tablist" class="nav nav-tabs">
                @php
                    $commentCount = 0;
                @endphp
                @foreach ($comment as $cmt)
                    @if ($cmt->table_type_id == $table_type->table_type_id)
                        @php
                            $commentCount++;
                        @endphp
                    @endif
                @endforeach
                <li role="presentation">
                    <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Bình luận
                        ({{ $commentCount }})</a>
                </li>
            </ul>
            <!-- Tab panes-->
            <div class="myTabContent tab-content" style="margin-top: 20px">
                @foreach ($comment as $item)
                    <div class="sec-header"
                        style="display: flex; justify-content: space-between; padding: 0px 35px 0px 35px">
                        <h2 style="font: 1.8em / 1em Playball, sans-serif;">{{ $item->name }}<small> -
                                <i>{{ $item->date }}</i></small>
                        </h2>

                        @if (Auth::guard('customer')->check())
                            @if (Auth::guard('customer')->user()->customer_id == $item->customer_id)
                                <form action="{{ route('comment_delete', $item->comment_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class='btn btn-danger'
                                        onclick="return confirm('Bạn có chắc muốn xóa không?')">Xoá</button>
                                </form>
                            @else
                            @endif
                        @endif

                    </div>
                    <p style="padding: 0px 35px 0px 35px" class="comment-notes"><span
                            id="email-notes">{{ $item->content }}</span>
                @endforeach
                {{-- @foreach ($categories as $category)
                    <div id="comment" role="tabpanel" class="tab-pane">
                        <div class="tab-inner-cont"><img src="images\restaurant\6.jpg" alt=""
                                class="img-responsive">
                            @foreach ($category->menuItems as $food)
                                <div class="media">
                                    <div class="media-left">
                                        <h2>{{ $food->item_name ?? '' }}</h2>
                                        <p>{{ $food->description ?? '' }}</p>
                                    </div>
                                    <div class="media-right">
                                        <p>{{ $food->price ?? '' }}<sup>VNĐ</sup></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach --}}

                <form id="contactForm"
                    action="{{ isset($content_comment) ? route('updateComment', $content_comment->id) : route('create_comment') }}
                    "
                    method="POST" enctype="multipart/form-data" id="commentform" class="comment-form">
                    @csrf
                    @if (isset($content_comment))
                        @method('PUT')
                    @endif
                    <div class="">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 20px 35px 20px 35px">
                            <div class="sec-header">
                                <h2>Nội
                                    dung </h2>
                            </div>
                            <textarea id="message" rows="6" name="content" placeholder="Nội dung" class="form-control">{{ isset($content_comment) ? $content_comment->content : old('content') }}</textarea>
                            @error('content')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        @if (Auth::guard('customer')->check())
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px 35px 20px 35px">
                                <button class="res-btn">{{ isset($content_comment) ? 'Cập nhật' : 'Gửi' }}</button>
                                <input type="hidden" class="form-control" name="customer_id"
                                    value="{{ Auth::guard('customer')->user()->customer_id }}">
                                <input type="hidden" class="form-control" name="name"
                                    value="{{ Auth::guard('customer')->user()->name }}">
                                <input type="hidden" class="form-control" name="email"
                                    value="{{ Auth::guard('customer')->user()->email }}">
                                <input type="hidden" class="form-control" name="table_type_id"
                                    value="{{ $table_type->table_type_id }}">
                                <input type="text" name="date" value="{{ date('Y-m-d') }}" hidden>
                                <input type="text" name="created_at" value="{{ date('Y-m-d H:i:s', strtotime('now')) }}"
                                    hidden>
                            </div>
                        @else
                            <p style="color: red; padding-left: 35px; padding-bottom: 15px">Vui lòng đăng nhập để bình luận!
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

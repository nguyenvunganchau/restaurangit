@extends('customer.layout.main')
<style>
    .truncate-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5;
        /* Adjust the line height as needed */
        max-height: 4em;
        /* line-height * number of lines (2 lines here) */
    }
</style>
@section('content')
    <section class="container clearfix common-pad offer-main" style="padding-bottom: unset">
        <div class="sec-header">
            <h2>Bài viết</h2>
            <h3>Hãy theo dõi chúng tôi để xem những bài viết cũng như thông báo mới nhất</h3>
        </div>
    </section>
    <!-- News style-->
    <section class="container clearfix common-pad offer-main" style="padding-top: unset">
        @foreach ($new as $item)
            <div class="row">
                <div class="our-spec-outer">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="item"><img
                                src="{{ $item->image_news ? Storage::url($item->image_news) : asset('images\gallery\m1.jpg') }}"
                                alt="" style="height: 180px" class="img-responsive">
                            <h2>{{ $item->title }}</h2>
                            <p class="truncate-text">{{ $item->description }}</p>
                            <div class="offer-b-but" style="margin-top: 18px"><a
                                    href="{{ route('show_detail_news.index', ['new_id' => $item->new_id]) }}"
                                    class="res-btn">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Spa Offer-->
    {{-- <section class="container clearfix common-pad offer-main">
        <div class="row">
            <div class="col-lg-5 col-md-6 offer-deal">
                <div class="img-holder"><img src="images\offer\hn.jpg" alt="" class="img-responsive">
                    <div class="overlay col-pink">
                        <p>50%<span>off</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="offer-content">
                    <h2>Honey moon</h2>
                    <p> Dịp trăng mật là một khoảnh khắc đặc biệt trong cuộc sống của các cặp đôi,
                        và chúng tôi hiểu mong muốn của bạn trong việc tạo ra một trải nghiệm đáng nhớ.</p>
                    <div class="offer-b-main">
                        <div class="offer-b-but"><a href="#" class="res-btn">Đặt ngay</a></div>
                        <div class="offer-b-price">
                            <p>100<sup>đ</sup><span>/người</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Spa Offer-->
    <!-- Honeymoon Offer-->
    {{-- <div class="offer-deal-dark">
        <section class="container clearfix common-pad offer-main">
            <div class="row">
                <div class="col-lg-5 col-md-6 offer-deal">
                    <div class="img-holder"><img src="images\offer\t41.jpg" width="800" alt=""
                            class="img-responsive">
                        <div class="overlay col-purple">
                            <p>15%<span>off</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="offer-content">
                        <h2>Thứ 4 hàng tuần</h2>
                        <p>Thứ 4 là ngày đặc biệt tại cửa hàng của chúng tôi! Hãy đến và hưởng ưu đãi đặc biệt vào ngày này,
                            với giảm giá đặc biệt cho tất cả các sản phẩm trong cửa hàng.</p>
                        <div class="offer-b-main">
                            <div class="offer-b-but"><a href="#" class="res-btn">Đặt ngay</a></div>
                            <div class="offer-b-price">
                                <p>100<sup>đ</sup><span>/người</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
    <!-- Honeymoon Offer-->
    <!-- Spa Offer-->
    <!-- Welcome banner  style-->
@endsection

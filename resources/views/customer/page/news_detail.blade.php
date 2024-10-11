@extends('customer.layout.main')
@section('content')
    <!-- About Resort style-->
    <section class="container clearfix common-pad-inner about-info-box">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="sec-header3">
                    <h2>Chi tiết bài viết</h2>
                    <h3>Theo dõi chúng tôi để nhận những thông báo mới nhất</h3>
                </div>
                {{-- <p>Hãy đặt bàn ngay hôm nay để tận hưởng một trải nghiệm ẩm thực tuyệt vời và thưởng thức những món ăn độc
                    đáo, chất lượng cao tại nhà hàng của chúng tôi. Với không gian sang trọng, dịch vụ chuyên nghiệp và đội
                    ngũ nhân viên tận tâm, chúng tôi cam kết mang đến cho bạn một bữa ăn đáng nhớ và thoải mái.
                    Đừng bỏ lỡ cơ hội này!</p> --}}
            </div>
        </div>
    </section>
    <!-- About Resort style-->
    <!-- Room 2 style-->
    <section class="clearfix news-wrapper">
        <div class="container clearfix common-pad-room">
            <div class="row">
                <!-- One-->
                <div class="room-t-wrapper">
                    <div class="col-lg-7 col-md-12 img-wrap">
                        <div class="img-holder"><img
                                src="{{ $new->image_news ? Storage::url($new->image_news) : asset('images\table\1.jpg') }}"
                                alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 content">
                        <h2>{{ $new->title }}</h2>
                        <p>{{ $new->description }}</p>
                    </div>
                </div>
                <!-- One-->
            </div>
        </div>
    </section>
    <!-- Room 2 style-->
    <!-- Welcome banner  style-->
@endsection

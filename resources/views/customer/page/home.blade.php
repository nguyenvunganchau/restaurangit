@extends('customer.layout.main')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div id="minimal-bootstrap-carousel" data-ride="carousel"
        class="carousel default-home-slider slide carousel-fade shop-slider">
        <!-- Wrapper for slides-->
        <div role="listbox" class="carousel-inner">
            <div style="background-image: url(images/slider/a.jpg);backgroudn-position: center right;"
                class="item active slide-1">
                <div class="carousel-caption nhs-caption nhs-caption6">
                    <div class="thm-container">
                        <div class="box valign-middle">
                            <div class="content text-center">
                                <h2 data-animation="animated fadeInUp" class="this-title">Tận hưởng không gian yên
                                    tĩnh</h2>
                                <p data-animation="animated fadeInDown">Chào mừng đến với nhà hàng chúng tôi, nơi bạn sẽ
                                    khám phá một thế giới ẩm thực đa dạng và tinh tế. Với không gian sang trọng, dịch vụ
                                    chuyên nghiệp và các món ăn ngon miệng, chúng tôi cam kết mang đến cho bạn một trải
                                    nghiệm ẩm thực đáng nhớ.</p>
                                <a data-animation="animated fadeInLeft" href="{{ route('show_our_table.index') }}"
                                    class="nhs-btn3">Đặt ngay</a><a data-animation="animated fadeInRight"
                                    href="{{ route('show_about_us.index') }}" class="nhs-btn">Về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-image: url(images/slider/b.png);backgroudn-position: center right;" class="item slide-2">
                <div class="carousel-caption nhs-caption nhs-caption7">
                    <div class="thm-container">
                        <div class="box valign-middle">
                            <div class="content text-left pull-left">
                                <h2 data-animation="animated fadeInUp" class="this-title">Nơi tốt nhất để thư giãn </h2>
                                <p data-animation="animated fadeInDown"> Ẩm thực cùng âm nhạc là một cách tuyệt vời để
                                    tạo ra một không gian ấm cúng và thú vị. Âm nhạc có thể tạo ra một không khí thoải
                                    mái và tăng cường trải nghiệm ẩm thực của bạn. Khi âm nhạc nhẹ nhàng tràn ngập không
                                    gian, nó có thể giúp thư giãn và tạo ra một bầu không khí thư thái cho bữa ăn.</p>
                                <a data-animation="animated fadeInLeft" href="{{ route('show_our_table.index') }}"
                                    class="nhs-btn3">Đặt ngay</a><a data-animation="animated fadeInRight"
                                    href="{{ route('show_about_us.index') }}" class="nhs-btn">Về chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-image: url(images/slider/c.jpg);backgroudn-position: center right;" class="item slide-2">
                <div class="carousel-caption nhs-caption nhs-caption8">
                    <div class="thm-container">
                        <div class="box valign-middle">
                            <div class="content text-center">
                                <h2 data-animation="animated fadeInUp" class="this-title">Luôn tận tâm phục vụ</h2>
                                <p data-animation="animated fadeInUp" class="this-title">Trải nghiệm khách hàng là ưu
                                    tiên hàng đầu của chúng tôi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controls--><a href="#minimal-bootstrap-carousel" role="button" data-slide="prev"
            class="left carousel-control"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a><a
            href="#minimal-bootstrap-carousel" role="button" data-slide="next" class="right carousel-control"><i
                class="fa fa-angle-right"></i><span class="sr-only">Next</span></a>
    </div>
    <section class="container clearfix common-pad nasir-style">
        <div class="sec-header sec-header-pad">
            <h2>Loại bàn</h2>
            <h3>Chọn loại bàn mà bạn mong muốn sử dụng</h3>
        </div>
        <div class="room-slider">
            <div class="roomsuite-slider-two">
                @foreach ($table_type as $tableItem)
                    <div class="room-suite room-suite-htwo">
                        <div class="item">
                            <div class="ro-img"><img
                                    src="{{ asset($tableItem->image_table_type) ? '' . Storage::url($tableItem->image_table_type) : $tableItem->name }}"
                                    style="height: 170px" alt="" class="img-responsive"></div>
                            <div class="ro-txt">
                                <a
                                    href="{{ route('show_detail_table_type.index', ['table_type_id' => $tableItem->table_type_id]) }}">
                                    <h2>{{ $tableItem->name }}</h2>
                                </a>
                                <p>Trong không gian nhỏ bé này, chúng ta xây dựng một thế giới riêng, nơi mà chỉ có tình
                                    yêu và sự hiểu biết.
                                    Bàn ăn trở thành biểu tượng của một cuộc sống hạnh phúc và an lành, nơi chúng ta
                                    luôn đồng hành bên nhau.
                                </p>
                                <div class="ro-text-two">
                                    <div class="left-p-two pull-left">
                                        <a href="{{ route('show_booking.index', ['table_type_id' => $tableItem->table_type_id]) }}"
                                            class="res-btn">Đặt ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Counter style-->
    <section class="resort-counert clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="rest-fact-counter">
                        <div class="text-box">
                            <h4 data-from="0" data-to="{{ $countReservation }}" class="timer"></h4>
                        </div>
                        <div class="text-box2">
                            <p>Đơn <span>đặt bàn</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="rest-fact-counter">
                        <div class="text-box">
                            <h4 data-from="0" data-to="{{ $countTable }}" class="timer"></h4>
                        </div>
                        <div class="text-box2">
                            <p>Bữa<span>Tối</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="rest-fact-counter">
                        <div class="text-box">
                            <h4 data-from="0" data-to="{{ $countFood }}" class="timer"></h4>
                        </div>
                        <div class="text-box2">
                            <p>Thực <span>đơn</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="rest-fact-counter">
                        <div class="text-box">
                            <h4 data-from="0" data-to="{{ $countCustomer }}" class="timer"></h4>
                        </div>
                        <div class="text-box2">
                            <p>Khách hàng <span>Thân thiết</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Activities of Resort style-->
    <div class="resot-activities clearfix">
        <div class="container clearfix common-pad">
            <div class="row">
                <div class="col-lg-6 col-md-6 activities-cont">
                    <div class="sec-header3">
                        <h2>Các hoạt động của nhà hàng</h2>
                        <h3>Bữa cơm yêu thương</h3>
                    </div>
                    <p>Vào ngày 15 hàng tháng, chúng tôi trích 20% doanh thu của ngày 14 để nấu những bưa cơm từ thiện
                        gửi tới những mảnh đời khó khăn.
                    </p>
                    <p>Với triết lý lá rách ít đùm lá rách nhiều, chúng tôi luôn đặt tâm huyết vào những phần cơm mang
                        đến cho mọi người </p>
                </div>
                <div class="single_wel_cont col-sm-6"><a href="#" class="wel-box">
                        <div class="icon-box"><img src="images\welcome\icon-1.png" alt=""></div>
                        <h4> Bữa cơm từ thiện</h4>
                        <div class="overlay transition3s">
                            <div class="icon_position_table">
                                <div class="icon_container border_round">
                                    <h2>Bữa cơm từ thiện</h2>
                                    <p> Chung Tay Nâng Cao Tình Người Qua Mỗi Bữa Ăn </p>
                                </div>
                            </div>
                        </div>
                    </a></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Our Offer style-->
    <section class="our-offer-htwo clearfix">
        <div class="container clearfix common-pad">
            <div class="row">
                <div class="col-md-4 our-offer-left">
                    <div class="sec-header3">
                        <h2>Chương trình ưu đãi</h2>
                        <h3>Đặt ngay để nhận những ưu đãi</h3>
                    </div>
                    <p><i>Chương trình khuyến mãi đặc biệt, cơ hội không thể bỏ qua</i></p>
                    <p>Với sứ mệnh nâng cao chất lượng cuộc sống, chúng tôi luôn mang đến những ưu đãi bất ngờ</p>
                </div>
                <div class="col-md-8 offer-right">
                    <div class="offer-img-box1">
                        <div class="spa-offer">
                            <div class="img_holder"><img src="images\offer\anhdai.jpg" alt=""
                                    class="img-responsive">
                                <div class="overlay">
                                    <div class="room-ad-cont">
                                        <h2>25% <span>off</span></h2>
                                        <h3>Thứ 4 hàng tuần</h3>
                                        <p>Tận hưởng bữa ăn snag trọng với giá siêu hời</p><a href="#">Xem
                                            thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offer-img-box2">
                        <div class="box1">
                            <div class="img_holder"><a href="#"><img src="images\offer\chay.jpg" width="300"
                                        height="300" class="img-responsive">
                                    <div class="overlay">
                                        <div class="text1">* điều kiện</div>
                                        <div class="offertext1">
                                            <p>15% <span class="off-txt">off</span><span class="winter-txt">15 Âm<br>hàng
                                                    tháng</span>
                                            </p>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                        <div class="box2">
                            <div class="img_holder"><a href="#"><img src="images\offer\hn.jpg" width="300"
                                        height="300" class="img-responsive">
                                    <div class="overlay">
                                        <p>Tuần trăng mật <span>Giảm giá</span></p>
                                        <h2>25% <span>off</span></h2>
                                        <h6>* điều kiện</h6>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Gallery style-->
    <section class="our-galler-htwo clearfix common-pad">
        <div class="container clearfix">
            <div class="sec-header sec-w-header">
                <h2>Thư viện ảnh</h2>
                <h3>Đặt bàn sớm để có những trải nghiệm tốt nhất</h3>
            </div>
        </div>
        <div class="fullwidth-silder">
            <div class="fullwidth-slider">
                <div class="item"><img src="images/gallery-home/1.jpg" alt="">
                    <div class="this-overlay">
                        <div class="this-texts"><a href="#" rel="help" class="fancybox"><i
                                    class="icon icon-Search"></i></a>
                            <h4 class="this-title">Nhân viên</h4>
                        </div>
                    </div>
                </div>
                <div class="item"><img src="images\gallery-home\viu.jpg" height="250" alt="">
                    <div class="this-overlay">
                        <div class="this-texts"><a href="#" rel="help" class="fancybox"><i
                                    class="icon icon-Search"></i></a>
                            <h4 class="this-title">View</h4>
                        </div>
                    </div>
                </div>
                <div class="item"><img src="images\gallery-home\table.jpg" height="250" alt="">
                    <div class="this-overlay">
                        <div class="this-texts"><a href="#" rel="help" class="fancybox"><i
                                    class="icon icon-Search"></i></a>
                            <h4 class="this-title">Bàn</h4>
                        </div>
                    </div>
                </div>
                <div class="item"><img src="images\gallery-home\meal1.jpg" alt="">
                    <div class="this-overlay">
                        <div class="this-texts"><a href="#" rel="help" height="400" class="fancybox"><i
                                    class="icon icon-Search"></i></a>
                            <h4 class="this-title">Bữa ăn</h4>
                        </div>
                    </div>
                </div>
                <div class="item"><img src="images/gallery-home/5.jpg" alt="">
                    <div class="this-overlay">
                        <div class="this-texts"><a href="#" rel="help" class="fancybox"><i
                                    class="icon icon-Search"></i></a>
                            <h4 class="this-title">Nhà hàng</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials & Our Events style-->
    <div class="container clearfix common-pad">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="sec-header-two">
                    <h2>Đánh giá</h2>
                </div>
                <div class="testimonials-wrapper">
                    <div class="testimonial-sliders-two">
                        <div class="item">
                            <div class="test-cont">
                                <p>"Tôi đã có một trải nghiệm tuyệt vời tại nhà hàng này. Thực đơn đa dạng và hương vị
                                    của món ăn thật sự tuyệt hảo. Nhân viên phục vụ rất thân thiện và chuyên nghiệp.
                                    Không gian nhà hàng rộng rãi và thoáng mát. Tôi chắc chắn sẽ quay lại đây trong
                                    tương lai."</p>
                            </div>
                            <div class="test-bot">
                                <div class="tst-img"><img src="images\testimonials\1.png" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="client_name">
                                    <h5><a href="testimonials.html">Edogawa Conan - <span>Thần chết</span></a></h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="test-cont">
                                <p>"Nhà hàng này thực sự đáng để ghé thăm. Món ăn ngon, tươi ngon và được chế biến tỉ
                                    mỉ. Nhân viên phục vụ tận tâm và nhiệt tình. Không gian nhà hàng rất ấm cúng và tạo
                                    cảm giác thoải mái.
                                    Đây là một địa điểm lý tưởng để thưởng thức bữa ăn ngon và tận hưởng không khí thư
                                    giãn."</p>
                            </div>
                            <div class="test-bot">
                                <div class="tst-img"><img src="images\testimonials\2.png" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="client_name">
                                    <h5><a href="testimonials.html">Mori Ran - <span>Võ sĩ</span></a></h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="test-cont">
                                <p>"Tôi đã có một bữa tối tuyệt vời tại nhà hàng này. Mọi thứ từ dịch vụ đến không gian
                                    đều hoàn hảo. Nhân viên rất chu đáo và luôn sẵn lòng giúp đỡ. Món ăn tuyệt hảo, được
                                    chế biến từ nguyên liệu tươi ngon và trình bày đẹp mắt.
                                    Đây là một điểm đến tuyệt vời cho các buổi tiệc và dịp đặc biệt."</p>
                            </div>
                            <div class="test-bot">
                                <div class="tst-img"><img src="images\testimonials\3.png" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="client_name">
                                    <h5><a href="testimonials.html">Haibara Ai - <span>Bác sĩ</span></a></h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="test-cont">
                                <p>"Nhà hàng này thực sự ấn tượng với tôi. Món ăn ngon, hương vị độc đáo và tinh tế.
                                    Nhân viên phục vụ vui vẻ, nhanh nhẹn và am hiểu về món ăn. Không gian nhà hàng tạo
                                    cảm giác sang trọng và thoải mái.
                                    Tôi đã có một trải nghiệm ẩm thực đáng nhớ và sẽ khuyên bạn bè đến thưởng thức tại
                                    đây."</p>
                            </div>
                            <div class="test-bot">
                                <div class="tst-img"><img src="images\testimonials\4.png" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="client_name">
                                    <h5><a href="testimonials.html">Mori Kogoro - <span>Thám tử</span></a></h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="test-cont">
                                <p>"Tôi đã thực sự hài lòng với nhà hàng này. Món ăn ngon, đa dạng và phục vụ tận tâm.
                                    Nhân viên rất chuyên nghiệp và luôn sẵn lòng đáp ứng yêu cầu của khách hàng. Không
                                    gian nhà hàng sang trọng và ấm cúng.
                                    Tôi sẽ quay lại đây và khuyên mọi người đến thưởng thức một bữa ăn tuyệt vời."</p>
                            </div>
                            <div class="test-bot">
                                <div class="tst-img"><img src="images\testimonials\5.png" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="client_name">
                                    <h5><a href="testimonials.html">Kuroba Kaito- <span>Siêu trộm</span></a></h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 event-wrapper">
                <div class="sec-header-two">
                    <h2>Sự kiện</h2>
                </div>
                <div class="our-event-t-wrapper">
                    <div class="media">
                        <div class="media-left">
                            <div class="date-box">
                                <div class="date-inner">
                                    <div class="date-c-inner">
                                        <p>20<span>10</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h2>Ngày Quốc tế phụ nữ</h2>
                            <p>Chúc các bà, các mẹ, các chị, các bạn gái có một ngày thật ý nghĩa và tràn đầy niềm vui.
                                Hãy để cho những nụ cười rạng rỡ trên môi bạn tỏa sáng cả ngày hôm nay và mãi mãi.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <div class="date-box">
                                <div class="date-inner">
                                    <div class="date-c-inner">
                                        <p>20<span>11</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h2>Ngày nhà giáo Việt Nam</h2>
                            <p>Chúc các nhà giáo luôn khỏe mạnh, tràn đầy năng lượng và tiếp tục lan tỏa ánh sáng tri
                                thức cho thế hệ tương lai. Hãy tiếp tục truyền cảm hứng,
                                khơi dậy niềm đam mê học hỏi và giúp đỡ học sinh phát triển toàn diện.</p>
                        </div>
                    </div>
                    <div class="media media-last">
                        <div class="media-left">
                            <div class="date-box">
                                <div class="date-inner">
                                    <div class="date-c-inner">
                                        <p>31<span>10</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            <h2>Haloween</h2>
                            <p>Halloween đã trở thành một ngày kỷ niệm vui nhộn và đầy thú vị trên toàn thế giới.
                                Hãy cùng nhau tạo nên một không khí sôi động và đáng nhớ cùng chúng tôi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get in Touch & Drop a Message style-->
    <div class="resot-activities clearfix">
        <div class="container clearfix common-pad">
            <div class="row">
                <div class="col-lg-6 col-md-7 get-touch-two">
                    <div class="get-touch-wrapper row m0">
                        <div class="touch-img"><img src="images\footer\1.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="touch-txt">
                            <div class="sec-header-touch">
                                <h2>Liên hệ</h2>
                            </div>
                            <h3>Mrs.Nguyen Vu Ngan Chau<span>(CEO)</span></h3>
                            <p>Hotline : 948 504590</p>
                            <p>Email : nchouu@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 home-two-msgwrapper">
                    <div class="sec-header-touch">
                        <h2>Gửi tin nhắn</h2>
                    </div>
                    <div class="drop-wrapper input_form">
                        <form id="contactForm" action="{{ route('create_message.post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input id="name" type="text" name="name_customer" placeholder="Tên"
                                        class="form-control">
                                    @error('name_customer')
                                        <div>
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input id="email" type="email" name="email" placeholder="Email"
                                        class="form-control">
                                    @error('email')
                                        <div>
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input id="subject" type="text" name="subject" placeholder="Tiêu đề"
                                        class="form-control">
                                    @error('subject')
                                        <div>
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" rows="6" name="message" placeholder="Nội dung" class="form-control"></textarea>
                                    @error('message')
                                        <div>
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="res-btn">Gửi<i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="success">
                            <p>Gửi thành công.</p>
                        </div>
                        <div id="error">
                            <p>Gửi lỗi!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome banner  style-->
@endsection

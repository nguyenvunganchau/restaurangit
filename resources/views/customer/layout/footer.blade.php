<div class="nasir-subscribe-form-row row">
    <div class="container">
        <div class="row this-dashed">
            <div class="this-texts">
                <h2>Hãy theo dõi chúng tôi</h2>
                <h3>Đăng kí ngay để nhận ưu đãi và các sự kiện hấp dẫn của chúng tôi!</h3>
            </div>
            <form action="#" method="post" class="this-form input-group">
                <input type="email" placeholder="Nhập email của bạn" class="form-control"><span
                    class="input-group-addon">
                    <button type="submit" class="res-btn">Đăng ký<i class="fa fa-arrow-right"></i></button></span>
            </form>
        </div>
    </div>
</div>
<footer>
    <section class="clearfix footer-wrapper">
        <section class="container clearfix footer-pad">
            <div class="widget about-us-widget col-md-4 col-sm-6"><a href="{{ route('show_home.index') }}"><img
                        src="{{ asset('customer\images\logo\trang.png') }}" alt="" class="img-responsive"></a>
                <p>Ẩm thực DÉLICAT - Tính tế trong từng phút giây</p><a href="{{ route('show_about_us.index') }}">Đọc
                    thêm <i class="fa fa-angle-double-right"></i></a>
                <ul class="nav">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                </ul>
            </div>
            <div class="widget widget-links col-md-2 col-sm-6">
                <h4 class="widget_title">Khám phá</h4>
                <div class="widget-contact-list">
                    <ul>
                        <li><a href="{{ route('show_our_restaurant.index') }}">Ăn tối</a></li>
                        <li><a href="{{ route('show_offer.index') }}">Ưu đãi</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget widget-links col-md-2 col-sm-6">
                <h4 class="widget_title">Menu</h4>
                <div class="widget-contact-list">
                    <ul>
                        <li><a href="{{ route('show_home.index') }}"> Trang chủ </a></li>
                        <li><a href="{{ route('show_about_us.index') }}"> Về chúng rôi </a></li>
                        <li><a href="{{ route('show_our_table.index') }}"> Bàn </a></li>
                        {{-- <li><a href="{{ route('show_book.index') }}">Booking</a></li> --}}
                        <li><a href="{{ route('show_about_us.index') }}">Liên hệ </a></li>

                    </ul>
                </div>
            </div>
            <div class="widget get-in-touch col-md-4 col-sm-6">
                <h4 class="widget_title">Thông tin liên hệ</h4>
                <div class="widget-contact-list">
                    <ul>
                        <li><i class="fa fa-map-marker"></i>
                            <div class="fleft location_address"><b>DÉLICAT</b><br>12, Trịnh Đình Thảo, Hòa Thanh, Tân
                                Phú, TP Hồ Chí Minh</div>
                        </li>
                        <li><i class="fa fa-phone"></i>
                            <div class="fleft contact_no"><a href="tel:+948 504590">
                                    0948 504590</a></div>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <div class="fleft contact_mail"><a href="#">chouu@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
    <section class="container clearfix footer-b-pad">
        <div class="footer-copy">
            <div class="pull-left fo-txt">
                <p>Copyright © Restaurant 2024. All rights reserved. </p>
            </div>
            <div class="pull-right fo-txt">
                <p>Created by: <a href="#">CHOUCHOU</a></p>
            </div>
        </div>
    </section>
</footer>

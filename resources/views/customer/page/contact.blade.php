@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">Liên hệ</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Liên hệ</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Booking style-->
    <section class="container clearfix common-pad booknow">
        <div class="sec-header">
            <h2>Gửi tin nhắn</h2>
            <h3>Liên hệ với chúng tôi</h3>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success solid">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <div class="row nasir-contact">
            <div class="col-md-8">
                <div class="book-left-content input_form">
                    <form id="contactForm" action="{{ route('create_contact.index') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <div style="display: flex">
                                    <span>Tên </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <input id="name" type="text" name="name_customer" placeholder="Tên bạn"
                                    class="form-control">
                                @error('name_customer')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                                <div style="display: flex">
                                    <span>Email </span>
                                    <span style="color: red"> *</span>
                                </div>
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
                                <div style="display: flex">
                                    <span>Chủ đề </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <input id="subject" type="text" name="subject"
                                    placeholder="Chủ đề bạn muốn nói đến...." class="form-control">
                                @error('subject')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div style="display: flex">
                                    <span>Lời nhắn </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <textarea id="message" rows="6" name="message" placeholder="...." class="form-control"></textarea>
                                @error('message')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="" class="res-btn">Gửi ngay</button>
                            </div>
                        </div>
                    </form>
                    <div id="success">
                        <p>Gửi thành công.</p>
                    </div>
                    <div id="error">
                        <p>Lỗi gửi!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h2>Thông tin liên hệ</h2>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-map-marker"></i></div>
                        <div class="media-contact-info">
                            <p>12, Trịnh Đình Thảo, Tân Phú, TP HCM</p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-envelope-o"></i></div>
                        <div class="media-contact-info">
                            <p><a href="#">nchouu@gmail.com</a><br><a href="#">support@Resorthotel.Com</a></p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-phone"></i></div>
                        <div class="media-contact-info">
                            <p>Thứ 2 đến thứ 6 : 8.00am to 5.00 pm<br> Thứ 7 : 8.00am to 3.00 pm<br> Chủ nhật :
                                <span>Đóng cửa</span>
                            </p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="icon icon-Timer"></i></div>
                        <div class="media-contact-info">
                            <p><a href="#"><i>+ 948 504590</i></a><br><a href="#"><i>+ 948 504599</i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking style-->
    <!-- TT-CONTACT-MAP-->
    <div id="map-canvas" data-lat="51.477254" data-lng="-0.026888" data-zoom="14" class="tt-contact-map map-block"></div>
    <div class="addresses-block"><a data-lat="51.477254" data-marker="images/marker.png" data-lng="-0.026888"
            data-string="1. Here is some address or email or phone or something else..."></a></div>
    <!-- Welcome banner  style-->
@endsection

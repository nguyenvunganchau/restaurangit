@extends('customer.layout.main')
@section('content')
    <!-- Booking style-->
    <section class="container clearfix common-pad booknow">
        <div class="sec-header">
            <h2>Đăng ký</h2>
            <h3>Đăng ký nhận những ưu đãi mới nhất</h3>
        </div>
        <div class="row nasir-contact">
            <div class="col-md-8">
                <div class="book-left-content input_form">
                    <form id="contactForm" action="{{ route('register_customer.post') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Tên của bạn</span>
                                <input id="name" type="text" name="name" placeholder="Tên bạn"
                                    class="form-control">
                                @error('name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12"><span>Số điện thoại</span>
                                <input id="phone" type="number" name="phone" placeholder="Nhập SĐT"
                                    class="form-control">
                                @error('phone')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span> Địa chỉ email </span>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><span>Mật khẩu </span>
                                <input id="subject" type="password" name="password" class="form-control">
                                @error('password')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="submit now" class="res-btn">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                    <div id="success">
                        <p>Your message sent successfully.</p>
                    </div>
                    <div id="error">
                        <p>Something is wrong. Message cant be sent!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info">
                    <h2>Thông tin liên hệ</h2>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-map-marker"></i></div>
                        <div class="media-contact-info">
                            <p>12, Trịnh Đình Thảo, Hòa Thanh, Tân Phú, TP Hồ Chí Minh</p>
                        </div>
                    </div>
                    <div class="media-contact clearfix">
                        <div class="media-contact-icon"><i aria-hidden="true" class="fa fa-envelope-o"></i></div>
                        <div class="media-contact-info">
                            <p><a href="#">nhom05@gmail.com</a><br><a href="#">support@Resorthotel.Com</a></p>
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
@endsection

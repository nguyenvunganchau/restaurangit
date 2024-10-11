@extends('customer.layout.main')
@section('content')
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
        <div class="container">
            <h2 class="this-title">Trang cá nhân</h2>
        </div>
    </section>
    <section class="row final-breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Trang cá nhân</li>
            </ol>
        </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Booking style-->
    <section class="container clearfix common-pad booknow">
        <div class="sec-header">
            <h2>Thông tin cá nhân</h2>
            <h3>Cập nhật thông tin cá nhân của bạn</h3>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success solid">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <div class="row nasir-contact">
            <div class="col-md-12">
                <div class="book-left-content input_form">
                    <form id="contactForm" action="{{ route('update_profile', ['customer_id' => $customer->customer_id]) }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 m0 col-xs-12">
                                <div style="display: flex">
                                    <span>Tên </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <input id="name" type="text" name="name" value={{ $customer->name }}
                                    class="form-control">
                                @error('name')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 m0 col-xs-12">
                                <div style="display: flex">
                                    <span>Email </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <input id="email" type="email" name="email" value={{ $customer->email }}
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
                                    <span>Số điện thoại </span>
                                    <span style="color: red"> *</span>
                                </div>
                                <input id="phone" type="number" name="phone" value={{ $customer->phone }}
                                    class="form-control">
                                @error('phone')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" value="" class="res-btn">Cập nhật</button>
                            </div>
                        </div>
                    </form>
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

<!-- .hidden-bar-->
<section id="sidebarCollapse" class="side-menu">
    <button type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false"
        aria-controls="sidebarCollapse" class="close-button"><i class="fa fa-times"></i></button>

    <h3 class="title playball-font">Chào mừng đến nhà hàng</h3>


    <!-- /.side-menu-widget-->
    <div class="side-menu-widget gallery-widget">
        <div class="title-box">
            <h4>Ảnh của chúng tôi</h4><span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        <ul class="list-inline">
            <li><a href="#"><img src="images/gallery/c1.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images\gallery\c3,jpg.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images/gallery/k2.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images/gallery/i3.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images\gallery\s1.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images\gallery\s2.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images\gallery\r3.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="images\gallery\v1.jpg" alt="Awesome Image"></a></li>
        </ul>
        <!-- /.list-inline-->
        <ul class="contact-info">
            <li>nchou@gmail.com</li>
            <li>+84 948 504590</li>
        </ul>
        <!-- /.contact-info-->
    </div>
    <!-- /.side-menu-widget-->
    <div class="side-menu-widget subscribe-widget">
    </div>
</section>
<!-- /.side-menu-->
<section class="top-bar dhomev">
    <div class="container">
        <div class="pull-left left-infos contact-infos">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-phone"></i> 0948 504590</a></li>
                <!--comment for inline hack
                -->
                <li><a href="#"><i class="fa fa-map-marker"></i> 12, Trịnh Đình Thảo, Hòa Thanh, Tân Phú, TP Hồ
                        Chí Minh </a></li>
                <!--comment for inline hack
                -->
                <li><a href="#"><i class="fa fa-envelope"></i> nchouu@gmail.com</a></li>
            </ul>
        </div>
        <!-- /.pull-left left-infos-->
        <div class="pull-right right-infos link-list">
            @if (Auth::guard('customer')->check())
                <ul class="list-inline">
                    <li><a
                            href="{{ route('show_profile.index', ['customer_id' => Auth::guard('customer')->user()->customer_id]) }}">{{ Auth::guard('customer')->user()->name }}</a>
                    </li>
                    <li><a href="{{ route('show_history_reservation.index') }}">Lịch sử đặt</a>
                    </li>
                    <li><a href="{{ route('logout_customer.post') }}">Đăng xuất</a></li>
                </ul>
            @else
                <ul class="list-inline">
                    <li><a href="{{ route('show_login_customer.index') }}">đăng nhập</a></li>
                    <li><a href="{{ route('show_register_customer.index') }}">đăng kí</a></li>
                </ul>
            @endif
        </div>
        <!-- /.pull-right right-infos link-list-->
    </div>
    <!-- /.container-->
</section>
<!-- /.top-bar-->
<nav id="main-navigation-wrapper" class="navbar navbar-default _fixed-header _light-header stricky">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false"
                class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a
                href="{{ route('show_home.index') }}" class="navbar-brand"><img alt="Awesome Image"
                    src="/customer/images\logo\den.png"></a>
        </div>
        <div id="main-navigation" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('show_home.index') }}"> Trang chủ </a></li>
                <li><a href="{{ route('show_about_us.index') }}"> Về chúng tôi </a></li>
                <li><a href="{{ route('show_our_table.index') }}"> Loại bàn </a></li>
                {{-- <li><a href="{{ route('show_our_restaurant.index') }}">Bữa tối</a></li> --}}
                <li><a href="{{ route('show_offer.index') }}">Menu</a></li>
                <li><a href="{{ route('show_news.index') }}">Bài viết</a></li>
                <li><a href="{{ route('show_contact.index') }}">Liên hệ </a></li>
            </ul>
            <ul class="nav navbar-nav right-side-nav">
                <li class="dropdown"><a href="#"><span class="phone-only">Tìm kiếm</span><i
                            class="icon icon-Search"></i></a>
                    <ul class="dropdown-submenu has-search-form align-right">
                        <li>
                            <form action="{{ route('show_home.index') }}" method="get" class="navbar-form">
                                @csrf
                                <input type="text" name="name" value="{{ $name }}"
                                    placeholder="TÌm kiếm">
                                <button type="submit"><i class="icon icon-Search"></i></button>
                            </form>
                            <!-- /.navbar-form-->
                        </li>
                    </ul>
                </li>
                <li><a role="button" data-toggle="collapse" href="#sidebarCollapse" aria-expanded="false"
                        aria-controls="sidebarCollapse"><span class="phone-only">Side Menu</span><i
                            class="fa fa-bars"></i></a></li>
            </ul>
            <!-- /.nav navbar-right-->
            <form action="#" class="nav-search-form row">
                <div class="input-group">
                    <input type="search" placeholder="Type here for search" class="form-control"><span
                        class="input-group-addon">
                        <button type="submit"><i class="icon icon-Search"></i></button></span>
                </div>
            </form>
        </div>
    </div>
</nav>
<!-- Header  Slider style-->

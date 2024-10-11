<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DÉLICAT </title>
    <!-- reponsive meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap-->
    <link href="/customer/css\bootstrap.min.css" rel="stylesheet">
    <link href="/customer/css\font-awesome.min.css" rel="stylesheet">
    <!-- strock gap icons-->
    <link rel="stylesheet" href="/customer/vendors\Stroke-Gap-Icons-Webfont\style.css">
    <link rel="stylesheet" href="/customer/css\animate.min.css">
    <!-- owl-carousel-->
    <link rel="stylesheet" href="/customer/vendors\owlcarousel\owl.carousel.css">
    <link rel="stylesheet" href="/customer/vendors\imagelightbox\imagelightbox.min.css">
    <link rel="stylesheet" href="/customer/vendors\jquery-ui-1.11.4\jquery-ui.min.css">
    <!-- Main Css-->
    <link rel="stylesheet" href="/customer/css\style.css">
    <link rel="stylesheet" href="/customer/css\responsive.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/customer/favicon\favicon-16x16.png">
    <link rel="stylesheet" type="text/css" href="/customer/css\all-ie-only.css">
</head>

<body>

    @include('customer.layout.header')
    @yield('content')
    @include('customer.layout.footer')

    <div class="social-button">
        <div class="social-button-content">
            <a href="tel:0948504590" class="call-icon" rel="nofollow">
                <i class="fa fa-phone"></i>
                <div class="animated alo-circle"></div>
                <div class="animated alo-circle-fill alo-circle-fill-call"></div>
                <span>Hotline:
                    0948504590
                </span>
            </a>
            {{-- <a href="sms:0981481368" class="sms">
              <i class="fa fa-weixin" aria-hidden="true"></i>
              <span>SMS: 0353 693 509</span>
            </a> --}}
            <a href="#" class="mes">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <div class="animated alo-circle"></div>
                <div class="animated alo-circle-fill facebook-circle-fill-call"></div>
                <span>Nhắn tin Facebook</span>
            </a>

            <a href="https://zalo.me/0948504590" class="zalo">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <div class="animated alo-circle"></div>
                <div class="animated alo-circle-fill zalo-circle-fill-call"></div>
                <span>Zalo: 0948504590</span>
            </a>
        </div>

        {{-- <a class="user-support">
            <i class="fa fa-user" aria-hidden="true"></i>
            <div class="animated alo-circle"></div>
            <div class="animated alo-circle-fill"></div>
        </a> --}}
    </div>

    <script>
        $(document).ready(function() {
            $('.user-support').click(function(event) {
                $('.social-button-content').slideToggle();
            });
        });
    </script>

    <script src="/customer/js\jquery-2.2.4.min.js"></script>
    <script src="/customer/js\bootstrap.min.js"></script>
    <script type="text/javascript" src="/customer/js\jquery.bxslider.js"></script>
    <!-- owl carousel-->
    <script src="/customer/vendors\owlcarousel\owl.carousel.min.js"></script>
    <script src="/customer/js\jquery.easing.min.js"></script>
    <script src="/customer/js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/customer/js\zebra_datepicker.js"></script>
    <!-- jQuery appear-->
    <script src="/customer/vendors\jquery-appear\jquery.appear.js"></script>
    <!-- jQuery countTo-->
    <script src="/customer/vendors\jquery-countTo\jquery.countTo.js"></script>
    <script src="/customer/js\jquery.form.js"></script>
    <script src="/customer/js\jquery.validate.min.js"></script>
    <script src="/customer/js\contact.js"></script>
    <script src="/customer/js\jquery.mixitup.min.js"></script>
    <script src="/customer/js\jquery.fancybox.pack.js"></script>
    <script src="/customer/vendors\jquery-ui-1.11.4\jquery-ui.min.js"></script>
    <script src="/customer/js\custom.js"></script>
</body>

</html>

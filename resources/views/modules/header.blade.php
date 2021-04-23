<head>
    <meta charset="utf-8">
    <title>Vận chuyển hàng Nhật</title>
    <base href="{{ asset('') }}">
    <!-- Stylesheets -->
    <!-- bootstrap v3.3.6 css -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/saiko-main.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/logofacebook.png" type="/assets/image/x-icon">
    <link rel="icon" href="assets/images/logofacebook.png" type="assets/image/x-icon">
    {{-- <link href="assets/css/font-awesome.css" rel="stylesheet"> --}}
    <link href="assets/css/frontend.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <script type="text/javascript" src="assets/js/saiko-jquery-1.12.2.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <style>
        @media (max-width: 576px) {
            .phone-mobile {
                margin-left: 88px;
            }

            /* .form-top{
   width: 100% !important;
  } */
        }

    </style>

<body>
    <!--Page main section start-->
    <div id="pro_wrapper">
        <!--Header start-->
        <header id="ed_header_wrapper">
            <div class="ed_header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="pro_call">
                                <span>Gọi ngay <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                    080.7965.3923(JP) <span class="phone-mobile"> 1900.2149(VN)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="ed_info_wrapper">
                                <ul>
                                    <li><a href="https://fb.com/saikoexpress" data-toggle="tooltip"
                                            data-placement="bottom" title="Facebook"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i
                                                class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com/saikoexpress" data-toggle="tooltip"
                                            data-placement="bottom" title="Twitter"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i
                                                class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Whatsapp"><i
                                                class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ed_header_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3" style="padding:10px">
                            <div class="pro_logo"> <a
                                    href="#"><img
                                        style="width:95%"
                                        src="assets/images/logosaiko.png"
                                        alt="logo" /></a> </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="pro_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu"><i
                                    class="fa fa-bars"></i>
                            </div>
                            <div class="pro_menu">
                                <ul class="collapse navbar-collapse" id="ed_menu">
                                    <li>
                                        <div style="margin:6px;" class="form-track">
                                            <input type="text" id="track_tracking"  class="form-control" style="width: 100% !important">
                                            <button class="btn" style="background: #fca901;margin-left:8px" onclick="track()" type="button">Track</button>
                                        </div>
                                    </li>
                                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                                    <li><a href="javascript:;">Dịch
                                            vụ</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('service.sea') }}">Vận chuyển đường biển</a></li>
                                            <li><a href="{{ route('service.air') }}">Vận chuyển đường bay</a></li>

                                            <li><a href="{{ route('service.procedure') }}">Quy trình gửi hàng</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Thông
                                            tin</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('about.details') }}">Về Chúng Tôi</a></li>
                                            <li><a href="{{ route('about.faqs') }}">FAQS</a>
                                            </li>

                                            <li><a href="{{ route('about.policy') }}">Chính
                                                    Sách</a></li>
                                            <li><a href="{{ route('about.gallery') }}">Gallery</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Request &
                                            Tracking</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('rq_tk.price') }}">Yêu
                                                    cầu báo giá</a></li>
                                            <li><a href="{{ route('rq_tk.quote') }}">Gửi
                                                    hàng ngay</a></li>
                                            <li><a href="{{ route('rq_tk.shipment') }}">Theo
                                                    dõi kiện hàng</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('blog.index') }}">Tin tức</a>
                                    </li>
                                    <li><a href="{{ route('contact.index') }}">Liên
                                            hệ</a></li>

                                    <li><a href="{{ route('auth.index') }}">Đăng
                                            nhập</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!--header end -->

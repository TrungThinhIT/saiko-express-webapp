<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/images/logofacebook.png" type="image/x-icon" />
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="../assets_customer/css/vertical-layout-light/style.css">

    <!-- Fonts and icons -->
    <script src="../assets_customer/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['../assets_customer/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });

    </script>

    <!-- CSS Files -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets_customer/css/paginate/pagination.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets_customer/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_customer/css/atlantis.min.css">

    <style>
        .timeline>li {
            position: unset !important;
        }
        .fix-bg-table>tbody>tr:nth-child(odd)>td,
        .fix-bg-table>tbody>tr:nth-child(odd)>th {
            background-color: #fad792; // Choose your own color here
        }

        .fix-border-width{
            border-width: 1px;
        }
        .lftredbrdr {
            border-left: 2px solid #fca901;
            padding-left: 25px;
        }

        ul.timeline {
            list-style-type: none;
            position: relative;
            padding: revert !important;
        }

        ul.timeline:before {
            content: ' ';
            background: #fca901;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 100;
        }

        ul.timeline>li {
            margin: 20px 0;
            /* padding-left: 44px; */
            box-shadow: 6px 3px 17px 1px #aaaaaa;
            border-radius: 2px 7px 10px 4px;
            margin-left: 10px;
            padding: 9px;
        }

        ul.timeline>li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #000000;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 100;
        }
        .bg-secondary-fix {
            background-color: wheat;
        }

        .btn-secondary {
            border: rgba(0, 0, 0, .15) !important;
            background-color: rgba(0, 0, 0, .25) !important;
        }

        .custom-menu-main {
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-right-color: #ffaf00 !important;
        }

        body {
            font-family: 'Roboto', sans-serif !important;
            font-size: 20px;
            font-weight: 500
        }

        .fix-select {
            appearance: auto !important;
        }

        .card {
            border-radius: unset !important;
        }

        #sidebar {
            background-color: #ffaf00;
        }

        .set-bg-saiko {
            background-color: #fca901 !important;
        }

        .content-wrapper {
            background-color: white;
        }

        .set-overflow {
            overflow: auto;
        }

        .require {
            color: red
        }

        .loader {
            position: absolute;
            display: block !important;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #fca901;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        .modal {
            overflow: auto !important;
        }

        .tmn-custom-mask {
            z-index: 1062 !important;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
        }

        .swal-button {
            background-color: #fca901 !important;
        }

        .set-display {
            display: none;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #height-header-content {
            color: white;
            margin-left: 0;
            height: 100px;
        }

        .text-success {
            color: green !important;
        }

        #menu-custom {
            color: #ffaf00 !important;
            font-size: 30px;
        }

        .fa-user-circle-o {
            color: #ffaf00;
        }

        .fix-overflow {
            overflow: auto;
        }

        .navbar {
            z-index: 1062;
            border-bottom: #ffaf00 solid !important;
        }

        .navbar .navbar-brand-wrapper .navbar-toggler {
            color: #ffaf00;
        }

        .sidebar .nav:not(.sub-menu)>.nav-item>.nav-link[aria-expanded="true"] {
            border-radius: unset;
        }

        @media (max-width:991px) {
            #height-header-content {
                margin-top: -20px;
            }

            .sidebar .nav .nav-item .nav-link {
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
            }

            .custom-menu-main {
                border-top-right-radius: unset;
                border-bottom-right-radius: unset;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
                border-right-color: #ffaf00 !important;
            }

            .navbar {
                height: 60px !important;
            }

            .navbar .navbar-menu-wrapper {
                border-bottom: #ffaf00 solid !important;
                height: 60px !important;
                width: auto !important;
            }

            .navbar .navbar-brand-wrapper {
                border-bottom: #ffaf00 solid !important;
                height: 60px !important;
                width: auto !important;
            }

            .navbar .navbar-brand-wrapper .navbar-brand.brand-logo {
                display: block;
            }

            #sidebar {
                z-index: 1062;
            }

            .sidebar-offcanvas {
                top: 60px !important;
            }

            .page-body-wrapper {
                padding-top: 80px;
            }

            .main-panel {
                min-height: calc(100vh - 80px);
            }
        }

        .addHover {
            cursor: pointer;
        }

        .addHover:hover {
            background-color: wheat !important;
        }

        .logo-header {
            background-color: #ffaf00 !important;
        }

        .fix-margin {
            margin-top: 10px;
            margin-bottom: -10px;
        }

    </style>
    @yield('css')
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets_customer/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue" id="logo-header">

                <a href="{{ route('index') }}" class="logo mt-3">
                    <img src="images/icons/bg-header.png" width="140px" height="40px" alt="navbar brand"
                        class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more" id="show-search"><i class="fa fa-search search-icon"></i></button>
                <div class="nav-toggle mt-3">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2"
                style="border-bottom:unset !important">

                <div class="container-fluid fix-margin">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3" id="form-search-header">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Tìm theo tracking . . ." id="track_tracking"
                                    class="form-control">
                            </div>
                        </form>
                    </div>
                    {{-- <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    @if (Session::get('idToken') != '')
                                        @php
                                            $data = unserialize(Session::get('idToken'));
                                        @endphp
                                        {{ $data['id'] }}

                                    @endif
                                    <span class="user-level">
                                        @if (Session::get('idToken') != '')
                                            @php
                                                $data = unserialize(Session::get('idToken'));
                                            @endphp
                                            {{ $data['role_id'] }}
                                        @endif
                                    </span>
                                    {{-- <span class="caret"></span> --}}
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        {{-- <li class="nav-item active">
                            <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                        </li> --}}

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item" id="fix-bg-menu-info">
                            <a href="{{ route('auth.info') }}">
                                <i class="fa fa-user"></i>
                                <p>Thông tin tài khoản</p>
                                {{-- <span class="caret"></span> --}}
                            </a>
                        </li>
                        <li class="nav-item" id="fix-bg-menu-address">
                            <a href="{{ route('shipment.index') }}">
                                <i class="fa fa-address-book-o"></i>
                                <p>Sổ địa chỉ</p>
                                {{-- <span class="caret"></span> --}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#sidebarLayouts-transactions">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                <p>Tài khoản tiền</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts-transactions">
                                <ul class="nav nav-collapse">
                                    <li class="child-menu" id="fix-bg-menu-order-create">
                                        <a href="{{ route('transaction.show', ['transaction' => $data['id']]) }}">
                                            <span class="sub-item">Chi tiết tài khoản</span>
                                        </a>

                                    </li>
                                    <li class="child-menu" id="fix-bg-menu-order-follow">
                                        <a href=" {{ route('transaction.index') }}">
                                            <span class="sub-item">Lịch sử giao dịch</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#sidebarLayouts">
                                <i class="fa fa-shopping-basket"></i>
                                <p>Quản lí hàng hóa</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li class="child-menu" id="fix-bg-menu-order-create">
                                        <a href="{{ route('orders.create') }}">
                                            <span class="sub-item">Gởi hàng</span>
                                        </a>
                                    </li>
                                    <li class="child-menu" id="fix-bg-menu-order-follow">
                                        <a href="{{ route('orders.follow') }}">
                                            <span class="sub-item">Theo dõi kiện hàng</span>
                                        </a>
                                    </li>
                                    <li class="child-menu" id="fix-bg-menu-order-index">
                                        <a href="{{ route('orders.index') }}">
                                            <span class="sub-item">Danh sách đơn hàng</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('auth.logout') }}" id="logout-firebase">
                                <i class="fa fa-sign-out"></i>
                                <p>Thoát</p>
                                {{-- <span class="caret"></span> --}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="modal fix-z-index-modal" id="modalConfirmDelete" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    {{-- <!--Header--> --}}

                    <!--Body-->
                    <div class="modal-body" id="alert-errors">

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <button id="exit" class="btn btn-warning">Thoát</button>
                        {{-- <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a> --}}
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <div class="modal fix-z-index-modal" id="modalReload" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    {{-- <!--Header--> --}}

                    <!--Body-->
                    <div class="modal-body text-success" id="alert-success">


                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <button id="reload" class="btn btn-warning">Thoát</button>
                        {{-- <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a> --}}
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal_tracking">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Theo dõi Tracking</h3>
                        <button type="button" class="close" onclick="hiddenModal()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" id="statusData_tracking" style="display: none;margin-top:20px;">
                        </div>
                        <div class="row paddtop30">
                            <div class="col-sm-12 col-md-12">
                                <div class="underline table-responsive hidden-table" style="display:none" id="table-firt-tracking">
                                    <table class="table table-striped table_tracking fix-bg-table border-warning">
                                        <thead class="fix-border-width">
                                            <tr>
                                                <th style="text-align: center;">Box_ID</th>
                                                <th>Cân Nặng<span style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Thể Tích<span
                                                        style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Số lượng</th>
                                                <th style="text-align: center;">Tên Người Gửi</th>
                                                <th style="text-align: center;">Tên Người Nhận</th>
                                                <th style="text-align: center;">SĐT</th>
                                                <th style="text-align: center;">Địa chỉ</th>
                                                <th style="text-align: center;">Đường vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table-tracking" class="fix-border-width">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive hidden-table">
                                    <table class="table table-striped fix-bg-table border-warning"
                                        id="table_price_shipping_footer_2" style="display:none">
                                        <thead class="fix-border-width">
                                            <tr>
                                                <th style="text-align: center">Mã Tracking</th>
                                                <th style='width:100px;text-align:center'>Tổng khối lượng tính phí
                                                </th>
                                                <th>Đơn giá</th>
                                                <th>Đường vận chuyển</th>
                                                <th>Phí vận chuyển (Nhật - Kho Việt)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body_price_shipping_footer" class="fix-border-width">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row d-none" id="declaration_price_footer" style="margin:4px">
                                <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                    <div class="row">
                                        <div class="col-md-6 " >
                                            <p><label for="">Giá trị gói bảo hiểm </label>: <span
                                                    id="insurance_result_footer"></span> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><label for="">Phí bảo hiểm (3%)</label>: <span
                                                    id="insurance_result_fee_footer"></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><label for="" id="special_footer">Giá trị hàng hóa đặc biệt</label>:
                                                <span id="special_result_footer"></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><label for="" id="special_footer">Phí hàng đặc biệt
                                                    (2%)</label>: <span id="special_result_fee_footer"></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <p class=""><label for="" id="shipping_inside_jp_footer">Phí vận chuyển nội địa
                                                    Nhật(Yên)</label>: <span id="fee_shipping_inside_jp_footer"></span> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class=""><label for="" id="shipping_inside_vn_footer">Phí vận chuyển nội địa
                                                    Nhật(VNĐ)</label>: <span id="fee_shipping_inside_vn_footer"></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none" id="alert_footer" style="margin:4px">
                                <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                    <p class="text-danger">Xin quý khách vui lòng thanh toán đến STK :
                                        <b>19035902493017</b>. Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank
                                        <img src="images/TCB_icon.png" alt="" width="120px">
                                    </p>
                                    <p class="text-danger" style="font-weight: bold">Nội dung thanh toán : <span
                                            class="text-danger" id="id_order_footer" style="font-size: 25px"></span>
                                    <p>
                                    <p class="text-danger" style="font-weight: bold">Số tiền thanh toán: <span
                                            id="money_footer" style="font-size: 25px"></span><span
                                            style="font-weight: normal !important;">( Đã bao
                                            gồm phí bảo hiểm, hàng hoá đặc biệt)</span></p>
                                </div>
                            </div>
                            <div class="row d-none" id="paid_footer" style="margin:4px">
                                <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                    <h2 class="text-center text-danger font-weight-bold"> <b> Đã Thanh Toán </b></h2>
                                    <h2 class="text-center text-danger">Cảm Ơn Quý Khách</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-custome">
                                    <div class="lftredbrdr">
                                        <ul class="timeline" id="time_line_tracking">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="hiddenModal()">Tắt</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="main-panel">
            <div class="content" style="overflow: auto !important">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">@yield('title-header-content')</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    @yield('content')
                </div>
            </div>
            <footer class="footer" style="position:unset !important">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        2021, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="saikoexpress.com">SaikoExpress</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tmn-custom-mask set-display" id="loader">
            <div class="loader"></div>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="../assets_customer/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets_customer/js/core/popper.min.js"></script>
    <script src="../assets_customer/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->

    <script src="../assets_customer/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets_customer/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets_customer/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="../assets_customer/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="../assets_customer/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="../assets_customer/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="../assets_customer/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../assets_customer/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    {{-- <script src="../assets_customer/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets_customer/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script> --}}

    <!-- Sweet Alert -->
    <script src="../assets_customer/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="../assets_customer/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="../assets_customer/js/setting-demo.js"></script>
    {{-- <script src="../assets_customer/js/demo.js"></script> --}}
    <script src="assets_customer/js/jquery.masknumber.js"></script>
    <script src="assets_customer/js/pagination.js"></script>
    <script src="assets_customer/js/pagination.min.js"></script>
    <script src="assets_customer/js/jquery.datetimepicker.full.min.js"></script>

    <script src="assets_customer/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/plugins/jquery/jquery.cookie.js"></script>


    <script>
        $(document).ready(function() {
            $("#show-search").click(function() {
                $("#search-nav").show();
            })
        })
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: 60,
            maxValue: 100,
            width: 7,
            text: 5,
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: 70,
            maxValue: 100,
            width: 7,
            text: 36,
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: 40,
            maxValue: 100,
            width: 7,
            text: 12,
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        // var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        // var mytotalIncomeChart = new Chart(totalIncomeChart, {
        //     type: 'bar',
        //     data: {
        //         labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
        //         datasets: [{
        //             label: "Total Income",
        //             backgroundColor: '#ff9e27',
        //             borderColor: 'rgb(23, 125, 255)',
        //             data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
        //         }],
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         legend: {
        //             display: false,
        //         },
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     display: false //this will remove only the label
        //                 },
        //                 gridLines: {
        //                     drawBorder: false,
        //                     display: false
        //                 }
        //             }],
        //             xAxes: [{
        //                 gridLines: {
        //                     drawBorder: false,
        //                     display: false
        //                 }
        //             }]
        //         },
        //     }
        // });

        $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });

    </script>
    <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
   https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-auth.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
   https://firebase.google.com/docs/web/setup#available-libraries -->

    {{-- <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyDGy2NFzP3UlDm-U1XHjl9hgBdG-YJiYH8",
            authDomain: "saikoexpress-4e48e.firebaseapp.com",
            projectId: "saikoexpress-4e48e",
            storageBucket: "saikoexpress-4e48e.appspot.com",
            messagingSenderId: "232985951792",
            appId: "1:232985951792:web:6f407fd73072f5846af7f5"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
        var provider = new firebase.auth.GoogleAuthProvider();
        provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
        firebase.auth().languageCode = 'it';
        provider.setCustomParameters({
            'login_hint': 'user@example.com'
        });

    </script> --}}
    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = ''
        // Initialize Firebase
        firebase.initializeApp({
            apiKey: "{{ config('services.firebase.apiKey') }}",
            authDomain: "{{ config('services.firebase.authDomain') }}",
            projectId: "{{ config('services.firebase.projectId') }}",
            storageBucket: "{{ config('services.firebase.storageBucket') }}",
            messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
            appId: "{{ config('services.firebase.appId') }}",
            measurementId: "{{ config('services.firebase.measurementId') }}"
        });
        firebase.analytics();

        let id_session = "{{ Session::get('idToken') }}";

        if (id_session == "") {
            $.removeCookie('idToken', {
                path: '/'
            })
            firebase.auth().signOut().then(() => {
                // Sign-out successful.
                window.location.href = "{{ route('auth.logout') }}"
            }).catch((error) => {
                // An error happened.
                window.location.href = "{{ route('auth.logout') }}"
            });
        }

        $(document).ready(function() {
            //logout
            $("#logout-firebase").click(function(e) {
                e.preventDefault()
                $.removeCookie('idToken', {
                    path: '/'
                });
                firebase.auth().signOut().then(() => {
                    // Sign-out successful.
                    window.location.href = "{{ route('auth.logout') }}"
                }).catch((error) => {
                    window.location.href = "{{ route('auth.logout') }}"
                });
            })

            //search tracking header

            $('#form-search-header').submit(function(e) {
                e.preventDefault()

                $("#alert_footer").addClass('d-none')
                $("#paid_footer").addClass('d-none')
                $("#table_price_shipping_footer_2").hide()
                $("#declaration_price_footer").addClass('d-none')
                $(".hidden-table .table").hide();
                $("#statusData_tracking").empty('');
                $("#statusData_tracking").css('display', 'none');
                $("#time_line_tracking").empty()
                $("#table_body_price_shipping_first").empty()
                $("#body-table-tracking").empty();
                $("#fee_shipping_inside_jp_footer").text(0)
                $("#fee_shipping_inside_vn_footer").text(0)
                var tracking = $("#track_tracking").val();
                if (tracking == "") {
                    swal({
                        title: "Vui lòng nhập tracking",
                        type: "warning",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    })
                    return
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('rq_tk.getStatus') }}",
                    data: {
                        tracking: tracking
                    },
                    success: function(res) {
                        console.log(res)
                        if (res == 404) {
                            $("#table").hide();
                            $(".hidden-table .table").hide();
                            $("#statusData_tracking").css('display', 'block');
                            $("#statusData_tracking").append('<h4>' +
                                'Không tìm thấy mã tracking' + '</h4>')
                        } else {
                            if (res.data[0].boxes.length == 0 & res.data[0].orders
                                .length == 0) {
                                $("#statusData_tracking").empty();
                                $(".hidden-table .table").hide();
                                $("#table-firt-tracking").show();
                                $("#body-table-tracking").empty()
                                $("#time_line_tracking").empty()
                                $("#statusData_tracking").css('display', 'block');
                                $("#statusData_tracking").append('<h4>' +
                                    'Tracking chưa đăng kí đơn hàng' + '</h4>')
                            } else {
                                $("#statusData_tracking").css('display', 'none');
                                $(".hidden-table .table").show();
                                $("#table_price_shipping_footer_2").hide()
                                $("#table-index").hide()
                                $("#table_price_shipping").hide()
                                $("#table_item").hide()
                                $("#table-firt-tracking").show();
                                if (res.data.length == 0) {
                                    $("#statusData_tracking").empty()
                                    $("#statusData_tracking").append(
                                        '<h4>' + 'Chưa gửi hàng' + '</h4>'
                                    )
                                } else {
                                    $("#statusData_tracking").empty()
                                    $.each(res.data, function(index, value) {
                                        var name_send = '';
                                        var tel_rev = '';
                                        var name_rev = '';
                                        var add_rev = '';
                                        var created_at = '';
                                        var method_ship = '';
                                        var pay_money = 0;
                                        var insurance_result;
                                        var special_result;
                                        var insurance_result_fee = 0;
                                        var special_result_fee = 0;
                                        if (value.orders.length != 0) {

                                            if (!value.orders[0].shipment_info
                                                .sender_name) {
                                                if (isValidJSONString(value.orders[0]
                                                        .note)) {
                                                    var parse_note = JSON.parse(value.orders[0].note);
                                                    if (parse_note) {
                                                        if (typeof parse_note == "object") {
                                                            if (parse_note.send_name == undefined) {
                                                                name_send = ""
                                                            } else {
                                                                name_send = parse_note.send_name;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    name_send = ""
                                                }
                                            } else {
                                                name_send = value.orders[0].shipment_info.sender_name;
                                            }
                                            tel_rev = value.orders[0].shipment_info.tel;
                                            name_rev = value.orders[0].shipment_info.consignee;
                                            add_rev = value.orders[0].shipment_info.full_address;
                                            created_at = value.orders[0].created_at;
                                            method_ship = value.orders[0].shipment_method_id;
                                            if (value.orders[0].pay_money !=undefined) {
                                                pay_money = value.orders[0].total_fee;
                                            }
                                            insurance_result = value.orders[0].insurance_declaration //tiền bảo hiểm
                                            special_result = value.orders[0].special_declaration //tiền hàng đặc biệt
                                            $("#declaration_price_footer").removeClass('d-none')
                                            $("#insurance_result_footer").text(formatNumber(insurance_result))
                                            $("#special_result_footer").text(formatNumber(special_result))
                                            $("#insurance_result_fee_footer").text(formatNumber(value.orders[0].insurance_result_fee))
                                            $("#special_result_fee_footer").text(formatNumber(value.orders[0].special_result_fee))
                                            if (value.sfa != null) {
                                                $("#fee_shipping_inside_jp_footer").text(formatNumber(value.sfa.shipping_inside))
                                                $("#fee_shipping_inside_vn_footer").text(formatNumber(value.sfa.shipping_inside * 215))
                                            }

                                            if (value.boxes.length) {
                                                $("#table_price_shipping_footer_2").show()
                                                $("#table_body_price_shipping_footer").empty()
                                                $("#table_body_price_shipping_footer").append(
                                                    '<tr>' +
                                                        '<td>' + value.orders[0].pivot.tracking_id + '</td>' +
                                                        '<td>' + value.orders[0].total_weight + '</td>' +
                                                        '<td>' + value.orders[0].fee_ship + '</td>' +
                                                        '<td>' + method_ship + '</td>' +
                                                        '<td>' + formatNumber(value.orders[0].total_fee) +' VNĐ</td>' +
                                                    +'</tr>'
                                                )
                                            }
                                        }
                                        if (tel_rev == '' | name_rev == '' | add_rev == '') {
                                            $('#message_tracking').html(
                                                'Khách chưa đăng kí đầy đủ thông tin tracking'
                                            );
                                            $('#exitForm_tracking').hide();
                                            $('#exitSuccess_tracking').show();
                                            $('#myModal_tracking').modal('show');
                                        }
                                        if (value.boxes.length == 0) {
                                            $("#body-table-tracking").empty()
                                            $("#time_line_tracking").empty()
                                            $("#time_line_tracking").append(
                                                '<li>' +
                                                '<a>' + 'Chưa về kho' +
                                                '</a>' +
                                                '<p>' + created_at +
                                                '</p>' +
                                                '</li>'
                                            )
                                            if (value.logs.length) { //log thanh toán
                                                var matchedLogIdx = value.logs.findIndex((log) => {
                                                    return !!log?.content?.transaction
                                                });
                                                $.each(value.logs, function(logs_index, logs_value) {
                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                    var statusLogMerge;
                                                    if (matchedLogIdx === -1) {
                                                        if (keyObjectLogMerge =="updated_at,service_fee_paid") {
                                                            total_pay += logs_value.content.service_fee_paid
                                                            statusLogMerge = "Đã thanh toán " +formatNumber(logs_value.content.service_fee_paid)
                                                        }
                                                    } else {
                                                        if (keyObjectLogMerge == "transaction") {
                                                            total_pay += logs_value.content.transaction.amount
                                                            statusLogMerge = "Đã thanh toán " +formatNumber(logs_value.content.transaction.amount)
                                                        }
                                                    }

                                                    if (statusLogMerge != undefined) {
                                                        $("#time_line_tracking").append(
                                                            '<li>' +
                                                            '<a>' + statusLogMerge + '</a>' +
                                                            '<p>' + logs_value.created_at +
                                                            '</p>' +
                                                            '</li>'
                                                        )
                                                    }
                                                })
                                            }
                                            $("#body-table-tracking")
                                                .append(
                                                    `<tr ">` +
                                                    '<td>' +
                                                    '</td>' +
                                                    '<td>' +
                                                    '</td>' +
                                                    '<td>' +
                                                    '</td>' +
                                                    '<td>' +
                                                    '</td>' +
                                                    '<td>' + name_send +
                                                    '</td>' +
                                                    '<td>' + name_rev +
                                                    '</td>' +
                                                    '<td>' + tel_rev +
                                                    '</td>' +
                                                    '<td>' + add_rev +
                                                    '</td>' +
                                                    '<td>' + method_ship +
                                                    '</td>' +
                                                    '</tr>'
                                                )
                                        } else {
                                            $.each(value.boxes, function(index, value2) {
                                                $("#body-table-tracking").append(
                                                    `<tr id="sku-row-header-${value2.id}">` +
                                                    '<td>' + value2.id +
                                                    '</td>' +
                                                    '<td>' + value2.weight +
                                                    '</td>' +
                                                    '<td>' + value2.volume_weight_box +
                                                    '</td>' +
                                                    '<td>' + value2.duplicate +
                                                    '</td>' +
                                                    '<td>' + name_send +
                                                    '</td>' +
                                                    '<td>' + name_rev +
                                                    '</td>' +
                                                    '<td>' +
                                                    tel_rev +
                                                    '</td>' +
                                                    '<td>' +
                                                    add_rev +
                                                    '</td>' +
                                                    '<td>' +
                                                    method_ship +
                                                    '</td>' +
                                                    '</tr>'
                                                )
                                                if (value.boxes.length == 1) {
                                                    if (value.orders.length != 0) {
                                                        $("#alert_footer").removeClass('d-none')
                                                        $("#id_order_footer").empty()
                                                        $("#money_footer").empty()
                                                        $("#id_order_footer").text(value.id)
                                                        $("#money_footer").text(formatNumber(
                                                                value.orders[0].total_fee) +
                                                            " VNĐ")
                                                    }
                                                    //fee_shipping
                                                    if (value2.use_weight != undefined) {
                                                        $("#table_price_shipping_footer_2").show()
                                                        $("#table_body_price_shipping_footer")
                                                            .empty()
                                                        $("#table_body_price_shipping_footer")
                                                            .append(
                                                                '<tr>' +
                                                                '<td>' + value2.id + '</td>' +
                                                                '<td>' + value2.use_weight +
                                                                '</td>' +
                                                                '<td>' + value2.fee_ship + '</td>' +
                                                                '<td>' + method_ship + '</td>' +
                                                                '<td>' + value2.total_money +
                                                                ' VNĐ</td>' +
                                                                +'</tr>'
                                                            )
                                                    }
                                                    $("#time_line_tracking").empty()
                                                    if (value.boxes[0].logs.length == 0) {
                                                        $("#time_line_tracking").append(
                                                            '<li>' +
                                                            '<a>' + 'Đang tới kho' + '</a>' +
                                                            '<p>' + created_at + '</p>' +
                                                            '</li>'
                                                        )
                                                        if (value.logs.length) {
                                                            var total_pay = 0;
                                                            var matchedLogIdx = value.logs.findIndex((log) => {
                                                                    return !!log?.content?.transaction
                                                                });
                                                            $.each(value.logs, function(logs_index,logs_value) {
                                                                let keyObjectLogMerge =Object.keys(logs_value.content)
                                                                var statusLogMerge;
                                                                if (matchedLogIdx === -1) {
                                                                    if (keyObjectLogMerge =="updated_at,service_fee_paid") {
                                                                        total_pay +=logs_value.content.service_fee_paid
                                                                        statusLogMerge ="Đã thanh toán " +formatNumber(logs_value.content.service_fee_paid)
                                                                    }
                                                                } else {
                                                                    if (keyObjectLogMerge =="transaction") {
                                                                        total_pay +=logs_value.content.transaction.amount
                                                                        statusLogMerge = "Đã thanh toán " +formatNumber(logs_value.content.transaction.amount)
                                                                    }
                                                                }

                                                                if (statusLogMerge !=undefined) {
                                                                    $("#time_line_tracking")
                                                                        .append(
                                                                            '<li>' +
                                                                            '<a>' +
                                                                            statusLogMerge +
                                                                            '</a>' +
                                                                            '<p>' +
                                                                            logs_value
                                                                            .created_at +
                                                                            '</p>' +
                                                                            '</li>'
                                                                        )
                                                                }
                                                            })
                                                            if (pay_money != undefined) {
                                                                if (total_pay >= pay_money - 1000) {
                                                                    $("#alert_footer").addClass('d-none')
                                                                    if (value.orders.length) {
                                                                        $("#paid_footer").removeClass('d-none')
                                                                    } else {
                                                                        $("#paid_footer").addClass('d-none')
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        var size = "( Dài : " + value.boxes[0]
                                                            .length + "cm" + ",Rộng: " + value
                                                            .boxes[0].width + "cm" + ",Cao: " +
                                                            value.boxes[0].height + "cm )"
                                                        $("#id_order_footer").empty()
                                                        $("#money_footer").empty()
                                                        if (value.orders.length != 0) {
                                                            $("#id_order_footer").text(value.id)
                                                            $("#money_footer").text(formatNumber(
                                                                value.orders[value.orders
                                                                    .length - 1].total_fee
                                                            ) + " VNĐ")
                                                        }
                                                        $.each(value.boxes[0].logs, function(index,
                                                            value) {
                                                            let valueObject = Object.keys(
                                                                value.content);
                                                            let valueOfKey = Object.values(
                                                                value.content);
                                                            var status;
                                                            if (valueObject == "id") {
                                                                status = "Đã nhập kho Nhật"
                                                            }
                                                            if (valueObject ==
                                                                "in_pallet") {
                                                                status = "Đã kiểm hàng"
                                                            }
                                                            if (valueObject ==
                                                                "set_user_id,set_order_id"
                                                            ) {
                                                                status = "Lên đơn hàng"
                                                            }
                                                            if (valueObject ==
                                                                "set_user_id") {
                                                                status = "Lên đơn hàng"
                                                            }
                                                            if (valueObject ==
                                                                "set_owner_id,set_owner_type"
                                                            ) {
                                                                status = "Lên đơn hàng"
                                                            }
                                                            if (valueObject ==
                                                                "in_container" ||
                                                                valueObject ==
                                                                "in_container,from,to") {
                                                                status = "Xuất kho Nhật"
                                                            }
                                                            if (valueObject ==
                                                                "out_container" ||
                                                                valueObject ==
                                                                "out_container,from,to") {
                                                                status = "Nhập kho Việt Nam"
                                                            }
                                                            if (valueObject ==
                                                                "outbound_warehouse") {
                                                                status = "Xuất kho Việt Nam"
                                                            }
                                                            if (valueObject ==
                                                                "shipping_code" && value
                                                                .type_id == "created") {
                                                                status = "Mã giao hàng: " +
                                                                    value.content
                                                                    .shipping_code
                                                            }
                                                            if (valueObject ==
                                                                "shipping_code" && value
                                                                .type_id == "updated") {
                                                                status =
                                                                    "Cập nhật mã giao hàng: " +
                                                                    value.content
                                                                    .shipping_code
                                                            }
                                                            if (valueObject ==
                                                                "shipping_code" && value
                                                                .type_id == "deleted") {
                                                                status =
                                                                    "Huỷ mã giao hàng: " +
                                                                    value.content
                                                                    .shipping_code
                                                            }
                                                            if (valueObject ==
                                                                "delivery_status") {
                                                                if (valueOfKey ==
                                                                    "shipping") {
                                                                    status =
                                                                        "Đang giao hàng"
                                                                }
                                                            }
                                                            if (valueObject ==
                                                                "delivery_status") {
                                                                if (valueOfKey ==
                                                                    "cancelled") {
                                                                    status = "Hủy box"
                                                                }
                                                            }
                                                            if (valueObject ==
                                                                "delivery_status") {
                                                                if (valueOfKey ==
                                                                    "received") {
                                                                    status = "Đã nhận hàng"
                                                                }
                                                            }
                                                            if (valueObject ==
                                                                "delivery_status") {
                                                                if (valueOfKey ==
                                                                    "refunded") {
                                                                    status = "Trả lại hàng"
                                                                }
                                                            }
                                                            if (valueObject ==
                                                                "delivery_status") {
                                                                if (valueOfKey ==
                                                                    "waiting_shipment") {
                                                                    status = "Đợi giao hàng"
                                                                }
                                                            }

                                                            $("#time_line_tracking").append(
                                                                '<li>' +
                                                                '<a>' + status +
                                                                '</a>' +
                                                                '<p>' + value
                                                                .created_at + '</p>' +
                                                                '</li>'
                                                            )
                                                        })
                                                        if (value.logs.length) {
                                                            var total_pay = 0;
                                                            var matchedLogIdx = value.logs
                                                                .findIndex((log) => {
                                                                    return !!log?.content
                                                                        ?.transaction
                                                                });
                                                            $.each(value.logs, function(logs_index,
                                                                logs_value) {
                                                                let keyObjectLogMerge =
                                                                    Object.keys(logs_value
                                                                        .content)
                                                                var statusLogMerge;
                                                                if (matchedLogIdx === -1) {
                                                                    if (keyObjectLogMerge ==
                                                                        "updated_at,service_fee_paid"
                                                                    ) {
                                                                        total_pay +=
                                                                            logs_value
                                                                            .content
                                                                            .service_fee_paid
                                                                        statusLogMerge =
                                                                            "Đã thanh toán " +
                                                                            formatNumber(
                                                                                logs_value
                                                                                .content
                                                                                .service_fee_paid
                                                                            )
                                                                    }
                                                                } else {
                                                                    if (keyObjectLogMerge ==
                                                                        "transaction") {
                                                                        total_pay +=
                                                                            logs_value
                                                                            .content
                                                                            .transaction
                                                                            .amount
                                                                        statusLogMerge =
                                                                            "Đã thanh toán " +
                                                                            formatNumber(
                                                                                logs_value
                                                                                .content
                                                                                .transaction
                                                                                .amount)
                                                                    }
                                                                }

                                                                if (statusLogMerge !=
                                                                    undefined) {
                                                                    $("#time_line_tracking")
                                                                        .append(
                                                                            '<li>' +
                                                                            '<a>' +
                                                                            statusLogMerge +
                                                                            '</a>' +
                                                                            '<p>' +
                                                                            logs_value
                                                                            .created_at +
                                                                            '</p>' +
                                                                            '</li>'
                                                                        )
                                                                }
                                                            })
                                                            if (pay_money != undefined) {
                                                                if (total_pay >= pay_money - 1000) {
                                                                    $("#alert_footer").addClass('d-none')
                                                                    if (value.orders.length) {
                                                                        $("#paid_footer").removeClass('d-none')
                                                                    } else {
                                                                        $("#paid_footer").addClass('d-none')
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $("#table_price_shipping_footer_2").show()
                                                    if (value.orders.length != 0) {
                                                        $("#alert_footer").removeClass('d-none')
                                                        $("#id_order_footer").empty()
                                                        $("#money_footer").empty()
                                                        $("#id_order_footer").text(value.id)
                                                        $("#money_footer").text(formatNumber(
                                                                value.orders[0].total_fee) +
                                                            " VNĐ")
                                                        if (value.logs.length) {
                                                            var total_pay = 0
                                                            $.each(value.logs, function(logs_index,
                                                                logs_value) {
                                                                let keyObjectLogMerge =
                                                                    Object.keys(logs_value
                                                                        .content)
                                                                var statusLogMerge;
                                                                var created_at_log;
                                                                if (keyObjectLogMerge ==
                                                                    "transaction") {
                                                                    total_pay += logs_value
                                                                        .content.transaction
                                                                        .amount
                                                                    statusLogMerge =
                                                                        "Đã thanh toán " +
                                                                        formatNumber(
                                                                            logs_value
                                                                            .content
                                                                            .transaction
                                                                            .amount)
                                                                    $("#time_line_tracking")
                                                                        .append(
                                                                            '<li>' +
                                                                            '<a>' +
                                                                            statusLogMerge +
                                                                            '</a>' +
                                                                            '<p>' +
                                                                            logs_value
                                                                            .created_at +
                                                                            '</p>' +
                                                                            '</li>'
                                                                        )

                                                                }
                                                            })
                                                            if (pay_money != undefined) {
                                                                if (total_pay >= pay_money - 1000) {
                                                                    $("#alert_footer").addClass('d-none')
                                                                    if (value.orders.length) {
                                                                        $("#paid_footer").removeClass('d-none')
                                                                    } else {
                                                                        $("#paid_footer").addClass('d-none')
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $(`#sku-row-header-${value2.id}`).hover(function() {
                                                        $(this).addClass(
                                                            "tr-color addHover");
                                                    }, function() {
                                                        $(this).removeClass(
                                                            "tr-color addHover");
                                                    });
                                                    $(`#sku-row-header-${value2.id}`).on('click',
                                                        function() {
                                                            var vnpost = 0;
                                                            var size = '';
                                                            if (value2.vnpost != undefined) {
                                                                vnpost = value2.vnpost;
                                                            } else {
                                                                vnpost = 0;
                                                            }
                                                            check_footer(value2.id, vnpost,
                                                                created_at, value2
                                                                .use_weight, value2
                                                                .fee_ship, method_ship,
                                                                value2.total_money, value
                                                                .logs, pay_money)
                                                        })
                                                }
                                            })
                                        }
                                    })
                                }
                            }
                        }
                        $('#modal_tracking').addClass('d-block')

                    },
                    error: function(res) {
                        console.log(res)
                    }
                })

            })

        })

        function check_footer(id_box, vnpost, created_at, weight, fee, method, money, logs_merge, pay_money) {
            var id_box = id_box;

            $("#time_line_tracking").empty()
            if(checkToken()){
                let idToken = getToken();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('rq_tk.getInforBox') }}",
                    data: {
                        id_box: id_box
                    },
                    success: function(res) {

                        //log box
                        $("#time_line_tracking").empty()
                        if (res.logs.length == 0) {
                            $("#time_line_tracking").append(
                                '<li>' +
                                '<a>' + 'Đang tới kho' + '</a>' +
                                '<p>' + created_at + '</p>' +
                                '</li>'
                            )
                        } else {
                            var size = " Dài : " + res.length + "cm" + ",Rộng: " + res.width + "cm" + ",Cao: " + res
                                .height + "cm "
                            $.each(res.logs, function(index, value) {
                                let keyObject = Object.keys(value.content)
                                let valueObject = Object.values(value.content);
                                var status;

                                if (keyObject == "id") {
                                    status = "Đã nhập kho Nhật"
                                }
                                if (keyObject == "in_pallet") {
                                    status = "Đã kiểm hàng " + "( " + size + " )"
                                }
                                if (keyObject == "set_user_id,set_order_id") {
                                    status = "Lên đơn hàng"
                                }
                                if (keyObject == "set_user_id") {
                                    status = "Lên đơn hàng"
                                }
                                if (keyObject == "set_owner_id,set_owner_type") {
                                    status = "Lên đơn hàng"
                                }
                                if (keyObject == "set_user_id,set_order_id") {
                                    status = "Lên đơn hàng"
                                }
                                if (keyObject == "set_user_id") {
                                    status = "Lên đơn hàng"
                                }
                                if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                    status = "Xuất kho Nhật"
                                }
                                if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                    status = "Nhập kho Việt Nam"
                                }
                                if (keyObject == "outbound_warehouse") {
                                    status = "Xuất kho Việt Nam"
                                }
                                if (keyObject == "delivery_status") {
                                    if (valueObject == "shipping") {
                                        status = "Đang giao hàng"
                                    }
                                }
                                if (keyObject == "delivery_status") {
                                    if (valueObject == "cancelled") {
                                        status = "Hủy box"
                                    }
                                }
                                if (keyObject == "delivery_status") {
                                    if (valueObject == "received") {
                                        status = "Đã nhận hàng"
                                    }
                                }
                                if (keyObject == "delivery_status") {
                                    if (valueObject == "refunded") {
                                        status = "Trả lại hàng"
                                    }
                                }
                                if (keyObject == "delivery_status") {
                                    if (valueObject == "waiting_shipment") {
                                        status = "Đợi giao hàng"
                                    }
                                }
                                if (keyObject == "shipping_code" && value.type_id == "created") {
                                    status = "Mã giao hàng: " + value.content.shipping_code
                                }
                                if (keyObject == "shipping_code" && value.type_id == "updated") {
                                    status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                                }
                                if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                    status = "Huỷ mã giao hàng: " + value.content.shipping_code
                                }
                                $("#time_line_tracking").append(
                                    '<li>' +
                                    '<a>' + status + '</a>' +
                                    '<p>' + value.created_at + '</p>' +
                                    '</li>'
                                )
                            })
                        }
                        //adđ log payment
                        if (logs_merge.length) {
                            var total_pay = 0;
                            var matchedLogIdx = logs_merge.findIndex((log) => {
                                return !!log?.content?.transaction
                            });
                            $.each(logs_merge, function(logs_index, logs_value) {
                                let keyObjectLogMerge = Object.keys(logs_value.content)
                                var statusLogMerge;
                                var created_at_log;

                                if (matchedLogIdx === -1) {
                                    if (keyObjectLogMerge == "updated_at,service_fee_paid") {
                                        total_pay += logs_value.content.service_fee_paid
                                        statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                            .service_fee_paid)
                                    }
                                } else {
                                    if (keyObjectLogMerge == "transaction") {
                                        total_pay += logs_value.content.transaction.amount
                                        statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                            .transaction.amount)
                                    }
                                }

                                if (statusLogMerge != undefined) {
                                    $("#time_line_tracking").append(
                                        '<li>' +
                                        '<a>' + statusLogMerge + '</a>' +
                                        '<p>' + logs_value.created_at + '</p>' +
                                        '</li>'
                                    )
                                }
                            })
                            if (pay_money != undefined) {
                                if (total_pay >= pay_money - 1000) {
                                    $("#alert_footer").addClass('d-none')
                                    if (value.orders.length) {
                                        $("#paid_footer").removeClass('d-none')
                                    } else {
                                        $("#paid_footer").addClass('d-none')
                                    }
                                }
                            }
                        }
                        // vnpost
                        // if(vnpost){
                        //     $("#body-table-firt-vnpost").empty()
                        //     $("#body-table-firt-vnpost").append(
                        //         '<tr>' +
                        //         '<td>' + vnpost.MaDichVu +
                        //         '</td>' +
                        //         '<td>' + vnpost.PhuongThucVC +
                        //         '</td>' +
                        //         '<td>' + vnpost.CuocCOD +
                        //         '</td>' +
                        //         '<td>' + vnpost.TongCuocSauVAT +
                        //         '</td>' +
                        //         '<td>' + vnpost.SoTienCodThuNoiNguoiNhan +
                        //         '</tr>'
                        //     )
                        //     $("#table-firt-vnpost").show()
                        // }

                    },
                    error: function(res) {
                        console.log(res)
                    }
                })
            }else{
                firebase.auth().onAuthStateChanged((user) => {
                    if(user){
                        firebase.auth().currentUser.getIdToken(/* forceRefresh */ true).then(function(token_gg) {
                            setToken(token_gg)
                            let idToken = getToken();
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: "{{ route('rq_tk.getInforBox') }}",
                                data: {
                                    id_box: id_box
                                },
                                success: function(res) {

                                    //log box
                                    $("#time_line_tracking").empty()
                                    if (res.logs.length == 0) {
                                        $("#time_line_tracking").append(
                                            '<li>' +
                                            '<a>' + 'Đang tới kho' + '</a>' +
                                            '<p>' + created_at + '</p>' +
                                            '</li>'
                                        )
                                    } else {
                                        var size = " Dài : " + res.length + "cm" + ",Rộng: " + res.width + "cm" + ",Cao: " + res
                                            .height + "cm "
                                        $.each(res.logs, function(index, value) {
                                            let keyObject = Object.keys(value.content)
                                            let valueObject = Object.values(value.content);
                                            var status;

                                            if (keyObject == "id") {
                                                status = "Đã nhập kho Nhật"
                                            }
                                            if (keyObject == "in_pallet") {
                                                status = "Đã kiểm hàng " + "( " + size + " )"
                                            }
                                            if (keyObject == "set_user_id,set_order_id") {
                                                status = "Lên đơn hàng"
                                            }
                                            if (keyObject == "set_user_id") {
                                                status = "Lên đơn hàng"
                                            }
                                            if (keyObject == "set_owner_id,set_owner_type") {
                                                status = "Lên đơn hàng"
                                            }
                                            if (keyObject == "set_user_id,set_order_id") {
                                                status = "Lên đơn hàng"
                                            }
                                            if (keyObject == "set_user_id") {
                                                status = "Lên đơn hàng"
                                            }
                                            if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                                status = "Xuất kho Nhật"
                                            }
                                            if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                                status = "Nhập kho Việt Nam"
                                            }
                                            if (keyObject == "outbound_warehouse") {
                                                status = "Xuất kho Việt Nam"
                                            }
                                            if (keyObject == "delivery_status") {
                                                if (valueObject == "shipping") {
                                                    status = "Đang giao hàng"
                                                }
                                            }
                                            if (keyObject == "delivery_status") {
                                                if (valueObject == "cancelled") {
                                                    status = "Hủy box"
                                                }
                                            }
                                            if (keyObject == "delivery_status") {
                                                if (valueObject == "received") {
                                                    status = "Đã nhận hàng"
                                                }
                                            }
                                            if (keyObject == "delivery_status") {
                                                if (valueObject == "refunded") {
                                                    status = "Trả lại hàng"
                                                }
                                            }
                                            if (keyObject == "delivery_status") {
                                                if (valueObject == "waiting_shipment") {
                                                    status = "Đợi giao hàng"
                                                }
                                            }
                                            if (keyObject == "shipping_code" && value.type_id == "created") {
                                                status = "Mã giao hàng: " + value.content.shipping_code
                                            }
                                            if (keyObject == "shipping_code" && value.type_id == "updated") {
                                                status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                                            }
                                            if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                                status = "Huỷ mã giao hàng: " + value.content.shipping_code
                                            }
                                            $("#time_line_tracking").append(
                                                '<li>' +
                                                '<a>' + status + '</a>' +
                                                '<p>' + value.created_at + '</p>' +
                                                '</li>'
                                            )
                                        })
                                    }
                                    //adđ log payment
                                    if (logs_merge.length) {
                                        var total_pay = 0;
                                        var matchedLogIdx = logs_merge.findIndex((log) => {
                                            return !!log?.content?.transaction
                                        });
                                        $.each(logs_merge, function(logs_index, logs_value) {
                                            let keyObjectLogMerge = Object.keys(logs_value.content)
                                            var statusLogMerge;
                                            var created_at_log;

                                            if (matchedLogIdx === -1) {
                                                if (keyObjectLogMerge == "updated_at,service_fee_paid") {
                                                    total_pay += logs_value.content.service_fee_paid
                                                    statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                                        .service_fee_paid)
                                                }
                                            } else {
                                                if (keyObjectLogMerge == "transaction") {
                                                    total_pay += logs_value.content.transaction.amount
                                                    statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                                        .transaction.amount)
                                                }
                                            }

                                            if (statusLogMerge != undefined) {
                                                $("#time_line_tracking").append(
                                                    '<li>' +
                                                    '<a>' + statusLogMerge + '</a>' +
                                                    '<p>' + logs_value.created_at + '</p>' +
                                                    '</li>'
                                                )
                                            }
                                        })
                                        if (pay_money != undefined) {
                                            if (total_pay >= pay_money - 1000) {
                                                $("#alert_footer").addClass('d-none')
                                                if (value.orders.length) {
                                                    $("#paid_footer").removeClass('d-none')
                                                } else {
                                                    $("#paid_footer").addClass('d-none')
                                                }
                                            }
                                        }
                                    }
                                    // vnpost
                                    // if(vnpost){
                                    //     $("#body-table-firt-vnpost").empty()
                                    //     $("#body-table-firt-vnpost").append(
                                    //         '<tr>' +
                                    //         '<td>' + vnpost.MaDichVu +
                                    //         '</td>' +
                                    //         '<td>' + vnpost.PhuongThucVC +
                                    //         '</td>' +
                                    //         '<td>' + vnpost.CuocCOD +
                                    //         '</td>' +
                                    //         '<td>' + vnpost.TongCuocSauVAT +
                                    //         '</td>' +
                                    //         '<td>' + vnpost.SoTienCodThuNoiNguoiNhan +
                                    //         '</tr>'
                                    //     )
                                    //     $("#table-firt-vnpost").show()
                                    // }

                                },
                                error: function(res) {
                                    console.log(res)
                                }
                            })
                        }).catch(function(error) {
                            swal("warning",error.message)
                        });
                    }else{
                        firebase.auth().signInWithEmailAndPassword(email, password)
                        .then((userCredential) => {
                            firebase.auth().currentUser.getIdToken(/* forceRefresh */ false).then(function(token_gg) {
                                setToken(token_gg)
                                let idToken = getToken();
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: "{{ route('rq_tk.getInforBox') }}",
                                    data: {
                                        id_box: id_box
                                    },
                                    success: function(res) {

                                        //log box
                                        $("#time_line_tracking").empty()
                                        if (res.logs.length == 0) {
                                            $("#time_line_tracking").append(
                                                '<li>' +
                                                '<a>' + 'Đang tới kho' + '</a>' +
                                                '<p>' + created_at + '</p>' +
                                                '</li>'
                                            )
                                        } else {
                                            var size = " Dài : " + res.length + "cm" + ",Rộng: " + res.width + "cm" + ",Cao: " + res
                                                .height + "cm "
                                            $.each(res.logs, function(index, value) {
                                                let keyObject = Object.keys(value.content)
                                                let valueObject = Object.values(value.content);
                                                var status;

                                                if (keyObject == "id") {
                                                    status = "Đã nhập kho Nhật"
                                                }
                                                if (keyObject == "in_pallet") {
                                                    status = "Đã kiểm hàng " + "( " + size + " )"
                                                }
                                                if (keyObject == "set_user_id,set_order_id") {
                                                    status = "Lên đơn hàng"
                                                }
                                                if (keyObject == "set_user_id") {
                                                    status = "Lên đơn hàng"
                                                }
                                                if (keyObject == "set_owner_id,set_owner_type") {
                                                    status = "Lên đơn hàng"
                                                }
                                                if (keyObject == "set_user_id,set_order_id") {
                                                    status = "Lên đơn hàng"
                                                }
                                                if (keyObject == "set_user_id") {
                                                    status = "Lên đơn hàng"
                                                }
                                                if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                                    status = "Xuất kho Nhật"
                                                }
                                                if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                                    status = "Nhập kho Việt Nam"
                                                }
                                                if (keyObject == "outbound_warehouse") {
                                                    status = "Xuất kho Việt Nam"
                                                }
                                                if (keyObject == "delivery_status") {
                                                    if (valueObject == "shipping") {
                                                        status = "Đang giao hàng"
                                                    }
                                                }
                                                if (keyObject == "delivery_status") {
                                                    if (valueObject == "cancelled") {
                                                        status = "Hủy box"
                                                    }
                                                }
                                                if (keyObject == "delivery_status") {
                                                    if (valueObject == "received") {
                                                        status = "Đã nhận hàng"
                                                    }
                                                }
                                                if (keyObject == "delivery_status") {
                                                    if (valueObject == "refunded") {
                                                        status = "Trả lại hàng"
                                                    }
                                                }
                                                if (keyObject == "delivery_status") {
                                                    if (valueObject == "waiting_shipment") {
                                                        status = "Đợi giao hàng"
                                                    }
                                                }
                                                if (keyObject == "shipping_code" && value.type_id == "created") {
                                                    status = "Mã giao hàng: " + value.content.shipping_code
                                                }
                                                if (keyObject == "shipping_code" && value.type_id == "updated") {
                                                    status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                                                }
                                                if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                                    status = "Huỷ mã giao hàng: " + value.content.shipping_code
                                                }
                                                $("#time_line_tracking").append(
                                                    '<li>' +
                                                    '<a>' + status + '</a>' +
                                                    '<p>' + value.created_at + '</p>' +
                                                    '</li>'
                                                )
                                            })
                                        }
                                        //adđ log payment
                                        if (logs_merge.length) {
                                            var total_pay = 0;
                                            var matchedLogIdx = logs_merge.findIndex((log) => {
                                                return !!log?.content?.transaction
                                            });
                                            $.each(logs_merge, function(logs_index, logs_value) {
                                                let keyObjectLogMerge = Object.keys(logs_value.content)
                                                var statusLogMerge;
                                                var created_at_log;

                                                if (matchedLogIdx === -1) {
                                                    if (keyObjectLogMerge == "updated_at,service_fee_paid") {
                                                        total_pay += logs_value.content.service_fee_paid
                                                        statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                                            .service_fee_paid)
                                                    }
                                                } else {
                                                    if (keyObjectLogMerge == "transaction") {
                                                        total_pay += logs_value.content.transaction.amount
                                                        statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                                                            .transaction.amount)
                                                    }
                                                }

                                                if (statusLogMerge != undefined) {
                                                    $("#time_line_tracking").append(
                                                        '<li>' +
                                                        '<a>' + statusLogMerge + '</a>' +
                                                        '<p>' + logs_value.created_at + '</p>' +
                                                        '</li>'
                                                    )
                                                }
                                            })
                                            if (pay_money != undefined) {
                                                if (total_pay >= pay_money - 1000) {
                                                    $("#alert_footer").addClass('d-none')
                                                    if (value.orders.length) {
                                                        $("#paid_footer").removeClass('d-none')
                                                    } else {
                                                        $("#paid_footer").addClass('d-none')
                                                    }
                                                }
                                            }
                                        }
                                        // vnpost
                                        // if(vnpost){
                                        //     $("#body-table-firt-vnpost").empty()
                                        //     $("#body-table-firt-vnpost").append(
                                        //         '<tr>' +
                                        //         '<td>' + vnpost.MaDichVu +
                                        //         '</td>' +
                                        //         '<td>' + vnpost.PhuongThucVC +
                                        //         '</td>' +
                                        //         '<td>' + vnpost.CuocCOD +
                                        //         '</td>' +
                                        //         '<td>' + vnpost.TongCuocSauVAT +
                                        //         '</td>' +
                                        //         '<td>' + vnpost.SoTienCodThuNoiNguoiNhan +
                                        //         '</tr>'
                                        //     )
                                        //     $("#table-firt-vnpost").show()
                                        // }

                                    },
                                    error: function(res) {
                                        console.log(res)
                                    }
                                })
                            }).catch(function(error) {
                                swal("warning",error.message)
                            });
                        }).catch((error) => {
                            var errorMessage = error.message;
                            swal("warning",errorMessage)
                        });
                    }
                })
            }

        }

        function checkToken() {
            if ($.cookie('idToken') != undefined) {
                return true;
            }
            return false;
        }

        function getToken() {
            var idToken = '';
            if (checkToken()) {
                idToken = $.cookie('idToken');
            }
            return idToken;
        }

        function removeToken() {
            $.removeCookie('idToken', {
                path: '/'
            });
        }

        function setToken(token_gg) {
            var name = 'idToken';
            var now = new Date();
            now.setTime(now.getTime() + 60 * 60 * 1000);
            $.cookie(name, token_gg, {
                expires: now,
                path: "/"
            });
        }

        function hiddenModal(){
            $('#modal_tracking').removeClass('d-block')
        }
    </script>
</body>

</html>

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
                                <input type="text" placeholder="Tìm theo tracking . . ." id="value-tracking"
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
                                    @if (Session::get('token') != '')
                                        @php
                                            $data = unserialize(Session::get('token'));
                                        @endphp
                                        {{ $data['id'] }}

                                    @endif
                                    <span class="user-level">
                                        @if (Session::get('token') != '')
                                            @php
                                                $data = unserialize(Session::get('token'));
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
                            <a href="{{ route('auth.logout') }}">
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
</body>

</html>

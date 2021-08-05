<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') </title>
    <link rel="shortcut icon" href="assets/images/logofacebook.png" />

    <base href="{{ asset('') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets_mn/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets_mn/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets_mn/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets_mn/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets_mn/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets_mn/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets_mn/css/paginate/pagination.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets_mn/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> --}}

    <style>
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
            background-color: wheat;
        }

    </style>
    @yield('css')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row bg-white">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start bg-white">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="">
                        <img src="assets/images/logosaiko.png" alt="" width="auto">
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top bg-white">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" style="font-size:15px;"
                            aria-expanded="false">
                            @if (Session::get('token') != '')
                                @php
                                    $data = unserialize(Session::get('token'));
                                @endphp
                                {{ $data['id'] }}
                                <i class="fa fa-user-circle-o" aria-hidden="true" ></i>
                            @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" style="top:unset !important"
                            aria-labelledby="UserDropdown">
                            <a class="dropdown-item" href="{{ route('auth.info') }}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Thông tin
                                cá nhân
                            </a>
                            <a class="dropdown-item" href="{{ route('transaction.index') }}"><i
                                    class="dropdown-item-icon fa fa-history text-primary me-2"></i>
                                Lịch sử giao dịch</a>
                            <a class="dropdown-item" href="{{ route('shipment.index') }}"><i
                                    class="dropdown-item-icon fa fa-address-book-o text-primary me-2"></i>
                                Sổ địa chỉ</a>
                            {{-- <a class="dropdown-item"><i
                                    class="dropdown-item-icon fa fa-shopping-basket text-primary me-2"></i>
                                Quản lí đơn hàng</a> --}}
                            <a class="dropdown-item" href="{{ route('auth.logout') }}"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Thoát</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas" id="menu-custom">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.info') }}">
                            <i class="menu-icon mdi mdi-account-outline"></i>
                            <span class="menu-title">Thông tin cá nhân</span>
                        </a>
                    </li>
                    <li class="nav-item" id="fix-bg-load-page">
                        <a class="nav-link" href="javascript:" id="load-page">
                            <i class="menu-icon fa fa-address-book-o" id="fix-color-icon"></i>
                            <span class="menu-title">Sổ địa chỉ</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-transaction">
                            <i class="menu-icon fa fa-history"></i>
                            <span class="menu-title">Tài khoản tiền</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-transaction">
                            <ul class="nav flex-column sub-menu custom-menu-main">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('transaction.show', ['transaction' => $data['id']]) }}"
                                        id="show-account">Thông tin tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('transaction.index') }}"
                                        id="history-transaction">Lịch sử giao dịch</a>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="charts">
                            <i class="menu-icon fa fa-shopping-basket" aria-hidden="true"></i>
                            <span class="menu-title">Quản lí hàng hóa</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu custom-menu-main" id="">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.create') }}" id="create-order">Gởi
                                        hàng</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;" id="follow-order">Theo
                                        dõi hiện hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;" id="index-order">Danh
                                        sách đơn hàng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}" aria-expanded="false"
                            aria-controls="tables">
                            <i class="menu-icon mdi mdi-power"></i>
                            <span class="menu-title">Thoát</span>
                        </a>

                    </li>
                </ul>
            </nav>
            <!-- partial -->
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
                <div class="row col-md-12 bg-warning align-items-center p-3" id="height-header-content">
                    <h2>@yield('title-header-content')</h2>
                </div>
                <div class="content-wrapper">
                    <div class="h-100 bg-secondary">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="home-tab">
                                    <div class="tab-content tab-content-basic">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                            aria-labelledby="overview">
                                            <div class="row">
                                                <div class="col-lg-12 d-flex flex-column">
                                                    <div class="row flex-grow">
                                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card"
                                                            id="remove-stretch-card">

                                                            @yield('content')
                                                            {{-- <div class="card card-rounded">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-sm-flex justify-content-between align-items-start">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">
                                                                            Performance Line Chart</h4>
                                                                        <h5 class="card-subtitle card-subtitle-dash">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing</h5>
                                                                    </div>
                                                                    <div id="performance-line-legend"></div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a
                                href="https://www.bootstrapdash.com/" target="_blank"> </a>
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- partial -->
            </div>
            <div class="tmn-custom-mask set-display" id="loader">
                <div class="loader"></div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="assets_mn/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets_mn/vendors/chart.js/Chart.min.js"></script>
    <script src="assets_mn/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets_mn/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets_mn/js/off-canvas.js"></script>
    <script src="assets_mn/js/hoverable-collapse.js"></script>
    <script src="assets_mn/js/template.js"></script>
    <script src="assets_mn/js/settings.js"></script>
    <script src="assets_mn/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets_mn/js/dashboard.js"></script>
    <script src="assets_mn/js/Chart.roundedBarCharts.js"></script>
    <script src="assets_mn/js/jquery.masknumber.js"></script>
    <script src="assets_mn/js/pagination.js"></script>
    <script src="assets_mn/js/pagination.min.js"></script>
    <script src="assets_mn/js/jquery.datetimepicker.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#load-page").click(function() {
                window.location.href = "{{ route('shipment.index') }}"
            })
            $("#follow-order").click(function() {
                window.location.href = "{{ route('orders.follow') }}"
            })
            $("#index-order").click(function() {
                window.location.href = "{{ route('orders.index') }}"
            })
        })

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

    </script>
    <!-- End custom js for this page-->
    @yield('js')
</body>

</html>

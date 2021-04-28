<!DOCTYPE html>
<html lang="en">
<script src="https://www.google.com/recaptcha/api.js?render=6LexXeoUAAAAACjR-MM0V2-scILrUMVyliP1bArL"></script>

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
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/frontend.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <script type="text/javascript" src="assets/js/saiko-jquery-1.12.2.js"></script>
    <style>
        @media (max-width: 576px) {
            .phone-mobile {
                margin-left: 88px;
            }

            /* .form-top{
   width: 100% !important;
  } */
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #ef513a;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }


        .modal-confirm .icon-box i {
            font-size: 56px;
            position: relative;
            top: 4px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #ef513a;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #da2c12;
            outline: none;
        }

        .loader {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        .tmn-custom-mask {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
        }

        .d-none {
            display: none;
        }

        */ */

        /* Safari */
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

    </style>

<body>
    <!--Page main section start-->
    <div id="pro_wrapper">
        <!--Header start-->
        @include('modules.header')
        {{-- <header id="ed_header_wrapper">
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
                            <div class="pro_logo"> <a href="index.php"><img style="width:95%"
                                        src="assets/images/logosaiko.png" alt="logo" /></a> </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="pro_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu"><i
                                    class="fa fa-bars"></i>
                            </div>
                            <div class="pro_menu">
                                <ul class="collapse navbar-collapse" id="ed_menu">
                                    <li>
                                        <div style="margin:6px;" class="form-track">
                                            <input type="text" id="track_tracking" class="form-control" style="width: 100% !important">
                                            <button class="btn"
                                                style="background: #fca901;margin-left:8px">Track</button>
                                        </div>
                                    </li>
                                    <li><a href="index.php">Trang chủ</a></li>
                                    <li><a href="javascript:;">Dịch vụ</a>
                                        <ul class="sub-menu">
                                            <li><a href="sea.php">Vận chuyển đường biển</a></li>
                                            <li><a href="air.php">Vận chuyển đường bay</a></li>

                                            <li><a href="procedure.php">Quy trình gửi hàng</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Thông tin</a>
                                        <ul class="sub-menu">
                                            <li><a href="about-us-detail.php">Về chúng tôi</a></li>
                                            <li><a href="faqs.php">FAQS</a></li>
                                            <!-- <li><a href="our-prices.php">Bảng giá dịch vụ</a></li> -->
                                            <li><a href="chinhsach.php">Chính sách</a></li>
                                            <li><a href="gallery.php">Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Request & Tracking</a>
                                        <ul class="sub-menu">
                                            <li><a href="required-price.php">Yêu cầu báo giá</a></li>
                                            <li><a href="request-a-quote.php">Gửi hàng ngay</a></li>
                                            <li><a href="track-your-shipment.php">Theo dõi kiện hàng</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.php">Tin tức</a></li>
                                    <li><a href="contacts.php">Liên hệ</a></li>

                                    <li><a href="login.php">Đăng nhập</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> --}}
        <!--header end -->


        <style>
            .table-striped>tbody>tr:nth-child(odd)>td,
            .table-striped>tbody>tr:nth-child(odd)>th {
                background-color: #fad792; // Choose your own color here
            }

            table.table-bordered>thead>tr>th {
                border: 1px solid #fca901;
            }

            table.table-bordered {
                border: 1px solid #fca901;
                margin-top: 20px;
            }

            table.table-bordered>thead>tr>th {
                border: 1px solid #fca901;
            }

            table.table-bordered>tbody>tr>td {
                border: 1px solid #fca901;
                padding: 10px;
                line-height: 1.7;
            }

            table.table-bordered>thead>tr>th {
                line-height: 18px;
            }

            table tr {
                border: 1px solid #fca901;
            }

            .lftredbrdr {
                border-left: 2px solid #fca901;
                padding-left: 25px;
            }

            ul.timeline {
                list-style-type: none;
                position: relative;
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

            p {
                margin-bottom: 0 !important;
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

            .underline:after {
                content: '';
                width: 100%;
                height: 2px;
                position: relative;
                bottom: 0;
                left: 50%;
                -webkit-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                transform: translateX(-50%);
                background-color: #fca901;

            }

            .nav_main_item {
                width: 33.33%;
                min-height: 56px;
                border-left: 1px solid white;
                border-right: 1px solid white;
                border-radius: 6%;
                list-style: none;
            }

            .nav_main_url {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
                font-weight: 500;
                height: 100%;
            }

            .nav_main_url i {
                margin: 0 0 5px;
                font-size: 18px;
            }

            @media (max-width: 767px) {
                .layout-main {
                    float: left;
                    width: 100%;
                    display: block !important;
                }

                .lftredbrdr {
                    border-left: 2px solid #ffffff;
                    padding-left: 0;
                }

                .col-custome {
                    padding-left: 0;
                }

                .fh-form input[type="submit"] {
                    text-transform: capitalize;
                    font-size: 15px;
                    font-weight: 400;
                    width: 100%;
                    border-radius: 17px;
                    margin-top: 5px;
                }
            }

        </style>

        <div class="ed_pagetitle">
            <div class=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>THEO DÕI LÔ HÀNG</h2>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="javascript:;" style="color:white;font-weight:500">SAIKO EXPRESS</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <section class="tracksipment secpadd layout-main">
            <div class="container">

                <div class="row quote1top">
                    <div class="col-md-8 col-sm-12">
                        <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                            <h2>Theo dõi lô hàng của bạn</h2>
                        </div>
                        <p>Nếu bạn yêu cầu khả năng hiển thị tối đa đối với các giao dịch Vận chuyển hàng hóa của mình,
                            hãy liên hệ với nhóm khách hàng hậu cần của chúng tôi hoặc bạn có thể theo dõi hàng hóa của
                            mình bằng cách sử dụng hệ thống theo dõi bên dưới.</p>
                        <div class="row paddtop30">
                            <form id="tracking_form" method='post'>
                                <div class="col-sm-9">

                                    @csrf
                                    <div class="fh-form track-form">
                                        <div>
                                            <label>Mã Tracking <span class="require">*</span></label>
                                            <p class="field">
                                                <input size="40" id="utrack" placeholder="Nhập mã Tracking vào đây"
                                                    type="text" class="form-control">
                                            </p>

                                        </div>
                                        <div class="g-recaptcha"
                                            data-sitekey="6LePYOoUAAAAAJiHO32sI4eawRX1SsuLFxaarHYg"></div>
                                    </div>


                                </div>
                                <div class="col-sm-3">
                                    <div class="fh-form track-form">
                                        <div>
                                            <label><span class="require"></span></label>
                                            <p class="field">
                                                <input value="Theo dõi ngay" class="fh-btn form-control rounded"
                                                    type="submit">
                                                {{-- <input size="40" id="utrack" placeholder="Nhập mã Tracking vào đây"
                                                type="text" class="form-control"> --}}
                                            </p>

                                        </div>
                                        <div class="g-recaptcha"
                                            data-sitekey="6LePYOoUAAAAAJiHO32sI4eawRX1SsuLFxaarHYg">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="alert alert-danger" id="statusData" style="display: none;margin-top:20px;">
                        </div>
                        <div class="row paddtop30">
                            <div class="col-sm-12 col-md-12">
                                <div class="underline table-responsive" style="display:none" id="table-firt">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ID</th>
                                                <th>Cân Nặng<span style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Thể Tích<span
                                                        style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Tên Người Gửi</th>
                                                <th style="text-align: center;">Tên Người Nhận</th>
                                                <th style="text-align: center;">SĐT</th>
                                                <th style="text-align: center;">Địa chỉ</th>
                                                <th>Đường vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table-firt">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-6 col-sm-12">
                                           
                                           <div class="table-responsive">
                                               <table class="table table-striped table-bordered" id="table" style="display:none">
                                              <thead>
                                                <tr>
                                                  <th style='width:100px'>Số Lượng</th>
                                                  <th>Tên Sản Phẩm</th>
                                                </tr>
                                              </thead>
                                              <tbody id="load_item">
                                                
                                              </tbody>
                                            </table>
                                           </div>
                                    </div>-->
                                    <div class="col-md-12 col-sm-12 col-custome">
                                        <div class="lftredbrdr">
                                            <ul class="timeline" id="time_line">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="underline table-responsive" style="display:none" id="table-firt-vnpost">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ID</th>
                                                <th>Cân Nặng<span style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Thể Tích<span
                                                        style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Tên Người Gửi</th>
                                                <th style="text-align: center;">Tên Người Nhận</th>
                                                <th style="text-align: center;">SĐT</th>
                                                <th style="text-align: center;">Địa chỉ</th>
                                                <th>Đường vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table-firt">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tracksidebar">

                            <div class="fh-contact-box type-address "><i class="flaticon-pin"></i>
                                <h4 class="box-title">Văn phòng chúng tôi</h4>
                                <div class="desc">
                                    <p>5101-1 Kaminokawa-machi Kawachi-gun, Tochigi-ken, Japan</p>
                                    <!-- <p>Kanji:</p> -->
                                    <p>1006 - COOP II Fujiwa Takadanobaba Building 4-9-11Takadanobaba Ward, Shinjuku
                                        District, Tokyo Capital ,JAPAN</p>

                                </div>
                            </div>
                            <div class="fh-contact-box type-email "><i class="flaticon-business"></i>
                                <h4 class="box-title">Email:</h4>
                                <div class="desc">
                                    <p>info@saikoexpress.com
                                        <br>support@saikoexpress.com
                                    </p>
                                </div>
                            </div>

                            <div class="fh-contact-box type-phone "><i class="flaticon-phone-call "></i>
                                <h4 class="box-title">Gọi cho chúng tôi</h4>
                                <div class="desc">
                                    <p>080.7965.3923(JP) </p>
                                    <p>090.7238.264(VN)</p>
                                </div>
                            </div>
                            <div class="fh-contact-box type-social "><i class="flaticon-share"></i>
                                <h4 class="box-title">Mạng xã hội Saiko</h4>
                                <ul class="clearfix">
                                    <li class="facebook">
                                        <a href="https://fb.com/saikoexpress" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/saikoexpress" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="googleplus">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tmn-custom-mask d-none" id="loader">
                <div class="loader"></div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                style="z-index: 9999">
                <div class="modal-dialog modal-sm  modal-confirm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box" id="color-success"><i class="fa fa-times"></i></div>

                        </div>
                        <h5 class="modal-confirm" id="message"></h5>
                        <div class="modal-footer">
                            <button class="btn btn-err btn-danger btn-block" data-dismiss="modal"
                                id="exitForm">Thoát</button>
                            <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                                id="exitSuccess" style="display:none">Thoát</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function() {
                $(document).ajaxStart(function() {
                    $("#loader").show();
                });
                $(document).ajaxStop(function() {
                    $("#loader").hide();
                });
                $('#tracking_form').submit(function(e) {
                    e.preventDefault();
                    var tracking = $("#utrack").val();
                    toggleLoading()
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

                            if (res == 404) {
                                $("#table").hide();
                                $("#body-table-firt").empty()
                                $("#time_line").empty()
                                $("#statusData").empty();
                                $(".table").hide();
                                $("#statusData").css('display', 'block');
                                $("#statusData").append('<h4>' +
                                    'Không tìm thấy mã tracking' + '</h4>')
                            } else {
                                if (res.data[0].boxes.length == 0 & res.data[0].orders
                                    .length == 0) {
                                    $(".table").hide();
                                    $("#table-firt").show();
                                    $("#body-table-firt").empty()
                                    $("#time_line").empty()
                                    $("#statusData").empty();
                                    $("#statusData").css('display', 'block');
                                    $("#statusData").append('<h4>' +
                                        'Tracking chưa đăng kí đơn hàng' + '</h4>')
                                } else {
                                    $("#statusData").css('display', 'none');
                                    $(".table").show();
                                    $("#table-firt").show();
                                    if (res.data.length == 0) {
                                        $("#statusData").empty()
                                        $("#statusData").append(
                                            '<h4>' + 'Chưa gửi hàng' + '</h4>'
                                        )
                                    } else {
                                        $("#statusData").empty()
                                        $.each(res.data, function(index, value) {
                                            var name_send = '';
                                            var tel_rev = '';
                                            var name_rev = '';
                                            var add_rev = '';
                                            var created_at = '';
                                            var method_ship = '';
                                            if (value.orders.length != 0) {
                                                var sort_order = (value.orders)
                                                    .sort(function(x, y) {
                                                        return new Date(x
                                                            .shipment_infor_id
                                                        ) - new Date(y
                                                            .shipment_infor_id
                                                        )
                                                    })
                                                if (sort_order[value.orders.length -
                                                        1].shipment_infor
                                                    .sender_name == null) {
                                                    var parse_note = JSON.parse(
                                                        sort_order[value.orders
                                                            .length - 1].note);
                                                    name_send = parse_note
                                                        .send_name;
                                                } else {
                                                    name_send = sort_order[value
                                                            .orders.length - 1]
                                                        .shipment_infor.sender_name;
                                                }
                                                tel_rev = sort_order[value.orders
                                                        .length - 1].shipment_infor
                                                    .tel;
                                                name_rev = sort_order[value.orders
                                                        .length - 1].shipment_infor
                                                    .consignee;
                                                add_rev = sort_order[value.orders
                                                        .length - 1].shipment_infor
                                                    .full_address;
                                                created_at = sort_order[value.orders
                                                    .length - 1].created_at;
                                                method_ship = sort_order[value
                                                        .orders.length - 1]
                                                    .shipment_method_id;
                                            }
                                            if (name_send == '' | tel_rev == '' |
                                                name_rev == '' | add_rev == '') {
                                                $('#message').html(
                                                    'Khách chưa đăng kí đầy đủ thông tin tracking'
                                                );
                                                $('#exitForm').hide();
                                                $('#exitSuccess').show();
                                                $('#myModal').modal('show');
                                            }
                                            if (value.boxes.length == 0) {
                                                $("#body-table-firt").empty()
                                                $("#time_line").empty()
                                                $("#time_line").append(
                                                    '<li>' +
                                                    '<a>' + 'Chưa về kho' +
                                                    '</a>' +
                                                    '<p>' + created_at +
                                                    '</p>' +
                                                    '</li>'
                                                )
                                                $("#body-table-firt")
                                                    .append(
                                                        `<tr ">` +
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
                                                $("#body-table-firt").empty()
                                                $("#time_line").empty()
                                                $.each(value.boxes, function(index,
                                                    value2) {
                                                    $("#body-table-firt")
                                                        .append(
                                                            `<tr id="sku-row-${value2.id}">` +
                                                            '<td>' + value2
                                                            .id +
                                                            '</td>' +
                                                            '<td>' + value2
                                                            .weight.toFixed(
                                                                3) +
                                                            '</td>' +
                                                            '<td>' + value2
                                                            .volume.toFixed(
                                                                3) +
                                                            '</td>' +
                                                            '<td>' +
                                                            name_send +
                                                            '</td>' +
                                                            '<td>' +
                                                            name_rev +
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
                                                    if (value.boxes
                                                        .length == 1) {
                                                        $("#time_line")
                                                            .empty()

                                                        if (value.boxes[0]
                                                            .logs.length ==
                                                            0) {
                                                            $("#time_line")
                                                                .append(
                                                                    '<li>' +
                                                                    '<a>' +
                                                                    'Đang tới kho' +
                                                                    '</a>' +
                                                                    '<p>' +
                                                                    created_at +
                                                                    '</p>' +
                                                                    '</li>'
                                                                )
                                                        } else {
                                                            $.each(value
                                                                .boxes[
                                                                    0]
                                                                .logs,
                                                                function(
                                                                    index,
                                                                    value
                                                                ) {
                                                                    let a =
                                                                        JSON
                                                                        .parse(
                                                                            value
                                                                            .content
                                                                        );
                                                                    let valueObject =
                                                                        Object
                                                                        .keys(
                                                                            a
                                                                        )
                                                                    var
                                                                        status;
                                                                    if (valueObject ==
                                                                        "id"
                                                                    ) {
                                                                        status
                                                                            =
                                                                            "Đã nhập kho Nhật"
                                                                    }
                                                                    if (valueObject ==
                                                                        "in_pallet"
                                                                    ) {
                                                                        status
                                                                            =
                                                                            "Đã kiểm hàng"
                                                                    }
                                                                    if (valueObject ==
                                                                        "set_owner_id,set_owner_type"
                                                                    ) {
                                                                        status
                                                                            =
                                                                            "Lên đơn hàng"
                                                                    }
                                                                    if (valueObject ==
                                                                        "in_container"
                                                                    ) {
                                                                        status
                                                                            =
                                                                            "Lên container"
                                                                    }
                                                                    if (valueObject ==
                                                                        "out_container"
                                                                    ) {
                                                                        status
                                                                            =
                                                                            "Xuống container"
                                                                    }
                                                                    if (valueObject ==
                                                                        "delivery_status"
                                                                    ) {
                                                                        if (a
                                                                            .delivery_status ==
                                                                            "shipping"
                                                                        ) {
                                                                            status
                                                                                =
                                                                                "Đang giao hàng"
                                                                        }
                                                                    }
                                                                    if (valueObject ==
                                                                        "delivery_status"
                                                                    ) {
                                                                        if (a
                                                                            .delivery_status ==
                                                                            "cancelled"
                                                                        ) {
                                                                            status
                                                                                =
                                                                                "Hủy box"
                                                                        }
                                                                    }
                                                                    if (valueObject ==
                                                                        "delivery_status"
                                                                    ) {
                                                                        if (a
                                                                            .delivery_status ==
                                                                            "received"
                                                                        ) {
                                                                            status
                                                                                =
                                                                                "Đã nhận hàng"
                                                                        }
                                                                    }
                                                                    if (valueObject ==
                                                                        "delivery_status"
                                                                    ) {
                                                                        if (a
                                                                            .delivery_status ==
                                                                            "refunded"
                                                                        ) {
                                                                            status
                                                                                =
                                                                                "Trả lại hàng"
                                                                        }
                                                                    }
                                                                    if (valueObject ==
                                                                        "delivery_status"
                                                                    ) {
                                                                        if (a
                                                                            .delivery_status ==
                                                                            "waiting_shipment"
                                                                        ) {
                                                                            status
                                                                                =
                                                                                "Đợi giao hàng"
                                                                        }
                                                                    }

                                                                    $("#time_line")
                                                                        .append(
                                                                            '<li>' +
                                                                            '<a>' +
                                                                            status +
                                                                            '</a>' +
                                                                            '<p>' +
                                                                            value
                                                                            .created_at +
                                                                            '</p>' +
                                                                            '</li>'
                                                                        )
                                                                })
                                                        }
                                                    } else {
                                                        $(`#sku-row-${value2.id}`)
                                                            .on('click',
                                                                function() {
                                                                    check(value2
                                                                        .logs,
                                                                        created_at
                                                                    )
                                                                })
                                                    }
                                                })
                                            }
                                        })
                                    }
                                }
                            }
                        },
                        error: function(res) {
                            console.log('Lỗi')
                        }
                    })
                })
            })
            //show log by id
            function check(row, created_at) {

                $("#time_line").empty()
                if (row.length == 0) {
                    $("#time_line").append(
                        '<li>' +
                        '<a>' + 'Đang tới kho' + '</a>' +
                        '<p>' + created_at + '</p>' +
                        '</li>'
                    )
                } else {
                    $.each(row, function(index, value) {
                        let a = JSON.parse(value.content);
                        let valueObject = Object.keys(a)
                        var status;
                        if (valueObject == "id") {
                            status = "Đã nhập kho Nhật"
                        }
                        if (valueObject == "in_pallet") {
                            status = "Đã kiểm hàng"
                        }
                        if (valueObject == "set_owner_id,set_owner_type") {
                            status = "Lên đơn hàng"
                        }
                        if (valueObject == "in_container") {
                            status = "Lên container"
                        }
                        if (valueObject == "out_container") {
                            status = "Xuống container"
                        }
                        if (valueObject == "delivery_status") {
                            if (a.delivery_status == "shipping") {
                                status = "Đang giao hàng"
                            }
                        }
                        if (valueObject == "delivery_status") {
                            if (a.delivery_status == "cancelled") {
                                status = "Hủy box"
                            }
                        }
                        if (valueObject == "delivery_status") {
                            if (a.delivery_status == "received") {
                                status = "Đã nhận hàng"
                            }
                        }
                        if (valueObject == "delivery_status") {
                            if (a.delivery_status == "refunded") {
                                status = "Trả lại hàng"
                            }
                        }
                        if (valueObject == "delivery_status") {
                            if (a.delivery_status == "waiting_shipment") {
                                status = "Đợi giao hàng"
                            }
                        }
                        $("#time_line").append(
                            '<li>' +
                            '<a>' + status + '</a>' +
                            '<p>' + value.created_at + '</p>' +
                            '</li>'
                        )
                    })
                }
            }

            function toggleLoading() {
                $('.tmn-custom-mask').toggleClass('d-none');
            }

        </script>

        <!--Footer Top section start-->
        @include('modules.footer')
    </div>

    </div>
    <script type="text/javascript" src="assets/js/saiko-bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/saiko-modernizr.js"></script>
    <script type="text/javascript" src="assets/js/saiko-owl.carousel.js"></script>
    <script type="text/javascript" src="assets/js/saiko-smooth-scroll.js"></script>
    <script type="text/javascript" src="assets/js/saiko-jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/countto/jquery.countTo.js"></script>
    <script type="text/javascript" src="assets/js/plugins/countto/jquery.appear.js"></script>
    <script type="text/javascript" src="assets/js/saiko-custom.js"></script>


    <div class="fb-customerchat" page_id="346391759462555" theme_color="#fa3c4c"
        logged_in_greeting="Xin chào ! Hãy để Saiko giúp bạn!"
        logged_out_greeting="Chào bạn! Hãy đăng nhập facebook để kết nối với Saiko">
    </div>

    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v3.3'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
    @include('modules.nav-mobile')
</body>

</html>

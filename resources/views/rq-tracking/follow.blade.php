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
            border-top: 16px solid #fca901;
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
        /* set background color */
        .tr-color:hover td{
            background-color:#fca901 !important;
            cursor: pointer;
        }
       
    </style>

<body>
    <!--Page main section start-->
    <div id="pro_wrapper">
        <!--Header start-->
        @include('modules.header')
    
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
                                                    type="text" onclick="clearAll()" class="form-control">
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
                                                <th style="text-align: center;">Box_ID</th>
                                                <th>Cân Nặng<span style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Ký Thể Tích<span
                                                        style="display: block">(kg)</span></th>
                                                <th style="text-align: center;">Tên Người Gửi</th>
                                                <th style="text-align: center;">Tên Người Nhận</th>
                                                <th style="text-align: center;">SĐT</th>
                                                <th style="text-align: center;">Địa chỉ</th>
                                                <th style="text-align: center;">Đường vận chuyển</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table-firt">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="table_price_shipping" style="display:none">
                                                <thead>
                                                    <tr>
                                                    <th style="text-align: center">Box_ID</th>    
                                                    <th style='width:100px;text-align:center'>Khối lượng tính phí</th>
                                                    <th>Đơn giá</th>
                                                    <th>Đường vận chuyển</th>
                                                    <th>Phí vận chuyển (Nhật - Việt)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body_price_shipping">
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row d-none"  id="alert" style="margin:4px"  >
                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <p class="text-danger" >Xin quý khách vui lòng thanh toán đến STK : <b>19035902493017</b>. Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank <img src="images/TCB_icon.png" alt="" width="100px"></p>
                                        <p class="text-danger" >Nội dung thanh toán : <span class="text-danger" id="id_order"></span><p>
                                        <p class="text-danger">Số tiền thanh toán: <span id="money"></span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-custome">
                                        <div class="lftredbrdr">
                                            <ul class="timeline" id="time_line">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="table_item" style="display:none">
                                                <thead>
                                                    <tr>
                                                    <th style="text-align: center">STT</th>    
                                                    <th style='width:100px;text-align:center'>Số Lượng</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_item">
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="underline table-responsive" style="display:none" id="table-firt-vnpost">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Mã Dịch Vụ</th>
                                                <th style="text-align: center;">Phương thức vận chuyển</th>
                                                <th style="text-align: center;">Cước COD</th>
                                                <th style="text-align: center;">Tổng Cước Sau VAT</th>
                                                <th style="text-align: center;">Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table-firt-vnpost">

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
                    $("#alert").hide()
                    $("#table_price_shipping").hide()
                    $("#table_body_price_shipping").empty()
                    $("#body-table-firt").empty()
                    $("#time_line").empty()
                    $("#table-firt").hide()
                    $("#body-table-firt-vnpost").empty()
                    $("#table-firt-vnpost").hide()
                    $("#statusData").empty()
                    $("#statusData").hide()
                    $("#table_item").hide()
                    $("load_item").empty()
                    var tracking = $("#utrack").val();
                    if(tracking.length<=5){
                        alert('Tracking chưa đúng')
                        return 
                    }
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
                            $("#body-table-firt-vnpost").empty()
                            $("#table-firt-vnpost").hide()
                            $("#alert").hide()
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
                                if (res.data[0].boxes.length == 0 & res.data[0].orders.length == 0) {
                                    $(".table").hide();
                                    // $("#table-firt").show();
                                    $("#body-table-firt").empty()
                                    $("#time_line").empty()
                                    $("#statusData").empty();
                                    $("#statusData").css('display', 'block');
                                    $("#statusData").append('<h4>' +
                                        'Tracking chưa đăng kí đơn hàng' + '</h4>')
                                } else {
                                    $("#statusData").css('display', 'none');
                                    $(".table").show();
                                    $("#table_item").hide()
                                    $("#table_price_shipping").hide()
                                    $("#table-firt").show();
                                    $("#alert").hide()
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
                                                var sort_order = (value.orders).sort(function(x, y) {
                                                        return new Date(x.shipment_infor_id) - new Date(y.shipment_infor_id)
                                                    })
                                                if (sort_order[value.orders.length - 1].shipment_infor.sender_name == null) {
                                                    var parse_note = JSON.parse(sort_order[value.orders.length - 1].note);
                                                    name_send = parse_note.send_name;
                                                } else {
                                                    name_send = sort_order[value.orders.length - 1].shipment_infor.sender_name;
                                                }
                                                tel_rev = sort_order[value.orders.length - 1].shipment_infor.tel;
                                                name_rev = sort_order[value.orders.length - 1].shipment_infor.consignee;
                                                add_rev = sort_order[value.orders.length - 1].shipment_infor.full_address;
                                                created_at = sort_order[value.orders.length - 1].created_at;
                                                method_ship = sort_order[value.orders.length - 1].shipment_method_id;
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
                                                $("#body-table-firt-vnpost").empty()
                                                $("#table-firt-vnpost").hide()
                                                $("#body-table-firt").empty()
                                                $("#load_item").empty()
                                                $("#time_line").empty()
                                                $("#time_line").append(
                                                    '<li>' +
                                                    '<a>' + 'Chưa về kho' +
                                                    '</a>' +
                                                    '<p>' + created_at +
                                                    '</p>' +
                                                    '</li>'
                                                )
                                                //log order//
                                                if(value.logs.length){
                                                    $.each(value.logs,function(logs_index,logs_value){
                                                        let keyObjectLogMerge = Object.keys(logs_value.content)
                                                        // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                        var statusLogMerge;
                                                        if(keyObjectLogMerge=="transaction_id,amount,paid"){
                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.amount)
                                                            $("#time_line").append(
                                                                '<li>' +
                                                                '<a>' + statusLogMerge + '</a>' +
                                                                '<p>' + logs_value.created_at + '</p>' +
                                                                '</li>'
                                                            )
                                                        }
                                                    })  
                                                }
                                                $("#body-table-firt")
                                                    .append(
                                                        `<tr>` +
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
                                                $.each(value.boxes, function(index,value2) {
                                                    $("#body-table-firt").append(
                                                            `<tr id="sku-row-${value2.id}">` +
                                                            '<td>' + value2.id +
                                                            '</td>' +
                                                            '<td>' + value2.weight_per_box.toFixed(3) +
                                                            '</td>' +
                                                            '<td>' + value2.volumne_weight_box.toFixed(3)+
                                                            '</td>' +
                                                            '<td>' +name_send +
                                                            '</td>' +
                                                            '<td>' +name_rev +
                                                            '</td>' +
                                                            '<td>' +tel_rev +
                                                            '</td>' +
                                                            '<td>' + add_rev +
                                                            '</td>' +
                                                            '<td>' +method_ship +
                                                            '</td>' +
                                                            '</tr>'
                                                        )
                                                    if (value.boxes.length == 1) {
                                                        // $("#table_item").show()
                                                        // $("#load_item").empty()
                                                        // if(value.orders.length!=0){
                                                        
                                                        if(value.orders.length!=0){
                                                            $("#alert").show()
                                                            $("#id_order").empty()
                                                            $("#money").empty()
                                                            $("#id_order").text(value.id)
                                                            $("#money").text(sort_order[value.orders.length - 1].pay_money+ " VNĐ")
                                                        }
                                                        //fee_shipping
                                                        if(value2.use_weight  !=undefined){
                                                            $("#table_price_shipping").show()
                                                            $("#table_body_price_shipping").empty()
                                                            $("#table_body_price_shipping").append(
                                                                '<tr>'+
                                                                    '<td>'+value2.id+'</td>'+
                                                                    '<td>'+value2.use_weight.toFixed(3)+'</td>'+
                                                                    '<td>'+value2.fee_ship+'</td>'+
                                                                    '<td>'+method_ship+'</td>'+
                                                                    '<td>'+value2.total_money+' VNĐ</td>'+
                                                                +'</tr>'
                                                            )
                                                        }
                                                        
                                                        // }
                                                        // if(value.boxes[0].items !=null){
                                                        //     $.each(value.boxes[0].items,function(index_item,value_item){
                                                        //         $("#load_item").append(
                                                        //             "<tr>"+
                                                        //             "<td style='text-align: center'>"+ ++index_item+"</td>"+    
                                                        //             "<td style='text-align: center'>"+value_item.Quantity+"</td>"+
                                                        //             "<td>"+value_item.Name+"</td>"+
                                                        //             "</tr>"
                                                        //         )
                                                        //     })
                                                            
                                                        // }else{
                                                        //     $("#load_item").empty()
                                                        //     $("#load_item").append(
                                                        //             "<tr>"+
                                                        //             "<td>"+"</td>"+    
                                                        //             "<td>"+"Chưa kiểm hàng"+"</td>"+
                                                        //             "<td>"+"Chưa kiểm hàng"+"</td>"+
                                                        //             "</tr>"
                                                        //         )
                                                        // }
                                                        $("#time_line").empty()
                                                        if (value.boxes[0].logs.length ==0) {
                                                            $("#time_line").append(
                                                                '<li>' +
                                                                '<a>' +'Đang tới kho' +
                                                                '</a>' +
                                                                '<p>' +created_at +
                                                                '</p>' +
                                                                '</li>'
                                                            )
                                                            if(value.logs.length){
                                                                $.each(value.logs,function(logs_index,logs_value){
                                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                                    // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                                    var statusLogMerge;
                                                                    if(keyObjectLogMerge=="transaction_id,amount,paid"){
                                                                        statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.amount)
                                                                        $("#time_line").append(
                                                                            '<li>' +
                                                                            '<a>' + statusLogMerge + '</a>' +
                                                                            '<p>' + logs_value.created_at + '</p>' +
                                                                            '</li>'
                                                                        )
                                                                    }
                                                                })  
                                                            }
                                                            
                                                        } else {
                                                            var size = "( Dài : "+value.boxes[0].length+"cm"+",Rộng: "+value.boxes[0].width+"cm"+",Cao: "+value.boxes[0].height+"cm )"
                                                            $("#id_order").empty()
                                                            $("#money").empty()
                                                            if(value.orders.length!=0){
                                                                $("#id_order").text(value.id)
                                                                $("#money").text(sort_order[value.orders.length - 1].pay_money+ " VNĐ")
                                                            }
                                                            $.each(value.boxes[0].logs,function(index,value) {
                                                                // let a =JSON.parse(value.content );
                                                                let keyObject =Object.keys(value.content)
                                                                let valueObject = Object.values(value.content);
                                                                var status;
                                                                if (keyObject =="id") {
                                                                    status="Đã nhập kho Nhật"
                                                                }
                                                                if (keyObject =="in_pallet") {
                                                                    status ="Đã kiểm hàng " + size
                                                                        
                                                                }
                                                                if (keyObject == "set_user_id,set_order_id") {
                                                                    status = "Lên đơn hàng"
                                                                }
                                                                if (keyObject == "set_user_id") {
                                                                    status = "Lên đơn hàng"
                                                                }
                                                                if (keyObject =="set_owner_id,set_owner_type") {
                                                                    status="Lên đơn hàng"
                                                                }
                                                                if (keyObject =="in_container") {
                                                                    var parts = value.created_at.split('-')
                                                                    var year = parts[2].split(' ')
                                                                    var getDate = new Date(year[0],parts[1]-1,parts[0])
                                                                    var now = new Date()
                                                                    var date_arv = getDate-now;
                                                                    var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+6
                                                                    if(expected_date >= 0) {
                                                                        status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                                                    }else{
                                                                        status = "Xuất kho Nhật"
                                                                    }
                                                                   
                                                                }
                                                                if (keyObject =="out_container") {
                                                                    status= "Nhập kho Việt Nam"
                                                                }
                                                                if (keyObject =="outbound_warehouse") {
                                                                    status= "Xuất kho Việt Nam"
                                                                }
                                                                if (keyObject =="delivery_status" ) {
                                                                    if (valueObject == "shipping") {
                                                                        status="Đang giao hàng"
                                                                    }
                                                                }
                                                                if (keyObject =="delivery_status") {
                                                                    if (valueObject =="cancelled"
                                                                    ) {
                                                                        status ="Hủy box"
                                                                    }
                                                                }
                                                                if (keyObject =="delivery_status") {
                                                                    if (valueObject =="received") {
                                                                        status= "Đã nhận hàng"
                                                                    }
                                                                }
                                                                if (keyObject =="delivery_status") {
                                                                    if (valueObject =="refunded") {
                                                                        status="Trả lại hàng"
                                                                    }
                                                                }
                                                                if (keyObject =="delivery_status" ) {
                                                                    if (valueObject =="waiting_shipment") {
                                                                        status="Đợi giao hàng"
                                                                    }
                                                                }

                                                                $("#time_line").append(
                                                                    '<li>' +
                                                                    '<a>' +status +
                                                                    '</a>' +'<p>' +value.created_at +
                                                                    '</p>' +
                                                                    '</li>'
                                                                )
                                                            })
                                                            if(value.logs.length){
                                                                $.each(value.logs,function(logs_index,logs_value){
                                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                                    // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                                    var statusLogMerge;
                                                                    if(keyObjectLogMerge=="transaction_id,amount,paid"){
                                                                        statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.amount)
                                                                        $("#time_line").append(
                                                                            '<li>' +
                                                                            '<a>' + statusLogMerge + '</a>' +
                                                                            '<p>' + logs_value.created_at + '</p>' +
                                                                            '</li>'
                                                                        )
                                                                    }
                                                                })  
                                                            }
                                                        }
                                                        // if(value.boxes[0]['vnpost']!=undefined){
                                                        //     $("#body-table-firt-vnpost").empty()
                                                        //     $("#body-table-firt-vnpost").append(
                                                        //         '<tr>' +
                                                        //         '<td>' + value.boxes[0]['vnpost'].MaDichVu +
                                                        //         '</td>' +
                                                        //         '<td>' + value.boxes[0]['vnpost'].PhuongThucVC +
                                                        //         '</td>' +
                                                        //         '<td>' + value.boxes[0]['vnpost'].CuocCOD +
                                                        //         '</td>' +
                                                        //         '<td>' +value.boxes[0]['vnpost'].TongCuocSauVAT +
                                                        //         '</td>' +
                                                        //         '<td>' +value.boxes[0]['vnpost'].SoTienCodThuNoiNguoiNhan +
                                                        //         '</tr>'
                                                        //     )
                                                        //     $("#table-firt-vnpost").show()
                                                        // }
                                                        
                                                    } else {
                                                        $("#alert").show()
                                                        $("#id_order").empty()
                                                        $("#money").empty()
                                                        if(value.orders.length!=0){
                                                            $("#id_order").text(value.id)
                                                            $("#money").text(sort_order[value.orders.length - 1].pay_money+ " VNĐ")
                                                        }
                                                        $(`#sku-row-${value2.id}`).hover(function(){
                                                            $(this).addClass("tr-color addHover");
                                                        },function(){
                                                            $(this).removeClass("tr-color addHover");
                                                        });
                                                        $(`#sku-row-${value2.id}`).on('click',function() {
                                                                var vnpost=0;
                                                                var size='';
                                                                if(value2.vnpost!=undefined){
                                                                    vnpost = value2.vnpost;
                                                                }else{
                                                                    vnpost = 0;
                                                                }
                                                                    size = "Dài : "+value2.length+"cm"+",Rộng: "+value2.width+"cm"+",Cao: "+value2.height+"cm"
                                                                    check(value2.id,vnpost,created_at,value2.use_weight,value2.fee_ship,method_ship,value2.total_money,value.logs)
                                                                    // value2.logs,created_at,vnpost,value2.items,size,
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
                            console.log(res)
                        }
                    })
                })
            })
            //show log by id
            // row, created_at,vnpost,list_item,size,
            function check(id_box,vnpost,created_at,weight,fee,method,money,logs_merge) {
                var id_box = id_box;
                //fee_shipping
                if(weight !=undefined){
                    $("#table_price_shipping").show()
                    $("#table_body_price_shipping").empty();
                    $("#table_body_price_shipping").append(
                        '<tr>'+
                            '<td>'+id_box+'</td>'+
                            '<td>'+weight.toFixed(3)+'</td>'+
                            '<td>'+fee+'</td>'+
                            '<td>'+method+'</td>'+
                            '<td>'+money+' VNĐ</td>'+
                        +'</tr>'
                    )
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:"POST",
                    url:"{{route('rq_tk.getInforBox')}}",
                    data:{
                        id_box:id_box
                    },success:function(res){
                        // $("#table_item").show()
                        // $("#load_item").empty()
                        // if(res.items!=null){
                        //     $.each(res.items,function(index_item,value_item){
                        //         $("#load_item").append(
                        //             "<tr>"+
                        //             "<td style='text-align: center'>"+ ++index_item+"</td>"+
                        //             "<td style='text-align: center'>"+value_item.Quantity+"</td>"+
                        //             "<td>"+value_item.Name+"</td>"+
                        //             "</tr>"
                        //         )
                        //     })
                        // }else{
                        //     $("#load_item").append(
                        //             "<tr>"+
                        //             "<td>"+"</td>"+    
                        //             "<td>"+"Chưa kiểm hàng"+"</td>"+
                        //             "<td>"+"Chưa kiểm hàng"+"</td>"+
                        //             "</tr>"
                        //         )
                        // }
                        //log box
                        $("#time_line").empty()
                        if (res.logs.length == 0) {
                            $("#time_line").append(
                                '<li>' +
                                '<a>' + 'Đang tới kho' + '</a>' +
                                '<p>' + created_at + '</p>' +
                                '</li>'
                            )
                        } else {
                            var size = " Dài : "+res.length+"cm"+",Rộng: "+res.width+"cm"+",Cao: "+res.height+"cm "
                            $.each(res.logs, function(index, value) {
                                
                                // let a = JSON.parse(value.content);
                                let keyObject = Object.keys(value.content)
                                let valueObject = Object.values(value.content);
                                var status;
                                
                                if (keyObject == "id") {
                                    status = "Đã nhập kho Nhật"
                                }
                                if (keyObject == "in_pallet") {
                                    status = "Đã kiểm hàng " + "( "+size+" )"
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
                                if (keyObject == "in_container") {
                                    var parts = value.created_at.split('-')
                                    var year = parts[2].split(' ')
                                    var getDate = new Date(year[0],parts[1]-1,parts[0])
                                    var now = new Date()
                                    var date_arv = getDate-now;
                                    var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+6
                                    if(expected_date >= 0) {
                                        status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                    }else{
                                        status = "Xuất kho Nhật"
                                    }
                                }
                                if (keyObject == "out_container") {
                                    status = "Nhập kho Việt Nam"
                                }
                                if (keyObject =="outbound_warehouse") {
                                    status= "Xuất kho Việt Nam"
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
                                $("#time_line").append(
                                    '<li>' +
                                    '<a>' + status + '</a>' +
                                    '<p>' + value.created_at + '</p>' +
                                    '</li>'
                                )
                            })
                        }
                        //adđ log payment
                        if(logs_merge.length){
                            $.each(logs_merge,function(logs_index,logs_value){
                                let keyObjectLogMerge = Object.keys(logs_value.content)
                                // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                var statusLogMerge;
                                var created_at_log;
                                if(keyObjectLogMerge=="transaction_id,amount,paid"){
                                    statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.amount)
                                    $("#time_line").append(
                                        '<li>' +
                                        '<a>' + statusLogMerge + '</a>' +
                                        '<p>' + logs_value.created_at + '</p>' +
                                        '</li>'
                                    )
                                }
                            })  
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

                    },error:function(res){
                        console.log(res)
                    }
                })
                
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
                
            }

            function toggleLoading() {
                $('.tmn-custom-mask').toggleClass('d-none');
            }
            function formatNumber(num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
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
        function clearAll(){
            
        }
    </script>
    @include('modules.nav-mobile')
</body>

</html>

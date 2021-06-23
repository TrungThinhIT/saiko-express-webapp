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

        .ed_pagetitle{
            background-image: url(../assets/images/trip.png) !important
        }
        /* .ed_footer_wrapper {
            height: 50vh !important;
        } */
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
        .tracksipment{
            margin-bottom:200px;
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
    <div id="pro_wrapper" >
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
                            <h2>THEO DÕI KIỆN HÀNG CỦA BẠN </h2>
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

        <section class="tracksipment secpadd layout-main" >
            <div class="container">

                <div class="row quote1top">
                    <div class="col-md-12 col-sm-12">
                        <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                            <h2>Theo dõi kiện hàng của bạn</h2>
                        </div>
                        <p>Để theo dõi lộ trình kiện hàng của bạn, vui lòng nhập mã tracking dưới đây:</p>
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
                                                <th style="text-align:center">Số lượng</th>
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
                                                    <th style="text-align: center">Mã Tracking</th>
                                                    <th style='width:100px;text-align:center'>Tổng khối lượng tính phí</th>
                                                    <th>Đơn giá</th>
                                                    <th>Đường vận chuyển</th>
                                                    <th>Phí vận chuyển (Nhật - Kho Việt)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body_price_shipping">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none" id="declaration_price" style="margin:4px">
                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <div class="col-md-6 " style="padding-left: unset">
                                            <p class="" ><label for="" >Giá trị gói bảo hiểm</label>: <span id="insurance_result"></span> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="" ><label for="" >Phí bảo hiểm (3%)</label>: <span id="insurance_result_fee"></span> </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <div class="col-md-6" style="padding-left: unset">
                                            <p class="" ><label for="" id="special">Giá trị hàng hoá đặc biệt</label>: <span id="special_result"></span> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="" ><label for="" id="special">Phí hàng hoá đặc biệt (2%)</label>: <span id="special_result_fee"></span> </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <div class="col-md-6" style="padding-left: unset">
                                            <p class="" ><label for="" id="shipping_inside_jp">Phí vận chuyển nội địa Nhật(Yên)</label>: <span id="fee_shipping_inside_jp"></span> </p>
                                        </div>
                                        <div class="col-md-6" >
                                            <p class="" ><label for="" id="shipping_inside_vn">Phí vận chuyển nội địa Nhật(VNĐ)</label>: <span id="fee_shipping_inside_vn"></span> </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="row d-none"  id="alert" style="margin:4px" >

                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <h2 class="text-center text-danger font-weight-bold"> <b> PHIẾU YÊU CẦU THANH TOÁN </b></h2>
                                        <p class="text-danger" >Xin quý khách vui lòng thanh toán đến STK : <b>19035902493017</b>. Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank <img src="images/TCB_icon.png" alt="" width="100px"></p>
                                        <p class="text-danger font-weight-bold" style="font-weight: bold"> Nội dung thanh toán : <span class="text-danger" style="font-size: 25px" id="id_order"></span><p>
                                        <p class="text-danger text-uppercase font-weight-bold" style="font-weight: bold">Số tiền thanh toán: <span id="money" style="font-size: 25px"></span> <span style="font-weight: normal !important;">( Đã bao gồm phí bảo hiểm, hàng hoá đặc biệt)</span></p>
                                    </div>
                                </div>
                                <div class="row d-none"  id="paid" style="margin:4px" >
                                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                        <h2 class="text-center text-danger font-weight-bold"> <b> Đã Thanh Toán </b></h2>
                                        <h2 class="text-center text-danger">Cảm Ơn Quý Khách</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-custome">
                                        <div class="lftredbrdr">
                                            <ul class="timeline" id="time_line">

                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-6">
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
                                    </div> --}}


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
            function isValidJSONString(str) {
                try {
                    JSON.parse(str);
                } catch (e) {
                    return false;
                }
                return true;
            }
            $(document).ready(function() {
                $(document).ajaxStart(function() {
                    $("#loader").show();
                });
                $(document).ajaxStop(function() {
                    $("#loader").hide();
                });
                $('#tracking_form').submit(function(e) {
                    e.preventDefault();
                    $("#declaration_price").hide()
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
                    $("#paid").hide()
                    $("#fee_shipping_inside_jp").text(0)
                    $("#fee_shipping_inside_vn").text(0)
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
                                            var pay_money = 0;
                                            var insurance_result;
                                            var special_result;
                                            var insurance_result_fee = 0;
                                            var special_result_fee = 0;
                                            if (value.orders.length != 0) {
                                                var sort_order = (value.orders).sort(function(x, y) {
                                                        return new Date(x.shipment_info_id) - new Date(y.shipment_info_id)
                                                    })
                                                if (!sort_order[value.orders.length - 1].shipment_info.sender_name) {
                                                    if(isValidJSONString(sort_order[value.orders.length - 1].note)){
                                                        var parse_note = JSON.parse(sort_order[value.orders.length - 1].note);
                                                        if(parse_note){
                                                            if(typeof parse_note == "object"){
                                                                if(parse_note.send_name == undefined){
                                                                    name_send=""
                                                                }
                                                                else{
                                                                    name_send = parse_note.send_name;
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        name_send=""
                                                    }
                                                } else {
                                                    name_send = sort_order[value.orders.length - 1].shipment_info.sender_name;
                                                }
                                                tel_rev = sort_order[value.orders.length - 1].shipment_info.tel;
                                                name_rev = sort_order[value.orders.length - 1].shipment_info.consignee;
                                                add_rev = sort_order[value.orders.length - 1].shipment_info.full_address;
                                                created_at = sort_order[value.orders.length - 1].created_at;
                                                method_ship = sort_order[value.orders.length - 1].shipment_method_id;
                                                if(sort_order[value.orders.length - 1].pay_money != undefined){
                                                    pay_money = sort_order[value.orders.length - 1].total_fee;
                                                }
                                                insurance_result = sort_order[value.orders.length - 1].insurance_declaration//tiền bảo hiểm
                                                special_result = sort_order[value.orders.length - 1].special_declaration//tiền hàng đặc biệt
                                                $("#declaration_price").show()
                                                $("#insurance_result").text(formatNumber(insurance_result))
                                                $("#special_result").text(formatNumber(special_result))
                                                $("#insurance_result_fee").text(formatNumber(sort_order[value.orders.length - 1].insurance_result_fee))
                                                $("#special_result_fee").text(formatNumber(sort_order[value.orders.length - 1].special_result_fee))

                                                if(value.sfa !=null){
                                                    $("#fee_shipping_inside_jp").text(formatNumber(value.sfa.shipping_inside))
                                                    $("#fee_shipping_inside_vn").text(formatNumber(value.sfa.shipping_inside*215))
                                                }
                                                // BẢNG GIÁ
                                                if (value.boxes.length ){
                                                    $("#table_price_shipping").show()
                                                    $("#table_body_price_shipping").empty()
                                                    $("#table_body_price_shipping").append(
                                                        '<tr>'+
                                                            '<td>'+sort_order[value.orders.length - 1].pivot.tracking_id+'</td>'+
                                                            '<td>'+sort_order[value.orders.length - 1].total_weight.toFixed(3)+'</td>'+
                                                            '<td>'+sort_order[value.orders.length - 1].fee_ship+'</td>'+
                                                            '<td>'+method_ship+'</td>'+
                                                            '<td>'+formatNumber(sort_order[value.orders.length - 1].total_fee)+' VNĐ</td>'+
                                                        +'</tr>'
                                                    )
                                                }
                                            }

                                            if (tel_rev == '' |name_rev == '' | add_rev == '') {
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
                                                    var total_pay = 0;
                                                    var matchedLogIdx = value.logs.findIndex((log) => {return !!log?.content?.transaction});
                                                    $.each(value.logs,function(logs_index,logs_value){
                                                        let keyObjectLogMerge = Object.keys(logs_value.content)
                                                        var statusLogMerge;
                                                        if(matchedLogIdx === -1){
                                                            if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                                total_pay += logs_value.content.service_fee_paid
                                                                statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.service_fee_paid)
                                                            }
                                                        }else{
                                                            if(keyObjectLogMerge=="transaction"){
                                                                statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                                            }
                                                        }

                                                        if(statusLogMerge != undefined){
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
                                                        '<td>'+
                                                        '</td>'+
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
                                                            '<td>' + value2.weight.toFixed(3) +
                                                            '</td>' +
                                                            '<td>' + value2.volume_weight_box.toFixed(3)+
                                                            '</td>' +
                                                            '<td class="text-center">'+value2.duplicate+
                                                            '</td>'+
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
                                                        if(value.orders.length!=0){
                                                            $("#alert").show()
                                                            $("#id_order").empty()
                                                            $("#money").empty()
                                                            $("#id_order").text(value.id)
                                                            $("#money").text(formatNumber(sort_order[value.orders.length - 1].total_fee)+ " VNĐ")
                                                        }

                                                        $("#time_line").empty()
                                                        if (value.boxes[0].logs.length == 0) {
                                                            $("#time_line").append(
                                                                '<li>' +
                                                                '<a>' +'Đang tới kho' +
                                                                '</a>' +
                                                                '<p>' +created_at +
                                                                '</p>' +
                                                                '</li>'
                                                            )
                                                            if(value.logs.length){
                                                                var total_pay = 0;
                                                                var matchedLogIdx = value.logs.findIndex((log) => {
                                                                        return !!log?.content?.transaction
                                                                    });
                                                                $.each(value.logs,function(logs_index,logs_value){
                                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                                    var statusLogMerge;
                                                                    if(matchedLogIdx === -1){
                                                                        if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                                            total_pay += logs_value.content.service_fee_paid
                                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.service_fee_paid)
                                                                        }
                                                                    }else{
                                                                        if(keyObjectLogMerge=="transaction"){
                                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                                                            total_pay += logs_value.content.transaction.amount
                                                                        }
                                                                    }

                                                                    if(statusLogMerge!=undefined){
                                                                        $("#time_line").append(
                                                                            '<li>' +
                                                                            '<a>' + statusLogMerge + '</a>' +
                                                                            '<p>' + logs_value.created_at + '</p>' +
                                                                            '</li>'
                                                                        )
                                                                    }
                                                                })
                                                                if(pay_money != undefined){
                                                                    if( total_pay >= pay_money - 1000){
                                                                        $("#alert").hide()
                                                                        if(value.orders.length){
                                                                            $("#paid").show()
                                                                        }else{
                                                                            $("#paid").hide()
                                                                        }
                                                                    }

                                                                }
                                                            }
                                                        } else {
                                                            var size = "( Dài : "+value.boxes[0].length+"cm"+",Rộng: "+value.boxes[0].width+"cm"+",Cao: "+value.boxes[0].height+"cm )"
                                                            $("#id_order").empty()
                                                            $("#money").empty()
                                                            if(value.orders.length!=0){
                                                                $("#id_order").text(value.id)
                                                                $("#money").text(formatNumber(sort_order[value.orders.length - 1].total_fee)+ " VNĐ")
                                                            }
                                                            $.each(value.boxes[0].logs,function(index,value) {
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
                                                                if (keyObject =="in_container" || keyObject == "in_container,from,to") {
                                                                    var parts = value.created_at.split('-')
                                                                    var year = parts[2].split(' ')
                                                                    var getDate = new Date(year[0],parts[1]-1,parts[0])
                                                                    var now = new Date()
                                                                    var date_arv = getDate-now;
                                                                    var add_date;
                                                                    var check_method = method_ship.charAt(0).toUpperCase() + method_ship.slice(1);
                                                                    if(check_method=="Air"){
                                                                        add_date = 6;
                                                                    }else{
                                                                        add_date = 30;
                                                                    }
                                                                    var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                                                    if(expected_date > 0) {
                                                                        status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                                                    }else{
                                                                        status = "Xuất kho Nhật"
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
                                                                if (keyObject =="out_container" || keyObject =="out_container,from,to") {
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
                                                                if(status != undefined){
                                                                    $("#time_line").append(
                                                                        '<li>' +
                                                                        '<a>' +status +
                                                                        '</a>' +'<p>' +value.created_at +
                                                                        '</p>' +
                                                                        '</li>'
                                                                    )
                                                                }
                                                            })
                                                            if(value.logs.length){
                                                                var total_pay = 0;
                                                                var matchedLogIdx = value.logs.findIndex((log) => {
                                                                        return !!log?.content?.transaction
                                                                    });
                                                                $.each(value.logs,function(logs_index,logs_value){
                                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                                    var statusLogMerge;
                                                                    if(matchedLogIdx === -1){
                                                                        if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                                            total_pay += logs_value.content.service_fee_paid
                                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.service_fee_paid)
                                                                        }
                                                                    }else{
                                                                        if(keyObjectLogMerge=="transaction"){
                                                                            total_pay += logs_value.content.transaction.amount
                                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                                                        }
                                                                    }

                                                                    if(statusLogMerge != undefined){
                                                                        $("#time_line").append(
                                                                            '<li>' +
                                                                            '<a>' + statusLogMerge + '</a>' +
                                                                            '<p>' + logs_value.created_at + '</p>' +
                                                                            '</li>'
                                                                        )
                                                                    }
                                                                })
                                                                if(pay_money != undefined){
                                                                    if(total_pay  >= pay_money - 1000 ){
                                                                        $("#alert").hide()
                                                                        if(value.orders.length){
                                                                            $("#paid").show()
                                                                        }else{
                                                                            $("#paid").hide()
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }

                                                    } else {
                                                        if(value.orders.length!=0){
                                                            $("#alert").show()
                                                            $("#id_order").empty()
                                                            $("#money").empty()
                                                            $("#id_order").text(value.id)
                                                            $("#money").text(formatNumber(sort_order[value.orders.length - 1].total_fee)+ " VNĐ")
                                                            if(value.logs.length){
                                                                var total_pay = 0
                                                                var matchedLogIdx = value.logs.findIndex((log) => {
                                                                        return !!log?.content?.transaction
                                                                    });
                                                                $.each(value.logs,function(logs_index,logs_value){
                                                                    let keyObjectLogMerge = Object.keys(logs_value.content)
                                                                    var statusLogMerge;
                                                                    var created_at_log;
                                                                    if(matchedLogIdx === -1){
                                                                        if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                                            total_pay += logs_value.content.service_fee_paid
                                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.service_fee_paid)
                                                                        }
                                                                    }else{
                                                                        if(keyObjectLogMerge=="transaction"){
                                                                            total_pay += logs_value.content.transaction.amount
                                                                        }
                                                                    }

                                                                })
                                                                if(pay_money != undefined){
                                                                    if(total_pay >= pay_money - 1000){
                                                                        $("#alert").hide()
                                                                        if(value.orders.length){
                                                                            $("#paid").show()
                                                                        }else{
                                                                            $("#paid").hide()
                                                                        }
                                                                    }
                                                                }
                                                            }
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
                                                            check(value2.id,vnpost,created_at,value2.use_weight,value2.fee_ship,method_ship,value2.total_money,value.logs,pay_money,value)
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
            function check(id_box,vnpost,created_at,weight,fee,method,money,logs_merge,pay_money,length_order) {
                var id_box = id_box;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:"POST",
                    url:"{{route('rq_tk.getInforBox')}}",
                    data:{
                        id_box:id_box
                    },success:function(res){
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
                                if (keyObject == "in_container"|| keyObject == "in_container,from,to") {
                                    var parts = value.created_at.split('-')
                                    var year = parts[2].split(' ')
                                    var getDate = new Date(year[0],parts[1]-1,parts[0])
                                    var now = new Date()
                                    var date_arv = getDate-now;
                                    var add_date;
                                    var check_method = method.charAt(0).toUpperCase() + method.slice(1);
                                    if(check_method =="Air"){
                                        add_date=6;
                                    }else{
                                        add_date = 30;
                                    }
                                    var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+add_date
                                    if(expected_date > 0) {
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
                                if (keyObject == "shipping_code" && value.type_id == "created") {
                                    status = "Mã giao hàng: " + value.content.shipping_code
                                }
                                if (keyObject == "shipping_code" && value.type_id == "updated") {
                                    status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                                }
                                if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                    status = "Huỷ mã giao hàng: " + value.content.shipping_code
                                }
                                if(status != undefined){
                                    $("#time_line").append(
                                        '<li>' +
                                        '<a>' + status + '</a>' +
                                        '<p>' + value.created_at + '</p>' +
                                        '</li>'
                                    )
                                }
                            })
                        }
                        //adđ log payment
                        if(logs_merge.length){
                            var total_pay = 0;
                            var matchedLogIdx = logs_merge.findIndex((log) => {
                                return !!log?.content?.transaction
                            });
                            $.each(logs_merge,function(logs_index,logs_value){
                                let keyObjectLogMerge = Object.keys(logs_value.content)
                                var statusLogMerge;
                                var created_at_log;
                                if(matchedLogIdx === -1){
                                    if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                        total_pay += logs_value.content.service_fee_paid
                                        statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.service_fee_paid)
                                    }
                                }else{
                                    if(keyObjectLogMerge=="transaction"){
                                        total_pay += logs_value.content.transaction.amount
                                        statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                    }
                                }

                                if(statusLogMerge != undefined){
                                    $("#time_line").append(
                                        '<li>' +
                                        '<a>' + statusLogMerge + '</a>' +
                                        '<p>' + logs_value.created_at + '</p>' +
                                        '</li>'
                                    )
                                }
                            })
                            if(pay_money != undefined){
                                if(total_pay >= pay_money - 1000 ){
                                    $("#alert").hide()
                                    if(length_order.orders.length){
                                        $("#paid").show()
                                    }else{
                                        $("#paid").hide()
                                    }
                                }
                            }
                        }

                    },error:function(res){
                        console.log(res)
                    }
                })
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

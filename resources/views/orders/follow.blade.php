@extends('modules_manager.main_new')
@section('title', 'Theo dõi kiện hàng hàng')
@section('title-header-content', 'Theo dõi kiện hàng')
@section('css')
<style>
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #fad792; // Choose your own color here
    }

    table.table-bordered>thead>tr>th {
        border: 1px solid #fca901;
    }

    .tr-color:hover td {
        background-color: #fca901 !important;
        cursor: pointer;
    }

    .alert-danger {
        background-color: #f8d7da !important;
        border-left: unset !important;
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



    p {
        margin-bottom: 0 !important;
    }

    .stretch-card {
        display: unset !important;
    }

    .fix-font-size {
        font-size: 20px;
    }

    .bg-saiko {
        background-color: #fad792;
    }

    .fix-padding-div {
        padding-right: 23px !important;
        padding-left: 7px !important;
    }

    .fix-font-size-li {
        font-size: 16px !important;
    }

    .fh-btn {
        background-color: #fca901 !important;
        color: white !important;
    }

    .fix-height {
        height: unset !important;
    }
</style>
@section('content')
<div class="row fix-overflow">
    <div class="col-md-12 bg-white">
        <div class="mt-3">
            <h2>Theo dõi kiện hàng của bạn</h2>
        </div>
        <p>Để theo dõi lộ trình kiện hàng của bạn, vui lòng nhập mã tracking dưới đây:</p>
        <form id="tracking_form" method='post'>
            <div class="col-md-12 p-3">
                <div class="row align-items-center">
                    @csrf
                    <label>Mã Tracking <span class="require">*</span></label>

                    <div class="col-md-9">
                        <input id="utrack" placeholder="Nhập mã Tracking vào đây" type="text" class="form-control fix-height">
                    </div>

                    <div class="col-md-2 text-center">
                        <button value="" class="form-control rounded fh-btn fix-height" type="submit">Theo dõi
                            ngay</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="alert alert-danger" id="statusData" style="display: none;margin-top:20px;">
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="underline table-responsive" style="display:none" id="table-firt">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Box_ID</th>
                                <th>Cân Nặng<span style="display: block">(kg)</span></th>
                                <th style="text-align: center;">Ký Thể Tích<span style="display: block">(kg)</span>
                                </th>
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
                            <table class="table table-striped table-bordered d-none check-contract-order" id="table_price_shipping">
                                <thead>
                                    <tr>
                                        <th>Mã Tracking</th>
                                        <th>Tổng khối lượng tính phí</th>
                                        <th>Đơn giá</th>
                                        <th>Đường vận chuyển</th>
                                        <th>Phí vận chuyển (Nhật - Kho Việt)</th>
                                        <th>Phí vận chuyển đã thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_price_shipping">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row text-black mt-3 fix-padding-div check-contract-order">
                    <div class="col-md-12 m-2 bg-saiko" id="declaration_price" style="display:none;font-size:18px">
                        <div class="row ">
                            <tr>
                                <div class="col-md-6 ">
                                    <label for="">Giá trị gói bảo hiểm</label>: <span id="insurance_result"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phí bảo hiểm (3%)</label>: <span id="insurance_result_fee"></span>
                                </div>
                            </tr>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" id="special">Giá trị hàng hoá đặc biệt</label>: <span id="special_result"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="" id="special">Phí hàng hoá đặc biệt (2%)</label>: <span id="special_result_fee"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" id="shipping_inside_jp">Phí vận chuyển nội địa
                                    Nhật(Yên)</label>: <span id="fee_shipping_inside_jp"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="" id="shipping_inside_vn">Phí vận chuyển nội địa
                                    Nhật(VNĐ)</label>: <span id="fee_shipping_inside_vn"></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row p-3 mt-2 check-contract-order" id="alert" style="display:none">
                    <div class="col-md-12 col-sm-12 bg-saiko ">
                        <h2 class="text-center text-danger mt-2 font-weight-bold"> <b> PHIẾU YÊU CẦU THANH TOÁN </b>
                        </h2>
                        <p class="text-danger fix-font-size">Xin quý khách vui lòng thanh toán đến STK :
                            <b>19035902493017</b>.
                            Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank <img src="images/TCB_icon.png" alt="" width="100px">
                        </p>
                        <p class="text-danger fix-font-size font-weight-bold" style="font-weight: bold"> Nội dung thanh
                            toán :
                            <span class="text-danger" style="font-size: 25px" id="id_order"></span>
                        <p>
                        <p class="text-danger fix-font-size text-uppercase font-weight-bold" style="font-weight: bold">
                            Số tiền
                            thanh toán: <span id="money" style="font-size: 25px"></span> <span style="font-weight: normal !important;">( Đã bao gồm phí bảo hiểm, hàng hoá đặc
                                biệt)</span></p>
                    </div>
                </div>
                <div class="row p-2 mt-2 fix-padding-div check-contract-order" id="paid" style="display:none">
                    <div class="col-md-12 col-sm-12 bg-saiko">
                        <h2 class="text-center text-danger font-weight-bold"> <b> Đã Thanh Toán </b></h2>
                        <h2 class="text-center text-danger">Cảm Ơn Quý Khách</h2>
                    </div>
                </div>
                <div class="row" id="alert-contract-order" style="display: none">
                    <div class="col-md-6">
                        <div class="background-contract row p-2">
                            <span class="text-danger text-xl-left">Chi phí của tracking được tính trong lô hàng:
                                <span class="text-danger font-weight-bold" id="id_contract_order"></span></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="background-contract row p-2">
                            <span class="text-danger font-weight-bold" id="status_contract_order"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-custome">
                        <div class="lftredbrdr">
                            <ul class="timeline fix-font-size-li" id="time_line">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999">
    <div class="modal-dialog modal-sm  modal-confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" id="color-success"><i class="fa fa-times"></i></div>

            </div>
            <h5 class="modal-confirm" id="message"></h5>
            <div class="modal-footer">
                <button class="btn btn-err btn-danger btn-block" data-dismiss="modal" id="exitForm">Thoát</button>
                <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()" id="exitSuccess" style="display:none">Thoát</button>
            </div>
        </div>
    </div>
</div>
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
        $('#ui-basic').addClass('show');
        $('#follow-order').addClass('active')
        $(document).ajaxStart(function() {
            $("#loader").show();
        });
        $(document).ajaxStop(function() {
            $("#loader").hide();
        });
        $('#tracking_form').submit(function(e) {
            e.preventDefault();
            let idToken = getToken();
            $("#declaration_price").hide()
            $("#alert").hide()
            $("#table_price_shipping").addClass('d-none')
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
            $("#alert-contract-order").hide()
            var tracking = $("#utrack").val();
            if (tracking.length <= 5) {
                alert('Tracking chưa đúng')
                return
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: "{{ route('rq_tk.getStatus') }}",
                data: {
                    idToken: idToken,
                    tracking: tracking
                },
                success: function(res) {
                    $("#body-table-firt-vnpost").empty()
                    $("#table-firt-vnpost").hide()
                    $("#alert").hide()
                    if (res?.code == 401) {
                        swal({
                            title: res?.message,
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        }).then(() => {
                            window.location.reload()
                        })
                    }
                    if (res?.code == 404) {
                        $("#table").hide();
                        $("#body-table-firt").empty()
                        $("#time_line").empty()
                        $("#statusData").empty();
                        $(".table").hide();
                        $("#statusData").css('display', 'block');
                        $("#statusData").append('<h4 class="text-danger">' +
                            res?.message + '</h4>')
                    } else {
                        if (res.data[0].boxes.length == 0 & res.data[0].reference.length == 0) {
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
                            $("#table_price_shipping").addClass('d-none')
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
                                    var service_fee = value.reference.service_fee;
                                    var service_fee_paid = value.reference.service_fee_paid;
                                    var service_fee_outstanding = value.reference.service_fee_outstanding;
                                    if (value.reference.length != 0) {
                                        if (!value.reference.shipment_info
                                            .sender_name) {
                                            if (isValidJSONString(value.reference.note)) {
                                                var parse_note = JSON.parse(value
                                                    .reference.note);
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
                                            name_send = value.reference
                                                .shipment_info.sender_name;
                                        }
                                        tel_rev = value.reference.shipment_info.tel;
                                        name_rev = value.reference.shipment_info
                                            .consignee;
                                        add_rev = value.reference.shipment_info
                                            .full_address;
                                        created_at = value.reference.created_at;
                                        method_ship = value.reference
                                            .shipment_method_id;
                                        if (value.reference.pay_money !=
                                            undefined) {
                                            pay_money = value.reference.total_fee;
                                        }
                                        insurance_result = value.reference
                                            .insurance_declaration //tiền bảo hiểm
                                        special_result = value.reference
                                            .special_declaration //tiền hàng đặc biệt
                                        $("#declaration_price").show()
                                        $("#insurance_result").text(formatNumber(
                                            insurance_result))
                                        $("#special_result").text(formatNumber(
                                            special_result))
                                        $("#insurance_result_fee").text(
                                            formatNumber(value.reference
                                                .insurance_result_fee))

                                        $("#special_result_fee").text(formatNumber(
                                            value.reference
                                            .special_result_fee))

                                        if (value.sfa != null) {
                                            $("#fee_shipping_inside_jp").text(
                                                formatNumber(0))
                                            $("#fee_shipping_inside_vn").text(
                                                formatNumber(value.sfa
                                                    .shipping_inside))
                                        }
                                        // BẢNG GIÁ
                                        if (value.boxes.length) {
                                            $("#table_price_shipping").removeClass('d-none')
                                            $("#table_body_price_shipping").empty()
                                            $("#table_body_price_shipping").append(
                                                '<tr>' +
                                                '<td>' + value.id + '</td>' +
                                                '<td>' + value.reference
                                                .total_weight + '</td>' +
                                                '<td>' + value.reference
                                                .fee_ship + '</td>' +
                                                '<td>' + method_ship + '</td>' +
                                                '<td>' + formatNumber(value
                                                    .reference.total_fee) +
                                                ' VNĐ</td>' +
                                                '<td>' + formatNumber(Math.round(service_fee_paid)) + ' VNĐ</td>' +
                                                +'</tr>'
                                            )
                                        }
                                    }

                                    if (tel_rev == '' | name_rev == '' | add_rev ==
                                        '') {
                                        swal({
                                            title: "Khách chưa đăng kí đầy đủ thông tin tracking",
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        })
                                        // $('#message').html(
                                        //     'Khách chưa đăng kí đầy đủ thông tin tracking'
                                        // );
                                        // $('#exitForm').hide();
                                        // $('#exitSuccess').show();
                                        // $('#myModal').modal('show');
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
                                        // if (value.logs.length) {
                                        //     var total_pay = 0;
                                        //     var matchedLogIdx = value.logs
                                        //         .findIndex((log) => {
                                        //             return !!log?.content
                                        //                 ?.transaction
                                        //         });
                                        //     $.each(value.logs, function(logs_index,
                                        //         logs_value) {
                                        //         let keyObjectLogMerge =
                                        //             Object.keys(logs_value
                                        //                 .content)
                                        //         var statusLogMerge;
                                        //         if (matchedLogIdx === -1) {
                                        //             if (keyObjectLogMerge ==
                                        //                 "updated_at,service_fee_paid"
                                        //             ) {
                                        //                 total_pay +=
                                        //                     logs_value
                                        //                     .content
                                        //                     .service_fee_paid
                                        //                 statusLogMerge =
                                        //                     "Đã thanh toán " +
                                        //                     formatNumber(
                                        //                         logs_value
                                        //                         .content
                                        //                         .service_fee_paid
                                        //                     )
                                        //             }
                                        //         } else {
                                        //             if (keyObjectLogMerge ==
                                        //                 "transaction") {
                                        //                 statusLogMerge =
                                        //                     "Đã thanh toán " +
                                        //                     formatNumber(
                                        //                         logs_value
                                        //                         .content
                                        //                         .transaction
                                        //                         .amount)
                                        //             }
                                        //         }

                                        //         if (statusLogMerge !=
                                        //             undefined) {
                                        //             $("#time_line").append(
                                        //                 '<li>' +
                                        //                 '<a>' +
                                        //                 statusLogMerge +
                                        //                 '</a>' +
                                        //                 '<p>' +
                                        //                 logs_value
                                        //                 .created_at +
                                        //                 '</p>' +
                                        //                 '</li>'
                                        //             )
                                        //         }
                                        //     })
                                        // }
                                        $("#body-table-firt")
                                            .append(
                                                `<tr>` +
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
                                        $("#body-table-firt").empty()
                                        $("#time_line").empty()
                                        $.each(value.boxes, function(index,
                                            value2) {
                                            $("#body-table-firt").append(
                                                `<tr id="sku-row-${value2.id}">` +
                                                '<td>' + value2.id +
                                                '</td>' +
                                                '<td>' + value2.weight +
                                                '</td>' +
                                                '<td>' + value2
                                                .volume_weight_box +
                                                '</td>' +
                                                '<td class="text-center">' +
                                                value2.duplicate +
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
                                            if (value.boxes.length == 1) {
                                                if (value.reference.length !=
                                                    0) {
                                                    $("#alert").show()
                                                    $("#id_order").empty()
                                                    $("#money").empty()
                                                    $("#id_order").text(
                                                        value.id)
                                                    $("#money").text(
                                                        formatNumber(
                                                            value
                                                            .reference
                                                            .total_fee
                                                        ) + " VNĐ")
                                                }

                                                $("#time_line").empty()
                                                if (value.boxes[0].logs
                                                    .length == 0) {
                                                    $("#time_line").append(
                                                        '<li>' +
                                                        '<a>' +
                                                        'Đang tới kho' +
                                                        '</a>' +
                                                        '<p>' +
                                                        created_at +
                                                        '</p>' +
                                                        '</li>'
                                                    )
                                                    // if (value.logs.length) {
                                                    //     var total_pay = 0;
                                                    //     var matchedLogIdx =
                                                    //         value.logs
                                                    //         .findIndex((
                                                    //             log
                                                    //         ) => {
                                                    //             return !
                                                    //                 !log
                                                    //                 ?.content
                                                    //                 ?.transaction
                                                    //         });
                                                    //     $.each(value.logs,
                                                    //         function(
                                                    //             logs_index,
                                                    //             logs_value
                                                    //         ) {
                                                    //             let keyObjectLogMerge =
                                                    //                 Object
                                                    //                 .keys(
                                                    //                     logs_value
                                                    //                     .content
                                                    //                 )
                                                    //             var
                                                    //                 statusLogMerge;
                                                    //             if (matchedLogIdx ===
                                                    //                 -1
                                                    //             ) {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "updated_at,service_fee_paid"
                                                    //                 ) {
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .service_fee_paid
                                                    //                     statusLogMerge
                                                    //                         =
                                                    //                         "Đã thanh toán " +
                                                    //                         formatNumber(
                                                    //                             logs_value
                                                    //                             .content
                                                    //                             .service_fee_paid
                                                    //                         )
                                                    //                 }
                                                    //             } else {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "transaction"
                                                    //                 ) {
                                                    //                     statusLogMerge
                                                    //                         =
                                                    //                         "Đã thanh toán " +
                                                    //                         formatNumber(
                                                    //                             logs_value
                                                    //                             .content
                                                    //                             .transaction
                                                    //                             .amount
                                                    //                         )
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .transaction
                                                    //                         .amount
                                                    //                 }
                                                    //             }

                                                    //             if (statusLogMerge !=
                                                    //                 undefined
                                                    //             ) {
                                                    //                 $("#time_line")
                                                    //                     .append(
                                                    //                         '<li>' +
                                                    //                         '<a>' +
                                                    //                         statusLogMerge +
                                                    //                         '</a>' +
                                                    //                         '<p>' +
                                                    //                         logs_value
                                                    //                         .created_at +
                                                    //                         '</p>' +
                                                    //                         '</li>'
                                                    //                     )
                                                    //             }
                                                    //         })
                                                    //     if (pay_money !=
                                                    //         undefined) {
                                                    //         if (total_pay >=
                                                    //             pay_money -
                                                    //             1000) {
                                                    //             $("#alert")
                                                    //                 .show()
                                                    //             if (value
                                                    //                 .reference
                                                    //                 .length
                                                    //             ) {
                                                    //                 $("#paid")
                                                    //                     .show()
                                                    //             } else {
                                                    //                 $("#paid")
                                                    //                     .hide()
                                                    //             }
                                                    //         }
                                                    //     }
                                                    // }
                                                } else {
                                                    var size = "( Dài : " +
                                                        value.boxes[0]
                                                        .length + "cm" +
                                                        ",Rộng: " + value
                                                        .boxes[0].width +
                                                        "cm" + ",Cao: " +
                                                        value.boxes[0]
                                                        .height + "cm )"
                                                    $("#id_order").empty()
                                                    $("#money").empty()
                                                    if (value.reference
                                                        .length != 0) {
                                                        $("#id_order").text(
                                                            value.id)
                                                        $("#money").text(
                                                            formatNumber(
                                                                value
                                                                .reference
                                                                .total_fee
                                                            ) +
                                                            " VNĐ")
                                                    }
                                                    $.each(value.boxes[0]
                                                        .logs,
                                                        function(index,
                                                            value) {
                                                            let keyObject =
                                                                Object
                                                                .keys(
                                                                    value
                                                                    .content
                                                                )
                                                            let valueObject =
                                                                Object
                                                                .values(
                                                                    value
                                                                    .content
                                                                );
                                                            var status;
                                                            if (keyObject ==
                                                                "id") {
                                                                status =
                                                                    "Đã nhập kho Nhật"
                                                            }
                                                            if (keyObject ==
                                                                "in_pallet"
                                                            ) {
                                                                status =
                                                                    "Đã kiểm hàng " +
                                                                    size
                                                            }
                                                            if (keyObject ==
                                                                "set_user_id,set_order_id"
                                                            ) {
                                                                status =
                                                                    "Lên đơn hàng"
                                                            }
                                                            if (keyObject ==
                                                                "set_user_id"
                                                            ) {
                                                                status =
                                                                    "Lên đơn hàng"
                                                            }
                                                            if (keyObject ==
                                                                "set_owner_id,set_owner_type"
                                                            ) {
                                                                status =
                                                                    "Lên đơn hàng"
                                                            }
                                                            if (keyObject ==
                                                                "in_container" ||
                                                                keyObject ==
                                                                "in_container,from,to"
                                                            ) {
                                                                // var parts = value.created_at.split('-')
                                                                // var year = parts[2].split(' ')
                                                                // var getDate = new Date(year[0],parts[1]-1,parts[0])
                                                                // var now = new Date()
                                                                // var date_arv = getDate-now;
                                                                // var add_date;
                                                                // var check_method = method_ship.charAt(0).toUpperCase() + method_ship.slice(1);
                                                                // if(check_method=="Air"){
                                                                //     add_date = 6;
                                                                // }else{
                                                                //     add_date = 30;
                                                                // }
                                                                // var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                                                // if(expected_date > 0) {
                                                                //     status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                                                // }else{
                                                                status =
                                                                    "Xuất kho Nhật"
                                                                // }
                                                            }

                                                            if (keyObject ==
                                                                "shipping_code" &&
                                                                value
                                                                .type_id ==
                                                                "created"
                                                            ) {
                                                                status =
                                                                    "Mã giao hàng: " +
                                                                    value
                                                                    .content
                                                                    .shipping_code
                                                            }
                                                            if (keyObject ==
                                                                "shipping_code" &&
                                                                value
                                                                .type_id ==
                                                                "updated"
                                                            ) {
                                                                status =
                                                                    "Cập nhật mã giao hàng: " +
                                                                    value
                                                                    .content
                                                                    .shipping_code
                                                            }
                                                            if (keyObject ==
                                                                "shipping_code" &&
                                                                value
                                                                .type_id ==
                                                                "deleted"
                                                            ) {
                                                                status =
                                                                    "Huỷ mã giao hàng: " +
                                                                    value
                                                                    .content
                                                                    .shipping_code
                                                            }
                                                            if (keyObject ==
                                                                "out_container" ||
                                                                keyObject ==
                                                                "out_container,from,to"
                                                            ) {
                                                                status =
                                                                    "Nhập kho Việt Nam"
                                                            }
                                                            if (keyObject ==
                                                                "outbound_warehouse"
                                                            ) {
                                                                status =
                                                                    "Xuất kho Việt Nam"
                                                            }
                                                            if (keyObject ==
                                                                "delivery_status"
                                                            ) {
                                                                if (valueObject ==
                                                                    "shipping"
                                                                ) {
                                                                    status
                                                                        =
                                                                        "Đang giao hàng"
                                                                }
                                                            }
                                                            if (keyObject ==
                                                                "delivery_status"
                                                            ) {
                                                                if (valueObject ==
                                                                    "cancelled"
                                                                ) {
                                                                    status
                                                                        =
                                                                        "Hủy box"
                                                                }
                                                            }
                                                            if (keyObject ==
                                                                "delivery_status"
                                                            ) {
                                                                if (valueObject ==
                                                                    "received"
                                                                ) {
                                                                    status
                                                                        =
                                                                        "Đã nhận hàng"
                                                                }
                                                            }
                                                            if (keyObject ==
                                                                "delivery_status"
                                                            ) {
                                                                if (valueObject ==
                                                                    "refunded"
                                                                ) {
                                                                    status
                                                                        =
                                                                        "Trả lại hàng"
                                                                }
                                                            }
                                                            if (keyObject ==
                                                                "delivery_status"
                                                            ) {
                                                                if (valueObject ==
                                                                    "waiting_shipment"
                                                                ) {
                                                                    status
                                                                        =
                                                                        "Đợi giao hàng"
                                                                }
                                                            }
                                                            if (status !=
                                                                undefined
                                                            ) {
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
                                                            }
                                                        })
                                                    // if (value.logs.length) {
                                                    //     var total_pay = 0;
                                                    //     var matchedLogIdx =
                                                    //         value.logs
                                                    //         .findIndex((
                                                    //             log
                                                    //         ) => {
                                                    //             return !
                                                    //                 !log
                                                    //                 ?.content
                                                    //                 ?.transaction
                                                    //         });
                                                    //     $.each(value.logs,
                                                    //         function(
                                                    //             logs_index,
                                                    //             logs_value
                                                    //         ) {
                                                    //             let keyObjectLogMerge =
                                                    //                 Object
                                                    //                 .keys(
                                                    //                     logs_value
                                                    //                     .content
                                                    //                 )
                                                    //             var
                                                    //                 statusLogMerge;
                                                    //             if (matchedLogIdx ===
                                                    //                 -1
                                                    //             ) {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "updated_at,service_fee_paid"
                                                    //                 ) {
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .service_fee_paid
                                                    //                     statusLogMerge
                                                    //                         =
                                                    //                         "Đã thanh toán " +
                                                    //                         formatNumber(
                                                    //                             logs_value
                                                    //                             .content
                                                    //                             .service_fee_paid
                                                    //                         )
                                                    //                 }
                                                    //             } else {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "transaction"
                                                    //                 ) {
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .transaction
                                                    //                         .amount
                                                    //                     statusLogMerge
                                                    //                         =
                                                    //                         "Đã thanh toán " +
                                                    //                         formatNumber(
                                                    //                             logs_value
                                                    //                             .content
                                                    //                             .transaction
                                                    //                             .amount
                                                    //                         )
                                                    //                 }
                                                    //             }

                                                    //             if (statusLogMerge !=
                                                    //                 undefined
                                                    //             ) {
                                                    //                 $("#time_line")
                                                    //                     .append(
                                                    //                         '<li>' +
                                                    //                         '<a>' +
                                                    //                         statusLogMerge +
                                                    //                         '</a>' +
                                                    //                         '<p>' +
                                                    //                         logs_value
                                                    //                         .created_at +
                                                    //                         '</p>' +
                                                    //                         '</li>'
                                                    //                     )
                                                    //             }
                                                    //         })
                                                    //     if (pay_money !=
                                                    //         undefined) {
                                                    //         if (total_pay >=
                                                    //             pay_money -
                                                    //             1000) {
                                                    //             $("#alert")
                                                    //                 .hide()
                                                    //             if (value
                                                    //                 .reference
                                                    //                 .length
                                                    //             ) {
                                                    //                 $("#paid")
                                                    //                     .show()
                                                    //             } else {
                                                    //                 $("#paid")
                                                    //                     .hide()
                                                    //             }
                                                    //         }
                                                    //     }
                                                    // }
                                                }

                                            } else {
                                                if (value.reference.length !=
                                                    0) {
                                                    $("#alert").show()
                                                    $("#id_order").empty()
                                                    $("#money").empty()
                                                    $("#id_order").text(
                                                        value.id)
                                                    $("#money").text(
                                                        formatNumber(
                                                            value
                                                            .reference
                                                            .total_fee
                                                        ) + " VNĐ")
                                                    // if (value.logs.length) {
                                                    //     var total_pay = 0
                                                    //     var matchedLogIdx =
                                                    //         value.logs
                                                    //         .findIndex((
                                                    //             log
                                                    //         ) => {
                                                    //             return !
                                                    //                 !log
                                                    //                 ?.content
                                                    //                 ?.transaction
                                                    //         });
                                                    //     $.each(value.logs,
                                                    //         function(
                                                    //             logs_index,
                                                    //             logs_value
                                                    //         ) {
                                                    //             let keyObjectLogMerge =
                                                    //                 Object
                                                    //                 .keys(
                                                    //                     logs_value
                                                    //                     .content
                                                    //                 )
                                                    //             var
                                                    //                 statusLogMerge;
                                                    //             var
                                                    //                 created_at_log;
                                                    //             if (matchedLogIdx ===
                                                    //                 -1
                                                    //             ) {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "updated_at,service_fee_paid"
                                                    //                 ) {
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .service_fee_paid
                                                    //                     statusLogMerge
                                                    //                         =
                                                    //                         "Đã thanh toán " +
                                                    //                         formatNumber(
                                                    //                             logs_value
                                                    //                             .content
                                                    //                             .service_fee_paid
                                                    //                         )
                                                    //                 }
                                                    //             } else {
                                                    //                 if (keyObjectLogMerge ==
                                                    //                     "transaction"
                                                    //                 ) {
                                                    //                     total_pay
                                                    //                         +=
                                                    //                         logs_value
                                                    //                         .content
                                                    //                         .transaction
                                                    //                         .amount
                                                    //                 }
                                                    //             }

                                                    //         })
                                                    //     if (pay_money !=
                                                    //         undefined) {
                                                    //         if (total_pay >=
                                                    //             pay_money -
                                                    //             1000) {
                                                    //             $("#alert")
                                                    //                 .hide()
                                                    //             if (value
                                                    //                 .reference
                                                    //                 .length
                                                    //             ) {
                                                    //                 $("#paid")
                                                    //                     .show()
                                                    //             } else {
                                                    //                 $("#paid")
                                                    //                     .hide()
                                                    //             }
                                                    //         }
                                                    //     }
                                                    // }
                                                }
                                                $(`#sku-row-${value2.id}`)
                                                    .hover(function() {
                                                        $(this)
                                                            .addClass(
                                                                "tr-color addHover"
                                                            );
                                                    }, function() {
                                                        $(this)
                                                            .removeClass(
                                                                "tr-color addHover"
                                                            );
                                                    });
                                                $(`#sku-row-${value2.id}`)
                                                    .on('click',
                                                        function() {
                                                            var vnpost = 0;
                                                            var size = '';
                                                            if (value2
                                                                .vnpost !=
                                                                undefined) {
                                                                vnpost =
                                                                    value2
                                                                    .vnpost;
                                                            } else {
                                                                vnpost = 0;
                                                            }
                                                            size =
                                                                "Dài : " +
                                                                value2
                                                                .length +
                                                                "cm" +
                                                                ",Rộng: " +
                                                                value2
                                                                .width +
                                                                "cm" +
                                                                ",Cao: " +
                                                                value2
                                                                .height +
                                                                "cm"
                                                            check(value2.id,
                                                                vnpost,
                                                                created_at,
                                                                value2
                                                                .fee_ship,
                                                                method_ship,
                                                                value
                                                                .logs,
                                                                pay_money,
                                                                value)
                                                        })
                                            }
                                        })
                                    }
                                    if (service_fee_paid + 5000 >= value.reference.total_fee) {
                                        $("#alert").hide();
                                        $("#paid").show();
                                    }
                                    if (value.reference.contract_id) {
                                        var contract = value.reference.contract;
                                        var service_fee = contract.service_fee;
                                        var service_fee_paid = contract.service_fee_paid;
                                        var service_fee_debited = contract.service_fee_debited;
                                        var status_contract = (service_fee <= service_fee_paid && service_fee_debited > 0) ? 'Lô hàng đã thanh toán.' : 'Lô hàng chưa được thanh toán.';
                                        $(".check-contract-order").hide()
                                        $("#alert-contract-order").show()
                                        $("#id_contract_order").text(contract.id)
                                        $("#status_contract_order").text(status_contract)
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
    function check(id_box, vnpost, created_at, fee, method, logs_merge, pay_money, length_order) {
        var idToken = getToken();
        var id_box = id_box;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('rq_tk.getInforBox') }}",
            data: {
                idToken: idToken,
                id_box: id_box
            },
            success: function(res) {
                if (res == 401) {
                    swal({
                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
                        type: "warning",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    }).then(() => {
                        location.reload()
                    })
                }
                $("#time_line").empty()
                if (res.logs.length == 0) {
                    $("#time_line").append(
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
                        if (keyObject == "out_container") {
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
                        if (status != undefined) {
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
                // if (logs_merge.length) {
                //     var total_pay = 0;
                //     var matchedLogIdx = logs_merge.findIndex((log) => {
                //         return !!log?.content?.transaction
                //     });
                //     $.each(logs_merge, function(logs_index, logs_value) {
                //         let keyObjectLogMerge = Object.keys(logs_value.content)
                //         var statusLogMerge;
                //         var created_at_log;
                //         if (matchedLogIdx === -1) {
                //             if (keyObjectLogMerge == "updated_at,service_fee_paid") {
                //                 total_pay += logs_value.content.service_fee_paid
                //                 statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                //                     .service_fee_paid)
                //             }
                //         } else {
                //             if (keyObjectLogMerge == "transaction") {
                //                 total_pay += logs_value.content.transaction.amount
                //                 statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content
                //                     .transaction.amount)
                //             }
                //         }

                //         if (statusLogMerge != undefined) {
                //             $("#time_line").append(
                //                 '<li>' +
                //                 '<a>' + statusLogMerge + '</a>' +
                //                 '<p>' + logs_value.created_at + '</p>' +
                //                 '</li>'
                //             )
                //         }
                //     })
                //     if (pay_money != undefined) {
                //         if (total_pay >= pay_money - 1000) {
                //             $("#alert").hide()
                //             if (length_order.reference.length) {
                //                 $("#paid").show()
                //             } else {
                //                 $("#paid").hide()
                //             }
                //         }
                //     }
                // }

            },
            error: function(res) {
                console.log(res)
            }
        })
    }
</script>
@endsection
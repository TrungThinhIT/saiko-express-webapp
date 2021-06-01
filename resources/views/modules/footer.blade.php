<!--Footer Top section start-->
<div class="ed_footer_wrapper ed_toppadder60 ed_bottompadder30" >
    <div class="ed_footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget text-widget" style="padding-right: 40px;">
                        <p><a href="index.php"><img style="height:80px" src="assets/images/footersaiko.png"
                                    alt="Footer Logo" /></a></p>
                        <p style="text-align: justify;">
                            Tự tin là đơn vị cung cấp dịch vụ vận chuyển Nhật Việt chuyên nghiệp, nhanh chóng nhất.
                            Thông báo lịch trình, tiến độ giao hàng kịp thời cho quý khách.</p>
                        <div class="ed_sociallink">
                            <ul>
                                <li><a href="https://fb.com/saikoexpress" data-toggle="tooltip" data-placement="bottom"
                                        title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://fb.com/saikoexpress" data-toggle="tooltip" data-placement="bottom"
                                title="Facebook"><i class="iconify" data-icon="simple-icons:viber" data-inline="true"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><img src="../assets/images/zalo.png" alt="" width="30px" height="15px"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="widget text-widget">
                        <h4 class="widget-title">Dịch vụ</h4>
                        <div class="ed_footer_menu">
                            <ul>
                                <li><a href="{{ route('service.air') }}">Đường bay</a></li>
                                <li><a href="{{ route('service.sea') }}">Đường biển</a></li>
                                <li><a href="{{ route('service.procedure') }}">Quy trình gửi hàng</a></li>
                                <!-- <li><a href="warehous.php">Kho vận và lưu trữ</a></li> -->
                                <!-- <li><a href="#">Packaging & Storage</a></li>
        <li><a href="#">Door-To-Door Delivery</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="widget text-widget">
                        <h4 class="widget-title">Liên kết nhanh</h4>
                        <div class="ed_footer_menu">
                            <ul>
                                <li><a href="{{ route('index') }}">Trang chủ</a></li>
                                <li><a href="{{ route('about.index') }}">Về chúng tôi</a></li>
                                <li><a href="{{ route('about.gallery') }}">Hình ảnh thực tế</a></li>
                                <li><a href="{{ route('contact.index') }}">Liên hệ</a></li>
                                <li><a href="{{ route('rq_tk.price') }}">Báo giá</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget text-widget">
                        <h4 class="widget-title">Liên hệ</h4>
                        <p><i class="fa fa-home" aria-hidden="true"></i> 5101-1 Kaminokawa-machi Kawachi-gun,
                            Tochigi-ken, Japan</p>
                        <p><i class="fa fa-home" aria-hidden="true"></i> 329-0611 栃木県河内郡上三川町 上三川 51011</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i>info@saikoexpress.com </p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> 1900.2149(VN)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal_tracking">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Theo dõi Tracking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="statusData_tracking" style="display: none;margin-top:20px;">
                    </div>
                    <div class="row paddtop30">
                        <div class="col-sm-12 col-md-12">
                            <div class="underline table-responsive" style="display:none" id="table-firt-tracking">
                                <table class="table table-striped table-bordered table_tracking">
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
                                            <th style="text-align: center;">Đường vận chuyển</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-table-tracking">

                                    </tbody>
                                </table>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tắt</button>
                </div>
            </div>
           
        </div>
    </div>
    <div class="modal fade" id="myModal_tracking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="z-index: 9999">
        <div class="modal-dialog modal-sm  modal-confirm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box" id="color-success"><i class="fa fa-times"></i></div>

                </div>
                <h5 class="modal-confirm" id="message_tracking"></h5>
                <div class="modal-footer">
                    <button class="btn btn-err btn-danger btn-block" data-dismiss="modal"
                        id="exitForm_tracking">Thoát</button>
                    <button class="btn btn-danger btn-block" data-dismiss="modal"
                         id="exitSuccess_tracking" style="display:none">Thoát</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--Footer Top section end-->
<!--Footer Bottom section start-->
<!-- <div class="ed_footer_bottom">
 <div class="container">
  <div class="col-lg-12 col-md-12 col-sm-12">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="ed_copy_right">
     <p>&copy; Copyright 2018, All Rights Reserved, <a href="#">SAIKO EXPRESS</a></p>
    </div>
   </div>
  </div>
  </div>
 </div>
</div> -->
<!--Footer Bottom section end-->
</div>





<script type="text/javascript" src="assets/js/saiko-bootstrap.js">
</script>
<script type="text/javascript" src="assets/js/saiko-modernizr.js">
</script>
<script type="text/javascript" src="assets/js/saiko-owl.carousel.js">
</script>
<script type="text/javascript" src="assets/js/saiko-smooth-scroll.js">
</script>
<script type="text/javascript" src="assets/js/saiko-jquery.magnific-popup.js"></script>
<script type="text/javascript" src="assets/js/plugins/revel/jquery.themepunch.tools.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/jquery.themepunch.revolution.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.actions.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.carousel.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.kenburn.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.layeranimation.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.navigation.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.parallax.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.slideanims.min.js">
</script>
<script type="text/javascript" src="assets/js/plugins/revel/revolution.extension.video.min.js">
</script>
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

    function track() {
        $(".table").hide();
        $("#statusData_tracking").empty('');
        $("#statusData_tracking").css('display','none');
        $("#time_line_tracking").empty()
        $("#body-table-tracking").empty();
        $("#modal_tracking").modal('show')
        var tracking = $("#track_tracking").val();
        if(tracking==""){
            $("#statusData_tracking").append('<h4>' +'Chưa nhập tracking' + '</h4>')
            $("#statusData_tracking").css('display','block');
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
                if (res == 404) {
                    $("#table").hide();
                    $("#body-table-tracking").empty()
                    $("#time_line_tracking").empty()
                    $("#statusData_tracking").empty();
                    $(".table").hide();
                    $("#statusData_tracking").css('display', 'block');
                    $("#statusData_tracking").append('<h4>' +
                        'Không tìm thấy mã tracking' + '</h4>')
                } else {
                    if (res.data[0].boxes.length == 0 & res.data[0].orders
                        .length == 0) {
                        $("#statusData_tracking").empty();
                        $(".table").hide();
                        $("#table-firt-tracking").show();
                        $("#body-table-tracking").empty()
                        $("#time_line_tracking").empty()
                        $("#statusData_tracking").css('display', 'block');
                        $("#statusData_tracking").append('<h4>' +
                            'Tracking chưa đăng kí đơn hàng' + '</h4>')
                    } else {
                        $("#statusData_tracking").css('display', 'none');
                        $(".table").show();
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
                                if (value.orders.length != 0) {
                                    var sort_order = (value.orders).sort(function(x, y) {
                                            return new Date(x.shipment_infor_id) - new Date(y.shipment_infor_id)
                                        })
                                    // if (sort_order[value.orders.length -
                                    //         1].shipment_infor
                                    //     .sender_name == null) {
                                    var parse_note = JSON.parse(sort_order[value.orders.length - 1].note);
                                    name_send = parse_note.send_name;
                                    // } else {
                                    //     name_send = sort_order[value
                                    //             .orders.length - 1]
                                    //         .shipment_infor.sender_name;
                                    // }
                                    tel_rev = sort_order[value.orders.length - 1].shipment_infor .tel;
                                    name_rev = sort_order[value.orders.length - 1].shipment_infor .consignee;
                                    add_rev = sort_order[value.orders .length - 1].shipment_infor.full_address;
                                    created_at = sort_order[value.orders.length - 1].created_at;
                                    method_ship = sort_order[value .orders.length - 1].shipment_method_id;
                                }
                                if (name_send == '' | tel_rev == '' |name_rev == '' | add_rev == '') {
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
                                    $("#body-table-tracking")
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
                                    $("#body-table-tracking").empty()
                                    $("#time_line_tracking").empty()
                                    $.each(value.boxes, function(index,
                                        value2) {
                                        $("#body-table-tracking")
                                            .append(
                                                `<tr id="sku-row-${value2.id}">` +
                                                '<td>' + value2.id +
                                                '</td>' +
                                                '<td>' + value2 .weight.toFixed(3) +
                                                '</td>' +
                                                '<td>' + value2.volume.toFixed(3) +
                                                '</td>' +
                                                '<td>' +name_send +
                                                '</td>' +
                                                '<td>' +name_rev +
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
                                            $("#time_line_tracking").empty()

                                            if (value.boxes[0].logs.length == 0) {
                                                $("#time_line_tracking").append(
                                                    '<li>' +
                                                    '<a>' + 'Đang tới kho' + '</a>' +
                                                    '<p>' + created_at + '</p>' +
                                                    '</li>'
                                                )
                                            } else {
                                                $.each(value.boxes[0].logs, function(index, value) {
                                                    let a = JSON.parse(value.content);
                                                    let valueObject = Object.keys(a);
                                                    var status;
                                                    if (valueObject == "id") {
                                                        status = "Đã nhập kho Nhật"
                                                    }
                                                    if (valueObject =="in_pallet") {
                                                        status = "Đã kiểm hàng"
                                                    }
                                                    if (valueObject =="set_owner_id,set_owner_type") {
                                                        status = "Lên đơn hàng"
                                                    }
                                                    if (valueObject =="in_container") {
                                                        status = "Lên container"
                                                    }
                                                    if (valueObject == "out_container") {
                                                        status = "Xuống container"
                                                    }
                                                    if (valueObject =="delivery_status") {
                                                        if (a.delivery_status =="shipping") {
                                                            status = "Đang giao hàng"
                                                        }
                                                    }
                                                    if (valueObject == "delivery_status") {
                                                        if (a.delivery_status =="cancelled") {
                                                            status = "Hủy box"
                                                        }
                                                    }
                                                    if (valueObject =="delivery_status") {
                                                        if (a.delivery_status =="received") {
                                                            status = "Đã nhận hàng"
                                                        }
                                                    }
                                                    if (valueObject =="delivery_status") {
                                                        if (a.delivery_status =="refunded") {
                                                            status = "Trả lại hàng"
                                                        }
                                                    }
                                                    if (valueObject =="delivery_status") {
                                                        if (a.delivery_status =="waiting_shipment") {
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
                                            }
                                        } else {
                                            $(`#sku-row-${value2.id}`).on('click',
                                                function() {
                                                    check_footer(value2.logs, created_at)
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
    }

    function check_footer(row, created_at) {
        $("#time_line_tracking").empty()

        if (row.length == 0) {
            $("#time_line_tracking").append(
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

                $("#time_line_tracking").append(
                    '<li>' +
                    '<a>' + status + '</a>' +
                    '<p>' + value.created_at + '</p>' +
                    '</li>'
                )
            })
        }
    }

</script>

</body>

</html>

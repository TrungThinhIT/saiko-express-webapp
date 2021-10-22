<!--Footer Top section start-->
<div class="ed_footer_wrapper ed_toppadder60 ed_bottompadder30" id="custom-footer">
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
                                        title="Facebook"><i class="iconify" data-icon="simple-icons:viber"
                                            data-inline="true"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><img
                                            src="../assets/images/zalo.png" alt="" width="30px" height="15px"></a></li>
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
                        <p><i class="fa fa-home" aria-hidden="true"></i> 289-1501 Chibaken Sammushi Matsuomachi Yamamuro 121-2</p>
                        <p><i class="fa fa-home" aria-hidden="true"></i> 〒289-1501 千葉県山武市松尾町山室121-2</p>
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
                                    <tbody id="body-table-tracking">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered check-contract-footer" id="table_price_shipping_footer_2"
                                        style="display:none">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">Mã Tracking</th>
                                                <th style='width:100px;text-align:center'>Tổng khối lượng tính phí</th>
                                                <th>Đơn giá</th>
                                                <th>Đường vận chuyển</th>
                                                <th>Phí vận chuyển (Nhật - Kho Việt)</th>
                                                <th>Phí vận chuyên đã thanh toán</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body_price_shipping_footer">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none check-contract-footer" id="declaration_price_footer" style="margin:4px">
                            <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                <div class="col-md-6 " style="padding-left: unset">
                                    <p><label for="">Giá trị gói bảo hiểm </label>: <span
                                            id="insurance_result_footer"></span> </p>
                                </div>
                                <div class="col-md-6">
                                    <p><label for="">Phí bảo hiểm (3%)</label>: <span
                                            id="insurance_result_fee_footer"></span> </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                <div class="col-md-6" style="padding-left: unset">
                                    <p><label for="" id="special_footer">Giá trị hàng hóa đặc biệt</label>:
                                        <span id="special_result_footer"></span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><label for="" id="special_footer">Phí hàng đặc biệt
                                            (2%)</label>: <span id="special_result_fee_footer"></span> </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                <div class="col-md-6" style="padding-left: unset">
                                    <p class=""><label for="" id="shipping_inside_jp_footer">Phí vận chuyển nội địa
                                            Nhật(Yên)</label>: <span id="fee_shipping_inside_jp_footer"></span> </p>
                                </div>
                                <div class="col-md-6">
                                    <p class=""><label for="" id="shipping_inside_vn_footer">Phí vận chuyển nội địa
                                            Nhật(VNĐ)</label>: <span id="fee_shipping_inside_vn_footer"></span> </p>
                                </div>

                            </div>
                        </div>
                        <div class="row d-none check-contract-footer" id="alert_footer" style="margin:4px">
                            <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                <p class="text-danger">Xin quý khách vui lòng thanh toán đến STK :
                                    <b>19035902493017</b>. Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank <img
                                        src="images/TCB_icon.png" alt="" width="120px">
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
                        <div class="row d-none check-contract-footer" id="paid_footer" style="margin:4px">
                            <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                                <h2 class="text-center text-danger font-weight-bold"> <b> Đã Thanh Toán </b></h2>
                                <h2 class="text-center text-danger">Cảm Ơn Quý Khách</h2>
                            </div>
                        </div>
                        <div class="col-md-12 d-none" id="alert-contract-footer">
                            <div class="background-contract row p-2">
                                <span class="text-danger text-xl-left">Chi phí của tracking được tính trong lô hàng:</span>
                                <span class="text-danger font-weight-bold" id="id_contract_footer"></span>
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
                    <button class="btn btn-danger btn-block" data-dismiss="modal" id="exitSuccess_tracking"
                        style="display:none">Thoát</button>
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


<div id="fb-root"></div>
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
    console.log(provider)
    provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
    firebase.auth().languageCode = 'it';
    provider.setCustomParameters({
        'login_hint': 'user@example.com'
    });

</script> --}}
<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "{{config('services.firebase.apiKey')}}",
        authDomain: "{{config('services.firebase.authDomain')}}",
        projectId: "{{config('services.firebase.projectId')}}",
        storageBucket: "{{config('services.firebase.storageBucket')}}",
        messagingSenderId: "{{config('services.firebase.messagingSenderId')}}",
        appId: "{{config('services.firebase.appId')}}",
        measurementId: "{{config('services.firebase.measurementId')}}"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    firebase.auth().languageCode = 'vi';

</script>
<script>
    function removeAndLogout(){
        let id_session = "{{ Session::has('checkToken') }}";
        let user_session = "{{ Session::has('idToken') }}";
        if (!id_session && !user_session) {
            $.removeCookie('idToken', {
                path: '/'
            })
            firebase.auth().signOut().then(() => {
            }).catch((error) => {
            });
        }
    }
    removeAndLogout();
    //function remove token

    function removeToken() {
        $.removeCookie('idToken', {
            path: '/'
        });
    }
    //set token
    function setToken(token_gg) {
        var name = 'idToken';
        var now = new Date();
        now.setTime(now.getTime() + 57 * 60 * 1000);
        $.cookie(name, token_gg, {
            expires: now,
            path: "/"
        });
    }

    //ajax
    function sendSetSession(token){
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('auth.session') }}",
            data: {
                idToken: token,
            },
            global:false,
            success:function(response){
            },error:function(response){
                console.log(response)
            }
        })
    }

    function setSessionToken(){
        const checkToken = "{{Session::has('checkToken')}}";
        const user_session = "{{Session::has('idToken')}}";
        const cookie = $.cookie('idToken');
        if (!checkToken && user_session && cookie == undefined) {
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    firebase.auth().currentUser.getIdToken( /* forceRefresh */ true).then(
                        function(token_gg) {
                            setToken(token_gg)
                            $.ajax({
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                },
                                type: "POST",
                                url: "{{ route('auth.login') }}",
                                data: {
                                    idToken: token_gg,
                                },
                                global:false,
                                success: function(respone) {
                                    if (respone.code == 200) {
                                    }
                                },
                                error: function(respone) {
                                    console.log(respone.responseJSON.errors)
                                }
                            })
                        }).catch(function(error) {
                            console.log(error)
                    });
                }
            });
        }
        if (!checkToken && !user_session) {
            // User is signed out
            removeAndLogout()
            var email = "sale@saikoexpress.com";
            var password = "{{config('services.saiko.password')}}";
            firebase.auth().signInWithEmailAndPassword(email, password).then((
                userCredential) => {
                    let token_gg = userCredential.user.toJSON().stsTokenManager.accessToken
                    sendSetSession(token_gg)
            }).catch((error) => {
            });
        }
    }
    setSessionToken();

    function refreshToken(code){
        const checkToken = "{{Session::has('checkToken')}}";
        if(code ==401 && checkToken){
            removeAndLogout()
            var email = "sale@saikoexpress.com";
            var password = "{{config('services.saiko.password')}}";
            firebase.auth().signInWithEmailAndPassword(email, password).then((
                userCredential) => {
                    let token_gg = userCredential.user.toJSON().stsTokenManager.accessToken
                    sendSetSession(token_gg)
            }).catch((error) => {
            });
        }
    }
    $(document).ready(function() {

        $("#logout-firebase").click(function(e) {
            e.preventDefault()
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
        })
    })
    // Your web app's Firebase configuration
    function track() {
        let idToken = getToken();
        $("#alert_footer").hide()
        $("#paid_footer").hide()
        $("#table_price_shipping_footer_2").hide()
        $("#alert_footer").hide()
        $("#declaration_price_footer").hide()
        $(".table").hide();
        $("#statusData_tracking").empty('');
        $("#statusData_tracking").css('display', 'none');
        $("#time_line_tracking").empty()
        $("#table_body_price_shipping_first").empty()
        $("#body-table-tracking").empty();
        $("#modal_tracking").modal('show')
        $("#fee_shipping_inside_jp_footer").text(0)
        $("#fee_shipping_inside_vn_footer").text(0)
        $("#alert-contract-footer").hide()
        var tracking = $("#track_tracking").val();
        if (tracking == "") {
            $("#statusData_tracking").append('<h4>' + 'Chưa nhập tracking' + '</h4>')
            $("#statusData_tracking").css('display', 'block');
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('rq_tk.getStatus') }}",
            data: {
                idToken:idToken,
                tracking: tracking
            },
            success: function(res) {
                if (res?.code == 404 || res?.code == 401) {
                    $("#table").hide();
                    $(".table").hide();
                    $("#statusData_tracking").css('display', 'block');
                    $("#statusData_tracking").append('<h4>' +
                        res?.message + '</h4>')
                } else {
                    if (res.data[0].boxes.length == 0 & res.data[0].reference
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
                                var service_fee = value.reference.service_fee;
                                var service_fee_paid = value.reference.service_fee_paid;
                                var service_fee_outstanding = value.reference.service_fee_outstanding;
                                if (value.reference.length != 0) {

                                    if (!value.reference.shipment_info
                                        .sender_name) {
                                        if (isValidJSONString(value.reference
                                                .note)) {
                                            var parse_note = JSON.parse(value.reference.note);
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
                                    $("#declaration_price_footer").show()
                                    $("#insurance_result_footer").text(formatNumber(
                                        insurance_result))
                                    $("#special_result_footer").text(formatNumber(special_result))
                                    $("#insurance_result_fee_footer").text(formatNumber(value
                                        .reference.insurance_result_fee))
                                    $("#special_result_fee_footer").text(formatNumber(value.reference.special_result_fee))
                                    if (value.sfa != null) {
                                        $("#fee_shipping_inside_jp_footer").text(formatNumber(0))
                                        $("#fee_shipping_inside_vn_footer").text(formatNumber(value
                                            .sfa.shipping_inside))
                                    }

                                    if (value.boxes.length) {
                                        $("#table_price_shipping_footer_2").show()
                                        $("#table_body_price_shipping_footer").empty()
                                        $("#table_body_price_shipping_footer").append(
                                            '<tr>' +
                                            '<td>' + value.id + '</td>' +
                                            '<td>' + value.reference
                                            .total_weight + '</td>' +
                                            '<td>' + value.reference
                                            .fee_ship + '</td>' +
                                            '<td>' + method_ship + '</td>' +
                                            '<td>' + formatNumber(value.reference.total_fee) +
                                            ' VNĐ</td>' +
                                            '<td>' + formatNumber(Math.round(service_fee_paid)) +
                                            ' VNĐ</td>' +
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
                                    // if (value.logs.length) { //log thanh toán
                                    //     var matchedLogIdx = value.logs.findIndex((log) => {
                                    //         return !!log?.content?.transaction
                                    //     });
                                    //     $.each(value.logs, function(logs_index, logs_value) {
                                    //         let keyObjectLogMerge = Object.keys(logs_value
                                    //             .content)
                                    //         var statusLogMerge;
                                    //         if (matchedLogIdx === -1) {
                                    //             if (keyObjectLogMerge ==
                                    //                 "updated_at,service_fee_paid") {
                                    //                 total_pay += logs_value.content
                                    //                     .service_fee_paid
                                    //                 statusLogMerge = "Đã thanh toán " +
                                    //                     formatNumber(logs_value.content
                                    //                         .service_fee_paid)
                                    //             }
                                    //         } else {
                                    //             if (keyObjectLogMerge == "transaction") {
                                    //                 total_pay += logs_value.content
                                    //                     .transaction.amount
                                    //                 statusLogMerge = "Đã thanh toán " +
                                    //                     formatNumber(logs_value.content
                                    //                         .transaction.amount)
                                    //             }
                                    //         }

                                    //         if (statusLogMerge != undefined) {
                                    //             $("#time_line_tracking").append(
                                    //                 '<li>' +
                                    //                 '<a>' + statusLogMerge + '</a>' +
                                    //                 '<p>' + logs_value.created_at +
                                    //                 '</p>' +
                                    //                 '</li>'
                                    //             )
                                    //         }
                                    //     })
                                    // }
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
                                            `<tr id="sku-row-${value2.id}">` +
                                            '<td>' + value2.id +
                                            '</td>' +
                                            '<td>' + value2.weight +
                                            '</td>' +
                                            '<td>' + value2.volume +
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
                                            if (value.reference.length != 0) {
                                                $("#alert_footer").show()
                                                $("#id_order_footer").empty()
                                                $("#money_footer").empty()
                                                $("#id_order_footer").text(value.id)
                                                $("#money_footer").text(formatNumber(
                                                        value.reference.total_fee) +
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
                                                // $("#time_line_tracking").append(
                                                //     '<li>' +
                                                //     '<a>' + 'Đang tới kho' + '</a>' +
                                                //     '<p>' + created_at + '</p>' +
                                                //     '</li>'
                                                // )
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
                                                //                 total_pay +=
                                                //                     logs_value
                                                //                     .content
                                                //                     .transaction
                                                //                     .amount
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
                                                //             $("#time_line_tracking")
                                                //                 .append(
                                                //                     '<li>' +
                                                //                     '<a>' +
                                                //                     statusLogMerge +
                                                //                     '</a>' +
                                                //                     '<p>' +
                                                //                     logs_value
                                                //                     .created_at +
                                                //                     '</p>' +
                                                //                     '</li>'
                                                //                 )
                                                //         }
                                                //     })
                                                //     if (pay_money != undefined) {
                                                //         if (total_pay >= pay_money - 1000) {
                                                //             $("#alert_footer").hide()
                                                //             if (value.reference.length) {
                                                //                 $("#paid_footer").show()
                                                //             } else {
                                                //                 $("#paid_footer").hide()
                                                //             }
                                                //         }
                                                //     }
                                                // }
                                            } else {
                                                var size = "( Dài : " + value.boxes[0]
                                                    .length + "cm" + ",Rộng: " + value
                                                    .boxes[0].width + "cm" + ",Cao: " +
                                                    value.boxes[0].height + "cm )"
                                                $("#id_order_footer").empty()
                                                $("#money_footer").empty()
                                                if (value.reference.length != 0) {
                                                    $("#id_order_footer").text(value.id)
                                                    $("#money_footer").text(formatNumber(
                                                        value.reference.total_fee
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
                                                //                 total_pay +=
                                                //                     logs_value
                                                //                     .content
                                                //                     .transaction
                                                //                     .amount
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
                                                //             $("#time_line_tracking")
                                                //                 .append(
                                                //                     '<li>' +
                                                //                     '<a>' +
                                                //                     statusLogMerge +
                                                //                     '</a>' +
                                                //                     '<p>' +
                                                //                     logs_value
                                                //                     .created_at +
                                                //                     '</p>' +
                                                //                     '</li>'
                                                //                 )
                                                //         }
                                                //     })
                                                //     if (pay_money != undefined) {
                                                //         if (total_pay >= pay_money - 1000) {
                                                //             $("#alert_footer").hide()
                                                //             if (value.reference.length) {
                                                //                 $("#paid_footer").show()
                                                //             } else {
                                                //                 $("#paid_footer").hide()
                                                //             }
                                                //         }
                                                //     }
                                                // }
                                            }
                                        } else {
                                            $("#table_price_shipping_footer_2").show()
                                            // if (value.reference.length != 0) {
                                            //     $("#alert_footer").show()
                                            //     $("#id_order_footer").empty()
                                            //     $("#money_footer").empty()
                                            //     $("#id_order_footer").text(value.id)
                                            //     $("#money_footer").text(formatNumber(
                                            //             value.reference.total_fee) +
                                            //         " VNĐ")
                                            //     if (value.logs.length) {
                                            //         var total_pay = 0
                                            //         $.each(value.logs, function(logs_index,
                                            //             logs_value) {
                                            //             let keyObjectLogMerge =
                                            //                 Object.keys(logs_value
                                            //                     .content)
                                            //             var statusLogMerge;
                                            //             var created_at_log;
                                            //             if (keyObjectLogMerge ==
                                            //                 "transaction") {
                                            //                 total_pay += logs_value
                                            //                     .content.transaction
                                            //                     .amount
                                            //                 statusLogMerge =
                                            //                     "Đã thanh toán " +
                                            //                     formatNumber(
                                            //                         logs_value
                                            //                         .content
                                            //                         .transaction
                                            //                         .amount)
                                            //                 $("#time_line_tracking")
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
                                            //         if (pay_money != undefined) {
                                            //             if (total_pay >= pay_money - 1000) {
                                            //                 $("#alert_footer").hide()
                                            //                 if (value.reference.length) {
                                            //                     $("#paid_footer").show()
                                            //                 } else {
                                            //                     $("#paid_footer").hide()
                                            //                 }
                                            //             }
                                            //         }
                                            //     }
                                            // }
                                            $(`#sku-row-${value2.id}`).hover(function() {
                                                $(this).addClass(
                                                    "tr-color addHover");
                                            }, function() {
                                                $(this).removeClass(
                                                    "tr-color addHover");
                                            });
                                            $(`#sku-row-${value2.id}`).on('click',
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
                                if (service_fee_paid + 5000 >= value.reference.total_fee) {
                                    $("#alert_footer").hide();
                                    $("#paid_footer").hide();
                                }
                                if(value.reference.length!=0){
                                    if(value.reference.contract_id){
                                        $(".check-contract-footer").hide()
                                        $("#alert-contract-footer").show()
                                        $("#id_contract_footer").text(value.reference.contract_id)
                                    }
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

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function check_footer(id_box, vnpost, created_at, weight, fee, method, money, logs_merge, pay_money) {
        var id_box = id_box;
        const checkSession  = "{{ Session::has('idToken') }}"

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
                    idToken:idToken,
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
                    //             $("#time_line_tracking").append(
                    //                 '<li>' +
                    //                 '<a>' + statusLogMerge + '</a>' +
                    //                 '<p>' + logs_value.created_at + '</p>' +
                    //                 '</li>'
                    //             )
                    //         }
                    //     })
                    //     if (pay_money != undefined) {
                    //         if (total_pay >= pay_money - 1000) {
                    //             $("#alert_footer").hide()
                    //             if (value.reference.length) {
                    //                 $("#paid_footer").show()
                    //             } else {
                    //                 $("#paid_footer").hide()
                    //             }
                    //         }
                    //     }
                    // }
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
                if(user && checkSession){
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
                                idToken:token_gg,
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
                                //             $("#time_line_tracking").append(
                                //                 '<li>' +
                                //                 '<a>' + statusLogMerge + '</a>' +
                                //                 '<p>' + logs_value.created_at + '</p>' +
                                //                 '</li>'
                                //             )
                                //         }
                                //     })
                                //     if (pay_money != undefined) {
                                //         if (total_pay >= pay_money - 1000) {
                                //             $("#alert_footer").hide()
                                //             if (value.reference.length) {
                                //                 $("#paid_footer").show()
                                //             } else {
                                //                 $("#paid_footer").hide()
                                //             }
                                //         }
                                //     }
                                // }
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
                    var email = "sale@saikoexpress.com"
                    var password = "{{config('services.saiko.password')}}"
                    firebase.auth().signInWithEmailAndPassword(email, password)
                    .then((userCredential) => {
                        firebase.auth().currentUser.getIdToken(/* forceRefresh */ false).then(function(token_gg) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: "{{ route('rq_tk.getInforBox') }}",
                                data: {
                                    idToken:token_gg,
                                    id_box: id_box
                                },
                                success: function(res) {
                                    if(res?.code==401){
                                        refreshToken(res?.code);
                                    }
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
                                    //             $("#time_line_tracking").append(
                                    //                 '<li>' +
                                    //                 '<a>' + statusLogMerge + '</a>' +
                                    //                 '<p>' + logs_value.created_at + '</p>' +
                                    //                 '</li>'
                                    //             )
                                    //         }
                                    //     })
                                    //     if (pay_money != undefined) {
                                    //         if (total_pay >= pay_money - 1000) {
                                    //             $("#alert_footer").hide()
                                    //             if (value.reference.length) {
                                    //                 $("#paid_footer").show()
                                    //             } else {
                                    //                 $("#paid_footer").hide()
                                    //             }
                                    //         }
                                    //     }
                                    // }
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

</script>

</body>

</html>

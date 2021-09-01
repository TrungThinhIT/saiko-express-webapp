<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .ed_pagetitle {
        background-image: url(../assets/images/item.png) !important;
    }

    .inpute-insuaran {
        width: auto;
        font-size: 20px;
        height: 45px;
        line-height: 45px;
        border: 1px solid #ececec;
        padding-left: 15px;
        padding-right: 15px;
        color: #fca901;
        background-color: #fff;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .modal-confirm {
        color: #e49e9e;
        text-align: center;
    }

    .alert-danger {
        font-size: 15px !important;
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

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
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
        z-index: 4;
        position: fixed;
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
<script>
    function Select_Tinh(obj) {
        var Tinh_ThanhPho = $(obj).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('rq_tk.quanhuyen') }}",
            data: {
                province: Tinh_ThanhPho,
            },
            success: function(res) {
                $("#Uhuyen").empty()
                $("#UPhuongXa").empty()
                $("#Uhuyen").append(new Option('Vui lòng chọn', ''))
                $.each(res, function(index, value) {
                    $("#Uhuyen").append(new Option(value.name, value.id))
                })
            },
            error: function(res) {
                if (res.status == 419) {
                    window.location.reload()
                } else {
                    console.log(res)
                }
            }
        });
    }

    function Select_Huyen(obj) {
        var Huyen_Xa = $(obj).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('rq_tk.phuongxa') }}",
            data: {
                district: Huyen_Xa,
            },
            success: function(res) {
                $("#UPhuongXa").empty()
                $("#UPhuongXa").append(new Option('Vui lòng chọn', ''))
                $.each(res, function(index, value) {
                    $("#UPhuongXa").append(new Option(value.name, value.id))
                })
            },
            error: function(res) {
                if (res.status == 419) {
                    window.location.reload()
                } else {
                    console.log(res)
                }
            }
        });
    }

</script>
@include('modules.header')

<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>THÔNG TIN KIỆN HÀNG</h2>
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
<section class="whychoose-1 secpadd layout-main">
    <div class="container">
        <div class="row quote1top">
            <div class="col-sm-8">
                <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                    <h2>nhập thông tin kiện hàng</h2>
                </div>
                {{-- <div class="alert alert-danger">
                    <p>Hệ thống đang cập nhật</p>
                </div> --}}
                {{-- <p>Chúng tôi luôn quan tâm đến các dự án mới, dù lớn hay nhỏ. Gửi email cho chúng tôi và chúng tôi sẽ
                    liên lạc ngay hoặc điện thoại trong khoảng thời gian từ 9:00 sáng đến 8:00 tối từ thứ Hai đến thứ
                    Bảy.</p> --}}
                <p>Gọi hotline hoặc nhắn tin trực tiếp trên Fanpage Saiko Express (từ 8h đến 19h hàng ngày) để được CSKH
                    hỗ trợ nhập thông tin kiện hàng dưới đây:</p>
            </div>

            {{-- <div class="col-sm-4">
                <img src="assets/images/cargocar.png" alt="">
            </div> --}}
        </div>
        <br>
        <div class="row quote1forms">
            <div class="col-md-12">
                <form action="{{ route('rq_tk.store') }}" method="POST">
                    @csrf
                    <div class="fh-form request-form" style="margin-bottom:40px">
                        <div class="row">
                            <div class="field col-md-4">
                                <label>Nhập mã Tracking<span class="require">*</span></label>
                                <input placeholder="Nhập số tracking" name="tracking" id="utracking"
                                    value="{{ old('tracking') }}" type="text" required>
                            </div>
                            <div class="field col-md-4">
                                <label>Tên người gửi<span class="require">*</span></label>
                                <input placeholder="Tên Facebook hoặc người làm việc với SAIKO"
                                    value="{{ old('name') }}" name="name" id="uname_send" type="text" required>
                            </div>
                            <div class="field col-md-4">
                                <label>Số điện thoại người gửi<span class="require">*</span></label>
                                <input placeholder="SĐT để nhận thông báo từ Saiko" id="number_send" name="phone"
                                    value="{{ old('phone') }}" type="text" required>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <label>Tên người nhận<span class="require">*</span></label>
                                    <input placeholder="Nhập tên người nhận" id="uname_rev"
                                        value="{{ old('name_arr') }}" name="name_arr" type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Số điện thoại người nhận<span class="require">*</span></label>
                                    <input placeholder="Nhập số điện thoại" id="uphone" value="{{ old('phone_arr') }}"
                                        name="phone_arr" type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Hình thức nhận hàng</label>
                                    <select id="utypeadd" name="hinhthuc" onchange="onChange()">
                                        {{-- <option value="Nhận tại VP Sóc Sơn">Nhận tại VP Sóc Sơn, Hà Nội</option> --}}
                                        {{-- <option value="Nhận tại VP Đào Tấn">Nhận tại VP Đào Tấn, Hà Nội </option> --}}
                                        {{-- <option value="Nhận tại VP Tân Bình HCM" id="trip_sea" style="display: none">Nhận tại VP Tân Bình HCM</option> --}}
                                        <option value="blank" id="first_option">Địa chỉ cụ thể</option>
                                        <!--<option value="Nhận tại VP Tây Hồ">Nhận tại VP Tây Hồ</option>-->
                                        <!-- <option value="FOB">Nhận trực tiếp tại VN</option> -->

                                    </select>
                                </div>
                                <div id="type-ship" class="d-block">
                                    <div class="col-md-4" style="margin-top:10px">
                                        <p class="field">
                                            <label>Tỉnh/Thành Phố<span class="require">*</span></label>
                                            <select id="Utinh" name="tinh" onchange="Select_Tinh(this)">
                                                <option value="">Vui lòng chọn</option>
                                                @foreach ($data as $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tinh')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-md-4" style="margin-top:10px">
                                        <p class="field">
                                            <label>Quận Huyện<span class="require">*</span></label>
                                            <select id="Uhuyen" name="huyen" onchange="Select_Huyen(this)">
                                            </select>
                                            @error('huyen')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-md-4" style="margin-top:10px">
                                        <p class="field">
                                            <label>Phường Xã<span class="require">*</span></label>
                                            <select id="UPhuongXa" name="xa">
                                            </select>
                                            @error('xa')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </p>
                                    </div>

                                    <p class="field">
                                        <label style="margin-top:10px">Thông tin số nhà tên đường<span
                                                class="require">*</span></label>
                                        <input placeholder="Nhập số nhà của bạn" value="{{ old('duong') }}"
                                            name="duong" id="UaddNumber" type="text">
                                        @error('duong')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="field check-box">
                                    <label>Hình thức<span class="require">*</span></label>
                                    <span class="checkbox-box">
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Air" id="uair"
                                                    type="radio" checked>Vận chuyển đường bay</label></span>
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Sea" id="usea"
                                                    type="radio">Vận chuyển đường biển</label></span>
                                        <span class="checkbox_item " style="display:none"><label><input id="ureparking"
                                                    name="donggoi" value="Repark" type="checkbox">Đóng gói lại kiện hàng
                                            </label></span>
                                        <span class="checkbox_item" style="display:none"><label><input id="merge_box"
                                                    name="merge_box" value="1" type="checkbox">Gộp thùng
                                            </label></span>
                                    </span>
                                </p>
                                <p class="field submit">
                                    <button class="btn fh-btn" name="push-tracking" onclick="push_tracking()"
                                        type="submit">Nhập thông tin kiện hàng</button>
                                </p>
                                <p>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('fail'))
                                        <div class="alert alert-success">
                                            {{ session('fail') }}
                                        </div>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="tmn-custom-mask d-none" id="loader">
        <div class="loader"></div>
    </div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            style="z-index: 9999">
            <div class="modal-dialog modal-sm  modal-confirm" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <h5 class="modal-confirm" id="message"></h5>
                    <div class="modal-footer">
                        <table class="table" style="border: none !important" id="table_showCreatedTrackings">
                        </table>
                        <button class="btn btn-err btn-danger btn-block" data-dismiss="modal"
                            id="exitForm">Thoát</button>
                        <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                            id="exitSuccess" style="display:none">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" style="margin-top:80px !important" tabindex="-1" role="dialog" id="show_result">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-footer">
                    <table class="table" style="border: none !important" id="table_showResultCreatedTrackings">
                    </table>
                    <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                        id="exitSuccess" style="display:block; width:30% !important;margin:auto;">Thoát</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal " tabindex="-1" role="dialog" id="modal_qoute" style="overflow-y: auto;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Khai báo đơn hàng</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true" id="">&times;</span> --}}
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="background-color: #fca901">
                        <div style="margin-left:15px">
                            <div class="text-danger">
                                <label for="">
                                    Địa chỉ nhận hàng:
                                </label>
                                <span id="address_modal">

                                </span>
                            </div>

                        </div>
                        <div style="margin-left:15px">
                            <div class="text-danger">
                                <label for="">
                                    Hình thức:
                                </label>
                                <span id="method_modal">

                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-left:15px">
                            <label for=""> Bạn có muốn đăng ký báo bảo hiểm không? </label>
                            <input type="checkbox" id="check_BH"><span>.Có</span>
                            <input type="checkbox" id="check_specialty"><span>.Không</span>
                        </div>
                    </div>
                    <div class="row" id="enter_insurance" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Phí bảo hiểm là 3% giá trị kiện hàng
                            </p>
                            <p class="text">Lưu ý: Chúng tối không nhận bảo hiểm đối với hàng dễ vỡ, hư hỏng như là thuỷ
                                tinh, máy móc chính xác,...</p>
                            <label for="">Nhập số tiền:</label>
                            <input class="inpute-insuaran" type="text" pattern="[0-9]" id="insurance_enter" value=""
                                min="0">
                        </div>
                    </div>
                    <div class="row" id="alert_insurance" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Nếu không đóng bảo hiểm chúng tôi chỉ đền bù 4 lần phí vận chuyển trong trường hợp hư
                                hỏng và mất mát hàng hoá. Xin cân nhắc nếu kiện hàng của bạn có giá trị cao
                            </p>
                        </div>
                    </div>
                    <div class="row" id="declaration_price">
                        <div style="margin-left:15px">
                            <label for=""> Kiện hàng của bạn có chứa những hàng hoá đặc biệt dưới đây không?</label>
                            <input type="checkbox" id="check_type_special"><span>.Có</span>
                            <input type="checkbox" id="check_type_special_no"><span>.Không</span>
                            <p class="text-danger" style="font-weight: 500">Loa / Ampli / Điện thoại di động / Ipad /
                                Laptop / Rượu / Đồng hồ đeo tay / Đồ cổ</p>
                        </div>
                    </div>
                    <div class="row" id="enter_special" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Phụ phí thông quan khi nhập cảng Việt Nam là 2% giá trị hàng đặc biệt
                            </p>
                            <label for="">Nhập số tiền:</label>
                            <input class="inpute-insuaran" type="text" pattern="[0-9]" id="special_enter" value=""
                                min="0">
                        </div>
                    </div>
                    <div class="row" id="alert_special" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Các hàng hóa thuộc danh sách trên nếu không được khai báo sẽ bị phạt cước vận chuyển tùy
                                theo số lượng và giá trị món hàng
                            </p>
                        </div>
                    </div>
                    <p class="field single-field">
                        <label style="margin-top:10px">Ghi chú</label>
                    </p>
                    <p class="field single-field">
                        <textarea id="unote" name="note" style="height: 100px;width:100%"
                            placeholder="Nhập ghi chú hoặc mô tả chi tiết hàng hoá đặc biệt ...."></textarea>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn fh-btn" id="send_infor_tracking">Gửi hàng</button>
                    <button type="button" class="btn fh-btn" style="background-color: silver !important"
                        data-dismiss="modal" id="close_modal">Close</button>
                </div>
            </div>
        </div>
</section>
@include('modules.footer')
<script>
    let id_session = "{{Session::get('idToken')}}"

    function toggleLoading() {
        $('.tmn-custom-mask').toggleClass('d-none');
    }

    $('#check_BH').click(function() {
        $("#check_specialty").prop('checked', false);
        $('#enter_insurance').show()
        $("#alert_insurance").hide()
        $('#insurance_enter').val('0')
    });
    $('#check_specialty').click(function() {
        $("#check_BH").prop('checked', false);
        $('#declaration_price').show()
        $("#alert_insurance").show()
        $('#enter_insurance').hide()
        $('#insurance_enter').val('0')
    });

    $('#check_type_special').click(function() {
        $("#check_type_special_no").prop('checked', false);
        $('#enter_special').show()
        $("#alert_special").hide()
        $('#special_enter').val('0')
    });

    $('#check_type_special_no').click(function() {
        $("#check_type_special").prop('checked', false);
        $('#enter_special').hide()
        $("#alert_special").show()
        $('#special_enter').val('0')
    });
    $(document).ready(function() {
        $('#insurance_enter').maskNumber({
            integer: true,
        });
        $('#special_enter').maskNumber({
            integer: true,
        });
        $("#close_modal").click(function() {
            $("#modal_qoute").hide()
        })
        $('#utracking').blur(function() {
            var tracking = $('#utracking').val();
            if (!tracking) {
                document.getElementById("utracking").style.borderColor = 'red'
            } else {
                document.getElementById("utracking").style.borderColor = ''
            }
        });

        $('#uname_send').blur(function() {
            var uname_send = $('#uname_send').val();
            if (!uname_send) {
                document.getElementById("uname_send").style.borderColor = 'red'
            } else {
                document.getElementById("uname_send").style.borderColor = ''
            }
        });

        $('#uname_rev').blur(function() {
            var uname_rev = $('#uname_rev').val();
            if (!uname_rev) {
                document.getElementById("uname_rev").style.borderColor = 'red'
            } else {
                document.getElementById("uname_rev").style.borderColor = ''
            }
        });

        $('#uadd').blur(function() {
            var uadd = $('#uadd').val();
            if (!uadd) {
                document.getElementById("uadd").style.borderColor = 'red'
            } else {
                document.getElementById("uadd").style.borderColor = ''
            }
        });

        $('#uphone').blur(function() {
            var uphone = $('#uphone').val();
            if (!uphone) {
                document.getElementById("uphone").style.borderColor = 'red'
            } else {
                document.getElementById("uphone").style.borderColor = ''
            }
        });
        $(document).ajaxStart(function() {
            $("#loader").show();
        });
        $(document).ajaxStop(function() {
            $("#loader").hide();
        });
        // $("#uair").on("click",function(){
        //     $("#uair").one("change",function(){
        //         if($("#uair").prop('checked')){
        //             $("#trip_sea").css('display','none')
        //             $("#first_option").attr('selected')
        //             // $("#utypeadd").val($("#utypeadd option:selected"))
        //             $("#utypeadd").val("Nhận tại VP Sóc Sơn").change();
        //         }
        //     })
        // })
        // $("#usea").on("click",function(){
        //     $("#usea").one("change",function(){
        //         if($("#usea").prop('checked')){
        //             $("#trip_sea").css('display','unset')
        //             $("#first_option").attr('selected')
        //             $("#utypeadd").val("Nhận tại VP Sóc Sơn").change();
        //         }
        //     })
        // })
        $("#send_infor_tracking").click(function() {

            let OptionAdd = $('#utypeadd').val();
            let AddRev = $("#UaddNumber").val();
            if (OptionAdd.length > 5) {
                AddRev = OptionAdd;
            }
            let str = $("#utracking").val();
            let mapObj = {
                "_": "",
                " ": " ",
                "-": "",
                ",": " ",
            };
            let Tracking = str.replace(/-| |_|,/gi, function(matched) {
                return mapObj[matched];
            });
            let checkAir = document.getElementById('uair').value;
            let checkSea = document.getElementById('usea').value;
            let province = $("#Utinh").val();
            let district = $("#Uhuyen").val();
            let ward = $("#UPhuongXa").val();
            let Phone = $("#uphone").val();
            let Name_Send = $("#uname_send").val();
            let Number_Send = $("#number_send").val();
            let Name_Rev = $("#uname_rev").val();
            let Type = $("#utype").val();
            let Reparking = document.getElementById('ureparking').checked;
            let ShipAir = document.getElementById('uair').checked;
            let ShipSea = document.getElementById('usea').checked;
            let merge_box = $("#merge_box:checked").val()
            // return
            let Upx = $('#UPhuongXa').val();
            let Code_Add = $("#Uhuyen option:selected").val() + "," + $("#Utinh option:selected").val();
            let UaddNumber = $("#UaddNumber").val();
            let uphone = $("#uphone").val();
            let utypeadd = $("#utypeadd").val();
            let special_price = $("#special_enter").val();
            let insurance_price = $("#insurance_enter").val();
            let Note = $("#unote").val();
            let check_insurance = parseFloat(insurance_price.replaceAll(",", ""))
            let check_special = parseFloat(special_price.replaceAll(",", ""))
            if (parseFloat(insurance_price) < 0) {
                alert('Số tiền không được nhỏ hơn 0')
            }
            if ($('#check_specialty').prop('checked') == false && $('#check_BH').prop('checked') ==
                false) {
                alert('Vui lòng chọn khai báo bảo hiểm')
                return
            }
            if (ShipAir) {
                if (check_insurance > 20000000) {
                    alert('Bảo hiểm đơn hàng đường bay không được lớn hơn 20,000,000')
                    return
                }
                if (check_special > 999999999999) {
                    alert('Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999')
                    return
                }
            } else {
                if (check_insurance > 50000000) {
                    alert('Bảo hiểm đơn hàng đường biển không được lớn hơn 50,000,000')
                    return
                }
                if (check_special > 999999999999) {
                    alert('Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999')
                    return
                }
            }
            if ($('#check_type_special').prop('checked') == false && $('#check_type_special_no').prop(
                    'checked') == false) {
                alert('Vui lòng chọn khai báo hàng đặc biệt')
                return
            }
            $("#first_choose").attr("selected", true)
            $("#modal_qoute").hide()
            $("#table_showCreatedTrackings").empty()

            if (id_session != "") {
                if (checkToken()) {
                    let idToken = getToken();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('rq_tk.store') }}",
                        data: {
                            token: idToken,
                            special_price: special_price,
                            insurance: insurance_price,
                            utypeadd: utypeadd,
                            TrackingSaiko: Tracking,
                            Phone: Phone,
                            Name_Send: Name_Send,
                            Number_Send: Number_Send,
                            Name_Rev: Name_Rev,
                            Add: AddRev,
                            Type: Type,
                            Note: Note,
                            Reparking: Reparking,
                            ShipAir: ShipAir,
                            ShipSea: ShipSea,
                            Location: '203.205.41.135',
                            Code_Add: Code_Add,
                            province: province,
                            district: district,
                            ward: ward,
                            checkAir: checkAir,
                            checkSea: checkSea,
                            merge_box: merge_box,
                        },
                        success: function(response) {
                            $("#table_showResultCreatedTrackings").empty()
                            $.each(response, function(index, value) {
                                if (value.code == 401) {
                                    removeToken()
                                    firebase.auth().signOut().then(() => {
                                        // Sign-out successful.
                                        swal({
                                            title: "Vui lòng đăng nhập lại",
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        }).then((check) => {
                                            window.location.href ="{{ route('auth.logout') }}"
                                        })
                                    }).catch((error) => {
                                        swal({
                                            title: "Warning logout:" + error.message,
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        }).then((check) => {
                                            window.location.href = "{{ route('auth.logout') }}"
                                        })
                                    });
                                }
                                if (value.code == 201) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:green;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<i class='fa fa-check' style='color:green'></i>" +
                                        "</td>" +
                                        "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                                if (value.code == 405) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:#fca901;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<span><i class='fa fa-warning'></i></span>" +
                                        "</td>" + "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                                if (value.code == 422) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:red;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<span><i class='fa fa-times'></i></span>" +
                                        "</td>" +
                                        "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                            })

                        },
                        error: function(res) {
                            if (res.status == 419) {
                                window.location.reload()
                            } else {
                                console.log(res)
                            }
                        }
                    });
                } else {
                    firebase.auth().onAuthStateChanged((user) => {
                        if (user) {
                            firebase.auth().currentUser.getIdToken( /* forceRefresh */ true)
                            .then(function(token_gg) {
                                setToken(token_gg)
                                let idToken = getToken();
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    type: 'POST',
                                    url: "{{ route('rq_tk.store') }}",
                                    data: {
                                        token: idToken,
                                        special_price: special_price,
                                        insurance: insurance_price,
                                        utypeadd: utypeadd,
                                        TrackingSaiko: Tracking,
                                        Phone: Phone,
                                        Name_Send: Name_Send,
                                        Number_Send: Number_Send,
                                        Name_Rev: Name_Rev,
                                        Add: AddRev,
                                        Type: Type,
                                        Note: Note,
                                        Reparking: Reparking,
                                        ShipAir: ShipAir,
                                        ShipSea: ShipSea,
                                        Location: '203.205.41.135',
                                        Code_Add: Code_Add,
                                        province: province,
                                        district: district,
                                        ward: ward,
                                        checkAir: checkAir,
                                        checkSea: checkSea,
                                        merge_box: merge_box,
                                    },
                                    success: function(response) {
                                        $("#table_showResultCreatedTrackings")
                                            .empty()
                                        $.each(response, function(index,
                                            value) {
                                            if (value.code == 401) {
                                                firebase.auth().signOut().then(() => {
                                                    // Sign-out successful.
                                                    swal({
                                                        title: "Vui lòng đăng nhập lại",
                                                        type: "warning",
                                                        icon: "warning",
                                                        showCancelButton: false,
                                                        confirmButtonColor: "#fca901",
                                                        confirmButtonText: "Exit",
                                                        closeOnConfirm: true
                                                    }).then((check) => {
                                                        window.location.href = "{{ route('auth.index') }}"
                                                    })
                                                }).catch((error) => {
                                                    swal({
                                                        title: "Warning:" + error.message,
                                                        type: "warning",
                                                        icon: "warning",
                                                        showCancelButton: false,
                                                        confirmButtonColor: "#fca901",
                                                        confirmButtonText: "Exit",
                                                        closeOnConfirm: true
                                                    }).then((check) => {
                                                            window.location.href = "{{ route('auth.index') }}"
                                                        }
                                                    )
                                                });
                                            }
                                            if (value.code == 201) {
                                                $("#table_showResultCreatedTrackings")
                                                    .append(
                                                        "<tr style='border:none'>" +
                                                        "<td style='color:green;border:none !important;text-align:center'>" +
                                                        value
                                                        .message +
                                                        " " +
                                                        "<i class='fa fa-check' style='color:green'></i>" +
                                                        "</td>" +
                                                        "</tr>"
                                                    )
                                                $('#message').html('');
                                                $('#exitForm').hide();
                                                $('#exitSuccess').show();
                                                $('#show_result').show();
                                            }
                                            if (value.code == 405) {
                                                $("#table_showResultCreatedTrackings")
                                                    .append(
                                                        "<tr style='border:none'>" +
                                                        "<td style='color:#fca901;border:none !important;text-align:center'>" +
                                                        value
                                                        .message +
                                                        " " +
                                                        "<span><i class='fa fa-warning'></i></span>" +
                                                        "</td>" +
                                                        "</tr>"
                                                    )
                                                $('#message').html('');
                                                $('#exitForm').hide();
                                                $('#exitSuccess').show();
                                                $('#show_result').show();
                                            }
                                            if (value.code == 422) {
                                                $("#table_showResultCreatedTrackings")
                                                    .append(
                                                        "<tr style='border:none'>" +
                                                        "<td style='color:red;border:none !important;text-align:center'>" +
                                                        value
                                                        .message +
                                                        " " +
                                                        "<span><i class='fa fa-times'></i></span>" +
                                                        "</td>" +
                                                        "</tr>"
                                                    )
                                                $('#message').html('');
                                                $('#exitForm').hide();
                                                $('#exitSuccess').show();
                                                $('#show_result').show();
                                            }
                                        })

                                    },
                                    error: function(res) {
                                        if (res.status == 419) {
                                            window.location.reload()
                                        } else {
                                            console.log(res)
                                        }
                                    }
                                });
                            }).catch((error) => {
                                swal("warning", error.message)
                            })
                        }
                    });
                }

            } else {
                var email = "sale@saikoexpress.com";
                var password = "{{config('services.saiko.password')}}";
                if (checkToken()) {
                    let idToken = getToken();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('rq_tk.store') }}",
                        data: {
                            token: idToken,
                            special_price: special_price,
                            insurance: insurance_price,
                            utypeadd: utypeadd,
                            TrackingSaiko: Tracking,
                            Phone: Phone,
                            Name_Send: Name_Send,
                            Number_Send: Number_Send,
                            Name_Rev: Name_Rev,
                            Add: AddRev,
                            Type: Type,
                            Note: Note,
                            Reparking: Reparking,
                            ShipAir: ShipAir,
                            ShipSea: ShipSea,
                            Location: '203.205.41.135',
                            Code_Add: Code_Add,
                            province: province,
                            district: district,
                            ward: ward,
                            checkAir: checkAir,
                            checkSea: checkSea,
                            merge_box: merge_box,
                        },
                        success: function(response) {
                            $("#table_showResultCreatedTrackings").empty()
                            $.each(response, function(index, value) {
                                if (value.code == 401) {
                                    removeToken()
                                    firebase.auth().signOut().then(() => {
                                        // Sign-out successful.
                                        swal({
                                            title: "Vui lòng đăng nhập lại",
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        }).then((check) => {
                                            window.location.href ="{{ route('auth.logout') }}"
                                        })
                                    }).catch((error) => {
                                        swal({
                                            title: "Warning logout:" + error.message,
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        }).then((check) => {
                                            window.location.href = "{{ route('auth.logout') }}"
                                        })
                                    });
                                }
                                if (value.code == 201) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:green;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<i class='fa fa-check' style='color:green'></i>" +
                                        "</td>" +
                                        "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                                if (value.code == 405) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:#fca901;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<span><i class='fa fa-warning'></i></span>" +
                                        "</td>" + "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                                if (value.code == 422) {
                                    $("#table_showResultCreatedTrackings").append(
                                        "<tr style='border:none'>" +
                                        "<td style='color:red;border:none !important;text-align:center'>" +
                                        value
                                        .message + " " +
                                        "<span><i class='fa fa-times'></i></span>" +
                                        "</td>" +
                                        "</tr>"
                                    )
                                    $('#message').html('');
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#show_result').show();
                                }
                            })

                        },
                        error: function(res) {
                            if (res.status == 419) {
                                window.location.reload()
                            } else {
                                console.log(res)
                            }
                        }
                    });
                }else{
                    firebase.auth().signInWithEmailAndPassword(email, password)
                    .then((userCredential) => {
                        firebase.auth().currentUser.getIdToken( /* forceRefresh */ false).then(
                            function(token_gg) {
                                setToken(token_gg)
                                let idToken = getToken();
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]'
                                        ).attr('content')
                                    },
                                    type: 'POST',
                                    url: "{{ route('rq_tk.store') }}",
                                    data: {
                                        token: idToken,
                                        special_price: special_price,
                                        insurance: insurance_price,
                                        utypeadd: utypeadd,
                                        TrackingSaiko: Tracking,
                                        Phone: Phone,
                                        Name_Send: Name_Send,
                                        Number_Send: Number_Send,
                                        Name_Rev: Name_Rev,
                                        Add: AddRev,
                                        Type: Type,
                                        Note: Note,
                                        Reparking: Reparking,
                                        ShipAir: ShipAir,
                                        ShipSea: ShipSea,
                                        Location: '203.205.41.135',
                                        Code_Add: Code_Add,
                                        province: province,
                                        district: district,
                                        ward: ward,
                                        checkAir: checkAir,
                                        checkSea: checkSea,
                                        merge_box: merge_box,
                                    },
                                    success: function(response) {
                                        $("#table_showResultCreatedTrackings")
                                            .empty()
                                        $.each(response, function(
                                            index, value) {
                                            if (value.code == 401) {
                                                swal({
                                                    title: "Mã xác thực hết hạn. Load lại trang",
                                                    type: "warning",
                                                    icon: "warning",
                                                    showCancelButton: false,
                                                    confirmButtonColor: "#fca901",
                                                    confirmButtonText: "Exit",
                                                    closeOnConfirm: true
                                                }).then((check) => {
                                                    window.location.href = "{{ route('auth.index') }}"
                                                })
                                            }
                                            if (value.code == 201) {
                                                $("#table_showResultCreatedTrackings").append(
                                                    "<tr style='border:none'>" +
                                                    "<td style='color:green;border:none !important;text-align:center'>" +
                                                    value
                                                    .message +
                                                    " " +
                                                    "<i class='fa fa-check' style='color:green'></i>" +
                                                    "</td>" +
                                                    "</tr>"
                                                )
                                            }
                                            if (value.code == 405) {
                                                $("#table_showResultCreatedTrackings").append(
                                                    "<tr style='border:none'>" +
                                                    "<td style='color:#fca901;border:none !important;text-align:center'>" +
                                                    value
                                                    .message +
                                                    " " +
                                                    "<span><i class='fa fa-warning'></i></span>" +
                                                    "</td>" +
                                                    "</tr>"
                                                )
                                            }
                                            if (value.code == 422) {
                                                $("#table_showResultCreatedTrackings").append(
                                                    "<tr style='border:none'>" +
                                                    "<td style='color:red;border:none !important;text-align:center'>" +
                                                    value.message +
                                                    " " +
                                                    "<span><i class='fa fa-times'></i></span>" +
                                                    "</td>" +
                                                    "</tr>"
                                                )
                                            }
                                        })
                                        $('#message').html('');
                                        $('#exitForm').hide();
                                        $('#exitSuccess').show();
                                        $('#show_result').show();
                                    },
                                    error: function(res) {
                                        if (res.status == 419) {
                                            swal({
                                                title: "Mã duyệt hết hạn. Load lại trang",
                                                type: "warning",
                                                icon: "warning",
                                                showCancelButton: false,
                                                confirmButtonColor: "#fca901",
                                                confirmButtonText: "Exit",
                                                closeOnConfirm: true
                                            }).then(()=>{
                                                window.location.reload()
                                            })
                                        } else {
                                            console.log(res)
                                        }
                                    }
                                });
                            }).catch((error) => {
                                swal({
                                    title: "Warning get token:" + error.message,
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                })
                        })
                    }).catch((error) => {
                        swal({
                            title: "Warning :" + error.message,
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                    })
                }

            }

        })


    });

    function exitSuccess() {
        location.reload();
    }

    function onChange() {
        var utype = document.getElementById("utypeadd").value;
        if (utype != 'blank') {
            document.getElementById("type-ship").style.display = "none";
        } else {
            document.getElementById("type-ship").style.display = "block";
        }
    }

    function push_tracking() {
        event.preventDefault();
        var OptionAdd = $('#utypeadd').val();
        var AddRev = $("#UaddNumber").val();
        if (OptionAdd.length > 5) {
            AddRev = OptionAdd;
        }
        var str = $("#utracking").val();
        var mapObj = {
            "_": "",
            " ": " ",
            "-": "",
            ",": " ",
        };
        var Tracking = str.replace(/-| |_|,/gi, function(matched) {
            return mapObj[matched];
        });
        var checkAir = document.getElementById('uair').value;
        var checkSea = document.getElementById('usea').value;
        var province = $("#Utinh").val();
        var district = $("#Uhuyen").val();
        var ward = $("#UPhuongXa").val();
        var Phone = $("#uphone").val();
        var Name_Send = $("#uname_send").val();
        var Number_Send = $("#number_send").val();
        var Name_Rev = $("#uname_rev").val();
        var Type = $("#utype").val();
        var Reparking = document.getElementById('ureparking').checked;
        var ShipAir = document.getElementById('uair').checked;
        var ShipSea = document.getElementById('usea').checked;
        var merge_box = $("#merge_box:checked").val()
        // return
        var Upx = $('#UPhuongXa').val();
        var Code_Add = $("#Uhuyen option:selected").val() + "," + $("#Utinh option:selected").val();
        var UaddNumber = $("#UaddNumber").val();
        var uphone = $("#uphone").val();
        var utypeadd = $("#utypeadd").val();
        if (OptionAdd.length <= 5) {
            if (Upx == null || Upx == "") {
                $('#message').html('Xin vui lòng chọn Thành Phố Quận/Huyện ');
                $('#myModal').modal('show');
                return
            }
            if (UaddNumber.length <= 4) {
                $('#message').html('Nhập thiếu số nhà tên đường');
                $('#myModal').modal('show');
            }
        }
        if (Tracking.length <= 7) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu tracking');
            $('#myModal').modal('show');
        } else if (Name_Send.length < 3) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu tên người gửi!');
            $('#myModal').modal('show');
        } else if (Number_Send == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập chưa đúng số điện thoại người gửi!');
            $('#myModal').modal('show');
        } else if (Number_Send <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu số điện thoại người gửi!');
            $('#myModal').modal('show');
        } else if (Name_Rev == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu tên người nhận!');
            $('#myModal').modal('show');
        } else if (Name_Rev.length < 3) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Tên người nhận quá ngắn!');
            $('#myModal').modal('show');
        } else if (AddRev.length < 4) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu địa chỉ!');
            $('#myModal').modal('show');
        } else if (Phone == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Chưa nhập số điện thoại người nhận!');
            $('#myModal').modal('show');
        } else if (Phone.length <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu số điện thoại người nhận');
            $('#myModal').modal('show');
        } else if (uphone == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập số điện thoại người nhận');
            $('#myModal').modal('show');
        } else if (Number_Send.length <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nhập thiếu số điện thoại người gửi');
            $('#myModal').modal('show');
        } else {
            if (Tracking.length > 7 && Phone.length > 8 && Name_Send.length > 2 && Name_Rev.length > 2 && Number_Send
                .length > 8 && (ShipAir == true | ShipSea == true) && (Upx != null || OptionAdd.length > 5) && (
                    UaddNumber.length >= 4 || OptionAdd.length > 5)) {
                $("#address_modal").empty()
                $("#method_modal").empty()
                var address_modal = '';
                var method_modal = '';
                if (OptionAdd.length > 5) {
                    address_modal = $("#utypeadd option:selected").text()
                } else {
                    address_modal = $("#UaddNumber").val() + ',' + $("#UPhuongXa option:selected").text() + ',' + $(
                        "#Uhuyen option:selected").text() + ',' + $("#Utinh option:selected").text()
                }
                if (ShipAir) {
                    method_modal = 'Vận chuyển đường bay'
                } else {
                    method_modal = 'Vận chuyển đường biển'
                }
                $("#address_modal").text(address_modal)
                $("#method_modal").text(method_modal)
                $("#modal_qoute").show()
            }
        }
    }

</script>
</body>

</html>

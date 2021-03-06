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
                $("#Uhuyen").append(new Option('Vui l??ng ch???n', ''))
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
                $("#UPhuongXa").append(new Option('Vui l??ng ch???n', ''))
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
                    <h2>TH??NG TIN KI???N H??NG</h2>
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
                    <h2>nh???p th??ng tin ki???n h??ng</h2>
                </div>
                {{-- <div class="alert alert-danger">
                    <p>H??? th???ng ??ang c???p nh???t</p>
                </div> --}}
                {{-- <p>Ch??ng t??i lu??n quan t??m ?????n c??c d??? ??n m???i, d?? l???n hay nh???. G???i email cho ch??ng t??i v?? ch??ng t??i s???
                    li??n l???c ngay ho???c ??i???n tho???i trong kho???ng th???i gian t??? 9:00 s??ng ?????n 8:00 t???i t??? th??? Hai ?????n th???
                    B???y.</p> --}}
                <p>G???i hotline ho???c nh???n tin tr???c ti???p tr??n Fanpage Saiko Express (t??? 8h ?????n 19h h??ng ng??y) ????? ???????c CSKH
                    h??? tr??? nh???p th??ng tin ki???n h??ng d?????i ????y:</p>
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
                                <label>Nh???p m?? Tracking<span class="require">*</span></label>
                                <input placeholder="Nh???p s??? tracking" name="tracking" id="utracking" value="{{ old('tracking') }}" type="text" required>
                            </div>
                            <div class="field col-md-4">
                                <label>T??n ng?????i g???i<span class="require">*</span></label>
                                <input placeholder="T??n Facebook ho???c ng?????i l??m vi???c v???i SAIKO" value="{{ old('name') }}" name="name" id="uname_send" type="text" required>
                            </div>
                            <div class="field col-md-4">
                                <label>S??? ??i???n tho???i ng?????i g???i<span class="require">*</span></label>
                                <input placeholder="S??T ????? nh???n th??ng b??o t??? Saiko" id="number_send" name="phone" value="{{ old('phone') }}" type="text" required>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <label>T??n ng?????i nh???n<span class="require">*</span></label>
                                    <input placeholder="Nh???p t??n ng?????i nh???n" id="uname_rev" value="{{ old('name_arr') }}" name="name_arr" type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>S??? ??i???n tho???i ng?????i nh???n<span class="require">*</span></label>
                                    <input placeholder="Nh???p s??? ??i???n tho???i" id="uphone" value="{{ old('phone_arr') }}" name="phone_arr" type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>H??nh th???c nh???n h??ng</label>
                                    <select id="utypeadd" name="hinhthuc" onchange="onChange()">
                                        <option value="blank" id="first_option">?????a ch??? c??? th???</option>
                                        <option value="vp-ba-dinh">Nh???n t???i V??n ph??ng Ba ????nh, H?? N???i </option>
                                    </select>
                                </div>
                                <div id="type-ship" class="d-block">
                                    <div class="col-md-4" style="margin-top:10px">
                                        <p class="field">
                                            <label>T???nh/Th??nh Ph???<span class="require">*</span></label>
                                            <select id="Utinh" name="tinh" onchange="Select_Tinh(this)">
                                                <option value="">Vui l??ng ch???n</option>
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
                                            <label>Qu???n Huy???n<span class="require">*</span></label>
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
                                            <label>Ph?????ng X??<span class="require">*</span></label>
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
                                        <label style="margin-top:10px">Th??ng tin s??? nh?? t??n ???????ng<span class="require">*</span></label>
                                        <input placeholder="Nh???p s??? nh?? c???a b???n" value="{{ old('duong') }}" name="duong" id="UaddNumber" type="text">
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
                                    <label>H??nh th???c<span class="require">*</span></label>
                                    <span class="checkbox-box">
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Air" id="uair" type="radio" checked>V???n chuy???n ???????ng bay</label></span>
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Sea" id="usea" type="radio">V???n chuy???n ???????ng bi???n</label></span>
                                        <span class="checkbox_item " style="display:none"><label><input id="ureparking" name="donggoi" value="Repark" type="checkbox">????ng g??i l???i ki???n h??ng
                                            </label></span>
                                        <span class="checkbox_item" style="display:none"><label><input id="merge_box" name="merge_box" value="1" type="checkbox">G???p th??ng
                                            </label></span>
                                    </span>
                                </p>
                                <p class="field submit">
                                    <button class="btn fh-btn" name="push-tracking" onclick="push_tracking()" type="submit">Nh???p th??ng tin ki???n h??ng</button>
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999">
            <div class="modal-dialog modal-sm  modal-confirm" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <h5 class="modal-confirm" id="message"></h5>
                    <div class="modal-footer">
                        <table class="table" style="border: none !important" id="table_showCreatedTrackings">
                        </table>
                        <button class="btn btn-err btn-danger btn-block" data-dismiss="modal" id="exitForm">Tho??t</button>
                        <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()" id="exitSuccess" style="display:none">Tho??t</button>
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
                    <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()" id="exitSuccess" style="display:block; width:30% !important;margin:auto;">Tho??t</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal " tabindex="-1" role="dialog" id="modal_qoute" style="overflow-y: auto;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Khai b??o ????n h??ng</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true" id="">&times;</span> --}}
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="background-color: #fca901">
                        <div style="margin-left:15px">
                            <div class="text-danger">
                                <label for="">
                                    H??nh th???c:
                                </label>
                                <span id="method_modal">

                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-left:15px">
                            <label for=""> B???n c?? mu???n ????ng k?? b??o b???o hi???m kh??ng? </label>
                            <input type="checkbox" id="check_BH"><span>.C??</span>
                            <input type="checkbox" id="check_specialty"><span>.Kh??ng</span>
                        </div>
                    </div>
                    <div class="row" id="enter_insurance" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Ph?? b???o hi???m l?? 3% gi?? tr??? ki???n h??ng
                            </p>
                            <p class="text">L??u ??: Ch??ng t???i kh??ng nh???n b???o hi???m ?????i v???i h??ng d??? v???, h?? h???ng nh?? l?? thu???
                                tinh, m??y m??c ch??nh x??c,...</p>
                            <label for="">Nh???p s??? ti???n:</label>
                            <input class="inpute-insuaran" type="text" pattern="[0-9]" id="insurance_enter" value="" min="0">
                        </div>
                    </div>
                    <div class="row" id="alert_insurance" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                N???u kh??ng ????ng b???o hi???m ch??ng t??i ch??? ?????n b?? 4 l???n ph?? v???n chuy???n trong tr?????ng h???p h??
                                h???ng v?? m???t m??t h??ng ho??. Xin c??n nh???c n???u ki???n h??ng c???a b???n c?? gi?? tr??? cao
                            </p>
                        </div>
                    </div>
                    <div class="row" id="declaration_price">
                        <div style="margin-left:15px">
                            <label for=""> Ki???n h??ng c???a b???n c?? ch???a nh???ng h??ng ho?? ?????c bi???t d?????i ????y kh??ng?</label>
                            <input type="checkbox" id="check_type_special"><span>.C??</span>
                            <input type="checkbox" id="check_type_special_no"><span>.Kh??ng</span>
                            <p class="text-danger" style="font-weight: 500">Loa / Ampli / ??i???n tho???i di ?????ng / Ipad /
                                Laptop / R?????u / ?????ng h??? ??eo tay / ????? c???</p>
                        </div>
                    </div>
                    <div class="row" id="enter_special" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                Ph??? ph?? th??ng quan khi nh???p c???ng Vi???t Nam l?? 2% gi?? tr??? h??ng ?????c bi???t
                            </p>
                            <label for="">Nh???p s??? ti???n:</label>
                            <input class="inpute-insuaran" type="text" pattern="[0-9]" id="special_enter" value="" min="0">
                        </div>
                    </div>
                    <div class="row" id="alert_special" style="display:none">
                        <div style="margin-left:15px">
                            <p class="text-danger">
                                C??c h??ng h??a thu???c danh s??ch tr??n n???u kh??ng ???????c khai b??o s??? b??? ph???t c?????c v???n chuy???n t??y
                                theo s??? l?????ng v?? gi?? tr??? m??n h??ng
                            </p>
                        </div>
                    </div>
                    <p class="field single-field">
                        <label style="margin-top:10px">Ghi ch??</label>
                    </p>
                    <p class="field single-field">
                        <textarea id="unote" name="note" style="height: 100px;width:100%" placeholder="Nh???p ghi ch?? ho???c m?? t??? chi ti???t h??ng ho?? ?????c bi???t ...."></textarea>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn fh-btn" id="send_infor_tracking">G???i h??ng</button>
                    <button type="button" class="btn fh-btn" style="background-color: silver !important" data-dismiss="modal" id="close_modal">Close</button>
                </div>
            </div>
        </div>
</section>
@include('modules.footer')
<script>
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
        //             $("#utypeadd").val("Nh???n t???i VP S??c S??n").change();
        //         }
        //     })
        // })
        // $("#usea").on("click",function(){
        //     $("#usea").one("change",function(){
        //         if($("#usea").prop('checked')){
        //             $("#trip_sea").css('display','unset')
        //             $("#first_option").attr('selected')
        //             $("#utypeadd").val("Nh???n t???i VP S??c S??n").change();
        //         }
        //     })
        // })
        $("#send_infor_tracking").click(function() {
            const id_session = "{{Session::has('idToken')}}";
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
                alert('S??? ti???n kh??ng ???????c nh??? h??n 0')
            }
            if ($('#check_specialty').prop('checked') == false && $('#check_BH').prop('checked') ==
                false) {
                alert('Vui l??ng ch???n khai b??o b???o hi???m')
                return
            }
            if (ShipAir) {
                if (check_insurance > 20000000) {
                    alert('B???o hi???m ????n h??ng ???????ng bay kh??ng ???????c l???n h??n 20,000,000')
                    return
                }
                if (check_special > 999999999999) {
                    alert('B???o hi???m ????n h??ng ???????ng bay kh??ng ???????c l???n h??n 999,999,999,999')
                    return
                }
            } else {
                if (check_insurance > 50000000) {
                    alert('B???o hi???m ????n h??ng ???????ng bi???n kh??ng ???????c l???n h??n 50,000,000')
                    return
                }
                if (check_special > 999999999999) {
                    alert('B???o hi???m ????n h??ng ???????ng bay kh??ng ???????c l???n h??n 999,999,999,999')
                    return
                }
            }
            if ($('#check_type_special').prop('checked') == false && $('#check_type_special_no').prop(
                    'checked') == false) {
                alert('Vui l??ng ch???n khai b??o h??ng ?????c bi???t')
                return
            }
            $("#first_choose").attr("selected", true)
            $("#modal_qoute").hide()
            $("#table_showCreatedTrackings").empty()

            if (id_session) {
                if (checkToken()) {
                    let idToken = getToken();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('rq_tk.store') }}",
                        data: {
                            idToken: idToken,
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
                                    refreshToken(value.code);
                                    swal({
                                        title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    }).then((check) => {
                                        window.location.reload()
                                    })
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
                                            idToken: idToken,
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
                                                    refreshToken(value.code);
                                                    swal({
                                                        title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                                        type: "warning",
                                                        icon: "warning",
                                                        showCancelButton: false,
                                                        confirmButtonColor: "#fca901",
                                                        confirmButtonText: "Exit",
                                                        closeOnConfirm: true
                                                    }).then((check) => {
                                                        window.location.reload()
                                                    })
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
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $(
                            'meta[name="csrf-token"]'
                        ).attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('rq_tk.store') }}",
                    data: {
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
                                refreshToken(value.code);
                                swal({
                                    title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                }).then((check) => {
                                    window.location.reload()
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
                                    value.message +
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
                                title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            }).then(() => {
                                window.location.reload()
                            })
                        } else {
                            console.log(res)
                        }
                    }
                });
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
        if (OptionAdd.length <= 5 && utypeadd == 'blank') {
            if (Upx == null || Upx == "") {
                $('#message').html('Xin vui l??ng ch???n Th??nh Ph??? Qu???n/Huy???n ');
                $('#myModal').modal('show');
                return
            }
            if (UaddNumber.length <= 4) {
                $('#message').html('Nh???p thi???u s??? nh?? t??n ???????ng');
                $('#myModal').modal('show');
            }
            if (AddRev.length < 4) {
                document.getElementById("color-success").style.background = '#DF3A01'
                $('#message').html('Nh???p thi???u ?????a ch???!');
                $('#myModal').modal('show');
            }
        }
        if (Tracking.length <= 7) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u tracking');
            $('#myModal').modal('show');
        } else if (Name_Send.length < 3) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u t??n ng?????i g???i!');
            $('#myModal').modal('show');
        } else if (Number_Send == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p ch??a ????ng s??? ??i???n tho???i ng?????i g???i!');
            $('#myModal').modal('show');
        } else if (Number_Send <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u s??? ??i???n tho???i ng?????i g???i!');
            $('#myModal').modal('show');
        } else if (Name_Rev == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u t??n ng?????i nh???n!');
            $('#myModal').modal('show');
        } else if (Name_Rev.length < 3) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('T??n ng?????i nh???n qu?? ng???n!');
            $('#myModal').modal('show');
        } else if (Phone == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Ch??a nh???p s??? ??i???n tho???i ng?????i nh???n!');
            $('#myModal').modal('show');
        } else if (Phone.length <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u s??? ??i???n tho???i ng?????i nh???n');
            $('#myModal').modal('show');
        } else if (uphone == '') {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p s??? ??i???n tho???i ng?????i nh???n');
            $('#myModal').modal('show');
        } else if (Number_Send.length <= 8) {
            document.getElementById("color-success").style.background = '#DF3A01'
            $('#message').html('Nh???p thi???u s??? ??i???n tho???i ng?????i g???i');
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
                    method_modal = 'V???n chuy???n ???????ng bay'
                } else {
                    method_modal = 'V???n chuy???n ???????ng bi???n'
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
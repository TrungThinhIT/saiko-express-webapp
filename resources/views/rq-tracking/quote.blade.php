<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
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
                matinh: Tinh_ThanhPho,
            },
            success: function(res) {
                $("#Uhuyen").empty()
                $("#UPhuongXa").empty()
                $("#Uhuyen").append(new Option('Vui lòng chọn', ''))
                $.each(res, function(index, value) {
                    $("#Uhuyen").append(new Option(value.TenQuanHuyen, value.MaQuanHuyen))
                })
            },
            error: function(res) {
                console.log(res)
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
                mahuyen: Huyen_Xa,
            },
            success: function(res) {
                $("#UPhuongXa").empty()
                $("#UPhuongXa").append(new Option('Vui lòng chọn', ''))
                $.each(res, function(index, value) {
                    $("#UPhuongXa").append(new Option(value.TenPhuongXa, value.MaPhuongXa))
                })
            },
            error: function(res) {
                console.log(res)
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
                <p>Chúng tôi luôn quan tâm đến các dự án mới, dù lớn hay nhỏ. Gửi email cho chúng tôi và chúng tôi sẽ
                    liên lạc ngay hoặc điện thoại trong khoảng thời gian từ 9:00 sáng đến 8:00 tối từ thứ Hai đến thứ
                    Bảy.</p>
            </div>
            <div class="col-sm-4">
                <img src="assets/images/resources/cargocar.png" alt="">
            </div>
        </div>
        <div class="row quote1forms">
            <div class="col-md-12">
                <form action="{{ route('rq_tk.store') }}" method="POST">
                    @csrf
                    <div class="fh-form request-form">
                        <div class="row">
                            <div class="field col-md-4">
                                <label>Nhập mã Tracking Number<span class="require">*</span></label>
                                <input placeholder="Nhập số tracking" name="tracking" id="utracking"
                                    value="{{ old('tracking') }}" type="text" required>
                            </div>
                            <div class="field col-md-4">
                                <label>Tên người gửi<span class="require">*</span></label>
                                <input placeholder="Facebook hoặc tên người làm việc với SAIKO"
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
                                        <option value="blank">Địa chỉ cụ thể</option>
                                        <option value="Nhận tại VP Sóc Sơn">Nhận tại VP Sóc Sơn, Hà Nội</option>
                                        <option value="Nhận tại VP Đào Tấn">Nhận tại VP Đào Tấn, Hà Nội </option>
                                        <!--<option value="Nhận tại VP Tây Hồ">Nhận tại VP Tây Hồ</option>-->
                                        <option value="Nhận tại VP Tân Bình HCM">Nhận tại VP Tân Bình HCM</option>
                                        <!-- <option value="FOB">Nhận trực tiếp tại VN</option> -->

                                    </select>
                                </div>
                                <div id="type-ship">
                                    <div class="col-md-4" style="margin-top:10px">
                                        <p class="field">
                                            <label>Tỉnh/Thành Phố<span class="require">*</span></label>
                                            <select id="Utinh" name="tinh" onchange="Select_Tinh(this)">
                                                <option value="">Vui lòng chọn</option>
                                                @foreach ($data as $item)
                                                    <option value={{ $item->MaTinhThanh }}>{{ $item->TenTinhThanh }}
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

                                <p class="field single-field">
                                    <label style="margin-top:10px">Ghi chú</label>
                                    <textarea id="unote" name="note"></textarea>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="field check-box">
                                    <label>Hình thức<span class="require">*</span></label>
                                    <span class="checkbox-box">
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Air" id="uair"
                                                    type="radio" checked>Vận chuyển đường bay</label></span>
                                        <span class="checkbox_item"><label><input name="fh_radio" value="Sea" id="usea"
                                                    type="radio">Vận chuyển đường biển</label></span>
                                        <span class="checkbox_item"><label><input id="ureparking" name="donggoi"
                                                    value="Repark" type="checkbox">Đóng gói lại kiện hàng
                                            </label></span>
                                    </span>
                                </p>
                                <p class="field submit">
                                    <button class="btn fh-btn" name="push-tracking" onclick="push_tracking()"
                                        type="submit">Gửi hàng
                                        ngay</button>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        style="z-index: 9999">
        <div class="modal-dialog modal-sm  modal-confirm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box" id="color-success"><i class="material-icons"></i></div>

                </div>
                <h5 class="modal-confirm" id="message"></h5>
                <div class="modal-footer">
                    <button class="btn btn-err btn-danger btn-block" data-dismiss="modal" id="exitForm">Thoát</button>
                    <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                        id="exitSuccess" style="display:none">Thoát</button>
                </div>
            </div>
        </div>
    </div>
</section>
@include('modules.footer')

<script>
    $(document).ready(function() {

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
        // + ", " + $("#UPhuongXa option:selected").text() + ", " + $(
        //     "#Uhuyen option:selected").text() + ", " + $("#Utinh option:selected").text();
        if (OptionAdd.length > 5) {
            AddRev = OptionAdd;
        }
        var str = $("#utracking").val();
        var mapObj = {
            "_": "",
            " ": " ",
            "-":"",
        };
        var Tracking = str.replace(/-| |_/gi, function(matched) {
            return mapObj[matched];
        });
        // var Tracking = $("#utracking").val();
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
        var Note = $("#unote").val();
        var Reparking = document.getElementById('ureparking').checked;
        var ShipAir = document.getElementById('uair').checked;
        var ShipSea = document.getElementById('usea').checked;
        var Upx = $('#UPhuongXa').val();
        var Code_Add = $("#Uhuyen option:selected").val() + "," + $("#Utinh option:selected").val();
        var UaddNumber = $("#UaddNumber").val();
        var uphone = $("#uphone").val();
        var utypeadd = $("#utypeadd").val();
        if (OptionAdd.length <= 5) {
            if (Upx == null || Upx == "") {
                $('#message').html('Xin vui lòng chọn Thành Phố Quận/Huyện ');
                $('#myModal').modal('show');
            }
            if (UaddNumber.length <= 4) {
                $('#message').html('Nhập thiếu số nhà tên đường');
                $('#myModal').modal('show');
            }
        }
        if (Tracking.length <= 7) {
            $('#message').html('Nhập thiếu tracking');
            $('#myModal').modal('show');
        } else if (Name_Send.length < 3) {
            $('#message').html('Nhập thiếu tên người gửi!');
            $('#myModal').modal('show');
        } else if (Number_Send == '') {
            $('#message').html('Nhập chưa đúng số điện thoại người gửi!');
            $('#myModal').modal('show');
        } else if (Number_Send <= 8) {
            $('#message').html('Nhập thiếu số điện thoại người gửi!');
            $('#myModal').modal('show');
        } else if (Name_Rev == '') {
            $('#message').html('Nhập thiếu tên người nhận!');
            $('#myModal').modal('show');
        } else if (Name_Rev.length < 3) {
            $('#message').html('Tên người nhận quá ngắn!');
            $('#myModal').modal('show');
        } else if (AddRev.length < 4) {
            $('#message').html('Nhập thiếu địa chỉ!');
            $('#myModal').modal('show');
        } else if (Phone == '') {
            $('#message').html('Chưa nhập số điện thoại người nhận!');
            $('#myModal').modal('show');
        } else if (Phone.length <= 8) {
            $('#message').html('Nhập thiếu số điện thoại người nhận');
            $('#myModal').modal('show');
        } else if (uphone == '') {
            $('#message').html('Nhập số điện thoại người nhận');
            $('#myModal').modal('show');
        } else if (Number_Send.length <= 8) {
            $('#message').html('Nhập thiếu số điện thoại người gửi');
            $('#myModal').modal('show');
        } else {
            if (Tracking.length > 7 && Phone.length > 8 && Name_Send.length > 2 && Name_Rev.length > 2 && Number_Send
                .length > 8 && (ShipAir == true | ShipSea == true) && (Upx != null || OptionAdd.length > 5) && (
                    UaddNumber.length >= 4 || OptionAdd.length > 5)) {
                console.log("Sendtracking");
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route('rq_tk.store') }}",
                    data: {
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
                    },
                    success: function(response) {
                        console.log(response)
                        if (response == 201) {
                            document.getElementById("color-success").style.background = '#1ba906'
                            $('#message').html('Tạo tracking thành công!');
                            $('#exitForm').hide();
                            $('#exitSuccess').show();
                            $('#myModal').modal('show');
                        }
                        if (response == 422) {
                            document.getElementById("color-success").style.background = '#DF3A01'
                            $('#message').html(
                                'Tracking này đã được tạo hoặc mã tracking dài quá 15 kí tự');
                            $('#exitForm').hide();
                            $('#exitSuccess').show();
                            $('#myModal').modal('show');

                        }
                    }
                });
            }
        }
    }

</script>
</body>

</html>

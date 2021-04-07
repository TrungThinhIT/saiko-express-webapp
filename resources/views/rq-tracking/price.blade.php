<!DOCTYPE html>
<html lang="en">
<style>
    .form-control {
        width: 30% !important;
        margin-left: 10px !important;
        margin-right: 10px !important;
    }

    input[type="submit"] {
        text-transform: capitalize;
        font-size: 15px;
        font-weight: 400;
        width: 60%;
        border-radius: 17px;
        margin-top: 5px;
    }

    .content-track {
        margin-left: 30px;
    }

    .mobile-w150 {
        width: 150px;
    }

    @media (max-width: 576px) {

        .content-track {
            margin-left: 0px;
        }

        .mobile-track {
            display: block;
        }

        .mobile-w150 {
            width: auto;
        }

        .d-none {
            display: none;
        }

        .mobile-block {
            display: block !important;
        }

        .mobile-block-f {
            margin-left: 10px;
        }
    }

    .unset-border {
        border: unset !important;
        box-shadow: unset !important;
    }

    .width-custom {
        width: 100% !important;
    }

    .width-price {
        width: unset !important;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .custom-row-inline {
        display: flex;
        align-items: center;
        justify-content: space-between
    }

    .set-ml {
        margin-left: auto !important;
    }

    .set-width-lb {
        width: 37px;
    }

</style>

@include('modules.header')
<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>BÁO GIÁ</h2>
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
            <div class="col-sm-12">
                <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                    <h2>yêu cầu báo giá</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo ''; ?>assets/images/price.png"
                    alt="Tính phí chi tiết vận chuyển">
            </div>
            <div class="col-md-7" style="margin-top: -100px">
                <div class="fee-pro-title">
                    <span class="fee-pro-number">1</span>
                    <span class="fee-pro-name">Thông tin kiện hàng</span>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="content-track">
                    <div>
                        <label style="margin-right: 10px;" class="mobile-track">Hình thức vận chuyển: </label>
                        <label class="radio-inline"><input type="radio" name="tran" checked id="air"
                                onchange="onResult()">Đường bay<a
                                href="<?php echo ''; ?>assets/images/services/air.png"
                                title='Xem bảng giá'> <i class="fa fa-eye"
                                    style="    color: burlywood;"></i></a></label>
                        <label class="radio-inline"><input type="radio" name="tran" id="sea" onchange="onResult()">Đường
                            biển<a href="<?php echo ''; ?>assets/images/services/sea.png"
                                title='Xem bảng giá'> <i class="fa fa-eye"
                                    style="    color: burlywood;"></i></a></label>
                    </div>
                    <div>
                        <label style="margin-right: 10px;" class="mobile-track">Phí bảo hiểm: </label>
                        <label class="radio-inline mobile-block mobile-block-f"><input type="radio" name="check" checked
                                id="sbuy">(5% giá trị khai báo) </label>
                        <label class="radio-inline mobile-block"><input type="radio" name="check" checked id="buy">(3%
                            giá trị khai báo) </label>
                        <label class="radio-inline mobile-block"><input type="radio" name="check" id="noBuy">Không
                            mua</label>
                    </div>
                </div>
                <div class="fee-pro-title">
                    <span class="fee-pro-number">2</span>
                    <span class="fee-pro-name">Công cụ tính trọng lượng kiện hàng: <span class="d-none">( đơn vị đo cm
                            )</span></span>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="content-track">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="unset-border">
                                <div class="form-group">
                                    <div style="display: inline-flex;">
                                        <label class="control-label font-weight-bold" style="width:100px">Chiều
                                            cao:</label>
                                        <input type="number" onchange="domesticShipping()" class="form-control set-ml"
                                            value="0" id="height" onkeyup="onResult()">
                                        <label class="set-width-lb">cm</label>

                                    </div>

                                </div>

                            </div>
                            <div class="unset-border">
                                <div class="form-group">
                                    <div style="display: inline-flex;">
                                        <label class="control-label" style="width:100px">Chiều dài:</label>
                                        <input type="number" onchange="domesticShipping()" class="form-control set-ml"
                                            value="0" id="long" onkeyup="onResult()">
                                        <label class="set-width-lb">cm</label>
                                    </div>
                                </div>

                            </div>
                            <div class="unset-border">
                                <div class="form-group">
                                    <div style="display: inline-flex;">
                                        <label class="control-label"><i class="fa fa-hand-o-right"></i> Trọng lượng thể
                                            tích:</label>
                                        <span style="width:80px;font-weight: bold; margin-left: 10px;"
                                            id="weight">0</span>

                                        <label class="set-width-lb">kg</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- column2 --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div style="display: inline-flex;">
                                    <label class="control-label" style="width:100px">Chiều rộng:</label>
                                    <input type="number" onchange="domesticShipping()" class="form-control set-ml"
                                        value="0" id="width" onkeyup="onResult()">
                                    <label class="set-width-lb">cm</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div style="display: inline-flex;">
                                    <label class="control-label font-weight-bold mobile-w150">Trọng lượng
                                        thực:</label>
                                    <input type="number" onchange="domesticShipping()" class="form-control set-ml"
                                        value="0" id="wei" onkeyup="weightChange()">
                                    <label class="set-width-lb">kg</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div style="display: inline-flex;">
                                    <label class="control-label mobile-w150 width-price">Đơn giá:</label>
                                    <input type="number" onchange="domesticShipping()" class="form-control set-ml"
                                        value="0" id="price" readonly="">
                                    <label class="set-width-lb">VNĐ</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input value="Tính toán" class="fh-btn" type="submit" placeholder="" onclick="cacula()">
                        </div>
                    </div>
                </div>
                <div class="fee-pro-title">
                    <span class="fee-pro-number">3</span>
                    <span class="fee-pro-name">Giao hàng trong nước</span>
                    <i class="fa fa-angle-down"></i>
                </div>
                <div class="unset-border custom-row-inline">
                    <select name="province" class="form-control width-custom" id="Utinh" onchange="Select_Tinh(this)">
                        <option value="">Chọn Tỉnh</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->MaTinhThanh }}">{{ $item->TenTinhThanh }}</option>
                        @endforeach
                    </select>
                    <select name="District" class="form-control width-custom" onchange="domesticShipping()" id="Uhuyen">
                    </select>
                </div>
                <div class="unset-border custom-row-inline">
                    <label for="" class="form-control unset-border width-custom">Dịch vụ:</label>
                    <select name="service" onchange="changeStyle();domesticShipping();"
                        class="form-control width-custom" id="service">
                        <option value="1">Chọn dịch vụ</option>
                        <option value="BD">Bưu điện</option>
                        <option value="VT">Viettel</option>
                        <option value="GHTK">Giao hàng tiết kiệm</option>
                    </select>
                </div>
                <div id="componentService" style="display: none">
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Code:</label>
                        <label for="" class="form-control unset-border width-custom">
                            <label class="switch">
                                <input type="checkbox" id="check_code" value="0" onchange="domesticShipping()">
                                <span class="slider round"></span>
                            </label>
                        </label>
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Khai giá:</label>
                        <input type="text" class="form-control width-custom" onchange="domesticShipping()" name="price"
                            id="price2">
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Phí Code:</label>
                        <label for="" class="form-control unset-border width-custom"
                            id="code_fee"></label><span>VNĐ</span>
                    </div>

                    <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Thuế VAT:</label>
                        <label for="" class="form-control unset-border width-custom" id="vat"></label><span>VNĐ</span>
                    </div>
                    <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Tổng chi phí:</label>
                        <label for="" class="form-control unset-border width-custom" id="money"></label><span>VNĐ</span>
                    </div>
                </div>
                <div id="componentServiceGHTK" style="display: none">
                    {{-- <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Code:</label>
                        <label for="" class="form-control unset-border width-custom">
                            <label class="switch">
                                <input type="checkbox" id="check_code" value="0" onchange="domesticShipping()">
                                <span class="slider round"></span>
                            </label>
                        </label>
                    </div> --}}
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Khai giá:</label>
                        <input type="text" class="form-control width-custom" onchange="domesticShipping()" name="price"
                            id="priceGHTK">
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Chọn hình thức vận chuyển:</label>
                        <select class="form-control width-custom" name="" onchange="domesticShipping()" id="transport">
                            <option value="fly">Đường bay</option>
                            <option value="road">Đường bộ</option>
                        </select>
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Chọn phương thức giao</label>
                        <select class="form-control width-custom" name="" onchange="domesticShipping()" id="methodGHTK">
                            <option value="xteam">Xteam</option>
                            <option value="none">None</option>
                        </select>
                    </div>

                    {{-- <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Thuế VAT:</label>
                        <label for="" class="form-control unset-border width-custom" id="vat"></label><span>VNĐ</span>
                    </div> --}}
                    <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Tổng chi phí:</label>
                        <label for="" class="form-control unset-border width-custom"
                            id="moneyGHTK"></label><span>VNĐ</span>
                    </div>
                </div>
                <div id="componentServiceViettel" style="display: none">
                    {{-- <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Code:</label>
                        <label for="" class="form-control unset-border width-custom">
                            <label class="switch">
                                <input type="checkbox" id="check_code" value="0" onchange="domesticShipping()">
                                <span class="slider round"></span>
                            </label>
                        </label>
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Khai giá:</label>
                        <input type="text" class="form-control width-custom" onchange="domesticShipping()" name="price"
                            id="price2">
                    </div>
                    <div class="unset-border custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Phí Code:</label>
                        <label for="" class="form-control unset-border width-custom"
                            id="code_fee"></label><span>VNĐ</span>
                    </div>

                    <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Thuế VAT:</label>
                        <label for="" class="form-control unset-border width-custom" id="vat"></label><span>VNĐ</span>
                    </div>
                    <div class="custom-row-inline">
                        <label for="" class="form-control unset-border width-custom">Tổng chi phí:</label>
                        <label for="" class="form-control unset-border width-custom" id="money"></label><span>VNĐ</span>
                    </div> --}}
                </div>
                <div class="fee-pro-title">
                    <span class="fee-pro-number">4</span>
                    <span class="fee-pro-name">Kết quả tính toán: </span>
                    <i class="fa fa-angle-down"></i>

                </div>



                <div>
                    <label class="control-label">Giá cước vận chuyển Nhật về Việt là : <span
                            id="result">0</span>VNĐ</label>
                </div>
                <h5 style="color: #fca901;
font-style: italic;">Khách hàng hạng Business vui lòng liên hệ Hotline của Saiko để nhận được báo giá tốt nhất</h5>

                <div class="form-group text-center">
                    <input value="Gửi hàng ngay" class="fh-btn" type="submit" placeholder="" onclick="send()">
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->




</section>

@include('modules.footer')
<script>
    var weight = 0;
    $(document).ready(function() {
        $("#check_code").click(function() {
            if ($("#check_code").val() == 0) {
                $("#check_code").val(1)
            } else {
                $("#check_code").val(0)
            }

        })
    })

    function onResult() {
        var air = document.getElementById("air");
        var sea = document.getElementById("sea");
        var buy = document.getElementById("buy");
        var noBuy = document.getElementById("noBuy");
        var height = document.getElementById("height").value;
        var width = document.getElementById("width").value;
        var long = document.getElementById("long").value;
        var result = 0;
        if (air.checked) {
            result = (Number(height) * Number(width) * Number(long)) / 6000;
            if (result > 100) {
                document.getElementById("price").value = 180000;
            } else {
                document.getElementById("price").value = 185000;
            }
        }
        if (sea.checked) {
            result = (Number(height) * Number(width) * Number(long)) / 3500;
            document.getElementById("price").value = 55000;

        }
        weight = result;
        document.getElementById("weight").innerHTML = result.toLocaleString();


    }

    function weightChange() {
        var wei = document.getElementById("wei").value;
        var price = document.getElementById("price").value;
        if (Number(wei) > weight) {
            if (wei > 100) {
                document.getElementById("price").value = 180000;
            } else {
                document.getElementById("price").value = 185000;
            }
        } else {
            if (weight > 100) {
                document.getElementById("price").value = 180000;
            } else {
                document.getElementById("price").value = 185000;
            }
        }
    }


    function cacula() {

        var wei = document.getElementById("wei").value;
        var price = document.getElementById("price").value;
        var result = 0;
        if (Number(wei) > weight) {
            result = (Number(wei) * price).toLocaleString();
        } else {
            result = (weight * price).toLocaleString();
        }
        document.getElementById("result").innerHTML = result;

    }

    function send() {
        window.location.href = "{{ route('rq_tk.quote') }}";
    }

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

    function domesticShipping() {
        var id_district = $("#Uhuyen").val();
        var code = $("#check_code").val();
        var id_province = $("#Utinh").val();
        var height = $("#height").val();
        var width = $("#width").val();
        var long = $("#long").val();
        var wei = $("#wei").val();
        var price = $("#price2").val();
        var service = $("#service").val();
        var priceGHTK = $("#priceGHTK").val();
        var methodGHTK = $("#methodGHTK").val();
        var provinceText = $("#Utinh option:selected").text();
        var districtText = $("#Uhuyen option:selected").text()
        var transport = $("#transport").val();
        console.log(id_district, code, id_province, height, width, long, wei, price, service, methodGHTK, priceGHTK)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ route('rq_tk.getApiVNP') }}",
            data: {
                id_district: id_district,
                id_province: id_province,
                code: code,
                height: height,
                width: width,
                long: long,
                wei: wei,
                price: price,
                service: service,
                priceGHTK: priceGHTK,
                methodGHTK: methodGHTK,
                provinceText: provinceText,
                districtText: districtText,
                transport: transport
            },
            success: function(respone) {
                console.log(respone)
                if (respone.type.type == "BD") {
                    $("#code_fee").text(respone.CuocCOD)
                    $("#vat").text(respone.TongCuocSauVAT)
                    $("#money").text(respone.SoTienCodThuNoiNguoiNhan)
                }
                if (respone.type.type == "GHTK") {
                    $("#moneyGHTK").text(respone.fee.fee)

                }

            },
            error: function(respone) {
                console.log(respone)
            }
        })
    }

    function changeStyle() {
        // domesticShipping();

        if ($("#service").val() == "BD") {
            $("#componentService").css("display", "block")
            $("#componentServiceViettel").css("display", "none")
            $("#componentServiceGHTK").css("display", "none")
        }
        if ($("#service").val() == "VT") {
            $("#componentServiceViettel").css("display", "block")
            $("#componentService").css("display", "none")
            $("#componentServiceGHTK").css("display", "none")
        }
        if ($("#service").val() == "GHTK") {
            $("#componentServiceGHTK").css("display", "block")
            $("#componentService").css("display", "none")
            $("#componentServiceViettel").css("display", "none")
        }
    }

</script>
</body>

</html>

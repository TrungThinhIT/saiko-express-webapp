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
            <div class="col-md-7">
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
                    <div style="margin-top: 30px;    margin-bottom: 30px;">
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

                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label font-weight-bold" style="width:100px">Chiều cao:</label>
                            <input type="number" class="form-control" value="0" id="height" onkeyup="onResult()">
                            <label>cm</label>
                        </div>

                    </div>
                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label" style="width:100px">Chiều rộng:</label>
                            <input type="number" class="form-control" value="0" id="width" onkeyup="onResult()">
                            <label>cm</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label" style="width:100px">Chiều dài:</label>
                            <input type="number" class="form-control" value="0" id="long" onkeyup="onResult()">
                            <label>cm</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label"><i class="fa fa-hand-o-right"></i> Trọng lượng thể
                                tích:</label>
                            <span style="width:80px;font-weight: bold;
    margin-left: 10px;" id="weight">0</span>

                            <label>kg</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label font-weight-bold mobile-w150">Trọng lượng thực:</label>
                            <input type="number" class="form-control" value="0" id="wei" onkeyup="weightChange()">
                            <label>kg</label>
                        </div>

                    </div>
                    <div class="form-group">
                        <div style="display: inline-flex;">
                            <label class="control-label mobile-w150">Đơn giá:</label>
                            <input type="number" class="form-control" value="0" id="price" readonly>
                            <label>VNĐ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input value="Tính toán" class="fh-btn" type="submit" placeholder="" onclick="cacula()">
                    </div>


                    <div class="fee-pro-title">
                        <span class="fee-pro-number">3</span>
                        <span class="fee-pro-name">Kết quả tính toán: </span>
                        <i class="fa fa-angle-down"></i>
                    </div>



                    <div>
                        <label class="control-label">Giá cước vận chuyển Nhật về Việt là : <span
                                id="result">0</span>VNĐ</label>
                    </div>
                    <h5 style="color: #fca901;
    font-style: italic;">Khách hàng hạng Business vui lòng liên hệ Hotline của Saiko để nhận được báo giá tốt nhất</h5>

                    <div class="form-group">
                        <input value="Gửi hàng ngay" class="fh-btn" type="submit" placeholder="" onclick="send()">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->




</section>

@include('modules.footer')
<script>
    var weight = 0;

    function onResult() {
        var air = document.getElementById("air");
        var sea = document.getElementById("sea");
        var buy = document.getElementById("buy");
        var noBuy = document.getElementById("noBuy");
        var height = document.getElementById("height").value;
        var width = document.getElementById("width").value;
        var long = document.getElementById("long").value;
        console.log("OK:  ", air.checked);
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
            console.log(wei, "  1 ", weight);
            if (wei > 100) {
                document.getElementById("price").value = 180000;
            } else {
                document.getElementById("price").value = 185000;
            }
        } else {
            console.log(wei, "  2  ", weight);
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
        console.log(wei, "   ", weight, "  ", Number(wei) > weight);
        document.getElementById("result").innerHTML = result;

    }

    function send() {
        window.location.href = "/request-a-quote.php";
    }

</script>
</body>

</html>

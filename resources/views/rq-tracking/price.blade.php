<!DOCTYPE html>
<html lang="en">
<style>

</style>

@include('modules.header')
<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>BÁO GIÁ DỰ KIẾN</h2>
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
                    <h2>BÁO GIÁ DỰ KIẾN</h2>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="info_shipping">
                <div class="fee-pro-title">
                    <span class="fee-pro-number">1</span>
                    <span class="fee-pro-name">Thông tin vận chuyển</span>
                    <i class="fa fa-angle-down"></i>
                </div>

                <div class="col">
                    <label for="shipment_method">&#9658; Phương thức vận chuyển: </label>
                    <select id="shipment_method" class="custom-select custom-select-sm">
                        <option value='air' selected>Đường bay</option>
                        <option value='sea'>Đường biển</option>
                    </select>
                </div>

                <label for="special">&#9658; Kiện hàng của bạn có chứa các loại hàng đặc biệt dưới đây hay không: </label>
                <select id="special" class="custom-select custom-select-sm">
                    <option value=false selected>Không</option>
                    <option value=true>Có</option>
                </select>
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loa, Ampli, Điện thoại di động, Máy tính bảng, Laptop, Rượu, Đồng hồ đeo tay, Đồ cổ.</p>

                <div class="row div-special">
                    <div class="form-group col-md-6">
                        <label for="weight">Tổng giá trị hàng hoá (GTHH) đặc biệt là (VNĐ)</label>
                        <input type="text" style="text-align: right;" class="form-control" value='0' id="special_declaration">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="length">Phí hàng hoá đặc biệt là (VNĐ)</label>
                        <input type="text" style="text-align: right;" class="form-control" readonly value='0' id="special_goods_fee">
                    </div>
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Lưu ý phí hàng hoá đặc biệt là phụ phí bắt buộc để thông quan và tính phí 2% GTHH.)</p>
                </div>
                <br />
                <label for="insurance">&#9658; Bạn có đăng ký bảo hiểm kiện hàng không? (Lưu ý phí bảo hiểm là 3%): </label>
                <select id="insurance" class="custom-select custom-select-sm">
                    <option value=false selected>Không</option>
                    <option value=true>Có</option>
                </select>

                <div class="row div-insurance">
                    <div class="form-group col-md-6">
                        <label for="weight">Giá trị kiện hàng là (VNĐ)</label>
                        <input type="text" style="text-align: right;" class="form-control" value='0' id="insurance_declaration">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="length">Phí hàng hoá đặc biệt là (VNĐ)</label>
                        <input type="text" style="text-align: right;" class="form-control" readonly value='0' id="insurance_fee">
                    </div>
                </div>

            </div>

            <br />

            <div class="info">
                <div class="fee-pro-title">
                    <span class="fee-pro-number">2</span>
                    <span class="fee-pro-name">Thông tin kiện hàng: <span class="d-none">
                            <i class="fa fa-angle-down"></i>
                </div>

                <div class="row">
                    <div class="form-group col-md-7">
                        <img src="{{ asset('images/boxmeasure.png')}}" alt="">

                        <p class="text-justify" style="font-size: 14px;">&#9658; Với hàng bay: Khối lượng thể tích = (L * W * H) / 6000.</p>
                        <p class="text-justify" style="font-size: 14px;">&#9658; Với hàng biển: Khối lượng thể tích = (L * W * H) / 3500.</p>
                        <p class="text-justify" style="font-size: 14px;">&#9658; So sánh giữa 2 khối lượng và khối lượng thể tích, khối lượng nào lớn hơn thì đó là khối lượng tính phí. Do hàng hóa chiếm nhiều diện tích trong khoang chứa vận chuyển.</p>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="weight">Khối lượng (Kg)</label>
                            <input type="text" style="text-align: right;" class="form-control" value='0' id="weight">
                        </div>
                        <div class="form-group">
                            <label for="length">Chiều dài (Cm)</label>
                            <input type="text" style="text-align: right;" class="form-control" value='0' id="length">
                        </div>
                        <div class="form-group">
                            <label for="width">Chiều rộng (Cm)</label>
                            <input type="text" style="text-align: right;" class="form-control" value='0' id="width">
                        </div>
                        <div class="form-group">
                            <label for="height">Chiều cao (Cm)</label>
                            <input type="text" style="text-align: right;" class="form-control" value='0' id="height">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon" style="font-weight: bold;">Khối lượng thể tích</span>
                            <input type="text" style="text-align: right;" class="form-control" readonly value="0" id="volumetric_weight">
                            <span class="input-group-addon" style="font-weight: bold;">Kg</span>
                        </div>
                    </div>
                </div>
            </div>

            <br />
            <div class="fee-pro-title">
                <span class="fee-pro-number">3</span>
                <span class="fee-pro-name">Báo giá phí vận chuyển Nhật - Việt dự kiến: </span>
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <button type="button" class="btn btn-success" onclick="calculatePriceWithConditions()">Báo giá</button>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-addon" style="font-weight: bold;">Đơn giá (VNĐ/Kg)</span>
                        <input type="text" style="text-align: right;" class="form-control" readonly value="0" id="price_with_condition">
                    </div>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-5">
                    <div class="input-group">
                        <span class="input-group-addon" style="font-weight: bold;">Thành tiền (VNĐ)</span>
                        <input type="text" style="text-align: right;" class="form-control" readonly value="0" id="total_price">
                    </div>
                </div>
            </div>
            <br />
            <p class="text-justify" style="font-size: 14px;">&#9658; Khối lượng tính phí tối thiểu của kiện hàng đi bay là 1kg và đi biển là 10kg.</p>
            <br />
        </div>
</section>

@include('modules.footer')
<script>
    var warehouse_host = "<?php echo (env('SERVICE_WAREHOUSE_HOST')) ?>";
    var special_goods_fee = 0;
    var insurance_fee = 0;
    var volumetric_weight = 0;
    $(".div-special").hide();
    $(".div-insurance").hide();

    $(document).ready(function() {
        $("#special").change(function($e) {
            $status = $("#special").val();
            if ($status == 'true') {
                $(".div-special").show();
            } else {
                $(".div-special").hide();
            }
        });

        $("#insurance").change(function($e) {
            $status = $("#insurance").val();
            if ($status == 'true') {
                $(".div-insurance").show();
            } else {
                $(".div-insurance").hide();
            }
        });

        $("#special_declaration").keyup(function($e) {
            $price = cleanPrice($("#special_declaration").val()) * 0.02;
            special_goods_fee = $price;
            $("#special_goods_fee").val(formatPrice($price.toFixed()));
            autoFormatNumber('#special_declaration');
        });

        $("#insurance_declaration").keyup(function($e) {
            $price = cleanPrice($("#insurance_declaration").val()) * 0.03;
            insurance_fee = $price;
            $("#insurance_fee").val(formatPrice($price.toFixed()));
            autoFormatNumber('#insurance_declaration')
        });

        $("#shipment_method").change(function() {
            calculateVolumetricWeight();
        });

        $("#height").keyup(function() {
            calculateVolumetricWeight();
        });

        $("#width").keyup(function() {
            calculateVolumetricWeight();
        });

        $("#length").keyup(function() {
            calculateVolumetricWeight();
        });

        $("#weight").change(function() {
            autoFormatNumber('#weight');
        });
    });

    function calculateVolumetricWeight() {
        $height = cleanPrice($("#height").val());
        autoFormatNumber('#height');
        $width = cleanPrice($("#width").val());
        autoFormatNumber('#width');
        $length = cleanPrice($("#length").val());
        autoFormatNumber('#length');
        $shipment_method = $("#shipment_method").val();

        $volumetric_weight = ($height * $width * $length / ($shipment_method == 'air' ? 6000 : 3500));
        $("#volumetric_weight").val(formatPrice($volumetric_weight.toFixed()));
        volumetric_weight = $volumetric_weight;
    }

    function calculatePriceWithConditions() {
        $shipment_method = $("#shipment_method").val();
        $weight = cleanPrice($("#weight").val());
        $range = $weight >= volumetric_weight ? $weight : volumetric_weight;
        $range = minWeightToFeeWithShipmentMethod($range, $shipment_method);

        $.ajax({
            type: "GET",
            url: warehouse_host + "/api/amount-with-conditions?conditions[type]=shipping-fee&conditions[shipment-method]=" + $shipment_method + "&conditions[from]=tochigi-jp&conditions[to]=vn-hn&range=" + $range + "&timeline=" + new Date().toISOString().slice(0, 10),
            dataType: "json",
            success: function(data) {
                $("#price_with_condition").val(formatPrice(data.toFixed()));
                $special_goods_fee = $("#special").val() == 'true' ? special_goods_fee : 0;
                $insurance_fee = $("#insurance").val() == 'true' ? insurance_fee : 0;
                $total_price = $special_goods_fee + $insurance_fee + ($range * data);
                $("#total_price").val(formatPrice($total_price.toFixed()));
            },
            error: function(xhr, status, error) {
                alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
            }
        });
    }

    function minWeightToFeeWithShipmentMethod($weight, $shipment_method) {
        const min_weight_shipment_method = [];
        min_weight_shipment_method['air'] = 1;
        min_weight_shipment_method['sea'] = 10;

        if ($weight > 0 && $weight < min_weight_shipment_method[$shipment_method]) {
            $weight = min_weight_shipment_method[$shipment_method];
        }

        return $weight;
    }

    function autoFormatNumber(id) {
        $(id).on('change click keyup input paste', (function(event) {
            $(this).val(function(index, value) {
                return formatPrice(value);
            });
        }));
    }

    function formatPrice(price) {
        return price.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function cleanPrice(price) {
        return price.replace(/,/, "").replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "");
    }
</script>
</body>

</html>
<html>
<style>
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

</style>
@include('modules.header')
<!--services Welcome sec -->
<div class="service_dtl1 secpadd layout-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget services-menu-widget">
                    <div class="col-md-3">
                        <h4 class="widget-title ">Dịch vụ của Saiko</h4>
                    </div>
                    <div class="col-md-9">
                        <ul class="menu service-menu " style="display:inline-flex">
                            <li class="menu-item current-menu-item"><a href="{{ route('service.sea') }}">GIAO NHẬN ĐƯỜNG
                                    BIỂN</a></li>
                            <li class="menu-item "><a href="{{ route('service.air') }}">GIAO NHẬN ĐƯỜNG BAY</a></li>
                            <!-- <li class="menu-item "><a href="warehous.php">Kho vận và lưu trữ</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row paddsec">
                    <div class="col-md-6">
                        <div class="abotinforgt">
                            <div class="fh-section-title clearfix f25  text-left version-dark paddbtm40">
                                <h2>GIAO HÀNG ĐƯỜNG BIỂN</h2>
                            </div>

                            <p>Ngoài đường bay, Saiko Express còn cung cấp dịch vụ vận chuyển đường biển. Với chi phí
                                hợp lý, đây là giải pháp vận chuyển tối ưu cho những mặt hàng với trọng tải lớn mà vận
                                chuyển hàng không chưa thể đảm nhận.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="abotimglft">
                            <img src="assets/images/ship.png" class="img-responsive">
                        </div>
                    </div>
                </div>
                <hr class="margtb40">

                <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                    <h2>bảng giá dịch vụ</h2>
                </div>
                <img src="assets/images/fee_A.png">
                <img src="assets/images/fee_B.png">
                <hr class="margtb40">
                <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                    <h2>NỘI DUNG LƯU Ý</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/weight_sea.jpeg" style="width:100vw">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/item_special.jpeg" style="width:100vw">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/goods_ban.jpeg" style="width:100vw">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/policy_sea.jpeg" style="width:100vw">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/compensation_sea.jpeg" style="width:100vw">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/sea_delivery.jpeg" style="width:100vw">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Welcome sec   end-->



@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

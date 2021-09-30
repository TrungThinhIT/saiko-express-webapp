<html >

@include('modules.header')
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
<!-- <div class="ed_pagetitle">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>Đường bay</h2>
				</div>
			</div>

		</div>
	</div>
</div> -->
        <!--services Welcome sec -->
        <div class="service_dtl1 secpadd layout-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget services-menu-widget">
                            <div class="col-md-3">
                                <h4 class="widget-title">Dịch vụ của Saiko</h4>
                            </div>
                            <div class="col-md-9">
                                <ul class="menu service-menu" style="display:inline-flex">
                                    <li class="menu-item current-menu-item"><a href="{{route('service.air')}}">GIAO HÀNG ĐƯỜNG BAY</a></li>
                                    <li class="menu-item "><a href="{{route('service.sea')}}">GIAO HÀNG ĐƯỜNG BIỂN</a></li>
                                    <!-- <li class="menu-item "><a href="warehous.php">Kho vận và lưu trữ</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="servdtlimg margbtm30">
                            <img src="assets/images/services/slide1-3.jpg" alt="">
                        </div>
                        <div class="row paddsec">
                            <div class="col-md-6">
                                <div class="abotinforgt">
                                    <div class="fh-section-title clearfix f25  text-left version-dark paddbtm40">
                                        <h2>GIAO HÀNG ĐƯỜNG BAY</h2>
                                    </div>

                                    <p>Giao nhận đường hàng không là thế mạnh của Saiko Express. Với đội ngũ hơn 5 năm kinh nghiệm trong lĩnh vực giao nhận chuyên tuyến Nhật Việt, dịch vụ của Saiko đã đáp ứng được những yêu cầu khắc khe nhất về thời gian cũng như những địa điểm xa xôi nhất, qua đó chúng tôi đã dành được sự tin tưởng, ủng hộ của rất nhiều khách hàng cá nhân, chủ shop hàng Nhật.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="abotimglft">
                                    <img src="assets/images/fly.png" class="img-responsive">
                                </div>
                            </div>
                        </div>

                        <hr class="margtb40">

                        <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40" style="font-size:35px !important">
                            <h2>bảng giá dịch vụ</h2>
                        </div>
                        <img src="assets/price_trip/price_fly.jpg">

                        <hr class="margtb40">
                        <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                            <h2>NỘI DUNG LƯU Ý</h2>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img">
                                        <img src="assets/images/weight.jpeg" alt="" style="width:100vw">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img">
                                        <img src="assets/images/item_special2.jpg" alt="" style="width:100vw">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img">
                                        <img src="assets/images/good_limit.jpeg" alt="" style="width:100vw">
                                    </div>
                                </div>
                            </div>

                        {{-- <hr class="margtb40"> --}}
                        {{-- <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                            <h2>hàng hóa cấm bay theo quy định của pháp luật</h2>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 delservtest">
                                <div class="img">
                                    <img src="assets/images/goods_ban.jpeg" alt="" style="width:100vw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img">
                                    <img src="assets/images/compensation.jpeg" alt="" style="width:100vw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img">
                                    <img src="assets/images/compensation_delivery.jpeg" alt="" style="width:100vw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 delservtest">
                                <div class="img">
                                    <img src="assets/images/arrived_fly.jpeg" alt="" style="width:100vw">
                                </div>
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

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
                                <h4 class="widget-title">Dịch vụ của chúng tôi</h4>
                            </div>
                            <div class="col-md-9">
                                <ul class="menu service-menu" style="display:inline-flex">
                                    <li class="menu-item current-menu-item"><a href="{{route('service.air')}}">Giao nhận đường bay</a></li>
                                    <li class="menu-item "><a href="{{route('service.sea')}}">Giao nhận đường biển</a></li>
                                    <!-- <li class="menu-item "><a href="warehous.php">Kho vận và lưu trữ</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="widget_text widget widget_custom_html">
                            <h4 class="widget-title">Tài liệu quảng cáo của chúng tôi</h4>
                            <div class="textwidget custom-html-widget">
                                <div class="download">
                                    <div class="item-download">
                                        <a href="#" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Sách giới thiệu dịch vụ.Pdf</a>
                                    </div>
                                    <div class="item-download">
                                        <a href="#" target="_blank"><i class="fa fa-file-word-o" aria-hidden="true"></i>Giới thiệu về công ty.Doc</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        {{-- <div class="widget_text widget widget_custom_html">
                            <h4 class="widget-title">Liên hệ chúng tôi</h4>
                            <div class="textwidget custom-html-widget">
                                <div class="cargo-contact-widget">
                                    <div class="detail address">
                                        <i class="flaticon-signs"></i>
                                        <h5>Văn phòng SaikoExpress</h5>
                                        <p>5101-1 Kaminokawa-machi Kawachi-gun, Tochigi-ken, Japan</p>
                                        <!-- <p>Kanji:</p> -->
                                        
                                  
                                    </div>

                                    <div class="detail phone">
                                        <i class="flaticon-phone-call"></i>
                                        <h5>Gọi cho chúng tôi</h5>
                                        <p>080.7965.3923(JP) </p>
                                        <p>19009249(VN)</p>
                                    </div>

                                    <div class="detail email">
                                        <i class="flaticon-message-1"></i>
                                        <h5>Email Saiko</h5>
                                        <p>info@saikoexpress.com</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-12">
                        <div class="servdtlimg margbtm30">
                            <img src="assets/images/services/slide1-3.jpg" alt="">
                        </div>
                        <div class="row paddsec">
                            <div class="col-md-6">
                                <div class="abotinforgt">
                                    <div class="fh-section-title clearfix f25  text-left version-dark paddbtm40">
                                        <h2>giao nhận hàng không</h2>
                                    </div>

                                    <p>Giao nhận đường hàng không là thế mạnh của Saiko Express. Với đội ngũ hơn 5 năm kinh nghiệm trong lĩnh vực giao nhận chuyên tuyến Nhật Việt, dịch vụ của Saiko đã đáp ứng được những yêu cầu khắc khe nhất về thời gian cũng như những địa điểm xa xôi nhất, qua đó chúng tôi đã dành được sự tin tưởng, ủng hộ của rất nhiều khách hàng cá nhân, chủ shop hàng Nhật.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="abotimglft">
                                    <img src="assets/images/services/plane-saiko.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <hr class="margtb40">
                        
                        <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                            <h2>bảng giá dịch vụ</h2> 
                        </div>
                        <img src="assets/images/services/air.png">
                        <hr class="margtb40">
                        <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                            <h2>NỘI DUNG LƯU Ý</h2>
                        </div>
                            <p>- Đối với khách hàng hạng Business và Premium: Miễn phí giao hàng nội thành HN và HCM. 
Khách hạng Business vẫn có thể yêu cầu giao hàng nhiều địa điểm nhưng sẽ mất phí giao hàng nội địa giống như hạng Eco.</p>
                            <p>- Đối với khách hàng hạng ECO và lô hàng dưới 100kg: Có 2 hình thức nhận hàng nội địa như sau:</p>
                            <p>- Khách hàng đến nhận hàng trực tiếp tại Văn phòng chi nhánh của Saiko Express</p>
                            <p>+ Văn phòng tại Hà Nội: </p>
                            <p>Địa chỉ: số 615 đường Lạc Long Quân, Hà Nội ( gần 2 con rồng Hồ Tây )</p>
                            <p>+ Văn phòng tại Đà Nẵng: </p>
                            <p>Địa chỉ: số 15 Bùi Kỷ, Đà Nẵng ( Phí vận chuyển đường bộ từ HN và HCM vào văn phòng Đà Nẵng là 100.000VNĐ/ kiện dưới 30 kg )</p>
                            <p>+ Văn phòng tại HCM: </p>
                            <p>Địa chỉ: số 37/13 đường C18, phường 13, quận Tân Bình, HCM</p>
                            <p>Khách hàng đến trực tiếp lấy hàng cần lưu ý mang theo Chứng mình thư Nhân dân hoặc Bằng lái xe, đặc biệt SĐT đã được đăng ký trên địa chỉ nhận hàng.</p>
                            <p>- Saiko Express sẽ hỗ trợ giao hàng cho khách hàng qua các bên giao hàng nội địa như Giao hàng tiết kiệm, Giao hàng nhanh, VN Post, Grap,....... </p>
                            <p>Phí vận chuyển nội địa Khách hàng tự thanh toán với bên giao hàng nội địa. Saiko Express không chịu trách nhiệm đối với trường hợp mất mát hàng 
hóa sau khi đã giao hàng cho bên vận chuyển quốc nội.</p>
                            <p></p>
                        <hr class="margtb40">
                        <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                            <h2>hàng hóa cấm bay theo quy định của pháp luật</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 delservtest">
                                <div class="fh-testimonials-grid fh-testimonials ">
                                    <div class="testi-list row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            
                                                
                                                <div class="testi-content">
                                                    
                                                    <p>Nếu gửi một trong những vật dụng sau đây, chúng tôi sẽ hoàn trả hàng cho người gửi, phí trả hàng sẽ do người gửi chịu, vui lòng đọc kĩ thông tin sau:</p>
                                                    <p> - Các loại chất nổ mang tính hủy diệt: bom, mìn, pháo,...</p>
                                                    <p> - Các chất dễ gây cháy nổ: gas, cồn, xăng dầu. Có thể nhận biết nếu đọc trên sản phẩm có chữ như sau: LPガス、ガス使用.</p>
                                                    <p> - Những thứ bị cấm vận chuyển theo hiệp định Washington về cấm vận chuyển các sản phẩm có chiết xuất từ động vật quý hiếm như: Mai rùa(スッポン), Kidachi Aloe (có trong Kem Aloins, và một số loại mỹ phẩm), Ngưu hoàng (có trong các loại nước tăng lực, thuốc viên An cung ngưu hoàng).</p>
                                                    <p> - Một số loại chất lỏng như sơn, thuốc trừ sâu, thuốc nhuộm tóc.</p>
                                                    <p> - Tất cả các thiết bị chứa Pin đều phải được tháo Pin, kể cả Pin trong Thuốc lá điện tử, Laptop, Iphone đều bị giới hạn 1 lần chỉ gửi 1 cái.</p>
                                                    <p> - Nước hoa</p>
                                                    <p> - Zippo</p>
                                                    <p> - Bình xịt có ga</p>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <section class="blogpage blog-grid  secpadd">
                            <div class="container">
                                <div class="row">
                                    <div class="blog-wrapper col-xs-12 col-sm-6 col-md-4 col-3">
                                        <div class="wrapper">
                                            <div class="entry-thumbnail">
                                                <img src="assets/images/services/zippo.jpg">
                                            </div>
                                            <header class="entry-header">
                                                <div class="entry-meta clearfix">
                                                    <span class="meta author vcard">Tất cả các loại<a href="#">Zippo</a></span>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                    <div class="blog-wrapper col-xs-12 col-sm-6 col-md-4 col-3">
                                        <div class="wrapper">
                                            <div class="entry-thumbnail">
                                                <img src="assets/images/services/binhxit.jpg">
                                            </div>
                                            <header class="entry-header">
                                                <div class="entry-meta clearfix">
                                                    <span class="meta author vcard">Tất cả các loại<a href="#">bình xịt</a></span>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                    <div class="blog-wrapper col-xs-12 col-sm-6 col-md-4 col-3">
                                        <div class="wrapper">
                                            <div class="entry-thumbnail">
                                                <img src="assets/images/services/nuochoa.jpg">
                                            </div>
                                            <header class="entry-header">
                                                <div class="entry-meta clearfix">
                                                    <span class="meta author vcard">Tất cả các loại<a href="#">nước hoa</a></span>
                                                </div>
                                            </header>
                                        </div>
                                    </div>
                                            
                                </div>     
                            </div>        
                        </section>
                        -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome sec   end-->

     
@include('modules.footer')
@include('modules.nav-mobile')
</body>
</html>
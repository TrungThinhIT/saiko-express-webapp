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
                        <img src="assets/images/price_air.png">
                        <hr class="margtb40">
                        <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                            <h2>NỘI DUNG LƯU Ý</h2>
                        </div>
                            <p>(1)</p>
                            <p> Khối lượng tối thiểu của hàng bay là 1kg. Mỗi kiện không quá 01 laptop và 01 điện thoại. Vui lòng khai báo số lượng và trị giá hàng hóa vào mục *GHI CHÚ* sau khi nhập thông tin kiện hàng trên website https://www.saikoexpress.com..</p>
                            <p>- Nếu khối lượng thể tích lớn hơn khối lượng thực tế thì tính phí vận chuyển với khối lượng thể tích: </p>
                            <p class="text-center">   * Công thức tính Khối Lượng Thể Tích (kg) = Thể tích/ 6000 </p>
                            <p>(2)</p>
                            <p> Các hàng hóa đặc biệt: Loa / Ampli / Điện thoại di động / Ipad / Laptop / Rượu / Đồng hồ đeo tay / Đồ cổ. Các hàng hóa thuộc danh sách trên nếu không được khai báo sẽ bị phạt cước vận chuyển tùy theo số lượng và giá trị món hàng. </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img">
                                        <img src="assets/images/item_special.png" alt="" style="width:100vw">
                                    </div>
                                </div>
                            </div>
                            <p>(3)</p>
                            <p> Lưu ý về bảo hiểm :</p>
                            <p>* Bảo hiểm chỉ có giá trị trong phạm vi từ kho của SAIKO tại Nhật đến kho của SAIKO tại Việt Nam.</p>
                            <p>* Giá trị và số lượng hàng hóa được khách hàng tự khai báo và đăng ký vào mục *GHI CHÚ* khi đăng khí thông tin kiện hàng trên website 
                                https://www.saikoexpress.com</p>
                            <p>* Hàng hóa được đóng bảo hiểm sẽ được đền bù 100% giá trị hàng hóa. Bảo hiểm chỉ có giá trị tối đa 20 triệu/lô hàng. </p>
                            <br>
                            <p>(4)</p>
                            <p> Lưu ý về đền bù nếu xảy ra trễ hàng:</p>
                            <p>* Các chuyến bay và công tác thông quan đôi khi cũng bị ảnh hưởng dẫn đến chậm trễ hàng.</p>
                            <p>* Không đền bù nếu trễ dưới 2 tuần so với lịch hẹn. Trễ 15 ngày thì giảm 50% giá vận chuyển. Trễ trên 45 ngày thì miễn phí tiền vận chuyển. Đây là mức đền bù tối đa đối với sự cố trễ hàng. </p>
                            <p>* Không chịu trách nhiệm đền bù nếu chậm trễ do lỗi của các bên vận chuyển nội địa như VNPOST.</p>
                            <p>* Không tính ngày lễ của Nhật và Việt Nam vào ngày trễ hàng.</p>
                            <br>
                            <p>(5)</p>
                            <p> Lưu ý về đền bù khi mất, vỡ hàng hóa: Hàng hóa không được đóng bảo hiểm thì sẽ được đền bù 4 lần phí vận chuyển trong trường hợp thất lạc hoặc hư hỏng trong quá trình vận chuyển với mọi lý do trừ các hàng dễ vỡ, hư hỏng như đồ gốm, thủy tinh và một số máy móc công nghệ cao, … và các hàng biến dạng hoặc xây xát do việc đóng gói của khách hàng.</p>
                        <hr class="margtb40">
                        <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                            <h2>hàng hóa cấm bay theo quy định của pháp luật</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 delservtest">
                                <div class="img">
                                    <img src="assets/images/item_ban.png" alt="" style="width:100vw">
                                </div>
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
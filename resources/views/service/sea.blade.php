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
            <div class="col-md-3">
                <div class="widget services-menu-widget">
                    <h4 class="widget-title">Dịch vụ của chúng tôi</h4>
                    <ul class="menu service-menu">
                        <li class="menu-item current-menu-item"><a href="{{route('service.sea')}}">Giao nhận đường biển</a></li>
                        <li class="menu-item "><a href="{{route('service.air')}}">Giao nhận hàng không</a></li>
                        <!-- <li class="menu-item "><a href="warehous.php">Kho vận và lưu trữ</a></li> -->
                    </ul>
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

                <div class="widget_text widget widget_custom_html">
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
                </div>
            </div>
            <div class="col-md-9">
                <div class="servdtlimg margbtm30">
                    <img src="assets/images/services/slide1-3.jpg" alt="">
                </div>
                <div class="row paddsec">
                    <div class="col-md-6">
                        <div class="abotinforgt">
                            <div class="fh-section-title clearfix f25  text-left version-dark paddbtm40">
                                <h2>giao nhận hàng biển</h2>
                            </div>

                            <p>Ngoài đường bay, Saiko Express còn cung cấp dịch vụ vận chuyển đường biển. Với chi phí
                                hợp lý, đây là giải pháp vận chuyển tối ưu cho những mặt hàng với trọng tải lớn mà vận
                                chuyển hàng không chưa thể đảm nhận.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="abotimglft">
                            <img src="assets/images/services/single-service-i.png" class="img-responsive">
                        </div>
                    </div>
                </div>
                <hr class="margtb40">

                <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                    <h2>bảng giá dịch vụ</h2>
                </div>
                <img src="assets/images/services/sea.png">






                <hr class="margtb40">
                <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                    <h2>PHƯƠNG THỨC VẬN CHUYỂN NỘI ĐỊA</h2>
                </div>
                <p>- Đối với khách hàng hạng Business và Premium: Miễn phí giao hàng nội thành HN và HCM.
                    Khách hạng Business vẫn có thể yêu cầu giao hàng nhiều địa điểm nhưng sẽ mất phí giao hàng nội địa
                    giống như hạng Eco.</p>
                <p>- Đối với khách hàng hạng ECO và lô hàng dưới 100kg: Có 2 hình thức nhận hàng nội địa như sau:</p>
                <p>+ Phí vận chuyển nội thành HN và HCM là 40.000đ/kiện</p>
                <p>- Khách hàng đến nhận hàng trực tiếp tại Văn phòng chi nhánh của Saiko Express</p>
                <p>+ Văn phòng tại Hà Nội: </p>
                <p>Địa chỉ: số 615 đường Lạc Long Quân, Hà Nội ( gần 2 con rồng Hồ Tây )</p>
                <p>+ Văn phòng tại Đà Nẵng: </p>
                <p>Địa chỉ: số 53 đường Hóa Mỹ, Đà Nẵng ( Phí vận chuyển đường bộ từ HN và HCM vào văn phòng Đà Nẵng là
                    100.000VNĐ/ kiện dưới 30 kg )</p>
                <p>+ Văn phòng tại HCM: </p>
                <p>Địa chỉ: số 37/13 đường C18, phường 13, quận Tân Bình, HCM</p>
                <p>Khách hàng đến trực tiếp lấy hàng cần lưu ý mang theo Chứng mình thư Nhân dân hoặc Bằng lái xe, đặc
                    biệt SĐT đã được đăng ký trên địa chỉ nhận hàng.</p>
                <p>- Saiko Express sẽ hỗ trợ giao hàng cho khách hàng qua các bên giao hàng nội địa như Giao hàng tiết
                    kiệm, Giao hàng nhanh, VN Post, Grap,....... </p>
                <p>Phí vận chuyển nội địa Khách hàng tự thanh toán với bên giao hàng nội địa. Saiko Express không chịu
                    trách nhiệm đối với trường hợp mất mát hàng hóa sau khi đã giao hàng cho bên vận chuyển quốc nội.
                </p>
                <hr class="margtb40">
                <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                    <h2>VẬN CHUYỂN AN TOÀN</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="fh-service-box-2   box-style-1  no-thumb">
                            <div class="box-thumb"></div>
                            <div class="box-wrapper">
                                <div class="box-header clearfix">
                                    <h4 class="box-title"><span class="fh-icon"><i
                                                class="flaticon-transport-7"></i></span> Full Container Load (FCL)</h4>
                                    <span class="sub-title main-color">Trung tâm vận chuyển hàng hóa trực tiếp</span>
                                </div>
                                <div class="box-content">
                                    <p>FCL là xếp hàng nguyên container, người gửi hàng và người nhận hàng chịu trách
                                        nhiệm đóng gói hàng và dỡ hàng khỏi container.</p>
                                    <ul>
                                        <li>Tiết kiệm chi phí</li>
                                        <li>Tiết kiệm thời gian</li>
                                        <li>Tiết kiệm sức lực</li>
                                        <li>An toàn và chính xác</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fh-service-box-2  box-style-1  no-thumb">
                            <div class="box-thumb"></div>
                            <div class="box-wrapper">
                                <div class="box-header clearfix">
                                    <h4 class="box-title"><span class="fh-icon"><i
                                                class="flaticon-transport-10"></i></span> Less than Container Load (LCL)
                                    </h4><span class="sub-title main-color">Trung tâm vận chuyển hàng hóa trực
                                        tiếp</span>
                                </div>
                                <div class="box-content">
                                    <p>Saiko Express sẽ tập hợp những lô hàng lẻ của nhiều chủ hàng, tiến hành sắp xếp,
                                        phân loại, kết hợp các lô hàng lẻ đóng vào container.</p>
                                    <ul>
                                        <li>Tiết kiệm chi phí</li>
                                        <li>Tiết kiệm thời gian</li>
                                        <li>Tiết kiệm sức lực</li>
                                        <li>An toàn và chính xác</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div clas="row">
                    <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                        <h2>Lợi ích của dịch vụ</h2>
                    </div>
                    <div class="servdtlaccord margbtm40">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                            Giao hàng nhanh trên toàn thế giới
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                                    style="height: 0px;">
                                    <div class="panel-body">
                                        Người xây dựng hạnh phúc của con người. Không ai từ chối, không thích, hoặc tự
                                        tránh khoái cảm, vì đó là niềm vui, nhưng vì quyến rũ những người không biết
                                        cách theo đuổi khoái cảm.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                                            Giải pháp đầu cuối có sẵn
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                    style="height: 0px;">
                                    <div class="panel-body">
                                        Người xây dựng hạnh phúc của con người. Không ai từ chối, không thích, hoặc tự
                                        tránh khoái cảm, vì đó là niềm vui, nhưng vì quyến rũ những người không biết
                                        cách theo đuổi khoái cảm.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseThree" aria-expanded="true">
                                            An toàn &amp; Tuân thủ
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse in" aria-expanded="true"
                                    style="">
                                    <div class="panel-body">
                                        Người xây dựng hạnh phúc của con người. Không ai từ chối, không thích, hoặc tự
                                        tránh khoái cảm, vì đó là niềm vui, nhưng vì quyến rũ những người không biết
                                        cách theo đuổi khoái cảm.
                                    </div>
                                </div>
                            </div>
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

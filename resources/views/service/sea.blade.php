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
                            <li class="menu-item current-menu-item"><a href="{{route('service.sea')}}">GIAO NHẬN ĐƯỜNG BIỂN</a></li>
                            <li class="menu-item "><a href="{{route('service.air')}}">GIAO NHẬN ĐƯỜNG BAY</a></li>
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
                            <img src="assets/images/ship.png" class="img-responsive" >
                        </div>
                    </div>
                </div>
                <hr class="margtb40">

                <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                    <h2>bảng giá dịch vụ</h2>
                </div>
                <img src="assets/images/img_insurance.png">
                <hr class="margtb40">
                <div class="fh-section-title f25 clearfix  text-left version-dark paddbtm40">
                    <h2>NỘI DUNG LƯU Ý</h2>
                </div>
                <P>(1)</P>
                <p> Khối lượng tối thiểu của hàng bay là 10kg. Vui lòng khai báo số lượng và trị giá hàng hóa vào mục *GHI CHÚ* sau khi nhập thông tin kiện hàng trên website https://www.saikoexpress.com</p>
                <p>- Nếu khối lượng thể tích lớn hơn khối lượng thực tế thì tính phí vận chuyển với khối lượng thể tích:</p>
                <p class="text-center ">*Công thức tính Khối Lượng Thể Tích (kg) = Thể tích/ 3500 </p>
                <p>(2)</p>
                <p> Các hàng hóa đặc biệt: Loa / Ampli / Điện thoại di động / Ipad / Laptop / Rượu / Đồng hồ đeo tay / Đồ cổ. Các hàng hóa thuộc danh sách trên nếu không được khai báo sẽ bị phạt cước vận chuyển tùy theo số lượng và giá trị món hàng</p>
                <div class="row">
                    <div class="col-md-12">
                        <img src="assets/images/item_special.jpg" style="width:100vw" >
                    </div>
                </div>
                <p>(3)</p>
                <p> Lưu ý về bảo hiểm : </p>
                <p>* Giá trị và số lượng hàng hóa được khách hàng tự khai báo và đăng ký vào mục *GHI CHÚ* khi đăng khí thông tin kiện hàng trên website (https://www.saikoexpress.com)</p>
                <p>+ Văn phòng tại Đà Nẵng: </p>
                <p>* Hàng hóa đóng bảo hiểm sẽ được đền bù 100% giá trị hàng hóa. Bảo hiểm chỉ có giá trị tối đa 50 triệuVNĐ/lô hàng. </p>
                <br>
                <p>(4)</p>
                <p> Lưu ý về đền bù nếu xảy ra trễ hàng: </p>
                <p>* Các chuyến bay và công tác thông quan đôi khi cũng bị ảnh hưởng dẫn đến chậm trễ hàng.</p>
                <p>* Không đền bù nếu trễ dưới 3 tháng so với lịch hẹn. Trễ trên 3 tháng thì giảm 50% giá vận chuyển. Đây là mức đền bù tối đa đối với sự cố trễ hàng.</p>
                <p>* Không chịu trách nhiệm đền bù nếu chậm trễ do lỗi của các bên vận chuyển nội địa như VNPOST. </p>
                <p>* Không tính ngày lễ của Nhật và Việt Nam vào ngày trễ hàng. </p>
                <br>
                <p>(5)</p>
                <p> Lưu ý về đền bù khi mất, vỡ hàng hóa: Hàng hóa không được đóng bảo hiểm thì sẽ được đền bù 4 lần phí vận chuyển trong trường hợp thất lạc hoặc hư hỏng trong quá trình vận chuyển với mọi lý do trừ các hàng dễ vỡ, hư hỏng như đồ gốm, thủy tinh và một số máy móc công nghệ cao, … và các hàng biến dạng hoặc xây xát do việc đóng gói của khách hàng.</p>
                <hr class="margtb40">
                {{-- <div class="fh-section-title f20 clearfix  text-left version-dark paddbtm40">
                    <h2>VẬN CHUYỂN AN TOÀN</h2>
                </div> --}}
                {{-- <div class="row">
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
                </div> --}}
                {{-- <div clas="row">
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
                </div> --}}


            </div>
        </div>

    </div>
</div>
<!-- Welcome sec   end-->



@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

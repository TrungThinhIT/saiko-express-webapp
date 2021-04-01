<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->

<!--Header start-->
@include('modules.header')
<!--header end -->
<!--Breadcrumb start-->
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
<!--Breadcrumb end-->
<!--Our expertise section one start -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90 layout-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="ed_video_section_discription">
                    <h4>CHÚNG TÔI LÀ AI</h4>
                    <p>
                        Xuất phát từ nhu cầu thiết thực của rất đông người Việt xa xứ tại Nhật Bản: Gửi quà tặng về tận
                        nhà cho gia đình, người thân tại Viêt Nam; chúng tôi đã thành lập nên Saiko Express. Với sự đầu
                        tư nghiêm túc về công nghệ, quy trình vận chuyển, cùng đội ngũ nhân viên thân thiện, chuyên
                        nghiệp, Saiko Express hướng đến trở thành dịch vụ vận chuyển Nhật Việt tốt nhất với 3 tiêu chí:
                        Đơn giản - Tận tâm - Uy tín.
                    </p>
                    <input value="Xem thêm" class="btn fh-btn" onclick="aboutDetail()">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="ed_video_section">
                    <div class="embed-responsive embed-responsive-16by9">
                        <!-- <div class="ed_video">
       <img src="<?php echo ''; ?>assets/images/v_bg.jpg" style="cursor:pointer"  alt="1" />
       <div class="ed_img_overlay">
        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
       </div>
      </div> -->
                        <iframe class="embed-responsive-item" src="assets/saiko.mp4" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--Our expertise section one end -->
<!--skill section start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder60">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3 class="text-mobile-dh">ĐỒNG HÀNH CÙNG SAIKO EXPRESS <br>HƠN CẢ MỘT DỊCH VỤ</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-child"></i></div>
                        <h4>trung thực</h4>
                    </div>
                    <div class="box-content">
                        Khách hàng hoàn toàn yên tâm trong quá trình kiểm hàng và chính xác cân nặng hàng hóa.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-tags"></i></div>
                        <h4>tiện lợi</h4>
                    </div>
                    <div class="box-content">
                        Cung cấp giải pháp về vận chuyển hàng hóa tối ưu nhất. KH tự theo dõi Tracking Online.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-handshake-o"></i></div>
                        <h4>uy tín</h4>
                    </div>
                    <div class="box-content">
                        Nhiều năm hoạt động lĩnh vực vận chuyển. Am hiểu chuyên môn và thủ tục thông quan.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-users"></i></div>
                        <h4>hỗ trợ 24x7</h4>
                    </div>
                    <div class="box-content">
                        Đội ngũ nhân viên tận tình, sẵn sàng hỗ trợ tư vấn và giải đáp thắc mắc 24/7.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-money"></i></div>
                        <h4>tiết kiệm</h4>
                    </div>
                    <div class="box-content">
                        Giá cước vận chuyển hợp lý, số lượng hàng hóa gửi càng nhiều giá cước càng rẻ.
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="iconbox style1 skill_section">
                    <div class="box-header">
                        <div class="box-icon"><i class="fa fa-street-view"></i></div>
                        <h4>trách nhiệm</h4>
                    </div>
                    <div class="box-content">
                        Saiko Express luôn đảm bảo độ tin cậy từng kiện hàng của quý khách.
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!--skill section end -->
<!--Timer Section three start -->
<div class="ed_timer_section ed_toppadder90 ed_bottompadder60">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>TẠI SAO CHỌN CHÚNG TÔI</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_counter_wrapper">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="ed_counter">
                            <h2 class="timer" data-from="0" data-to="3" data-speed="5"></h2>
                            <h4>3 chuyến/ 1 tuần</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="ed_counter">
                            <h2 class="timer" data-from="0" data-to="100000" data-speed="500000"></h2>
                            <h4>Khách hàng Saiko</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="ed_counter">
                            <h2 class="timer" data-from="0" data-to="980000" data-speed="400000"></h2>
                            <h4>Số KG đã vận chuyển</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="ed_counter">
                            <h2 class="timer" data-from="0" data-to="5" data-speed="100"></h2>
                            <h4>Năm kinh nghiệm</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ed_bottompadder80">
                <div class="ed_heading_top">
                    <h3>CẢM NHẬN CỦA KHÁCH HÀNG</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_latest_news_slider">
                    <div id="owl-demo2" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="<?php echo ''; ?>assets/images/bg/sinh.jpg"
                                    alt="1" title="1" />
                                <h4>Jean Nguyễn</h4>
                                <span>Sinh viên</span>
                                <p>Rất ấn tượng với cách đóng hàng của Saiko, kỹ và đẹp mắt. Giá cả cũng rất hợp lý so
                                    với các dịch vụ khác mình đã sử dụng. Sẽ giới thiệu Saiko Express với bạn bè của
                                    mình.</p>
                            </div>
                        </div>
                        <!-- <div class="item">
       <div class="ed_item_description">
        <img src="<?php echo ''; ?>assets/images/bg/nhan-vien-van-phong.jpg" alt="1" title="1"/>
        <h4>Ronnie Parker</h4>
        <span>manager</span>
        <p>Just in case there is anyone looking for it, new expertise to our knowledge base to make you happy as well.</p>
       </div>
      </div> -->
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="<?php echo ''; ?>assets/images/bg/boss.jpg"
                                    alt="1" title="1" />
                                <h4>Anh Long</h4>
                                <span>Chủ Shop hàng Nhật tại Hà Nội</span>
                                <p>Qua tất cả các dịch vụ mình sử dụng, Saiko Express vẫn là đơn vị mình hài lòng nhất
                                    về thời gian vận chuyển, tư vấn nhiệt tình và đặc biệt, giá cả cực kỳ cạnh tranh.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="<?php echo ''; ?>assets/images/bg/boss1.jpg"
                                    alt="1" title="1" />
                                <h4>Mr.Sakaki</h4>
                                <span>Chủ nhà hàng Nhật</span>
                                <p>Là chủ nhà hàng nhật, tôi luôn cần một công ty vận chuyển những nguyên liệu thiết yếu
                                    cho nhà hàng của mình. Saiko đã thực sự là đã giải quyết nỗi lo lớn nhất của tôi.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="<?php echo ''; ?>assets/images/bg/boss2.jpg"
                                    alt="1" title="1" />
                                <h4>Chị Thảo</h4>
                                <span>Nhân viên Marketing</span>
                                <p>Nhanh gọn và đơn giản, trả hàng đúng hẹn, đóng gói cẩn thận. Các bạn nhân viên Saiko
                                    rất có tâm, còn chỉ mình cả chỗ mua hàng rẻ nhất nữa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--client section start -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>DANH SÁCH ĐƠN VỊ LIÊN KẾT</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_clientslider">
                    <div id="owl-demo5" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="<?php echo ''; ?>assets/images/partener/1.jpg"
                                    alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="<?php echo ''; ?>assets/images/partener/2.png"
                                    alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="<?php echo ''; ?>assets/images/partener/3.png"
                                    alt="Partner Img" />
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <img src="<?php echo ''; ?>assets/images/partener/5.jpg"
                                    alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="<?php echo ''; ?>assets/images/partener/6.png"
                                    alt="Partner Img" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--Newsletter Section six start-->
<div class="ed_newsletter_section ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_newsletter_section_heading">
                            <h4>Bạn sẽ nhận được thông báo quan trọng của chúng tôi.</h4>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
                        <div class="row">
                            <div class="ed_newsletter_section_form">
                                <form class="form">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                        <input class="form-control" type="text" placeholder="Nhập email" />
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <button class="btn ed_btn ed_green">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Newsletter Section six end-->
<!--Footer Top section start-->

@include('modules.footer')
<script>
    function aboutDetail() {
        window.location.href = "/about-us-detail.php";
    }

</script>
</body>

</html>

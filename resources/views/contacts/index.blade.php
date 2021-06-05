<html>
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

    .fh-contact-box ul li a i {
        float: none;
        color: inherit;
        font-size: inherit;
        top: 26px;
        margin-top: 10px;
    }

    .ed_info_wrapper a i {
        margin-top: 8px;
    }

</style>


<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>LIÊN HỆ</h2>
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
<section class="contactpagesec secpadd layout-main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="fh-section-title clearfix f25 text-left version-dark paddbtm40">
                    <h2>Về Saiko</h2>
                </div>
                <p class="margbtm30">Saiko Express cung cấp các giải pháp vận chuyển và hậu cần toàn diện chuyên tuyến
                    Nhật Việt</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="fh-contact-box type-address "><i class="flaticon-pin"></i>
                            <h4 class="box-title">Văn phòng Saiko ở Nhật</h4>
                            <div class="desc">
                                <p>5101-1 Kaminokawa-machi Kawachi-gun, Tochigi-ken, Japan</p>
                                <p>329-0611 栃木県河内郡上三川町 上三川 51011</p>
                                <!-- <p>Kanji:</p> -->

                            </div>
                        </div>
                        <div class="fh-contact-box type-address "><i class="flaticon-pin"></i>
                            <h4 class="box-title">Văn phòng Saiko ở Việt Nam</h4>
                            <div class="desc">
                                <p></p>
                                <p></p>
                                <!-- <p>Kanji:</p> -->
                            </div>
                        </div>
                        <div class="fh-contact-box type-email "><i class="flaticon-business"></i>
                            <h4 class="box-title">Email:</h4>
                            <div class="desc">
                                <p>info@saikoexpress.com
                                    <br>support@saikoexpress.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="fh-contact-box type-phone "><i class="flaticon-phone-call "></i>
                            <h4 class="box-title">Gọi ngay cho Saiko</h4>
                            <div class="desc">
                                {{-- <p>080.7965.3923(JP) </p> --}}
                                <p>1900.9249(VN)</p>
                            </div>
                        </div>
                        <div class="fh-contact-box type-social "><i class="flaticon-share"></i>
                            <h4 class="box-title">Mạng xã hội Saiko</h4>
                            <ul class="clearfix">
                                <li class="facebook">
                                    <a href="https://fb.com/saikoexpress"
                                        target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#" target="_blank">
                                        <i class="iconify" data-icon="simple-icons:viber" style="font-size:38px" data-inline="true"></i>
                                    </a>
                                </li>
                                <li class="googleplus">
                                    <a href="#" target="_blank">
                                        <img src="../assets/images/icon_zalo.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="opening-hours vc_opening-hours">
                    <h3>THỜI GIAN LÀM VIỆC</h3>
                    {{-- <p>Niềm vui công việc sẽ cho bạn một hạnh phúc trọn vẹn.</p> --}}
                    <ul>
                        <li>Thứ Hai <span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Thứ Ba<span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Thứ Tư <span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Thứ Năm <span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Thứ Sáu <span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Thứ 7 <span class="hour">8:00 am – 19.00 pm</span></li>
                        <li>Chủ Nhật<span class="hour main-color">Thư giãn</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2915.572444111209!2d139.91219548920506!3d36.4388579768731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f5b2dae53df77%3A0x720cfffef4f375f8!2sSaiko+Express!5e0!3m2!1svi!2sjp!4v1546254919308"
    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

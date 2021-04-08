<!DOCTYPE html>
<html lang="en">
<style>
    .form-control {
        width: auto !important;
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

    .img-mobile {
        width: 50%;
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

        .img-mobile {
            width: 100% !important;
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
                    <h2>Về chúng tôi</h2>
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ed_blog_all_item">
                    <div class="ed_blog_item ed_bottompadder50">

                        <div class="ed_blog_info">
                            <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                                <h2>CHÚNG TÔI LÀ AI ?</h2>
                            </div>

                            <p>Chào mừng bạn đến với Saiko Express, một trong những công tuy vận chuyển uy tin hàng đầu
                                Việt Nam với nền tảng kinh nghiệm và chuyên môn vững vàng cùng dịch vụ vượt trội toàn
                                diện.</p>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/about-us1.jpg" />
                            </div>


                            <p>Saiko Express ra đời với mong muốn giải quyết bài toán trong thời đại hàng hóa giao
                                thương càng ngày càng phát triển giữa Việt Nam và Nhật Bản.</p>
                            <p>Saiko Express tự hào với kinh nghiệm 5 năm hoạt động kinh doanh trong lĩnh vực giao nhận
                                hàng hóa quốc tế. Saiko Express chính là giải pháp chuyển giao hàng hóa tối ưu, là sự
                                lựa chọn hoàn hảo cũng như đối tác kinh doanh đắc lực nhất cho quý khách.</p>
                            <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                                <h2>TẦM NHÌN</h2>
                            </div>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/about-us2.jpg" />
                            </div>
                            <p>Mục tiêu của chúng tôi là trở thành một trong những công ty dịch vụ vận chuyển lớn mạnh
                                tại Nhật Bản và đáng tin cậy, cùng khách hàng tăng doanh thu và lợi nhuận. Phát triển
                                mảng giao thương hàng hóa quốc tế. Khách hàng không cần lo lắng khi muốn sử dụng hàng
                                hóa từ nước ngoài.</p>
                            <div class="fh-section-title clearfix f30  text-left version-dark paddbtm40">
                                <h2>SỨ MỆNH</h2>
                            </div>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/about-us3.jpg" />
                            </div>
                            <p>Saiko Express thực hiện việc giao vận, góp phần quan trọng vào sự phát triển chung của
                                thị trường thương mại điện tử. Saiko Express vượt qua các công ty đa quốc gia về dịch vụ
                                giao nhận hàng hóa tại Việt Nam và Nhật bản, qua đó khẳng định sức mạnh của mình.</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@include('modules.footer')


</body>

</html>

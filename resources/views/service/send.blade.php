<!DOCTYPE html>
<html lang="en">
<style>
    .ed_pagetitle{
        background-image: url(../assets/images/procedure.jpeg) !important;
    }
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
            width: 100%;
        }

    }

    .ed_blog_info p {
        float: none !important;

    }

</style>
@include('modules.header')
<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>QUY TRÌNH GỬI HÀNG</h2>
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
                        <p>Quý khách hàng thân mến:</p>
                        <p>Để việc gửi hàng thuận tiện, Saiko Express xin đưa ra quy trình gửi hàng với nội dung như sau:</p>
                        <div class="ed_blog_info">
                            <h2 style="text-align:center;    font-weight: 700;
                            margin-bottom: 30px;">QUY TRÌNH GỬI HÀNG</h2>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/title_send.png" />
                            </div>
                            <hr>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/bn2.png" />
                            </div>
                            <hr>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/bn3.png" />
                            </div>
                            <div class="col-12 text-center" style="margin-bottom: 30px;">
                                <img class="img-mobile"
                                    src="assets/images/bm4.png" />
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

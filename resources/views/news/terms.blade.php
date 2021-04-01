<!DOCTYPE html>
<html lang="en">
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


<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>NỘI DUNG BÀI VIẾT</h2>
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

<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90 layout-main">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ed_blog_all_item">
                    <div class="ed_blog_item ed_bottompadder50">
                        <div class="ed_blog_image sing page-single">
                            <img src="assets/images/blogs/blog-3.jpg"
                                alt="blog image" />
                        </div>
                        <div class="ed_blog_info">
                            <h2>Những thuật ngữ phổ biến trong vận chuyển hàng hóa bằng đường hàng không </h2>
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> 06, 07, 2020</a></li>
                                <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 4 comments</a></li> -->
                            </ul>
                            <p>Dưới đây là một số thuật ngữ phổ biến trong vận tải hàng không, trong đó có những chữ cái
                                viết tắt, hầu hết đều xuất phát từ tiếng Anh:</p>
                            <ul class="item">

                                <li>A2A - Airport-to-Airport: vận chuyển từ sân bay khởi hành tới sân bay đích</li>
                                <li>ATA - Actual Time of Arrival: Thời gian đến thực tế</li>
                                <li>ATD - Actual Time of Departure: Thời gian khởi hành thực tế</li>
                                <li>AWB - Air Waybill: vận đơn hàng không, lại được chia thành MAWB - Master Air Waybill
                                    (vận đơn chủ do hãng hàng không phát hành) và HAWB - House Air Waybill (vận đơn nhà
                                    do người giao nhận phát hành)</li>
                                <li>Booking: Đề nghị lưu chỗ trên máy bay, được hãng hàng không xác nhận</li>
                                <li>Dimensional Weight: Số đo trọng lượng thể tích, là khoảng trống hoặc khối lượng của
                                    lô hàng.</li>
                                <li>FCR - Forwarder’s Certificate of Receipt: Giấy chứng nhận đã nhận hàng của người
                                    giao nhận</li>
                                <li>FTC - Forwarder’s Certifficate of Transport: Giấy chứng nhận vận chuyển của người
                                    giao nhận</li>
                                <li>FWR - Forwarder’s Warehouse Receipt: Biên lai kho hàng của người giao nhận (cấp cho
                                    người xuất khẩu)</li>
                                <li>GSA - General Sales Agent: Đại lý khai thác hàng được hãng hàng không chỉ định</li>
                                <li>IATA - International Air Transport Association: Hiệp hội Vận tải Hàng không Quốc tế
                                </li>
                                <li>NOTOC - Notification To Captain: Thông báo cho cơ trưởng, là danh sách hàng hóa trên
                                    máy bay báo cho cơ trưởng chuyến bay biết</li>
                                <li>TACT - The Air Cargo Tariff: Bảng cước vận chuyển hàng hóa hàng không, do hãng hàng
                                    không công công bố</li>
                                <li>POD - Proof Of Delivery: Bằng chứng giao hàng, chứng từ thể hiện về việc người vận
                                    tải đã giao hàng theo thỏa thuận.</li>
                                <li>Volume charge: Cước phí vận tải hàng không tính theo dung tích hàng (thay vì trong
                                    trọng lượng)</li>
                                <li>Weight charge: Cước phí hàng không tính theo trọng lượng hàng hóa thực tế</li>
                            </ul>
                            <p>Còn nhiều những thuật ngữ và từ viết tắt nữa, nên tôi sẽ tổng hợp đầy đủ hơn trong một
                                bài viết riêng để bạn tiện tra cứu.</p>




                        </div>
                        <div class="ed_blog_tags">
                            <ul>
                                <li><i class="fa fa-tags"></i> <a href="#">tags: </a></li>
                                <li><a href="#">trucks,</a></li>
                                <li><a href="#">transport,</a></li>
                                <li><a href="#">warehouse,</a></li>
                                <li><a href="#">freight</a></li>
                            </ul>

                        </div>
                    </div>
                    <!--Quotation start-->

                    <!--Quotation end-->
                    <!--Comments section start-->

                    <!--Comments section end-->
                    <!--Comments Form start-->

                    <!--Comments Form end-->
                </div>
            </div>
        </div>
    </div>
</div>

@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

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
                        <div class="ed_blog_image page-single">
                            <img src="<?php echo ''; ?>assets/images/blogs/blog-7.jpg"
                                alt="blog image" />
                        </div>
                        <div class="ed_blog_info">
                            <h2>Cước vận chuyển hàng không – Cách tính thế nào ?</h2>
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> 06, 07, 2020</a></li>
                                <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 4 comments</a></li> -->
                            </ul>
                            <p>Cước vận chuyển hàng không là số tiền mà chủ hàng phải trả cho công ty dịch vụ để vận
                                chuyển lô hàng từ sân bay khởi hành đến sân bay đích.</p>
                            <p>Cần phân biệt khái niệm này với cước phí vận chuyển hành khách - vẫn thường được gọi là
                                giá vé máy bay.</p>
                            <p>Về cơ bản, giá cước gửi hàng bằng máy bay cũng tương tự như cước vận chuyển bằng các
                                phương thức khác như đường biển, đường sắt, hay đường bộ. Tất nhiên, cách thức cách tính
                                giá cước vận chuyển hàng không nội địa hay quốc tế sẽ có những điểm khác mà tôi sẽ nêu
                                chi tiết trong phần tiếp dưới đây.</p>
                            <h4>Cách tính cước vận chuyển hàng không</h4>
                            <p>Cước phí trong vận tải hàng không được quy định trong các biểu cước thống nhất. Hiệp hội
                                vận tải hàng không Quốc tế – IATA (International Air Transport Association) đã có quy
                                định về quy tắc, cách thức tính cước và cho phát hành trong biểu cước hàng không TACT
                                (The Air Cargo Tariff).</p>
                            <p>Công thức tính cước như sau: </p>
                            <div>
                                <h4>Cước hàng không = Đơn giá cước x Khối lượng tính cước</h4>
                                <!-- <blockquote>
      
                        </blockquote> -->
                            </div>
                            <p>Nhìn công thức có thể thấy: để tính số tiền cước cho mỗi lô hàng, bạn cần quan tâm tới 2
                                đại lượng: Đơn giá và Khối lượng</p>
                            <h4>1. Đơn giá cước (rate)</h4>
                            <p>Đó là số tiền bạn phải trả cho mỗi đơn vị khối lượng tính cước (chẳng hạn 15usd/kg).</p>
                            <p>Các hãng vận chuyển sẽ công bố bảng giá cước theo từng khoảng khối lượng hàng. Chẳng hạn,
                                Công ty ASL công bố bảng giá cước vận chuyển hàng không quốc tế tại đây.</p>
                            <p>Ở đây, mức cước có sự thay đổi tùy theo khối lượng hàng, được chia thành các khoảng như
                                sau:</p>
                            <ul class="item">
                                <li>Dưới 45kg</li>
                                <li>Từ 45 đến dưới 100kg</li>
                                <li>Từ 100 đến dưới 250kg</li>
                                <li>Từ 250 đến dưới 500kg</li>
                                <li>Từ 500 đến dưới 1000kg...</li>
                            </ul>
                            <p>Cách viết tắt thường thấy là: -45, +45, +100, +250, +500kg ...</p>
                            <h4>2. Khối lượng tính cước (Chargable Weight):</h4>
                            <p>Câu hỏi tôi thường thấy là: Khối lượng tính cước, hay Chargeable Weight là gì? Cách tính
                                Chargeable Weight trong hàng không như thế nào?</p>
                            <p>Chargeable Weight chính là khối lượng thực tế, hoặc khối lượng thể tích, tùy theo số nào
                                lớn hơn.</p>
                            <p>Nói cách khác, cước phí sẽ được tính theo số lượng nào lớn hơn của:</p>
                            <ul>
                                <li>Khối lượng thực tế của hàng (Actual Weight), chẳng hạn lô hàng nặng 300kg</li>
                                <li>Khối lượng thể tích, hay còn gọi là khối lượng kích cỡ (Volume / Volumetric /
                                    Dimensional Weight) là loại quy đổi từ thể tích của lô hàng theo một công thức được
                                    Hiệp hội vận tải hàng không Quốc tế - IATA quy định. Với các số đo thể tích theo
                                    centimet khối, thì công thức là:</li>
                            </ul>
                            <blockquote>
                                Khối lượng thể tích = Thể tích hàng : 6000
                            </blockquote>
                            <blockquote>
                                Ghi chú: Nếu đơn vị đo tính bằng inch, pound (hệ Anh) thì công thức có khác đi chút,
                                nhưng do ở Việt Nam chúng ta dùng hệ mét, nên tôi chỉ nêu 1 công thức trên đỡ bị rối.
                                Ngoài ra, các hãng chuyển phát nhanh dùng công thức riêng (tôi nêu trong phần dưới)
                            </blockquote>
                            <p>Lý do cần phải sử dụng 2 loại khối lượng trên là vì khả năng chuyển chở của máy bay có
                                hạn, và bị khống chế bởi khối lượng và dung tích sử dụng để chở hàng. Hãng hàng không sẽ
                                tìm cách để tối đa lợi ích thu về, nên sẽ tính cước theo khối lượng hoặc khối lượng quy
                                đổi, tùy theo loại hàng nặng hay nhẹ. Khối lượng quy đổi từ thể tích là nhắm tới những
                                loại hàng cồng kềnh, có thể tích lớn.</p>
                            <div class="col-12 text-center" style="margin-bottom: 30px;margin-top: 20px">
                                <img
                                    src="<?php echo ''; ?>assets/images/blogs/blog-7-1.jpg" />
                                <p style="text-align: center;">Hàng cồng kềnh</p>
                            </div>
                            <p>Để minh họa cách xác định khối lượng tính cước, tôi lấy ví dụ để bạn dễ hình dung:</p>
                            <h5>Ví dụ 1 - Khối lượng thực tế lớn hơn Khối lượng thể tích</h5>
                            <p>Công ty tôi muốn nhập khẩu lô hàng gồm 2 kiện, mỗi kiện nặng 50kg và có kích thước là 50
                                x 40 x 40 (cm). Cách tính như sau:</p>
                            <ul class="item">
                                <li>Khối lượng thực tế (AW): 2 x 50 = 100kg</li>
                                <li>Khối lượng thể tích (DW): 2 x (50 x 40 x 40) = 26.67kg</li>
                            </ul>
                            <p>Khối lượng thực tế lớn hơn nên sẽ được lấy làm khối lượng tính cước: 100kg</p>
                            <h5>Ví dụ 2 - Khối lượng thực tế nhỏ hơn Khối lượng thể tích</h5>
                            <p>Công ty bạn muốn vận chuyển 5 thùng hàng, mỗi thùng nặng 20kg và có kích thước 70x50x60
                                (cm). Vậy ta tính như sau:</p>
                            <ul class="item">
                                <li>Khối lượng thực tế (AW): 5 x 20 = 100kg</li>
                                <li>Khối lượng thể tích (DW): 5 x (70 x 50 x 60) / 6000 = 175kg</li>
                            </ul>
                            <p>Do DW lớn hơn AW, nên khối lượng tính cước sẽ lấy theo DW, nghĩa là 175kg</p>
                            <p>Trường hợp lô hàng có nhiều kiện có kích thước khác nhau, bạn tính dung tích từng kiện
                                rồi cộng tổng vào trước khi chia 6000 để tìm DW.</p>
                            <p>Trên đây, tôi đã trình bày những nội dung chính liên quan đến chủ đề cước vận chuyển hàng
                                không. Hy vọng đem lại cho bạn đọc những thông tin tham khảo hữu ích.</p>
                            <p>Nếu bạn tìm thấy thông tin hữu ích trong bài viết này thì nhấp Like & Share để bạn bè
                                cùng đọc nhé. Cám ơn bạn!</p>


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
@include('modules.footer')
</body>

</html>

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

    .ed_blog_info p {
        float: left !important;
        width: 100%;
        margin-top: 15px;
    }

</style>
<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>TIN TỨC</h2>
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
                <div class="row">
                    <div class="ed_blog_all_item ed_blog_all_item_second">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.air_cargo') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-1.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="">Thế
                                            nào là vận chuyển đường hàng không theo Cargo?</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 02, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 4 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Bạn muốn tìm hiểu vận chuyển hàng hóa bằng đường hàng
                                        không như thế nào? Bài viết này sẽ giúp bạn tìm hiểu một số thuật ngữ ...</p>
                                    <a href="{{ route('blog.air_cargo') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.air_transport') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-2.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.air_transport') }}">Các
                                            bên tham gia trong quá trình vận chuyển hàng hóa bằng đường hàng không</a>
                                    </h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 01, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 2 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Nếu xét theo góc độ của người gửi hàng, bạn sẽ thấy có
                                        nhiều bên tham gia vào vận chuyển hàng air...</p>
                                    <a href="{{ route('blog.air_transport') }}" class="btn ed_btn ed_orange">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.terms') }}"><img src="assets/images/blogs/blog-3.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.terms') }}">Những
                                            thuật ngữ phổ biến trong vận chuyển hàng hóa bằng đường hàng không</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 01, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Dưới đây là một số thuật ngữ phổ biến trong vận tải
                                        hàng không, trong đó có những chữ cái viết tắt...</p>
                                    <a href="{{ route('blog.terms') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.cosmetic') }}"><img src="assets/images/blogs/blog-4.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.cosmetic') }}">Ship
                                            hàng mỹ phẩm từ Nhật về Việt bằng cách nào</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 03, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Nhu cầu ship hàng mỹ phẩm từ Nhật về Việt nam đang rất
                                        phổ biến hiện nay. Nhưng làm sao để tìm được một dịch vụ nhanh chóng... </p>
                                    <a href="{{ route('blog.cosmetic') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.electronic') }}"><img
                                            src="assets/images/blogs/blog-5.jpg" alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.electronic') }}">Cách
                                            ship hàng điện tử từ Nhật về Việt nam tối ưu nhất</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 06, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Có rất nhiều cách ship hàng điện tử từ Mỹ về Việt Nam
                                        nhưng chọn cách nào là tối ưu...
                                        Hãy tham khảo nhưng thông tin sau để có quyết định đúng đắn nhất.</p>
                                    <a href="{{ route('blog.electronic') }}" class="btn ed_btn ed_orange">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.tracking') }}"><img src="assets/images/blogs/blog-6.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.tracking') }}">Số
                                            Tracking Number là gì, cách kiểm tra Tracking number hàng hóa</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 06, 07, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Nếu bạn là khách hàng thường xuyên mua hàng quốc tế thì
                                        có lẻ sẽ không khỏi bắt gặp cụm từ tracking number. Tuy nhiên, nhiều người vẫn
                                        chưa hiểu ... </p>
                                    <a href="{{ route('blog.tracking') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.cost-air') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-7.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.cost-air') }}">Cước
                                            vận chuyển hàng không – Cách tính thế nào ?</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 12, 02, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Cước vận chuyển hàng không là số tiền mà chủ hàng phải
                                        trả cho công ty dịch vụ để vận chuyển lô hàng từ sân bay khởi hành đến sân bay
                                        đích.... </p>
                                    <a href="{{ route('blog.cost-air') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.function-food') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-8.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.function-food') }}">10
                                            thực phẩm chức năng của Nhật được khách Việt yêu thích tại BicCamera</a>
                                    </h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 04, 06, 2019</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Ngoài tảo, du khách Việt Nam đi Nhật còn ưa chuộng mua
                                        viên uống bổ sung vitamin C, hỗ trợ vận động khớp dành cho trẻ em và người
                                        già... </p>
                                    <a href="{{ route('blog.function-food') }}" class="btn ed_btn ed_orange">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.price-cosmetic') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-9.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.price-cosmetic') }}">9
                                            loại mỹ phẩm Nhật giá mềm mà tốt nên mua làm quà cho người thân</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 12, 04, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Mỹ phẩm của Nhật Bản rất được du khách nước ngoài ưa
                                        chuộng. Các cửa hàng dược phẩm ở Nhật bán rất nhiều loại sẽ khiến du khách rất
                                        bỡ ngỡ khi mua mỹ phẩm... </p>
                                    <a href="{{ route('blog.price-cosmetic') }}" class="btn ed_btn ed_orange">Đọc
                                        thêm</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed_blog_item ed_bottompadder50">
                                <div class="ed_blog_image">
                                    <a href="{{ route('blog.supermarket') }}"><img
                                            src="<?php echo ''; ?>assets/images/blogs/blog-10.jpg"
                                            alt="blog image" /></a>
                                </div>
                                <div class="ed_blog_info">
                                    <h2><a href="{{ route('blog.supermarket') }}">TOP
                                            5 Siêu thị giá rẻ ở Nhật Bản bạn nên biết</a></h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> admin</a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 23, 05, 2020</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-comment-o"></i> 3 comments</a></li> -->
                                    </ul>
                                    <p class="ed_bottompadder10">Khi đến Nhật Bản du lịch, học tập hay làm việc thì việc
                                        tìm được những địa điểm bán hàng giá rẻ luôn là ưu tiên hàng đầu. Vậy đâu là
                                        chuỗi siêu thị có giá cả hợp lý nhất... </p>
                                    <a href="{{ route('blog.supermarket') }}" class="btn ed_btn ed_orange">Đọc thêm</a>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="col-lg-12">
      <div class="ed_blog_bottom_pagination">
       <nav>
        <ul class="pagination">
         <li><a href="#">1</a></li>
         <li><a href="#">2</a></li>
         <li><a href="#">3</a></li>
         <li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
        </ul>
       </nav>
      </div>
     </div>	 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Blog content end-->
<!--Newsletter Section six start-->

@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

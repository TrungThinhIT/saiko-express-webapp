<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
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

    .col-custom {
        height: 230px
    }

    .list-group-horizontal .list-group-item {
        display: inline-block;
    }

    .list-group-horizontal .list-group-item {
        margin-bottom: 0;
        margin-left: -4px;
        margin-right: 0;
        border-right-width: 0;
    }

    .list-group-horizontal .list-group-item:first-child {
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
    }

    .list-group-horizontal .list-group-item:last-child {
        border-top-right-radius: 4px;
        border-bottom-left-radius: 0;
        border-right-width: 1px;
    }

    .list-group-item.active,
    .list-group-item.active:hover,
    .list-group-item.active:focus {
        z-index: auto !important;
        color: #fff;
        background-color: #fca901 !important;
        border-color: #fca901 !important;
    }

</style>
<!--Header start-->
@include('modules.header')
<div class="ed_pagetitle">
    <div class=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2>GALLERY</h2>
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



<!--header end -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder60 layout-main">
    <div class="container">

        <br />
        <div class="container">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item active" onclick="change(1)" id="one">Kho Takadanobaba, Tokyo</li>
                <li class="list-group-item" id="three" onclick="change(3)">Kho Tochigi, Japan</li>
                <li class="list-group-item" id="two" onclick="change(2)">Vận chuyển hàng hóa ra sân bay</li>
                <li class="list-group-item" id="four" onclick="change(4)">Khai thác hàng hóa bay về</li>
                <!-- <li class="list-group-item" id="five"  onclick="change(5)">5</li> -->
            </ul>
        </div>

        <div class="row">
            <div class="ed_gallery_wrapper popup-gallery" id="category1">
            </div>
            <div class="ed_gallery_wrapper popup-gallery" id="category3" style="display:none">
            </div>
            <div class="ed_gallery_wrapper popup-gallery" id="category2" style="display:none">
            </div>

            <div class="ed_gallery_wrapper popup-gallery" id="category4" style="display:none">
            </div>
            <!-- <div class="ed_gallery_wrapper popup-gallery" id="category5" style="display:none">5
   </div> -->
        </div>



        <div class="row">
            <div class="ed_gallery_wrapper popup-gallery" id="category">
            </div>
        </div>


    </div>
</div><!-- /.container -->
</div>

@include('modules.footer')
@include('modules.nav-mobile')

<script>
    var HTML1 = "";
    for (var i = 1; i <= 8; i++) {
        // var dot = "jpg";
        // if(i>=18 && i<=34 || i==52){
        // 	dot="png";
        // }
        var classChange = '';
        // if(i>=5){
        // classChange = 'col-custom';
        // }
        var data = "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-3 " + classChange + "'>" +
            "<div class='ed_gallery_member'>" +
            "<div class='ed_gallery_member_img'>" +
            "<a href='<?php echo ""; ?>assets/images/gellery/1/" + i +
            ".jpg' title=''><img src='<?php echo ""; ?>assets/images/gellery/1/" +
            i + ".jpg' alt='item7' class='img-responsive'></a>" +
            "</div>" +
            "</div>" +
            "</div>";
        HTML1 += data;
    }


    document.getElementById("category1").innerHTML = HTML1;

    var HTML2 = "";
    for (var i = 1; i <= 13; i++) {
        var dot = "jpg";
        if (i == 1 || i == 10) {
            dot = "png";
        }
        var classChange = '';
        // if(i>=6){
        // classChange = 'col-custom';
        // }
        var data = "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-4 " + classChange + "'>" +
            "<div class='ed_gallery_member'>" +
            "<div class='ed_gallery_member_img'>" +
            "<a href='<?php echo ""; ?>assets/images/gellery/2/" + i + "." + dot +
            "' title=''><img src='<?php echo ""; ?>assets/images/gellery/2/" + i +
            "." + dot + "' alt='item7' class='img-responsive'></a>" +
            "</div>" +
            "</div>" +
            "</div>";
        HTML2 += data;
    }

    document.getElementById("category2").innerHTML = HTML2;


    var HTML3 = "";
    for (var i = 1; i <= 8; i++) {
        var dot = "jpg";
        if (i >= 4 && i <= 6 || i == 8) {
            dot = "png";
        }
        var classChange = '';

        var data = "<div class='col-lg-2 col-md-2 col-sm-3 col-xs-3 " + classChange + "'>" +
            "<div class='ed_gallery_member'>" +
            "<div class='ed_gallery_member_img'>" +
            "<a href='<?php echo ""; ?>assets/images/gellery/3/" + i + "." + dot +
            "' title=''><img src='<?php echo ""; ?>assets/images/gellery/3/" + i +
            "." + dot + "' alt='item7' class='img-responsive'></a>" +
            "</div>" +
            "</div>" +
            "</div>";
        HTML3 += data;
    }

    document.getElementById("category3").innerHTML = HTML3;


    var HTML4 = "";
    for (var i = 1; i <= 15; i++) {
        var dot = "jpg";
        if (i >= 1 && i <= 12) {
            dot = "png";
        }
        var classChange = '';

        var data = "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 " + classChange + "'>" +
            "<div class='ed_gallery_member'>" +
            "<div class='ed_gallery_member_img'>" +
            "<a href='<?php echo ""; ?>assets/images/gellery/4/" + i + "." + dot +
            "' title=''><img src='<?php echo ""; ?>assets/images/gellery/4/" + i +
            "." + dot + "' alt='item7' class='img-responsive'></a>" +
            "</div>" +
            "</div>" +
            "</div>";
        HTML4 += data;
    }

    document.getElementById("category4").innerHTML = HTML4;





    var active1 = document.getElementById("one");
    var active2 = document.getElementById("two");
    var active3 = document.getElementById("three");
    var active4 = document.getElementById("four");


    var one = document.getElementById("category1");
    var two = document.getElementById("category2");
    var three = document.getElementById("category3");
    var four = document.getElementById("category4");
    var five = document.getElementById("category5");
    var arr = [one, two, three, four, five];
    var activeArr = [active1, active2, active3, active4]




    function change(index) {
        switch (index) {
            case 1:
                show(0);
                break;
            case 2:
                show(1);
                break;
            case 3:
                show(2);
                break;
            case 4:
                show(3);
                break;
            case 5:
                show(4);
                break;
        }
        console.log(index);
    }

    function show(show) {
        for (var i = 0; i <= arr.length; i++) {

            if (show == i) {
                arr[i].style.display = "block";
                activeArr[i].classList.add("active");
            } else {
                arr[i].style.display = "none";
                activeArr[i].classList.remove("active");
            }
        }
    }

</script>
</body>

</html>

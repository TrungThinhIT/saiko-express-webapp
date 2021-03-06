<!DOCTYPE html>
<html lang="en">
<script src="https://www.google.com/recaptcha/api.js?render=6LexXeoUAAAAACjR-MM0V2-scILrUMVyliP1bArL"></script>
@include('modules.header')
<!--Main Slider-->

<!--header end -->
<style>
    .color-arrow {
        font-size: 18px;
        color: #fca901;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .background-contract {
        padding: 15px;
        background-color: #fad792;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #ef513a;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }


    .modal-confirm .icon-box i {
        font-size: 56px;
        position: relative;
        top: 4px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #ef513a;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #da2c12;
        outline: none;
    }

    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #fad792; // Choose your own color here
    }

    table.table-bordered>thead>tr>th {
        border: 1px solid #fca901;
    }

    table.table-bordered {
        border: 1px solid #fca901;
        /* margin-top:20px; */
    }

    table.table-bordered>thead>tr>th {
        border: 1px solid #fca901;
    }

    table.table-bordered>tbody>tr>td {
        border: 1px solid #fca901;
        padding: 10px;
        line-height: 1.7;
    }

    table.table-bordered>thead>tr>th {
        line-height: 18px;
    }

    table tr {
        border: 1px solid #fca901;
    }


    #nav_main {
        display: none;
    }

    #nav_main {
        background: #fff;
        position: fixed;
        width: 100%;
        bottom: 0;
        border-top: solid 1px #e6e6e6;
        z-index: 130;
    }

    .nav_main_lst {
        display: flex;
    }

    .nav_main_item {
        width: 33.33%;
        min-height: 56px;
        border-left: 1px solid white;
        border-right: 1px solid white;
        border-radius: 6%;
        list-style: none;
    }

    .loader {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        top: 50%;
        left: 50%;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #fca901;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
    }

    .tmn-custom-mask {
        z-index: 99;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, .5);
    }

    .d-none {
        display: none;
    }

    */ */

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* set background color */
    /* .nav_main_url {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  font-weight: 500;
  height: 100%;
} */
    .nav_main_url i {
        margin: 0 0 5px;
        font-size: 18px;
    }


    @media (max-width: 576px) {
        #nav_main {
            display: block;
        }

        .slider-content-wrapper {
            height: auto !important;
        }

        .image-height-mobile img {
            height: 400px;
        }
    }

    @media (min-width: 992px) {
        .col-custom {
            height: 440px;
        }

        .img-mobile-index {
            width: 100%;
        }

    }

    .Creative-Button {
        background: rgb(252, 169, 1) !important;
    }

    .img-responsive,
    .thumbnail>img,
    .thumbnail a>img,
    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        display: initial !important;
        max-width: 100%;
        height: auto;
    }

    /* .img-mobile-index {
        width: 500px;
    } */



    /* slider ?????????????? */
    .slider {
        position: relative;
        height: 100%;
        width: 100%;
        overflow: hidden;
        z-index: 0;
    }

    /*???????? ???? ????????????????*/
    .slider-content {
        position: relative;
        width: 100%;
    }

    /*?????????????????? ?????? ?????????????? (??????????????????????)*/
    .slider-content-wrapper {
        display: flex;
        height: 500px;
        transition: transform 0.5s ease-in-out;
    }

    /*??????????*/
    .slider-content__item {
        flex: 1 0 100%;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        font-size: 100px;
        color: rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* ???????? ?? ???????????????????? */
    .slider-controls {
        padding: 20px;
        text-align: center;
    }

    /* ???????? ?? ???????????????????? ???????????? ???????? */
    .slider-content__controls {
        /* position:absolute; */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        /*transform: translateY(-50%);*/
        /*padding:0 15px;*/
    }

    /* Arrows */
    .prev-arrow,
    .next-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: rgba(0, 0, 0, 0.3);
        width: 20px;
        transition: all 0.3s;
    }

    .prev-arrow {
        left: 20px;
    }

    .next-arrow {
        right: 20px;
    }

    .prev-arrow:hover,
    .next-arrow:hover {
        cursor: pointer;
        color: rgba(0, 0, 0, 0.7);
    }

    /* Dots */
    .dots {
        position: absolute;
        display: flex;
        left: 50%;
        transform: translateX(-50%);
        bottom: 10%;
    }

    .dot {
        cursor: pointer;
        width: 8px;
        height: 8px;
        margin-right: 4px;
        background-color: rgba(0, 0, 0, 0.3);
        /*box-shadow: 0 0 5px 0px rgba(0,0,0,0.9);*/
        border-radius: 50%;
        transition: all 0.3s;
    }

    .dot:last-child {
        margin-right: 0;
    }

    .dot:hover {
        background-color: #fff;
    }

    .dot--active {
        background-color: rgba(255, 255, 255, 0.5);
    }

    /* Buttons */
    button {
        cursor: pointer;
        margin-right: 8px;
        border: none;
        border-radius: 4px;
        padding: 10px;
        background-color: #3066BE;
        color: #FFF;
        transition: all 0.5s;
    }

    button:last-child {
        margin-right: 0;
    }

    button:hover {
        background-color: #60AFFF;
    }

    button:focus {
        outline: none;
    }

    /* Mods */
    .disabled {
        background-color: #DCCFCF;
        color: #B0A8A8;
        cursor: default;
        pointer-events: none;
    }

    .d-none {
        display: none;
    }

    .active {
        opacity: 1;
    }

    .centered {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .content-slide {
        z-index: 1;
        position: absolute;
        color: #482401;
        text-align: center;
    }

    .fix-style-content {
        padding: 6px;
        font-size: 22px !important;
    }

    .text-color {
        text-decoration: underline;
        font-weight: bold;
    }

    .fix-time {
        opacity: 85%;
        border-radius: 20px;
    }

    .text-color:hover {
        color: darkgreen !important;
    }

    .btn-3d {
        top: 0;
        left: 0;
        transition: all .15s linear 0s;
        position: relative;
        display: inline-block;
        padding: 15px 25px;
        background-color: #fca901;
        font-size: 20px;
        font-weight: bold;

        text-transform: uppercase;
        color: white;
        letter-spacing: 1px;

        box-shadow: -6px 6px 0 #404040;
        text-decoration: none;
    }

    .btn-3d:hover {
        top: 3px;
        left: -3px;
        box-shadow: -3px 3px 0 #404040;
    }

    .btn-3d:hover::after {
        top: 1px;
        left: -2px;
        width: 4px;
        height: 4px;
    }

    .btn-3d:hover::before {
        bottom: -2px;
        right: 1px;
        width: 4px;
        height: 4px;
    }

    .btn-3d::after {
        transition: all .15s linear 0s;
        content: '';
        position: absolute;
        top: 2px;
        left: -4px;
        width: 8px;
        height: 8px;
        background-color: #404040;
        transform: rotate(45deg);
        z-index: -1;

    }

    .btn-3d::before {
        transition: all .15s linear 0s;
        content: '';
        position: absolute;
        bottom: -4px;
        right: 2px;
        width: 8px;
        height: 8px;
        background-color: #404040;
        transform: rotate(45deg);
        z-index: -1;
    }

    a.btn {
        position: relative;
    }

    a:active.btn-3d {
        top: 6px;
        left: -6px;
        box-shadow: none;
    }

    a:active.btn-3d:before {
        bottom: 1px;
        right: 1px;
    }

    a:active.btn-3d:after {
        top: 1px;
        left: 1px;
    }
    @media screen and (max-width: 768px)
     {
        .content-slide.fix-time.button {
            top: 15%;
        }

        .content-slide.fix-time.hotline {
            top: 57%;
        }
    }

    @media screen and (min-width: 768px)
     {
        .content-slide.fix-time.button {
            top: 25%;
        }
        .content-slide.fix-time.hotline {
            top: 57%;
        }
    }
</style>


<div id="slider" class="slider">
    <div class="slider-content">
        <div class="slider-content-wrapper">
            <div class="slider-content__item image-1 image-height-mobile">
                <img src="../assets/images/update_index.png">
                <div class="content-slide fix-time button">
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"><a href="{{route('rq_tk.quote')}}" class="btn-3d">????ng k?? ki???n h??ng ngay</a>
                </div>
                <div class="content-slide fix-time hotline" style="background-color: white;">
                    <p class="title-slide fix-style-content" style="text-shadow: 2px 1px white;">M???i th??ng tin li??n h??? s??? hotline 1900 2149</p>
                    <p class="title-slide fix-style-content" style="text-shadow: 2px 1px white;">ho???c nh???n tin fanpage Facebook <span><a class="text-color" style="color: #482401 !important;text-decoration: none;" target="_blank" href="https://www.facebook.com/SaikoExpress/"> Saiko Express</a> </span></p>
                </div>

            </div>
            <div class="slider-content__item image-1 image-height-mobile">
                <img src="../assets/images/air_index.jpg">

                <div class="content-slide">
                    <p class="title-slide">V???N CHUY???N ???????NG BAY</p>
                    <p class="text-slide"> V???n chuy???n h??ng ho?? t??? Nh???t v??? Vi???t
                        Nam <br />b???ng m??y bay nh???n h??ng ch??? t??? 5 - 7 ng??y</p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">G???I H??NG NGAY</button>
                </div>

            </div>
            <div class="slider-content__item image-2 image-height-mobile">
                <img src="../assets/images/sea_index.png">

                <div class="content-slide">
                    <p class="title-slide">V???N CHUY???N ???????NG BI???N</p>
                    <p class="text-slide">
                        V???n chuy???n h??ng ho?? t??? Nh???t v??? Vi???t Nam<br />b???ng t??u nh???n h??ng t??? 24-36 ng??y</p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">G???I H??NG NGAY</button>
                </div>
            </div>
            <div class="slider-content__item image-3 image-height-mobile">
                <img src="../assets/images/solution.png">

                <div class="content-slide">
                    <p class="title-slide">CUNG C???P GI???I PH??P HI???U QU???</p>
                    <p class="text-slide">
                        H??? th???ng tracking th??ng minh hi???n ?????i h??? tr??? kh??ch h??ng <br />ki???m so??t chi ph?? v???n chuy???n nh???n
                        h??ng t???i nh??
                    </p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">G???I H??NG NGAY</button>
                </div>

            </div>
        </div>


    </div>
</div>

<div class="ed_slider_form_section" style="display:none">
    <!--Slider start-->
    <section class="ed_mainslider">
        <article class="content">
            <div class="rev_slider_wrapper">
                <div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom" data-source="gallery" style="padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                    <div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
                        <ul>
                            <!-- SLIDE  -->
                            <li data-index="rs-2978" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="0" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2978-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":0,"ease":"Power2.easeInOut"},{"delay":"none","speed":0,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2978-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":0,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;text-transform:left;background-color: rgba(255, 255, 255, 0.46);border-color:rgba(0, 0, 0, 0);border-width:0px;background: rgb(252, 169, 1);">
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2978-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":0,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"0","speed":0,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap;text-transform:left;  font-family: 'Trirong', serif;font-size: 30px !important;">
                                    <!-- <p>V???N CHUY???N ???????NG BAY</p><br/> -->

                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2978-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']" data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":0,"ease":"Power3.easeOut"},{"delay":"wait","speed":0,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14; white-space: nowrap;text-transform:left; font-family: 'Roboto', sans-serif;font-size: 10px !important;">
                                    <p class="title-slide">V???N CHUY???N ???????NG BAY</p>
                                    <p class="text-slide"> V???n chuy???n h??ng ho?? t??? Nh???t v??? Vi???t Nam <br />b???ng m??y bay
                                        nh???n h??ng ch??? t??? 5 - 7 ng??y</p>
                                </div>

                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2978-layer-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['137','137','119','100']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;text-transform:left;background-color: rgba(255, 255, 255, 0.46);border-color:rgba(0, 0, 0, 0);border-width:0px;background: rgb(252, 169, 1);">
                                </div>

                                <!-- LAYER NR. 6 -->
                                <div class="sendEvent tp-caption Creative-Button rev-btn  rs-parallaxlevel-15 " id="slide-2978-layer-6" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]" data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]" data-paddingleft="[50,50,50,50]" style="z-index: 10; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important;">G???I
                                        H??NG
                                        NGAY</a>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-2979" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000" data-thumb="http://placehold.it/1920X1080" data-rotate="0" data-saveperformance="off" data-title="" data-param1="02" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 7 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2979-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 8 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2979-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 9 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2979-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; white-space: nowrap;text-transform:left; font-family: 'Trirong', serif;">
                                    <!-- sea -->
                                </div>


                                <!-- LAYER NR. 10 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2979-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']" data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14; white-space: nowrap;text-transform:left; font-family:'Roboto', sans-serif;font-size: 10px !important;">
                                    <p class="title-slide">V???N CHUY???N ???????NG BI???N</p>
                                    <p class="text-slide">
                                        V???n chuy???n h??ng ho?? t??? Nh???t v??? Vi???t Nam<br />b???ng t??u nh???n h??ng t??? 24-36 ng??y
                                    </p>
                                </div>

                                <!-- LAYER NR. 11 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2979-layer-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['137','137','119','100']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 12 -->
                                <div class="tp-caption Creative-Button rev-btn  rs-parallaxlevel-15" id="slide-2979-layer-6" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]" data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]" data-paddingleft="[50,50,50,50]" style="z-index: 16; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important">G???I
                                        H??NG
                                        NGAY</a>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-2980" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000" data-thumb="http://placehold.it/1920X1080" data-rotate="0" data-saveperformance="off" data-title="" data-param1="03" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                                <!-- LAYER NR. 13 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2980-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 14 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2980-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 15 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2980-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19; white-space: nowrap;text-transform:left; font-family: 'Trirong', serif;">
                                    <!-- CUNG C???P GI???I PH??P CHI PH?? HI???U QU??? -->
                                </div>

                                <!-- LAYER NR. 16 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2980-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']" data-fontsize="['40','40','30','30']" data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 20; white-space: nowrap;text-transform:left; font-family: 'Roboto', sans-serif;font-size: 10px !important">
                                    <p class="title-slide">CUNG C???P GI???I PH??P HI???U QU???</p>
                                    <p class="text-slide text-slide-font">
                                        H??? th???ng tracking th??ng minh hi???n ?????i h??? tr??? kh??ch h??ng <br />ki???m so??t chi ph??
                                        v???n chuy???n nh???n h??ng t???i nh??
                                    </p>
                                </div>

                                <!-- LAYER NR. 17 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2980-layer-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['137','137','119','100']" data-width="1" data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 21;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 18 -->
                                <div class="tp-caption Creative-Button rev-btn  rs-parallaxlevel-15" id="slide-2980-layer-6" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]" data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]" data-paddingleft="[50,50,50,50]" style="z-index: 22; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important">G???I
                                        H??NG
                                        NGAY</a>
                                </div>
                            </li>
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                    </div>
                </div><!-- END REVOLUTION SLIDER -->
            </div><!-- END REVOLUTION SLIDER WRAPPER -->
        </article>
    </section>
</div>
<!--Slider end-->
<!--Slider form start-->
<div class="ed_form_box ed_toppadder90 ed_bottompadder60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>KI???N H??NG</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="ed_search_image">
                    <img src="../assets/images/aba2.jpg" alt="" title="map" height="500px">
                </div>


            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-custom-tracking">
                <div class="row">
                    <div class="col-md-11 col-sm-11" style="float:right">
                        <p class="text-tracking"><i class="fa fa-arrow-circle-right color-arrow"></i> Ki???n
                            h??ng c???a t??i c??n n???ng bao nhi??u?</p>
                        <p class="text-tracking" style="margin-left: 30px">
                            <i class="fa fa-arrow-circle-right color-arrow"></i> T??nh tr???ng h??ng h??a ??ang ???
                            ????u?
                        </p>
                        <p class="text-tracking"><i class="fa fa-arrow-circle-right color-arrow"></i> L??m
                            th??? n??o ????? t??? m??nh ki???m tra?</p>
                    </div>
                </div>

                {{-- <div class="row" style="text-align: center;margin-top: 30px;">
                    <a style=" border: 1px solid #fca901; padding: 10px;"><span style="margin: 10px;">NH???P
                            NGAY</span></a>
                </div> --}}
                <div class="row" style="text-align: center;margin-top: 30px;">
                    <a><i class="transition fa fa-arrow-circle-down  fa-2x" style="color: #fca901 "></i></a>
                </div>
                <div class="row" style="margin-top:30px">
                    <div class="ed_search_form">
                        <form class="form-inline" id="tracking_form_index" method='post'>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>Vui l??ng nh???p tracking</p>

                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Nh???p tracking..." onclick="clearAll()" class="form-control" id="utrack">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn ed_btn pull-right ed_orange">T??m ki???m</button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="alert alert-danger" id="statusData" style="display: none;margin-top:20px;">
                    </div>
                </div>

            </div>

        </div>

        <div class="row" style="margin: 6px;">
            <div class="col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="display:none;text-align: center;" id="table-index">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Box_ID</th>
                                <th style="text-align: center;">C??n N???ng(kg)</th>
                                <th style="text-align: center;">Th??? T??ch(kg)</th>
                                <th style="text-align:center">S??? l?????ng</th>
                                <th style="text-align: center;">Ng?????i G???i</th>
                                <th style="text-align: center;">Ng?????i Nh???n</th>
                                <th style="text-align: center;">S??T</th>
                                <th style="text-align: center;">?????a ch???</th>
                                <th style="text-align: center;">Ghi ch??</th>
                                <th style="text-align: center;">???????ng V???n Chuy???n</th>
                            </tr>
                        </thead>
                        <tbody id="body-table-index">

                        </tbody>
                    </table>
                </div>

                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered check-contract" id="table_price_shipping" style="display:none">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">M?? Tracking</th>
                                        <th style='width:100px;text-align:center'>T???ng kh???i l?????ng t??nh ph??</th>
                                        <th>????n gi??</th>
                                        <th>???????ng v???n chuy???n</th>
                                        <th>Ph?? v???n chuy???n (Nh???t - Kho Vi???t)</th>
                                        <th>Ph?? v???n chuy???n ???? thanh to??n</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_price_shipping">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row d-none check-contract" id="declaration_price" style="margin:4px">
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <div class="col-md-6 " style="padding-left: unset">
                            <p class=""><label for="">Gi?? tr??? g??i b???o hi???m</label>: <span id="insurance_result"></span> </p>
                        </div>
                        <div class="col-md-6">
                            <p class=""><label for="">Ph?? b???o hi???m (3%)</label>: <span id="insurance_result_fee"></span> </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <div class="col-md-6" style="padding-left: unset">
                            <p class=""><label for="" id="special">Gi?? tr??? h??ng ho?? ?????c bi???t</label>: <span id="special_result"></span> </p>
                        </div>
                        <div class="col-md-6">
                            <p class=""><label for="" id="special">Ph?? h??ng ho?? ?????c bi???t (2%)</label>: <span id="special_result_fee"></span> </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <div class="col-md-6" style="padding-left: unset">
                            <p class=""><label for="" id="shipping_inside_jp">Ph?? v???n chuy???n n???i ?????a Nh???t(Y??n)</label>: <span id="fee_shipping_inside_jp"></span> </p>
                        </div>
                        <div class="col-md-6">
                            <p class=""><label for="" id="shipping_inside_vn">Ph?? v???n chuy???n n???i ?????a Nh???t(VN??)</label>: <span id="fee_shipping_inside_vn"></span> </p>
                        </div>

                    </div>
                </div>
                <div class="row d-none check-contract" id="alert" style="margin:4px">
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <h2 class="text-center text-danger font-weight-bold"> <b> PHI???U Y??U C???U THANH TO??N </b></h2>
                        <p class="text-danger">Xin qu?? kh??ch vui l??ng thanh to??n ?????n STK : <b>19035902493017</b>. T??n ng?????i nh???n : Nguy???n V??n Huy - Ng??n h??ng Techcombank <img src="images/TCB_icon.png" alt="" width="100px"></p>
                        <p class="text-danger font-weight-bold" style="font-weight: bold"> N???i dung thanh to??n : <span class="text-danger" style="font-size: 25px" id="id_order"></span>
                        <p>
                        <p class="text-danger text-uppercase font-weight-bold" style="font-weight: bold">S??? ti???n thanh to??n: <span id="money" style="font-size: 25px"></span> <span style="font-weight: normal !important;">( ???? bao g???m ph?? b???o hi???m, h??ng ho?? ?????c bi???t)</span></p>
                    </div>
                </div>
                <div class="row d-none check-contract" id="paid" style="margin:4px">
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <h2 class="text-center text-danger font-weight-bold"> <b> ???? Thanh To??n </b></h2>
                        <h2 class="text-center text-danger">C???m ??n Qu?? Kh??ch</h2>
                    </div>
                </div>
                <div class="row d-none" id="alert-contract">
                    <div class="col-md-6">
                        <div class="background-contract row p-2">
                            <span class="text-danger text-xl-left">Chi ph?? c???a tracking ???????c t??nh trong l?? h??ng:
                                <span class="text-danger font-weight-bold" id="id_contract"></span></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="background-contract row p-2">
                            <span class="text-danger font-weight-bold" id="status_contract"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-custome">
                        <div class="lftredbrdr">
                            <ul class="timeline" id="time_line_index">

                            </ul>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="table-responsive" id="table_item">
                            <table class="table table-striped table-bordered" id="table_item" style="display:none">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th style='width:100px'>S??? L?????ng</th>
                                        <th>T??n S???n Ph???m</th>
                                    </tr>
                                </thead>
                                <tbody id="load_item">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="underline table-responsive check-contract" style="display:none" id="table-index-vnpost">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">M?? D???ch V???</th>
                                <th style="text-align: center;">Ph????ng th???c v???n chuy???n</th>
                                <th style="text-align: center;">C?????c COD</th>
                                <th style="text-align: center;">T???ng C?????c Sau VAT</th>
                                <th style="text-align: center;">T???ng ti???n</th>
                            </tr>
                        </thead>
                        <tbody id="body-table-index-vnpost">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tmn-custom-mask d-none" id="loader">
            <div class="loader"></div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999">
            <div class="modal-dialog modal-sm  modal-confirm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box" id="color-success"><i class="fa fa-times"></i></div>

                    </div>
                    <h5 class="modal-confirm" id="message"></h5>
                    <div class="modal-footer">
                        <button class="btn btn-err btn-danger btn-block" data-dismiss="modal" id="exitForm">Tho??t</button>
                        <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()" id="exitSuccess" style="display:none">Tho??t</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Slider form end-->
</div>

<div class="ed_graysection ed_toppadder90 ed_bottompadder60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>QUY TR??NH G???I H??NG</h3>
                </div>
            </div>
            <div class="ed_mostrecomeded_course_slider" style="text-align:center">
                <div>
                    <img class="img-mobile-index" src="../assets/images/send_goods.png" alt="item1" class="img-responsive">
                </div>
                {{-- <div style="margin-top:10px">
                    <a href="{{ route('service.procedure') }}" class="btn ed_btn ed_orange">Xem th??m</a>
            </div> --}}

        </div>


    </div>
</div>
</div>
<!-- chart Section end -->
<!-- Services start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>T???I SAO N??N L???A CH???N D???CH V??? C???A SAIKO EXPRESS ?</h3>
                </div>
            </div>
            <div class="ed_mostrecomeded_course_slider">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/checked.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">KI???M H??NG C???N TH???N</a></h4>
                            <p>M???i ki???n h??ng ?????n Saiko Express s??? ???????c ki???m tra ?????y ????? v?? ????ng l???i nguy??n ki???n. ?????m b???o
                                ch??nh x??c v??? s??? l?????ng, c??n n???ng v?? k??ch th?????c th??ng h??ng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/packaged.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">????NG G??I CHUY??N NGHI???P</a></h4>
                            <p>H??? tr??? kh??ch h??ng ????ng g??i l???i h??ng h??a ch??a ????? ti??u chu???n v???n chuy???n. Chi ph?? ????ng g??i
                                c??? th??? Saiko s??? th??ng b??o t??y theo t??nh tr???ng h??ng h??a ???????c g???i ?????n kho.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/insurance.jpg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">B???O HI???M H??NG H??A</a></h4>
                            <p>Saiko s???n s??ng cung c???p d???ch v??? b???o hi???m h??ng h??a trong tr?????ng h???p m???t m??t, th???t l???c ?????
                                gi???m thi???u t???i ??a r???i ro trong qu?? tr??nh v???n chuy???n.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/payment.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">H??NH TH???C THANH TO??N</a></h4>
                            <p>??a d???ng h??nh th???c thanh to??n t???i Nh???t ho???c b??n Vi???t Nam, gi??p kh??ch h??ng c?? nhi???u s??? l???a
                                ch???n h??n, thu???n ti???n h??n, ph???c v??? l???i ??ch t???i ??a c???a kh??ch h??ng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/warehouse.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">KHO B??I HI???N ?????I</a></h4>
                            <p>?????u t?? kho b??i chuy??n nghi???p. M???i ki???n h??ng ?????u ???????c l??u tr??? v?? s???p x???p m???t c??ch khoa h???c
                                v?? logic. D??? d??ng ki???m tra v?? ?????i chi???u h??ng h??a.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/shipping.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">GIAO H??NG T???N N??I</a></h4>
                            <p>V???i m???ng l?????i li??n k???t c??ng c??c d???ch v??? v???n chuy???n n???i ?????a Vi???t Nam, ch??ng t??i c?? th???
                                chuy???n h??ng ?????n ?????a ch??? ng?????i nh???n ??? t???t c??? 64 t???nh th??nh.</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ed_toppadder30">
     <a href="services.html" class="btn ed_btn ed_orange">Xem th??m</a>
    </div> -->
            </div>
        </div>
    </div><!-- /.container -->
</div>

<!--Timer Section three end -->
<!--Our expertise section one start -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="ed_video_section_discription">
                    <h4 style="text-align: center;"><a class="title-us" href="javascript:;">V??? CH??NG T??I</a></h4>
                    <p style="margin-top: 30px;">
                        Xu???t ph??t t??? xu h?????ng ng??y c??ng ph??t tri???n vi???c v???n chuy???n h??ng h??a giao th????ng gi???a Nh???t b???n v??
                        Vi???t Nam, c??ng v???i s??? gia t??ng nhu c???u c???a r???t ????ng ng?????i Vi???t xa x??? t???i Nh???t B???n nh?? g???i qu??
                        t???ng v??? t???n nh?? cho gia ????nh, ng?????i th??n t???i Vi???t Nam hay nhu c???u v???n chuy???n h??ng h??a c???a c??c
                        ch??? shop kinh doanh h??ng Nh???t, .... ch??ng t??i ???? th??nh l???p n??n Saiko Express. V???i s??? ?????u t??
                        nghi??m t??c v??? c??ng ngh???, quy tr??nh v???n chuy???n, c??ng ?????i ng?? nh??n vi??n th??n thi???n, chuy??n nghi???p,
                        Saiko Express h?????ng ?????n tr??? th??nh d???ch v??? v???n chuy???n Nh???t Vi???t t???t nh???t v???i 3 ti??u ch??: ????n gi???n
                        - T???n t??m - Uy t??n.</p>
                    <span><a href="{{ route('about.details') }}" class="btn ed_btn ed_orange">Xem th??m</a></span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="ed_video_section">
                    <div class="embed-responsive embed-responsive-16by9">

                        <video controls="controls" preload="none">
                            <source src="../assets/Saikoexpress_small.mp4" type="video/mp4">

                            Your browser does not support the video tag.
                        </video>


                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>

<!--skill section end -->
<!-- pricing table section start -->
<div class="ed_pricing_section ed_toppadder90 ed_bottompadder60">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>B???ng gi?? ???????ng bay</h3>
                </div>
            </div>
            <div class="ed_pricing_table_wrapper">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG Eco</h2>
                            <div class="ed_table_price">
                                <p><sup></sup>205.000??<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nh???n h??ng t??? 1 - 100kg/ chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>H??? tr??? 24/7</li>
                            <li>Giao h??ng qua VNPOST</li>
                            <li>thanh to??n tr?????c</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG premium</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar"><sup></sup>185.000??<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nh???n h??ng t??? 100 - 500kg/ chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>H??? tr??? 24/7</li>
                            <li>Mi???n ph?? giao h??ng n???i th??nh H?? N???i</li>
                            <li>Thanh to??n tr?????c</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG Business</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar"><sup></sup><b style="font-size:30px">Th????ng L?????ng</b></p>
                            </div>
                        </div>
                        <ul>
                            <li>nh???n h??ng t??? 500kg/ chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>C?? chuy??n vi??n CSKH ri??ng</li>
                            <li>mi???n ph?? giao h??ng n???i th??nh H?? N???i</li>
                            <li>thanh to??n th????ng l?????ng</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="ed_pricing_section ed_toppadder90 ed_bottompadder60">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>B???ng gi?? ???????ng bi???n</h3>
                </div>
            </div>
            <div class="ed_pricing_table_wrapper">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG Eco</h2>
                            <div class="ed_table_price">
                                <p style="font-size: 30px;"><sup></sup>65.000??<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nh???n h??ng d?????i 150kg/ chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>H??? tr??? 24/7</li>
                            <li>thanh to??n tr?????c</li>
                        </ul>

                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG premium</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar" style="font-size: 30px;"><sup></sup>60.000??<sub> /kg</sub>
                                </p>
                            </div>
                        </div>
                        <ul>
                            <li>Nh???n h??ng t??? 150 - 350kg/ chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>H??? tr??? 24/7</li>
                            <li>Thanh to??n tr?????c</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>H???NG Business</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar" style="font-size: 30px;"><sup></sup>Th????ng l?????ng</p>
                            </div>
                        </div>
                        <ul>
                            <li>nh???n h??ng t??? 350kg/chuy???n</li>
                            <li>B???o hi???m 3% gi?? tr??? h??ng</li>
                            <li>C?? chuy??n vi??n CSKH ri??ng</li>
                            <li>Thanh to??n th????ng l?????ng</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">g???i h??ng ngay</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- pricing table section start -->
<!-- Testimonial start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ed_bottompadder80">
                <div class="ed_heading_top">
                    <h3>PH???N H???I C???A KH??CH H??NG</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_latest_news_slider">
                    <div id="owl-demo2" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="../assets/images/bg/sinh.jpg" alt="1" title="1" />
                                <h4>Jean Nguy???n</h4>
                                <span>Sinh vi??n</span>
                                <p>R???t ???n t?????ng v???i c??ch ????ng h??ng c???a Saiko, k??? v?? ?????p m???t. Gi?? c??? c??ng r???t h???p l?? so
                                    v???i c??c d???ch v??? kh??c m??nh ???? s??? d???ng. S??? gi???i thi???u Saiko Express v???i b???n b?? c???a
                                    m??nh.</p>
                            </div>
                        </div>
                        <!-- <div class="item">
       <div class="ed_item_description">
        <img src="assets/images/bg/nhan-vien-van-phong.jpg" alt="1" title="1"/>
        <h4>Ronnie Parker</h4>
        <span>manager</span>
        <p>Just in case there is anyone looking for it, new expertise to our knowledge base to make you happy as well.</p>
       </div>
      </div> -->
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="../assets/images/bg/boss.jpg" alt="1" title="1" />
                                <h4>Anh Long</h4>
                                <span>Ch??? Shop h??ng Nh???t t???i H?? N???i</span>
                                <p>Qua t???t c??? c??c d???ch v??? m??nh s??? d???ng, Saiko Express v???n l?? ????n v??? m??nh h??i l??ng nh???t
                                    v??? th???i gian v???n chuy???n, t?? v???n nhi???t t??nh v?? ?????c bi???t, gi?? c??? c???c k??? c???nh tranh.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="assets/images/bg/boss1.jpg" alt="1" title="1" />
                                <h4>Mr.Sakaki</h4>
                                <span>Ch??? nh?? h??ng Nh???t</span>
                                <p>L?? ch??? nh?? h??ng nh???t, t??i lu??n c???n m???t c??ng ty v???n chuy???n nh???ng nguy??n li???u thi???t y???u
                                    cho nh?? h??ng c???a m??nh. Saiko ???? th???c s??? l?? ???? gi???i quy???t n???i lo l???n nh???t c???a t??i.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="assets/images/bg/boss2.jpg" alt="1" title="1" />
                                <h4>Ch??? Th???o</h4>
                                <span>Nh??n vi??n Marketing</span>
                                <p>Nhanh g???n v?? ????n gi???n, tr??? h??ng ????ng h???n, ????ng g??i c???n th???n. C??c b???n nh??n vi??n Saiko
                                    r???t c?? t??m, c??n ch??? m??nh c??? ch??? mua h??ng r??? nh???t n???a.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--Testimonial end -->
<!--client section start -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>DANH S??CH ????N V??? LI??N K???T</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_clientslider">
                    <div id="owl-demo5" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img src="assets/images/partener/3.png" alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/images/partener/5.jpg" alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/images/partener/6.png" alt="Partner Img" />
                            </a>
                        </div>

                        <div class="item">
                            <a href="#">
                                <img src="assets/images/partener/1.jpg" alt="Partner Img" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/images/partener/2.png" alt="Partner Img" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--client section end -->
<!--Newsletter Section six start-->
<div class="ed_newsletter_section ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_newsletter_section_heading">
                            <h4>G???I MAIL NGAY ????? ???????C T?? V???N</h4>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
                        <div class="row">
                            <div class="ed_newsletter_section_form">

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <input class="form-control" type="text" placeholder="Nh???p email" id="email" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button class="btn ed_btn ed_green" onclick="sendMail()">G???i</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sendMail() {
        var email = document.getElementById("email").value;
        $.ajax({
            type: "POST",
            url: "php/sendMail.php",
            data: {
                email: email,
            },
            success: function(status) {
                console.log("sta:  ", status);
                var host = window.location.hostname;
                window.location.href = "/sign-up-email.php";
            }
        });
    }



    // }
</script>
<!--Newsletter Section six end-->
<!--Scroll to top-->

@include('modules.footer')
@include('modules.nav-mobile')

<script>
    function isValidJSONString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
    $(document).ready(function() {
        setTimeout(function() {
            $(".fix-time").removeClass('d-none');
        }, 1000)
        $(document).ajaxStart(function() {
            $("#loader").show();
        });
        $(document).ajaxStop(function() {
            $("#loader").hide();
        });
    })
    $('#tracking_form_index').submit(function() {
        event.preventDefault();
        let idToken = getToken();
        $("#alert").hide()
        $("#paid").hide()
        $("#declaration_price").hide()
        $("#table_price_shipping").hide()
        $("#table_body_price_shipping").empty()
        $("#body-table-index").empty()
        $("#time_line_index").empty()
        $("#table-index").hide()
        $("#body-table-index-vnpost").empty()
        $("#table-index-vnpost").hide()
        $("#statusData").empty()
        $("#statusData").hide()
        $("load_item").empty()
        $("#fee_shipping_inside_jp").text(0)
        $("#fee_shipping_inside_vn").text(0)
        $("#alert-contract").hide()
        var tracking = $("#utrack").val();
        if (tracking.length <= 5) {
            alert('Tracking ch??a ????ng')
            return
        }
        toggleLoading()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('rq_tk.getStatus') }}",
            data: {
                idToken: idToken,
                tracking: tracking
            },
            success: function(res) {
                $("#body-table-index-vnpost").empty()
                $("#table-index-vnpost").hide()
                $("#alert").hide()
                if (res?.code == 404 || res?.code == 401) {
                    refreshToken(res?.code);
                    $("#table-index").hide();
                    $("#body-table-index").empty()
                    $("#time_line_index").empty()
                    $("#statusData").empty();
                    $(".table").hide();
                    $("#statusData").css('display', 'block');
                    $("#statusData").append('<h4>' +
                        res?.message + '</h4>')
                } else {
                    if (res.data[0].boxes.length == 0 & res.data[0].reference.length == 0) {
                        $(".table").hide();
                        // $("#table-index").show();
                        $("#body-table-index").empty()
                        $("#time_line_index").empty()
                        $("#statusData").empty();
                        $("#statusData").css('display', 'block');
                        $("#statusData").append('<h4>' +
                            'Tracking ch??a ????ng k?? ????n h??ng' + '</h4>')
                    } else {
                        $("#statusData").css('display', 'none');
                        $(".table").show();
                        $("#table_price_shipping").hide()
                        $("#table_item").hide()
                        $("#table-index").show();
                        $("#alert").hide()
                        if (res.data.length == 0) {
                            $("#statusData").empty()
                            $("#statusData").append(
                                '<h4>' + 'Kh??ng t??m th???y tracking' + '</h4>'
                            )
                        } else {
                            $("#statusData").empty()
                            $.each(res.data, function(index, value) {
                                var name_send = '';
                                var tel_rev = '';
                                var name_rev = '';
                                var add_rev = '';
                                var created_at = '';
                                var method_ship = '';
                                var pay_money = 0;
                                var insurance_result;
                                var special_result;
                                var service_fee = value.reference.service_fee;
                                var service_fee_paid = value.reference.service_fee_paid;
                                var service_fee_outstanding = value.reference.service_fee_outstanding;
                                if (value.reference.length != 0) {
                                    if (!value.reference.shipment_info.sender_name) {
                                        if (isValidJSONString(value.reference.note)) {
                                            var parse_note = JSON.parse(value.reference.note);
                                            if (parse_note) {
                                                if (typeof parse_note == "object") {
                                                    if (parse_note.send_name == undefined) {
                                                        name_send = ""
                                                    } else {
                                                        name_send = parse_note.send_name;
                                                    }
                                                }
                                            }
                                        } else {
                                            name_send = ""
                                        }
                                    } else {
                                        name_send = value.reference.shipment_info.sender_name;
                                    }
                                    tel_rev = value.reference.shipment_info.tel;
                                    name_rev = value.reference.shipment_info.consignee;
                                    add_rev = value.reference.shipment_info.full_address;
                                    add_note = value.reference.shipment_info.note;
                                    created_at = value.reference.created_at;
                                    method_ship = value.reference.shipment_method_id;
                                    if (value.reference.pay_money != undefined) {
                                        pay_money = value.reference.total_fee;
                                    }
                                    insurance_result = value.reference.insurance_declaration
                                    special_result = value.reference.special_declaration
                                    $("#declaration_price").show()
                                    $("#insurance_result").text(formatNumber(insurance_result))
                                    $("#special_result").text(formatNumber(special_result))
                                    $("#insurance_result_fee").text(formatNumber(value.reference.insurance_result_fee))
                                    $("#special_result_fee").text(formatNumber(value.reference.special_result_fee))
                                    if (value.sfa != null) {
                                        $("#fee_shipping_inside_jp").text(formatNumber(value.sfa.shipping_inside))
                                        $("#fee_shipping_inside_vn").text(formatNumber(value.sfa.shipping_inside_vnd))
                                    }

                                    if (value.boxes.length) {
                                        $("#table_price_shipping").show()
                                        $("#table_body_price_shipping").empty()
                                        $("#table_body_price_shipping").append(
                                            '<tr>' +
                                            '<td>' + value.id + '</td>' +
                                            '<td>' + value.reference.total_weight + '</td>' +
                                            '<td>' + value.reference.fee_ship + '</td>' +
                                            '<td>' + method_ship + '</td>' +
                                            '<td>' + formatNumber(value.reference.total_fee) + ' VN??</td>' +
                                            '<td>' + formatNumber(Math.round(service_fee_paid)) + ' VND</td>' +
                                            '</tr>'
                                        )
                                    }
                                }

                                if (tel_rev == '' | name_rev == '' | add_rev == '') {
                                    $('#message').html(
                                        'Kh??ch ch??a ????ng k?? ?????y ????? th??ng tin tracking'
                                    );
                                    $('#exitForm').hide();
                                    $('#exitSuccess').show();
                                    $('#myModal').modal('show');
                                }

                                //length box = 0
                                if (value.boxes.length == 0) {
                                    $("#body-table-firt-vnpost").empty()
                                    $("#table-index-vnpost").hide()
                                    $("#body-table-index").empty()
                                    $("#load_item").empty()
                                    $("#time_line_index").empty()
                                    $("#time_line_index").append(
                                        '<li>' +
                                        '<a>' + 'Ch??a v??? kho' +
                                        '</a>' +
                                        '<p>' + created_at +
                                        '</p>' +
                                        '</li>'
                                    )
                                    // if(value.logs.length){
                                    //     var total_pay = 0;
                                    //     var matchedLogIdx = value.logs.findIndex((log) => {return !!log?.content?.transaction});
                                    //     $.each(value.logs,function(logs_index,logs_value){
                                    //         let keyObjectLogMerge = Object.keys(logs_value.content)
                                    //         var statusLogMerge;
                                    //         if(matchedLogIdx === -1){
                                    //             if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                    //                 total_pay += logs_value.content.service_fee_paid
                                    //                 statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                    //             }
                                    //         }else{
                                    //             if(keyObjectLogMerge=="transaction"){
                                    //                 total_pay += logs_value.content.transaction.amount
                                    //                 statusLogMerge = "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                    //             }
                                    //         }

                                    //         if(statusLogMerge != undefined){
                                    //             $("#time_line_index").append(
                                    //                 '<li>' +
                                    //                 '<a>' + statusLogMerge + '</a>' +
                                    //                 '<p>' + logs_value.created_at + '</p>' +
                                    //                 '</li>'
                                    //             )
                                    //         }
                                    //     })
                                    // }
                                    $("#body-table-index")
                                        .append(
                                            `<tr>` +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' + name_send +
                                            '</td>' +
                                            '<td>' + name_rev +
                                            '</td>' +
                                            '<td>' + tel_rev +
                                            '</td>' +
                                            '<td>' + add_rev +
                                            '<td>' + add_note +
                                            '</td>' +
                                            '<td>' + method_ship +
                                            '</td>' +
                                            '</tr>'
                                        )
                                } else { //lengbox !=0
                                    $("#body-table-index").empty()
                                    $("#time_line_index").empty()
                                    $.each(value.boxes, function(index, value2) {
                                        $("#body-table-index").append(
                                            `<tr id="sku-row-${value2.id}" data-id="${value2.id}">` +
                                            '<td>' + value2.id +
                                            '</td>' +
                                            '<td>' + value2.weight +
                                            '</td>' +
                                            '<td>' + value2.volume_weight_box +
                                            '</td>' +
                                            '<td class="text-center">' + value2.duplicate +
                                            '</td>' +
                                            '<td>' + name_send +
                                            '</td>' +
                                            '<td>' + name_rev +
                                            '</td>' +
                                            '<td>' + tel_rev +
                                            '</td>' +
                                            '<td>' + add_rev +
                                            '<td>' + add_note +
                                            '</td>' +
                                            '<td>' + method_ship +
                                            '</td>' +
                                            '</tr>'
                                        )
                                        if (value.boxes.length == 1) {
                                            if (value.reference.length != 0) {
                                                $("#alert").show()
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                $("#id_order").text(value.id)
                                                $("#money").text(value.reference.total_fee + " VN??")
                                            }

                                            //log
                                            $("#time_line_index").empty()
                                            if (value.boxes[0].logs.length == 0) {
                                                $("#time_line_index").append(
                                                    '<li>' +
                                                    '<a>' + '??ang t???i kho' +
                                                    '</a>' +
                                                    '<p>' + created_at +
                                                    '</p>' +
                                                    '</li>'
                                                )
                                                if (value.logs.length) {
                                                    // var total_pay = 0;
                                                    // var matchedLogIdx = value.logs.findIndex((log) => {return !!log?.content?.transaction});
                                                    // $.each(value.logs,function(logs_index,logs_value){
                                                    //     let keyObjectLogMerge = Object.keys(logs_value.content)
                                                    //     var statusLogMerge;
                                                    //     if(matchedLogIdx === -1){
                                                    //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                    //             total_pay += logs_value.content.service_fee_paid
                                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                                    //         }
                                                    //     }else{
                                                    //         if(keyObjectLogMerge=="transaction"){
                                                    //             total_pay += logs_value.content.transaction.amount
                                                    //             statusLogMerge = "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                                    //         }
                                                    //     }

                                                    //     if(statusLogMerge != undefined){
                                                    //         $("#time_line_index").append(
                                                    //             '<li>' +
                                                    //             '<a>' + statusLogMerge + '</a>' +
                                                    //             '<p>' + logs_value.created_at + '</p>' +
                                                    //             '</li>'
                                                    //         )
                                                    //     }
                                                    // })
                                                    // if(service_fee_paid >= service_fee){
                                                    //     $("#alert").hide()
                                                    //     if(value.reference.length){
                                                    //         $("#paid").show()
                                                    //     }else{
                                                    //         $("#paid").hide()
                                                    //     }
                                                    // }
                                                }
                                            } else {
                                                var size = "( D??i : " + value.boxes[0].length + "cm" + ",R???ng: " + value.boxes[0].width + "cm" + ",Cao: " + value.boxes[0].height + "cm )"
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                if (value.reference.length != 0) {
                                                    $("#id_order").text(value.id)
                                                    $("#money").text(formatNumber(value.reference.total_fee) + " VN??")
                                                }
                                                $.each(value.boxes[0].logs, function(index, value) {
                                                    // let a =JSON.parse(value.content );
                                                    let keyObject = Object.keys(value.content)
                                                    let valueObject = Object.values(value.content);
                                                    var status;
                                                    if (keyObject == "id") {
                                                        status = "???? nh???p kho Nh???t"
                                                    }
                                                    if (keyObject == "in_pallet") {
                                                        status = "???? ki???m h??ng" + size
                                                    }
                                                    if (keyObject == "set_user_id,set_order_id") {
                                                        status = "L??n ????n h??ng"
                                                    }
                                                    if (keyObject == "set_user_id") {
                                                        status = "L??n ????n h??ng"
                                                    }
                                                    if (keyObject == "set_owner_id,set_owner_type") {
                                                        status = "L??n ????n h??ng"
                                                    }
                                                    if (keyObject == "set_user_id") {
                                                        status = "L??n ????n h??ng"
                                                    }
                                                    if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                                        // var parts = value.created_at.split('-')
                                                        // var year = parts[2].split(' ')
                                                        // var getDate = new Date(year[0],parts[1]-1,parts[0])
                                                        // var now = new Date()
                                                        // var date_arv = getDate-now;
                                                        // var add_date;
                                                        // var check_method = method_ship.charAt(0).toUpperCase() + method_ship.slice(1);
                                                        // if(check_method =="Air"){
                                                        //     add_date=6;
                                                        // }else{
                                                        //     add_date = 30;
                                                        // }
                                                        // var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                                        // if(expected_date > 0) {
                                                        //     status = "Xu???t kho Nh???t" +" ( D??? ki???n ?????n kho VN "+ expected_date +" ng??y n???a )"
                                                        // }else{
                                                        status = "Xu???t kho Nh???t"
                                                        // }
                                                        // status ="Xu???t kho Nh???t"

                                                    }
                                                    if (keyObject == "shipping_code" && value.type_id == "created") {
                                                        status = "M?? giao h??ng: " + value.content.shipping_code
                                                    }
                                                    if (keyObject == "shipping_code" && value.type_id == "updated") {
                                                        status = "C???p nh???t m?? giao h??ng: " + value.content.shipping_code
                                                    }
                                                    if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                                        status = "Hu??? m?? giao h??ng: " + value.content.shipping_code
                                                    }
                                                    if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                                        status = "Nh???p kho Vi???t Nam"
                                                    }
                                                    if (keyObject == "outbound_warehouse") {
                                                        status = "Xu???t kho Vi???t Nam"
                                                    }
                                                    if (keyObject == "delivery_status") {
                                                        if (valueObject == "shipping") {
                                                            status = "??ang giao h??ng"
                                                        }
                                                    }
                                                    if (keyObject == "delivery_status") {
                                                        if (valueObject == "cancelled") {
                                                            status = "H???y box"
                                                        }
                                                    }
                                                    if (keyObject == "delivery_status") {
                                                        if (valueObject == "received") {
                                                            status = "???? nh???n h??ng"
                                                        }
                                                    }
                                                    if (keyObject == "delivery_status") {
                                                        if (valueObject == "refunded") {
                                                            status = "Tr??? l???i h??ng"
                                                        }
                                                    }
                                                    if (keyObject == "delivery_status") {
                                                        if (valueObject == "waiting_shipment") {
                                                            status = "?????i giao h??ng"
                                                        }
                                                    }
                                                    if (status != undefined) {
                                                        $("#time_line_index").append(
                                                            '<li>' +
                                                            '<a>' + status +
                                                            '</a>' + '<p>' + value.created_at +
                                                            '</p>' +
                                                            '</li>'
                                                        )
                                                    }

                                                })
                                                if (value.logs.length) {
                                                    // var total_pay = 0;
                                                    // var matchedLogIdx = value.logs.findIndex((log) => {
                                                    //         return !!log?.content?.transaction
                                                    //     });
                                                    // $.each(value.logs,function(logs_index,logs_value){
                                                    //     let keyObjectLogMerge = Object.keys(logs_value.content)
                                                    //     var statusLogMerge;
                                                    //     if(matchedLogIdx === -1) {
                                                    //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                    //             total_pay += logs_value.content.service_fee_paid
                                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                                    //         }
                                                    //     }  else {
                                                    //         if(keyObjectLogMerge=="transaction"){
                                                    //             total_pay += logs_value.content.transaction.amount
                                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                                    //         }
                                                    //     }

                                                    //     if(statusLogMerge != undefined){
                                                    //         $("#time_line_index").append(
                                                    //             '<li>' +
                                                    //             '<a>' + statusLogMerge + '</a>' +
                                                    //             '<p>' + logs_value.created_at + '</p>' +
                                                    //             '</li>'
                                                    //         )
                                                    //     }
                                                    // })
                                                    // if(pay_money != undefined){
                                                    // if(service_fee_paid >= service_fee){
                                                    //     $("#alert").hide()
                                                    //     if(value.reference.length){
                                                    //         $("#paid").show()
                                                    //     }else{
                                                    //         $("#paid").hide()
                                                    //     }
                                                    // }
                                                    // }
                                                }
                                            }

                                        } else {

                                            if (value.reference.length != 0) {
                                                $("#alert").show()
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                $("#id_order").text(value.id)
                                                $("#money").text(formatNumber(value.reference.total_fee) + " VN??")
                                                if (value.logs.length) {
                                                    // var total_pay = 0;
                                                    // var matchedLogIdx = value.logs.findIndex((log) => {return !!log?.content?.transaction });
                                                    // $.each(value.logs,function(logs_index,logs_value){
                                                    //     let keyObjectLogMerge = Object.keys(logs_value.content)
                                                    //     // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                    //     var statusLogMerge;
                                                    //     if(matchedLogIdx === -1){
                                                    //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                                    //             total_pay += logs_value.content.service_fee_paid
                                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                                    //         }
                                                    //     }else{
                                                    //         if(keyObjectLogMerge=="transaction"){
                                                    //             total_pay += logs_value.content.transaction.amount
                                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                                    //         }
                                                    //     }
                                                    // })
                                                    // if(pay_money != undefined){
                                                    // if(service_fee_paid >= service_fee){
                                                    //     $("#alert").hide()
                                                    //     if(value.reference.length){
                                                    //         $("#paid").show()
                                                    //     }else{
                                                    //         $("#paid").hide()
                                                    //     }
                                                    // }
                                                    // }
                                                }
                                            }
                                            $(`#sku-row-${value2.id}`).hover(function() {
                                                $(this).addClass("tr-color addHover");
                                            }, function() {
                                                $(this).removeClass("tr-color addHover");
                                            });
                                            $(`#sku-row-${value2.id}`).on('click', function() {
                                                var vnpost = 0;
                                                if (value2.vnpost != undefined) {
                                                    vnpost = value2.vnpost;
                                                } else {
                                                    vnpost = 0;
                                                }
                                                check(value2.id, vnpost, created_at, value2.use_weight, value2.fee_ship, method_ship, value2.total_money, value.logs, pay_money, value)
                                            })
                                        }
                                    })
                                }
                                if (service_fee_paid + 5000 >= value.reference.total_fee) {
                                    $("#alert").hide()
                                    $("#paid").show();
                                }
                                if (value.reference.contract_id) {
                                    var contract = value.reference.contract;
                                    var service_fee = contract.service_fee;
                                    var service_fee_paid = contract.service_fee_paid;
                                    var service_fee_debited = contract.service_fee_debited;
                                    var status_contract = (service_fee <= service_fee_paid && service_fee_debited > 0) ? 'L?? h??ng ???? thanh to??n.' : 'L?? h??ng ch??a ???????c thanh to??n.';
                                    $(".check-contract").hide();
                                    $("#alert-contract").show()
                                    $("#id_contract").text(contract.id)
                                    $("#status_contract").text(status_contract)
                                }
                            })
                        }
                    }
                }
            },
            error: function(res) {
                if (res.status == 419) {
                    swal({
                        title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                        type: "warning",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    }).then(() => {
                        location.reload()
                    })
                } else {
                    console.log(res)
                }

            }
        })
    })
    //show log by id
    function check(id_box, vnpost, created_at, weight, fee, method, money, logs_merge, pay_money, length_order) {
        var email = "sale@saikoexpress.com";
        var password = "{{config('services.saiko.password')}}";
        let box = id_box;
        const checkSession = "{{ Session::has('idToken') }}"
        $("#time_line_index").empty()
        if (checkToken()) {
            let idToken = getToken();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{route('rq_tk.getInforBox')}}",
                data: {
                    idToken: idToken,
                    id_box: box
                },
                success: function(res) {
                    if (res?.code == 401) {
                        refreshToken(res?.code);
                    }
                    if (res.logs.length == 0) {
                        $("#time_line_index").append(
                            '<li>' +
                            '<a>' + '??ang t???i kho' + '</a>' +
                            '<p>' + created_at + '</p>' +
                            '</li>'
                        )
                    } else {
                        var size = "( D??i : " + res.length + "cm" + ",R???ng: " + res.width + "cm" + ",Cao: " + res.height + "cm )"
                        $.each(res.logs, function(index, value) {
                            let keyObject = Object.keys(value.content)
                            let valueObject = Object.values(value.content);
                            var status;
                            if (keyObject == "id") {
                                status = "???? nh???p kho Nh???t"
                            }
                            if (keyObject == "in_pallet") {
                                status = "???? ki???m h??ng" + size
                            }
                            if (keyObject == "set_user_id,set_order_id") {
                                status = "L??n ????n h??ng"
                            }
                            if (keyObject == "set_user_id") {
                                status = "L??n ????n h??ng"
                            }
                            if (keyObject == "set_owner_id,set_owner_type") {
                                status = "L??n ????n h??ng"
                            }
                            if (keyObject == "set_user_id") {
                                status = "L??n ????n h??ng"
                            }
                            if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                // var parts = value.created_at.split('-')
                                // var year = parts[2].split(' ')
                                // var getDate = new Date(year[0],parts[1]-1,parts[0])
                                // var now = new Date()
                                // var date_arv = getDate-now;
                                // var check_method = method.charAt(0).toUpperCase() + method.slice(1);
                                // if(check_method =="Air"){
                                //     add_date=6;
                                // }else{
                                //     add_date = 30;
                                // }
                                // var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                // if(expected_date > 0) {
                                //     status = "Xu???t kho Nh???t" +" ( D??? ki???n ?????n kho VN "+ expected_date +" ng??y n???a )"
                                // }else{
                                status = "Xu???t kho Nh???t"
                                // }
                            }
                            if (keyObject == "shipping_code" && value.type_id == "created") {
                                status = "M?? giao h??ng: " + value.content.shipping_code
                            }
                            if (keyObject == "shipping_code" && value.type_id == "updated") {
                                status = "C???p nh???t m?? giao h??ng: " + value.content.shipping_code
                            }
                            if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                status = "Hu??? m?? giao h??ng: " + value.content.shipping_code
                            }
                            if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                status = "Nh???p kho Vi???t Nam"
                            }
                            if (keyObject == "outbound_warehouse") {
                                status = "Xu???t kho Vi???t Nam"
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "shipping") {
                                    status = "??ang giao h??ng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "cancelled") {
                                    status = "H???y box"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "received") {
                                    status = "???? nh???n h??ng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "refunded") {
                                    status = "Tr??? l???i h??ng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "waiting_shipment") {
                                    status = "?????i giao h??ng"
                                }
                            }
                            if (status != undefined) {
                                $("#time_line_index").append(
                                    '<li>' +
                                    '<a>' + status + '</a>' +
                                    '<p>' + value.created_at + '</p>' +
                                    '</li>'
                                )
                            }

                        })
                    }
                    if (logs_merge.length) {
                        // var total_pay = 0;
                        // var matchedLogIdx = logs_merge.findIndex((log) => {
                        //         return !!log?.content?.transaction
                        //     });
                        // $.each(logs_merge,function(logs_index,logs_value){
                        //     let keyObjectLogMerge = Object.keys(logs_value.content)
                        //     var statusLogMerge;
                        //     var created_at_log;
                        //     if(matchedLogIdx === -1) {
                        //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                        //             total_pay += logs_value.content.service_fee_paid
                        //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                        //         }
                        //     }else{
                        //         if(keyObjectLogMerge=="transaction"){
                        //             total_pay += logs_value.content.transaction.amount
                        //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                        //         }
                        //     }

                        //     if(statusLogMerge != undefined){
                        //         $("#time_line_index").append(
                        //             '<li>' +
                        //             '<a>' + statusLogMerge + '</a>' +
                        //             '<p>' + logs_value.created_at + '</p>' +
                        //             '</li>'
                        //         )
                        //     }
                        // })
                        // if(pay_money != undefined){
                        // if(service_fee_paid >= service_fee){
                        //                                 $("#alert").hide()
                        //                                 if(value.reference.length){
                        //                                     $("#paid").show()
                        //                                 }else{
                        //                                     $("#paid").hide()
                        //                                 }
                        //                             }
                        // }
                    }
                },
                error: function(res) {
                    if (res.status == 419) {
                        swal({
                            title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        }).then(() => {
                            location.reload()
                        })
                    } else {
                        console.log(res)
                    }
                }
            })
        } else {
            firebase.auth().onAuthStateChanged((user) => {
                if (user && checkSession && !checkToken()) {
                    firebase.auth().currentUser.getIdToken( /* forceRefresh */ true).then(function(token_gg) {
                        setToken(token_gg)
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "{{route('rq_tk.getInforBox')}}",
                            data: {
                                idToken: token_gg,
                                id_box: box
                            },
                            success: function(res) {
                                $("#time_line_index").empty()
                                if (res?.code == 401) {
                                    refreshToken(res?.code);
                                    swal({
                                        title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    }).then(() => {
                                        location.reload()
                                    })
                                }
                                if (res.logs.length == 0) {
                                    $("#time_line_index").append(
                                        '<li>' +
                                        '<a>' + '??ang t???i kho' + '</a>' +
                                        '<p>' + created_at + '</p>' +
                                        '</li>'
                                    )
                                } else {
                                    var size = "( D??i : " + res.length + "cm" + ",R???ng: " + res.width + "cm" + ",Cao: " + res.height + "cm )"
                                    $.each(res.logs, function(index, value) {
                                        let keyObject = Object.keys(value.content)
                                        let valueObject = Object.values(value.content);
                                        var status;
                                        if (keyObject == "id") {
                                            status = "???? nh???p kho Nh???t"
                                        }
                                        if (keyObject == "in_pallet") {
                                            status = "???? ki???m h??ng" + size
                                        }
                                        if (keyObject == "set_user_id,set_order_id") {
                                            status = "L??n ????n h??ng"
                                        }
                                        if (keyObject == "set_user_id") {
                                            status = "L??n ????n h??ng"
                                        }
                                        if (keyObject == "set_owner_id,set_owner_type") {
                                            status = "L??n ????n h??ng"
                                        }
                                        if (keyObject == "set_user_id") {
                                            status = "L??n ????n h??ng"
                                        }
                                        if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                            status = "Xu???t kho Nh???t"
                                        }
                                        if (keyObject == "shipping_code" && value.type_id == "created") {
                                            status = "M?? giao h??ng: " + value.content.shipping_code
                                        }
                                        if (keyObject == "shipping_code" && value.type_id == "updated") {
                                            status = "C???p nh???t m?? giao h??ng: " + value.content.shipping_code
                                        }
                                        if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                            status = "Hu??? m?? giao h??ng: " + value.content.shipping_code
                                        }
                                        if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                            status = "Nh???p kho Vi???t Nam"
                                        }
                                        if (keyObject == "outbound_warehouse") {
                                            status = "Xu???t kho Vi???t Nam"
                                        }
                                        if (keyObject == "delivery_status") {
                                            if (valueObject == "shipping") {
                                                status = "??ang giao h??ng"
                                            }
                                        }
                                        if (keyObject == "delivery_status") {
                                            if (valueObject == "cancelled") {
                                                status = "H???y box"
                                            }
                                        }
                                        if (keyObject == "delivery_status") {
                                            if (valueObject == "received") {
                                                status = "???? nh???n h??ng"
                                            }
                                        }
                                        if (keyObject == "delivery_status") {
                                            if (valueObject == "refunded") {
                                                status = "Tr??? l???i h??ng"
                                            }
                                        }
                                        if (keyObject == "delivery_status") {
                                            if (valueObject == "waiting_shipment") {
                                                status = "?????i giao h??ng"
                                            }
                                        }
                                        if (status != undefined) {
                                            $("#time_line_index").append(
                                                '<li>' +
                                                '<a>' + status + '</a>' +
                                                '<p>' + value.created_at + '</p>' +
                                                '</li>'
                                            )
                                        }

                                    })
                                }
                                if (logs_merge.length) {
                                    // var total_pay = 0;
                                    // var matchedLogIdx = logs_merge.findIndex((log) => {
                                    //         return !!log?.content?.transaction
                                    //     });
                                    // $.each(logs_merge,function(logs_index,logs_value){
                                    //     let keyObjectLogMerge = Object.keys(logs_value.content)
                                    //     var statusLogMerge;
                                    //     var created_at_log;
                                    //     if(matchedLogIdx === -1) {
                                    //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                    //             total_pay += logs_value.content.service_fee_paid
                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                    //         }
                                    //     }else{
                                    //         if(keyObjectLogMerge=="transaction"){
                                    //             total_pay += logs_value.content.transaction.amount
                                    //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                    //         }
                                    //     }

                                    //     if(statusLogMerge != undefined){
                                    //         $("#time_line_index").append(
                                    //             '<li>' +
                                    //             '<a>' + statusLogMerge + '</a>' +
                                    //             '<p>' + logs_value.created_at + '</p>' +
                                    //             '</li>'
                                    //         )
                                    //     }
                                    // })
                                    // if(pay_money != undefined){
                                    // if(service_fee_paid >= service_fee){
                                    //                     $("#alert").hide()
                                    //                     if(value.reference.length){
                                    //                         $("#paid").show()
                                    //                     }else{
                                    //                         $("#paid").hide()
                                    //                     }
                                    //                 }
                                    // }
                                }
                            },
                            error: function(res) {
                                if (res.status == 419) {
                                    swal({
                                        title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    }).then(() => {
                                        location.reload()
                                    })
                                } else {
                                    console.log(res)
                                }
                            }
                        })
                    }).catch(function(error) {
                        swal("warning", error.message)
                    });
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{route('rq_tk.getInforBox')}}",
                        data: {
                            // idToken:token_gg,
                            id_box: box
                        },
                        success: function(res) {
                            $("#time_line_index").empty()
                            if (res?.code == 401) {
                                refreshToken(res?.code);
                            }
                            if (res.logs.length == 0) {
                                $("#time_line_index").append(
                                    '<li>' +
                                    '<a>' + '??ang t???i kho' + '</a>' +
                                    '<p>' + created_at + '</p>' +
                                    '</li>'
                                )
                            } else {
                                var size = "( D??i : " + res.length + "cm" + ",R???ng: " + res.width + "cm" + ",Cao: " + res.height + "cm )"
                                $.each(res.logs, function(index, value) {
                                    let keyObject = Object.keys(value.content)
                                    let valueObject = Object.values(value.content);
                                    var status;
                                    if (keyObject == "id") {
                                        status = "???? nh???p kho Nh???t"
                                    }
                                    if (keyObject == "in_pallet") {
                                        status = "???? ki???m h??ng" + size
                                    }
                                    if (keyObject == "set_user_id,set_order_id") {
                                        status = "L??n ????n h??ng"
                                    }
                                    if (keyObject == "set_user_id") {
                                        status = "L??n ????n h??ng"
                                    }
                                    if (keyObject == "set_owner_id,set_owner_type") {
                                        status = "L??n ????n h??ng"
                                    }
                                    if (keyObject == "set_user_id") {
                                        status = "L??n ????n h??ng"
                                    }
                                    if (keyObject == "in_container" || keyObject == "in_container,from,to") {
                                        status = "Xu???t kho Nh???t"
                                    }
                                    if (keyObject == "shipping_code" && value.type_id == "created") {
                                        status = "M?? giao h??ng: " + value.content.shipping_code
                                    }
                                    if (keyObject == "shipping_code" && value.type_id == "updated") {
                                        status = "C???p nh???t m?? giao h??ng: " + value.content.shipping_code
                                    }
                                    if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                        status = "Hu??? m?? giao h??ng: " + value.content.shipping_code
                                    }
                                    if (keyObject == "out_container" || keyObject == "out_container,from,to") {
                                        status = "Nh???p kho Vi???t Nam"
                                    }
                                    if (keyObject == "outbound_warehouse") {
                                        status = "Xu???t kho Vi???t Nam"
                                    }
                                    if (keyObject == "delivery_status") {
                                        if (valueObject == "shipping") {
                                            status = "??ang giao h??ng"
                                        }
                                    }
                                    if (keyObject == "delivery_status") {
                                        if (valueObject == "cancelled") {
                                            status = "H???y box"
                                        }
                                    }
                                    if (keyObject == "delivery_status") {
                                        if (valueObject == "received") {
                                            status = "???? nh???n h??ng"
                                        }
                                    }
                                    if (keyObject == "delivery_status") {
                                        if (valueObject == "refunded") {
                                            status = "Tr??? l???i h??ng"
                                        }
                                    }
                                    if (keyObject == "delivery_status") {
                                        if (valueObject == "waiting_shipment") {
                                            status = "?????i giao h??ng"
                                        }
                                    }
                                    if (status != undefined) {
                                        $("#time_line_index").append(
                                            '<li>' +
                                            '<a>' + status + '</a>' +
                                            '<p>' + value.created_at + '</p>' +
                                            '</li>'
                                        )
                                    }

                                })
                            }
                            if (logs_merge.length) {
                                // var total_pay = 0;
                                // var matchedLogIdx = logs_merge.findIndex((log) => {
                                //         return !!log?.content?.transaction
                                //     });
                                // $.each(logs_merge,function(logs_index,logs_value){
                                //     let keyObjectLogMerge = Object.keys(logs_value.content)
                                //     var statusLogMerge;
                                //     var created_at_log;
                                //     if(matchedLogIdx === -1) {
                                //         if(keyObjectLogMerge=="updated_at,service_fee_paid"){
                                //             total_pay += logs_value.content.service_fee_paid
                                //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.service_fee_paid)
                                //         }
                                //     }else{
                                //         if(keyObjectLogMerge=="transaction"){
                                //             total_pay += logs_value.content.transaction.amount
                                //             statusLogMerge= "???? thanh to??n " + formatNumber(logs_value.content.transaction.amount)
                                //         }
                                //     }

                                //     if(statusLogMerge != undefined){
                                //         $("#time_line_index").append(
                                //             '<li>' +
                                //             '<a>' + statusLogMerge + '</a>' +
                                //             '<p>' + logs_value.created_at + '</p>' +
                                //             '</li>'
                                //         )
                                //     }
                                // })
                                // if(pay_money != undefined){
                                // if(service_fee_paid >= service_fee){
                                //                         $("#alert").hide()
                                //                         if(value.reference.length){
                                //                             $("#paid").show()
                                //                         }else{
                                //                             $("#paid").hide()
                                //                         }
                                //                     }
                                // }
                            }
                        },
                        error: function(res) {
                            if (res.status == 419) {
                                swal({
                                    title: "M?? x??c th???c h???t h???n vui l??ng t???i l???i trang",
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                }).then(() => {
                                    location.reload()
                                })
                            } else {
                                console.log(res)
                            }
                        }
                    })
                }
            })
        }
    }

    function toggleLoading() {
        $('.tmn-custom-mask').toggleClass('d-none');
    }

    document.getElementsByClassName("Creative-Button")[0].addEventListener("click", eventEmit);
    document.getElementsByClassName("Creative-Button")[1].addEventListener("click", eventEmit);
    document.getElementsByClassName("Creative-Button")[2].addEventListener("click", eventEmit);

    function eventEmit() {
        var host = window.location.hostname;
        window.location.href = "{{ route('rq_tk.shipment') }}";
    }

    function openQuote() {
        window.location.href = "{{ route('rq_tk.quote') }}";
    }

    const slider = (function() {

        //const
        const slider = document.getElementById("slider"); // ???????????????? ??????????????
        const sliderContent = document.querySelector(
            ".slider-content"); // ?????????????? ?????? ???????????????????? ?????????????? ?? ??????????????????
        const sliderWrapper = document.querySelector(".slider-content-wrapper"); // ?????????????????? ?????? ??????????????
        const elements = document.querySelectorAll(".slider-content__item"); // ?????????????? ?????? ????????????
        const sliderContentControls = createHTMLElement("div",
            "slider-content__controls"); // ???????? ?????????????????? ???????????? sliderContent
        let dotsWrapper = null; // ?????????????? dots
        let prevButton = null; // ????????????
        let nextButton = null;
        let autoButton = null;
        let leftArrow = null; // ??????????????
        let rightArrow = null;
        let intervalId = null; //?????????????????????????? setInterval

        // data
        const itemsInfo = {
            offset: 0, // ???????????????? ???????????????????? ???? ???????????????? ???????????????????????? ?????????????????? ?????????? (???????????? ??????????)
            position: {
                current: 0, // ?????????? ???????????????? ????????????
                min: 0, // ???????????? ??????????
                max: 0 // ?????????????????? ??????????
            },
            intervalSpeed: 5000, // ???????????????? ?????????? ?????????????? ?? ????????????????????

            update: function(value) {
                this.position.current = value;
                this.offset = -value;
            },
            reset: function() {
                this.position.current = 0;
                this.offset = 0;
            }
        };

        const controlsInfo = {
            buttonsEnabled: false,
            dotsEnabled: false,
            prevButtonDisabled: true,
            nextButtonDisabled: false
        };

        // ?????????????????????????? ????????????????
        function init(props) {
            // let {buttonsEnabled, dotsEnabled} = controlsInfo;
            let {
                intervalSpeed,
                position,
                offset
            } = itemsInfo;

            // ???????????????? ?????????????? ?????????????????? ????????????????
            if (slider && sliderContent && sliderWrapper && elements) {
                // ???????????????? ?????????????? ????????????????????
                if (props && props.intervalSpeed) {
                    intervalSpeed = props.intervalSpeed;
                }
                if (props && props.currentItem) {
                    if (parseInt(props.currentItem) >= position.min && parseInt(props.currentItem) <= position
                        .max) {
                        position.current = props.currentItem;
                        offset = -props.currentItem;
                    }
                }
                if (props && props.buttons) {
                    controlsInfo.buttonsEnabled = true;
                }
                if (props && props.dots) {
                    controlsInfo.dotsEnabled = true;
                }

                _updateControlsInfo();
                _createControls(controlsInfo.dotsEnabled, controlsInfo.buttonsEnabled);
                _render();


                intervalId = setInterval(function() {
                    if (itemsInfo.position.current < itemsInfo.position.max) {
                        itemsInfo.update(itemsInfo.position.current + 1);
                    } else {
                        itemsInfo.reset();
                    }
                    _slideItem();
                }, itemsInfo.intervalSpeed)
            } else {
                console.log("");
            }
        }

        // ???????????????? ???????????????? ??????????????????
        function _updateControlsInfo() {
            const {
                current,
                min,
                max
            } = itemsInfo.position;
            controlsInfo.prevButtonDisabled = current > min ? false : true;
            controlsInfo.nextButtonDisabled = current < max ? false : true;
        }

        // ???????????????? ?????????????????? ????????????????
        function _createControls(dots = false, buttons = false) {

            //?????????????? ?????? ??????????????????
            sliderContent.append(sliderContentControls);

            // ????????????????
            createArrows();
            buttons ? createButtons() : null;
            dots ? createDots() : null;

            // Arrows function
            function createArrows() {
                const dValueLeftArrow =
                    "M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z";
                const dValueRightArrow =
                    "M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z";
                const leftArrowSVG = createSVG(dValueLeftArrow);
                const rightArrowSVG = createSVG(dValueRightArrow);

                leftArrow = createHTMLElement("div", "prev-arrow");
                leftArrow.append(leftArrowSVG);
                leftArrow.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current - 1))

                rightArrow = createHTMLElement("div", "next-arrow");
                rightArrow.append(rightArrowSVG);
                rightArrow.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current + 1))

                sliderContentControls.append(leftArrow, rightArrow);

                // SVG function
                function createSVG(dValue, color = "currentColor") {
                    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("viewBox", "0 0 256 512");
                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("fill", color);
                    path.setAttribute("d", dValue);
                    svg.appendChild(path);
                    return svg;
                }
            }

            // Dots function
            function createDots() {
                dotsWrapper = createHTMLElement("div", "dots");
                for (let i = 0; i < itemsInfo.position.max + 1; i++) {
                    const dot = document.createElement("div");
                    dot.className = "dot";
                    dot.addEventListener("click", function() {
                        updateItemsInfo(i);
                    })
                    dotsWrapper.append(dot);
                }
                sliderContentControls.append(dotsWrapper);
            }

            // Buttons function
            function createButtons() {
                // const controlsWrapper = createHTMLElement("div", "slider-controls");
                // prevButton = createHTMLElement("button", "prev-control", "Prev");
                // prevButton.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current - 1))

                // autoButton = createHTMLElement("button", "auto-control", "Auto");
                // autoButton.addEventListener("click", () => {
                // 	intervalId = setInterval(function(){
                // 		if (itemsInfo.position.current < itemsInfo.position.max) {
                // 			itemsInfo.update(itemsInfo.position.current + 1);
                // 		} else {
                // 			itemsInfo.reset();
                // 		}
                // 		_slideItem();
                // 	}, itemsInfo.intervalSpeed)
                // })

                // nextButton = createHTMLElement("button", "next-control", "Next");
                // nextButton.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current + 1))

                // controlsWrapper.append(prevButton, autoButton, nextButton);
                // slider.append(controlsWrapper);
            }
        }

        // ???????????? ?????????? ?????? ?????????????????? (buttons, arrows)
        function setClass(options) {
            if (options) {
                options.forEach(({
                    element,
                    className,
                    disabled
                }) => {
                    if (element) {
                        disabled ? element.classList.add(className) : element.classList.remove(
                            className)
                    } else {
                        // console.log("Error: function setClass(): element = ", element);
                    }
                })
            }
        }

        // ???????????????? ???????????????? ????????????????
        function updateItemsInfo(value) {
            itemsInfo.update(value);
            _slideItem(true);
        }

        // ???????????????????? ????????????????
        function _render() {
            const {
                prevButtonDisabled,
                nextButtonDisabled
            } = controlsInfo;
            let controlsArray = [{
                    element: leftArrow,
                    className: "d-none",
                    disabled: prevButtonDisabled
                },
                {
                    element: rightArrow,
                    className: "d-none",
                    disabled: nextButtonDisabled
                }
            ];
            if (controlsInfo.buttonsEnabled) {
                controlsArray = [
                    ...controlsArray,
                    {
                        element: prevButton,
                        className: "disabled",
                        disabled: prevButtonDisabled
                    },
                    {
                        element: nextButton,
                        className: "disabled",
                        disabled: nextButtonDisabled
                    }
                ];
            }

            // ????????????????????/???????????????? ??????????????????
            setClass(controlsArray);

            // ?????????????????????? ??????????????
            sliderWrapper.style.transform = `translateX(${itemsInfo.offset*100}%)`;

            // ???????????? ???????????????? ?????????????? ?????? ?????????? (dot)
            if (controlsInfo.dotsEnabled) {
                if (document.querySelector(".dot--active")) {
                    document.querySelector(".dot--active").classList.remove("dot--active");
                }
                dotsWrapper.children[itemsInfo.position.current].classList.add("dot--active");
            }
        }

        // ?????????????????????? ??????????
        function _slideItem(autoMode = false) {
            if (autoMode && intervalId) {
                clearInterval(intervalId);
            }
            _updateControlsInfo();
            _render();
        }

        // ?????????????? HTML ???????????????? ?????? ????????????????
        function createHTMLElement(tagName = "div", className, innerHTML) {
            const element = document.createElement(tagName);
            className ? element.className = className : null;
            innerHTML ? element.innerHTML = innerHTML : null;
            return element;
        }

        // ?????????????????? ????????????
        return {
            init
        };
    }())

    slider.init({
        intervalSpeed: 1000,
        currentItem: 0,
        buttons: true,
        dots: true
    });

    function clearAll() {

    }
</script>
</body>

</html>
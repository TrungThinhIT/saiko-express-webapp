<!DOCTYPE html>
<html lang="en">
<script src="https://www.google.com/recaptcha/api.js?render=6LexXeoUAAAAACjR-MM0V2-scILrUMVyliP1bArL"></script>
@include('modules.header')
<!--Main Slider-->

<!--header end -->
<style>
    .color-arrow{
        font-size: 18px;
        color: #fca901;
    }
      .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
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
        .tr-color:hover td{
            background-color:#fca901 !important;
            cursor: pointer;
        }
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
            height: 300px;
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



    /* slider обертка */
    .slider {
        position: relative;
        height: 100%;
        width: 100%;
        overflow: hidden;
        z-index: 0;
    }

    /*Окно со слайдами*/
    .slider-content {
        position: relative;
        width: 100%;
    }

    /*Контейнер для слайдов (передвигаем)*/
    .slider-content-wrapper {
        display: flex;
        height: 500px;
        transition: transform 0.5s ease-in-out;
    }

    /*Слайд*/
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


    /* Блок с контролами */
    .slider-controls {
        padding: 20px;
        text-align: center;
    }

    /* Блок с контролами внутри окна */
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
        color: white;
        text-align: center;
        width: 100%;
    }

</style>


<div id="slider" class="slider">
    <div class="slider-content">
        <div class="slider-content-wrapper">
            <div class="slider-content__item image-1 image-height-mobile">
                <img src="../assets/images/update_index.png" >

                <div class="content-slide">
                    <p class="title-slide" >THÔNG TIN CẬP NHẬT</p>
                    <a href="{{route('blog.index')}}"><button onclick="openQuote()" class="btn ed_btn ed_orange">Xem thêm</button></a>
                </div>

            </div>
            <div class="slider-content__item image-1 image-height-mobile">
                <img src="../assets/images/air_index.jpg" >

                <div class="content-slide">
                    <p class="title-slide" >VẬN CHUYỂN ĐƯỜNG BAY</p>
                    <p class="text-slide" > Vận chuyển hàng hoá từ Nhật về Việt
                        Nam <br />bằng máy bay nhận hàng chỉ từ 5 - 7 ngày</p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">GỬI HÀNG NGAY</button>
                </div>

            </div>
            <div class="slider-content__item image-2 image-height-mobile">
                <img src="../assets/images/sea_index.png">

                <div class="content-slide">
                    <p class="title-slide">VẬN CHUYỂN ĐƯỜNG BIỂN</p>
                    <p class="text-slide" >
                        Vận chuyển hàng hoá từ Nhật về Việt Nam<br />bằng tàu nhận hàng từ 24-36 ngày</p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">GỬI HÀNG NGAY</button>
                </div>
            </div>
            <div class="slider-content__item image-3 image-height-mobile">
                <img src="../assets/images/solution.png">

                <div class="content-slide">
                    <p class="title-slide">CUNG CẤP GIẢI PHÁP HIỆU QUẢ</p>
                    <p class="text-slide" >
                        Hệ thống tracking thông minh hiện đại hỗ trợ khách hàng <br />kiểm soát chi phí vận chuyển nhận
                        hàng tại nhà
                    </p>
                    <button onclick="openQuote()" class="btn ed_btn ed_orange">GỬI HÀNG NGAY</button>
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
                <div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container"
                    data-alias="creative-freedom" data-source="gallery" style="padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                    <div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;"
                        data-version="5.3.0.2">
                        <ul>
                            <!-- SLIDE  -->
                            <li data-index="rs-2978" data-transition="fadethroughdark" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="0" data-thumb="" data-rotate="0"
                                data-saveperformance="off" data-title="" data-param1="01" data-param2="" data-param3=""
                                data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                                data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover"
                                    data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup"
                                    id="slide-2978-layer-1" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']"
                                    data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                                    data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                                    data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":0,"ease":"Power2.easeInOut"},{"delay":"none","speed":0,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 5;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2978-layer-4" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":0,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 6;text-transform:left;background-color: rgba(255, 255, 255, 0.46);border-color:rgba(0, 0, 0, 0);border-width:0px;background: rgb(252, 169, 1);">
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2"
                                    id="slide-2978-layer-3" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']"
                                    data-lineheight="['14','14','14','12']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":0,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"0","speed":0,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 7; white-space: nowrap;text-transform:left;  font-family: 'Trirong', serif;font-size: 30px !important;">
                                    <!-- <p>VẬN CHUYỂN ĐƯỜNG BAY</p><br/> -->

                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1"
                                    id="slide-2978-layer-2" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-10','-10','-10','-10']" data-fontsize="['70','70','50','40']"
                                    data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']"
                                    data-height="none" data-whitespace="nowrap" data-type="text"
                                    data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":0,"ease":"Power3.easeOut"},{"delay":"wait","speed":0,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 14; white-space: nowrap;text-transform:left; font-family: 'Roboto', sans-serif;font-size: 10px !important;">
                                    <p class="title-slide">VẬN CHUYỂN ĐƯỜNG BAY</p>
                                    <p class="text-slide"> Vận chuyển hàng hoá từ Nhật về Việt Nam <br />bằng máy bay
                                        nhận hàng chỉ từ 5 - 7 ngày</p>
                                </div>

                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2978-layer-5" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['137','137','119','100']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 9;text-transform:left;background-color: rgba(255, 255, 255, 0.46);border-color:rgba(0, 0, 0, 0);border-width:0px;background: rgb(252, 169, 1);">
                                </div>

                                <!-- LAYER NR. 6 -->
                                <div class="sendEvent tp-caption Creative-Button rev-btn  rs-parallaxlevel-15 "
                                    id="slide-2978-layer-6" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                    data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']"
                                    data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                                    data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                    data-responsive_offset="on" data-responsive="off"
                                    data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]"
                                    data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]"
                                    data-paddingleft="[50,50,50,50]"
                                    style="z-index: 10; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important;">GỬI
                                        HÀNG
                                        NGAY</a>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-2979" data-transition="fadethroughdark" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="2000"
                                data-thumb="http://placehold.it/1920X1080" data-rotate="0" data-saveperformance="off"
                                data-title="" data-param1="02" data-param2="" data-param3="" data-param4=""
                                data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                                data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 7 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup"
                                    id="slide-2979-layer-1" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                    data-whitespace="nowrap" data-type="shape" data-basealign="slide"
                                    data-responsive_offset="off" data-responsive="off"
                                    data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 11;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 8 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2979-layer-4" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 12;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 9 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2"
                                    id="slide-2979-layer-3" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']"
                                    data-lineheight="['14','14','14','12']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 13; white-space: nowrap;text-transform:left; font-family: 'Trirong', serif;">
                                    <!-- sea -->
                                </div>


                                <!-- LAYER NR. 10 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1"
                                    id="slide-2979-layer-2" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-10','-10','-10','-10']" data-fontsize="['70','70','50','40']"
                                    data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']"
                                    data-height="none" data-whitespace="nowrap" data-type="text"
                                    data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 14; white-space: nowrap;text-transform:left; font-family:'Roboto', sans-serif;font-size: 10px !important;">
                                    <p class="title-slide">VẬN CHUYỂN ĐƯỜNG BIỂN</p>
                                    <p class="text-slide">
                                        Vận chuyển hàng hoá từ Nhật về Việt Nam<br />bằng tàu nhận hàng từ 24-36 ngày
                                    </p>
                                </div>

                                <!-- LAYER NR. 11 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2979-layer-5" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['137','137','119','100']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 15;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 12 -->
                                <div class="tp-caption Creative-Button rev-btn  rs-parallaxlevel-15"
                                    id="slide-2979-layer-6" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                    data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']"
                                    data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                                    data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                    data-responsive_offset="on" data-responsive="off"
                                    data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]"
                                    data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]"
                                    data-paddingleft="[50,50,50,50]"
                                    style="z-index: 16; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important">GỬI
                                        HÀNG
                                        NGAY</a>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-2980" data-transition="fadethroughdark" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="2000"
                                data-thumb="http://placehold.it/1920X1080" data-rotate="0" data-saveperformance="off"
                                data-title="" data-param1="03" data-param2="" data-param3="" data-param4=""
                                data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                                data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="" alt="" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                                <!-- LAYER NR. 13 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup"
                                    id="slide-2980-layer-1" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['0','0','0','0']" data-width="full" data-height="full"
                                    data-whitespace="nowrap" data-type="shape" data-basealign="slide"
                                    data-responsive_offset="off" data-responsive="off"
                                    data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 17;text-transform:left;border-color:rgba(0, 0, 0, 0);border-width:0px;background-color: rgba(135, 132, 132, 0.46);">
                                </div>

                                <!-- LAYER NR. 14 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2980-layer-4" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 18;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 15 -->
                                <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2"
                                    id="slide-2980-layer-3" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-91','-91','-81','-64']" data-fontsize="['14','14','14','12']"
                                    data-lineheight="['14','14','14','12']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 19; white-space: nowrap;text-transform:left; font-family: 'Trirong', serif;">
                                    <!-- CUNG CẤP GIẢI PHÁP CHI PHÍ HIỂU QUẢ -->
                                </div>

                                <!-- LAYER NR. 16 -->
                                <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1"
                                    id="slide-2980-layer-2" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['-10','-10','-10','-10']" data-fontsize="['40','40','30','30']"
                                    data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']"
                                    data-height="none" data-whitespace="nowrap" data-type="text"
                                    data-responsive_offset="on"
                                    data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 20; white-space: nowrap;text-transform:left; font-family: 'Roboto', sans-serif;font-size: 10px !important">
                                    <p class="title-slide">CUNG CẤP GIẢI PHÁP HIỆU QUẢ</p>
                                    <p class="text-slide text-slide-font">
                                        Hệ thống tracking thông minh hiện đại hỗ trợ khách hàng <br />kiểm soát chi phí
                                        vận chuyển nhận hàng tại nhà
                                    </p>
                                </div>

                                <!-- LAYER NR. 17 -->
                                <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3"
                                    id="slide-2980-layer-5" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['137','137','119','100']" data-width="1" data-height="100"
                                    data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                    data-responsive="off"
                                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 21;text-transform:left;background-color:rgb(252, 169, 1);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                                </div>

                                <!-- LAYER NR. 18 -->
                                <div class="tp-caption Creative-Button rev-btn  rs-parallaxlevel-15"
                                    id="slide-2980-layer-6" data-x="['center','center','center','center']"
                                    data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                    data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']"
                                    data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                                    data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                    data-responsive_offset="on" data-responsive="off"
                                    data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(252, 169, 1);bc:rgb(252, 169, 1);bw:1px 1px 1px 1px;"}]'
                                    data-textAlign="['left','left','left','left']" data-paddingtop="[15,15,15,15]"
                                    data-paddingright="[50,50,50,50]" data-paddingbottom="[15,15,15,15]"
                                    data-paddingleft="[50,50,50,50]"
                                    style="z-index: 22; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-family: 'Trirong', serif;font-size: 16px !important;">
                                    <a href="" style="color:aliceblue;font-weight: bold;font-size: 18px !important">GỬI
                                        HÀNG
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
                    <h3>KIỆN HÀNG</h3>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="ed_search_image">
                    <img src="../assets/images/aba.jpg" alt="" title="map" height="500px">
                </div>


            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-custom-tracking">
                <div class="row">
                    <div class="col-md-11 col-sm-11" style="float:right">
                        <p class="text-tracking"><i class="fa fa-arrow-circle-right color-arrow" ></i> Kiện
                            hàng của tôi cân nặng bao nhiêu?</p>
                        <p class="text-tracking" style="margin-left: 30px">
                            <i class="fa fa-arrow-circle-right color-arrow" ></i> Tình trạng hàng hóa đang ở
                            đâu?
                        </p>
                        <p class="text-tracking"><i class="fa fa-arrow-circle-right color-arrow" ></i> Làm
                            thế nào để tự mình kiểm tra?</p>
                    </div>
                </div>

                {{-- <div class="row" style="text-align: center;margin-top: 30px;">
                    <a style=" border: 1px solid #fca901; padding: 10px;"><span style="margin: 10px;">NHẬP
                            NGAY</span></a>
                </div> --}}
                <div class="row" style="text-align: center;margin-top: 30px;">
                    <a><i class="transition fa fa-arrow-circle-down  fa-2x" style="color: #fca901 "></i></a>
                </div>
                <div class="row" style="margin-top:30px">
                    <div class="ed_search_form">
                        <form class="form-inline" id="tracking_form_index" method='post'>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>Vui lòng nhập tracking</p>

                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Nhập tracking..." onclick="clearAll()" class="form-control" id="utrack">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn ed_btn pull-right ed_orange">Tìm kiếm</button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="alert alert-danger" id="statusData" style="display: none;margin-top:20px;">
                    </div>
                </div>

            </div>

        </div>

        <div class="row" style="margin: 6px;" >
            <div class="col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="display:none;text-align: center;" id="table-index">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Box_ID</th>
                                <th style="text-align: center;">Cân Nặng(kg)</th>
                                <th style="text-align: center;">Thể Tích(kg)</th>
                                <th style="text-align:center">Số lượng</th>
                                <th style="text-align: center;">Người Gửi</th>
                                <th style="text-align: center;">Người Nhận</th>
                                <th style="text-align: center;">SĐT</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Đường Vận Chuyển</th>
                            </tr>
                        </thead>
                        <tbody id="body-table-index">

                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table_price_shipping" style="display:none">
                                <thead>
                                    <tr>
                                    <th style="text-align: center">Mã Tracking</th>    
                                    <th style='width:100px;text-align:center'>Tổng khối lượng tính phí</th>
                                    <th>Đơn giá</th>
                                    <th>Đường vận chuyển</th>
                                    <th>Phí vận chuyển (Nhật - Kho Việt)</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_price_shipping">
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row d-none" id="declaration_price" style="margin:4px">
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <div class="col-md-6 " style="padding-left: unset">
                            <p class="" ><label for="" >Giá trị gói bảo hiểm</label>: <span id="insurance_result"></span> </p>
                        </div>
                        <div class="col-md-6">
                            <p class="" ><label for="" >Phí bảo hiểm (3%)</label>: <span id="insurance_result_fee"></span> </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <div class="col-md-6" style="padding-left: unset">
                            <p class="" ><label for="" id="special">Giá trị hàng hoá đặc biệt</label>: <span id="special_result"></span> </p>
                        </div>
                        <div class="col-md-6">
                            <p class="" ><label for="" id="special">Phí hàng hoá đặc biệt (2%)</label>: <span id="special_result_fee"></span> </p>
                        </div>
                    </div>
                </div>
                <div class="row d-none"  id="alert" style="margin:4px"  >
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <h2 class="text-center text-danger font-weight-bold"> <b> PHIẾU YÊU CẦU THANH TOÁN </b></h2>
                        <p class="text-danger" >Xin quý khách vui lòng thanh toán đến STK : <b>19035902493017</b>. Tên người nhận : Nguyễn Văn Huy - Ngân hàng Techcombank <img src="images/TCB_icon.png" alt="" width="100px"></p>
                        <p class="text-danger font-weight-bold" style="font-weight: bold"> Nội dung thanh toán : <span class="text-danger" style="font-size: 25px" id="id_order"></span><p>
                        <p class="text-danger text-uppercase font-weight-bold" style="font-weight: bold">Số tiền thanh toán: <span id="money" style="font-size: 25px"></span> <span style="font-weight: normal !important;">( Đã bao gồm phí bảo hiểm, hàng hoá đặc biệt)</span></p>
                    </div>
                </div>
                <div class="row d-none"  id="paid" style="margin:4px"  >
                    <div class="col-md-12 col-sm-12 " style="background-color: #fad792">
                        <h2 class="text-center text-danger font-weight-bold"> <b> Đã Thanh Toán </b></h2>
                        <h2 class="text-center text-danger">Cảm Ơn Quý Khách</h2>
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
                                    <th style='width:100px'>Số Lượng</th>
                                    <th>Tên Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody id="load_item">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="underline table-responsive" style="display:none" id="table-index-vnpost">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Mã Dịch Vụ</th>
                                <th style="text-align: center;">Phương thức vận chuyển</th>
                                <th style="text-align: center;">Cước COD</th>
                                <th style="text-align: center;">Tổng Cước Sau VAT</th>
                                <th style="text-align: center;">Tổng tiền</th>
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                style="z-index: 9999">
                <div class="modal-dialog modal-sm  modal-confirm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box" id="color-success"><i class="fa fa-times"></i></div>

                        </div>
                        <h5 class="modal-confirm" id="message"></h5>
                        <div class="modal-footer">
                            <button class="btn btn-err btn-danger btn-block" data-dismiss="modal"
                                id="exitForm">Thoát</button>
                            <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                                id="exitSuccess" style="display:none">Thoát</button>
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
                    <h3>QUY TRÌNH GỬI HÀNG</h3>
                </div>
            </div>
            <div class="ed_mostrecomeded_course_slider" style="text-align:center">
                <div>
                    <img class="img-mobile-index" src="../assets/images/send_order.png" alt="item1" class="img-responsive">
                </div>
                {{-- <div style="margin-top:10px">
                    <a href="{{ route('service.procedure') }}" class="btn ed_btn ed_orange">Xem thêm</a>
                </div> --}}

            </div>


        </div>
    </div>
</div>
<!--chart section start -->
<!-- <div class="ed_transprentbg ed_toppadder100">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="ed_counter_wrapper">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="ed_chart_ratio" style="height: 250px;">
       <i class="fa fa-plane" aria-hidden="true"></i>
       <h4>Vận chuyển đường bay</h4>
       <p>Nhanh chóng, tiện lợi. Saiko có sản lượng hàng hóa về VN đứng đầu tại Nhật Bản.</p>
      </div>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="ed_chart_ratio" style="height: 250px;">
       <i class="fa fa-ship" aria-hidden="true"></i>
       <h4>Vận chuyển đường biển</h4>Chi phí thấp, tải trọng lớn, lịch cont đếu đặn, chủng loại hàng hóa đa dạng.</p>
      </div>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="ed_chart_ratio" style="height: 250px;">
       <i class="fa fa-bus" aria-hidden="true"></i>
       <h4>Freeship nội thành HN-HCM</h4>
       <p>Miễn phí ship nội thành Hà Nội và TP.HCM (với kiện hàng có khối lượng trên 100kg).</p>
      </div>
     </div>


    </div>
   </div>
        </div>
 </div>
</div> -->
<!-- chart Section end -->
<!-- Services start -->
<div class="ed_graysection ed_toppadder90 ed_bottompadder60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>TẠI SAO NÊN LỰA CHỌN DỊCH VỤ CỦA SAIKO EXPRESS ?</h3>
                </div>
            </div>
            <div class="ed_mostrecomeded_course_slider">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/checked.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">KIỂM HÀNG CẨN THẬN</a></h4>
                            <p>Mỗi kiện hàng đến Saiko Express sẽ được kiểm tra đầy đủ và đóng lại nguyên kiện. Đảm bảo
                                chính xác về số lượng, cân nặng và kích thước thùng hàng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/packaged.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">ĐÓNG GÓI CHUYÊN NGHIỆP</a></h4>
                            <p>Hỗ trợ khách hàng đóng gói lại hàng hóa chưa đủ tiêu chuẩn vận chuyển. Chi phí đóng gói
                                cụ thể Saiko sẽ thông báo tùy theo tình trạng hàng hóa được gửi đến kho.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/insurance.jpg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">BẢO HIỂM HÀNG HÓA</a></h4>
                            <p>Saiko sẵn sàng cung cấp dịch vụ bảo hiểm hàng hóa trong trường hợp mất mát, thất lạc để
                                giảm thiểu tối đa rủi ro trong quá trình vận chuyển.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/payment.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">HÌNH THỨC THANH TOÁN</a></h4>
                            <p>Đa dạng hình thức thanh toán tại Nhật hoặc bên Việt Nam, giúp khách hàng có nhiều sự lựa
                                chọn hơn, thuận tiện hơn, phục vụ lợi ích tối đa của khách hàng.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-custom">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/warehouse.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">KHO BÃI HIỆN ĐẠI</a></h4>
                            <p>Đầu tư kho bãi chuyên nghiệp. Mỗi kiện hàng đều được lưu trữ và sắp xếp một cách khoa học
                                và logic. Dễ dàng kiểm tra và đối chiếu hàng hóa.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_mostrecomeded_course">
                        <div class="ed_item_img">
                            <img src="../assets/images/shipping.jpeg" alt="item1" class="img-responsive">
                        </div>
                        <div class="ed_item_description ed_most_recomended_data">
                            <h4><a href="course_single.html">GIAO HÀNG TẬN NƠI</a></h4>
                            <p>Với mạng lưới liên kết cùng các dịch vụ vận chuyển nội địa Việt Nam, chúng tôi có thể
                                chuyển hàng đến địa chỉ người nhận ở tất cả 64 tỉnh thành.</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ed_toppadder30">
     <a href="services.html" class="btn ed_btn ed_orange">Xem thêm</a>
    </div> -->
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!-- Services end -->
<!--Timer Section three start -->
{{-- <div class="ed_timer_section ed_toppadder90 ed_bottompadder60">
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
</div> --}}
<!--Timer Section three end -->
<!--Our expertise section one start -->
<div class="ed_transprentbg ed_toppadder90 ed_bottompadder90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="ed_video_section_discription">
                    <h4 style="text-align: center;"><a class="title-us" href="javascript:;">VỀ CHÚNG TÔI</a></h4>
                    <p style="margin-top: 30px;">
                        Xuất phát từ xu hướng ngày càng phát triển việc vận chuyển hàng hóa giao thương giữa Nhật bản và
                        Việt Nam, cùng với sự gia tăng nhu cầu của rất đông người Việt xa xứ tại Nhật Bản như gửi quà
                        tặng về tận nhà cho gia đình, người thân tại Việt Nam hay nhu cầu vận chuyển hàng hóa của các
                        chủ shop kinh doanh hàng Nhật, .... chúng tôi đã thành lập nên Saiko Express. Với sự đầu tư
                        nghiêm túc về công nghệ, quy trình vận chuyển, cùng đội ngũ nhân viên thân thiện, chuyên nghiệp,
                        Saiko Express hướng đến trở thành dịch vụ vận chuyển Nhật Việt tốt nhất với 3 tiêu chí: Đơn giản
                        - Tận tâm - Uy tín.</p>
                    <span><a href="{{ route('about.details') }}" class="btn ed_btn ed_orange">Xem thêm</a></span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="ed_video_section">
                    <div class="embed-responsive embed-responsive-16by9">
                        <!-- <div class="ed_video">
       <img src="http://kamleshyadav.com/html/transport/transport/images/content/v_bg.jpg" style="cursor:pointer"  alt="1" />
       <div class="ed_img_overlay">
        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
       </div>
      </div> -->
                        <video controls>
                            <source src="../assets/saiko.mp4" type="video/mp4">

                            Your browser does not support the video tag.
                        </video>
                        <!-- <video >
  <source class="embed-responsive-item" src="assets/saiko.mp4" type="video/mp4">
</video> -->
                        <!-- <iframe class="embed-responsive-item" src="assets/saiko.mp4" allowfullscreen></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div>
<!--Our expertise section one end -->
<!--skill section start -->
{{-- <div class="ed_graysection ed_toppadder90 ed_bottompadder60">
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
                    <!-- <div class="box-header">
          <div class="box-icon"><i class="fa fa-child"></i></div>
          <h4>trung thực</h4>
         <div>
         <div class="box-content">
         Khách hàng hoàn toàn yên tâm trong quá trình kiểm hàng và chính xác cân nặng hàng hóa.
                                    </div> -->

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
</div> --}}
<!--skill section end -->
<!-- pricing table section start -->
<div class="ed_pricing_section ed_toppadder90 ed_bottompadder60">
    <div class="ed_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_bottompadder50">
                    <h3>Bảng giá đường bay</h3>
                </div>
            </div>
            <div class="ed_pricing_table_wrapper">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG Eco</h2>
                            <div class="ed_table_price">
                                <p><sup></sup>190.000đ<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nhận hàng từ 1 - 100kg/ chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Hỗ trợ 24/7</li>
                            <li>Giao hàng qua VNPOST</li>
                            <li>thanh toán trước</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG premium</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar"><sup></sup>185.000đ<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nhận hàng từ 100 - 500kg/ chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Hỗ trợ 24/7</li>
                            <li>Miễn phí giao hàng nội thành Hà Nội</li>
                            <li>Thanh toán trước</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG Business</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar"><sup></sup><b style="font-size:30px">Thương Lượng</b></p>
                            </div>
                        </div>
                        <ul>
                            <li>nhận hàng từ 500kg/ chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Có chuyên viên CSKH riêng</li>
                            <li>miễn phí giao hàng nội thành Hà Nội</li>
                            <li>thanh toán thương lượng</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
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
                    <h3>Bảng giá đường biển</h3>
                </div>
            </div>
            <div class="ed_pricing_table_wrapper">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG Eco</h2>
                            <div class="ed_table_price">
                                <p style="font-size: 30px;"><sup></sup>65.000đ<sub> /kg</sub></p>
                            </div>
                        </div>
                        <ul>
                            <li>Nhận hàng dưới 150kg/ chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Hỗ trợ 24/7</li>
                            <li>thanh toán trước</li>
                        </ul>

                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG premium</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar" style="font-size: 30px;"><sup></sup>60.000đ<sub> /kg</sub>
                                </p>
                            </div>
                        </div>
                        <ul>
                            <li>Nhận hàng từ 150 - 300kg/ chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Hỗ trợ 24/7</li>
                            <li>Thanh toán trước</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="ed_pricing_table">
                        <div class="ed_pricing_heading">
                            <h2>HẠNG Business</h2>
                            <div class="ed_table_price">
                                <p class="ed_price_dollar" style="font-size: 30px;"><sup></sup>Thương lượng</p>
                            </div>
                        </div>
                        <ul>
                            <li>nhận hàng từ 300kg/chuyến</li>
                            <li>Bảo hiểm 3% giá trị hàng</li>
                            <li>Có chuyên viên CSKH riêng</li>
                            <li>Thanh toán thương lượng</li>
                        </ul>
                        <div class="ed_pricing_tabel_footer">
                            <a href="{{ route('rq_tk.quote') }}" class="btn ed_btn ed_green">gửi hàng ngay</a>
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
                    <h3>PHẢN HỒI CỦA KHÁCH HÀNG</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_latest_news_slider">
                    <div id="owl-demo2" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="../assets/images/bg/sinh.jpg" alt="1" title="1" />
                                <h4>Jean Nguyễn</h4>
                                <span>Sinh viên</span>
                                <p>Rất ấn tượng với cách đóng hàng của Saiko, kỹ và đẹp mắt. Giá cả cũng rất hợp lý so
                                    với các dịch vụ khác mình đã sử dụng. Sẽ giới thiệu Saiko Express với bạn bè của
                                    mình.</p>
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
                                <span>Chủ Shop hàng Nhật tại Hà Nội</span>
                                <p>Qua tất cả các dịch vụ mình sử dụng, Saiko Express vẫn là đơn vị mình hài lòng nhất
                                    về thời gian vận chuyển, tư vấn nhiệt tình và đặc biệt, giá cả cực kỳ cạnh tranh.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="assets/images/bg/boss1.jpg" alt="1" title="1" />
                                <h4>Mr.Sakaki</h4>
                                <span>Chủ nhà hàng Nhật</span>
                                <p>Là chủ nhà hàng nhật, tôi luôn cần một công ty vận chuyển những nguyên liệu thiết yếu
                                    cho nhà hàng của mình. Saiko đã thực sự là đã giải quyết nỗi lo lớn nhất của tôi.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ed_item_description">
                                <img src="assets/images/bg/boss2.jpg" alt="1" title="1" />
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
<!--Testimonial end -->
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
                            <h4>GỬI MAIL NGAY ĐỂ ĐƯỢC TƯ VẤN</h4>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
                        <div class="row">
                            <div class="ed_newsletter_section_form">

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <input class="form-control" type="text" placeholder="Nhập email" id="email" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button class="btn ed_btn ed_green" onclick="sendMail()">Gửi</button>
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
    $(document).ready(function(){
        $(document).ajaxStart(function() {
            $("#loader").show();
        });
        $(document).ajaxStop(function() {
            $("#loader").hide();
        });
    })
    $('#tracking_form_index').submit(function() {
        event.preventDefault();
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
        var tracking = $("#utrack").val();
        if(tracking.length<=5){
            alert('Tracking chưa đúng')
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
                tracking: tracking
            },
            success: function(res) {
                $("#body-table-index-vnpost").empty()
                $("#table-index-vnpost").hide()
                $("#alert").hide()
                if (res == 404) {
                    $("#table-index").hide();
                    $("#body-table-index").empty()
                    $("#time_line_index").empty()
                    $("#statusData").empty();
                    $(".table").hide();
                    $("#statusData").css('display', 'block');
                    $("#statusData").append('<h4>' +
                        'Không tìm thấy mã tracking' + '</h4>')
                } else {
                    if (res.data[0].boxes.length == 0 & res.data[0].orders.length == 0) {
                        $(".table").hide();
                        // $("#table-index").show();
                        $("#body-table-index").empty()
                        $("#time_line_index").empty()
                        $("#statusData").empty();
                        $("#statusData").css('display', 'block');
                        $("#statusData").append('<h4>' +
                            'Tracking chưa đăng kí đơn hàng' + '</h4>')
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
                                '<h4>' + 'Không tìm thấy tracking' + '</h4>'
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
                                if (value.orders.length != 0) {
                                    var sort_order = (value.orders).sort(function(x, y) {
                                            return new Date(x.shipment_infor_id) - new Date(y.shipment_infor_id)
                                        })
                                    if (sort_order[value.orders.length - 1].shipment_infor.sender_name == null) {
                                        if( sort_order[value.orders.length - 1].note instanceof Object){
                                            var parse_note = JSON.parse(sort_order[value.orders.length - 1].note);
                                            if(parse_note.send_name == undefined){
                                                name_send=""
                                            }else{
                                                name_send = parse_note.send_name;
                                            }
                                        }else{
                                            name_send=""
                                        }  
                                    } else {
                                        name_send = sort_order[value.orders.length - 1].shipment_infor.sender_name;
                                    }
                                    tel_rev = sort_order[value.orders.length - 1].shipment_infor.tel;
                                    name_rev = sort_order[value.orders.length - 1].shipment_infor.consignee;
                                    add_rev = sort_order[value.orders.length - 1].shipment_infor.full_address;
                                    created_at = sort_order[value.orders.length - 1].created_at;
                                    method_ship = sort_order[value.orders.length - 1].shipment_method_id;
                                    if(sort_order[value.orders.length - 1].pay_money != undefined){
                                        pay_money = sort_order[value.orders.length - 1].total_fee;
                                    }
                                    insurance_result = sort_order[value.orders.length - 1].insurance_declaration
                                    special_result = sort_order[value.orders.length - 1].special_declaration
                                    $("#declaration_price").show()
                                    $("#insurance_result").text(formatNumber(insurance_result))
                                    $("#special_result").text(formatNumber(special_result))
                                    $("#insurance_result_fee").text(formatNumber(sort_order[value.orders.length - 1].insurance_result_fee))
                                    $("#special_result_fee").text(formatNumber(sort_order[value.orders.length - 1].special_result_fee))
                                    if (value.boxes.length ){
                                        $("#table_price_shipping").show()
                                        $("#table_body_price_shipping").empty()
                                        $("#table_body_price_shipping").append(
                                            '<tr>'+
                                                '<td>'+sort_order[value.orders.length - 1].pivot.tracking_id+'</td>'+
                                                '<td>'+sort_order[value.orders.length - 1].total_weight.toFixed(3)+'</td>'+
                                                '<td>'+sort_order[value.orders.length - 1].fee_ship+'</td>'+
                                                '<td>'+method_ship+'</td>'+
                                                '<td>'+formatNumber(sort_order[value.orders.length - 1].total_fee)+' VNĐ</td>'+
                                            +'</tr>'
                                        )
                                    }
                                }
                                if (tel_rev == '' |name_rev == '' | add_rev == '') {
                                    $('#message').html(
                                        'Khách chưa đăng kí đầy đủ thông tin tracking'
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
                                        '<a>' + 'Chưa về kho' +
                                        '</a>' +
                                        '<p>' + created_at +
                                        '</p>' +
                                        '</li>'
                                    )
                                    if(value.logs.length){
                                        $.each(value.logs,function(logs_index,logs_value){
                                            let keyObjectLogMerge = Object.keys(logs_value.content)
                                            // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                            var statusLogMerge;
                                            if(keyObjectLogMerge=="transaction"){
                                                statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                                $("#time_line_index").append(
                                                    '<li>' +
                                                    '<a>' + statusLogMerge + '</a>' +
                                                    '<p>' + logs_value.created_at + '</p>' +
                                                    '</li>'
                                                )
                                            }
                                        })  
                                    }
                                    $("#body-table-index")
                                        .append(
                                            `<tr>` +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' +
                                            '</td>' +
                                            '<td>' +
                                            '</td>' +
                                            '<td>'+
                                            '</td>'+
                                            '<td>' + name_send +
                                            '</td>' +
                                            '<td>' + name_rev +
                                            '</td>' +
                                            '<td>' + tel_rev +
                                            '</td>' +
                                            '<td>' + add_rev +
                                            '</td>' +
                                            '<td>' + method_ship +
                                            '</td>' +
                                            '</tr>'
                                        )
                                } else { //lengbox !=0
                                    $("#body-table-index").empty()
                                    $("#time_line_index").empty()
                                    $.each(value.boxes, function(index,value2) {
                                        $("#body-table-index").append(
                                                `<tr id="sku-row-${value2.id}">` +
                                                '<td>' + value2.id +
                                                '</td>' +
                                                '<td>' + value2.weight.toFixed(3) +
                                                '</td>' +
                                                '<td>' + value2.volume_weight_box.toFixed(3) +
                                                '</td>' +
                                                '<td class="text-center">'+value2.duplicate+
                                                '</td>'+
                                                '<td>' +name_send +
                                                '</td>' +
                                                '<td>' +name_rev +
                                                '</td>' +
                                                '<td>' +tel_rev +
                                                '</td>' +
                                                '<td>' + add_rev +
                                                '</td>' +
                                                '<td>' +method_ship +
                                                '</td>' +
                                                '</tr>'
                                            )
                                        if (value.boxes.length == 1) {
                                            // $("#table_item").show()
                                            // $("#load_item").empty()
                                            if(value.orders.length!=0){
                                                $("#alert").show()
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                $("#id_order").text(value.id)
                                                $("#money").text(sort_order[value.orders.length - 1].total_fee+ " VNĐ")
                                            }
                                          
                                            //log
                                            $("#time_line_index").empty()
                                            if (value.boxes[0].logs.length ==0) {
                                                $("#time_line_index").append(
                                                        '<li>' +
                                                        '<a>' +'Đang tới kho' +
                                                        '</a>' +
                                                        '<p>' +created_at +
                                                        '</p>' +
                                                        '</li>'
                                                    )
                                                if(value.logs.length){
                                                    var total_pay = 0;
                                                    $.each(value.logs,function(logs_index,logs_value){
                                                        let keyObjectLogMerge = Object.keys(logs_value.content)
                                                        // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                        var statusLogMerge;
                                                        if(keyObjectLogMerge=="transaction"){
                                                            total_pay += logs_value.content.transaction.amount
                                                            statusLogMerge = "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount) 
                                                            $("#time_line_index").append(
                                                                '<li>' +
                                                                '<a>' + statusLogMerge + '</a>' +
                                                                '<p>' + logs_value.created_at + '</p>' +
                                                                '</li>'
                                                            )
                                                            
                                                        }
                                                    })  
                                                    if(pay_money != undefined){
                                                        if( total_pay >= pay_money ){
                                                            $("#alert").hide()
                                                            $("#paid").show()
                                                        }
                                                    }
                                                }
                                            } else {
                                                var size = "( Dài : "+value.boxes[0].length+"cm"+",Rộng: "+value.boxes[0].width+"cm"+",Cao: "+value.boxes[0].height+"cm )"
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                if(value.orders.length!=0){
                                                    $("#id_order").text(value.id)
                                                    $("#money").text(formatNumber(sort_order[value.orders.length - 1].total_fee)+ " VNĐ")
                                                }
                                                $.each(value.boxes[0].logs,function(index,value) {
                                                        // let a =JSON.parse(value.content );
                                                        let keyObject =Object.keys(value.content)
                                                        let valueObject = Object.values(value.content);
                                                        var status;
                                                        if (keyObject =="id") {
                                                            status="Đã nhập kho Nhật"
                                                        }
                                                        if (keyObject =="in_pallet") {
                                                            status ="Đã kiểm hàng" + size
                                                        }
                                                        if (keyObject =="set_owner_id,set_owner_type") {
                                                            status="Lên đơn hàng"
                                                        }
                                                        if (keyObject == "set_user_id") {
                                                            status = "Lên đơn hàng"
                                                        }
                                                        if (keyObject =="in_container") {
                                                            var parts = value.created_at.split('-')
                                                            var year = parts[2].split(' ')
                                                            var getDate = new Date(year[0],parts[1]-1,parts[0])
                                                            var now = new Date()
                                                            var date_arv = getDate-now;
                                                            var add_date;
                                                            var check_method = method_ship.charAt(0).toUpperCase() + method_ship.slice(1);
                                                            if(check_method =="Air"){
                                                                add_date=6;
                                                            }else{
                                                                add_date = 30;
                                                            }
                                                            var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                                            if(expected_date > 0) {
                                                                status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                                            }else{
                                                                status = "Xuất kho Nhật"
                                                            }
                                                            // status ="Xuất kho Nhật"
                                                            
                                                        }
                                                        if (keyObject == "shipping_code" && value.type_id == "created") {
                                                            status = "Mã giao hàng: " + value.content.shipping_code
                                                        }
                                                        if (keyObject == "shipping_code" && value.type_id == "updated") {
                                                            status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                                                        }
                                                        if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                                            status = "Huỷ mã giao hàng: " + value.content.shipping_code
                                                        }
                                                        if (keyObject =="out_container") {
                                                            status= "Nhập kho Việt Nam"
                                                        }
                                                        if (keyObject =="outbound_warehouse") {
                                                            status= "Xuất kho Việt Nam"
                                                        }
                                                        if (keyObject =="delivery_status" ) {
                                                            if (valueObject == "shipping") {
                                                                status="Đang giao hàng"
                                                            }
                                                        }
                                                        if (keyObject =="delivery_status") {
                                                            if (valueObject =="cancelled"
                                                            ) {
                                                                status ="Hủy box"
                                                            }
                                                        }
                                                        if (keyObject =="delivery_status") {
                                                            if (valueObject =="received") {
                                                                status= "Đã nhận hàng"
                                                            }
                                                        }
                                                        if (keyObject =="delivery_status") {
                                                            if (valueObject =="refunded") {
                                                                status="Trả lại hàng"
                                                            }
                                                        }
                                                        if (keyObject =="delivery_status" ) {
                                                            if (valueObject =="waiting_shipment") {
                                                                status="Đợi giao hàng"
                                                            }
                                                        }

                                                        $("#time_line_index").append(
                                                                '<li>' +
                                                                '<a>' +status +
                                                                '</a>' +'<p>' +value.created_at +
                                                                '</p>' +
                                                                '</li>'
                                                            )
                                                })
                                                if(value.logs.length){
                                                    var total_pay = 0;
                                                    $.each(value.logs,function(logs_index,logs_value){
                                                        let keyObjectLogMerge = Object.keys(logs_value.content)
                                                        // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                        var statusLogMerge;
                                                        if(keyObjectLogMerge=="transaction"){
                                                            total_pay += logs_value.content.transaction.amount
                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount) 
                                                            $("#time_line_index").append(
                                                                '<li>' +
                                                                '<a>' + statusLogMerge + '</a>' +
                                                                '<p>' + logs_value.created_at + '</p>' +
                                                                '</li>'
                                                            )
                                                        }
                                                    })  
                                                    if(pay_money != undefined){
                                                        if( total_pay >= pay_money ){
                                                            $("#alert").hide()
                                                            $("#paid").show()
                                                        }
                                                    }
                                                }
                                            }
                                            // if(value.boxes[0]['vnpost']!=undefined){
                                            //     $("#body-table-index-vnpost").empty()
                                            //     $("#body-table-index-vnpost").append(
                                            //         '<tr>' +
                                            //         '<td>' + value.boxes[0]['vnpost'].MaDichVu +
                                            //         '</td>' +
                                            //         '<td>' + value.boxes[0]['vnpost'].PhuongThucVC +
                                            //         '</td>' +
                                            //         '<td>' + value.boxes[0]['vnpost'].CuocCOD +
                                            //         '</td>' +
                                            //         '<td>' +value.boxes[0]['vnpost'].TongCuocSauVAT +
                                            //         '</td>' +
                                            //         '<td>' +value.boxes[0]['vnpost'].SoTienCodThuNoiNguoiNhan +
                                            //         '</tr>'
                                            //     )
                                            //     $("#table-index-vnpost").show()
                                            // }

                                        } else {
                                            
                                            if(value.orders.length!=0){
                                                $("#alert").show()
                                                $("#id_order").empty()
                                                $("#money").empty()
                                                $("#id_order").text(value.id)
                                                $("#money").text(formatNumber(sort_order[value.orders.length - 1].total_fee)+ " VNĐ")
                                                if(value.logs.length){
                                                    var total_pay = 0;
                                                    $.each(value.logs,function(logs_index,logs_value){
                                                        let keyObjectLogMerge = Object.keys(logs_value.content)
                                                        // let valueObjectkeyLogMerge = Object.values(logs_value.content);
                                                        var statusLogMerge;
                                                        if(keyObjectLogMerge=="transaction"){
                                                            total_pay += logs_value.content.transaction.amount
                                                            statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount) 
                                                            $("#time_line").append(
                                                                '<li>' +
                                                                '<a>' + statusLogMerge + '</a>' +
                                                                '<p>' + logs_value.created_at + '</p>' +
                                                                '</li>'
                                                            )
                                                            
                                                        }
                                                    }) 
                                                    if(pay_money != undefined){
                                                        if( total_pay >= pay_money ){
                                                            $("#alert").hide()
                                                            $("#paid").show()
                                                        }
                                                    } 
                                                }
                                            }
                                            $(`#sku-row-${value2.id}`).hover(function(){
                                                $(this).addClass("tr-color addHover");
                                            },function(){
                                                $(this).removeClass("tr-color addHover");
                                            });
                                            $(`#sku-row-${value2.id}`).on('click',function() {
                                                    var vnpost=0;
                                                    if(value2.vnpost!=undefined){
                                                        vnpost = value2.vnpost;
                                                    }else{
                                                        vnpost = 0;
                                                    }
                                                        check(value2.id,vnpost,created_at,value2.use_weight,value2.fee_ship,method_ship,value2.total_money,value.logs)
                                                    })
                                        }
                                    })
                                }
                                
                            })
                        }
                    }
                }
            },
            error: function(res) {
                console.log(res)
            }
        })
    })
            //show log by id
            // row, created_at,vnpost,list_items
        function check(id_box,vnpost,created_at,weight,fee,method,money,logs_merge) {
            var id_box = id_box;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"{{route('rq_tk.getInforBox')}}",
                data:{
                    id_box:id_box
                },success:function(res){
                  
                    $("#time_line_index").empty()
                    if (res.logs.length == 0) {
                        $("#time_line_index").append(
                            '<li>' +
                            '<a>' + 'Đang tới kho' + '</a>' +
                            '<p>' + created_at + '</p>' +
                            '</li>'
                        )
                    } else {
                        var size = "( Dài : "+res.length+"cm"+",Rộng: "+res.width+"cm"+",Cao: "+res.height+"cm )"
                        $.each(res.logs, function(index, value) {
                            // let a = JSON.parse(value.content);
                            let keyObject = Object.keys(value.content)
                            let valueObject = Object.values(value.content);
                            var status;
                            if (keyObject == "id") {
                                status = "Đã nhập kho Nhật"
                            }
                            if (keyObject == "in_pallet") {
                                status = "Đã kiểm hàng" + size
                            }
                            if (keyObject == "set_owner_id,set_owner_type") {
                                status = "Lên đơn hàng"
                            }
                            if (keyObject == "set_user_id") {
                                status = "Lên đơn hàng"
                            }
                            if (keyObject == "in_container") {
                                var parts = value.created_at.split('-')
                                var year = parts[2].split(' ')
                                var getDate = new Date(year[0],parts[1]-1,parts[0])
                                var now = new Date()
                                var date_arv = getDate-now;
                                var check_method = method.charAt(0).toUpperCase() + method.slice(1);
                                if(check_method =="Air"){
                                    add_date=6;
                                }else{
                                    add_date = 30;
                                }
                                var expected_date =  parseInt(date_arv/(1000 * 3600 * 24))+ add_date
                                if(expected_date > 0) {
                                    status = "Xuất kho Nhật" +" ( Dự kiến đến kho VN "+ expected_date +" ngày nữa )"
                                }else{
                                    status = "Xuất kho Nhật"
                                }
                                // status = "Xuất kho Nhật"
                            }
                            if (keyObject == "shipping_code" && value.type_id == "created") {
                                status = "Mã giao hàng: " + value.content.shipping_code
                            }
                            if (keyObject == "shipping_code" && value.type_id == "updated") {
                                status = "Cập nhật mã giao hàng: " + value.content.shipping_code
                            }
                            if (keyObject == "shipping_code" && value.type_id == "deleted") {
                                status = "Huỷ mã giao hàng: " + value.content.shipping_code
                            }
                            if (keyObject == "out_container") {
                                status = "Nhập kho Việt Nam"
                            }
                            if (keyObject =="outbound_warehouse") {
                                status= "Xuất kho Việt Nam"
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "shipping") {
                                    status = "Đang giao hàng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "cancelled") {
                                    status = "Hủy box"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "received") {
                                    status = "Đã nhận hàng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "refunded") {
                                    status = "Trả lại hàng"
                                }
                            }
                            if (keyObject == "delivery_status") {
                                if (valueObject == "waiting_shipment") {
                                    status = "Đợi giao hàng"
                                }
                            }
                            $("#time_line_index").append(
                                '<li>' +
                                '<a>' + status + '</a>' +
                                '<p>' + value.created_at + '</p>' +
                                '</li>'
                            )
                        })
                    }
                    if(logs_merge.length){
                        $.each(logs_merge,function(logs_index,logs_value){
                            let keyObjectLogMerge = Object.keys(logs_value.content)
                            var statusLogMerge;
                            var created_at_log;
                            if(keyObjectLogMerge=="transaction"){
                                statusLogMerge= "Đã thanh toán " + formatNumber(logs_value.content.transaction.amount)
                                $("#time_line_index").append(
                                    '<li>' +
                                    '<a>' + statusLogMerge + '</a>' +
                                    '<p>' + logs_value.created_at + '</p>' +
                                    '</li>'
                                )
                            }
                        })  
                    }
                    // if(vnpost){
                    //     $("#body-table-index-vnpost").empty()
                    //     $("#body-table-index-vnpost").append(
                    //         '<tr>' +
                    //         '<td>' + vnpost.MaDichVu +
                    //         '</td>' +
                    //         '<td>' + vnpost.PhuongThucVC +
                    //         '</td>' +
                    //         '<td>' + vnpost.CuocCOD +
                    //         '</td>' +
                    //         '<td>' + vnpost.TongCuocSauVAT +
                    //         '</td>' +
                    //         '<td>' + vnpost.SoTienCodThuNoiNguoiNhan +
                    //         '</tr>'
                    //     )
                    //     $("#table-index-vnpost").show()
                    // }
                }
            })
            
        }

    function toggleLoading() {
        $('.tmn-custom-mask').toggleClass('d-none');
    }
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
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
        const slider = document.getElementById("slider"); // основная обертка
        const sliderContent = document.querySelector(
            ".slider-content"); // обертка для контейнера слайдов и контролов
        const sliderWrapper = document.querySelector(".slider-content-wrapper"); // контейнер для слайдов
        const elements = document.querySelectorAll(".slider-content__item"); // обертка для слайда
        const sliderContentControls = createHTMLElement("div",
            "slider-content__controls"); // блок контролов внутри sliderContent
        let dotsWrapper = null; // Обертка dots
        let prevButton = null; // Кнопки
        let nextButton = null;
        let autoButton = null;
        let leftArrow = null; // Стрелки
        let rightArrow = null;
        let intervalId = null; //идентификатор setInterval

        // data
        const itemsInfo = {
            offset: 0, // смещение контейнера со слайдами относительно начальной точки (первый слайд)
            position: {
                current: 0, // номер текущего слайда
                min: 0, // первый слайд
                max: elements.length - 1 // последний слайд
            },
            intervalSpeed: 5000, // Скорость смены слайдов в авторежиме

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

        // Инициализация слайдера
        function init(props) {
            // let {buttonsEnabled, dotsEnabled} = controlsInfo;
            let {
                intervalSpeed,
                position,
                offset
            } = itemsInfo;

            // Проверка наличия элементов разметки
            if (slider && sliderContent && sliderWrapper && elements) {
                // Проверка входных параметров
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

        // Обновить свойства контролов
        function _updateControlsInfo() {
            const {
                current,
                min,
                max
            } = itemsInfo.position;
            controlsInfo.prevButtonDisabled = current > min ? false : true;
            controlsInfo.nextButtonDisabled = current < max ? false : true;
        }

        // Создание элементов разметки
        function _createControls(dots = false, buttons = false) {

            //Обертка для контролов
            sliderContent.append(sliderContentControls);

            // Контролы
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

        // Задать класс для контролов (buttons, arrows)
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

        // Обновить значения слайдера
        function updateItemsInfo(value) {
            itemsInfo.update(value);
            _slideItem(true);
        }

        // Отобразить элементы
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

            // Отображаем/скрываем контроллы
            setClass(controlsArray);

            // Передвигаем слайдер
            sliderWrapper.style.transform = `translateX(${itemsInfo.offset*100}%)`;

            // Задаем активный элемент для точек (dot)
            if (controlsInfo.dotsEnabled) {
                if (document.querySelector(".dot--active")) {
                    document.querySelector(".dot--active").classList.remove("dot--active");
                }
                dotsWrapper.children[itemsInfo.position.current].classList.add("dot--active");
            }
        }

        // Переместить слайд
        function _slideItem(autoMode = false) {
            if (autoMode && intervalId) {
                clearInterval(intervalId);
            }
            _updateControlsInfo();
            _render();
        }

        // Создать HTML разметку для элемента
        function createHTMLElement(tagName = "div", className, innerHTML) {
            const element = document.createElement(tagName);
            className ? element.className = className : null;
            innerHTML ? element.innerHTML = innerHTML : null;
            return element;
        }

        // Доступные методы
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
    function clearAll(){

        }
</script>
</body>

</html>

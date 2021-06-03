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

<section class="faqpagesec secpadd layout-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="servdtlaccord margbtm40">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading active-panel">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseOne">
                                         Tôi muốn gửi hàng từ Nhật Bản đi Việt Nam, tôi cần làm những gì?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>
                                        Trước hết, quý khách vui lòng liên hệ tới chúng tôi qua Facebook, Viber, Zalo hay
                                        số
                                        điện thoại để cho chúng tôi biết danh mục gửi hàng của mình. Chúng tôi sẽ
                                        thông
                                        báo ngay cho quý khách những mặt hàng nào có thể chuyển về được, những mặt
                                        hàng
                                        nào bị hạn chế. Tiếp đó, quý khách cần truy cập vào trang website của công
                                        ty,
                                        đăng ký thông tin chuyển hàng và gửi hàng đến công ty chúng tôi (thông qua
                                        combini hay bưu điện) tới địa chỉ sau:
                                    </p>
                                    <p>
                                        <b>5101-1 Kaminokawa-machi, Kawachi-gun, Tochigi-ken, 329-0611, Japan</b>
                                        <br>
                                        <span style="font-size: 20px">
                                            <b>
                                                Kanji: ‪329 - 0611栃木県河内郡上三川町大字上三川5101-1
                                            </b>
                                        </span>
                                    </p>
                                    <p>

                                        <span style="color: red">Quý khách vui lòng giữ lại mã gửi hàng (trên hoá đơn
                                            gửi hàng) và điền thông tin
                                            khách hàng để tiện theo dõi thông tin đơn hàng.</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo">
                                        Chi phí gửi sẽ được tính toán ra sao ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                        Sau khi nhận được hàng của quý khách, chúng tôi sẽ kiểm tra và cân lại hàng
                                        hoá.
                                        Chi phí gửi sẽ được thông báo cho quý khách qua email, điện thoại và tin
                                        nhắn.
                                        Quý khách vui lòng kiểm tra và thanh toán để hoàn tất việc gửi trả hàng.
                                    </p>
                                    <p>
                                        Công thức tính Chi phí gửi hàng về Việt Nam <span style="color:red;"> = chi phí
                                            vận chuyển về Việt Nam + tiền bảo hiểm (được tính bằng 0.5% trên tổng giá
                                            trị sản phẩm, tỷ giá của công ty Dcom) + chi phí gửi đến kho hàng tại Nhật
                                            Bản </span>
                                        (quý khách vui lòng thanh toán khi gửi tại combini hay bưu điện)
                                    </p>
                                    <p>
                                        Ví dụ : Quý khách gửi 1 thùng hàng nặng 1kg với giá trị 10.000 yên bằng
                                        đường
                                        hàng không. Thì cách tính sẽ như sau : 200.000 vnđ x 1kg + (0.5x10.000yên) =
                                        200.000vnđ + 50yên = 215.000vnđ
                                    </p>
                                    <p><span style="color:red;">
                                            Đối với hàng cồng kềnh, khối lượng theo thể tích được tính theo công thức
                                            dài(cm) x rộng(cm) x cao(cm) / 6000. Nếu khối lượng này lơn hơn khối lượng
                                            cân, cước sẽ tính theo thể tích.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwoz">
                                        Khi hàng gửi về Việt Nam, tôi có phải đóng thêm các loại phí như hải quan
                                        hay thuế không ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwoz" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Tất cả hàng được gửi qua dịch vụ của Saiko Express đã bao gồm các loại phí hải quan
                                    và
                                    thuế, quý khách sẽ không phải đóng thêm các loại phí này khi nhận hàng.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree">
                                        Ngoài chi phí đã thanh toán, còn phát sinh thêm các loại phí khác không?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <span style="color: red">Vì công ty chúng tôi hiện không nhận trả hàng tại kho hàng
                                        Việt Nam, nên khi hàng về chúng tôi sẽ ký gửi hàng với một bên thứ ba để vận
                                        chuyển hàng tới tận nơi cho quý khách</span>,
                                    chi phí chuyển hàng nội địa sẽ áp dụng theo chi phí của công ty vận chuyển quy
                                    định.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse5">
                                        Vì sao phải có chi phí bảo hiểm bắt buộc ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <span style="color:red;">Chi phí quy định bảo hiểm là cách để chúng tôi đảm bảo
                                        quyền lợi của khách hàng khi xảy ra mất mát do vận chuyển hay thất lạc</span>,
                                    dù đó là điều rất khó xảy ra với dịch vụ của chúng tôi. Quý khách sẽ hoàn toàn
                                    yên tâm về <span style="color: red;">mức thanh toán đền bù, vì 100% giá trị hàng hoá
                                        sẽ được chúng tôi thanh toán nếu xảy ra trường hợp trên.</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse6">
                                        Chi phí có thể được thanh toán tại Nhật Bản hay không ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                        Hiện tại, chúng tôi chỉ chấp nhận thanh toán dịch vụ gửi hàng thông qua tài
                                        khoản tại Việt Nam. Thông tin chuyển khoản như sau:
                                    </p>
                                    Ngân hàng VietcomBank<br>
                                    Số tài khoản:
                                    <br>
                                    <p>
                                        Nội dung chuyển khoản: Thanh toan < Mã đơn hàng>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse7">
                                        Các mặt hàng nào không thể gửi qua đường hàng không ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Phụ lục các mặt hàng bị cấm bay :
                                    <ol>
                                        <li>Nước hoa
                                        <li>Thuốc lá
                                        <li>Bình ga du lịch
                                        <li>Xịt muỗi
                                        <li>Xịt tóc, Moose vuốt tóc
                                        <li>Thuốc nhuộm tóc
                                        <li>Các loại chai xịt có chứa khí gas
                                        <li>Nước ga có khí gas bên trong
                                        <li>Bình chữa cháy
                                        <li>Đá khô
                                        <li>Pin điện thoại và các loại xạc pin
                                        <li>Khoan tay mini có pin
                                        <li>Sơn các loại
                                        <li>Các chất tẩy rửa
                                        <li>Các chất có tính ăn mòn, nước lax
                                        <li>Các loại keo công nghiệp
                                        <li>Pháo diêm
                                        <li>Bếp ga du lịch
                                        <li>Bình khò gas
                                        <li>Nhiệt kế thuỷ gân
                                        <li>Các loại Silicon công nghiệp
                                        <li>Loa các loại
                                        <li>Xe tự động
                                        <li><span style="color:red;">Các loại sản phẩm có chất Lô Hội (Aloe)</span>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse8">

                                        Đối với các sản phẩm khi gửi tới kho tại Nhật Bản, nếu hàng đó không thể gửi
                                        thì sẽ như thế nào ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Đối với các mặt hàng thuộc mục lục hàng cấm gửi, nếu được phát hiện ra trong quá
                                    trình kiểm tra, chúng tôi sẽ gửi trả lại hàng hoá cho quý khách. <span
                                        style="color: red"> Chi phí phát sinh sẽ do quý khách thanh toán.</span>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse9">

                                        Các mặt hàng nào không thể gửi qua đường biển?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    So với hàng không, Số lượng mặt hàng bị cấm gửi qua đường biển ít hơn, bao gồm
                                    các loại mặt hàng cấm, các loại thiết bị y tế cũ, các mặt hàng quốc cấm.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse10">

                                        Ưu, nhược điểm của hình thức vận chuyển qua đường biển và đường hàng không ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                        Vận chuyển qua đường biển: có lợi thế đa dạng về chủng loại mặt hàng có thể
                                        gửi,
                                        chi phí rẻ hơn, tuy nhiên lại mất nhiều thời gian di chuyển hơn, trung bình
                                        4
                                        tuần kể từ ngày gửi.
                                    </p>
                                    <p>
                                        Vận chuyển qua đường hàng không: chi phí cao hơn đường biển, danh sách mặt
                                        hàng
                                        bị cấm gửi khắt khe hơn, tuy nhiên, thời gian gửi nhanh chóng, trung bình từ
                                        3
                                        đến 5 ngày kể từ ngày gửi, phù hợp với các đối tượng chuyển hàng lẻ.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse12">

                                        Nếu tôi muốn hoàn trả hàng đã gửi tới kho bãi sẽ được tính ra sao ? </a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Với các trường hợp quý khách thay đổi ý định gửi hàng về Việt Nam, thì chúng tôi
                                    sẽ gửi trả lại hàng cho quý khách từ kho tại Nhật, và <span style="color: red"> chi
                                        phí gửi sẽ do người nhận thanh toán.</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div class="fh-section-title clearfix f25  text-left version-dark paddbtm20">
                    <h2>ĐẶT CÂU HỎI CHO Saiko Express</h2>
                </div>
                <form>
                    <div class="fh-form fh-form-2">
                        <p class="field">
                            <input placeholder="Name*" type="text">

                        </p>
                        <p class="field">
                            <input placeholder="Email*" type="email">

                        </p>
                        <p class="field">
                            <input placeholder="Subject" type="text">

                        </p>
                        <p class="field">
                            <input placeholder="Phone*" type="text">

                        </p>
                        <p class="field single-field">
                            <textarea placeholder="Ask your questions..."></textarea>
                        </p>
                        <p class="field submit">
                            <input value="Submit" class="fh-btn" type="submit">

                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</section>
@include('modules.footer')
@include('modules.nav-mobile')
</body>

</html>

@extends('modules_manager.main_new')
@section('title', 'Tạo đơn hàng')
@section('title-header-content', 'Gởi hàng')
@section('style')
    <style>
        #modal-addressbook {
            background-color: rgba(0, 0, 0, .5);
            display: none;
        }

        .fa-map-marker {
            color: #fca901 !important;
        }

        .fit-content {
            width: fit-content !important;
        }

        .unset-bs-gutter-x {
            --bs-gutter-x: 0px !important;
        }

        #paginate-address-book {
            float: right;
        }

        #fix-flex {
            flex: unset !important;
        }

        .form-check-input {
            margin-top: unset !important;
            margin-left: unset !important;
        }

        .fh-btn {
            background-color: #fca901 !important;
            color: white !important;
        }

        .fix-select {
            color: black !important;
            background-color: white !important;
        }

        .fix-font-size {
            font-size: 14px !important;
        }

        .fix-font-size-icon {
            font-size: 19x !important;
        }

        .fix-bg-btn {
            color: white;
            background-color: #fca901
        }

        .set-max-width-modal {
            width: fit-content !important;
        }

        #list-address {
            font-size: 14px;
        }

        #paginate-address-book li.active a {
            border-radius: 50%;
            background-color: #fca901;
            border: unset;
            color: #484848
        }

        #list-address {
            padding: 0px
        }

        #paginate-address-book li a {
            background-color: white;
            color: #484848;
            border: unset;
        }

        #paginate-address-book {
            font-size: 15px;
        }

        @media (min-width:576px) {
            .modal-dialog {
                max-width: 100% !important;
            }
        }

        @media (min-width:992px) {
            .modal-lg {
                max-width: 100% !important;
            }
        }

        .add-box-shadow {
            box-shadow: 5px 5px 5px 5px silver;
        }

    </style>
@section('content')
    <div class="col-lg-12" id="fix-flex">
        <div class="bg-white p-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-10 ">
                            <h2>Nhập thông tin kiện hàng</h2>
                        </div>

                    </div>
                    <div class="mt-4">
                        <h6>Gọi hotline hoặc nhắn tin trực tiếp trên Fanpage Saiko Express (từ 8h đến 19h hàng ngày) để được
                            CSKH
                            hỗ
                            trợ nhập thông tin kiện hàng dưới đây:</h6>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal" id="modal-addressbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" id="fix-width-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sổ địa chỉ</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <h5>Chọn địa chỉ</h5>
                            </div>

                            <div>
                                <div class="card">
                                    <div class="row col-md-12" id="list-address">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row col-md-12 mt-2">
                            <div class="p-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination custom-paginate" id="paginate-address-book">
                                    </ul>
                                </nav>
                            </div>

                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" id="close-modal-address">Thoát</button> --}}
                            <button type="button" class="btn fh-btn" id="sendInfoTracking">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <form action="{{ route('rq_tk.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-9 mb-4">
                                <label>Nhập mã Tracking<span class="require">*</span></label>
                                <input class="form-control" placeholder="Nhập số tracking" name="tracking" id="utracking"
                                    value="{{ old('tracking') }}" type="text" required>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="button" style="margin-top:14px" class="btn fh-btn " id="showModal-address">Sổ
                                    địa chỉ</button>
                            </div>
                        </div>
                        <div class="row" id="ele-add-choose" style="display:none">
                            <div class="row col-md-12">
                                <div class="row col-md-12 ">
                                    <label for="">Địa chỉ đã chọn</label>
                                </div>

                                <div class="col-md-9 align-items-center">
                                    <button id="btn-show-input" type="button" style="width:40px"
                                        class="fh-btn btn-warning fix-bg-btn">&times;</button>
                                </div>
                                <div class="form-group col-md-9 fix-font-size" id="choosed-address">

                                </div>

                            </div>

                        </div>
                        <div class="row hidden-input">
                            <div class="form-group col-md-4 mb-4">
                                <label>Tên người gửi<span class="require">*</span></label>
                                <input class="form-control" placeholder="Tên Facebook hoặc người làm việc với SAIKO"
                                    value="{{ old('name') }}" name="name" id="uname_send" type="text" required>
                            </div>
                            <div class="form-group col-md-4 mb-4">
                                <label>Số điện thoại người gửi<span class="require">*</span></label>
                                <input class="form-control" placeholder="SĐT để nhận thông báo từ Saiko" id="number_send"
                                    name="phone" value="{{ old('phone') }}" type="number" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tên người nhận<span class="require">*</span></label>
                                <input placeholder="Nhập tên người nhận" class="form-control" id="uname_rev"
                                    value="{{ old('name_arr') }}" name="name_arr" type="text" required>
                            </div>
                        </div>
                        <div class="row hidden-input">

                            <div class="form-group col-md-4">
                                <label>Số điện thoại người nhận<span class="require">*</span></label>
                                <input class="form-control" placeholder="Nhập số điện thoại" id="uphone"
                                    value="{{ old('phone_arr') }}" name="phone_arr" type="number" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hình thức nhận hàng</label>
                                <select class="form-select " id="utypeadd" name="hinhthuc" onchange="onChange()">
                                    <option value="blank" id="first_option">Địa chỉ cụ thể</option>

                                    {{-- <option value="Nhận tại VP Sóc Sơn">Nhận tại VP Sóc Sơn, Hà Nội</option> --}}
                                    {{-- <option value="Nhận tại VP Đào Tấn">Nhận tại VP Đào Tấn, Hà Nội </option> --}}
                                    {{-- <option value="Nhận tại VP Tân Bình HCM" id="trip_sea" style="display: none">Nhận tại VP Tân Bình HCM</option> --}}
                                </select>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label>Tỉnh/Thành Phố<span class="require">*</span></label>
                                <select class="form-select" id="Utinh" name="tinh" onchange="Select_Tinh(this)">
                                    <option value="">Vui lòng chọn</option>

                                    @foreach ($data as $item)

                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="type-ship" class="row">
                            <div class="form-group col-md-4 hidden-input">
                                <label>Quận Huyện<span class="require">*</span></label>
                                <select class="form-select" id="Uhuyen" name="huyen" onchange="Select_Huyen(this)">
                                </select>
                            </div>
                            <div class="form-group col-md-4 hidden-input">
                                <label>Phường Xã<span class="require">*</span></label>
                                <select class="form-select" id="UPhuongXa" name="xa">
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group" id="trip">
                                        <label class="">Hình thức vận chuyển <span class="require">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input ml-0" name="fh_radio" value="Air"
                                                        id="uair" type="radio" checked>
                                                    <label class="form-check-label">Đường bay</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input ml-0" name="fh_radio" value="Sea"
                                                        id="usea" type="radio">
                                                    <label class="form-check-label">Đường biển</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <span class="checkbox_item " style="display:none"><label><input id="ureparking"
                                                name="donggoi" value="Repark" type="checkbox">Đóng gói lại kiện hàng
                                        </label></span>
                                    <span class="checkbox_item" style="display:none"><label><input id="merge_box"
                                                name="merge_box" value="1" type="checkbox">Gộp thùng
                                        </label></span>
                                    <p>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('fail'))
                                            <div class="alert alert-success">
                                                {{ session('fail') }}
                                            </div>
                                        @endif
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="row hidden-input">
                            <div class="form-group col-md-12">
                                <label>Thông tin số nhà tên đường<span class="require">*</span></label>
                                <input class="form-control" placeholder="Nhập số nhà của bạn" value="{{ old('duong') }}"
                                    name="duong" id="UaddNumber" type="text">
                                @error('duong')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row text-center mt-2">
                            <p class="field submit">
                                <button class="btn fh-btn" name="push-tracking" onclick="push_tracking()" type="submit">Nhập
                                    thông tin kiện hàng</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
            <div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-md  modal-confirm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                            </div>
                            <h5 class="modal-confirm text-center text-danger" id="message"></h5>
                            <div class="modal-footer">
                                <table class="table" style="border: none !important" id="table_showCreatedTrackings">
                                </table>
                                {{-- <button class="btn btn-err btn-danger btn-block" data-dismiss="#myModal" aria-label="Close"
                                    id="exitForm">Thoát</button> --}}
                                <button class="btn btn-danger btn-block" onclick="exitSuccess()" id="exitSuccess"
                                    style="display:none">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" style="margin-top:80px !important" tabindex="-1" role="dialog" id="show_result">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-footer">
                            <table class="table" style="border: none !important" id="table_showResultCreatedTrackings">
                            </table>
                            <button class="btn btn-danger btn-block" data-dismiss="modal" onclick="exitSuccess()"
                                id="exitSuccess" style="display:block; width:30% !important;margin:auto;">Thoát</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog" id="modal_qoute">
                <div class="modal-dialog modal-lg set-max-width-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Khai báo đơn hàng</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                {{-- <span aria-hidden="true" id="">&times;</span> --}}
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="background-color: #fca901">
                                <div class="row">
                                    <div class="text-danger">
                                        <label for="">
                                            Địa chỉ nhận hàng:
                                            <span id="address_modal">

                                            </span>
                                        </label>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="text-danger">
                                        <label for="">
                                            Hình thức:
                                            <span id="method_modal">

                                            </span>
                                        </label>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <label class="fix-font-size" for=""> Bạn có muốn đăng ký báo bảo hiểm không? </label>
                                    <input type="checkbox" id="check_BH"><span class="fix-font-size">.Có</span>
                                    <input type="checkbox" id="check_specialty"><span class="fix-font-size">.Không</span>
                                </div>
                            </div>
                            <div class="row" id="enter_insurance" style="display:none">
                                <div>
                                    <p class="text-danger">
                                        Phí bảo hiểm là 3% giá trị kiện hàng
                                    </p>
                                    <p class="text">Lưu ý: Chúng tối không nhận bảo hiểm đối với hàng dễ vỡ, hư hỏng như là
                                        thuỷ
                                        tinh, máy móc chính xác,...</p>
                                    <label class="fix-font-size" for="">Nhập số tiền:</label>
                                    <input class="inpute-insuaran form-control" type="text" pattern="[0-9]"
                                        id="insurance_enter" value="" min="0">
                                </div>
                            </div>
                            <div class="row" id="alert_insurance" style="display:none">
                                <div>
                                    <p class="text-danger">
                                        Nếu không đóng bảo hiểm chúng tôi chỉ đền bù 4 lần phí vận chuyển trong trường hợp
                                        hư
                                        hỏng
                                        và mất mát hàng hoá. Xin cân nhắc nếu kiện hàng của bạn có giá trị cao
                                    </p>
                                </div>
                            </div>
                            <div class="row" id="declaration_price">
                                <div>
                                    <label class="fix-font-size" for=""> Kiện hàng của bạn có chứa những hàng hoá đặc biệt
                                        dưới đây không?</label>
                                    <input type="checkbox" id="check_type_special"><span class="fix-font-size">.Có</span>
                                    <input type="checkbox" id="check_type_special_no"><span
                                        class="fix-font-size">.Không</span>
                                    <p class="text-danger" style="font-weight: 500">Loa / Ampli / Điện thoại di động / Ipad
                                        /
                                        Laptop
                                        / Rượu / Đồng hồ đeo tay / Đồ cổ</p>
                                </div>
                            </div>
                            <div class="row" id="enter_special" style="display:none">
                                <div>
                                    <p class="text-danger">
                                        Phụ phí thông quan khi nhập cảng Việt Nam là 2% giá trị hàng đặc biệt
                                    </p>
                                    <label class="fix-font-size" for="">Nhập số tiền:</label>
                                    <input class="inpute-insuaran form-control" type="text" pattern="[0-9]"
                                        id="special_enter" value="" min="0">
                                </div>
                            </div>
                            <div class="row" id="alert_special" style="display:none">
                                <div>
                                    <p class="text-danger">
                                        Các hàng hóa thuộc danh sách trên nếu không được khai báo sẽ bị phạt cước vận chuyển
                                        tùy
                                        theo số lượng và giá trị món hàng
                                    </p>
                                </div>
                            </div>
                            <p class="field single-field">
                                <label style="margin-top:10px">Ghi chú</label>
                            </p>
                            <p class="field single-field">
                                <textarea id="unote" name="note" style="height: 100px;width:100%"
                                    placeholder="Nhập ghi chú hoặc mô tả chi tiết hàng hoá đặc biệt ...."></textarea>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn fh-btn" style="display:none"
                                id="send_infor_tracking-address-book">Gửi hàng</button>
                            <button type="button" class="btn fh-btn" id="send_infor_tracking">Gửi hàng</button>
                            <button type="button" class="btn fh-btn" style="background-color: silver !important"
                                data-dismiss="modal" id="close_modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#check_BH').click(function() {
            $("#check_specialty").prop('checked', false);
            $('#enter_insurance').show()
            $("#alert_insurance").hide()
            $('#insurance_enter').val('0')
        });
        $('#check_specialty').click(function() {
            $("#check_BH").prop('checked', false);
            $('#declaration_price').show()
            $("#alert_insurance").show()
            $('#enter_insurance').hide()
            $('#insurance_enter').val('0')
        });

        $('#check_type_special').click(function() {
            $("#check_type_special_no").prop('checked', false);
            $('#enter_special').show()
            $("#alert_special").hide()
            $('#special_enter').val('0')
        });

        $('#check_type_special_no').click(function() {
            $("#check_type_special").prop('checked', false);
            $('#enter_special').hide()
            $("#alert_special").show()
            $('#special_enter').val('0')
        });
        $(document).on('click', '.pagination .address', function(event) {
            event.preventDefault();
            var page = $(this).attr('data-page');
            fetch_data(page);
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });
            $('#btn-show-input').click(function() {
                $("#list-address .bg-white .bg-warning").removeClass('bg-warning')
                $('#ele-add-choose').hide()
                $("#choosed-address").empty()
                $('.hidden-input').show()
            })
            $('#close-modal-address').click(function() {
                $('#modal-addressbook').hide()
            })

            //done
            $('#send_infor_tracking-address-book').click(function() {
                var tracking = $('#utracking').val();
                var trip = $('input[name="fh_radio"]:checked', '#trip').val();
                var shipment_id = $("#choosed-address .remove-bg").data('id');
                // var full_address = $('#lb-address' + shipment_id).text()
                var mapObj = {
                    "_": "",
                    " ": " ",
                    "-": "",
                    ",": " ",
                };
                tracking = tracking.replace(/-| |_|,/gi, function(matched) {
                    return mapObj[matched];
                });
                var ShipAir = document.getElementById('uair').checked;
                var ShipSea = document.getElementById('usea').checked;
                var special_price = $("#special_enter").val();
                var insurance_price = $("#insurance_enter").val();
                var check_insurance = parseFloat(insurance_price.replaceAll(",", ""))
                var check_special = parseFloat(special_price.replaceAll(",", ""))
                if (parseFloat(insurance_price) < 0) {
                    swal_action("Số tiền không được nhỏ hơn 0")
                    return
                }
                if ($('#check_specialty').prop('checked') == false && $('#check_BH').prop('checked') ==
                    false) {
                    swal_action("Vui lòng chọn khai báo bảo hiểm")
                    return
                }
                if (ShipAir) {
                    if (check_insurance > 20000000) {
                        swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 20,000,000")
                        return
                    }
                    if (check_special > 999999999999) {
                        swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999")
                        return
                    }
                } else {
                    if (check_insurance > 50000000) {
                        swal_action("Bảo hiểm đơn hàng đường biển không được lớn hơn 50,000,000")
                        return
                    }
                    if (check_special > 999999999999) {
                        swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999")
                        return
                    }
                }
                if ($('#check_type_special').prop('checked') == false && $('#check_type_special_no').prop(
                        'checked') == false) {
                    swal_action("Vui lòng chọn khai báo hàng đặc biệt")
                    return
                }
                $('#modal_qoute').hide()
                const idToken = getToken();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('orders.store') }}",
                    data: {
                        idToken:idToken,
                        order: true,
                        tracking: tracking,
                        insurance: check_insurance,
                        special: check_special,
                        method: trip,
                        shipment_id: shipment_id,
                    },
                    success: function(response) {
                        if (response.code == 401) {
                            swal({
                                title: "Mã xác thực hết hạn, vui lòng tải lại trang",
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location.reload();
                                }
                            });
                        }
                        $("#table_showResultCreatedTrackings").empty()
                        $.each(response, function(index, value) {
                            if(value.code ==401){
                                swal({
                                    title: "Mã xác thực hết hạn, vui lòng tải lại trang",
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.reload();
                                    }
                                });
                            }
                            if (value.code == 201) {
                                swal({
                                    title: "Đã tạo thành công",
                                    type: "success",
                                    icon: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.reload();
                                    }
                                });
                            }
                            if (value.code == 405) {
                                swal({
                                    title: value.message,
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                })
                            }
                            if (value.code == 422) {
                                swal({
                                    title: value.message,
                                    type: "warning",
                                    icon: "warning",
                                    showCancelButton: false,
                                    confirmButtonColor: "#fca901",
                                    confirmButtonText: "Exit",
                                    closeOnConfirm: true
                                })

                            }
                        })
                    }
                });

            })

            $('#sendInfoTracking').click(function() {
                var check_address = $("#list-address .bg-white .bg-warning").data('id');
                if (check_address != undefined) {

                    var html = $("#list-address .bg-white .bg-warning").clone().removeClass("h-100")
                        .removeClass("mt-2").removeClass("p-3").removeClass('bg-warning').addClass(
                            'add-box-shadow').addClass('set-max-width-modal').prop("onclick",null);
                    $("#choosed-address").html(html)
                    $('#ele-add-choose').show()
                    $('.hidden-input').hide()
                }
                $('#modal-addressbook').hide()


            })
            //done
            $('#showModal-address').click(function() {
                var check = $('#list-address .bg-white')
                if (!check.length) {
                    $("#paginate-address-book").pagination({
                        ajax: function(options, refresh, $target) {
                            const idToken = getToken();
                            var page = $(this)[0].current;
                            $.ajax({
                                type: "GET",
                                url: "{{ route('shipment.index') }}",
                                data: {
                                    idToken:idToken,
                                    shipment: true,
                                    page_shipment: page,
                                },
                                success: function(data) {
                                    if (data.code == 401) {
                                        swal({
                                            title: "Mã xác thực hết hạn, vui lòng tải lại trang",
                                            type: "warning",
                                            icon: "warning",
                                            showCancelButton: false,
                                            confirmButtonColor: "#fca901",
                                            confirmButtonText: "Exit",
                                            closeOnConfirm: true
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                window.location.reload();
                                            }
                                        });
                                    } else {
                                        if (data.list_address.data.length) {
                                            $("#list-address").empty()
                                            $.each(data.list_address.data, function(
                                                index,
                                                value) {
                                                $("#list-address").append(
                                                    '<div class="col-md-4 bg-white" >' +
                                                    '<div class="mt-2 h-100 p-3">' +
                                                    '<div class="p-3 h-100 bg-secondary-fix remove-bg" onclick="choose_address(this)" data-id="' +
                                                    value.id + '">' +
                                                    '<div class="row"><h5 class="text-secondary font-weight-bold"">Người nhận</h5></div>' +
                                                    '<div class="row pl-3 unset-bs-gutter-x">' +
                                                    '<div class="col-md-1 fit-content">' +
                                                    '<i class="fa fa-user-circle-o fix-font-size-icon text-info" aria-hidden="true"></i>' +
                                                    '</div>' +
                                                    '<div class="col-md-10 fit-content">' +
                                                    value.consignee +
                                                    '</div>' +
                                                    '</div>' +
                                                    '<div class="row pl-3 unset-bs-gutter-x">' +
                                                    '<div class="col-md-1 fit-content">' +
                                                    '<i class="fa fa-volume-control-phone fix-font-size-icon text-success" aria-hidden="true"></i>' +
                                                    '</div>' +
                                                    '<div class="col-md-10 fit-content">' +
                                                    value.tel +
                                                    '</div>' +
                                                    '</div>' +
                                                    '<div class="row pl-3 unset-bs-gutter-x">' +
                                                    '<div class="col-md-1 fit-content">' +
                                                    '<i class="fa fa-map-marker fix-font-size-icon text-danger" aria-hidden="true"></i>' +
                                                    '</div>' +
                                                    '<div class="col-md-10 full_address fit-content">' +
                                                    value.full_address +
                                                    '</div>' +
                                                    '</div>' +
                                                    '<div class="row"><h5 class="text-secondary font-weight-bold"">Người gửi</h5></div>' +
                                                    '<div class="row pl-3 unset-bs-gutter-x">' +
                                                    '<div class="col-md-1 fit-content">' +
                                                    '<i class="fa fa-user-circle-o fix-font-size-icon text-info" aria-hidden="true"></i>' +
                                                    '</div>' +
                                                    '<div class="col-md-10 fit-content">' +
                                                    value.sender_name +
                                                    '</div>' +
                                                    '</div>' +
                                                    '<div class="row pl-3 unset-bs-gutter-x">' +
                                                    '<div class="col-md-1 fit-content">' +
                                                    '<i class="fa fa-volume-control-phone fix-font-size-icon text-success" aria-hidden="true"></i>' +
                                                    '</div>' +
                                                    '<div class="col-md-10  fit-content">' +
                                                    value.sender_tel +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>')
                                            })
                                            $('#modal-addressbook').css('display',
                                                'block')

                                        } else {
                                            swal_action('Chưa có địa chỉ')
                                        }
                                        refresh({
                                            total: data.list_address.total,
                                            length: data.list_address
                                                .per_page
                                        });

                                    }
                                },
                                error: function(response) {}
                            })
                        }
                    })

                } else {
                    $('#modal-addressbook').css('display', 'block')
                }


            })
            $('#insurance_enter').maskNumber({
                integer: true,
            });
            $('#special_enter').maskNumber({
                integer: true,
            });
            $("#close_modal").click(function() {
                $("#modal_qoute").hide()
            })
            $('#utracking').blur(function() {
                var tracking = $('#utracking').val();
                if (!tracking) {
                    document.getElementById("utracking").style.borderColor = 'red'
                } else {
                    document.getElementById("utracking").style.borderColor = ''
                }
            });

            $('#uname_send').blur(function() {
                var uname_send = $('#uname_send').val();
                if (!uname_send) {
                    document.getElementById("uname_send").style.borderColor = 'red'
                } else {
                    document.getElementById("uname_send").style.borderColor = ''
                }
            });

            $('#uname_rev').blur(function() {
                var uname_rev = $('#uname_rev').val();
                if (!uname_rev) {
                    document.getElementById("uname_rev").style.borderColor = 'red'
                } else {
                    document.getElementById("uname_rev").style.borderColor = ''
                }
            });

            $('#number_send').blur(function() {
                var uname_rev = $('#number_send').val();
                if (!uname_rev) {
                    document.getElementById("number_send").style.borderColor = 'red'
                } else {
                    document.getElementById("number_send").style.borderColor = ''
                }
            })
            $('#UaddNumber').blur(function() {
                var uname_rev = $('#UaddNumber').val();
                if (!uname_rev) {
                    document.getElementById("UaddNumber").style.borderColor = 'red'
                } else {
                    document.getElementById("UaddNumber").style.borderColor = ''
                }
            })
            $('#uadd').blur(function() {
                var uadd = $('#uadd').val();
                if (!uadd) {
                    document.getElementById("uadd").style.borderColor = 'red'
                } else {
                    document.getElementById("uadd").style.borderColor = ''
                }
            });

            $('#uphone').blur(function() {
                var uphone = $('#uphone').val();
                if (!uphone) {
                    document.getElementById("uphone").style.borderColor = 'red'
                } else {
                    document.getElementById("uphone").style.borderColor = ''
                }
            });
            $(document).ajaxStart(function() {
                $("#loader").show();
            });
            $(document).ajaxStop(function() {
                $("#loader").hide();
            });
            //done
            $("#send_infor_tracking").click(function() {
                var check_address = $("#choosed-address .remove-bg").data('id');

                if (check_address == undefined) {
                    const idToken = getToken();
                    var OptionAdd = $('#utypeadd').val();
                    var AddRev = $("#UaddNumber").val();
                    if (OptionAdd.length > 5) {
                        AddRev = OptionAdd;
                    }
                    var str = $("#utracking").val();
                    var mapObj = {
                        "_": "",
                        " ": " ",
                        "-": "",
                        ",": " ",
                    };
                    var Tracking = str.replace(/-| |_|,/gi, function(matched) {
                        return mapObj[matched];
                    });
                    var checkAir = document.getElementById('uair').value;
                    var checkSea = document.getElementById('usea').value;
                    var province = $("#Utinh").val();
                    var district = $("#Uhuyen").val();
                    var ward = $("#UPhuongXa").val();
                    var Phone = $("#uphone").val();
                    var Name_Send = $("#uname_send").val();
                    var Number_Send = $("#number_send").val();
                    var Name_Rev = $("#uname_rev").val();
                    var Type = $("#utype").val();
                    var Reparking = document.getElementById('ureparking').checked;
                    var ShipAir = document.getElementById('uair').checked;
                    var ShipSea = document.getElementById('usea').checked;
                    var merge_box = $("#merge_box:checked").val()
                    // return
                    var Upx = $('#UPhuongXa').val();
                    var Code_Add = $("#Uhuyen option:selected").val() + "," + $("#Utinh option:selected")
                        .val();
                    var UaddNumber = $("#UaddNumber").val();
                    var uphone = $("#uphone").val();
                    var utypeadd = $("#utypeadd").val();
                    var Note = $("#unote").val();
                    var special_price = $("#special_enter").val();
                    var insurance_price = $("#insurance_enter").val();
                    var check_insurance = parseFloat(insurance_price.replaceAll(",", ""))
                    var check_special = parseFloat(special_price.replaceAll(",", ""))
                    if (parseFloat(insurance_price) < 0) {
                        swal_action("Số tiền không được nhỏ hơn 0")
                        return
                    }
                    if ($('#check_specialty').prop('checked') == false && $('#check_BH').prop('checked') ==
                        false) {
                        swal_action("Vui lòng chọn khai báo bảo hiểm")
                        return
                    }
                    if (ShipAir) {
                        if (check_insurance > 20000000) {
                            swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 20,000,000")
                            return
                        }
                        if (check_special > 999999999999) {
                            swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999")
                            return
                        }
                    } else {
                        if (check_insurance > 50000000) {
                            swal_action("Bảo hiểm đơn hàng đường biển không được lớn hơn 50,000,000")
                            return
                        }
                        if (check_special > 999999999999) {
                            swal_action("Bảo hiểm đơn hàng đường bay không được lớn hơn 999,999,999,999")
                            return
                        }
                    }
                    if ($('#check_type_special').prop('checked') == false && $('#check_type_special_no')
                        .prop(
                            'checked') == false) {
                        swal_action("Vui lòng chọn khai báo hàng đặc biệt")
                        return
                    }
                    $("#first_choose").attr("selected", true)
                    $("#modal_qoute").hide()
                    $("#table_showCreatedTrackings").empty()

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route('rq_tk.store') }}",
                        data: {
                            idToken:idToken,
                            special_price: special_price,
                            insurance: insurance_price,
                            utypeadd: utypeadd,
                            TrackingSaiko: Tracking,
                            Phone: Phone,
                            Name_Send: Name_Send,
                            Number_Send: Number_Send,
                            Name_Rev: Name_Rev,
                            Add: AddRev,
                            Type: Type,
                            Note: Note,
                            Reparking: Reparking,
                            ShipAir: ShipAir,
                            ShipSea: ShipSea,
                            // Location: '203.205.41.135',
                            Code_Add: Code_Add,
                            province: province,
                            district: district,
                            ward: ward,
                            checkAir: checkAir,
                            checkSea: checkSea,
                            merge_box: merge_box,
                        },
                        success: function(response) {
                            $("#table_showResultCreatedTrackings").empty()
                            $.each(response, function(index, value) {
                                if(value.code ==401){
                                    swal({
                                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        }
                                    });
                                }
                                if (value.code == 201) {
                                    swal({
                                        title: "Đã tạo thành công",
                                        type: "success",
                                        icon: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        }
                                    });
                                }
                                if (value.code == 405) {
                                    swal({
                                        title: value.message,
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    })
                                }
                                if (value.code == 422) {
                                    swal({
                                        title: value.message,
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    })
                                }
                            })
                        }
                    });
                }
            })


        });

        function choose_address(obj) {
            $(".remove-bg").addClass('bg-secondary-fix')
            $(".remove-bg").removeClass('bg-warning')
            $(obj).addClass('bg-warning')
        }

        function swal_action(string) {
            swal({
                title: string,
                type: "warning",
                icon: "warning",
                showCancelButton: false,
                confirmButtonColor: "#fca901",
                confirmButtonText: "Exit",
                closeOnConfirm: true
            })
        }

        function exitSuccess() {
            location.reload();
        }

        function onChange() {
            var utype = document.getElementById("utypeadd").value;
            if (utype != 'blank') {
                document.getElementById("type-ship").style.display = "none";
            } else {
                document.getElementById("type-ship").style.display = "block";
            }
        }

        function Select_Tinh(obj) {
            var Tinh_ThanhPho = $(obj).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('rq_tk.quanhuyen') }}",
                data: {
                    province: Tinh_ThanhPho,
                },
                success: function(res) {
                    $("#Uhuyen").empty()
                    $("#UPhuongXa").empty()
                    $("#Uhuyen").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#Uhuyen").append(new Option(value.name, value.id))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }

        function Select_Huyen(obj) {
            var Huyen_Xa = $(obj).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('rq_tk.phuongxa') }}",
                data: {
                    district: Huyen_Xa,
                },
                success: function(res) {
                    $("#UPhuongXa").empty()
                    $("#UPhuongXa").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#UPhuongXa").append(new Option(value.name, value.id))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }

        function push_tracking() {
            event.preventDefault();
            var check_address = $("#choosed-address .remove-bg").data('id');
            var trip = $('input[name="fh_radio"]:checked', '#trip').val();
            var tracking = $("#utracking").val();
            if (tracking.length <= 7) {
                swal_action("Nhập thiếu tracking")
                return
            }
            if (check_address == undefined || check_address == "") {
                var OptionAdd = $('#utypeadd').val();
                var AddRev = $("#UaddNumber").val();
                if (OptionAdd.length > 5) {
                    AddRev = OptionAdd;
                }
                var str = $("#utracking").val();
                var mapObj = {
                    "_": "",
                    " ": " ",
                    "-": "",
                    ",": " ",
                };
                var Tracking = str.replace(/-| |_|,/gi, function(matched) {
                    return mapObj[matched];
                });
                var checkAir = document.getElementById('uair').value;
                var checkSea = document.getElementById('usea').value;
                var province = $("#Utinh").val();
                var district = $("#Uhuyen").val();
                var ward = $("#UPhuongXa").val();
                var Phone = $("#uphone").val();
                var Name_Send = $("#uname_send").val();
                var Number_Send = $("#number_send").val();
                var Name_Rev = $("#uname_rev").val();
                var Type = $("#utype").val();
                var Reparking = document.getElementById('ureparking').checked;
                var ShipAir = document.getElementById('uair').checked;
                var ShipSea = document.getElementById('usea').checked;
                var merge_box = $("#merge_box:checked").val()
                // return
                var Upx = $('#UPhuongXa').val();
                var Code_Add = $("#Uhuyen option:selected").val() + "," + $("#Utinh option:selected").val();
                var UaddNumber = $("#UaddNumber").val();
                var uphone = $("#uphone").val();
                var utypeadd = $("#utypeadd").val();
                if (OptionAdd.length <= 5) {
                    if (Upx == null || Upx == "") {
                        swal_action("Xin vui lòng chọn Thành Phố Quận/Huyện")
                        return
                    }
                    if (UaddNumber.length <= 4) {
                        swal_action("Nhập thiếu số nhà tên đường")
                        return
                    }
                }
                if (Name_Send.length < 3) {
                    swal_action("Nhập thiếu tên người gửi!")
                } else if (Number_Send == '') {
                    swal_action("Nhập chưa đúng số điện thoại người gửi!")
                } else if (Number_Send <= 8) {
                    swal_action("Nhập thiếu số điện thoại người gửi!")
                } else if (Name_Rev == '') {
                    swal_action("Nhập thiếu tên người nhận!")
                } else if (Name_Rev.length < 3) {
                    swal_action("Tên người nhận quá ngắn!")
                } else if (AddRev.length < 4) {
                    swal_action("Nhập thiếu địa chỉ!")
                } else if (Phone == '') {
                    swal_action("Chưa nhập số điện thoại người nhận!")
                } else if (Phone.length <= 8) {
                    swal_action("Nhập thiếu số điện thoại người nhận")
                } else if (uphone == '') {
                    swal_action("Nhập số điện thoại người nhận")
                } else if (Number_Send.length <= 8) {
                    swal_action("Nhập thiếu số điện thoại người gửi")
                } else {
                    if (Tracking.length > 7 && Phone.length > 8 && Name_Send.length > 2 && Name_Rev.length > 2 &&
                        Number_Send
                        .length > 8 && (ShipAir == true | ShipSea == true) && (Upx != null || OptionAdd.length > 5) && (
                            UaddNumber.length >= 4 || OptionAdd.length > 5)) {
                        $("#address_modal").empty()
                        $("#method_modal").empty()
                        var address_modal = '';
                        var method_modal = '';
                        if (OptionAdd.length > 5) {
                            address_modal = $("#utypeadd option:selected").text()
                        } else {
                            address_modal = $("#UaddNumber").val() + ',' + $("#UPhuongXa option:selected").text() + ',' + $(
                                "#Uhuyen option:selected").text() + ',' + $("#Utinh option:selected").text()
                        }
                        if (ShipAir) {
                            method_modal = 'Vận chuyển đường bay'
                        } else {
                            method_modal = 'Vận chuyển đường biển'
                        }
                        $("#address_modal").text(address_modal)
                        $("#method_modal").text(method_modal)
                        $('#send_infor_tracking-address-book').hide()
                        $('#send_infor_tracking').show()
                        $("#modal_qoute").show()
                    }
                }
            } else {
                var mapObj = {
                    "_": "",
                    " ": " ",
                    "-": "",
                    ",": " ",
                };
                tracking = tracking.replace(/-| |_|,/gi, function(matched) {
                    return mapObj[matched];
                });
                var trip = $('input[name="fh_radio"]:checked', '#trip').val();
                var full_address = $("#choosed-address .remove-bg .full_address").text();
                $("#address_modal").empty()
                $("#method_modal").empty();
                $("#address_modal").text(full_address)
                $("#method_modal").text(trip)
                $('#send_infor_tracking-address-book').show()
                $('#send_infor_tracking').hide()
                $("#modal_qoute").show()

            }
        }

        function fetch_data(page) {
            const idToken = getToken();
            $.ajax({
                type: "GET",
                url: "{{ route('shipment.index') }}",
                data: {
                    idToken:idToken,
                    shipment: true,
                    page_shipment: page
                },
                success: function(data) {
                    if (data.code == 401) {
                        swal({
                            title: "Mã xác thực hết hạn vui lòng tải lại trang",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        });
                    } else {
                        if (data.list_address.data.length) {
                            $("#list-address").empty()
                            $.each(data.list_address.data, function(index, value) {

                                $("#list-address").append(
                                    '<div class="form-check">' +
                                    '<input class="form-check-input" type="radio" name="addbook" id="address' +
                                    value.id + '" value="' + value.id +
                                    '">' +
                                    '<label class="form-check-label" id="lb-address' +
                                    value
                                    .id +
                                    '"for="address"' + value.id +
                                    '">Người nhận:' + value.consignee +
                                    ", SĐT người nhận:" + value.tel +
                                    ", Người gửi:" + value.sender_name +
                                    ", SĐT người gửi:" + value.sender_tel +
                                    ", Địa chỉ:" +
                                    value.full_address +
                                    '</label>' +
                                    '</div>'
                                )
                            })

                            $("#paginate-address-book").empty()
                            $("#paginate-address-book").append(
                                '<li class="page-item">' +
                                '<a class="page-link address" href="#" aria-label="Previous" data-page="1">' +
                                '<span aria-hidden="true">&laquo;</span>' +
                                '</a>' +
                                '</li>'
                            )
                            for (var first_page = 1; first_page <= data.list_address
                                .last_page; first_page++) {
                                $("#paginate-address-book").append(
                                    '<li class="page-item"><a class="page-link address" href="javascript:;"' +
                                    'data-page="' + first_page + '">' + first_page + '</a></li>'
                                )
                            }
                            $("#paginate-address-book").append(
                                '<li class="page-item">' +
                                '<a class="page-link address" href="#" aria-label="Previous" data-page="' +
                                data.list_address
                                .last_page + '">' +
                                '<span aria-hidden="true">&raquo;</span>' +
                                '</a>' +
                                '</li>'
                            )
                        }
                    }

                },
                error: function(response) {

                }
            })
        }

    </script>
@endsection

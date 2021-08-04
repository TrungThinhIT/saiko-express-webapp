@extends('modules_manager.main')
@section('title', 'Sổ địa chỉ')
@section('css')
    <style>
        .custom-icon {
            color: orange;
        }

        #fix-paginate-address li.active a {
            background-color: #fca901;
            border-color: silver;
            color: #484848
        }
        #fix-paginate-address {
            font-size: 13px;
        }
        .fix-float {
            float: right;
        }

        .set-overflow {
            overflow: auto !important;
        }

        .fix-height-ip {
            height: 3rem !important;
        }

        #province,
        #district,
        #ward {
            background-color: white !important;
            color: black !important;
        }

        #note-update {
            height: unset;
        }

        #note {
            height: unset;
        }

        #province-update,
        #district-update,
        #ward-update {
            background-color: white !important;
            color: black !important;
        }

        .set-bg-btn {
            background-color: #fca901 !important;
            color: white !important;
        }

        .set-bg-btn-cancel {
            background-color: silver !important;
        }

        #fix-bg-load-page {
            background: #fff;

            border-radius: 0px 20px 20px 0px;
        }

        #load-page {
            position: relative;
            font-weight: bold;
            font-size: 13px;
            color: #1F3BB3;
            font-weight: bold;
        }

        #fix-color-icon {
            color: #1F3BB3;
        }



        @media (max-width:1000px) {

            .modal-lg,
            .modal-xl {
                width: 90%;
            }
        }

        .addHover {
            cursor: default !important;
        }

    </style>
@section('content')
    @if (isset($data['list_address']))
        <div class="col-md-12 p-2 fix-overflow">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="header_address">Sổ địa chỉ</span>
                            <span style="float:right">
                                <button id="add-address" class="btn btn-success set-bg-btn">Thêm</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body custom-background set-overflow">
                    <table class="table table-striped set-border-radius" id="fix-stt">
                        <thead>
                            <tr style="color:black; font-weight:900" class="text-center">
                                <td class="unset-border-bottom">STT</td>
                                <td class="unset-border-bottom">Tên người nhận</td>
                                <td class="unset-border-bottom">Số điện thoại</td>
                                <td class="unset-border-bottom">Tên người gửi</td>
                                <td class="unset-border-bottom">Số điện thoại người gửi</td>
                                <td class="unset-border-bottom">Địa chỉ</td>
                                <td class="unset-border-bottom">#</td>
                            </tr>
                        </thead>
                        <tbody id="list-address">
                            @foreach ($data['list_address']['data'] as $key => $value)
                                <tr class="text-center addHover" id="address-{{ $value['id'] }}">
                                    <td>{{ $data['list_address']['from']++ }}</td>
                                    <td>{{ $value['consignee'] }}</td>
                                    <td>{{ $value['tel'] }}</td>
                                    <td>{{ $value['sender_name'] }}</td>
                                    <td>{{ $value['sender_tel'] }}</td>
                                    <td>{{ $value['full_address'] }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="custom-icon p-1" style="float:right"
                                                    data-id="{{ $value['id'] }}" onclick="updateAddress(this)"><i
                                                        class="fa fa-pencil"></i></button>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="custom-icon p-1 " data-deleteId="{{ $value['id'] }}"
                                                    onclick="deleteAddress(this)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 ">
                        <nav aria-label="Page navigation example" class="fix-float">
                            <ul class="pagination custom-paginate" id="fix-paginate-address">
                                {{-- <li class="page-item">
                                    <a class="page-link address" href="#" aria-label="Previous" data-page="1">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $data['list_address']['last_page']; $i++)
                                    <li class="page-item"><a class="page-link address" href="javascript:;"
                                            data-page="{{ $i }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link address" href="#" aria-label="Next"
                                        data-page={{ $data['list_address']['last_page'] }}>
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal add address --}}
        <div class="modal bd-example-modal-lg" id="modal-create-address" style="display: none;" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Thêm địa chỉ nhận</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên người gửi</label>
                                        <input type="text" class="form-control fix-height-ip" id="inputSender-name"
                                            placeholder="Nhập tên người nhận">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control fix-height-ip" id="inputSender-tel"
                                            placeholder="Nhập số điện thoại người gửi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên người nhận</label>
                                        <input type="text" class="form-control fix-height-ip" id="consignee"
                                            placeholder="Nhập tên người nhận">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="fix-width-label">Số điện thoại người nhận</label>
                                        <input type="number" class="form-control fix-height-ip" id="consignee-tel"
                                            placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Thành phố/Tỉnh</label>
                                        <select class="form-control fix-select fix-height-ip" name="province" id="province"
                                            onchange="Select_Provice(this)"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Quận/Huyện</label>
                                        <select class="form-control fix-select fix-height-ip" name="district" id="district"
                                            onchange="Select_District(this)"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Xã/Phường</label>
                                        <select class="form-control fix-select fix-height-ip" name="ward"
                                            id="ward"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số nhà tên đường</label>
                                        <input type="text" class="form-control fix-height-ip" id="address-home"
                                            placeholder="Nhập địa chỉ nhà">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Ghi chú</label>
                                        <textarea rows="6" cols="10" type="text" class="form-control" id="note"
                                            placeholder="Nội dùng cần chú ý"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div style="padding: 30px">
                                <button class="btn btn-success set-bg-btn-cancel" id="close-modal-create">Thoát</button>
                                <button class="btn btn-success set-bg-btn" onclick="CreateAddress()">Thêm</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal update address --}}
        <div class="modal bd-example-modal-lg" id="modal-update-address" style="display: none" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Cập nhật địa chỉ nhận</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên người gửi</label>
                                        <input type="text" class="form-control empty-input fix-height-ip"
                                            id="inputSender-name-update" placeholder="Nhập tên người nhận">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="number" class="form-control empty-input fix-height-ip"
                                            id="inputSender-tel-update" placeholder="Nhập số điện thoại người gửi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tên người nhận</label>
                                        <input type="text" class="form-control empty-input fix-height-ip"
                                            id="consignee-update" placeholder="Nhập tên người nhận">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="fix-width-label">Số điện thoại người
                                            nhận</label>
                                        <input type="number" class="form-control empty-input fix-height-ip"
                                            id="consignee-tel-update" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Thành phố/Tỉnh</label>
                                        <select class="form-control empty-input-select fix-select fix-height-ip"
                                            name="province" id="province-update"
                                            onchange="Select_Provice_Update(this)"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Quận/Huyện</label>
                                        <select class="form-control empty-input-select fix-select fix-height-ip"
                                            name="district" id="district-update"
                                            onchange="Select_District_Update(this)"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Xã/Phường</label>
                                        <select class="form-control empty-input-select fix-select fix-height-ip" name="ward"
                                            id="ward-update"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số nhà tên đường</label>
                                        <input type="text" class="form-control empty-input fix-height-ip"
                                            id="address-home-update" placeholder="Nhập địa chỉ nhà">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Ghi chú</label>
                                        <textarea rows="6" type="text" class="form-control empty-input" id="note-update"
                                            placeholder="Nội dùng cần chú ý"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div style="padding: 30px">
                                <button class="btn btn-success set-bg-btn-cancel" id="close-modal-update">Thoát</button>
                                <button class="btn btn-success set-bg-btn" onclick="sendUpdate(this)"
                                    id="btn-send-update-add">Cập
                                    nhật</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function() {
            // $("#fix-stt").DataTable();
            $(document).ajaxStart(function() {
                $("#loader").show();
            });
            $(document).ajaxStop(function() {
                $("#loader").hide();
            });

            $("#exit").click(() => $("#modalConfirmDelete").hide())
            $("#reload").click(() => location.reload());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });

            $("#fix-paginate-address").pagination({
                current: 1,
                total: "{{ $data['list_address']['total'] }}",
                size: 2,
                length: "{{ $data['list_address']['per_page'] }}",
                prev: "&lt;",
                next: "&gt;",
                click: function(e) {
                    var page = $(this)[0].current;
                    fetch_data(page);
                }
            })

            $("#add-address").click(function() {
                if (!$("#province").val()) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('rq_tk.quote') }}",
                        success: function(response) {
                            $("#province").empty();
                            $("#district").empty();
                            $("#ward").empty();
                            $("#province").append(new Option('Vui lòng chọn', ''));
                            $.each(response, function(index, value) {
                                $("#province").append(new Option(value.TenTinhThanh,
                                    value
                                    .MaTinhThanh))
                            })
                        },
                        error: function(response) {

                        }
                    })
                }
            })
            $("#add-address").click(function() {
                $("#modal-create-address").fadeIn(700);
            })
            //close form create address
            $("#close-modal-create").click(function() {
                $("#modal-create-address").fadeOut(700);
            });

            //close form udpate address
            $("#close-modal-update").click(function() {
                $("#modal-update-address").fadeOut(700)
            })


        })

        function fetch_data(page) {
            $.ajax({
                type: "GET",
                url: "{{ route('shipment.index') }}",
                data: {
                    shipment: true,
                    page_shipment: page
                },
                success: function(data) {
                    if (data.code == 401) {
                        location.reload()
                    } else {
                        if (data.list_address.data.length) {
                            $("#list-address").empty()
                            $.each(data.list_address.data, function(index, value) {

                                $("#list-address").append(
                                    '<tr class="text-center" id=address-' + value.id + '>' +
                                    '<td>' + data.list_address.from++ + '</td>' +
                                    '<td>' + value.consignee + '</td>' +
                                    '<td>' + value.tel + '</td>' +
                                    '<td>' + value.sender_name + '</td>' +
                                    '<td>' + value.sender_tel + '</td>' +
                                    '<td>' + value.full_address + '</td>' +
                                    '<td>' + '<div class="row">' +
                                    '<div class="col-m-6" style="width:auto !important;">' +
                                    '<button class="custom-icon p-1"  onclick="updateAddress(this)" data-id="' +
                                    value.id + '">' +
                                    '<i class="fa fa-pencil"></i>' + '</button>' +
                                    '</div>' +
                                    '<div class="col-md-4">' +
                                    '<button class="custom-icon p-1" onclick="deleteAddress(this)" data-deleteId="' +
                                    value.id + '">' +
                                    '<i class="fa fa-trash"></i></button>' +
                                    '</div>' +
                                    '</div>' + '</div>' +
                                    '</td>' +
                                    '</tr>'
                                )
                            })
                        }
                    }

                },
                error: function(response) {
                    console.log(response)
                }
            })
        }
        //created Address
        function CreateAddress() {
            var sender_name = $("#inputSender-name").val();
            var sender_tel = $("#inputSender-tel").val();
            var consignee = $("#consignee").val();
            var consignee_tel = $("#consignee-tel").val();
            var province = $("#province").val();
            var district = $("#district").val();
            var ward = $("#ward").val();
            var address = $("#address-home").val();
            var note = $("#note").val();

            if (sender_name.length < 4) {
                alert('Nhập thiếu tên người gửi')
                return;
            }
            if (sender_tel.length < 9) {
                alert('Nhập thiếu số điện thoại người gửi')
                return;
            }
            if (consignee.length < 4) {
                alert('Nhập thiếu tên người nhận')
                return;
            }
            if (consignee_tel.length < 9) {
                alert('Nhập thiếu số điện thoại người nhận')
                return;
            }
            if (!province) {
                alert('Vui lòng chọn tỉnh thành')
                return;
            }
            if (!district) {
                alert('Vui lòng chọn quận huyện')
                return;
            }
            if (!ward) {
                alert('Vui lòng chọn phường xã')
                return;
            }
            if (address.length < 7) {
                alert('Vui lòng nhập số nhà tên đường')
                return;
            }

            $.ajax({
                type: "POST",
                url: "{{ route('shipment.store') }}",
                data: {
                    note: note,
                    sender_name: sender_name,
                    sender_tel: sender_tel,
                    consignee: consignee,
                    tel: consignee_tel,
                    ward_id: ward,
                    address: address,
                },
                success: function(response) {
                    $("#alert-errors").empty()
                    $("#modal-create-address").hide()
                    if (response.code == 201) {
                        fetch_data(1);
                        swal({
                            title: "Đã tạo thành công",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                        $("#inputSender-name").val('');
                        $("#inputSender-tel").val('');
                        $("#consignee").val('');
                        $("#consignee-tel").val('');
                        $("#address-home").val('');
                        $("#note").val('');

                    } else {
                        var errors = JSON.parse(response.message)
                        $.each(errors.errors, function(index, value) {
                            $("#alert-errors").append(
                                '<span class="text-danger">' +
                                index + ":" +
                                value +
                                '</span>'
                            )
                        })
                        $("#modalConfirmDelete").show()


                    }
                },
                error: function(response) {}
            })
        }
        //deleteAddress
        function deleteAddress(obj) {
            var id_shipment = $(obj).data('deleteid');
            swal({
                title: "Are you sure?",
                type: "warning",
                icon: "warning",
                buttons: true,
                // showCancelButton: true,
                confirmButtonColor: "#fca901",
                // confirmButtonText: "Exit",
                closeOnConfirm: true
            }).then((value) => {
                if (value) {
                    $.ajax({
                        type: "DELETE",
                        url: "../shipment/" + id_shipment,
                        success: function(response) {
                            if (response.code == 200) {
                                $("#address-" + id_shipment).remove()
                                fetch_data(1);
                            }
                        },
                        error: function(response) {

                        }
                    })
                }
            });
        }

        //update ADdress
        function updateAddress(obj) {
            $(".empty-input-select").empty();
            $(".empty-input").val('');
            $("#modal-update-address").show()
            var id_shipment = $(obj).data('id');
            $("#btn-send-update-add").attr("data-id_address", id_shipment)

            $.ajax({
                type: "GET",
                url: "../shipment/" + id_shipment + "/edit",
                success: function(response) {
                    if (response.code == 200) {
                        $("#inputSender-name-update").val(response.data.sender_name)
                        $("#inputSender-tel-update").val(response.data.sender_tel)
                        $("#consignee-update").val(response.data.consignee)
                        $("#consignee-tel-update").val(response.data.tel)
                        $("#address-home-update").val(response.data.address)
                        var id_province = response.data.full_address.district.province.id
                        var id_district = response.data.full_address.district.id
                        if (response.data.provinces.length) {
                            $.each(response.data.provinces, function(index, value) {
                                $("#province-update").append(new Option(value.TenTinhThanh, value
                                    .MaTinhThanh, value.MaTinhThanh == id_province ? true :
                                    false, value.MaTinhThanh == id_province ? true :
                                    false))
                            })
                            $.each(response.data.districts, function(index, value) {
                                $("#district-update").append(new Option(value.TenQuanHuyen, value
                                    .MaQuanHuyen, value.MaQuanHuyen == id_district ? true :
                                    false, value.MaQuanHuyen == id_district ? true :
                                    false))
                            })
                            $.each(response.data.wards, function(index, value) {
                                $("#ward-update").append(new Option(value.TenPhuongXa, value
                                    .MaPhuongXa, value.MaPhuongXa == response.data.ward_id ?
                                    true :
                                    false, value.MaPhuongXa == response.data.ward_id ? true :
                                    false))
                            })

                        }
                    }
                },
                error: function(response) {

                }

            })
        }
        //send info update address
        function sendUpdate(obj) {
            var id_shipment = $(obj).attr("data-id_address")
            var sender_name = $("#inputSender-name-update").val();
            var sender_tel = $("#inputSender-tel-update").val();
            var consignee = $("#consignee-update").val();
            var consignee_tel = $("#consignee-tel-update").val();
            var province = $("#province-update").val();
            var district = $("#district-update").val();
            var ward = $("#ward-update").val();
            var address = $("#address-home-update").val();
            var note = $("#note-update").val();

            if (sender_name.length < 4) {
                alert('Nhập thiếu tên người gửi')
                return;
            }
            if (sender_tel.length < 9) {
                alert('Nhập thiếu số điện thoại người gửi')
                return;
            }
            if (consignee.length < 4) {
                alert('Nhập thiếu tên người nhận')
                return;
            }
            if (consignee_tel.length < 9) {
                alert('Nhập thiếu số điện thoại người nhận')
                return;
            }
            if (!province) {
                alert('Vui lòng chọn tỉnh thành')
                return;
            }
            if (!district) {
                alert('Vui lòng chọn quận huyện')
                return;
            }
            if (!ward) {
                alert('Vui lòng chọn phường xã')
                return;
            }
            if (address.length < 7) {
                alert('Vui lòng nhập số nhà tên đường')
                return;
            }

            $.ajax({
                type: "PUT",
                url: "../shipment/" + id_shipment,
                data: {
                    note: note,
                    sender_name: sender_name,
                    sender_tel: sender_tel,
                    consignee: consignee,
                    tel: consignee_tel,
                    ward_id: ward,
                    address: address,
                },
                success: function(response) {
                    $("#alert-errors").empty()
                    $("#modal-update-address").hide()
                    if (response.code == 200) {
                        fetch_data(1);
                        swal({
                            title: "Đã cập nhật",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })

                    } else {
                        var errors = JSON.parse(response.message)
                        $.each(errors.errors, function(index, value) {
                            $("#alert-errors").append(
                                '<span class="text-danger">' +
                                index + ":" +
                                value +
                                '</span>'
                            )
                        })
                        $("#modalConfirmDelete").show()


                    }
                },
                error: function(response) {}
            })
        }
        //province-create
        function Select_Provice(obj) {
            var province = $(obj).val();
            $.ajax({
                type: "POST",
                url: "{{ route('rq_tk.quanhuyen') }}",
                data: {
                    province: province,
                },
                success: function(res) {
                    $("#district").empty()
                    $("#ward").empty()
                    $("#district").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#district").append(new Option(value.TenQuanHuyen, value.MaQuanHuyen))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }
        //district-create
        function Select_District(obj) {
            var district = $(obj).val();
            $.ajax({
                type: "POST",
                url: "{{ route('rq_tk.phuongxa') }}",
                data: {
                    district: district,
                },
                success: function(res) {
                    $("#ward").empty()
                    $("#ward").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#ward").append(new Option(value.TenPhuongXa, value.MaPhuongXa))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }
        //province-create
        function Select_Provice_Update(obj) {
            var province = $(obj).val();
            $.ajax({
                type: "POST",
                url: "{{ route('rq_tk.quanhuyen') }}",
                data: {
                    province: province,
                },
                success: function(res) {
                    $("#district-update").empty()
                    $("#ward-update").empty()
                    $("#district-update").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#district-update").append(new Option(value.TenQuanHuyen, value.MaQuanHuyen))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }
        //district-create
        function Select_District_Update(obj) {
            var district = $(obj).val();
            $.ajax({
                type: "POST",
                url: "{{ route('rq_tk.phuongxa') }}",
                data: {
                    district: district,
                },
                success: function(res) {
                    $("#ward-update").empty()
                    $("#ward-update").append(new Option('Vui lòng chọn', ''))
                    $.each(res, function(index, value) {
                        $("#ward-update").append(new Option(value.TenPhuongXa, value.MaPhuongXa))
                    })
                },
                error: function(res) {
                    console.log(res)
                }
            });
        }

    </script>
@endsection

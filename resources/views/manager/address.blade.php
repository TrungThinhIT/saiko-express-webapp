@extends('modules_manager.main_new')
@section('title', 'Sổ địa chỉ')
@section('title-header-content', 'Sổ địa chỉ')
@section('css')
<style>
    .custom-icon {
        color: orange;
    }

    .swal-button-container>.swal-button--cancel {
        background-color: silver !important;
    }

    .fix-select {
        border: #484848 1px solid !important;
    }

    #select_search {
        border: #484848 1px solid !important;
    }

    #fix-paginate-address li.active a {
        background-color: #fca901;
        border-radius: 50%;
        border: unset;
        color: #484848
    }

    #fix-paginate-address li a {
        color: #484848;
        background-color: white;
        border: unset;
    }

    #fix-paginate-address {
        font-size: 13px;
    }

    #fix-paginate-address-header {
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

    .addHover-address {
        cursor: default !important;
    }
</style>
@section('content')
<div class="col-md-12 fix-overflow">
    <div class="card">
        <div class="card-body custom-background set-overflow">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline">
                        <span id="header_address">Thông tin người gửi</span>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="name" class="">Tên:	&nbsp;</label>
                            <input type="text" required class="form-control" id="name" placeholder="Tên" value="{{$data['user']['name'] ?? null}}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="tel" class="">Số điện thoại:	&nbsp;</label>
                            <input type="text" required class="form-control" id="tel" placeholder="Số điện thoại" value="{{$data['user']['tel'] ?? null}}">
                        </div>
                        <button type="button" class="custom-icon p-1" onclick="updateSenderInfo(this)">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (isset($data['list_address']))
<div class="col-md-12 fix-overflow">
    <div class="card ">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <span id="header_address">Sổ địa chỉ</span>
                    <span style="float:right">
                        <button id="add-address" class="btn set-bg-btn">Thêm</button>
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
                        <td class="unset-border-bottom">Địa chỉ</td>
                        <td class="unset-border-bottom">#</td>
                    </tr>
                </thead>
                <tbody id="list-address">
                    @foreach ($data['list_address']['data'] as $key => $value)
                    <tr class="text-center addHover-address" id="address-{{ $value['id'] }}">
                        <td>{{ $data['list_address']['from']++ }}</td>
                        <td>{{ $value['consignee'] }}</td>
                        <td>{{ $value['tel'] }}</td>
                        <td>{{ $value['full_address'] }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="custom-icon p-1" data-id="{{ $value['id'] }}" onclick="updateAddress(this)"><i class="fa fa-pencil"></i></button>
                                </div>
                                <div class="col-md-4">
                                    <button class="custom-icon p-1 " data-deleteId="{{ $value['id'] }}" onclick="deleteAddress(this)"><i class="fa fa-trash"></i></button>
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
                                <label>Tên người nhận</label>
                                <input type="text" class="form-control " id="consignee" placeholder="Nhập tên người nhận">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="fix-width-label">Số điện thoại người nhận</label>
                                <input type="number" class="form-control " id="consignee-tel" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Thành phố/Tỉnh</label>
                                <select class="form-select " name="province" id="province" onchange="Select_Provice(this)"></select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Quận/Huyện</label>
                                <select class="form-select " name="district" id="district" onchange="Select_District(this)"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Xã/Phường</label>
                                <select class="form-select " name="ward" id="ward"></select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số nhà tên đường</label>
                                <input type="text" class="form-control " id="address-home" placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea rows="6" cols="10" type="text" class="form-control" id="note" placeholder="Nội dùng cần chú ý"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div style="padding: 30px">
                        <button class="btn set-bg-btn-cancel" id="close-modal-create">Thoát</button>
                        <button class="btn set-bg-btn" onclick="CreateAddress()">Thêm</button>
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
                                <label>Tên người nhận</label>
                                <input type="text" class="form-control empty-input fix-height-ip" id="consignee-update" placeholder="Nhập tên người nhận">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="fix-width-label">Số điện thoại người
                                    nhận</label>
                                <input type="number" class="form-control empty-input fix-height-ip" id="consignee-tel-update" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Thành phố/Tỉnh</label>
                                <select class="form-select empty-input-select fix-height-ip" name="province" id="province-update" onchange="Select_Provice_Update(this)"></select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Quận/Huyện</label>
                                <select class="form-select empty-input-select fix-height-ip" name="district" id="district-update" onchange="Select_District_Update(this)"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Xã/Phường</label>
                                <select class="form-select empty-input-select fix-height-ip" name="ward" id="ward-update"></select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số nhà tên đường</label>
                                <input type="text" class="form-control empty-input fix-height-ip" id="address-home-update" placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea rows="6" type="text" class="form-control empty-input" id="note-update" placeholder="Nội dùng cần chú ý"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div style="padding: 30px">
                        <button class="btn set-bg-btn-cancel" id="close-modal-update">Thoát</button>
                        <button class="btn btn-warning set-bg-btn" onclick="sendUpdate(this)" id="btn-send-update-add">Cập
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
                            $("#province").append(new Option(value.name,
                                value
                                .id))
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
                    swal({
                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
                        type: "success",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    }).then(() => {
                        window.location.reload()
                    })
                } else {
                    if (data.list_address.data.length) {

                        $("#list-address").empty()
                        $.each(data.list_address.data, function(index, value) {

                            $("#list-address").append(
                                '<tr class="text-center" id=address-' + value.id + '>' +
                                '<td>' + data.list_address.from++ + '</td>' +
                                '<td>' + value.consignee + '</td>' +
                                '<td>' + value.tel + '</td>' +
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
                        $("#fix-paginate-address").pagination({
                            current: data.list_address.current_page,
                            total: data.list_address.total,
                            size: 2,
                            length: data.list_address.per_page,
                            prev: "&lt;",
                            next: "&gt;",
                            click: function(e) {
                                var page = $(this)[0].current;
                                fetch_data(page);
                            }
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
        var consignee = $("#consignee").val();
        var consignee_tel = $("#consignee-tel").val();
        var province = $("#province").val();
        var district = $("#district").val();
        var ward = $("#ward").val();
        var address = $("#address-home").val();
        var note = $("#note").val();

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
                consignee: consignee,
                tel: consignee_tel,
                ward_id: ward,
                address: address,
            },
            success: function(response) {
                $("#alert-errors").empty()
                $("#modal-create-address").hide()
                if (response.code == 401) {
                    swal({
                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
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
                if (response.code == 201) {
                    var page = $("#fix-paginate-address .active a").data('page');
                    fetch_data(page);
                    swal({
                        title: "Đã tạo thành công",
                        type: "success",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    })
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
                        if (response.code == 401) {
                            swal({
                                title: "Mã xác thực hết hạn vui lòng tải lại trang",
                                type: "success",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            }).then(() => {
                                window.location.reload()
                            })
                        }
                        if (response.code == 200) {
                            var page = $("#fix-paginate-address .active a").data('page');
                            $("#address-" + id_shipment).remove()
                            fetch_data(page);
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
                if (response.code == 401) {
                    swal({
                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
                        type: "success",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    }).then(() => {
                        location.reload()
                    })
                }
                if (response.code == 200) {
                    $("#consignee-update").val(response.data.consignee)
                    $("#consignee-tel-update").val(response.data.tel)
                    $("#address-home-update").val(response.data.address)
                    $("#note-update").val(response.data.note)
                    var id_province = response.data.full_address.district.province.id
                    var id_district = response.data.full_address.district.id
                    if (response.data.provinces.length) {
                        $.each(response.data.provinces, function(index, value) {
                            $("#province-update").append(new Option(value.name, value
                                .id, value.id == id_province ? true : false,
                                value.id == id_province ? true : false))
                        })
                        $.each(response.data.districts, function(index, value) {
                            $("#district-update").append(new Option(value.name, value
                                .id, value.id == id_district ? true :
                                false, value.id == id_district ? true :
                                false))
                        })
                        $.each(response.data.wards, function(index, value) {
                            $("#ward-update").append(new Option(value.name, value
                                .id, value.id == response.data.ward_id ?
                                true :
                                false, value.id == response.data.ward_id ?
                                true :
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
        var consignee = $("#consignee-update").val();
        var consignee_tel = $("#consignee-tel-update").val();
        var province = $("#province-update").val();
        var district = $("#district-update").val();
        var ward = $("#ward-update").val();
        var address = $("#address-home-update").val();
        var note = $("#note-update").val();

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
        if (address.length < 1) {
            alert('Vui lòng nhập số nhà tên đường')
            return;
        }

        $.ajax({
            type: "PUT",
            url: "../shipment/" + id_shipment,
            data: {
                note: note,
                consignee: consignee,
                tel: consignee_tel,
                ward_id: ward,
                address: address,
            },
            success: function(response) {
                $("#alert-errors").empty()
                $("#modal-update-address").hide()
                if (response.code == 401) {
                    swal({
                        title: "Mã xác thực hết hạn vui lòng tải lại trang",
                        type: "success",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#fca901",
                        confirmButtonText: "Exit",
                        closeOnConfirm: true
                    }).then(() => {
                        window.location.reload()
                    })
                }
                if (response.code == 200) {
                    var page = $("#fix-paginate-address .active a").data('page');
                    fetch_data(page);
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

    function updateSenderInfo(obj) {
        var name = $("#name").val();
        var tel = $("#tel").val();

        if (!name) {
            alert('Không để trống tên')
            return;
        }
        if (!tel) {
            alert('Không để trống số điện thoại')
            return;
        }

        if (name.length > 30) {
            alert('Tên không được quá 30 ký tự')
            return;
        }
        if (tel.length > 15) {
            alert('Số điện thoại không được quá 15 ký tự')
            return;
        }

        $.ajax({
            type: "PUT",
            url: "{{ route('auth.updateInfo') }}",
            data: {
                name: name,
                tel: tel,
            },
            success: function(response) {
                swal({
                    title: "Đã cập nhật",
                    type: "success",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#fca901",
                    confirmButtonText: "Exit",
                    closeOnConfirm: true
                }).then(() => {
                        window.location.reload()
                    })
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
                    $("#district").append(new Option(value.name, value.id))
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
                    $("#ward").append(new Option(value.name, value.id))
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
                    $("#district-update").append(new Option(value.name, value
                        .id))
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
                    $("#ward-update").append(new Option(value.name, value.id))
                })
            },
            error: function(res) {
                console.log(res)
            }
        });
    }
</script>
@endsection
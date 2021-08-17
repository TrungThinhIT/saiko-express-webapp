@extends('modules_manager.main_new')
@section('title', 'Danh sách đơn hàng')
@section('title-header-content', 'Danh sách đơn hàng')
@section('css')
    <style>
        #create-order {
            color: #484848 !important;
        }

        #fix-paginate-order li.active a {
            border-radius: 50%;
            background-color: #fca901;
            border: unset;
            color: #484848
        }

        #fix-paginate-order li a {
            background-color: white;
            color: #484848;
            border: unset;
        }

        #fix-paginate-order {
            font-size: 15px;
        }

        .fh-btn {
            background-color: #fca901 !important;
            color: white !important;
        }

        .fix-select {
            color: black !important;
            background-color: white !important;
        }

    </style>
@section('content')
    <div class="col-md-12 fix-overflow">
        <div class="card fix-overflow">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Danh sách đơn hàng</h3>
                    </div>
                </div>
            </div>
            <div class="card-body custom-background set-overflow">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="" class="form-select " id="select_search">
                                <option value="all">Tất cả</option>
                                <option value="trackings.id">Tracking</option>
                                <option value="created_at">Ngày tạo</option>
                                <option value="director.status.id">Trạng thái</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" class="form-control" id="type_input">
                            <select name="" id="list-status" class="form-select " style="display:none"></select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-secondary form-control text-center "
                            id="reset_order">reset</button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn form-control text-center fh-btn" id="filter_order">Lọc</button>
                    </div>
                </div>
                <table class="table table-striped set-border-radius">
                    <thead>
                        <a href="">
                            <tr class="text-center" style="color:black;font-weight:900">
                                <td class="unset-border-bottom">STT</td>
                                <td class="unset-border-bottom">Trạng thái</td>
                                <td class="unset-border-bottom">Tracking</td>
                                <td class="unset-border-bottom">Người gửi</td>
                                <td class="unset-border-bottom">Người nhận</td>
                                <td class="unset-border-bottom">SĐT người nhận</td>
                                <td class="unset-border-bottom">Địa chỉ</td>
                                <td class="unset-border-bottom">PTVC</td>
                                <td class="unset-border-bottom">Ghi chú</td>
                                <td class="unset-border-bottom">Ngày tạo</td>

                            </tr>
                        </a>
                    </thead>
                    <tbody id="list-orders">


                        @if (isset($data['list_orders']))
                            @foreach ($data['list_orders']['data'] as $key => $value)
                                @php
                                    switch($value['status']['id']){
                                        case "Pending":
                                            $background = "bg-warning p-2 rounded text-white";
                                            break;
                                        case "Approved":
                                            $background ="bg-success p-2 rounded text-white";
                                            break;
                                        case "ReceivedAtWarehouse":
                                            $background ="bg-primary p-2 rounded text-white";
                                            break;
                                        case "Paid":
                                            $background ="bg-white p-2 rounded text-white";
                                            break;
                                        case "Finish":
                                            $background ="bg-secondary p-2 rounded text-white";
                                            break;
                                        case "Cancelled":
                                            $background ="bg-danger p-2 rounded text-white";
                                            break;
                                        default:
                                            $background ="";
                                    }
                                @endphp
                                <tr class="text-center addHover detail-order" data-id={{ $value['id'] }}>
                                    <td>{{ $data['list_orders']['from']++ }}</td>
                                    <td><span class="{{$background}}">{{ $value['status']['name'] }}</span></td>
                                    <td>
                                        @if (isset($value['trackings'][0]))
                                            {{ $value['trackings'][0]['id'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($value['shipment_info']['sender_name']))
                                            {{ $value['shipment_info']['sender_name']}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($value['shipment_info']['consignee']))
                                            {{ $value['shipment_info']['consignee']}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($value['shipment_info']['tel']))
                                            {{ $value['shipment_info']['tel'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($value['shipment_info']['tel']))
                                            {{ $value['shipment_info']['full_address'] }}
                                        @endif
                                    </td>
                                    <td>{{ $value['shipment_method_id'] }}</td>
                                    <td>{{ $value['note'] }}</td>
                                    <td>{{ $value['created_at'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
                <div class="mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination custom-paginate" style="float:right" id="fix-paginate-order">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#ui-basic').addClass('show');
            $('#index-order').addClass('active')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });

            $(document).ajaxStart(function() {
                $("#loader").show();
            });


            $(document).ajaxStop(function() {
                $("#loader").hide();
            });

            $('#fix-paginate-order').pagination({
                total: "{{ $data['list_orders']['total'] }}",
                current: 1,
                length: "{{ $data['list_orders']['per_page'] }}",
                size: 2,
                prev: "&lt;",
                next: "&gt;",
                click: function(e) {
                    var page = $(this)[0].current;
                    fetch_data_order(page)

                }
            })

            $("#filter_order").click(function() {
                var field_search = $("#select_search").val();
                var value_search = $("#type_input").val();
                var status = $("#list-status").val();
                $("#fix-paginate-order").pagination({
                    ajax: function(options, refresh, $target) {
                        var page = $(this)[0].current;
                        $.ajax({
                            type: "GET",
                            url: "{{ route('orders.index') }}",
                            data: {
                                orders: true,
                                page_order: page,
                                field_search: field_search,
                                value_search: value_search,
                                status: status,
                            },
                            success: function(data) {
                                if (data.code == 401) {
                                    swal({
                                        title: "Mã xác thực hết hạn. Load lại trang",
                                        type: "warning",
                                        icon: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#fca901",
                                        confirmButtonText: "Exit",
                                        closeOnConfirm: true
                                    }).then(()=>{
                                        location.reload()
                                    })
                                } else {
                                    $("#list-orders").empty();
                                    // $("#fix-paginate-order").empty()
                                    if (data.list_orders.data.length) {
                                        $.each(data.list_orders.data, function(index, value) {
                                            var sender_name ='';
                                            var consignee = '';
                                            var tel = '';
                                            var full_address ='';
                                            if(value.shipment_info!=null){
                                                sender_name = value.shipment_info.sender_name
                                                consignee = value.shipment_info.consignee
                                                tel = value.shipment_info.tel;
                                                full_address=value.shipment_info.full_address;
                                            }
                                            if (value.note == null) {
                                                var note = "";
                                            } else {
                                                note = value.note
                                            }
                                            if (value.trackings.length) {
                                                var tracking_id = value
                                                    .trackings[0].id;
                                            } else {
                                                var tracking_id = "";
                                            }
                                            var background = setBackground(value.status.id)
                                            $("#list-orders").append(
                                                '<tr class="text-center addHover detail-order" data-id="' +
                                                value.id +'" id="order-' + value.id + '">' +
                                                '<td>' + data.list_orders.from++ +'</td>' +
                                                '<td>' + `<span class="${background}">` + value.status.name + '</span></td>' +
                                                '<td>' + tracking_id +'</td>' +
                                                '<td>' + sender_name +'</td>' +
                                                '<td>' + consignee +'</td>' +
                                                '<td>' + tel +'</td>' +
                                                '<td>' + full_address +'</td>' +
                                                '<td>' + value.shipment_method_id + '</td>' +
                                                '<td>' + note +'</td>' +
                                                '<td>' + value.created_at + '</td>' +
                                                '</tr>'
                                            )
                                        })
                                    }
                                    refresh({
                                        total: data.list_orders.total,
                                        length: data.list_orders.per_page
                                    });
                                }

                            },
                            error: function(response) {
                                console.log(response)
                            }
                        })
                    }
                })

            })

            $(document).on('click', '.detail-order', function(event) {
                event.preventDefault();
                let order_id = $(this).data('id');
                window.location.href = "../orders/" + order_id;
            });


            $("#select_search").change(function() {
                var field_search = ($(this).val());
                $("#type_input").show()
                $("#list-status").hide()
                if (field_search == "created_at") {
                    // $("#type_input").prop('type', 'date')
                    $("#type_input").datepicker({
                        format: 'dd-mm-yyyy',
                        timepicker: false
                    });
                    $("#type_input").val('')
                } else {
                    $("#type_input").datepicker('destroy');
                    $("#type_input").val('')
                }

                if (field_search == "director.status.id") {
                    $("#list-status").empty()
                    $.ajax({
                        type: "GET",
                        url: "{{ route('orders.listStatus') }}",
                        success: function(data) {
                            $.each(data.listStatus, function(index, value) {
                                $("#list-status").append(new Option(value.name, value
                                    .id))
                            })
                        },
                        error: function(response) {

                        }
                    })
                    $("#type_input").hide()
                    $("#list-status").show()
                }
            })

            $("#reset_order").click(function() {
                $("#select_search").val('all').change()
            })
        })

        //set bg
        function setBackground(status){
            var background = '';
            switch(status){
                case "Pending":
                    background = "bg-warning p-2 rounded text-white";
                    break;
                case "Approved":
                    background ="bg-success p-2 rounded text-white";
                    break;
                case "ReceivedAtWarehouse":
                    background ="bg-primary p-2 rounded text-white";
                    break;
                case "Paid":
                    background ="bg-white p-2 rounded text-white";
                    break;
                case "Finish":
                    background ="bg-secondary p-2 rounded text-white";
                    break;
                case "Cancelled":
                    background ="bg-danger p-2 rounded text-white";
                    break;
                default:
                    background =""
            }
            return background;
        }


        function fetch_data_order(page) {
            $.ajax({
                type: "GET",
                url: "{{ route('orders.index') }}",
                data: {
                    orders: true,
                    page_order: page
                },
                success: function(data) {
                    if (data.code == 401) {
                        swal({
                            title: "Mã xác thực hết hạn. Load lại trang",
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        }).then(()=>{
                            location.reload()
                        })
                    } else {
                        $("#list-orders").empty()
                        // $("#fix-paginate-order").empty()
                        if (data.list_orders.data.length) {

                            $.each(data.list_orders.data, function(index, value) {
                                var sender_name ='';
                                var consignee = '';
                                var tel = '';
                                var full_address ='';
                                if(value.shipment_info!=null){
                                    sender_name = value.shipment_info.sender_name
                                    consignee = value.shipment_info.consignee
                                    full_address=value.shipment_info.full_address;
                                }

                                if (value.note == null) {
                                    var note = "";
                                } else {
                                    note = value.note
                                }
                                if (value.trackings.length) {
                                    var tracking_id = value.trackings[0].id;
                                } else {
                                    var tracking_id = "";
                                }

                                var background = setBackground(value.status.id);
                                $("#list-orders").append(
                                    '<tr class="text-center addHover detail-order" data-id="' +
                                    value.id + '" id="order-' + value.id + '"">' +
                                        '<td>' + data.list_orders.from++ + '</td>' +
                                        '<td>'+ `<span class="${background}">` + value.status.name + '</span></td>' +
                                        '<td>' + tracking_id + '</td>' +
                                        '<td>' + sender_name +'</td>' +
                                        '<td>' + consignee +'</td>' +
                                        '<td>' + tel+ '</td>' +
                                        '<td>' + full_address+'</td>' +
                                        '<td>' + value.shipment_method_id + '</td>' +
                                        '<td>' + note + '</td>' +
                                        '<td>' + value.created_at + '</td>' +
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

    </script>
@endsection

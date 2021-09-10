@extends('modules_manager.main_new')
@section('title', 'Chi tiết gom hàng')
@section('title-header-content', 'Chi tiết lô ' . $data['id'])
@section('css')
    <style>
        .bg-info-custom {
            background-color: #e6f7ff !important;
        }

        .color-custom {
            color: black !important;
        }

        .currency-corlor-custom {
            color: darkslateblue !important;
        }

        .height-custom {
            max-height: 600px;
            overflow-y: auto;
        }

        .bg-warning-custom {
            background-color: #fff1b8;
        }

        .font-size-custom {
            font-size: 13px;
        }

        .font-size-custom-info {
            font-size: 15px;
        }

        .font-size-custom-tracking {
            font-size: 17px;
        }

        .font-size-status {
            font-size: 16px !important;
        }

        .set-height-list-orders {
            max-height: 1000px;
        }

        .overflow-custom-orders {
            overflow-y: auto;
        }

        .border-left-custom {
            border-left: 3px solid #dee2e6 !important;
        }

    </style>
@section('content')
    {{-- {{ dd($data) }} --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="car-header border-bottom">
                    <div class="card-title d-flex align-items-center">
                        <div class="card-label mt-3 pl-4">
                            Thông tin chung
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row ">
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Tên lô hàng</label>
                            <input type="text" class="form-control color-custom" value="{{ $data['id'] }}" readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Ngày bắt đầu</label>
                            <input type="text" class="form-control color-custom" value="{{ $data['start_date'] }}"
                                readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Ngày kết thúc</label>
                            <input type="text" class="form-control color-custom" value="{{ $data['end_date'] }}" readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí ship đường bay</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['price_shipping_fee_air']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí ship đường biển</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['price_shipping_fee_sea']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="car-header border-bottom">
                    <div class="card-title">
                        <div class="card-label mt-3 pl-4">
                            Các loại chi phí
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row" style="max-height: 800px; overflow:auto">
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí dịch vụ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['service_fee']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí dịch vụ cần thanh toán</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['service_fee_outstanding']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí dịch vụ đã ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['service_fee_debited']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí dịch vụ cần ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['service_fee_unsolved']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng đã thanh toán</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_paid']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng cần thanh toán</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_outstanding']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng đã ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_debited']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng cần ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_unsolved']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng bay</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_air']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí giao hàng biển</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['shipping_fee_sea']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí đền bù đã ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['compensation_debited']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí đền bù cần ghi nợ</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control color-custom"
                                    value="{{ number_format($data['compensation_unsolved']) }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold currency-corlor-custom">VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="car-header border-bottom">
                    <div class="card-title">
                        <div class="card-label mt-3 pl-4">
                            Danh sách đơn hàng:
                        </div>
                    </div>
                </div>
                {{-- {{ dd($obj_boxes) }} --}}

                <div class="card-body fix-overflow">
                    <div class="set-height-list-orders overflow-custom-orders">
                        @if (!empty($data['orders']))
                            @foreach ($data['orders'] as $item)
                                @php
                                    switch ($item['status']['id']) {
                                        case 'Pending':
                                            $background = 'bg-warning rounded text-white';
                                            break;
                                        case 'Approved':
                                            $background = 'bg-success rounded text-white';
                                            break;
                                        case 'ReceivedAtWarehouse':
                                            $background = 'bg-primary rounded text-white';
                                            break;
                                        case 'Paid':
                                            $background = 'bg-info rounded text-white';
                                            break;
                                        case 'Finish':
                                            $background = 'bg-secondary rounded text-white';
                                            break;
                                        case 'Cancelled':
                                            $background = 'bg-danger rounded text-white';
                                            break;
                                        default:
                                            $background = '';
                                    }
                                @endphp
                                <div class="bg-white">
                                    <div class="m-2 p-2 bg-info-custom rounded">
                                        <div class="row col-md-12 d-flex ">
                                            <div class="col-md-3 text-primary">
                                                <a href="{{ route('orders.show', ['order' => $item['id']]) }}">{{ $item['id'] }}
                                                </a>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center font-size-custom-info">
                                                <i class="fa fa-user-circle-o"></i>
                                                <span>{{ $item['shipment_info']['consignee'] }}</span>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center font-size-custom-info">
                                                <i class="fa fa-user-circle-o"></i><span>{{ $item['shipment_info']['sender_name'] }}
                                                </span>
                                            </div>

                                            <div class="col-md-3 d-flex p-1 align-items-center font-size-status ">
                                                <span class="{{ $background }} p-1">{{ $item['status']['name'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 d-flex">
                                            <div class="col-md-3 text-uppercase text-danger">
                                                {{ $item['shipment_method_id'] }}
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center font-size-custom-info">
                                                <i class="fa fa-volume-control-phone" style="color: turquoise"></i>
                                                <span>{{ $item['shipment_info']['tel'] }}</span>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center font-size-custom-info">
                                                <i class="fa fa-volume-control-phone" style="color: turquoise"></i>
                                                <span>{{ $item['shipment_info']['sender_tel'] }}</span>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 d-flex font-size-custom-tracking justify-content-between">
                                            @if (!empty($item['trackings']))

                                                @foreach ($item['trackings'] as $item_tracking)
                                                    <div class="col-md-4">Tracking: <span
                                                            id="tracking-id">{{ $item_tracking['id'] }}</span></div>
                                                @endforeach
                                            @endif
                                            <div class="col-md-5 font-size-custom-info d-lfex" style="color: red">
                                                <i class="fa fa-map-marker"></i>
                                                <span>{{ $item['shipment_info']['full_address'] }}</span>
                                            </div>
                                            <div class="col-md-3 font-size-custom-info">
                                                <u>{{ $item['type']['name'] }}</u>
                                            </div>
                                        </div>

                                        @isset($item['quantity_box'])
                                            @if ($item['quantity_box'] > 0)
                                                <div class="col-md-12 d-flex bg-warning-custom font-size-custom justify-content-between"
                                                    id="box_owner">
                                                    <div class="col-md-3">
                                                        <b>Số thùng: </b>{{ $item['quantity_box'] }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        <b>Tổng thể tích: </b>{{ $item['volumne'] . ' m3' }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        <b>Tổng khối lượng: </b>{{ $item['total_weight'] . ' Kg' }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="javascript:" data-id="{{ $item['id'] }}"
                                                            onclick="showInfoOrder(this)" data-toggle="modal"
                                                            data-target=".modal-tracking">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endisset
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="car-header border-bottom">
                    <div class="card-title">
                        <div class="card-label mt-3 pl-4">
                            Lịch sử nộp tiền
                        </div>
                    </div>
                </div>
                <div class="card-body fix-overflow">
                    <table class="table table-striped border-bottom">
                        <thead>
                            <tr>
                                <th scope="col">Thông tin chung</th>
                                <th scope="col">Số tiền</th>
                                <th scope="col">Mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($data['transactions']))
                                @foreach ($data['transactions'] as $item_transaction)
                                    <tr>
                                        <td>
                                            <div class="" style="min-width: 200px">
                                                <div>
                                                    <span>Mã: </span>
                                                    <span class="text-danger font-weight-bold">
                                                        {{ $item_transaction['id'] }}
                                                    </span>
                                                    <span class="text-primary text-uppercase font-weight-bold">
                                                        {{ '-' . $item_transaction['type']['name'] }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>Ngày tạo: </span>
                                                    <span class="text-uppercase font-weight-bold">
                                                        {{ $item_transaction['created_at'] }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>Tài khoản</span>
                                                    <span class="text-uppercase font-weight-bold">
                                                        {{ $item_transaction['objectable_id'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ number_format($item_transaction['amount']) . ' ' . $item_transaction['currency_id'] }}
                                        </td>
                                        <td>
                                            {{ $item_transaction['description'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="car-header border-bottom">
                    <div class="card-title">
                        <div class="card-label mt-3 pl-4">
                            Lịch sử gom hàng
                        </div>
                    </div>
                </div>
                <div class="card-body fix-overflow">
                    <div class="row">
                        <ul class="timeline">

                            @if (!empty($data['logs']))
                                @foreach ($data['logs'] as $log_item)
                                    @if ($log_item['type_id'] == 'created' && array_key_exists('id', $log_item['content']))
                                        <li>
                                            <a>Tạo lô gom hàng</a>
                                            <p>{{ $log_item['created_at'] }}</p>
                                        </li>
                                    @else
                                        @foreach ($log_item['content'] as $key => $log_item_log)
                                            @php
                                                switch ($key) {
                                                    case 'price_shipping_fee_sea':
                                                        $description = 'Cập nhật giá ship đường biển';
                                                        break;
                                                    case 'price_shipping_fee_air':
                                                        $description = 'Cập nhật giá ship đường bay';
                                                        break;
                                                    case 'customer_id':
                                                        $description = 'Cập nhật khách hàng';
                                                        break;
                                                    case 'start_date':
                                                        $description = 'Cập nhật ngày bắt đầu';
                                                        break;
                                                    case 'end_date':
                                                        $description = 'Cập nhật ngày kết thúc';
                                                        break;
                                                    case 'cloesd':
                                                        $description = 'Lô hàng đã đóng';
                                                        break;
                                                    default:
                                                        $description = '';
                                                }
                                            @endphp
                                            @if (!empty($description))
                                                <li>
                                                    <a>{{ $description . ' ' . $log_item_log }}</a>
                                                    <p>{{ $log_item['updated_at'] }}</p>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-tracking" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thùng hàng được phân cho đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-between p-2 bg-warning-custom  font-size-custom">
                            <div>
                                <b>Số thùng: </b><span id="quanity_boxes"></span>
                            </div>
                            <div>
                                <b>Tổng thể tích: </b><span id="volumne_boxes"></span>
                            </div>
                            <div>
                                <b>Tống khối lượng: </b><span id="weight_boxes"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group height-custom">
                        <div class="d-flex align-items-center">
                            <small>Tracking: </small><span class="text-danger" id="id_tracking"></span>
                        </div>
                        <div class="border-left-custom ml-2" id="list_boxes">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#loader").show();
            });
            $(document).ajaxStop(function() {
                $("#loader").hide();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
            });
        });

        //function

        function showInfoOrder(obj) {
            let order_id = $(obj).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('contract.getBoxes') }}",
                data: {
                    order_id: order_id,
                },
                success: function(response) {
                    if (response.code == 401) {
                        swal({
                            title: "Vui lòng đăng nhập lại",
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        }).then((check) => {
                            window.location.href = "{{ route('auth.logout') }}"
                        })
                    }
                    if (response.data?.total) {
                        let boxes_total = 0;
                        let volume_total = 0;
                        let weight = 0;
                        $("#list_boxes").empty()
                        $.each(response.data.data, function(index, value) {
                            boxes_total += value.quantity_of_owners;
                            volume_total += (value.volume_per_box * value.quantity_of_owners) / 1000000;
                            weight += value.weight_per_box * value.quantity_of_owners;
                            var box = infoSku(value);
                            $("#list_boxes").append(box)
                        })
                        $("#id_tracking").text($("#tracking-id").text())
                        $("#quanity_boxes").text(boxes_total);
                        $("#volumne_boxes").text(volume_total.toFixed(3) + ' m3');
                        $("#weight_boxes").text(weight.toFixed(3) + 'Kg')
                    }

                },
                error: function(response) {
                    if (response.status == 419) {
                        swal({
                            title: "Vui lòng load lại trang",
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                    }
                    console.log(response)
                }
            });
        }

        function infoSku(data) {
            let html = '';
            html =
                '<div class="pl-3 d-flex justify-content-start border-top border-right">' +
                '<div class="d-flex align-items-center">' +
                `<small>SKU: </small><span class="text-warning">${data.id}</span>` +
                '</div>' +

                '<div class="form-gorup ml-2">' +
                '<div class="d-flex align-items-center">' +
                `<small>Kích thước: </small><span class="font-size-status pl-3">${data.length +' x '+ data.width +' x '+ data.height}</span>` +
                '</div>' +
                '<div class="d-flex align-items-center">' +
                '<div>' +
                `<small>Thể tích: </small><span class="font-size-status">${(data.volume_per_box/1000000)}</span>` +
                '</div>' +
                '<div class="ml-3">' +
                `<small>Khối lượng: </small><span class="font-size-status">${data.weight_per_box + ' Kg'}</span>` +
                '</div>' +
                '</div>' +
                '<div class="d-flex align-items-center">' +
                '<div>' +
                `<small>Số lượng: </small><span class="font-size-status">${data.quantity_of_owners}</span>` +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            return html;
        }

    </script>
@endsection

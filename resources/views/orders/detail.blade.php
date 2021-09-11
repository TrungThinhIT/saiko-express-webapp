@extends('modules_manager.main_new')
@section('title', 'Chi tiết đơn hàng')
@section('title-header-content', 'Chi tiết đơn hàng')
@section('css')
    <style>
        .form-group {
            margin-bottom: 0 !important;
        }

        .row .col-sm-8 input {
            font-weight: 600;
        }

        .stretch-card {
            justify-content: unset;
        }

        .form-check label,
        .form-group label {
            white-space: unset !important;
        }

        .font-size-card {
            font-size: 14px;
        }

        .set-height-card {
            max-height: 380px;
            overflow: auto;
        }

        .unset-padding-left-row {
            padding-left: unset !important;
        }

        @media (max-width:1376px) {
            .fix-reponsive {
                width: 100% !important;
            }
        }

        .fix-float-right {
            float: right;
        }

        #btn-return :hover {
            background-color: orange !important;
        }

    </style>
@section('content')
    @if (count($data['order']['data']))
        @foreach ($data['order']['data'] as $key => $value)
            <div class="col-md-12">
                <div class="card fix-overflow">

                    <div class="card-header ">
                        <div class="row">
                            <div class="col-md-10">
                                Thông tin đơn hàng
                            </div>
                            <div class="col-md-2 ">
                                <button class="btn btn-secondary fix-float-right" id="btn-return"
                                    onclick="window.history.back()">Trở
                                    về</button>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($value) }} --}}

                    <div class="card-body custom-background set-overflow">
                        <div class="row">
                            <div class="col-md-6 ">
                                <form>
                                    <div class="form-group row align-items-center">
                                        <label for="order-id" class="col-sm-4 col-form-label">Mã đơn</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="order-id"
                                                value="{{ $value['id'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="tracking-id" class="col-sm-4 col-form-label">Mã tracking</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="tracking-id" @if (isset($value['trackings'][0]['id'])) value="{{ $value['trackings'][0]['id'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="status" class="col-sm-4 col-form-label">Trạng thái</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="status"
                                                value="{{ $value['status']['name'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="insuarance-price" class="col-sm-4 col-form-label">Tiền báo giá bảo
                                            hiểm</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="insuarance-price" @if ($value['insurance_declaration']) value="{{ number_format($value['insurance_declaration']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="special-goods-price" class="col-sm-4 col-form-label">Tiền báo giá
                                            hàng
                                            đặc
                                            biệt</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="special-goods-price" @if ($value['special_declaration']) value="{{ number_format($value['special_declaration']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="trip-id" class="col-sm-4 col-form-label">PTVC</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="trip-id"
                                                value="{{ $value['shipment_method_id'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="note" class="col-sm-4 col-form-label">Ghi chú</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="note"
                                                value="{{ $value['note'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="created_at" class="col-sm-4 col-form-label">Ngày đặt</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="created_at"
                                                value="{{ $value['created_at'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="updated_at" class="col-sm-4 col-form-label">Cập nhật cuối
                                            cùng</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="updated_at"
                                                value="{{ $value['updated_at'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money" class="col-sm-4 col-form-label">Tiền hàng</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money" @if ($value['cost_of_goods'] > 0) value="{{ number_format($value['cost_of_goods']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money-paid" class="col-sm-4 col-form-label">Tiền hàng
                                            đã
                                            thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money-paid" @if ($value['cost_of_goods_paid'] > 0) value="{{ number_format($value['cost_of_goods_paid']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="cost_of_goods_debited" class="col-sm-4 col-form-label">Tiền hàng
                                            đã ghi nợ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="cost_of_goods_debited" @if ($value['cost_of_goods_debited']) value="{{ number_format($value['cost_of_goods_debited']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="cost_of_goods_unsolved" class="col-sm-4 col-form-label">Tiền hàng
                                            cần ghi nợ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="cost_of_goods_unsolved" @if ($value['cost_of_goods_unsolved']) value="{{ number_format($value['cost_of_goods_unsolved']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money-outstanding" class="col-sm-4 col-form-label">Tiền hàng cần
                                            thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money-outstanding"
                                                @if ($value['cost_of_goods_outstanding']) value="{{ number_format($value['cost_of_goods_outstanding']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="compensation" class="col-sm-4 col-form-label">Tiền đền bù hàng
                                            hóa</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation" @if ($value['compensation']) value="{{ number_format($value['compensation']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="compensation-paid" class="col-sm-4 col-form-label">Tiền đền bù đã ghi
                                            nợ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation-paid" @if ($value['compensation_debited'] > 0) value="{{ number_format($value['compensation_debited']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="compensation-outstanding" class="col-sm-4 col-form-label">Tiền đền bù
                                            cần trả cho khách
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation-outstanding"
                                                @if ($value['compensation_unsolved'] > 0) value="{{ number_format($value['compensation_unsolved']) . '  JPY' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="insurance_fee" class="col-sm-4 col-form-label">Phí bảo hiểm</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="insurance_fee" @if ($value['insurance_fee'] > 0) value="{{ number_format($value['insurance_fee']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="special_fee" class="col-sm-4 col-form-label">Phí hàng háo đặc
                                            biệt</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="special_fee" @if ($value['special_goods_fee'] > 0) value="{{ number_format($value['special_goods_fee']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_boxes" class="col-sm-4 col-form-label">Phí dịch vụ hàng
                                            hóa</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_boxes" @if ($value['service_fee_boxes'] > 0) value="{{ number_format($value['service_fee_boxes']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee" class="col-sm-4 col-form-label">Phí dịch vụ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee" @if ($value['service_fee'] > 0) value="{{ number_format($value['service_fee']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_paid" class="col-sm-4 col-form-label">Tiền phí dịch vụ đã
                                            thanh toán
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_paid" @if ($value['service_fee_paid'] > 0) value="{{ number_format($value['service_fee_paid']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_debited" class="col-sm-4 col-form-label">Tiền phí dịch
                                            vụ
                                            đã ghi nợ
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_debited" @if ($value['service_fee_debited'] > 0) value="{{ number_format($value['service_fee_debited']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_outstanding" class="col-sm-4 col-form-label">Tiền phí dịch
                                            vụ cần thanh toán
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_outstanding"
                                                @if ($value['service_fee_outstanding'] > 0) value="{{ number_format($value['service_fee_outstanding']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_unsolved" class="col-sm-4 col-form-label">Tiền phí dịch
                                            vụ cần ghi nợ
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_unsolved" @if ($value['service_fee_unsolved'] > 0) value="{{ number_format($value['service_fee_unsolved']) . '  VND' }}" @endif>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-lfex form-group">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                Thông tin giao hàng
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <label for="consignee" class="col-sm-4 col-form-label">Tên người nhận</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="consignee"
                                            @isset($value['shipment_info']['consignee'])
                                            value="{{ $value['shipment_info']['consignee'] }}" @endisset>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="address" class="col-sm-4 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="address"
                                            @isset($value['shipment_info']['full_address'])
                                            value="{{ $value['shipment_info']['full_address'] }}" @endisset>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="tel-consignee" class="col-sm-4 col-form-label">Số điện thoại người
                                        nhận</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="tel-consignee"
                                            @isset($value['shipment_info']['tel'])
                                            value="{{ $value['shipment_info']['tel'] }}" @endisset>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="sender_name" class="col-sm-4 col-form-label">Tên người gửi</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="sender_name"
                                            @isset($value['shipment_info']['sender_name'])
                                            value="{{ $value['shipment_info']['sender_name'] }}" @endisset>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="sender_tel" class="col-sm-4 col-form-label">Số điện thoại người gửi</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="sender_tel"
                                            @isset($value['shipment_info']['sender_tel'])
                                            value="{{ $value['shipment_info']['sender_tel'] }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($data) }} --}}
                    <div class="col-md-6 ">
                        <div class="card h-100">
                            <div class="card-header">
                                Danh sách vận đơn
                            </div>
                            <div class="card-body font-size-card set-height-card">
                                @if (count($value['owning_boxes']))
                                    @foreach ($value['owning_boxes'] as $key_owning => $value_owning)
                                        @if (isset($value_owning['pivot_lading_bills'][0]))
                                            <div class="card">
                                                <div class="card-header">
                                                    Mã vận đơn:
                                                    {{ $value_owning['pivot_lading_bills'][0]['lading_bill_id'] }}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row pl-4">
                                                        Mã SKU:{{ $value_owning['box_id'] }}
                                                    </div>
                                                    <div class="row pl-4">
                                                        Số lượng được phân vào vận
                                                        đơn:{{ $value_owning['quantity_in_lading_bills'] }}
                                                    </div>
                                                    <div class="row pl-4">
                                                        Số lượng được phân cho
                                                        đơn:{{ $value_owning['quantity'] }}
                                                    </div>
                                                    <div class="row pl-4">
                                                        <div class="col-sm-6 unset-padding-left-row">
                                                            Chi phí lưu
                                                            trữ:{{ $value_owning['pivot_lading_bills'][0]['storage_cost'] }}
                                                        </div>
                                                        <div class="col-sm-6">
                                                            Phụ phí:
                                                            {{ $value_owning['pivot_lading_bills'][0]['additional_cost'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row pl-4">
                                                        Tiền cước vận chuyển phải
                                                        thu:{{ $value_owning['pivot_lading_bills'][0]['service_fee'] }}
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-lfex form-group">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">
                                Giao dịch phát sinh
                            </div>
                            <div class="card-body fix-overflow">
                                <div class="">
                                    @if (isset($value['transactions']))
                                        @if (count($value['transactions']))
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tin nhắn</th>
                                                        <th scope="col">Số tiền</th>
                                                        <th scope="col">Nội dung</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($value['transactions'] as $key_transaction => $value_transaction)
                                                        <tr>
                                                            <td>
                                                                <div class="row d-block">
                                                                    <div class="col-md-3 fix-reponsive">
                                                                        Người thực hiện:
                                                                    </div>
                                                                    <div class="col-md-9 fix-reponsive">
                                                                        <b>{{ $value_transaction['prepared_by_id'] }}</b>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-block">
                                                                    <div class="col-sm-3 fix-reponsive">
                                                                        Ngày thực hiện:
                                                                    </div>
                                                                    <div class="col-sm-9 fix-reponsive">
                                                                        <b>{{ $value_transaction['created_at'] }}</b>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ number_format($value_transaction['amount']) . ' ' . $value_transaction['currency_id'] }}
                                                            </td>
                                                            <td>
                                                                {{ $value_transaction['description'] }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                        @endif
                                    @endif

                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card h-100">
                            <div class="card-header">
                                Lịch sử giao dịch
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between fix-overflow">
                                @if (isset($value['log_transaction']))
                                    @if (count($value['log_transaction']))
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Người thực hiện</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Nội dung</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($value['log_transaction'] as $value_log)
                                                    <tr>
                                                        <td>
                                                            <b class="">{{ $value_log['creator_id'] }}</b>
                                                        </td>
                                                        <td>
                                                            {{ $value_log['created_at'] }}
                                                        </td>
                                                        <td>
                                                            @isset($value_log['content']['transaction'])
                                                                {{ $value_log['content']['transaction']['description'] }}
                                                            @endisset
                                                        </td>
                                                        {{-- {{ dd($a) }} --}}
                                                        {{-- <div class="row order-log-card">
                                                            <div class="col-12">
                                                                <div class="">
                                                                    <p class="" style="color: rgb(177, 141, 28);">
                                                                       </p>
                                                                    <p>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    @endif
    <script>
        $(window).load(function() {
            $('#remove-stretch-card').removeClass('stretch-card')
        })

    </script>
@endsection

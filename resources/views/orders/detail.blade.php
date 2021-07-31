@extends('modules_manager.main')
@section('title', 'Chi tiết đơn hàng')
@section('css')
    <style>
        .form-group {
            margin-bottom: 0 !important;
        }

        .stretch-card {
            justify-content: unset;
        }

    </style>
@section('content')
    @if (count($data['order']['data']))
        @foreach ($data['order']['data'] as $key => $value)
            {{-- {{ dd($value) }} --}}
            <div class="col-md-12 p-3">
                <div class="card fix-overflow">
                    <div class="card-header ">
                        Thông tin đơn hàng
                    </div>
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
                                            <input type="text" readonly class="form-control" id="tracking-id"
                                                value="{{ $value['trackings'][0]['id'] }}">
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
                                            <input type="text" readonly class="form-control" id="insuarance-price"
                                                value="{{ number_format($value['insurance_declaration']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="special-goods-price" class="col-sm-4 col-form-label">Tiền báo giá hàng
                                            đặc
                                            biệt</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="special-goods-price"
                                                value="{{ number_format($value['special_declaration']) }}">
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
                                        <label for="updated_at" class="col-sm-4 col-form-label">Cập nhật cuối cùng</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="updated_at"
                                                value="{{ $value['updated_at'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money" class="col-sm-4 col-form-label">Tiền hàng</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money"
                                                value="{{ number_format($value['cost_of_goods']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money-paid" class="col-sm-4 col-form-label">Tiền hàng đã thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money-paid"
                                                value="{{ number_format($value['cost_of_goods_paid']) }}">
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-6">
                                <form>

                                    <div class="form-group row align-items-center">
                                        <label for="goods-money-paid" class="col-sm-4 col-form-label">Tiền hàng đã thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money-paid"
                                                value="{{ number_format($value['cost_of_goods_paid']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="goods-money-outstanding" class="col-sm-4 col-form-label">Tiền hàng cần
                                            thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="goods-money-outstanding"
                                                value="{{ number_format($value['cost_of_goods_outstanding']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="compensation" class="col-sm-4 col-form-label">Tiền đền bù hàng
                                            hóa</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation"
                                                value="{{ number_format($value['compensation']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="compensation-paid" class="col-sm-4 col-form-label">Tiền đền bù đã thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation-paid"
                                                value="{{ number_format($value['compensation_paid']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="compensation-outstanding" class="col-sm-4 col-form-label">Tiền đền bù
                                            cần
                                            trả</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="compensation-outstanding"
                                                value="{{ number_format($value['compensation_outstanding']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="insurance_fee" class="col-sm-4 col-form-label">Phí bảo hiểm</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="insurance_fee"
                                                value="{{ number_format($value['insurance_fee']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="special_fee" class="col-sm-4 col-form-label">Phí hàng háo đặc
                                            biệt</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="special_fee"
                                                value="{{ number_format($value['special_goods_fee']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_boxes" class="col-sm-4 col-form-label">Phí dịch vụ hàng
                                            hóa</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_boxes"
                                                value="{{ number_format($value['service_fee_boxes']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee" class="col-sm-4 col-form-label">Phí dịch vụ</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee"
                                                value="{{ number_format($value['service_fee']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_paid" class="col-sm-4 col-form-label">Tiền phí dịch vụ đã
                                            thanh
                                            toán</label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_paid"
                                                value="{{ number_format($value['service_fee_paid']) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="service_fee_outstanding" class="col-sm-4 col-form-label">Tiền phí dịch
                                            vụ
                                            cần
                                            thanh
                                            toán
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" readonly class="form-control" id="service_fee_outstanding"
                                                value="{{ number_format($value['service_fee_outstanding']) }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- {{dd($data)}} --}}
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
                                            value="{{ $value['shipment_info']['consignee'] }}">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="address" class="col-sm-4 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="address"
                                            value="{{ $value['shipment_info']['full_address'] }}">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="tel-consignee" class="col-sm-4 col-form-label">Số điện thoại người
                                        nhận</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="tel-consignee"
                                            value="{{ $value['shipment_info']['tel'] }}">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="sender_name" class="col-sm-4 col-form-label">Tên người gửi</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="sender_name"
                                            value="{{ $value['shipment_info']['sender_name'] }}">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="sender_tel" class="col-sm-4 col-form-label">Số điện thoại người gửi</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control" id="sender_tel"
                                            value="{{ $value['shipment_info']['sender_tel'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card h-100">
                            <div class="card-header">
                                Danh sách vận đơn
                            </div>
                            <div class="card-body">

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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tin nhắn</th>
                                                <th scope="col">Số tiền</th>
                                                <th scope="col">Nội dung</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                            <div class="card-body ">

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

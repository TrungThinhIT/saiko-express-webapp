@extends('modules_manager.main_new')
@section('title', 'Tài khoản tiền')
@section('title-header-content','Chi tiết tài khoản')
@section('css')
    <style>
        .row .col-sm-8 input {
            font-weight: 600;
        }

    </style>
@section('content')
    {{-- {{ dd($data) }} --}}
    @if (isset($data['transactions']))
        <div class="col-md-12">
            <div class="row">
                @if (count($data['transactions']['data']))
                    @foreach ($data['transactions']['data'] as $key => $value)
                        {{-- {{dd($value)}} --}}
                        <div class="col-md-6">
                            <div class="card fix-overflow">
                                <div class="card-header ">
                                    Tiền {{ $value['currency']['name'] }}
                                </div>
                                <div class="card-body custom-background set-overflow">
                                    <form>
                                        <div class="form-group row align-items-center">
                                            <label for="order-id" class="col-sm-4 col-form-label">Số dư</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['balance']) ? number_format($value['balance']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="tracking-id" class="col-sm-4 col-form-label">Tổng tiền nộp</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_deposit']) ? number_format($value['total_deposit']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="status" class="col-sm-4 col-form-label">Tiền thanh toán đơn bán
                                                hàng</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_payment_sale']) ? number_format($value['total_payment_sale']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="insuarance-price" class="col-sm-4 col-form-label">Tiền thanh toán
                                                đơn
                                                mua
                                                hàng</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_payment_purchase']) ? number_format($value['total_payment_purchase']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="special-goods-price" class="col-sm-4 col-form-label">Tiền thanh toán
                                                dịch
                                                vụ</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_payment_service']) ? number_format($value['total_payment_service']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="trip-id" class="col-sm-4 col-form-label">Tổng tiền thanh
                                                toán</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_payment']) ? number_format($value['total_payment']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="money-refund-jpy" class="col-sm-4 col-form-label">Tổng tiền hoàn
                                                trả</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['total_compensation']) ? number_format($value['total_compensation']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
@endsection

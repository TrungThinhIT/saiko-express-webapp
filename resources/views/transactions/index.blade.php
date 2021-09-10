@extends('modules_manager.main_new')
@section('title', 'Tài khoản tiền')
@section('title-header-content', 'Chi tiết tài khoản')
@section('css')
    <style>
        .row .col-sm-8 input {
            font-weight: 600;
        }

        .form-group label {
            white-space: unset !important;
        }

    </style>
@section('content')
    @if (isset($data['transactions']))
        <div class="col-md-12">
            <div class="row">
                @if (count($data['transactions']['data']))
                    @foreach ($data['transactions']['data'] as $key => $value)
                        <div class="col-md-6">
                            <div class="card fix-overflow">
                                <div class="card-header ">
                                    Tiền {{ $value['currency']['name'] }}
                                </div>
                                <div class="card-body custom-background set-overflow">
                                    <form>
                                        <div class="form-group row align-items-center">
                                            <label for="order-id" class="col-sm-4 col-form-label">Số dư trong tài
                                                khoản</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['balance']) ? number_format($value['balance']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="order-id" class="col-sm-4 col-form-label">Số dư đầu kỳ</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['opening_balance']) ? number_format($value['opening_balance']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="tracking-id" class="col-sm-4 col-form-label">Tổng tiền nộp</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['deposit']) ? number_format($value['deposit']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="status" class="col-sm-4 col-form-label">Tiền đơn hàng đã ghi
                                                nợ</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['order']) ? number_format($value['order']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="status" class="col-sm-4 col-form-label">Tiền đơn hàng đã thanh toán
                                            </label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['payment_order']) ? number_format($value['payment_order']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="special-goods-price" class="col-sm-4 col-form-label">Tiền dịch vụ đã
                                                ghi nợ</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['service']) ? number_format($value['service']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="special-goods-price" class="col-sm-4 col-form-label">Tiền dịch vụ đã
                                                thanh toán</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['payment_service']) ? number_format($value['payment_service']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="trip-id" class="col-sm-4 col-form-label">Tiền đã trả lại</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['withdraw']) ? number_format($value['withdraw']) . '   ' . $value['currency']['symbol'] : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="money-refund-jpy" class="col-sm-4 col-form-label">Tiền được hoàn
                                                trả</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control"
                                                    value="{{ number_format($value['compensation']) ? number_format($value['compensation']) . '   ' . $value['currency']['symbol'] : '' }}">
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
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#loader").show();
            });
            $(document).ajaxStop(function() {
                $("#loader").hide();
            });
        });

    </script>


@endsection

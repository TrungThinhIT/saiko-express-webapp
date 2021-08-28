@extends('modules_manager.main_new')
@section('title', 'Chi tiết gom hàng')
@section('title-header-content', 'Chi tiết lô')
@section('css')
@section('content')
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
                    <div class="form-group row">
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Tên lô hàng</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Ngày bắt đầu</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Ngày kết thúc</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí ship đường bay</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" readonly id="">
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold">VND</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-4">
                            <label for="" class="font-weight-light">Phí ship đường biển</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" readonly id="">
                                <div class="input-group-prepend">
                                    <div class="input-group-text font-weight-bold">VND</div>
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
                            Tiền hàng
                        </div>
                    </div>
                </div>
                <div class="card-body">

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
                <div class="card-body fix-overflow">

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

                </div>
            </div>
        </div>
    </div>
@endsection

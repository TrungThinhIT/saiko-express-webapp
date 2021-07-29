<!DOCTYPE html>

<html>

<body>
    @include('modules.header')
    <style>
        label {
            display: inline-block;
            width: 150px;
        }

        #custom-footer {
            margin-top: 200px;
        }

        @media (max-width:1200px) {
            #form-custom {
                margin-top: 200px !important;
            }
        }

        .panel-heading {
            color: #ffffff !important;
            background-color: #fca901 !important;
            border-color: #fca901 !important;
        }

        #forgot-password {
            color: #ffffff !important;
        }

        .panel-info {
            border-color: #fca901;
        }

        .btn-success {
            background-color: #fca901;
            border-color: #fca901;
        }

        #regis {
            color: #fca901;
        }

        #btn-link-password {
            background-color: #fca901 !important;
            border-color: #fca901;
        }

        #border-color-regis {
            border-color: #fca901 !important;
        }

        #btn-signup {
            background-color: #fca901;
            border-color: #fca901;
        }

        #exit {
            background-color: #fca901;
            border-color: #fca901;
            color: white;
        }

        #reload {
            background-color: #fca901;
            border-color: #fca901;
            color: white;
        }

        .loader {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #fca901;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        .tmn-custom-mask {
            z-index: 1052 !important;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
        }

        .d-none {
            display: none;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .display-result {
            display: none;
        }

        .height-tab {
            height: 100% !important;
        }

        .custom-background {
            background-color: seashell;
        }

        .unset-border-bottom {
            border-bottom: unset !important;
        }

        .set-border-radius {
            border-radius: 3px !important;
            border-collapse: unset;
        }

        .set-overflow {
            overflow: auto;
            border: 1px solid #fca901;
        }

        .custom-icon {
            color: #fca901;
        }

        .custom-paginate {
            display: block;
            float: right;
        }

        .fix-margin {
            margin-right: 8px;
        }

        #header_address {
            color: #202020;
            font-size: 24px;
            font-weight: normal;
        }

        .fix-width-label {
            width: 100%;
        }

        .fix-z-index-modal {
            z-index: 1051 !important;
        }



        .swal-icon--success__ring {
            border-color: #fca901 !important;
        }

        .swal-icon--success__line {
            background-color: #fca901 !important;
        }

        #close-modal-update {
            background-color: silver;
            border-color: unset;
        }

        .swal-button--cancel {
            background-color: silver !important;
            border-color: unset;
        }

        #close-modal-create {
            background-color: silver;
            border-color: unset;
        }

        #modal-update-address {
            overflow: auto;
        }

        #modal-create-address {
            overflow: auto;
        }

    </style>
    <!--Modal: modalConfirmDelete-->
    <div class="modal fix-z-index-modal" id="modalConfirmDelete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                {{-- <!--Header--> --}}

                <!--Body-->
                <div class="modal-body" id="alert-errors">

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button id="exit" class="btn">Thoát</button>
                    {{-- <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a> --}}
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <div class="modal fix-z-index-modal" id="modalReload" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                {{-- <!--Header--> --}}

                <!--Body-->
                <div class="modal-body" id="alert-success">


                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button id="reload" class="btn">Thoát</button>
                    {{-- <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a> --}}
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <div class="wapper">
        <div class="container">
            <div class='col-md-12' id="form-custom" style="margin-top:130px">
                <!-- login/signup box -->
                <h3>Chi tiết người dùng</h3>
                <div class="row">
                    {{-- information --}}
                    <div class="col-md-4">
                        <div id="loginbox" style="margin-top:50px">
                            <div class="panel panel-info">
                                {{-- header --}}
                                <div class="panel-heading">
                                    <div class="panel-title">Thông tin </div>
                                </div>
                                {{-- body --}}
                                <div style="padding-top:30px" class="panel-body">
                                    <form id="update-info-form" method="post" action="" class="form-horizontal"
                                        role="form">
                                        @csrf

                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-3">
                                                <label for="">ID</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="id-info" type="text" readonly class="form-control"
                                                    name="id-fo" value="{{ $data['id'] }}">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-3">
                                                <label for="">Email</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="login-email" type="email" readonly class="form-control"
                                                    name="email-info" value="{{ $data['email'] }}">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-3">
                                                <label for="">Vai trò</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="role-info" type="text" readonly class="form-control"
                                                    name="email" value="{{ $data['role_id'] }}">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-3">
                                                <label for="">Trạng thái</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="status-info" type="text" readonly class="form-control"
                                                    name="email" value="{{ $data['status_id'] }}">
                                            </div>
                                        </div>
                                        {{-- <div class="text-center">
                                        <button id="btn-update-info" type="submit" class="btn btn-success">Cập
                                            nhật</button>
                                    </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- change passsword --}}
                    <div class="col-md-4">
                        <div id="loginbox" style="margin-top:50px">
                            <div class="panel panel-info">
                                {{-- header --}}
                                <div class="panel-heading">
                                    <div class="panel-title">Đổi mật khẩu</div>
                                </div>
                                {{-- body --}}
                                <div style="padding-top:30px" class="panel-body">
                                    <form id="update-password-form" method="post" action="" class="form-horizontal"
                                        role="form">
                                        @csrf

                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-4">
                                                <label for="">Mật khẩu hiện tại</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="old-password" type="password" class="form-control"
                                                    name="old-password" value="" placeholder="Mật khẩu cũ">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-4">
                                                <label for="">Mật khẩu mới</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="new-password" type="password" class="form-control"
                                                    name="new-password" value="" placeholder="Vui lòng nhập mật khẩu">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-4">
                                                <label for="">Xác nhận mật khẩu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password-confirm" value=""
                                                    placeholder="Xác nhận lại mật khẩu">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button id="btn-update-password" type="submit" class="btn btn-success">Cập
                                                nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- debt --}}
                    <div class="col-md-4 ">
                        <div id="loginbox" style="margin-top:50px">
                            <div class="panel panel-info">
                                {{-- header --}}
                                <div class="panel-heading">
                                    <div class="panel-title">Số dư</div>
                                </div>
                                {{-- body --}}
                                <div style="padding-top:30px" class="panel-body">
                                    <form id="transactions" method="post" action="" class="form-horizontal" role="form">
                                        @csrf
                                        @if (count($data['account']['data']))
                                            @foreach ($data['account']['data'] as $key => $value)
                                                <div style="margin-bottom: 25px" class="form-group">
                                                    <div class="col-md-4">
                                                        <label for="">{{ $value['currency_id'] }}</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input readonly type="text" class="form-control"
                                                            value="{{ number_format($value['balance']) }}">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div style="margin-bottom: 25px" class="form-group">
                                                <div class="col-md-4">
                                                    <label for="">VND</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="money-VND" readonly type="text" class="form-control"
                                                        name="money-VND" value="0">
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 25px" class="form-group">
                                                <div class="col-md-4">
                                                    <label for="">JPY</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="money-JPY" readonly type="text" class="form-control"
                                                        name="money-JPY" value="0">
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($data['list_address']))
                <div class="col-md-12 ">
                    <div class="card ">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="header_address">Sổ địa chỉ</span>
                                    <span style="float:right">
                                        <button id="add-address" class="btn btn-success">Thêm</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-background set-overflow">
                            <table class="table table-striped set-border-radius" id="fix-stt">
                                <thead>
                                    <tr style="color:black;" class="text-center">
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
                                        <tr class="text-center" id="address-{{ $value['id'] }}">
                                            <td>{{ $data['list_address']['from']++ }}</td>
                                            <td>{{ $value['consignee'] }}</td>
                                            <td>{{ $value['tel'] }}</td>
                                            <td>{{ $value['sender_name'] }}</td>
                                            <td>{{ $value['sender_tel'] }}</td>
                                            <td>{{ $value['full_address'] }}</td>
                                            <td>
                                                <div class="col-m-6">
                                                    <div class="col-md-3 fix-margin">
                                                        <button class="custom-icon " data-id="{{ $value['id'] }}"
                                                            onclick="updateAddress(this)"><i
                                                                class="fa fa-pencil"></i></button>
                                                    </div>
                                                    <div class="col-md-3 fix-margin">
                                                        <button class="custom-icon "
                                                            data-deleteId="{{ $value['id'] }}"
                                                            onclick="deleteAddress(this)"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination custom-paginate" id="fix-paginate-address">
                                    <li class="page-item">
                                        <a class="page-link address" href="#" aria-label="Previous" data-page="1">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
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
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- modal add address --}}
                <div class="modal bd-example-modal-lg" id="modal-create-address" style="display: none" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Thêm địa chỉ nhận</h3>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tên người gửi</label>
                                                <input type="text" class="form-control" id="inputSender-name"
                                                    placeholder="Nhập tên người nhận">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số điện thoại</label>
                                                <input type="number" class="form-control" id="inputSender-tel"
                                                    placeholder="Nhập số điện thoại người gửi">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tên người nhận</label>
                                                <input type="text" class="form-control" id="consignee"
                                                    placeholder="Nhập tên người nhận">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="fix-width-label">Số điện thoại người nhận</label>
                                                <input type="number" class="form-control" id="consignee-tel"
                                                    placeholder="Nhập số điện thoại">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Thành phố/Tỉnh</label>
                                                <select class="form-control" name="province" id="province"
                                                    onchange="Select_Provice(this)"></select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Quận/Huyện</label>
                                                <select class="form-control" name="district" id="district"
                                                    onchange="Select_District(this)"></select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Xã/Phường</label>
                                                <select class="form-control" name="ward" id="ward"></select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số nhà tên đường</label>
                                                <input type="text" class="form-control" id="address-home"
                                                    placeholder="Nhập địa chỉ nhà">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Ghi chú</label>
                                                <textarea rows="6" type="text" class="form-control" id="note"
                                                    placeholder="Nội dùng cần chú ý"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div style="padding: 30px">
                                        <button class="btn btn-success" id="close-modal-create">Thoát</button>
                                        <button class="btn btn-success" onclick="CreateAddress()">Thêm</button>
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
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tên người gửi</label>
                                                <input type="text" class="form-control empty-input"
                                                    id="inputSender-name-update" placeholder="Nhập tên người nhận">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số điện thoại</label>
                                                <input type="number" class="form-control empty-input"
                                                    id="inputSender-tel-update"
                                                    placeholder="Nhập số điện thoại người gửi">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tên người nhận</label>
                                                <input type="text" class="form-control empty-input"
                                                    id="consignee-update" placeholder="Nhập tên người nhận">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="fix-width-label">Số điện thoại người
                                                    nhận</label>
                                                <input type="number" class="form-control empty-input"
                                                    id="consignee-tel-update" placeholder="Nhập số điện thoại">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Thành phố/Tỉnh</label>
                                                <select class="form-control empty-input-select" name="province"
                                                    id="province-update"
                                                    onchange="Select_Provice_Update(this)"></select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Quận/Huyện</label>
                                                <select class="form-control empty-input-select" name="district"
                                                    id="district-update"
                                                    onchange="Select_District_Update(this)"></select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Xã/Phường</label>
                                                <select class="form-control empty-input-select" name="ward"
                                                    id="ward-update"></select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Số nhà tên đường</label>
                                                <input type="text" class="form-control empty-input"
                                                    id="address-home-update" placeholder="Nhập địa chỉ nhà">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Ghi chú</label>
                                                <textarea rows="6" type="text" class="form-control empty-input"
                                                    id="note-update" placeholder="Nội dùng cần chú ý"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div style="padding: 30px">
                                        <button class="btn btn-success" id="close-modal-update">Thoát</button>
                                        <button class="btn btn-success" onclick="sendUpdate(this)"
                                            id="btn-send-update-add">Cập nhật</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($data['transactions']))
                <div class="col-md-12 ">
                    <div class="card ">
                        <div class="card-header ">
                            <h3>Lịch sử giao dịch</h3>
                        </div>
                        <div class="card-body custom-background set-overflow">
                            <table class="table table-striped set-border-radius">
                                <thead>
                                    <tr style="color:black;" class="text-center">
                                        <td class="unset-border-bottom">STT</td>
                                        <td class="unset-border-bottom">Số tiền</td>
                                        <td class="unset-border-bottom">Mô tả</td>
                                        <td class="unset-border-bottom">Người thực hiện</td>
                                    </tr>
                                </thead>
                                <tbody id="historyt-ransactions">
                                    @foreach ($data['transactions']['data'] as $key => $value)
                                        <tr class="text-center">
                                            <td>{{ $data['transactions']['from']++ }}</td>
                                            <td>{{ number_format($value['amount']) }}</td>
                                            <td>{{ $value['description'] }}</td>
                                            <td>{{ $value['prepared_by_id'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination custom-paginate">
                                    <li class="page-item">
                                        <a class="page-link transaction" href="#" aria-label="Previous" data-page="1">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $data['transactions']['last_page']; $i++)
                                        <li class="page-item"><a class="page-link transaction" href="javascript:;"
                                                data-page="{{ $i }}">{{ $i }}</a></li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link transaction" href="#" aria-label="Next"
                                            data-page={{ $data['transactions']['last_page'] }}>
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="tmn-custom-mask d-none" id="loader">
        <div class="loader"></div>
    </div>
    @include('modules.footer')
</body>
<script>
    //jquery
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
        //update password
        $("#btn-update-password").click(function(e) {
            e.preventDefault();
            $("#alert-errors").empty();
            var current_password = $("#old-password").val();
            var password = $("#new-password").val();
            var password_confirmation = $("#password-confirm").val();

            $.ajax({
                type: "PUT",
                url: "{{ route('auth.updateUser') }}",
                data: {
                    password: password,
                    current_password: current_password,
                    password_confirmation: password_confirmation
                },
                success: function(response) {
                    if (response.code == 200) {
                        $("#alert-success").append(
                            "<span class='text-success'>" +
                            "Đã cập nhật thành công" + "</span>" + "<br>"
                        )
                        $("#modalReload").show()
                    } else {
                        var data = JSON.parse(response.data)
                        $.each(data.errors, function(index, value) {
                            $("#alert-errors").append(
                                "<span class='text-danger'>" + index + ":" +
                                value + "</span>" + "<br>"
                            )
                        })
                        $("#modalConfirmDelete").show()

                    }
                },
                error: function(response) {

                }
            })
        })
        //paginate shipment
        $(document).on('click', '.pagination .address', function(event) {
            event.preventDefault();
            var page = $(this).attr('data-page');
            fetch_data(page);
        });


        //paginate transaction
        $(document).on('click', '.pagination .transaction', function(event) {
            event.preventDefault();
            var page = $(this).attr('data-page');
            fetch_data_transaction(page)
        });

        function fetch_data_transaction(page) {
            $.ajax({
                type: "GET",
                url: "{{ route('auth.info') }}",
                data: {
                    transaction: true,
                    page_transaction: page
                },
                success: function(data) {
                    if (data == 401) {
                        location.reload()
                    } else {
                        if (data.transactions.data.length) {
                            $("#historyt-ransactions").empty()
                            $.each(data.transactions.data, function(index, value) {

                                $("#historyt-ransactions").append(
                                    '<tr class="text-center">' +
                                    '<td>' + data.transactions.from++ + '</td>' +
                                    '<td>' + formatNumber(value.amount) + '</td>' +
                                    '<td>' + value.description + '</td>' +
                                    '<td>' + value.prepared_by_id + '</td>' +
                                    '</tr>'
                                )
                            })
                        }
                    }

                },
                error: function(response) {

                }
            })
        }

        //api province
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

        //show form create address
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

        function toggleLoading() {
            $('.tmn-custom-mask').toggleClass('d-none');
        }

    })

    //js
    //address
    function fetch_data(page) {
        $.ajax({
            type: "GET",
            url: "{{ route('auth.info') }}",
            data: {
                shipment: true,
                page_shipment: page
            },
            success: function(data) {
                if (data == 401) {
                    location.reload()
                } else {
                    if (data.list_address.data.length) {
                        $("#list-address").empty()
                        $.each(data.list_address.data, function(index, value) {

                            $("#list-address").append(
                                '<tr class="text-center" id=address-' + value.id +
                                '>' +
                                '<td>' + data.list_address.from++ + '</td>' +
                                '<td>' + value.consignee + '</td>' +
                                '<td>' + value.tel + '</td>' +
                                '<td>' + value.sender_name + '</td>' +
                                '<td>' + value.sender_tel + '</td>' +
                                '<td>' + value.full_address + '</td>' +
                                '<td>' + '<div class="col-m-6">' +
                                '<div class="col-md-3 fix-margin">' +
                                '<button class="custom-icon" onclick="updateAddress(this)" data-id="' +
                                value.id + '">' +
                                '<i class="fa fa-pencil"></i>' + '</button>' +
                                '</div>' +
                                '<div class="col-md-3 fix-margin">' +
                                '<button class="custom-icon fix-margin" onclick="deleteAddress(this)" data-deleteId="' +
                                value.id + '">' +
                                '<i class="fa fa-trash"></i></button>' +
                                '</div>' +
                                '</div>' + '</td>' +
                                '</tr>'
                            )
                        })

                        $("#fix-paginate-address").empty()
                        $("#fix-paginate-address").append(
                            '<li class="page-item">' +
                            '<a class="page-link address" href="#" aria-label="Previous" data-page="1">' +
                            '<span aria-hidden="true">&laquo;</span>' +
                            '<span class="sr-only">Previous</span>' +
                            '</a>' +
                            '</li>'
                        )
                        for (var first_page = 1; first_page <= data.list_address
                            .last_page; first_page++) {
                            $("#fix-paginate-address").append(
                                '<li class="page-item"><a class="page-link address" href="javascript:;"' +
                                'data-page="' + first_page + '">' + first_page + '</a></li>'
                            )
                        }
                        $("#fix-paginate-address").append(
                            '<li class="page-item">' +
                            '<a class="page-link address" href="#" aria-label="Previous" data-page="' +
                            data.list_address
                            .last_page + '">' +
                            '<span aria-hidden="true">&raquo;</span>' +
                            '<span class="sr-only">Next</span>' +
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

</html>

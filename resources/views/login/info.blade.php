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
            z-index: 99;
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

    </style>
    <!--Modal: modalConfirmDelete-->
    <div class="modal" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <div class="modal" id="modalReload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-4">
                                                <label for="">VND</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="money-VND" readonly type="text" class="form-control"
                                                    name="money-VND"
                                                    value="{{ number_format($data['account']['data'][1]['balance']) }}">
                                            </div>
                                        </div>
                                        <div style="margin-bottom: 25px" class="form-group">
                                            <div class="col-md-4">
                                                <label for="">JPY</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="money-JPY" readonly type="text" class="form-control"
                                                    name="money-JPY"
                                                    value="{{ number_format($data['account']['data'][0]['balance']) }}">
                                            </div>
                                        </div>

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
                        <div class="card-header d-flex">
                            <div class="row">
                                <div class="d-flex col-md-6">
                                    <h3>Sổ địa chỉ</h3>
                                </div>
                                <div class="d-flex col-md-6">
                                    <h3 style="float:right">
                                        <button id="add-address" class="btn btn-success">Thêm</button>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body custom-background set-overflow">
                            <table class="table table-striped set-border-radius">
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
                                        <tr class="text-center">
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
                                <ul class="pagination custom-paginate">
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
                                            <td>{{ $value['amount'] }}</td>
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
    $(document).ready(function() {
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
            toggleLoading()
            fetch_data(page);

            // fetch_data(page);
        });

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
                                    '<tr class="text-center">' +
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
                        }
                    }

                },
                error: function(response) {

                }
            })
        }

        //paginate transaction
        $(document).on('click', '.pagination .transaction', function(event) {
            event.preventDefault();
            var page = $(this).attr('data-page');
            // fetch_data(page);
            toggleLoading()
            fetch_data_transaction(page)
            // fetch_data(page);
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
                                    '<td>' + value.amount + '</td>' +
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



        function toggleLoading() {
            $('.tmn-custom-mask').toggleClass('d-none');
        }

    })

    function deleteAddress(obj) {
        console.log($(obj).data('deleteid'))
    }

    function updateAddress(obj) {
        console.log($(obj).data('id'))
    }

</script>

</html>

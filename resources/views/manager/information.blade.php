@extends('modules_manager.main')
@section('title', 'Thông tin cá nhân')
@section('style')
    <style>
        #update-info-form {
            border-color: 1px #ffffff !important;
        }

        .panel-heading {
            height: 40px;
            line-height: 40px;
            text-align: center;
        }

        .panel-title {
            height: 40px;
            line-height: 40px;
            text-align: center;
        }

        @media (max-width:1024px) {
            .col-md-4 {
                width: 100% !important;
            }

            .row {
                --bs-gutter-x: unset !important;
                display: unset !important;
            }

            .stretch-card {
                display: unset !important;
            }
        }

    </style>
@section('content')
    <div class="col-md-6 p-3 h-100">
        <div id="info" class="border border-warning h-100">
            <div class="panel panel-info">
                {{-- header --}}
                <div class="panel-heading bg-warning">
                    <div class="panel-title ">Thông tin cá nhân</div>
                </div>
                {{-- body --}}
                <div class="panel-body p-2 pt-4">
                    <form id="update-info-form" method="put" action="" class="form-horizontal" role="form">
                        @csrf
                        <div style="margin-bottom: 25px" class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">ID</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="id-info" type="text" readonly class="form-control" name="id-fo"
                                        value="{{ $data['id'] }}">
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 25px" class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="login-email" type="email" readonly class="form-control" name="email-info"
                                        value="{{ $data['email'] }}">
                                </div>
                            </div>

                        </div>
                        <div style="margin-bottom: 25px" class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Vai trò</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="role-info" type="text" readonly class="form-control" name="email"
                                        value="{{ $data['role_id'] }}">
                                </div>
                            </div>

                        </div>
                        <div style="margin-bottom: 25px" class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Trạng thái</label>
                                </div>
                                <div class="col-md-10">
                                    <input id="status-info" type="text" readonly class="form-control" name="email"
                                        value="{{ $data['status_id'] }}">
                                </div>
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
    <div class="col-md-6 p-3 h-100">
        <div id="changepass" class="border border-warning h-100">
            <div class="panel panel-info">
                {{-- header --}}
                <div class="panel-heading bg-warning">
                    <div class="panel-title">Đổi mật khẩu</div>
                </div>
                {{-- body --}}
                <div class="panel-body p-2 pt-4">
                    <form id="update-password-form" method="post" action="" class="form-horizontal" role="form">
                        @csrf
                        <div class="row">
                            <div style="margin-bottom: 25px" class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu hiện tại</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="old-password" type="password" class="form-control" name="old-password"
                                            value="" placeholder="Mật khẩu cũ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div style="margin-bottom: 25px" class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu mới</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="new-password" type="password" class="form-control" name="new-password"
                                            value="" placeholder="Vui lòng nhập mật khẩu">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div style="margin-bottom: 25px" class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Xác nhận mật khẩu</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password-confirm" value="" placeholder="Xác nhận lại mật khẩu">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="btn-update-password" type="submit" class="btn btn-success bg-warning">Cập
                                nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- debt --}}
    <div class="col-md-4  p-3 h-100 d-none">
        <div id="debt" class="border border-warning h-100">
            <div class="panel panel-info">
                {{-- header --}}
                <div class="panel-heading bg-warning">
                    <div class="panel-title">Số dư</div>
                </div>
                {{-- body --}}
                <div class="panel-body p-2 pt-4">
                    <form id="transactions" method="post" action="" class="form-horizontal" role="form">
                        @csrf
                        @if (count($data['account']['data']))
                            @foreach ($data['account']['data'] as $key => $value)
                                <div class="row d-inline">
                                    <div style="margin-bottom: 25px" class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">{{ $value['currency_id'] }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input readonly type="text" class="form-control"
                                                    value="{{ number_format($value['balance']) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div style="margin-bottom: 25px" class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">VND</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="money-VND" readonly type="text" class="form-control" name="money-VND"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="margin-bottom: 25px" class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">JPY</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="money-JPY" readonly type="text" class="form-control" name="money-JPY"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                            swal({
                                title: "Cập nhật thành công",
                                type: "success",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
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
        })

        function toggleLoading() {
            $('.tmn-custom-mask').toggleClass('d-none');
        }

    </script>
@endsection

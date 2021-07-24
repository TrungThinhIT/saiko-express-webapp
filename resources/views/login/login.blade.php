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


        #border-color-regis {
            border-color: #fca901 !important;
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
                <div class="alert alert-danger">
                    <span>Hệ thống chưa đăng nhập được</span>
                </div>
                <!-- login/signup box -->

                <div id="loginbox" style="margin-top:50px" class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                    <!-- login box-->
                    <div class="panel panel-info">
                        @if (session('login'))
                            <div class="alert alert-danger">
                                <span>{{ session('login') }}</span>
                            </div>
                        @endif
                        <div class="panel-heading">
                            <div class="panel-title">Đăng nhập</div>
                        </div>
                        <div style="padding-top:30px" class="panel-body">
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <!-- login form -->
                            <form id="loginform" method="post" action="" class="form-horizontal" role="form">
                                @csrf

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-email" type="email" class="form-control" name="email" value=""
                                        placeholder="Vui lòng nhập email">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password"
                                        placeholder="password">
                                </div>

                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" id="btn-login" class="btn btn-success" value="Đăng nhập" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <div id="border-color-regis"
                                            style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                            Chưa có tài khoản?
                                            <a href="javascript:"
                                                onClick="$('#loginbox').hide(); $('#signupbox').show();$('#sendEmailGetPassword').hide()"
                                                id="regis">
                                                Đăng ký
                                            </a>
                                            <div><a style="color:#fca901 !important;font-size:95%" href="javascript:"
                                                    id='forgot-password'
                                                    onclick="$('#loginbox').hide(); $('#signupbox').hide();$('#sendEmailGetPassword').show()">Lấy
                                                    lại mật khẩu</a></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- signup box-->
                <div id="signupbox" style="display:none; margin-top:50px"
                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Đăng ký</div>
                        </div>
                        <div class="panel-body">
                            <!-- signup form -->
                            <form id="signupform" method="post" action="{{ route('auth.register') }}"
                                class="form-horizontal" role="form">
                                @csrf

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">id</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="id" name="id"
                                            placeholder="nhỏ hơn hoặc bằng 15 ký tự" value=''>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Nhập email" value=''>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" required id="password" class="form-control"
                                            name="password" placeholder="Nhập mật khẩu" value=''>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password Confirm</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu" value=''>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button id="btn-signup" type="submit" name="reg_user"
                                            class="btn btn-success "><i class="icon-hand-right"></i> &nbsp Đăng
                                            ký</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <span>Đã có tài khoản? <a style="color:#fca901 !important;font-size:95%"
                                                href="javascript:"
                                                onclick="$('#signupbox').hide(); $('#loginbox').show();$('#sendEmailGetPassword').hide()">Đăng
                                                nhập</a></span>
                                        <div>
                                            <a style="color:#fca901 !important;font-size:95%" href="javascript:"
                                                id='forgot-password'
                                                onclick="$('#loginbox').hide(); $('#signupbox').hide();$('#sendEmailGetPassword').show()">Lấy
                                                lại mật khẩu</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                {{-- get password --}}
                <div id="sendEmailGetPassword" style="display:none; margin-top:50px;margin-bottom: 100px"
                    class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Lấy lại mật khẩu</div>
                        </div>
                        <div class="panel-body">
                            <!-- send link  form -->
                            <form id="getPassword" method="post" action="{{ route('auth.sendLinkResetPassword') }}"
                                class="form-horizontal" role="form">
                                @csrf

                                <div class="form-group">
                                    <div class="col-md-9 d-flex">
                                        <input type="email" class="form-control" id="id-send-link-password" name="id"
                                            placeholder="Vui lòng nhập email" value=''>
                                    </div>
                                    <div class="col-md-3">
                                        <button id="btn-link-password" type="submit" name="sned-link-password"
                                            class="btn btn-success"><i class="icon-hand-right"></i> &nbsp
                                            Gửi</button>
                                    </div>
                                </div>
                                <div class="alert alert-success display-result" id="alert-link-getPassword-success">

                                </div>
                                <div class="alert alert-danger display-result" id="alert-link-getPassword-fail">

                                </div>

                                <hr>
                                <div class="form-group text-center">
                                    <div class="co-md-12" style="font-size: 85%">
                                        <span>Đã có tài khoản? <a style="color:#fca901 !important;font-size:90%"
                                                href="javascript:"
                                                onclick="$('#signupbox').hide(); $('#loginbox').show();$('#sendEmailGetPassword').hide()">Đăng
                                                nhập</a>
                                        </span>
                                        <br>
                                        <span>Chưa có tài khoản? <a style="color:#fca901 !important;font-size:90%"
                                                href="javascript:"
                                                onclick="$('#signupbox').show(); $('#loginbox').hide();$('#sendEmailGetPassword').hide()">Đăng
                                                ký</a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

        function toggleLoading() {
            $('.tmn-custom-mask').toggleClass('d-none');
        }

        $("#exit").click(() => $("#modalConfirmDelete").hide())
        $("#reload").click(() => location.reload());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $("#btn-signup").click(function(event) {
            event.preventDefault();
            $("#alert-errors").empty()
            var id = $("#id").val()
            var email = $("#email").val();
            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val()
            $.ajax({
                type: "POST",
                url: "{{ route('auth.register') }}",
                data: {
                    id: id,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                },
                success: function(respone) {
                    if (respone.code == 422) {
                        var data = JSON.parse(respone.data)

                        $.each(data.errors, function(index, value) {
                            $("#alert-errors").append(
                                "<span class='text-danger'>" + index + ":" +
                                value + "</span>" + "<br>"
                            )
                        })

                        $("#modalConfirmDelete").show()


                    }
                    if (respone.code == 201) {
                        $("#alert-success").append(
                            "<span class='text-success'>" +
                            "Đã đăng ký tài khoản thành công" + "</span>" + "<br>"
                        )
                        $("#modalReload").show()

                    }
                },
                error: function(respone) {
                    // console.log(respone.responseJSON.errors.id)
                }

            })
        })

        $("#btn-login").click(function(e) {
            e.preventDefault();
            $("#alert-errors").empty()
            $("#alert-success").empty()
            var email = $("#login-email").val();
            var password = $("#login-password").val();
            $.ajax({

                type: "POST",
                url: "{{ route('auth.login') }}",
                data: {
                    username: email,
                    password: password,
                },
                success: function(respone) {
                    if (respone.code == 200) {
                        window.location.href = "{{ route('index') }}";
                    } else {
                        $("#alert-errors").append(
                            "<span class='text-danger'>" + "Email hoặc mật khẩu sai" +
                            "</span>" + "<br>"
                        )
                        $("#modalConfirmDelete").show()
                    }
                },
                error: function(respone) {
                    // console.log(respone.responseJSON.errors.id)
                }

            })
        })

        $("#btn-link-password").click(function(e) {
            e.preventDefault();
            $("#alert-link-getPassword-success").hide();
            $("#alert-link-getPassword-fail").hide();
            $("#alert-link-getPassword-success").empty()
            $("#alert-link-getPassword-fail").empty()
            var email = $("#id-send-link-password").val();
            if (email == "") {
                alert('Vui lòng nhập email')
                return false;
            }
            toggleLoading()
            $.ajax({
                type: "POST",
                url: "{{ route('auth.sendLinkResetPassword') }}",
                data: {
                    callback_domain: window.location.protocol+"//"+window.location.hostname,
                    email: email,
                },
                success: function(response) {
                    if (response.code == 204) {
                        $("#alert-link-getPassword-success").append(
                            'Thông báo đã được gửi, bạn vui lòng kiểm tra email'
                        )
                        $("#alert-link-getPassword-success").show()
                    } else {
                        $("#alert-link-getPassword-fail").append(
                            'Thông báo đã được gửi hoặc email không đúng'
                        )
                        $("#alert-link-getPassword-fail").show()
                    }
                },
                error: function(response) {

                }
            })
        })
    })

</script>

</html>

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
        #redirect{
            background-color: #fca901;
            border-color: #fca901;
            color: white;
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
    <div class="modal" id="modalRedirectPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                {{-- <!--Header--> --}}

                <!--Body-->
                <div class="modal-body" id="alert-success-redirect">


                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button id="redirect" class="btn">Thoát</button>
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
                <!-- signup box-->
                <div id="signupbox" style="display:block; margin-top:50px"
                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Lấy lại mật khẩu</div>
                        </div>
                        <div class="panel-body">
                            <!-- signup form -->
                            <form id="sendInfoResetPassword" method="post" action="" class="form-horizontal"
                                role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" readonly class="form-control" id="email" name="email"
                                            value={{ $data['email'] }}>
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
                                        <input type="password" required class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu" value=''>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button id="btn-reset-password" type="submit" name="reg_user"
                                            class="btn btn-success "><i class="icon-hand-right"></i> &nbsp Cập
                                            nhật</button>
                                    </div>
                                </div>
                                <hr>

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
        $("#redirect").click(() => window.location.href = "{{ route('auth.index') }}");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $("#btn-reset-password").click(function(e) {
            e.preventDefault();
            $("#alert-errors").empty()
            $("#alert-success").empty()
            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('auth.web.resetPassword') }}",
                data: {
                    email: "{{ $data['email'] }}",
                    token: "{{ $data['token'] }}",
                    password: password,
                    password_confirmation
                },
                success: function(data) {
                    if (data.code == 204) {
                        $("#alert-success-redirect").append(
                            "<span class='text-success'>" + "Cập nhật thành công" +
                            "</span>" + "<br>"
                        )

                        $("#modalRedirectPage").show()

                    } else {
                        if (data.code == 502) {
                            var data = JSON.parse(data.message)
                            $.each(data.errors, function(index, value) {
                                $("#alert-errors").append(
                                    "<span class='text-danger'>" + index + ":" +
                                    value + "</span>" + "</br>"
                                )
                            })
                        } else {
                            var data = JSON.parse(data.message)

                            $.each(data.errors, function(index, value) {
                                $("#alert-errors").append(
                                    "<span class='text-danger'>" + index + ":" +
                                    value + "</span>" + "</br>"
                                )
                            })
                        }

                        $("#modalConfirmDelete").show()
                    }

                },
                error: function(data) {

                }
            })
        })


    })

</script>

</html>

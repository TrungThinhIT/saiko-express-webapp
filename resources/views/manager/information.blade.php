@extends('modules_manager.main_new')
@section('title', 'Thông tin cá nhân')
@section('title-header-content', 'Thông tin cá nhân')
@section('style')
    <style>
        #update-info-form {
            border-color: 1px #ffffff !important;
        }

        .form-check label,
        .form-group label {
            white-space: unset !important;
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
                margin-top: 10px !important;
                width: 100% !important;
            }

            .row {
                --bs-gutter-x: unset !important;
            }

            .fix-margin-left {
                margin-left: unset !important;
            }
        }

        .fix-margin-left {
            font-size: 16px;
            margin-left: -20px;
        }

        .fix-width-input {
            width: auto !important;
        }

    </style>
@section('content')
    <div class="col-md-12">
        <div class="row">
            {{-- debt --}}
            <div class="col-md-4">
                <div id="debt" class="border border-warning h-100">
                    <div class="panel panel-info">
                        {{-- header --}}
                        <div class="panel-heading bg-white">
                            <div class="panel-title">Số dư</div>
                        </div>
                        {{-- body --}}
                        <div class="panel-body p-2 pt-4">
                            <form id="transactions" method="post" action="" class="form-horizontal" role="form">
                                @csrf
                                @if (isset($data['account']))
                                    @if (count($data['account']['data']))
                                        @foreach ($data['account']['data'] as $key => $value)
                                            <div class="row d-inline ">
                                                @if ($value['balance'] != 0)
                                                    <div style="margin-bottom: 25px" class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-3">
                                                                <label for="">{{ $value['currency_id'] }}</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input readonly type="text" class="form-control"
                                                                    value="{{ number_format($value['balance']) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                            </form>
                        </div>
                    </div>
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
                        if (response.code == 401) {
                            swal({
                                title: "Mã xác thực hết hạn. Đăng nhập lại",
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            }).then(() => {
                                window.location.reload()
                            })
                        }
                        if (response.code == 200) {
                            swal({
                                title: "Cập nhật thành công",
                                type: "success",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            }).then(() => {
                                window.location.reload()
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

            //show input password
            $("#btn-show-password").click(function(e) {
                e.preventDefault();
                $("#login-email").prop('readonly', false)
                $("#btn-show-password").hide()
                $(".confirm-update-mail").removeClass('d-none')

            })
            $("#btn-hidden-password").click(function(e) {
                e.preventDefault();
                $("#login-email").prop('readonly', true)
                $("#btn-show-password").show()
                $(".confirm-update-mail").addClass('d-none')
            })
        })

        function toggleLoading() {
            $('.tmn-custom-mask').toggleClass('d-none');
        }

        function validateEmail(email) {
            const re = /^([a-z0-9]+)(\.[a-z0-9]+)*@([a-z0-9]+\.)+[a-z]{2,6}$/i;
            return re.test(email);
        }

        function updateUserEmail() {
            // [START auth_update_user_email]
            $("#update-info-form").submit(function(e) {
                e.preventDefault();
            })
            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    const user_update = firebase.auth().currentUser;
                    var current_password = $("#login-email-update").val();
                    var credential = firebase.auth.EmailAuthProvider.credential(user_update.email, current_password)
                    user.reauthenticateWithCredential(credential).then(() => {
                        var email = $("#login-email").val();
                        if (!validateEmail(email)) {
                            swal({
                                title: "Không đúng định dạng email",
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
                            return false;
                        }
                        user.updateEmail(email).then(() => {
                            // Update successful
                            // Email verification sent!

                            firebase.auth().currentUser.getIdToken( /* forceRefresh */ false).then(
                                function(idToken) {
                                    // Send token to your backend via HTTPS
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ route('auth.login') }}",
                                        data: {
                                            idToken: idToken,
                                        },
                                        success: function(respone) {
                                            if (respone.code == 200) {
                                                swal({
                                                    title: "Cập nhật thành công",
                                                    type: "success",
                                                    icon: "success",
                                                    showCancelButton: false,
                                                    confirmButtonColor: "#fca901",
                                                    confirmButtonText: "Exit",
                                                    closeOnConfirm: true
                                                }).then((check) => {
                                                    window.location.reload()
                                                })
                                            } else {
                                                swal({
                                                    title: respone.data,
                                                    type: "warning",
                                                    icon: "warning",
                                                    showCancelButton: false,
                                                    confirmButtonColor: "#fca901",
                                                    confirmButtonText: "Exit",
                                                    closeOnConfirm: true
                                                })
                                            }
                                        },
                                        error: function(respone) {
                                            if (respone.status == 419) {
                                                window.location.reload();
                                            }
                                        }

                                    })

                                }).catch(function(error) {
                                console.log(error)
                            });

                        }).catch((error) => {
                            // An error occurred
                            swal({
                                title: error.message,
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
                            // ...
                        });
                    }).catch((error) => {
                        swal({
                            title: error.message,
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                    });
                } else {
                    // User is signed out
                    // ...
                }

                // [END auth_update_user_email]
            });
        }

        function updatePassword_check() {
            // [START auth_state_listener]
            $("#update-password-form").submit(function(e) {
                e.preventDefault()
            })

            firebase.auth().onAuthStateChanged((user) => {
                if (user) {
                    var current_password = $("#old-password").val();
                    const user_update = firebase.auth().currentUser;
                    var credential = firebase.auth.EmailAuthProvider.credential(user_update.email, current_password)
                    user.reauthenticateWithCredential(credential).then(() => {
                        var newPassword = $("#new-password").val();
                        if (newPassword == "") {
                            swal({
                                title: "Vui lòng nhập mật khẩu mới",
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
                            return;
                        }
                        user_update.updatePassword(newPassword).then(() => {
                            swal({
                                title: "Cập nhật thành công",
                                type: "success",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            }).then((check) => {
                                window.location.reload()
                            })
                        }).catch((error) => {
                            // An error ocurred
                            swal({
                                title: "Cập nhật thất bại: " + error.message,
                                type: "warning",
                                icon: "warning",
                                showCancelButton: false,
                                confirmButtonColor: "#fca901",
                                confirmButtonText: "Exit",
                                closeOnConfirm: true
                            })
                        });

                    }).catch((error) => {
                        swal({
                            title: error.message,
                            type: "warning",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: "#fca901",
                            confirmButtonText: "Exit",
                            closeOnConfirm: true
                        })
                    });



                } else {}
            });
        }

    </script>
@endsection

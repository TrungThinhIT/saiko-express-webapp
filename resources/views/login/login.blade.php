<!DOCTYPE html>
<html>

<body>
    @include('modules.header')
    <div class="wapper">
        <div class="container">
            <div class='col-md-12'>
                <!-- login/signup box -->
                <div id="loginbox" style="margin-top:50px" class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                    <!-- login box-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Đăng nhập</div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="avascript:"
                                    id='forgot-password'>Lấy lại mật khẩu</a></div>
                        </div>
                        <div style="padding-top:30px" class="panel-body">
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <!-- login form -->
                            <form id="loginform" method="post" action="account/index.php" class="form-horizontal"
                                role="form">
                                <!-- error -->
                                {{-- <div class="alert alert-success">
                                </div> --}}

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="uname" value=""
                                        placeholder="Tên đăng nhập hoặc email">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password"
                                        placeholder="password">
                                </div>

                                <!-- <div class="input-group">
                                    <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Giữ đăng nhập
                                    </label>
                                    </div>
                                </div> -->

                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-success" value="Đăng nhập" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                            Chưa có tài khoản?
                                            <a href="javascript:" onClick="$('#loginbox').hide(); $('#signupbox').show();">
                                                Đăng ký
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- signup box-->
                <div id="signupbox" style="display:none; margin-top:50px"
                    class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Đăng ký</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink"
                                    href="avascript:" onclick="$('#signupbox').hide(); $('#loginbox').show()">Đăng nhập</a></div>
                        </div>
                        <div class="panel-body">
                            <!-- signup form -->
                            <form id="signupform" method="post" action="login.php?register" class="form-horizontal"
                                role="form">
                                <?php if (count($errors) > 0) {
                                include 'php/errors.php';
                                } ?>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Tên đăng nhập</label>
                                    <div class="col-md-9">
                                        <input type="text" required pattern="[a-zA-z0-9]{4,10}" class="form-control"
                                            name="unamer" placeholder="4 <= kí tự <= 10" value='<?php if (isset($uname)) {
                                                echo $uname;
                                            } ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Họ tên</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" name="fnamer"
                                            placeholder="Nhập họ tên" value='<?php if (isset($fname)) {
                                                echo $fname;
                                            } ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" required class="form-control" name="emailr"
                                            placeholder="Nhập email" value='<?php if (isset($email)) {
                                                echo $email;
                                            } ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Địa chỉ</label>
                                    <div class="col-md-9">
                                        <input type="text" required class="form-control" name="addressr"
                                            placeholder="Nhập địa chỉ" value='<?php if (isset($address)) {
                                                echo $address;
                                            } ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Số điện thoại</label>
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control" name="nphoner"
                                            placeholder="Nhập số điện thoại" value='<?php if (isset($nphone)) {
                                                echo $nphone;
                                            } ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" required class="form-control" name="passr"
                                            placeholder="Nhập mật khẩu" value='<?php if (isset($pass)) {
                                                echo $pass;
                                            } ?>'>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                    <div class="col-md-9">
                                        <input type="password" required class="form-control" name="repassr"
                                            placeholder="Nhập lại mật khẩu" value='<?php if (isset($repass)) {
                                                echo $repass;
                                            } ?>'>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button id="btn-signup" type="submit" name="reg_user"
                                            class="btn btn-info pull-right"><i class="icon-hand-right"></i> &nbsp Đăng
                                            ký</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modules.footer')
</body>

</html>

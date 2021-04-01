<?php 
if(isset($_GET["forgot_pw"])){
    $email = mysqli_real_escape_string($db, $_GET["forgot_pw"]);
    if(empty($email))
        $_SESSION['error_login'] = "Vui lòng nhập email!";

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $c_email = mysqli_fetch_assoc($result)["email"];

    if(mysqli_num_rows($result) > 0){
        include("send_mail.php");
        $new_password = rand(100000, 999999);
        $password = md5($new_password);
        //change password
        $query = "UPDATE users SET password='$password' WHERE email='$c_email'";
        if(mysqli_query($db, $query)){
            $body = "Mật khẩu mới: $new_password";
            $isSend = sendEmail($c_email, "Đặt lại mật khẩu", $body);
            switch ($isSend) {
                case '-1':
                    $_SESSION['error_login'] = "Gửi Mail thất bại!";
                    break;
                case '0':
                    $_SESSION['error_login'] = "Lỗi!";
                    break;
                case '1':
                    $_SESSION['success_register'] = "Vui lòng kiểm tra email để lấy lại mật khẩu!";
                    break;
            }
        }
    }else
        $_SESSION['error_login'] = "Tài khoản không tồn tại hoặc email không đúng!";
}

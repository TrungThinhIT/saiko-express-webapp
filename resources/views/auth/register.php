<?php  
    include("../../config.php");

    $errors = array();
    //$pattern = "/^[a-zA-Z0-9]+$/";
    $pattern = '/[a-zA-Z0-9]/';
    if(isset($_POST["uname"])){
        $uname_admin = mysqli_real_escape_string($db, $_POST["uname"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $fname = mysqli_real_escape_string($db, $_POST["fname"]);
        $nphone = mysqli_real_escape_string($db, $_POST["nphone"]);
        $pass = mysqli_real_escape_string($db, $_POST["pass"]);
        $repass = mysqli_real_escape_string($db, $_POST["repass"]);
        $address = mysqli_real_escape_string($db, $_POST["address"]);
        $type = $_POST["typeuser"];
        if(preg_match($pattern,$uname_admin)==FALSE){
            array_push($errors, 'Tên không được có ký tự đặt biệt');
        }
        if(empty($uname_admin) || empty($email) || empty($fname) || empty($pass) || empty($repass)){ 
            array_push($errors, $LANG['khong_duoc_bo_trong']);
        }elseif($pass != $repass){
            array_push($errors, $LANG['mat_khau_phai_giong_nhau']);
        }

        if(strlen($uname_admin) > 10){
            array_push($errors, $LANG['ten_dang_nhap_phai_nho_hon_hoac_bang_10_ki_tu']);
        }

        if(strlen($nphone) > 13){
            array_push($errors, $LANG['so_dien_thoai_phai_nho_hon_hoac_bang_13_ki_tu']);
        }

        // check user already exist
        $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $uname_check_query = "SELECT * FROM users WHERE uname='$uname_admin' LIMIT 1";
        $result1 = mysqli_query($db, $email_check_query);
        $result2 = mysqli_query($db, $uname_check_query);
        $euserr = mysqli_fetch_assoc($result1);
        $uuserr = mysqli_fetch_assoc($result2);
        if ($euserr) {
            if ($euserr['email'] === $email) {
                array_push($errors, $LANG['email_da_ton_tai']);
            }
        }elseif($uuserr){
            if ($uuserr['uname'] === $uname_admin) {
                array_push($errors, $LANG['ten_dang_nhap_da_ton_tai']);
            }
        }
        else{
            if(count($errors) == 0){
                $pw = md5($pass);
                $query = "INSERT INTO users(uname ,fname, email, password, nphone, address, type) VALUES ('$uname_admin', '$fname', '$email', '$pw','$nphone', '$address', '$type')";
                $results = mysqli_query($db, $query);
                echo 1;
            }
        }
        if(count($errors) > 0)
            foreach ($errors as $error) {
                echo $error.".\n";
            }
    }

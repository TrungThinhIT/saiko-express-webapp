<?php
/* $dbname = "HuyChicky_Saiko";
    $host = "localhost";
    $dbusername = "HuyChicky_Saiko";
    $dbpass = "=r4WJg^!uM#m_Wj.@";
*/
$dbname = "HuyChicky_WMS2";
$host = "localhost";
$dbusername = "HuyChicky_WMS2";
$dbpass = "B2)Yn}a5)Ah6Nw";
$cur_folder = dirname(__FILE__);
//$domain = $_SERVER['REQUEST_SCHEME']."://tomoniglobal.com/";
$domain = "https://saikoexpress.com/";
$mail_admin = "saikoexpress@saikoexpress.com";

$char_jpy = "JPY"; //￥
$char_vnd = "VND"; //₫

$name_convert_state = "convert_state";
$name_convert_money = "convert_money";
$name_convert_type_post = "convert_type_post";
$name_convert_admin = "convert_admin";

$current_date = date("Y-m-d"); // ngày hiện tại -- không được thay đổi định dạng 

$max_money = 10000000000; //số tiền lớn nhất có thể đặt hàng + số tiền dự tính phát sinh sau khi đặt hàng = 10 tỉ

$results_per_page = 10; //hiển thị số lượng item lớn - phân trang
$results_per_page_small = 50; //hiển thị số lượng item nhỏ - phân trang

$num_results_order = 30; //số order được load ra mỗi lần
$num_results_message = 20; //số tin nhắn được load mỗi lần

$interval_realtime = 3000; //milisecond

$count_month_statistic = 7; //số tháng được hiển thị trong thống kê

$db = mysqli_connect($host, $dbusername, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($db, 'UTF8');

if (isset($_SESSION["uname"])) {
    $uname = $_SESSION["uname"];
}

if (isset($_SESSION["uname-admin"])) {
    $uname_admin = $_SESSION["uname-admin"];
}

if (isset($_SESSION['sign-admin'])) {
    $query_sign_admin = "users.sign = " . $_SESSION['sign-admin'];
    if (isAdmin())
        $query_sign_admin = "(" . $query_sign_admin . " OR users.sign LIKE '%')";
}

function isAdmin()
{
    if (isset($_SESSION['type-admin'])) {
        if ($_SESSION['type-admin'] == "2")
            return true;
        else return false;
    }
    return false;
}

function d($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(';', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function convert_long_short($num)
{
    if ($num < 1000)
        return $num;
    elseif ($num < 1000000)
        return round($num / 1000) . 'K';
    elseif ($num < 1000000000)
        return round($num / 1000000) . 'M';
    else
        return round($num / 1000000000) . 'B';
}

function convert_money(&$num)
{  // -100.000.000
    $ch = '';
    if (strlen($num) <= 3)
        $num *= 1; //0.001;
    else {
        $num = str_replace(".", "", $num); // -100000000
        if (strpos($num, '-') === 0) {
            $ch = '-';
            $num = str_replace("-", "", $num); // 100000000
        }
        for ($i = strlen($num) - 3; $i > 0; $i -= 3) {
            $num = stringInsert($num, $i, "."); // 100.000.000
        }
        if (strpos($num, '-') == 1)
            $num = substr($num, 2, strlen($num)); // -100.000.000
        $num = $ch . $num;
    }
}

function convert_money_int($money)
{
    $last_index_dot = strripos($money, ".");
    $length_money = strlen($money);
    if ($last_index_dot < 1) //ko co dau .
        return intval($money);
    else {
        $money = str_replace(".", "", $money); // xxxxxxxxx
        if ($length_money - $last_index_dot == 3) // xxx.xx
            $money *= 10;
        elseif ($length_money - $last_index_dot == 2) // xxx.x
            $money *= 100;
    }
    return intval($money);
}

function stringInsert($str, $pos, $insertstr)
{
    if (!is_array($pos))
        $pos = array($pos);

    $offset = -1;
    foreach ($pos as $p) {
        $offset++;
        $str = substr($str, 0, $p + $offset) . $insertstr . substr($str, $p + $offset);
    }
    return $str;
}

function convert_action($index)
{
    $result = '';
    switch ($index) {
        case 0:
            $result = "nộp tiền";
            break;
        case 1:
            $result = "thanh toán";
            break;
        case 2:
            $result = "cập nhật";
            break;
        default:
            break;
    }
    return $result;
}

function convert_state($index, $type = 0)
{
    $result = '';
    switch ($index) {
        case 0:
            if ($type == 0)
                $result = "chưa đặt cọc";
            elseif ($type == 1)
                $result = "chờ báo giá";
            else
                $result = "chờ gửi hàng";
            break;
        case 1:
            if ($type == 0)
                $result = " đã đặt cọc";
            elseif ($type == 1)
                $result = "chờ báo giá";
            else
                $result = "đã nhận hàng";
            break;
        case 2:
            if ($type == 0)
                $result = " đã duyệt";
            elseif ($type == 1)
                $result = " đã báo giá";
            else
                $result = "đã kiểm hàng";
            break;
        case 3:
            if ($type == 0)
                $result = "đã mua hàng";
            else
                $result = "chờ thanh toán";
            break;
        case 4:
            if ($type == 0)
                $result = "đã kiểm hàng";
            else
                $result = " đã thanh toán";
            break;
        case 5:
            $result = " đang giao hàng";
            break;
        case 6:
            $result = "đã nhận hàng";
            break;
        case 7:
            $result = "đã hủy";
            break;
        default:
            $result = '';
            break;
    }
    return $result;
}

function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

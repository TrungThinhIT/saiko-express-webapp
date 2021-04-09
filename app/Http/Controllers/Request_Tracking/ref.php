<?php
session_start();
include("../config.php");
header('Content-Type: application/json');

$body = file_get_contents('php://input');

$object = json_decode($body);
//Creat Tickit
if ($New_Tickit = $object->Creat_Tickit) {
    $Title_Tickit = $object->Title;
    $Content_Tickit = $object->Content;
    $Tracking_Tickit = $object->Tracking;
    $MAC_Address = $object->MAC_Address;
    $QueryCount = "SELECT Id FROM `SaikoTickit` ORDER BY Id DESC LIMIT 1";
    $Date_check = date("yy:m:d");
    $QueryTrack = "SELECT Tracking_number,Date_insert FROM `Tracking_User` WHERE Tracking_number='$Tracking_Tickit' AND LEFT(Date_insert,10)='$Date_check'";
    $CountTrack = mysqli_fetch_row(mysqli_query($db, $QueryTrack))[0];
    $CountDate = mysqli_fetch_row(mysqli_query($db, $QueryTrack))[0];
    if ($QueryTrack != $Tracking_Tickit && $CountDate != $Date_check) {
        $CountId = mysqli_fetch_row(mysqli_query($db, $QueryCount))[0];
        $Code_Tickit = "T00" . $CountId . "VN";
        $Query = "INSERT INTO `SaikoTickit`(`Title`, `Content`, `Tracking_number`, `SKU`, `Code_Tickit`, `MAC_Add`, `Status`) 
            VALUES ('$Title_Tickit','$Content_Tickit','$Tracking_Tickit','$SKU','$Code_Tickit','$MAC_Address','New')";
        if (mysqli_query($db, $Query)) {
            $Respone->Success = true;
            $Respone->Code = '1A';
            $Respone->Mesenger = 'Tạo khiếu nại thành công';
            echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
        } else {
            $Respone->Success = false;
            $Respone->Code = '0A';
            $Respone->Mesenger = 'Err Insert';
            echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
        }
    } else {
        $Respone->Success = false;
        $Respone->Code = '0B';
        $Respone->Mesenger = 'Err Tracking';
        echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
    }
}
// Reply Ticket
if ($Rep_Ticket = $object->Reply_Ticket) {
    $Tracking_Tickit = $object->Tracking;
    $Content_Tickit = $object->Content;
    $MAC_Address = $object->MAC_Address;
    $Code_Ticket = $object->Code_Ticket;
    $Query = "INSERT INTO `SaikoTickit`(`Content`, `Tracking_number`, `Code_Tickit`, `MAC_Add`, `Status`) 
            VALUES ('$Content_Tickit','$Tracking_Tickit','$Code_Ticket','$MAC_Address','Client')";
    if (mysqli_query($db, $Query)) {
        $Respone->Success = true;
        $Respone->Code = '1B';
        $Respone->Mesenger = 'Reply OK';
        echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
    } else {
        $Respone->Success = false;
        $Respone->Code = '0C';
        $Respone->Mesenger = 'Err Post Reply';
        echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
    }
}
// List Ticket
if (isset($_GET['GetlistTicket'])) {
    $Mac_add = $_GET['GetlistTicket'];
    $Query = "SELECT * FROM `SaikoTickit` WHERE SaikoTickit.Status='New' AND MAC_Add='$Mac_add'";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = array(
            'Code_Ticket' => $row['Code_Tickit'],
            'Title' => $row['Title'],
            'Tracking_number' => $row['Tracking_number'],
            'Datetime' => $row['Date_insert'],
            'iClose' => $row['iClose'],
        );
    }
    $temp["ListTicket"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
// info content ticket
if (isset($_GET['GetInfoTicket'])) {
    $codeTicket = $_GET['GetInfoTicket'];
    $Query = "SELECT * FROM `SaikoTickit` WHERE Code_Tickit='$codeTicket'";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = array(
            'Code_Ticket' => $row['Code_Tickit'],
            'Title' => $row['Title'],
            'Content' => $row['Content'],
            'Tracking_number' => $row['Tracking_number'],
            'Datetime' => $row['Date_insert'],
            'Status' => $row['Status'],
            'iClose' => $row['iClose'],
        );
    }
    $temp["ListContent"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
//getPrice
if (isset($_GET['GetPrice'])) {
    $GetPrice = $_GET['GetPrice'];
    $Method = $_GET['Method'];
    $PriceDec = $_GET['Price declaration'];

    $collect = array(
        "Air" => "200.000",
        "Sea" => "55.000",
        "Machining" => "55.000",
        "Price declaration" => "8.000.000",
        "Insurrance" => "5"
    );
    echo json_encode($collect, JSON_UNESCAPED_UNICODE);
}
//Creat Tracking
if ($TrakingString = $object->tracking_number) {

    $Tracking = $object->tracking_number;
    $Count = $object->tracking_number_counter;
    $Shipmethod = $object->shipping_method;
    $Package = $object->isPackaged;
    $Name_Send = $object->sender_name;
    $Name_Rev = $object->receiver_name;
    $Receiver_phone_number = $object->receiver_phone_number;
    $Detail_address = $object->detail_address;
    $Phone_Send = $object->sender_phone_number;
    $Type = $object->Type_Payment;
    $Note = $object->note;
    $IP = $object->IP;
    $Code_Add = $object->Code_Add;
    $temp = array();
    $collect = array();
    for ($i = 0; $i < $Count; $i++) {
        $QueryCount = "SELECT COUNT(Tracking_number) FROM Tracking_User WHERE Tracking_number='$Tracking[$i]' LIMIT 1";
        $CountTrack = mysqli_fetch_row(mysqli_query($db, $QueryCount))[0];
        if ($CountTrack < 1) {
            $query = "INSERT INTO Tracking_User( Tracking_number, Uname_Send, Uname_Rev, Add_Rev, Phone_Rev, Type_Payment, Note_Rev, ShipMethod, Reparking,IP_location, Number_Send, Add_Math) 
                    VALUES ('$Tracking[$i]','$Name_Send','$Name_Rev','$Detail_address','$Receiver_phone_number','$Type','$Note', '$Shipmethod','$Package', '$IP', '$Phone_Send','$Code_Add')";
            if (mysqli_query($db, $query)) {
                //$query = "CALL Timeline_Tracking('Đang đến kho','$uname','$Track[$i]')";
                //mysqli_query($db, $query);
                $collect[] = array(
                    "Success" => true,
                    "Code" => $Tracking[$i],
                    "Mesenger" => 'Create Tracking OK!'
                );
            }
        } else {
            $collect[] = array(
                "Success" => false,
                "Code" => $Tracking[$i],
                "Mesenger" => 'Fail! Tracking already exists.'
            );
        }
    }
    $temp["Result"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
// List SKU
if (isset($_GET['GetlistSKU'])) {
    $GetlistSKU = $_GET['GetlistSKU'];
    $QueryCount = "SELECT count(*) FROM `Tracking_User`,WH_SKU,Nhap_Kho WHERE Tracking_User.Tracking_number='$GetlistSKU' AND Tracking_User.Tracking_number=Nhap_Kho.Tracking_Number AND WH_SKU.SFA=Nhap_Kho.SFA";
    $CountSKU = mysqli_fetch_row(mysqli_query($db, $QueryCount))[0];
    $Query = "SELECT SKU FROM `Tracking_User`,WH_SKU,Nhap_Kho WHERE Tracking_User.Tracking_number='$GetlistSKU' AND Tracking_User.Tracking_number=Nhap_Kho.Tracking_Number AND WH_SKU.SFA=Nhap_Kho.SFA";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = $row["SKU"];
    }
    $temp["ListSKU"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
if (isset($_GET['GetlistTickit'])) {
    $Macadd = $_GET['GetlistTickit'];
    $Query = "SELECT * FROM `SaikoTickit` WHERE MAC_Add='$Macadd' GROUP BY Tracking_number ORDER BY Id DESC";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = $row["Tracking_number"];
    }
    $temp["ListTracking"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
if (isset($_GET['ListTracking'])) {
    $Macadd = $_GET['ListTracking'];
    $Query = "SELECT * FROM `Tracking_User2` WHERE IP_Location='$Macadd' ORDER BY Id DESC LIMIT 15";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = array(
            "Tracking_number" => $row["Tracking_number"],
            "TenNguoiNhan" => $row["Uname_Rev"],
            "ShipMethod" => $row["ShipMethod"]
        );
    }
    $temp["ListTracking"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
// info SKU
if (isset($_GET['SearchInfoSKU'])) {
    $GetinfoSKU = $_GET['SearchInfoSKU'];
    $Tracking = $_GET['Trackingnumber'];
    $Query = "SELECT WH_SKU.SKU,WH_SKU.Can_Nang,WH_SKU.Chieu_Cao,WH_SKU.Chieu_Rong,WH_SKU.Chieu_Dai,Tracking_User.* FROM `WH_SKU`,Nhap_Kho,Tracking_User WHERE WH_SKU.SKU='$GetinfoSKU' AND WH_SKU.SFA=Nhap_Kho.SFA AND Nhap_Kho.Tracking_Number=Tracking_User.Tracking_number";
    $result = mysqli_query($db, $Query);
    $SKUCheck = "";
    foreach ($result as $row) {
        $SKU = $row['SKU'];
        $SKUCheck = $SKU;
        $SKU = str_replace('1811', '***', $SKU);
        $SKU = str_replace('1984', '***', $SKU);
        $collect[] = array(
            "SKU" => $SKU,
            "Can_Nang" => $row["Can_Nang"],
            "Tracking_number" => $row["Tracking_number"],
            "Uname_Send" => $row["Uname_Send"],
            "Number_Send" => $row["Number_Send"],
            "Uname_Rev" => $row["Uname_Rev"],
            "Number_Rev" => $row["Phone_Rev"],
            "Add_Rev" => $row["Add_Rev"],
            "Note_Rev" => $row["Note_Rev"],
            "Reparking" => $row["Reparking"],
            "ShipMethod" => $row["ShipMethod"],
            "CODPriceJP" => $row["PriceCOD"],
            "CODPriceVN" => false,
        );
    }
    $QueryItem = "SELECT WH_SKU_Item.Quantity,product_standard.name FROM WH_SKU_Item,product_standard WHERE product_standard.jan_code=WH_SKU_Item.Item AND WH_SKU_Item.SKU='$SKUCheck'";
    //echo json_encode(array('success' => 'true','SKU'=>$SKU),'');
    $ListItem = mysqli_query($db, $QueryItem);
    foreach ($ListItem as $row) {
        $cu[] = array(
            'Quantity' => $row['Quantity'],
            'Name' => $row['name']
        );
    }
    $QueryTrack = "SELECT * FROM `TimelineTrack` WHERE Tracking_number='$Tracking'";
    $Track = mysqli_query($db, $QueryTrack);
    foreach ($Track as $row) {
        $trackinfo[] = array(
            'Date_line' => $row['Date_line'],
            'StatusTrack' => $row['StatusTrack'],
            'StatusTrack' => $row['StatusTrack'],
        );
    }
    $temp["InfoSKU"] = $collect;
    $temp["Detail"] = $cu;
    $temp["Timeline"] = $trackinfo;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
// Location
if (isset($_GET['ReadTP'])) {
    $TinhTP = $_GET['ReadTP'];
    $Query = "SELECT * FROM `VNPOST_TinhThanh` WHERE 1";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = array(
            "Matp" => $row["MaTinhThanh"],
            "Title" => $row["TenTinhThanh"],
            "TypeTP" => $row["Id"],
        );
    }
    $temp["Yar"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
if (isset($_GET['Province'])) {
    $MaTP = $_GET['Province'];
    $Query = "SELECT * FROM `VNPOST_QuanHuyen` WHERE MaTinhThanh='$MaTP'";
    $result = mysqli_query($db, $Query);


    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'Maqh' => $row['MaQuanHuyen'],
            'Title' => $row['TenQuanHuyen'],
            'TypeQH' => $row['Id'],
            'MTatp' => $row['MaTinhThanh'],
            'Innercity' => $row['Noi_Thanh'],
        );
    }
    $temp["Province"] = $results;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}
if (isset($_GET['District'])) {
    $MaQH = $_GET['District'];
    $Query = "SELECT * FROM `VNPOST_PhuongXa` WHERE MaQuanHuyen='$MaQH'";
    $result = mysqli_query($db, $Query);
    while ($row = mysqli_fetch_array($result)) {
        $results[] = array(
            'Xaid' => $row['MaPhuongXa'],
            'Title' => $row['TenPhuongXa'],
            'TypeDis' => $row['Id'],
            'Maqh' => $row['MaQuanHuyen'],
        );
    }
    $temp["District"] = $results;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
    // [District] {}
}
if (isset($_GET['SKUInfo'])) {
    $SKU = $_GET['SKUInfo'];
    $Query = "SELECT WH_SKU.*,Tracking_User.Add_Math FROM `WH_SKU`,Nhap_Kho,Tracking_User WHERE WH_SKU.SKU='$SKU' AND WH_SKU.SFA=Nhap_Kho.SFA AND Tracking_User.Tracking_number=Nhap_Kho.Tracking_Number";
    $result = mysqli_fetch_row(mysqli_query($db, $Query));
    $Locacode = explode(",", $result['13']);
    $querydistric = "SELECT Id FROM `VNPOST_TinhThanh` WHERE MaTinhThanh='$Locacode[1]'";
    $SendDisc = mysqli_fetch_row(mysqli_query($db, $querydistric))[0];
    if ($SendDisc > 32) {
        $SendDisc = "70";
        $ProSend = "7360";
    } else {
        $SendDisc = "10";
        $ProSend = "1390";
    }
    $results = array(
        'SKU' => $result['2'],
        'CanNang' => $result['6'] * 1000,
        'ChieuCao' => $result['7'],
        'ChieuRong' => $result['8'],
        'ChieuDai' => $result['9'],
        'DistricRev_Code' =>  $Locacode[1],
        'ProvinceRev_Code' =>  $Locacode[0],
        'DistricSend_Code' => $SendDisc,
        'ProvinceSend_Code' => $ProSend
    );
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}

if ($CostShipVN = $object->CostShipVN) {
    $Weight = $object->Weight;
    $Height = $object->Height;
    $Width = $object->Width;
    $Length = $object->Length;
    $SenderDistrictId = $object->SenderDistrictId;
    $SenderProvinceId = $object->SenderProvinceId;
    $ReceiverDistrictId = $object->ReceiverDistrictId;
    $ReceiverProvinceId = $object->ReceiverProvinceId;
    $IsReceiverPayFreight = $object->IsReceiverPayFreight;
    $CodAmount = $object->CodAmount;
    $OrderAmount = $object->CodAmount;

    $url = 'https://vnpost.vnit.top/api/api/DoiTac/TinhCuocTatCaDichVu';
    $data = array(
        'SenderDistrictId' => $SenderDistrictId,
        'SenderProvinceId' => $SenderProvinceId,
        'ReceiverDistrictId' => $ReceiverDistrictId,
        'ReceiverProvinceId' => $ReceiverProvinceId,
        'Weight' => $Weight,
        'Width' => $Width,
        'Length' => $Length,
        'Height' => $Height,
        'CodAmount' => $CodAmount,
        'IsReceiverPayFreight' => $IsReceiverPayFreight,
        'OrderAmount' => $OrderAmount,
        'UseBaoPhat' => true,
        'UseHoaDon' => true,
        'CustomerCode' => '0843211234C333345'
    );

    $postdata = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'h-token:eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJTb0RpZW5UaG9haSI6IjA5NDMyMTEyMzQiLCJFbWFpbCI6bnVsbCwiTWFDUk0iOm51bGwsIkV4cGlyZWRUaW1lIjo2NDA1Mjg0NzQ1NzQ4NS45NjksIlJvbGVzIjpbOTk5LDExLDEzXSwiTmd1b2lEdW5nSWQiOiI4YWQ1Y2ZkYi1lMWRjLTRlZjItODIyZS1jMDQ1Yjc5OTM0YzgiLCJNYVRpbmhUaGFuaCI6IjcwIiwiVGVuTmd1b2lEdW5nIjoixJDhu5FpIHTDoWMgY2h1bmciLCJOZ2F5VGFvVG9rZW4iOiJcL0RhdGUoMTYwMTg2NTQ1NzQ4NSlcLyIsIlRpbWVMYXN0UmVhZENvbW1lbnQiOm51bGwsIk1hQnV1Q3VjIjpudWxsLCJNYVRpbmhUaGFuaFF1YW5MeSI6bnVsbCwiQ1JNX0VtcGxveWVlSWQiOm51bGwsIk5nYXlUYW9Ub2tlblRpbWVTdGFtcCI6MTYwMTg2NTQ1NzQ4NX0.KqZh4Ngu0g3APXNs1BEWu_JwoBQa_upj5An9SF_FASFvpWaU-ElacBRtAZ8Ybw4JeNsUrYd0fpgYhouGr6MT7d5Jb9rbaaIRQR4Mqdgpar7V30UuLR1nCvjCXhiSk8FLiFxtExHXjYUB0rOeyCmYpnN_gXvLQpS-iYHvky7qXro'));
    $result = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($result, true);
    if (($ReceiverProvinceId == 10) || ($ReceiverProvinceId == 70)) {
        $TongCuocSauVAT = $arr[0]['TongCuocSauVAT'];
        $CuocCOD = $arr[0]['CuocCOD'];
        $PhuongThucVC = 'Chuyển Nhanh';
    } else {
        $TongCuocSauVAT = $arr[1]['TongCuocSauVAT'];
        $CuocCOD = $arr[1]['CuocCOD'];
        $PhuongThucVC = 'Chuyển Chậm';
    }
    $results = array(
        'MaDichVu' => 'BƯU ĐIỆN',
        'TongCuocSauVAT' => $TongCuocSauVAT,
        'CuocCOD' => $CuocCOD,
        'CuocKhaiGia' => 0,
        'TongCuocDichVuCongThem' => 0,
        'TienVC_NhatViet' => 0,
        'SoTienCodThuNoiNguoiNhan' => $CuocCOD + $TongCuocSauVAT,
        'PhuongThucVC' => $PhuongThucVC
    );
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}
// COD Submit
if ($COD_Change = $object->COD_Change) {
    $Tracking = $object->Tracking;
    $SKU = $object->SKU;
    $PriceCODVN = $object->PriceCODVN;
    $Respone->Success = true;
    $Respone->Code = '0H';
    $Respone->Mesenger = 'OK';
    echo json_encode($Respone, JSON_UNESCAPED_UNICODE);
}
// get list area
if (isset($_GET['GetlistArea'])) {
    //$Mac_add = $_GET['GetlistArea'];
    $Query = "SELECT * FROM `ListArea` WHERE 1";
    $result = mysqli_query($db, $Query);
    foreach ($result as $row) {
        $collect[] = array(
            'Id' => $row['id'],
            'Area' => $row['Area']
        );
    }
    $temp["ListArea"] = $collect;
    echo json_encode($temp, JSON_UNESCAPED_UNICODE);
}

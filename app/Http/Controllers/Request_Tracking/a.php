<?php
include("../config.php");
$Tracking;$captcha;
  $Tracking = filter_input(INPUT_POST, 'tracking', FILTER_SANITIZE_STRING);
  $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
  if(!$captcha){
    echo '<h2>Please check the the captcha form.</h2>';
    exit;
  }
  $secretKey = "6LexXeoUAAAAABr0suxvz6y4s34WXbbDvtBK3riN";
  $ip = $_SERVER['REMOTE_ADDR'];

  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array('secret' => $secretKey, 'response' => $captcha);

  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
  $responseKeys = json_decode($response,true);
  header('Content-type: application/json');
  if($responseKeys["success"]) {

    $checkTracking = "SELECT Count(Tracking_number) FROM `Tracking_User` WHERE Tracking_number='$Tracking'";
    $Check_Track = mysqli_fetch_row(mysqli_query($db,$checkTracking))[0];
    if($Check_Track>0){
      $Query ="SELECT WH_SKU_Item.Quantity,product_standard.name FROM WH_SKU_Item,product_standard,Nhap_Kho WHERE product_standard.jan_code=WH_SKU_Item.Item AND WH_SKU_Item.SFA=Nhap_Kho.SFA AND Nhap_Kho.Tracking_Number='$Tracking'";
      //echo json_encode(array('success' => 'true','SKU'=>$SKU),'');
      $SQL = mysqli_query($db,$Query);
      $results = array();
      while($row = mysqli_fetch_array($SQL)){
          $results[] = array(
          'success' => 'true',
          'Quantity' => '<tr><td>'.$row['Quantity'].'</td>',
          'name' => '<td>'.$row['name'].'</td></tr>'
       );
      }
    }

    //echo json_encode($results);
    
        $QueryTimeline="SELECT Date_line,Tracking_number,StatusTrack FROM TimelineTrack WHERE Tracking_number='$Tracking'";
        $SQL2 = mysqli_query($db,$QueryTimeline);
        while($row = mysqli_fetch_array($SQL2)){
            $results[] = array(
            'Date' => '<li><a>'.$row['Date_line'].'</a>',
            'Tracking' => $row['Tracking_number'],
            'Status' => '<p>'.$row['StatusTrack'].'</p></li>'
         );
		}
		
        $QueryInfo="SELECT WH_SKU.SKU,WH_SKU.Can_Nang,(WH_SKU.Chieu_Cao*WH_SKU.Chieu_Rong*WH_SKU.Chieu_Dai)/6000 As Kg_TheTich,Tracking_User.Uname_Send,Tracking_User.Uname_Rev,Tracking_User.Phone_Rev,Tracking_User.Add_Rev,Nhap_Kho.Soluong_thung FROM Nhap_Kho LEFT JOIN WH_SKU ON WH_SKU.SFA=Nhap_Kho.SFA RIGHT JOIN Tracking_User ON Tracking_User.Tracking_number=Nhap_Kho.Tracking_number WHERE Tracking_User.Tracking_number='$Tracking'";
		$SQL3 = mysqli_query($db,$QueryInfo);
        while($row = mysqli_fetch_array($SQL3)){
            $SKU=$row['SKU'];
            
            $SKU = str_replace('1811','***',$SKU);
            $SKU = str_replace('1984','***',$SKU);
            
            $results[] = array(  
            'CanNang' => $row['Can_Nang'],
            'Kg_TheTich' => $row['Kg_TheTich'],
            'TenNguoi_Gui' => $row['Uname_Send'],
            'TenNguoi_Nhan' => $row['Uname_Rev'],
            'SoDienThoai' => $row['Phone_Rev'],
            'Dia_Chi' => $row['Add_Rev'],
            'ID_Thung' => $SKU,
		 );
		}
		 
        echo json_encode($results);
        /*
        <li>
                                					<a>New Web Design</a>
                                					<p>4567</p>
                                				</li>*/
    }
    else {
    echo json_encode(array('success' => 'false'));
  }
  ?>
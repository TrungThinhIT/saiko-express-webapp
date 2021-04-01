<?php
    $query = "SELECT * FROM transport WHERE codetransport = '$code' LIMIT 1";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) < 1)
        echo("<script>location.href ='account/transport.php';</script>");
        
    $result = mysqli_fetch_assoc($result);

    convert_money($result['total']);
    convert_money($result['total_all']);
    convert_money($result['fee_box']);
    convert_money($result['fee_service']);
    if($result['uname'] != NULL)
        $query = "SELECT * FROM transport_to WHERE uname='$result[uname]'";
    else{
        $uname_tr = explode('-', $result['codetransport'])[1];
        $query = "SELECT users.fname, users.address, users.nphone FROM users WHERE uname = '$uname_tr'";
    } 
    $result_transport_to = mysqli_fetch_assoc(mysqli_query($db, $query));    

    $query = "SELECT product_standard.name, product.quantity FROM product, product_standard WHERE product_standard.jan_code = product.jan_code AND product.codeorder = '$result[codeorder]'";
    $products = mysqli_query($db, $query);

    $query = "SELECT quantity FROM oder WHERE codeorder = '$result[codeorder]'";
    $total_quatity = mysqli_fetch_row(mysqli_query($db, $query))[0];

    $query = "SELECT uname,note FROM noteshop WHERE codeshop='NONE' AND codeorder='$result[codeorder]'";
    $resultnote = mysqli_query($db, $query);
?>

<div class='row'>
    <div class='col-sm-12 col-md-12'>
        <div class='table-responsive'>
            <div class='panel-body'>
                <table class='table table-bordered transport'>
                    <thead>
                        <th class='col-md-5'>Tên hàng</th>
                        <th class='col-md-2'>Số lượng</th>
                        <th class='col-md-5' colspan=2>Chi tiết</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=2 rowspan=6>
                                <div class="panel-body list-product">
                                    <ul>
                                        <?php $i=1; foreach ($products as $product):?>
                                        <li>
                                            <label class='name'><?php echo $i.". ".$product['name'];?></label>
                                            <label class='quantity'><?php echo $product['quantity'];?></label>
                                        </li>
                                        <?php $i++; endforeach;?>
                                    </ul>
                                </div>
                            </td>
                            <td><p>Số lượng</p></td>
                            <td><p><?php echo $total_quatity;?></p></td>
                        </tr>
                        <tr>
                            <td>Khối lượng</td>
                            <td><p><?php echo $result['weight'].' Kg';?></p></td>
                        </tr>
                        <tr>
                            <td>Đóng thùng</td>
                            <td><p><?php echo $result['is_package'] == 0 ? "Không" : $result['fee_box'].' '.$char_vnd;?></p></td>
                        </tr>
                        <tr>
                            <td>Phí dịch vụ</td>
                            <td><p><?php echo $result['fee_service'].' '.$char_vnd;?></p></td>
                        </tr>
                        <tr>
                            <td>Loại vận chuyển</td>
                            <td><p><?php echo $result['ship_method'] == 1 ? "Hàng không" : "Biển";?></p></td>
                        </tr>
                        <tr>
                            <td>Ngày tạo đơn</td>
                            <td><p><?php echo $result['dateget'];?></p></td>
                        </tr>
                        <tr>
                            <td colspan=2 rowspan=4 class='note-box'>
                                <div id='note-box' class='panel-body panel-scroll scroll-bottom'>
                                <ul id='NONE'>
                                    <?php 
                                        foreach ($resultnote as $rownote){
                                            $type_user = mysqli_fetch_row(mysqli_query($db, "SELECT type FROM users WHERE uname='$rownote[uname]'"));
                                            $color = "";
                                            if($type_user[0] == 1)
                                                $color = "style='color:blue;'";
                                            elseif($type_user[0] == 2)
                                                $color = "style='color:red;'";
                                            echo "<li class='lu'>
                                                    <div class='header'><strong $color class='primary-font'>$rownote[uname] :&nbsp;</strong>$rownote[note]</div>
                                                </li>";
                                        }
                                    ?>
                                </div><!--/.table-scroll-->
                                <form class='form-note'>
                                    <div class='input-group'>
                                        <input id='<?php echo 'noteNONE';?>' name='note' style='border:1px solid #465cce' type='text' class='form-control input-md' placeholder='Nhập ghi chú' /><span class='input-group-btn'>
                                        <input type='button' value='Gửi' class='btn btn-primary btn-md pull-right' name='send-note' style='border-radius:0em' onclick="sendnote('NONE')">Gửi</span>
                                        <input name='codeshop' hidden='hidden' value='NONE'>
                                    </div><!--/.note box-->
                                </form>
                            </td>
                            <td>Ngày giao hàng</td>
                            <td><p><?php echo $result['datedone'];?></p></td>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển</td>
                            <td><p><?php echo $result['total'].' '.$char_vnd;?></p></td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td><p class='bold-orange'><?php echo convert_state($result['state'],2);?></p></td>
                        </tr>
                        <tr>
                            <td>Tổng tiền</td>
                            <td><p class='bold-red'><?php echo $result['total_all'].' '.$char_vnd;?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                    switch ($result['state']) {
                        case 0:
                            echo "<input type='button' class='btn btn-danger' value='Hủy' onclick=transport_cancel('$result[codetransport]')>";
                            break;
                        case 1:
                            echo "<input type='button' class='btn btn-danger' value='Hủy' onclick=transport_cancel('$result[codetransport]')>";
                            break;
                        case 2:
                            echo "<input type='button' class='btn btn-primary' value='Chấp nhận' onclick=transport_accept('$result[codetransport]')>";
                            echo "<input type='button' class='btn btn-danger' value='Hủy' onclick=transport_cancel('$result[codetransport]') style='margin-left:20px'>";
                            break;
                    }
                ?>
            </div>

            <div class='panel-body'>
                <h4>Gửi đến</h4>
                <table class='table table-bordered transport'>
                    <thead>
                        <th class='col-md-3'>Họ tên</th>
                        <th class='col-md-6'>Địa chỉ</th>
                        <th class='col-md-3'>SĐT</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $result_transport_to['fname'];?></td>
                            <td><?php echo $result_transport_to['address'];?></td>
                            <td><?php echo $result_transport_to['nphone'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
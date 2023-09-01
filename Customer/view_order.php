<?php include('h.php');

$order_id = $_POST["order_id"]

?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>
<?php include 'navbar.php';?>
<div class="container" >

    <div class="row">
        
        
        <div class="col-lg-12" >
        <br>
            <h4>ประวัติคำสั่งซื้อ<?php echo $order_id ?></h4>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr align="center">
                        <th>ลำดับที่</th>
                        <th>รหัสสินค้า</th>
                        <th>รูปสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>รวม/รายการ</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('connect.php');
                    // LOAD ORDER DATA
                    $sql = "select * from tb_order_detail where order_id = '$order_id' ";
                    $load = $con->query($sql);
                    $i=1;
                    while($data = $load->fetch_array()):
                        $sum = 0;
                        $p_id = $data['p_id'];
                        $sql1 = "SELECT * FROM tbl_product where p_id = '$p_id'";
                        $load1 = $con->query($sql1);
                        $data1 = $load1->fetch_array()
                ?>
                        <tr align="center" valign="middle">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['p_id']; ?></td>
                            <td><img class="img-thumbnail" src="admin/p_img/<?=$data1['p_img'];?>" alt=""></td>
                            <td><?php echo $data1['p_name']; ?></td>
                            <td><?php echo $data1['p_price']; ?></td>
                            <td><?php echo $data['p_qty'] ?></td>
                            <?php $sum = $data1['p_price']*$data['p_qty'];?>
                            <td><?php echo $sum;@$total += $sum;?></td>
                        </tr>
                        
                <?php
                    $i++;
                endwhile;
            echo "<tr>";
                        echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
                        echo "<td align='right' bgcolor='#CEE7FF'>";
                        echo "<b>";
                        echo  @$total;
                        echo "</b>";
                        echo "</td>";
                        echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "</tr>";
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
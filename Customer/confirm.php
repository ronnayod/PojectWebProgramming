<?php include('h.php');?>
<?php
error_reporting( error_reporting() & ~E_NOTICE );
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ยืนยันคำสั่งซื้อ</title>
    <!-- Latest compiled and minified CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/shop-homepage.css" rel="stylesheet">
    <style type="text/css">
        @media print{
            #hid{
                display:none;
            }
        }

    </style>


</head>
<body>
<?php include 'h.php'?>

<div class="container">
    <div class="row">
        <p style="padding: 20px"><a href="cart.php">กลับหน้าตะกร้าสินค้า</a></p>
        <div class="col-lg-12">
            <?php
            date_default_timezone_set("asia/bangkok");
            echo date("d-m-Y h:i:s"); ?>
            <table  border="1" align="center" class="table">
                <tr>
                    <td  colspan="5" align="center">
                        <strong>สั่งซื้อสินค้า</strong></td>
                </tr>
                <tr class="success">
                    <td align="center">ลำดับ</td>
                    <td align="center">สินค้า</td>
                    <td align="center">ราคา</td>
                    <td align="center">จำนวน</td>
                    <td align="center">รวม/รายการ</td>
                </tr>
                <?php
                require_once('connect.php');
                $i=0;
                $total=0;
                foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
                {
                    $sql = "select * from tbl_product where p_id='$p_id'";
                    $query = $con->query($sql);
                    $row	= $query->fetch_array();
                    //$row	=  mysqli_fetch_array ($query); 
                    $sum	= $row['p_price']*$p_qty;
                    $total	+= $sum;
                    echo "<tr>";
                    echo "<td align='center'>";
                    echo  $i += 1;
                    echo "</td>";
                    echo "<td>" . $row["p_name"] . "</td>";
                    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
                    echo "<td align='right'>$p_qty</td>";
                    echo "<td align='right'>".number_format($sum,2)."</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td  align='right' colspan='4'><b>รวม</b></td>";
                echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
                echo "</tr>";
                ?>
            </table>
        </div>
    </div>
</div>
<div class="container" id="hid">
    <div class="row">
        <div class="col-lg-12">
            <button  style="display: inline-block;float: right;margin-left: 20px;" class="btn btn-info" onClick="window.print()"> พิมพ์ใบเสร็จ </button>
            <form  action="saveorder.php" method="POST" class="form-horizontal">
               <button style="float: right" class="btn btn-primary" type="submit">ยืนยันคำสั่งซื้อ</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>
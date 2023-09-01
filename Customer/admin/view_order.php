<!DOCTYPE html>
<html>
<head>
    <?php include('h.php');
    error_reporting( error_reporting() & ~E_NOTICE);
    ?>
</head>
<body>
<?php include('navbar.php');?>
<div class="container">
    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="my-4" style="margin-top:6.0rem!important;">รายการสั่งซื้อสินค้าทั้งหมด</h4>
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
                $order_id = $_POST['order_id'];
                require_once('../connect.php');
                    // LOAD ORDER DATA
                    $sql = "SELECT * FROM tb_order_detail WHERE order_id = '$order_id'";
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
                            <td><img class="img-thumbnail" src="p_img/<?=$data1['p_img'];?>" alt=""></td>
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
                        echo  $total;
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
</div>

<!-- Script -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
</body>
</html>

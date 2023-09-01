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
                    <th>รหัสการสั่งซื้อ</th>
                    <th>วันที่ซื่อสินค้า</th>
                    <th>จัดการคำสั่งซื้อ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // LOAD ORDER DATA
                require_once('../connect.php');
                $sql = "SELECT * FROM tb_order ORDER BY order_date DESC";
                $load = $con->query($sql);
                $i=1;
                while($data = $load->fetch_array()):
                    ?>
                    <tr align="center" valign="middle">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['order_id']; ?></td>
                        <td><?php echo $data['order_date'] ?></td>
                        <form action="view_order.php" method="POST">
                            <td>
                            <input type="submit" value="<?php echo $data['order_id']?>" name = "order_id"class="btn btn-success">
                            </td>
                        </form>
                    </tr>
                    <?php
                    $i++;
                endwhile;
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


<?php include('h.php');?>
<?php
//session_start();

require_once('connect.php');
@$m_user = $_SESSION['m_user'];
//LOAD CUSTOMER NAME
$nsql = "select member_id from tbl_member where m_user = '$m_user'";
$nload = $con->query($nsql);
@$member_id = @$_SESSION["member_id"]
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>
<?php include('navbar.php');?>
</div>
<?php require_once 'h.php'?>

<div class="container" style="margin-top: 7.0rem!important;">
    <?php ?>
    <div class="row">
        <div class="mb-3 col-lg-12">
            <h4 >ยินดีต้อนรับคุณ <?php echo  @$_SESSION["user"] ?></h4>
        </div>
        
        <div class="col-lg-9" >
            <h4>ประวัติคำสั่งซื้อ</h4>
            
            <table class="table table-hover">
                <thead>
                    <tr align="center">
                        <th>ลำดับที่</th>
                        <th>รหัสการสั่งซื้อ</th>
                        <th>วันที่ซื่อสินค้า</th>
                        <th>ดูคำสั่งซื้อ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // LOAD ORDER DATA
                    $sql = "select * from tb_order where member_id = '$member_id' ";
                    $load = $con->query($sql);
                    $i=1;
                    while($data = $load->fetch_array()):
                ?>
                        <tr align="center" valign="middle">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['order_id']; ?></td>
                            <td><?php echo $data['order_date'] ?></td>
                            <form action="view_order.php" method="post">
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
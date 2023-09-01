<?php
    include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
      <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE);
      ?>
<head>
  <body>
  <?php include('navbar.php');?>
      <div class="container">
            
            <p></p>
            <div class="row">
                  <div class="col-md-3">
                  <?php include('menu.php');?>
                  </div>
                  <div class="col-md-9">
                        <div class="row">
                            <?php
                                $sql = "SELECT * FROM tbl_product WHERE type_id = '".$_GET['type']."'";
                                $load = $con->query($sql);
                                while($data = $load->fetch_assoc()):
                            ?>
                                <div class="col-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="admin/p_img/<?=$data['p_img']?>" alt="">
                <div class="card-body">
                    <div class="card-title">
                        <?=$data['p_name']?><br>
                        <?=number_format($data['p_price'])?> บาท
                    </div>
                    <div class="card-text mb-2" style="
    height: 45px;
    text-overflow: ellipsis;
    overflow: hidden;">
                        <?=$data['p_detail']?>
                    </div>
                    <a href="cart.php?p_id=<?php echo $data['p_id'] ?>&act=add" class="btn btn-primary">หยิบลงตะกร้า</a>
                </div>
            </div>
        </div>
                            <?php endwhile; ?>
                        </div>
                  </div>
            </div>
      </div>  
  </body>
</html>
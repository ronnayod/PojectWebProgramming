<?php
    include 'connect.php';
    $sql = "SELECT * FROM tbl_product ORDER BY rand() LIMIT 10";
    $load = $con->query($sql);
    while($data = $load->fetch_assoc()){
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
                    <a href="cart.php?p_id=<?=$data['p_id']?>&act=add" class="btn btn-primary">หยิบลงตะกร้า</a>
                </div>
            </div>
        </div>

       <?php
    }
?>
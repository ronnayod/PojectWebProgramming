<!DOCTYPE html>
<html>
<head>
      <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE);
      ?>
<head>
  <body>
 
        <div class="container">
            <?php include('navbar.php');?>
            <p></p>
            <div class="row">
            
                  <div class="col-md-3">
                  <?php include('menu.php');?>
                  </div>
                  <div class='col-md-9'>
                    <?php
                        $act = $_GET['act'];
                        if($act == 'edit'){
                            include('customer-edit.php');
                        }elseif($act == 'update'){
                            include('customer-update.php');
                        }
                        else {
                        include('customer-list.php');
                        }
                    ?>
                </div>
    </div>
  </div>
  
  </body>
</html>
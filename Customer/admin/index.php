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
                  <?php include('menu_left.php');?>
                  </div>
                  <div class='col-md-4'>
                    <?php
                        $act = $_GET['act'];
                        if($act == 'add'){
                            include('admin-list.php');
                        }elseif($act == 'edit'){
                            include('index_from_edit.php');
                        }elseif($act== 'home'){
                            include('homeshop.php');
                        }
                        else {
                        include('admin-list.php');
                        }
                    ?>
                </div>
    </div>
  </div>
  </body>
</html>
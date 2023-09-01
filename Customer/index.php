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
                         <?php include('product.php');?>
                        </div>
                  </div>
            </div>
      </div>  
  </body>
</html
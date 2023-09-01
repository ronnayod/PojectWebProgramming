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
                <div class='col-md-9'>
                    <a href="member.php?asd=add" class='btn-info btn-sm'>เพิ่ม</a>
                    <p></p>
            
                    <?php
                        if (isset($_GET['asd'])) {
                            $asd = $_GET['asd'];
                        } else {
                            $asd = "";
                        }
                        
                        
                        if($asd === 'add'){
                            include('member_from_add.php');
                        }else if($asd === 'edit'){
                            include('member_from_edit.php');
                        }
                        else {
                        
                            include('member-list.php');
                           
                        }
                    ?>
               
            </div>
        </div>
    </body>
</html>
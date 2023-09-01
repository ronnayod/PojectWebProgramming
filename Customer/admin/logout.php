<?php
        //ออกจากระบบ
    session_start();
    if(session_destroy())
    {
        //<a href="http://localhost/Project/admin"></a>
        include('admin.php');
        // header("http://localhost/PojectWebprogaemming/customer/admin/admin.php");
    }
  
    

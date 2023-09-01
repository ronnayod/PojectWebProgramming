<?php
        //ออกจากระบบ
    session_start();
    
    if(session_destroy())
    {
        header("http://localhost/Project/customer/customer.php");
    }
  
    

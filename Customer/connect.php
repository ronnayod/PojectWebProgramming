<?php
//เชื่อมต่อฐานข้อมูล
    $con = mysqli_connect("localhost","root","","member");
    if (!$con) {
        echo $con->error;
        header("location:customer.php?act=add");
    }
   
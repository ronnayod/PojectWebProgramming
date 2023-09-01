<?php
//เชื่อมต่อฐานข้อมูล
    $com = mysqli_connect("localhost","root","","member");
    if (!$com) {
        echo $com->error;
        header("location:index.php?asd=add");
    }
   
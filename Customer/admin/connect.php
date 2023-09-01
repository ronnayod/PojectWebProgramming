<?php
//เชื่อมต่อฐานข้อมูล
    $con = mysqli_connect("localhost","root","","admin");
    if (!$con) {
        echo $con->error;
    }
   
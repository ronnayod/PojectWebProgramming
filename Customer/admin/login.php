<?php
    include 'connect.php';
    session_start();
    // รับค่าจากไฟล์ login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ดึงข้อมูลจากฐาน
    $sql = "select * from admin where USERNAME = '$username'";
    $ll = $con->query($sql);
    // โหลดข้อมูลเก็บไว้ในตัวแปร $data
    if($data = $ll->fetch_assoc()){
        if($data['PASSWORD'] == $password){
            // ถ้ารหัสผ่านถูกต้อง
          header("location:index.php?act=add");
        }
        else{
            // ถ้ารหัสผิด
            //print() // echo
            echo "กรุณากรอกรหัสใหม่" ;

            // ลิงค์ไปหน้าอื่น
            header("location:admin.php");
        }

        
    }
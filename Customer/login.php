<?php
    session_start();
    include 'connect.php';

    // รับค่าจากไฟล์ login.php
    $m_user = $_POST['username'];
    $m_pass = $_POST['password'];
    // ดึงข้อมูลจากฐาน
    $sql = "SELECT * FROM tbl_member WHERE m_user = '$m_user'";
    $ll = $con->query($sql);
    // โหลดข้อมูลเก็บไว้ในตัวแปร $data
    if($data = $ll->fetch_assoc()){
        if($data['m_pass'] == $m_pass){
            // ถ้ารหัสผ่านถูกต้อง
            $_SESSION["user"] = $m_user;
            $_SESSION["member_id"] = $data['member_id'];
          header("location:index.php?act=add");
        }
        else{
            // ถ้ารหัสผิด
            //print() // echo
            echo "กรุณากรอกรหัสใหม่" ;

            // ลิงค์ไปหน้าอื่น
            header("location:customer.php?act");
        }

        
    }
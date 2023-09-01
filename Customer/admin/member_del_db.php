<meta charset="UTF-8">

<?php
    //1. เชื่อมต่อกับ database :
    include('member-connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านั้น
    //สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้้อมูล
    $member_id = $_REQUEST["ID"];

    //ลบข้อมูลจาก database ตาม member_id ที่ส่งมา

    $sql = "DELETE FROM tbl_member WHERE member_id = '$member_id' ";
    $result = mysqli_query($com,$sql) or die ("Error in query : $sql " .mysqli_error());

    //JavaScript แสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปยังหน้ฟอร์ม
    
    if($result){
        echo "<script type = 'text/javascript'>";
        echo " window.location = 'member.php';";
        echo "</script>";
    }
    else {
        echo "<script type = 'text/javascript'>";
        echo " alert ('Error back to delete again');";
        echo "</script'>";
    }

?>
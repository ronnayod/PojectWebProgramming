<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<?php
require_once('connect.php');
@$member_id = @$_SESSION["member_id"];

// Check if the member is logged in
if (!isset($_SESSION['member_id'])) {
    echo "กรุณาเข้าสู่ระบบก่อนทำการสั่งซื้อ";
    exit;
}

// Set the timezone to Asia/Bangkok
date_default_timezone_set('Asia/Bangkok');

$msg = ''; // Initialize the message variable

if (isset($_SESSION['shopping_cart']) && count($_SESSION['shopping_cart']) > 0) {
    // Insert order information into tb_order
    $sql1 = "INSERT INTO tb_order (member_id, order_date)
             VALUES (?, ?)";
    $query1 = $con->prepare($sql1);
    $query1->bind_param("ss", $member_id, $order_date);
    
    if ($query1->execute()) {
        // Get the auto-generated order_id
        $order_id = $con->insert_id;

        // Loop through the items in the shopping cart and insert order details
        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
            // Check if the product exists in the database
            $sql3 = "SELECT * FROM tbl_product WHERE p_id=?";
            $query3 = $con->prepare($sql3);
            $query3->bind_param("s", $p_id);
            $query3->execute();
            $result3 = $query3->get_result();
            $row3 = $result3->fetch_array();
            
            if ($result3 && $result3->num_rows > 0) {
                // Calculate the total for the current item
                $total = $row3['p_price'] * $p_qty;

                // Insert order details into tb_order_detail
                $sql4 = "INSERT INTO tb_order_detail (order_id, p_id, p_qty, total)
                         VALUES (?, ?, ?, ?)";
                $query4 = $con->prepare($sql4);
                $query4->bind_param("ssss", $order_id, $p_id, $p_qty, $total);
                $query4->execute();
            } else {
                $msg = "ไม่พบสินค้าที่มีรหัส: $p_id ในฐานข้อมูล";
            }
        }
        
        if (empty($msg)) {
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว";
            unset($_SESSION['shopping_cart']); // Clear the shopping cart
        }
    } else {
        $msg = "เกิดข้อผิดพลาดในการบันทึกข้อมูลสั่งซื้อ";
    }
} else {
    $msg = "ไม่มีสินค้าในตระกร้าสินค้า";
}

$con->close();
?>

<script type="text/javascript">
    alert("<?php echo $msg; ?>");
    window.location = 'index.php';
</script>
</body>
</html>

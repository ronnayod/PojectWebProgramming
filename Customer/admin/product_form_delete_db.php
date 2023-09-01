<meta charset="UTF-8">
<?php

include('member-connect.php');  

$p_id = $_REQUEST["ID"];
 

 
$sql = "DELETE FROM tbl_product WHERE p_id='$p_id' ";
$result = mysqli_query($com, $sql) or die ("Error in query: $sql " . mysqli_error());
 

  
  if($result){
  echo "<script type='text/javascript'>";
  echo "window.location = 'product.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
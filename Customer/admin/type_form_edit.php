<?php

include('member-connect.php');  
if(isset($_GET["ID"])){
    $type_id = $_REQUEST["ID"];
   
    $sql = "SELECT * FROM tbl_type WHERE type_id='$type_id' ";
    $result = mysqli_query($com, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    extract($row);
}
else{
    header('Location:type.php');
  }
?>
<?php include('h.php');?>
<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-md-12">
        <form  name="type" action="type_form_edit_db.php" method="POST" id='type' class="form-horizontal">
          <input type="hidden" name="type_id" value="<?php echo $type_id; ?>" 
          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="type_name" type="text"  id="type_name" value="<?=$type_name;?>" 
                placeholder="ประเภทสินค้า"  title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> แก้ไขข้อมูล </button>      
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>
		
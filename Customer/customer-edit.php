
<?php include('h.php');?>
<?php
  
  include 'connect.php';
  @$m_user = @$_SESSION['user'];
  $sql = "select * from tbl_member where m_user = '@$m_user'";
  $load =$con->query($sql);
  $data = $load->fetch_array();
  
?>
<center>
<form  name="register" action="customer-edit-db.php" method="POST" class="form-horizontal">
       <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_user" type="text" required disabled class="form-control" id="m_user" 
            placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" value="<?=@$data['m_user']?>" / >
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" 
            placeholder="Password" pattern="^[a-zA-Z0-9]+$" value="<?=@$data['m_pass']?>" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" 
            placeholder="ชื่อ-สกุล "  value="<?=@$data['m_name']?>"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_email" type="email" class="form-control" id="m_email"   
            placeholder=" อีเมล์ name@hotmail.com"value="<?=@$data['m_email']?>"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_tel" type="text" class="form-control" id="m_tel" 
            placeholder="เบอร์โทร ตัวเลขเท่านั้น"value="<?=@$data['m_tel']?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <textarea  name="m_address" class="form-control" id="m_address" 
            required><?=@$data['m_address']?></textarea> 
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-5" align="right">
            <td><input type="submit" value="แก้ไขข้อมูล"class='btn btn-success btn-xs'> </td>
          </div>
        </div>
        
      </form>
      <!-- 
</center>

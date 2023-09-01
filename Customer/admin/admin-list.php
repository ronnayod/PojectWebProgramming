<?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:
                $query = "SELECT * FROM admin ORDER BY ID ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                
                echo ' <table class="table table-hover">';
                
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#FF0000'>
                      
                      <td>name</td>
                      <td>username</td>
                    
                      
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  
                    echo "<td>" .$row["USERNAME"] .  "</td> ";
                    echo "<td>" .$row["NAME"] .  "</td> ";
                    
                  echo "</tr>";
                  }
                 
                echo "</table>";
                
                //5. close connection
                mysqli_close($con);
                ?>
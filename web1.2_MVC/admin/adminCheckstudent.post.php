<?php
 
 session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  include("../mysql.inc.php");
   
   
   $class_id ="SELECT cl.class_id
              from class_information ci, class cl
              where ci.number=cl.number and ci.user_id = '".$_SESSION['user_id']."'";
  $class_r = mysql_query($class_id);
 
  $result = "";
    if (!isset($_GET["class_name"])) {
    	die("no calss_name found.");
    }
    $letter = $_GET["class_name"];
    
    //
    
    $sql_se_admin_cl= "select * FROM class_information 
                          INNER JOIN student
                         ON class_information.user_id= student.user_id 
                         where class_information.number = (select class.number from class where class.class_id = '$letter' )" ; 
 
    $result_se_admin_cl = mysql_query($sql_se_admin_cl);

    
?>

 <table class="table">
    <tr>
      <th>學號</th>
      <th>姓名</th>
      <th>密碼</th>
      <th>信箱</th>
      <th>電話</th>
      <th>刪除</th>
    </tr>
   <?php  while ($row =mysql_fetch_assoc($result_se_admin_cl)){ ?> 
    <tr>
      <td><?PHP echo $row['user_id']; ?></td>
      <td><?PHP echo $row['user_name']; ?></td>
      <td><?PHP echo $row['user_password']; ?></td>
      <td><?PHP echo $row['user_email']; ?></td>
      <td><?PHP echo $row['user_tel']; ?></td>
      <td>
       <a href="adminCheckstudent.del.php?user_id=<?PHP echo $row['user_id']; ?>" class="btn btn-default navbar-btn" >刪除</a>
      </td>     
     
     
      <td><?PHP echo $row['r_date']; ?></td>
     
    </tr>
      <?php } ?>
    </table>
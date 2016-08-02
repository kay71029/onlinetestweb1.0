<?php
 
 session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  include("../mysql.inc.php");
   
   
   $class_id ="SELECT `cl`.`class_id`
              FROM `class_information` `ci`, `class` `cl`
              WHERE `ci`.`numbe`r=`cl`.`number` AND `ci`.`user_id` = '".$_SESSION['user_id']."'";
    $class_r= $db->prepare($class_id);
    $class_r->execute();
    $result_se=$class_r->fetchAll(); 
  
  
  
  $result = "";
    if (!isset($_GET["class_name"])) {
    	die("no calss_name found.");
    }
    $letter = $_GET["class_name"];
    //$letter ="生活常識(一)" ;
    //
    
    $sql_se_admin_cl= "SELECT * FROM `class_information` 
                          INNER JOIN `student`
                         ON `class_information`.`user_id`= `student`.`user_id` 
                         WHERE `class_information`.`number` = (SELECT `class`.`number` FROM `class` WHERE `class`.`class_id` = '$letter' )" ; 
    $result_se_admin_cl= $db->prepare($sql_se_admin_cl);
    $result_se_admin_cl->execute();
    $result_se2=$result_se_admin_cl->fetchAll(); 
    

    
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
    <?php foreach($result_se2 as $row){?>
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
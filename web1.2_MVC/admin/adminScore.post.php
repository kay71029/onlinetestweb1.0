<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
   
   
 

    $result = "";
    if (!isset($_GET["class_name"])) 
      {
      	die("no calss_name found.");
      }
    $letter = $_GET["class_name"];
    
    
    /*--------------------------------------------------------
                    SELECT recode 資料表
                    
    ---------------------------------------------------------*/ 
    
    $sql_se_admin_recode= "SELECT * FROM `recode` 
                          INNER JOIN `questiondata` ON `recode`.`q_id`= `questiondata`.`q_id` 
                          where `recode`.`number` 
                          = (select `class`.`number` from `class` where `class`.`class_id` = '$letter' ) 
                          ORDER BY `recode`.`r_date` DESC" ; 
 
    $result_se_admin_recode = mysql_query($sql_se_admin_recode);


?>

  <table class="table">
  <br>
  <br>
   
  <tr>
    <th>日期</th>
    <th>學號</th>
    <th>題號</th>
    <th>答題</th>
    <th>答案</th>
    <th>分數</th>
   
  </tr>
    <?php  while ($row =mysql_fetch_assoc($result_se_admin_recode)){ ?> 
  <tr>
    <td><?PHP echo $row['r_date']; ?> </td>
    <td><?PHP echo $row['user_id']; ?> </td>
    <td><?PHP echo $row['q_id']; ?> </td>
    <td><?PHP echo $row['r_ans']; ?> </td>
    <td><?PHP echo $row['ans']; ?> </td>
    <td><?PHP echo $row['r_score']; ?> </td>
     
     <?php } ?>
     
  </tr>
  </table>
   
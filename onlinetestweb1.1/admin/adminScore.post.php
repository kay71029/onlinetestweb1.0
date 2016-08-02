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
                         WHERE `recode`.`number` 
                          = (SELECT `class`.`number` FROM `class` WHERE `class`.`class_id` = '$letter' ) 
                          ORDER BY `recode`.`r_date` DESC" ;
                          
       $result_se_admin_recode = $db->prepare($sql_se_admin_recode);    
       $result_se_admin_recode->execute();
       $result_se2=$result_se_admin_recode->fetchAll(); 
                          
             
 
    


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
    <?php foreach($result_se2 as $row){?>
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
   
<?php
 
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
  
   
  /*--------------------------------------------------------
                DELETE class資料表
              當$_GET['class_id']刪除資料 
    ---------------------------------------------------------*/
  
  $sql_de_student_str ="DELETE FROM `student` WHERE `user_id`='".$_GET['user_id']."';";
  $result_de_student_str = mysql_query($sql_de_student_str); 
  
  header("Location:adminstudentinformationck.php");
 
 
    
?>
 
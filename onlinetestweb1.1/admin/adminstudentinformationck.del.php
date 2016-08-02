<?php
 
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
  
   
  /*--------------------------------------------------------
                DELETE class資料表
              當$_GET['class_id']刪除資料 
    ---------------------------------------------------------*/
  
  $sql_de_student_str ="DELETE FROM `student` WHERE `user_id`='".$_GET['user_id']."';";
  $result_de_student_str= $db->prepare($sql_de_student_str);
  $result_de_student_str->execute();
  $result_se=$result_de_student_str->fetchAll(); 
 
  
  
  
  
  
  
  
  header("Location:adminstudentinformationck.php");
 
 
    
?>
 
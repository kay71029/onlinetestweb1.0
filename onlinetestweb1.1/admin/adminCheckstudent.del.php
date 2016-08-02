<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  include("../mysql.inc.php");
  
  
  //刪除
  
  $sql_de_quedata ="DELETE FROM `class_information` WHERE `user_id`='".$_GET['user_id']."';";
  $result_de_quedata= $db->prepare($sql_de_quedata);
  $result_de_quedata -> execute();
  $result_se=$result_de_quedata->fetchAll(); 
  

  
  header("location:adminCheckstudent.php");
   
  
  
 
?>
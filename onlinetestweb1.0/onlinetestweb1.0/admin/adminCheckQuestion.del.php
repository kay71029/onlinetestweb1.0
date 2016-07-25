<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  include("../mysql.inc.php");
  
  
  //刪除
  
  $sql_de_quedata ="DELETE FROM `questiondata` WHERE `q_id`='".$_GET['q_id']."';";
  $result_de_quedata = mysql_query($sql_de_quedata); 
  
  header("location:adminCheckQuestion.php");
   
  
  
 
?>
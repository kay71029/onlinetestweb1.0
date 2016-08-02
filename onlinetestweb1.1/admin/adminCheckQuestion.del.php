<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  include("../mysql.inc.php");
  
  
  //刪除
  
  $sql_de_quedata ="DELETE FROM `questiondata` WHERE `q_id`='".$_GET['q_id']."';";
   $result_de_quedata = $db->prepare($sql_de_quedata);
   $result_de_quedata->execute();
     $result_se=$result_de_quedata->fetchAll();
  
   
  
  header("location:adminCheckQuestion.php");
   
  
  
 
?>
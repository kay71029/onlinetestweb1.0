<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  
   
  /*--------------------------------------------------------
                DELETE class資料表
              當$_GET['class_id']刪除資料 
    ---------------------------------------------------------*/
  
  $sql_de_class_str ="DELETE FROM `class` WHERE `class_id`='".$_GET['class_id']."';";
  $result_de_class_str = mysql_query($sql_de_class_str); 
  
  header("Location:adminClass.php");
   
  
  
 
?>
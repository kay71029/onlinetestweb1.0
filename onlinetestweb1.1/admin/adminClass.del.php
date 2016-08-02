<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  
   
  /*--------------------------------------------------------
                DELETE class資料表
              當$_GET['class_id']刪除資料 
    ---------------------------------------------------------*/
  
  $sql_de_class_str ="DELETE FROM `class` WHERE `class_id`='".$_GET['class_id']."';";
  $result_de_class_str = $db->prepare($sql_de_class_str);
  $result_de_class_str->execute();
  $result_se=$result_de_class_str->fetchAll(); 
  
   
  
  header("Location:adminClass.php");
   
  
     
 
?>
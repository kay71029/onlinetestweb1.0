<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
  

    /*--------------------------------------------------------
                    UPDATE class資料表
                      新增 class 資訊
    ---------------------------------------------------------*/
  

  $sql_up_class_str="UPDATE `class` SET `class_id`='".$_POST["chalass"]."' 
                     WHERE `number`='".$_POST["number"]."' ;";
  $result_up_class_str = $db->prepare($sql_up_class_str);                    
  $result_up_class_str->execute(); 
  $result_se =$result_up_class_str->fetchAll(); 
                     
        
  header("Location:adminClass.php");
   
 
?>
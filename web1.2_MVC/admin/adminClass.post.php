<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
  
  
  /*--------------------------------------------------------
                SELECT class資料表 
        mysql_fetch_assoc()涵式 遞減排序(show最新一筆)
                傳至adminClass.php
    ---------------------------------------------------------*/
  
  $sql_se_class_str ="SELECT * FROM `class` ORDER BY `number` DESC";
  $result_se_class_str= mysql_query($sql_se_class_str);
  
  /*--------------------------------------------------------
                  進行判斷 !=null  
                INSERT  class資料表
    ---------------------------------------------------------*/
  
  if($_POST["addclass"] != null )
  {
    
  $sql_in_class_str = "INSERT INTO `class`(`class_id`)  VALUES ('".$_POST["addclass"]."');";
  $result_in_class_str= mysql_query($sql_in_class_str); 
  
  header("Location:adminClass.php");
   
  } 
  

  
   
 
?>
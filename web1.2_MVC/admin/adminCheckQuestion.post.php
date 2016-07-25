<?php

  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');

   
  /*--------------------------------------------------------
                SELECT  questiondata資料表 
                傳至adminCheckQuestion.php
    ---------------------------------------------------------*/
  
  
  $sql_se_quedata_str = "SELECT `q_id`, `question`, `A`, `B`, `C`, `D`, `ans` 
                  FROM `questiondata`";
  $result_se_quedata_str = mysql_query($sql_se_quedata_str);








?>
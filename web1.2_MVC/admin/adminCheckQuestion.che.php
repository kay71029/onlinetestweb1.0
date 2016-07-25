<?php
  session_start();
  
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
   /*--------------------------------------------------------
                UPDATE questiondata資料表
    ---------------------------------------------------------*/
    
  $chqu_id=$_POST["chqu_id"];
  $question=$_POST["question"];
  $Ans_A =$_POST["Ans_A"];
  $Ans_B=$_POST["Ans_B"];
  $Ans_C=$_POST["Ans_C"];
  $Ans_D=$_POST["Ans_D"];
  $Ans=$_POST["Ans"];
  
  
  $sql_up_che_ques ="UPDATE `questiondata` SET 
                        `question`= '$question' ,`A`='$Ans_A',`B`='$Ans_B',
                        `C`= '$Ans_C',`D`='$Ans_D',`ans`='$Ans'
                    WHERE `q_id`= '$chqu_id'";
  $result_up_che_ques = mysql_query( $sql_up_che_ques);              
    
  header("Location:adminCheckQuestion.php");
  
  
?>
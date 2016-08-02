<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  


   
  /*--------------------------------------------------------
                       新增題庫資料
       
       
    ---------------------------------------------------------*/
  
  $question=$_POST["question"];
  $Ans_A =$_POST["Ans_A"];
  $Ans_B=$_POST["Ans_B"];
  $Ans_C=$_POST["Ans_C"];
  $Ans_D=$_POST["Ans_D"];
  $Ans=$_POST["Ans"];
  $question_ok=$_POST["question_ok"];
    
    //echo $question;
  
  if(isset($question_ok))
  {
     
    $sql_up_que = "INSERT INTO `questiondata`(`question`, `A`, `B`, `C`, `D`, `ans`)
          VALUES ('$question', '$Ans_A', '$Ans_B', '$Ans_C', '$Ans_D', '$Ans')";
   $result_up_que = $db->prepare($sql_up_que);
   $result_up_que->execute();
   $result_se= $result_up_que->fetchAll(); 
   
    
        
        header("Location:adminQuestion.php");
  }
  
 

  
?>
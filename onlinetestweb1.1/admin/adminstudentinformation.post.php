<?php
  
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");

    /*--------------------------------------------------------
                INSTER INTO student資料表 
             
    ---------------------------------------------------------*/
  $addstudent=$_POST["addstudent"];
  $user_id = $_POST["user_id"];
  $user_name = $_POST["user_name"];
  
  
   if(isset($addstudent) && $user_id!=null && $user_name!=null)
  {

  $str_sql_insert_student = "INSERT INTO `student`( `user_id` ,  `user_name` )  
                             VALUES('$user_id', '$user_name')"; 
  
  $result_sql_insert_student = $db->prepare($str_sql_insert_student);
  $result_sql_insert_student->execute();
  $result_sql_insert_student->bindParam(1, $user_id, PDO::PARAM_STR);
  $result_sql_insert_student->bindParam(2, $user_name, PDO::PARAM_STR);
  $result_se= $result_sql_insert_student->fetchAll(); 
    
  
  
  
  header("Location:adminstudentinformation.php");
  
  } 
 
    
  
  
    

?>
 
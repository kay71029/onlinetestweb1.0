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

  $str_sql_insert_student = "INSERT INTO `student`(`user_id`, `user_name`)  
              values('$user_id', '$user_name')"; 
  $result_sql_insert_student=mysql_query($str_sql_insert_student);
    
  
  header("Location:adminstudentinformation.php");
  
  } 
 
    
  
  
    

?>
 
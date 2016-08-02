<?php
  
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('mysql.inc.php');
  
  
  //更新個人資料
  
  
  $fname=$_POST["fname"];
  $fpwd=$_POST["fpwd"];
  $femail=$_POST["femail"];
  $ftel=$_POST["ftel"];
  $cpwd=$_POST["cpwd"];
  $user_modify_ok=$_POST["user_modify_ok"];
  
  if($fpwd!=$cpwd)
  {
    echo"<p>請再確認密碼</p>";
     
    echo"<p> <a href = usersModify.php>回到上一頁</a></p>";
    exit();
  }
  
    //--------------------------------------------------------
    //            UPDATE student 資料表
    //---------------------------------------------------------
   
   
   
   if(isset($user_modify_ok))
    { 
      $sql_up_studnet_str = "UPDATE `student` SET `user_password`= ? ,
                                    `user_email`= ? ,`user_tel`= ?
                           WHERE `user_id` =  ? " ;
      $result_up_studnet_str = $db-> prepare($sql_up_studnet_str);
      $result_up_studnet_str->bindParam(1, $fpwd, PDO::PARAM_STR);
      $result_up_studnet_str->bindParam(2, $femail, PDO::PARAM_STR);
      $result_up_studnet_str->bindParam(3, $ftel, PDO::PARAM_INT);
      $result_up_studnet_str->bindParam(4, $_SESSION['user_id'], PDO::PARAM_STR);
      $result_up_studnet_str->execute();
      $result_se = $result_up_studnet_str->fetchAll();
      
     header("Location:main.php");
      
    }
?>
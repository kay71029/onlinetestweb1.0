<?php

    session_start();
 
    header('Content-Type: text/html; charset=utf-8');
    require("mysql.inc.php");
    
    //--------------------------------------------------------
    //                從Login頁面POST來的值
    //---------------------------------------------------------
    $id = $_POST['Username'];
    $pw = $_POST['Password'];
    
     //--------------------------------------------------------
     //     Models 
     //---------------------------------------------------------
    $sql_se_student_str= "SELECT * FROM `student` where `user_id` = ? and `user_password` = ? ";
    $result_se_student_str =  $db->prepare($sql_se_student_str);
    $result_se_student_str->bindParam(1, $id, PDO::PARAM_STR);
    $result_se_student_str->bindParam(2, $pw, PDO::PARAM_STR);
    $result_se_student_str ->execute();
   
     $result_se = $result_se_student_str->fetchAll();
    // echo   $result_se;  
    
    //--------------------------------------------------------
    //        判斷帳號與密碼是否正確，不可有空值
    //         以及MySQL資料庫裡是否有這個會員
    //---------------------------------------------------------
    

    if(count($result_se) ==1 )//筆數
    {
            //將帳號寫入session，方便驗證使用者身份
            $_SESSION['user_id'] = $id;
            echo '登入成功!';
            echo '<meta http-equiv = REFRESH CONTENT=1;url=main.php>';
    }
    else
    {
            echo '登入失敗!';
            echo '<meta http-equiv = REFRESH CONTENT=1;url=login.php>';
    } 
 
 
 
 
?>

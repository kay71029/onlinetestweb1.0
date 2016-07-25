<?php

    session_start();
 
    header('Content-Type: text/html; charset=utf-8');
    require("mysql.inc.php");
    
    /*--------------------------------------------------------
                    從Login頁面POST來的值
    ---------------------------------------------------------*/
    $id = addslashes($_POST['Username']);
    $pw = addslashes($_POST['Password']);
    
    /*--------------------------------------------------------
            搜尋資料庫 studnet表的帳號資料進行比對
               使用mysql_fetch_row()讀取查詢結果
    ---------------------------------------------------------*/
    
    $sql_se_student_str= "SELECT * FROM student where user_id = '$id' and user_password ='$pw'";
    $result_se_student_str = mysql_query($sql_se_student_str);
    $row = mysql_fetch_row($result_se_student_str);
    
    /*--------------------------------------------------------
            判斷帳號與密碼是否正確，不可有空值
             以及MySQL資料庫裡是否有這個會員

    ---------------------------------------------------------*/

if($id != null && $pw != null && $row[0] == $id && $row[2] == $pw)
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

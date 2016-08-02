<?php

    session_start();
 
    header('Content-Type: text/html; charset=utf-8');
    include("../mysql.inc.php");
    
    $id = $_POST['admin_id'];
    $pw = $_POST['admin_password'];
    
//搜尋資料庫資料
    $sql = "SELECT * FROM `admin` where `admin_id` = ? and `admin_password` = ? " ;
    $result = $db->prepare($sql);
    $result->bindParam(1, $id, PDO::PARAM_STR);
    $result->bindParam(2, $pw, PDO::PARAM_STR);
    $result->execute();
    $r=$result->fetchAll(); 
    

//判斷帳號與密碼是否為空白

//以及MySQL資料庫裡是否有這個會員
if(count($r) ==1 ){
    
    $_SESSION['admin_id'] = $id;
     echo '登入成功!';
     echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';
    
}
else {
    
      echo '登入失敗!';
      echo '<meta http-equiv=REFRESH CONTENT=1;url=adminlogin.php>';
}


?>

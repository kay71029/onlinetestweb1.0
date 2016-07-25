<?php

    session_start();
 
    header('Content-Type: text/html; charset=utf-8');
    include("../mysql.inc.php");
    
    $id = addslashes($_POST['admin_id']);
    $pw = addslashes($_POST['admin_password']);
    
    
//搜尋資料庫資料

$sql = "SELECT * FROM admin where admin_id = '$id'and admin_password = '$pw'" ;
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白

//以及MySQL資料庫裡是否有這個會員
if(mysql_num_rows($result)>0){
    
    $_SESSION['admin_id'] = $id;
     echo '登入成功!';
     echo '<meta http-equiv=REFRESH CONTENT=1;url=admin.php>';
    
}
else {
    
      echo '登入失敗!';
      echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
}


?>

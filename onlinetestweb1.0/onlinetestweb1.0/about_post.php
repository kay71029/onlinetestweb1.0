<?php
    
    
    header('Content-Type: text/html; charset=utf-8');
    include("mysql.inc.php");
    
    
    $sql_se_admin_info = "SELECT * FROM `admin`";
    $result_se_admin_info = mysql_query($sql_se_admin_info);
     echo $result_se_admin_info;
     
    
     
?>
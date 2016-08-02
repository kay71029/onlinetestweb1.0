<?php
    
    
    header('Content-Type: text/html; charset=utf-8');
    include("mysql.inc.php");
    
    
    $sql_se_admin_info = "SELECT * FROM `admin`";
    $result_se_admin_info = $db->prepare($sql_se_admin_info);
    $result_se_admin_info->execute();
    $result_se= $result_se_admin_info->fetchAll();
     
   
    
     
?>
<?php
   //資料庫設定
   $db_server="localhost";
   $db_user="root";
   $db_password="";
   $db="onlinetest";
   
   //連線資料庫
   $conn = mysql_connect($db_server, $db_user, $db_password, $db);
   
     if(mysql_error()) 
        die("無法連線資料庫伺服器");
        
   //設定連線為UTF-8 選擇資料庫
     mysql_query("set names utf8",$conn);
     mysql_selectdb("onlinetest",$conn);
     
     
?>
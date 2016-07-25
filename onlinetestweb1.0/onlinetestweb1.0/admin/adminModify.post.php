<?php
  
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  
   /*--------------------------------------------------------
                  取得$_POST相關值
                  UPDATA 個人的基本資料
    ---------------------------------------------------------*/
    
  $admin_name = $_POST["admin_name"];
  $admin_jobtitle = $_POST["admin_jobtitle"];
  $admin_educational = $_POST["admin_educational"];
  $admin_office = $_POST["admin_office"];
  $admin_tel = $_POST["admin_tel"];
  $admin_email = $_POST["admin_email"];
  $admin_specialty = $_POST["admin_specialty"];
  $officetime = $_POST["officetime"];
  $adminMondify_ok= $_POST["adminMondify_ok"];
  
   if(isset($adminMondify_ok))
  {
     $sql_up_admin_str = "UPDATE `admin` SET `name`='$admin_name',
                                          `jobtitle`='$admin_jobtitle',
                                       `educational`='$admin_educational',
                                            `office`='$admin_office',
                                               `tel`='$admin_tel',
                                             `email`='$admin_email',
                                         `specialty`='$admin_specialty',
                                        `officetime`='$officetime'
                          WHERE `admin_id` ='".$_SESSION['admin_id']."'";
                    
    $result_up_admin_str = mysql_query($sql_up_admin_str);
  
  
   header("Location:admin.php");
   }
   
   
?>
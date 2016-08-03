<?php

    session_start();
    require_once 'PDO.php';

class Admin extends Database
{
    //檢查登入資料
    function Check($id,$pw)
    {
        
        $sql = "SELECT * FROM `admin` where `admin_id` = ? and `admin_password` = ? " ;
        $result =  $this-> getconn() -> prepare($sql);
        $result->bindParam(1, $id, PDO::PARAM_STR);
        $result->bindParam(2, $pw, PDO::PARAM_STR);
        $result->execute();
        $r=$result->fetchAll(); 
        
        return $r;  
        
        
    
         
    }
    
    //取得合法認證
     function GetTeacher($id)
    {
        
        $sql = "SELECT * FROM `admin` where `admin_id` = ?  " ;
        $result =  $this-> getconn() -> prepare($sql);
        $result->bindParam(1, $id, PDO::PARAM_STR);
        $result->execute();
        $r=$result->fetchAll(); 
        
        return $r;  
        
        
    }
    
    //顯示教師資料
    function Admin_se()
    {
        $sql = "SELECT * FROM `admin` " ;
        $result=  $this-> getconn() -> prepare($sql);
        $result->execute();
        $r=$result->fetchAll(); 
        return $r;  
        
    }
    //修改教師資料
    function Admin_up($id, $admin_name,$admin_jobtitle,$admin_educational,$admin_office, $admin_tel,$admin_email,$admin_specialty, $officetime)
    {
    $sql_up_admin_str = "UPDATE `admin` SET `name`='$admin_name',
                                          `jobtitle`='$admin_jobtitle',
                                       `educational`='$admin_educational',
                                            `office`='$admin_office',
                                               `tel`='$admin_tel',
                                             `email`='$admin_email',
                                         `specialty`='$admin_specialty',
                                        `officetime`='$officetime'
                          WHERE `admin_id` ='$id'";
                    
    $result_up_admin_str=  $this-> getconn() -> prepare($sql_up_admin_str);                
    $result_up_admin_str->execute();
    $r=$result_up_admin_str->fetchAll();                 
    
    
     }


    

}

?>

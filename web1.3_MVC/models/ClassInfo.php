<?php

    session_start();
    require_once 'PDO.php';

class ClassInfo extends Database
{
    
    //顯示className 資料
    function ClassName()
    {
    $sql_se_class_str ="SELECT `number`, `class_id` FROM `class`  ORDER BY `number`";
    $result_se_class_str = $this-> getconn() -> prepare($sql_se_class_str);
    $result_se_class_str->execute();
    $result_se_class_name = $result_se_class_str->fetchAll(); 
    return $result_se_class_name;
    
    }
    
    //新增class_information資料
     function AddStudent($number,$user_id)
    {
        //echo $number;
        //echo $user_id;
         $str_sql_insertql_class_info = "INSERT INTO `class_information`( `number`, `user_id` )  
                                        VALUES((SELECT `number` FROM `class` WHERE `class_id`='$number'), '$user_id')"; 
         $result_str_sql_insertql_class_info = $this-> getconn() -> prepare( $str_sql_insertql_class_info);    
         $result_str_sql_insertql_class_info->execute();
         $result_se = $result_str_sql_insertql_class_info->fetchAll(); 
        
    }

    //刪除class資料
    function AClass_de($user_id)
    {
        $sql_de_quedata ="DELETE FROM `class_information` WHERE `user_id`='$user_id'";
        $result_de_quedata = $this-> getconn() -> prepare($sql_de_quedata);
        $result_de_quedata -> execute();
        $result_se=$result_de_quedata->fetchAll(); 
    }
    
    function AJAX($letter)
    {
     $sql_se_admin_cl= "SELECT * FROM `class_information` 
                          INNER JOIN `student`
                         ON `class_information`.`user_id`= `student`.`user_id` 
                         WHERE `class_information`.`number` = 
                         (SELECT `class`.`number` FROM `class` WHERE `class`.`class_id` = '$letter' )" ; 
     $result_se_admin_cl = $this-> getconn() -> prepare( $sql_se_admin_cl);
     $result_se_admin_cl -> execute();
     $result_se= $result_se_admin_cl ->fetchAll(); 
     
     return $result_se;
    }
    
    //class選單
    function StudentClass($id)
    {
        $sql_se_cicl_sestr ="SELECT `cl`.`class_id`
                       FROM `class_information` `ci`, `class` `cl`
                       WHERE `ci`.`number` = `cl`.`number` and `ci`.`user_id` = ? ";
        $result_se_cicl_sestr = $this-> getconn() -> prepare( $sql_se_cicl_sestr);
        $result_se_cicl_sestr ->bindParam(1, $id, PDO::PARAM_STR);
        $result_se_cicl_sestr->execute();
        $result_se =$result_se_cicl_sestr->fetchAll();
        return $result_se;
        
        
    }
}

?>
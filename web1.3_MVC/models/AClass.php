<?php

    session_start();
    require_once 'PDO.php';

class AClass extends Database
{
    //顯示class 資料
    function AClass_se()
    {
        $sql_se_class_str ="SELECT * FROM `class` ORDER BY `number` DESC";
        $result_se_class_str =  $this-> getconn() -> prepare( $sql_se_class_str);
        $result_se_class_str -> execute();
        $result_se_AClass = $result_se_class_str -> fetchAll();
        
        return $result_se_AClass;
    }
    
    //新增class資料
     function AClass_in($class)
    {
        $sql_in_class_str = "INSERT INTO `class`(`class_id`)  
                            VALUES ('$class');";
        $result_in_class_str = $this-> getconn() -> prepare( $sql_in_class_str);
        $result_in_class_str -> execute();
        $result_in_AClass = $result_in_class_str -> fetchAll();
         return $result_se_AClass;
        
    }
    
    //修改class資料
    function AClass_up($chalass,$number)
    {
        $sql_up_class_str = "UPDATE `class` SET `class_id`='$chalass' 
                            WHERE `number`='$number'";
        $result_up_class_str = $this-> getconn() -> prepare($sql_up_class_str);                    
        $result_up_class_str -> execute(); 
        $result_up_AClass = $result_up_class_str -> fetchAll(); 
    }
    
    
    //刪除class資料
    function AClass_de($class_id)
    {
        $sql_de_class_str = "DELETE FROM `class` WHERE `class_id`='$class_id'";
        $result_de_class_str = $this-> getconn() -> prepare($sql_de_class_str);
        $result_de_class_str -> execute();
        $result_de_AClass = $result_de_class_str -> fetch(); 
    }
    
    


    

}

?>
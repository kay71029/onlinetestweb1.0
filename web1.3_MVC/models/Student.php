<?php

    session_start();
    require_once 'PDO.php';

class Student extends Database
{
     
    //顯示 student 資料
    function Studnet_se()
    {
        $sql_se_student_str ="SELECT * FROM `student` ORDER BY `user_id` DESC";
        $result_se_student_str= $this-> getconn() ->prepare($sql_se_student_str);
        $result_se_student_str->execute();
        $result_se=$result_se_student_str->fetchAll(); 
        
        return  $result_se;
    }
    
    //新增student資料
     function Studnet_in($user_id,$user_name)
    {
        
        $str_sql_insert_student = "INSERT INTO `student`( `user_id` ,  `user_name` )  
                             VALUES('$user_id', '$user_name')"; 
        $result_sql_insert_student = $this-> getconn() ->prepare($str_sql_insert_student);
        $result_sql_insert_student->execute();
        $result_se_student= $result_sql_insert_student->fetchAll(); 
        
        
    }
    
    //刪除student資料
     function Student_de($user_id) 
    {
       
        $sql_de_student_str ="DELETE FROM `student` WHERE `user_id`='$user_id';";
        $result_de_student_str= $this->getconn()->prepare($sql_de_student_str);
        $result_de_student_str->execute();
        $result_se=$result_de_student_str->fetchAll(); 
       
    }
    
    //顯示 student 個人資料
    function Studnet_person($id)
    {
        $sql_se_student_se_str = "SELECT * FROM `student` WHERE `user_id`= ? ";
        $result_se_student_str= $this-> getconn() ->prepare( $sql_se_student_se_str);
        $result_se_student_str ->bindParam(1, $id, PDO::PARAM_STR);
        $result_se_student_str ->execute();
        $result_se = $result_se_student_str->fetchAll();
        return  $result_se;
    }
    
    //更新 student 個人資料
    function Studnet_personUp($fpwd,$femail,$ftel,$id)
    {
        $sql_up_studnet_str = "UPDATE `student` SET `user_password`= ? ,
                                    `user_email`= ? ,`user_tel`= ?
                               WHERE `user_id` =  ? " ;
        $result_up_studnet_str = $this-> getconn() ->prepare($sql_up_studnet_str);
        $result_up_studnet_str->bindParam(1, $fpwd, PDO::PARAM_STR);
        $result_up_studnet_str->bindParam(2, $femail, PDO::PARAM_STR);
        $result_up_studnet_str->bindParam(3, $ftel, PDO::PARAM_INT);
        $result_up_studnet_str->bindParam(4, $id, PDO::PARAM_STR);
        $result_up_studnet_str->execute();
        $result_se = $result_up_studnet_str->fetchAll();

    }
    
    //檢查資料
    function Check($id,$pw)
    {
        $sql_se_student_str= "SELECT * FROM `student` where `user_id` = ? and `user_password` = ? ";
        $result_se_student_str = $this-> getconn() ->prepare($sql_se_student_str);
        $result_se_student_str->bindParam(1, $id, PDO::PARAM_STR);
        $result_se_student_str->bindParam(2, $pw, PDO::PARAM_STR);
        $result_se_student_str ->execute();
        $result_se = $result_se_student_str->fetchAll();
        return $result_se;  
    }
}

?>
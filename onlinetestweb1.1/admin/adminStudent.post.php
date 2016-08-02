<?php
  
  
  header('Content-Type: text/html; charset=utf-8');
  require('../mysql.inc.php');
  
  
   
     /*--------------------------------------------------------
            INSTER INTO class_information資料表 
             
    ---------------------------------------------------------*/
 
  
    $str_sql_insertql_class_info = "INSERT INTO `class_information`( `number`, `user_id` )  
                              VALUES({$_POST['number']}, '{$_POST['user_id']}')"; 
                              
     $result_str_sql_insertql_class_info= $db->prepare( $str_sql_insertql_class_info);    
     $result_str_sql_insertql_class_info->execute();
     $result_se = $result_str_sql_insertql_class_info->fetchAll(); 
                              
     
     
    
    
    // if (mysql_affected_rows() == 0)
    // {
    //     echo" 失敗";
    //   }else
    //   { 
    //     echo "成功";
    //   }
     header("Location:adminStudent.php");
    
   

?>
    
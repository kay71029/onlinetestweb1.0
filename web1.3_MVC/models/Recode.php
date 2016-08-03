<?php

    session_start();
    require_once 'PDO.php';

class Recode extends Database
{
    //顯示學生成績 資料
    function  AJAX($letter)
    {
       $sql_se_admin_recode= "SELECT * FROM `recode` INNER JOIN `questiondata` ON 
                    `recode`.`q_id`= `questiondata`.`q_id` WHERE `recode`.`number` 
                     = (SELECT `class`.`number` FROM `class` WHERE `class`.`class_id` = '$letter' ) 
                    ORDER BY `recode`.`r_date` DESC" ;
       $result_se_admin_recode = $this-> getconn() ->prepare($sql_se_admin_recode);    
       $result_se_admin_recode->execute();
       $result_se=$result_se_admin_recode->fetchAll(); 
    
       return $result_se;  
    }
    
    
    function  AJAX2($letter)
    {
        $sql_se_requinner_str="SELECT `recode`.`r_date`, `recode`.`q_id`, `questiondata`.`A`, `questiondata`.`B`, `questiondata`.`C`, 
                    `questiondata`.`D`, `recode`.`r_ans`, `questiondata`.`ans`, `recode`.`r_score` , `recode`.`r_addscore`, 
                    `questiondata`.`question` 
             FROM `recode` INNER JOIN `questiondata` ON  `recode`.`q_id`= `questiondata`.`q_id` 
             WHERE `recode`.`number` = (SELECT `number`  FROM `class` WHERE `class_id` ='$letter') ORDER BY `recode`.`r_date` DESC";

        $result_se_requinner_str = $this-> getconn() ->prepare($sql_se_requinner_str);
        $result_se_requinner_str->execute();
        $result_se =$result_se_requinner_str->fetchAll();
        
        return $result_se;  
     
    }
    


    

}

?>
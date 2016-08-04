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
    
     
    //算分數
    function GetScore($id, $datetime,$number, $number1,$number2,$number3,$number4,$class_number,$Ans,$opno
                    ,$Ans1,$opno1,$Ans2,$opno2,$Ans3,$opno3,$Ans4,$opno4,$class_number)
    {
        //取得課程編號
        $cid =mb_substr($class_number,0,1,"utf-8"); 
      
        //成績比對
        if( $Ans==$opno )
        {
            $score =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number},'{$datetime}','{$opno}',1)";
                             // echo "dsds".$class_number."<br>";
                             echo  $score;
        }
       
        else 
        {
            $score =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number},'{$datetime}','{$opno}',0)";
                               //echo "dsds".$class_number."<br>";
                             echo  $score;
        }
        
            $result = $this-> getconn() ->prepare($score);
            $result->execute();
            $result->fetchAll(); 
        
        if( $Ans1==$opno1 )
        {
            $score1 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number1},'{$datetime}','{$opno1}',1)";
        }
        else 
        {
            $score =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number1},'{$datetime}','{$opno1}',0)";
        }
        
            $result = $this-> getconn() ->prepare($score);
            $result->execute();
            $result->fetchAll(); 
            
        if( $Ans2==$opno2 )
        {
            $score2 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number2},'{$datetime}','{$opno2}',1)";
        }
        else 
        {
            $score2 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number2},'{$datetime}','{$opno2}',0)";
        }
        
            $result = $this-> getconn() ->prepare($score2);
            $result->execute();
            $result->fetchAll(); 
            
         if( $Ans3==$opno3 )
        {
            $score3 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number3},'{$datetime}','{$opno3}',1)";
        }
        else 
        {
            $score3 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number3},'{$datetime}','{$opno3}',0)";
        }
        
            $result = $this-> getconn() ->prepare($score3);
            $result->execute();
            $result->fetchAll(); 
        
         if( $Ans4==$opno4 )
        {
            $score4 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number4},'{$datetime}','{$opno4}',1)";
        }
        else 
        {
            $score4 =  "INSERT INTO `recode`(`user_id`, `number`, `q_id`, `r_date`, `r_ans`, `r_score`) 
                            VALUES ('{$id}',{$cid},{$number4},'{$datetime}','{$opno4}',0)";
        }
        
            $result = $this-> getconn() ->prepare($score4);
            $result->execute();
            $result->fetchAll(); 

    }

}

?>
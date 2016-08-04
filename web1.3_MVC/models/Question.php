<?php

    session_start();
    require_once 'PDO.php';

class Question extends Database
{
     
    //顯示 Question 資料
    function Question_se()
    {
        $sql_se_quedata_str = "SELECT `q_id`, `question`, `A`, `B`, `C`, `D`, `ans` 
                            FROM `questiondata`";
        $result_se_quedata_str= $this-> getconn() ->prepare($sql_se_quedata_str);
        $result_se_quedata_str->execute();
        $result_se=$result_se_quedata_str->fetchAll(); 
        return  $result_se;
    }
    
     //新增Question資料
     function Question_in($question,$Ans_A,$Ans_B,$Ans_C,$Ans_D,$Ans)
    {
        $sql_up_que = "INSERT INTO `questiondata`(`question`, `A`, `B`, `C`, `D`, `ans`)
                    VALUES ('$question', '$Ans_A', '$Ans_B', '$Ans_C', '$Ans_D', '$Ans')";
        $result_up_que = $this-> getconn() ->prepare($sql_up_que);
        $result_up_que->execute();
        $result_se= $result_up_que->fetchAll(); 
   
    }
    
    //刪除Question資料
     function Question_de($q_id) 
    {
      $sql_de_quedata ="DELETE FROM `questiondata` WHERE `q_id`='$q_id'";
      $result_de_quedata = $this-> getconn() ->prepare($sql_de_quedata);
      $result_de_quedata->execute();
      $result_se=$result_de_quedata->fetchAll();
       
    }
     
    //修改Question資料
     function Question_up($chqu_id,$question,$Ans_A,$Ans_B,$Ans_C,$Ans_D,$Ans) 
    {
        $sql_up_che_ques ="UPDATE `questiondata` SET `question`= '$question' ,
                        `A`='$Ans_A',`B`='$Ans_B',`C`= '$Ans_C',`D`='$Ans_D',
                        `ans`='$Ans'WHERE `q_id`= '$chqu_id'";
        $result_up_che_ques = $this-> getconn() ->prepare($sql_up_che_ques);
        $result_up_che_ques->execute();
        $result_se=$result_up_che_ques->fetchAll();       
    }


     function Question_mo($qu_id) 
    {
      $sql_se_quedata_get = "SELECT * FROM `questiondata` WHERE `q_id`= ' $qu_id'" ;
      $result_se_quedata_get = $this-> getconn() ->prepare( $sql_se_quedata_get);
      $result_se_quedata_get->execute();
      $result_se=$result_se_quedata_get->fetchAll(); 
      return  $result_se;
    }
    
    //取得題目亂數
    function Question_count()
    {
        $str_sql_calc_no_of_qut= "SELECT * FROM `questiondata` WHERE `q_id` ORDER BY RAND() LIMIT 5";
        $rec_set_int_no_of_qut= $this-> getconn() ->prepare( $str_sql_calc_no_of_qut);
        $rec_set_int_no_of_qut->execute();
        $result_se=$rec_set_int_no_of_qut->fetchAll(); 
        return  $result_se;
       
    }
    
    // function Question_cd($data)
    // {
    //     $str_sql_calc_no_of_qut= "select * from `questiondata` where `q_id` order by rand() limit 5";
    //     $rec_set_int_no_of_qut= $this-> getconn() ->prepare( $str_sql_calc_no_of_qut);
    //     $rec_set_int_no_of_qut->execute();
    //     $result_se=$rec_set_int_no_of_qut->fetchAll(); 
    //     return  $result_se;
       
    // }
     

}
<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require('mysql.inc.php');
  


if( $_POST)
{
 for($i=1; $i<=5;$i++){
     $groupname = "group" . $i; 
      // echo $groupname;
      //echo  $_POST [$groupname]."<br>";
      //echo $_SESSION['q_id_$i']."<br>"; 
      $str_q_id = "q_id_" . $i;
     // echo $str_q_id; 
      //echo "AAAA". $_SESSION[$str_q_id] . "  KKK<br>"  ;
      
 }
    echo  $_SESSION['number']."<br>";
    echo  $_SESSION['r_date']."<br>";
    //echo  $_SESSION['q_id_3'];

}

  //print_r ($_SESSION);
   //echo "<br>" ;
    //print_r ($_POST);
    
    //核對答題
    for($j=1;$j<=5;$j++){
        
        $q_id = "q_id_" . $j; 
        //$_SESSION[$q_id];
        
        $result_q_ans = "SELECT ans FROM  questiondata WHERE q_id =" . $_SESSION[$q_id] ;
        $result_ans = mysql_query($result_q_ans);
        $row_ans_ck;
        while ($row_ans = mysql_fetch_array($result_ans))
        {
            ;  //echo $row[0];//資料庫總筆數
            $row_ans_ck = $row_ans[0];
              
        }
         
        $groupname = "group" . $j;  
        //$_SESSION[$q_id];
        
         //print_r($_POST);
         //echo "<br>";
         //echo $row_ans_ck . "<br>";
         
         //echo $_POST[$groupname]."<br>";
         //echo $row_ans[0]."<br>";
         
         
        if(((string)$_POST[$groupname]) == ((string)$row_ans_ck))
        {
           
           $update_qut_answ_score =  "UPDATE  recode set r_ans = '{$_POST [$groupname]}', r_score = 1 WHERE number = {$_SESSION['number']} AND user_id ='{$_SESSION['user_id']}' AND q_id= {$_SESSION[$q_id]} AND r_date = '{$_SESSION['r_date']}'";
            //echo $update_qut_answ_score ;
           $result12 = mysql_query($update_qut_answ_score);                
        }
        else{
            
            $update_qut_answ_score =  "UPDATE  recode set r_ans = '{$_POST [$groupname]}', r_score = 0 WHERE number = {$_SESSION['number']} AND user_id ='{$_SESSION['user_id']}' AND q_id= {$_SESSION[$q_id]} AND r_date = '{$_SESSION['r_date']}'";
          // echo $update_qut_answ_score ;
           $result12 = mysql_query($update_qut_answ_score);  
            
        }
        
    }
    
  
    
    //header("Location: usersScore.php");
    
?>

 
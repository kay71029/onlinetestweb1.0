<?php

require_once 'core/MyDB.php';
      
   
//參考-student 
class User {
    //變數名稱(DB)
    
    public $user_id;
    public $user_name;
    public $user_password;
    public $user_email;
    public $user_tel;
    //class_infor 表
    public $class_info = [];
    
    //建構
    public function __construct() {}
    
    //測試
    
    public function test() 
    {
        $this->user_name ="456" ;
    }
    
    public function Check($user_name, $user_id)
    {
     //SQL
     $dbobj = new myDB();
     $query1 = $dbobj->query("SELECT * FROM student where user_id = '$user_name'and user_password = '$user_id'");
     //暫存
     $r=$query1->result();
    
        //確認資料只有一比

        if(sizeof($r)==1){
        //save all data in databse 
        $this->user_name = $r[0]->user_name;
        $this->user_id = $r[0]->user_id;
        $this->user_email = $r[0]->user_email;
        $this->user_password ='';// 保護資料   
        //$this->user_password; = $r[0]->user_password; 
         return true;
            
        }
        return false;
     
    }
    
    public function Modify($user_id,$user_password,$user_email,$user_tel){
      
       $dbobj = new myDB();
       $sql = "UPDATE `student` SET `user_password`='$user_password',
                                    `user_email`='$user_email',`user_tel`='$user_tel' 
                           WHERE `user_id` = '$user_id'";
       //echo $sql;//for debug
                           //ClassInfo
       $query1 = $dbobj->execute($sql);
      
      if(sizeof($query1)==1)
        {
         return true;
        }
        return false;
        
    }
    
    public function GetStudent($user_id){
      
       $dbobj = new myDB();
       $query1 = $dbobj->query("SELECT * FROM `student` WHERE `user_id`='$user_id'");
      
      //暫存
      $r=$query1->result();
    
        //確認資料只有一比
      if(sizeof($r)==1){
        //save all data in databse 
        $this->user_name = $r[0]->user_name;
        $this->user_id = $r[0]->user_id;
        $this->user_email = $r[0]->user_email;
        $this->user_tel = $r[0]->user_tel;
        //$this->user_password ='';// 保護資料   
        $this->user_password = $r[0]->user_password; 
         return true;
        }
        return false;
        
    }
     
    public function GetScore($user_id)
     {
         $dbobj = new myDB();
         $sql ="SELECT cl.class_id
                           FROM class_information ci, class cl
                           WHERE ci.number = cl.number and ci.user_id = '$user_id'";
         $query1 = $dbobj->query($sql);
         
         $r=$query1->result();
        if(sizeof($r)>0){
            foreach ($r as $info) {
            
            $this->user_info[] = $info->class_id ;
            } 
            
            //var_dump($this->user_info);// for debog
             return true;
                
            }
            return false;
     }
     function ScorePost($letter)
     {
         $dbobj = new myDB();
     $sql_se_requinner_str="SELECT recode.r_date, recode.q_id, questiondata.A, questiondata.B, 
                    questiondata.C, questiondata.D, recode.r_ans, questiondata.ans, recode.r_score , 
                    recode.r_addscore, questiondata.question FROM recode INNER JOIN questiondata ON  
                    recode.q_id= questiondata.q_id WHERE recode.number = 
                    (SELECT number  FROM class WHERE class_id ='$letter') ORDER BY recode.r_date DESC";
     $query1 = $dbobj->query($sql_se_requinner_str);
            return $r=$query1->result();
            
 
     
     }
     
     
     
     
}
?>

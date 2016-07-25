<?php

    require_once 'core/MyDB.php';
      
   
//參考- 
class Home {
    
    
    //建構
    public function __construct() {}
    
    
    public function Teacherinfo()
    {
     //SQL
     $dbobj = new myDB();
    
     $sql= "SELECT * FROM `admin`";
      $query1 = $dbobj->query( $sql);
     $r=$query1->result();
     //echo $r;
     
            //確認資料只有一比
          if(sizeof($r)==1){
            //save all data in databse 
            $this->name = $r[0]->name;
            $this->jobtitle = $r[0]->jobtitle;
            $this->educational = $r[0]->educational;
            $this->office = $r[0]->office;
            $this->tel = $r[0]->tel;
            $this->email = $r[0]->email;
            $this->specialty = $r[0]->specialty;
            $this->officetime = $r[0]->officetime;
            
             return true;
            }
            return false;
        
    }
     
}
?>
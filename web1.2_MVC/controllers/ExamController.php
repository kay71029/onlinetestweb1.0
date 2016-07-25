<?php

class ExamController extends Controller {
    
    function Exam(){
        $this->defense(); // 檢查是否合法登入
       
        $this->view("Exam/Exam");
    }
    
    function GetScore(){
        
        $this->view("Exam/GetScore");
    }
    function Logout(){
        session_destroy();
         $this->view("Home/index");
        
    }
    
    
    function defense(){
        
        if(!isset($_SESSION['user_id'])){
          header("Location:../Home/index");
          
        }
    }
}

?>

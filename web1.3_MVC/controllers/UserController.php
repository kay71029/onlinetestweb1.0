<?php

class UserController extends Controller {
    
    function Login()
    {
         $id = $_POST['Username'];
         $pw = $_POST['Password'];
        
        $user = $this->model("Student");
        $result_se_AClass= $user->Check($id,$pw);
        
       if(count($result_se_AClass) ==1)
       {
        $_SESSION['user_id']= $id;
        header("Location:Main");
       }
       else 
       {
         $this->view("User/Login");
       }
      
      $this->view("User/Login");
        
    }
    
    function Main()
    {
        $this->defense();// 檢查是否合法登入
        $id=$_SESSION['user_id'];
        $user = $this->model("Student");
        $result_se=$user->Studnet_person($id);
        $this->view("User/Main",$result_se);
    }
    
    function Modify()
    {
        $this->defense();// 檢查是否合法登入
        $id=$_SESSION['user_id'];
        $user = $this->model("Student");
        $result_se=$user->Studnet_person($id);
        $this->view("User/Modify",$result_se);
    }
    
    function ModifyUp()
    {
        $id=$_SESSION['user_id'];
        $fname=$_POST["fname"];
        $fpwd=$_POST["fpwd"];
        $femail=$_POST["femail"];
        $ftel=$_POST["ftel"];
        $cpwd=$_POST["cpwd"];
        $user_modify_ok=$_POST["user_modify_ok"];
        
        if($fpwd!=$cpwd)
        {
            exit();
        }
        
        if(isset($user_modify_ok))
        {
        $user = $this->model("Student");
        $result_se=$user->Studnet_personUp($fpwd,$femail,$ftel,$id);
        }
        $this->view("User/Main",$result_se);
    }
    
    
    function Score()
    {
        $this->defense();// 檢查是否合法登入
        $id=$_SESSION['user_id'];
        $user = $this->model("ClassInfo");
        $result_se=$user->StudentClass($id);
        $this->view("User/Score",$result_se);
    }
    
    function ScoreAJ()
    {
        $class_name=$_GET['class_name'];
        $user = $this->model("Recode");
        $result_se=$user->AJAX2($class_name);
        $this->view("User/ajax3",$result_se);
    }
    
    
    
    function UserClass()
    {
        $this->defense();// 檢查是否合法登入
        $id=$_SESSION['user_id'];
        $user = $this->model("ClassInfo");
        $result_se=$user->StudentClass($id);
        $this->view("User/UserClass",$result_se);
    }
    
    
    
    
    function Logout()
    {
        session_destroy();
        header("Location:../Home/index");
        
    }
    
    
    function defense()
    {
        if(!isset($_SESSION['user_id']))
        {
          header("Location:../Home/index");
        }
    }
    
    
    
    function Exam1()
    {
        $this->defense();// 檢查是否合法登入
        $id=$_SESSION['user_id'];
        $user = $this->model("Question");
        $result_se=$user->Question_count($id);
        
        $this->view("User/Exam1", $result_se);
    }
        
    function GetScore()
    {
      
      $id=$_SESSION['user_id'];
      $datetime=$_POST['datetime'];
      $number=$_POST['number'];
      $number1=$_POST['number1'];
      $number2=$_POST['number2'];
      $number3=$_POST['number3'];
      $number4=$_POST['number4'];
      $class_number=$_POST['classnumber'];
     
      $Ans = $_POST ['Ans'];
      $opno = $_POST['op$no'];
      $Ans1 = $_POST ['Ans1'];
      $opno1 = $_POST['op$no1'];
      $Ans2 = $_POST ['Ans2'];
      $opno2 = $_POST['op$no2'];
      $Ans3 = $_POST ['Ans3'];
      $opno3 = $_POST['op$no3'];
      $Ans4 = $_POST ['Ans4'];
      $opno4 = $_POST['op$no4'];
        
        $user = $this->model("Recode");
        $result_se=$user->GetScore($id, $datetime,$number, $number1,$number2,$number3,$number4,$class_number,$Ans,$opno
        ,$Ans1,$opno1,$Ans2,$opno2,$Ans3,$opno3,$Ans4,$opno4,$class_number);
        
         header("Location:Score");
    }
}



 
    

?>

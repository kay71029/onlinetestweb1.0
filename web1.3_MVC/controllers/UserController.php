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
}

?>

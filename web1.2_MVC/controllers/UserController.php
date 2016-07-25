<?php

class UserController extends Controller {
    
    function Login(){
         
        if(isset ($_POST['Username']) && isset ($_POST['Password'])) 
        {
            //進DB檢查
            $user = $this->model("User");
            //$user->test();//fortest
            if($user->check(addslashes($_POST['Username']),addslashes($_POST['Password'])))
            {
                //susess
              $_SESSION['user_id'] = $user->user_id; 
              $this->view("User/Main" ,$user);//if成功
            }else
            {
                echo $errorMsg = '帳號密碼錯誤';
                    $this->view("User/Login" ,$errorMsg);//if成功
            }
        }else
        {
            $this->view("User/Login");
        }
        
    }
    
    function Main(){
        $this->defense();// 檢查是否合法登入
        $user = $this->model("User");
        $user->GetStudent($_SESSION['user_id']);
        $this->view("User/Main", $user);
    }
    
    function Modify(){
        $this->defense();// 檢查是否合法登入
       
        //檢查是否POST
        
          $fname=$_POST["fname"];
          $fpwd=$_POST["fpwd"];
          $femail=$_POST["femail"];
          $ftel=$_POST["ftel"];
          $cpwd=$_POST["cpwd"];
          $user_modify_ok=$_POST["user_modify_ok"];
          $errorMsg="";
        if(isset ($fpwd) && isset ($cpwd) && ($fpwd!=$cpwd)){
             $errorMsg="請再確認密碼";
            //  echo"A";
             //$this->view("User/Modify", $errorMsg);
        }
        
        //檢查其他欄位是否合法.....略 
        //以下必須連結DB
        $user = $this->model("User");
        
        //true for post request (modify db )
        if(isset($user_modify_ok)){
            //goto db and modify 
        if($user->Modify($_SESSION['user_id'],$cpwd,$femail,$ftel)){
                //成功
                //goto user main view
                $this->view("User/Main");
            }else{
                 $errorMsg="無法修改";// 應該DB錯誤
                $this->view("User/Modify", $errorMsg);
            }
            return;
        }
        //in here , means  just View data (GET requst)
        $user->GetStudent($_SESSION ['user_id'] );
        $this->view("User/Modify", $user);
    }
    
    function Score(){
        $this->defense(); // 檢查是否合法登入
       
        $user = $this->model("User");
        $user->GetScore($_SESSION['user_id']);
        $this->view("User/Score", $user);
    }
    
    function ScorePostData(){
       
          $result = "";
            if (!isset($_GET["class_name"])) 
            {
            	die("no calss_name found.");
            }
            $letter = $_GET["class_name"];
            
         $user = $this->model("User");  
         $r=$user->ScorePost($letter);
        
          
         echo "<table class='table'>
            <tr>
              <th>日期</th>
              <th>題號</th>
              <th>A</th>
              <th>B</th>
              <th>C</th>
              <th>D</th>
              <th>答題</th>
              <th>正解</th>
              <th>分數</th>
             
            </tr>";
             for ($i=1;$i<= sizeof($r);$i++) {
             echo "<tr>
              <td>". $r[$i]->r_date."</td>
              <td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#myModal"
              .$r[$i]->q_id."'>". $r[$i]->q_id."</button></td>
              <td>". $r[$i]->A."</td>
              <td>". $r[$i]->B."</td>
              <td>". $r[$i]->C."</td>
              <td>". $r[$i]->D."</td>
              <td>". $r[$i]->r_ans."</td>
              <td>". $r[$i]->ans."</td>
              <td>". $r[$i]->r_score."</td>
             
             </tr>";
     
            }
            echo  "</table>";
         for ($i=1;$i<= sizeof($r);$i++) {
        
        echo "<div class='modal fade' id='myModal". $r[$i]->q_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class'modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='odal-title' id='myModalLabel'>題目</h4>
              </div>
              <div class='modal-body'>"
                .$r[$i]->question."
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
              </div>
            </div>
          </div>
        </div>";
             
              }
         
    }
    
    function UserClass(){
        $this->defense();// 檢查是否合法登入
        $user = $this->model("User");
        $user->GetScore($_SESSION['user_id']);
        $this->view("User/UserClass",$user);
    }
    
    function Exam(){
        $this->defense(); // 檢查是否合法登入
       
        
        $this->view("User/Exam");
    }
    
    function GetScore(){
        
        $this->view("User/GetScore");
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

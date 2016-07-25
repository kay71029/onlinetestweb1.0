<?php

class HomeController extends Controller {
    
    
    function index() {
        
        $this->view("Home/index");
        
    }
    
    function about() {
        $user = $this->model("Home");
        $user->Teacherinfo();
        $this->view("Home/about",$user);
         
    }
    
}

?>

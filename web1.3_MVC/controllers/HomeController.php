<?php

class HomeController extends Controller {
    
    
    function index() {
        
        $this->view("Home/index");
        
    }
    
    function about() {
        $user = $this->model("Admin");
        $r=$user->Admin_se();
        $this->view("Home/about",$r);
         
    }
    
     function a() {
        $user = $this->model("AClass");
        $user->a();
         
         
    }
    
    
}

?>

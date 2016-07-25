<?php

class Controller {
    public function model($model) {
        require_once "../web1.2_MVC/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "../web1.2_MVC/views/$view.php";
    }
}

?>
<?php
 
class ClassInfoController extends Controller 
{
     //顯示課程選項
    function AddStudent()
    {
        //$this-> defense();
        $user = $this->model("ClassInfo");
        $result_se_class_name= $user->ClassName();
        $this->view("Admin/ClassInfor",$result_se_class_name);
        
    }
    
    //新增學生資料
    function ClassInforAdd()
    {
        
        // $class=$_POST["addclass"];
        //$this-> defense();
        $user = $this->model("ClassInfo");
        $user->AddStudent();
        //$this->view("Admin/ClassInfor");
    }
    
   
    
    //刪除課程學生資料
    function DeStudent()
    {
        
        
        //$this-> defense();
        $user = $this->model("ClassInfo");
        $user->AClass_de( );
        $this->AClassSe();
    }
    
     
    function AClassUpp()
    {
        $this->view("Admin/ClassChe");
    } 
     
     function AClassUp()
    {
        //$this-> defense();
        $user = $this->model("AClass");
        $user->AClass_up( );
        $this->AClassSe();
    }
    
    
    
    
   
}

?>

<?php

class MyDB{

    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'onlinetest';
    //public $conn;
    //public $result;

     function __construct(){
        $this->sql_connect();
        $this->sql_database();
        $this->set_db_encode();
    }

    private function sql_connect(){
       
       mysql_connect($this->host,$this->username,$this->password);
       //$this->$conn = $conn;
       if(mysql_error())
           die("無法連線資料庫伺服器");
        
    }

     private function sql_database(){
        mysql_select_db($this->database);
    }

    private function set_db_encode(){
       mysql_query("SET NAMES 'UTF8'");
    }
    
    //查詢
     function query($sql_string){
        // echo $sql_string;
        $result = mysql_query($sql_string);
        $query = new db_query($result);
        return $query;
 
    }
    //新增刪
    function execute($sql_string){
        // echo $sql_string;
        mysql_query($sql_string);
        $affectd_row_no = mysql_affected_rows();
         return  $affectd_row_no;
        
    }
}

class db_query
{        
    private $result;
    
    public function __construct($result_1)
	{
        $this->result = $result_1;
		
    }

    public function result(){
        $query = array();
        if($this->result != false){
            while($row = mysql_fetch_object($this->result)){
               $query[] = $row;
            }
            return $query;
        }
        return false;
    }
    

}


         
?>
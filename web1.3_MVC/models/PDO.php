
<?php
class Database
{
    
    const DATABASE_HOST = 'localhost';
    const DATABASE_NAME = 'onlinetest';
    const DATABASE_USERNAME = 'root';
    const DATABASE_PASSWORD = '';
    private $connection = null;
    
    public function __construct()
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s', static::DATABASE_NAME, static::DATABASE_HOST);
        try {
            
            $this->connection = new PDO($dsn, static::DATABASE_USERNAME, static::DATABASE_PASSWORD);
            $this->connection ->exec ("set names utf8");
        } catch (PDOException $e) {
            
            echo 'Connection failed: '.$e->getMessage();
            
        }
        //date_default_timezone_set("Asia/Taipei");//設定時區
    }
    public function getconn(){
        return $this->connection;
        
    }

}
?>
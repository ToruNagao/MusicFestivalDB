<?php
class DB{
    private $connection;
    private $close;
    private static $instance;
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '1977';
    private $database = 'music_festival_db';
    
    public static function getInstance(){
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        $this->connection = new mysqli
                ($this->hostname,
                 $this->username,
                 $this->password,
                 $this->database);
        
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                                E_USER_ERROR);
        }
    }
        
    private function __clone() {}
      
    public function connect() {
        return $this->connection;
    }
}
?>
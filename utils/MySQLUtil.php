<?php
    class MySQLUtil{
           private $servername ;
           private $username ;
           private $password;
           private $dbname ;
           private static $conn;

           public function __construct()
           {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "thltweb";
            if(self::$conn ==null)
                {
                    
                    $this->connectDB();
                }
            else{
                
                self::$conn;
            }
           }

           

        public function connectDB(){
           

            try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
        }
        public function disconnectDB(){
            self::$conn = null;
        }

        public function insertData($query, $param = array()){
            $stmt = self::$conn->prepare($query);
            $stmt->execute($param);
        }
        public function getAllData($query){
            $stmt = self::$conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getData($query, $data = array())
        {
            $stmt = self::$conn->prepare($query);
            $stmt->execute($data);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function deleteData($query, $data = array()){
            $stmt = self::$conn->prepare($query);
            $stmt->execute($data);
        }
        public function updateData($query, $data = array()){
            $stmt = self::$conn->prepare($query);
            $stmt->execute($data);
        }
    }
?>
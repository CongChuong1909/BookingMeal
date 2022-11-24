<?php
include_once("../utils/MySQLUtil.php");
    class UserModel{
        private $email;
        private $userName;
        private $password;
        private $fullName;
        
        public function __construct($email,$userName, $password,$fullName)
        {
            $this->email = $email;
            $this->userName = $userName;
            $this->password = $password;
            $this->fullName = $fullName;
        }
        public function __destruct()
        {
            $this->email = "";
            $this->userName = "";
            $this->password = "";
            $this->fullName = "";
        }

        public function getEmail() {
            return $this->email;
        } 
        public function getUserName() {
            return $this->userName;
        } 
        public function getPassword() {
            return $this->password;
        } 
        public function getFullName() {
            return $this->fullName;
        }
        
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setUserName($userName) {
            $this->userName = $userName;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setFullName($fullName) {
            $this->fullName = $fullName;
        }

        public function insertUser()
        {
            $dbCon = new MySQLUtil();

            $data = [
                'fullname' => $this->fullName,
                'email'=>$this->email,
                'username' => $this->userName,
                'password' => $this->password,
            ];
            $query = "INSERT INTO user( u_fullName, u_email,u_userName, u_password) VALUES (:fullname, :email, :username,:password)";
            $dbCon->insertData($query,$data);
            $dbCon->disconnectDB();
        }

        public function getAllUser()
        {
            $dbCon = new MySQLUtil();
            $query = "SELECT * FROM user";
            return $dbCon->getAllData($query);
        }
        public function getUser($userName)
        {
            $dbCon = new MySQLUtil();
            $query = "SELECT * FROM user where username= :username";
            $data = ['username'=>$userName];
            $dbCon->getData($query, $data);
            $dbCon->disconnectDB();
        }
    }
?>
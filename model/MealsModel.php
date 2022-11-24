<?php
ob_start();
include_once("../../utils/MySQLUtil.php");
include_once("../utils/MySQLUtil.php");
// include_once("E:\Wamp\www\Chuong\thltweb\utils\MySQLUtil.php");
    class MealsModel{

        private $mealName;
        private $mealImage;
        private $mealPrice;
        private $mealProcessingTime;
        private $mealDes;
        
        public function __construct($mealName,$mealImage, $mealPrice,$mealProcessingTime, $mealDes)
        {

            $this->mealName = $mealName;
            $this->mealImage = $mealImage;
            $this->mealPrice = $mealPrice;
            $this->mealProcessingTime = $mealProcessingTime;
            $this->mealDes = $mealDes;
        }
        public function __destruct()
        {
            $this->mealName = "";
            $this->mealImage = "";
            $this->mealPrice = "";
            $this->mealProcessingTime = "";
            $this->mealDes = "";
        }
        public function getMealName() {
            return $this->mealName;
        } 
        public function getMealImage() {
            return $this->mealImage;
        } 
        public function getMealPrice() {
            return $this->mealPrice;
        } 
        public function getMealProcessingTime() {
            return $this->mealProcessingTime;
        }
        public function getMealDes() {
            return $this->mealDes;
        }

        public function setMealName($mealName) {
            $this->mealName = $mealName;
        }
        public function setMealImage($mealImage) {
            $this->mealImage = $mealImage;
        }
        public function setMealPrice($mealPrice) {
            $this->mealPrice = $mealPrice;
        }
        public function setMealProcessingTime($mealProcessingTime) {
            $this->mealProcessingTime = $mealProcessingTime;
        }
        public function setMealDes($mealDes) {
            $this->mealDes = $mealDes;
        }

        public function getAllMeals()
        {
            $dbCon = new MySQLUtil();
            $query = "SELECT * FROM meal";
            return $dbCon->getAllData($query);
        }

        public function getMeal($idMeal)
        {
            $dbCon = new MySQLUtil();
            $data = [
                'id' => $idMeal,
            ];
            $query = "SELECT * FROM meal WHERE m_id = :id";
            return $dbCon->getData($query, $data);
        }

        public function insertMeal($category)
        {
            $dbCon = new MySQLUtil();

            $data = [
                'mealName' => $this->mealName,
                'mealImage'=>$this->mealImage,
                'mealPrice' => $this->mealPrice,
                'mealProcessingTime' => $this->mealProcessingTime,
                'mealDes' => $this->mealDes,
                'idCategory' => $category,
            ];
            $query = "INSERT INTO meal(m_name,m_image,m_price,m_processingTime,m_des,ca_id) VALUES (:mealName, :mealImage, :mealPrice,:mealProcessingTime, :mealDes, :idCategory)";
            $dbCon->insertData($query,$data);
            $dbCon->disconnectDB();
        }
        public function deleteMeal($idMeal)
        {
            $dbCon = new MySQLUtil();
            $data = [
                'id' => $idMeal,
            ];
            $query = "DELETE FROM meal WHERE m_id = :id";
            $dbCon->deleteData($query,$data);
            $dbCon->disconnectDB();
        }
        public function updateMeal($idMeal,$category, $data)
        {
            $dbCon = new MySQLUtil();
            $data = [
                'id' => $idMeal,
                'mealName' => $this->mealName,
                'mealImage'=>$this->mealImage,
                'mealPrice' => $this->mealPrice,
                'mealProcessingTime' => $this->mealProcessingTime,
                'mealDes' => $this->mealDes,
                'idCategory' => $category,

            ];
            $query = "UPDATE meal SET m_name = :mealName, m_image = :mealImage, m_price =:mealPrice, m_processingTime =:mealProcessingTime ,m_des = :mealDes, ca_id = :idCategory WHERE m_id = :id";
            $dbCon->updateData($query,$data);
            $dbCon->disconnectDB();
        }
    }
    ob_get_clean();
<?php
ob_start();
include_once("../../utils/MySQLUtil.php");
include_once("../utils/MySQLUtil.php");
include_once("../model/MealsModel.php");
// include_once("E:\Wamp\www\Chuong\thltweb\utils\MySQLUtil.php");
    class CartModel{

        private $cart;
        
        public function __construct()
        {
            // if (!isset($_SESSION['cart'])  ) session_start();
            $this->cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
        }
        function __destruct()
        {
            $_SESSION['cart']= $this->cart;
        }
        function add($id, $quatity= 1)
        {
            if(isset($this->cart[$id])){
                $this->cart[$id]['quatity']+=$quatity;
            }
            else{
                $meal = new MealsModel('','','','','');
                $dataAdd = $meal->getMeal($id); 
                if(Count($dataAdd)>0)
                {
                    $dataAdd['quatity'] = $quatity;
                    $this->cart[$id] = $dataAdd;
                }
            }
        }
        function delete($id)
        {
            unset($this->cart[$id]);
        }
        
    }
    ob_get_clean();
<?php
    include ("./controller.php");
    // include_once("../model/MealsModel.php");
    include_once("../model/CartModel.php");

    class Booking extends Controller{
        public function __construct($mealAction)
        {
            $Cart = new CartModel();
            $data = array();
            $action = isset($_GET['action'])?$_GET['action']:'';

             if($action = "add")
            {
                $id = isset($_GET['id'])?$_GET['id']:'';
                $qty =isset($_GET['qty'])?$_GET['qty']:1;
$data = $Cart->add($id, $qty);
                
            }
            var_dump($Cart);
            $this->viewUser("booking",$data);
            




            // if (!isset($_SESSION)  ) session_start();
            // $this->cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
            // $arrayMealCarts = array();
            // if(isset($_POST['addCart']))
            // {
            //     $meal = new MealsModel('','','','','');
            //     $id = (int)$_POST['txtId'];
            //     $data =  $meal->getMeal($id);
            //     array_push($arrayMealCarts,$data); 
            //     $_SESSION['arrayMealCarts'] = $arrayMealCarts;
            // }
            

           
        }
        
    }

    $mealAction ="";
    $mealController = new Booking($mealAction);
   
?>
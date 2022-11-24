<?php
    include ("./controller.php");
    include("../model/MealsModel.php");

    class Home extends Controller{
        public function __construct($mealAction)
        {
            $meal = new MealsModel('','','','','');
            $id = (int)$_GET['txtId'];
            $data =  $meal->getMeal($id);
            $this->viewUser("detailMeal",$data);
            
        }
        
    }

    $mealAction ="";
    $mealController = new Home($mealAction);
   
?>
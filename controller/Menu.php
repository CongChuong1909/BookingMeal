<?php
    include ("./controller.php");
    include_once("../model/MealsModel.php");
    

    class Menu extends Controller{
        public function __construct($mealAction)
        {
                    $meal = new MealsModel('','','','','');
                    $data =  $meal->getAllMeals();
                    $this->viewUser("menu", $data);
              
        }
        
    }
    $mealAction = "";
    if(isset($_POST["mealAction"])){
        $mealAction = $_POST["mealAction"];
    }
    $mealController = new Menu($mealAction);
?>
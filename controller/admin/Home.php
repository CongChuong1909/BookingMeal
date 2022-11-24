<?php
    include_once("../controller.php");
    // include_once("../model/MealsModel.php");
    

    class HomeAdmin extends Controller{
        public function __construct($Action)
        {
            $this->viewAdmin("index","");
            
        }
    }

    $Action ="";
    $Controller = new HomeAdmin($Action);
   
?>
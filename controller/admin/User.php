<?php
    include_once("../controller.php");
    // include_once("../model/MealsModel.php");
    

    class UserAdmin extends Controller{
        public function __construct($Action)
        {
            $this->viewAdmin("profile","");
            
        }
    }

    $Action ="";
    $Controller = new UserAdmin($Action);
   
?>
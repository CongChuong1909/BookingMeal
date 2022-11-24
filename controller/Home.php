<?php
    include ("./controller.php");
    

    class Home extends Controller{
        public function __construct($mealAction)
        {
            $this->viewUser("index","");
            
        }
        
    }

    $mealAction ="";
    $mealController = new Home($mealAction);
   
?>
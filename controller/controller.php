<?php
    class Controller {
        public function viewUser ($name, $data)
        {
            include_once ("../view/user/".$name.".php");
        }
        public function viewAdmin ($name, $data)
        {
            include_once ("../../view/admin/".$name.".php");
        }
    }
?>
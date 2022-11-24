<?php
ob_start();
include("./controller.php");
include_once("../model/UserModel.php");


class MealControler extends Controller
{
    public function __construct($mealAction)
    {

        $this->viewUser("login", "");
        if(isset($_POST['userActtion']))
        {

            $userName = $_POST["txt_username"];
            $password = $_POST["txt_password"];
            
            $isLoginUser = false;
            $isLoginAdmin = false;

            $newUser = new UserModel("","","","");
            $listUsers = $newUser->getAllUser();
            foreach ($listUsers as $value) {
                if ($userName == $value["u_userName"] && $password == $value["u_password"] && $value["u_id"] == 1) {
                    $isLoginAdmin = true;
                } else if ($userName == $value["u_userName"] && $password == $value["u_password"]) {
                    $isLoginUser = true;
                }
            }
            if ($isLoginAdmin == true) {
                $_SESSION['login_admin_successful'] = 'true';
                $_SESSION['loginName'] = $userName;
                header("Location: http://localhost/Chuong/thltweb/controller/admin/Home.php");
            }
            if ($isLoginUser == true) {
                header("Location: http://localhost/Chuong/thltweb/controller/Home.php");
                $_SESSION['login_successful'] = 'true';
                $_SESSION['loginName'] = $userName;
            } else {
                echo "<script type='text/javascript'>alert('Thong tin dang nhap khong dung');</script>";
            }
        }
        
    }
}
 $mealAction = "";
$mealController = new MealControler($mealAction);  
ob_end_flush();

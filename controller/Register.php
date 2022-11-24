<?php
ob_start();
include("./controller.php");
include_once("../model/UserModel.php");
include_once("../utils/MySQLUtil.php");

class Register extends Controller
{
    public function __construct($mealAction)
    {
        $this->viewUser("register", "");
            if(isset($_POST['userRegister']))
            {
                
                $email = $_POST["email_txt"];
                $userName = $_POST["userName_txt"];
                $password = $_POST["password_txt"];
                $passwordRepeat = $_POST["passwordrp_txt"];
                $fullName = $_POST["fullname_txt"];
            
                if ($password == $passwordRepeat) {
                    $newUser = new UserModel($email, $userName, $password, $fullName);
                
                    $newUser->insertUser();
                    echo "<script type='text/javascript'>alert('dang ky thanh cong');</script>";
                    $_SESSION['login_successful'] = 'true';
                    $_SESSION['loginName'] = $fullName;
                    header("Location: http://localhost/Chuong/thltweb/controller/Home.php");
                } else {
                    echo "<script type='text/javascript'>alert('Password nhap lai khong dung');</script>";
                }
        
            }

    }
}
 $register = "";
$register = new Register($register);  

ob_end_flush();













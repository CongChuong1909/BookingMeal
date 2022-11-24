<?php

session_start();
include_once('../model/MealsModel.php');

    $arrMeals = array();
    switch($_POST["mealActtions"])
    {
        case"add":
            {
                

                break;
            }
        case "login":{

            $userName = $_POST["txt_username"];
            $password = $_POST["txt_password"];
            $dbCon = new MySQLUtil();
            $query = "SELECT * FROM user";
            $listUsers = $dbCon->getAllData($query);
            
            $isLoginUser =false;
            $isLoginAdmin = false;
            foreach ($listUsers as $value) {
                if($userName == $value["u_userName"] && $password == $value["u_password"]&& $value["u_id"] == 1)
                {
                    $isLoginAdmin = true;
                }
                else if($userName == $value["u_userName"] && $password == $value["u_password"])
                {   
                    $isLoginUser = true;
                }
                
            }
            if($isLoginAdmin == true){
                $_SESSION['login_admin_successful'] = 'true';
                $_SESSION['loginName'] = $userName;
                header("Location: http://localhost/Chuong/admin/");
            }
            if($isLoginUser == true)
            {
                $_SESSION['login_successful'] = 'true';
                $_SESSION['loginName'] = $userName;
                header('Location: http://localhost/Chuong/user/view/index.php');
            }
            else{
                echo "thong tin dang nhap ko dung";
            }
            $dbCon->disconnectDB();
            break;
        }

    }

    echo $_GET["id"];
   

    if(isset($userName)&& isset($password)){
       $dbCon = new MySQLUtil();
       $dbCon->connectDB();
       $dbCon->disconnectDB();
    }

    
    
?>
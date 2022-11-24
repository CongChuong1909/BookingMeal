<?php
ob_start();
include_once '../../config.php';
   include_once("../controller.php");
    include_once(root ."/model/MealsModel.php");
    

    class TableUser extends Controller{
        public function __construct($tableUser)
        {
            $meal = new MealsModel('','','','','');
            $data =  $meal->getAllMeals();
            $this->viewAdmin("table",$data);

            
            $mealDesTxt = "";
            $mealCategoryTxt = "";
            $procTimeTxt = "";
            $mealPriceTxt = "";
            $mealImageTxt = "";

            if(isset($_POST['deleteAction']))
             {
                $idMeal = $_POST['idMeal'];
                // var_dump((int)$idMeal);
                $meal->deleteMeal((int)$idMeal);
                header('Location: http://localhost/Chuong/thltweb/controller/admin/Table.php');
             }


            if(isset($_POST['mealActtions']))
            {
                $mealName = isset($_POST["mealName_txt"])?$_POST["mealName_txt"] : 0;
                $mealDes = isset($_POST["mealDes_txt"])?$_POST["mealDes_txt"] : "";
                $mealCategory = isset($_POST["mealCategory"])?$_POST["mealCategory"] : null;
                $mealPrice = isset($_POST["mealPrice_txt"])?$_POST["mealPrice_txt"] : "";
                $procTime = isset($_POST["procTime_txt"])?$_POST["procTime_txt"] : "";
                $mealImage = isset($_FILES["imageMeal"]["name"])?$_FILES["imageMeal"]["name"] : "";
                
                $newMeal = new MealsModel($mealName,$mealImage,$mealPrice,$procTime,$mealDes);
                $newMeal->insertMeal($mealCategory);
                header('Location: http://localhost/Chuong/thltweb/controller/admin/Table.php');
            }

            if(isset($_POST['updateAction'])){
                
                $meal = new MealsModel('','','','','');
                $id = (int)$_POST['idMeal'];
                $data =  $meal->getMeal($id);
                
                $IdTxt = $data['m_id'];
                $mealNameTxt = $data['m_name'];
                $mealDesTxt = $data['m_des'];
                $mealCategoryTxt = $data['ca_id'];
                $procTimeTxt = $data['m_processingTime'];
                $mealPriceTxt = $data['m_price'];
                $mealImageTxt = $data['m_image'];
                include_once("./mealUpdate.php");              
            }
            if(isset($_POST["mealUpdate"]))
            {
                
                    $meal = new MealsModel('','','','','');
                    $id = (int)$_POST['txtId'];
                    $data =  $meal->getMeal($id);
                    $mealImageTxt = $data['m_image'];

                    $mealid = isset($_POST["txtId"])?$_POST["txtId"] : 0;
                    $mealName = isset($_POST["mealName_txt"])?$_POST["mealName_txt"] : 0;
                    $mealDes = isset($_POST["mealDes_txt"])?$_POST["mealDes_txt"] : "";
                    $mealCategory = isset($_POST["mealCategory"])?$_POST["mealCategory"] : null;
                    $mealPrice = isset($_POST["mealPrice_txt"])?$_POST["mealPrice_txt"] : "";
                    $procTime = isset($_POST["procTime_txt"])?$_POST["procTime_txt"] : "";
                    if(isset($_FILES["imageMeal"]["name"])&&$_FILES["imageMeal"]["name"] != "")
                    {
                        $mealImage= $_FILES["imageMeal"]["name"];
                    }
                    else{
                        $mealImage= $mealImageTxt;
                    }
    
                    $newMeal = new MealsModel($mealName,$mealImage,$mealPrice,$procTime,$mealDes);
                    // $dataMealsUpdate = [$mealName,$mealImage,$mealPrice,$procTime,$mealDes]; 
                    $newMeal->updateMeal((int)$mealid,(int) $mealCategory, $newMeal);
                    header('Location: http://localhost/Chuong/thltweb/controller/admin/Table.php');
            }
            
                
        }
        // }
    }

    $tableUser ="";
    $Action = new TableUser($tableUser);
    ob_end_flush();
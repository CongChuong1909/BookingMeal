<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../../view/admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../view/admin/assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../view/admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../view/admin/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../view/admin/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
     <?php 
     include '../../view/admin/layout/category.php' 
     ?>

        <div class="main-panel">
            <?php 
            include '../../view/admin/layout/header.php' 
            ?>

            <div class="content" style="padding-bottom: 30px;">

                <form  action="./Table.php" method="POST" enctype="multipart/form-data" class="formAddMeals">
                    <div class="container tm-mt-big tm-mb-big">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
                                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                    <div class="card" style="width: 100%; padding: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="tm-block-title d-inline-block">Add Meals</h2>
                                        </div>
                                    </div>
                                    <div class="row tm-edit-product-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="name">Meals Name
                                                        </label>
                                                        <input name="mealName_txt" type="text" class="form-control validate" value="    " required />
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control validate" name="mealDes_txt" rows="3" required></textarea>
                                                    </div>
                                                    <div class="form-group mb-3" >
                                                        <label for="category">Category</label>
                                                        <select name="mealCategory" class="custom-select tm-select-accounts" style="width: 200px;">
                                                            <option selected value="1">Meals</option>
                                                            <option value="2">Drink</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                            <label for="expire_date">Price (.000vnđ)
                                                            </label>
                                                            <input name="mealPrice_txt" type="text" class="form-control validate" />
                                                        </div>
                                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                            <label for="stock">Processing time (Minutes)
                                                            </label>
                                                            <input name="procTime_txt" type="text" class="form-control validate" required />
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                            <div class="tm-product-img-dummy mx-auto">
                                                <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                                            </div>
                                            <div class="custom-file mt-3 mb-3">
                                                <input id="fileInput" type="file" name="imageMeal" style="display:none ;" />
                                                <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD MEAL IMAGE" onclick="document.getElementById('fileInput').click();" />
                                            </div>
                                        </div>
                                        <div class="col-xl- col-lg-6 col-md-12">
                                            <button  type="submit" name="mealActtions" value="add" class="btn btn-primary btn-block text-uppercase" style="background-color: #986ad9; color:#fff; margin-top: 30px;">Add Product Now</button>
                                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </form>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Meals manager</h4>
                        <p class="category">infomation of meals detail</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Processing time</th>
                                <th>Description</th>
                                <th colspan="3">Option</th>
                            </thead>
                            <tbody>
                                <?php
                               
                                for ($i = 0; $i < count($data); $i++) {
                                    echo "  <form action='./Table.php' method='POST'>";
                                    echo "    <tr style = 'height : 107px'> ";
                                    echo "        <td>" . $data[$i]["m_id"] . "</td> ";
                                    echo "        <td>" . $data[$i]["m_name"] . "</td> ";
                                    echo "        <td> <img src='http://localhost/Chuong/thltweb/view/user/img/" . $data[$i]["m_image"] . "' style = 'width : 80px' alt=''></td> ";
                                    echo "        <td>" . $data[$i]["m_price"] . "</td> ";
                                    echo "        <td>" . $data[$i]["m_processingTime"] . "</td> ";
                                    echo "        <td>" . $data[$i]["m_des"] . "</td> ";
                                    echo "         <input type = 'text' hidden name = 'idMeal' value = ".$data[$i]["m_id"]."/>";
                                    echo "        <td><button type = 'submit' name = 'deleteAction'> X </button></td> ";
                                    echo "        <td><button type = 'submit' name = 'updateAction' > Edit</button></td> ";
                                    echo "      </tr>";
                                    echo "  </form>";
                                }
                                ?>
                                

                               

                            </tbody>
                        </table>
                                <img src="" alt="">
                    </div>
                </div>
            </div>




        </div>
    </div>
    </div>

    <?php include "../../view/admin/layout/footer.php" ?>

    </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="../../view/admin/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../view/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../../view/admin/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../../view/admin/assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../../view/admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../../view/admin/assets/js/demo.js"></script>


</html>
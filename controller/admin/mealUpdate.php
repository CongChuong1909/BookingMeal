<div class="layout_update-meal">
    <div class="container_update-meal" style="padding-bottom: 30px; ">
        <div class="content" style="display: flex; align-items: flex-end;">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mx-auto">
            <form action="./Table.php" method="POST" enctype="multipart/form-data" class="formAddMeals">
                <div class="container tm-mt-big tm-mb-big">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mx-auto">
                            <a href="http://localhost/Chuong/thltweb/controller/admin/Table.php" class="exit">X</a>
                            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                <div class="card-update_meal" style="width: 100%; padding: 40px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div class="row title_update">
                                        <div class="col-12 header_update">
                                            <h2 class="tm-block-title d-inline-block">Update Meals</h2>

                                        </div>
                                        <div class="row tm-edit-product-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="name">Meals Name
                                                    </label>
                                                    <input name="mealName_txt" type="text" class="form-control validate" value="<?php echo $mealNameTxt ?>" required />
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control validate" name="mealDes_txt" rows="3" value="" required><?php echo $mealDesTxt ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="category">Category</label>
                                                    <select name="mealCategory" class="custom-select tm-select-accounts" style="width: 200px;">
                                                        <option selected value="1">Meals</option>
                                                        <option value="2">Drink</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class=" edit_css form-group mb-3 col-xs-12 col-sm-6">
                                                            <label for="expire_date">Price (.000vnđ)
                                                            </label>
                                                            <input name="mealPrice_txt" type="text" value="<?php echo $mealPriceTxt ?>" class="form-control validate" />
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                            <label for="stock">Processing time (Minutes)
                                                            </label>
                                                            <input name="procTime_txt" type="text" value="<?php echo $procTimeTxt ?>" class="form-control validate" required />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            


        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4 edit_form-img">
        
        <!-- <div class="tm-product-img-dummy mx-auto">
            <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
        </div> -->
        <div class="custom-file mt-6 mb-6">
                 <input id="fileInput" type="file" name="imageMeal"/>
           
            <input id="fileInputimg" type="image" src="http://localhost/Chuong/thltweb/view/user/img/<?php echo $mealImageTxt ?>"  />
            <!-- <input type="button" class="btn btn-primary btn-block btn_addimg" value="UPLOAD MEAL IMAGE" onclick="document.getElementById('fileInput').click();" /> -->
        </div>
    </div>
    <input name='txtId' type="text" hidden value=<?php echo $IdTxt ?>>
    
</div>
<div class="col-xl-12 col-lg-12 col-md-12">
    <button type="submit" name="mealUpdate" class="btn btn-primary btn-block text-uppercase" style="background-color: #986ad9; color:#fff; margin-top: 30px;">Update Meal Now</button>
</div>
</form>
</div>


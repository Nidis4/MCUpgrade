<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'pricelist';
    include('menu.php');
?>
             <div class="container">
                    <form id="pricelistform" method="post">
                        
                    
                        <div class="row pricelist-row">
                            <div class="col-md-12 page-title ">
                                <h2>Pricelist</h2>
                            </div>
                            <div class="col-md-6">
                                <p>Your Main Trade:*</p>
                                <?php 
                                    //echo SITE_URL.'webservices/api/professional/getCategories.php?prof_id='.$_SESSION['id'];

                                    $categories = file_get_contents(SITE_URL.'webservices/api/professional/getCategories.php?prof_id='.$_SESSION['id']);
                                    $categories = json_decode($categories, true); // decode the JSON into an associative array

                                    
                                ?>
                                <select class="select_trade" name="profile_main_category" id="profile_main_category">
                                    <option class="0" value="">Select</option>
                                    <?php 
                                        if(@$categories[0]['category_id']){
                                            $pcats = array();
                                            foreach ($categories as $value) {
                                                $pcats[] = $value['category_id'];
                                    ?>
                                               <option <?php if($value['is_main'] == 1){?> selected <?php }?> value="<?php echo $value['category_id']?>"><?php echo $value['category_name']?></option> 
                                    <?php
                                            }
                                        }
                                    ?>
                                   
                                </select><br><br>

                                <?php 
                                        if(@$categories[0]['category_id']){
                                           
                                            foreach ($categories as $value) {
                                                
                                    ?>
                                                 <button type="button" class="mb-1 mt-1 mr-1 btn btn-default delcat" data-id="<?php echo $value['category_id'];?>" style="margin-bottom: 5px"><?php echo $value['category_name'];?> <i class="fa fa-close" style="color: red"></i> </button>
                                    <?php
                                            }
                                        }
                                    ?>

                              

                                <div class="addtrade"  data-toggle="modal" data-target="#modalLoginForm">ADD ANOTHER TRADE</div>
                            </div>
                            <div class="col-md-6">

                                <p>County:*</p>
                                <?php 
                                    //echo SITE_URL.'webservices/api/professional/getCategories.php?prof_id='.$_SESSION['id'];

                                    $counties = file_get_contents(SITE_URL.'webservices/api/professional/getCounties.php?prof_id='.$_SESSION['id']);
                                    $counties = json_decode($counties, true); // decode the JSON into an associative array
                                    
                                    
                                ?>

                                <select class="select_counties" name="profile_main_county" id="profile_main_county">
                                    <option value="">Select</option>
                                   <?php 
                                        if(@$counties){
                                            foreach ($counties as $value) {
                                    ?>
                                               <option <?php if($value['is_main'] == 1){?> selected <?php }?> value="<?php echo $value['county_id']?>"><?php echo $value['county_name']?></option> 
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>

                                <div class="addcountie">ADD ANOTHER COUNTY</div>
                            </div>
                            <div class="col-md-12">

                                <p>Pricing for each job category and specific applications</p>
                                <?php 
                                    $applications = file_get_contents(SITE_URL.'webservices/api/professional/getApplicationsPrices.php?id='.$_SESSION['id']);
                                    $applications = json_decode($applications, true); // decode the JSON into an associative array
                                    // echo "<pre>";
                                    // print_r($applications);
                                    // die;
                                    
                                    if(@$applications['records'][0]['application_id']){
                                        $cats = array();
                                        $i = 0;
                                        foreach ($applications['records'] as $value) {
                                            $i++;
                                            if($i == 1){
                                               $cats[] = $value['category_id']; 
                                ?>
                                                <div class="panel panel-default category-panel">
                                                  <div class="panel-heading">
                                                    <a data-toggle="collapse" href="#collapse<?php echo $value['category_id'];?>">
                                                        <h4 class="panel-title"><?php echo $value['category_name']?> <i class="fa fa-angle-down angel-style"></i></h4>
                                                    </a>
                                                  </div>
                                                  <div id="collapse<?php echo $value['category_id']?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h4 class="h4-cat-apps"><?php echo $value['category_name']?> Applications</h4>
                                                            <div class="panel-group app-group" id="accordion<?php echo $value['application_id']?>">
                                <?php
                                            }elseif(!in_array($value['category_id'], $cats)){
                                                $cats[] = $value['category_id'];
                                ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">&nbsp;</div>
                                                  </div>
                                                </div>

                                                <div class="panel panel-default category-panel">
                                                  <div class="panel-heading">
                                                    <a data-toggle="collapse" href="#collapse<?php echo $value['category_id'];?>">
                                                        <h4 class="panel-title"><?php echo $value['category_name']?> <i class="fa fa-angle-down angel-style"></i></h4>
                                                    </a>
                                                  </div>
                                                  <div id="collapse<?php echo $value['category_id']?>" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <h4 class="h4-cat-apps"><?php echo $value['category_name']?> Applications</h4>
                                                            <div class="panel-group app-group" id="accordion<?php echo $value['application_id']?>">    
                                <?php
                                            }
                                            
                                ?>
                                                
                                
                                                        
                                                            <div class="panel panel-default">
                                                              <div class="panel-heading">
                                                                <a data-toggle="collapse" data-parent="#accordion<?php echo $value['application_id']?>" href="#collapse<?php echo $value['application_id']?>">
                                                                    <h4 class="panel-title">
                                                                     <?php echo $value['application_title'];?> <i class="fa fa-angle-down inner-angel-style"></i>
                                                                    </h4>
                                                                </a>
                                                              </div>
                                                              <div id="collapse<?php echo $value['application_id']?>" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <?php //echo $value['application_short_description'];?>
                                                                    <div class="app-description col-md-12">
                                                                        <?php echo $value['application_short_description'];?>
                                                                        <div class="read-more-btn">Read more</div>
                                                                        <div class="read-more-txt">
                                                                            <?php echo $value['application_detail_description'];?>
                                                                            <div class="col-md-12 read-less-btn">Read less</div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label" name="app_price">Price:</label>
                                                                        <input type="number" name="profile_application[<?php echo $value['application_id'];?>][price]" class="app_price" value="<?php echo $value['application_price'];?>" > <span class="app-span"><?php echo $value['application_unit'];?> </span>
                                                                    </div>
                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label">Free distance:</label>
                                                                        <input type="number" name="profile_application[<?php echo $value['application_id'];?>][free_distance]" class="free-distance" value="<?php echo $value['application_free_distance'];?>"> <span class="app-span">km</span>
                                                                    </div>

                                                                    <div class="app-cols col-md-4">
                                                                        <label class="app-label">Extra price/km:</label>
                                                                        <input type="number" name="profile_application[<?php echo $value['application_id'];?>][extra_price_km]" class="extra-price-km" value="<?php echo $value['application_extra_price_km'];?>"> <span class="app-span">€</span>
                                                                    </div>

                                                                    <div class="app-cols">
                                                                        <label class="app-label">One line description:</label>
                                                                        <input type="text" name="profile_application[<?php echo $value['application_id'];?>][description]" class="app-one-line-desc" value="<?php echo $value['application_description'];?>">
                                                                    </div>

                                                                    <div class="app-cols">
                                                                        <label class="app-label">Charge info:</label>
                                                                        <input type="text" name="profile_application[<?php echo $value['application_id'];?>][tec_description]" class="app-one-line-desc" value="<?php echo $value['application_tec_description'];?>">
                                                                    </div>
                                                                    <input type="hidden" name="profile_application[<?php echo $value['application_id'];?>][application_id]" value="<?php echo $value['application_id'];?>">
                                                                    <input type="hidden" name="profile_application[<?php echo $value['application_id'];?>][category_id]" value="<?php echo $value['category_id'];?>">

                                                                </div>
                                                              </div>
                                                            </div>
                                
                                                        
                                <?php                                         
                                            if($i == count($applications['records'])){
                                ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">&nbsp;</div>
                                                  </div>
                                                </div>      
                                <?php
                                            }
                                        }
                                    }
                                ?>

                                <input type="hidden" name="professional_id" value="<?php echo $_SESSION['id'];?>">
                                <div class="save-pricelist" id="pricesave">SAVE</div>

                            </div>  

                            
                    </div>
                    </form>
            </div>


<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add New Trade</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Select Trade</label>
                            <div class="col-lg-9">
                                <?php
                                    $categories = file_get_contents(SITE_URL.'webservices/api/category/read.php');
                                    $categories = json_decode($categories, true); // decode the JSON into an associative array
                                ?>
                                <select data-plugin-selectTwo class="form-control populate" name="category" id="category">
                                    <option value="">Select Trade</option>
                                    <?php
                                        foreach ($categories as $category) {
                                            $cat_id = $category['id'];
                                            $cat_name = $category['title'];
                                            $commision = $category['commissionRate'];
                                            if(!in_array($cat_id , $pcats)){
                                                echo '<option value="'.$cat_id.'" comm="'.$commision.'">'.$cat_name.'</option>';
                                            }
                                            
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            
                    </div>
                    
                </div>

                

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-info addtradecat">Add</button>
            </div>
        </div>
    </div>
</div>            
<script src="../js/core.js"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $("#pricesave").on('click',function(){ 
                var getSaveAPI = API_LOCATION+'professional/saveApplications.php';
                
                $.ajax({
                        type: "POST",
                        url: getSaveAPI,
                        data: $("#pricelistform").serialize(),
                        dataType: "json",
                        success: function(data)
                        {
                            alert(data['message']);
                            location.reload();
                        }
                    });
                return false;
           
        });

        $('.addtradecat').on('click', function(){
            var cat_id = $("#category").val();
            if(cat_id != ""){
                var getSaveAPI = API_LOCATION+'professional/addCategory.php?prof_id=<?php echo $_SESSION['id'];?>&cat_id='+cat_id;
                $.ajax({
                        type: "POST",
                        url: getSaveAPI,
                        data: "",
                        dataType: "json",
                        success: function(data)
                        {
                            alert(data['message']);
                            location.reload();
                        }
                    });
                return false;

            }else{
                alert("Please Select Trade");
            }
            
            return false;
        });


        $('.delcat').on('click',function(){
            var cat_id = $(this).attr('data-id');
            if (confirm('Are you sure want to remove this Trade?')) {
                var getSaveAPI = API_LOCATION+'professional/deleteCategory.php?prof_id=<?php echo $_SESSION['id'];?>&cat_id='+cat_id;
                $.ajax({
                        type: "POST",
                        url: getSaveAPI,
                        data: "",
                        dataType: "json",
                        success: function(data)
                        {
                            alert(data['message']);
                            location.reload();
                        }
                    });
                return false;
            }
            
            return false;
        });

    });

</script>
            
          
            </div>
        </div>

    </body>
</html>

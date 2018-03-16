<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<link rel="stylesheet" type="text/css" href="css/harpreet_style.css">
<div class="container-fluid">
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                <div class="post-form-title pad20">
                    <h3>Post your job, Now! It's FREE!</h3>
                    <p>Create your post in 3 steps! Receive offers by today! More than 1 thousand registered constructors! </p>
                    <img class="titlesep" src="img/separator-4.png">
                </div>
                <div class="post-your-project-main">                    
                    <div class="post-project-menu">
                        <img src="<?php echo SITE_URL;?>/img/back_ground-image_english_step2.png" alt="image">                
                    </div>
                    <form id="jobformtwo">
                        <div class="select-project-type-main">
                            
                            <div class="form-questions">
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">City</label>
                                    <div class="col-lg-7">
                                        <input name="job_city" value="" class="form-control" id="job_city" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">County</label>
                                    <div class="col-lg-7">
                                        <?php
                                            $counties = file_get_contents(SITE_URL.'webservices/api/county/read.php');
                                            $counties = json_decode($counties, true); // decode the JSON into an associative array
                                        ?>
                                        <select class="form-control" name="job_county" id="county">
                                            <?php
                                                
                                                foreach ($counties as $county) {
                                                    $cut_id = $county['id'];
                                                    $cat_name = $county['county_name'];
                                            ?>
                                                <option  <?php if($cut_id == "1"){?> selected="selected" <?php }?> value="<?php echo $cut_id;?>"><?php echo $cat_name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Country</label>
                                    <div class="col-lg-7">
                                        <?php

                                            $counties = file_get_contents(SITE_URL.'webservices/api/country/read.php');
                                            $counties = json_decode($counties, true); // decode the JSON into an associative array
                                        ?>
                                        <select class="form-control" name="job_country" id="job_country">
                                            <?php
                                                
                                                foreach ($counties as $county) {
                                                    $cut_id = $county['id'];
                                                    $cat_name = $county['country_name'];
                                            ?>
                                                <option <?php if($cut_id == "84"){?> selected="selected" <?php }?> value="<?php echo $cut_id;?>"><?php echo $cat_name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Post Code</label>
                                    <div class="col-lg-7">
                                        <input name="job_postcode" value="" class="form-control" id="job_postcode" type="text">
                                    </div>
                                </div>


                                <div class="form-group"><input type="hidden" name="job_id" value="<?php echo $_REQUEST['jid'];?>"></div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label"></label>
                                    <div class="col-lg-7">
                                        <button class="btn-prosfora-prof jobsteptwo">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>    
</div>
<!-- <script src="js/job-post.js"></script> -->
<div id="myalertbox" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-danger fade in alert-dismissible" style="margin-bottom: 0">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Error!!!</h4>
                </div>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".jobsteptwo").on('click',function(){
            var joberror = 0;
            var errormessage = "";

            
            if(joberror == 1){
                $(".modal-body").html(errormessage);
                $('#myalertbox').modal('show');
            }else{

                var getAvailableAPI = "<?php echo API_URL;?>job/saveaddress.php";
                    
                $.ajax({
                    type: "POST",
                    url: getAvailableAPI,
                    dataType: "JSON",
                    data: $('#jobformtwo').serialize(),
                    success: function(data)
                    {
                        if(data.error){
                            alert(data.message);
                        }else{

                            window.location = "<?php echo SITE_URL;?>jobmember.php?jid="+data.job_id;
                            //alert(data.job_id);
                        }
                    }
                });

                //alert("Yes");
            }

            return false;
        }); 
    });
</script>

<?php include('footer.php'); ?>
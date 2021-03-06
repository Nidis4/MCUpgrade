<?php 
    include('constants.php'); 
    include('front_end_config/core.php');
?>

<!DOCTYPE html>
<html lang="el">
    <head>
        
        <title>Καταχώρηση Έργου | MyConstructor.gr</title>

        <link rel="alternate" hreflang="el" href="https://myconstructor.gr/jobpost.php">

        <meta name="description" content="Θέλετε να πραγματοποιήσετε κάποια τεχνική εργασία; Μπορείτε να κάνετε εύκολα & γρήγορα καταχώρηση του
        έργου σας στην ειδική φόρμα που έχουμε φτιάξει για την πιο άμεση εξυπηρέτησή σας! Συμπληρώστε τις απαραίτητες πληροφορίες και θα επικοινωνήσουμε μαζί σας με μία προσφορά.">
        <link rel="canonical" href="https://myconstructor.gr/jobpost.php">
        <meta property="og:locale" content="el_GR">
        <meta name="robots" content="index,follow">

        <?php include('header.php'); ?>
        <link rel="stylesheet" type="text/css" href="css/harpreet_style.css">


        
    </head>

<?php
include('menu.php');
include('search.php');
?>
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
                        <img src="<?php echo SITE_URL;?>/img/back_ground-image_english_step1.png" alt="image">                
                    </div>
                    <form id="jobformone">
                        <div class="select-project-type-main">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Select Category</label>
                                <div class="col-lg-6">
                                    <?php
                                        $categories = file_get_contents(SITE_URL.'webservices/api/category/read.php');
                                        $categories = json_decode($categories, true); // decode the JSON into an associative array
                                    ?>
                                    <select class="form-control" name="job_category" id="category">
                                        <?php
                                            if(@$_REQUEST['catid']){
                                                $currentCatId = $_REQUEST['catid']; 
                                            }else{
                                                $currentCatId = "31";   
                                            }
                                            foreach ($categories as $category) {
                                                $cat_id = $category['id'];
                                                $cat_name = $category['title'];
                                                $commision = $category['commissionRate'];
                                        ?>
                                            <option value="<?php echo $cat_id;?>" <?php if($cat_id == $currentCatId){?> selected="selected" <?php }?>><?php echo $cat_name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-questions">
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Job Title</label>
                                    <div class="col-lg-7">
                                        <input name="job_title" value="" class="form-control" id="job_title" type="text">
                                    </div>
                                </div>
                                <?php
                                    $questions = file_get_contents(SITE_URL.'webservices/api/category/questions.php?catid='.$currentCatId);
                                    $questions = json_decode($questions, true); // decode the JSON into an associative array

                                    if(@$questions['records']){
                                        foreach ($questions['records'] as $qvalue) {
                                            
                                            $answers = file_get_contents(SITE_URL.'webservices/api/category/answers.php?questionid='.$qvalue['id']);
                                            $answers = json_decode($answers, true); // decode the JSON into an associative array

                                ?>
                                            <div class="form-group">
                                                <label class="col-lg-5 control-label"><?php echo $qvalue['question'];?></label>
                                                <div class="col-lg-7">
                                                    <?php
                                                        if(@$answers && ($qvalue['option'] == 2)){
                                                            foreach ($answers as $avalue) {
                                                    ?>
                                                               <div class="col-lg-4">
                                                                    <label class="pt-3">
                                                                        <input class="" type="radio" name="job_question[<?php echo $qvalue['id'];?>]" value="<?php echo $avalue['id'];?>" id="">
                                                                        <?php echo $avalue['answer'];?>
                                                                    </label>
                                                                </div> 
                                                    <?php   
                                                            }
                                                        }elseif($qvalue['option'] == 1){
                                                    ?>
                                                            <input name="job_question[<?php echo $qvalue['id'];?>]" value="" class="form-control" id="" type="text">
                                                    <?php        
                                                        }else if(@$answers && ($qvalue['option'] == 4)){
                                                            foreach ($answers as $avalue) {
                                                    ?>
                                                               <div class="col-lg-4">
                                                                    <label class="pt-3">
                                                                        <input class="" type="checkbox" name="job_question[<?php echo $qvalue['id'];?>][]" value="<?php echo $avalue['id'];?>" id="">
                                                                        <?php echo $avalue['answer'];?>
                                                                    </label>
                                                                </div> 
                                                    <?php   
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>    
                                <?php   
                                        }     
                                    }
                                ?>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">How many offers do you want to receive?</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" name="job_offers" id="job_offers">
                                            <option value="">Select</option>
                                            <option value="1">1</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="7">7</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">How much is your maximum budget, for the whole job?</label>
                                    <div class="col-lg-7">
                                        <input name="job_budget" value="" class="form-control" id="job_budget" type="number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Comments</label>
                                    <div class="col-lg-7">
                                        <textarea name="job_comment" id="job_comment" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Email</label>
                                    <div class="col-lg-7">
                                        <input name="job_email" value="" class="form-control" id="job_email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Mobile phone number</label>
                                    <div class="col-lg-7">
                                        <input name="job_phone" value="" class="form-control" id="job_phone" type="text">
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label"></label>
                                    <div class="col-lg-7">
                                        <button class="btn-prosfora-prof jobstepone">Continue</button>
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
        $("#category").on('change',function(){
            var catid = $(this).val();
            window.location = "<?php echo SITE_URL;?>jobpost.php?catid="+catid;
        });


        $(".jobstepone").on('click',function(){
            var joberror = 0;
            var errormessage = "";

            if($("#job_title").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter job title.</p>";
                joberror = 1;
            }
            if($("#job_offers").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter number of offers.</p>";
                joberror = 1;
            }
            if($("#job_email").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter email.</p>";
                joberror = 1;
            }
            if($("#job_phone").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter phone number.</p>";
                joberror = 1;
            }

            if(joberror == 1){
                $(".modal-body").html(errormessage);
                $('#myalertbox').modal('show');
            }else{

                var getAvailableAPI = "<?php echo API_URL;?>job/save.php";
                    
                $.ajax({
                    type: "POST",
                    url: getAvailableAPI,
                    dataType: "JSON",
                    data: $('#jobformone').serialize(),
                    success: function(data)
                    {
                        if(data.error){
                            alert(data.message);
                        }else{

                            window.location = "<?php echo SITE_URL;?>jobaddress.php?jid="+data.job_id;
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
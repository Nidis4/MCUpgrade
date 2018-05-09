<?php 
    include('constants.php'); 
    include('front_end_config/core.php');
?>

<!DOCTYPE html>
<html lang="el">
    <head>
        
        <title>ΜyConstructor</title>

        <link rel="alternate" hreflang="el" href="https://myconstructor.gr/blog/matakomiseis-metafores/">

        <meta name="description" content="Μετακόμιση οικοσκευών από 49€. Μετακομίσεις σε όλη την Ελλάδα. Οικονομικές μεταφορές με ανυψωτικό και αμπαλάζ. ΠΡΟΣΦΟΡΕΣ Μετακόμιση Γκαρσονιέρα 49€ - Μετακόμιση Δυάρι 70€ - Μετακόμιση Τριάρι 90€ - Μετακόμιση Τεσσάρι 110€. Μετακομίστε με ασφάλεια! Αξιολογημένες Μεταφορικές Εταιρίες.">
        <link rel="canonical" href="https://myconstructor.gr/blog/matakomiseis-metafores/">
        <meta property="og:locale" content="el_GR">

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
                    <h3>Subscribe to  <img style="width: 200px;" src="<?php echo SITE_URL;?>/img/my-con-logo.png" alt="image"></h3>
                    <img class="titlesep" src="img/separator-4.png">
                </div>
                <div class="post-your-project-main">                    
                    <div class="post-project-menu">
                        <img src="<?php echo SITE_URL;?>/img/back_ground-image_english_step3.png" alt="image">                
                    </div>
                    <form id="jobformthree">
                        <div class="select-project-type-main">
                            
                            <div class="form-questions">
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">First Name</label>
                                    <div class="col-lg-7">
                                        <input name="first_name" value="" class="form-control" id="first_name" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Last Name</label>
                                    <div class="col-lg-7">
                                        <input name="last_name" value="" class="form-control" id="last_name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Confirmation Code</label>
                                    <div class="col-lg-7">
                                        <input name="confirm_code" value="" class="form-control" id="confirm_code" type="text" maxlength="9">
                                        <p class="bg-warning" style="padding: 10px; margin-top: 5px; font-size: 13px">Now we will need to confirm your mobile phone number. Check your mobile phone we have already sent you an sms, with a "confirmation code". Fill the code at this field. If you have not receive an sms please click here or fill the contact form.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Password</label>
                                    <div class="col-lg-7">
                                        <input name="password" value="" class="form-control" id="password" type="password">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Confirm Password</label>
                                    <div class="col-lg-7">
                                        <input name="confirm_password" value="" class="form-control" id="confirm_password" type="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-5 control-label">How did you hear about us?</label>
                                    <div class="col-lg-7">
                                        <?php

                                            $hear_options = file_get_contents(SITE_URL.'webservices/api/hear_options/read.php');
                                            $hear_options = json_decode($hear_options, true); // decode the JSON into an associative array
                                            
                                        ?>
                                        <select class="form-control" name="hear_option" id="hear_option">
                                            <?php
                                                
                                                foreach ($hear_options as $option) {
                                                    $cut_id = $option['id'];
                                                    $option = $option['option'];
                                                    $option_greek = $option['option_greek'];
                                            ?>
                                                <option value="<?php echo $cut_id;?>"><?php echo $option;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                


                                <div class="form-group"><input type="hidden" name="job_id" value="<?php echo $_REQUEST['jid'];?>"></div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label"></label>
                                    <div class="col-lg-7">
                                        <button class="btn-prosfora-prof jobstepthree">Continue</button>
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
        $(".jobstepthree").on('click',function(){
            var joberror = 0;
            var errormessage = "";

            if($("#first_name").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter your name.</p>";
                joberror = 1;
            }
            if($("#last_name").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter your last name.</p>";
                joberror = 1;
            }

            if($("#password").val() == ""){
                errormessage = errormessage + "<p class=''>Please enter password.</p>";
                joberror = 1;
            }else if($("#password").val() != $("#confirm_password").val() ){
                errormessage = errormessage + "<p class=''>Password and Confirm Password should be match.</p>";
                joberror = 1;
            }
            

            
            if(joberror == 1){
                $(".modal-body").html(errormessage);
                $('#myalertbox').modal('show');
            }else{

                var getAvailableAPI = "<?php echo API_URL;?>job/savemember.php";
                    
                $.ajax({
                    type: "POST",
                    url: getAvailableAPI,
                    dataType: "JSON",
                    data: $('#jobformthree').serialize(),
                    success: function(data)
                    {
                        if(data.error){
                            alert(data.message);
                        }else{

                            alert(data.message);
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
<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Form Validation | Porto Admin - Responsive HTML5 Template 2.0.0</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="vendor/animate/animate.css">

		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<?php

				if (isset($_GET['id'])) {
				    $id = $_GET['id'];
				} else {
				    // Fallback behaviour goes here
				    $url = $home_url."platform/jobs.php";
				    echo $url;
				    header("Location: ".$url);
					die();
				}

				include('header.php');
				$job = file_get_contents($api_url.'job/read_one.php?id='.$id);
				$job = json_decode($job, true); // decode the JSON into an associative array



				// if(@$job['category_id']){
				// 	$applications = file_get_contents($api_url.'application/readByCategory.php?cat_id='.$job['category_id']);
				// 	$applications = json_decode($applications, true); // decode the JSON into an associative array

				// 	$application_disable = "";
				// }else{
				// 	$application_disable = "disabled";
				// }
				// $statuses = '';
				// $activeStatusName ='';

				// if ($job['status']!=''){
				// 	//echo "----".$api_url.'webservices/api/appointment/getStatusInfo.php?id='.$appointment['status']."---";
				// 	$statuses = file_get_contents($api_url.'webservices/api/appointment/getStatusInfo.php?id='.$appointment['status']);
				// 	$statuses = json_decode($statuses, true); // decode the JSON into an associative array
				// 	$activeStatusName = $statuses['name'];
				// 	$activeStatusID = $statuses['id'];
				// }
			?>
			<div class="inner-wrapper">				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body card-margin">
					<header class="page-header">
						<h2>Edit Job #<?php echo $id ?></h2>					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Job</span></li>
								<li><span>Edit</span></li>
							</ol>					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row app-status" id='<?php echo "status-".$job['status']; ?>'>
						
						<!-- col-lg-6 -->
						<div class="col-lg-12" id='jobDetails'>
							<form id="jobform" action="forms-validation.html" class="form-horizontal">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>

										<h2 class="card-title">Job Details</h2>
										<p class="card-subtitle">
											Please fill in the Job details
										</p>
									</header>
									<div class="card-body row">
										<div class="col-lg-6">
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Job Title <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="job_title" id="job_title" class="form-control" value="<?php echo $job['title'];?>" required/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">Job Description <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="job_description" id="job_description" class="form-control" value="<?php echo $job['description'];?>"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">How much is your maximum budget, for the whole job? <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="job_budget" id="job_budget" class="form-control" value="<?php echo $job['budget'];?>"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">Charge Credit </label>
												<div class="col-sm-9">
													<label class="pt-2">&euro; <?php  $credit = $job['budget'] / 100; echo $credit; ?></label>
													
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">Commission </label>
												<div class="col-sm-9">
													<input type="text" name="job_commission" id="job_commission" class="form-control" value="<?php echo $job['commission'];?>"/>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">Charge Credit (Admin) </label>
												<div class="col-sm-9">
													<input type="text" name="job_charge_admin" id="job_charge_admin" class="form-control" value="<?php echo $job['charge_admin'];?>"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">How many offers do you want to receive? <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="job_offers" id="job_offers" class="form-control" value="<?php echo $job['offers'];?>"/>
												</div>
											</div>
											<!-- <div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">When do you plan to start the job? <span class="required">*</span></label>
												<div class="col-sm-9">
													<div class="col-lg-3" style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$professional['work_done'] && ($professional['work_done'] == "1-3 Months"))){?> checked="checked" <?php }?> type="radio" name="work_done" value="1-3 Months" id="work_done1">
											                    1-3 Months
											                </label>
											            </div>
											        </div>
											        <div class="col-lg-3"  style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$professional['work_done'] && ($professional['work_done'] == "3-6 Months"))){?> checked="checked" <?php }?> type="radio" name="work_done" value="3-6 Months" id="work_done1">
											                    3-6 Months
											                </label>
											            </div>
											        </div>
											        <div class="col-lg-3"  style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$professional['work_done'] && ($professional['work_done'] == "6-12 Months"))){?> checked="checked" <?php }?> type="radio" name="work_done" value="6-12 Months" id="work_done1">
											                    6-12 Months
											                </label>
											            </div>
											        </div>
											        <div class="col-lg-3"  style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$professional['work_done'] && ($professional['work_done'] == "Over 1 year"))){?> checked="checked" <?php }?> type="radio" name="work_done" value="Over 1 year" id="work_done1">
											                    Over 1 year
											                </label>
											            </div>
											        </div>

												</div>
											</div> -->

										</div>
										<div class="col-lg-6">
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">First Name <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $job['first_name'];?>" required/>
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Last Name <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $job['last_name'];?>" required/>
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Email<span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="job_email" id="job_email" class="form-control" value="<?php echo $job['email'];?>" required/>
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Mobile Number</label>
												<div class="col-sm-9">
													<input type="text" name="job_phone" id="job_phone" class="form-control" value="<?php echo $job['phone'];?>" required/>
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">City</label>
												<div class="col-sm-9">
													<input type="text" name="job_city" id="job_city" class="form-control" value="<?php echo $job['city'];?>" />
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">County</label>
												<div class="col-sm-9">
													<?php
														$counties = file_get_contents($api_url.'county/read.php');
														$counties = json_decode($counties, true); // decode the JSON into an associative array
													?>
													<select data-plugin-selectTwo class="form-control populate" id="job_county" name="job_county">
														<?php
															foreach ($counties as $counties) {
																$county_id = $counties['id'];
																$county_name = $counties['county_name'];
																if($county_id == $job['county_id']){
																	$selected ='selected="selected"';
																}else{
																	$selected = '';
																}
																echo '<option '.$selected.' value="'.$county_id.'">'.$county_name.'</option>';
															}
														?>
													</select>
													
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Country</label>
												<div class="col-sm-9">
													<?php
														$countries = file_get_contents($api_url.'country/read.php');
														$countries = json_decode($countries, true); // decode the JSON into an associative array
													?>
													<select data-plugin-selectTwo class="form-control populate" id="job_country" name="job_country">
														<?php
															foreach ($countries as $country) {
																$country_id = $country['id'];
																$country_name = $country['country_name'];
																if($country_id == $job['country_id']){
																	$selected ='selected="selected"';
																}else{
																	$selected = '';
																}
																echo '<option '.$selected.' value="'.$country_id.'">'.$country_name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Post Code</label>
												<div class="col-sm-9">
													<input type="text" name="job_postcode" id="job_postcode" class="form-control" value="<?php echo $job['postcode'];?>" />
												</div>
											</div>
										</div>
										
										<div class="col-lg-12">
											<h3>More Questions</h3>
											<hr>
										</div>	
										<div class="col-lg-12">
											<?php 
												$jobquestionsans = array();
												$jobquestions = json_decode($job['questions']);
												if(@$jobquestions){
													foreach ($jobquestions as $key => $value) {
														$jobquestionsans[$key] = $value;
													}
												}	
																						
											?>
											<?php
		                                    $questions = file_get_contents($api_url.'category/questions.php?catid='.$job['category_id']);
		                                    $questions = json_decode($questions, true); // decode the JSON into an associative array

		                                    if(@$questions['records']){
		                                        foreach ($questions['records'] as $qvalue) {
		                                            
		                                            $answers = file_get_contents($api_url.'category/answers.php?questionid='.$qvalue['id']);
		                                            $answers = json_decode($answers, true); // decode the JSON into an associative array

		                                            if(in_array($qvalue['id'], array_keys($jobquestionsans))){
                                    					$selectedanswer = $jobquestionsans[$qvalue['id']];
                                    				}else{
                                    					$selectedanswer = "";
                                    				}

		                                ?>
		                                            <div class="form-group row">
		                                                <label class="col-sm-3 control-label"><?php echo $qvalue['question'];?></label>
		                                                <div class="col-sm-9">
		                                                    <?php
		                                                        if(@$answers){
		                                                            foreach ($answers as $avalue) {
		                                                    			if($qvalue['option'] == 2){   

		                                                    ?>
			                                                               <div class="col-lg-3" style="float: left;">
			                                                                    <label class="pt-3">
			                                                                        <input class="" <?php if(@$selectedanswer && ($selectedanswer == $avalue['id'])){?> checked="checked" <?php }?> type="radio" name="job_question[<?php echo $qvalue['id'];?>]" value="<?php echo $avalue['id'];?>" id="">
			                                                                        <?php echo $avalue['answer'];?>
			                                                                    </label>
			                                                                </div> 

		                                                    <?php   
		                                                    			}
		                                                            }
		                                                        }
		                                                    ?>
		                                                </div>
		                                            </div>    
		                                <?php   
		                                        }     
		                                    }
		                                ?>
										</div>									
										
									</div>
									<!-- <footer class="card-footer">
										<div class="row justify-content-end">
											<div class="col-sm-9">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer> -->
								</section>
								<input type="hidden" name="customer_id" value="<?php echo $job['customer_id'];?>">
								<input type="hidden" name="category_id" value="<?php echo $job['category_id'];?>">
								<input type="hidden" name="job_id" value="<?php echo $job['id'];?>">
							</form>
						</div>
						
						

							
					</div>
					
					<div class="row status-3 status">
						<div class="col-sm-6 offset-sm-3 text-center">
							<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning updateJob">Update Job</button>
						</div>
					</div>
					
					
					<div id="map"></div>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<?php
			include('includes/js.php');
		?>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-validation/jquery.validate.js"></script>
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/fuelux/js/spinner.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/core.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/searchAddress.js"></script>

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOB9VUHID5_exudRHHduRUvCYOu--Lg0w&libraries=places&callback=initAutocomplete" async defer></script>

		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.validation.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('.updateJob').on('click',function(){
					var getAvailableAPI = API_LOCATION+'job/update.php';
					var form_data = $("#jobform").serialize();
					//alert(form_data);
					//return false;
					$.ajax({
			            type: "POST",
			            url: getAvailableAPI,
			            dataType: "JSON",
			            data: $("#jobform").serialize(),
			            success: function(data)
			            {
			                alert(data.message);
			                location.reload(); 
			            }
			        });

			        return false
				});

			});
		</script>
	</body>
</html>
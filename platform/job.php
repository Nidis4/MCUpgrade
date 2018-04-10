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
				$job = file_get_contents($api_url.'webservices/api/job/read_one.php?id='.$id);
				$job = json_decode($job, true); // decode the JSON into an associative array



				// if(@$job['category_id']){
				// 	$applications = file_get_contents($api_url.'webservices/api/application/readByCategory.php?cat_id='.$job['category_id']);
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
									<div class="card-body ">
										<div class="col-lg-6">
											<div class="form-group row ">
												<label class="col-sm-3 control-label text-sm-right pt-2">Job Title <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="title" id="title" class="form-control" value="<?php echo $job['title'];?>" required/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">Job Description <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="description" id="description" class="form-control" value="<?php //echo $job['description'];?>"/>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 control-label text-sm-right pt-2">How much is your maximum budget, for the whole job? <span class="required">*</span></label>
												<div class="col-sm-9">
													<input type="text" name="budget" id="budget" class="form-control" value="<?php echo $job['budget'];?>"/>
												</div>
											</div>
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
				
				$("#county").on('change',function(){
					var cnt = $(this).val();
					if($('#buildingmtwo').length){
						ElectricalCertificateCountyBudget();
					} 
				});
				$("#category").on('change',function(){
					 $(".smbutton button").removeAttr('disabled');
				});

				$(".sameadd").on('click',function(){
					var pres = $("#samecatebud").val();
					if(pres == 1){
						$('.sameremove').css('display','block');
					}
					$('#samecatebud').val(parseInt(pres) + 1);
					update_budget();
					update_comment();
				});

				$('.sameremove').on('click',function(){
					var pres = $("#samecatebud").val();
					if(pres >= 2){
						$('#samecatebud').val(parseInt(pres) - 1);
						if(pres == 2){
							$('.sameremove').css('display','none');	
						}
						
					}
				    update_budget();
				    update_comment();	
				});

			});
		</script>
	</body>
</html>
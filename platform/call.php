<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Call</title>
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
				    $url = $home_url."platform/appointments.php";
				    echo $url;
				    header("Location: ".$url);
					die();
				}

				include('header.php');
				$call = file_get_contents($api_url.'call/read_one.php?id='.$id);
				$call = json_decode($call, true); // decode the JSON into an associative array

			?>
			<div class="inner-wrapper">				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body card-margin">
					<header class="page-header">
						<h2>Edit Call</h2>					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Call</span></li>
								<li><span>New</span></li>
							</ol>					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<!-- col-lg-6 -->
						<div class="col-lg-12">
							<form id="form" action="forms-validation.html" class="form-horizontal">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>

										<h2 class="card-title">Call Details</h2>
										<p class="card-subtitle">
											Please fill in the call details
										</p>
									</header>
									<div class="card-body">
										<input type="hidden" name="callid" id="CallId" value="<?php echo $call['id'];?>">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Status </label>
											<div class="col-sm-6">
												<input type="text" name="status" class="form-control" value="<?php echo $call['call_status'];?>" disabled required />
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Date </label>
											<div class="col-sm-6">
												<input type="text" name="date" id="date" class="form-control" value="<?php echo $call['date'];?>" required disabled/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Duration </label>
											<div class="col-sm-6">
												<input type="text" name="duration" id="duration" class="form-control" value="<?php echo $call['duration'];?>" required disabled/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Agent </label>
											<div class="col-sm-6">
												<input type="text" name="agent" id="agent" agentUser="<?php echo $_SESSION['id'];?>" class="form-control" value="<?php echo $_SESSION['fullname'];?>" required disabled/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Customer / Proffessionl </label>
											<div class="col-sm-6">
												<input type="text" name="about" id="about" class="form-control" placeholder="About" required value="<?php echo $call['about'];?>" disabled />
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Customer surname </label>
											<div class="col-sm-6">
												<input type="text" name="CustomerSurname" id="CustomerSurname" class="form-control" placeholder="eg.: John" required value="<?php echo $call['surname'];?>" disabled/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Comments</label>
											<div class="col-sm-6">												
												<textarea name="comment" id="commentcall" class="form-control"><?php echo $call['comment'];?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Rconrding file</label>
											<div class="col-sm-6">												
												<audio controls>
												  <source src="<?=$call['rconrding']; ?>" type="audio/mp3">
												  <source src="<?=$call['rconrding']; ?>" type="audio/ogg">
												  <a title="Call Rconrding" href="<?=$call['rconrding']; ?>">Call Recording</a>
												</audio>
											</div>
										</div>
										<div class="col-sm-6 offset-sm-3 text-center">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning createCall">Save Call</button>
										</div>
										
									</div>
								</section>
							</form>
						</div>
					</div>
			<div
					<!-- end: page -->
				</section>
			</div>

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
<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Editable Tables | Porto Admin - Responsive HTML5 Template 2.0.0</title>
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
		<link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap4.css" />
		<link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery/jquery.js"></script>

	</head>
	<body>
		<section class="body">

			<?php
				include('header.php');
			
				$days = file_get_contents($api_url.'days/read_paging.php');
				$daysPag = json_decode($days, true); // decode the JSON into an associative array	

				
			 	$mon = explode('-', $daysPag['records'][1]['working_hours']);
			 	$tue = explode('-', $daysPag['records'][2]['working_hours']);
			 	$wed = explode('-', $daysPag['records'][3]['working_hours']);
			 	$thu = explode('-', $daysPag['records'][4]['working_hours']);
			 	$fri = explode('-', $daysPag['records'][5]['working_hours']);
			 	$sat = explode('-', $daysPag['records'][6]['working_hours']);
				
							
			?>

			<div class="inner-wrapper">
				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Editable Tables</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Home</span></li>
								<li><span>SUBCATEGORIES</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Week Days</h2>
							</header>
							
								<div class="card-body" id='custSearch'>
									<form id="updateworkinghours">
									<div class="col-lg-6" style="float: left;">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Monday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="monStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $mon[0];?>">
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="monEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $mon[1];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Wednesday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="wedStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $wed[0];?>">
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="wedEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $wed[1];?>">
													</div>
												</div>
											</div>
										</div><div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Friday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="friStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $fri[0];?>">
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="friEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $fri[1];?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6" style="float: left;">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Tuesday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="tueStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $tue[0];?>">
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="tueEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $tue[1];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Thursday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text"  name="thuStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $thu[0];?>"> 
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="thuEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $thu[1];?>">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Saturday</label>
											<div class="col-sm-9">
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="satStart" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $sat[0];?>">
													</div>
												</div>
												<div class="col-lg-6" style="float: left;">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input type="text" name="satEnd" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $sat[1];?>">
													</div>
												</div>
											</div>
										</div>
									</div><!-- Col lg-6 -->
									<div class="col-sm-4 offset-sm-4 text-center">
										<button type="button" class="mb-1 mt-4 mr-1 btn btn-warning" id="updateWeek">Update</button>
									</div>
									</form>
							</div>
						</section>
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

		<div id="dialog" class="modal-block mfp-hide">
			<section class="card">
				<header class="card-header">
					<h2 class="card-title">Are you sure?</h2>
				</header>
				<div class="card-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>
				</div>
				<footer class="card-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
							<button id="dialogCancel" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

		<!-- Vendor -->
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/core.js"></script>
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.datatables.editable.js"></script>
		<script src="js/examples/examples.advanced.form.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#updateWeek").on('click', function(){
					var getAvailableAPI = API_LOCATION+'days/update.php';
					var form_data = $("#updateworkinghours").serialize();

					$.ajax({
			            type: "POST",
			            url: getAvailableAPI,
			            dataType: "JSON",
		                data: form_data,
			            success: function(data)
			            {
			                alert(data.message);
			                //location.reload(); 
			            }
			        });
					return false;
				});
			});
		</script>


		<?php include('reject_popup.php');?>
	</body>
</html>
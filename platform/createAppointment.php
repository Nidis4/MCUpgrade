<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed">
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
				include('header.php');
			?>
			<div class="inner-wrapper">
				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body card-margin">
					<header class="page-header">
						<h2>Create New Appointment</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Appointment</span></li>
								<li><span>New</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<!-- col-lg-6 -->
						<div class="col-lg-6">
							<form id="form" action="forms-validation.html" class="form-horizontal">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>

										<h2 class="card-title">Appointment Details</h2>
										<p class="card-subtitle">
											Please fill in the appointment details
										</p>
									</header>
									<div class="card-body">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Status <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="status" class="form-control" value="New" disabled required/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Agent <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="agent" class="form-control" value="<?php echo $_SESSION['fullname'] ?>" required disabled/>
											</div>
										</div>
										<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Category</label>
												<div class="col-lg-9">
													<?php
														$categories = file_get_contents($api_url.'webservices/api/category/read.php');
														$categories = json_decode($categories, true); // decode the JSON into an associative array
													?>
													<select data-plugin-selectTwo class="form-control populate" id="category">
														<?php
															foreach ($categories as $category) {
																$cat_id = $category['id'];
																$cat_name = $category['title_greek'];
																echo '<option value="'.$cat_id.'">'.$cat_name.'</option>';
															}
														?>
													</select>
												</div>
										</div>
										<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Applications</label>
												<div class="col-lg-9">
													<select data-plugin-selectTwo class="form-control populate" id="applications" disabled>
													</select>
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">County <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php
													$counties = file_get_contents($api_url.'webservices/api/county/read.php');
													$counties = json_decode($counties, true); // decode the JSON into an associative array
												?>
												<select data-plugin-selectTwo class="form-control populate" id="county">
														<?php
															foreach ($counties as $counties) {
																$county_id = $counties['id'];
																$county_name = $counties['county_name_gr'];
																echo '<option value="'.$county_id.'">'.$county_name.'</option>';
															}
														?>
													</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Budget <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="budget" class="form-control" placeholder="eg.: John" required/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Commision <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="commision" class="form-control" placeholder="eg.: John" required/>
											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row justify-content-end">
											<div class="col-sm-9">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						<div class="col-lg-6">
							<form id="form" action="forms-validation.html" class="form-horizontal">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>

										<h2 class="card-title">Customer Information</h2>
										<p class="card-subtitle">
											Please fill in the customer information correctly
										</p>
									</header>
									<div class="card-body">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Surname <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="surname" id="surname" class="form-control" placeholder="eg.: Doe" required/>
											</div>
										</div>
										<div class="row col-sm-9 offset-sm-3" id='suggestions'>
											
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Firstname <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="firstname" id="firstname" class="form-control" placeholder="eg.: John" required/>
											</div>
										</div>
										<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Sex</label>
												<div class="col-lg-6">
													<select data-plugin-selectTwo class="form-control populate">
															<option value="CT">MR</option>
															<option value="DE">MRS</option>
													</select>
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Address <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="address" id="address" class="form-control" placeholder="eg.: Gonata 7, 152 12, Athens" required/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Mobile <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="tel" name="mobile" id="mobile" class="form-control" placeholder="eg.: 6971231231" required/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Landline <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="tel" name="landline" id="phone" class="form-control" placeholder="eg.: 2106412123" required/>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Email <span class="required">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" name="email" id="email" class="form-control" placeholder="eg.: email@email.com" required/>
												</div>
											</div>
											<div class="col-sm-9">

											</div>
										</div>
									</div>
									<footer class="card-footer">
										<div class="row justify-content-end">
											<div class="col-sm-9">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
					</div>
			
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
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/core.js"></script>
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.validation.js"></script>
	</body>
</html>
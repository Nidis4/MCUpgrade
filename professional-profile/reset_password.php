<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../vendor/animate/animate.css">

		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

		<!-- Skin CSS -->
		<!--<link rel="stylesheet" href="css/skins/default.css" />-->
		<link rel="stylesheet" href="css/skins/myconstructor.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="../vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<?php include('../constants.php'); ?>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="img/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i>Reset Password</h2>
					</div>
					<div class="card-body">
						<form id="resetForm">
							<div class="form-group mb-3">
								<label>Enter Password</label>
								<div class="input-group input-group-icon">
									<input name="password" type="password"  class="form-control form-control-lg" id='password' />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-3">
								<label>Confirm Password</label>
								<div class="input-group input-group-icon">
									<input name="cpassword" type="password"  class="form-control form-control-lg" id='cpassword' />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>							

							<div class="row">
								<input type="hidden" name="key" id="resetkey" value="<?php echo $_GET['key'];?>">
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary mt-2">Reset Password</button>
								</div>
							</div>

							

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="../vendor/jquery/jquery.js"></script>
		<script src="../vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../vendor/popper/umd/popper.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../vendor/common/common.js"></script>
		<script src="../vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="../vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Theme Custom -->
		<script src="../js/core.js"></script>
		<script src="js/professional-profile.js"></script>

		<?php
			if(@$_GET['key']){

			}else{
		?>
				<script type="text/javascript">
					window.location = "<?php echo SITE_URL.'professional-profile/login.html';?>";
				</script>
		<?php
			}
		?>

	</body>
</html>
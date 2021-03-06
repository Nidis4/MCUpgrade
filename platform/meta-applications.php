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
				//echo $api_url.'webservices/api/appointment/read_paging.php';			
			?>

			<div class="inner-wrapper">
				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Applications</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tools</span></li>
								<li><span>Applications</span></li>
							</ol>					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						
						<div class="col">
							<h4>Edit Applications Search Areas</h4>

							<div class="accordion" id="accordion">
								<?php
									$applications = file_get_contents($api_url.'application/read.php');
									$applicationsPag = json_decode($applications, true); // decode the JSON into an associative array

									foreach ($applicationsPag['records'] as $field => $value) {
										$id = $applicationsPag['records'][$field]['id'];
										$title_greek = $applicationsPag['records'][$field]['title_greek'];
										$category_description = $applicationsPag['records'][$field]['category_description'];
										$tags = $applicationsPag['records'][$field]['tags'];
										$title = $applicationsPag['records'][$field]['meta_title'];
										$description = $applicationsPag['records'][$field]['meta_description'];
										$robots = $applicationsPag['records'][$field]['meta_robots'];
										$permalink = $applicationsPag['records'][$field]['permalink'];

										//echo $title_greek;
										echo "
										<div class='card card-default'>
											<div class='card-header'>
												<h4 class='card-title m-0'>
													<a class='accordion-toggle collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse1".$id."' aria-expanded='false'>
														 $title_greek
													</a>
												</h4>
											</div>
											<div id='collapse1".$id."' class='collapse' style=''>
												<div class='card-body'>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Meta Title <span class='required'>*</span></label>
														<div class='col-sm-9'>
															<input type='text' name='meta_title' id='meta_title".$id."' class='form-control' placeholder='eg.: John' required value='".$title."' />
														</div>
													</div>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Meta Description <span class='required'>*</span></label>
														<div class='col-sm-9'>
															<input type='text' name='meta_description' id='meta_description".$id."' class='form-control' placeholder='eg.: John' required value='".$description."' />
														</div>
													</div>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Meta Robots <span class='required'>*</span></label>
														<div class='col-sm-9'>
															<input type='text' name='meta_robots' id='meta_robots".$id."' class='form-control' placeholder='eg.: John' required value='".$robots."' />
														</div>
													</div>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Permalink <span class='required'>*</span></label>
														<div class='col-sm-9'>
															<input type='text' name='permalink' id='permalink".$id."' class='form-control' placeholder='eg.: John' required value='".$permalink."' />
														</div>
													</div>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Περιγραφή Σε Κατηγορία<span class='required'>*</span></label>
														<div class='col-sm-9'>
															<textarea id='category_description".$id."' rows='4' cols='100'>$category_description</textarea>
														</div>
													</div>
													<div class='form-group row'>
														<label class='col-sm-3 control-label text-sm-right pt-2'>Search Terms <span class='required'>*</span></label>
														<div class='col-sm-9'>
															<textarea id='textarea".$id."' rows='4' cols='100'>$tags</textarea>
														</div>
													</div>
													<p><button type='button' class='mb-1 mt-4 mr-1 btn btn-warning updateTag' id='updateTag".$id."'>Update</button></p>
												</div>
											</div>
										</div>
										";
									}	
								?>


							</div>
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
		<script src="js/examples/examples.modals.js"></script>
		<?php include('reject_popup.php');?>
	</body>
</html>
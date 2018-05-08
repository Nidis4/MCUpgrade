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
				
				if (isset($_GET['id'])) {
				    $id = $_GET['id'];
				    $help = file_get_contents($api_url.'help/read_one.php?id='.$id);
					$helpdata = json_decode($help, true); // decode the JSON into an associative array

				}
				include('header.php');

				
				$appointments = file_get_contents($api_url.'appointment/read_paging.php?cust_id='.$id);
				$appointmentsPag = json_decode($appointments, true); // decode the JSON into an associative array			
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
								<li><span>Customers</span></li>
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
						
								<h2 class="card-title">Help Information </h2>
							</header>
							<form action="#" method="POST" id="updateHelpform">
								<div class="card-body col-sm-12 col-md-12 row" style="margin-left: 0px;">
									<div class="col-sm-12 col-md-6"><!-- Left-->
										<div class="form-group row" >
											<label class="col-lg-4 control-label text-lg-right pt-2">Category</label>
												<div class="col-lg-8">
													<?php
														$categories = file_get_contents($api_url.'category/read.php');
														$categories = json_decode($categories, true); // decode the JSON into an associative array
													?>
													<select data-plugin-selectTwo class="form-control populate" name="category_id" id="category">
														<?php
															foreach ($categories as $category) {
																$cat_id = $category['id'];
																$cat_name = $category['title_greek'];
																$commision = $category['commissionRate'];

																$selected = "";
																if(@$helpdata['category_id'] && ($cat_id == $helpdata['category_id'])){
																	$selected = 'selected = "selected"';
																}

																echo '<option value="'.$cat_id.'" '.$selected.' comm="'.$commision.'">'.$cat_name.'</option>';
															}
														?>
													</select>
												</div>
											
										</div>										
									</div>
									<div class="col-sm-12 col-md-6"><!-- Right-->
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Sub Category Name <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="help_name" class="form-control" value="<?php if(@$helpdata['name']){ echo $helpdata['name'];}?>" required />
											</div>										
										</div>
									</div>
									<div class="col-sm-12 col-md-12 pt-2">
										<div class="form-group row">
											<label class="col-sm-2 control-label text-sm-right pt-2">Help <span class="required">*</span></label>
											<div class="col-sm-10">
												<textarea class="form-control" rows="8" name="help_text"><?php if(@$helpdata['help']){ echo $helpdata['help'];}?></textarea>
											</div>										
										</div>
										<div class="col-sm-3 offset-md-5">
											<?php if(isset($_GET['id'])){?>
												<input type="hidden" value="<?php echo $helpdata['id']; ?>" name="help_id" id="help_id">
											<?php }?>
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning" id="updatecustomer">Update Details</button>
										</div>
									</div>
								</div>
							</form>
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
		
		<!-- Specific Page Vendor -->
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/core.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/searchAddress.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOB9VUHID5_exudRHHduRUvCYOu--Lg0w&libraries=places&callback=initAutocomplete" async defer></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Page JS-->
		<script type="text/javascript">
			$(document).ready(function(){
				$("#updatecustomer").on('click',function(){


					var form_data = $("#updateHelpform").serialize();			
					
					var getAvailableAPI = API_LOCATION +'help/save.php';
					
					$.ajax({
			            type: "POST",
			            url: getAvailableAPI,
			            dataType: "JSON",
		                data: form_data,
			            success: function(data)
			            {
			                alert(data.message);
			                location.reload(); 
			            }
			        });


					return false;
				});
			});
		</script>

		<!-- Examples -->
		<script src="js/examples/examples.datatables.editable.js"></script>
	</body>
</html>
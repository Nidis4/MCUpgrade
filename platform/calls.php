<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Calls</title>
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
				$calls = file_get_contents($api_url.'call/read_paging.php');
				$callsPag = json_decode($calls, true); // decode the JSON into an associative array				
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
								<li><span>Tables</span></li>
								<li><span>Editable</span></li>
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
						
								<h2 class="card-title">List of Calls</h2>
							</header>
							<div class="card-body">
								
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Submission Date</th>
											<th>Mobile</th>
											<th>Caller name</th>
											<th>Duration</th>
											<th>About</th>
											<th width="430px">Comments</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($callsPag['records'] as $field => $value) {
											$id = $callsPag['records'][$field]['id'];
											$cust_or_prof_id = $callsPag['records'][$field]['cust_or_prof_id'];
											$about = $callsPag['records'][$field]['about'];
											$mobile = $callsPag['records'][$field]['mobile'];
											$name = $callsPag['records'][$field]['name'];
											$surname = $callsPag['records'][$field]['surname'];
											$CallerName = $name.' '.$surname;
											$duration = $callsPag['records'][$field]['duration'];
											$status = $callsPag['records'][$field]['status'];
											$comment = $callsPag['records'][$field]['comment'];
											$datetimeCreated = $callsPag['records'][$field]['datetimeCreated'];
											if($about =='Proffesional' && $cust_or_prof_id !='0'){
												$OpenProfile = "<a href=professional.php?id=$cust_or_prof_id>$CallerName</a>";
											}
											else if($about =='Customer' && $cust_or_prof_id !='0'){
												$OpenProfile = "<a href=customer.php?id=$cust_or_prof_id>$CallerName</a>";
											}
											else{
												$OpenProfile = $CallerName;
											}
											echo '<tr data-item-id="'.$id.'" class="status-'.$status.'">
													  <td>'.$datetimeCreated.'</td>
													  <td>'.$mobile.'</td>
													  <td>'.$OpenProfile.'</td>
													  <td>'.$duration.'</td>
													  <td>'.$about.'</td>
													  <td>'.$comment.'</td>
													  <td class="actions">
														<a href="call.php?id='.$id.'" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													  </td>';
										}
										?>										
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

		</section>

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
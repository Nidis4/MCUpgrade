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
				$appointments = file_get_contents($api_url.'appointment/read_paging.php?agent_id='.$_SESSION['id']);
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
						
								<h2 class="card-title">List of Appointments</h2>
							</header>
							<div class="card-body">
								<!-- <div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<a href='createAppointment.php'><button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
										</div>
									</div>
								</div> -->
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Submission Date</th>
											<th>Professional</th>
											<th>Customer</th>
											<th>Date</th>
											<th width="440px">Comments</th>
											<th>Budget</th>
											<th>Commision</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($appointmentsPag['records'] as $field => $value) {

											$id = $appointmentsPag['records'][$field]['id'];
											$submission_date = $appointmentsPag['records'][$field]['datetimeCreated'];
											$prof_id = $appointmentsPag['records'][$field]['prof_member_id'];
											$prof_name = $appointmentsPag['records'][$field]['prof_member_name'];
											$cust_id = $appointmentsPag['records'][$field]['cust_member_id'];
											$cust_name = $appointmentsPag['records'][$field]['cust_member_name'];
											$date = $appointmentsPag['records'][$field]['date']." ".$appointmentsPag['records'][$field]['time'];
											$budget = $appointmentsPag['records'][$field]['budget'];
											$commission = $appointmentsPag['records'][$field]['commision'];
											$status = $appointmentsPag['records'][$field]['status'];
											$comment = $appointmentsPag['records'][$field]['comment'];

											echo '<tr data-item-id="'.$id.'" class="status-'.$status.'">
													  <td>'.$submission_date.'</td>
													  <td><a href="professional.php?id='.$prof_id.'">'.$prof_name.'</a></td>
													  <td><a href="customer.php?id='.$cust_id.'">'.$cust_name.'</a></td>
													  <td>'.$date.'</td>
													  <td>'.$comment.'</td>
													  <td>'.$budget.'</td>
													  <td>'.$commission.'</td>
													  <td class="actions">
														<a href="#" class="on-editing copy-row"><i class="fa fa-copy"></i></a>
														<a href="appointment.php?id='.$id.'" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
														<a href="#" class="hidden on-default remove-row"><i class="fa fa-trash-o"></i></a>
														<a href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a>
														<a href="#reviewsubmit'.$id.'" class="on-default edit-row modal-with-form"><i class="fa fa-star"></i></a>
													  </td>
												  </tr>';
											?>
											<!-- Modal Form -->
											
											
											<?php
										}
										?>										
									</tbody>
								</table>
								<?php
										foreach ($appointmentsPag['records'] as $field => $value) {
											$id = $appointmentsPag['records'][$field]['id'];
								?>
											<div id="reviewsubmit<?php echo $id;?>" class="modal-block modal-block-primary mfp-hide">
												<section class="card">
													<header class="card-header">
														<h2 class="card-title">Add Review</h2>
													</header>
													<div class="card-body">
														<form id="formreviewdata<?php echo $id;?>" method="POST">
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Quality</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="quality" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="quality" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="quality" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="quality" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="quality" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Reliability</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="reliability" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="reliability" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="reliability" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="reliability" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="reliability" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Cost</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cost" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cost" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cost" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cost" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cost" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Schedule</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="schedule" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="schedule" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="schedule" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="schedule" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="schedule" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Behaviour</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="behaviour" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="behaviour" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="behaviour" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="behaviour" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="behaviour" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Cleanliness</label></div>
																<div class="col-md-9" style="float: left;">
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cleanliness" value="1" required="" type="radio">
																		<label for="awesome">1</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cleanliness" value="2" required="" type="radio">
																		<label for="awesome">2</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cleanliness" value="3" required="" type="radio">
																		<label for="awesome">3</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cleanliness" value="4" required="" type="radio">
																		<label for="awesome">4</label>
																	</div>
																	<div class="radio-custom radio-primary col-md-2" style="float: left;">
																		<input id="" name="cleanliness" value="5" required="" type="radio">
																		<label for="awesome">5</label>
																	</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<div class="col-md-3" style="float: left;"><label for="">Comment</label></div>
																<div class="col-md-7" style="float: left;">
																	<textarea class="form-control" name="comment"></textarea>
																</div>

															</div>
															<input type="hidden" name="professional_id" value="<?php echo $appointmentsPag['records'][$field]['prof_member_id'];?>">
															<input type="hidden" name="customer_id" value="<?php echo $appointmentsPag['records'][$field]['cust_member_id'];?>">
															<input type="hidden" name="category_id" value="<?php echo $appointmentsPag['records'][$field]['category_id'];?>">
															<input type="hidden" name="appointment_id" value="<?php echo $appointmentsPag['records'][$field]['id'];?>">
															<input type="hidden" name="agent_id" value="<?php echo $_SESSION['id'];?>">
														</form>
													</div>
													<footer class="card-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<button class="btn btn-primary" rel="<?php echo $id;?>" id="submitreviewadd<?php echo $id;?>">Submit</button>
																<button class="btn btn-default modal-dismiss">Cancel</button>
															</div>
														</div>
													</footer>
												</section>
												<script type="text/javascript">
													$(document).ready(function () {															
														$("#submitreviewadd<?php echo $id;?>").on('click',function(){
															
															var did = $(this).attr('rel');
															var saveReviewApi = API_LOCATION+'review/save.php';
															$.ajax({
															            type: "POST",
															            url: saveReviewApi,
															            data: $("#formreviewdata"+did).serialize(),
															            dataType: "json",
															            success: function(data)
															            {
															            	alert(data.message);
															            	location.reload();
															            }

															        });
															//location.reload();
															return false;
														});

													});
												</script>
											</div>
								<?php
										}

								?>
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
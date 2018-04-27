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
				if(@$_GET['rejected']){
					$appointments = file_get_contents($api_url.'appointment/read_rejected_paging.php');
				}else{
					$appointments = file_get_contents($api_url.'appointment/read_paging.php');
				}
				$appointmentsPag = json_decode($appointments, true); // decode the JSON into an associative array	
				//echo $api_url.'webservices/api/appointment/read_paging.php';			
			?>

			<?php 
				$date = date("Y-m-d");
				
				if(@$_GET['comdate']){
					$date = $_GET['comdate'];
				}

				$commissions = file_get_contents($api_url.'appointment/commission.php?date='.$date);
				$comision = json_decode($commissions, true); // decode the JSON into an associative array

				if(@$comision['commision']){
					$com = $comision['commision'];
				}else{
					$com = "0";
				}
				
				


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
								<div class="row">
									<div class="col-sm-4">
										<div class="mb-3">
											<a href='createAppointment.php'><button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button></a>
										</div>
									</div>
									<div class="col-sm-8" >
										<form action="" method="get">
											<div class="row">
												<div class="col-sm-4">
													<div class="input-group date" data-provide="datepicker">
													    <input type="text" name="comdate" class="form-control" value="<?php echo $date;?>" placeholder='Date'>
													    <div class="input-group-addon">
													        <i class="fa fa-calendar"></i>
													    </div>
													</div>
												</div>
												<div class="col-sm-3">
													<input type="text" class="form-control" readonly="" value="<?php echo $com;?>" placeholder="Commission">
													
												</div>
												<div class="col-sm-2">
													<input type="submit" name="comsubmit" class="btn btn-primary" value="Load">
												</div>
												<div class="col-sm-3">
													<?php
														$api_url.'appointment/reject_count.php';
														$rejectedappointments = file_get_contents($api_url.'appointment/reject_count.php');
														$rejectedappointmentstotal = json_decode($rejectedappointments, true);
													?>
													<a href="<?php echo SITE_URL;?>platform/appointments.php?rejected=1" style="color: red"><?php echo $rejectedappointmentstotal['total'];?> Rejected</a>
												</div>
											</div>
										</form>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>ST</th>
											<th>Submission Date</th>
											<th>Professional</th>
											<th>Customer</th>
											<th>Date</th>
											<th width="470px">Comments</th>
											<th>Budget</th>
											<th>Comm</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if(@$appointmentsPag['records']){
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
											$viewed = $appointmentsPag['records'][$field]['viewed'];
											$viewed_datetime = $appointmentsPag['records'][$field]['viewed_datetime'];
											if ($status==0){
												$statusLabel = "CN";
											
											}
											else if($status == 1){
												$statusLabel = "AP";
											}
											else if($status == 2){
												$statusLabel = "AP";
											}
											else if($status==3){
												$statusLabel = "OF";
											}
											else if($status==4){
												$statusLabel = "AO";
											}
											else if($status==5){
												$statusLabel = "JC";
											}
											else if($status==6){
												$statusLabel = "RE";
											}
											else if($status==7){
												$statusLabel = "AO";
											}
											else if($status==8){
												$statusLabel = "CL";
											}
											else{
												$statusLabel = "";
											}
											$comment = $appointmentsPag['records'][$field]['comment'];

											echo '<tr data-item-id="'.$id.'" class="status-'.$status.'">
													  <td class="status-field">'.$statusLabel.'</td>
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
														<a href="#cancelmodalForm'.$id.'" class="on-editing modal-with-form cancel-row"><i class="fa fa-times"></i></a>
													  </td>';
											if($status == 0){
												$cancelreason = "";
												if($appointmentsPag['records'][$field]['cancelReason'] == 1){
													$cancelreason = "Customer Cancel";
												}elseif($appointmentsPag['records'][$field]['cancelReason'] == 2){
													$cancelreason = "Professional Couldn't";
												}elseif ($appointmentsPag['records'][$field]['cancelReason'] == 3) {
													$cancelreason = "Mistake";
												}

												echo "<tr><td colspan='7'>Cancelled on: ".date("d/m/Y H:i:s",strtotime($appointmentsPag['records'][$field]['datetimeStatusUpdated']))." by Agent : ".$_SESSION['fullname'].", Type : ".$cancelreason.", Comments : ".$appointmentsPag['records'][$field]['cancelComment']."</td></tr>";
											}
											if($viewed == "Viewed"){
												$ViewedDateTime=date_create($viewed_datetime);
												$V_p_date =  date_format($ViewedDateTime,"H:i d/m");
												echo "<tr><td colspan='7' style='color: green;'>Viewed ".$V_p_date."</td></tr>";
											}
											else{
												echo "<tr><td colspan='7'>Not Viewed</td></tr>";
											}
											echo 	  '</tr>';
										?>
										<!-- Modal Form for Cancel Appointment -->
										<div id="cancelmodalForm<?php echo $id;?>" class="modal-block modal-block-primary mfp-hide">
											<section class="card">
												<header class="card-header">
													<h2 class="card-title">Submit Reason for Cancel</h2>
												</header>
												<div class="card-body">
													<form id="addcancelform<?php echo $id;?>" method="POST">															
														<div class="form-group">
															<label for="inputAddress">Select Option</label>
															<select class="form-control" name="cancelReason" >
																<option value="1">Customer Cancel</option>
																<option value="2">Professional Couldn't</option>
																<option value="3">Mistake</option>
															</select>
														</div>
														<div class="form-row">
															<label for="inputCity">Comment</label>
															<textarea class="form-control" name="cancelComment"></textarea>
														</div>
													</form>
												</div>
												<footer class="card-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button class="btn btn-primary" id="submitpaymentadd<?php echo $id;?>">Submit</button>
															<button class="btn btn-default modal-dismiss">Cancel</button>
														</div>
													</div>
												</footer>
												<script type="text/javascript">
													$(document).ready(function(){															
														
														$("#submitpaymentadd<?php echo $id;?>").on('click',function(){
															
															var error = 0;
															var message = "";
															if(error == 1){
																alert(message);
															}else{
																var savePaymentApi = API_LOCATION+"appointment/cancel.php?id=<?php echo $id;?>";
																$.ajax({
																            type: "POST",
																            url: savePaymentApi,
																            data: $("#addcancelform<?php echo $id;?>").serialize(),
																            dataType: "json",
																            success: function(data)
																            {	
																            	if(data.ResultCode == 1){
																            		alert("Appointment cancelled successfully.");
																            		location.reload();
																            	}else{
																            		alert("Something worng!");
																            	}
																            	
																            }
																        });
																//location.reload();
															}
															return false;
														});
													});
												</script>
											</section>
										</div>
										<?php
										}
										}else{
									?>
											<tr><td  colspan="9">No Record found</td></tr>
									<?php		
										}

										?>										
									</tbody>
								</table>
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
		<script type="text/javascript">
			$(document).ready(function(){
				var memberid = '111';
				$.ajax({
					type: "GET",     
					url: API_LOCATION + 'app/notification.php',
					data: 'memberid='+memberid,
					success: function (data) {
					},
					error: function(e) {
					}
				});
			});
		</script>
	</body>
</html>
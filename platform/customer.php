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
				} else {
				    // Fallback behaviour goes here
				    $url = $home_url."platform/customers.php";
				    echo $url;
				    header("Location: ".$url);
					die();
				}
				include('header.php');

				$customer = file_get_contents($api_url.'customer/read_one.php?id='.$id);
				$customer = json_decode($customer, true); // decode the JSON into an associative array	

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
						
								<h2 class="card-title">Customer Information #<?php echo $customer['id']; ?></h2>
							</header>
							<form action="#" method="POST" id="updateCustomerform">
								<div class="card-body col-sm-12 col-md-12 row">
									<div class="col-sm-12 col-md-6"><!-- Left-->
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Name <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $customer['first_name']; ?>" required />
											</div>
											
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Surname <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $customer['last_name']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Sex <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="sex" id="sex" class="form-control" value="<?php echo $customer['sex']; ?>" required />
											</div>										
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">E-mail <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="email" id="email" class="form-control" value="<?php echo $customer['email']; ?>" required />
											</div>										
										</div>
									</div>
									<div class="col-sm-12 col-md-6"><!-- Right-->
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Address <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="address" id="pac-input-address" class="form-control" value="<?php echo $customer['address']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Mobile <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $customer['mobile']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Landline <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $customer['phone']; ?>" required />
											</div>										
										</div>
										
										
									</div>
									<div class="col-sm-12 col-md-12 pt-2">
										<div class="col-sm-3 offset-md-5">
											<input type="hidden" value="<?php echo $customer['id']; ?>" name="customer_id" id="customer_id">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning" id="updatecustomer">Update Details</button>
										</div>
									</div>
								</div>
							</form>
						</section>

						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Customer's Appointments</h2>
							</header>
							<div class="card-body">
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Submission Date</th>
											<th>Professional</th>
											<th>Customer</th>
											<th>Date</th>
											<th width="460px">Comments</th>
											<th>Budget</th>
											<th>Commision</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($appointmentsPag['records'])) {
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
														<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
														<a href="#" class="hidden on-default remove-row"><i class="fa fa-trash-o"></i></a>
														<a href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a>
													  </td>
												  </tr>';
											}
										}
										else{
											echo "<td colspan='8'>No Appointments</td>";
										}
										
										?>										
									</tbody>
								</table>
							</div>
						</section>
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Customer's Offers</h2>
							</header>
							<?php 
								$offers = file_get_contents($api_url.'appointment/read_paging_offers.php?cust_id='.$id);
								$offersPag = json_decode($offers, true); // decode the JSON into an associative array	
							?>

							<div class="card-body">
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Submission Date</th>
											<th>Professional</th>
											<th>Customer</th>
											<th>Date</th>
											<th width="460px">Comments</th>
											<th>Budget</th>
											<th>Commision</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($offersPag['records'])) {
											foreach ($offersPag['records'] as $field => $value) {
											$id = $offersPag['records'][$field]['id'];
											$submission_date = $offersPag['records'][$field]['datetimeCreated'];
											$prof_id = $offersPag['records'][$field]['prof_member_id'];
											$prof_name = $offersPag['records'][$field]['prof_member_name'];
											$cust_id = $offersPag['records'][$field]['cust_member_id'];
											$cust_name = $offersPag['records'][$field]['cust_member_name'];
											$date = $offersPag['records'][$field]['date']." ".$offersPag['records'][$field]['time'];
											$budget = $offersPag['records'][$field]['budget'];
											$commission = $offersPag['records'][$field]['commision'];
											$status = $offersPag['records'][$field]['status'];
											$comment = $offersPag['records'][$field]['comment'];

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
														<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
														<a href="#" class="hidden on-default remove-row"><i class="fa fa-trash-o"></i></a>
														<a href="#" class="on-editing cancel-row"><i class="fa fa-times"></i></a>
													  </td>
												  </tr>';
											}
										}
										else{
											echo "<td colspan='8'>No offers</td>";
										}
										
										?>										
									</tbody>
								</table>
							</div>
						</section>
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Customer's Calls</h2>
							</header>
							<div class="card-body">
								
							</div>
						</section>

						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
								<?php
									$invoicesettingsd = file_get_contents($api_url.'customer/getInvoiceSettings.php?id='.$_GET['id']);
									$invoicesettingsPag = json_decode($invoicesettingsd, true); // decode the JSON into an associative array
									
									if(@$invoicesettingsPag['record']['customer_id']){
										$invoicesettings = $invoicesettingsPag['record'];
									}
									
								?>
						
								<h2 class="card-title">Customer's Invoice Settings</h2>
							</header>
							<div class="card-body">
								<form action="#" method="POST" id="updateCustomerInvoice">
									<div class="card-body col-sm-12 col-md-12 row" style="margin: 0">
									
										<div class="col-sm-12 col-md-5"><!-- Left-->
											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Company Name</label>
												<div class="col-sm-8">
													<input type="text" name="company_name" class="form-control" value="<?php if(@$invoicesettings['company_name']){ echo $invoicesettings['company_name']; }?>" id="company_name" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Profession</label>
												<div class="col-sm-8">
													<input type="text" name="profession" class="form-control" value="<?php if(@$invoicesettings['profession']){ echo $invoicesettings['profession']; }?>" id="profession" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Legal Address</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="address" id="address"><?php if(@$invoicesettings['address']){echo $invoicesettings['address']; } ?></textarea>
													
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-5"><!-- Left-->
											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Tax Id</label>
												<div class="col-sm-8">
													<input type="text" name="tax_id" class="form-control" value="<?php if(@$invoicesettings['tax_id']){ echo $invoicesettings['tax_id']; }?>" id="tax_id" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Tax Office</label>
												<div class="col-sm-8">
													<input type="text" name="tax_office" class="form-control" value="<?php if(@$invoicesettings['tax_office']){ echo $invoicesettings['tax_office']; }?>" id="tax_office" required />
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-4 control-label text-sm-right pt-2">Invoice Email</label>
												<div class="col-sm-8">
													<input type="text" name="receipt_email" class="form-control" value="<?php if(@$invoicesettings['receipt_email']){ echo $invoicesettings['receipt_email']; }?>" id="receipt_email" required />
												</div>
											</div>

											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">&nbsp;</label>
												<div class="col-lg-8 pt-2">
													<div class="col-lg-3" style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$invoicesettings['viewtype'] && ($invoicesettings['viewtype'] == "1")) || (empty($invoicesettings['viewtype']))){?> checked="checked" <?php }?> type="radio" name="viewtype" value="1" id="viewtype1">
											                    Invoice
											                </label>
											            </div>
											        </div>
											        <div class="col-lg-3"  style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" type="radio" <?php if(@$invoicesettings['viewtype'] && ($invoicesettings['viewtype'] == "2")) {?> checked="checked" <?php }?> name="viewtype" value="2" id="viewtype2">
											                    Receipt
											                </label>
											            </div>
											        </div>
												</div>
											</div>
											
										</div>
										<div class="col-sm-12 col-md-12 pt-2">
										<div class="col-sm-3 offset-md-5">
											<input type="hidden" value="<?php echo $customer['id']; ?>" name="customer_id" id="customer_id">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning" id="updateCustomerInvoiceButton">Update Settings</button>
										</div>
									</div>
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

				$("#updateCustomerInvoiceButton").on('click',function(){
					
					var getAvailableAPI = API_LOCATION+'customer/saveIncoiceSettings.php';
					var form_data = $("#updateCustomerInvoice").serialize();

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



				$("#updatecustomer").on('click',function(){

					var form_data = new FormData(); 
					form_data.append('first_name', $("#first_name").val());
					
					form_data.append('last_name', $("#last_name").val());
					form_data.append('sex', $("#sex").val());
					form_data.append('address', $("#pac-input-address").val());
					form_data.append('mobile', $("#mobile").val());
					form_data.append('phone', $("#phone").val());
					form_data.append('email', $("#email").val());
					form_data.append('customer_id', $("#customer_id").val());
					

					
					var getAvailableAPI = API_LOCATION+'customer/save.php';
					
					$.ajax({
			            type: "POST",
			            url: getAvailableAPI,
			            dataType: "JSON",
			            cache: false,
		                contentType: false,
		                processData: false,
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
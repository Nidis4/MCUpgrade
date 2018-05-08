<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
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
		<script src="vendor/jquery/jquery.js"></script>

	</head>
	<?php 
		$t = date('l, F d, Y 12:00:00 A'); 
		$d = strtotime($t).'000';
	?>
	<style type="text/css">
		td[data-date = "<?php echo $d;?>"] {
		    background: #ddd;
		} 
	</style>

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
						<!-- col-lg-12 -->
						<div class="col-lg-12">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Appointment Status</h2>
									<p class="card-subtitle">
										Please fill in the appointment details
									</p>
								</header>
								<div class="card-body">
									<div class="form-group row">
										<label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
										<div class="col-lg-6">
											<select data-plugin-selectTwo class="form-control populate" name="appointmentStatus" id="appointmentStatus">
												<option value="1" >Appointment</option>
												<option value="3" <?php if(@$_GET['type'] && ($_GET['type'] == "offers")){?> selected='selected' <?php }?> >Offer</option>
												<option value="4" >Appointment for Offer</option>
											</select>
										</div>			
									</div>
								</div>
							</section>
						</div>
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
										<!--<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Status <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="status" class="form-control" value="New" disabled required />
											</div>
										</div>-->
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Agent <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="agent" id="agent" agentUser="<?php echo $_SESSION['id'];?>" class="form-control" value="<?php echo $_SESSION['fullname'];?>" required disabled/>
											</div>
										</div>
										<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Category</label>
												<div class="col-lg-6">
													<?php
														$categories = file_get_contents($api_url.'category/read.php');
														$categories = json_decode($categories, true); // decode the JSON into an associative array
													?>
													<select data-plugin-selectTwo class="form-control populate" name="category" id="category">
														<?php
															foreach ($categories as $category) {
																$cat_id = $category['id'];
																$cat_name = $category['title_greek'];
																$commision = $category['commissionRate'];
																echo '<option value="'.$cat_id.'" comm="'.$commision.'">'.$cat_name.'</option>';
															}
														?>
													</select>
												</div>
												<div class="col-lg-3 smbutton">
													<button type="button" class="btn btn-default sameadd" disabled="">
								                        <i class="fa fa-plus"></i> Same
								                    </button>
								                    <button type="button" class="btn btn-danger sameremove" style="display: none; margin-top: 5px;">
								                        <i class="fa fa-minus"></i> Same
								                    </button>
								                    <input type="hidden" name="samecatebud" id="samecatebud" value="1">
												</div>
												
										</div>
										<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Applications</label>
												<div class="col-lg-9">
													<select data-plugin-selectTwo class="form-control populate" id="applications" disabled>
													</select>
												</div>
										</div>
										<div class="form-group row application_questions">
										</div>

										<div class="form-group row duration">
												<label class="col-lg-3 control-label text-lg-right pt-2">Duration in mins</label>
												<div class="col-lg-9">
													<input class="form-control" id="duration" type="number" value="60" min="0" max="900" step="30">
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">County<span class="required">*</span></label>
											<div class="col-sm-9">
												<?php
													$counties = file_get_contents($api_url.'county/read.php');
													$counties = json_decode($counties, true); // decode the JSON into an associative array
												?>
												<select data-plugin-selectTwo class="form-control populate" id="county">
														<?php
															foreach ($counties as $counties) {
																$county_id = $counties['id'];
																$county_name = $counties['county_name'];
																if($county_id == '1'){
																	$selected ='selected="selected"';
																}else{
																	$selected = '';
																}
																echo '<option '.$selected.' value="'.$county_id.'">'.$county_name.'</option>';
															}
														?>
													</select>
											</div>
										</div>
										<div class="form-group row daterange">
												
												<label class="col-lg-3 control-label text-lg-right pt-2">Date range </label>
												<div class="col-lg-9">
													<div class="input-daterange input-group" data-plugin-datepicker="">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
														<input type="text" class="form-control" name="start" id='startDate'>
														<span class="input-group-addon">to</span>
														<input type="text" class="form-control" name="end" id='endDate'>
													</div>
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Budget <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="budget" id="budget" class="form-control" placeholder="Add Budget" required value="" />
												<input type="hidden" name="countrybudget" value="0" id="countrybudget">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Commision <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="commision" id="commision" class="form-control" placeholder="eg.: John" required value="0" />
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Comments</label>
											<div class="col-sm-9">												
												<textarea name="comment" id="comment123" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group row smsProf">
											<label class="col-sm-3 control-label text-sm-right pt-2">Send SMS to Professional</label>
											<div class="col-sm-1">												
												<input type="checkbox" class="form-control" id="professionalsms" name="professionalsms">
											</div>
										</div>
										
									</div>
									<!-- <footer class="card-footer">
										<div class="row justify-content-end">
											<div class="col-sm-9">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer> -->
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
													<select data-plugin-selectTwo class="form-control populate" id="sex">
															<option value="Κύριε">MR</option>
															<option value="Κυρία">MRS</option>
													</select>
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Address <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="address" id="pac-input-address" class="form-control" placeholder="eg.: Gonata 7, 152 12, Athens" required/>
											</div>
										</div>
										<div class="form-group row" id="deliverydisplay" style="display: none;">
											<label class="col-sm-3 control-label text-sm-right pt-2">Delivery Address</label>
											<div class="col-sm-9" style="float: right;" >
												<input type="text" name="delivery_address" id="delivery_address" class="form-control" placeholder="eg.: Gonata 7, 152 12, Athens" required/>
												<div class="distance"></div>
												<input type="hidden" name="distance" id="distance">
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
										
										<div class="form-group row smsEmpl">
											<label class="col-sm-3 control-label text-sm-right pt-2">SMS to Employer</label>
											<div class="col-sm-1">												
												<input type="checkbox" class="form-control" name="employersms" id="employersms" checked="checked">
											</div>
										</div>
										<div class="form-group row smsEmpl">
											<label class="col-sm-3 control-label text-sm-right pt-2">Send Invoice/Receipt</label>
											<div class="col-sm-1">												
												<input type="checkbox" class="form-control" name="sendinvoice" id="sendinvoice">
											</div>
										</div>
									</div>
									<!-- <footer class="card-footer">
										<div class="row justify-content-end">
											<div class="col-sm-9">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer> -->
								</section>
							</form>
						</div>
						
					</div>
					<div class="row status-1 status-4 status">
						<div class="col-sm-6 offset-sm-3 text-center">
							<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning findProfessionals">Find Professionals</button>
						</div>
					</div>
					<div class="row status-3 status" style='display: none'>
						<div class="col-sm-6 offset-sm-3 text-center">
							<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning createOffer">Create Offer</button>
						</div>
					</div>
					<div class="row available">
						<div class="col-lg-12">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
									</div>
									<h2 class="card-title">Available Professionals</h2>
									<p class="card-subtitle">
										Choose a professional
									</p>
								</header>
								<div class="card-body">
									<div class="row" id="available">
									</div>
									<div class="row">
										<div class="col-sm-3 text-center">
											<div id='chosen-slot'><strong>Chosen slot:</strong><span id='appDate'></span> <span id='appTime'></span></span></div>
										</div>
										<div class="col-sm-6 text-center">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning createAppointment">Book Appointment</button>
										</div>
										<div class="col-sm-3 text-right">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-danger cancelAppointment">Cancel</button>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-lg-6">
						</div>
						
					</div>
					
			<div id="map"></div>
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
		<script src="vendor/fuelux/js/spinner.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo $home_url;?>js/core.js"></script>
		
		<script src="<?php echo $platform_url;?>js/custom.js"></script>
		<script src="<?php echo $platform_url;?>js/searchAddress.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOB9VUHID5_exudRHHduRUvCYOu--Lg0w&libraries=places&callback=initAutocomplete" async defer></script>

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		

		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.validation.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				<?php 
					if(@$_GET['type'] && ($_GET['type'] == "offers")){
				?>
						var status_id = '3';
					    //alert(status_id);

					    $('.status').css("display", "none");
					    $('body').removeAttr('id');

					    $('.status-'+status_id).css("display", "block");
					    $('body').attr('id','status-'+status_id);
				<?php		
					}
				?>

				// $("#applications").on('change',function(){
				// 	var date = new Date;
				// 	var day = date.getDay();
				// 	var adddays = 1;
				// 	if(day == 5){
				// 		adddays = 3;
				// 	}else if(day == 6){
				// 		adddays = 3;
				// 	}else if(day == 7){
				// 		adddays = 2;
				// 	}

				// 	var newday = date.setDate(date.getDate() + adddays);
				// 	var minDate = new Date(newday);
				// 	//$('#startDate').datepicker('setStartDate', minDate);
				// 	$( "#startDate" ).datepicker( "option", "minDate", minDate );
				// 	//$('#datetimepicker7').data("DateTimePicker").minDate(minDate);
				// });
				
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
		<?php include('reject_popup.php');?>
	</body>
</html>
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
		<link rel="stylesheet" href="vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">
		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery/jquery.js"></script>
		<style type="text/css">
			.select2-selection.select2-selection--multiple{
				height: auto;
				padding-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<section class="body">

			<?php
				
				if (isset($_GET['id'])) {
				    $id = $_GET['id'];
				} else {
				    // Fallback behaviour goes here
				    $url = $home_url."platform/professional.php";
				    echo $url;
				    header("Location: ".$url);
					die();
				}
				include('header.php');
				
				$professional = file_get_contents($api_url.'professional/read_one.php?id='.$id);
				$professional = json_decode($professional, true); // decode the JSON into an associative array	

				$applications = file_get_contents($api_url.'professional/getApplications.php?id='.$id);
				$applications = json_decode($applications, true);	


				$categories = file_get_contents($api_url.'category/read.php');
				$categories = json_decode($categories, true); // decode the JSON into an associative array
				if(@$professional['categories']){
					foreach ($professional['categories'] as $cvalue) {
						$cids[] = $cvalue['category_id'];
					}
				}else{
					$cids = array();
				}

				if(@$professional['counties']){
					foreach ($professional['counties'] as $cvalue) {
						$ctids[] = $cvalue['county_id'];
					}
				}else{
					$ctids = array();
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
								<li><span>Home</span></li>
								<li><span>Professionals</span></li>
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
						
								<h2 class="card-title">Professional Information #<?php echo $professional['id']; ?></h2>
							</header>
							<form action="#" method="POST" id="updateProfessionalform">
								<div class="card-body col-sm-12 col-md-12 row" style="margin: 0">
								
									<div class="col-sm-12 col-md-5"><!-- Left-->
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Name <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="first_name" class="form-control" value="<?php echo $professional['first_name']; ?>" id="first_name" required />
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Surname <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $professional['last_name']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Sex <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="sex" id="sex" class="form-control" value="<?php echo $professional['sex']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Address <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="address" id="pac-input-address" class="form-control" value="<?php echo $professional['address']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Mobile <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $professional['mobile']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Landline <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $professional['phone']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">E-mail <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="email" id="email" class="form-control" value="<?php echo $professional['email']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Status <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="profile_status" id="profile_status" class="form-control" value="<?php echo $professional['profile_status']; ?>" required />
											</div>										
										</div>
										<!-- <div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Category <span class="required">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="profile_status" id="profile_status" class="form-control" value="<?php //echo $professional['profile_status']; ?>" required />
											</div>										
										</div> -->
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Applications <span class="required">*</span></label>
											<div class="col-sm-8">
												<?php
													if(@$applications['message']){
													}else if(@$applications){

														foreach ($applications as $application) {
															echo $application['category'].": ".$application['application']."<br>";
														}
													}
												?>
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Google Calendar ID <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="calendar_id" id="calendar_id" class="form-control" value="<?php echo $professional['calendar_id']; ?>" required />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-4 control-label text-sm-right pt-2">Admin Comments <span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="admin_comments" id="admin_comments" class="form-control" value="<?php echo $professional['admin_comments']; ?>" required />
											</div>										
										</div>	
										<div class="form-group col-md-12 row">
											<label class="col-lg-4 control-label text-lg-right pt-2">Default SMS</label>
											<div class="col-lg-1"><input type="checkbox" class="form-control" name="defaultsms" id="defaultsms" value="1" <?php if(@$professional['defaultsms']){ echo "checked='checked'";}?> ></div>
										</div>	

										<?php 
											// For transport category
											if(in_array('103', $cids)){
										?>
											<div class="form-group col-md-12 row">
												<label class="col-lg-4 control-label text-lg-right pt-2">Truck Dimensions in meters</label>	
												<div class="col-lg-8" style="padding-left: 0;">
													<div class="col-lg-4" style="padding-right: 0; float: left;">
														<input type="text" name="truckdimension['width']" value="<?php //echo $professional['truckdimension']['width']; ?>" class="form-control" placeholder="Width">
													</div>
													<div class="col-lg-4" style="padding-right: 0; float: left;">
														<input type="text" name="truckdimension['length']"  value="<?php //echo $professional['truckdimension']['length']; ?>"" class="form-control" placeholder="Length">
													</div>
													<div class="col-lg-4" style="padding-right: 0; float: left;" >
														<input type="text" name="truckdimension['height']" value="<?php //echo $professional['truckdimension']['height']; ?>"" class="form-control" placeholder="Height">
													</div>
												</div>
											</div>
											<div class="form-group col-md-12 row">
												<label class="col-lg-4 control-label text-lg-right pt-2">Hydraulic Door</label>
												<div class="col-lg-1"><input type="checkbox" class="form-control" name="truckdimension['door']" id="door" value="1" <?php if(@$professional['truckdimension']['door']){ echo "checked='checked'";}?> ></div>
											</div>	
										<?php		
											}
										?>


									</div>
									<div class="col-sm-12 col-md-7"><!-- Right-->
										<div class="form-group row">								
											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Attached Files</label>
												<div class="col-lg-8">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_image1" id="profile_image1" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['image1']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['image1'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class="offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_image2" id="profile_image2" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['image2']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['image2'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class="offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_image3" id="profile_image3"  />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['image3']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['image3'];?>">View Details</a>
													<?php
														}
													?>
												</div>
											</div>

											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Personal ID</label>

												<div class="col-lg-8">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_perid1" id="profile_perid1"  />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['perid1']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['perid1'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class="col-lg-1">
													<input type="checkbox" name="approve_per" id="approve_per" value="1" <?php if(@$professional['approve_per']){ echo "checked='checked'";}?>>
												</div>
												<div class="offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_perid2" id="profile_perid2" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													
													<?php
														if(@$professional['perid2']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['perid2'];?>">View Details</a>
													<?php
														}
													?>
													

												</div>
											</div>
											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Agreement</label>
												<div class="col-lg-8">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_agreement1" id="profile_agreement1" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['agreement1']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['agreement1'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class="col-lg-1">
													<input class="pt-2" type="checkbox" name="approve_doc" id="approve_doc" value="1" <?php if(@$professional['approve_doc']){ echo "checked='checked'";}?> >
												</div>
												<div class=" offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_agreement2" id="profile_agreement2"/>
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['agreement2']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['agreement2'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class=" offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_agreement3" id="profile_agreement3" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['agreement3']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['agreement3'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class=" offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_agreement4" id="profile_agreement4" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													<?php
														if(@$professional['agreement4']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['agreement4'];?>">View Details</a>
													<?php
														}
													?>
												</div>
												<div class="offset-md-3 col-lg-8 pt-2">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="profile_agreement5" id="profile_agreement5" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
													
													<?php
														if(@$professional['agreement5']){
													?>
															<a target="_blank" href="<?php echo $home_url.'platform/UserFiles/professionals/'.$professional['agreement5'];?>">View Details</a>
													<?php
														}
													?>
													
												</div>
											</div>
											<div class="form-group col-md-12 row">
												
												<label class="col-lg-3 control-label text-lg-right pt-2">Select Trades</label>
												<div class="col-lg-8 pt-2"> 
													<select multiple data-plugin-selectTwo class="form-control populate" id="profile_categories" name="profile_categories[]">
														<?php
															
															foreach ($categories as $category) {
																$cat_id = $category['id'];
																$cat_name = $category['title'];
																$commision = $category['commissionRate'];
																$selected = "";
																if(in_array($cat_id, $cids)){
																	$selected = " selected='selected' ";	
																}

																echo '<option value="'.$cat_id.'" '.$selected.' >'.$cat_name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group col-md-12 row">
												<?php
													$counties = file_get_contents($api_url.'county/read.php');
													$counties = json_decode($counties, true); // decode the JSON into an associative array

												?>
												<label class="col-lg-3 control-label text-lg-right pt-2">Select County</label>
												<div class="col-lg-8 pt-2"> 
													<select multiple data-plugin-selectTwo class="form-control populate" id="profile_counties" name="profile_counties[]">
														<?php
															foreach ($counties as $county) {
																$cat_id = $county['id'];
																$cat_name = $county['county_name'];
																$selected = "";
																if(in_array($cat_id, $ctids)){
																	$selected = " selected='selected' ";	
																}
																echo '<option value="'.$cat_id.'" '.$selected.' >'.$cat_name.'</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Percentage</label>
												<div class="col-lg-8 pt-2"><strong><?php echo $professional['percentage']; ?></strong></div>
											</div>
											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">Verified</label>
												<div class="col-lg-1"><input type="checkbox" class="form-control" name="verified" id="verified" value="1" <?php if(@$professional['verified']){ echo "checked='checked'";}?> ></div>
											</div>
											<div class="form-group col-md-12 row">
												<label class="col-lg-3 control-label text-lg-right pt-2">&nbsp;</label>
												<div class="col-lg-8 pt-2">
													<div class="col-lg-3" style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" <?php if((@$professional['viewtype'] && ($professional['viewtype'] == "1")) || (empty($professional['viewtype']))){?> checked="checked" <?php }?> type="radio" name="viewtype" value="1" id="viewtype1">
											                    Invoice
											                </label>
											            </div>
											        </div>
											        <div class="col-lg-3"  style="float: left;">            
											            <div class="radio">
											                <label class="pt-3">
											                    <input class="" type="radio" <?php if(@$professional['viewtype'] && ($professional['viewtype'] == "2")) {?> checked="checked" <?php }?> name="viewtype" value="2" id="viewtype2">
											                    Receipt
											                </label>
											            </div>
											        </div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-12 pt-2">
										<div class="col-sm-3 offset-md-5">
											<input type="hidden" value="<?php echo $professional['id']; ?>" name="professional_id" id="professional_id">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning" id="updateProfessional">Update Details</button>
										</div>
									</div>
								
							</div></form>
						</section>

						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Professional's Balance</h2>
							</header>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
									<a class="modal-with-form btn btn-primary" style="float: right;" href="#modalForm">Add Payment <i class="fa fa-plus"></i></a>
											<!-- Modal Form -->
											<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
												<section class="card">
													<header class="card-header">
														<h2 class="card-title">Add New Payment</h2>
													</header>
													<div class="card-body">
														<form id="addpaymentform" method="POST">															
															<div class="form-group">
																<label for="inputEmail4">Category</label>
																<select class="form-control" name="categoryId" id="categoryId">
																	<option value="">Select Category</option>
																	<?php 
																		if(@$applications['message']){
																		}else if(@$applications){
																			$catsids = array();
																			foreach ($applications as $application) {
																				if(!in_array($application['category_id'], $catsids)){

																	?>
																				<option value="<?php echo $application['category_id'];?>"><?php echo $application['category'];?></option>
																	<?php
																				$catsids[] = $application['category_id'];	
																				}
																			}
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="inputAddress">Type</label>
																<select class="form-control" name="paytype" id="paytype">
																	<option value="">Select Type</option>
																	<option value="Cash">Cash</option>
																	<option value="Bank Transfer">Bank Transfer</option>
																</select>
															</div>
															<div class="form-group" id="bankselect" style="display: none;">
																<label for="inputAddress">Select Bank</label>
																<select class="form-control" name="bank_name" id="bank_name">
																	<option value="">Select Bank</option>
																	<option value="Alpha">Alpha</option>
																	<option value="Eurobank">Eurobank</option>
																	<option value="Piraeus">Piraeus</option>
																	<option value="Ethiniki">Ethiniki</option>
																</select>

															</div>
															<div class="form-row">
																<label for="inputCity">Amount</label>
																<input type="number" class="form-control" value="0" name="amount" id="amount">
															</div>
															<div class="form-row">
																<label for="inputCity">Comment</label>
																<input type="text" class="form-control" name="comment" id="comment">
															</div>
															<div class="form-group row">
																<div class="col-sm-1">												
																	<input type="checkbox" class="form-control" name="issuetypeval" id="issuetypeval">
																</div>
																<label class="col-sm-4 pt-2">Issue Invoice/Receipt</label>
																
																<?php
																	$vtype = "Invoice";
																	if(@$professional['viewtype']){
																		if($professional['viewtype'] == "2"){
																			$vtype = "Receipt";
																		}
																		
																	}
																?>
																	<input type="hidden" name="issuetype" id="issuetype" value="<?php echo $vtype;?>">
															</div>
														</form>
													</div>
													<footer class="card-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<button class="btn btn-primary modal-confirm" id="submitpaymentadd">Submit</button>
																<button class="btn btn-default modal-dismiss">Cancel</button>
															</div>
														</div>
													</footer>
													<script type="text/javascript">
														$(document).ready(function(){															
															$('#paytype').on('change',function(){
																if($(this).val() == 'Bank Transfer'){
																	$('#bankselect').show();
																}
																else{
																	$('#bankselect').hide();
																}
															});
															$("#submitpaymentadd").on('click',function(){
																var error = 0;
																var message = "";
																if($("#categoryId").val() == ""){
																	error = 1;
																	message += "Please select category!"+'\n'; 
																}

																if($("#paytype").val() == ""){
																	error = 1;
																	message += "Please select type!"+'\n'; 
																}else if(($("#paytype").val() == "Bank Transfer") && ($("#bank_name").val() == "") ){
																	error = 1;
																	message += "Please select Bank!"+'\n';
																}

																if(($("#amount").val() == 0) || ($("#amount").val() == "")){
																	error = 1;
																	message += "Please enter amount!"+'\n'; 
																}

																if(error == 1){
																	alert(message);
																}else{
																	var savePaymentApi = API_LOCATION+'payment/save.php';
																	var atLeastOneIsChecked = $('input[name="issuetypeval"]:checked').length > 0;
																	var issuetype = "";

																	if(atLeastOneIsChecked){
																		issuetype = $("#issuetype").val();
																	}
																	$.ajax({
																	            type: "POST",
																	            url: savePaymentApi,
																	            data: {
																	                professional_id: "<?php echo $_REQUEST['id']?>",
																	                agent_id: "<?php echo $_SESSION['id'];?>",
																	                category_id: $("#categoryId").val(),
																	                type: $("#paytype").val(),
																	                bank_name: $("#bank_name").val(),
																	                amount: $("#amount").val(),
																	                comment: $("#comment").val(),
																	                issuetype: issuetype,
																	            },
																	            dataType: "json",
																	            success: function(data)
																	            {
																	            	alert(data.message);
																	            	location.reload();
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
										</div>
									<div class="col-sm-6">
										<div class="mb-3">
											
											<!-- <a class="modal-with-form btn btn-primary" href="#modalForm">Add Payment <i class="fa fa-plus"></i></a> -->
											
										</div>
									</div>
								</div>

								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Date/Time</th>
											<th>Category</th>
											<th>Appointment Info</th>
											<th>Comments</th>
											<th>Budget</th>
											<th>Commision</th>
											<th>Payment</th>
											<th>Balance</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//$appointments = file_get_contents($api_url.'appointment/read_paging.php?prof_id='.$id);
										//$appointmentsPag = json_decode($appointments, true); // decode the JSON into an associative array

										$payments = file_get_contents($api_url.'payment/paymentByProf.php?prof_id='.$id);
										$paymentsPag = json_decode($payments, true); // decode the JSON into an associative array
										
										if(@$paymentsPag['message'] && ($paymentsPag['message'] == "No Payments found.")){
										?>

											<tr> <td colspan="8">No data found.</td></tr>
										<?php
										}elseif(@$paymentsPag){
											$ii = 1;
											foreach ($paymentsPag as $payment) {


												$submission_date = $payment['datetime_added'];
												$category_id = $payment['category_id'];
												$appointment_details = $payment['appointment_details'];
												$paymentDone = $payment['payment'];
												$agent_id = $payment['agent_id'];
												$date = $payment['datetime_added'];
												$budget = $payment['budget'];
												$commission = $payment['commision'];
												$comment = $payment['comment'];
												
												$balance = $payment['balance'];

												if(isset($payment['appointment_status'])){
													$status = $payment['appointment_status'];
												}else if(isset($payment['payment_status'])){
													$status = $payment['payment_status'];
												}else{
													$status = "";
												}
												
												

												echo '<tr data-item-id="'.$ii.'" class="status-'.$status.'">
														  <td>'.$date.'</td>
														  <td>'.$category_id.'</td>
														  <td>'.$appointment_details.'</td>
														  <td>'.$comment.'</td>
														  <td>'.$budget.'</td>
														  <td>'.$commission.'</td>
														  <td>'.$paymentDone.'</td>
														  <td>'.$balance.'</td>';
												if(@$payment['payment_id']){
														$type = $payment['type'];
														$id = $payment['payment_id'];
														echo '<td class="actions">
															<a href="#editmodalForm'.$payment['payment_id'].'" class="on-default modal-with-form edit-row"><i class="fa fa-pencil"></i></a>
															<a href="#cancelmodalForm'.$payment['payment_id'].'" class="on-editing modal-with-form cancel-row"><i class="fa fa-times"></i></a>
														  </td></tr>';
														if($status == 0){
															$cancelreason = "";
															if($payment['cancelReason'] == 1){
																$cancelreason = "Customer Cancel";
															}elseif($payment['cancelReason'] == 2){
																$cancelreason = "Professional Couldn't";
															}elseif ($payment['cancelReason'] == 3) {
																$cancelreason = "Mistake";
															}

															echo "<tr><td colspan='9'>Cancelled on: ".date("d/m/Y H:i:s",strtotime($payment['datetimeStatusUpdated']))." by Agent : ".$_SESSION['fullname'].", Type : ".$cancelreason.", Comments : ".$payment['cancelComment']."</td></tr>";
														}
												?>
														<!-- Modal Form For Edit Payment -->
														<div id="editmodalForm<?php echo $payment['payment_id'];?>" class="modal-block modal-block-primary mfp-hide">
															<section class="card">
																<header class="card-header">
																	<h2 class="card-title">Edit Payment</h2>
																</header>
																<div class="card-body">
																	<form id="editpaymentform<?php echo $payment['payment_id'];?>" method="POST">															
																		<div class="form-group">
																			<label for="inputEmail4">Category</label>
																			<select class="form-control" name="categoryId" id="categoryId<?php echo $payment['payment_id'];?>">
																				<option value="">Select Category</option>
																				<?php 
																					if(@$applications['message']){
																					}else if(@$applications){
																						$catsids = array();
																						foreach ($applications as $application) {
																							if(!in_array($application['category_id'], $catsids)){
																				?>
																								<option <?php if($category_id == $application['category_id']){?> selected="selected" <?php }?> value="<?php echo $application['category_id'];?>"><?php echo $application['category'];?></option>
																				<?php
																							$catsids[] = $application['category_id'];	
																							}
																						}
																					}
																				?>
																			</select>
																		</div>
																		<div class="form-group">
																			<label for="inputAddress">Type</label>
																			<select class="form-control" name="paytype" id="paytype<?php echo $payment['payment_id'];?>">
																				<option value="">Select Type</option>
																				<option <?php if($type == 'Cash'){?> selected="selected" <?php }?> value="Cash">Cash</option>
																				<option <?php if($type == 'Bank Transfer'){?> selected="selected" <?php }?> value="Bank Transfer">Bank Transfer</option>
																			</select>
																		</div>
																		<div class="form-group" id="bankselect<?php echo $payment['payment_id'];?>" <?php if($type == 'Bank Transfer'){?> style="display: block;" <?php } else{?> style="display: none;" <?php }?>>
																			<label for="inputAddress">Select Bank</label>
																			<select class="form-control" name="bank_name" id="bank_name<?php echo $payment['payment_id'];?>">
																				<option value="">Select Bank</option>
																				<option value="Alpha">Alpha</option>
																				<option value="Eurobank">Eurobank</option>
																				<option value="Piraeus">Piraeus</option>
																				<option value="Ethiniki">Ethiniki</option>
																			</select>

																		</div>
																		<div class="form-row">
																			<label for="inputCity">Amount</label>
																			<input type="number" class="form-control" value="<?php echo $payment['amount'];?>" name="amount" id="amount<?php echo $payment['payment_id'];?>">
																		</div>
																		<div class="form-row">
																			<label for="inputCity">Comment</label>
																			<input type="text" class="form-control" value="<?php echo $comment;?>" name="comment" id="comment<?php echo $payment['payment_id'];?>">
																		</div>
																		<!-- <div class="form-group row">
																			<div class="col-sm-1">												
																				<input type="checkbox" class="form-control" name="issuetypeval" id="issuetypeval<?php echo $payment['payment_id'];?>">
																			</div>
																			<label class="col-sm-4 pt-2">Issue Invoice/Receipt</label>
																			
																			<?php
																				$vtype = "Invoice";
																				if(@$professional['viewtype']){
																					if($professional['viewtype'] == "2"){
																						$vtype = "Receipt";
																					}
																					
																				}
																			?>

																		</div> -->
																		<input type="hidden" name="issuetype" id="issuetype<?php echo $payment['payment_id'];?>" value="<?php echo $vtype;?>">
																		<input type="hidden" name="payment_id" id="payment_id<?php echo $payment['payment_id'];?>" value="<?php echo $payment['payment_id'];?>">
																	</form>
																</div>
																<footer class="card-footer">
																	<div class="row">
																		<div class="col-md-12 text-right">
																			<button class="btn btn-primary modal-confirm" id="submitpaymentedit<?php echo $payment['payment_id'];?>">Submit</button>
																			<button class="btn btn-default modal-dismiss">Cancel</button>
																		</div>
																	</div>
																</footer>
																<script type="text/javascript">
																	$(document).ready(function(){															
																		$('#paytype<?php echo $payment['payment_id'];?>').on('change',function(){
																			if($(this).val() == 'Bank Transfer'){
																				$('#bankselect<?php echo $payment['payment_id'];?>').show();
																			}
																			else{
																				$('#bankselect<?php echo $payment['payment_id'];?>').hide();
																			}
																		});
																		$("#submitpaymentedit<?php echo $payment['payment_id'];?>").on('click',function(){
																			var error = 0;
																			var message = "";
																			if($("#categoryId<?php echo $payment['payment_id'];?>").val() == ""){
																				error = 1;
																				message += "Please select category!"+'\n'; 
																			}

																			if($("#paytype<?php echo $payment['payment_id'];?>").val() == ""){
																				error = 1;
																				message += "Please select type!"+'\n'; 
																			}else if(($("#paytype<?php echo $payment['payment_id'];?>").val() == "Bank Transfer") && ($("#bank_name<?php echo $payment['payment_id'];?>").val() == "") ){
																				error = 1;
																				message += "Please select Bank!"+'\n';
																			}

																			if(($("#amount<?php echo $payment['payment_id'];?>").val() == 0) || ($("#amount<?php echo $payment['payment_id'];?>").val() == "")){
																				error = 1;
																				message += "Please enter amount!"+'\n'; 
																			}

																			if(error == 1){
																				alert(message);
																			}else{
																				var editPaymentApi = API_LOCATION+'payment/edit.php';
																				var atLeastOneIsChecked = $('#issuetypeval<?php echo $payment['payment_id'];?>:checked').length > 0;
																				var issuetype = "";

																				if(atLeastOneIsChecked){
																					issuetype = $("#issuetype").val();
																				}
																				$.ajax({
																				            type: "POST",
																				            url: editPaymentApi,
																				            data: {
																				                professional_id: "<?php echo $_REQUEST['id']?>",
																				                agent_id: "<?php echo $_SESSION['id'];?>",
																				                category_id: $("#categoryId<?php echo $payment['payment_id'];?>").val(),
																				                type: $("#paytype<?php echo $payment['payment_id'];?>").val(),
																				                bank_name: $("#bank_name<?php echo $payment['payment_id'];?>").val(),
																				                amount: $("#amount<?php echo $payment['payment_id'];?>").val(),
																				                comment: $("#comment<?php echo $payment['payment_id'];?>").val(),
																				                issuetype: issuetype,
																				                payment_id: $("#payment_id<?php echo $payment['payment_id'];?>").val(),
																				            },
																				            dataType: "json",
																				            success: function(data)
																				            {
																				            	alert(data.message);
																				            	location.reload();
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
														<!-- Modal Form for Cancel Payment -->
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
																			<button class="btn btn-primary" id="cancelpayment<?php echo $id;?>">Submit</button>
																			<button class="btn btn-default modal-dismiss">Cancel</button>
																		</div>
																	</div>
																</footer>
																<script type="text/javascript">
																	$(document).ready(function(){															
																		
																		$("#cancelpayment<?php echo $id;?>").on('click',function(){
																			
																			var error = 0;
																			var message = "";
																			if(error == 1){
																				alert(message);
																			}else{
																				var cancelPaymentApi = API_LOCATION+"payment/cancel.php?id=<?php echo $id;?>";
																				$.ajax({
																				            type: "POST",
																				            url: cancelPaymentApi,
																				            data: $("#addcancelform<?php echo $id;?>").serialize(),
																				            dataType: "json",
																				            success: function(data)
																				            {	
																				            	if(data.ResultCode == 1){
																				            		alert("Payment cancelled successfully.");
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
												} else{
														echo '<td></td></tr>';	
												}
												$ii++;	
											}

											
										}else{
										?>
											<tr> <td colspan="9">No data found.</td></tr>
										<?php	
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
						
								<h2 class="card-title">Professional's Statistics</h2>
							</header>
							<div class="card-body">
								<table class="table table-bordered table-striped mb-0" id="">
									<thead>
										<tr>
											<th>Appointments Booked</th>
											<th>Appointments Cancelled</th>
											<th>Reasons for Cancelled</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$statistics = file_get_contents($api_url.'professional/statistics.php?id='.$id);
											$statisticsPag = json_decode($statistics, true); // decode the JSON into an associative array
										?>
										<tr>
											<td><?php echo $statisticsPag['updated'];?></td>
											<td><?php echo $statisticsPag['cancelled'];?></td>
											<td>
												<?php 
													if(@$statisticsPag['cancelByCustomer']){
														echo "<b>Cancelled By Customer:</b> ". $statisticsPag['cancelByCustomer']."<br>";
													}
													if(@$statisticsPag['cancelByProfessional']){
														echo "<b>Cancelled By Professional:</b> ". $statisticsPag['cancelByProfessional']."<br>";
													}
													if(@$statisticsPag['cancelByMistake']){
														echo "<b>Cancelled By Mistake:</b> ". $statisticsPag['cancelByMistake']."<br>";
													} 
													if(@$statisticsPag['cancelDefault']){
														echo "<b>Cancelled By Default:</b> ". $statisticsPag['cancelDefault']."<br>";
													} 
												?>												
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</section>


						<!-- -->
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Professional's Invoice Settings</h2>
							</header>
							<div class="card-body">
								<form action="#" method="POST" id="updateProfessionalInvoice">
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
											
										</div>
										<div class="col-sm-12 col-md-12 pt-2">
										<div class="col-sm-3 offset-md-5">
											<input type="hidden" value="<?php echo $professional['id']; ?>" name="professional_id" id="professional_id">
											<button type="button" class="mb-1 mt-1 mr-1 btn btn-warning" id="updateProfessionalInvoiceButton">Update Settings</button>
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
		<script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/core.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/searchAddress.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOB9VUHID5_exudRHHduRUvCYOu--Lg0w&libraries=places&callback=initAutocomplete" async defer></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.datatables.editable.js"></script>
		<script src="js/examples/examples.modals.js"></script>



		<!-- Page JS-->
		<script type="text/javascript">
			$(document).ready(function(){
					
				$("#updateProfessionalInvoiceButton").on('click',function(){
					
					var getAvailableAPI = API_LOCATION+'professional/saveIncoiceSettings.php';
					var form_data = $("#updateProfessionalInvoice").serialize();

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

				$("#updateProfessional").on('click',function(){
					var form_data = new FormData(); 
					form_data.append('first_name', $("#first_name").val());
					form_data.append('last_name', $("#last_name").val());
					form_data.append('sex', $("#sex").val());
					form_data.append('address', $("#pac-input-address").val());
					form_data.append('mobile', $("#mobile").val());
					form_data.append('phone', $("#phone").val());
					form_data.append('email', $("#email").val());
					form_data.append('profile_status', $("#profile_status").val());
					form_data.append('calendar_id', $("#calendar_id").val());
					form_data.append('admin_comments', $("#admin_comments").val());
					form_data.append('professional_id', $("#professional_id").val());
					form_data.append('viewtype', $('input[name=viewtype]:checked').val());
					form_data.append('profile_categories', $('#profile_categories').val());
					form_data.append('profile_counties', $('#profile_counties').val());

					if ($('#approve_per').prop('checked') == true){
    					form_data.append('approve_per', 1);
					} else{
					    form_data.append('approve_per', 0);
					}



					if ($('#approve_doc').prop('checked') == true){
						form_data.append('approve_doc', 1);
					} else{
						form_data.append('approve_doc', 0);
					}

					if ($('#verified').prop('checked') == true){
						form_data.append('verified', 1);
					} else{
						form_data.append('verified', 0);
					}

					if ($('#defaultsms').prop('checked') == true){
						form_data.append('defaultsms', 1);
					} else{
						form_data.append('defaultsms', 0);
					}


					//Attached Files
					var profile_image1 = $('#profile_image1').prop('files')[0];
					form_data.append('profile_image1', profile_image1);
					var profile_image2 = $('#profile_image2').prop('files')[0];
					form_data.append('profile_image2', profile_image2);
					var profile_image3 = $('#profile_image3').prop('files')[0];
					form_data.append('profile_image3', profile_image3);

					//Personal ID
					var profile_perid1 = $('#profile_perid1').prop('files')[0];
					form_data.append('profile_perid1', profile_perid1);
					var profile_perid2 = $('#profile_perid2').prop('files')[0];
					form_data.append('profile_perid2', profile_perid2);

					//Agreement
					var profile_agreement1 = $('#profile_agreement1').prop('files')[0];
					form_data.append('profile_agreement1', profile_agreement1);
					var profile_agreement2 = $('#profile_agreement2').prop('files')[0];
					form_data.append('profile_agreement2', profile_agreement2);
					var profile_agreement3 = $('#profile_agreement3').prop('files')[0];
					form_data.append('profile_agreement3', profile_agreement3);
					var profile_agreement4 = $('#profile_agreement4').prop('files')[0];
					form_data.append('profile_agreement4', profile_agreement4);
					var profile_agreement5 = $('#profile_agreement5').prop('files')[0];
					form_data.append('profile_agreement5', profile_agreement5);

					
					var getAvailableAPI = API_LOCATION+'professional/save.php';
					
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
	</body>
</html>
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
				$invoices = file_get_contents($api_url.'payment/read_invoice_paging.php');
				$invoicesPag = json_decode($invoices, true); // decode the JSON into an associative array	
			
			?>

			<div class="inner-wrapper">
				
				<!-- Sidebar Position -->
				<?php
					include('left_sidebar.php');
				?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Invoices</h2>
					
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
						
								<h2 class="card-title">List of Invoices</h2>
							</header>
							<div class="card-body">
								
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Date</th>
											<th>Customer name</th>
											<th>Invoice No</th>
											<th>Comment</th>
											<th>Amount</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php

										if(empty($invoicesPag['message'])){
												foreach ($invoicesPag['records'] as $field => $value) {
												$payment_id = $invoicesPag['records'][$field]['payment_id'];
												$name = $invoicesPag['records'][$field]['first_name']." ".$invoicesPag['records'][$field]['last_name'];
												$datetime_added = $invoicesPag['records'][$field]['datetime_added'];
												$invoice_no = $invoicesPag['records'][$field]['invoice_no'];
												$comment = $invoicesPag['records'][$field]['comment'];
												$amount = $invoicesPag['records'][$field]['amount'];
												$status = $invoicesPag['records'][$field]['status'];
												$sent_email = $invoicesPag['records'][$field]['sent_email'];
												

												echo '<tr data-item-id="'.$payment_id.'" class="status-'.$status.'">
														  <td>'.$datetime_added.'</td>
														  <td>'.$name.'</td>
														  <td>'.$invoice_no.'</td>
														  <td>'.$comment.'</td>
														  <td>'.$amount.'</td>
														  <td class="actions">
															<a href="'.$api_url.'payment/invoice_receipt_pdf.php?payment_id='.$payment_id.'" class="btn btn-danger" style="color:#ffffff;"><i class="fa fa-file-pdf-o"></i></a>';
												if(@$sent_email){
													echo '<a href="javascript:void(0);" rel="'.$payment_id.'" class="btn btn-warning" style="color:#ffffff;"><i class="fa fa-lightbulb-o"></i></a>';
												}else{
													echo '<a href="javascript:void(0);" rel="'.$payment_id.'"  class="btn btn-default sent_email" style=""><i class="fa fa-lightbulb-o"></i></a>';
												}

												echo	'</td></tr>';
										?>
										
										<?php
											}
										}else{
										?>
												<tr><td colspan="6">No Payment found.</td></tr>	
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
		<script type="text/javascript">
			$(document).ready(function(){
				$("a.sent_email").on('click',function(){
					if (confirm('Are you sure want to sent email?')) {
				    	var rel = $(this).attr('rel');
				    	var getAvailableAPI = API_LOCATION+'payment/invoice_receipt_pdf.php?type=i&payment_id='+rel;
				    	var form_data = "";
				    	$.ajax({
				            type: "POST",
				            url: getAvailableAPI,
				            dataType: "JSON",
			                data: form_data,
				            success: function(data)
				            {
				                getAvailableAPI = API_LOCATION+'payment/sentEmail.php?id='+rel;
						    	$.ajax({
						            type: "POST",
						            url: getAvailableAPI,
						            dataType: "JSON",
					                data: form_data,
						            success: function(data)
						            {
						                alert(data.message);
						                //alert("Download");
						                location.reload(); 
						            }
						        });
				            }
				        });
						return false;
				    }
				});
			});
		</script>
	</body>
</html>
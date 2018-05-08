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
				$jobs = file_get_contents($api_url.'job/read_paging.php');
				$jobsPag = json_decode($jobs, true); // decode the JSON into an associative array


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
								<li><span>Jobs</span></li>
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
						
								<h2 class="card-title">List of Jobs</h2>
							</header>
							<div class="card-body" id='jobSearch'>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Title </label>
											<div class="col-sm-9">
												<input type="text" name="job_title" id="job_title" class="form-control" value=""  />
											</div>										
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Name </label>
											<div class="col-sm-9">
												<input type="text" name="first_name" id="first_name" class="form-control" value=""  />
											</div>										
										</div>
											
									</div>
									<div class="col-sm-6">
										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Email </label>
											<div class="col-sm-9">
												<input type="text" name="job_email" id="job_email" class="form-control" value=""  />
											</div>										
										</div>

										<div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Surname </label>
											<div class="col-sm-9">
												<input type="text" name="last_name" id="last_name" class="form-control" value=""  />
											</div>										
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4 offset-sm-4 text-center">
										<button type="button" class="mb-1 mt-4 mr-1 btn btn-warning" id="searchJob">Search</button>
									</div>
								</div>
								
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Created</th>
											<th>Surname</th>
											<th>First Name</th>
											<th>Job title</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="customers-table">
										<?php
										foreach ($jobsPag['records'] as $field => $value) {
											$id = $jobsPag['records'][$field]['id'];
											$created = $jobsPag['records'][$field]['datetimeCreated'];
											$title = $jobsPag['records'][$field]['title'];
											$first_name = $jobsPag['records'][$field]['first_name'];
											$last_name = $jobsPag['records'][$field]['last_name'];
											$email = $jobsPag['records'][$field]['email'];
											

											echo '<tr data-item-id="'.$id.'">
													  <td>'.$created.'</td>
													  <td>'.$last_name.'</td>
													  <td>'.$first_name.'</td>													  
													  <td>'.$title.'</td>
													  <td>'.$email.'</td>
													  <td class="actions">
														<a href="'.$home_url.'platform/job.php?id='.$id.'" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													  </td>
												  </tr>';

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
				$('#jobSearch .form-group input').keypress(function(e){
				        if(e.which == 13){//Enter key pressed
				            //alert("Clicked");
				            $('#searchJob').click();//Trigger search button click event
				        }
				});

				$( "#searchJob" ).click(function() {
				    alert("Search professional");
				    var job_title = $("#job_title").val();
				    var job_email = $("#job_email").val();
				    var first_name = $("#first_name").val();
				    var last_name = $("#last_name").val();

				    var getAvailableAPI = API_LOCATION+'job/searchList.php?n='+first_name+'&s='+last_name+'&t='+job_title+'&e='+job_email;
				    //alert(getAvailableAPI);

				    $.ajax({
				        type: "POST",
				        url: getAvailableAPI,
				        dataType: "json",
				        success: function(data)
				        {
				            htmlStr = "";
				            $("#customers-table").empty();
				            $.each(data, function(k, v){
				                if (v.id!=undefined){
				                    htmlStr += '<tr data-item-id="'+v.id+'"><td>'+v.datetimeCreated+'</td><td>'+v.last_name+'</td><td>'+v.first_name+'</td><td>'+v.title+'</td><td>'+v.email+'</td><td class="actions"><a href="professional.php?id='+v.id+'" class="on-default edit-row"><i class="fa fa-pencil"></i></a></td></tr>';
				                }    
				            });
				            $("#customers-table").append(htmlStr);

				            }
				        });

				});
			});
		</script>

	</body>
</html>
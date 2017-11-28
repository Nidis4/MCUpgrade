<?php
include('session.php');
include('config/core.php');
?>
<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Layouts | Porto Admin - Responsive HTML5 Template 2.0.0</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<?php
		include('includes/css.php');
		?>

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>

	</head>
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

				<section role="main" class="content-body pb-0">
					<header class="page-header">
						<h2>Layouts</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Layouts</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<section class="call-to-action call-to-action-primary call-to-action-top mb-4">
						<div class="container container-with-sidebar">
							<div class="row">
								<div class="col-xl-8">
									<div class="call-to-action-content">
										<h2 class="text-color-light mb-0 mt-4">Porto Admin is a <strong>complete package...</strong></h2>
										<p class="lead">With everything you need to create your new administration system.</p>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="call-to-action-btn float-right-xl mt-1 pt-1 mt-xl-4 pt-xl-4">
										<a href="https://themeforest.net/item/porto-admin-responsive-html5-template/8539472" target="_blank" class="btn btn-primary-scale-2 btn-lg">Purchase Now!</a>
										<span class="d-none d-xl-inline-block">
											Only <strong>$24</strong>
											<span class="arrow arrow-light hlb"></span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<section class="section">
						<div class="container container-with-sidebar">
							<div class="row center">
								<div class="col-md-12 mb-4">
									<h2 class="text-dark mb-1 font-weight-light mt-5 pt-2">Choose your <strong>Layout</strong></h2>
									<p class="lead">Layouts ready to be used. <span class="alternative-font text-5">...all layouts included!</span></p>
					
									<a class="btn btn-3d btn-xl mt-4 mb-5" href="layouts-default.html" style="background-color: #383f48; border-color: #383f48 #383f48 #22262b; color: #fff;">VIEW MAIN LAYOUT <i class="ml-4 fa fa-long-arrow-right"></i></a>
								</div>
							</div>
							<div class="row sample-item-list sample-item-list-loaded">
								
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-default.html">
												<img src="img/previews/preview-default.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Default</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-dark-header.html">
												<img src="img/previews/preview-dark-header.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Dark Header</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-dark.html">
												<img src="img/previews/preview-dark.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Dark</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-boxed.html">
												<img src="img/previews/preview-boxed-static-header.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Boxed with Static Header</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-boxed-fixed-header.html">
												<img src="img/previews/preview-boxed-fixed-header.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Boxed with Fixed Header</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-header-menu.html">
												<img src="img/previews/preview-horizontal-menu-pills.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Horizontal Menu - Pills</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-header-menu-stripe.html">
												<img src="img/previews/preview-horizontal-menu-stripe.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Horizontal Menu - Stripe</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-header-menu-top-line.html">
												<img src="img/previews/preview-horizontal-menu-top-line.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Horizontal Menu - Top Line</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-light-sidebar.html">
												<img src="img/previews/preview-light-sidebar.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Light Sidebar</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-left-sidebar-scroll.html">
												<img src="img/previews/preview-sidebar-scroll.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Scroll</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-left-sidebar-big-icons.html">
												<img src="img/previews/preview-big-icons.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Big Icons Dark</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-left-sidebar-big-icons-light.html">
												<img src="img/previews/preview-big-icons-light.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Big Icons Light</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-left-sidebar-panel.html">
												<img src="img/previews/preview-sidebar-panel-dark.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Panel Dark</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-left-sidebar-panel-light.html">
												<img src="img/previews/preview-sidebar-panel-light.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Panel Light</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-tab-navigation.html">
												<img src="img/previews/preview-tab-navigation-light.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Tab Navigation Light</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-tab-navigation-dark.html">
												<img src="img/previews/preview-tab-navigation-dark.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Tab Navigation Dark</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-tab-navigation-boxed.html">
												<img src="img/previews/preview-tab-navigation-boxed.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Tab Navigation Boxed</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-two-navigations.html">
												<img src="img/previews/preview-two-navigations.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Two Navigations</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-square-borders.html">
												<img src="img/previews/preview-square-borders.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Square Borders</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-sidebar-sizes-sm.html">
												<img src="img/previews/preview-sidebar-sm.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Size SM</h5>
									</div>
								</div>
					
								<div class="isotope-item col-sm-6 col-md-4">
									<div class="mb-5">
										<div class="thumb-preview shadow-style-1">
											<a class="thumb-image" href="layouts-sidebar-sizes-xs.html">
												<img src="img/previews/preview-sidebar-xs.jpg" class="img-fluid" alt="">
											</a>
										</div>
										<h5 class="pt-3 mg-title font-weight-semibold text-dark center text-uppercase">Left Sidebar Size XS</h5>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<section class="section custom-padding">
						<div class="container container-with-sidebar">
							<div class="row justify-content-center">
								<div class="col-lg-6 mt-3">
									<h2 class="font-weight-extra-bold text-uppercase text-dark text-5 mb-0">PORTO FRONT-END</h2>
									<p class="mb-2 pb-2">The perfect website for your administration system can be created with Porto HTML Front-End</p>
									<ul class="list list-icons list-style-none text-dark text-4 pl-none mb-2 pb-2 pr-3">
										<li class="mb-1"><i class="fa fa-check text-primary text-4 mt-1 mr-1"></i> <strong>The #1 Selling HTML Site Template on ThemeForest</strong></li>
										<li class="mb-1"><i class="fa fa-check text-primary text-4 mt-1 mr-1"></i> <strong>50+ Demos Ready to Use</strong></li>
										<li class="mb-1"><i class="fa fa-check text-primary text-4 mt-1 mr-1"></i> <strong>Code Integration - Admin features from Admin on Front-End</strong></li>
									</ul>
									<a href="http://themeforest.net/item/porto-responsive-html5-template/4106987" target="_blank" class="btn btn-primary mb-3">VIEW PORTO FRONT-END</a>
									<p class="alternative-font mb-2 mt-3">Buy now for only $16</p>
									<p class="mb-2 text-2">* Porto Front-End is not included on Porto Admin package.</p>
								</div>
								<div class="col-sm-10 col-lg-6 custom-pos">
									<img src="img/porto-front-end/preview-image-2.jpg" class="img-fluid shadow-style-2 center-block float-right" alt="" />
									<img src="img/porto-front-end/preview-image-1.jpg" class="abs-bottom-left shadow-style-2 d-none d-sm-block" alt="" />
								</div>
							</div>
						</div>
					</section>
					
					<section class="section section-padding section-full-width-bg-light">
						<div class="container container-with-sidebar">
							<div class="row">
								<div class="col-lg-6">
									<div class="owl-carousel owl-theme" data-plugin-carousel data-plugin-options='{"items": 1, "autoHeight": true, "loop": false, "nav": false, "dots": true}'>
										<div class="item">
											<div class="testimonial testimonial-with-quotes center">
												<blockquote>
													<p style="font-size: 16px !important;">Absolutely amazing! I have been using for the last ... 3 years I think. It's been great to use, I've extended the support a few times because I couldn't figure things out but support was outstanding and got back to me usually within 24 hours. Theses guys made me look great!</p>
												</blockquote>
											</div>
										</div>
										<div class="item">
											<div class="testimonial testimonial-with-quotes center">
												<blockquote>
													<p style="font-size: 16px !important;">A perfect theme for backend development. This theme has all the features I can imagine I will need.</p>
												</blockquote>
											</div>
										</div>
										<div class="item">
											<div class="testimonial testimonial-with-quotes center">
												<blockquote>
													<p style="font-size: 16px !important;">Very nice template! Also, the Porto Frontend Template is amazing! I really love his coding style, styles and scripts are perfectly organized. For me it is really easy to use and extend the theme for my needs.</p>
												</blockquote>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 d-flex align-items-center">
									<div class="mb-lg-5">
										<h2 class="font-weight-extra-bold text-uppercase text-dark text-5 mb-0 mt-0">WHAT CLIENT'S SAY</h2>
										<p class="mb-0">Actual Porto Admin reviews from everywhere. Everyone loves Porto Admin.</p>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<section class="call-to-action call-to-action-grey pb-4">
						<div class="container container-with-sidebar">
							<div class="row">
								<div class="col-xl-9 p-0">
									<div class="call-to-action-content ml-4 pt-xl-5 pb-4">
										<h2 class="mb-2">Start creating your new admin today with <strong>Porto Admin!</strong></h2>
										<p class="lead">Now that you already know that Porto Admin is the best choice for your next project, do not hesitate,<br> purchase now for only $24 and join many happy customers. Get started now.</p>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="call-to-action-btn float-right-xl center mt-1 pt-1 mt-xl-5 pt-xl-4">
										<a href="https://themeforest.net/item/porto-admin-responsive-html5-template/8539472" target="_blank" class="btn btn-primary btn-lg mb-3"><i class="fa fa-cark mr-1"></i> BUY PORTO NOW - $24</a>
										<p><span class="alternative-font text-color-primary">Join The 4000+ Happy Customers :)</span></p>
									</div>
								</div>
							</div>
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
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-appear/jquery-appear.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.js"></script>
		<script src="vendor/isotope/isotope.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.landing.dashboard.js"></script>
	</body>
</html>
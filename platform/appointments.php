<!doctype html>
<html class="fixed">
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

	</head>
	<body>
		<section class="body">

			<?php
				include('header.php');

				$appointments = file_get_contents('http://upgrade.myconstructor.gr/webservices/api/appointment/read_paging.php');
				$json = json_decode($appointments, true); // decode the JSON into an associative array
				$budget = $json['records'][0]['budget'];
				echo "Budget: ".$budget;
				foreach ($json['records'] as $field => $value) {
				    // Use $field and $value here
				    echo "1".$field." ".$value;
				}
			?>

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a class="nav-link" href="layouts-default.html">
				                            <i class="fa fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-columns" aria-hidden="true"></i>
				                            <span>Layouts</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="index.html">
				                                    Landing Page
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-default.html">
				                                    Default
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Boxed
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-boxed.html">
				                                            Static Header
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-boxed-fixed-header.html">
				                                            Fixed Header
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Horizontal Menu Header
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-header-menu.html">
				                                            Pills
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-header-menu-stripe.html">
				                                            Stripe
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-header-menu-top-line.html">
				                                            Top Line
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-dark.html">
				                                    Dark
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-dark-header.html">
				                                    Dark Header
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-two-navigations.html">
				                                    Two Navigations
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Tab Navigation
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-tab-navigation-dark.html">
				                                            Tab Navigation Dark
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-tab-navigation.html">
				                                            Tab Navigation Light
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-tab-navigation-boxed.html">
				                                            Tab Navigation Boxed
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-light-sidebar.html">
				                                    Light Sidebar
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-left-sidebar-collapsed.html">
				                                    Left Sidebar Collapsed
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-left-sidebar-scroll.html">
				                                    Left Sidebar Scroll
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Left Sidebar Big Icons
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-left-sidebar-big-icons.html">
				                                            Left Sidebar Big Icons Dark
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-left-sidebar-big-icons-light.html">
				                                            Left Sidebar Big Icons Light
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Left Sidebar Panel
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-left-sidebar-panel.html">
				                                            Left Sidebar Panel Dark
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-left-sidebar-panel-light.html">
				                                            Left Sidebar Panel Light
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li class="nav-parent">
				                                <a>
				                                    Left Sidebar Sizes
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="layouts-sidebar-sizes-xs.html">
				                                            Left Sidebar XS
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-sidebar-sizes-sm.html">
				                                            Left Sidebar SM
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="layouts-sidebar-sizes-md.html">
				                                            Left Sidebar MD
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="layouts-square-borders.html">
				                                    Square Borders
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-copy" aria-hidden="true"></i>
				                            <span>Pages</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="pages-signup.html">
				                                    Sign Up
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-signin.html">
				                                    Sign In
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-recover-password.html">
				                                    Recover Password
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-lock-screen.html">
				                                    Locked Screen
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-user-profile.html">
				                                    User Profile
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-session-timeout.html">
				                                    Session Timeout
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-calendar.html">
				                                    Calendar
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-timeline.html">
				                                    Timeline
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-media-gallery.html">
				                                    Media Gallery
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-invoice.html">
				                                    Invoice
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-blank.html">
				                                    Blank Page
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-404.html">
				                                    404
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-500.html">
				                                    500
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-log-viewer.html">
				                                    Log Viewer
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="pages-search-results.html">
				                                    Search Results
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-tasks" aria-hidden="true"></i>
				                            <span>UI Elements</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="ui-elements-typography.html">
				                                    Typography
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Icons <span class="mega-sub-nav-toggle toggled float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-1"></span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-icons-elusive.html">
				                                            Elusive
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-icons-font-awesome.html">
				                                            Font Awesome
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-icons-line-icons.html">
				                                            Line Icons
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-icons-meteocons.html">
				                                            Meteocons
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-tabs.html">
				                                    Tabs
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-cards.html">
				                                    Cards
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-widgets.html">
				                                    Widgets
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-portlets.html">
				                                    Portlets
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-buttons.html">
				                                    Buttons
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-alerts.html">
				                                    Alerts
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-notifications.html">
				                                    Notifications
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-modals.html">
				                                    Modals
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-lightbox.html">
				                                    Lightbox
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-progressbars.html">
				                                    Progress Bars
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-sliders.html">
				                                    Sliders
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-carousels.html">
				                                    Carousels
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-accordions.html">
				                                    Accordions
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-toggles.html">
				                                    Toggles
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-nestable.html">
				                                    Nestable
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-tree-view.html">
				                                    Tree View
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-scrollable.html">
				                                    Scrollable
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-grid-system.html">
				                                    Grid System
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-charts.html">
				                                    Charts
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Animations <span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-2"></span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-animations-appear.html">
				                                            Appear
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-animations-hover.html">
				                                            Hover
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Loading <span class="mega-sub-nav-toggle float-right" data-toggle="collapse" data-target=".mega-sub-nav-sub-menu-3"></span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-loading-overlay.html">
				                                            Overlay
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="ui-elements-loading-progress.html">
				                                            Progress
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="ui-elements-extra.html">
				                                    Extra
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-list-alt" aria-hidden="true"></i>
				                            <span>Forms</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="forms-basic.html">
				                                    Basic
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="forms-advanced.html">
				                                    Advanced
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="forms-validation.html">
				                                    Validation
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="forms-layouts.html">
				                                    Layouts
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="forms-wizard.html">
				                                    Wizard
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="forms-code-editor.html">
				                                    Code Editor
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent nav-expanded nav-active">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-table" aria-hidden="true"></i>
				                            <span>Tables</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="tables-basic.html">
				                                    Basic
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="tables-advanced.html">
				                                    Advanced
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="tables-responsive.html">
				                                    Responsive
				                                </a>
				                            </li>
				                            <li class="nav-active">
				                                <a class="nav-link" href="tables-editable.html">
				                                    Editable
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="tables-ajax.html">
				                                    Ajax
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="tables-pricing.html">
				                                    Pricing
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li>
				                        <a class="nav-link" href="mailbox-folder.html">
				                            <span class="float-right badge badge-primary">182</span>
				                            <i class="fa fa-envelope" aria-hidden="true"></i>
				                            <span>Mailbox</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-map-marker" aria-hidden="true"></i>
				                            <span>Maps</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="maps-google-maps.html">
				                                    Basic
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="maps-google-maps-builder.html">
				                                    Map Builder
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="maps-vector.html">
				                                    Vector
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-asterisk" aria-hidden="true"></i>
				                            <span>Extra</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="extra-changelog.html">
				                                    Changelog
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="extra-ajax-made-easy.html">
				                                    Ajax Made Easy
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li>
				                        <a class="nav-link" href="http://themeforest.net/item/porto-responsive-html5-template/4106987?ref=Okler">
				                            <i class="fa fa-external-link" aria-hidden="true"></i>
				                            <span>Front-End <em class="not-included">(Not Included)</em></span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fa fa-align-left" aria-hidden="true"></i>
				                            <span>Menu Levels</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a>
				                                    First Level
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Second Level
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a>
				                                            Second Level Link #1
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a>
				                                            Second Level Link #2
				                                        </a>
				                                    </li>
				                                    <li class="nav-parent">
				                                        <a class="nav-link" href="#">
				                                            Third Level
				                                        </a>
				                                        <ul class="nav nav-children">
				                                            <li>
				                                                <a>
				                                                    Third Level Link #1
				                                                </a>
				                                            </li>
				                                            <li>
				                                                <a>
				                                                    Third Level Link #2
				                                                </a>
				                                            </li>
				                                        </ul>
				                                    </li>
				                                </ul>
				                            </li>
				                        </ul>
				                    </li>
				
				                </ul>
				            </nav>
				
				            <hr class="separator" />
				
				            <div class="sidebar-widget widget-tasks">
				                <div class="widget-header">
				                    <h6>Projects</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul class="list-unstyled m-0">
				                        <li><a href="#">Porto HTML5 Template</a></li>
				                        <li><a href="#">Tucson Template</a></li>
				                        <li><a href="#">Porto Admin</a></li>
				                    </ul>
				                </div>
				            </div>
				
				            <hr class="separator" />
				
				            <div class="sidebar-widget widget-stats">
				                <div class="widget-header">
				                    <h6>Company Stats</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul>
				                        <li>
				                            <span class="stats-title">Stat 1</span>
				                            <span class="stats-complete">85%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
				                                    <span class="sr-only">85% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 2</span>
				                            <span class="stats-complete">70%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
				                                    <span class="sr-only">70% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 3</span>
				                            <span class="stats-complete">2%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
				                                    <span class="sr-only">2% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->

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
						
								<h2 class="card-title">Default</h2>
							</header>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-0" id="datatable-editable">
									<thead>
										<tr>
											<th>Rendering engine</th>
											<th>Browser</th>
											<th>Platform(s)</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr data-item-id="1">
											<td>Trident</td>
											<td>Internet
												Explorer 4.0
											</td>
											<td>Win 95+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="2">
											<td>Trident</td>
											<td>Internet
												Explorer 5.0
											</td>
											<td>Win 95+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="3">
											<td>Trident</td>
											<td>Internet
												Explorer 5.5
											</td>
											<td>Win 95+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="4">
											<td>Trident</td>
											<td>Internet
												Explorer 6
											</td>
											<td>Win 98+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="5">
											<td>Trident</td>
											<td>Internet Explorer 7</td>
											<td>Win XP SP2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="6">
											<td>Trident</td>
											<td>AOL browser (AOL desktop)</td>
											<td>Win XP</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="7">
											<td>Gecko</td>
											<td>Firefox 1.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="8">
											<td>Gecko</td>
											<td>Firefox 1.5</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="9">
											<td>Gecko</td>
											<td>Firefox 2.0</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="10">
											<td>Gecko</td>
											<td>Firefox 3.0</td>
											<td>Win 2k+ / OSX.3+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="11">
											<td>Gecko</td>
											<td>Camino 1.0</td>
											<td>OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="12">
											<td>Gecko</td>
											<td>Camino 1.5</td>
											<td>OSX.3+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="13">
											<td>Gecko</td>
											<td>Netscape 7.2</td>
											<td>Win 95+ / Mac OS 8.6-9.2</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="14">
											<td>Gecko</td>
											<td>Netscape Browser 8</td>
											<td>Win 98SE+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="15">
											<td>Gecko</td>
											<td>Netscape Navigator 9</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="16">
											<td>Gecko</td>
											<td>Mozilla 1.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="17">
											<td>Gecko</td>
											<td>Mozilla 1.1</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="18">
											<td>Gecko</td>
											<td>Mozilla 1.2</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="19">
											<td>Gecko</td>
											<td>Mozilla 1.3</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="20">
											<td>Gecko</td>
											<td>Mozilla 1.4</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="21">
											<td>Gecko</td>
											<td>Mozilla 1.5</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="22">
											<td>Gecko</td>
											<td>Mozilla 1.6</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="23">
											<td>Gecko</td>
											<td>Mozilla 1.7</td>
											<td>Win 98+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="24">
											<td>Gecko</td>
											<td>Mozilla 1.8</td>
											<td>Win 98+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="25">
											<td>Gecko</td>
											<td>Seamonkey 1.1</td>
											<td>Win 98+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="26">
											<td>Gecko</td>
											<td>Epiphany 2.20</td>
											<td>Gnome</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="27">
											<td>Webkit</td>
											<td>Safari 1.2</td>
											<td>OSX.3</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="28">
											<td>Webkit</td>
											<td>Safari 1.3</td>
											<td>OSX.3</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="29">
											<td>Webkit</td>
											<td>Safari 2.0</td>
											<td>OSX.4+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="30">
											<td>Webkit</td>
											<td>Safari 3.0</td>
											<td>OSX.4+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="31">
											<td>Webkit</td>
											<td>OmniWeb 5.5</td>
											<td>OSX.4+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="32">
											<td>Webkit</td>
											<td>iPod Touch / iPhone</td>
											<td>iPod</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="33">
											<td>Webkit</td>
											<td>S60</td>
											<td>S60</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="34">
											<td>Presto</td>
											<td>Opera 7.0</td>
											<td>Win 95+ / OSX.1+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="35">
											<td>Presto</td>
											<td>Opera 7.5</td>
											<td>Win 95+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="36">
											<td>Presto</td>
											<td>Opera 8.0</td>
											<td>Win 95+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="37">
											<td>Presto</td>
											<td>Opera 8.5</td>
											<td>Win 95+ / OSX.2+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="38">
											<td>Presto</td>
											<td>Opera 9.0</td>
											<td>Win 95+ / OSX.3+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="39">
											<td>Presto</td>
											<td>Opera 9.2</td>
											<td>Win 88+ / OSX.3+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="40">
											<td>Presto</td>
											<td>Opera 9.5</td>
											<td>Win 88+ / OSX.3+</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="41">
											<td>Presto</td>
											<td>Opera for Wii</td>
											<td>Wii</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="42">
											<td>Presto</td>
											<td>Nokia N800</td>
											<td>N800</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="43">
											<td>Presto</td>
											<td>Nintendo DS browser</td>
											<td>Nintendo DS</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="44">
											<td>KHTML</td>
											<td>Konqureror 3.1</td>
											<td>KDE 3.1</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="45">
											<td>KHTML</td>
											<td>Konqureror 3.3</td>
											<td>KDE 3.3</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="46">
											<td>KHTML</td>
											<td>Konqureror 3.5</td>
											<td>KDE 3.5</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="47">
											<td>Tasman</td>
											<td>Internet Explorer 4.5</td>
											<td>Mac OS 8-9</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="48">
											<td>Tasman</td>
											<td>Internet Explorer 5.1</td>
											<td>Mac OS 7.6-9</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="49">
											<td>Tasman</td>
											<td>Internet Explorer 5.2</td>
											<td>Mac OS 8-X</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="50">
											<td>Misc</td>
											<td>NetFront 3.1</td>
											<td>Embedded devices</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="51">
											<td>Misc</td>
											<td>NetFront 3.4</td>
											<td>Embedded devices</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="52">
											<td>Misc</td>
											<td>Dillo 0.8</td>
											<td>Embedded devices</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="53">
											<td>Misc</td>
											<td>Links</td>
											<td>Text only</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="54">
											<td>Misc</td>
											<td>Lynx</td>
											<td>Text only</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="55">
											<td>Misc</td>
											<td>IE Mobile</td>
											<td>Windows Mobile 6</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr data-item-id="56">
											<td>Misc</td>
											<td>PSP browser</td>
											<td>PSP</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<tr class="gradeU" data-item-id="57">
											<td>Other browsers</td>
											<td>All others</td>
											<td>-</td>
											<td class="actions">
												<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
												<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
												<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
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
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.datatables.editable.js"></script>
	</body>
</html>
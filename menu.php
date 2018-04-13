<body>	
	<div class="container container-nav-menu overlay">
				<nav id="myTopnav" class="navbar navbar-default">
					
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						     <a class="navbar-brand" href="<?php echo $api_url; ?>"><img src="img/home-page/logo-mcr-310.png" /></a>
						    </div>
						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav">
						        <li><a href="<?php echo $api_url; ?>">ΑΡΧΙΚΗ</a></li>
						        <li><a href="<?php echo $api_url; ?>homes/search_constructors/all/all/all/126/177">ΚΑΤΑΛΟΓΟΣ ΕΠΑΓΓΕΛΜΑΤΙΩΝ</a></li>
						        <li><a href="<?php echo $api_url; ?>blog/">BLOG</a></li>
						        <li class="active litel"><a href="tel:2103009323">210 300 9323</a></li>
						        <li><a href="<?php echo $api_url; ?>blog/">ΕΝ</a></li>
						        <li><a href="<?php echo $api_url; ?>blog/">ΕL</a></li>
						      </ul>
						      <ul class="nav navbar-nav navbar-right">
						        <li><a href="<?php echo $api_url; ?>members/chooseUserType"><span class="glyphicon glyphicon-user"></span> ΕΓΓΡΑΦΗ</a></li>
						        <li>
						        	<?php if(@$_SESSION['login_user']){?>
						        			<a href="<?php echo $api_url.'logout.php';?>"><span class="glyphicon glyphicon-log-out"></span> Αποσυνδέση</a>
						        	<?php }else{?>
						        			<a href="<?php echo $api_url.'login.php';?>"><span class="glyphicon glyphicon-log-in"></span> ΣΥΝΔΕΣΗ</a>
						        	<?php }?>
						        </li>
						      </ul>
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->					
				</nav>
	</div>
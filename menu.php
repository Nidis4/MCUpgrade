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
						      <ul class="nav navbar-nav navbar-right">
						      	<li><a href="https://myconstructor.gr/">ΑΡΧΙΚΗ</a></li>
						        <li><a href="<?php echo $directory_url; ?>">ΚΑΤΑΛΟΓΟΣ ΕΠΑΓΓΕΛΜΑΤΙΩΝ</a></li>
						        <li><a href="https://myconstructor.gr/blog/">BLOG</a></li>
						        <li><a href="https://myconstructor.gr/blog/">ΕΝ</a></li>
						        <li><a href="https://myconstructor.gr/blog/">ΕL</a></li>
						        <li class="active litel"><a href="tel:2103009323">210 300 9323</a></li>
						        <li><a href="<?php echo $signup_url; ?>"><span class="glyphicon glyphicon-user"></span> ΕΓΓΡΑΦΗ</a></li>
						        <li>
						        	<?php if(@$_SESSION['login_user']){?>
						        			<a href="<?php echo SITE_URL.'logout.php';?>"><span class="glyphicon glyphicon-log-out"></span> Αποσυνδέση</a>
						        	<?php }else{?>
						        			<a href="<?php echo SITE_URL.'login.php';?>"><span class="glyphicon glyphicon-log-in"></span> ΣΥΝΔΕΣΗ</a>
						        	<?php }?>
						        </li>
						      </ul>
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->					
				</nav>
	</div>
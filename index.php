<?php 
	include('constants.php');
	include('front_end_config/core.php'); 
	session_start(); // Starting Session
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $api_url; ?>img/favicon.png">

	<title>ΜyConstructor</title>
	<link rel="alternate" hreflang="el" href="<?php echo $api_url; ?>">
	<meta name="description" content="Όλες οι τεχνικές και κατασκευαστικές εργασίες βρίσκονται εδώ! Ανακάλυψε
	τον κατάλογο των επαγγελματιών μας & βρες εκείνον που καλύπτει τις ανάγκες σου. Επέλεξε το MyConstructor
	για μια γκάμα εργασιών από μετακομίσεις μέχρι ελαιοχρωματισμούς και καθαρισμούς..και πες πως έγινε!">
	<meta name="robots" content="index,follow">
	<link rel="canonical" href="<?php echo $api_url; ?>">
	<link href="<?php echo $api_url; ?>assets/bootstrap337/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="<?php echo $api_url; ?>assets/bootstrap337/js/bootstrap.min.js"></script> 

       <!-- Custom styles -->
    <!--<link rel="stylesheet" href="social-likes_flat.css">-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo $api_url; ?>css/style.css?version=24">
  	<link rel="stylesheet" type="text/css" href="<?php echo $api_url; ?>css/homepage.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo $api_url; ?>css/sidenav.css">


</head>
<body>

	
	<div class="container-fluid container-hero">
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
						     <a class="navbar-brand" href="<?php echo $api_url; ?>"><img src="img/home-page/logo-white.png" /></a>
						    </div>
						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      
						      <ul class="nav navbar-nav navbar-right">
						      	<li><a href="<?php echo $api_url; ?>">ΑΡΧΙΚΗ</a></li>
						        <li><a href="<?php echo $directory_url; ?>">ΚΑΤΑΛΟΓΟΣ ΕΠΑΓΓΕΛΜΑΤΙΩΝ</a></li>
						        <li><a href="<?php echo $api_url; ?>blog/">BLOG</a></li>
						        <li class="lang-menu"><a href="<?php echo $api_url; ?>blog/">ΕΝ</a></li>
						        <li class="lang-menu"><a href="<?php echo $api_url; ?>blog/">ΕL</a></li>
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

			
				<div class="row row-search-titles">
					<h2>Όλες οι τεχνικές και οικοδομικές εργασίες</h2>
					<p>Βρες Αξιολογημένους & Οικονομικούς επαγγελματίες για όλες τις εργασίες για το σπίτι και την οικοδομή!</p>
					<?php include('search.php'); ?>
				</div>

			
	</div>
	<div class="container-fluid container-prop-works">
		<div class="row row-titles">
			<div class="col-md-12 col-first-titles">
				<h2>Ποια είναι η εργασία που σε ενδιαφέρει;</h2>
				<p>Δημοφιλείς κατηγορίες βάσει χρηστών.</p>
			</div>
		</div>
		<div class="row prop-works-row">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-4">
						<a href="<?php echo $api_url; ?>katalogos/texnikoi-asfaleias/">
							<div class="category-box box-texnikos-asfaleias">
								<div class="category-box-title">
						            <h3>Τεχνικός Ασφαλείας
						                <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/texnikos-asfaleias.png" /></span>
						            </h3>
						        </div>
							</div>
						</a>
					</div>
					<div class="col-5">
						<a href="<?php echo $api_url; ?>katalogos/pea/">
							<div class="category-box box-pea">
								<div class="category-box-title">
									<h3>Ενεργειακό Πιστοποιητικό <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/pea.png" /></span>
							        </h3>
							    </div>
							</div>
						</a>
					</div>
					<div class="col">
						<a href="<?php echo $api_url; ?>katalogos/elaioxromatismoi/">
							<div class="category-box box-painter">
								<div class="category-box-title">
									<h3>Βάψιμο <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/vapsimo.png" /></span>
							        </h3>
							    </div>
							</div>
						</a>
					</div>
				</div>
				<div class="row sec-row-works">
					<div class="col-4">
						<a href="<?php echo $api_url; ?>katalogos/klimatistiko/">
							<div class="category-box  box-aircondition">
								<div class="category-box-title">
									<h3>Κλιματιστικό <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/klimatistiko.png" /></span>
							        </h3>
							    </div>
							</div>
						</a>
					</div>
					<div class="col-9">
						<a href="/services/anakainisi/">
							<div class="category-box box-renovation">
								<div class="category-box-title">
						            <h3>Γενική Ανακαίνιση
						                <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/anakainisi-kouzinas.png" /></span>
						            </h3>
						        </div>
							</div>
						</a>
					</div>
					
				</div>
				
			</div>
			<div class="col-sm-3">
				<div class="row full-height">
					<div class="col-3">
						<a href="<?php echo $api_url; ?>katalogos/metakomiseis-metaforikes/">
							<div class="category-box category-box-alt box-mover">
								<div class="category-box-title">
						            <h3>Μετακομίσεις
						                <span class="category-box-title-count"><img src="<?php echo $api_url; ?>img/cat_icons/metakomisis.png" /></span>
						            </h3>
						        </div>
							</div>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="container-fluid container-how-it">
		<div class="row row-how-it-titles">
			<h3>Γιατί να επιλέξεις το MyConstructor.gr;</h3>
			<p>Μάθε τις δυνατότητες που σου προσφέρει.</p>
		</div>
		<div class="row row-how-it-works">
			<div class="col-md-4 col-how-it">
				<div class="col-how-it-inner">
					<div class="how-it-img">
						<img src="<?php echo $api_url; ?>img/home-page/how_11.png" />
					</div>
					<h4>Καταχώρηση Έργου</h4>
					<p>Καταχώρησε online στη φόρμα την εργασία που επιθυμείς και λάβε άμεσα δωρεάν προσφορά από τα εξειδικευμένα συνεργεία μας.</p>
				</div>
			</div>
			<div class="col-md-4 col-how-it">
				<div class="col-how-it-inner">
					<div class="how-it-img">
						<img src="<?php echo $api_url; ?>img/home-page/how_21.png" />
					</div>
					<h4>Κατάλογος Επαγγελματιών</h4>
					<p>Μπες στον κατάλογο, σύγκρινε τιμές και αξιολογήσεις και επέλεξε τον επαγγελματία που σου ταιριάζει.</p>
				</div>
			</div>
			<div class="col-md-4 col-how-it">
				<div class="col-how-it-inner">
					<div class="how-it-img">
						<img src="<?php echo $api_url; ?>img/home-page/how_31.png" />
					</div>
					<h4>Αξιολόγηση Επαγγελματιών</h4>
					<p>Μετά το πέρας της εργασίας αξιολόγησε τον επαγγελματία  και ενημέρωσε τους επόμενους χρήστες για την εμπειρία σου.</p>
				</div>
			</div>
			<div class="col-sm-12">
				<a class="a-cycle-btn" href="<?php echo $api_url; ?>helpful_pages/how_it_works.php">
					<div class="cycle-btn">+</div>
				</a>
			</div>
		</div>
	</div>

	<div class="container-fluid container-looking">
		<div class="row row-looking">
			<div class="col-md-6">
				<a href="<?php echo $api_url; ?>sign_up.php">
					<div class="category-box box-looking">
						<div class="col-looking">
							<div class="col-looking-inner">
								<p>Είσαι Επαγγελματίας;</p>
								<h4>Ανέλαβε νέες δουλειές!</h4>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="delimiter"><span>Η</span></div>
			<div class="col-md-6">
				<a href="<?php echo $api_url; ?>katalogos/">
					<div class="category-box box-job">
						<div class="col-looking">
							<div class="col-looking-inner">
								<p>Ενδιαφέρεσαι για τεχνική εργασία;</p>
								<h4>Κλείσε τώρα ραντεβού!</h4>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="container-fluid container-articles">
		<div class="row row-articles-title">
			<div class="col-md-12">
				<h3>Tips & Tricks</h3>
				<p>Έξυπνες ιδέες και λύσεις για οποιαδήποτε εργασία και αν σε ενδιαφέρει!</p>
			</div>
		</div>
		<div class="row row-articles">
			<div class="col-sm-4">
				<a href="<?php echo $api_url; ?>services/anakainisi-spitiou/">
					<div class="article">
						<img src="<?php echo $api_url; ?>img/home-page/renovation-article.jpg" />
						<div class="article-title">
							<h4>Γενική Ανακαίνιση Οικίας</h4>
							<p>Λύσε απορίες σχετικά με μερική ή γενική ανακαίνιση οικίας και πάρε χρήσιμες ιδέες για την ανακαίνιση του χώρου σου.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo $api_url; ?>blog/matakomiseis-metafores/">
					<div class="article">
						<img src="<?php echo $api_url; ?>img/home-page/movers2.jpg" />
						<div class="article-title">
							<h4>Μεταφορές</h4>
							<p>Μετακομίζεις ή ενδιαφέρεσαι για μεταφορά; Διάβασε εδώ τι πρέπει να προσέξεις πριν ξεκινήσεις την μετακόμισή σου.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="<?php echo $api_url; ?>blog/synergeio-katharismou/">
					<div class="article">
						<img src="<?php echo $api_url; ?>img/home-page/cleaning-company.jpg" />
						<div class="article-title">
							<h4>Συνεργεία Καθαρισμού</h4>
							<p>Καθαρισμοί σπιτιού ή επαγγελματικών χώρων. Ενημερώσου για τις παρεχόμενες υπηρεσίες και το κόστος!</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-blog-btn">
				<a class="a-btn-blog" href="<?php echo $api_url; ?>blog/">
					<div class="btn-blog">
	            		Δέιτε περισσότερα  <i class="fa fa-angle-right"></i>
	        		</div>
	        	</a>
			</div>
		</div>
	</div>
	<div class="container-fluid mcr-social-container">
	<div class="row">
		<div class="col-md-12">
			<h5 class="title-heading-center">MyConstructor.gr Is Getting Social..</h5>
			<p>Είστε σε καλά χέρια! Ποιοί μίλησαν για το MyConstructor.gr</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="div-mycon-social">
				<ul class="mycon-social">
					<li><img src="https://myconstructor.gr/blog/wp-content/uploads/2018/03/zougla_logo.png"></li>
					<li><img src="https://myconstructor.gr/blog/wp-content/uploads/2018/03/dikaiologitika.png"></li>
					<li><img src="https://myconstructor.gr/blog/wp-content/uploads/2018/03/newsbeasts.png"></li>
					<li><img src="https://myconstructor.gr/blog/wp-content/uploads/2018/03/xe_logo.png"></li>
					<li><img src="https://myconstructor.gr/blog/wp-content/uploads/2018/03/amna.jpg"></li>
				</ul>
  			</div>
		</div>
	</div>
</div>

<?php include('footer.php') ?>
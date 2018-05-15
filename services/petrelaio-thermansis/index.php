<?php


			$server='127.0.0.1';

            $userdb='stgmycon_db_user';

            $pass='u~,oEFS]5b}I';

            $db='my_constructor';

	
      
  			$conn = mysqli_connect($server, $userdb, $pass, $db);
           // $conn->query("SET title_greek 'utf8';"); 
            $conn->query("SET CHARACTER SET 'utf8';");


            $sql = "SELECT * FROM priceoil ";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {

			$price= $row["oilprice"];
						
			}
                                 	
          

          	$price = str_replace('.', ',', 	$price);

          	//$price= $price - 0.025;

          //	
          	$scriptprice= str_replace(',', '.', 	$price);
			
			//$price= floatval($price);
          	//echo $price;

            ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			$conn->close();

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="../../favicon.ico">
	<title>Πετρέλαιο Θέρμανσης</title>

	<link rel="alternate" hreflang="el" href="https://myconstructor.gr/services/petrelaio-thermansis/">
    <meta name="description" content="Πετρέλαιο θέρμανσης κατευθείαν από τα διυλιστήρια της ΕΛΙΝ. Παραγγείλτε τώρα πετρέλαιο θέρμανσης από το MYCONSTRUCTOR.GR. Κάντε τώρα την παραγγελία σας και το βυτιοφόρο θα έρθει σφραγισμένο στο σπίτι σας κατευθείαν από τα διυλιστήρια της ΕΛΙΝ.">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://myconstructor.gr/">
    <meta property="og:locale" content="el_GR">
    <meta property="og:title" content="Πετρέλαιο Θέρμανσης κατευθείαν από τα διυλιστήρια της ΕΛΙΝ - Σφραγισμένο Βυτίο | MyConstructor">
    <meta property="og:description" content="Πετρέλαιο θέρμανσης κατευθείαν από τα διυλιστήρια της ΕΛΙΝ. Παραγγείλτε τώρα πετρέλαιο θέρμανσης από το MYCONSTRUCTOR.GR. Κάντε τώρα την παραγγελία σας και το βυτιοφόρο θα έρθει σφραγισμένο στο σπίτι σας κατευθείαν από τα διυλιστήρια της ΕΛΙΝ.">
    <meta property="og:url" content="https://myconstructor.gr/services/petrelaio-thermansis/">
    <meta property="og:site_name" content="MyConstructor">
    <meta property="og:locale" content="el_GR" />

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/jquery.json-2.4.min2.js"></script>
    Bootstrap core CSS -->
    <link href="https://myconstructor.gr/services/assets/bootstrap337/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="../assets/bootstrap337/js/bootstrap.min.js"></script> 

       <!-- Custom styles -->
    <!--<link rel="stylesheet" href="social-likes_flat.css">-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="css/style.css?version=10" rel="stylesheet">

  	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48360830-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-48360830-2');
</script>


</head>

<body>
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
     <a class="navbar-brand" href="https://myconstructor.gr"><img src="img/mcr.png" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="color:#2b347f; font-weight: bold;">
        <li><a style="color:#2b347f;" href="https://myconstructor.gr/">Αρχική</a></li>
        <li><a style="color:#2b347f;" href="https://myconstructor.gr/services/petrelaio-thermansis/">Πετρέλαιο Θέρμανσης</a></li>
        <li><a style="color:#2b347f;" href="https://myconstructor.gr/blog/">Blog</a></li>
        <li class="active"><a href="tel:2103009323" style ="font-size:17px;">210 300 9323</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color:#2b347f;" href="https://myconstructor.gr/members/chooseUserType"><span class="glyphicon glyphicon-user"></span> Εγγραφή</a></li>
        <li><a style="color:#2b347f;" href="https://myconstructor.gr/members/login"><span class="glyphicon glyphicon-log-in"></span> Σύνδεση</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container sliderContainer">
		
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
			      <div class="item active">
			        <img src="img/family-1.jpg" alt="" style="width:100%;">
			        <div class="carousel-caption">
			        	<div class="col-md-8 car-first-img">
				        	<h1 class="carousel-h1"><b>Πετρέλαιο Θέρμανσης</b></h1>
				        	<p class="carousel-content" style="font-size: 32px;"><span style="background: red; font-size:38px; font-weight:bold;">Το πιό φθηνό πετρέλαιο γιατι το παραδίδουμε ΟΛΟ!</span><br/>Σφραγισμένο βυτιοφόρο της ΕΛΙΝ κατευθείαν από τα διυλιστήρια. </p>
				        	<div class="price"><span class="oilp"><?php echo $price; ?></span>€/λίτρο</div>
				        	<a href="#buyoil"><div class="offer-btn">ΠΑΡΑΓΓΕΛΙΑ ONLINE</div></a>
				        	<p class="mcr"><a href="tel:2103009323"><span>210 300 9323</span></a></p>
			        	</div>
			        </div>
			      </div> 

			      <div class="item">
			        <img src="img/dilistiria.jpg" alt="Διυλιστίρια" style="width:100%;">

			        <div class="carousel-caption">
			        	<div class="col-md-8 car-first-img">
				        	<h1 class="carousel-h1">Σφραγισμένο Βυτιοφόρο Κατευθείαν από τα Διυλιστήρια</h1>
				        	<p class="carousel-content">Βάλτε πλέον άφοβα πετρέλαιο με τη σφραγίδα της ΕΛΙΝ. Μην αγχώνεστε πια δεν θα πέσετε θύμα του εκάστοτε μεσάζοντα που σας προμηθεύει με πετρέλαιο θέρμανσης. Με το ΜyConstructor και την ΕΛΙΝ αυτό αποτελεί παρελθόν.</p>
				        	<div class="price"><span class="oilp"><?php echo $price; ?></span>€/λίτρο</div>
				        	<a href="#buyoil"><div class="offer-btn">ΠΑΡΑΓΓΕΛΙΑ ONLINE</div></a>
				        	<p class="mcr"><a href="tel:2103009323"><span>210 300 9323</span></a></p>
			        	</div>
			        </div>

			      </div>
			    
			      <!--<div class="item">
			        <img src="img/family-1.jpg" alt="New york" style="width:100%;">
			      </div>-->
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-h2">
			<h2>Πετρέλαιο θέρμανσης κατευθείαν από τα ΕΛΠΕ...σας εγγυόμαστε και το τελευταίο λίτρο!</h2>

			<p class="p-sub-title">
				Με το MyConstructor μπορείτε να έχετε <b>πετρέλαιο θέρμανσης κατευθείαν από τα διυλιστήρια της ΕΛΠΕ με ιδιόκτητα βυτιοφόρα της ΕΛΙΝ</b>, σε μοναδικά συμφέρουσα τιμή και χωρίς τον κίνδυνο εξαπάτησης. Το <b>βυτιοφόρο</b> έρχεται σπίτι σας σφραγισμένο κατευθείαν από τα διυλιστήρια της ΕΛΠΕ!</p>
			<p class="p-sub-tel"><b>Καλέστε μας σήμερα, για την άμεση παράδοση του πετρελαίου σας.<span class="glyphicon glyphicon-earphone"></span></b> <span class="tel-box">210 300 9323</span></p>
			<div class="euro-img"><img  src="img/eurobank.png"></div>
			<p class="p-eurobarnk">ΚΕΡΔΙΖΕΤΕ <b>3% ΕΠΙΣΤΡΟΦΗ</b> ΑΠΟ ΤΙΣ ΑΓΟΡΕΣ ΣΑΣ ΜΕ ΤΙΣ ΠΙΣΤΩΤΙΚΕΣ ΚΑΡΤΕΣ ΤΗΣ ΤΡΑΠΕΖΑΣ <b>EUROBANK</b>.<br>ΔΥΝΑΤΟΤΗΤΑΣ ΠΛΗΡΩΜΗΣ ΣΕ 9 ΑΤΟΚΕΣ ΔΟΣΕΙΣ.</p>
			<p class="p-eurobarnk"></p>

		</div>

	</div>

</div>


<div class="container offerContainer">
	<div class="row">
		<div class="col-md-6">
			<img src="img/mcr-elin-tanker-1.jpg">
		</div>
		<div class="col-md-6">
			<p class="p-offer">ΓΙΑ ΝΑ ΚΕΡΔΙΣΕΤΕ ΤΩΡΑ ΕΚΠΤΩΣΗ 10 ΕΥΡΩ ΣΤΑ 1,000 lt ΚΑΛΕΣΤΕ ΜΑΣ ΤΩΡΑ 210 300 9323. Ή ΖΗΤΗΣΤΕ ΜΑΣ ΝΑ ΣΑΣ ΚΑΛΕΣΟΥΜΕ </p>
			<p class="p-offer2">*η έκπτωση αφορά πληρωμή τοις μετρητοίς*</p>
			<p class="p-offer3"><i>Η διαδικασία γίνεται γρήγορα,χωρίς καμία δική σας ανάμειξη.Το μόνο που χρειαζόμαστε είναι τα στοιχεία σας.Το myconstructor έχει φροντίσει για εσάς!</i></p>

			<div class="col-call-back">
		    

		   

		    	<div  type="button" class="call-btn" data-toggle="modal" data-target="#callback">
		    		ΖΗΤΗΣΤΕ ΝΑ ΣΑΣ ΚΑΛΕΣΟΥΜΕ
		    	</div>

			</div>
		</div>
	</div>
</div>


<div class="container whymcrContainer">
	<div class="row">

		<div class="col-md-12 priceContainer">
			<h2>ΤΙΜΗ ΠΕΤΡΕΛΑΙΟΥ ΘΕΡΜΑΝΣΗΣ</h2>

			<div class="slidecontainer">
  				<input type="range" min="1" max="2000" value="1200" class="slider" id="myRange">
  				<div class="mesure">
  					<div class="one"></div>
  					<div class="oneval">1</div>
  					<div class="five100"></div>
  					<div class="five100val">500</div>
  					<div class="onethousand"></div>
  					<div class="onethousandval">1000</div>
  					<div class="onethousandfivehundred"></div>
  					<div class="onethousandfivehundredval">1500</div>
  					<div class="twothousands"></div>
  					<div class="twothousandsval">2000</div>

  				</div>
  				
			</div>	
		</div>
		<div class="col-md-12">
			<div class="litra"><span id="demo"></span>/λίτρα</div><div class="price"><span id="oilprice"></span></div>
		</div>

		<div class="col-md-6">
			<div class="price-oil"><p style="font-size:27px;" class="pay-title">ΠΛΗΡΩΜΗ ΜΕΤΡΗΤΟΙΣ</p>
				<p class="total-price">Τελικό ποσό: <span class="total-price-span"></span></p>
				<p class="offer">Έχετε εξοικονομήσει: <span class="offer-span"></span></p>
			</div>
		</div>
		

		<div class="col-md-6">
			<div class="price-oil-eurobank"><p class="pay-title">ΠΛΗΡΩΜΗ ΜΕ ΠΙΣΤΩΤΙΚΗ ΚΑΡΤΑ EUROBANK</p>
				<p class="total-price-eurobank">Τελικό ποσό: <span class="total-price-eurobank-span"></span></p>
				<p class="offer-eurobank">Έχετε επιστροφή: <span class="offer-eurobank-span"></span></p>
				<p class="offer-eurobank">Έχετε εξοικονομήσει: <span class="offer-mcr-span" style="font-size:27px;"></span></p>
			</div>

		</div>

		<div class="col-md-12">
			<a href="#buyoil"><div class="offer-btn sec-offer-btn">ΠΑΡΑΓΓΕΛΙΑ ONLINE</div></a>

		</div>

		<div class="col-md-12 mcroilConstructor">
			

		
			
			<h3 style="display: none;" class="h3-mcr-oil">Πετρέλαιο θέρμανσης με το myConstructor σας συμφέρει</h3>

			<div class="myquotes"><div class="first-quote">❝</div><p class="mcr-tips">ΣΥΝΕΡΓΑΣΙΑ MYCONSTRUCTOR - ΕΛΙΝ</p><i>Η συνεργασία μας με την ΕΛΙΝ μας επιτρέπει να σας εγγυηθούμε για την ποιότητα και την ποσότητα του πετρελαίου που σας προσφέρουμε. Δε χρειάζεται να έχετε άγχος κάθε φορά που πρόκειται να αγοράσετε πετρέλαιο θέρμανσης σχετικά με το αν θα σας κλέψουν ή όχι, ούτε και να φοβάστε πως δεν έχετε την κατάλληλη τεχνική γνώση έτσι ώστε να ελέγξετε εσείς εάν έχει γίνει σωστά η διαδικασία. Με εμάς μπορείτε να έχετε απόλυτη εμπιστοσύνη στο προσωπικό της ΕΛΙΝ που έρχεται με το βυτιοφόρο κατευθείαν από τα διυλιστήρια σφραγισμένο αποκλειστικά για εσάς. Το ειδικευμένο προσωπικό της ΕΛΙΝ θα μετρήσει μαζί με εσάς το ύψος του πετρελαίου της δεξαμενής πριν ξεκινήσει η διαδικασία έτσι ώστε να είστε απόλυτα σίγουροι πως τα λίτρα που θα σας χρεωθούν θα είναι ακριβή χωρίς καμία επιπλέον χρέωση. Για να γλιτώσετε χρήματα, να  αποφύγετε μεσάζοντες, νοθείες και μικροπρομηθευτές που έχουν ως σκοπό να σας εξαπατήσουν  εμπιστευτείτε το myConstructor  για το πετρέλαιο σας,σήμερα!</i><div class="second-quote">❞</div></div>
		</div>

		<div class="col-md-12">
				<h3 class="h3-mcr-oil">Γιατί να επιλέξετε το myConstructor για την θέρμανση του σπιτιού σας</h3>

		</div>

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="whymcr-text"><p>Άμεση παράδοση σε Αττική και Θεσσαλονίκη</p></div><div class="icon-right"><i class="fa fa-truck" aria-hidden="true"></i></div>
			</div>
		</div>

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="icon-left"><i class="fa fa-eur" aria-hidden="true" style="padding-left: 24px;padding-right: 24px;" ></i></div><div class="whymcr-text"><p>Κερδίστε εώς και 3% επιστροφή με κάρτες Eurobank</p></div>
			</div>
		</div>

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="whymcr-text"><p>Δεκτή πληρωμή με όλες τις κάρτες (Visa,Mastercard,American Express)</p></div><div class="icon-right-card"><i class="fa fa-credit-card-alt" aria-hidden="true" style="padding-top: 15px; padding-bottom: 15px;"></i></div>    
			</div>
		</div>

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="icon-left"><i class="fa fa-info" aria-hidden="true" style="padding-left:30px; padding-right:30px;"></i></i></div><div class="whymcr-text"><p>Ενημερώνει τον καταναλωτή για τη διαδικασία παραλαβής/παράδοσης</p></div>
			</div>
		</div>
		

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="whymcr-text"><p>Προστατεύει τον πελάτη από το συχνό φαινόμενο της ελλειμματικής παράδοσης</p></div><div class="icon-right"><i class="fa fa-lock" aria-hidden="true" style="padding-left:22px; padding-right:21px;"></i></i></div>    
			</div>
		</div>

		<div class="col-md-6 mcr-box">
			<div class="whymcr">
				<div class="icon-left"><i class="fa fa-gift" aria-hidden="true" style="padding-left: 17px; padding-right: 17px;"></i></div><div class="whymcr-text"><p>Χρηματικές εκπτώσεις αναλογικά με τα λίτρα</p></div>
			</div> 
		</div>


		
 


	</div>

</div>


<div class="container containerElin">
	<div class="row">
		<div class="col-md-12"><h3 class="h3-elin-oil" style="color:#fff;">Γιατί να εμπιστευτείτε την Ελίν για το πετρέλαιο θέρμανσης</h3></div>
		<div class="col-md-4"><div class="ipad"><img src="img/ipad.png"></div></div>
		<div class="col-md-8">
			<p class="elin-text"><i class="fa fa-caret-right" aria-hidden="true"></i> Επιλέγει με πολύ προσεκτικό και αυστηρό τρόπο το προσωπικό της και φροντίζει για την εκπαίδευση του</p>

			<p class="elin-text"><i class="fa fa-caret-right" aria-hidden="true"></i> Χρησιμοποιεί μόνο ιδιόκτητα βυτιοφόρα για τη διανομή του πετρελαίου</p>

			<p class="elin-text"><i class="fa fa-caret-right" aria-hidden="true"></i> Το πετρέλαιο που παραγγέλνετε έρχεται αποκλειστικά για εσάς κατευθείαν από την πηγή</p>

			<p class="elin-text"><i class="fa fa-caret-right" aria-hidden="true"></i> Σφραγισμένα βυτιοφόρα που σας επιτρέπουν να μην ανησυχείτε για νοθείες </p>

			<p class="elin-text"><i class="fa fa-caret-right" aria-hidden="true"></i> Η ΕΛΙΝ πραγματοποιεί δειγματοληπτικούς ελέγχους εδώ και αρκετά χρόνια στο πετρέλαιο που προσφέρει στους πελάτες της έτσι ώστε να εξασφαλίσει την άριστη εξυπηρέτησής τους</p>


		</div>

	</div>
</div>
<div id="buyoil" class="container buyContainer">
	<div class="row">
		<div class="col-md-12 online-form">
			<h3 class="h3-mcr-oil" style="color:#8a8a8a; font-weight:bold;" >Παράγγειλε πετρέλαιο θέρμανσης online</h3>

			<div class="col-md-4 form-col"><input type="text" class="form-control" id="name" placeholder="Όνομα:" name="name"></div>

			<div class="col-md-4 form-col"><input type="email" class="form-control" id="email" placeholder="Email:" name="email"></div>

			<div class="col-md-4 form-col"><input type="tel" class="form-control" id="tel" placeholder="Τηλ.:" name="name"></div>

			<div class="col-md-4 form-col"><input type="address" class="form-control" id="address" placeholder="Διεύθυνση:" name="address"></div>

			<div class="col-md-4 form-col"><input type="number" id="quantity" class="form-control" name="quantity" placeholder="Ποσότητα Πετρελαίου Λίτρα:" required="required"></div>

			<div class="col-md-4 form-col"><input type="date" class="form-control" id="date" placeholder="Ημερομηνία:" name="date"></div>
			<div class="col-md-12 radio-btn-form" >
			  <p class="p-title-radio">Επιλέξτε τρόπο πληρωμής</p>
			  <span class="error-payment-method">Επιλέξτε έναν τρόπο πληρωμής</span>
		      <input type="radio" name="radioexplode" value="cash" id="cash" onclick="calc($(this).attr('id'))" class='radio-explode'> 
		      <label for="cash" class='radio-btn radio-btn--top'>Πληρωμή Μετρητοίς έως 500€ <span class="error500">Το ποσό ξεπερνά τα 500€! Η πληρωμή πρέπει να γίνει με κατάθεση στην τράπεζα.</span></label><br>
		      <input type="radio" name="radioexplode" value="Eurobank" id="Eurobank" onclick="calc($(this).attr('id'))" class='radio-explode'> 
		      <label for="Eurobank"  class='radio-btn radio-btn--bottom'>Πληρωμή με κάρτα EUROBANK</label><br>
		      <input type="radio" name="radioexplode" value="otherCard" id="otherCard" onclick="calc($(this).attr('id'))" class='radio-explode'> 
		      <label for="otherCard" class='radio-btn radio-btn--bottom'>Πληρωμή με κάρτα άλλης Τράπεζας</label><br>
		      
		      <input style="display: none;" type="radio" name="radioexplode" value="emvasma" id="emvasma" onclick="calc($(this).attr('id'))" class='radio-explode'> 
		      <label style="display: none;" for="emvasma" class='radio-btn radio-btn--bottom'>Πληρωμή με τραπεζικό έμβασμα</label><br>
		      
		      <div class="total-oil-price"><span>Τελικό ποσό πληρωμής:</span><span class="span-total-oil-price"></span> <spa class="eksoikonomisi"></spa></div>
		      <div class="total-oil-price"><span>Έχετε εξοικονομήσει:</span><span class="span-total-oil-offer"></span></div>
   			
		    </div>
			

			<div class="col-md-12 form-col">
				<label class="ltext-area">Μήνυμα:</label>
				<textarea  name="comment"></textarea>
			</div>
			<div class="col-md-4 form-col">
				<label class="lcaptcha">Συμπληρώστε πόσο κάνει Δέκα και Δέκα;</label>
				<input type="number" class="form-control" id="captcha" placeholder="10+10=" name="captcha">

				<p class="error-captcha">Παρακαλώ απαντήστε την ερρώτηση!</p> 
			</div>


			<div class="col-md-12"><div onclick="validation()" class="btn-form">Αποστολή</div><p class="msg"></p></div>
			


		</div>

	</div>


</div>


<footer>

  

        <div class="container footer-container">

            <div class="row">



                <div class="col-md-3 col-sm-6 col-xs-12">

                    <h3>ΣΧΕΤΙΚΑ ΜΕ ΕΜΑΣ</h3>

                    <ul style="padding-left:0px;">

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/who_we_are">Ποιοι είμαστε</a></li>

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/privacy_policy">Πολιτική απορρήτου</a> </li>

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/alternate_payment_method">Τρόποι πληρωμής</a> </li>

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/terms_of_use">Όροι Χρήσης</a> </li>

                        <li> <a href="https://myconstructor.gr/contacts/contactEnquiry">Επικοινωνήστε μαζί μας</a></li>



                    </ul>

                </div>

      

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <h3>ΧΡΗΣΙΜΟΙ ΣΥΝΔΕΣΜΟΙ</h3>

                    <ul style="padding-left:0px;">

                        <li> <a href="https://myconstructor.gr/f_a_qs/faq">Συχνές Ερωτήσεις</a> </li>

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/why_myconstructor">Γιατί το myConstructor.gr;</a> </li>

                        <li> <a href="https://myconstructor.gr/cms_pages/view_cms/how_i_earn">Είμαι επαγγελματίας, πώς κερδίζω;</a> </li>

                        <li> <a href="https://myconstructor.gr/members/chooseUserType">Συνδεθείτε/Εγγραφείτε</a> </li>

                    </ul>

                </div>



                  <div class="col-md-3 col-sm-6 col-xs-12 desk-col-footer">

                    <h3>BLOG <span style="color:#F2930A;">MY</span>CONSTRUCTOR</h3>

                    <ul style="padding-left:0px;">



                        <li> <a href="https://myconstructor.gr/blog/vapsimo-spitiou/">Ελαιοχρωματισμοί</a> </li>

                        <li> <a href="https://myconstructor.gr/blog/gypsosanides/">Τοποθέτηση Γυψοσανίδων</a> </li>

                        <li> <a href="https://myconstructor.gr/blog/topothetisi-plakidion-dapedou/">Τοποθέτηση Πλακιδίων</a> </li>

                        <li> <a href="https://myconstructor.gr/blog/apolumanseis/">Απολύμανση Απεντόμωση</a> </li>

                        <li> <a href="https://myconstructor.gr/blog/matakomiseis-metafores/">Μετακόμιση</a> </li>

                    </ul>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 desk-col-footer">

                    <h3>ΕΠΙΚΟΙΝΩΝΙΑ</h3>

                    

                          <a href="tel:2103009323"><p>Τηλεφωνικό Κέντρο:<span style="color:#F2930A;"> 210 300 9323</span></p></a>

                          <p>Δευτέρα - Παρασκευή <span style="color:#F2930A;">9:00 - 21:30</span></p>

                          <p>Σάββατο <span style="color:#F2930A;">9:30-18:00</span></p>   

                        

                    

                    <ul class="social" style="padding-left:0px;">

                         <li> <a target="_blank" href="https://www.facebook.com/MyConstructorGR/"> <i class="fa fa-facebook">   </i> </a> </li>

                         <li> <a target="_blank" href="https://twitter.com/myConstructor"> <i class="fa fa-twitter">   </i> </a> </li>

                         <li> <a target="_blank" href="https://plus.google.com/u/0/111872566385119596767"> <i class="fa fa-google-plus">  </i> </a> </li>

                         <li> <a target="_blank" href="https://www.linkedin.com/company/myconstructor"> <i class="fa fa-linkedin">   </i> </a> </li>

                    </ul>

                </div>

              

            </div>



              <div class="row footer-mob-col-row">

                            <div class="col-sm-6">

                                <h3>Blog <span style="color:#F2930A;">My</span>Constructor</h3>

                                <ul style="padding-left:0px;">

                                    <li> <a href="https://myconstructor.gr/blog/vapsimo-spitiou/">Ελαιοχρωματισμοί</a> </li>

                                    <li> <a href="https://myconstructor.gr/blog/gypsosanides/">Τοποθέτηση Γυψοσανίδων</a> </li>

                                    <li> <a href="https://myconstructor.gr/blog/topothetisi-plakidion-dapedou/">Τοποθέτηση Πλακιδίων</a> </li>

                                    <li> <a href="https://myconstructor.gr/blog/apolumanseis/">Απολύμανση Απεντόμωση</a> </li>

                                    <li> <a href="https://myconstructor.gr/blog/matakomiseis-metafores/">Μετακόμιση</a> </li>

                                </ul>

                            </div>

                            <div class="col-sm-6">

                                <h3>ΕΠΙΚΟΙΝΩΝΙΑ </h3>

                                

                                       <a href="tel:2103009323"><p>Τηλεφωνικό Κέντρο:<span style="color:#F2930A;"> 210 300 9323</span></p></a>

                                        <p>Δευτέρα - Παρασκευή <span style="color:#F2930A;">9:00 - 21:30</span></p>

                                        <p>Σάββατο <span style="color:#F2930A;">9:30-18:00</span></p>  

                                    

                                

                                <ul class="social" style="padding-left:0px;">

                                    <li> <a target="_blank" href="https://www.facebook.com/MyConstructorGR/"> <i class="fa fa-facebook">   </i> </a> </li>

                                    <li> <a target="_blank" href="https://twitter.com/myConstructor"> <i class="fa fa-twitter">   </i> </a> </li>

                                    <li> <a target="_blank" href="https://plus.google.com/u/0/111872566385119596767"> <i class="fa fa-google-plus">  </i> </a> </li>

                                    <li> <a target="_blank" href="https://www.linkedin.com/company/myconstructor"> <i class="fa fa-linkedin">   </i> </a> </li>

                                </ul>

                            </div>

                </div>



            <!--/.row--> 

        </div>

        <!--/.container--> 

    </div>

    <!--/.footer-->

    

    <div class="footer-bottom">

        <div class="container">

            <p class="pull-left"> Copyright © <a href="https://myconstructor.gr">myConstructor.gr</a> 2012-2017. All right reserved.  <a href="https://myconstructor.gr/sitemap">Sitemap</a></p>

            <div class="pull-right">

                <ul class="nav nav-pills payments" style="padding-left:0px;">

                    <li><i class="fa fa-cc-visa"></i></li>

                    <li><i class="fa fa-cc-mastercard"></i></li>

                    <li><i class="fa fa-cc-amex"></i></li>

                    <li><i class="fa fa-cc-paypal"></i></li>

                </ul> 

            </div>

        </div>

 

    <!--/.footer-bottom--> 

</footer>

<script type="text/javascript">
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
var pricePerL= '<?php echo $scriptprice; ?>';
pricePerL=parseFloat(pricePerL);
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
  var price= this.value;
  
  var offer=0;
 if(price<1200){
  	offer=price*0.01;
    price=price*pricePerL;
  	price=price - offer;

  	price= price.toFixed(1);
  	offer= offer.toFixed(1);

  	$('span.total-price-span').html(price+'€');
  	$('span.offer-span').html(offer+'€');

  	var price_eurobank=this.value;
    var offer_eurobank=0;
    price_eurobank= price_eurobank*pricePerL;	

    offer_eurobank=	price_eurobank*0.03;
    //price_eurobank=price_eurobank-offer_eurobank;
    price_eurobank= price_eurobank.toFixed(1);
  	offer_eurobank= offer_eurobank.toFixed(1);
    $('.total-price-eurobank-span').html(price_eurobank+'€');
    $('.offer-eurobank-span').html(offer_eurobank+'€');



}else if(price >=1200){
	/*quant_under1200= price - 1200; 
	offer=1200*0.01;
	offer_under1200= price*0.025;*/
    
	offer=price*0.025;
    price=price*pricePerL;
  	price=price - offer;

  	price= price.toFixed(1);
  	offer= offer.toFixed(1);

  	$('span.total-price-span').html(price+'€');
  	$('span.offer-span').html(offer+'€');

  	var price_eurobank=this.value;
    var offer_eurobank=0;
    var offermcr= price_eurobank*0.01;
    price_eurobank= price_eurobank*pricePerL - offermcr;	

    offer_eurobank=	price_eurobank*0.03;
    //price_eurobank=price_eurobank-offermcr;
    price_eurobank= price_eurobank.toFixed(1);
  	offer_eurobank= offer_eurobank.toFixed(1);
    $('.total-price-eurobank-span').html(price_eurobank+'€');
    $('.offer-eurobank-span').html(offer_eurobank+'€');
    $('.offer-mcr-span').html(offermcr+'€');



  }/*else{
  	price= price* pricePerL;
  	price= price.toFixed(1);
  	offer= offer.toFixed(1);
  	$('span.total-price-span').html(price+'€');
  	$('span.offer-span').html(offer+'€');

  	var price_eurobank=this.value;
    var offer_eurobank=0;
    price_eurobank= price_eurobank*pricePerL;	

    offer_eurobank=	price_eurobank*0.03;
    price_eurobank=price_eurobank-offer_eurobank;
    price_eurobank= price_eurobank.toFixed(1);
  	offer_eurobank= offer_eurobank.toFixed(1);
    $('.total-price-eurobank-span').html(price_eurobank+'€');
    $('.offer-eurobank-span').html(offer_eurobank+'€');

  }*/


}


$('input[type="range"]').change(function () {
    var val = ($(this).val() - $(this).attr('min')) / ($(this).attr('max') - $(this).attr('min'));
    
    $(this).css('background-image',
                '-webkit-gradient(linear, left top, right top, '
                + 'color-stop(' + val + ', #00337F), '
                + 'color-stop(' + val + ', #C5C5C5)'
                + ')'
                );

   $(this).css('');
});

 $(document).ready(function(){



    	
    	$('input[type="range"]').css('background-image',
                '-webkit-gradient(linear, left top, right top, '
                + 'color-stop(' + 0.5 + ', #00337F), '
                + 'color-stop(' + 0.6 + ', #C5C5C5)'
                + ')'
                );

    var price_eurobank=1200;
    var offer_eurobank=0;
    offermcr=price_eurobank*0.01;
    price_eurobank= price_eurobank*pricePerL;	
    
    price_eurobank= price_eurobank - offermcr;
    offer_eurobank=	price_eurobank*0.03;
    //price_eurobank=price_eurobank-offer_eurobank;
    price_eurobank= price_eurobank.toFixed(1);
  	offer_eurobank= offer_eurobank.toFixed(1);
  	offermcr=offermcr.toFixed(1);
    $('.total-price-eurobank-span').html(price_eurobank+'€');
    $('.offer-eurobank-span').html(offer_eurobank+'€');
    $('.offer-mcr-span').html(offermcr+'€');

   	var price=1200;
   	var offer=0;
   	offer=1200*0.025;

    price=price*pricePerL;
  	price=price - offer;

  	price= price.toFixed(1);
  	offer= offer.toFixed(1);

  	$('span.total-price-span').html(price+'€');
  	$('span.offer-span').html(offer+'€');



    });



 function validation(){

	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var valEmail = $("#email").val();
	var phoneLenght = $("#tel").val().length;
	var nameLength= $('#name').val().length;
	var addressLength=$('#address').val().length;
	var quantityLength= $('#quantity').val().length;
	var dateLength=$('#date').val().length;
	var captcha= parseInt($('#captcha').val());



	if (testEmail.test(valEmail)){
		var emailLenght = 10;
	}else{
		var emailLenght = 0;
	}

	if(phoneLenght == 10){
        phone = true;
        $('#tel').css('border','1px solid #00ff10');
    }else{
        phone = false;
        $('#tel').css('border','1px solid red');
    }

    if(emailLenght>0){
        email = true;
        $('#email').css('border','1px solid #00ff10');
    }else{
       email = false;
       $('#email').css('border','1px solid red');
    }

    if(nameLength>0){
    	name=true;
    	$('#name').css('border','1px solid #00ff10');
    }else{
    	name=false;
    	$('#name').css('border','1px solid red');
    }

    if(addressLength>0){
    	address=true;
    	$('#address').css('border','1px solid #00ff10');
    }else{
    	address=false;
    	$('#address').css('border','1px solid red');
    }

    if(quantityLength>0){
    	quantity=true;
    	$('#quantity').css('border','1px solid #00ff10');
    }else{
    	quantity=false;
    	$('#quantity').css('border','1px solid red');
    }

    if(dateLength>0){
    	date=true;
    	$('#date').css('border','1px solid #00ff10');
    }else{
    	date=false;
    	$('#date').css('border','1px solid red');
    }

    if(!$("#cash").is(':checked') && !$("#Eurobank").is(':checked') && !$("#otherCard").is(':checked') && !$("#emvasma").is(':checked')){
    	paymentMethods=false;
    	$('.error-payment-method').css('display','block');
    }else{
    	paymentMethods=true;
    	$('.error-payment-method').css('display','none');
    }

    if(captcha == 20){
    	donecaptcha=true;
    	$('#captcha').css('border','1px solid #00ff10');
    	$('.error-captcha').css('display','none');
    }else{
    	donecaptcha=false;
    	$('#captcha').css('border','1px solid red');
    	$('.error-captcha').css('display','block');
    }

	if(phone && email && name && address && quantity && date && paymentMethods && donecaptcha){

		var quantityoil= parseInt($('#quantity').val());
		var offer;
		//var price = quantityoil* pricePerL;
		$('span.error500').css('display','none');
		if($("input#cash").is(':checked')){
			//offer=quantityoil*0.01;
			price=quantityoil*pricePerL;
			if(price>500){	

				offer=quantityoil*0.01;
				offer= offer.toFixed(1);
  				price=price - offer;

  				if(quantityoil>= 1200){

  					//quant_under1200= quantityoil - 1200; 
					offer=quantityoil*0.025;
					//offer_under1200= quant_under1200*0.025;
				  //  offer=offer_under1200 + offer;

				    price=quantityoil*pricePerL;
				  	price=price - offer;

				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}

				//$( "input#cash" ).prop("checked", false);
				$('span.error500').css('display','block');
				$('.span-total-oil-price').html(' ');
				$('.span-total-oil-offer').html(' ');
				$('.eksoikonomisi').html(' ');

			}else{
				price= price.toFixed(1);
				if(quantityoil>= 1200){

  					//quant_under1200= quantityoil - 1200; 
					offer=quantityoil*0.025;
					//offer_under1200= quant_under1200*0.025;
				   // offer=offer_under1200 + offer;
				    price=quantityoil*pricePerL;
				  	price=price - offer;
				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}

				$('.span-total-oil-price').html(' '+price+'€');
				$('.eksoikonomisi').html(' ');
			}
		}else{
			$( "input#cash" ).prop("disabled" , false);
		}

		if($("input#Eurobank").is(':checked')){
			price=quantityoil*pricePerL;
			offer=price*0.03;
			//price=price - offer;
			price=price.toFixed(1);
			offer=offer.toFixed(1);
			if(quantityoil>= 1200){
				offermcr=quantityoil*0.01;
				price= quantityoil*pricePerL -offermcr;
				offer=price*0.03;
				price=price.toFixed(1);
				offer=offer.toFixed(1);
				offermcr=offermcr.toFixed(1);
				$('.span-total-oil-offer').html(' '+offermcr+'€');
			}else{
				$('.span-total-oil-offer').html(' ');
			}

			$('.eksoikonomisi').html(' Με Επιστροφή: '+offer+'€');
			$('.span-total-oil-price').html(' '+price+'€');
			

			$('.error500').css('display','none');
		}

		if($("input#otherCard").is(':checked')){
			price=quantityoil*pricePerL;
			price=price.toFixed(1);

			if(quantityoil>= 1200){
				offermcr=quantityoil*0.01;
			}
			$('.span-total-oil-price').html('');
			$('.span-total-oil-offer').html(' '+offermcr+'€');
			$('.eksoikonomisi').html(' ');
			$('.span-total-oil-price').html(' '+price+'€');
			$('.error500').css('display','none');

		}

		if($("input#emvasma").is(':checked')){
			if(quantityoil>=1000){
				price=quantityoil*pricePerL;
				offer=quantityoil*0.01;
				price=price-offer;
				offer=offer.toFixed(1);
				price=price.toFixed(1);
				$('.eksoikonomisi').html(' ');
				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
			}else{
				price=quantityoil*pricePerL;
				price=price.toFixed(1);
				$('.span-total-oil-price').html(' '+price+'€');
				$('.span-total-oil-offer').html(' ');

			}
		}

		if($("input#cash").is(':checked')){
			var pay="Πληρωμή της μετρητοίς";
		}

		if($("input#Eurobank").is(':checked')){
			var pay="Πληρωμή με κάρτα EUROBANK";
		}

		if($("input#otherCard").is(':checked')){
			var pay="Πληρωμή με κάρτα άλλης Τράπεζας";
		}

		if($("input#emvasma").is(':checked')){
			var pay="Πληρωμή με τραπεζικό έμβασμα";
		}


		var valname= $('#name').val();
		var valemail= $('#email').val();
		var valtel=$('#tel').val();
		var valaddress=$('#address').val();
		var valquantity=$('#quantity').val();
		var valdate=$('#date').val();
		var totalPriceOil=$('span.span-total-oil-price').text();
		var totalOffer=$('span.span-total-oil-offer').text();


		$.ajax({

                  type:"POST",

                  url:"https://myconstructor.gr/services/petrelaio-thermansis/contacts.php",

                  data:{valname,valemail,valtel,valaddress,valquantity,valdate,pay,totalPriceOil,totalOffer},

                  success: function(data){

                     console.log(data);

                   	if(data){
                   		msg= "Σας ευχαριστούμε. H παραγγελία σας καταχωρήθηκε με επιτυχία!";
						$(".msg").html(msg);
						$(".msg").css('color','green');
                   	}else{
                   		msg= "Αποτυχία αποστολής. Παρακαλούμε ελέγξτε όλα τα πεδία";
                   		$(".msg").html(msg);
                   		$(".msg").css('color','red');
                   	}

                     // jQuery(".submit-msg").text("Θα επικοινωήσουμε σύντομα μαζί σας!");

                   //  jQuery(".submit-msg").css("color","green");

                 }


             })


		

	}






}

function calc(id){
	var quantityL= $('#quantity').val().length;
	if(quantityL > 0 ){
		
		quantityoil= parseInt($('#quantity').val());
		
		
		if(id == 'cash' ){
			price=quantityoil*pricePerL;
			if(price>500){	
				//price= price.toFixed(1);
				offer=quantityoil*0.01;
				offer= offer.toFixed(1);
  				price=price - offer;
  				price= price.toFixed(1);

  				if(quantityoil>= 1200){

  					//quant_under1200= quantityoil - 1200; 
					offer=quantityoil*0.025;
					//offer_under1200= quant_under1200*0.025;
				  //  offer=offer_under1200 + offer;

				    price=quantityoil*pricePerL;
				  	price=price - offer;

				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}
				//$( "input#cash" ).prop("checked", false);
				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.eksoikonomisi').html('');
				$('.error500').css('display','block');

			}else{




				price= price.toFixed(1);
				offer=price*0.01;
				offer= offer.toFixed(1);
  				price=price - offer;
  				price= price.toFixed(1);
  				if(quantityoil>= 1200){

  					//quant_under1200= quantityoil - 1200; 
					offer=quantityoil*0.025;
					//offer_under1200= quant_under1200*0.025;
				  //  offer=offer_under1200 + offer;

				    price=quantityoil*pricePerL;
				  	price=price - offer;

				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}

				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.eksoikonomisi').html('');
			}
		}else if(id=='Eurobank'){
			price=quantityoil*pricePerL;
			offer=price*0.03;
			//price=price - offer;
			price=price.toFixed(1);
			offer=offer.toFixed(1);
			if(quantityoil>= 1200){
				offermcr=quantityoil*0.01;
				price= quantityoil*pricePerL -offermcr;
				offer=price*0.03;
				price=price.toFixed(1);
				offer=offer.toFixed(1);
				offermcr=offermcr.toFixed(1);
				$('.span-total-oil-offer').html(' '+offermcr+'€');
			}else{
				$('.span-total-oil-offer').html(' ');
			}

			$('.eksoikonomisi').html(' Με Επιστροφή: '+offer+'€');
			$('.span-total-oil-price').html(' '+price+'€');
			

			$('.error500').css('display','none');

		}else if(id == 'otherCard'){
			price=quantityoil*pricePerL;
			price=price.toFixed(1);

			if(quantityoil>= 1200){
				offermcr=quantityoil*0.01;
			}
			$('.span-total-oil-price').html('');
			$('.span-total-oil-offer').html(' '+offermcr+'€');
			$('.eksoikonomisi').html(' ');
			$('.span-total-oil-price').html(' '+price+'€');
			$('.error500').css('display','none');

		}else if(id == 'emvasma'){
			if(quantityoil>=1000){
				price=quantityoil*pricePerL;
				offer=quantityoil*0.01;
				price=price-offer;
				offer=offer.toFixed(1);
				price=price.toFixed(1);
				$('.eksoikonomisi').html(' ');
				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.error500').css('display','none');
			}else{
				price=quantityoil*pricePerL;
				price=price.toFixed(1);
				$('.span-total-oil-price').html(' '+price+'€');
				$('.span-total-oil-offer').html(' ');
				$('.error500').css('display','none');
				$('.eksoikonomisi').html(' ');

			}
		}



	}


}

$("#quantity").keyup(function() {

	var quantitykeyup= $('#quantity').val();
	//if($('#quantity').val().length == 0){
		$('.span-total-oil-offer').html(' ');
		$('.span-total-oil-price').html(' ');
		$('.eksoikonomisi').html('');

	//}
	

	$('span.error500').css('display','none');
		if($("input#cash").is(':checked')){
			price=quantitykeyup*pricePerL;
			if(price>500){	
				//price= price.toFixed(1);
				offer=quantitykeyup*0.01;
				offer= offer.toFixed(1);
  				price=price - offer;
  				price=price.toFixed(1);
  				if(quantitykeyup>= 1200){

  						//quant_under1200= quantityoil - 1200; 
					offer=quantitykeyup*0.025;
					//offer_under1200= quant_under1200*0.025;
				  //  offer=offer_under1200 + offer;

				    price=quantitykeyup*pricePerL;
				  	price=price - offer;

				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}
				//$( "input#cash" ).prop("checked", false);
				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.eksoikonomisi').html('');
				$('.error500').css('display','block');

			}else{


				price= price.toFixed(1);
				offer=price*0.01;
				offer= offer.toFixed(1);
  				price=price - offer;
  				price=price.toFixed(1);
  				if(quantitykeyup>= 1200){

  						//quant_under1200= quantityoil - 1200; 
					offer=quantitykeyup*0.025;
					//offer_under1200= quant_under1200*0.025;
				  //  offer=offer_under1200 + offer;

				    price=quantitykeyup*pricePerL;
				  	price=price - offer;

				  	price= price.toFixed(1);
				  	offer= offer.toFixed(1);

  				}

				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.eksoikonomisi').html('');
			}
		}else{
			$( "input#cash" ).prop("disabled" , false);
		}

		if($("input#Eurobank").is(':checked')){
			price=quantitykeyup*pricePerL;
			offer=price*0.03;
			//price=price - offer;
			price=price.toFixed(1);
			offer=offer.toFixed(1);
			if(quantitykeyup>= 1200){
				offermcr=quantitykeyup*0.01;
				price= quantitykeyup*pricePerL -offermcr;
				offer=price*0.03;
				price=price.toFixed(1);
				offer=offer.toFixed(1);
				offermcr=offermcr.toFixed(1);
				$('.span-total-oil-offer').html(' '+offermcr+'€');
			}else{
				$('.span-total-oil-offer').html(' ');
			}

			$('.eksoikonomisi').html(' Με Επιστροφή: '+offer+'€');
			$('.span-total-oil-price').html(' '+price+'€');
			

			$('.error500').css('display','none');
		}

		if($("input#otherCard").is(':checked')){
			price=quantitykeyup*pricePerL;
			price=price.toFixed(1);

			if(quantitykeyup>= 1200){
				offermcr=quantitykeyup*0.01;
			}
			$('.span-total-oil-price').html('');
			$('.span-total-oil-offer').html(' '+offermcr+'€');
			$('.eksoikonomisi').html(' ');
			$('.span-total-oil-price').html(' '+price+'€');
			$('.error500').css('display','none');

		}

		if($("input#emvasma").is(':checked')){
			if(quantitykeyup>=1000){
				price=quantitykeyup*pricePerL;
				offer=quantitykeyup*0.01;
				price=price-offer;
				offer=offer.toFixed(1);
				price=price.toFixed(1);
				$('.eksoikonomisi').html(' ');
				$('.span-total-oil-offer').html(' '+offer+'€');
				$('.span-total-oil-price').html(' '+price+'€');
			}else{
				price=quantitykeyup*pricePerL;
				price=price.toFixed(1);
				$('.eksoikonomisi').html(' ');
				$('.span-total-oil-price').html(' '+price+'€');
				$('.span-total-oil-offer').html(' ');

			}
		}


});

	


</script>



    

    
    <div id="callback" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button  type="button" class="close-modal" data-dismiss="modal">&times;</button></div><div class="modal-body">

        <div class="callback-form">

            <h4 class="modal-title"><span>Είμαστε εδώ για οποιαδήποτε απορία και αν έχεις.</span></h4>

                        <p>Στείλε μας ένα αίτημα για επικοινωνία!</p>

                      

                        <input class="input-style" placeholder="Όνομα" name="name"  id="name" type="text" required> 

                       

                        <input name="mobile"  id="mobile" placeholder="Τηλ: 691 234 5678" type="number" onkeyup="check();" required ><span id="message"></span>

                        <div class="radio-btns">

                            <input style="opacity: 0.7;" type="radio" id="call-now" class="radio-time" name="radio-time" value="Τώρα" onclick="checktimecallnow();" checked> <span>Θέλω να με καλέσετε τώρα.</span><br>

                            <input style="opacity: 0.7;" type="radio" id="call-not-now" class="radio-time" name="radio-time" value="Άλλη ώρα" onclick="checktime();"> <span>Θέλω να επιλέξω άλλη ώρα.</span><br>

                        </div>

                         <input type="text"  id="time" name="usr_time" value='12:00 μμ'>

                        <button class="btn-call-back" onclick="callbackaction();">Επικοινωνήστε μαζί μου</button>

                        <p class="submit-msg"></p>

        </div>

      </div>

    </div>



  </div>

</div>





<script type="text/javascript">
    jQuery('input#time').css('display','none');
    function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

    var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Παρακαλούμε συμπλήρωσε δεκαψήφιο αριθμό!"

    }else{
        message.innerHTML = "Συνέχισε!"
    jQuery("#message").css("color","green");
    }

}

jQuery('#call-not-now').click(function(){
    jQuery('#call-not-now').prop('checked', true);
    jQuery('#call-now').removeAttr('checked');
});

jQuery('.radio-btns').change(function() {
    if (jQuery('#call-not-now').attr('checked')) {
        jQuery('#time').show();
    } else {
        jQuery('#time').hide();
    }
});

function callbackaction(){
    var number = jQuery("input#mobile").val();
      if(number.length == 10){

        var name= jQuery("input#name").val();
        var mobile= jQuery("input#mobile").val();
    var url = window.location.href; 
    if (jQuery('#call-not-now').attr('checked')){
            var time= jQuery("input#time").val();
    }else{
        var time= "Καλέστε με τώρα!"
    }
       jQuery.ajax({
            type:"POST",
            url:"https://myconstructor.gr/blog/scripts/callback.php",
            data:{name,mobile,time,url},
           success: function(data){
               console.log(data); 
                jQuery(".submit-msg").text("Θα επικοινωήσουμε σύντομα μαζί σας!");
                jQuery(".submit-msg").css("color","green");
           }

       })


      }else{ 
        jQuery(".submit-msg").text("Συμπληρώστε σωστά τα πεδία!");
        jQuery(".submit-msg").css("color","red");
      }

}

jQuery(".button.close-btn-call-back").click(function(){
jQuery(".col-call-back").css("display","none");
});

function checktime(){
    $("#call-not-now").attr('checked','true');
    $("#call-now").removeAttr('checked', 'checked');
    $('input#time').css('display','block'); 
}

function checktimecallnow(){
    $("#call-not-now").removeAttr('checked','true');
    $("#call-now").attr('checked', 'checked');
    $('input#time').css('display','none');  
}


function closetextcallbackbtn(){
    jQuery('.text-call-back').hide();
    jQuery('.close-text-call-back-btn').hide();
}


</script>


<script type="text/javascript">
	$(document).ready(function(){

		var p =$('.oilp').text();
		 p= p.toString().replace(/\,/g, '.');
		 p = parseFloat(p);
		
		 p=p.toFixed(3);
		 $('.oilp').html(p);

		


	})

</script>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>


</body>

</html>
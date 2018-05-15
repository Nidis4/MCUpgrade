<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="img/favicon.jpg">
	<title>Φόρμα Προσφοράς Για Ανακαίνιση Σπιτιού</title>

	<link rel="alternate" hreflang="el" href="https://myconstructor.gr/services/anakainisi/">
    <meta name="description" content="Πάρε δωρεάν προσφορά για ανακαίνιση σπιτιού. Συμπλήρωσε την ειδική φόρμα για ανακαίνιση σπιτιού και λάβε άμεσα προσφορά από τα εξειδικευμένα συνεργεία του MyConstructor.gr. Προσφορές ανακαίνισης σπιτιού προσαρμοσμένες στις ανάγκες & τις απαιτήσεις του χώρου σας!">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://myconstructor.gr/">
    <meta property="og:locale" content="el_GR">
    <meta property="og:title" content="Ανακαίνιση Σπιτιού - Πάρε δωρεάν προσφορά | MyConstructor.gr">
    <meta property="og:description" content="Πάρε δωρεάν προσφορά για ανακαίνιση σπιτιού. Συμπλήρωσε την ειδική φόρμα για ανακαίνιση σπιτιού και λάβε άμεσα προσφορά από τα εξειδικευμένα συνεργεία του MyConstructor.gr. Προσφορές ανακαίνισης σπιτιού προσαρμοσμένες στις ανάγκες & τις απαιτήσεις του χώρου σας!">
    <meta property="og:url" content="https://myconstructor.gr/services/anakainisi/">
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
  	<link rel="stylesheet" type="text/css" href="css/style.css?version=25">
  	<link rel="stylesheet" type="text/css" href="css/sidenav.css">

    <script src="js/renovation.js"></script> 

  


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-48360830-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-48360830-2');
      gtag('config', 'AW-807415015');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '106019076556041');
        fbq('track', 'PageView');
        </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=106019076556041&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Event snippet for Forma Anakainisis conversion page
    In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
    <script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
          'send_to': 'AW-943776193/PHhYCMGggIEBEMHDg8ID',
          'event_callback': callback
      });
      return false;
    }
    </script>

</head>

<?php
$select_counties ='<select class="counties">
                                                        <option value="1" selected="selected">Νομός Αττικής</option>
                                                        <option value="2">Νομός Θεσσαλονίκης</option>
                                                        <option value="3">Νομός Αχαΐας</option>
                                                        <option value="4">Νομός Αιτωλοακαρνανίας</option>
                                                        <option value="5">Νομός Αργολίδας</option>
                                                        <option value="6">Νομός Αρκαδίας</option>
                                                        <option value="7">Νομός Άρτας</option>
                                                        <option value="8">Νομός Βοιωτίας</option>
                                                        <option value="9">Νομός Γρεβενών</option>
                                                        <option value="10">Νομός Δράμας</option>
                                                        <option value="11">Νομός Δωδεκανήσου</option>
                                                        <option value="12">Νομός Έβρου</option>
                                                        <option value="13">Νομός Εύβοιας</option>
                                                        <option value="14">Νομός Ευρυτανίας</option>
                                                        <option value="15">Νομός Ζακύνθου</option>
                                                        <option value="16">Νομός Ηλείας</option>
                                                        <option value="17">Νομός Ημαθίας</option>
                                                        <option value="18">Νομός Ηρακλείου</option>
                                                        <option value="19">Νομός Θεσπρωτίας</option>
                                                        <option value="20">Νομός Ιωαννίνων</option>
                                                        <option value="21">Νομός Καβάλας</option>
                                                        <option value="22">Νομός Καρδίτσας</option>
                                                        <option value="23">Νομός Καστοριάς</option>
                                                        <option value="24">Νομός Κέρκυρας</option>
                                                        <option value="25">Νομός Κεφαλληνίας</option>
                                                        <option value="26">Νομός Κιλκίς</option>
                                                        <option value="27">Νομός Κοζάνης</option>
                                                        <option value="28">Νομός Κορινθίας</option>
                                                        <option value="29">Νομός Κυκλάδων</option>
                                                        <option value="30">Νομός Λακωνίας</option>
                                                        <option value="31">Νομός Λάρισας</option>
                                                        <option value="32">Νομός Λασιθίου</option>
                                                        <option value="33">Νομός Λέσβου</option>
                                                        <option value="34">Νομός Λευκάδας</option>
                                                        <option value="35">Νομός Μαγνησίας</option>
                                                        <option value="36">Νομός Μεσσηνίας</option>
                                                        <option value="37">Νομός Ξάνθης</option>
                                                        <option value="38">Νομός Πέλλας</option>
                                                        <option value="39">Νομός Πιερίας</option>
                                                        <option value="40">Νομός Πρέβεζας</option>
                                                        <option value="41">Νομός Ρεθύμνης</option>
                                                        <option value="42">Νομός Ροδόπης</option>
                                                        <option value="43">Νομός Σάμου</option>
                                                        <option value="44">Νομός Σερρών</option>
                                                        <option value="45">Νομός Τρικάλων</option>
                                                        <option value="46">Νομός Φθιώτιδας</option>
                                                        <option value="47">Νομός Φλώρινας</option>
                                                        <option value="48">Νομός Φωκίδας</option>
                                                        <option value="49">Νομός Χαλκιδικής</option>
                                                        <option value="50">Νομός Χανίων</option>
                                                        <option value="51">Νομός Χίου</option>
                                                        <option value="52">Άγιο Όρος</option>
                                                        
                                                    </select>'; 


 ?>
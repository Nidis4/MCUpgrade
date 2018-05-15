
$(document).ready(function(){

	$('input.paint-checkbox').change(function(){

		if($(this).is(':checked')){
			$('div.div-paint-rooms').slideDown();
		}else{
			$('div.div-paint-rooms').slideUp();
		}

	});


	$('input.koufomata-checkbox').change(function(){

		if($(this).is(':checked')){
			$('div.div-koufomata').slideDown();
		}else{
			$('div.div-koufomata').slideUp();
		}

	});

	

	$('input.dapeda-checkbox').change(function(){

		if($(this).is(':checked')){
			$('div.div-dapeda').slideDown();
		}else{
			$('div.div-dapeda').slideUp();
		}

	});

});

function validation(){

    var urlParams;

    (window.onpopstate = function () {

        var match,

            pl     = /\+/g,  // Regex for replacing addition symbol with a space

            search = /([^&=]+)=?([^&]*)/g,

            decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },

            query  = window.location.search.substring(1);



        urlParams = {};

        while (match = search.exec(query))

           urlParams[decode(match[1])] = decode(match[2]);

    })();

    if (urlParams["fb"] !== undefined){
          lead_from= urlParams["fb"];
        }else{
          lead_from=0;
        }

       /* if(urlParams["type"] !== undefined){
          post_type= urlParams["type"];
        }else{
          post_type= 0;
        }*/

       




	 var done_renovation_type= false;
	 var done_tm= false;
	 var done_renovation_works=false;
	 var done_email= false;
	 var done_tel= false;

	 if(!$('input.geniki-anakainisi-checkbox').is(':checked') & !$('input.anakainisi-kouzinas-checkbox').is(':checked') & !$('input.anakainisi-mpaniou-checkbox').is(':checked') & !$('input.anakainisi-ypnodomatiou-checkbox').is(':checked') & !$('input.anakainisi-saloniou-checkbox').is(':checked') & !$('input.eksoteriki-anakinisi-checkbox').is(':checked') ){
	 	$('span.msg-error-idos-anakainisis').css('display','block');
	 }else{
	 	done_renovation_type=true;
	 	$('span.msg-error-idos-anakainisis').css('display','none');
	 }

	 var tm = $('input.removal-tm').val();

	 if( tm.length > 0){

	 	done_tm= true;
	 	$('span.msg-error-tm-anakainisis').css('display','none');
	 }else{
	 	$('span.msg-error-tm-anakainisis').css('display','block');
	 }


	if(!$('input.paint-checkbox').is(':checked') & !$('input.porta-asfaleias-checkbox').is(':checked') & !$('input.koufomata-checkbox').is(':checked') & !$('input.esoterikies-portes-checkbox').is(':checked') & !$('input.ilektrologikes-ergasies-checkbox').is(':checked') & !$('input.ydraulikes-ergasies-checkbox').is(':checked') & !$('input.systimata-thermansis-checkbox').is(':checked') & !$('input.dapeda-checkbox').is(':checked') & !$('input.tzaki-checkbox').is(':checked') & !$('input.skiasis-checkbox').is(':checked') ){
	 	$('span.msg-error-ergasies-anakainisis').css('display','block');
	}else{
	 	done_renovation_works=true;
	 	$('span.msg-error-ergasies-anakainisis').css('display','none');
	}


 	var valEmail = $("input.emailaddress").val();
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(valEmail)){
      var emailLenght = 10;
    }
    else{
      var emailLenght = 0;
    }

    if(emailLenght == 10){
    	$('span.msg-error-email-anakainisis').css('display','none');
    	done_email = true;
    }else{
    	$('span.msg-error-email-anakainisis').css('display','block');
    }

    var tel = $("input.phonenumber").val();
 
    if(tel.length == 10){
    	$('span.msg-error-tel-anakainisis').css('display','none');
    	done_tel = true;
    }else{
    	$('span.msg-error-tel-anakainisis').css('display','block');
    }

    

    if(done_renovation_type & done_tm & done_renovation_works & done_email & done_tel ){

    
    	var renovation_type="Τι είδους ανακαίνιση χρειάζεστε; ";

    	var paint="";

    	var porta_asfaleias="";

    	var koyfomata="";

    	var esoterikes_portes="";

    	var ilektrologikes_ergasies="";

    	var ydraulikes_ergasies="";

    	var systimata_thermansis="";

    	var dapeda="";

    	var tzaki="";

    	var tentes="";

    	var budget =" ";

    	var txt= " ";





	
    	
    	if($('input.geniki-anakainisi-checkbox').is(':checked')){
    		 renovation_type+= "Γενική Ανακαίνιση ";
    	}

    	if($('input.anakainisi-kouzinas-checkbox').is(':checked')){
    		renovation_type+="Ανακαίνιση Κουζίνας ";
    	}

    	if($('input.anakainisi-mpaniou-checkbox').is(':checked')){
    		renovation_type+="Ανακαίνιση Μπάνιου ";
    	}

    	if($('input.anakainisi-ypnodomatiou-checkbox').is(':checked')){
    		renovation_type+="Ανακαίνιση Υπνοδωματίου ";
    	}

    	if($('input.anakainisi-saloniou-checkbox').is(':checked')){
    		renovation_type+="Ανακαίνιση Σαλονιού ";
    	}


    	if($('input.eksoteriki-anakinisi-checkbox').is(':checked')){
    		renovation_type+="Εξωτερική Ανακαίνιση ";
    	}

    	if($('input.paint-checkbox').is(':checked')){
    		paint+="Σοβατίσμα & Ελαιοχρωματισμοί: ";

    		if($('input.elaioxromatismoi-saloni-checkbox').is(':checked')){
    			paint+="Σαλόνι, ";
    		}
    		if($('input.elaioxromatismoi-kouzina-checkbox').is(':checked')){
    			paint+="Κουζίνα, ";
    		}
    		if($('input.elaioxromatismoi-mpanio-checkbox').is(':checked')){
    			paint+="Μπάνιο, ";
    		}
    		if($('input.elaioxromatismoi-upnodomatio-checkbox').is(':checked')){
    			paint+="Υπνοδωμάτια, ";
    		}

    		if($('input.elaioxromatismoi-alloixoroi-checkbox').is(':checked')){
    			paint+="άλλοι χώροι ";
    		}


    	}

    	if($('input.porta-asfaleias-checkbox').is(':checked')){
    		porta_asfaleias = "Τοποθέτηση πόρτας ασφαλείας ";
    	}

    	if($('input.koufomata-checkbox').is(':checked')){
    		koyfomata="Αντικατάσταση/Τοποθέτηση κουφωμάτων ";

    		if($('input.koufomata-saloni-checkbox').is(':checked')){
    			koyfomata+="Σαλόνι, ";
    		}

    		if($('input.koufomata-kouzina-checkbox').is(':checked')){
    			koyfomata+="Κουζίνα, ";
    		}

    		if($('input.koufomata-mpanio-checkbox').is(':checked')){
    			koyfomata+="Μπάνιο, ";
    		}

    		if($('input.koufomata-upnodomatio-checkbox').is(':checked')){
    			koyfomata+="Υπνοδωμάτια, ";
    		}

    		if($('input.koufomata-alloixoroi-checkbox').is(':checked')){
    			koyfomata+="άλλοι χώροι ";
    		}

    	}

    	if($('input.esoterikies-portes-checkbox').is(':checked')){
    		esoterikes_portes="Εσωτερικές πόρτες ";
    	}

    	if($('input.ilektrologikes-ergasies-checkbox').is(':checked')){
    		ilektrologikes_ergasies="Ηλεκτρολογικές εργασίες ";
    	}

    	if($('input.ydraulikes-ergasies-checkbox').is(':checked')){
    		ydraulikes_ergasies="Υδραυλικές εργασίες ";
    	}

    	if($('input.systimata-thermansis-checkbox').is(':checked')){
    		systimata_thermansis="Αντικατάσταση/Τοποθέτηση συστήματος θέρμανσης ";
    	}

    	if($('input.dapeda-checkbox').is(':checked')){
    		dapeda="Αποξύλωση/Τοποθέτηση Δαπέδων: ";


    		if($('input.dapeda-saloni-checkbox').is(':checked')){
    			dapeda+="Σαλόνι, ";
    		}

    		if($('input.dapeda-kouzina-checkbox').is(':checked')){
    			dapeda+="Κουζίνα, ";
    		}

    		if($('input.dapeda-mpanio-checkbox').is(':checked')){
    			dapeda+="Μπάνιο, ";
    		}

    		if($('input.dapeda-upnodomatio-checkbox').is(':checked')){
    			dapeda+="Υπνοδωμάτια, ";
    		}

    		if($('input.dapeda-alloixoroi-checkbox').is(':checked')){
    			dapeda+="άλλοι χώροι ";
    		}
    	}


    	if($('input.tzaki-checkbox').is(':checked')){
    		tzaki="Κατασκευή Τζακιού ";
    	}

    	if($('input.skiasis-checkbox').is(':checked')){
    		tentes="Συστήματα σκίασης τέντες, υπόστεγα ";
    	}

    	var select_sxedio = $("input[name='select-sxedio']:checked").val();

    	var idioktitis_enikiasti = $("input[name='idioktitis_enikiastis']:checked").val();

    	var perioxi = $('select.select_perioxi option:selected').text();

    	var episkepsi = $("input[name='episkepsi']:checked").val();

    	var anakainisi_pote = $("input[name='anakainisi-pote']:checked").val();

    	budget = $("input.budget").val();

    	txt = $("textarea.renovation-msg").val();

    	$.ajax({

                  type:"POST",

                  url:"https://myconstructor.gr/services/anakainisi/js/offer.php",

                  data:{lead_from,renovation_type,tm,valEmail,tel,renovation_type,paint,porta_asfaleias,koyfomata,esoterikes_portes,ilektrologikes_ergasies,ydraulikes_ergasies,systimata_thermansis,dapeda,tzaki,tentes,budget,txt,select_sxedio,idioktitis_enikiasti,perioxi,episkepsi,anakainisi_pote},

                  success: function(data){

                    gtag_report_conversion();
                    console.log(data);

                   $('span.validation-msg').html('Ευχαριστούμε για την καταχώρηση! Σύντομα θα επικοινωνήσουμε μαζί σας!');
                   $('span.validation-msg').css('color','green');
                   jQuery('div.btn-submit').attr('disabled','disabled');
    				// jQuery('.modal-msg').css('color', 'green');
    				// jQuery('#offerBtn').attr('disabled','disabled');

                 }

             })
    	
    }else{

    	 $('span.validation-msg').html('Σφάλμα παρακαλούμε ελέγξτε τα στοιχεία που καταχωρίσατε!');
    	 $('span.validation-msg').css('color','red');

    	
    }









}



jQuery(window).scroll(function() {
        if (jQuery(document).scrollTop() > 100) {
             	
        	$('.col-4-why-mcr').css('position','fixed');
        	$('.col-4-why-mcr').css('top','60px');


        	if($('.col-4-why-mcr').offset().top + $('.col-4-why-mcr').height() >= $('footer').offset().top - 100){
        			//$('.col-4-why-mcr').css('position', 'absolute');
        			$('.col-4-why-mcr').css('top', '0');
        			$('.col-4-why-mcr').css('position','absolute');

        	}

            if ($(window).width() <= 767) {
                $('.col-4-why-mcr').css('display','none');
            }else {
                $('.col-4-why-mcr').css('display','block');
            }

    		/*if($(document).scrollTop() + window.innerHeight < $('footer').offset().top){
        			$('.col-4-why-mcr').css('position', 'fixed');
        			$('.col-4-why-mcr').css('top', '30');
        	}*/
        
            
        }else{
        		$('.col-4-why-mcr').css('position','absolute');
        		$('.col-4-why-mcr').css('top','auto');

                if ($(window).width() <= 767) {
                    $('.col-4-why-mcr').css('display','none');
                }else {
                    $('.col-4-why-mcr').css('display','block');
                }
        
            
        }       
});

$(document).ready(function(){

    if ($(window).width() <= 767) {
                $('.col-4-why-mcr').css('display','none');
            }else {
                $('.col-4-why-mcr').css('display','block');
            }


});



function recaptchaCallback() {
    	$('button.contact-send-btn').removeAttr('disabled');
    	$('button.contact-send-btn').css('cursor','pointer');
    	$('button.contact-send-btn').css('opacity','1');
};



function contactValidation(){
	
       
	 var done_name= false;
	 var done_tel= false;
	 var done_email=false;
	 var done_thema= false;
	



	 var name = $('input.contact_name').val();

	 if( name.length > 0){
	 	done_name= true;
	 	$('span.msg-error-name-contanct').css('display','none');
	 }else{
	 	$('span.msg-error-name-contanct').css('display','block');
	 }


 	var valEmail = $("input.contact_email").val();
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(valEmail)){
      var emailLenght = 10;
    }
    else{
      var emailLenght = 0;
    }

    if(emailLenght == 10){
    	$('span.msg-error-email-contanct').css('display','none');
    	done_email = true;
    }else{
    	$('span.msg-error-email-contanct').css('display','block');
    }

    var tel = $("input.contact_tel").val();
 
    if(tel.length == 10){
    	$('span.msg-error-tel-contanct').css('display','none');
    	done_tel = true;
    }else{
    	$('span.msg-error-tel-contanct').css('display','block');
    }

    var themaVal = $('select.contact_for option:selected').val();

    if(themaVal != '0'){
    	$('span.msg-error-thema-contanct').css('display','none');
    	done_thema = true;
    	thema = $('select.contact_for option:selected').text();
    	
    }else{
    	$('span.msg-error-thema-contanct').css('display','block');
    }




    

    if(done_name & done_tel & done_email & done_thema ){


    	text_msg = $('textarea.contact_msg').val();
    	
    	alert(name);
    	alert(valEmail);
    	alert(tel);
    	alert(thema);
    	alert(text_msg);

    	$.ajax({

                  type:"POST",

                  url: SITE_LOCATION+"js/contact_form.php",

                  data:{name:name,email:valEmail,tel:tel,thema:thema,text:text_msg},

                  success: function(data){

                    
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
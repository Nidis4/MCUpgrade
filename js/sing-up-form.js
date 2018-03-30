/*

*/

var smsValidationCode;



jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});



	//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

//$(".nextstep").click(function(){

function nextstep(current_fs, next_fs){	
	if(animating) return false;
	animating = true;
	
	//current_fs = $(this).parent();
	//next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
//	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 1, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
}
//});
function previousstep(current_fs, previous_fs){	
//$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	//current_fs = $('fieldset.'+current_fs);
	//previous_fs = $('fieldset.'+current_fs).prev();
	
	//de-activate current step on progressbar
	//$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 1, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
//});
}

$(".submit").click(function(){
	return false;
})




function validateFirstStep(){

	var doneName= false;
	var doneLastname = false;
	var doneEmail= false;
	var doneTel = false;

	var first_name = $("input.fname").val();
    var last_name = $("input.lname").val();
    var valEmail = $("input.sing_up_email").val();
    var tel = $("input.sing_up_til").val();
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(valEmail)){
      var emailLenght = 10;
    }
    else{
      var emailLenght = 0;
    }



    if(first_name.length <= 0){
    	$('input.fname').css('background','#f2dede');

    }else{
    	doneName =true;
    	$('input.fname').css('background','#dff0d8');
    }

    if(last_name.length <= 0){
    	$('input.lname').css('background','#f2dede');

    }else{
    	doneLastname =true;
    	$('input.lname').css('background','#dff0d8');
    }

    if(emailLenght <= 0){
    	$('input.sing_up_email').css('background','#f2dede');

    }else{
    	doneEmail =true;
    	$('input.sing_up_email').css('background','#dff0d8');
    }

    if(tel.length == 10){
    	doneTel =true;
    	$('input.sing_up_til').css('background','#dff0d8');
    }else{
    	$('input.sing_up_til').css('background','#f2dede');
    }



    if(doneName & doneLastname & doneEmail & doneTel){
    	current_fs = $('fieldset.first');
		next_fs = $('fieldset.second');
		nextstep(current_fs , next_fs);

    }

}

function validateSecondStep(){

	var doneCompanyName= false;
	var doneJob= false;
	var doneHearUs = false;

	var companyName = $('input.companyName').val();
	var select_idiotita = $(".select-idiotita option:selected").text();
	var select_job = $(".select-job option:selected").val();
	var hear_us = $(".hear_us option:selected").val();

	if(companyName.length <= 0 ){
		$('input.companyName').css('background','#f2dede');
	}else{
		$('input.companyName').css('background','#dff0d8');
		doneCompanyName= true;
	}

	if(select_job < 0 ){
		$('select.select-job').css('background','#f2dede');

	}else{
		$('select.select-job').css('background','#dff0d8');
		doneJob= true;
	}

	if(hear_us < 0 ){
		$('select.hear_us').css('background','#f2dede');
	}else{
		$('select.hear_us').css('background','#dff0d8');
		doneHearUs =true;
	}


	if(doneCompanyName & doneJob & doneHearUs){
    	current_fs = $('fieldset.second');
		next_fs = $('fieldset.third');
		nextstep(current_fs , next_fs);

    }

}

function validateLastStep(smsValidationCode){

	$('#error_header ul li').remove();
	$('#error_header').css('display','none');
	
	var donevalidationCode= false;
	var doneYour_pass= false;
	var doneRepeat_pass= false;
	var doneTerms = false;

	var validationCode = $('input.validationCode').val();
	var your_pass = $('input.your_pass').val();
	var repeat_pass = $('input.repeat_pass').val();

	if( smsValidationCode == validationCode){
		donevalidationCode = true;
		$('input.validationCode').css('background','#dff0d8');
		var smsCodeError ='';
	}else{
		var smsCodeError = "<li>Λάθος κωδικός επιιβαίωσης.</li>";
		$('input.validationCode').css('background','#f2dede');
		$('#error_header ul li').append(smsCodeError);
	}

	if(your_pass.legth < 8 || repeat_pass.length < 8 ){
		var passlength = "<li>Ο προσωπικός σας κωδικός πρέπει να έχει τουλάχιστον 8 χαρακτήρες.</li>";
		$('input.your_pass').css('background','#f2dede');
		$('input.repeat_pass').css('background','#f2dede');
		$('#error_header ul').append(passlength);

	}else{
		if( your_pass == repeat_pass){
			doneYour_pass = true;
			doneRepeat_pass = true;
			$('input.your_pass').css('background','#dff0d8');
			$('input.repeat_pass').css('background','#dff0d8');
		}else{
			var wrong_passwords = "<li>Ανόμοιοι κωδικοί παρακαλούμε επαναλάβετε τον προσοπικό σας κωδικό.</li>";
			doneYour_pass=false;
			doneRepeat_pass = false;
			$('input.your_pass').css('background','#f2dede');
			$('input.repeat_pass').css('background','#f2dede');
			$('#error_header ul').append(wrong_passwords);
		}
	}

	if( $('input.terms-conditions:checkbox:checked').length > 0 ){
		doneTerms = true;
	}else{
		
		var errorTerms = "<li>Παρακαλούμε αποδεχτείτε τους όρους χρήσης.</li>";
		$('#error_header ul').append(errorTerms);

	}


	if(donevalidationCode & doneYour_pass & doneRepeat_pass & doneTerms){
		$('#error_header').css('display','none');

		var first_name = $("input.fname").val();
	    var last_name = $("input.lname").val();
	    var valEmail = $("input.sing_up_email").val();
	    var tel = $("input.sing_up_til").val();
	    var companyName = $('input.companyName').val();
		var select_idiotita = $(".select-idiotita option:selected").text();
		var select_job = $(".select-job option:selected").val();
		var hear_us = $(".hear_us option:selected").val();

		current_fs = $('fieldset.third');
		next_fs = $('fieldset.fieldset-thank-you');
		nextstep(current_fs , next_fs);
		/*$.ajax({
                  type:"POST",
                  url:"",
                  data:{first_name,last_name,valEmail,tel,companyName,select_idiotita,select_job,hear_us,validationCode,your_pass},
                  success: function(data){
                     console.log(data);
                     current_fs = $('fieldset.third');
					 next_fs = $('fieldset.fieldset-thank-you');
                     nextstep(current_fs , next_fs);
                     
                  }
             })*/

	}else{
		$('#error_header').css('display','block');
	}

}





function returnPrevious(index){
	current_fs = index.parent().attr('class');
	current_fs = $("fieldset."+current_fs);
	previous_fs = index.parent().prev().attr('class');
	previous_fs = $("fieldset."+previous_fs);
	
	previousstep(current_fs, previous_fs);
}
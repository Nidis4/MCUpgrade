
var editArray =[];

$(".front-professional-name, .front-professional-desc, .front-professional-oneline-desc,  span.front-tel-span, span.front-offer-tel-span").attr('contentEditable',true);

$(".front-professional-name, .front-professional-desc, .front-professional-oneline-desc,  span.front-tel-span, span.front-offer-tel-span").click(function(){

	var classes= $(this).attr('class');
	editArray.push(classes);
	
});

function editprofile(){


	var arrayNewInfos;
	var edits = editArray.length;
	var name= $('.front-professional-name').text();
	var professionalDesc= $('.front-professional-desc').text();
	var onelineProfessionalDesc= $('.front-professional-oneline-desc').text();
	var professionalTel= $('span.front-tel-span').text();
	var professionalOfferTel= $('span.front-offer-tel-span').text();

	for (i=0; i<edits; i++){

		if('front-professional-name' == editArray[i]){
			var name = $('.'+editArray[i]).text();

		}else if('front-professional-desc' == editArray[i]){
			var professionalDesc = $('.'+editArray[i]).text();

		}else if('front-professional-oneline-desc' == editArray[i]){
			var onelineProfessionalDesc = $('.'+editArray[i]).text();

		}else if('span.front-tel-span' == editArray[i]){
			var professionalTel = $('.'+editArray[i]).text();
		}else if('span.front-offer-tel-span'){
			var professionalOfferTel = $('.'+editArray[i]).text();
		}

	}

	arrayNewInfos = {'ProfessionalName':name, 'ProffessionalDescription': professionalDesc, 'ProffessionalOnline':onelineProfessionalDesc, 'ProffessionalPhone':professionalTel, 'OfferPhone':professionalOfferTel };

	/*alert(arrayNewInfos.ProfessionalName);
	alert(arrayNewInfos.ProffessionalDescription);
	alert(arrayNewInfos.ProffessionalOnline);
	alert(arrayNewInfos.ProffessionalPhone);
	alert(arrayNewInfos.OfferPhone);*/


}

$(".profile-side-menu ul a").on("click", function() {
  $(".profile-side-menu ul ").find(".active").removeClass("active");
  $(this).find('li').addClass("active");
});






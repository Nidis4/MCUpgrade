$(document).ready(function(){
	$("#open-close-filters").click(function (){
		//$("div#filters").css('display','block');
		$("div#filters").delay(50).fadeIn();

		$('li.close-filters a').css('display','block');
		$("#open-close-filters").css('display','none');
	});
});

$(document).ready(function(){

	$('li.close-filters a').click(function (){
		$('li.close-filters a').css('display','none');
		$("#open-close-filters").css('display','block');
		$("div#filters").delay(50).fadeOut();
	});
});

$(document).mouseup(function (e)
{
    var container = $("div#filters");

    if (!container.is(e.target) && container.has(e.target).length === 0){// if the target of the click isn't the container... nor a descendant of the container
		//$("div#filters").css('display','none');
		$("div#filters").delay(50).fadeOut();
		$('li.close-filters a').css('display','none');
		$('#open-close-filters').css('display','block');
    }
});

$(document).ready(function(){

	$('a.read-more-desc').click(function(){
		$('span.more_text').toggle();
		$('a.read-more-desc').css('display','none');
		$('a.read-less-desc').css('display','inline-block');
	});

	$('a.read-less-desc').click(function(){
		$('span.more_text').toggle();
		$('a.read-more-desc').css('display','inline-block');
		$('a.read-less-desc').css('display','none');
	});

});

$(document).ready(function(){

	var count_professionals = $('.prof-main-col').length;
	var count = 10;

	$('.prof-main-col').hide();
	$('.prof-main-col:lt(' + count + ')').show();
	$('#showless').hide();


	if(count >= count_professionals){
		$('div#loadmore').hide();
	}else{
		$('div#loadmore').show();
	}

	$('#loadmore').click(function () {
		//$('#showLess').show();
		   count=count+5;
		   if(count_professionals > count ){
			    $('.prof-main-col:lt(' + count + ')').slideDown( "slow" );	
			       // $(this).hide();
			}else if(count_professionals == count){
				$('.prof-main-col:lt(' + count + ')').slideDown( "slow" );
				$(this).hide();
				$('#showless').show();
			}else{
				$('.prof-main-col:lt(' + count_professionals + ')').slideDown( "slow" );
				$(this).hide();
				$('#showless').show();
			}
		});
		$('#showless').click(function () {
		    $('#loadmore').show();
		    $('#showless').hide();
		    count = 10;
		   	$('.prof-main-col').slideToggle( "slow" );
		   	$('.prof-main-col:lt(' + count + ')').slideDown( "slow" );

		});

});


$(document).ready(function(){
	var color = ['546E7A','757575', '6D4C41', 'F4511E','FB8C00', 'FFB300', 'FDD835', 'C0CA33', '7CB342', '43A047', '00897B', '00ACC1', '039BE5', '1E88E5', '3949AB', '5E35B1', '8E24AA', 'D81B60', 'e53935' ];


	$('.applications_outer .app-img').each(function( i ) {

		if(i <= 18) {
			$(this).css('background', '#'+color[i] );
		}else{
			$(this).css('background', '#'+color[i-18] );
		}

	});
});


$(document).ready(function(){
	$('select.counties').change(function(){
		var county = $('select.counties option:selected').val();
		var county_name =  $('select.counties option:selected').text();
		$('li.breadcrumb-county').html(county_name);
		var i= 0;
		$("div.prof-main-col").each(function(){
			//alert($(this).attr('data-county'));
			if($(this).attr('data-county') == county){
				i++;
				$(this).show();
			}else{
				$(this).hide();
			} 
		});
		$('span.span-count-professionals').html(i);

	});
});


$(document).ready(function(){

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
	
		
//alert(urlParams["app_id"]);

	var cat_id = urlParams["cat_id"];

	if (typeof cat_id === "undefined") {
	   cat_id=126;
	   var div_menu = $('#MainMenu').find('div#'+cat_id).prop('outerHTML');
	   var a_menu = $('#MainMenu').find('[href$="#'+cat_id+'"]').prop('outerHTML');

	   $('#MainMenu').find('[href$="#'+cat_id+'"]').remove();
	   $('#MainMenu').find('div#'+cat_id).remove();

	   var top_menu = a_menu + div_menu;

	   $('#MainMenu div.list-group').prepend(top_menu);
	   $('#MainMenu').find('div#'+cat_id).addClass('in');

	}else{

	   var div_menu = $('#MainMenu').find('div#'+cat_id).prop('outerHTML');
	   var a_menu = $('#MainMenu').find('[href$="#'+cat_id+'"]').prop('outerHTML');

	   $('#MainMenu').find('[href$="#'+cat_id+'"]').remove();
	   $('#MainMenu').find('div#'+cat_id).remove();

	   var top_menu = a_menu + div_menu;

	   $('#MainMenu div.list-group').prepend(top_menu);

	   $('#MainMenu').find('div#'+cat_id).addClass('in');
	   $('#MainMenu').find('[href$="#'+cat_id+'"]').addClass('selected-cat');
 
	}
	
});


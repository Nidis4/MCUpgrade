
/*Show category menu btn on mobile */
jQuery(window).scroll(function() {
	if($(window).width() <= 991 & $('.mobile-cat-btn').hasClass('show_cats')) {
        if (jQuery(document).scrollTop() > 185) {
	        	$('.mobile-cat-btn').css('top','20px');
	        	$('.mobile-cat-btn').css('display','block');

        }else{
        		$('.mobile-cat-btn').css('top','200px');
        		$('.mobile-cat-btn').css('display','none');
        }       
    }
});

function showMobileMenuCat(){
	var right = $(".col-md-3.col-md-sub-cats").offset().right;
	$(".col-md-3.col-md-sub-cats").css({left:right}).animate({"left":"0px"}, "slow");
	$(".mobile-cat-btn").css("display","none");
	$(".mobile-cat-btn").removeClass("show_cats");
}

function closeMobileMenuCat(){
	var left = $(".col-md-3.col-md-sub-cats").offset().left;
	$(".col-md-3.col-md-sub-cats").css({left:left}).animate({"left":"-310px"}, "slow");
	$(".mobile-cat-btn").addClass("show_cats");
}

$(document).ready(function(){
	if($(window).width() <= 991){
		$('.col-md-3.col-md-sub-cats').addClass('mobile_cat_menu');
	}else{
		$('.col-md-3.col-md-sub-cats').removeClass('mobile_cat_menu');
	}
});

$(document).mouseup(function (e){
		if($('.col-md-3.col-md-sub-cats').hasClass('mobile_cat_menu')){
			var cat_menu = $(".mobile_cat_menu");
		    if (!cat_menu.is(e.target) && cat_menu.has(e.target).length === 0){// if the target of the click isn't the container... nor a descendant of the container
			   
			        closeMobileMenuCat();
			    
			}
		}
	
});






$(document).ready(function(){ //CHANGE COUNTIES FILTER, breadcrumb county, and titles
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
			
			var county_id = urlParams["county_id"];
			

			if (typeof county_id === "undefined") {
				$("select.counties").val('53');
				var county = $('select.counties option:selected').val();
				var county_name =  $('select.counties option:selected').attr('val');
				var length = $("div.prof-main-col").length;
				$('span.span-count-professionals').html(length);
				$('li.breadcrumb-county a').html(county_name);
				$('span.stin-color').html('στην');
				$('span.span_county').html(county_name);
			}else{
				$("select.counties").val(county_id);
				var county = $('select.counties option:selected').val();
				var county_name =  $('select.counties option:selected').attr('val');
				var length = $("div.prof-main-col").length;
				$('span.span-count-professionals').html(length);
				$('li.breadcrumb-county a').html(county_name);
				$('span.span_county ').html(county_name);

				if(county == 50 || county == 45 || county == 20 || county == 11 || county == 9){
					$('span.stin-color').html('στα');
				}else if(county == 12){
					$('span.stin-color').html('στον');
				}else if(county == 52 || county == 41 || county == 32 || county == 26 || county == 18){
					$('span.stin-color').html('στο');
				}else if(county == 44 || county == 29){
					$('span.stin-color').html('στις');
				}else{
					$('span.stin-color').html('στην');
				}
			}
});


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

$(document).mouseup(function (e){
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
		   count= $('div.prof-main-col').filter(function() {
    			return $(this).css('display') !== 'none';
		   }).length;

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
		    $('#showless').hide();
		    count = 10;
		   	$('.prof-main-col').slideToggle( "slow" );
		   	$('.prof-main-col:lt(' + count + ')').slideDown( "slow" );

		   	if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}

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


$(document).ready(function(){ //DIRECTORY FILTERS
	$('select.counties').change(function(){

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

			app_id=urlParams["app_id"];

			if (typeof app_id === "undefined") {
				app_id= $('a.breadcrumb_app_name').data('app-id');
			}

		var county = $('select.counties option:selected').val();
		var url= window.location.href; 
		var new_url = url.substring(0, url.indexOf('?'));
		window.location.href = new_url+'?app_id='+app_id+'&county_id='+county;

		/*$("div.prof-main-col").each(function(){
			//alert($(this).attr('data-county'));
			if($(this).attr('data-county') == county){
				i++;
				$(this).show();
			}else{
				$(this).hide();
			} 
		});*/


		//$('span.span-count-professionals').html(i);
	});


	$('select.select-price-rating').change(function(){

		if($('select.select-price-rating option:selected').val() == 1){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("price")-$(b).data("price")
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');

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

		}

		if($('select.select-price-rating option:selected').val() == 2){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("rating") < $(b).data("rating") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');

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
		}


	});


	$('select.select-rating').change(function(){
		if($('select.select-rating option:selected').val() == 5){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("rating") < $(b).data("rating") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;
			
			$("div.prof-main-col").each(function(){
				if($(this).data("rating") >= 5){
					$(this).show();
					count++;
				}
			});
			$('.prof-main-col').hide();
			$('.prof-main-col:lt(' + count + ')').show();

			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}


		if($('select.select-rating option:selected').val() == 4.5){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("rating") < $(b).data("rating") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;
			
			$("div.prof-main-col").each(function(){
				if($(this).data("rating") >= 4.5){
					$(this).show();
					count++;
				}
			});
			$('.prof-main-col').hide();
			$('.prof-main-col:lt(' + count + ')').show();

			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}

		if($('select.select-rating option:selected').val() == 4){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("rating") < $(b).data("rating") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;
			
			$("div.prof-main-col").each(function(){
				if($(this).data("rating") >= 4){
					$(this).show();
					count++;
				}
			});
			$('.prof-main-col').hide();
			$('.prof-main-col:lt(' + count + ')').show();

			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}

	});

	
	$('select.select-total-ratings').change(function(){
		if($('select.select-total-ratings option:selected').val() == 1){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("reviews") < $(b).data("reviews") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=10;

			$('.prof-main-col').hide();
			$('.prof-main-col:lt(' + count + ')').show();

			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}


		if($('select.select-total-ratings option:selected').val() == 5){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("reviews") < $(b).data("reviews") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;

			$('.prof-main-col').hide();

			$("div.prof-main-col").each(function(){
				if($(this).data("reviews") >= 5){
					$(this).show();
					count++;
				}else{
					$(this).hide();
				}
			});
			
			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}

		if($('select.select-total-ratings option:selected').val() == 10){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("reviews") < $(b).data("reviews") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;

			$('.prof-main-col').hide();

			$("div.prof-main-col").each(function(){
				if($(this).data("reviews") >= 10){
					$(this).show();
					count++;
				}else{
					$(this).hide();
				}
			});
			
			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}


		if($('select.select-total-ratings option:selected').val() == 15){
			var professionals = $('div.prof-main-col');
			professionals.sort(function(a,b){
				return $(a).data("reviews") < $(b).data("reviews") ? 1 : -1;
			});

			$('div.prof-main-col').remove();

			$(professionals).insertAfter('nav.navbar.navbar-default.directory-filters');
			var count_professionals = $('.prof-main-col').length;
			var count=0;

			$('.prof-main-col').hide();

			$("div.prof-main-col").each(function(){
				if($(this).data("reviews") >= 15){
					$(this).show();
					count++;
				}else{
					$(this).hide();
				}
			});
			
			$('#showless').hide();
			if(count >= count_professionals){
				$('div#loadmore').hide();
			}else{
				$('div#loadmore').show();
			}
		}

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
	   /*var div_menu = $('#MainMenu').find('div#'+cat_id).prop('outerHTML');
	   var a_menu = $('#MainMenu').find('[href$="#'+cat_id+'"]').prop('outerHTML');*/

	   var a_cat_text = $('#MainMenu').find('[href$="#'+cat_id+'"]').text();
	   var a_cat_apps = $('#MainMenu').find('div#'+cat_id).html();

	   $('#MainMenu').find('[href$="#'+cat_id+'"]').remove();
	   $('#MainMenu').find('div#'+cat_id).remove();

	  /* var top_menu = a_menu + div_menu;

	   $('#MainMenu div.list-group').prepend(top_menu);
	   $('#MainMenu').find('div#'+cat_id).addClass('in');

	   $('.menu-cat-selected .selected-cat-apps').append(top_menu);*/
	   $('span.span_selected_cat_title').append(a_cat_text);
 	   $('.selected-cat-apps').append(a_cat_apps);

	}else{

	   /*var div_menu = $('#MainMenu').find('div#'+cat_id).prop('outerHTML');
	   var a_menu = $('#MainMenu').find('[href$="#'+cat_id+'"]').prop('outerHTML');*/
	   
	   var a_cat_text = $('#MainMenu').find('[href$="#'+cat_id+'"]').text();
	   var a_cat_apps = $('#MainMenu').find('div#'+cat_id).html();

	   $('#MainMenu').find('[href$="#'+cat_id+'"]').remove();
	   $('#MainMenu').find('div#'+cat_id).remove();

	   /*var top_menu = a_menu + div_menu;

	   $('#MainMenu div.list-group').prepend(top_menu);

	   $('#MainMenu').find('div#'+cat_id).addClass('in');
	   $('#MainMenu').find('[href$="#'+cat_id+'"]').addClass('selected-cat');*/
 		
 	   //$('.menu-cat-selected .selected-cat-apps') 	

 	   $('span.span_selected_cat_title').append(a_cat_text);
 	   $('.selected-cat-apps').append(a_cat_apps);
	}
	
});


$(document).ready(function(){
	$('.skillbar').each(function(){
		$(this).find('.skillbar-bar').animate({
			width:$(this).attr('data-percent')
		},6000);
	});
});


function search1(){
	 
		$('input#inputsearch').keyup(function() {
				if( this.value.length >= 3){

					var inputval = $('input#inputsearch').delay(10000).val();
				   	alert(inputval);
				}
		});
	
}

jQuery(document).ready(function($) {
  var wHeight = window.innerHeight;
  //search bar middle alignment
 $('#mk-fullscreen-searchform').css('top', wHeight / 2);
  //reform search bars
  jQuery(window).resize(function() {
    wHeight = window.innerHeight;
    $('#mk-fullscreen-searchform').css('top', wHeight / 2);
  });
  // Search
  $('#search-button').click(function() {
    console.log("Open Search, Search Centered");
    $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
  });
  $("a.mk-fullscreen-close").click(function() {
    console.log("Closed Search");
    $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
  });
});



var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
function search(){

$('input#mk-fullscreen-search-input').keyup(function() {
  //alert('asd');
    delay(function(){
      alert('Time elapsed!');
    


    }, 500 );
});

}
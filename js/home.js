$(document).ready(function(){
	$('.skillbar').each(function(){
		$(this).find('.skillbar-bar').animate({
			width:$(this).attr('data-percent')
		},6000);
	});
});


$(document).mouseup(function (e)
{
    var container = $("#search-results, #mk-fullscreen-searchform");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
        $("body").removeClass("scroll-body");
    }
});


jQuery(document).ready(function($) {
  var wHeight = window.innerHeight;
  //search bar middle alignment
 /*$('#mk-fullscreen-searchform').css('top', wHeight / 4);
  //reform search bars
  jQuery(window).resize(function() {
    wHeight = window.innerHeight;
    $('#mk-fullscreen-searchform').css('top', wHeight / 4);
  });*/
  // Search
  $('#search-button').click(function() {
    console.log("Open Search, Search Centered");
    $("div.mk-fullscreen-search-overlay").addClass("mk-fullscreen-search-overlay-show");
    $("body").addClass("scroll-body");
    setTimeout(function() {
    $('input#mk-fullscreen-search-input').focus();
    }, 300);
    
  });
  $("a.mk-fullscreen-close").click(function() {
    console.log("Closed Search");
    $("div.mk-fullscreen-search-overlay").removeClass("mk-fullscreen-search-overlay-show");
    $("body").removeClass("scroll-body");
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
  if( this.value.length >= 2){

    delay(function(){
      //alert('Time elapsed!');
      
    var term = $('input#mk-fullscreen-search-input').val();
    var getSearchAPI = API_LOCATION+'application/search.php';
    $("#search-results").empty();
    //alert (term);
    //alert (getSearchAPI);
    $.ajax({
            type: "POST",
            url: getSearchAPI,
            data: {
                term: term
            },
            dataType: "json",
            success: function(data)
            {
                //alert(data.length);
                 var htmlStr = '';
                 
                $.each(data, function(k, v){
                    //htmlStr += v.id + ' ' + v.name + '<br />';
                    //alert(v.id);


                    if (v.id!=undefined){
                        htmlStr += "<a class='avail-professional' href='application.php?id="+v.id+"'><div class='search-results-icon'><img src='../img/home-page/hat-icon.png'/></div> "+v.title_greek+" <i class='fa fa-chevron-right'></i></div>";
                    }
                    else{

                    }
               });
               
               $("#search-results").append(htmlStr);
               
            }
        });


    }, 500 );
  }

});

}
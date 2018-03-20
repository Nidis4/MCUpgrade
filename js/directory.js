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

    $(document).ready(function () {
        $('.mobile-menu').click(function(){
            $('#sidebar').toggleClass('hide-menu');
            $('div#content').toggleClass('sidbar-mar-left');
        });
    });
    $(document).ready(function(){
        $('.read-more-btn').click(function(){
            $(this).next('div.read-more-txt').css('display','inline');
            $(this).css('display','none');
        });

        $('.read-less-btn').click(function(){
                $(this).closest('div.read-more-txt').css('display','none');
                $(this).closest('div.read-more-txt').prev().css('display','inline');
         });
    });
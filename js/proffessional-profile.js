 // Open the Modal

    $(document).ready(function(){

      var count_porfolio_img = $('a.col-sm-3.portfolio-img').length;
      var count_img = 4;

      $('a.col-sm-3.portfolio-img').hide();
      $('a.col-sm-3.portfolio-img:lt(' + count_img + ')').show();
      $('#showless').hide();


      if(count_img >= count_porfolio_img){
        $('div#loadmore').hide();
      }else{
        $('div#loadmore').show();
      }

      $('#loadmore').click(function () {
        //$('#showLess').show();
           count_img=count_img+4;
           if(count_porfolio_img > count_img ){
              $('a.col-sm-3.portfolio-img:lt(' + count_img + ')').slideDown( "slow" );  
                 // $(this).hide();
          }else if(count_porfolio_img == count_img){
            $('a.col-sm-3.portfolio-img:lt(' + count_img + ')').slideDown( "slow" );
            $(this).hide();
            $('#showless').show();
          }else{
            $('a.col-sm-3.portfolio-img:lt(' + count_porfolio_img + ')').slideDown( "slow" );
            $(this).hide();
            $('#showless').show();
          }
        });
        $('#showless').click(function () {
            $('#loadmore').show();
            $('#showless').hide();
            count_img = 4;
            $('a.col-sm-3.portfolio-img').slideToggle( "slow" );
            $('a.col-sm-3.portfolio-img:lt(' + count_img + ')').slideDown( "slow" );

        });

    });



            
            $(".profile-side-menu ul a").on("click", function() {
              $(".profile-side-menu ul ").find(".active").removeClass("active");
              $(this).find('li').addClass("active");
            });

            

            $('.profile-side-menu a').click(function(){
              $('html, body').animate({
                  scrollTop: $( $(this).attr('href') ).offset().top
              }, 1000);
              return false;
            });


            $(document).ready(function(){
              var prices_height = $('.row.proffesional-row-content').height();
             if ($(window).width() >= prices_height){
                $('div#services').height(prices_height);
              }


            });


            $('ul.nav.nav-pills-vertical.mytabs.tab-app-profile li').click(function(){

                var prices_height = $('.row.proffesional-row-content').height();
                if ($(window).width() >= prices_height){
                  $('div#services').height(prices_height);
                }
            });











            $(document).mouseup(function (e){
                var container = $(".mySlides img, .column, .prev, .next");

                if (!container.is(e.target) && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    closeModal();
                }
            });







                    function openLightbox() {
                      document.getElementById('myLightbox').style.display = "block";
                    }

                    // Close the Modal
                    function closeModal() {
                      document.getElementById('myLightbox').style.display = "none";
                    }

                    var slideIndex = 1;
                    showSlides(slideIndex);

                    // Next/previous controls
                    function plusSlides(n) {
                      showSlides(slideIndex += n);
                    }

                    // Thumbnail image controls
                    function currentSlide(n) {
                      showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                      var i;
                      var slides = document.querySelectorAll(".mySlides");
                      var dots = document.getElementsByClassName("demo");
                      var captionText = document.getElementById("caption");
                      if (n > slides.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = slides.length}
                      for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                      }
                      
                      slides[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " active";
                      captionText.innerHTML = dots[slideIndex-1].alt;
                    }



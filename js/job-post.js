 // Open the Modal
            
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
                      var slides = document.getElementsByClassName("mySlides");
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



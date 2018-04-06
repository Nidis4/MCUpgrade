$("#loginForm").submit(function(){
    
    
    var getLoginAPI = API_LOCATION+'professional/login.php';

    $.ajax({
            type: "POST",
            url: getLoginAPI,
            data: {
                username: $("#exampleInputEmail1").val(),
                password: $("#exampleInputPassword1").val()
            },
            dataType: "json",
            success: function(data)
            {
                var result = data['ResultCode'];
                //alert(data[0]);
                
                if (result == '1') {
                     // Send Ajax request to backend.php, with src set as "img" in the POST data
                     var user = data['username'];
                     var name = data['first_name'];
                     var surname = data['last_name'];
                     var id = data['id'];
                     var fullname = name+" "+surname;
                     var type = data['type'];
                     //alert(user);
                     //return false;
                     $.post(
                                "session.php", 
                                {"user": user , "fullname":fullname, "id":id, "type":type},
                                function(result){
                                    window.location.replace('professional-profile/index.php');
                                }
                            );
                            

                    //window.location.replace('../professional-profile/index.php');
                }
                else {
                    alert(data['message']);
                    location.reload();
                }
            }
        });
    return false;
});
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


            $(document).ready(function(){
              var prices_height = $('.row.proffesional-row-content').height();
              $('div#services').height(prices_height);
            });


            $('ul.nav.nav-pills-vertical.mytabs.tab-app-profile li').click(function(){

                var prices_height = $('.row.proffesional-row-content').height();
                $('div#services').height(prices_height);

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



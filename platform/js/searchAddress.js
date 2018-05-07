
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('pac-input-address')),
            {types: ['geocode']});

        autocomplete2 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('delivery_address')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        //autocomplete.addListener('place_changed', fillInAddress);
        autocomplete.addListener('place_changed', function() {
          fillInAddress('add1');
        });
        autocomplete2.addListener('place_changed', function() {
          fillInAddress('add2');
        });
        //autocomplete2.addListener('place_changed', fillInAddress);
      }

      function fillInAddress($arg) {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var place2 = autocomplete2.getPlace();
        if($arg == 'add1'){
            $('.s_lat').val(place.geometry.location.lat());
            $('.s_lng').val(place.geometry.location.lng());
            //alert(place.geometry.location.lat());
        }
        if($arg == 'add2'){
            $('.d_lat').val(place2.geometry.location.lat());
            $('.d_lng').val(place2.geometry.location.lng());

            var s_lat = place.geometry.location.lat();
            var s_lng = place.geometry.location.lng();
            var d_lat = place2.geometry.location.lat();
            var d_lng = place2.geometry.location.lng();

            var api = API_LOCATION+'appointment/getdistance.php';

            $.ajax({
              type: "POST",
              url: api,
              data:"s_lat="+s_lat+"&s_lng="+s_lng+"&d_lat="+d_lat+"&d_lng="+d_lng,
              success:function(data){
                if($.trim(data) != 'failed'){
                  $('.distance').html('Distance : '+data);
                  $('#distance').val(data); 
                }
                else{
                $('.distance').html('incorrect address');
                }
              }
            });
        }


      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
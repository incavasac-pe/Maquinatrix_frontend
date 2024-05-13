
<?php include 'header.php' ?> 
<div class="modal fade direction-modal" id="direction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered ">
    <div class="modal-content">
    <div class="modal-header base-modal-header">
    
        <h1 class="dir-heading">Selecciona tu dirección actual</h1>  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <span class="text-success align-middle" id="Msg5"></span>
      <div class="modal-body base-modal-body">
     
    <div class="location-container location-container2">
        
 
        <div id="pac-input" class="location-input-wrapper">
            <div class="location-input-group">
  <input
    id="pac-input-loc"
    name="pac-input-loc"
    class="form-control"
    type="text"
    placeholder="Search Box"
  />
  <i class="fa-solid fa-magnifying-glass"></i>
  </div>
  </div>
    <div id="map">
 
    </div>
      
    </div>

      </div>
      <div class="modal-footer ">
      <button type="button" id="continueButtonLocation" class="btn btn-primary direction-btn" >Continuar</button>
      </div>
    </div>
  </div>
</div>
<script>
    
    document.getElementById('continueButtonLocation').addEventListener('click', function () {

      var inputElement = document.getElementById("pac-input-loc");
      var inputValue = inputElement.value; 
      if(inputValue==''){
        return
      }
     let data = {
        address: inputValue
      };
 
      var id_profile = $('#id_profile').val();

        $.ajax({
          url: '<?=$baseUrl?>/profile_basic_update?id_profile=' + id_profile,
          method: 'PATCH',
          data: JSON.stringify(data),
          contentType: "application/json",
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
          },
          success: function(response) { 
            $("#Msg5").html("<div class='alert alert-success' role='alert'>" + response.msg + "</div>");
          //  location.reload();
          },
          error: function(error) {
            console.error('Error al enviar los datos actualizados');
          }
        });
      });
  </script>
<script>
  let map;
  let markers = [];

  function initAutocomplete() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -33.8688, lng: 151.2195 },
      zoom: 13,
      mapId: "67f00e4f77c30c63",
    });

    const input = document.getElementById("pac-input");
    const input_search = document.getElementById("pac-input-loc");
    const searchBox = new google.maps.places.SearchBox(input_search);

    map.addListener("bounds_changed", () => {
      searchBox.setBounds(map.getBounds());
    });

    map.addListener("click", (event) => {
      placeMarker(event.latLng);
      getAddressFromCoordinates(event.latLng);
    });

    searchBox.addListener("places_changed", () => {
      const places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }
      markers.forEach((marker) => {
        marker.setMap(null);
      });
      markers = [];
      const bounds = new google.maps.LatLngBounds();

      places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
          console.log("Returned place contains no geometry");
          return;
        }

        const icon = {
          url: "https://raw.githubusercontent.com/Akpansheriya/post-images/main/public/placeholder_149060%20(2).png", // Blue icon URL
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25),
        };

        const marker = new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        });

        markers.push(marker);

        if (place.geometry.viewport) {
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }

  function getAddressFromCoordinates(latLng) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: latLng }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const address = results[0].formatted_address;
          document.getElementById("pac-input-loc").value = address;
        } else {
          console.error("No results found");
        }
      } else {
        console.error("Geocoder failed due to: " + status);
      }
    });
  }

  function placeMarker(location) {
    // Clear previous markers
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // Place a marker on the map
    const marker = new google.maps.Marker({
      position: location,
      map: map,
      icon: "https://raw.githubusercontent.com/Akpansheriya/post-images/main/public/placeholder_149060%20(2).png", // Blue icon URL
    });

    markers.push(marker);
  }

  window.initAutocomplete = initAutocomplete;
</script>
<script src="./assets/js/maps.js"></script>
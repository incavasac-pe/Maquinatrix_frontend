<?php include 'header.php' ?>
<?php include 'menu.php' ?>

<div class="location-main">
    <div class="location-container">
        <h1>Selecciona tu dirección actual</h1>
       
 
        <div id="pac-input" class="location-input-wrapper">
            <div class="location-input-group">
  <input
    id="pac-input-loc"
    class="form-control"
    type="text"
    placeholder="Search Box"
  />
  <i class="fa-solid fa-magnifying-glass"></i>
  </div>
  </div>
    <div id="map">
 
    </div>
        <button type="button" id="continueButtonLocation" class="btn btn-primary" >Continuar</button>
    </div>
</div>

<script>
 
function initAutocomplete() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
    mapId: "67f00e4f77c30c63",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const input_search = document.getElementById("pac-input-loc");
  const searchBox = new google.maps.places.SearchBox(input_search);

  
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        }),
      );
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

window.initAutocomplete = initAutocomplete;
 
</script>


<script>
    
    document.getElementById('continueButtonLocation').addEventListener('click', function () {
    window.location.href = 'verification_email.php';
  });
</script>
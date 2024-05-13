<?php include 'menu2.php' ?>
<?php  
$baseUrl = getenv('URL_API');

//print_r($_POST);
 
if (isset($_POST['exampleInputName'])) {
  $firstname = $_POST['exampleInputName'];
 // echo "El valor enviado es: " . $firstname;
}
if (isset($_POST['exampleInputSurname'])) {
  $lastname = $_POST['exampleInputSurname'];
 // echo "El valor enviado es: " . $lastname;
}
if (isset($_POST['exampleInputEmail1'])) {
  $email = $_POST['exampleInputEmail1'];
//  echo "El valor enviado es: " . $email;
}
if (isset($_POST['exampleInputTypeDoc'])) {
  $type_doc = $_POST['exampleInputTypeDoc'];
 // echo "El valor enviado es: " . $type_doc;
}else{
  $type_doc='1';
}
if (isset($_POST['exampleInputDocNumber'])) {
  $num_doc = $_POST['exampleInputDocNumber'];
 // echo "El valor enviado es: " . $num_doc;
}else{
  $num_doc ='';
}
if (isset($_POST['exampleInputPassword1'])) {
  $password = $_POST['exampleInputPassword1'];
//  echo "El valor enviado es: " . $password;
}


//company
if (isset($_POST['exampleInputRutRP'])) {
  $RutRepreLegal = $_POST['exampleInputRutRP'];
 // echo "El valor enviado es: " . $RutRepreLegal;
}else{
  $RutRepreLegal='';
}

if (isset($_POST['exampleInputRutEmpresa'])) {
  $rutCompany = $_POST['exampleInputRutEmpresa'];
 // echo "El valor enviado es: " . $rutCompany;
}else{
  $rutCompany='';
}

if (isset($_POST['exampleInputRazonSocial'])) {
  $razon_social = $_POST['exampleInputRazonSocial'];
 // echo "El valor enviado es: " . $razon_social;
}else{
  $razon_social='';
}
 

if (isset($_POST['type_user'])) {
  $type_user = $_POST['type_user'];

  if($type_user =='Particular') {
    $id_type_user = 1;
  }else{
    $id_type_user = 2;
  } 
}
 
?>


<div class="location-main">
    <div class="location-container">
    <span class="text-success align-middle" id="Msg"></span>
        <h1>Selecciona tu dirección actual</h1>       
 
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
        <button type="button" id="continueButtonLocation" class="btn btn-primary" >Continuar</button>
    </div>
</div>

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



<script>
    
    document.getElementById('continueButtonLocation').addEventListener('click', function () {
     register_acount();
  });

 function register_acount(){ 

    var url = '<?=$baseUrl?>/register_account';

    var inputElement = document.getElementById("pac-input-loc");
    var inputValue = inputElement.value; 
    if(inputValue==''){
      return
    }
    var id_type_user = '<?=$id_type_user?>';
    var status = 4;
    var credencials = 1;
    
    var formData = {
      id_type_user: id_type_user,
      email: '<?=$email?>',
      password: '<?=$password?>',
      firstname: '<?=$firstname?>',
      lastname: '<?=$lastname?>',
      type_doc: '<?=$type_doc?>',
      num_doc: '<?=$num_doc?>',
      address: inputValue,
      status_id: status,
      credencials:credencials
    };

    var formDataCompany = {
      id_type_user: id_type_user,
        email: '<?=$email?>',
        emailRepreLegal: '<?=$email?>',        
        password: '<?=$password?>',
        FullNameRepreLegal: '<?=$firstname?>',
        LastNameRepreLegal: '<?=$lastname?>',
        rutCompany: '<?=$rutCompany?>',
        RutRepreLegal: '<?=$RutRepreLegal?>',
        address: inputValue,
        status_id:status,
        razon_social:'<?=$razon_social?>',
        credencials:credencials
      };
  
      $.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(id_type_user == 1 ? formData:formDataCompany),
        contentType: "application/json",
        success: function(response) {
          // Manejar la respuesta del servidor en 'response'
          console.log(response);
          window.location.href = 'verification_email.php';
        },
        error: function(response,xhr, textStatus, errorThrown) {
            console.log(response.responseJSON.msg)
            var statusCode = xhr.status;  
                $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
                $('#new_password').prop('disabled', false);
        }
        
      });
  }
  
</script> 
<script src="./assets/js/maps.js"></script>
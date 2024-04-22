<?php include 'header.php' ?>
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
//  echo "El valor enviado es: " . $type_user ;
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
     register_acount();
  });

 function register_acount(){ 

    var url = '<?=$baseUrl?>/register_account';

    var inputElement = document.getElementById("pac-input-loc");
    var inputValue = inputElement.value; 
    var id_type_user = '<?=$id_type_user?>';
    var status = 4;

    var formData = {
      id_type_user: id_type_user,
      email: '<?=$email?>',
      password: '<?=$password?>',
      firstname: '<?=$firstname?>',
      lastname: '<?=$lastname?>',
      type_doc: '<?=$type_doc?>',
      num_doc: '<?=$num_doc?>',
      address: inputValue,
      status_id: status
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
        status_id:status
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
<script>
    
    document.getElementById('continueButtonLocation').addEventListener('click', function () {
    window.location.href = 'verification_email.php';
  });
</script>
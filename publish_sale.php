<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<div>

  <div id="multi-step-form-container">

    <?php include 'publish_sale_timeline.php' ?>

    <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">


      <section id="step-1" class="form-step">


        <?php include 'publish_sale_sec1.php' ?>


      </section>

      <section id="step-2" class="form-step d-none">
        <?php include 'publish_sale_sec2.php' ?>

      </section>

      <section id="step-3" class="form-step d-none">
        <?php include 'publish_sale_sec3.php' ?>

      </section>
    </form>
  </div>
</div>
<?php include 'footer.php' ?>
<script>
  document.getElementById('Cancelar_continue-btn').addEventListener('click', function () {
    var formData = $('#userAccountSetupForm').serialize();
    console.log("*****form*****",formData);
   // window.location.href = 'post_review.php';
  });
</script>



<script>
  const navigateBackward = () => {
    const currentStep = getCurrentStep();
    if (currentStep > 1) {
      navigateToFormStep(currentStep - 1);
    }
  };

  const getCurrentStep = () => {
    const visibleStep = document.querySelector('.form-step:not(.d-none)');
    return parseInt(visibleStep.id.split('-')[1]);
  };

  const navigateToFormStep = (stepNumber) => {

    document.querySelectorAll(".form-step").forEach((formStepElement) => {
      formStepElement.classList.add("d-none");
    });

    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
      formStepHeader.classList.add("form-stepper-unfinished");
      formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });

    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");

    for (let index = 0; index < stepNumber; index++) {

      const formStepCircle = document.querySelector('li[step="' + index + '"]');

      if (formStepCircle) {

        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
        formStepCircle.classList.add("form-stepper-completed");
      }
    }
  };

  document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    formNavigationBtn.addEventListener("click", () => {
      const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
      console.log("*****stepNumber***",stepNumber) 
      resumePublication(); 
      navigateToFormStep(stepNumber);
    });
  });

  const backBtn = document.querySelector('.btn-navigate-form-step-back');
  if (backBtn) {
    backBtn.addEventListener('click', navigateBackward);
  }
</script>


<script>
  document.getElementById('descrip').addEventListener('input', function () {
    var maxLength = 10000;
    var currentLength = this.value.length; 
    document.getElementById('charCount').innerText = 'Caracteres (' + currentLength + '/' + maxLength + ')';
  });
</script>


<script>
  const fileInput = document.getElementById('file-input');
  const imageContainer = document.getElementById('image-container');

  fileInput.addEventListener('change', handleImageUpload);

  function handleImageUpload() {
    const files = fileInput.files;

    for (const file of files) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const imageUrl = e.target.result;
        const imgContainer = document.createElement('div');
        imgContainer.classList.add('uploaded-image');

        const imgElement = document.createElement('img');
        imgElement.src = imageUrl;
        imgElement.alt = 'Uploaded Image';

        const heartIcon = document.createElement('div');
        heartIcon.classList.add('heart-icon');
        const heartIconImg = document.createElement('img');
      
        heartIcon.appendChild(heartIconImg);

        const galleryIcon = document.createElement('div');
        galleryIcon.classList.add('gallery-icon');
        const galleryIconImg = document.createElement('img');
       
        galleryIcon.appendChild(galleryIconImg);


        heartIcon.addEventListener('click', function () {
          imgContainer.remove();
        });

        imgContainer.appendChild(imgElement);
        imgContainer.appendChild(heartIcon);
        imgContainer.appendChild(galleryIcon);

        imageContainer.insertBefore(imgContainer, imageContainer.firstChild);
      };

      reader.readAsDataURL(file);
    }
  }
</script>

<script>
  
$(document).ready(function() {
    console.log( "ready publication sale!" ); 
     $("#confirm_public_sale").on('click', function(event) {
      registerPublication();
    });  
  });  
</script>

<script>


var id_product;
  var publicacion1;
  var publicacion2;
  var publicacion3;
  var publicacion4;
  var publicacion5;
  var tipoterreno;
  var traxion;
function setTipoT(valor){
  tipoterreno=valor;
}
function setTraccion(valor){
  traxion = valor;  
}

 function resumePublication(){ 
  console.log("resumePublication sale",id_categoria);

    publicacion1 = {  
      "id_publication_type": 1,
      "id_category": id_categoria,
      "id_product_type": $("#industria").val(),
      "id_machine":  $("#id_machine").val(),
      "status_id": 9,
      "title": id_categoria!=3 ? $("#title").val():$("#title5").val(),
      "description":  id_categoria!=3 ? $("#descrip").val():$("#descrip5").val()
     };

    publicacion2 = {   
      "id_product":id_product,
      "region": id_categoria!=3 ? $("#region").val():$("#region5").val(),
      "city": id_categoria!=3 ? $("#city").val():$("#city5").val(),
      "price": id_categoria!=3 ? $("#price").val():$("#price5").val(),
      "brand": id_categoria!=3 ? $("#marca").val():$("#marca5").val(),
      "model": id_categoria!=3 ? $("#modelo").val():$("#modelo5").val(),
      "year":  id_categoria!=3 ? $("#anios").val():$("#anios5").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val(), 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',     
      "condition": id_categoria!=3 ? $('input[name="flexRadioDefault"]:checked').val() : $('input[name="flexRadioDefault5"]:checked').val(),
      "owner": "Owner",
      "delivery": id_categoria!=3 ? $('input[name="inlineRadioOptions"]:checked').val() : $('input[name="inlineRadioOptions5"]:checked').val(),
      "pay_now_delivery": "N",
      "facipay":"N",
      "contact_me": "Contact Me PRUEBA" 
    };

    publicacion3 = {   
    "id_product": id_product,
    "weight": $("#PesoNeto").val(), 
    "power": $("#Potencia").val(), 
    "displacement": $("#Cilindrada").val(),
    "torque":  $("#Torque").val(), 
    "mixed_consumption": $("#mixed_consumption").val(),   
    "transmission": $('input[name="transmission"]:checked').val(),
    "fuel": $('input[name="combustible"]:checked').val(),
    "traction": $("#traction_index1").val(), 
    "km_traveled": $("#KilometrosRecorridos").val(),   
    "hrs_traveled": $("#Horometro").val(), 
  };

    publicacion4 = {  
    "id_product": id_product,
      "section_width":  $("#section_width").val(), 
      "aspect_ratio":  $("#aspect_ratio").val(), 
      "rim_diameter": $("#rim_diameter").val(), 
      "extern_diameter":  $("#extern_diameter").val(), 
      "load_index":  $("#load_index").val(), 
      "speed_index": $("#speed_index").val(), 
      "maximum_load":  $("#maximum_load").val(), 
      "maximum_speed": $("#maximum_speed").val(), 
      "utqg": $("#utqg").val(), 
      "wear_rate":  $("#wear_rate").val(), 
      "traction_index": traxion ? traxion : $("#traction_index").val(), 
      "temperature_index":  $("#temperature_index").val(), 
      "runflat": $('input[name="runflat"]:checked').val(),
      "terrain_type": $("#terrain_type").val(), 
      "tread_design":  $("#tread_design").val(), 
      "type_of_service":  $("#type_of_service").val(), 
      "vehicle_type": $("#vehicle_type").val(), 
      "season":  $('input[name="season"]:checked').val(),
      "land_type": tipoterreno,
      "others":  $("#others").val(), 
  };
 

  console.log("PUBLICACION 1 ",publicacion1)
  console.log("PUBLICACION 2 DETALLE ",publicacion2)
  console.log("PUBLICACION 3 TECNICA ",publicacion3)
  console.log("PUBLICACION 4 DIMENSIONES",publicacion4)

  //agrega los valores en el resumen paso 3 

  $('.btn_2').text(categoria);
 
  $('.r_marca').text( id_categoria!=3 ?  $("#marca option:selected").text(): $("#marca5 option:selected").text()); 
  $('.r_modelo').text(  id_categoria!=3 ? $("#modelo option:selected").text(): $("#modelo5 option:selected").text());
  $('.r_anio').text( publicacion2.year );
  $('.r_condicion').text(publicacion2.condition);
  
  $('.r_km').text( $("#KilometrosRecorridos").val());
  $('.r_motor').text($("#engine_number").val() ?? '');
  $('.r_ubicacion').text( publicacion2.region);
  $('.location-grey-text').text( publicacion2.region);
  var value = 'CLP ' + publicacion2.price;
  $('.r_price').text( value);

  $('.r_tipo_vendedor').text(categoria); 
  $('.r_delivery').text(publicacion2.delivery == 'Y' ? 'Sí' : 'No');

  
 }

 function registerPublication(){ 
    var url = '<?=$baseUrl?>/register_publication'; 
    var token = '<?= $_SESSION["token"]; ?>';
    $.ajax({
      url: url,
      type: "POST",
      data: JSON.stringify(publicacion1),
      contentType: "application/json",
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token);
      },
      success: function(response) {
        // Manejar la respuesta del servidor en 'response'
        console.log(response);
        id_product = response.data.id_product;
          registerPublication2(response.data.id_product)
      },
      error: function(response,xhr, textStatus, errorThrown) {
        if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session_portal.php?logout=true';
              }
          console.log(response.responseJSON.msg)
          var statusCode = xhr.status;  
              $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
              $('#new_password').prop('disabled', false);
      }
    
  });
}


function registerPublication2(id){ 

 var url = '<?=$baseUrl?>/register_product_details'; 
   
  publicacion2.id_product = id;
  publicacion3.id_product = id;
  publicacion4.id_product = id;
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(publicacion2),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    },
    success: function(response) {
      // Manejar la respuesta del servidor en 'response'
      console.log(response);
        registerPublication3()
    },
    error: function(response,xhr, textStatus, errorThrown) {
        console.log(response.responseJSON.msg)
        var statusCode = xhr.status;  
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    }
    
  });
} 

function registerPublication3(){ 
 var url = '<?=$baseUrl?>/register_product_technical';  
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(publicacion3),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    },
    success: function(response) {
      // Manejar la respuesta del servidor en 'response'
      console.log(response);
      registerPublication4()
    },
    error: function(response,xhr, textStatus, errorThrown) {
      if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session_portal.php?logout=true';
              }
        console.log(response.responseJSON.msg)
        var statusCode = xhr.status;  
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    }    
  });
}

function registerPublication4(){ 
 var url = '<?=$baseUrl?>/register_product_dimensions';  
 console.log("PUBLICACION 4 DIMENSIONES",publicacion4)
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(publicacion4),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    },
    success: function(response) {
      // Manejar la respuesta del servidor en 'response'
      uploadImagen();
      console.log(response);    
    },
    error: function(response,xhr, textStatus, errorThrown) {
        console.log(response.responseJSON.msg)
      
        if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session_portal.php?logout=true';
              }
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    } 
  });
} 

function deleteImagenAll() {   
  var token = '<?= $_SESSION["token"]; ?>';        
    $.ajax({
      type: "DELETE", 
      url: '<?= $baseUrl ?>/delete_all?id_product='+id_product,
      headers: {
          'Authorization': 'Bearer ' + token
      },
      success: function (response, textStatus, xhr)
          {
            
          },
      error: function (response) { 
          if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session_portal.php?logout=true';
              }
          }
      });
 }         
       
 function uploadImagen() {  
  var input = document.getElementById('file-input');
  var archivos = input.files;
      if(archivos.length > 0){
      deleteImagenAll();
  
        setTimeout(function() {
        var files = input.files; 
        for (var i = 0; i < archivos.length; i++) {
          var archivo = archivos[i];
            var formData = new FormData();
            formData.append('file',archivo);  
            var token = '<?= $_SESSION["token"]; ?>';      
            var orden = i +1;  
            $.ajax({
                type: "POST",
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                url: '<?= $baseUrl ?>/upload_image?id_product='+id_product+'&orden='+orden+'&cover=true',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: formData, 
                success: function (response, textStatus, xhr)
                {
                  sendDataResume(archivo.name);
                },
                error: function (response) { 
                    if (response.status === 401 || response.status === 403) {
                        window.location.href = 'create_session_portal.php?logout=true';
                    }
                  }
                  });
                } 
            }, 1000); // 3000 milisegundos = 3 segundos
        }     
      }

function sendDataResume(imagen){
  var form = document.createElement('form');
  form.method = 'POST';
  form.action = 'Arriendo_post_review.php';

  var input3= document.createElement('input');
  input3.type = 'text';
  input3.name = 'id';
  input3.value = id_product;
  form.appendChild(input3);

  var input1 = document.createElement('input');
  input1.type = 'text';
  input1.name = 'title';
  input1.value =  $("#title").val();
  form.appendChild(input1);

  var input2 = document.createElement('input');
  input2.type = 'text';
  input2.name = 'imagen';
  input2.value = imagen;
  form.appendChild(input2);

  document.body.appendChild(form);
  form.submit();
}

</script>
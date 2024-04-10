<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<div>

  <div id="multi-step-form-container">
    <!-- Form Steps / Progress Bar -->
    <?php include 'Arriendo_sale_timeline.php' ?>
    <!-- Step Wise Form Content -->
    <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
      <!-- Step 1 Content -->

      <section id="step-1" class="form-step">


        <?php include 'Arriendo_sale_sec1.php' ?>


      </section>
      <!-- Step 2 Content, default hidden on page load. -->
      <section id="step-2" class="form-step d-none">
        <?php include 'Arriendo_sale_sec2.php' ?>
    
      </section>
      <!-- Step 3 Content, default hidden on page load. -->
      <section id="step-3" class="form-step d-none">
        <?php include 'Arriendo_sale_sec3.php' ?>
     
      </section>
    </form>
  </div>
</div>
<?php include 'footer.php' ?>
<script>
  document.getElementById('Cancelar_continue-btn').addEventListener('click', function () {
    var formData = $('#userAccountSetupForm').serialize();
    console.log("*****form*****",formData);
    window.location.href = 'Arriendo_post_review.php';
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
    var maxLength = 10000; // Set your maximum character count
    var currentLength = this.value.length;

    // Update the character count inside brackets
    document.getElementById('charCount').innerText = 'Caracteres (' + currentLength + '/' + maxLength + ')';
  });
 
</script>
<script>
  
$(document).ready(function() {
    console.log( "ready publication!" ); 
     $("#confirm_public").on('click', function(event) {
      registerPublication();
    });  
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

  var id_product;
  var publicacion1;
  var publicacion2;
  var publicacion3;
  var publicacion4;
  var publicacion5;

 function resumePublication(){  

    publicacion1 = {  
      "id_publication_type": 1,
      "id_category": id_categoria,
      "id_product_type": $("#industria").val(),
      "id_machine":  $("#id_machine").val(),
      "status_id": 9,
      "title": $("#title").val(),
      "description":$("#descrip").val()
     };

    publicacion2 = {   
      "id_product":id_product,
      "region":  $("#region").val(),
      "city":  $("#city").val(),
      "price":  $("#price").val(),
      "brand": $("#marca").val(),
      "model": $("#modelo").val(),
      "year": $("#anios").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val(), 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',
      "warranty": $('input[name="rental"]:checked').val(),
      "condition": $('input[name="flexRadioDefault"]:checked').val(),
      "owner": "Owner",
      "delivery": $('input[name="inlineRadioOptions"]:checked').val(),
      "pay_now_delivery": "N",
      "facipay": $('input[name="price_type"]:checked').val(),
      "contact_me": "Contact Me PRUEBA" 
    };

    publicacion3 = {   
    "id_product": id_product,
    "weight": $("#PesoNeto").val(), 
    "power": $("#Potencia").val(), 
    "displacement": $("#Cilindrada").val(),
    "torque":  $("#Torque").val(), 
    "mixed_consumption": $("#mixed_consumption").val(),   
    "transmission":$('input[name="transmission"]:checked').val(),
    "fuel": $('input[name="combustible"]:checked').val(),
    "traction": $("#traction_index1").val(), 
    "km_traveled": $("#KilometrosRecorridos").val(),   
    "hrs_traveled": $("#Horometro").val(), 
  };

    publicacion4 = {  
    "id_product": id_product,
      "section_width": "Section Width",
      "aspect_ratio": "Aspect Ratio",
      "rim_diameter": "Rim Diameter",
      "extern_diameter": "External Diameter",
      "load_index": "Load Index",
      "speed_index": "Speed Index",
      "maximum_load": "Maximum Load",
      "maximum_speed": "Maximum Speed",
      "utqg": "UTQG",
      "wear_rate": "Wear Rate",
      "traction_index": "Traction Index",
      "temperature_index": "Temperature Index",
      "runflat": "Runflat",
      "terrain_type": "Terrain Type",
      "tread_design": "Tread Design",
      "type_of_service": "Type of Service",
      "vehicle_type": "Vehicle Type",
      "season": "Season",
      "land_type": "Land Type",
      "others": "Others"
  };
    publicacion5 ={
      "id_product": id_product,
      "Scheduled_Maintenance": $('input[name="maintenance"]:checked').val(),
      "Supply_Maintenance": $('input[name="maintenance_suppy"]:checked').val(),
      "Technical_Visit": $('input[name="technical"]:checked').val(),
      "operational_certificate": $('input[name="technical"]:checked').val(),
      "operational_certificate_date": $("#dateCerti").val(),  
      "operational_certificate_attachment": "certificate.pdf",
      "Insurance_Policy": $('input[name="insurance"]:checked').val(),
      "Insurance_Policy_attachment": "certificate.pdf",//PDF
      "delivery": $('input[name="shipping"]:checked').val(),  
      "operator_included": $('input[name="operator"]:checked').val(),
      "rental_contract":  $('input[name="Machinery"]:checked').val(), 
      "rental_guarantee": $('input[name="rental"]:checked').val(), 
    }

  console.log("PUBLICACION 1 ",publicacion1)
  console.log("PUBLICACION 2 DETALLE ",publicacion2)
  console.log("PUBLICACION 3 TECNICA ",publicacion3)
  console.log("PUBLICACION 4 DIMENSIONES",publicacion4)
  console.log("PUBLICACION 5 RENTAL",publicacion5)
  //agrega los valores en el resumen paso 3 
  
  $('.btn_2').text(categoria);
  $('.r_marca').text(  $("#marca option:selected").text()); 
  $('.r_modelo').text(  $("#modelo option:selected").text());
  $('.r_anio').text($("#anios").val());
  $('.r_condicion').text($('input[name="flexRadioDefault"]:checked').val());
  
  $('.r_km').text( $("#KilometrosRecorridos").val());
  $('.r_motor').text($("#engine_number").val() ?? '');
  $('.r_ubicacion').text( $("#region option:selected").text());
  $('.location-grey-text').text( $("#region option:selected").text());
  var value = 'CLP ' +$("#price").val() + ' / hora'
  $('.r_price').text( value);

  $('.r_tipo_vendedor').text(categoria);
  $('.r_delivery').text($('input[name="inlineRadioOptions"]:checked').val() == 'Y' ? 'Sí' : 'No');

  $('.r_delivery1').text($('input[name="shipping"]:checked').val() == 'Y' ? 'Sí' : 'No');
  $('.r_operator').text($('input[name="operator"]:checked').val() == 'Y' ? 'Sí' : 'No');
  $('.r_Machinery').text($('input[name="Machinery"]:checked').val() == 'Y' ? 'Sí' : 'No');
  $('.r_rental').text($('input[name="rental"]:checked').val() == 'Y' ? 'Sí' : 'No'); 
  $('.btn_rrrr').text(categoria);
  $('.r_title').text( $("#title").val());
 
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
  
  console.log("PUBLICACION 2 DETALLE ",publicacion2)
  publicacion2.id_product = id;
  publicacion3.id_product = id;
  publicacion4.id_product = id;
  publicacion5.id_product = id;
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
      registerPublication5()
      console.log(response);    
    },
    error: function(response,xhr, textStatus, errorThrown) {
        console.log(response.responseJSON.msg)
        var statusCode = xhr.status;  
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    } 
  });
}

function registerPublication5(){ 
 var url = '<?=$baseUrl?>/register_product_rental';  
 console.log("PUBLICACION 5 RENTAL",publicacion5)
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(publicacion5),
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
        var statusCode = xhr.status;  
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
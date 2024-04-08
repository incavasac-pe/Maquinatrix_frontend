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
        <!-- <div class="mt-3">
      Step 2 input fields goes here..
    </div>
    <div class="mt-3">
      <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
      <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
    </div> -->
      </section>
      <!-- Step 3 Content, default hidden on page load. -->
      <section id="step-3" class="form-step d-none">
        <?php include 'Arriendo_sale_sec3.php' ?>
        <!-- <div class="mt-3">
      <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
      <button class="button submit-btn" type="submit">Save</button>
    </div> -->
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
      var formData = $('#userAccountSetupForm').serialize();
      console.log("*****formulario1 111111111111*****",formData);
      registerPublication1();
      capturarImagenes();
      navigateToFormStep(stepNumber);
    });
  });

  const backBtn = document.querySelector('.btn-navigate-form-step-back');
  if (backBtn) {
    backBtn.addEventListener('click', navigateBackward);
  }
</script>


<script>
  document.getElementById('exampleFormControlTextarea1').addEventListener('input', function () {
    var maxLength = 10000; // Set your maximum character count
    var currentLength = this.value.length;

    // Update the character count inside brackets
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

  var id_product;
 function registerPublication1(){ 

var url = '<?=$baseUrl?>/register_publication'; 

var publicacion1 = {  
  "id_publication_type": 1,
  "id_category": id_categoria,
  "id_product_type": $("#industria").val(),
  "id_machine":  $("#id_machine").val(),
  "status_id": 6,
  "title": $("#title").val(),
  "description":$("#descrip").val(),
};

var publicacion2 = {  
 
 "id_product":id_product,
 "region":  $("#region").val(),
 "city":  $("#city").val(),
 "price":  $("#price").val(),
 "brand": $("#marca").val(),
 "model": $("#modelo").val(),
 "year": $("#anios").val(),
 "factory_code": "Factory Code",
 "mileage": $("#KilometrosRecorridos").val(), 
 "engine_number": $("#engine_number").val(),
 "chasis_number":$("#chasis_number").val(),
 "patent": $("#patente").val(),
 "warranty": $('input[name="rental"]:checked').val(),
 "condition": $('input[name="flexRadioDefault"]:checked').val(),
 "owner": "Owner",
 "delivery": $('input[name="inlineRadioOptions"]:checked').val(),
 "pay_now_delivery": "Y",
 "facipay": "Y",
 "contact_me": "Contact Me PRUEBA" 

};

var publicacion3 = {  
 
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

var publicacion4 = {  
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

console.log("PUBLICACION 1 ",publicacion1)
console.log("PUBLICACION 2 DETALLE ",publicacion2)
console.log("PUBLICACION 3 TECNICA ",publicacion3)
console.log("PUBLICACION 4 DIMENSIONES",publicacion4)

//agrega los valores en el resumen paso 3 
 
$('.btn_2').text(categoria);
uploadImgen();
 return;
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(formData),
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
 return;
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(formData),
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
 
console.log("PUBLICACION 3 TECNICA ",publicacion3)
 return;
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(formData),
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
 return;
  var token = '<?= $_SESSION["token"]; ?>';
  $.ajax({
    url: url,
    type: "POST",
    data: JSON.stringify(formData),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + token);
    },
    success: function(response) {
      // Manejar la respuesta del servidor en 'response'
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

function capturarImagenes() {
  var input = document.getElementById('file-input');
  var archivos = input.files;
  
  // Recorrer los archivos seleccionados
  for (var i = 0; i < archivos.length; i++) {
    var archivo = archivos[i];
    console.log(archivo.name); // Imprimir el nombre del archivo
    // Realizar otras operaciones con el archivo seleccionado
  }
}

function deleteImagenAll() {   
  var token = '<?= $_SESSION["token"]; ?>';        
    $.ajax({
      type: "DELETE", 
      url: '<?= $baseUrl ?>/delete_all?id_product=2',
      headers: {
          'Authorization': 'Bearer ' + token
      },
      success: function (response, textStatus, xhr)
          {
            
          },
      error: function (response) { 
          if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session.php?logout=true';
              }
          }
      });
    }         
             

function uploadImgen() { 
            
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
                url: '<?= $baseUrl ?>/upload_image?id_product=2&orden='+orden+'&cover=true',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: formData, 
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
</script>
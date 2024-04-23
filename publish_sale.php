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
  var save_public = false;
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
  const uploadInputContainer = document.getElementById('upload-input-container');

  fileInput.addEventListener('change', handleImageUpload);

  function handleImageUpload() {
    const files = fileInput.files;

    // Calculate the index to insert the new image container
    const insertIndex = imageContainer.children.length > 1 ? 1 : 0;

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

        const bottomStrip = document.createElement('div');
        bottomStrip.classList.add('bottom-strip');
        const pTag = document.createElement('p');
        pTag.textContent = 'Imagen de portada';
        bottomStrip.appendChild(pTag);

        heartIcon.addEventListener('click', function () {
          imgContainer.remove();
        });

        galleryIcon.addEventListener('click', function () {
          // Store the first child image
          const firstChild = imageContainer.firstChild;
          // Replace the first child image with the clicked image
          imageContainer.insertBefore(imgContainer, firstChild);
          // Move the first child image to the location of the clicked image
          imgContainer.parentNode.insertBefore(firstChild, imgContainer.nextSibling);
        });

        imgContainer.appendChild(imgElement);
        imgContainer.appendChild(heartIcon);
        imgContainer.appendChild(galleryIcon);
        imgContainer.appendChild(bottomStrip);

        // Insert the new image container at the calculated index
        imageContainer.insertBefore(imgContainer, imageContainer.children[insertIndex]);
        // Move the file input container after the last uploaded image
        imageContainer.parentNode.insertBefore(uploadInputContainer, null);
      };

      reader.readAsDataURL(file);
    }
  }
</script>


<script>
  
$(document).ready(function() {
    console.log( "ready publication sale!" ); 
    $("#error-container").hide();
     $("#confirm_public_sale").on('click', function(event) {
      save_public = true;
      registerPublication(0);
    });  

    $("#save_public1").on('click', function(event) {
      resumePublication(1,false);   
    }); 
    $("#save_public2").on('click', function(event) {
      resumePublication(2,false);   
    });  
    $("#save_public3").on('click', function(event) {
      resumePublication(3,false);  
    });   
   
    $("#industria").on('change', function(event) {
    if( $("#id_machine").val()!='0' &&  $("#industria").val()!='0' ){
        $("#error-container-tipo").hide();
      }else{
        $("#error-container-tipo").show();
      }
    }); 
    $("#id_machine").on('change', function(event) {
    if( $("#id_machine").val()!='0' &&  $("#industria").val()!='0' ){
        $("#error-container-tipo").hide();
      }else{
        $("#error-container-tipo").show();
      }
    }); 

    $("#anios").on('change', function(event) {
    if( $("#title").val()!='' && $("#marca").val()!='0' &&  $("#modelo").val()!='0' &&  $("#anios").val()!='0'){
        $("#error-container-title").hide();
      }else{
        $("#error-container-title").show();
      }
    }); 

    $("#anios5").on('change', function(event) {
    if( $("#title5").val()!='' && $("#marca5").val()!='0' &&  $("#modelo5").val()!='0' &&  $("#anios5").val()!='0'){
        $("#error-container-title5").hide();
      }else{
        $("#error-container-title5").show();
      }
    }); 

    $("#price").on('keyup', function(event) { 
    if( $("#price").val()!=''){
        $("#error-container-price").hide();
      }else{
        $("#error-container-price").show();
      }
    });  

    $("#price5").on('keyup', function(event) { 
    if( $("#price5").val()!=''){
        $("#error-container-price5").hide();
      }else{
        $("#error-container-price5").show();
      }
    });


    $("#city").on('change', function(event) {
      if(   $("#city").val()!='0' &&  $("#region").val()!='0'){
        $("#error-container-ubicacion").hide();
      }else{
        $("#error-container-ubicacion").show();
      }
    }); 
    $("#region").on('change', function(event) {
      if(   $("#city").val()!='0' &&  $("#region").val()!='0'){
        $("#error-container-ubicacion").hide();
      }else{
        $("#error-container-ubicacion").show();
      }
    }); 
     $("#city5").on('change', function(event) {
      if( $("#city5").val()!='0' &&  $("#region5").val()!='0'){
        $("#error-container-ubicacion5").hide();
      }else{
        $("#error-container-ubicacion5").show();
      }
    }); 
    $("#region5").on('change', function(event) {
      if( $("#city5").val()!='0' &&  $("#region5").val()!='0'){
        $("#error-container-ubicacion5").hide();
      }else{
        $("#error-container-ubicacion5").show();
      }
    }); 

    $("#aspect_ratio").on('keyup', function(event) {
      if( $("#aspect_ratio").val()!='' &&  $("#section_width").val()!=''){
        $("#error-container-dimen").hide();
      }else{
        $("#error-container-dimen").show();
      }
    });
    $("#section_width").on('keyup', function(event) {
      if( $("#aspect_ratio").val()!='' &&  $("#section_width").val()!=''){
        $("#error-container-dimen").hide();
      }else{
        $("#error-container-dimen").show();
      }
    });

    $("#load_index").on('keyup', function(event) {
      if( $("#load_index").val()!='' &&  $("#speed_index").val()!=''){
        $("#error-container-espec").hide();
      }else{
        $("#error-container-espec").show();
      }
    });

    $("#speed_index").on('keyup', function(event) {
      if( $("#load_index").val()!='' &&  $("#speed_index").val()!=''){
        $("#error-container-espec").hide();
      }else{
        $("#error-container-espec").show();
      }
    });

    $('#pdfFile').change(function() {
      console.log("subir doc", $(this)[0].files[0]); 
    });

    $('#pdfFile1').change(function() {
      console.log("subir doc11", $(this)[0].files[0]); 
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

function resumePublication(step,save){  
  console.log("resumePublication sale",id_categoria);

    publicacion1 = {  
      "id_publication_type": 2,
      "id_category": id_categoria,
      "id_product_type": $("#industria").val(),
      "id_machine":  $("#id_machine").val(),
      "status_id": 9,
      "title": id_categoria!='3' ? $("#title").val():$("#title5").val(),
      "description":  id_categoria!='3' ? $("#descrip").val():$("#descrip5").val()
     };

    publicacion2 = {   
      "id_product":id_product,
      "region": id_categoria!='3' ? $("#region").val():$("#region5").val(),
      "city": id_categoria!='3' ? $("#city").val():$("#city5").val(),
      "price": id_categoria!='3' ? $("#price").val():$("#price5").val(),
      "brand": id_categoria!='3' ? $("#marca").val():$("#marca5").val(),
      "model": id_categoria!='3' ? $("#modelo").val():$("#modelo5").val(),
      "year":  id_categoria!='3' ? $("#anios").val():$("#anios5").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val(), 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',     
      "condition": id_categoria!='3' ? $('input[name="flexRadioDefault"]:checked').val() : $('input[name="flexRadioDefault5"]:checked').val(),
      "owner": "Owner",
      "delivery": id_categoria!='3' ? $('input[name="inlineRadioOptions"]:checked').val() : $('input[name="inlineRadioOptions5"]:checked').val(),
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
  if(save){
  $('.btn_2').text(categoria);
 
  $('.r_marca').text( id_categoria!='3' ?  $("#marca option:selected").text(): $("#marca5 option:selected").text()); 
  $('.r_modelo').text(  id_categoria!='3' ? $("#modelo option:selected").text(): $("#modelo5 option:selected").text());
  $('.r_anio').text( publicacion2.year);
  $('.r_condicion').text(publicacion2.condition);
  
  $('.r_km').text( $("#KilometrosRecorridos").val());
  $('.r_motor').text($("#engine_number").val() ?? '');
  $('.r_ubicacion').text( publicacion2.region);
  $('.location-grey-text').text( publicacion2.region);
  var value = 'CLP ' + publicacion2.price;
  $('.r_price').text( value);

  $('.r_tipo_vendedor').text(categoria); 
  $('.r_delivery').text(publicacion2.delivery == 'Y' ? 'Sí' : 'No');
  $('.r_title').text(publicacion1.title);
  if(step==3){

      var imgPreview = document.getElementById('image-preview');
      var input = document.getElementById('file-input');
      var file = input.files[0];

      var reader = new FileReader();
      reader.onload = function(e) {
        imgPreview.src = e.target.result;
      }
      reader.readAsDataURL(file); 
      }
  }else{
    registerPublication(step);
  }
    
 }

 function registerPublication(step_public){ 
  if(step_public <= 3 ){
    publicacion1.status_id = 10;
  }
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
       var token = '<?= $_SESSION["token"]  ?? ''?>';    
        setTimeout(function() {
       // var files = input.files; 
        var loading = 0;
        for (var i = 0; i < archivos.length; i++) {
          var archivo = archivos[i];
            var formData = new FormData();
            formData.append('file',archivo);  
           
            var orden = i +1; 
            if(orden==1){
              cover = true;
            } else{
              cover = false;
            }
            $.ajax({
                type: "POST",
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                url: '<?= $baseUrl ?>/upload_image?id_product='+id_product+'&orden='+orden+'&cover='+cover,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: formData, 
                success: function (response, textStatus, xhr)
                {
                  loading++;
                  if(loading == archivos.length){
                
                    if(save_public){
                      sendDataResume(archivo[0]);
                    }else{
                      window.location.href = 'user_details.php?tab=publication'; 
                    }
                  }
                },
                error: function (response) { 
                    if (response.status === 401 || response.status === 403) {
                        window.location.href = 'create_session_portal.php?logout=true';
                    }
                  }
                  });
                } 
            }, 1000); // 3000 milisegundos = 3 segundos
        }  else{
          if(!save_public){ 
            window.location.href = 'user_details.php?tab=publication'; 
           }
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
    input1.value =   id_categoria!='3' ? $("#title").val():$("#title5").val(),
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
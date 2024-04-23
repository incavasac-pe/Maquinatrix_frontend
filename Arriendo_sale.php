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
      if(stepNumber==2 & ($("#industria").val()=='0' || $("#id_machine").val()=='0' || $("#title").val()=='' || $("#marca").val()=='0' || $("#modelo").val()=='0' 
          || $("#price").val()=='' || $("#region").val()=='0' || $("#city").val() == '0' || $("#anios").val() == '0' )){
        console.log("se validan los campos no están completos.");

        if(id_categoria=='' || $("#industria").val()=='0' || $("#id_machine").val()=='0' ){
          $("#error-container-tipo").show();          
        }else{
          $("#error-container-tipo").hide();
        }

        if($("#title").val()=='' || $("#marca").val()=='0' || $("#modelo").val()=='0' || $("#anios").val() == '0'){
          $("#error-container-title").show();
        }else{
          $("#error-container-title").hide();
        }
    
        if( $('#price_type1').is(':checked') || $('#price_type2').is(':checked') && $("#price").val()!=''){
          $("#error-container-price").hide();
        }else{
          $("#error-container-price").show();
        }

        if( $("#region").val()=='0' || $("#city").val() == '0'){
          $("#error-container-ubicacion").show();
        }else{
          $("#error-container-ubicacion").hide();
        }  
       
        var info = id_categoria == 1 ? 'Información de maquinaria y vehículos.' : 'Información de equipos.'
 
        $('.text-msg-error').text('Campos requeridos faltan completar: '+info);
        $("#error-container").show();
       return;
      }else{
        $("#error-container").hide();
      }
     
      resumePublication(stepNumber,true);      
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
    $("#error-container").hide();
     $("#confirm_public").on('click', function(event) {
      save_public = true;
      registerPublication(8);
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

    $("#price").on('keyup', function(event) { 
    if($('#price_type1').is(':checked') || $('#price_type2').is(':checked') && $("#price").val()!=''){
        $("#error-container-price").hide();
      }else{
        $("#error-container-price").show();
      }
    });  

    $("#price_type2").on('change', function(event) {
     if( $('#price_type2').is(':checked') ){
       $("#price").val('0');
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

        const bottomStrip = document.createElement('div');
        bottomStrip.classList.add('bottom-strip');
        const pTag = document.createElement('p');
pTag.textContent = 'Imagen de portada';
bottomStrip.appendChild(pTag);
        heartIcon.addEventListener('click', function () {
          imgContainer.remove();
        });


        imgContainer.appendChild(imgElement);
        imgContainer.appendChild(heartIcon);
        imgContainer.appendChild(galleryIcon);
        imgContainer.appendChild(bottomStrip);
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
  var traxion;
 
  function setTraccion(valor){
    traxion = valor;  
  }


 function resumePublication(step,save){  

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
      "brand": $("#marca").text(),
      "model": $("#modelo").text(),
      "year": $("#anios").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val() == '', 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',
      "warranty": $('input[name="rental"]:checked').val(),
      "condition": $('input[name="flexRadioDefault"]:checked').val() ?? '',
      "owner": "",
      "delivery": $('input[name="inlineRadioOptions"]:checked').val() ?? '',
      "pay_now_delivery": "N",
      "facipay": $('input[name="price_type"]:checked').val() ?? '',
      "contact_me": "",
      "id_marca": $("#marca").val(),
      "id_model": $("#modelo").val(),
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
    "traction": traxion ? traxion : $("#traction_index1").val(), 
    "km_traveled": $("#KilometrosRecorridos").val(),   
    "hrs_traveled": $("#Horometro").val(), 
  };

    publicacion4 = {  
    "id_product": id_product,
      "section_width": "",
      "aspect_ratio": "",
      "rim_diameter": "",
      "extern_diameter": "",
      "load_index": "L",
      "speed_index": "",
      "maximum_load": "",
      "maximum_speed": "",
      "utqg": "",
      "wear_rate": "",
      "traction_index": "",
      "temperature_index": "",
      "runflat": "",
      "terrain_type": "",
      "tread_design": "",
      "type_of_service": "",
      "vehicle_type": "",
      "season": "",
      "land_type": "",
      "others": ""
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
    if(save){
    $('.btn_2').text(categoria);
    $('.r_marca').text(  $("#marca option:selected").text()); 
    $('.r_modelo').text(  $("#modelo option:selected").text());
    $('.r_anio').text($("#anios").val());
    $('.r_condicion').text($('input[name="flexRadioDefault"]:checked').val());
    
    $('.r_km').text( $("#KilometrosRecorridos").val());
    $('.r_motor').text($("#engine_number").val() ?? '');
    $('.r_ubicacion').text( $("#region option:selected").text());
    $('.location-grey-text').text( $("#region option:selected").text());
    var value =  publicacion2.facipay =='C' ? 'Cotizar' : 'CLP ' +$("#price").val() + ' / hora'
    $('.r_price').text( value);

    $('.r_tipo_vendedor').text(categoria);
    $('.r_delivery').text($('input[name="inlineRadioOptions"]:checked').val() == 'Y' ? 'Sí' : 'No');

    $('.r_delivery1').text($('input[name="shipping"]:checked').val() == 'Y' ? 'Sí' : 'No');
    $('.r_operator').text($('input[name="operator"]:checked').val() == 'Y' ? 'Sí' : 'No');
    $('.r_Machinery').text($('input[name="Machinery"]:checked').val() == 'Y' ? 'Sí' : 'No');
    $('.r_rental').text($('input[name="rental"]:checked').val() == 'Y' ? 'Sí' : 'No'); 
    $('.btn_rrrr').text(categoria);
    $('.r_title').text( $("#title").val());

    if($("#KilometrosRecorridos").val()==''){   
      $("#r_km").hide();
    }
    if($("#engine_number").val()==''){   
      $("#r_motor").hide();
    }
    if(publicacion2.condition==''){   
      $("#r_condicion").hide();
    }

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
    var token = '<?= $_SESSION["token"]  ?? ''?>';
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
  publicacion5.id_product = id;
  var token = '<?= $_SESSION["token"]  ?? ''?>';
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
 var token = '<?= $_SESSION["token"]  ?? ''?>';
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
 var token = '<?= $_SESSION["token"]  ?? ''?>';
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
 var token = '<?= $_SESSION["token"]  ?? ''?>';
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
      uploadPDF();
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
  var token = '<?= $_SESSION["token"]  ?? ''?>';
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
     
 function uploadPDF() {  
  var input = document.getElementById('pdfFile');
  var archivos = input.files;
      if(archivos.length > 0){  
       var token = '<?= $_SESSION["token"]  ?? ''?>';         
 
          var archivo = archivos[0];
            var formData = new FormData();
            formData.append('file',archivo);   
            $.ajax({
                type: "POST",
                processData: false,  // tell jQuery not to process the data
                contentType: false ,  // tell jQuery not to set contentType
                url: '<?= $baseUrl ?>/upload_pdf?id_product='+id_product+'&orden=1&type=1',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: formData, 
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
      var input_other = document.getElementById('pdfFile-other');
      var archivos__other = input_other.files; 
            if(archivos__other.length > 0){       
              var archivo_other = archivos__other[0];
                var formData = new FormData();
                formData.append('file',archivo_other);   
                $.ajax({
                    type: "POST",
                    processData: false,  // tell jQuery not to process the data
                    contentType: false ,  // tell jQuery not to set contentType
                    url: '<?= $baseUrl ?>/upload_pdf?id_product='+id_product+'&orden=1&type=2',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    data: formData, 
                    success: function (response, textStatus, xhr)
                    {
                    
                    },
                    error: function (response) { 
                      
              }
              });
            }   

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
<?php include 'menu.php'  ?> 
<?php  
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
  $host = $_SERVER['HTTP_HOST']; 
  $uri = $_SERVER['REQUEST_URI']; 
  $url_publi = $protocol . '://' . $host; 

  $baseUrl = getenv('URL_API'); 
  $count_detalle = 0;
  
  if (isset($_GET['id']) &&  $_GET['id']!== ''){
      //echo "ID RECIBIDO ". $id= $_GET['id']; 
      $url12 = $baseUrl.'/list_publications_panel_details?id='.$id;

      $response = file_get_contents($url12);
      if ($response !== false) {
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        if (!$data['error']) {
            // Obtener el detalle
            $detalle_edit = $data['data'][0]; 
           // print_r($detalle_edit);
           $count_detalle = $data['count'];
        }  
      } 
    }  
?> 
<div>

  <div id="multi-step-form-container">
    <!-- Form Steps / Progress Bar -->
    <?php include 'Arriendo_sale_timeline.php' ?>
    <!-- Step Wise Form Content -->
    <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
      <!-- Step 1 Content -->
 
      <section id="step-1" class="form-step">
      <?php
       // $id = "555"; // Reemplaza "tu_id_aqui" con el ID que deseas pasar
        include 'Arriendo_sale_sec1.php';
      ?>
    </section>
      <!-- Step 2 Content, default hidden on page load. -->
      <section id="step-2" class="form-step d-none">
        <?php 
         // $id = "555"; // Reemplaza "tu_id_aqui" con el ID que deseas pasar
        include 'Arriendo_sale_sec2.php' ?> 
      </section>
      <!-- Step 3 Content, default hidden on page load. -->
      <section id="step-3" class="form-step d-none">
        <?php
        //  $id = "555"; // Reemplaza "tu_id_aqui" con el ID que deseas pasar
          include 'Arriendo_sale_sec3.php' ?> 
      </section>
    </form>
  </div>
</div>
<?php include 'footer.php' ?>
 

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
      if(stepNumber==2 & ($("#industria").val()=='0' || $("#id_machine").val()=='0' || $("#title").val()=='' || $("#marca").val()=='0' || $("#modelo").val()=='' 
          || $("#price").val()=='' || $("#region").val()=='0' || $("#city").val() == '0' || $("#anios").val() == '0' )){
       
        if(id_categoria=='' || $("#industria").val()=='0' || $("#id_machine").val()=='0' ){
          $("#error-container-tipo").show();          
        }else{
          $("#error-container-tipo").hide();
        }

        if($("#title").val()=='' || $("#marca").val()=='0' || $("#modelo").val()=='' || $("#anios").val() == '0'){
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
    document.getElementById('charCount').innerText = 'Caracteres (' + currentLength + '/' + maxLength + ')';
  });
 
</script>
<script>
  
$(document).ready(function() {
    console.log( "ready publication!" ); 
    var product_old = '<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
      if(product_old!=''){
        edit_publi();
    }
  
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

    $(".traction-text").click(function() {
      $(".traction-text").removeClass("active_tracc");
      $(this).addClass("active_tracc");
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
    if( $("#title").val()!='' && $("#marca").val()!='0' &&  $("#modelo").val()!='' &&  $("#anios").val()!='0'){
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
const uploadInputContainer = document.getElementById('upload-input-container');

fileInput.addEventListener('change', handleImageUpload);
  var idImg= 0;
  function handleImageUpload() {
    const files = fileInput.files;

    // Calculate the index to insert the new image container
    const insertIndex = imageContainer.children.length > 1 ? 1 : 0;   
    for (const file of files) {
     
      imgArray.push(file);
      const reader = new FileReader();

      reader.onload = function (e) {
        const imageUrl = e.target.result;
        const imgContainer = document.createElement('div');
        imgContainer.classList.add('uploaded-image');
        imgContainer.id = file.name;
        idImg++;
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
          var containerId = $(this).closest('.uploaded-image').attr('id');
          for (var i = 0; i < imgArray.length; i++) { 
              if (imgArray[i].name === containerId) {  
                  idImg--;
                  imgArray.splice(i, 1);   
                  break;
              }
            }  
            imgContainer.remove();
          })

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

  var id_product;
  var publicacion1;
  var publicacion2;
  var publicacion3;
  var publicacion4;
  var publicacion5;
  var traxion;
 
  function setTraccion(valor){
    traxion = valor;  
    if(valor!=''){
      $(".traction-text").removeClass("active_tracc"); 
      $(".traction-text:contains(" + valor + ")").addClass("active_tracc");
    }
  }
 
  var idPreview = '';
 var aaa = 0;
 function resumePublication(step,save){  
    var id_product_old = '<?= isset($_GET['id']) &&  $_GET['id']!== '' ? $_GET['id'] : null; ?>';
    publicacion1 = {  
      "id_product": id_product_old,
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
      "model": $("#modelo").val(),
      "year": $("#anios").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val() ?? '', 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',
      "warranty": $('input[name="rental"]:checked').val(),
      "condition": $('input[name="flexRadioDefault"]:checked').val() ?? '',
      "owner": "",
      "delivery": $('input[name="shipping"]:checked').val() ?? '',
      "pay_now_delivery": "N",
      "facipay": $('input[name="price_type"]:checked').val() ?? '',
      "contact_me":"Contact Me" ,
      "id_marca": $("#marca").val(),
      "id_model": '1',
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
      "load_index": "",
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
      "operational_certificate": $('input[name="certificadoP"]:checked').val(),
      "operational_certificate_date": $("#dateCerti").val(),  
      "operational_certificate_attachment": "certificate.pdf",
      "Insurance_Policy": $('input[name="insurance"]:checked').val(),
      "Insurance_Policy_attachment": "certificate.pdf",//PDF
      "delivery": $('input[name="shipping"]:checked').val(),  
      "operator_included": $('input[name="operator"]:checked').val(),
      "rental_contract":  $('input[name="Machinery"]:checked').val(), 
      "rental_guarantee": $('input[name="rental"]:checked').val(), 
    }
 
  //agrega los valores en el resumen paso 3 
    if(save){
    $('.btn_2').text(categoria);
    $('.r_marca').text(  $("#marca option:selected").text()); 
    $('.r_modelo').text(  $("#modelo").val());
    $('.r_anio').text($("#anios").val());
    $('.r_condicion').text($('input[name="flexRadioDefault"]:checked').val());
    
    $('.r_km').text( $("#KilometrosRecorridos").val());
    $('.r_motor').text($("#engine_number").val() ?? '');
    $('.r_ubicacion').text( $("#region option:selected").text());
    $('.location-grey-text').text( $("#region option:selected").text());
    var value =  publicacion2.facipay =='C' ? 'Cotizar' : 'CLP ' +$("#price").val() + ' / hora'
    $('.r_price').text( value);

    $('.r_tipo_vendedor').text(categoria);
    $('.r_delivery').text($('input[name="shipping"]:checked').val() == 'Y' ? 'Sí' : 'No');

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
      $('.upload-container .uploaded-image').each(function() {
        if(aaa==0){
          idPreview = $(this).attr('id');
        } 
        aaa++;
      });   
      for (var i = 0; i < imgArray.length; i++) { 
          if (imgArray[i].name === idPreview) {  
              var blobURLPreview = URL.createObjectURL(imgArray[i]);  
              imgPreview.src = blobURLPreview 
              break;
          }
        } 
    }
  }else{
    registerPublication(step);
  }
 }

 function registerPublication(step_public){ 
    if(step_public <= 3 ){
      publicacion1.status_id = 9;
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
        id_product = response.data.id_product;
        registerPublication2(response.data.id_product)
      },
      error: function(response,xhr, textStatus, errorThrown) {
        if (response.status === 401 || response.status === 403) {
              window.location.href = 'create_session_portal.php?logout=true';
            } 
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
      registerPublication5()  
    },
    error: function(response,xhr, textStatus, errorThrown) { 
        var statusCode = xhr.status;  
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    } 
  });
}

function registerPublication5(){ 
 var url = '<?=$baseUrl?>/register_product_rental';   
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
      uploadPDF();
      uploadImagen();    
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
          { },
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
                processData: false,
                contentType: false ,
                url: '<?= $baseUrl ?>/upload_pdf?id_product='+id_product+'&orden=1&type=1',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: formData, 
                success: function (response, textStatus, xhr)
                { },
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
                    { },
                    error: function (response) { }
              });
            }   

}  
  
 function uploadImagen() {  
  var input = document.getElementById('file-input');
 // var archivos = input.files;
      if(imgArray.length > 0){
      deleteImagenAll();
       var token = '<?= $_SESSION["token"]  ?? ''?>';    
        setTimeout(function() {
        var loading = 0;
        var bbb = ''
        for (var i = 0; i < imgArray.length; i++) {
      
          var formData = new FormData();
              formData.append('file', imgArray[i]); 
              cover = false;
              if (imgArray[i].name === idPreview) { 
                bbb = i; 
                cover = true;
               }
            var orden = i +1;   
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
                  if(loading == imgArray.length){
                
                    if(save_public){                      
                        sendDataResume(imgArray[bbb]);  
                      
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
var imgArray = [];
function edit_publi(){  
   var id_='<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
   var url= '<?=$baseUrl?>/list_publications_panel_details?id=' + id_;
  
  $.ajax({
    url: url,
    method: 'GET',    
    success: function(res) {      
     if(!res.error){ 
          res.data.forEach(function(element) { 
     
          if(element.status_id == '10') { 
            setCategory(element.id_category,element.mainCategory?.category); 
            
            $("#pills-publish1-tab").click();
       
             // Establecer el valor seleccionado
            var selectize = $('#industria')[0].selectize;
            selectize.setValue(element.id_product_type);
            var selectize = $('#id_machine')[0].selectize;
            selectize.setValue(element.id_machine);
 
            $("#title").val(element.title);
            $("#descrip").val(element.description);

            var selectize = $('#marca')[0].selectize;
            selectize.setValue(element.product_details.id_marca);
            var selectize = $('#anios')[0].selectize;
            selectize.setValue(element.product_details.year);  

             $("#modelo").val(element.product_details.model);
             $("#engine_number").val(element.product_details.engine_number);
             $("#chasis_number").val(element.product_details.chasis_number);
             $("#patente").val(element.product_details.patent);
             $("#patent").val(element.product_details.patent)
            
             $("#PesoNeto").val(element.product_technical_characteristics.weight);
             $("#Potencia").val(element.product_technical_characteristics.power);
             $("#Cilindrada").val(element.product_technical_characteristics.displacement);
             $("#Torque").val(element.product_technical_characteristics.torque);
             $("#mixed_consumption").val(element.product_technical_characteristics.mixed_consumption);
              
             if(element.product_details.condition == 'Nuevo'){
               $("#flexRadioDefault1").prop("checked", true);
             }else{
              $("#flexRadioDefault2").prop("checked", true);
             }
         
             $("#KilometrosRecorridos").val(element.product_technical_characteristics.km_traveled);
             $("#Horometro").val(element.product_technical_characteristics.hrs_traveled);
             
             if(element.product_details.facipay == 'C'){  
              $("#price_type2").prop("checked", true);
             }else{
              $("#price_type1").prop("checked", true);
             }
             $("#price").val(element.product_details.price);

            var selectize = $('#region')[0].selectize;
            selectize.setValue(element.product_details.region);
            var selectize = $('#city')[0].selectize;
            selectize.setValue(element.product_details.city);

            if(element.product_technical_characteristics.transmission == 'Manual'){  
              $("#inlineRadio1").prop("checked", true);
             }else if(element.product_technical_characteristics.transmission == 'Automática'){
              $("#inlineRadio2").prop("checked", true);
             }else{
              $("#inlineRadio3").prop("checked", true);
             }
             
             if(element.product_technical_characteristics.fuel == 'Diésel'){  
              $("#inlineRadioFuel1").prop("checked", true);
             }else if(element.product_technical_characteristics.fuel == 'Bencina'){
              $("#inlineRadioFuel2").prop("checked", true);
             }else{
              $("#inlineRadioFuel3").prop("checked", true);
             }
      
             setTraccion(element.product_technical_characteristics.traction) 
             if(element.product_technical_characteristics.traction!=""){
               $(".traction-text").removeClass("active_tracc"); 
               $(".traction-text:contains(" + element.product_technical_characteristics.traction + ")").addClass("active_tracc");
             }
             if(element.product_rental.Scheduled_Maintenance == 'Y'){  
              $("#maintenance1").prop("checked", true);
             } else{
              $("#maintenance2").prop("checked", true);
             }

             if(element.product_rental.Technical_Visit == 'Y'){  
              $("#technical1").prop("checked", true);
             } else{
              $("#technical2").prop("checked", true);
             }
             if(element.product_rental.Supply_Maintenance == 'Y'){  
              $("#maintenance_suppy1").prop("checked", true);
             } else{
              $("#maintenance_suppy2").prop("checked", true);
             }

             if(element.product_rental.operational_certificate == 'Y'){  
              $("#inlineRadio1Cert").prop("checked", true);
             } else{
              $("#inlineRadio2Cert").prop("checked", true);
             }
             $("#dateCerti").val(element.product_rental.operational_certificate_date);
           
             if(element.product_rental.Insurance_Policy == 'Y'){  
              $("#insurance1").prop("checked", true);
             } else{
              $("#insurance2").prop("checked", true);
             }

             if(element.product_rental.delivery == 'Y'){  
              $("#shipping1").prop("checked", true);
             } else{
              $("#shipping2").prop("checked", true);
             }
             if(element.product_rental.operator_included == 'Y'){  
              $("#operator1").prop("checked", true);
             } else{
              $("#operator2").prop("checked", true);
             }
             if(element.product_rental.rental_contract == 'Y'){  
              $("#Machinery1").prop("checked", true);
             } else{
              $("#Machinery2").prop("checked", true);
             }
             if(element.product_rental.rental_guarantee == 'Y'){  
              $("#rental1").prop("checked", true);
             } else{
              $("#rental2").prop("checked", true);
             }
             
  //step 2 imagen edit
  const imageContainer = document.getElementById('image-container');
  const uploadInputContainer = document.getElementById('upload-input-container'); 
  
  const insertIndex = imageContainer.children.length > 1 ? 1 : 0; 
     for (var i = 0; i < element.product_images.length; i++) { 
          var imageUrlEdit = element.product_images[i].image_name; 
          
          const imgContainer = document.createElement('div');
          imgContainer.classList.add('uploaded-image');
          imgContainer.id = imageUrlEdit;
          idImg++;
            var ulr_imagen = '<?=$baseUrl?>/see_image?image='+imageUrlEdit;  
              fetch(ulr_imagen)
                .then(function(response) {
                  return response.blob();
                })
                .then(function(blob) {
                  var file = new File([blob], imgContainer.id);
                  imgArray.push(file);  
                  var blobURL = URL.createObjectURL(blob);                    

                  const imgElement = document.createElement('img');
                  imgElement.src = blobURL;
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
                  var containerId = $(this).closest('.uploaded-image').attr('id');
                    for (var i = 0; i < imgArray.length; i++) { 
                        if (imgArray[i].name === containerId) {  
                            idImg--;
                            imgArray.splice(i, 1);   
                            break;
                        }
                      }  
                    imgContainer.remove();
                  }) 

                  galleryIcon.addEventListener('click', function () { 
                    const firstChild = imageContainer.firstChild; 
                    imageContainer.insertBefore(imgContainer, firstChild); 
                    imgContainer.parentNode.insertBefore(firstChild, imgContainer.nextSibling);
                  }); 

                  imgContainer.appendChild(imgElement);
                  imgContainer.appendChild(heartIcon);
                  imgContainer.appendChild(galleryIcon);
                  imgContainer.appendChild(bottomStrip);
 
                  imageContainer.insertBefore(imgContainer, imageContainer.children[insertIndex]); 
                  imageContainer.parentNode.insertBefore(uploadInputContainer, null);
                })
                .catch(function(error) {
                  console.log('Error al descargar la imagen:', error);
                });  
             }  
          }  
        })
      }
    }
  })
}
</script>
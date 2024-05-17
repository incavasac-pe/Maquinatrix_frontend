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
  var idImg= 0;
  function handleImageUpload() {
    const files = fileInput.files;

    // Calculate the index to insert the new image container
    const insertIndex = imageContainer.children.length > 1 ? imageContainer.children.length +1 : 0;
   
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
          for (var i = 0; i < imgArray.length; i++) { 
              if (imgArray[i].name === file.name) {  
                  idImg--;
                  imgArray.splice(i, 1);   
                  break;
              }
            } 
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
    var product_old = '<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
      if(product_old!=''){
        edit_publi_sale();
    }
    
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
    if( $("#title").val()!='' && $("#marca").val()!='0' &&  $("#modelo").val()!='' &&  $("#anios").val()!='0'){
        $("#error-container-title").hide();
      }else{
        $("#error-container-title").show();
      }
    }); 

    $("#anios5").on('change', function(event) {
    if( $("#title5").val()!='' && $("#marca5").val()!='0' &&  $("#modelo5").val()!='' &&  $("#anios5").val()!='0'){
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
  if(valor!=''){
    $(".st").removeClass("active_tracc"); 
    $(".st:contains(" + valor + ")").addClass("active_tracc");
  }
}
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
  console.log("resumePublication sale",id_categoria);
  var id_product_old = '<?= isset($_GET['id']) &&  $_GET['id']!== '' ? $_GET['id'] :  null; ?>';

    publicacion1 = {  
      "id_product": id_product_old,
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
      "brand": id_categoria!='3' ? $("#marca").text():$("#marca5").text(),
      "model": id_categoria!='3' ? $("#modelo").val():$("#modelo5").val(),
      "year":  id_categoria!='3' ? $("#anios").val():$("#anios5").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val(), 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',     
      "condition": id_categoria!='3' ? $('input[name="flexRadioDefault"]:checked').val() : $('input[name="flexRadioDefault5"]:checked').val(),
      "owner": "Owner",
      "warranty": 'N',
      "delivery": id_categoria!='3' ? $('input[name="inlineRadioOptions"]:checked').val() : $('input[name="inlineRadioOptions5"]:checked').val(),
      "pay_now_delivery": "N",
      "facipay":"H",
      "contact_me": "Contact Me" ,
      "id_marca": id_categoria!='3' ? $("#marca").val():$("#marca5").val(),
      "id_model": '1',
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
 

  //agrega los valores en el resumen paso 3 
  if(save){
  $('.btn_2').text(categoria);
 
  $('.r_marca').text( id_categoria!='3' ?  $("#marca option:selected").text(): $("#marca5 option:selected").text()); 
  $('.r_modelo').text(  id_categoria!='3' ? $("#modelo").val(): $("#modelo5").val());
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
var imgArray = [];
function edit_publi_sale(){ 
  console.log("edicion de publicacion salee...")
   
  var id_='<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
  var url= '<?=$baseUrl?>/list_publications_panel_details?id=' + id_;

$.ajax({
  url: url,
  method: 'GET',    
  success: function(res) {      
   if(!res.error){ 
        res.data.forEach(function(element) { 
        if(element.status_id == '10') {  
          setCategorySale(element.id_category,element.mainCategory?.category); 
          if(element.id_category==3){
            $("#pills-publish3-tab").click();
          }else{
            $("#pills-publish1-tab").click();
          }
         
           // Establecer el valor seleccionado
          var selectize = $('#industria')[0].selectize;
          selectize.setValue(element.id_product_type);
          var selectize = $('#id_machine')[0].selectize;
          selectize.setValue(element.id_machine);

          var titleSelector, descripSelector;

            if (element.id_category == 3) {
              titleSelector = "#title5";
              descripSelector = "#descrip5";
            } else {
              titleSelector = "#title";
              descripSelector = "#descrip";
            }

            $(titleSelector).val(element.title);
            $(descripSelector).val(element.description);

            if (element.id_category == 3) {                
                var selectize = $('#marca5')[0].selectize;
                selectize.setValue(element.product_details.id_marca);
                var selectize = $('#anios5')[0].selectize;
                selectize.setValue(element.product_details.year);  
                $("#modelo5").val(element.product_details.model);
                $("#price5").val(element.product_details.price);
            } else {
                var selectize = $('#marca')[0].selectize;
                selectize.setValue(element.product_details.id_marca);
                var selectize = $('#anios')[0].selectize;
                selectize.setValue(element.product_details.year); 
                $("#modelo").val(element.product_details.model);
                $("#price").val(element.product_details.price);
            }

           
           $("#engine_number").val(element.product_details?.engine_number);
           $("#chasis_number").val(element.product_details?.chasis_number);
           $("#patente").val(element.product_details?.patent);
           $("#patent").val(element.product_details?.patent)
          
           $("#PesoNeto").val(element.product_technical_characteristics?.weight);
           $("#Potencia").val(element.product_technical_characteristics?.power);
           $("#Cilindrada").val(element.product_technical_characteristics?.displacement);
           $("#Torque").val(element.product_technical_characteristics?.torque);
           $("#mixed_consumption").val(element.product_technical_characteristics?.mixed_consumption);
                
           if (element.id_category == 3) {  
              if(element.product_details.condition == 'Nuevo'){
                $("#flexRadioDefault15").prop("checked", true);
              }else{
                $("#flexRadioDefault25").prop("checked", true);
              }
            }else{
              if(element.product_details.condition == 'Nuevo'){
                $("#flexRadioDefault1").prop("checked", true);
              }else{
                $("#flexRadioDefault2").prop("checked", true);
              }
            }
           
       
           $("#KilometrosRecorridos").val(element.product_technical_characteristics?.km_traveled);
           $("#Horometro").val(element.product_technical_characteristics?.hrs_traveled);
           
       
           if (element.id_category == 3) {  
          var selectize = $('#region5')[0].selectize;
          selectize.setValue(element.product_details.region);
          var selectize = $('#city5')[0].selectize;
          selectize.setValue(element.product_details.city);
           }else{
            var selectize = $('#region')[0].selectize;
          selectize.setValue(element.product_details.region);
          var selectize = $('#city')[0].selectize;
          selectize.setValue(element.product_details.city);
           }
           if (element.id_category == 3) {  
            if(element.product_details.delivery == 'Y'){  
              $("#inlineRadioOptions5").prop("checked", true);          
            }else{
              $("#inlineRadioOptions5").prop("checked", true);
            }
          }else{
            if(element.product_details.delivery == 'Y'){  
              $("#inlineRadioDelivery1").prop("checked", true);          
            }else{
              $("#inlineRadioDelivery2").prop("checked", true);
            }
          }

          if(element.product_technical_characteristics?.transmission == 'Manual'){  
            $("#inlineRadio1").prop("checked", true);
           }else if(element.product_technical_characteristics?.transmission == 'Automática'){
            $("#inlineRadio2").prop("checked", true);
           }else{
            $("#inlineRadio3").prop("checked", true);
           }
           
           if(element.product_technical_characteristics?.fuel == 'Diésel'){  
            $("#inlineRadioFuel1").prop("checked", true);
           }else if(element.product_technical_characteristics?.fuel == 'Bencina'){
            $("#inlineRadioFuel2").prop("checked", true);
           }else{
            $("#inlineRadioFuel3").prop("checked", true);
           }
    
           setTraccion(element.product_technical_characteristics?.traction) 
           if(element.product_technical_characteristics?.traction!=""){
             $(".traction-text").removeClass("active_tracc"); 
             $(".traction-text:contains(" + element.product_technical_characteristics?.traction + ")").addClass("active_tracc");
          } 
          if (element.id_category == 3) {   
          $("#section_width").val(element.product_dimension?.section_width);
          $("#aspect_ratio").val(element.product_dimension?.aspect_ratio);
          $("#rim_diameter").val(element.product_dimension?.rim_diameter);
          $("#land_type").val(element.product_dimension?.land_type);
          $("#load_index").val(element.product_dimension?.load_index);
          $("#speed_index").val(element.product_dimension?.speed_index);
          $("#maximum_load").val(element.product_dimension?.maximum_load);
          $("#maximum_speed").val(element.product_dimension?.maximum_speed); 
          $("#utqg").val(element.product_dimension?.utqg); 
          $("#tread_design").val(element.product_dimension?.tread_design);  
          $("#type_of_service").val(element.product_dimension?.type_of_service);  
          $("#vehicle_type").val(element.product_dimension?.vehicle_type);
          $("#terrain_type").val(element.product_dimension?.terrain_type); 
          
          $("#temperature_index").val(element.product_dimension?.temperature_index);   
          $("#traction_index").val(element.product_dimension?.traction_index);   
          $("#wear_rate").val(element.product_dimension?.wear_rate);   
          $("#extern_diameter").val(element.product_dimension?.extern_diameter);   

          if(element.product_dimension?.runflat == 'Y'){  
            $("#inlineRadio11").prop("checked", true);
           }else {
            $("#inlineRadio22").prop("checked", true);
           }

           if(element.product_dimension?.season == 'InviernoY'){  
            $("#inlineRadio1s").prop("checked", true);
           }else if(element.product_dimension?.season == 'Verano') {
            $("#inlineRadio2s").prop("checked", true);
           }else{
            $("#inlineRadio3s").prop("checked", true);
           }
          }
         

  //step 2 imagen edit
    const imageContainer = document.getElementById('image-container');
  const uploadInputContainer = document.getElementById('upload-input-container');


// Calculate the index to insert the new image container
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
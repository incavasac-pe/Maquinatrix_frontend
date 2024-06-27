<?php include 'menu.php'  ?> 
<?php  
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
  $host = $_SERVER['HTTP_HOST']; 
  $uri = $_SERVER['REQUEST_URI']; 
  $url_publi = $protocol . '://' . $host; 

  $baseUrl = getenv('URL_API'); 
  $count_detalle = 0;
  
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
 var isFormValidateSeccion0 = false;
 var isFormValidateSeccion1 = false;
 var isFormValidateSeccion2 = false;
 var isFormValidateSeccion3 = false;
 var isFormValidateSeccion4 = false;
 var isFormValidateSeccion5 = false;

  var id_product;
  var publicacion1;
  var publicacion2;
  var publicacion3;
  var publicacion4;
  var publicacion5;

  var traxion; 
  var pdfCerti,pdfCertiPoli;

 var selectedCurrency = 'CLP';
 var city='';
 var region='';

 const navigateBackward = () => {
    const currentStep = getCurrentStep();
    
    if (currentStep > 1) {
      navigateToFormStep(currentStep - 1);
    }
  };

  const navigateBackwardCancel = () => { 
      navigateToFormStep(1); 
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

    const cancelarStepperArriendo = document.querySelector('.cancelar-stepper-arriendo');
    if (cancelarStepperArriendo) {
      if (stepNumber === 1) {
        cancelarStepperArriendo.style.display = 'none';
      } else {
        cancelarStepperArriendo.style.display = '';
      }
    }
  
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
      console.log("*****stepNumber***", stepNumber);

      var isValid = validateFormSteps(stepNumber, true);
      console.log("isValid continuar*-*-", isValid);

      if(isValid) {
        resumePublication(stepNumber, true);
        if(stepNumber === 2 || stepNumber === 3  ){
          navigateToFormStep(stepNumber);
        }
      }
    });
  });

  const backBtn = document.querySelector('.btn-navigate-form-step-back');
  if (backBtn) {
    backBtn.addEventListener('click', navigateBackward);
  }

  function validateFormSteps(stepNumber, savePub) {
    if (stepNumber === 2 || stepNumber === 4 ) {
      const validationContainers = {
        seccion0: $("#error-container-titulo"),
        seccion1: $("#error-container-tipo"),
        seccion2: $("#error-container-title"),
        seccion3: $("#error-container-price"),
        seccion4: $("#error-container-ubicacion"),
        seccion5: $("#error-container-condicion"),
      };

      const isFormValid = [isFormValidateSeccion0, isFormValidateSeccion1, isFormValidateSeccion2, isFormValidateSeccion3, isFormValidateSeccion4, isFormValidateSeccion5].every((isValid, index) => {
       console.log("isFormValid",isValid)
        const container = validationContainers[`seccion${index}`];
        if (!isValid) {
          container.show();
          return false;
        } else {
          container.hide();
          return true;
        }
      });

      if (isFormValid) {
        console.log("jijijiji");
        return true;
      } else {
        $("#error-container").show();
        return false;
      }
    }
    
    if ( ( stepNumber === 3 ||  stepNumber === 5)  && idImg > 0) {
      console.log("el paso 2 para guardar y el 3 para continuar", stepNumber) 
      console.log("imagen", idImg)
     
      $("#error-container-photo").hide();  
      return true;
    } else {
      $("#error-container-photo").show();
      return false;
    }
  } 

  if (getCurrentStep() === 1) {
    const cancelarStepperArriendo = document.querySelector('.cancelar-stepper-arriendo');
    if (cancelarStepperArriendo) {
      cancelarStepperArriendo.style.display = 'none';
    }else{
      const cancelarStepperArriendo = document.querySelector('.cancelar-stepper-arriendo');
      cancelarStepperArriendo.style.display = 'none';
    }
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

var $confirmPublicSaleBtn = $('#confirm_public'); 
 
$(document).ready(function() {
    limitToCurrentYear('#anios');
    console.log( "ready publication!" ); 
    var product_old = '<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
      if(product_old!=''){
        edit_publi();
    }
  
    $("#error-container").hide();
     $("#confirm_public").on('click', function(event) {
      $(this).prop('disabled', true);
      $(this)
      .html('<i class="fa fa-spinner fa-spin"></i> Publicando...')
      .addClass('disabled');
      save_public = true;
      registerPublication(8);
    });  
    //guardar en borrador
    $('.save_public').on('click', function(event) {
  
      var $errorContainer = $("#error-container");
      $errorContainer.hide();
      let publicationId = $(this).data('publication-id');
      console.log("se manda a guardar",publicationId)
      var isValid =  validateFormSteps(publicationId,false);
      console.log("isValid*-*-guadarrrrr",isValid);
     
        if(isValid){
        
          $(this).prop('disabled', true)
        .html('<i class="fa fa-spinner fa-spin"></i> Guardando...')
        .addClass('disabled');
              
          console.log("se envia el paso 444444444444");
          resumePublication(publicationId, false);
          
        }else{
          var $errorContainer = $("#error-container");
          $errorContainer.show()
        } 
      }); 


    $(".traction-text").click(function() {
      $(".traction-text").removeClass("active_tracc");
      $(this).addClass("active_tracc");
    }); 

    //valida maquina y industria
    var $idMachine = $("#id_machine");
    var $industria = $("#industria");
    var $errorContainer = $("#error-container-tipo");

    function validateFieldsMaquine() { 
      if ($idMachine.val() !== '0' && $idMachine.val() !== '' && $industria.val() !== '0' && $industria.val() !== '') {
        $errorContainer.hide();
        isFormValidateSeccion1 = true;
      } else {
        $errorContainer.show();
        isFormValidateSeccion1 = false;
      }
    }

    $idMachine.on('change', validateFieldsMaquine);
    $industria.on('change', validateFieldsMaquine);
   // fin valida maquina y industria 
    
    var $title = $("#title");
    var $errorContainerTitulo = $("#error-container-titulo"); 
    function validateTitle() {
      var isValid = $title.val().trim() !== '';
      $errorContainerTitulo.toggle(!isValid);
      return isValid;
    }  
    $title.on('keyup', function() {
      isFormValidateSeccion0 = validateTitle();
    });

    var $marca = $("#marca");
    var $modelo = $("#modelo");
    var $anios = $("#anios");
    var $errorContainerTitle = $("#error-container-title");

    function validateFields() {
      var isValid = $marca.val().trim() !== '' &&
                    $modelo.val().trim() !== '' &&
                    $anios.val().trim() !== '';
      $errorContainerTitle.toggle(!isValid);
      return isValid;
    }

    $marca.add($modelo).add($anios).on('keyup', function() {
      isFormValidateSeccion2 = validateFields();
    });
  // fin valida title y marca,modelo,anios
  
 //valida el precio
    var $price = $("#price");
    var $priceType1 = $("#price_type1");
    var $priceType2 = $("#price_type2"); 
    var $errorContainerPrice = $("#error-container-price");

    function validatePriceFields() {
      if (($priceType1.is(':checked') || $priceType2.is(':checked')) && $price.val() !== '') {
        $errorContainerPrice.hide();
        isFormValidateSeccion3 = true;
      } else {
        $errorContainerPrice.show();
        isFormValidateSeccion3 = false;
      }
    }

    $price.on('keyup', validatePriceFields);
    $priceType2.on('change', function() {
      if ($priceType2.is(':checked')) {
        $price.val('');
        isFormValidateSeccion3 = true;
        var $priceInput = $('#price'); 
         $priceInput.prop('disabled', true);
      } 
    });

    $priceType1.on('change', function() {
      if ($priceType1.is(':checked')) {
        $price.val('');
        isFormValidateSeccion3 = true;
        var $priceInput = $('#price'); 
         $priceInput.prop('disabled', false);
         selectedCurrency = 'CLP';
      } 
    });
    var $priceInput = $("#inputGroupSelect01Price");
    $priceInput.on("change", function() {
      selectedCurrency = $(this).val();
    });
//fin valida precio

    const $region = $('.region-select');
    const $selectedComunaId = $('.comuna-select');
    const $errorContainerUbi = $("#error-container-ubicacion");
 
    function validateLocation() {
      const region = $region.val();
      const city = $selectedComunaId.val();
      const isValid = city !== '0' && city !== '' && region !== '0' && region !== '';
      $errorContainerUbi.toggle(!isValid);
      return isValid;
    }
 
    $selectedComunaId.add($region).on('change', function() {
      isFormValidateSeccion4 = validateLocation();
    });

   
      const $condicion1 = $("#flexRadioDefault1");
      const $condicion2 = $("#flexRadioDefault2");
      const $errorContainerCondicion = $("#error-container-condicion");
 
      function validateCondicion() {
        const isValid = $condicion1.is(':checked') || $condicion2.is(':checked');
        $errorContainerCondicion.toggle(!isValid);
        return isValid;
      }
 
      $condicion1.add($condicion2).on('change', function() {
        isFormValidateSeccion5 = validateCondicion();
      });

    $('#pdfFile').on('change', function() {
      var fileName = this.files[0].name; 
      pdfCerti = fileName;
      $(".operational_certificate").text('Certificado de Operatividad: ' +pdfCerti);
      
    }); 

    $('#pdfFile-other').on('change', function() {
      var fileName = this.files[0].name; 
      pdfCertiPoli = fileName; 
      $(".insurance_policy").text('Póliza de seguro: ' +pdfCertiPoli);
    });
  });
</script>
 
<script>

const fileInput = document.getElementById('file-input');
const imageContainer = document.getElementById('image-container');
const uploadInputContainer = document.getElementById('upload-input-container');
var idImg= 0;
fileInput.addEventListener('change', handleImageUpload);
  
  function handleImageUpload() {
    const files = fileInput.files;

    // Calculate the index to insert the new image container
    const insertIndex = imageContainer.children.length > 1 ? 1 : 0;   
    for (const file of files) {
     
      imgArray.push(file);
        $("#error-container-photo").hide();
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
                deleteImagenOne(containerId);
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

 
  function setTraccion(selectedTraction, edit = false) {
    traxion = selectedTraction;
  const inputField = document.getElementById('traction_index1');
  const trackionOptions = ['No clasifica', '8X4', '6X6', '4X4', '6X4', '2X2', '4X2'];

  // Reset input field
  inputField.disabled = false;
  inputField.classList.remove('enable');
  inputField.value = '';

  // Handle "Otros" selection
  if (selectedTraction === 'Otros') {
    inputField.disabled = false;
    inputField.classList.add('enable');
    inputField.focus();
  } else {
    inputField.disabled = true;
    inputField.classList.remove('enable');
  }

  // Handle predefined traction options
  if (trackionOptions.includes(selectedTraction)) {
    inputField.disabled = true;
    inputField.classList.remove('enable');
    inputField.value = '';
    $(".traction-text:contains(" + selectedTraction + ")").addClass("active_tracc");
  } else {
    if (edit) {
      $("#traction_index1").val(selectedTraction);
    }
    $(".traction-text:contains('Otros')").addClass("active_tracc");
  }

  console.log('Selected traction new:', selectedTraction);
}
  
 
 var idPreview = '';
 var aaa = 0;
 function resumePublication(step,save){  
   city = $("#city").text();
    var id_product_old = '<?= isset($_GET['id']) &&  $_GET['id']!== '' ? $_GET['id'] : null; ?>';
    publicacion1 = {  
      "id_product":id_product_old,
      "id_publication_type":1,
      "id_category":id_categoria,
      "id_product_type": $("#industria").val(),
      "id_machine":$("#id_machine").val(),
      "status_id":10,
      "title":$("#title").val(),
      "description":$("#descrip").val()
     };
     console.log("publicacion1",publicacion1)

    publicacion2 = {   
      "id_product":id_product,
      "region": region, 
      "city":city,
      "price": $('input[name="price_type"]:checked').val()  =='H' ?  selectedCurrency + ' '+  $("#price").val() + '':'',
      "brand": $("#marca").val(),
      "model": $("#modelo").val(),
      "year": $("#anios").val(),
      "factory_code": "Factory Code",
      "mileage": $("#KilometrosRecorridos").val() ?? '', 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',
      "warranty": $('input[name="rental"]:checked').val() | 'N',
      "condition": $('input[name="flexRadioDefault"]:checked').val() ?? '',
      "owner": "",
      "delivery": $('input[name="shipping"]:checked').val() ?? '',
      "pay_now_delivery": "N",
      "facipay": $('input[name="price_type"]:checked').val() ?? '',
      "contact_me":"Contact Me" ,
      "id_marca": '1',
      "id_model": '1',
    };
    console.log("publicacion12",publicacion2)
    publicacion3 = {   
    "id_product": id_product, 
    "weight": $("#PesoNeto").val() + ' '+ $("#inputGroupSelectPeso").val() , 
    "power": $("#Potencia").val() + ' '+ $("#inputGroupSelectPotencia").val() , 
    "displacement": $("#Cilindrada").val() + ' '+ $("#inputGroupSelectCilindrada").val() , 
    "torque":  $("#Torque").val() + ' '+ $("#inputGroupSelectTorque").val() ,  
    "mixed_consumption": $("#mixed_consumption").val() + ' '+ $("#inputGroupSelectConsumo").val() , 
    "transmission":$('input[name="transmission"]:checked').val(),
    "fuel": $('input[name="combustible"]:checked').val(),
    "traction": traxion !=='Otros' ? traxion : $("#traction_index1").val(), 
    "km_traveled": $("#KilometrosRecorridos").val(),   
    "hrs_traveled": $("#Horometro").val(), 
  };
  console.log("publicacion3",publicacion3)
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
      "operational_certificate_attachment": pdfCerti ?? 'certificate.pdf',
      "Insurance_Policy": $('input[name="insurance"]:checked').val(),
      "Insurance_Policy_attachment":  pdfCertiPoli ?? 'certificate.pdf',
      "delivery": $('input[name="shipping"]:checked').val(),  
      "operator_included": $('input[name="operator"]:checked').val(),
      "rental_contract":  $('input[name="Machinery"]:checked').val(), 
      "rental_guarantee": $('input[name="rental"]:checked').val(), 
    }
    console.log("publicacion5",publicacion5)
  //agrega los valores en el resumen paso 3 
    if(save){
      publicacion1.status_id = 9;
    $('.btn_2').text(categoria);
    $('.r_marca').text( $("#marca").val()); 
    $('.r_modelo').text(  $("#modelo").val());
    $('.r_anio').text($("#anios").val());
    $('.r_condicion').text($('input[name="flexRadioDefault"]:checked').val());
    
    $('.r_km').text( $("#KilometrosRecorridos").val());
    $('.r_motor').text($("#engine_number").val() ?? ''); 
    $('.r_chasis').text($("#chasis_number").val() ?? ''); 
    $('.r_patente').text($("#patente").val() ?? ''); 
    $('.r_ubicacion').text(region +', '+ city); 
    $('.location-grey-text').text(region +', '+ city);
    var value =  publicacion2.facipay =='H' ?  selectedCurrency + ' '+  $("#price").val() : 'Cotizar';
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
    if($("#chasis_number").val()==''){   
      $("#r_chasis").hide();
    }
    if($("#patente").val()==''){   
      $("#r_patente").hide();
    }
    if(publicacion2.condition==''){   
      $("#r_condicion").hide();
    }

    //caracteristicas
    $('.r_peso').text($("#PesoNeto").val() + ' '+ $("#inputGroupSelectPeso").val()); 
    $('.r_potencia').text($("#Potencia").val() + ' '+ $("#inputGroupSelectPotencia").val()); 
    $('.r_cilindrada').text($("#Cilindrada").val() + ' '+ $("#inputGroupSelectCilindrada").val() ); 
    $('.r_torque').text($("#Torque").val() + ' '+ $("#inputGroupSelectTorque").val()); 
    $('.r_consumo').text( $("#mixed_consumption").val() + ' '+ $("#inputGroupSelectConsumo").val());   
    $('.r_transmission').text( publicacion3.transmission);   
    $('.r_fuel').text(publicacion3.fuel);   
    $('.r_traction').text(publicacion3.traction);   

    if($("#PesoNeto").val()==''){   
      $("#r_peso").hide();
    }
    if($("#Potencia").val()==''){   
      $("#r_potencia").hide();
    }
    if($("#Cilindrada").val()==''){   
      $("#r_cilindrada").hide();
    }
    if($("#Torque").val()==''){   
      $("#r_torque").hide();
    }
    if(publicacion3.traction=='' || publicacion3.traction==undefined){   
      $("#r_traction").hide();
    }
    if(publicacion3.mixed_consumption==' l/h' || publicacion3.mixed_consumption==' km/L'){    
      $("#r_consumo").hide();
    }
    if(publicacion3.transmission=='' || publicacion3.transmission==undefined){   
      $("#r_transmission").hide();
    }
    if(publicacion3.fuel==''  || publicacion3.fuel==undefined){   
      $("#r_fuel").hide();
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
        $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
      $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
      $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
      $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
      $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
        console.log(response.responseJSON.msg)
        var statusCode = xhr.status;  
            $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
            $('#new_password').prop('disabled', false);
    } 
  });
}
function deleteImagenOne(nameImagen) {   
  var token = '<?= $_SESSION["token"]; ?>';   
  var id_product_img = id_product ? id_product : '<?= isset($_GET['id']) &&  $_GET['id']!== '' ? $_GET['id'] :  null; ?>';    
    $.ajax({
      type: "DELETE", 
      url: '<?= $baseUrl ?>/delete_imagen?id_product='+id_product_img+'&name='+nameImagen,
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
        $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
                      $confirmPublicSaleBtn
                  .prop('disabled', false)
                  .html('Confirmar y publicar')
                  .removeClass('disabled');                     
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
            setCategory(element.id_category,element.mainCategory?.category);
            if(element.id_category==5){
              $("#pills-publish5-tab").click();
            }else{
              $("#pills-publish1-tab").click();
            }
           
             // Establecer el valor seleccionado
            var selectize = $('#industria')[0].selectize;
            selectize.setValue(element.id_product_type);
            var selectize = $('#id_machine')[0].selectize;
            selectize.setValue(element.id_machine);
 
            $("#title").val(element.title); 
            var $errorContainerTitulo = $("#error-container-titulo");
            $errorContainerTitulo.hide();
            isFormValidateSeccion0  = true;

            $("#descrip").val(element.description);
            $("#marca").val(element.product_details.brand);
            $("#anios").val(element.product_details.year); 
            $("#modelo").val(element.product_details.model);
            $("#engine_number").val(element.product_details.engine_number);
            $("#chasis_number").val(element.product_details.chasis_number);
            $("#patente").val(element.product_details.patent);
            $("#patent").val(element.product_details.patent)
             
            var $errorContainerTitle = $("#error-container-title");
            $errorContainerTitle.hide();
            isFormValidateSeccion2 = true;
             
           var PesoNeto = element.product_technical_characteristics?.weight.split(" ");   
           console.log(typeof(PesoNeto));
           if(PesoNeto){
            $("#PesoNeto").val(PesoNeto[0]);    
            $("#inputGroupSelectPeso option[value='" + PesoNeto[1] + "']").prop("selected", true);
          }
 
         
           var Potencia = element.product_technical_characteristics?.power.split(" "); 
           if(Potencia){  
            $("#Potencia").val(Potencia[0]);    
            $("#inputGroupSelectPotencia option[value='" + Potencia[1] + "']").prop("selected", true);
          }
         
           var Cilindrada = element.product_technical_characteristics?.displacement.split(" ");   
           if(Cilindrada){
            $("#Cilindrada").val(Cilindrada[0]);    
            $("#inputGroupSelectCilindrada option[value='" + Cilindrada[1] + "']").prop("selected", true);
          }

           var Torque = element.product_technical_characteristics?.torque.split(" ");  
           if(Torque){ 
            $("#Torque").val(Torque[0]);    
            $("#inputGroupSelectTorque option[value='" + Torque[1] + "']").prop("selected", true);
           }

           var mixed_consumption = element.product_technical_characteristics?.mixed_consumption.split(" ");   
           if(mixed_consumption){ 
            $("#mixed_consumption").val(mixed_consumption[0]);    
            $("#inputGroupSelectConsumo option[value='" + mixed_consumption[1] + "']").prop("selected", true);
          }   
            const kilometersInput = document.getElementById('KilometrosRecorridos');
            const hourometerInput = document.getElementById('Horometro');

             $("#KilometrosRecorridos").val(element.product_technical_characteristics?.km_traveled ?? '');
             $("#Horometro").val(element.product_technical_characteristics?.hrs_traveled ?? '');

             if(element.product_details.condition == 'Nuevo'){
                $("#flexRadioDefault1").prop("checked", true);
                kilometersInput.disabled = true;
                hourometerInput.disabled = true;
                kilometersInput.classList.remove('enable');
                hourometerInput.classList.remove('enable');
             }else{
                $("#flexRadioDefault2").prop("checked", true);
                kilometersInput.disabled = false;
                hourometerInput.disabled = false;
                kilometersInput.classList.add('enable');
                hourometerInput.classList.add('enable');
             }
             var $errorContainerCondicion = $("#error-container-condicion");
              $errorContainerCondicion.hide();
              isFormValidateSeccion5 = true;
 
             
             if(element.product_details.facipay == 'C'){  
              $("#price_type2").prop("checked", true);
              var $priceInput = $('#price'); 
              $priceInput.prop('disabled', true);
             }else{
              $("#price_type1").prop("checked", true);
             }
             
            var parts = element.product_details.price.split(" ")
            $("#price").val(parts[1]); 
            $("#inputGroupSelect01Price option[value='" + parts[0] + "']").prop("selected", true);
            selectedCurrency = parts[0]; 

            var $errorContainerPrice = $("#error-container-price"); 
            $errorContainerPrice.hide();
            isFormValidateSeccion3 = true;
             
            const regiones = [
          { id: 1, nombre: 'Arica y Parinacota' },
          { id: 2, nombre: 'Tarapacá' },
          { id: 3, nombre: 'Antofagasta' },
          { id: 4, nombre: 'Atacama' },
          { id: 5, nombre: 'Coquimbo' },
          { id: 6, nombre: 'Valparaíso' },
          { id: 7, nombre: 'Metropolitana de Santiago' },
          { id: 8, nombre: 'Libertador General Bernardo O\'Higgins' },
          { id: 9, nombre: 'Maule' },
          { id: 10, nombre: 'Ñuble' },
          { id: 11, nombre: 'Biobío' },
          { id: 12, nombre: 'Araucanía' }
        ];
           const selectedRegion = regiones.find(r => r.nombre == element.product_details.region);  
            var selectize = $('#region')[0].selectize;
            selectize.setValue(selectedRegion.id);
             
            var selectize = $('#city')[0].selectize;
            selectize.setValue(element.product_details.city); 

            var $errorContainerUbi = $("#error-container-ubicacion");
              $errorContainerUbi.hide();
             isFormValidateSeccion4 = true;

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
      
             setTraccion(element.product_technical_characteristics.traction,true) 
           
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

             const dateCerti = document.getElementById('dateCerti');
             const pdfFile = document.getElementById('pdfFile');
             const div = document.getElementById('enableDisableDiv');

             if(element.product_rental.operational_certificate == 'Sí'){  
              $("#inlineRadio1Cert").prop("checked", true);
                dateCerti.disabled = false;
                pdfFile.disabled = false;
                div.classList.add('enable');
                pdfFile.classList.add('enable');
                dateCerti.classList.add('enable');
                $("#dateCerti").val(element.product_rental.operational_certificate_date);
                $(".operational_certificate").text('Certificado de Operatividad: ' +element.product_rental.operational_certificate_attachment);
                pdfCerti = element.product_rental.operational_certificate_attachment;
             } else{
              $("#inlineRadio2Cert").prop("checked", true);
                dateCerti.disabled = true;
                pdfFile.disabled = true;
                pdfFile.classList.remove('enable');
                dateCerti.classList.remove('enable');
             }
              
           
             const pdfFile1 = document.getElementById('pdfFile-other'); 
             const div1= document.getElementById('enableDisableDiv2');
             if(element.product_rental.Insurance_Policy == 'Sí'){  
              $("#insurance1").prop("checked", true);              
                pdfFile1.disabled = false;
                div1.classList.add('enable');
                pdfFile1.classList.add('enable');
                $(".insurance_policy").text('Póliza de seguro: ' +element.product_rental.Insurance_Policy_attachment);
                pdfCertiPoli = element.product_rental.Insurance_Policy_attachment;
             } else{
                $("#insurance2").prop("checked", true);
                pdfFile1.disabled = true;
                pdfFile1.classList.remove('enable');            
                div1.classList.remove('enable');
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
          $("#error-container-photo").hide();
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
                          deleteImagenOne(containerId);
                            idImg--;
                            console.log("quedan imagenes",idImg)
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
         
        })
      }
    }
  })
}

function limitToCurrentYear(inputElement) { 
  const currentYear = new Date().getFullYear()+1;
 
  $(inputElement).on('input', function() { 
    const inputValue = parseInt($(this).val()); 
    if (inputValue > currentYear) { 
      $(this).val(currentYear);
    }
  });
}
</script>
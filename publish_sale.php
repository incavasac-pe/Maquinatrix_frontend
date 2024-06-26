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
  var save_public = false;
  var isFormValidateSeccion0 = false;
  var isFormValidateSeccion1 = false;
  var isFormValidateSeccion2 = false;
  var isFormValidateSeccion3 = false;//precio
  var isFormValidateSeccion4 = false;//ubicacion
  var isFormValidateSeccion5 = false;
 
  var isFormValidateSeccion05 = false;
  var isFormValidateSeccion25 = false;
  var isFormValidateSeccion35 = false;
  var isFormValidateSeccion45 = false;
  var isFormValidateSeccion55 = false;
  var selectedCurrency = 'CLP';
  var city='';
  var region='';
  var city5='';
  var region5='';

  var id_categoria = 0;
  var categoria = '';

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
      console.log("*****stepNumber***",stepNumber)  
       
        var isValid =  validateFormSteps(stepNumber,true); 
      
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
      if (id_categoria !== 3) {
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
      }else{
        const validationContainers = {
          seccion05: $("#error-container-titulo5"),
          seccion15: $("#error-container-tipo"), 
          seccion25: $("#error-container-title5"),
          seccion35: $("#error-container-price5"),
          seccion45: $("#error-container-ubicacion5"),
          seccion55: $("#error-container-condicion5"),
        };

        const isFormValid = [isFormValidateSeccion05, isFormValidateSeccion1,  isFormValidateSeccion25, isFormValidateSeccion35, isFormValidateSeccion45, isFormValidateSeccion55].every((isValid, index) => {
        console.log("isFormValid",isValid)
          const container = validationContainers[`seccion${index}5`];
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
          $("#error-container5").show();
          return false;
        }

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

  function validateFormStepsOLD(stepNumber,savePub) { 
  if (stepNumber === 1 || stepNumber === 2 ) {
    const $errorContainerTipo = $("#error-container-tipo");
    if (!isFormValidateSeccion1) {
      $errorContainerTipo.show();
      return false;
    } else {
      $errorContainerTipo.hide();
    }

    if (id_categoria !== 3) {
      const $errorContainerTitle = $("#error-container-title");
      const $errorContainerPrice = $("#error-container-price");
      const $errorContainerUbicacion = $("#error-container-ubicacion");
      const $errorContainerCondicion = $("#error-container-condicion");
      const $errorContainerTitulo = $("#error-container-titulo");

      if (!isFormValidateSeccion0) {
        $errorContainerTitulo.show();
        return false;
      } else {
        $errorContainerTitulo.hide();
      }

      if (!isFormValidateSeccion2) {
        $errorContainerTitle.show();
        return false;
      } else {
        $errorContainerTitle.hide();
      }

      if (!isFormValidateSeccion3) {
        $errorContainerPrice.show();
        return false;
      } else {
        $errorContainerPrice.hide();
      }

      if (!isFormValidateSeccion4) {
        $errorContainerUbicacion.show();
        return false;
      } else {
        $errorContainerUbicacion.hide();
      }

      if (!isFormValidateSeccion5) {
        $errorContainerCondicion.show();
        return false;
      } else {
        $errorContainerCondicion.hide();
      }
    } else {
      const $errorContainerTitle5 = $("#error-container-title5");
      const $errorContainerPrice5 = $("#error-container-price5");
      const $errorContainerUbicacion5 = $("#error-container-ubicacion5");
      const $errorContainerCondicion5 = $("#error-container-condicion5");
      const $errorContainerTitulo5 = $("#error-container-titulo5");

      if (!isFormValidateSeccion05) {
        $errorContainerTitulo5.show();
        return false;
      } else {
        $errorContainerTitulo5.hide();
      }

      if (!isFormValidateSeccion25) {
        $errorContainerTitle5.show();
        return false;
      } else {
        $errorContainerTitle5.hide();
      }

      if (!isFormValidateSeccion35) {
        $errorContainerPrice5.show();
        return false;
      } else {
        $errorContainerPrice5.hide();
      }

      if (!isFormValidateSeccion45) {
        $errorContainerUbicacion5.show();
        return false;
      } else {
        $errorContainerUbicacion5.hide();
      }

      if (!isFormValidateSeccion55) {
        $errorContainerCondicion5.show();
        return false;
      } else {
        $errorContainerCondicion5.hide();
      }
    } 
    return true;
  } else {
    $("#error-container").hide();
  }

  if (stepNumber === 3 && idImg > 0) {
    $("#error-container-photo").hide();
    resumePublication(stepNumber, savePub);
    navigateToFormStep(stepNumber);
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
var $confirmPublicSaleBtn = $('#confirm_public_sale');

$(document).ready(function() { 
  limitToCurrentYear('#anios');
  limitToCurrentYear('#anios5');
    console.log( "ready publication sale!" );  
    var product_old = '<?= isset($_GET['id']) &&  $_GET['id']!= '' ? $_GET['id'] : ''; ?>';
      if(product_old!=''){
        edit_publi_sale();
    }
    
    $("#error-container").hide();
    $("#error-container5").hide();
     $("#confirm_public_sale").on('click', function(event) {
    
      $(this).prop('disabled', true);
      $(this)
      .html('<i class="fa fa-spinner fa-spin"></i> Publicando...')
      .addClass('disabled');
      save_public = true;
      registerPublication(0);
    });  
    
      //guardar en borrador
      $('.save_public_sale').on('click', function(event) {
        
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
    var $errorContainer = $("#error-container-tipo-cc");

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

     
    //valida title   
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

 
    //valida title  

    var $title5 = $("#title5");
    var $errorContainerTitulo5 = $("#error-container-titulo5"); 
    function validateTitle5() {
      var isValid = $title5.val().trim() !== '';
      $errorContainerTitulo5.toggle(!isValid);
      return isValid;
    }  
    $title5.on('keyup', function() {
      isFormValidateSeccion05 = validateTitle5();
    }); 
   ////////
   
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

  

  var $marca5 = $("#marca55");
    var $modelo5 = $("#modelo5");
    var $anios5 = $("#anios5");
    var $errorContainerTitle5 = $("#error-container-title5");

    function validateFields5() {
      var isValid = $marca5.val().trim() !== '' &&
                    $modelo5.val().trim() !== '' &&
                    $anios5.val().trim() !== '';
      $errorContainerTitle5.toggle(!isValid);
      return isValid;
    }

    $marca5.add($modelo5).add($anios5).on('keyup', function() {
      isFormValidateSeccion25 = validateFields5();
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

    
    //valida condicion categoria neumatico

      const $condicion15 = $("#flexRadioDefault15");
      const $condicion25 = $("#flexRadioDefault2");
      const $errorContainerCondicion5 = $("#error-container-condicion5");
 
      function validateCondicion5() {
        const isValid = $condicion15.is(':checked') || $condicion25.is(':checked');
        $errorContainerCondicion5.toggle(!isValid);
        return isValid;
      } 
      $condicion15.add($condicion25).on('change', function() {
        isFormValidateSeccion55 = validateCondicion5();
      }); 
   
    var $price = $("#price");
    var $errorContainerPrice = $("#error-container-price");

    // Validation function
    function validatePrice() {
      var isValid = $price.val().trim() !== '';
      $errorContainerPrice.toggle(!isValid);
      return isValid;
    }
 
    $price.on('keyup', function() {
      isFormValidateSeccion3 = validatePrice();
    });
  
    var $priceInput = $("#inputGroupSelect01Price"); 
    $priceInput.on("change", function() {
      selectedCurrency = $(this).val(); 
    });
 
  //fin valida precio 

    var $price5 = $("#price5");
    var $errorContainerPrice5 = $("#error-container-price5"); 
    function validatePrice5() {
      var isValid = $price5.val().trim() !== '';
      $errorContainerPrice5.toggle(!isValid);
      return isValid;
    }
 
    $price5.on('keyup', function() {
      isFormValidateSeccion35 = validatePrice5();
    });
    var $priceInput5 = $("#inputGroupSelect01Price5"); 
    $priceInput5.on("change", function() {
      selectedCurrency = $(this).val(); 
    });

    
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

 
  // fin valida city y region 
 
    //  valida city y region 

      
  const $region5 = $('.region-select5');
    const $selectedComunaId5 = $('.comuna-select5');
    const $errorContainerUbi5 = $("#error-container-ubicacion5");
 
    function validateLocation5() {
      const region5 = $region5.val();
      const city5 = $selectedComunaId5.val();
      const isValid = city5 !== '0' && city5 !== '' && region5 !== '0' && region5 !== '';
      $errorContainerUbi5.toggle(!isValid);
      return isValid;
    }
 
    $selectedComunaId5.add($region5).on('change', function() {
      isFormValidateSeccion45 = validateLocation5();
    }); 
  

  var $aspectRatio = $("#aspect_ratio");
  var $sectionWidth = $("#section_width");
  var $errorContainerDimension = $("#error-container-dimen");

  function toggleErrorContainer() {
    if ($aspectRatio.val() !== '' && $sectionWidth.val() !== '') {
      $errorContainerDimension.hide();
    } else {
      $errorContainerDimension.show();
    }
  }

  $aspectRatio.on('keyup', toggleErrorContainer);
  $sectionWidth.on('keyup', toggleErrorContainer);

  var $loadIndex = $("#load_index");
  var $speedIndex = $("#speed_index");
  var $errorContainer1 = $("#error-container-espec");

  function toggleErrorContainer1() {
    if ($loadIndex.val() !== '' && $speedIndex.val() !== '') {
      $errorContainer1.hide();
    } else {
      $errorContainer1.show();
    }
  }

  $loadIndex.on('keyup', toggleErrorContainer1);
  $speedIndex.on('keyup', toggleErrorContainer1);


    
    $('#pdfFile').on('change', function() {
      var fileName = this.files[0].name; 
      pdfCerti = fileName;
      $(".operational_certificate").text('Certificado de Operatividad: ' +pdfCerti);
      
    }); 
    $('#pdfFile1').on('change', function() {
      var fileName = this.files[0].name; 
      pdfCerti = fileName;
      $(".operational_certificate").text('Certificado de Operatividad: ' +pdfCerti);
      
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

function setTipoT(valor,edit=false){
  tipoterreno=valor;
  if(valor!=''){
    $(".st").removeClass("active_tracc"); 
    $(".st:contains(" + valor + ")").addClass("active_tracc");
  }
  if(valor == 'Otros'){
      $('#land_type').prop('disabled', false);
      if (edit) {
        $("#tractiland_typeon_index1").val(valor);
      }
    }else{
      $('#land_type').val("");
      $('#land_type').prop('disabled', true);
    }
}


var traxion;
  function setTraccion1(selectedTraction, edit = false) {
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

 
function setTraccion5(selectedTraction, edit = false) {
    traxion = selectedTraction;
    const inputField = document.getElementById('traction_index5');
    const trackionOptions = ['Transicional', 'Mixto','Direccional' ];

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
        $("#traction_index5").val(selectedTraction);
      }
      $(".traction-text:contains('Otros')").addClass("active_tracc");
    }

  console.log('Selected traction new:', selectedTraction);
}

  
var idPreview = '';
 var aaa = 0;
function resumePublication(step,save){  
  city = id_categoria!='3'  ? $("#city").text() : $("#city5").text();
  console.log("resumePublication sale",id_categoria);
  var id_product_old = '<?= isset($_GET['id']) &&  $_GET['id']!== '' ? $_GET['id'] :  null; ?>';

    publicacion1 = {  
      "id_product": id_product_old,
      "id_publication_type": 2,
      "id_category": id_categoria,
      "id_product_type": $("#industria").val(),
      "id_machine":  $("#id_machine").val(),
      "status_id": 10,
      "title": id_categoria!='3' ? $("#title").val():$("#title5").val(),
      "description":  id_categoria!='3' ? $("#descrip").val():$("#descrip5").val()
     };

    publicacion2 = {   
      "id_product":id_product,
      "region": id_categoria!='3' ? region: region5,
      "city": city,
      "price": id_categoria!='3' ?  selectedCurrency + ' '+ $("#price").val(): selectedCurrency + ' '+ $("#price5").val(),  
      "brand": id_categoria!='3' ? $("#marca").val():$("#marca55").val(),
      "model": id_categoria!='3' ? $("#modelo").val():$("#modelo5").val(),
      "year":  id_categoria!='3' ? $("#anios").val():$("#anios5").val(),
      "factory_code": $("#factory_code").val(),
      "mileage": $("#KilometrosRecorridos").val(), 
      "engine_number": $("#engine_number").val() ?? '',
      "chasis_number":$("#chasis_number").val() ?? '',
      "patent": $("#patente").val() ?? '',     
      "condition": id_categoria!='3' ? $('input[name="flexRadioDefault"]:checked').val() : $('input[name="flexRadioDefault5"]:checked').val(),
      "owner": "Owner",
      "warranty": '',
      "delivery": id_categoria!='3' ? $('input[name="inlineRadioOptions"]:checked').val()  ?? '' : $('input[name="inlineRadioOptions5"]:checked').val()  ?? '',
      "pay_now_delivery": "",
      "facipay":"",
      "contact_me": "Contact Me" ,
      "id_marca": '1',
      "id_model": '1',
    };

    publicacion3 = {   
    "id_product": id_product,
    "weight": $("#PesoNeto").val() + ' '+ $("#inputGroupSelectPeso").val() , 
    "power": $("#Potencia").val() + ' '+ $("#inputGroupSelectPotencia").val() , 
    "displacement": $("#Cilindrada").val() + ' '+ $("#inputGroupSelectCilindrada").val() , 
    "torque":  $("#Torque").val() + ' '+ $("#inputGroupSelectTorque").val() ,  
    "mixed_consumption": $("#mixed_consumption").val() + ' '+ $("#inputGroupSelectConsumo").val() , 
    "transmission": $('input[name="transmission"]:checked').val(),
    "fuel": $('input[name="combustible"]:checked').val(),
    "traction": traxion !=='Otros' ? traxion : id_categoria!='3' ? $("#traction_index1").val() :  $("#traction_index5").val(), 
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
      "traction_index": $("#traction_index").val(),  
      "temperature_index":  $("#temperature_index").val(), 
      "runflat": $('input[name="runflat"]:checked').val(),
      "terrain_type": $("#terrain_type").val(), 
      "tread_design":  $("#tread_design").val(), 
      "type_of_service":  $("#type_of_service").val(), 
      "vehicle_type": $("#vehicle_type").val(), 
      "season":  $('input[name="season"]:checked') .val(),
      "land_type":   tipoterreno !=='Otros' ? tipoterreno :$("#land_type").val(),
      "others":  $("#others").val(), 
  };
 

  //agrega los valores en el resumen paso 3 
  if(save){
    publicacion1.status_id = 9;
  $('.btn_2').text(categoria); 
 
  $('.r_marca').text( id_categoria!='3' ? $("#marca").val(): $("#marca55").val()); 
  $('.r_modelo').text(  id_categoria!='3' ? $("#modelo").val(): $("#modelo5").val());
  $('.r_factory_code').text( publicacion2.factory_code);
  $('.r_anio').text( publicacion2.year);
  $('.r_condicion').text(publicacion2.condition);
   
   
  $('.r_km').text( $("#KilometrosRecorridos").val());
  $('.r_motor').text($("#engine_number").val() ?? ''); 
  $('.r_chasis').text($("#chasis_number").val() ?? ''); 
  $('.r_patente').text($("#patente").val() ?? ''); 
  $('.r_ubicacion').text( publicacion2.region + ','+ publicacion2.city);
  
  $('.location-grey-text').text( publicacion2.region + ','+ publicacion2.city);

  var value =  publicacion2.facipay =='C' ? 'Cotizar' :  publicacion2.price  + ''
  $('.r_price').text(value); 

  $('.r_tipo_vendedor').text(categoria); 
  $('.r_delivery').text(publicacion2.delivery == 'Y' ? 'Sí' : 'No');
  $('.r_title').text(publicacion1.title);

  if(publicacion2.factory_code==''){   
      $("#r_factory_code").hide();
    }
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
    
    //dimensiones
    $('.r_section_width').text(publicacion4.section_width);   
    $('.r_aspect_ratio').text(publicacion4.aspect_ratio);   
    $('.r_rim_diameter').text(publicacion4.rim_diameter);  
    $('.r_extern_diameter').text(publicacion4.extern_diameter);
    $('.r_load_index').text(publicacion4.load_index);  
    $('.r_speed_index').text(publicacion4.speed_index);
    console.log("publicacion4publicacion4",publicacion4)  

    if(id_categoria == 3) {
      $("#r_peso,#r_potencia,#r_cilindrada,#r_torque,#r_consumo,#r_transmission,#r_fuel,#r_traction,#r_patente,#r_chasis,#r_motor,#r_factory_code,#r_km").hide();    
    }else { 

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
      if($("#mixed_consumption").val()==''){   
        $("#r_consumo").hide();
      }
      if(publicacion3.traction==''){   
        $("#r_traction").hide();
      }
      if(publicacion3.transmission==''){   
        $("#r_transmission").hide();
      }
      if(publicacion3.fuel==''){   
        $("#r_fuel").hide();
      }
    }

    if(publicacion4.section_width==''){   
      $("#r_section_width").hide();
    }
    if(publicacion4.aspect_ratio==''){   
      $("#r_aspect_ratio").hide();
    }
    if(publicacion4.rim_diameter==''){   
      $("#r_rim_diameter").hide();
    }
    if(publicacion4.extern_diameter==''){   
      $("#r_extern_diameter").hide();
    }
    if(publicacion4.load_index==''){   
      $("#r_load_index").hide();
    }
    if(publicacion4.speed_index==''){   
      $("#r_speed_index").hide();
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
      $confirmPublicSaleBtn
      .prop('disabled', false)
      .html('Confirmar y publicar')
      .removeClass('disabled');
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
          setCategorySale(element.id_category,element.mainCategory?.category,true);  
           
           if(element.id_category===3){
            $('#pills-publish3-tab').tab('show'); 
          }else{
            $('#pills-publish1-tab').tab('show'); 
          }  
          $('.nav-link').removeClass('active');
          $(`.tab-${element.id_category}`).addClass('active');
          console.log("qqqqqqqqqqq",id_categoria)
         
           // Establecer el valor seleccionado
          var selectize = $('#industria')[0].selectize;
          selectize.setValue(element.id_product_type);
          var selectize = $('#id_machine')[0].selectize;
          selectize.setValue(element.id_machine);
          var $errorContainer = $("#error-container-tipo-cc");
          $errorContainer.hide();
          isFormValidateSeccion1 = true;

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
 
            var $errorContainerTitulo = $("#error-container-titulo");
            $errorContainerTitulo.hide();
            isFormValidateSeccion0  = true;
            if (element.id_category == 3) {
              var $errorContainerTitulo5 = $("#error-container-titulo5");
              $errorContainerTitulo5.hide();
              isFormValidateSeccion05  = true;
           }

            if (element.id_category == 3) {       
              $("#marca55").val(element.product_details.brand);         
              $("#anios5").val(element.product_details.year);  
              $("#modelo5").val(element.product_details.model);
              var $errorContainerTitle5 = $("#error-container-title5");
              $errorContainerTitle5.hide();
              isFormValidateSeccion25 = true;
 
              var parts = element.product_details.price.split(" "); 
              $("#price5").val(parts[1]);
              selectedCurrency = parts[0],  
              $("#inputGroupSelect01Price5 option[value='" + selectedCurrency + "']").prop("selected", true);
              var $errorContainerPrice5 = $("#error-container-price5"); 
              $errorContainerPrice5.hide();
              isFormValidateSeccion35 = true;
 
            } else {
              $("#marca").val(element.product_details.brand);
              $("#anios").val(element.product_details.year);
              $("#modelo").val(element.product_details.model);
              var $errorContainerTitle = $("#error-container-title"); 
              $errorContainerTitle.hide();
              isFormValidateSeccion2 = true; 

              var parts = element.product_details.price.split(" ");  
              $("#price").val(parts[1]);  
               selectedCurrency = parts[0];  
 
               $("#inputGroupSelect01Price option[value='" + selectedCurrency + "']").prop("selected", true);
               var $errorContainerPrice = $("#error-container-price"); 
              $errorContainerPrice.hide();
              isFormValidateSeccion3 = true;
            }

           
           $("#engine_number").val(element.product_details?.engine_number);
           $("#chasis_number").val(element.product_details?.chasis_number);
           $("#patente").val(element.product_details?.patent);
           $("#patent").val(element.product_details?.patent)
           
          var PesoNeto = element.product_technical_characteristics?.weight.split(" ");    
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


           if (element.id_category == 3) {  
            var $errorContainerCondicion55 = $("#error-container-condicion5");
            $errorContainerCondicion55.hide();
            isFormValidateSeccion55 = true;
              if(element.product_details.condition == 'Nuevo'){
                $("#flexRadioDefault15").prop("checked", true); 
              }else{
                $("#flexRadioDefault25").prop("checked", true);  
              }
            }else{
              var $errorContainerCondicion = $("#error-container-condicion");
              $errorContainerCondicion.hide();
              isFormValidateSeccion5 = true;
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
            }
             
               
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
 
           if (element.id_category == 3) {   

              var selectize = $('#region5')[0].selectize;
            selectize.setValue(selectedRegion.id);
             
            var selectize = $('#city5')[0].selectize;
            selectize.setValue(element.product_details.city);

              var $errorContainerUbi5 = $("#error-container-ubicacion5");
              $errorContainerUbi5.hide();
              isFormValidateSeccion45 = true;
           }else{
            var selectize = $('#region')[0].selectize;
            selectize.setValue(selectedRegion.id);
             
            var selectize = $('#city')[0].selectize;
            selectize.setValue(element.product_details.city);
              var $errorContainerUbi = $("#error-container-ubicacion");
              $errorContainerUbi.hide();
             isFormValidateSeccion4 = true;
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
    
          
           
          if (element.id_category == 3) {   
            
            setTraccion5(element.product_technical_characteristics?.traction,true) 
            setTipoT(element.product_dimension?.land_type,true);
          $("#section_width").val(element.product_dimension?.section_width);
          $("#aspect_ratio").val(element.product_dimension?.aspect_ratio);
          $("#rim_diameter").val(element.product_dimension?.rim_diameter); 
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
          var $errorContainerDimension = $("#error-container-dimen"); 
          $errorContainerDimension.hide();
          var $errorContainerEsp = $("#error-container-espec"); 
          $errorContainerEsp.hide();
          
          if(element.product_dimension?.runflat == 'Y'){  
            $("#inlineRadio11").prop("checked", true);
           }else {
            $("#inlineRadio22").prop("checked", true);
           }

           if(element.product_dimension?.season == 'Invierno'){  
            $("#inlineRadio1s").prop("checked", true);
           }else if(element.product_dimension?.season == 'Verano') {
            $("#inlineRadio2s").prop("checked", true);
           }else{
            $("#inlineRadio3s").prop("checked", true);
           }
          }else{
            setTraccion1(element.product_technical_characteristics?.traction,true) 
          }
         

  //step 2 imagen edit
    const imageContainer = document.getElementById('image-container');
    const uploadInputContainer = document.getElementById('upload-input-container');


// Calculate the index to insert the new image container
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

                  // Insert the new image container at the calculated index
                  imageContainer.insertBefore(imgContainer, imageContainer.children[insertIndex]);
                  // Move the file input container after the last uploaded image
                  imageContainer.parentNode.insertBefore(uploadInputContainer, null);
                })
                .catch(function(error) {
                  console.log('Error al descargar la imagen:', error);
                });  
             }  
         // }  
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
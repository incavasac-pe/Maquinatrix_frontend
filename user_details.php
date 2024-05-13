<?php include 'menu.php' ?>
<?php  
if (!isset($_SESSION['loggedIn'])) { 
  header('location: index.php'); 
}  
?> 
<?php

$baseUrl = getenv('URL_API');
if (isset($_SESSION['loggedIn'])) {
  $token = $_SESSION['token'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];
  $photo = $_SESSION['photo'];
  $id_user_ext = $_SESSION['id_user_ext'];
  $id_user = $_SESSION['id_user'];
}
 
?>
<div class="user-details-container">
  <div class="d-flex align-items-start ">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <p class="menu-text">MENÚ DE CUENTA</p>
      <!-- <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"> <img src="./assets/img/profile2.png" alt="profile2">  Mi cuenta</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <img src="./assets/img/note.png" alt="note">  Mis Publicaciones</button> -->

    <button  onclick="updateQueryParam('tab', 'profile')" class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
        role="tab" aria-controls="v-pills-home" aria-selected="true">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24"
          viewBox="0 0 24 24">
          <defs>
            <clipPath id="clip-path-home">
              <rect id="Rectángulo_10764" data-name="Rectángulo 10764" width="24" height="24"
                transform="translate(-12719 -23540)" fill="#62646a" stroke="#707070" stroke-width="1" />
            </clipPath>
          </defs>
          <g id="Enmascarar_grupo_57911" data-name="Enmascarar grupo 57911" transform="translate(12719 23540)"
            clip-path="url(#clip-path-home)">
            <g id="person-circle" transform="translate(-12719 -23540)">
              <path id="Trazado_63455" data-name="Trazado 63455" d="M16.5,9A4.5,4.5,0,1,1,12,4.5,4.5,4.5,0,0,1,16.5,9Z"
                fill="#62646a" />
              <path id="Trazado_63456" data-name="Trazado 63456"
                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12ZM12,1.5A10.5,10.5,0,0,0,3.8,18.555C4.863,16.839,7.207,15,12,15s7.135,1.838,8.2,3.555A10.5,10.5,0,0,0,12,1.5Z"
                fill="#62646a" fill-rule="evenodd" />
            </g>
          </g>
        </svg>
        Mi cuenta
      </button>
      <button  onclick="updateQueryParam('tab', 'publication')" class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
        role="tab" aria-controls="v-pills-profile" aria-selected="false">      
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24"
          viewBox="0 0 24 24">
          <defs>
            <clipPath id="clip-path-profile">
              <rect id="Rectángulo_10913" data-name="Rectángulo 10913" width="24" height="24"
                transform="translate(-12646 -23409)" fill="#62646a" stroke="#707070" stroke-width="1" />
            </clipPath>
          </defs>
          <g id="Enmascarar_grupo_57916" data-name="Enmascarar grupo 57916" transform="translate(12646 23409)"
            clip-path="url(#clip-path-profile)">
            <g id="card-list" transform="translate(-12646 -23409)">
              <path id="Trazado_63465" data-name="Trazado 63465"
                d="M21.75,4.5a.75.75,0,0,1,.75.75v13.5a.75.75,0,0,1-.75.75H2.25a.75.75,0,0,1-.75-.75V5.25a.75.75,0,0,1,.75-.75ZM2.25,3A2.25,2.25,0,0,0,0,5.25v13.5A2.25,2.25,0,0,0,2.25,21h19.5A2.25,2.25,0,0,0,24,18.75V5.25A2.25,2.25,0,0,0,21.75,3Z"
                fill="#62646a" />
              <path id="Trazado_63466" data-name="Trazado 63466"
                d="M7.5,12a.75.75,0,0,1,.75-.75h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,12Zm0-3.75a.75.75,0,0,1,.75-.75h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,8.25Zm0,7.5A.75.75,0,0,1,8.25,15h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,15.75ZM6,8.25a.75.75,0,1,1-.75-.75A.75.75,0,0,1,6,8.25ZM6,12a.75.75,0,1,1-.75-.75A.75.75,0,0,1,6,12Zm0,3.75A.75.75,0,1,1,5.25,15,.75.75,0,0,1,6,15.75Z"
                fill="#62646a" />
            </g>
          </g>
        </svg>
        Mis Publicaciones
      </button>
      <button class="publication-create-btn" data-bs-toggle="modal" data-bs-target="#exampleModalPublication">+ Crear
        Publicación</button>
    </div>
    <div class="tab-content content" id="v-pills-tabContent ">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
        tabindex="0">
        <span class="text-danger align-middle" id="Msg"></span>
        <h1>Mi cuenta</h1>
        <div class="user-profile-main">
          <div class="profile-details-container">
            <div class="profile-details-wrapper">
              <img src="./assets/img/profile-img.png" alt="profile-mg">
              <div class="user-details">
              <input type="hidden" id="id_user">
                <input type="hidden" id="id_profile">
               
                <p class="top-title">  <?= $username; ?></p>
                <!--p class="verify-warning"><i class="fa-solid fa-circle-exclamation"></i>Verificación pendiente</p-->
                <div class="company-wrapper">
                  <div class="company-detail">
                    <p class="main-title" id="type_user"></p>
                    <p class="sub-title">
                      Tipo de Cuenta
                    </p>
                  </div>
                  <div class="company-wrapper">
                    <div class="company-detail">
                      <p class="main-title" id="num_pub"></p>
                      <p class="sub-title">
                        Publicaciones
                      </p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="verify-btns-wrapper">
              <!--button type="button" class="profile-edit-btn">Editar Perfil</button>
              <button type="button" class="verify-btn"> <img src="./assets/img/verify.png" alt="verify"> Verificar mi
                cuenta</button-->
            </div>
          </div>
          <ul class="nav user-detail-tab nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link user-detail-link active" id="pills-home-tab" data-bs-toggle="pill"
                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                aria-selected="true">Generales</button>
            </li>

          </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div class="row-class tab-pane fade show active" id="pills-home" role="tabpanel"
            aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row ">
            
              <div class="col-md-6 col-lg-6 col-sm-6  ">
                <div class="user-detail-box">
                  <div class="table-title-2">
                    <p class="top-title2">Información adicional</p>
                    <button type="button"  class=" profile-edit-btn profile-edit-btn1">Editar Perfil</button>
                  </div>
                  <div class="user-detail-table  user-detail-table1">
                    <table class="additional-table">
                    <tr>
                        <td>ID Usuario</td>
                        <td> <?= $id_user_ext; ?></td>
                      </tr>
                      <tr id="social-field">
                        <td>Razón Social</td>
                        <td></td>
                      </tr>
                      <tr id="rutCompany-field">
                        <td>RUT</td>
                        <td></td> 
                      </tr>
                      <tr id="FullNameRepreLegal-field">
                        <td>Nombres de representante</td>
                        <td></td>
                      </tr>
                      <tr id="LastNameRepreLegal-field">
                        <td>Apellidos de representante</td>
                        <td></td>
                      </tr>
                      <tr id="type_doc-field">
                        <td>Documento</td>
                        <td></td>
                      </tr>
                      <tr id="num_doc-field">
                        <td>Núm. documento</td>
                        <td></td> 
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6  col-lg-6 col-sm-6  ">
              <div class="user-detail-box">
                  <div class="table-title-2">
                    <p class="top-title2">Dirección</p>
                    <button type="button" class="profile-edit-btn" data-bs-toggle="modal" data-bs-target="#direction">Editar Perfil</button>
                  </div>
                  <div class="user-detail-table">

                    <table class="additional-table">
                      <tr id="address">
                        <td>Dirección</td>
                        <td></td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <div class="user-detail-box mt-3">
                  <div class="table-title-2">
                    <p class="top-title2">Contraseña</p>
                    <button type="button" class="profile-edit-btn" data-bs-toggle="modal" data-bs-target="#pwd-editar-modal">Editar Perfil</button>
                  </div>
                  <div class="user-detail-table">

                    <table class="additional-table">
                      <tr>
                        <td>Contraseña actual</td>
                        <td><input disabled type="password" value="current_password"></td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
        tabindex="0">
        <h1>Mis Publicaciones</h1>
        <div class="filter-wrapper">
          <div class="filter-btns">
            <p class="filter-text">Filtrar por:</p>
            <button type="button" id="0" class="filter-btn filter-active-btn">Todos</button>
            <button type="button" id="2" class="filter-btn">Ventas</button>
            <button type="button" id="1" class="filter-btn">Arriendos</button>
            <button type="button" id="10" class="filter-btn">Borradores</button>
            <button type="button" id="7" class="filter-btn">Suspendidos</button>         
          </div>
          <button type="button" class="publication-create-btn" data-bs-toggle="modal" data-bs-target="#exampleModalPublication">+ Crear
            Publicación</button>
        </div> 
        <input type="hidden" id="id_product">
        <span class="text-danger align-middle" id="Msg1"></span>
        <div class="list_publi">
        </div>  
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include 'publication_type.php' ?>


<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel11" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header base-modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body base-modal-body">
       <img src="./assets/img/question.png" alt="logout">
       <p>¿Deseas eliminar la Publicación?</p>
      </div>
      <div class="modal-footer base-modal-footer">
        <button type="button" class="grey-btn" data-bs-dismiss="modal">No</button>
        <button type="button" class="yellow-btn" onclick="deletePublic(8)">Sí</button>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>
<?php include 'editar_direction.php' ?>
<?php include 'editar_password.php' ?>
<script>
  function updateQueryParam(key, value) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set(key, value);
    const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
    window.history.pushState({ path: newUrl }, '', newUrl);
  }
</script>
<script>
function getQueryParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
  }

  var tab = getQueryParam('tab');

  function setActiveClass(tabName) {
    if (tab === tabName) {
      if(tabName === "profile") {
        document.getElementById("v-pills-home-tab").classList.add("active");
      return "tab-pane fade show active";
      }else if (tabName === "publication") {
        document.getElementById("v-pills-profile-tab").classList.add("active");
      return "tab-pane fade show active";
      }
     
    } else {
      return "tab-pane fade";
    }
  }

 
  document.addEventListener("DOMContentLoaded", function() {
    var homeTabContent = document.getElementById("v-pills-home");
    homeTabContent.className = setActiveClass('profile');

    var profileTabContent = document.getElementById("v-pills-profile");
    profileTabContent.className = setActiveClass('publication');
  });

//obtiene la data del perfil

$(document).ready(function() { 
  datosBasicos();
  construirEstructuraHTML('0');
  
  $('.filter-btn').click(function() {
    // Remover la clase 'activo' de todos los botones
    $('.filter-btn').removeClass('filter-active-btn');
    
    // Agregar la clase 'activo' al botón seleccionado
    $(this).addClass('filter-active-btn');
    var buttonId = $(this).attr('id');
    
      construirEstructuraHTML(buttonId);
   
    console.log('ID del botón presionado:', buttonId);
     
  });

//editar la data "Datos de cuenta"
$('.user-detail-table button').click(function() {
    var tr = $(this).closest('tr');
    var td = tr.find('td:nth-child(2)');
    var value = td.text().trim();
    var input = $('<input class="form-control">').val(value).attr('id', tr.attr('id') + '-input');
    
    td.empty().append(input);
    $(this).text('Guardar');
    
    $(this).click(function() {
      var newValue = input.val();
      td.empty().text(newValue);
      $(this).text('Editar');            
        enviarActualizacionInformacionAdicional(2, newValue);      
    });
  });
  
  $('.profile-edit-btn1').click(function() {
    if ($(this).text().trim() === 'Guardar') {  
        enviarActualizacionInformacionAdicional(1);
    } else {
      $('.user-detail-table1 td:nth-child(2)').each(function(index) {
        var value = $(this).text().trim();
        var input = $('<input class="form-control">').val(value).prop('id', 'input_' + index);
        $(this).empty().append(input);
      });
    
      $('.profile-edit-btn1').text('Guardar');
    }
  });

});

function datosBasicos(){
  $.ajax({
    url: '<?=$baseUrl?>/profile_basic',
    type: 'GET',
    beforeSend: function(xhr) {
      // Agrega el Bearer Token al encabezado de autorización
      xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
    },
    success: function(response) {
      if(!response.error){
      // Maneja la respuesta exitosa
      $('#id_user').val(response.data.id_user);
      $('#id_profile').val(response.data.id_profile);
       //tipo de cuenta o usuario 
       $('#type_user').text(response.data.type_user);

       //num publicaciones
       $('#num_pub').text(response.data.num_publications);
        //email 
        var addressFieldValue1 = response.data.email;
        var addressFieldTd1 = $('#email td:nth-child(2)');
        addressFieldTd1.text(addressFieldValue1); 

       //direccion 
        var addressFieldValue = response.data.address;
        var addressFieldTd = $('#address td:nth-child(2)');
        addressFieldTd.text(addressFieldValue); 
        
        //social-field 
        var addressFieldValue6 = response.data.razon_social;
        var addressFieldTd6 = $('#social-field td:nth-child(2)');
        addressFieldTd6.text(addressFieldValue6); 

        //nombre representate legal
        var addressFieldValue3 = response.data.FullNameRepreLegal;
        var addressFieldTd3 = $('#FullNameRepreLegal-field td:nth-child(2)');
        addressFieldTd3.text(addressFieldValue3);

        //apellidos representante legal 
        var addressFieldValue4 = response.data.LastNameRepreLegal;
        var addressFieldTd4 = $('#LastNameRepreLegal-field td:nth-child(2)');
        addressFieldTd4.text(addressFieldValue4);
        
        //RUT Company
        var addressFieldValue5 = response.data.rutCompany;
        var addressFieldTd5 = $('#rutCompany-field td:nth-child(2)');
        addressFieldTd5.text(addressFieldValue5);

        // TIPODOC
        var addressFieldValue1 = response.data.id_type_doc;
        var addressFieldTd1 = $('#type_doc-field td:nth-child(2)');
        if(addressFieldValue1==1){
          addressFieldTd1.text('RUT');;
        }
        //num_doc
        var addressFieldValue2 = response.data.num_doc;
        var addressFieldTd2 = $('#num_doc-field td:nth-child(2)');
        addressFieldTd2.text(addressFieldValue2); 
        
      }
      // Aquí puedes realizar cualquier acción adicional con los datos recibidos
    },
    error: function(xhr, status, error) { 
      window.location.href = 'create_session_portal.php?logout=true'; 
      // Maneja el error de la llamada al servicio
      console.log('Error: ' + error);
    }
  });
}

function enviarActualizacionDatosBasicos(type, newValue) { 
  var url;
  var data = {};

  $("#Msg").html("");

  if (type == 2) {
    url = '<?=$baseUrl?>/profile_basic_update_1?id_user=' + <?=$id_user?>;
    data.email = newValue;
  } else {
    url = '<?=$baseUrl?>/changePassword?id_user=' + <?=$id_user?>;
    data.password = newValue;
  }

  $.ajax({
    url: url,
    method: 'PATCH',
    data: JSON.stringify(data),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
    },
    success: function(response) {
      if (type == 1) {
        $("#Msg2").html("<div class='alert alert-success' role='alert'>" + response.msg + "</div>");
      }
      //location.reload();
    },
    error: function(error) {
      console.error('Error al enviar los datos actualizados');
    }
  });
}


function enviarActualizacionInformacionAdicional(type, value = '') {
  $("#Msg").html("");

  var data;
  if (type == 1) {
    var razonSocial = $('#input_1').val();
    var rut = $('#input_2').val();
    var nombresRepresentante = $('#input_3').val();
    var apellidosRepresentante = $('#input_4').val();
    var tipoDocumento = $('#input_5').val() == 'RUT' ? '1' : '2';
    var numeroDocumento = $('#input_6').val();

    data = {
      razon_social: razonSocial,
      rutCompany: rut,
      FullNameRepreLegal: nombresRepresentante,
      LastNameRepreLegal: apellidosRepresentante,
      id_type_doc: tipoDocumento,
      num_doc: numeroDocumento
    };
  } else {
    data = {
      address: value
    };
  }

  var id_profile = $('#id_profile').val();

  $.ajax({
    url: '<?=$baseUrl?>/profile_basic_update?id_profile=' + id_profile,
    method: 'PATCH',
    data: JSON.stringify(data),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
    },
    success: function(response) {
      $("#Msg").html("<div class='alert alert-success' role='alert'>" + response.msg + "</div>");
      //location.reload();
    },
    error: function(error) {
      console.error('Error al enviar los datos actualizados');
    }
  });
}
//javascript de las publicaciones
function construirEstructuraHTML(value) { 
  var url;
  if(value == '0'){
   url= '<?=$baseUrl?>/list_publications_byuser?limit=1000&id_user=' + <?=$id_user?>;
  }else if(value == '7' || value == '10' ) {
    url='<?=$baseUrl?>/list_publications_byuser?limit=1000&id_user=' + <?=$id_user?>+'&status_id='+value;
  }else{
    url= '<?=$baseUrl?>/list_publications_byuser?limit=1000&id_user=' + <?=$id_user?>+'&tpublicacion='+value;
  }
  // Realizar la llamada AJAX para obtener los datos
  $.ajax({
    url: url,
    method: 'GET',
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
    },
    success: function(res) {
      $('.list_publi').empty();
     if(!res.error){ 
          res.data.forEach(function(element) { 
          if(element.status_id != '8') { 
            var imagen_url = '';
              if(element?.product_images.length > 0 ){
                imagen_url =   $.grep(element?.product_images, function(item) {
                    return item.cover === true;
                }); 
                if(imagen_url.length > 0 ){ 
                imagen_url = imagen_url[0]?.image_name;
                }else{
                  imagen_url = element?.product_images[0].image_name;
                } 
              }              
              var imagen = '<?=$baseUrl?>/see_image?image='+ imagen_url;
              // Construir la estructura HTML con los datos obtenidos
              var constructionContainer = $('<div>').addClass('contruction-main-container');
              var constructionLeftContainer = $('<div>').addClass('construction-left-container');
              var constructionImage = $('<img>').attr('src', imagen).attr('alt', 'construction');
              var constructionDetails = $('<div>').addClass('construction-details');
              var greyMdText = $('<p>').addClass('grey-md-text').text(element.Category.category);
              var constructionText = $('<p>').addClass('contruction-text').text(element.title);
              var constructionStats = $('<div>').addClass('construction-stats');
              var blueMdText = $('<div>').addClass('blue-md-text').append($('<i>').addClass('fa-solid fa-circle fa-dot')).text(element.PublicationType.description);
              var mdText = $('<div>').addClass('md-text').text(element.Category.category);
 
              // Agregar elementos al contenedor principal
              constructionStats.append(blueMdText);
              constructionStats.append(mdText);
              constructionDetails.append(greyMdText);
              constructionDetails.append(constructionText);
              constructionDetails.append(constructionStats);
              constructionLeftContainer.append(constructionImage);
              constructionLeftContainer.append(constructionDetails);
              constructionContainer.append(constructionLeftContainer);
              var status;
              var color_status = 'grey-status';
            
                switch (element.status_id) {
                    case 6:
                      status = 'Publicación Activa';
                      color_status = 'green-status';
                      break;
                    case 7:
                      status = 'Publicación Suspendida';
                      color_status = 'yellow-status';
                      break;
                    case 8:
                      status = 'Publicación Eliminada';
                      break;
                    case 9:
                      status = 'Publicación en Revisión';
                      break;
                    case 10:
                      status = 'Publicación en Borrador';
                      break;
                    default:
                      status = 'Estado Desconocido';
                  }
 

              var constructionRightContainer = $('<div>').addClass('construction-right-container');
              var draftDetails = $('<div>').addClass('draft-details');
              var greyStatus = $('<div>').addClass(color_status).append($('<i>').addClass('fa-solid fa-circle fa-dot')).text(status);
              
              var dropdown = $('<div>').addClass('dropdown');
              var dropdownToggle = $('<a>').addClass('btn btn-secondary dropdown-toggle').attr('href', '#').attr('role', 'button').attr('data-bs-toggle', 'dropdown').attr('aria-expanded', 'false').text('Opciones').append($('<i>').addClass('fa-solid fa-chevron-down'));
              var dropdownMenu = $('<ul>').addClass('dropdown-menu');
             // var editOption = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').text('Editar'));
              var url_edit = element.PublicationType.id_publication_type == '1' ? 'Arriendo_sale.php?id=' : 'publish_sale.php?id=';
              var editOption = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', url_edit + element.id_product).text('Editar'));
              var id = element.id_product; 
              var publishOption = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').text('Publicar').click(function() {
                             Publicar(id);
              }));

              var publishOption1 = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').text('Ver publicación').click(function() {
                seePublicacion(id);
              }));
              var borradorOption = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').text('Volver borrador').click(function() {
                   statusBorrador(id);
              }));
            var deleteOption = $('<li>').append($('<a>').addClass('dropdown-item').attr('href', '#').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#confirmation').text('Eliminar').click(function() {
               setValue(id);
              }));
              switch (element.status_id) {
                    case 6:
                    //Activa
                      dropdownMenu.append(publishOption1); //ver pub
                      dropdownMenu.append(borradorOption); //borrador
                      break;
                    case 7:
                     //Suspendida
                     // dropdownMenu.append(editOption); //editar
                      dropdownMenu.append(publishOption1); //ver pub
                      break;
                    case 8:
                      
                      break;
                    case 9:
                     
                      break;
                    case 10:
                      //borrador
                      dropdownMenu.append(editOption); //editar
                      dropdownMenu.append(publishOption1); //ver pub
                      break;
                    default:
                      
                  }
         
              dropdownMenu.append(deleteOption); //eliminar
              
              dropdown.append(dropdownToggle);
              dropdown.append(dropdownMenu);
              draftDetails.append(greyStatus);
              draftDetails.append(dropdown);
              constructionRightContainer.append(draftDetails); 
            
            //publicacion suspendida

            if( element.status_id == '7'){
                var divElement = $('<div>').addClass('publication-draft-warning');
                var iconElement = $('<i>').addClass('fa-solid fa-circle-exclamation');
                var textDiv = $('<div>');
                var mainText = $('<p>').addClass('draft-warning-text-main').text('Publicación suspendida');
                var subText = $('<p>').addClass('draft-warning-text-sub').text('El administrador suspendió tu publicación. ');
                var spanElement = $('<span>').addClass('span-blue').text('Contactarlo.');

                subText.append(spanElement);
                textDiv.append(mainText, subText);
                divElement.append(iconElement, textDiv);
                constructionRightContainer.append(divElement);
              }else{
                
                  //publicacion activa y borrador          
                    var publicationDraftWrapper = $('<div>').addClass('publication-draft-wrapper');
                    var pubContainer1 = $('<div>').addClass('pub-container');
                    var greyMdText1 = $('<p>').addClass('grey-md-text').text('Visitas');
                    var boldPubText1 = $('<p>').addClass('bold-pub-text').text(element.visitt ? element.visitt :0 );
                    var pubContainer2 = $('<div>').addClass('pub-container');
                    var greyMdText2 = $('<p>').addClass('grey-md-text').text('Interacción');
                    var boldPubText2 = $('<p>').addClass('bold-pub-text').text(element.interaction ? element.interaction :0 );

                    // Agregar elementos al contenedor de publicación y borrador
                    pubContainer1.append(greyMdText1);
                    pubContainer1.append(boldPubText1);
                    pubContainer2.append(greyMdText2);
                    pubContainer2.append(boldPubText2);
                    publicationDraftWrapper.append(pubContainer1);
                    publicationDraftWrapper.append(pubContainer2);
                    constructionRightContainer.append(publicationDraftWrapper);
              
                }
                   
                constructionContainer.append(constructionRightContainer); 

                var idDetail = $('<div>').addClass('id-detail');
                var greyMdText3 = $('<p>').addClass('grey-md-text').text('ID Publicación #' + element.id_product);
                var greyMdText4 = $('<p>').addClass('grey-md-text').text('Creado ' + element.create_at_formatted);

                idDetail.append(greyMdText3);
                idDetail.append(greyMdText4);

                // Agregar la estructura HTML al documento
                $('.list_publi').append(constructionContainer);
                $('.list_publi').append(idDetail);
          }
        });
        
      }  else {
        $('.list_publi').text('No tienes publicaciones creadas, para crear la primera presiona el botón "Crear Publicación".');
      }
    }
  });
}

function setValuePassword(id){ 
  var old_password = $("#exampleInputPasswordold").val();
  var new_password = $("#exampleInputPassword1").val();
  var conf_password = $("#exampleInputPassword2").val();
  if(old_password=='' || new_password=='' || conf_password=='' ){
    $("#Msg2").html("<div class='alert alert-danger' role='alert'>Debe completar todos los campos.</div>"); 
    return
  }
  if(new_password!=conf_password ){
    $("#Msg2").html("<div class='alert alert-danger' role='alert'>Las contraseñas deben coincidir.</div>"); 
    return
  }
  enviarActualizacionDatosBasicos(1, new_password); 
}

function setValue(id){ 
  $('#id_product').val(id);
}

function  statusBorrador(id){
  $('#id_product').val(id);
   deletePublic(10);
}

function seePublicacion(id){
  $('#id_product').val(id);
  var form = document.createElement('form');
      form.method = 'POST';
      form.action = 'purchase_publication.php';

      var input3= document.createElement('input');
      input3.type = 'hidden';
      input3.name = 'id';
      input3.value = id;
      form.appendChild(input3); 

      document.body.appendChild(form);
      form.submit();

}

function deletePublic(status){
  var url;
  var data = {};

  $("#Msg").html("");
  var id_product = $("#id_product").val(); 
    url = '<?=$baseUrl?>/update_publication_status?id_user=' + <?=$id_user?>;
    data.id_product = id_product;
    data.status_id = status;
  
   $.ajax({
    url: url,
    method: 'PUT',
    data: JSON.stringify(data),
    contentType: "application/json",
    beforeSend: function(xhr) {
      xhr.setRequestHeader('Authorization', 'Bearer ' + '<?=$token?>');
    },
    success: function(response) {
      location.reload();
      $("#Msg1").html("<div class='alert alert-success' role='alert'>Estatus actualizado.</div>");
 
    },
    error: function(error) {
      console.error('Error al enviar los datos actualizados');
    }
  });
}
</script>
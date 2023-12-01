<?php include 'header.php' ?>

<?php

$baseUrl = getenv('URL_API');

  if (isset($_GET['id'])) {
   $count_details = 0;
   $id = $_GET['id'];
    $url = $baseUrl.'/list_publications_panel_details?id='.$id;
    $response = file_get_contents($url);
    if ($response !== false) {
        // Decodificar la respuesta JSON
        $data = json_decode($response, true);
        if (!$data['error']) { 
         $details_publications = $data['data'][0];         
         $count_details = $data['count'];
            } else {
                echo 'Error: ' . $data['msg'];
            }
        } else {
            echo 'Error al realizar la solicitud a la API';
        }
        //se obtienen las imagenes de la publicacion
        $count_imagen = 0;
        $url  = $baseUrl.'/list_publications_imagen?id='.$id;
        
        $responseimg = file_get_contents($url);
        if ($responseimg !== false) {
           // Decodificar la respuesta JSON
           $dataimg = json_decode($responseimg, true);
           if (!$data['error']) {
               // Obtener la lista de $categories
               $detalle_img = $dataimg['data'] ;
               $count_imagen = $dataimg['count'];
           }  
        } 
         

    }else {
        header('location: panel.php');
    }
    
    $count_regiones= 0;
    $url13 = $baseUrl.'/list_regiones';
    $response = file_get_contents($url13);
    if ($response !== false) {
        // Decodificar la respuesta JSON
        $dataRegion = json_decode($response, true);
        if (!$dataRegion['error']) {
            // Obtener la lista de $categories
            $regiones = $dataRegion['data'];
            $count_regiones = $dataRegion['count'];
        } else {
            echo 'Error: ' . $dataRegion['msg'];
        }
    } else {
        echo 'Error al realizar la solicitud a la API';
    }
    ?>   
<section>
    <div class="sidebar" id="sidebar">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="main">
        <?php include 'nav.php' ?>
        <div class="container-fluid">
             <?php
            if (isset($_GET['success'])) {
                $msg = "Se ha registrado existosamente.";
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>' . $msg . '</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if (isset($_GET['error'])) {
                $msg = "Ha ocurrido un error.";
                echo '
                 <div class="alert alert-danger alee encontraron registrosrt-dismissible fade show" role="alert">
                     <strong>' . $msg . '</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>';
            }
            ?> 
            <div class="row">
                <div class="col-md-12 mt-4 mb-3"></div>
                <div class="col-md-12">
                    <a href="panel.php" class="font-family-Roboto-Regular text-black">
                        <i class="fas fa-chevron-left"></i> Volver
                    </a>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <h2 class="font-family-Roboto-Medium titulo-box"> Publicación# <?=$details_publications['id_product'] ?></h2>
                       <span class="text-success align-middle" id="Msg"></span>
                </div>
                   <div class="col-md-12 text-right">                        
                       <button id="Senddata" onclick="GuardarBasico()" type="button" class="btn btn-primary" >
                        Guardar cambios
                    </button>
                          <button type="button" onclick="eliminarPub()"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Eliminar publicación
                    </button>
                </div>
                <div class="col-md-3">
                    <div class="box-white">
                        <div class="box-perfil text-center">
                            <img src="../img/profile.jpeg" alt="perfil">
                            <h3 class="font-family-Inter-Medium">
                              <?=$details_publications['title'] ?>
                            </h3>
                            <span class="font-family-Inter-Regular text-gris fz-14">Publicación#  <?=$details_publications['id_product'] ?></span>
                        </div>
                        <div class="box-titulo">
                            <h3 class="font-family-Roboto-Bold">Detalles</h3>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Publicación</p>
                                <h4 class="font-family-Inter-Medium">Publicación# <?=$details_publications['id_product'] ?></h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Tipo</p>
                                <h4 class="font-family-Inter-Medium"> <?=$details_publications['publication_type']['type_pub'] ?></h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Fecha Creación</p>
                                <h4 class="font-family-Inter-Medium"><?=$details_publications['create_at_formatted'] ?></h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Categoría</p>
                                <h4 class="font-family-Inter-Medium"> <?=$details_publications['mainCategory']['category'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-5">
                    <div class="tabs-detalles">
                        <!-- Nav pills -->
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active font-family-Roboto-Medium" data-toggle="pill" href="#detalles">Detalles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-family-Roboto-Medium" data-toggle="pill" href="#multimedia">Multimedia</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="detalles" class="tab-pane active"><br>
                                <div class="box-white pdetalles">
                                    <form action="myFormPub" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4 class="font-family-Roboto-Medium">Características</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="tpublicacion" class="font-family-Inter-Regular">Título de publicación</label>
                                                <input type="text" value="<?=$details_publications['title'] ?>" name="title" id="title" class="font-family-Inter-Medium" placeholder="Título de publicación">
                                            </div>
                                            <div class="form-group">
                                            <label for="ubicacion" class="font-family-Inter-Regular">Región</label>
                                            <?php                                            
                                                        if ($count_regiones > 0) {

                                                            // Crear el elemento select
                                                            echo '<select class="form-control font-family-Inter-Medium"  id="location" name="location">';
                                                            echo '<option value="0">Seleccionar región</option>';
                                                            // Recorrer la lista de publicaciones y crear las opciones del select
                                                            foreach ($regiones as $reg) { 
                                                                echo '<option value="' . $reg . '"';
                                                                // Verificar si location coincide con la opción actual
                                                                if (isset($details_publications['location']) && $details_publications['location'] == $reg) {
                                                                    echo ' selected';
                                                                }
                                                                echo '>' . $reg. '</option>';
                                                            }
                                                            echo '</select>';
                                                        }  
                                                    ?>
                                               </div>
                                            <div class="form-group">
                                                <label for="dpublicacion" class="font-family-Inter-Regular">Descripción de publicación</label>
                                                <textarea name="description" id="description"  cols="30" rows="23" placeholder="Descripción de publicación"><?= isset($details_publications['description']) ? $details_publications['description'] : ''?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Precio</h4>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="price" id="price"  value="<?= isset($details_publications['product_details']['price']) ? $details_publications['product_details']['price'] : ''?>" class="font-family-Inter-Medium" placeholder="0.00">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Características</h4>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="marca" class="font-family-Inter-Regular">Marca</label>
                                                        <input type="text" name="brand" id="brand"  value="<?= isset($details_publications  ['product_details']['brand']) ? $details_publications ['product_details']['brand'] : ''?>" class="font-family-Inter-Medium" placeholder="Marca">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="modelo" class="font-family-Inter-Regular">Modelo</label>
                                                        <input type="text" name="model" id="model"  value="<?= isset($details_publications['product_details']['model']) ? $details_publications['product_details']['model'] : ''?>" class="font-family-Inter-Medium" placeholder="Modelo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="anos" class="font-family-Inter-Regular">Año</label>
                                                        <input type="text" name="year" id="year"  value="<?= isset($details_publications['product_details']['year']) ? $details_publications['product_details']['year'] : ''?>" class="font-family-Inter-Medium" placeholder="Año">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="condicion" class="font-family-Inter-Regular">Condición</label>
                                                        <input type="text" name="condition" id="condition"  value="<?= isset($details_publications['product_details']['condition']) ? $details_publications ['product_details']['condition'] : ''?>"  class="font-family-Intear-Medium" placeholder="Condición">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kilometraje" class="font-family-Inter-Regular">Kilometraje</label>
                                                        <input type="text" name="mileage" id="mileage"  value="<?= isset($details_publications['product_details']['mileage']) ? $details_publications['product_details']['mileage'] : ''?>" class="font-family-Inter-Medium" placeholder="Kilometraje">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="motor" class="font-family-Inter-Regular">N° de Motor</label>
                                                        <input type="text" name="engine_number" id="engine_number"  value="<?= isset($details_publications['product_details']['engine_number']) ? $details_publications['product_details']['engine_number']: ''?>" class="font-family-Inter-Medium" placeholder="N° de Motor">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="garantia" class="font-family-Inter-Regular">Garantía Maquinatrix</label>
                                                        <div class="form-check-inline">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="warrantys"  value="S" name="warranty" 
                                                                    <?= isset($details_publications['product_details']['warranty'] ) && $details_publications['product_details']['warranty']=="S" ? 'checked': ''?>
                                                                >
                                                                <label class="custom-control-label" for="warrantys" style="font-size: 15px;">Si</label>
                                                            </div>
                                                      </div>
                                                      <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="warrantyn"  value="N" name="warranty" 
                                                                   <?= isset($details_publications['product_details']['warranty'] ) && $details_publications['product_details']['warranty']=="N" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="warrantyn" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div>
                                                      </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="owner" class="font-family-Inter-Regular">Tipo de Propietario</label>
                                                        <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="ownerP"  value="Persona" name="owner" 
                                                                   <?= isset($details_publications['product_details']['owner'] ) && $details_publications['product_details']['owner']=="Persona" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="ownerP" style="font-size: 15px;">Persona</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="ownerE"  value="Empresa" name="owner" 
                                                                   <?= isset($details_publications['product_details']['owner'] ) && $details_publications['product_details']['owner']=="Empresa" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="ownerE" style="font-size: 15px;">Empresa</label>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group"> 
                                                        <label for="owner" class="font-family-Inter-Regular">Despacho</label>
                                                   
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="dsi"  value="S" name="delivery" 
                                                                   <?= isset($details_publications['product_details']['delivery'] ) && $details_publications['product_details']['delivery']=="S" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="dsi" style="font-size: 15px;">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="dno"  value="N" name="delivery" 
                                                                  <?= isset($details_publications['product_details']['delivery'] ) && $details_publications['product_details']['delivery']=="N" ? 'checked': ''?>>
                                                            <label class="custom-control-label" for="dno" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div>
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label for="owner" class="font-family-Inter-Regular">Paga Ahora o Después</label>
                                                
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="psi" value="S" name="pay_now_delivery"  
                                                    <?= isset($details_publications['product_details']['pay_now_delivery'] ) && $details_publications['product_details']['pay_now_delivery']=="S" ? 'checked': ''?>>
                                                            <label class="custom-control-label" for="psi" style="font-size: 15px;">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="pno" value="N" name="pay_now_delivery" 
                                                               <?= isset($details_publications['product_details']['pay_now_delivery'] ) && $details_publications['product_details']['pay_now_delivery']=="N" ? 'checked': ''?>>
                                                            <label class="custom-control-label" for="pno" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div>
                                                 </div>
                                                </div>
                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="owner" class="font-family-Inter-Regular">Facilidades de Pago</label>
                                                        <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="facipays"  value="S" name="facipay" 
                                                                   <?= isset($details_publications['product_details']['facipay'] ) && $details_publications['product_details']['facipay']=="S" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="facipays" style="font-size: 15px;">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="facipayn"  value="N" name="facipay" 
                                                                   <?= isset($details_publications['product_details']['facipay'] ) && $details_publications['product_details']['facipay']=="N" ? 'checked': ''?>
                                                               >
                                                            <label class="custom-control-label" for="facipayn" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div> 
                                                    </div>
                                                </div>
                                                 <div class="col-md-12"> 
                                                        <div class="form-group">
                                                            <label for="contact_me" class="font-family-Inter-Regular">Datos de contacto </label>
                                                            <textarea name="contact_me" id="contact_me"  cols="10" rows="10" placeholder="Ej: Pedro Perez, TLF: 895-568-9898, email: pedroperez@gmail.com, fax:9234,instragram: pperez123"><?= isset($details_publications['product_details']['contact_me']) ? $details_publications['product_details']['contact_me'] : ''?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="multimedia" class="tab-pane fade"><br>
                                <div class="box-white">
                                    <h3 class="font-family-Roboto-Medium mb-3" style="font-size: 18px;">Multimedia</h3>
                                    <div class="upload__box">
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p class="d-flex align-items-start justify-content-start" style="gap: 10px">
                                                    <i class="fal fa-file-upload" style="font-size: 40px;color: #1F87FF;"></i>
                                                    <span class="font-family-Roboto-Regular">
                                                        <strong class="d-block font-family-Roboto-Medium">Haga clic aquí para cargar las imágenes.</strong>
                                                        Sube hasta 10 imágenes
                                                    </span>
                                                </p>                                             
                                                <input name="uploadd" id="uploadd" type="file" multiple="" data-max_length="20" class="upload__inputfile" accept=".jpg, .jpeg, .png .webp">
                                            </label>
                                        </div>
                                        <div class="upload__img-wrap"></div>
                                      </div>
                                    <p class="font-family-Roboto-Regular text-gris fz-12 mb-0 mt-3">
                                        Suba las imágenes necesarias para la publicación.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function () { 
        ImgUpload();
        LoadImagesFromServer();
    });
    var imgArray = [];
    function ImgUpload() {
        var imgWrap = ""; 

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i <= imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'><i class='fas fa-trash-alt'></i></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
       
        for (var i = 0; i < imgArray.length; i++) { 
            if (imgArray[i].name === file) {  
                imgArray.splice(i, 1); 
                deleteImagen(file);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
    }
       
     
function LoadImagesFromServer() {
    // Hacer una petición AJAX al servidor para obtener las imágenes
    // Aquí asumimos que el servidor devuelve un arreglo de URLs de imágenes en formato JSON
    let urlGetImagen = '<?php echo $baseUrl ?>/list_publications_imagen?id=<?=$id?>';
    $.ajax({
        url:urlGetImagen,
        method: 'GET',
        dataType: 'json',
        success: function (response) {
              response.data.forEach(function (imageData) {
              var imageName = imageData.image_name;
                var imgOr = '<?= $baseUrl ?>/see_image?image='+ imageName; 

                // Obtener los datos de la imagen usando fetch()
                fetch(imgOr)
                    .then(response => response.blob())
                    .then(blob => {
                        // Crear una URL temporal para el Blob 
                      
                        var file = new File([blob], imageName);
                        imgArray.push(file); 

                        var html = "<div class='upload__img-box'><div style='background-image: url(" +imgOr+ ")' data-number='" + $(".upload__img-close").length + "' data-file='" + imageName + "' class='img-bg'><div class='upload__img-close'><i class='fas fa-trash-alt'></i></div></div></div>";
                          $('.upload__img-wrap').append(html);   
                    }) 
            });
        }, 
        error: function (error) {
            console.log('Error al obtener las imágenes del servidor:', error);
        }
    });
}
    function GuardarBasico() { 
        var campo1 = $('#location').val();
        var campo2 = $('#description').val(); 
        if (campo1 === '' || campo2 === '') {
            return false;
        } else {

        var token = '<?= $_SESSION["token"]; ?>';
        var postData = {
            "id_product": '<?= $id ?>',
            "title": $('#title').val(),
            "location": $('#location').val(),
            "description": $('#description').val()               
         };
        $.ajax({
            type: "PUT",
            url: '<?= $baseUrl ?>/update_publication_basic',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: postData,
            success: function (response, textStatus, xhr)
            {
                var statusCode = xhr.status;
                if (statusCode === 200 && !response.error) {
                    registrarDetalle();
                } else {
                    window.location.href = 'detalle-publicaciones.php?error=true';
                }
            },
            error: function (response) { 
                if (response.status === 401 || response.status === 403) {
                    window.location.href = 'create_session.php?logout=true';
                 }
               }
            });
        }      
      }
  
    function registrarDetalle() {  
        var token = '<?php echo $_SESSION["token"]; ?>'; 
        var deliveryElement = document.querySelector('input[name="delivery"]:checked');
        var payNowDeliveryElement = document.querySelector('input[name="pay_now_delivery"]:checked');
        var warrantyElement = document.querySelector('input[name="warranty"]:checked');
        var ownerElement = document.querySelector('input[name="owner"]:checked');
        var facipayElement = document.querySelector('input[name="facipay"]:checked');
        var postData = {
            "id_product": '<?= $id ?>',
            "price": $('#price').val(),
            "brand": $('#brand').val(),
            "model": $('#model').val(),
            "year": $('#year').val(),
            "condition": $('#condition').val(),
            "mileage": $('#mileage').val(),
            "engine_number": $('#engine_number').val(),
            "warranty": warrantyElement ? warrantyElement.value : null,
            "owner": ownerElement ? ownerElement.value : null,
            "delivery": deliveryElement ? deliveryElement.value : null,
            "pay_now_delivery": payNowDeliveryElement ? payNowDeliveryElement.value : null,
            "facipay": facipayElement ? facipayElement.value : null,
            "contact_me":  $('#contact_me').val()
        };
        $.ajax({
            type: "POST",
            url: '<?= $baseUrl ?>/register_product_details',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: postData,
            success: function (response, textStatus, xhr)
            {
                var statusCode = xhr.status;
                
                if (statusCode === 201 && !response.error) {
                      $("#Msg").html("<div class='alert alert-success' role='alert'>Registro Exitoso.</div>");      
                 
              uploadImgen();                 
                } else {
                    window.location.href = 'detalle-publicaciones.php?error=true';
                }
            },
            error: function (response) { 
                if (response.status === 401 || response.status === 403) {
                    window.location.href = 'create_session.php?logout=true';
                }
            }
        });
    }    
    
    function eliminarPub() {  

        var token = '<?= $_SESSION["token"]; ?>'; 
        var postData = {
            "id_product": '<?= $id ?>',
            "status_id": 8        
         };
        $.ajax({
            type: "PUT",
            url: '<?= $baseUrl ?>/update_publication_status',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: postData,
            success: function (response, textStatus, xhr)
            {
                var statusCode = xhr.status;
                if (statusCode === 200 && !response.error) {
                   window.location.href = 'panel.php';
                } else {
                    window.location.href = 'detalle-publicaciones.php?error=true';
                }
            },
            error: function (response) { 
                if (response.status === 401 || response.status === 403) {
                    window.location.href = 'create_session.php?logout=true';
                 }
               }
            });
        }      
      $(".tab-list").on("click", ".tab", function(event) {
            event.preventDefault();

            $(".tab").removeClass("active");
            $(".tab-content").removeClass("show");

            $(this).addClass("active");
            $($(this).attr('href')).addClass("show");	
          });$(".tab-list").on("click", ".tab", function(event) {
            event.preventDefault();

            $(".tab").removeClass("active");
            $(".tab-content").removeClass("show");

            $(this).addClass("active");
            $($(this).attr('href')).addClass("show");	
          }); 
          
          function deleteImagen(name) {   
            var token = '<?= $_SESSION["token"]; ?>';        
                $.ajax({
                    type: "DELETE", 
                    url: '<?= $baseUrl ?>/delete_imagen?id_product=<?= $id ?>&name='+name,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response, textStatus, xhr)
                        {
                            var statusCode = xhr.status;
                            if (statusCode === 200 && !response.error) {
                                $("#Msg").html("<div class='alert alert-success' role='alert'>Se elimino la imagen.</div>");  
                            } else {
                                window.location.href = 'detalle-publicaciones.php?error=true';
                            }
                        },
                    error: function (response) { 
                        if (response.status === 401 || response.status === 403) {
                            window.location.href = 'create_session.php?logout=true';
                            }
                        }
                    });
                    } 
  function deleteImagenAll() {   
            var token = '<?= $_SESSION["token"]; ?>';        
                $.ajax({
                    type: "DELETE", 
                    url: '<?= $baseUrl ?>/delete_all?id_product=<?= $id ?>',
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
            
            var input = document.getElementById('uploadd'); 
            if(imgArray.length > 0){
            deleteImagenAll();
       
            setTimeout(function() {
           var files = input.files; 
            for (var i = 0; i < imgArray.length; i++) {
                var formData = new FormData();
                formData.append('file', imgArray[i]); 
                var title =  $('#title').val();
                var token = '<?= $_SESSION["token"]; ?>';        
                $.ajax({
                    type: "POST",
                    processData: false,  // tell jQuery not to process the data
                    contentType: false ,  // tell jQuery not to set contentType
                    url: '<?= $baseUrl ?>/upload_image?id_product=<?= $id ?>&orden='+i,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    data: formData, 
                    error: function (response) { 
                        if (response.status === 401 || response.status === 403) {
                            window.location.href = 'create_session.php?logout=true';
                        }
                    }
                    });
                    } 
                }, 1000); // 3000 milisegundos = 3 segundos
                }    
        
      }
</script>
<?php include 'footer.php' ?>

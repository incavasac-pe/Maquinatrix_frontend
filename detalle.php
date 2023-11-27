<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 

    $baseUrl = getenv('URL_API');
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
    $host = $_SERVER['HTTP_HOST']; 
    $uri = $_SERVER['REQUEST_URI']; 
    $url_publi = $protocol . '://' . $host;
 
    if (isset($_GET['id'])&& $_GET['id']!='') {
    $id = $_GET['id'];
    if (isset($_GET['typep'])&& $_GET['typep']!='') {
      $tpublicacion =  $_GET['typep'];
      $mov = ($tpublicacion == '2') ? 'comprar' :' arrendar';
    }
  
    $count_category = 0;
    $url12 = $baseUrl.'/list_publications_panel_details?id='.$id;
    
    $response = file_get_contents($url12);
    if ($response !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $detalle = $data['data'][0];
           $count_category = $data['count'];
       }  
    } else {
        echo 'Error al realizar la solicitud a la API';
    }
    
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
    } else {
        echo 'Error al realizar la solicitud a la API';
    }
      }  
       ?>
       <section class="bg-carrucel mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper carrucel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide slider-item slider-1">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-9 col-12 box-flex">
                                            <h2 class="font-family-Roboto-Medium mb-0">
                                                Paga Ahora o al Final del arriendo en maquinaria y herramientas
                                            </h2>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <img src="img/slider1.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide slider-item slider-2">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-9 col-12 box-flex">
                                            <h2 class="font-family-Roboto-Medium mb-0 text-white">
                                                Facilidades de Pago para tus Compras
                                            </h2>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <img src="img/slider2.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide slider-item slider-3">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-9 col-12 box-flex text-white">
                                            <h2 class="font-family-Roboto-Medium mb-0">
                                                Garantía Maquinatrix para tus arriendos
                                            </h2>
                                        </div>
                                        <div class="col-md-3 col-12 text-center">
                                            <img src="img/slider3.png" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-migas">
                    <li>
                        <a href="index.php" class="font-family-Roboto-Regular">Inicio</a>
                    </li>
                     <li class="font-family-Roboto-Regular"> / <a href="tienda.php?typep=<?=$tpublicacion?>&<?=$mov?>" class="font-family-Roboto-Regular"><?= ($tpublicacion == '2') ? 'Comprar' :' Arrendar'; ?></a></li>
                    <li class="font-family-Roboto-Regular"> / <?= $detalle['title']  ?> </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="bg-detalles">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h1 class="font-family-Roboto-Medium">
                    <?= $detalle['title']  ?>
                </h1>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                <a href="javascript:void(0);" class="font-family-Roboto-Regular migas migas1">&middot;  <?= $detalle['publication_type']['type_pub'] ?> </a>
                <a href="javascript:void(0);" class="font-family-Roboto-Regular migas"> <?=$detalle['mainCategory']['category'] ?></a>
            </div>
            <div class="col-md-12 mt-4"></div>
            <div class="col-md-8">
                <div class="galeria">
                    <?php    if ($count_imagen > 0) {  ?>
                    <div class="galeria1 miniatura" id="miniatura">
                        <div class="text-center boton-navegacion">
                            <button class="btn btn-galeria" id="anterior">
                                <i class="fas fa-chevron-circle-up"></i>
                            </button>
                        </div>
                         
                             <?php   foreach ($detalle_img as $img) { ?>
                                   <div class="imagen">
                                    <a href="javascript:void(0);" class="activo">
                                         <img src="<?= $baseUrl ?>/see_image?image=<?= $img["image_name"]!=null ? $img["image_name"]: 'sin_producto.jpg'?>" alt="min galeria">
                                     </a>
                                </div>
                                 <?php  
                                 }    ?>     
                      
                        <!-- Agrega más imágenes aquí -->
                        <div class="text-center boton-navegacion">
                            <button class="btn btn-galeria" id="siguiente">
                                <i class="fas fa-chevron-circle-down"></i>
                            </button>
                        </div>
                    </div>
                       <?php      }  
                          ?> 
                      <?php                                            
                    if ($count_imagen > 0) {  ?>
                    <div class="presentacion">                      
                        <img src="<?= $baseUrl ?>/see_image?image=<?= $detalle_img[0]["image_name"]!=null ? $detalle_img[0]["image_name"]: 'sin_producto.jpg'?>"  alt="galeria" class="w-100" id="vista">
                    </div>
                     <?php  }  ?> 
                </div>
                <div class="detalles" style="border-top: 1px solid #E4E5E7;margin-top: 20px;padding-top: 20px;">
                    <h2 class="font-family-Roboto-Medium">
                        Detalles
                    </h2>
                    <p class="font-family-Roboto-Regular">
                        <?php  
                       echo  $dato_con_saltos_de_linea = nl2br($detalle['description']); 
                       ?>
                    </p>
                </div>
                <div class="linea mt-5 mb-5"></div>
                <div class="caracteristicas">
                    <h2 class="font-family-Roboto-Medium mb-3">
                        Características
                    </h2>
                    <table class="table table-striped font-family-Roboto-Medium table-bordered">
                        <tbody>
                        <tr>
                            <td>Marca</td>
                            <td>  <?= $detalle['product_details']['brand']  ?></td>
                        </tr>
                        <tr>
                            <td>Modelo</td>
                            <td> <?= $detalle['product_details']['model']  ?></td>
                        </tr>
                        <tr>
                            <td>Año</td>
                            <td> <?= $detalle['product_details']['year']  ?></td>
                        </tr>
                        <tr>
                            <td>Condición</td>
                            <td> <?= $detalle['product_details']['condition']  ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="siderbar sticky-top">
                    <div class="box-sider">
                        <div class="box-cotiza">
                            <span class="font-family-Roboto-Regular">Precio</span>
                            <h3 class="font-family-Roboto-Medium mb-2">
                               <?= isset($detalle['product_details']["price"])? $detalle['product_details']["price"]:'0' ?>  <span class="font-family-Roboto-Regular"></span>
                            </h3>
                        </div>
                        <form action="javascript: void(0);">
                            <div class="form-group">
                                <p class="font-family-Roboto-Regular text-celeste fz-14">
                                    <i class="fal fa-map-marker-alt"></i> <?= $detalle['location']  ?>
                                </p>
                                <p class="font-family-Roboto-Medium fz-14">
                                    Contáctate con el propietario de este anuncio para realizar la cotización del
                                    producto.
                                </p>
                            </div>
                            <div class="form-group">
                                <div class="box-start">
                                    <label for="mensaje" class="d-block mb-0">Mensaje</label>
                                    <textarea name="mensaje" id="mensaje" cols="30" rows="3" class="fz-14 font-family-Roboto-Regular">¡Hola! Estoy interesado en el anuncio que vi en  Maquinatrix.</textarea>
                                </div>
                            </div>
                            <div class="alerta d-flex align-items-start justify-content-start" style="gap: 10px">
                                <div class="">
                                    <p class="font-family-Roboto-Regular">
                                        Al enviar estoy aceptando los Términos y Condiciones de Maquinatrix
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                     <a type="button" class="btn btn-contacto font-family-Roboto-Medium w-100 text-white"
                                         onclick="whats('<?=$tpublicacion?>','<?=$id?>','<?=$detalle['title'] ?>','<?=$url_publi?>')" 
                                         href="#" class="btn-contacto font-family-Roboto-Medium">
                                    <i class="fab fa-whatsapp"></i> Contactar
                                </a>
                            </div>
                            <div class="alerta d-flex align-items-start justify-content-start" style="gap: 10px">
                                <div class="">
                                    <img src="img/no-money.png" alt="icono">
                                </div>
                                <div class="">
                                    <p class="mb-0">
                                        No se cobra ningún monto por Solicitar Arriendo hasta que el Propietario se contacte
                                        con
                                        Ud.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal reporte-->
<div class="modal fade" id="reporte" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-family-Roboto-Medium">Denuncia esta publicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="step1">
                        <p class="font-family-Roboto-Regular">
                            Esto queda entre Maquinatrix y tu, ¿Cuál es el motivo de denuncia?
                        </p>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" class="custom-control-input" id="asunto1" name="asunto">
                            <label class="custom-control-label font-family-Roboto-Regular" for="asunto1">
                                Asunto 1
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" class="custom-control-input" id="asunto2" name="asunto">
                            <label class="custom-control-label font-family-Roboto-Regular" for="asunto2">
                                Asunto 2
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" class="custom-control-input" id="asunto3" name="asunto">
                            <label class="custom-control-label font-family-Roboto-Regular" for="asunto3">
                                Asunto 3
                            </label>
                        </div>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" class="custom-control-input" id="asunto4" name="asunto">
                            <label class="custom-control-label font-family-Roboto-Regular" for="asunto4">
                                Asunto 4
                            </label>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 text-right">
                                <a href="javascript:void(0);" class="btn btn-next font-family-Roboto-Medium">
                                    Siguiente
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="step2">
                        <p class="font-family-Roboto-Regular">
                            Puedes detallar el motivo de denuncia en este anuncio en especifico:
                        </p>
                        <div class="form-group">
                            <textarea name="reportmensaje" id="reportmensaje" cols="30" rows="5"
                                      placeholder="Puedes detallar aquí..."></textarea>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="javascript:void(0);" class="btn btn-next font-family-Roboto-Medium"
                                   style="background-color: #E4E5E7 !important;">
                                    Volver
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="javascript:void(0);" class="btn btn-next font-family-Roboto-Medium">
                                    Siguiente
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="step3">
                        <div class="row mt-4">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 text-right">
                                <a href="javascript:void(0);" class="btn btn-next font-family-Roboto-Medium">
                                    Siguiente
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
<script>

    $('#miniatura a').click(function () {
        $('a').removeClass('activo');
        $(this).addClass('activo');
        var muestra = $(this).children().attr('src');
        $('#vista').attr('src', muestra);
    });

    // Botones de navegación
    var imagenes = document.querySelectorAll('.imagen');
    var anterior = document.getElementById('anterior');
    var siguiente = document.getElementById('siguiente');
    var posicion = 0;

    // Oculta todas las imágenes
    function ocultarImagenes() {
        for (var i = 0; i < imagenes.length; i++) {
            imagenes[i].style.display = 'none';
        }
    }

    // Muestra 5 imágenes a partir de la posición actual
    function mostrarImagenes() {
        ocultarImagenes();
        for (var i = posicion; i < posicion + 5; i++) {
            if (i < imagenes.length) {
                imagenes[i].style.display = 'block';
            }
        }
    }

    // Botón Anterior
    anterior.addEventListener('click', function () {
        if (posicion > 0) {
            posicion -= 5;
            mostrarImagenes();
        }
    });

    // Botón Siguiente
    siguiente.addEventListener('click', function () {
        if (posicion + 5 < imagenes.length) {
            posicion += 5;
            mostrarImagenes();
        }
    });

    // Mostrar las primeras 5 imágenes al cargar la página
    mostrarImagenes();
</script>
<?php include 'footer.php' ?>

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
       //print_r( $detalle );
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
                                            <img src="./assets/img/slider1.png" alt="img">
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
                                            <img src="./assets/img/slider2.png" alt="img">
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
                                            <img src="./assets/img/slider3.png" alt="img">
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
            <div class="col-md-12 p-0">
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
            <div class="col-md-12 mb-3 p-0">
                <h1 class="font-family-Roboto-Medium">
                <?= $detalle['title']  ?>
                </h1>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3 p-0">
                <a href="javascript:void(0);" class="font-family-Roboto-Regular migas <?= ($tpublicacion == '2') ? 'migas2' :' migas1'; ?> ">&middot; <?= $detalle['publication_type']['type_pub'] ; ?></a>
                <a href="javascript:void(0);" class="font-family-Roboto-Regular migas"> <?= $detalle['mainCategory']['category']; ?></a> 
            </div>
            <!--div class="publication-draft-warning detalle-warn">
              <i class="fa-solid fa-circle-exclamation"></i>
              <div>
                <p class="draft-warning-text-main">Estamos revisando tu publicación para asegurar que cumpla con nuestros Términos y Condiciones.</p>
                <p class="draft-warning-text-sub">Te notificaremos tan pronto como tu aviso sea aprobado y esté listo para ser publicado. ¡Gracias por tu paciencia!</p>
              </div>
            </div-->
          
            <div class="col-md-7 col-class">

     <div class="slider-container-1">
        <div class="mySlides-back">
            <img class="slider-img-back" src="<?= $baseUrl ?>/see_image?image=<?= $detalle_img[0]["image_name"]!=null ? $detalle_img[0]["image_name"]: 'sin_producto.jpg'?>">
            <div class="numbertext1">
                <i class="fa-solid fa-camera"></i> <span id="currentSlide1">1</span> / <span id="totalSlides1"> <?= $count_imagen; ?></span>
            </div>
        </div>
     <?php  
       foreach ($detalle_img as $img)   {   ?>
            <div class="mySlides1" onclick="openModal()">
                <img class="slider-img1"  src="<?= $baseUrl ?>/see_image?image=<?= $img["image_name"]!=null ? $img["image_name"]: 'sin_producto.jpg'?>">
            </div>
     <?php  }  ?>    
      
     <a class="slider-prev1" onclick="plusSlides1(-1)">❮</a>
     <a class="slider-next1" onclick="plusSlides1(1)">❯</a>
 
     <div class="slider-img-wrapper1">
        <?php 
            $i=0;
        foreach ($detalle_img as $img)    { 
            $i++;
            ?>
         <div class="column1"> 
             <img class="demo1 cursor"  style="width:100%; object-fit: cover;" onclick="currentSlide1(<?=$i;?>)"  src="<?= $baseUrl ?>/see_image?image=<?= $img["image_name"]!=null ? $img["image_name"]: 'sin_producto.jpg'?>" alt="min galeria">
         </div>
         <?php  }  ?>    
         
         <span id="hiddenSlidesBadge" class="position-absolute translate-middle badge rounded-pill bg-primary" style="display: none;">
        <span class="visually-hidden">unread messages</span>
         </span>
     </div>
 </div>

                <div class="perfil">
                    <div class="row" style="padding-bottom: 35px;">
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 datos">
                            <h5 class="font-family-Roboto-Medium">Publicación creada por:  <?= $detalle['User']['Profile']['full_name'] ?? $detalle['User']['Profile']['razon_social']  ?> </h5>

                        </div>
                        <div
                            class="align-items-center col-xl-2 col-lg-2  col-md-2 col-sm-2 col-2 d-flex justify-content-center perfil-verificado position-relative">
                            <div class="position-relative">
                                <img src="./assets/img/profile.png" alt="user">
                                <!--div class="abs">
                                    <img src="./assets/img/profile.png" alt="verificar">
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="linea"></div>
                    <div class="row verificado">
                        <div class="col-md-6 mb-3 d-flex align-items-start justify-content-start">
                            <div class="mr-3">
                                <img src="./assets/img/office-building.png" alt="office-building">
                            </div>
                            <div>
                                <h5 class="font-family-Roboto-Medium">Cuenta de   <?= $detalle['User']['id_type_user']==1 ? 'Particular ':'Empresa'  ?> </h5>
                                <p class="font-family-Roboto-Regular">
                                    El propietario de la publicación es una <br /> <?= $detalle['User']['id_type_user']==1 ? 'persona particular. ':'empresa.'  ?>  
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 d-flex align-items-start justify-content-start">
                            <div class="mr-3">
                                <img src="./assets/img/security.png" alt="security">
                            </div>
                            <div>
                                <h5 class="font-family-Roboto-Medium">Perfil verificado</h5>
                                <p class="font-family-Roboto-Regular">
                                    El propietario verificó su identidad y es <br /> quien dice ser.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detalles">
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
                                <td><?= $detalle['product_details']['brand']; ?></td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td><?= $detalle['product_details']['model']; ?></td>
                            </tr>
                            <tr>
                                <td>Año</td>
                                <td><?= $detalle['product_details']['year']; ?></td>
                            </tr>
                            <?php if (!empty($detalle['product_details']['condition'])): ?>
                                <tr>
                            <td>Condición</td>
                                <td><?= $detalle['product_details']['condition']; ?></td>
                                </tr>
                            <?php else: ?>
                                <?php endif; ?> 
                        
                            <?php if (!empty($detalle['product_technical_characteristics']['km_traveled'])): ?>
                                <tr>
                            <td>Kilometraje</td>
                                <td><?= $detalle['product_technical_characteristics']['km_traveled']; ?></td>
                                </tr>
                            <?php else: ?>
                                <?php endif; ?>
                                <?php if (!empty($detalle['product_details']['engine_number'])): ?>
                                <tr>
                                    <td>N° de Motor</td>
                                     <td><?= $detalle['product_details']['engine_number']; ?></td>
                                </tr>
                            <?php else: ?>     
                                <?php endif; ?>
                         
                            <tr>
                                <td>Ubicación</td>
                                <td><?= $detalle['location'] ??  $detalle['product_details']['region']; ?></td>
                            </tr>
                            <tr>
                                <td>Garantía Maquinatrix</td>
                                <td>Acordar con el arrendador</td>
                            </tr>
                            <tr>
                                <td>Tipo de Vendedor</td>
                                <td> <?= $detalle['User']['id_type_user']==1 ? 'Particular ':'Empresa'  ?> </td>
                            </tr>
                            <tr>
                                <td>Despacho</td>
                                <td> <?= $detalle['product_details']['delivery'] == 'S' ? 'Sí':'No';   ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="linea mt-5 mb-5"></div>

                <div class="detalles">
                    <h2 class="font-family-Roboto-Medium">
                        Servicios de Maquinatrix que incluye
                    </h2>
                    <p class="font-family-Roboto-Regular">Esta publicación incluye para ti los siguientes servicios:
                    </p>
                    <div class="service-box-wrapper">
                    <?php if (!empty($detalle['product_rental']['rental_contract'])): ?>
                        <div class="col-1"><i class="fa-regular fa-circle-check"></i>
                            <p>Contrato Maquinatrix </p><img src="./assets/img/help-circle-outline.png" alt="pregunta">
                        </div>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php if (!empty($detalle['product_rental']['delivery'])): ?>
                        <div class="col-2"><i class="fa-regular fa-circle-check"></i>
                            <p>Despacho</p> <img src="./assets/img/help-circle-outline.png" alt="pregunta">
                        </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <div class="service-box-wrapper mt-3">
                    <?php if (!empty($detalle['product_rental']['rental_guarantee'])): ?>
                        <div class="col-1"><i class="fa-regular fa-circle-check"></i>
                            <p>Garantía Maquinatrix</p> <img src="./assets/img/help-circle-outline.png" alt="pregunta">
                        </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="siderbar sticky-top">
                    <div class="box-sider">
                        <div class="box-cotiza">
                            <span class="font-family-Roboto-Regular">Precio</span>
                            <h3 class="font-family-Roboto-Medium ">
                            <?= isset($detalle['product_details']["facipay"]) &&  $detalle['product_details']["facipay"] == 'C' ? 'Cotizar':"CLP ". $detalle['product_details']["price"]." ". "/ hora" ;?>
                               <span class="font-family-Roboto-Regular"></span>
                            </h3>
                        </div>
                        <div class="location-tx-wrapper">
                            <img src="./assets/img/location.png" alt="location">
                            <p><?=  $detalle['location'];  $detalle['product_details']['region']; ?>, <?= $detalle['product_details']['city']; ?></p>
                        </div>
                        <p class="cotiza-md-text">Contáctate con el propietario de este anuncio para realizar la
                            solicitud de cotización del producto.</p>
                        <div class="cotiza-text-wrapper">
                            <p class="cotiza-grey-text">Mensaje</p>
                          
                            <textarea name="mensaje" id="mensaje" cols="30" rows="3" class="fz-14 font-family-Roboto-Regular">¡Hola! Estoy interesado en el anuncio que vi en  Maquinatrix.</textarea>

                        </div>
                        <p class="cotiza-grey-text">Al enviar estoy aceptando los Términos y Condiciones de Maquinatrix
                        </p>
                        <button class="whatsapp-btn"><img src="./assets/img/whatsapp.png" alt="whatsapp">Contactar</button>
                                
                        <!--button class="consult-yellow-btn">Consulta por financiamiento</button>
                        <button class="consult-yellow-btn">Conoce las facilidades de pago</button-->
                        <p class="grey-heading">Sujeto a factibilidad</p>
                       
                        <div class="cotiza-grey-box">
                            <img src="./assets/img/no-money.png" alt="no-money">
                            <p>No se cobra ningún monto por Contactar por WhatsApp con el Propietario del anuncio.</p>
                        </div>
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
<div id="myModal" class="slider-modal">
    <div class="slider-modal-content">
        
        <div class="slider-container-2">
        <span class="slider-close" onclick="closeModal()">&times;</span>
         <div class="numbertext2">
            <span id="currentSlide2">1</span> / <span id="totalSlides2">6</span>
         </div>
         <?php  
            foreach ($detalle_img as $img)    {  
               ?>

            <div class="mySlides2">
                <img class="slider-img2"  src="<?= $baseUrl ?>/see_image?image=<?= $img["image_name"]!=null ? $img["image_name"]: 'sin_producto.jpg'?>">
            </div>
         <?php  }  ?>    
 
     <a class="slider-prev2" onclick="plusSlides2(-1)">❮</a>
     <a class="slider-next2" onclick="plusSlides2(1)">❯</a>
 
     <div class=" slider-img-wrapper2">
     <?php 
            $i=0;
            foreach ($detalle_img as $img)    { 
              $i++;
               ?>
         <div class="column2">
             <img class="demo2 cursor"  src="<?= $baseUrl ?>/see_image?image=<?= $img["image_name"]!=null ? $img["image_name"]: 'sin_producto.jpg'?>" style="width:100%" onclick="currentSlide2(<?=$i;?>)" alt="The Woods">
         </div>
         <?php  }  ?>    
         
     </div>
 </div>
    </div>
</div>

<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#miniatura a').click(function () {
        $('a').removeClass('activo');
        $(this).addClass('activo');
        var muestra = $(this).children().attr('src');
        $('#vista').attr('src', muestra);
    });

    var separator = ' - ', dateFormat = 'DD/MM/YYYY';
    var options = {
        autoUpdateInput: false,
        autoApply: true,
        locale: {
            format: dateFormat,
            separator: separator,
            applyLabel: 'Confirmar',
            // cancelLabel: '取消'
            cancelLabel: 'Borrar fechas'
        },
        minDate: moment().add(1, 'days'),
        maxDate: moment().add(359, 'days'),
        opens: "left"
    };


    $('[data-datepicker=separateRange]')
        .daterangepicker(options)
        .on('apply.daterangepicker', function (ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

            var mainName = this.name.replace('value_from_start_', '');
            if (boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
                $(this).closest('form').find('[name=value_from_end_' + mainName + ']').blur();
            }

            $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val(picker.startDate.format(dateFormat));
            $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val(picker.endDate.format(dateFormat));

            $(this).trigger('change').trigger('keyup');
        })
        .on('show.daterangepicker', function (ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
            var mainName = this.name.replace('value_from_start_', '');
            if (boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
            }

            var startDate = $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val();
            var endDate = $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val();

            $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
            $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');

            if (boolEnd) {
                $('[name=daterangepicker_end]').focus();
            }
        });


</script>

<script>
let slideIndex1 = 1;
let slideIndex2 = 1;

showSlides1(slideIndex1);
showSlides2(slideIndex2);

function plusSlides1(n) {
    showSlides1(slideIndex1 += n);
}

function currentSlide1(n) {
    showSlides1(slideIndex1 = n);
}

function showSlides1(n) {
    let slides = document.getElementsByClassName("mySlides1");
    let currentSlideElement = document.getElementById("currentSlide1");
    let totalSlidesElement = document.getElementById("totalSlides1");
    let thumbnails = document.getElementsByClassName("demo1");

    if (n > slides.length) { slideIndex1 = 1 }
    if (n < 1) { slideIndex1 = slides.length }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        thumbnails[i].className = thumbnails[i].className.replace(" active", "");
    }

    slides[slideIndex1 - 1].style.display = "block";
    thumbnails[slideIndex1 - 1].className += " active";

    currentSlideElement.innerText = slideIndex1;
    totalSlidesElement.innerText = slides.length;
}

function openModal() {
    document.getElementById('myModal').style.display = "block";
   
}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

function plusSlides2(n) {
    showSlides2(slideIndex2 += n);
}

function currentSlide2(n) {
    showSlides2(slideIndex2 = n);
}

function showSlides2(n) {
    let slides2 = document.getElementsByClassName("mySlides2");
    let currentSlideElement = document.getElementById("currentSlide2");
    let thumbnails = document.getElementsByClassName("demo2");
    let totalSlidesElement = document.getElementById("totalSlides2");

    if (n > thumbnails.length) { slideIndex2 = 1 }
    if (n < 1) { slideIndex2 = thumbnails.length }

    // Dynamically set the total number of slides
    totalSlidesElement.innerText = thumbnails.length;

    for (let i = 0; i < slides2.length; i++) {
        slides2[i].style.display = "none";
        thumbnails[i].className = thumbnails[i].className.replace(" active2", "");
    }

    slides2[slideIndex2 - 1].style.display = "block";
    thumbnails[slideIndex2 - 1].className += " active2";

    currentSlideElement.innerText = slideIndex2;
}

</script>

<script>
    let isDown = false;
    let startX;
    let scrollLeft;
    const slider = document.querySelector('.slider-img-wrapper2');

    const end = () => {
        isDown = false;
        slider.classList.remove('active');
    }

    const start = (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX || e.touches[0].pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    }

    const move = (e) => {
        if (!isDown) return;

        e.preventDefault();
        const x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
        const dist = (x - startX);
        slider.scrollLeft = scrollLeft - dist;
    }

    (() => {
        slider.addEventListener('mousedown', start);
        slider.addEventListener('touchstart', start);

        slider.addEventListener('mousemove', move);
        slider.addEventListener('touchmove', move);

        slider.addEventListener('mouseleave', end);
        slider.addEventListener('mouseup', end);
        slider.addEventListener('touchend', end);
    })();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    updateHiddenSlidesBadge();
    window.addEventListener('resize', updateHiddenSlidesBadge);
});

function updateHiddenSlidesBadge() {
    const sliderWrapper = document.querySelector('.slider-img-wrapper1');
    const columnContainer = document.querySelector('.slider-img-wrapper1');
    const badge = document.getElementById('hiddenSlidesBadge');

    const totalColumns = columnContainer.querySelectorAll('.column1').length;
    const visibleColumns = countVisibleColumns(sliderWrapper, columnContainer);

    const hiddenColumns = totalColumns - visibleColumns;
    
    if (hiddenColumns > 0) {
        badge.style.display = 'flex';
        badge.innerText = `+${hiddenColumns}`;
    } else {
        badge.style.display = 'none';
    }
}

function countVisibleColumns(sliderWrapper, columnContainer) {
    const sliderWidth = sliderWrapper.offsetWidth;
    const columnWidth = columnContainer.querySelector('.column1').offsetWidth;
    
    return Math.floor(sliderWidth / columnWidth);
}

</script>

<script>
$(document).ready(function() {  
   
 var url = '<?=$baseUrl?>/visity_public?type=1&id_product='+<?=$id?>;  
   $.ajax({
      url: url,
      method: 'PUT', 
      contentType: "application/json",    
      success: function(res) {
          
      },
      error: function(error) {
        
      console.error('Error al enviar los datos actualizados');
      }
  });

});

$('.whatsapp-btn').click(function () {  

    var type ='<?=$tpublicacion?>';
    var id = '<?=$id?>';
    var name = '<?=$detalle['title'] ?>';
    var url = '<?=$url_publi?>'; 
    <?php $baseUrl = getenv('URL_API'); ?>
    <?php $contact = getenv('WHATSAPP');   
    
    ?>
    var url = '<?=$baseUrl?>/visity_public?id_product='+id;  
            $.ajax({
                url: url,
                method: 'PUT', 
                contentType: "application/json",    
                success: function(res) { 
                },
                error: function(error) { 
                console.error('Error al enviar los datos actualizados');
                }
            });
  
      var url1 = url+"/detalle.php?typep="+type+"&id=" + encodeURIComponent(id) + "&" + encodeURIComponent(name); 
      var text = document.getElementById("mensaje")?.value; 
      var text_ini = '¡Hola! Estoy interesado en el anuncio que vi en  Maquinatrix.';
      
      if(text!=='' && text){
          text_ini= text;
      }
      var redir = 'https://api.whatsapp.com/send?phone=<?=$contact?>&text=' + encodeURIComponent(text_ini) + ' ' + id + ' ' + encodeURIComponent(name) +
        '%20aquí:%20' + encodeURIComponent(url1);
        window.open(redir, '_blank');
    });
 
</script>
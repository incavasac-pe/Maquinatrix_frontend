<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<!-- <?php

  
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
$host = $_SERVER['HTTP_HOST']; 
$uri = $_SERVER['REQUEST_URI']; 
$url_publi = $protocol . '://' . $host; 
  
    $baseUrl = getenv('URL_API'); 
    $contact = getenv('WHATSAPP');
 
    $msg_list_public = '';
    $categoria = '';
    $tpublicacion = '';
    $price_min = '';
    $price_max = ''; 
    $page = '';
    $currentRows = '';
    
    $count_category = 0;
    $url12 = $baseUrl.'/list_category'; 
    $response1= file_get_contents($url12);
    if ($response1 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response1, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $categories = $data['data'];
           $count_category = $data['count'];
       } else {
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
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
    }  

     $param='';
     $search='';
 
      if (isset($_GET['buscar'])&& $_GET['buscar']!='') {
         $search = $_GET['buscar'];
         $param = "&search=".urlencode($search); 
      }
        if (isset($_GET['buscar-compra'])&& $_GET['buscar-compra']!='') {
         $search1 = $_GET['buscar-compra'];
         $param = "&search=".urlencode($search1); 
         }
   
        if (isset($_POST['tipo'])) {
            $tipoSeleccionado = $_POST['tipo'];
            $param = $param ."&category=".$tipoSeleccionado ; 
         }  
        if (isset($_GET['category']) && $_GET['category']!='') { //categorias de las publicaciones ej-repuest
          $categoria = $_GET['category'];
          $param = $param ."&category=".$categoria ; 
       }  
         if (isset($_GET['typep'])) { //tipo publicacion arredar o comprar
          $tpublicacion = $_GET['typep'];
          $param = $param ."&tpublicacion=".$tpublicacion ; 
       }   
         
        if (isset($_GET['price-min'])) {
             $price_min  = $_GET['price-min'];
             $param = $param ."&price_min=".$price_min ; 
         } 
        if (isset($_GET['price-max'])) {
            $price_max  = $_GET['price-max'];
            $param = $param ."&price_max=".$price_max ; 
         } 
         if (isset($_GET['region']) && $_GET['region']!='') {
            $region  = $_GET['region'];
            $param = $param ."&region=".urlencode($region);
         } 
         if (isset($_GET['page']) && $_GET['page']!='') {
            $currentPage  = $_GET['page'];      
         } 
      $count_pub = 0;
      $url = $baseUrl.'/list_publications?limit=1000'.$param;
 
       $response = file_get_contents($url);
      if ($response !== false) {
          // Decodificar la respuesta JSON
          $data = json_decode($response, true);
          if (!$data['error']) {
              // Obtener la lista de publicaciones
              $list_publications = $data['data']; 
    
            $count_pub = $data['count'];
            $rowsPerPage = 10;
            
            // Paginar los datos
            $indexOfLastRow = $currentPage * $rowsPerPage;
            $indexOfFirstRow = $indexOfLastRow - $rowsPerPage;
            $currentRows = array_slice($list_publications, $indexOfFirstRow, $indexOfLastRow);
            $totalPages = ceil(count($list_publications) / $rowsPerPage);

          } else {              
              $msg_list_public =  $data['msg'];
          }
      } else {
          echo 'Error al realizar la solicitud a la API';
      }    
 
   ?> -->
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
                                                Financiamiento para tus Compras
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
            <div class="col-md-12">
                <ul class="nav-migas">
                    <li>
                        <a href="index.php" class="font-family-Roboto-Regular">Inicio</a>
                    </li>
                    <li class="font-family-Roboto-Regular"> / <?= ($tpublicacion == '2') ? 'Comprar' :' Arrendar'; ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="bg-general bg-tienda">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h3 class="font-family-Roboto-Medium titulo-principal">
                    Palabra Buscada <?= $search ?>
                </h3>
                <p class="mb-0 font-family-Roboto-Regular titulo-principal-adorno">
                    <?=$count_pub?> resultados de búsqueda
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="busqueda">
               <form  >
                    <div class="">
                        <h3 class="font-family-Roboto-Medium">Filtros de Búsqueda</h3>
                        <p class="font-family-Roboto-Regular">
                            Selecciona el tipo de búsqueda para que se desplieguen todos los filtros.
                        </p>
                    </div>
                    <p class="titulo-tienda">
                        <a href="#" onclick="filtroFooter('1')" class="font-family-Roboto-Medium mb-3 <?= ($tpublicacion == '1') ? 'activo' :''; ?>">Arrendar</a>
                        <a href="#" onclick="filtroFooter('2')" class="font-family-Roboto-Medium mb-3 <?= ($tpublicacion == '2') ? 'activo' :''; ?>">Comprar</a>
                    </p>
                    <div class="formulario-busqueda">
                        <div class="form-group">
                            <input type="text" name="buscar" id="buscar" value="<?=$search?>" placeholder="¿Qué buscas?">
                        </div>
                        <div class="form-group">
                        <?php                                            
                                if ($count_regiones > 0) {
 
                                    echo '<select class="form-control font-family-Inter-Medium"  id="region" name="region">';
                                    echo '<option value="">¿En qué región?</option>'; 
                                    foreach ($regiones as $reg) { 
                                        echo '<option value="' . $reg . '"'; 
                                        if (isset($region) && $region == $reg) {
                                            echo ' selected';
                                        }  
                                        echo '>' . $reg. '</option>';
                                    }
                                    echo '</select>';
                                }  
                            ?>
                         </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium">Condición</h4>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                          <?php  
                                if ($count_category > 0) {
                                    foreach ($categories as $categorie) {
                                        echo '<div class="form-group mb-1">';
                                        echo '<div class="custom-control custom-radio">';
                                        
                                        $id = $categorie['id_category'];
                                        $categoryName = $categorie['category'];
                                        
                                        echo '<input type="radio" class="custom-control-input" id="' . $categoryName . '" name="category" value="' . $id . '"';
                                        
                                        if ($id == $categoria) {
                                            echo ' checked';
                                        }
                                        
                                        echo '>';
                                        echo '<label class="custom-control-label font-family-Roboto-Regular" for="' . $categoryName . '">' . $categoryName . '</label>';
                                        echo '</div></div>';
                                    }
                                }  ?> 
                         
                              </div>
                            <div class="mt-5">                        
                           <button type="button"  onclick="buscarTienda('<?=$tpublicacion?>');" class="btn-filtros font-family-Roboto-Medium">
                               <i class="far fa-search"></i> Buscar
                           </button>                      
                        </div>
                      </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <p class="titulo-tienda text-right" id="">
                            <span class="mr-3">Ordenar por:</span>
                            
                            <a href="#" onclick="filtrotienda('<?=$tpublicacion?>','<?=$categoria?>','price-min=1','<?=$search?>')"  id="price-min" class="font-family-Roboto-Medium mb-3 <?= ($price_min == '1') ? 'activo' :''; ?>">Precio más bajo primero</a>
                            <a href="#" onclick="filtrotienda('<?=$tpublicacion?>','<?=$categoria?>','price-max=1','<?=$search?>')"  id="price-max" class="font-family-Roboto-Medium mb-3 <?= ($price_max == '1') ? 'activo' :''; ?>">Precio más alto primero</a>

                        </p>
                        <p> <?= $msg_list_public ?> </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="all">
                      <?php   
                      if($count_pub > 0){  
                             foreach ($currentRows as $pub) {  ?>
                            <a href="detalle.php?typep=<?=$tpublicacion ?>&id=<?= $pub['id_product'] ?>&<?= ($tpublicacion == '2') ? 'comprar' :' arrendar'; ?>">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative image-container">
                                     <img src="<?=$baseUrl?>/see_image?image=<?= isset($pub["product_images"][0]["image_name"])  ? $pub["product_images"][0]["image_name"]: 'sin_producto.jpg'?>" alt="producto">
                                    </div>
                                    <div class="box-description w-100">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="font-family-Roboto-Regular">
                                                    <?= $pub['title']  ?>
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold"> <?= isset($pub['product_details']["price"])? $pub['product_details']["price"]:'0' ?></strong>
                                                </h3>
                                            </div>
                                            <div class="col-md-12 mini-detalles d-flex align-items-center justify-content-between">
                                                <div class="ubicacion font-family-Roboto-Regular">
                                                    <i class="fal fa-map-marker-alt"></i>   <?= $pub['location']  ?>
                                                </div> 
                                                <a onclick="whats('<?=$tpublicacion?>','<?=$pub['id_product']?>','<?=$pub['title']?>','<?=$url_publi?>')"  href="#" class="btn-contacto font-family-Roboto-Medium">
                                                <i class="fab fa-whatsapp"></i> <b class="icono_mobile">Contactar</b>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php  } }  ?>                   
                        </div>
                        <div class="price-minaaa" style="display: none;">
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="img/detalle-pro.png" alt="producto">
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo Construcción
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000 / hora</strong>
                                                </h3>
                                            </div>
                                            <div class="col-md-12 mini-detalles d-flex align-items-center justify-content-between">
                                                <div class="ubicacion font-family-Roboto-Regular">
                                                    <i class="fal fa-map-marker-alt"></i> San Isidro, Perú
                                                </div>
                                                <a href="https://api.whatsapp.com/send?phone=<?=$contact?>&text=¡Hola! Estoy interesado en el anuncio# <?= $detalle['$id']?> que vi en el  <?= $detalle['title']  ?> Maquinatrix." class="btn-contacto font-family-Roboto-Medium">
                                                    <i class="fab fa-whatsapp"></i> Contactar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> 
                    <?php   
                      if($count_pub > 0){   ?>    
                    <div class="col-md-12 mt-5">
                        <ul class="align-items-center font-family-Inter-Regular justify-content-end m-auto pagination">
                            <li class="page-item"><a class="page-link" href="tienda.php?page=<?= $currentPage - 1 ?>"<?= $param?>>Anterior</a></li>
                            <?php
                                    for ($page = 1; $page <= $totalPages; $page++) {
                                        echo '<li class="page-item' . ($page == $currentPage ? ' active' : '') . '"><a class="page-link" href="tienda.php?page=' . $page . ''.$param.'">' . $page . '</a></li>';
                                    }
                            ?>
                            <li class="page-item"><a class="page-link" href="tienda.php?page=<?= $currentPage + 1 ?><?= $param?>">Siguiente</a></li>
                        </ul>
                    </div>
                    <?php    }  ?>    
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<script>
    $('#all').click(function () {
        $('.all').css('display','block');
        $('.recent').css('display','none');
        $('.price-min').css('display','none');
    });
    $('#price-min').click(function () {
        $('.all').css('display','none');
        $('.recent').css('display','none');
        $('.price-min').css('display','block');
    })
 
</script>

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
<section class="pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-migas">
                    <li>
                        <a href="#" class="font-family-Roboto-Regular">Inicio</a>
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
                    Palabra Buscada  <?= $search ?>
                </h3>
                <p class="mb-0 font-family-Roboto-Regular titulo-principal-adorno">
                <?=$count_pub?> 84745 resultados de búsqueda
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="busqueda">
                    <div class="">
                        <h3 class="font-family-Roboto-Medium">Filtros de Búsqueda</h3>
                        <p class="font-family-Roboto-Regular">
                            Selecciona el tipo de búsqueda para que se desplieguen todos los filtros.
                        </p>
                    </div>
                    <a href="javascript:void('0');" id="Arrendar" onclick="filtroFooter('1')"
                        class="font-family-Roboto-Medium mb-3 <?= ($tpublicacion == '1') ? 'activo' :''; ?> titulo-filter-btn">Arrendar</a>
                    <a href="javascript:void('0');" id="Comprar" onclick="filtroFooter('2')"
                        class="font-family-Roboto-Medium mb-3 <?= ($tpublicacion == '2') ? 'activo' :''; ?> titulo-filter-btn">Comprar</a>
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
                        <div class="form-group group">
                            <select class="form-control" id="maquinaria" name="maquinaria">
                                <option class="d-none" selected>Maquinaria y vehículos</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group group">
                            <select class="form-control" id="industria" name="industria">
                                <option class="d-none" selected>Industría</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group group">
                            <select class="form-control" id="maquinaria" name="maquinaria">
                                <option class="d-none" selected>Tipo de Maquinaria</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium ">Detalles de producto</h3>
                    </div>
                    <div class="formulario-busqueda">
                        <div class="form-group group">
                            <select class="form-control" id="marca" name="marca">
                                <option class="d-none" selected>Marca</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="form-group group">
                            <select class="form-control" id="modelo" name="modelo">
                                <option class="d-none" selected>Modelo</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium input-sm-heading">Año de modelo</h4>
                    </div>
                    <div class="campos-min-max font-family-Roboto-Regular">
                        <div class="form-check-inline">
                            <input type="text" name="desde" id="desde" placeholder="Desde">
                        </div>
                        <div class="form-check-inline">-</div>
                        <div class="form-check-inline mr-0">
                            <input type="text" name="hasta" id="hasta" placeholder="Hasta">
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium input-sm-heading">Condición</h4>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="nuevo" name="tipo">
                                <label class="custom-control-label font-family-Roboto-Regular" for="nuevo">Nuevo</label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="usado" name="tipo">
                                <label class="custom-control-label font-family-Roboto-Regular" for="usado">Usado</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium input-sm-heading">Odómetraje</h4>
                        <p class="font-family-Roboto-Regular">
                            En que unidad lo quieres medir?
                        </p>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="kilometraje" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular"
                                    for="kilometraje">Kilometraje</label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="horometro" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular" for="horometro">Horómetro
                                    (Hrs)</label>
                            </div>
                        </div>
                        <div class="campos-min-max font-family-Roboto-Regular mt-3">
                            <div class="form-check-inline">
                                <input type="text" name="kdesde" id="kdesde" placeholder="Desde">
                            </div>
                            <div class="form-check-inline">-</div>
                            <div class="form-check-inline mr-0">
                                <input type="text" name="khasta" id="khasta" placeholder="Hasta">
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <p class="titulo-tienda text-right" id="">
                            <span class="mr-3">Ordenar por:</span>

                            <a href="javascript:void('0');" id="recent"
                                class="font-family-Roboto-Medium mb-3 titulo-filter-btn">Más
                                recientes</a>
                            <a href="javascript:void('0');" id="price-min"
                                class="font-family-Roboto-Medium mb-3 titulo-filter-btn">Precio
                                más bajo primero</a>
                        </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="all">
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="./assets/img/tienda.png" alt="producto">
                                        <div class="abs">
                                            <span class="font-family-Roboto-Regular">Oportunidad</span>
                                        </div>
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                    <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/location-grey.png" alt="location" />
                                                            San Isidro
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            84.482 km
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            Julio 2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mini-detalles">
                                                <p>Incluye:</p>
                                                <ul>
                                                    <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i>Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="./assets/img/tienda.png" alt="producto">
                                        <div class="abs">
                                            <span class="font-family-Roboto-Regular">Oportunidad</span>
                                        </div>
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                    <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/location-grey.png" alt="location" />
                                                            San Isidro
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            84.482 km
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            Julio 2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mini-detalles">
                                                <p>Incluye:</p>
                                                <ul>
                                                    <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i>Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="./assets/img/tienda.png" alt="producto">
                                        <div class="abs">
                                            <span class="font-family-Roboto-Regular">Oportunidad</span>
                                        </div>
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                    <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/location-grey.png" alt="location" />
                                                            San Isidro
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            84.482 km
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            Julio 2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mini-detalles">
                                                <p>Incluye:</p>
                                                <ul>
                                                    <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i>Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="./assets/img/tienda.png" alt="producto">
                                        <div class="abs">
                                            <span class="font-family-Roboto-Regular">Oportunidad</span>
                                        </div>
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                    <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/location-grey.png" alt="location" />
                                                            San Isidro
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                            <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                        </p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            84.482 km
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                            Julio 2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mini-detalles">
                                                <p>Incluye:</p>
                                                <ul>
                                                    <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix
                                                    </li>
                                                    <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i>Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i>Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="recent" style="display: none;">
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-min" style="display: none;">
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="./assets/img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/location-grey.png" alt="location" /> San
                                                        Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-grey mb-1">
                                                        <img src="./assets/img/bus.png" alt="bus" /> PC200, 2019
                                                    </p>
                                                </div>

                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles-bold mb-1">
                                                        Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i> Garantía Maquinatrix</li>
                                                <li><i class="fa-regular fa-circle-check"></i> Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-container">
    <button class="pagination-button prevNext" id="prev" disabled="">
    <i class="fa-solid fa-chevron-left"></i>
    </button>
    <div class="pagination-links"></div>
    <button class="pagination-button prevNext" id="next">
    <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<script>
    $('#all').click(function () {
        $('.all').css('display', 'block');
        $('.recent').css('display', 'none');
        $('.price-min').css('display', 'none');
    });
    $('#recent').click(function () {
        $('.all').css('display', 'none');
        $('.recent').css('display', 'block');
        $('.price-min').css('display', 'none');
    });
    $('#price-min').click(function () {
        $('.all').css('display', 'none');
        $('.recent').css('display', 'none');
        $('.price-min').css('display', 'block');
    })
    $('#Arrendar').click(function () {
        $('.all').css('display', 'none');
        $('.recent').css('display', 'block');
        $('.price-min').css('display', 'none');
    });
    $('#Comprar').click(function () {
        $('.all').css('display', 'none');
        $('.recent').css('display', 'none');
        $('.price-min').css('display', 'block');
    })
</script>

<script>
    const prevBtn = document.querySelector("#prev");
    const nextBtn = document.querySelector("#next");
    const linksContainer = document.querySelector(".pagination-links");

    const totalPages = 5; // Adjust this to the total number of pages
    let currentStep = 0;

    const updatePagination = () => {
        const startBtn = currentStep === 0;
        const endBtn = currentStep === totalPages - 1;

        prevBtn.disabled = startBtn;
        nextBtn.disabled = endBtn;

        const linksHTML = Array.from({ length: totalPages }, (_, index) => {
            const pageNum = index + 1;
            const isActive = currentStep === index ? 'active' : '';
            return `<a href="#" class="pagination-link ${isActive}" data-index="${index}">${pageNum}</a>`;
        }).join('');

        linksContainer.innerHTML = linksHTML;
    };

    const setPage = (index) => {
        currentStep = index;
        updatePagination();
    };

    const handlePageClick = (e) => {
        e.preventDefault();
        const index = parseInt(e.target.getAttribute('data-index'));
        setPage(index);
    };

    const handlePrevNextClick = (e) => {
        e.preventDefault();
        currentStep += e.target.id === "next" ? 1 : -1;
        setPage(currentStep);
    };

    const createPagination = () => {
        updatePagination();

        linksContainer.addEventListener('click', handlePageClick);
        prevBtn.addEventListener('click', handlePrevNextClick);
        nextBtn.addEventListener('click', handlePrevNextClick);
    };

    createPagination();
</script>
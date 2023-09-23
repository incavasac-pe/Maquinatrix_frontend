<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 
  
$baseUrl = getenv('URL_API'); 
$contact = getenv('WHATSAPP');

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
    

     $param='';
     $search='';
      if (isset($_POST['buscar'])&& $_POST['buscar']!='') {
         $search = $_POST['buscar'];
         $param = "&search=".$search; 
      }
        if (isset($_POST['buscar-compra'])&& $_POST['buscar-compra']!='') {
         $search1 = $_POST['buscar-compra'];
         $param = "&search=".$search1; 
      }
       if (isset($_POST['modelo_arrendar'])&& $_POST['modelo_arrendar']!='0') {
         $tpublicacion = $_POST['modelo_arrendar'];         
         $param = $param ."&tpublicacion=".$tpublicacion ;
         $category = $_POST['modelo_arrendar'];
         $param = $param ."&category=".$category ;
      }
       if (isset($_POST['modelo_comprar'])&& $_POST['modelo_comprar']!='0') {      
         $tpublicacion = $_POST['modelo_comprar'];         
         $param = $param ."&tpublicacion=".$tpublicacion ;
         $category = $_POST['modelo_comprar'];
         $param = $param ."&category=".$category ;
       }
        if (isset($_POST['tipo'])) {
            $tipoSeleccionado = $_POST['tipo'];
            $param = $param ."&category=".$tipoSeleccionado ; 
         }  
         
       if (isset($_GET['price-min'])) {
            $price  = $_GET['price-min'];
            $param = $param ."&price_min=".$price ; 
         } 
        if (isset($_GET['price-max'])) {
            $price  = $_GET['price-max'];
            $param = $param ."&price_max=".$price ; 
         } 
  
      $count_pub = 0;
      $url = $baseUrl.'/list_publications?limit=10'.$param;
      
      $response = file_get_contents($url);
      if ($response !== false) {
          // Decodificar la respuesta JSON
          $data = json_decode($response, true);
          if (!$data['error']) {
              // Obtener la lista de publicaciones
              $list_publications = $data['data'];
              
           $count_pub = $data['count'];
          } else {
              echo 'Error: ' . $data['msg'];
          }
      } else {
          echo 'Error al realizar la solicitud a la API';
      }      
   ?>
<section class="pt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-migas">
                    <li>
                        <a href="index.php" class="font-family-Roboto-Regular">Inicio</a>
                    </li>
                    <li class="font-family-Roboto-Regular"> / Comprar</li>
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
                    Palabra Buscada <?=$search?>
                </h3>
                <p class="mb-0 font-family-Roboto-Regular titulo-principal-adorno">
                    <?=$count_pub?>   resultados de búsqueda
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="busqueda">
               <form action="tienda.php"  method="POST" >
                    <div class="">
                        <h3 class="font-family-Roboto-Medium">Filtros de Búsqueda</h3>
                        <p class="font-family-Roboto-Regular">
                            Selecciona el tipo de búsqueda para que se desplieguen todos los filtros.
                        </p>
                    </div>
                    <p class="titulo-tienda">
                        <a href="javascript:void('0');" class="font-family-Roboto-Medium mb-3">Arrendar</a>
                        <a href="javascript:void('0');" class="font-family-Roboto-Medium mb-3">Comprar</a>
                    </p>
                    <div class="formulario-busqueda">
                        <div class="form-group">
                            <input type="text" name="buscar" id="buscar" value="<?=$search?>" placeholder="¿Qué buscas?">
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium">Condición</h4>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                          <?php                                            
                                     if ($count_category > 0) {  
                                        
                                         foreach ($categories as $categorie) {
                                             echo ' <div class="form-group mb-1">';
                                             echo '<div class="custom-control custom-radio">'; 
                                             $id = $categorie['id_category'];
                                             $category = $categorie['category']; 
                                             echo ' <input type="radio" class="custom-control-input" id="' . $category . '" name="tipo" value="' . $id . '">';
                                             echo '<label class="custom-control-label font-family-Roboto-Regular" for="' . $category . '">' . $category . '</label>';
                                             echo '</div> </div>';   
                                         }                                        
                                     }  
                                 ?> 
                         
                              </div>
                            <div class="mt-5">                        
                           <button type="submit" class="btn-filtros font-family-Roboto-Medium">
                             <img src="img/setting.svg" alt="setting">  Más filtros
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
                            <a href="tienda.php?price-min=1" id="price-min" class="font-family-Roboto-Medium mb-3 <?php isset($_GET['price-min'])  ? 'activo':'' ?>">Precio más bajo primero</a>
                            <a href="tienda.php?price-max=1" id="price-max" class="font-family-Roboto-Medium mb-3 <?php isset($_GET['price-max']) && $_GET['price-max'] =='1' ?  'activo':'' ?>">Precio más alto primero</a>
                        </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="all">
                      <?php   
                      if($count_pub > 0){  
                             foreach ($list_publications as $pub) { ?>
                            <a href="detalle.php?id=<?= $pub['id_product'] ?>">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                     <img src="<?=$baseUrl?>/see_image?image=<?= isset($pub["product_images"][0]["image_name"])  ? $pub["product_images"][0]["image_name"]: 'sin_producto.jpg'?>" alt="producto">
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="font-family-Roboto-Regular">
                                                    <?= $pub['title']  ?>
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP <?= isset($pub['product_details']["price"])? $pub['product_details']["price"]:'0' ?></strong>
                                                </h3>
                                            </div>
                                            <div class="col-md-12 mini-detalles d-flex align-items-center justify-content-between">
                                                <div class="ubicacion font-family-Roboto-Regular">
                                                    <i class="fal fa-map-marker-alt"></i>    <?= $pub['location']  ?>
                                                </div>
                                                <a href="https://api.whatsapp.com/send?phone=<?=$contact?>&text=¡Hola! Estoy interesado en el anuncio# <?= $pub['id_product']?> que vi en el  <?= $pub['title']  ?> Maquinatrix."class="btn-contacto font-family-Roboto-Medium">
                                                    <i class="fab fa-whatsapp"></i> Contactar
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
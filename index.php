<?php// include 'header.php' ?>
<?php include 'menu.php' ?>  
<?php   
include('config.php'); 

if(isset($_GET["code"]))
{

$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);//print_r($token);

 if(!isset($token['error'])) {
 
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client); 
  $response = $google_service->userinfo->get();
   
        if(isset($_SESSION['type']) && ($_SESSION['type'] == 1 || $_SESSION['type'] == 2)){
            //para registro
            $_SESSION['email']= $response['email']; 
            $_SESSION['firstname']= urlencode($response['given_name']);
            $_SESSION['lastname'] = urlencode($response['family_name']); 
        
            $urlRegister = 'create_session_portal_redes.php?register=true'; 
            echo '<meta http-equiv="refresh" content="0; url=' . $urlRegister . '">';
    
    }else{
                 //para login
        if(!empty($response['email']))
            {
             $_SESSION['email'] = $response['email'];
              $url = 'create_session_portal_redes.php?validate=true&email='.$response['email'];
             echo '<meta http-equiv="refresh" content="0; url=' . $url . '">';
            } 
        }
 }
}

?>
<?php 
$baseUrl = getenv('URL_API');

function shuffleArray($array) {
    $keys = array_keys($array);
    shuffle($keys);
    $shuffledArray = array();
    foreach ($keys as $key) {
        $shuffledArray[$key] = $array[$key];
    }
    return $shuffledArray;
}

function cortarString($texto) {
    if (strlen($texto) > 23) {
        $textoCortado = substr($texto, 0, 30);
        $textoCortado .= "...";
        return $textoCortado;
    } else {
        return $texto;
    }
}
 $count_category = 0;
   
    $url12 = $baseUrl.'/list_category';
    $response = file_get_contents($url12);
    if ($response !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $categories = $data['data'];
           $count_category = $data['count'];
       } else {
             'Error: ' . $data['msg'];
       }
    } else {
          'Error al realizar la solicitud a la API';
    }
    

     
      $count_pub = 0;
      $url = $baseUrl.'/list_publications?limit=5&status_id=6'; 
    
      $response1 = file_get_contents($url);
      if ($response1 !== false) {
          // Decodificar la respuesta JSON
          $data = json_decode($response1, true);
          if (!$data['error']) {
              // Obtener la lista de publicaciones (se mezclan y se corta a  4 para mostrar en el home)
              $data_origin = shuffleArray($data['data']);
              $list_publications = array_slice($data_origin, 0, 4);
 
           $count_pub = $data['count'];
          } else {
                'Error: ' . $data['msg'];
          }
      } else {
          echo 'Error al realizar la solicitud a la API';
      }  
      #
   ?>
<section class="bg-slider d-flex align-items-center justify-content-start">
    <div class="container"> 
        <div class="row">
            <div class="col-md-7">
                <h2 class="font-family-Roboto-Bold">Arrienda y compra tu maquinaria ideal</h2>
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-family-Roboto-Bold" data-toggle="tab" href="#arrendar"
                            style="border-radius: 10px 0 0 0;">
                            Arrendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-family-Roboto-Bold" data-toggle="tab" href="#comprar"
                            style="border-radius: 0 10px 0 0">
                            Comprar
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="arrendar" class="container tab-pane active">
                        <form class="fomulario-search row">
                            <div class="col-md-3 bg-white border-lado">
                                <?php
                                if ($count_category > 0) {
                                    echo '<select class="form-control font-family-Roboto-Regular"  id="category" name="category">';
                                    echo '<option value="">Seleccionar</option>';
                                    foreach ($categories as $categorie) {
                                        $id = $categorie['id_category'];
                                        $category = $categorie['category'];
                                        echo '<option value="' . $id . '">' . $category . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>

                            <div class="col-md-7 bg-white">
                                <input type="text" name="buscar" id="buscar" placeholder="¿Qué buscas?"
                                    class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="buscarInicial('1')"
                                    class="btn btn-amarillo font-family-Roboto-Medium">
                                    <i class="fa-solid fa-magnifying-glass"></i> Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="comprar" class="container tab-pane fade">
                        <form class="fomulario-search row">
                            <div class="col-md-3 bg-white border-lado">
                                <?php
                                if ($count_category > 0) {
                                    echo '<select class="form-control font-family-Roboto-Regular"  id="category_compra" name="category_compra">';
                                    echo '<option value="">Seleccionar</option>';
                                    foreach ($categories as $categorie) {
                                        $id = $categorie['id_category'];
                                        $category = $categorie['category'];
                                        echo '<option value="' . $id . '">' . $category . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="col-md-7 bg-white">
                                <input type="text" name="buscar-compra" id="buscar-compra" placeholder="¿Qué buscas?"
                                    class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="buscarInicial('2');"
                                    class="btn btn-amarillo font-family-Roboto-Medium">
                                    <i class="far fa-search"></i> Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-top-box">
    <div class="container">
        <div class="sub-container">
            <div class="first-box">
                <p class="main-heading">Arrienda fácil y seguro</p>
                <p class="sub-heading">con Maquinatrix</p>
            </div>
            <div class="second-box">

                <img src="./assets/img/garuntee.png" alt="garuntee">

                <div class="text-wrapper">
                    <p class="main-heading">Garantía Maquinatrix</p>
                    <p class="sub-heading">Seguridad para todos</p>
                </div>

            </div>
            <div class="second-box">
                <img src="./assets/img/pay.png" alt="garuntee">
                <div class="text-wrapper">
                    <p class="main-heading">Paga Ahora o Después</p>
                    <p class="sub-heading">Flexibilidad en los pagos</p>
                </div>

            </div>
            <div class="second-box">
                <img src="./assets/img/finance.png" alt="garuntee">
                <div class="text-wrapper">
                    <p class="main-heading">Financiamiento</p>
                    <p class="sub-heading">Opciones más accesibles</p>
                </div>

            </div>
            <hr/>
            <div class="third-box">

                <button class="arrow-wrapper" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="fa-solid fa-arrow-right"></i></button>
                <p class="sub-heading" style="margin-top: 5px;" style="margin-top: 5px;">Ver más</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-general">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(assets/img/retroexcavadora.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Lo mejor en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Maquinaria y Equipos
                        </h5>
                    </div>
                    <div>
                        <a href="#" onclick="conocemas('1')" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(assets/img/repuestos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Todos los</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Repuestos y Accesorios
                        </h5>
                    </div>
                    <div>
                        <a href="#" onclick="conocemas('2')" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(assets/img/neumaticos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">La variedad más grande en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Neumáticos
                        </h5>
                    </div>
                    <div>
                        <a href="#" onclick="conocemas('3')" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h5 class="font-family-Roboto-Medium titulo">
                    Te puede interesar <a href="tienda.php?page=1" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>
              <?php         // Recorrer la lista de publicaciones y crear las opciones del select
                if($count_pub > 0){  
                    foreach ($list_publications as $pub) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                        <div class="cuadro"  onclick="rediDestacado('detalle.php?typep=<?=$pub['PublicationType']['id_publication_type'] ?>&id=<?= $pub['id_product'] ?>&<?= ($pub['PublicationType']['id_publication_type']  == '2') ? 'comprar' :' arrendar'; ?>' )">
                        <div class="heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                          <div class="cuadro-img image-container2">
                                <img  src="<?=$baseUrl?>/see_image?image=<?= isset($pub["product_images"][0]["image_name"])  ? $pub["product_images"][0]["image_name"]: 'sin_producto.jpg'?>" alt="producto">
                            </div>
                            <div class="cuadro-des">
                                <ul class="font-family-Roboto-Regular">
                                    <li><a href="detalle.php?typep=<?=$pub['PublicationType']['id_publication_type'] ?>&id=<?= $pub['id_product'] ?>&<?= ($pub['PublicationType']['id_publication_type']  == '2') ? 'comprar' :' arrendar'; ?>">  <?= $pub['PublicationType']['type_pub']  ?></a></li>
                                </ul>
                                <span class="font-family-Roboto-Regular" tabindex="0" data-toggle="tooltip" title="<?= $pub['title'] ?> ">
                                    <p class="font-family-Roboto-Regular" style="color: #212529;">
                                    <?= cortarString($pub['title'])  ?> 
                                </p>
                            </span> 
                                <strong class="font-family-Roboto-Medium"> <?= isset($pub['product_details']["facipay"]) &&  $pub['product_details']["facipay"] == 'C' ? 'Cotizar': $pub['product_details']["price"];  ?></strong>
                            </div>
                        </div>
                    </div>
                <?php  
                }
            }  
        ?>
        </div>
    </div>
</section>
 
<section class="Discover">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Descubre
                </h5>
            </div>
        </div>
        <div class="row row-class">
            <div class="col-sm-6 col-md-6 col-lg-6 left-box">
                <img src="./assets/img/feliz.png" alt="feliz" />
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 right-box">
                <p class="first-title">CONOCE SOBRE </p>
                <p class="sec-title">GARANTÍA MAQUINATRIX Y MUCHO MÁS</p>

                <a href="#" class="Discover-btn"> Conoce más</a>

            </div>
        </div>
    </div>
</section>
<section class="bg-general mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Cómo funciona
                </h5>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box-new">
                    <div class="box-img">
                        <img src="./assets/img/lupa.png" alt="icono">
                    </div>
                    <div class="box-text">
                        <h2 class="font-family-Roboto-Medium">1. Encuentra</h2>
                        <p class="font-family-Roboto-Regular">
                            Explora para descubrir la maquinaria, repuestos o herramientas que necesitas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box-new">
                    <div class="box-img">
                        <img src="./assets/img/chat.png" alt="icono">
                    </div>
                    <div class="box-text">
                        <h2 class="font-family-Roboto-Medium">2. Contacta</h2>
                        <p class="font-family-Roboto-Regular">
                            Comunica directamente con el propietario para acordar los detalles sin intermediarios.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box-new">
                    <div class="box-img">
                        <img src="./assets/img/carita.png" alt="icono">
                    </div>
                    <div class="box-text">
                        <h2 class="font-family-Roboto-Medium">3. Disfruta</h2>
                        <p class="font-family-Roboto-Regular">
                            Ya sea un arriendo o una compra, disfruta que todo el proceso sea fácil y seguro.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php' ?>
<?php include 'maq_service.php' ?>
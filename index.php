<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php  
$baseUrl = getenv('URL_API');
 
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
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
    }
    

     
      $count_pub = 0;
      $url = $baseUrl.'/list_publications?limit=4'; 
    
      $response1 = file_get_contents($url);
      if ($response1 !== false) {
          // Decodificar la respuesta JSON
          $data = json_decode($response1, true);
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
<section class="bg-slider d-flex align-items-center justify-content-start">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="font-family-Roboto-Bold">Arrienda y compra tu maquinaria ideal</h2>
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-family-Roboto-Bold" data-toggle="tab" href="#arrendar" style="border-radius: 10px 0 0 0;">
                            Arrendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-family-Roboto-Bold" data-toggle="tab" href="#comprar" style="border-radius: 0 10px 0 0">
                            Comprar
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="arrendar" class="container tab-pane active">
                        <form action="tienda.php"  method="POST" class="fomulario-search row">
                            <div class="col-md-3 bg-white border-lado">
                                <?php                                            
                                    if ($count_category > 0) {  
                                        echo '<select class="form-control font-family-Roboto-Regular"  id="modelo_arrendar" name="modelo_arrendar">';
                                        echo '<option value="0">Seleccionar</option>'; 
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
                                <input type="text" name="buscar" id="buscar" placeholder="¿Qué buscas?" class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-amarillo font-family-Roboto-Medium">
                                    <i class="far fa-search"></i> Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="comprar" class="container tab-pane fade">
                        <form action="" class="fomulario-search row">
                            <div class="col-md-3 bg-white border-lado">                             
                            <?php                                            
                                if ($count_category > 0) {  
                                    echo '<select class="form-control font-family-Roboto-Regular"  id="modelo_compra" name="modelo_compra">';
                                    echo '<option value="0">Seleccionar</option>'; 
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
                                <input type="text" name="buscar-compra" id="buscar-compra" placeholder="¿Qué buscas?" class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-amarillo font-family-Roboto-Medium">
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
<section class="bg-general">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/retroexcavadora.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Lo mejor en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Maquinaria y Equipos
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/repuestos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Todos los</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Repuestos y Accesorios
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/neumaticos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">La variedad más grande en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Neumáticos
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-none">
                <h5 class="font-family-Roboto-Medium titulo">
                    Te puede interesar <a href="tienda.php" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>
              <?php
                            // Recorrer la lista de publicaciones y crear las opciones del select
        if($count_pub > 0){  
            foreach ($list_publications as $pub) { ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                <div class="cuadro">
                    <div class="cuadro-img">
                        <img src="<?=$baseUrl?>/see_image?image=<?= $pub["image_name"]!=null ? $pub["image_name"]: 'sin_producto.jpg'?>" alt="producto">
                        <div class="abs">
                            <span class="font-family-Roboto-Regular">LIQUIDACIÓN</span>
                        </div>
                    </div>
                    <div class="cuadro-des">
                        <ul class="font-family-Roboto-Regular">
                            <li><a href="#">  <?= $pub['type_pub']  ?></a></li>
                        </ul>
                        <p class="font-family-Roboto-Regular">
                           <?= $pub['title']  ?>
                        </p>
                        <strong class="font-family-Roboto-Medium">CLP  <?= $pub['price']  ?></strong>
                        <span class="font-family-Roboto-Medium">(UF 2,250)</span>
                    </div>
                </div>
            </div>
     <?php  } }  ?>
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
                        <img src="img/lupa.png" alt="icono">
                    </div>
                    <div class="box-text">
                        <h2 class="font-family-Roboto-Medium">1. Encuentra</h2>
                        <p class="font-family-Roboto-Regular">
                            Explora para descubrir la maquinaria, repuestos o herramientas <br> que necesitas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box-new">
                    <div class="box-img">
                        <img src="img/chat.png" alt="icono">
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
                        <img src="img/carita.png" alt="icono">
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

<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php

  
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
    $currentPage  = 1;
    
    //list industria
    
    $count_industry = 0;
    $url55 = $baseUrl.'/list_industry'; 
    $response55= file_get_contents($url55);
    if ($response55 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response55, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $industry = $data['data'];
           $count_industry = $data['count'];
       } else {
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
    }



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
     $url_final='';
     $param='';
     $search=''; 
  
     if (isset($_GET['page']) && $_GET['page']!='' ) {
        $currentPage  = $_GET['page'];  
        $url_final = "&page=".$currentPage;    
     } 

     if ( isset($_GET['page_pag']) && $_GET['page_pag']!='') {
        $currentPage  = $_GET['page_pag']; 
        $url_final = "&page=".$currentPage;    
     } 

     if (isset($_GET['typep'])) { //tipo publicacion arredar o comprar 
        $tpublicacion = $_GET['typep'];
        $param = $param ."&tpublicacion=".$tpublicacion ; 
        $url_final =  $url_final ."&typep=".$tpublicacion;    
     }   
     if (isset($_GET['category']) && $_GET['category']!='') { //categorias de las publicaciones ej-repuest
        $categoria = $_GET['category'];
        $param = $param ."&category=".$categoria ; 
        $url_final =  $url_final ."&category=".$categoria;    
     }  
     if (isset($_GET['industry']) && $_GET['industry']!='') { //categorias de las publicaciones ej-repuest
        $industry = $_GET['industry'];
        $param = $param ."&industry=".$industry ; 
        $url_final =  $url_final ."&industry=".$industry;    
     }  
      if (isset($_GET['buscar']) && $_GET['buscar']!='') { 
         $search = $_GET['buscar'];
         $param = $param."&search=".urlencode($search); 
         $url_final =  $url_final ."&buscar=".$search;    
      }else{
        $url_final =  $url_final ."&buscar=".$search;    
      }
        if (isset($_GET['buscar-compra'])&& $_GET['buscar-compra']!='') {
         $search1 = $_GET['buscar-compra'];
         $param = $param."&search=".urlencode($search1); 
       
         }
   
        if (isset($_POST['tipo'])) {
            $tipoSeleccionado = $_POST['tipo'];
            $param = $param ."&category=".$tipoSeleccionado ; 
         }  
         
        if (isset($_GET['price-min'])) {
             $price_min  = $_GET['price-min'];
             $param = $param ."&price_min=".$price_min ; 
             $url_final =  $url_final ."&price-min=".$price_min;    
         } 
        if (isset($_GET['price-max'])) {
            $price_max  = $_GET['price-max'];
            $param = $param ."&price_max=".$price_max ;
            $url_final =  $url_final ."&price-max=".$price_max;     
         } 
         if (isset($_GET['region']) && $_GET['region']!='') {
            $region  = $_GET['region'];
            $param = $param ."&region=".urlencode($region);
            $url_final =  $url_final ."&region=".urlencode($region);  
         }  
      
      $count_pub = 0;
     // $url = $baseUrl.'/list_publications?limit=1000'.$param;   
    
 
      /* $response = file_get_contents($url);
      if ($response !== false) {
          // Decodificar la respuesta JSON
          $data = json_decode($response, true);
          if (!$data['error']) {
              // Obtener la lista de publicaciones
             //$list_publications = $data['data']; 
    
           // $count_pub = $data['count'];
            $rowsPerPage = 10;
            
            // Paginar los datos
         
            $indexOfLastRow = $currentPage * $rowsPerPage;
            $indexOfFirstRow = $indexOfLastRow - $rowsPerPage;
           
           /* $currentRows = array_slice($list_publications, $indexOfFirstRow, 10);
            $totalPages = ceil(count($list_publications) / $rowsPerPage);

          } else {              
              $msg_list_public =  $data['msg'];
          }
      } else {
          echo 'Error al realizar la solicitud a la API';
      }  */ 
 
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
<section class="pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-migas">
                    <li>
                        <a  href="index.php"class="font-family-Roboto-Regular">Inicio</a>
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
                        <!--div class="form-group">
                        <?php                                            
                              /*  if ($count_regiones > 0) {
 
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
                                }  */
                            ?>
                         </div-->
                        
                        <div class="form-group group">
                        <?php  
                                if ($count_category > 0) { 
                                    echo '<select class="form-control font-family-Inter-Medium"  id="category" name="category">';
                                    echo '<option value="">---Seleccione---</option>'; 
                                    foreach ($categories as $categorie) {
                                        $id = $categorie['id_category'];
                                        $categoryName = $categorie['category'];
                                        echo '<option value="' . $id . '"'; 
                                        if ($id == $categoria) {
                                            echo ' selected';
                                        }  
                                        echo '>' . $categoryName. '</option>';
                                    }
                                    echo '</select>
                                    <i class="fa-solid fa-caret-down"></i>';
                         
                        }  ?> 
                        </div>
                        <div class="form-group group">
                        <?php  
                                if ($count_industry > 0) { 
                                    echo '<select class="form-control font-family-Inter-Medium"  id="industria" name="industria"  onchange="searchTypeMachine(this.value)">';
                                    echo '<option value="">Industria</option>'; 
                                    foreach ($industry as $field) {
                                        $id = $field['id_product_type'];
                                        $industryName = $field['description'];
                                        echo '<option value="' . $id . '"'; 
                                        if ($id == $industry) {
                                            echo ' selected';
                                        }  
                                        echo '>' . $industryName. '</option>';
                                    }
                                    echo '</select>
                                    <i class="fa-solid fa-caret-down"></i>';
                         
                        }  ?> 
                           
                        </div>
                        <div class="form-group group">
                        <select class="form-control" id="maquinaria" name="maquinaria">
                          </select>
                        
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium ">Detalles de producto</h3>
                    </div>
                    <div class="formulario-busqueda">
                        <div class="form-group group">
                          <select class="form-control" id="marca" name="marca">
                          </select>                           
                        </div>
                        <div class="form-group group">
                            <select class="form-control" id="modelo" name="modelo">                              
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
                        <div class="all list_publi_owner">
                        
                      
                         
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
$(document).ready(function() { 
    alert("busca las publicaciones");
    searchPublication('<?=$param?>')    
 });

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


    //catalogos de los select 

  function searchTypeMachine(industria){
   
     var url = '<?=$baseUrl?>/list_machine?id_product_type=' + industria;  
     $.ajax({
        url: url,
        method: 'GET', 
        contentType: "application/json",
      
        success: function(res) {
            var selectElement = $('#maquinaria');

                // Limpiar las opciones existentes
                selectElement.empty(); 
                  // Agregar la opción por defecto
                var defaultOption = $('<option>').prop('selected', true).text('Tipo de Maquinaria');
                selectElement.append(defaultOption);
                res.data.forEach(function(element) { 
                var option = $('<option value='+element.id_machine+' >').text(element.description);
                selectElement.append(option);             
                  });
             searchTypeMarca(industria);
             searchTypeModelo(industria);
        },
        error: function(error) {
        console.error('Error al enviar los datos actualizados');
        }
    });
}

function searchTypeMarca(industria){
   
   var url = '<?=$baseUrl?>/list_marca?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#marca');

              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option>').prop('selected', true).text('Marca');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.marca+' >').text(element.description);
              selectElement.append(option);             
          });
  
      },
      error: function(error) {

      console.error('Error al enviar los datos actualizados');
      }
  });
}

function searchTypeModelo(industria){
   
   var url = '<?=$baseUrl?>/list_model?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#modelo'); 
              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option>').prop('selected', true).text('Modelo');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.id_model+' >').text(element.description);
              selectElement.append(option);             
          });
  
      },
      error: function(error) {
        
      console.error('Error al enviar los datos actualizados');
      }
  });
}

function searchPublication(params) {
    $.ajax({   
    url: '<?=$baseUrl?>/list_publications?limit=10'+params,
    method: 'GET',  
    success: function(res) {
     if(!res.error){ 
          res.data.forEach(function(element) {
            console.log("element",element)
        // Obtener el nuevo valor para count_pub utilizando jQuery
           var nuevoValor = res.count;  
                // Actualizar el contenido del elemento <p> con el nuevo valor
           $('.titulo-principal-adorno').text(nuevoValor + ' resultados de búsqueda');
           if(element.status_id == '6' ) { 
               var imagen = '<?=$baseUrl?>/see_image?image='+element.product_images[0]['image_name']; 
               // Crear el elemento <a> y establecer el atributo href
                var typep = element.PublicationType.id_publication_type;
                var id = element.id_product;
                var asunto = element.PublicationType.type_pub
                var detalle = 'typep='+typep+'&id='+id+'&%'+asunto;
                var link = $('<a>').attr('href', 'detalle.php?'+detalle);

                // Crear el elemento <div> con la clase "align-items-start box-tienda d-flex justify-content-start mb-3"
                var divContainer = $('<div>').addClass('align-items-start box-tienda d-flex justify-content-start mb-3');

                // Crear el elemento <div> con la clase "box-img position-relative"
                var divImage = $('<div>').addClass('box-img position-relative');

                // Crear la imagen dentro del div de la imagen
                var image = $('<img>').attr('src', imagen).attr('alt', 'producto');

                // Crear el elemento <div> con la clase "abs"
                var divAbs = $('<div>').addClass('abs');

                // Crear el elemento <span> con la clase "font-family-Roboto-Regular"
                var span = $('<span>').addClass('font-family-Roboto-Regular').text('Oportunidad');

                // Agregar el elemento <span> dentro del div "abs"
                divAbs.append(span);

                // Agregar la imagen y el div "abs" dentro del div de la imagen
                divImage.append(image, divAbs);

                // Crear el elemento <div> con la clase "box-description"
                var divDescription = $('<div>').addClass('box-description');

                // Crear el elemento <div> con la clase "row"
                var divRow = $('<div>').addClass('row');

                // Crear el elemento <div> con la clase "col-md-7"
                var divCol7 = $('<div>').addClass('col-md-7');

                // Crear el elemento <h2> con la clase "font-family-Roboto-Regular"
                var h2 = $('<h2>').addClass('font-family-Roboto-Regular').text(element.title);

                // Crear el elemento <h3> con la clase "mb-3"
                var h3 = $('<h3>').addClass('mb-3');

                // Crear el elemento <strong> con la clase "font-family-Roboto-Bold"
                var strong = $('<strong>').addClass('font-family-Roboto-Bold').text(element.product_details.price);

                // Crear el elemento <span> con la clase "font-family-Roboto-Medium"
                var spanPrice = $('<span>').addClass('font-family-Roboto-Medium').text('');

                // Agregar el texto del precio dentro del elemento <h3>
                h3.append(strong, spanPrice);

                // Crear el elemento <div> con la clase "row"
                var divInnerRow = $('<div>').addClass('row');

                // Crear los elementos <div> y <p> para los detalles
                var divCol6_1 = $('<div>').addClass('col-md-6');
                var divCol6_2 = $('<div>').addClass('col-md-6');
                var pLocation = $('<p>').addClass('font-family-Roboto-Regular detalles-grey mb-1').html('<img src="./assets/img/location-grey.png" alt="location"> Ubicado en');
                var pBus = $('<p>').addClass('font-family-Roboto-Regular detalles-grey mb-1').html('<img src="./assets/img/bus.png" alt="bus"> Marca');
                var pKm = $('<p>').addClass('font-family-Roboto-Regular detalles-bold mb-1').text(element.product_details.region +' ' +element.product_details.city);
                var pDate = $('<p>').addClass('font-family-Roboto-Regular detalles-bold mb-1').text(element.product_details.brand);

                // Agregar los elementos de los detalles dentro del div de la columna 1 y columna 2
                divCol6_1.append(pLocation, pKm);
                divCol6_2.append(pBus, pDate);

                // Agregar las columnas de los detalles dentro del div de la fila interna
                divInnerRow.append(divCol6_1, divCol6_2);

                // Agregar los elementos principales dentro del div de la columna 7
                divCol7.append(h2, h3, divInnerRow);

                // Crear el elemento <div> con la clase "col-md-5 mini-detalles"
                var divCol5 = $('<div>').addClass('col-md-5 mini-detalles');

                // Crear el elemento <p> para "Incluye:"
                var pIncludes = $('<p>').text('Incluye:');

                // Crear la lista de elementos <li> para los detalles incluidos
                var ul = $('<ul>');
                var li1 = $('<li>').html('<i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix');
                var li2 = $('<li>').html('<i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix');
                var li3 = $('<li>').html('<i class="fa-regular fa-circle-check"></i> Despacho');

                if(element.product_details.delivery=='Y' ||element.product_details.delivery=='S' ){
                    ul.append(li1);
                } 
                 if(element.product_details.warranty=='Y' ||element.product_details.warranty=='S' ){
                    ul.append(li2);
                }
                 if(element.product_details.delivery=='Y' ||element.product_details.delivery=='S' ){
                    ul.append(li3);
                }
               
                // Agregar los elementos <li> dentro de la lista <ul>
              

                // Agregar los elementos principales dentro del div de la columna 5
                divCol5.append(pIncludes, ul);

                // Agregar los elementos principales dentro del div de la fila
                divRow.append(divCol7, divCol5);

                // Agregar los elementos principales dentro del div de la descripción
                divDescription.append(divRow);

                // Agregar los elementos principales dentro del div del contenedor
                divContainer.append(divImage, divDescription);

                // Agregar el div del contenedor dentro del enlace
                link.append(divContainer);

                // Agregar el enlace al elemento deseado en tu página HTML
                $('.list_publi_owner').append(link);
             }
        });
      }
    }
  });  
    
}
</script>
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


    $count_maq = 0;
    $url9985 = $baseUrl.'/list_machine'; 
    $response9985= file_get_contents($url9985);
    if ($response9985 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response9985, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $maquinaria = $data['data'];
           $count_maq = $data['count'];
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

    
    $count_marca = 0;
    $url965 = $baseUrl.'/list_marca'; 
    $response965= file_get_contents($url965);
    if ($response965 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response965, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $marca = $data['data'];

           $count_marca = $data['count'];
       } else {
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
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
                            <input onblur type="text" name="buscar" id="buscar" value="<?=$search?>" placeholder="¿Qué buscas?">
                        </div>
                       
                        
                     <div class="form-group group">
                    <?php
                      if ($count_category > 0) {
                        echo '<select  id="category" name="category">';
                        echo '<option value="0">Categoria</option>';
                        foreach ($categories as $categorie) {
                            $id = $categorie['id_category'];
                            $categoryName = $categorie['category'];

                            if ($tpublicacion == 1 && ($id == 1 || $id == 5)) {
                                echo '<option value="' . $id . '"';
                                if ($id == $categoria) {
                                    echo ' selected';
                                }
                                echo '>' . $categoryName . '</option>';
                            } elseif ($tpublicacion != 1) {
                                echo '<option value="' . $id . '"';
                                if ($id == $categoria) {
                                    echo ' selected';
                                }
                                echo '>' . $categoryName . '</option>';
                            }
                        }
                        echo '</select>
                        <i class="fa-solid fa-caret-down"></i>';
                    }
                    ?>
                        </div>
                        <div class="form-group group">
                        <?php  
                                if ($count_industry > 0) { 
                                    echo '<select   id="industria" name="industria"  >';
                                    echo '<option value="0">Industria</option>'; 
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
                        <?php  
                                if ($count_maq > 0) { 
                                    echo '<select   id="maquinaria" name="maquinaria" >';
                                    echo '<option value="0">Tipo Maquinaria</option>'; 
                                    foreach ($maquinaria as $field) {
                                        $id = $field['id_machine'];
                                        $maqName = $field['description'];
                                        echo '<option value="' . $id . '"'; 
                                        if ($id == $maquinaria) {
                                            echo ' selected';
                                        }  
                                        echo '>' . $maqName. '</option>';
                                    }
                                    echo '</select>
                                    <i class="fa-solid fa-caret-down"></i>';
                         
                        }  ?> 
                        
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium ">Detalles de producto</h3>
                    </div>
                    <div class="formulario-busqueda">
                        <div class="form-group group">
                         
                        <?php  
                                    if ($count_marca > 0) { 
                                        echo '<select id="marca" name="marca" >';
                                        echo '<option value="0">Marca</option>'; 
                                        foreach ($marca as $field) {
                                            $id = $field['id_marca'];
                                            $marcaName = $field['description'];
                                            echo '<option value="' . $id . '"'; 
                                            if ($id == $marca) {
                                                echo ' selected';
                                            }  
                                            echo '>' . $marcaName. '</option>';
                                        }
                                        echo '</select> ';
                                
                                        }  ?>                           
                        </div>
                        <div class="form-group group">
                         <input type="text" id="modelo" name="modelo"  placeholder="Modelo*"/>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium input-sm-heading">Año de modelo</h4>
                    </div>
                    <div class="campos-min-max font-family-Roboto-Regular">
                        <div class="form-check-inline">
                            <input type="number" name="desde" id="desde" placeholder="Desde">
                        </div>
                        <div class="form-check-inline">-</div>
                        <div class="form-check-inline mr-0">
                            <input type="number" name="hasta" id="hasta" placeholder="Hasta">
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium input-sm-heading">Condición</h4>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="condition" name="condition" value="Nuevo">
                                <label class="custom-control-label font-family-Roboto-Regular" for="nuevo">Nuevo</label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="condition1" name="condition" value="Usado">
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
                            <a href="javascript:void('0');" id="price-min-filter"
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
    searchPublication('<?=$param?>','1')    
    
    //filtros search
    $('#buscar').on('blur', function() { 
        var value =  $('#buscar').val();
        var filter = updateFilterParam('search', value, '<?=$param?>'); 
        searchPublication(filter,2);
    }); 
    $('#marca').on('change', function() { 
        var value =  $('#marca').val(); 
        var filter = updateFilterParam('brand', value, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#modelo').on('blur', function() { 
        var value =  $('#modelo').val();
        var filter = updateFilterParam('model', value, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#condition').on('click', function() {
        var selectedValue = $('input[name="condition"]:checked').val();  
        var filter = updateFilterParam('condition', selectedValue, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#condition1').on('click', function() {
        var selectedValue = $('input[name="condition"]:checked').val(); 
        var filter = updateFilterParam('condition', selectedValue, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#price-min-filter').on('click', function() { 
        var filter = updateFilterParam('price_min', 1, '<?=$param?>');
        searchPublication(filter,2);
    });
  
    $('#recent').on('click', function() {
        var filter = updateFilterParam('recent', 1, '<?=$param?>');
        searchPublication(filter,2);
    });
  
    $('#hasta').on('blur', function() {     
        var hasta =  $('#desde').val() +'-'+$('#hasta').val();
        var filter = updateFilterParam('yearstart', hasta, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#category').on('change', function() { 
        var value =  $('#category').val(); 
        var filter = updateFilterParam('category', value, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#industria').on('change', function() { 
        var value =  $('#industria').val(); 
        var filter = updateFilterParam('id_product_type', value, '<?=$param?>');
        searchPublication(filter,2);
    });
    $('#maquinaria').on('change', function() { 
        var value =  $('#maquinaria').val(); 
        var filter = updateFilterParam('id_machine', value, '<?=$param?>');
        searchPublication(filter,2);
    });
 
 });

    $('#all').click(function () {
     //   $('.all').css('display', 'block');
        $('.recent').css('display', 'none');
        $('.price-min').css('display', 'none');
    });
    $('#recent').click(function () {
      //  $('.all').css('display', 'none');
        $('.recent').css('display', 'block');
        $('.price-min').css('display', 'none');
    });
    $('#price-min').click(function () {
      //  $('.all').css('display', 'none');
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
    /*const prevBtn = document.querySelector("#prev");
    const nextBtn = document.querySelector("#next");
    const linksContainer = document.querySelector(".pagination-links");

    var totalPages = 5; // Adjust this to the total number of pages
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
*/
   
 
var totalRecords = 0;  // Número total de registros
var recordsPerPage = 5; // Número de registros por página
var totalPages = 0;
let currentStep = 0;

function updateFilterParam(paramName, paramValue, filter) {
  var regex = new RegExp(paramName + '=([^&#]*)');
  var match = regex.exec(filter);
  if (match) {
    // El parámetro ya existe, modificar su valor
    var updatedFilter = filter.replace(match[0], paramName + '=' + paramValue);
    return updatedFilter;
  } else {
    // El parámetro no existe, agregarlo al filtro
    if (filter.length > 0) {
      return filter + '&' + paramName + '=' + paramValue;
    } else {
      return paramName + '=' + paramValue;
    }
  }
}

function searchPublication(params,type,page=false) {
    console.log("parameetros",params);
  
    var offset = page && currentStep > 0  ? currentStep * recordsPerPage : 0;
    var url;
    if(type=='1'){
        params = '<?=$param?>'
        url = '<?=$baseUrl?>/list_publications?status_id=6&limit=5&offset='+offset+params;
    }else{
        params = params + ''
        url = '<?=$baseUrl?>/list_publications?status_id=6&limit=5&offset='+offset+params;
    }

    $.ajax({   
    url: url,
    method: 'GET',  
    success: function(res) {
      $('.list_publi_owner').empty();
      $('.pagination-links').empty(); 
   
      $('.titulo-principal-adorno').text(res.count + ' resultados de búsqueda');  
      if(!res.error){ 
      
          res.data.forEach(function(element) {
            console.log("element",element)
        // Obtener el nuevo valor para count_pub utilizando jQuery
           var nuevoValor = res.count;  
                // Actualizar el contenido del elemento <p> con el nuevo valor
         
           
            var imagen_url = element?.product_images[0] ? element.product_images[0]['image_name'] :'';
             var imagen = '<?=$baseUrl?>/see_image?image='+ imagen_url;
               // Crear el elemento <a> y establecer el atributo href
                var typep = element.PublicationType.id_publication_type;
                var id = element.id_product;
                var asunto = element.PublicationType.type_pub
                var detalle = 'typep='+typep+'&id='+id+'&%'+asunto;
                var link = $('<a id="visity">').attr('href', 'detalle.php?'+detalle);

                var divContainer = $('<div>').addClass('align-items-start box-tienda d-flex justify-content-start mb-3');

                var divImage = $('<div>').addClass('box-img position-relative');
                var image = $('<img>').attr('src', imagen).attr('alt', 'producto');
                var divAbs = $('<div>').addClass('abs');

              
                divImage.append(image, divAbs);

                // Crear el elemento <div> con la clase "box-description"
                var divDescription = $('<div>').addClass('box-description');

                var divRow = $('<div>').addClass('row');
                var divCol7 = $('<div>').addClass('col-md-7');
                var h2 = $('<h2>').addClass('font-family-Roboto-Regular').text(element.title);
                var h3 = $('<h3>').addClass('mb-3');
                
                var price = element.product_details?.facipay == 'C' ? 'Cotizar' : 'CLP ' +element.product_details?.price + '/ hora';
                var strong = $('<strong>').addClass('font-family-Roboto-Bold').text(price ?? '');
                var spanPrice = $('<span>').addClass('font-family-Roboto-Medium').text('');
                h3.append(strong, spanPrice);

                var divInnerRow = $('<div>').addClass('row');

                // Crear los elementos <div> y <p> para los detalles
                var divCol6_1 = $('<div>').addClass('col-md-6');
                var divCol6_2 = $('<div>').addClass('col-md-6');
                var pLocation = $('<p>').addClass('font-family-Roboto-Regular detalles-grey mb-1').html('<img src="./assets/img/location-grey.png" alt="location"> Ubicado en');
                var pBus = $('<p>').addClass('font-family-Roboto-Regular detalles-grey mb-1').html('<img src="./assets/img/bus.png" alt="bus"> Marca');
                var pKm = $('<p>').addClass('font-family-Roboto-Regular detalles-bold mb-1').text(element.product_details?.region);
              //  var pKm = $('<p>').addClass('font-family-Roboto-Regular detalles-bold mb-1').text(element.product_details?.region +' ' +element.product_details?.city);
                var pDate = $('<p>').addClass('font-family-Roboto-Regular detalles-bold mb-1').text(element.product_details?.brand);

                // Agregar los elementos de los detalles dentro del div de la columna 1 y columna 2
                divCol6_1.append(pLocation, pKm);
                divCol6_2.append(pBus, pDate);
                divInnerRow.append(divCol6_1, divCol6_2);
                divCol7.append(h2, h3, divInnerRow);
                var divCol5 = $('<div>').addClass('col-md-5 mini-detalles');

                var pIncludes = $('<p>').text('Incluye:');

                var ul = $('<ul>');
                var li1 = $('<li>').html('<i class="fa-regular fa-circle-check"></i> Contrato Maquinatrix');
                var li2 = $('<li>').html('<i class="fa-regular fa-circle-check"></i>Garantía Maquinatrix');
                var li3 = $('<li>').html('<i class="fa-regular fa-circle-check"></i> Despacho');
                var a = 0;

                if(element.product_details?.delivery=='Y' || element.product_details?.delivery=='S' ){
                    ul.append(li1);
                    a++;
                } 
                 if(element.product_details?.warranty=='Y' || element.product_details?.warranty=='S' ){
                    ul.append(li2);
                   a++;
                }
                 if(element.product_details?.delivery=='Y' || element.product_details?.delivery=='S' ){
                    ul.append(li3);
                    a++;
                }
                if(a > 0){ divCol5.append(pIncludes, ul);
                    divRow.append(divCol7, divCol5); 
                }else{
                    divRow.append(divCol7); 
                }
               
                divDescription.append(divRow); 
                divContainer.append(divImage, divDescription); 
                link.append(divContainer); 

                $('.list_publi_owner').append(link);   
             

        });
        totalRecords = res.count; 
        totalPages =  Math.ceil(totalRecords / recordsPerPage);
        
        // Generar los enlaces de paginación
    for (var c = 0; c < totalPages; c++) {
        const pageNum = c ;
      const isActive = currentStep === c ? 'active' : '';

        var link = $('<a href="#" onclick="updatePrevNextButtons('+c+')" class="pagination-link '+isActive+'" data-index="' + (c) + '">' + (c+1) + '</a>');
        $('.pagination-links').append(link);
     }
  
      } else {
        $('.list_publi_owner').text(res?.msg);
      }
    }
  });  
    
}
$(document).ready(function() { 

    // Manejar el evento de clic en el botón "prev"
    $('#prev').click(function(e) {
        e.preventDefault();
        var activeLink = $('.pagination-link.active');
        var pageIndex = parseInt(activeLink.data('index')) - 1;
      

        // Realizar acciones según la página seleccionada
        // ...

        // Actualizar estado de los botones "prev" y "next"
        updatePrevNextButtons(pageIndex);
    });

    // Manejar el evento de clic en el botón "next"
    $('#next').click(function(e) {
        e.preventDefault();
        var activeLink = $('.pagination-link.active');
        var pageIndex = parseInt(activeLink.data('index')) + 1;

        // Realizar acciones según la página seleccionada
        // ...

        // Actualizar estado de los botones "prev" y "next"
        updatePrevNextButtons(pageIndex);
    });
}); 
// Función para actualizar el estado de los botones "prev" y "next"
function updatePrevNextButtons(pageIndex) {
    console.log("pageIndex",pageIndex);
        var prevButton = $('#prev');
        var nextButton = $('#next');

        // Habilitar o deshabilitar el botón "prev"
        if (pageIndex <= 0) {
            prevButton.prop('disabled', true);
        } else {
            prevButton.prop('disabled', false);
        }

        // Habilitar o deshabilitar el botón "next"
        if (pageIndex >= totalPages - 1) {
            nextButton.prop('disabled', true);
        } else {
            nextButton.prop('disabled', false);
        }

        // Actualizar clase "active" en el enlace de paginación correspondiente
        $('.pagination-link').removeClass('active');
        $('.pagination-link[data-index="' + pageIndex + '"]').addClass('active');

      
        var filter = updateFilterParam('limit','5', '<?=$param?>');
        currentStep = pageIndex  
        searchPublication(filter,1,true);  
    }
</script>

<script>
    $('#category').selectize({ normalize: true });
    $('#industria').selectize({ normalize: true });
    $('#maquinaria').selectize({ normalize: true });
    $('#marca').selectize({ normalize: true });    
</script>
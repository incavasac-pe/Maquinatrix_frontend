
<?php 
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
$host = $_SERVER['HTTP_HOST']; 
$uri = $_SERVER['REQUEST_URI']; 
$url_publi = $protocol . '://' . $host; 
  
   $baseUrl = getenv('URL_API'); 
     
    
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
    
      
   $count_marca5 = 1;
  
   $marcas55 = array(
    array(
        "id_marca" => 1,
        "id_product_type" => 1,
        "description" => "Samson",
        "status_id" => 1
    ),
    array(
        "id_marca" => 2,
        "id_product_type" => 1,
        "description" => "Triangle",
        "status_id" => 1
    ),
    array(
        "id_marca" => 3,
        "id_product_type" => 1,
        "description" => "Ling Long",
        "status_id" => 1
    ),
    array(
        "id_marca" => 4,
        "id_product_type" => 1,
        "description" => "Chaoyang",
        "status_id" => 1
    ),
    array(
        "id_marca" => 5,
        "id_product_type" => 1,
        "description" => "Honour",
        "status_id" => 1
    ),
    array(
        "id_marca" => 6,
        "id_product_type" => 1,
        "description" => "Aventus",
        "status_id" => 1
    ),
    array(
        "id_marca" => 7,
        "id_product_type" => 1,
        "description" => "Continental",
        "status_id" => 1
    ),
    array(
        "id_marca" => 8,
        "id_product_type" => 1,
        "description" => "Dunlop",
        "status_id" => 1
    ),
    array(
        "id_marca" => 9,
        "id_product_type" => 1,
        "description" => "Goodyear",
        "status_id" => 1
    ),
    array(
        "id_marca" => 10,
        "id_product_type" => 1,
        "description" => "Bridgestone",
        "status_id" => 1
    ),
    array(
        "id_marca" => 11,
        "id_product_type" => 1,
        "description" => "Vredestein",
        "status_id" => 1
    ),
    array(
        "id_marca" => 12,
        "id_product_type" => 1,
        "description" => "Esa-Tecar",
        "status_id" => 1
    ),
    array(
        "id_marca" => 13,
        "id_product_type" => 1,
        "description" => "Pirelli",
        "status_id" => 1
    ),
    array(
        "id_marca" => 14,
        "id_product_type" => 1,
        "description" => "Michelin",
        "status_id" => 1
    ),
    array(
        "id_marca" => 15,
        "id_product_type" => 1,
        "description" => "Nokian",
        "status_id" => 1
    ),
    array(
        "id_marca" => 16,
        "id_product_type" => 1,
        "description" => "Falken",
        "status_id" => 1
    ),
    array(
        "id_marca" => 17,
        "id_product_type" => 1,
        "description" => "Hankook",
        "status_id" => 1
    ),
    array(
        "id_marca" => 18,
        "id_product_type" => 1,
        "description" => "Semperit",
        "status_id" => 1
    ),
    array(
        "id_marca" => 19,
        "id_product_type" => 1,
        "description" => "Barum",
        "status_id" => 1
    ),
    array(
        "id_marca" => 20,
        "id_product_type" => 1,
        "description" => "Toyo",
        "status_id" => 1
    ),
    array(
        "id_marca" => 21,
        "id_product_type" => 1,
        "description" => "Kumho",
        "status_id" => 1
    ),
    array(
        "id_marca" => 22,
        "id_product_type" => 1,
        "description" => "Apollo",
        "status_id" => 1
    ),
    array(
        "id_marca" => 23,
        "id_product_type" => 1,
        "description" => "Firestone",
        "status_id" => 1
    ),
    array(
        "id_marca" => 24,
        "id_product_type" => 1,
        "description" => "Fulda",
        "status_id" => 1
    )
);    ?>
<div class="container">
    <div class="category-product">
        <h1>Título y descripción de publicación</h1>
        <p class="sm-title">Arma el título para tu publicación. Indica el producto, marca y modelo.</p>
        <input type="text" class="form-control" id="title5"  name="title5"  placeholder="Título de publicación*">
        <p class="text-grey"></p>
        <p class="sm-title">Describe tu publicación</p>
        <textarea class="form-control text-container"  id="descrip5" name="descrip5"  rows="3"></textarea>
        <div id="charCount" class="char-count">Caracteres (0/10000)</div>
    </div>

    <div class="category-product">
        <h1>Información de producto</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3"> 
                <label for="marca55" class="form-label">Marca*</label>
                <input class="form-control" autocomplete="off" list="datalistOptions11" id="marca55" placeholder="">
                    <?php  
                    if ($count_marca5 > 0) { 
                        echo '<datalist id="datalistOptions11">'; 
                        foreach ($marcas55 as $field) { 
                            $marcaName5 = $field['description'];
                            echo '<option value="' . $marcaName5 . '">';  
                        }
                        echo '</datalist>'; 
                        }  ?>    
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">
            <label for="exampleDataList" class="form-label">Modelo*</label>
                <input type="text" class="form-control" id="modelo5" name="modelo5" placeholder=""/>
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">  
            <label for="anios5" class="form-label">Año*</label>
            <input class="form-control" autocomplete="off" list="datalistOptionsA5" id="anios5" placeholder="">
                <?php  
                    $anioActual = date("Y");  
                    echo '<datalist id="datalistOptionsA5">'; 
                    for ($i = $anioActual; $i >= ($anioActual - 100); $i--) {
                        $marcaName = $field['description'];
                        echo '<option value="' . $i . '">';  
                    }
                    echo '</datalist>'; 
                    ?>    
                </div> 
            </div>
            <div class="warning-wrapper" id="error-container-title5"> 
                <i class="fa-solid fa-circle-exclamation"></i> 
                    <div>
                        <p class="error-heading">Campos faltan completar</p>
                        <p class="sm-text">Campos requeridos faltan completar: Información de producto.</p>
                    </div>
               </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Dimensiones</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="section_width" name="section_width"  placeholder="Ancho de sección*">
                     </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="aspect_ratio" name="aspect_ratio" placeholder="Relación de Aspecto*"> 
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="rim_diameter"  name="rim_diameter" placeholder="Diámetro de la llanta*">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="extern_diameter" name="extern_diameter" placeholder="Diámetro externo*">
                 </div>
            </div>
           
             <div class="warning-wrapper" id="error-container-dimen">
                <i class="fa-solid fa-circle-exclamation"></i> 
                        <div>
                            <p class="error-heading">Campos faltan completar</p>
                            <p class="sm-text">Campos requeridos faltan completar: DIMENSIONES.</p>
                        </div>
               </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Especificaciones</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="load_index" name="load_index" placeholder="Índice de carga*">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="speed_index" name="speed_index" placeholder="Índice de velocidad*">
                   </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="maximum_load" name="maximum_load" placeholder="Carga máxima">
                 </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="maximum_speed" name="maximum_speed" placeholder="Velocidad máxima">
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="utqg" name="utqg" placeholder="UTQG">  
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="wear_rate" name="wear_rate" placeholder="Índice de desgaste">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="traction_index" name="traction_index" placeholder="Índice de tracción">
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="temperature_index"  name="temperature_index" placeholder="Índice de temperatura">
           </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="terrain_type"  name="terrain_type" placeholder="Tipo de construcción"> 
               </div>
            </div>
            <div class="warning-wrapper" id="error-container-espec">
                <i class="fa-solid fa-circle-exclamation"></i> 
                        <div>
                            <p class="error-heading">Campos faltan completar</p>
                            <p class="sm-text">Campos requeridos faltan completar: Especificaciones.</p>
                        </div>
               </div>
               
        
        </div>
    </div>
    <div class="category-product">
        <h1>Tecnología</h1>
        <p class="sm-title">¿Es Runflat?</p>
        <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="runflat" id="inlineRadio11" value="Y">
                    <label class="form-check-label" for="inlineRadio11">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="runflat" id="inlineRadio22" value="N">
                    <label class="form-check-label" for="inlineRadio22">No</label>
                </div>
        <p class="sm-title">Tracción</p>
        <div class="traction-wrapper">
            <div class="traction-left-section">
                <div class="traction-text" onclick="setTraccion5('Direccional')">Direccional</div>
                <div class="traction-text" onclick="setTraccion5('Transicional')">Transicional</div>
                <div class="traction-text" onclick="setTraccion5('Mixto')">Mixto</div>
                <div class="traction-text" onclick="setTraccion5('Otros')">Otros</div>
               
            </div>
            <div class="traction-right-section">
                <input class="traction-btn" disabled placeholder="Escribir otro " id="traction_index5" name="traction_index5"/>
            </div>
        </div>
        <p class="sm-title" style="margin-top: 55px;">Diseño de la banda de rodadura</p>
        <div class="mb-3">
             <input type="text" class="form-control" id="tread_design" name="tread_design" placeholder="Diseño de la banda de rodadura" style="width: 466px;">
    </div>
    </div>
    <div class="category-product">
        <h1>Uso y condición del producto</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="type_of_service" name="type_of_service" placeholder="Tipo de servicio">
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Tipo de Vehículo">
              </div>
            </div> 
           
        </div>
        <p class="sm-title">Temporada</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="season" id="inlineRadio1s" value="Invierno">
            <label class="form-check-label" for="inlineRadio1">Invierno</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="season" id="inlineRadio2s" value="Verano">
            <label class="form-check-label" for="inlineRadio2">Verano</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="season" id="inlineRadio3s" value="All Season">
            <label class="form-check-label" for="inlineRadio3">All Season</label>
        </div>
       
        <p class="sm-title">Tipo de terreno</p>
        <div class="traction-wrapper" >
            <div class="traction-left-section">
                <div class="traction-text st" onclick="setTipoT('HT')">HT</div>
                <div class="traction-text st" onclick="setTipoT('AT')">AT</div>
                <div class="traction-text st" onclick="setTipoT('MT')">MT</div>
                <div class="traction-text st" onclick="setTipoT('ST')">ST</div>
                <div class="traction-text st" onclick="setTipoT('Otros')">Otros</div>
               
            </div>
            <div class="traction-right-section">
                <input class="traction-btn" name="land_type" id="land_type">Escribir otro</button>
            </div>
        </div>
        <p class="sm-title" style="margin-top:40px; margin-bottom:10px !important;">Condición actual del producto</p>
        <p class="sm-text" style="margin-top:0px !important;">Selecciona la condición actual de tu producto</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault15" value="Nuevo">
            <label class="form-check-label" for="flexRadioDefault15">
                Nuevo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault25" value="Usado">
            <label class="form-check-label" for="flexRadioDefault25">
                Usado
            </label>
        </div>
        <div class="warning-wrapper" id="error-container-condicion5">
             <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                <p class="error-heading">Campos faltan completar</p>
                <p class="sm-text">Campos requeridos faltan completar: CONDICIÓN DEL PRODUCTO.</p>
            </div>
      </div>
       
    </div>
    <div class="category-product">
        <h1>Ubicación de publicación</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">
                    <label for="region5" class="form-label">Región*</label>
                    <select id="region5" required name="region5"  class="region-select5"></select>  
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">
                    <label for="city5" class="form-label">Comunas*</label>
                    <select id="city5" required name="city5"  class="comuna-select5"></select>  
                </div>
            </div>
            <div class="warning-wrapper" id="error-container-ubicacion5">
                <i class="fa-solid fa-circle-exclamation"></i> 
            <div>
                <p class="error-heading">Campos faltan completar</p>
                <p class="sm-text">Campos requeridos faltan completar: UBICACION.</p>
            </div>
</div>
        </div>
    </div>
    <div class="category-product">
        <h1>Precio</h1>
        <p class="sm-title">Ingresa los precios</p>
        <div class="kilometer" style="margin-right:20px !important;">
        <div class="input-group mb-3"  id="price522" style="width: 403px;"> 
                <input type="text" for="inputGroupSelect01Price5" class="form-control input-control-price"
                        name="price5"  id="price5">
                <select class="form-select" id="inputGroupSelect01Price5"> 
                    <option value="CLP">CLP</option>
                    <option value="USD">USD</option> 
                </select>
            </div> 
        </div>
        <div class="warning-wrapper" id="error-container-price5">
                <i class="fa-solid fa-circle-exclamation"></i> 
            <div>
                <p class="error-heading">Campos faltan completar</p>
                <p class="sm-text">Campos requeridos faltan completar: Precio.</p>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Opciones de Venta</h1>
        <div class="shipping-wrapper">
            <div class="shipping-main">
                <p class="sm-title">Despacho incluido</p>
                
            </div>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadioOptions5" value="Y">
                    <label class="form-check-label" for="inlineRadio1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadioOptions5" value="N">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
           
             
        </div>
    </div>
 
    <div class="category-product2">
        <div class="category-btns-wrapper">
            <div><button type="button" class="grey-btn"  onclick="navigateBackwardCancel()" >Cancelar</button></div>
            <div><button type="button"  class="grey-btn save_public_sale" data-publication-id="1" >Guardar y salir</button><button type="button"
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Continuar</button></div>
        </div>
    </div>
</div>
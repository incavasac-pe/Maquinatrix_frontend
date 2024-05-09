
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
    ?>
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
                <?php                      
                    if ($count_marca > 0) { 
                        echo '<select required  id="marca5" name="marca5" >';
                        echo '<option value="0">Marca*</option>'; 
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
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <input type="text"  class="form-control" id="modelo5" name="modelo5" placeholder="Modelo*"/>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <select name="anios5" id="anios5" required>
                        <?php
                        // Obtener el año actual
                        $anioActual = date("Y");
                        echo '<option value="0">Año</option>';
                        // Crear opciones para los últimos 50 años
                            for ($i = $anioActual; $i >= ($anioActual - 50); $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        ?>
                  </select>
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
                    <input type="number" class="form-control" id="section_width" name="section_width"  placeholder="Ancho de sección**">
                     </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="aspect_ratio" name="aspect_ratio" placeholder="Relación de Aspecto*"> 
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="rim_diameter"  name="rim_diameter" placeholder="Diámetro de la llanta*">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="extern_diameter" name="extern_diameter" placeholder="Diámetro externo*">
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
                    <input type="number" class="form-control" id="load_index" name="load_index" placeholder="Índice de carga*">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="speed_index" name="speed_index" placeholder="Índice de velocidad*">
                   </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="maximum_load" name="maximum_load" placeholder="Carga máxima">
                 </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="maximum_speed" name="maximum_speed" placeholder="Velocidad máxima">
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="utgc" name="utqg" placeholder="UTQG">  
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="wear_rate" name="wear_rate" placeholder="Índice de desgaste">
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="traction_index" name="traction_index" placeholder="Índice de tracción">
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="temperature_index"  name="temperature_index" placeholder="Índice de temperatura">
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
                <div class="traction-text" onclick="setTraccion('Direccional')">Direccional</div>
                <div class="traction-text" onclick="setTraccion('Transicional')">Transicional</div>
                <div class="traction-text" onclick="setTraccion('Mixto')">Mixto</div>
                <div class="traction-text" onclick="setTraccion('O')">Otros</div>
               
            </div>
            <div class="traction-right-section">
                <input class="traction-btn" placeholder="Escribir otro " id="traction_index" name="traction_index"/>
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
       
    </div>
    <div class="category-product">
        <h1>Ubicación de publicación</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <?php                                            
                    if ($count_regiones > 0) { 
                            echo '<select required id="region5" name="region5">';
                            echo '<option value="0">Región*</option>'; 
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
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <?php 
                    require 'comunas.php';
                    // Generar el select de comunas
                    echo '<select required  id="city5" name="city5">';
                    echo '<option value="0" selected >Comunas*</option>'; 
                    foreach ($comunas as $comuna) {
                        echo '<option value="' . $comuna . '">' . $comuna . '</option>';
                    }
                    echo '</select>';
                    ?> 

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
            <div class="input-group " id="km_input" style="width: 273px;">
                <input type="number" class="form-control input-control-price" placeholder="En pesos*"
                name="price5"  id="price5">            
            </div>
            <div class="warning-wrapper" id="error-container-price5">
                <i class="fa-solid fa-circle-exclamation"></i> 
                <div>
                    <p class="error-heading">Campos faltan completar</p>
                    <p class="sm-text">Campos requeridos faltan completar: PRECIO.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Opciones de Venta</h1>
        <div class="shipping-wrapper">
            <div class="shipping-main">
                <p class="sm-title">Despacho incluido</p>
                <p class="sm-text">Es un hecho establecido hace demasiado tiempo que un lector se disaerá con el
                    contenido del texto de <br /> un sitio mientras.</p>
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
           
                <div class="warning-wrapper" id="error-container-desp5">
                <i class="fa-solid fa-circle-exclamation"></i> 
                <div>
                    <p class="error-heading">Campos faltan completar</p>
                    <p class="sm-text">Campos requeridos faltan completar: Despacho incluido.</p>
                </div>
        </div>
        </div>
    </div>
    <div class="error-container hidden">
        <i class="fa-solid fa-circle-xmark"></i>
        <div> 
            <p class="sm-text">Campos requeridos faltan completar </p>
        </div>
    </div>
    <div class="category-product2">
        <div class="category-btns-wrapper">
            <div><button type="button" class="grey-btn">Cancelar</button></div>
            <div><button type="button" class="grey-btn" id="save_public1">Guardar y salir</button><button type="button"
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Continuar</button></div>
        </div>
    </div>
</div>
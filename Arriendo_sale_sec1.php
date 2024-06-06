<?php 

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
$host = $_SERVER['HTTP_HOST']; 
$uri = $_SERVER['REQUEST_URI']; 
$url_publi = $protocol . '://' . $host; 


   $baseUrl = getenv('URL_API'); 
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

    $count_m = 0;
    $url99 = $baseUrl.'/list_machine'; 
    $response599= file_get_contents($url99);
    if ($response599 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response599, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $maquina = $data['data'];

           $count_m = $data['count'];
       } else {
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
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
            <h1>Categoría y tipo de producto</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button onclick="setCategory(1,'Maquinaria y vehículos')" class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="true"><img
                    src="./assets/img/excavator.png" alt="excavator" />
                  <p>Maquinaria y<br /> vehículos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button   onclick="setCategory(5,'Equipos y herramientas')" class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="false"><img
                    src="./assets/img/hand-drill.png" alt="hand-drill" />
                  <p>Equipos y<br /> herramientas </p>
                </button>
              </li>
             
            </ul>

            <p>Tipo de producto</p>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                  <?php  
                      if ($count_industry > 0) { 
                          echo '<label for="exampleDataList" class="form-label">Tipo industria*</label>
                          <select required  id="industria" name="industria"  >';
                          echo '<option value="0"></option>'; 
                          foreach ($industry as $field) {
                              $id = $field['id_product_type'];
                              $industryName = $field['description'];
                              echo '<option value="' . $id . '"'; 
                              if ($id == $industry) {
                                  echo ' selected';
                              }  
                              echo '>' . $industryName. '</option>';
                          }
                          echo '</select> ';
                
                        }  ?>   
                       

                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">                
              
                <?php  
                      if ($count_m > 0) { 
                          echo '<label for="exampleDataList" class="form-label">Tipo maquinaria*</label>
                          <select required  id="id_machine" name="id_machine" >';
                          echo '<option value="0"></option>'; 
                          foreach ($maquina as $field) {
                              $id = $field['id_machine'];
                              $maquinaName = $field['description'];
                              echo '<option value="' . $id . '"'; 
                              if ($id == $maquinaName) {
                                  echo ' selected';
                              }  
                              echo '>' . $maquinaName. '</option>';
                          }
                          echo '</select> ';
                
                        }  ?>   
                  
                </div>
              </div>
            </div> 
             <div class="warning-wrapper" id="error-container-tipo">
             <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        <p class="error-heading">Campos faltan completar</p>
                        <p class="sm-text">Campos requeridos faltan completar: CATEGORIA O TIPO DE PRODUCTO.</p>
                    </div>
           </div>
          </div>
        
        </div>
       

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade " id="pills-publish1" role="tabpanel" aria-labelledby="pills-publish1-tab"  tabindex="0">
        
         <div class="container">
                        <div class="category-product">
                            <h1>Título y descripción de publicación</h1>
                            <p class="sm-title">Arma el título para tu publicación. Indica el producto, marca y modelo.</p>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Título de publicación*">
                            <p class="text-grey">Ej: Construcción Excavadora de las mejores del mundo</p>
                            <p class="sm-title">Describe tu publicación</p>
                            <textarea name="descrip" class="form-control text-container" id="descrip" rows="3"></textarea>
                            <div id="charCount" class="char-count">Caracteres (0/10000)</div>
                        </div>

                        <div class="category-product">
                            <h1>Información de producto</h1>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="mb-3"> 
                                    <label for="marca" class="form-label">Marca*</label>
                                    <input class="form-control" autocomplete="off" list="datalistOptions" id="marca" placeholder="">
                                      <?php  
                                        if ($count_marca > 0) { 
                                            echo '<datalist id="datalistOptions">'; 
                                            foreach ($marca as $field) { 
                                                $marcaName = $field['description'];
                                                echo '<option value="' . $marcaName . '">';  
                                            }
                                            echo '</datalist>'; 
                                            }  ?>    
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="mb-3">
                                    <label for="exampleDataList" class="form-label">Modelo*</label>
                                     <input type="text" class="form-control" id="modelo" name="modelo" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="mb-3">  
                                    <label for="anios" class="form-label">Año*</label>
                                    <input class="form-control" autocomplete="off" list="datalistOptionsA" id="anios" placeholder="">
                                      <?php  
                                            $anioActual = date("Y");  
                                            echo '<datalist id="datalistOptionsA">'; 
                                            for ($i = $anioActual; $i >= ($anioActual - 100); $i--) {
                                                $marcaName = $field['description'];
                                                echo '<option value="' . $i . '">';  
                                            }
                                            echo '</datalist>'; 
                                            ?>    
                                     </div> 
                                  
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 engine_number" >
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="engine_number"  id="engine_number"  placeholder="N°. de Motor">
                                        <p class="text-grey">Ej. de N°. de Motor: X123123124123</p>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 chasis_number" >
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="chasis_number" id="chasis_number" placeholder="N°. de Chasis/VIN">
                                        <p class="text-grey">Ej. de VIN: 1G1RC6E42BUXXXXXX</p>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 patente"  >
                                    <div class="mb-3">
                                        <input type="text" class="form-control"  name="patente" id="patente" placeholder="Patente">
                                  </div>
                                </div>
                            </div>
                            <div class="warning-wrapper" id="error-container-title">
                            <i class="fa-solid fa-circle-exclamation"></i>
                                <div>
                                    <p class="error-heading">Campos faltan completar</p>
                                    <p class="sm-text">Campos requeridos faltan completar: INFORMACION DE PRODUCTO.</p>
                                </div>
                            </div>
                        </div>
                        <div class="category-product">
                            <h1>Características Técnicas</h1>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group mb-3"   style="width: 450px;"> 
                                        <input  style="width: 270px;" type="text" class="form-control" id="PesoNeto"  name="PesoNeto" placeholder="Peso Neto">
                                        <select class="form-select" id="inputGroupSelectPeso"> 
                                            <option value="Tonelada">Tonelada</option>
                                            <option value="Kilogramos">Kilogramos</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group mb-3"   style="width: 450px;"> 
                                <input  style="width: 270px;" type="text" class="form-control" name="Potencia"  id="Potencia" placeholder="Potencia">
                                    <select class="form-select" id="inputGroupSelectPotencia"> 
                                        <option value="HP">HP</option>
                                        <option value="kW">kW</option> 
                                        <option value="CV">CV</option> 
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group mb-3"   style="width: 450px;"> 
                                    <input  style="width: 270px;" type="text" class="form-control" name="Cilindrada"  id="Cilindrada" placeholder="Cilindrada (CC)">
                                        <select class="form-select" id="inputGroupSelectCilindrada"> 
                                            <option value="CC" selected>CC</option> 
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group mb-3"   style="width: 450px;"> 
                                <input  style="width: 270px;" type="text" class="form-control" id="Torque"  name="Torque"  placeholder="Torque (NM)">
                                    <select class="form-select" id="inputGroupSelectTorque"> 
                                        <option value="NM" selected>NM</option> 
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="input-group mb-3"   style="width: 450px;"> 
                                    <input style="width: 270px;" type="text" class="form-control" id="mixed_consumption" name="mixed_consumption"  placeholder="Consumo Mixto">
                                        <select class="form-select" id="inputGroupSelectConsumo"> 
                                            <option value="km/L" selected>km/L</option> 
                                            <option value="l/h" selected>l/h</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="sm-title">Transmisión</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transmission" id="inlineRadio1" value="Manual">
                                <label class="form-check-label" for="inlineRadio1">Manual</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transmission" id="inlineRadio2" value="Automática">
                                <label class="form-check-label" for="inlineRadio2">Automática</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transmission" id="inlineRadio3" value="NoClasifica">
                                <label class="form-check-label" for="inlineRadio3">No Clasifica</label>
                            </div>
                            <p class="sm-title">Combustible</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel1" value="Diésel">
                                <label class="form-check-label" for="inlineRadioFuel1">Diésel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel2" value="Bencina">
                                <label class="form-check-label" for="inlineRadioFuel2">Bencina</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel3" value="NoClasifica">
                                <label class="form-check-label" for="inlineRadioFuel3">No Clasifica</label>
                            </div>
                            <p class="sm-title">Tracción</p>
                            <div class="traction-wrapper">
                                <div class="traction-left-section">
                                    <div class="traction-text"  onclick="setTraccion('4X2')">4X2</div>
                                    <div class="traction-text"  onclick="setTraccion('2X2')">2X2</div>
                                    <div class="traction-text"  onclick="setTraccion('6X4')">6X4</div>
                                    <div class="traction-text"  onclick="setTraccion('4X4')">4X4</div>
                                    <div class="traction-text"  onclick="setTraccion('6X6')">6X6</div>
                                    <div class="traction-text"  onclick="setTraccion('8X4')">8X4</div>
                                    <div class="traction-text"  onclick="setTraccion('Otros')">Otros</div>
                                    <div class="traction-text"  onclick="setTraccion('No clasifica')">No clasifica</div>
                                </div>
                                <div class="traction-right-section">
                                    <input class="traction-btn" disabled placeholder="Escribir otro" id="traction_index1"  />
                                </div>
                            </div>
                            <div class="maintenance-wrapper">
                                <div>
                                    <p class="sm-title">Incluye mantenciones programadas</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="maintenance" id="maintenance1" value="Y">
                                        <label class="form-check-label" for="maintenance1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="maintenance" id="maintenance2" value="N">
                                        <label class="form-check-label" for="maintenance2">No</label>
                                    </div>
                                </div>
                                <div>
                                    <p class="sm-title">Mantenciones incluyen visita técnica</p>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical" id="technical1" value="Y">
                                        <label class="form-check-label" for="technical1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="technical" id="technical2" value="N">
                                        <label class="form-check-label" for="technical2">No</label>
                                    </div>
                                </div>
                            </div>
                            <p class="sm-title">Mantenciones incluyen suministro</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maintenance_suppy" id="maintenance_suppy1" value="Y">
                                <label class="form-check-label" for="maintenance_suppy1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maintenance_suppy" id="maintenance_suppy2" value="N">
                                <label class="form-check-label" for="maintenance_suppy2">No</label>
                            </div>
                            <p class="sm-title">Condición actual del producto *</p>
                            <p class="sm-text">Selecciona la condición actual de tu producto</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Nuevo">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nuevo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Usado">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Usado
                                </label>
                            </div>
                            <div class="warning-wrapper" id="error-container-condicion">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <div>
                                    <p class="error-heading">Campos faltan completar</p>
                                    <p class="sm-text">Campos requeridos faltan completar: CONDICIÓN DEL PRODUCTO.</p>
                                </div>
                        </div>
                            <div class="kilometer-box-wrapper">
                                <div class="kilometer" style="margin-right:20px !important;">
                                    <div class="input-group" id="km_input">
                                        <input type="text" class="form-control input-control-km" placeholder="Kilometros recorridos"
                                        name="KilometrosRecorridos"   id="KilometrosRecorridos">
                                        <div class="input-group-addon-km">
                                            Km.
                                        </div>
                                    </div>
                                    <p class="text-grey">Ej. Kilómetros recorridos: 8 000 km.</p>
                                </div>
                                <div class="hourometer">
                                    <div class="input-group" id="km_input">
                                        <input type="text" class="form-control input-control-km" placeholder="Horómetro" name="Horometro" id="Horometro">
                                        <div class="input-group-addon-km">
                                            Hrs.
                                        </div>

                                    </div>
                                    <p class="text-grey">Ej. Odómetro: 120 hrs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="category-product">
                          <h1>Precio </h1>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="price_type" id="price_type1" value="H">
                                <label class="form-check-label" for="price_type1">Precio por hora</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="price_type" id="price_type2" value="C">
                                <label class="form-check-label" for="price_type2">Cotizar</label>
                            </div>                        
                            <p class="sm-title">Ingresa la tarifa que cobrarás por hora</p>
                            <div class="input-group mb-3"  id="km_input" style="width: 403px;"> 
                                <input type="text" for="inputGroupSelect01Price" class="form-control input-control-price"
                                        name="price"  id="price">
                                <select class="form-select" id="inputGroupSelect01Price"> 
                                    <option value="CLP">CLP</option>
                                    <option value="USD">USD</option> 
                                </select>
                            </div>
                            
                            <div class="warning-wrapper" id="error-container-price">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <div>
                                    <p class="error-heading">Campos faltan completar</p>
                                    <p class="sm-text">Campos requeridos faltan completar: PRECIO.</p>
                                </div>
                            </div>
                        </div>
                        <div class="category-product">
                            <h1>Ubicación</h1>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="mb-3">
                                    <label for="exampleDataList" class="form-label">Región*</label>
                                    <?php                                            
                                    if ($count_regiones > 0) { 
                                            echo '<select required id="region" name="region">';
                                            echo '<option value="0" selected ></option>'; 
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
                                    <label for="exampleDataList" class="form-label">Comunas*</label>
                                    <?php 
                                        require 'comunas.php';
                                        // Generar el select de comunas
                                        echo '<select required  id="city" name="city">';
                                        echo '<option value="0" selected ></option>'; 
                                        foreach ($comunas as $comuna) {
                                            echo '<option value="' . $comuna . '">' . $comuna . '</option>';
                                        }
                                        echo '</select>';
                                        ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="warning-wrapper" id="error-container-ubicacion">
                            <i class="fa-solid fa-circle-exclamation"></i>
                                    <div>
                                        <p class="error-heading">Campos faltan completar</p>
                                        <p class="sm-text">Campos requeridos faltan completar: UBICACION.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="category-product">
                            <div class="grey-border-wrapper">
                                <h1>Certificado de Operatividad</h1>
                                <div class="shipping-wrapper">
                                    <div class="shipping-main">
                                        <p class="sm-title"><strong>¿Incluye Certificado de Operatividad?</strong></p>
                                        <p class="sm-text">El certificado de operatividad se adquiere después de una revisión exhaustiva del representate de la 
                                          <br />mar o vehículo, o bien, mediante un taller certificado.</p>
                                    </div>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="certificadoP" id="inlineRadio1Cert"
                                                value="Y">
                                            <label class="form-check-label" for="inlineRadio1Cert">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="certificadoP" id="inlineRadio2Cert"
                                                value="N">
                                            <label class="form-check-label" for="inlineRadio2Cert">No</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="grey-box-wrapper">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label dark-grey-text">Fecha de Certificado</label>
                                    <input type="text" class="form-control"  name="dateCerti"  id="dateCerti" placeholder="DD/MM/AAAA">
                                </div>
                                <div>
                                    <label for="exampleFormControlInput11" class="form-label dark-grey-text">Adjuntar Archivo</label>
                                    <div class="input-group mb-3">

                                    <input type="file" id="pdfFile" name="pdfFile" accept=".pdf" class="form-control input-addon" 
                                        placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                                        aria-describedby="basic-addon2" >
                                        <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
                                    </div>
                                    <p class="dark-grey-text-sm">Se admiten los formatos PDF. Máx 20 MB</p>
                                    <div class="warning-wrapper" style="display: none;" id="error-container-pdf">
                                      <i class="fa-solid fa-circle-exclamation"></i>
                                        <div>                                            
                                            <p class="sm-text">El formato debe ser PDF ó el archivo excede el tamaño máximo permitido (20 MB).</p>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-product">
                            <div class="grey-border-wrapper">
                                <h1>Póliza de seguro</h1>
                                <div class="shipping-wrapper">
                                    <div class="shipping-main">
                                        <p class="sm-title">¿Incluye Póliza de seguro?</p>
                                        <p class="sm-text">Si aseguraste tu máquina, vehículo o equipo, adjunta aquí una foto o documento
                                            escaneado de la póliza <br />
                                            que sea legible.</p>
                                    </div>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="insurance" id="insurance1" value="Y">
                                            <label class="form-check-label" for="insurance1">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="insurance" id="insurance2" value="N">
                                            <label class="form-check-label" for="insurance2">No</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="grey-box-wrapper2">

                                <p class="dark-grey-text">Adjuntar Archivo</p>
                                <p class="dark-grey-text-md">Adjunta la Póliza de Seguro de la maquinaria que estás publicando. Descuida, no
                                    compartiremos con nadie este documento, lo validaremos para marcar su autenticidad en tu publicación.
                                </p>
                                <p class="dark-grey-text-md">Se admiten los formatos PDF. Máx 20 MB</p>
                                <div class="input-group mb-3" style="width: 223px;">

                                    <input type="file"  accept=".pdf"  id="pdfFile-other" name="pdfFile-other"  class="form-control input-addon" 
                                        placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                                        aria-describedby="basic-addon2">
                                    <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
                                    <div class="warning-wrapper" style="display: none;" id="error-container-pdf-other">
                                      <i class="fa-solid fa-circle-exclamation"></i>
                                        <div>                                            
                                            <p class="sm-text">El formato debe ser PDF ó el archivo excede el tamaño máximo permitido (20 MB).</p>
                                        </div>
                                  </div>
                                </div>
                            </div>                          
                        </div>

                        <div class="category-product">
                            <h1>Opciones de Arriendo</h1>
                            <div class="grey-border-wrapper" style="margin-bottom:20px;"> 
                                <div class="shipping-wrapper">
                                    <div class="shipping-main">
                                        <p class="sm-title" style="margin-top:0px !important;">Despacho incluido</p>
                                        <p class="sm-text">Indica si ofreces despacho, y de hacerlo, recuerda especificar en la descripción del aviso las condiciones y <br/>si va incluido en el precio hora publicado..</p>
                                    </div>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shipping" id="shipping1" value="Y">
                                            <label class="form-check-label" for="shipping1">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="shipping" id="shipping2" value="N">
                                            <label class="form-check-label" for="shipping2">No</label>
                                        </div>
                                    </div>
                                </div>                                

                            </div>
                            <div class="grey-border-wrapper" style="height:114px; margin-bottom:20px;">
                            <div class="shipping-wrapper">
                                    <div class="shipping-main">
                                        <p class="sm-title" style="margin-top:0px !important;">Operador incluido</p>
                                        <p class="sm-text">Si ofreces este servicio, recuerda aclarar si el precio hora que estableciste lo incluye o si se cobra aparte.</p>
                                    </div>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="operator" id="operator1" value="Y">
                                            <label class="form-check-label" for="operator1">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="operator" id="operator2" value="N">
                                            <label class="form-check-label" for="operator2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grey-border-wrapper" style="margin-bottom:20px;"> 

                            <div class="shipping-wrapper">
                                <div class="shipping-main">
                                    <p class="sm-title" style="margin-top:0px !important;">Contrato de Arriendo Maquinatrix</p>
                                    <p class="sm-text">Siempre es bueno formalizar los negocios y resguardarse. Indica si te gustaría recibir este servicio.</p>
                                </div>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Machinery" id="Machinery1" value="Y">
                                        <label class="form-check-label" for="Machinery1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Machinery" id="Machinery2" value="N">
                                        <label class="form-check-label" for="Machinery2">No</label>
                                    </div>
                                </div>
                            </div>                

                    </div>
                    <div class="grey-border-wrapper" >  
                    <div class="shipping-wrapper">
                        <div class="shipping-main">
                            <p class="sm-title" style="margin-top:0px !important;">Garantía de Arriendo</p>
                            <p class="sm-text">Muchas veces los propietarios pasan malos ratos por reparaciones imprevistas durante un alquiler. <br/> Indica si te gustaría proteger tu máquina con nuestra garantía.</p>
                        </div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rental" id="rental1" value="Y">
                                <label class="form-check-label" for="rental1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rental" id="rental2" value="N">
                                <label class="form-check-label" for="rental2">No</label>
                            </div>
                        </div>
                    </div> 
                   </div>
                </div>

                <div class="category-product2">
                    <div class="category-btns-wrapper">
                        <div><button type="button" class="grey-btn" onclick="navigateBackwardCancel()">Cancelar</button></div>
                        <div><button type="button" class="grey-btn">Guardar y salir</button><button type="button"
                           class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Continuar</button></div>
                    </div>
                </div>
            </div>
          </div>          
        </div> 
 
 <script>   
 var id_categoria = 0;
 var categoria = '';

 // Función para asignar un valor a la variable global
function setCategory(value,text) {
  id_categoria = value;
  categoria = text;
  console.log("la categoria es",id_categoria)
    if (id_categoria==5) {
       $('.engine_number, .chasis_number, .patente').hide(); // Ocultar los elementos de entrada
    }else{
        $('.engine_number, .chasis_number, .patente').show();
    }
 
}
  function searchTypeMachine(industria){   
   var url = '<?=$baseUrl?>/list_machine?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#id_machine');

              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option value="0">').prop('selected', true).text('Tipo de Máquina *');
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
              selectElement.empty();  
              var defaultOption = $('<option value="0">').prop('selected', true).text('Marca*');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.description+' >').text(element.description);
              selectElement.append(option);   
                        
          });  
          var selectElement1 = $('#marca1'); 
              selectElement1.empty();  
              var defaultOption1 = $('<option value="0">').prop('selected', true).text('Marca*');
              selectElement1.append(defaultOption1);
              res.data.forEach(function(element) { 
              var option1 = $('<option value='+element.description+' >').text(element.description);
              selectElement1.append(option1);   
                        
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
              var defaultOption = $('<option value="0">').prop('selected', true).text('Modelo*');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.description+' >').text(element.description);
              selectElement.append(option);             
          });  
          var selectElement1 = $('#modelo1'); 
              // Limpiar las opciones existentes
              selectElement1.empty(); 
                // Agregar la opción por defecto
              var defaultOption1 = $('<option value="0">').prop('selected', true).text('Modelo*');
              selectElement1.append(defaultOption1);
              res.data.forEach(function(element) { 
              var option1 = $('<option value='+element.description+' >').text(element.description);
              selectElement1.append(option1);             
          }); 
      },
      error: function(error) {
         console.error('Error al enviar los datos actualizados');
      }
  });
}

</script>
<script>
$(document).ready(function() {
    $('#price').on('input', function() {
        var value = $(this).val().replace(/\D/g, '');
        var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $(this).val(formattedValue);
  });
  

  $('#pdfFile').change(function() {
    var file = $(this).prop('files')[0];

    // Verificar si se seleccionó un archivo
    if (file) {
      // Verificar la extensión del archivo
      var fileName = file.name;
      var fileExtension = fileName.split('.').pop().toLowerCase();
      if (fileExtension !== 'pdf') {
         $("#error-container-pdf").show();      
        $(this).val(''); // Limpiar el valor del campo de archivo
        return;
      }
    
      // Verificar el tamaño del archivo
      var fileSizeInBytes = file.size;
      var fileSizeInMB = fileSizeInBytes / (1024 * 1024); // Convertir a MB
      var maxFileSizeInMB = 20;
      if (fileSizeInMB > maxFileSizeInMB) {
        $("#error-container-pdf").show(); 
        alert('El archivo excede el tamaño máximo permitido (20 MB).');
        $(this).val(''); // Limpiar el valor del campo de archivo
        return;
      }
      $("#error-container-pdf").hide();  
    }
  });
   $('#pdfFile-other').change(function() {
    var file = $(this).prop('files')[0];

    // Verificar si se seleccionó un archivo
    if (file) {
      // Verificar la extensión del archivo
      var fileName = file.name;
      var fileExtension = fileName.split('.').pop().toLowerCase();
      if (fileExtension !== 'pdf') {
         $("#error-container-pdf-other").show();      
        $(this).val(''); // Limpiar el valor del campo de archivo
        return;
      }
    
      // Verificar el tamaño del archivo
      var fileSizeInBytes = file.size;
      var fileSizeInMB = fileSizeInBytes / (1024 * 1024); // Convertir a MB
      var maxFileSizeInMB = 20;
      if (fileSizeInMB > maxFileSizeInMB) {
        $("#error-container-pdf-other").show(); 
        alert('El archivo excede el tamaño máximo permitido (20 MB).');
        $(this).val(''); // Limpiar el valor del campo de archivo
        return;
      }
      $("#error-container-pdf-other").hide();  
    }
  });

   
});
</script>
<script>
    $('#industria').selectize({ normalize: true });
    $('#id_machine').selectize({ normalize: true }); 
    $('#region').selectize({ normalize: true });
    $('#city').selectize({ normalize: true });
    
</script>
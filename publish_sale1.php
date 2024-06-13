<?php 

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
$host = $_SERVER['HTTP_HOST']; 
$uri = $_SERVER['REQUEST_URI']; 
$url_publi = $protocol . '://' . $host; 
  
   $baseUrl = getenv('URL_API'); 

   
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
   
 
    ?>
<div class="container">
    <div class="category-product">
        <h1>Título y descripción de publicación</h1>
        <p class="sm-title">Arma el título para tu publicación. Indica el producto, marca y modelo.</p>
        <input type="text" class="form-control" id="title" name="title" placeholder="Título de publicación*">
        <p class="text-grey"></p>
        <p class="sm-title">Describe tu publicación</p>
        <textarea id="descrip" name="descrip"  class="form-control text-container"  rows="3"></textarea>
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
                <div class="mb-3" >
                    <input type="text" class="form-control" name="engine_number"  id="engine_number"  placeholder="N°. de Motor">
                    <p class="text-grey" >Ej. de N°. de Motor: X123123124123</p>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 chasis_number" >
                <div class="mb-3" >
                    <input type="text"  class="form-control"  name="chasis_number" id="chasis_number" placeholder="N°. de Chasis/VIN">
                    <p class="text-grey">Ej. de VIN: 1G1RC6E42BUXXXXXX</p>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 patente" >
                <div class="mb-3">
                    <input type="text" class="form-control"  name="patente" id="patente" placeholder="Patente">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 factory_code" >
                <div class="mb-3">
                <label for="exampleDataList" class="form-label">Número de Parte</label>
                <input type="hidden"  class="form-control" id="factory_code" name="factory_code"
                        placeholder="Número de Parte (código de fábrica producto)">

                </div>
            </div>
        </div>
        <div class="warning-wrapper" id="error-container-title"> 
            <i class="fa-solid fa-circle-exclamation"></i> 
                <div>
                    <p class="error-heading">Campos faltan completar</p>
                    <p class="sm-text">Campos requeridos faltan completar: Información de producto.</p>
                </div>
            </div>
    </div>
    <div class="category-product">
    <h1>Especificaciones</h1>
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
                <div class="mb-3">  
                </div>
            </div>
        </div>
        <p class="sm-title" id="title-transmission">Transmisión</p>
        <div class="form-check form-check-inline" id="t-transmission">
            <input class="form-check-input" type="radio" name="transmission" id="inlineRadio1" value="Manual">
            <label class="form-check-label" for="inlineRadio1">Manual</label>
        </div>

        <div class="form-check form-check-inline" id="t-transmission">
            <input class="form-check-input" type="radio" name="transmission" id="inlineRadio2" value="Automática">
            <label class="form-check-label" for="inlineRadio2">Automática</label>
        </div>
        <div class="form-check form-check-inline" id="t-transmission">
            <input class="form-check-input" type="radio" name="transmission" id="inlineRadio3" value="NoClasifica">
            <label class="form-check-label" for="inlineRadio3">No Clasifica</label>
        </div>
        <p class="sm-title"  id="t-combustible">Combustible</p>
        <div class="form-check form-check-inline" id="t-combustible">
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel1" value="Diésel">
            <label class="form-check-label" for="inlineRadioFuel1">Diésel</label>
        </div>

        <div class="form-check form-check-inline" id="t-combustible">
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel2" value="Bencina">
            <label class="form-check-label" for="inlineRadioFuel2">Bencina</label>
        </div>
        <div class="form-check form-check-inline" id="t-combustible">
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadioFuel3" value="NoClasifica">
            <label class="form-check-label" for="inlineRadioFuel3">No Clasifica</label>
        </div>
        <p class="sm-title"  id="t-tranx">Tracción</p>
        <div class="traction-wrapper"  id="t-tranx">
            <div class="traction-left-section">
                <div class="traction-text" onclick="setTraccion('4X2')">4X2</div>
                <div class="traction-text" onclick="setTraccion('4X4')">2X2</div>
                <div class="traction-text" onclick="setTraccion('6X4')">6X4</div>
                <div class="traction-text" onclick="setTraccion('4X4')">4X4</div>
                <div class="traction-text" onclick="setTraccion('6X6')">6X6</div>
                <div class="traction-text" onclick="setTraccion('8X4')">8X4</div>
                <div class="traction-text" onclick="setTraccion('Otros')">Otros</div>
                <div class="traction-text"onclick="setTraccion('No clasifica')">No clasifica</div>
            </div>
            <div class="traction-right-section"  id="t-tranx">
                <input class="traction-btn" placeholder="Escribir otro" disabled id="traction_index1"  />
            </div>
        </div>
        <p class="sm-title">Condición actual del producto</p>
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
        <div class="kilometer-box-wrapper" id="kilometer-box-wrapper">
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
                    <input type="text" class="form-control input-control-km" placeholder="Horómetro"  name="Horometro" id="Horometro">
                    <div class="input-group-addon-km">
                        Hrs.
                    </div>

                </div>
                <p class="text-grey">Ej. Odómetro: 120 hrs.</p>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Ubicación</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Región*</label>
                    <select id="region" required name="region"  class="region-select"></select>  
            </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">              
                <div class="mb-3">
                    <label for="city" class="form-label">Comunas*</label>
                    <select id="city" required name="city"  class="comuna-select"></select>  
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
        <h1>Precio</h1>
        <p class="sm-title">Ingresa los precios</p>
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioDelivery1" value="Y">
                    <label class="form-check-label" for="inlineRadioDelivery1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioDelivery2" value="N">
                    <label class="form-check-label" for="inlineRadioDelivery2">No</label>
                </div>
            </div>
        </div>
    </div>
    <div class="error-container" id="error-container">
                    <i class="fa-solid fa-circle-xmark"></i>
                    <div>
                        <p class="error-heading">Campos faltan completar</p>
                        <p class="sm-text text-msg-error">Campos requeridos faltan completar .</p>
                    </div>
                </div>
    <div class="category-product2">
        <div class="category-btns-wrapper">
            <div><button type="button" class="grey-btn" onclick="navigateBackwardCancel()" >Cancelar</button></div>
            <div><button type="button" class="grey-btn save_public_sale" data-publication-id="1" >Guardar y salir</button><button type="button"
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Continuar</button></div>
        </div>
    </div>
</div>
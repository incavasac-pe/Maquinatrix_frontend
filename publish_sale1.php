<div class="container">
    <div class="category-product">
        <h1>Título y descripción de publicación</h1>
        <p class="sm-title">Arma el título para tu publicación. Indica el producto, marca y modelo.</p>
        <input type="text" class="form-control" id="title" name="title" placeholder="Título de publicación*">
        <p class="text-grey">Ej: Construcción Excavadora de las mejores del mundo</p>
        <p class="sm-title">Describe tu publicación</p>
        <textarea id="descrip" name="descrip"  class="form-control text-container"  rows="3"></textarea>
        <div id="charCount" class="char-count">Caracteres (0/10000)</div>
    </div>

    <div class="category-product">
        <h1>Información de producto</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <select required id="marca" name="marca">  
                   </select> 

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <select required  id="modelo" name="modelo"> 
                 </select> 

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <select name="anios"  id="anios"  required>
                        <?php
                        // Obtener el año actual
                        $anioActual = date("Y");
                        echo '<option value="">Año</option>';
                        // Crear opciones para los últimos 50 años
                            for ($i = $anioActual; $i >= ($anioActual - 50); $i--) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        ?>
                  </select>

                </div>
                
            </div> 
          
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" name="engine_number"  id="engine_number"  placeholder="N°. de Motor">
                    <p class="text-grey">Ej. de N°. de Motor: X123123124123</p>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text"  class="form-control"  name="chasis_number" id="chasis_number" placeholder="N°. de Chasis/VIN">
                    <p class="text-grey">Ej. de VIN: 1G1RC6E42BUXXXXXX</p>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control"  name="patente" id="patente" placeholder="Patente">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <input type="hidden"  class="form-control" id="factory_code" name="factory_code"
                        placeholder="Número de Parte (código de fábrica producto)">

                </div>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1 id="category-product">Características Técnicas</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="PesoNeto"  name="PesoNeto" placeholder="Peso Neto">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" name="Potencia"  id="Potencia" placeholder="Potencia">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" name="Cilindrada"  id="Cilindrada" placeholder="Cilindrada (CC)">

                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="Torque"  name="Torque"  placeholder="Torque (NM)">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="mixed_consumption" name="mixed_consumption"  placeholder="Consumo Mixto">


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
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadio1" value="Diésel">
            <label class="form-check-label" for="inlineRadio1">Diésel</label>
        </div>

        <div class="form-check form-check-inline" id="t-combustible">
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadio1" value="Bencina">
            <label class="form-check-label" for="inlineRadio2">Bencina</label>
        </div>
        <div class="form-check form-check-inline" id="t-combustible">
            <input class="form-check-input" type="radio" name="combustible" id="inlineRadio3" value="NoClasifica">
            <label class="form-check-label" for="inlineRadio3">No Clasifica</label>
        </div>
        <p class="sm-title"  id="t-tranx">Tracción</p>
        <div class="traction-wrapper"  id="t-tranx">
            <div class="traction-left-section">
                <div class="traction-text">4X2</div>
                <div class="traction-text">2X2</div>
                <div class="traction-text">6X4</div>
                <div class="traction-text">4X4</div>
                <div class="traction-text">6X6</div>
                <div class="traction-text">8X4</div>
                <div class="traction-text">Otros</div>
                <div class="traction-text">No clasifica</div>
            </div>
            <div class="traction-right-section"  id="t-tranx">
                <input class="traction-btn" placeholder="Escribir otro" id="traction_index1"  />
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
        <div class="kilometer-box-wrapper" id="kilometer-box-wrapper">
            <div class="kilometer" style="margin-right:20px !important;">
                <div class="input-group" id="km_input">
                    <input type="number" class="form-control input-control-km" placeholder="Kilometros recorridos"
                    name="KilometrosRecorridos"   id="KilometrosRecorridos">
                    <div class="input-group-addon-km">
                        Km.
                    </div>

                </div>
                <p class="text-grey">Ej. Kilómetros recorridos: 8 000 km.</p>
            </div>

            <div class="hourometer">
                <div class="input-group" id="km_input">
                    <input type="number" class="form-control input-control-km" placeholder="Horómetro"  name="Horometro" id="Horometro">
                    <div class="input-group-addon-km">
                        Hrs.
                    </div>

                </div>
                <p class="text-grey">Ej. Odómetro: 120 hrs.</p>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Ubicación de publicación</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <?php                                            
                                    if ($count_regiones > 0) { 
                                            echo '<select required id="region" name="region">';
                                            echo '<option value="" selected disabled hidden>Región*</option>'; 
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
                <select required  id="city" name="city">
                    <option value="" selected disabled hidden>Ciudad</option>
                    <option value="1">Coquimbo</option>
                    <option value="2">El Melón</option>
                    <option value="3">Gultro</option>
                </select>

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
                    name="price"  id="price">
                    <div class="input-group-addon-km">
                        CLP
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Y">
                    <label class="form-check-label" for="inlineRadio1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="N">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
        </div>
    </div>
    <div class="error-container hidden">
        <i class="fa-solid fa-circle-xmark"></i>
        <div>
            <p class="error-heading">Campos faltan completar</p>
            <p class="sm-text">Campos requeridos faltan completar: Información de vehículo, Facilidad de entrega,
                Contrato de Arriendo Maquinatrix, Garantía de Arriendo.</p>
        </div>
    </div>
    <div class="category-product2">
        <div class="category-btns-wrapper">
            <div><button type="button" class="grey-btn">Cancelar</button></div>
            <div><button type="button" class="grey-btn">Guardar y salir</button><button type="button"
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Continuar</button></div>
        </div>
    </div>
</div>
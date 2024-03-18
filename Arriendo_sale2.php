<div class="container">
    <div class="category-product">
        <h1>Título y descripción de publicación</h1>
        <p class="sm-title">Arma el título para tu publicación. Indica el producto, marca y modelo.</p>
        <input type="text" class="form-control" id="exampleInputSurname" placeholder="Título de publicación*">
        <p class="text-grey">Ej: Construcción Excavadora de las mejores del mundo</p>
        <p class="sm-title">Describe tu publicación</p>
        <textarea class="form-control text-container" id="exampleFormControlTextarea1" rows="3"></textarea>
        <div id="charCount" class="char-count">Caracteres (0/10000)</div>
    </div>

    <div class="category-product">
        <h1>Información de producto</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <select required>
                        <option value="" selected disabled hidden>Marca*</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <select required>
                        <option value="" selected disabled hidden>Modelo*</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <select required>
                        <option value="" selected disabled hidden>Año</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
            </div>
           
        </div>
    </div>
    <div class="category-product">
        <div class="grey-border-wrapper">


            <h1>Certificado de Operatividad</h1>
            <div class="shipping-wrapper">
                <div class="shipping-main">
                    <p class="sm-title">Despacho incluido</p>
                    <p class="sm-text">Es un hecho establecido hace demasiado tiempo que un lector se disaerá con el
                        contenido del texto de <br /> un sitio mientras.</p>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="Sí">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="grey-box-wrapper">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label dark-grey-text">Fecha de Certificado</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="DD/MM/AAAA">
            </div>
            <div>
                <label for="exampleFormControlInput11" class="form-label dark-grey-text">Adjuntar Archivo</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control input-addon" id="exampleFormControlInput11"
                        placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
                </div>
                <p class="dark-grey-text-sm">Se admiten los formatos PDF, JPG Y PNG.</p>
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
                        <input class="form-check-input" type="radio" name="insurance" id="insurance1" value="Sí">
                        <label class="form-check-label" for="insurance1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="insurance" id="insurance2" value="No">
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
            <p class="dark-grey-text-md">Se admiten los formatos PDF, JPG Y PNG.</p>
            <div class="input-group mb-3" style="width: 223px;">

                <input type="text" class="form-control input-addon" id="exampleFormControlInput11"
                    placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                    aria-describedby="basic-addon2">
                <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
            </div>

        </div>
       
    </div>
    <div class="category-product">
        <h1>Características Técnicas</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="PesoNeto" placeholder="Peso Neto">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="Potencia" placeholder="Potencia">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="Cilindrada" placeholder="Cilindrada (CC)">

                </div>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="Torque" placeholder="Torque (NM)">

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="ConsumoMixto" placeholder="Consumo Mixto">


                </div>
            </div>
        </div>
        <p class="sm-title">Transmisión</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Manual" id="inlineRadio1" value="Manual">
            <label class="form-check-label" for="inlineRadio1">Manual</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Automática" id="inlineRadio2" value="Automática">
            <label class="form-check-label" for="inlineRadio2">Automática</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NoClasifica" id="inlineRadio3" value="NoClasifica">
            <label class="form-check-label" for="inlineRadio3">No Clasifica</label>
        </div>
        <p class="sm-title">Combustible</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Diésel" id="inlineRadio1" value="Diésel">
            <label class="form-check-label" for="inlineRadio1">Diésel</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Bencina" id="inlineRadio2" value="Bencina">
            <label class="form-check-label" for="inlineRadio2">Bencina</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NoClasifica" id="inlineRadio3" value="NoClasifica">
            <label class="form-check-label" for="inlineRadio3">No Clasifica</label>
        </div>
        <p class="sm-title">Tracción</p>
        <div class="traction-wrapper">
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
            <div class="traction-right-section">
                <button class="traction-btn">Escribir otro</button>
            </div>
        </div>
        <div class="maintenance-wrapper">
            <div>
                <p class="sm-title">Incluye mantenciones programadas</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maintenance" id="maintenance1" value="Sí">
                    <label class="form-check-label" for="maintenance1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maintenance" id="maintenance2" value="No">
                    <label class="form-check-label" for="maintenance2">No</label>
                </div>
            </div>
            <div>
                <p class="sm-title">Mantenciones incluyen visita técnica</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="technical" id="technical1" value="Sí">
                    <label class="form-check-label" for="technical1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="technical" id="technical2" value="No">
                    <label class="form-check-label" for="technical2">No</label>
                </div>
            </div>
        </div>


        <p class="sm-title">Mantenciones incluyen suministro</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="maintenance_suppy" id="maintenance_suppy1" value="Sí">
            <label class="form-check-label" for="maintenance_suppy1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="maintenance_suppy" id="maintenance_suppy2" value="No">
            <label class="form-check-label" for="maintenance_suppy2">No</label>
        </div>
        <p class="sm-title">Condición actual del producto</p>
        <p class="sm-text">Selecciona la condición actual de tu producto</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Nuevo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Usado
            </label>
        </div>
        <div class="kilometer-box-wrapper">
            <div class="kilometer" style="margin-right:20px !important;">
                <div class="input-group" id="km_input">
                    <input type="number" class="form-control input-control-km" placeholder="Kilometros recorridos"
                        id="KilometrosRecorridos">
                    <div class="input-group-addon-km">
                        Km.
                    </div>

                </div>
                <p class="text-grey">Ej. Kilómetros recorridos: 8 000 km.</p>
            </div>

            <div class="hourometer">
                <div class="input-group" id="km_input">
                    <input type="number" class="form-control input-control-km" placeholder="Horómetro" id="Horómetro">
                    <div class="input-group-addon-km">
                        Hrs.
                    </div>

                </div>
                <p class="text-grey">Ej. Odómetro: 120 hrs.</p>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Precio por hora</h1>
        <p class="sm-title">Ingresa la tarifa que cobrarás por hora</p>
        <div class="kilometer" style="margin-right:20px !important;">
            <div class="input-group " id="km_input" style="width: 273px;">
                <input type="number" class="form-control input-control-price" placeholder="En pesos*"
                    id="KilometrosRecorridos">
                <div class="input-group-addon-km">
                    CLP
                </div>

            </div>

        </div>
    </div>
    <div class="category-product">
        <h1>Ubicación</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <select required>
                        <option value="" selected disabled hidden>Región*</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <select required>
                        <option value="" selected disabled hidden>Ciudad</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
    <div class="category-product">
        <div class="grey-border-wrapper">


            <h1>Certificado de Operatividad</h1>
            <div class="shipping-wrapper">
                <div class="shipping-main">
                    <p class="sm-title">Despacho incluido</p>
                    <p class="sm-text">Es un hecho establecido hace demasiado tiempo que un lector se disaerá con el
                        contenido del texto de <br /> un sitio mientras.</p>
                </div>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="Sí">
                        <label class="form-check-label" for="inlineRadio1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="grey-box-wrapper">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label dark-grey-text">Fecha de Certificado</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="DD/MM/AAAA">
            </div>
            <div>
                <label for="exampleFormControlInput11" class="form-label dark-grey-text">Adjuntar Archivo</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control input-addon" id="exampleFormControlInput11"
                        placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
                </div>
                <p class="dark-grey-text-sm">Se admiten los formatos PDF, JPG Y PNG.</p>
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
                        <input class="form-check-input" type="radio" name="insurance" id="insurance1" value="Sí">
                        <label class="form-check-label" for="insurance1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="insurance" id="insurance2" value="No">
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
            <p class="dark-grey-text-md">Se admiten los formatos PDF, JPG Y PNG.</p>
            <div class="input-group mb-3" style="width: 223px;">

                <input type="text" class="form-control input-addon" id="exampleFormControlInput11"
                    placeholder="Adjuntar certificado" aria-label="Adjuntar certificado"
                    aria-describedby="basic-addon2">
                <span class="input-group-text input-addon-symbol" id="basic-addon2">@</span>
            </div>

        </div>
        <div class="warning-wrapper">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                <p class="error-heading">Campos faltan completar</p>
                <p class="sm-text">Campos requeridos faltan completar: Información de vehículo, Facilidad de entrega,
                    Contrato de Arriendo Maquinatrix, Garantía de Arriendo.</p>
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
                        <input class="form-check-input" type="radio" name="shipping" id="shipping1" value="Sí">
                        <label class="form-check-label" for="shipping1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="shipping" id="shipping2" value="No">
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
                        <input class="form-check-input" type="radio" name="operator" id="operator1" value="Sí">
                        <label class="form-check-label" for="operator1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="operator" id="operator2" value="No">
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
            <input class="form-check-input" type="radio" name="Machinery" id="Machinery1" value="Sí">
            <label class="form-check-label" for="Machinery1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Machinery" id="Machinery2" value="No">
            <label class="form-check-label" for="Machinery2">No</label>
        </div>
    </div>

</div>
<div class="pdf-container">
    <img src="./assets/img/pdf.png" alt="pdf">
    <a href="#">Descargar muestra.</a>
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
            <input class="form-check-input" type="radio" name="rental" id="rental1" value="Sí">
            <label class="form-check-label" for="rental1">Sí</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rental" id="rental2" value="No">
            <label class="form-check-label" for="rental2">No</label>
        </div>
    </div>

</div>
<div class="pdf-container">
    <img src="./assets/img/pdf.png" alt="pdf">
    <a href="#">Descargar muestra.</a>
</div>

</div>
    </div>

    <div class="error-container">
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
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="2">Cancelar</button></div>
        </div>
    </div>
</div>
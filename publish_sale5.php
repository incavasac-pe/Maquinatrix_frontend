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
        <h1>Dimensiones</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="width" placeholder="Ancho de sección**">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="ratio" placeholder="Relación de Aspecto*">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="rim_diameter" placeholder="Diámetro de la llanta*">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="external_diameter" placeholder="Diámetro externo*">


                </div>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Especificaciones</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="load_index" placeholder="Índice de carga*">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="speed_index" placeholder="Índice de velocidad*">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="maximum_load" placeholder="Carga máxima">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="maximum_speed" placeholder="Velocidad máxima">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="utgc" placeholder="UTQG">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="wear_rate" placeholder="Índice de desgaste">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="traction_index" placeholder="Índice de tracción">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="tempreature_index" placeholder="Índice de temperatura">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="construction_type" placeholder="Tipo de construcción">


                </div>
            </div>
        </div>
    </div>
    <div class="category-product">
        <h1>Tecnología</h1>
        <p class="sm-title">¿Es Runflat?</p>
        <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio11" value="Sí1">
                    <label class="form-check-label" for="inlineRadio11">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio22" value="No1">
                    <label class="form-check-label" for="inlineRadio22">No</label>
                </div>
                <p class="sm-title">Tracción</p>
        <div class="traction-wrapper">
            <div class="traction-left-section">
                <div class="traction-text">Direccional</div>
                <div class="traction-text">Transicional</div>
                <div class="traction-text">Mixto</div>
                <div class="traction-text">Otros</div>
               
            </div>
            <div class="traction-right-section">
                <button class="traction-btn">Escribir otro</button>
            </div>
        </div>
        <p class="sm-title" style="margin-top: 55px;">Diseño de la banda de rodadura</p>
        <div class="mb-3">
                    <input type="text" class="form-control" id="construction_type" placeholder="Tipo de construcción" style="width: 466px;">


                </div>
    </div>
    <div class="category-product">
        <h1>Uso y condición del producto</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="number" class="form-control" id="service_type" placeholder="Tipo de servicio">


                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="vehicle_type" placeholder="Tipo de Vehículo">

                </div>
            </div>
          

           
        </div>
        <p class="sm-title">Transmisión</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Invierno" id="inlineRadio1" value="Invierno">
            <label class="form-check-label" for="inlineRadio1">Invierno</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Verano" id="inlineRadio2" value="Verano">
            <label class="form-check-label" for="inlineRadio2">Verano</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="All Season" id="inlineRadio3" value="All Season">
            <label class="form-check-label" for="inlineRadio3">All Season</label>
        </div>
       
        <p class="sm-title">Tipo de terreno</p>
        <div class="traction-wrapper">
            <div class="traction-left-section">
                <div class="traction-text">HT</div>
                <div class="traction-text">AT</div>
                <div class="traction-text">MT</div>
                <div class="traction-text">ST</div>
                <div class="traction-text">Otros</div>
               
            </div>
            <div class="traction-right-section">
                <button class="traction-btn">Escribir otro</button>
            </div>
        </div>
        <p class="sm-title" style="margin-top:40px; margin-bottom:10px !important;">Condición actual del producto</p>
        <p class="sm-text" style="margin-top:0px !important;">Selecciona la condición actual de tu producto</p>
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
       
    </div>
    <div class="category-product">
        <h1>Ubicación de publicación</h1>
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
        <h1>Precio</h1>
        <p class="sm-title">Ingresa los precios</p>
        <div class="kilometer" style="margin-right:20px !important;">
            <div class="input-group " id="km_input" style="width: 273px;">
                <input type="number" class="form-control input-control-price" placeholder="Kilometros recorridos"
                    id="KilometrosRecorridos">
                <div class="input-group-addon-km">
                    Km.
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Sí">
                    <label class="form-check-label" for="inlineRadio1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
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
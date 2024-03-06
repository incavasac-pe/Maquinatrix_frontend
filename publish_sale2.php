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
        <h1>Características Técnicas</h1>
      
       
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
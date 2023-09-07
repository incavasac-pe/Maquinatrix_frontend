<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<section class="bg-general bg-tienda">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h3 class="font-family-Roboto-Medium titulo-principal">
                    Palabra Buscada
                </h3>
                <p class="mb-0 font-family-Roboto-Regular titulo-principal-adorno">
                    84745 resultados de búsqueda
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
                    <div class="formulario-busqueda">
                        <div class="form-group">
                            <input type="text" name="buscar" id="buscar" placeholder="¿Qué buscas?">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="maquinaria" name="maquinaria">
                                <option class="d-none" selected>Maquinaria y vehículos</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="industria" name="industria">
                                <option class="d-none" selected>Industría</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="maquinaria" name="maquinaria">
                                <option class="d-none" selected>Tipo de Maquinaria</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium">Precio</h3>
                        <p class="font-family-Roboto-Regular">
                            En qué divisa deseas buscar?
                        </p>
                    </div>
                    <div class="campos-min-max font-family-Roboto-Regular">
                        <div class="form-check-inline">
                            <input type="text" name="min" id="min" placeholder="Min">
                        </div>
                        <div class="form-check-inline">-</div>
                        <div class="form-check-inline mr-0">
                            <input type="text" name="max" id="max" placeholder="Max">
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium">Información de producto</h3>
                    </div>
                    <div class="formulario-busqueda">
                        <div class="form-group">
                            <select class="form-control" id="marca" name="marca">
                                <option class="d-none" selected>Marca</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="modelo" name="modelo">
                                <option class="d-none" selected>Modelo</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-family-Roboto-Medium">Año de modelo</h4>
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
                        <h4 class="font-family-Roboto-Medium">Condición</h4>
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
                        <h4 class="font-family-Roboto-Medium">Odómetraje</h4>
                        <p class="font-family-Roboto-Regular">
                            En que unidad lo quieres medir?
                        </p>
                    </div>
                    <div class="font-family-Roboto-Regular tipo">
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="kilometraje" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular" for="kilometraje">Kilometraje</label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="horometro" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular" for="horometro">Horómetro (Hrs)</label>
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

                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium">Peso</h3>
                    </div>
                    <div class="formulario-busqueda">
                        <div class="form-group">
                            <select class="form-control" id="toneladas" name="toneladas">
                                <option class="d-none" selected>Toneladas</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="campos-min-max font-family-Roboto-Regular mt-3">
                            <div class="form-check-inline">
                                <input type="text" name="tdesde" id="tdesde" placeholder="Desde">
                            </div>
                            <div class="form-check-inline">-</div>
                            <div class="form-check-inline mr-0">
                                <input type="text" name="thasta" id="thasta" placeholder="Hasta">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-family-Roboto-Medium">Peso</h3>
                    </div>
                    <div class="">
                        <div class="btn-group">
                            <button type="button" class="btn btn-maquinatrix">4x2</button>
                            <button type="button" class="btn btn-maquinatrix">6x2</button>
                            <button type="button" class="btn btn-maquinatrix">6x4</button>
                            <button type="button" class="btn btn-maquinatrix">4x4</button>
                            <button type="button" class="btn btn-maquinatrix">6x6</button>
                            <button type="button" class="btn btn-maquinatrix">8x4</button>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="#" class="btn-filtros font-family-Roboto-Medium">
                            <img src="img/setting.svg" alt="setting"> Más filtros
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <p class="titulo-tienda text-right" id="">
                            <span class="mr-3">Ordenar por:</span>
                            <a href="javascript:void('0');" id="all" class="font-family-Roboto-Medium activo mb-3">Relevancia (Recomendados)</a>
                            <a href="javascript:void('0');" id="recent" class="font-family-Roboto-Medium mb-3">Más recientes</a>
                            <a href="javascript:void('0');" id="price-min" class="font-family-Roboto-Medium mb-3">Precio más bajo primero</a>
                        </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="all">
                            <a href="detalle.php">
                                <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                    <div class="box-img position-relative">
                                        <img src="img/tienda.png" alt="producto">
                                        <div class="abs">
                                            <span class="font-family-Roboto-Regular">Oportunidad</span>
                                        </div>
                                    </div>
                                    <div class="box-description">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h2 class="font-family-Roboto-Regular">
                                                    Construcción Excavadora de las mejores del mundo
                                                </h2>
                                                <h3 class="mb-3">
                                                    <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                    <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles mb-1">
                                                            <i class="fas fa-bus"></i> PC200, 2019
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles mb-1">
                                                            <i class="fas fa-map-marker-alt"></i> San Isidro
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles mb-1">
                                                            <i class="far fa-tachometer-alt-average"></i> 84.482 km
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="font-family-Roboto-Regular detalles mb-1">
                                                            <i class="far fa-calendar"></i> Julio 2019
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 mini-detalles">
                                                <p>Incluye:</p>
                                                <ul>
                                                    <li><i class="fas fa-check-circle"></i> Contrato Maquinatrix</li>
                                                    <li><i class="fas fa-check-circle"></i> Garantía Maquinatrix</li>
                                                    <li><i class="fas fa-check-circle"></i> Despacho</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-bus"></i> PC200, 2019
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-map-marker-alt"></i> San Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-tachometer-alt-average"></i> 84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-calendar"></i> Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fas fa-check-circle"></i> Contrato Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Garantía Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="recent" style="display: none;">
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-bus"></i> PC200, 2019
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-map-marker-alt"></i> San Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-tachometer-alt-average"></i> 84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-calendar"></i> Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fas fa-check-circle"></i> Contrato Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Garantía Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-min" style="display: none;">
                            <div class="align-items-start box-tienda d-flex justify-content-start mb-3">
                                <div class="box-img position-relative">
                                    <img src="img/tienda.png" alt="producto">
                                    <div class="abs">
                                        <span class="font-family-Roboto-Regular">Oportunidad</span>
                                    </div>
                                </div>
                                <div class="box-description">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h2 class="font-family-Roboto-Regular">
                                                Construcción Excavadora de las mejores del mundo
                                            </h2>
                                            <h3 class="mb-3">
                                                <strong class="font-family-Roboto-Bold">CLP 10.000/hr.</strong>
                                                <span class="font-family-Roboto-Medium">(UF 0,050/hr.)</span>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-bus"></i> PC200, 2019
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="fas fa-map-marker-alt"></i> San Isidro
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-tachometer-alt-average"></i> 84.482 km
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="font-family-Roboto-Regular detalles mb-1">
                                                        <i class="far fa-calendar"></i> Julio 2019
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mini-detalles">
                                            <p>Incluye:</p>
                                            <ul>
                                                <li><i class="fas fa-check-circle"></i> Contrato Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Garantía Maquinatrix</li>
                                                <li><i class="fas fa-check-circle"></i> Despacho</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<script>
    $('#all').click(function () {
        $('.all').css('display','block');
        $('.recent').css('display','none');
        $('.price-min').css('display','none');
    });
    $('#recent').click(function () {
        $('.all').css('display','none');
        $('.recent').css('display','block');
        $('.price-min').css('display','none');
    });
    $('#price-min').click(function () {
        $('.all').css('display','none');
        $('.recent').css('display','none');
        $('.price-min').css('display','block');
    })
</script>
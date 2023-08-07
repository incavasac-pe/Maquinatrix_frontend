<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<section class="bg-general">
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
            <div class="col-md-4">
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
                                <input type="radio" class="custom-control-input" id="nuevo" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular" for="nuevo">Kilometraje</label>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="usado" name="recorrido">
                                <label class="custom-control-label font-family-Roboto-Regular" for="usado">Horómetro (Hrs)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">2</div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>

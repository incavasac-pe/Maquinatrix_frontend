<?php include 'header.php' ?>

<section>
    <div class="sidebar" id="sidebar">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="main">
        <?php include 'nav.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4 mb-4"></div>
                <div class="col-md-6">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="buscador1">
                                    <div class="form-group position-relative">
                                        <i class="fal fa-search"></i>
                                        <input type="text" name="buscar" id="buscar" placeholder="Buscar usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 text-right">
                                <div class="busca position-relative">
                                    <a href="javascript:void(0)" class="btn-gris font-family-Inter-Regular" id="filtros">
                                        <span><i class="fal fa-filter"></i></span> Filtros <i class="far fa-chevron-down"></i>
                                    </a>
                                    <div class="filtroabs text-left d-none" id="filtroabs">
                                        <div class="abstitulo position-relative">
                                            <h5 class="font-family-Inter-SemiBold">Filtros</h5>
                                            <a href="javascript:void(0)" class="closefiltros" id="closefiltros">
                                                <i class="far fa-times"></i>
                                            </a>
                                        </div>
                                        <div class="absbody">
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="tpublicacion" class="font-family-Inter-Regular d-block">Tipo de publicación</label>
                                                    <select class="form-control font-family-Inter-Medium" id="tpublicacion" name="tpublicacion">
                                                        <option selected="" class="d-none">Selecciona</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categoria" class="font-family-Inter-Regular d-block">Categoría</label>
                                                    <select class="form-control font-family-Inter-Medium" id="categoria" name="categoria">
                                                        <option selected="" class="d-none">Selecciona</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fcreacion" class="font-family-Inter-Regular d-block">Fecha Creación</label>
                                                    <input type="date" id="fcreacion" name="fcreacion">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="absfooter">
                                            <button type="button" class="btn-trix">Resetear</button>
                                            <button type="button" class="btn-trix btn-blue">Aplicar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <p class="mb-0 font-family-Roboto-Regular">
                        34 Usuarios
                    </p>
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <table class="table table-hover fz-14">
                        <thead class="font-family-Roboto-Medium">
                        <tr>
                            <th>ID Publicación</th>
                            <th>Título</th>
                            <th>Fecha Creación</th>
                            <th>Categoría</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody class="font-family-Roboto-Regular">
                        <tr>
                            <td>Publicación#2131231</td>
                            <td>Construcción Excavadora de las mejores del mundo</td>
                            <td>10 Nov 2023, 2:40 pm</td>
                            <td><span class="category">Maquinaria</span></td>
                            <td>Arriendo</td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <a class="btn-action dropdownMenuLink font-family-Roboto-Regular" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acción <i class="fas fa-chevron-down"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="will-change: transform;">
                                        <a class="dropdown-item font-family-Roboto-Regular" href="detalle-publicaciones.php">Ver detalles</a>
                                        <a class="dropdown-item font-family-Roboto-Regular" href="javascript:void(0)" data-toggle="modal" data-target="#modalsuspender">Eliminar publicación</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Publicación#2131231</td>
                            <td>Construcción Excavadora de las mejores del mundo</td>
                            <td>10 Nov 2023, 2:40 pm</td>
                            <td><span class="category">Maquinaria</span></td>
                            <td>Arriendo</td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <a class="btn-action dropdownMenuLink font-family-Roboto-Regular" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acción <i class="fas fa-chevron-down"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="will-change: transform;">
                                        <a class="dropdown-item font-family-Roboto-Regular" href="detalle-publicaciones.php">Ver detalles</a>
                                        <a class="dropdown-item font-family-Roboto-Regular" href="javascript:void(0)" data-toggle="modal" data-target="#modalsuspender">Eliminar publicación</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Publicación#2131231</td>
                            <td>Construcción Excavadora de las mejores del mundo</td>
                            <td>10 Nov 2023, 2:40 pm</td>
                            <td><span class="category">Maquinaria</span></td>
                            <td>Arriendo</td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <a class="btn-action dropdownMenuLink font-family-Roboto-Regular" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acción <i class="fas fa-chevron-down"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="will-change: transform;">
                                        <a class="dropdown-item font-family-Roboto-Regular" href="detalle-publicaciones.php">Ver detalles</a>
                                        <a class="dropdown-item font-family-Roboto-Regular" href="javascript:void(0)" data-toggle="modal" data-target="#modalsuspender">Eliminar publicación</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>

<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<section class="bg-slider d-flex align-items-center justify-content-start">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2 class="font-family-Roboto-Bold">Arrienda y compra tu maquinaria ideal</h2>
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-family-Roboto-Bold" data-toggle="tab" href="#arrendar" style="border-radius: 10px 0 0 0;">
                            Arrendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-family-Roboto-Bold" data-toggle="tab" href="#comprar" style="border-radius: 0 10px 0 0">
                            Comprar
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="arrendar" class="container tab-pane active">
                        <form action="" class="fomulario-search row">
                            <div class="col-md-3 bg-white" style="border-radius: 0 0 0 10px;">
                                <select class="form-control font-family-Roboto-Regular" id="modelo" name="modelo">
                                    <option class="d-none" selected="">Seleccionar</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-7 bg-white">
                                <input type="text" name="buscar" id="buscar" placeholder="¿Qué buscas?" class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-amarillo font-family-Roboto-Medium">
                                    <i class="far fa-search"></i> Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="comprar" class="container tab-pane fade">
                        <form action="" class="fomulario-search row">
                            <div class="col-md-3 bg-white" style="border-radius: 0 0 0 10px;">
                                <select class="form-control font-family-Roboto-Regular" id="modelo-compra" name="modelo-compra">
                                    <option class="d-none" selected="">Seleccionar</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-7 bg-white">
                                <input type="text" name="buscar-compra" id="buscar-compra" placeholder="¿Qué buscas?" class="font-family-Roboto-Regular">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-amarillo font-family-Roboto-Medium">
                                    <i class="far fa-search"></i> Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-carrucel mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Swiper -->
                <div class="swiper carrucel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="img/img-car.png" alt="img">
                                        </div>
                                        <div class="col-md-9 d-flex align-items-center justify-content-between">
                                            <h2 class="font-family-Roboto-Medium mb-0">
                                                Paga Ahora o al Final del arriendo en maquinaria y herramientas
                                            </h2>
                                            <a href="" class="arrow">
                                                <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="img/img-car.png" alt="img">
                                        </div>
                                        <div class="col-md-9 d-flex align-items-center justify-content-between">
                                            <h2 class="font-family-Roboto-Medium mb-0">
                                                Paga Ahora o al Final del arriendo en maquinaria y herramientas
                                            </h2>
                                            <a href="" class="arrow">
                                                <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-10 m-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="img/img-car.png" alt="img">
                                        </div>
                                        <div class="col-md-9 d-flex align-items-center justify-content-between">
                                            <h2 class="font-family-Roboto-Medium mb-0">
                                                Paga Ahora o al Final del arriendo en maquinaria y herramientas
                                            </h2>
                                            <a href="" class="arrow">
                                                <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-general">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/retroexcavadora.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Lo mejor en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Maquinaria y Equipos
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/repuestos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">Todos los</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Repuestos y Accesorios
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box" style="background-image: url(img/neumaticos.png);">
                    <div>
                        <p class="font-family-Roboto-Regular mb-0">La variedad más grande en</p>
                        <h5 class="font-family-Roboto-Bold mb-0">
                            Neumáticos
                        </h5>
                    </div>
                    <div>
                        <a href="#" class="font-family-Roboto-Medium">Conoce más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Te puede interesar <a href="tienda.php?page=1" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                <div class="cuadro">
                    <div class="cuadro-img">
                        <img src="img/producto.png" alt="producto">
                        <div class="abs">
                            <span class="font-family-Roboto-Regular">LIQUIDACIÓN</span>
                        </div>
                    </div>
                    <div class="cuadro-des">
                        <ul class="font-family-Roboto-Regular">
                            <li><a href="#">Arriendo</a></li>
                        </ul>
                        <p class="font-family-Roboto-Regular">
                            Construcción Excavadora de las mejores del mundo
                        </p>
                        <strong class="font-family-Roboto-Medium">CLP 84.000</strong>
                        <span class="font-family-Roboto-Medium">(UF 2,250)</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                <div class="cuadro">
                    <div class="cuadro-img">
                        <img src="img/producto.png" alt="producto">
                        <div class="abs">
                            <span class="font-family-Roboto-Regular">LIQUIDACIÓN</span>
                        </div>
                    </div>
                    <div class="cuadro-des">
                        <ul class="font-family-Roboto-Regular">
                            <li><a href="#">Compra</a></li>
                        </ul>
                        <p class="font-family-Roboto-Regular">
                            Construcción Excavadora de las mejores del mundo
                        </p>
                        <strong class="font-family-Roboto-Medium">CLP 84.000</strong>
                        <span class="font-family-Roboto-Medium">(UF 2,250)</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                <div class="cuadro">
                    <div class="cuadro-img">
                        <img src="img/producto.png" alt="producto">
                        <div class="abs">
                            <span class="font-family-Roboto-Regular">LIQUIDACIÓN</span>
                        </div>
                    </div>
                    <div class="cuadro-des">
                        <ul class="font-family-Roboto-Regular">
                            <li><a href="#">Arriendo</a></li>
                        </ul>
                        <p class="font-family-Roboto-Regular">
                            Construcción Excavadora de las mejores del mundo
                        </p>
                        <strong class="font-family-Roboto-Medium">CLP 84.000</strong>
                        <span class="font-family-Roboto-Medium">(UF 2,250)</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                <div class="cuadro">
                    <div class="cuadro-img">
                        <img src="img/producto.png" alt="producto">
                        <div class="abs">
                            <span class="font-family-Roboto-Regular">LIQUIDACIÓN</span>
                        </div>
                    </div>
                    <div class="cuadro-des">
                        <ul class="font-family-Roboto-Regular">
                            <li><a href="#">Compra</a></li>
                        </ul>
                        <p class="font-family-Roboto-Regular">
                            Construcción Excavadora de las mejores del mundo
                        </p>
                        <strong class="font-family-Roboto-Medium">CLP 84.000</strong>
                        <span class="font-family-Roboto-Medium">(UF 2,250)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-general">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Descubre <a href="#" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>
            <div class="col-md-12">
                <div class="banner">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                            <div class="banner-row">
                                <span class="font-family-Roboto-Regular text-white">ARRIENDA DESDE</span>
                                <h3 class="font-family-Roboto-Medium text-white">
                                    Herramientas, hasta maquinarías y vehículos.
                                </h3>
                                <a href="#" class="font-family-Roboto-Medium">
                                    Conoce más
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
                            <img src="img/banner.png" alt="banner" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-general">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Industrias Populares <a href="#" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/1.png" alt="icono" class="mr-2">
                            Agricultura
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/2.png" alt="icono" class="mr-2">
                            Construcción
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/3.png" alt="icono" class="mr-2">
                            Camiones y Buses
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/4.png" alt="icono" class="mr-2">
                            Forestal
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/5.png" alt="icono" class="mr-2">
                            Minería
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="box-categoria">
                    <a href="#" class="font-family-Roboto-Medium">
                        <span>
                            <img src="img/6.png" alt="icono" class="mr-2">
                            Otros
                        </span>
                        <span><i class="far fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="font-family-Roboto-Medium titulo">
                    Preguntas Frecuentes <a href="#" class="text-blue ml-2">Ver más</a>
                </h5>
            </div>

        </div>
    </div>
</section>
<?php include 'footer.php' ?>

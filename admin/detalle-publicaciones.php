<?php include 'header.php' ?>

<section>
    <div class="sidebar" id="sidebar">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="main">
        <?php include 'nav.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4 mb-3"></div>
                <div class="col-md-12">
                    <a href="panel.php" class="font-family-Roboto-Regular text-black">
                        <i class="fas fa-chevron-left"></i> Volver
                    </a>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <h2 class="font-family-Roboto-Medium titulo-box">Construcción Excavadora de las mejores del mundo</h2>
                </div>
                <div class="col-md-3">
                    <div class="box-white">
                        <div class="box-perfil text-center">
                            <img src="../img/profile.jpeg" alt="perfil">
                            <h3 class="font-family-Inter-Medium">
                                Construcción Excavadora de las mejores del mundo
                            </h3>
                            <span class="font-family-Inter-Regular text-gris fz-14">Publicación#2131231</span>
                        </div>
                        <div class="box-titulo">
                            <h3 class="font-family-Roboto-Bold">Detalles</h3>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Publicación</p>
                                <h4 class="font-family-Inter-Medium">Publicación#2131231</h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Tipo</p>
                                <h4 class="font-family-Inter-Medium">Arriendo</h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Fecha Creación</p>
                                <h4 class="font-family-Inter-Medium">10 Nov 2023, 2:40 pm</h4>
                            </div>
                        </div>
                        <div class="box-lista">
                            <div>
                                <p class="font-family-Inter-Regular">Categoría</p>
                                <h4 class="font-family-Inter-Medium">Maquinaria</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-5">
                    <div class="tabs-detalles">
                        <!-- Nav pills -->
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active font-family-Roboto-Medium" data-toggle="pill" href="#detalles">Detalles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-family-Roboto-Medium" data-toggle="pill" href="#multimedia">Multimedia</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="detalles" class="tab-pane active"><br>
                                <div class="box-white pdetalles">
                                    <form action="" class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4 class="font-family-Roboto-Medium">Características</h4>
                                            </div>
                                            <div class="form-group">
                                                <label for="tpublicacion" class="font-family-Inter-Regular">Título de publicación</label>
                                                <input type="text" name="tpublicacion" id="tpublicacion" class="font-family-Inter-Medium" placeholder="Título de publicación">
                                            </div>
                                            <div class="form-group">
                                                <label for="ubicacion" class="font-family-Inter-Regular">Ubicación</label>
                                                <input type="text" name="ubicacion" id="ubicacion" class="font-family-Inter-Medium" placeholder="Ubicación">
                                            </div>
                                            <div class="form-group">
                                                <label for="dpublicacion" class="font-family-Inter-Regular">Descripción de publicación</label>
                                                <textarea name="dpublicacion" id="dpublicacion" cols="30" rows="23" placeholder="Descripción de publicación"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Precio</h4>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="precio" id="precio" class="font-family-Inter-Medium" placeholder="0.00">
                                                    </div>
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Características</h4>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="marca" class="font-family-Inter-Regular">Marca</label>
                                                        <input type="text" name="marca" id="marca" class="font-family-Inter-Medium" placeholder="Marca">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="modelo" class="font-family-Inter-Regular">Modelo</label>
                                                        <input type="text" name="modelo" id="modelo" class="font-family-Inter-Medium" placeholder="Modelo">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="anos" class="font-family-Inter-Regular">Año</label>
                                                        <input type="text" name="anos" id="anos" class="font-family-Inter-Medium" placeholder="Año">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="condicion" class="font-family-Inter-Regular">Condición</label>
                                                        <input type="text" name="condicion" id="condicion" class="font-family-Inter-Medium" placeholder="Condición">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kilometraje" class="font-family-Inter-Regular">Kilometraje</label>
                                                        <input type="text" name="kilometraje" id="kilometraje" class="font-family-Inter-Medium" placeholder="Kilometraje">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="motor" class="font-family-Inter-Regular">N° de Motor</label>
                                                        <input type="text" name="motor" id="motor" class="font-family-Inter-Medium" placeholder="N° de Motor">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="garantia" class="font-family-Inter-Regular">Garantía Maquinatrix</label>
                                                        <input type="text" name="garantia" id="garantia" class="font-family-Inter-Medium" placeholder="Garantía Maquinatrix">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Tpropietario" class="font-family-Inter-Regular">Tipo de Propietario</label>
                                                        <input type="text" name="Tpropietario" id="Tpropietario" class="font-family-Inter-Medium" placeholder="Tipo de Propietario">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Despacho</h4>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="dsi" name="despacho">
                                                            <label class="custom-control-label" for="dsi" style="font-size: 15px;">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="dno" name="despacho">
                                                            <label class="custom-control-label" for="dno" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4 class="font-family-Roboto-Medium">Paga Ahora o Después</h4>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="psi" name="paga">
                                                            <label class="custom-control-label" for="psi" style="font-size: 15px;">Si</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="pno" name="paga">
                                                            <label class="custom-control-label" for="pno" style="font-size: 15px;">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="multimedia" class="tab-pane fade"><br>
                                <div class="box-white">
                                    <h3 class="font-family-Roboto-Medium mb-3" style="font-size: 18px;">Multimedia</h3>
                                    <div class="upload__box">
                                        <div class="upload__btn-box">
                                            <label class="upload__btn">
                                                <p class="d-flex align-items-start justify-content-start" style="gap: 10px">
                                                    <i class="fal fa-file-upload" style="font-size: 40px;color: #1F87FF;"></i>
                                                    <span class="font-family-Roboto-Regular">
                                                        <strong class="d-block font-family-Roboto-Medium">Haga clic aquí para cargar las imágenes.</strong>
                                                        Sube hasta 10 imágenes
                                                    </span>
                                                </p>
                                                <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                            </label>
                                        </div>
                                        <div class="upload__img-wrap"></div>
                                    </div>
                                    <p class="font-family-Roboto-Regular text-gris fz-12 mb-0 mt-3">
                                        Suba las imágenes necesarias para registrar la cita en el historial del paciente.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function () {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'><i class='fas fa-trash-alt'></i></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>
<?php include 'footer.php' ?>

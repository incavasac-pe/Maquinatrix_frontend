<?php include 'header.php' ?>
<section>
    <div class="sidebar" id="sidebar">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="main">
        <?php include 'nav.php' ?>
        <div class="container-fluid">
            <?php
            if (isset($_GET['success'])) {
                $msg = "Se ha creado la publicación.";
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>' . $msg . '</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            if (isset($_GET['error'])) {
                $msg = "Ha ocurrido un error creando la publicación.";
                echo '
                 <div class="alert alert-danger alee encontraron registrosrt-dismissible fade show" role="alert">
                     <strong>' . $msg . '</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>';
            }
            ?>  
            <?php  

                $baseUrl = getenv('URL_API');
                    $params = [];

                    if (isset($_GET['buscar']) && $_GET['buscar'] != '') {
                        $search = $_GET['buscar'];
                        $params[] = "search=" . $search;
                    }

                    if (isset($_GET['tpublicacion']) && $_GET['tpublicacion'] != '0') {
                        $tpublicacion = $_GET['tpublicacion'];
                        $params[] = "tpublicacion=" . $tpublicacion;
                    }

                    if (isset($_GET['category']) && $_GET['category'] != '0') {
                        $category = $_GET['category'];
                        $params[] = "category=" . $category;
                    }

                    if (isset($_GET['fcreacion']) && $_GET['fcreacion'] != '') {
                        $fcreacion = $_GET['fcreacion'];
                        $params[] = "fcreacion=" . $fcreacion;
                    }

                    if (isset($_GET['region']) && $_GET['region'] != '0') {
                        $region = $_GET['region'];
                        $params[] = "region=" . urlencode($region);
                    }

                    $count_pub = 0;

                    $url = $baseUrl . '/list_publications_panel?' . implode('&', $params);
                
                $response = file_get_contents($url);
                if ($response !== false) {
                    // Decodificar la respuesta JSON
                    $data = json_decode($response, true);
                    if (!$data['error']) {
                        // Obtener la lista de publicaciones
                        $list_publications = $data['data'];
                     $count_pub = $data['count'];
                    } 
                } else {
                    echo 'Error al realizar la solicitud a la API';
                }
                 
                $count_tipo = 0;
                $url1 = $baseUrl.'/list_tipo_pub';
                $response1 = file_get_contents($url1);
                if ($response1 !== false) {
                    // Decodificar la respuesta JSON
                    $data = json_decode($response1, true);
                    if (!$data['error']) {
                        // Obtener la lista de publicaciones
                        $publications = $data['data'];
                        $count_tipo = $data['count'];
                    } else {
                        echo 'Error: ' . $data['msg'];
                    }
                } else {
                    echo 'Error al realizar la solicitud a la API';
                }
                
                ///
                
                 $count_category = 0;
                $url12 = $baseUrl.'/list_category';
                $response = file_get_contents($url12);
                if ($response !== false) {
                    // Decodificar la respuesta JSON
                    $data = json_decode($response, true);
                    if (!$data['error']) {
                        // Obtener la lista de $categories
                        $categories = $data['data'];
                        $count_category = $data['count'];
                    } else {
                        echo 'Error: ' . $data['msg'];
                    }
                } else {
                    echo 'Error al realizar la solicitud a la API';
                }

                $count_regiones= 0;
                $url13 = $baseUrl.'/list_regiones';
                $response = file_get_contents($url13);
                if ($response !== false) {
                    // Decodificar la respuesta JSON
                    $dataRegion = json_decode($response, true);
                    if (!$dataRegion['error']) {
                        // Obtener la lista de $categories
                        $regiones = $dataRegion['data'];
                        $count_regiones = $dataRegion['count'];
                    } else {
                        echo 'Error: ' . $dataRegion['msg'];
                    }
                } else {
                    echo 'Error al realizar la solicitud a la API';
                }
                ?>

            <div class="row">
                <div class="col-md-12 mt-4 mb-4"></div>
                <div class="col-md-6">
                    <form action="panel.php" method="GET" id="formulariofiltro">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="buscador1">
                                    <div class="form-group position-relative">
                                        <i class="fal fa-search"></i>
                                        <input type="text" name="buscar" id="buscar" value="<?=isset($_GET['buscar'])? $_GET['buscar']:'' ?>"placeholder="Buscar">
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
                                          
                                                <div class="form-group">
                                                    <label for="tpublicacion" class="font-family-Inter-Regular d-block">Tipo de publicación</label>

                                                    <?php                                               
                                                        if ($count_tipo > 0) {                                                   

                                                            // Crear el elemento select
                                                            echo '<select class="form-control font-family-Inter-Medium" id="tpublicacion" name="tpublicacion">';
                                                            echo '<option value="0">Selecciona</option>';
                                                            // Recorrer la lista de publicaciones y crear las opciones del select
                                                            foreach ($publications as $publication) {
                                                                $id = $publication['id_publication_type'];
                                                                $name = $publication['type_pub'];

                                                                echo '<option value="' . $id . '">' . $name . '</option>';
                                                            }
                                                            echo '</select>';
                                                        } 
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categoria" class="font-family-Inter-Regular d-block">Categoría</label>
                                                    <?php                                            
                                                        if ($count_category > 0) { 

                                                            // Crear el elemento select
                                                            echo '<select class="form-control font-family-Inter-Medium"  id="category" name="category">';
                                                            echo '<option value="0">Seleccionar</option>';
                                                            // Recorrer la lista de publicaciones y crear las opciones del select
                                                            foreach ($categories as $categorie) {
                                                                $id = $categorie['id_category'];
                                                                $category = $categorie['category'];

                                                                echo '<option value="' . $id . '">' . $category . '</option>';
                                                            }
                                                            echo '</select>';
                                                        }  
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categoria" class="font-family-Inter-Regular d-block">Región</label>
                                                    <?php                                            
                                                        if ($count_regiones > 0) {

                                                            // Crear el elemento select
                                                            echo '<select class="form-control font-family-Inter-Medium"  id="region" name="region">';
                                                            echo '<option value="0">Seleccionar</option>';
                                                            // Recorrer la lista de publicaciones y crear las opciones del select
                                                            foreach ($regiones as $reg) { 

                                                                echo '<option value="' . $reg . '">' . $reg. '</option>';
                                                            }
                                                            echo '</select>';
                                                        }  
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fcreacion" class="font-family-Inter-Regular d-block">Fecha Creación</label>
                                                    <input type="date" id="fcreacion" name="fcreacion">
                                                </div>
                                          
                                        </div>
                                        <div class="absfooter">
                                            <button type="button" class="btn-trix"  onclick="resetearFormulario()">Resetear</button>
                                            <button type="submit" class="btn-trix btn-blue">Aplicar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 busca position-relative">
                                <p class="mb-0 font-family-Roboto-Regular">
                                    <?= $count_pub; ?> Publicaciones
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-12 text-right">                        
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        + Nueva Publicación
                    </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva publicación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="myFormPub" method="POST">
                                    <div class="form-group">
                                        <label for="title" class="font-family-Inter-Regular d-block">Título de la publicación:</label>
                                        <input type="text" class="form-control" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="tpublicacionnew" class="font-family-Inter-Regular d-block">Tipo de publicación</label>

                                        <?php                                               
                                            if ($count_tipo > 0) {                                                   

                                                // Crear el elemento select
                                                echo '<select class="form-control font-family-Inter-Medium" id="tpublicacionnew" name="tpublicacionnew">';
                                                echo '<option value="0">Selecciona</option>';
                                                // Recorrer la lista de publicaciones y crear las opciones del select
                                                foreach ($publications as $publication) {
                                                    $id = $publication['id_publication_type'];
                                                    $name = $publication['type_pub'];

                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }

                                                echo '</select>';
                                            } 
                                        ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="categorianew" class="font-family-Inter-Regular d-block">Categoría</label>
                                        <?php                                            
                                            if ($count_category > 0) { 

                                                // Crear el elemento select
                                                echo '<select class="form-control font-family-Inter-Medium"  id="categorianew" name="categorianew">';
                                                echo '<option value="0">Seleccionar</option>';
                                                // Recorrer la lista de publicaciones y crear las opciones del select
                                                foreach ($categories as $categorie) {
                                                    $id = $categorie['id_category'];
                                                    $category = $categorie['category'];

                                                    echo '<option value="' . $id . '">' . $category . '</option>';
                                                }

                                                echo '</select>';
                                            }  
                                        ?>
                                    </div>
                                    <div class="modal-footer">        
                                        <button type="submit" id="createPub"  class="btn_enviar font-family-Inter-Medium mt-3 w-50">Crear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

                            <?php
                            // Recorrer la lista de publicaciones y crear las opciones del select
                            if($count_pub > 0){ 
                                    foreach ($list_publications as $pub) {
                                        $id = $pub['id_product'];

                                        echo '<tr>';
                                        echo '<td>Publicación#' . $id . '</td>';
                                        echo '<td>' . $pub['title'] . '</td>';
                                        echo '<td>' . $pub['create_at_formatted'] . '</td>';
                                        echo '<td><span class="category"> ' . $pub['Category']['category'] . '</span></td>';
                                        echo '<td> ' . $pub['PublicationType']['type_pub'] . '</td>';

                                        echo '<td>
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn-action dropdownMenuLink font-family-Roboto-Regular" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acción <i class="fas fa-chevron-down"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="will-change: transform;">
                                                        <a class="dropdown-item font-family-Roboto-Regular" href="detalle-publicaciones.php?id=' . $id . '">Ver detalles</a>
                                                        <a class="dropdown-item font-family-Roboto-Regular"  onclick="eliminarPub('.$id.')" >Eliminar publicación</a>
                                                    </div>
                                                </div>
                                             </td>';
                                        echo '</tr>';
                                  }
                           }else{
                                echo '<tr>';
                                  echo '<td>No se encontraron registros</td>';
                                 echo '<tr>';
                           }
                            ?>

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
<script>
    $(document).ready(function () {
        // Evento cuando se cierra la modal
        $('#myFormPub').submit(function (e) {
            e.preventDefault();
            // Enviar el formulario
            if (validarCampos()) {
                registarPublicacion();
            } else {
                alert('Por favor, complete todos los campos requeridos correctamente.');
            }
        });

        // Función para validar los campos del formulario
        function validarCampos() {
            var campo1 = $('#categorianew').val();
            var campo2 = $('#tpublicacionnew').val();
            if (campo1 === '0' || campo2 === '0') {
                return false;
            }
            return true;
        }

        function registarPublicacion() {
            var token = '<?php echo $_SESSION["token"]; ?>';
         
            var postData = {
                "title": $('#title').val(),
                "id_publication_type": $('#tpublicacionnew').val(),
                "id_category": $('#categorianew').val(),
                "status_id": 6
            };
            $.ajax({
                type: "POST",
                url: '<?= $baseUrl ?>/register_publication',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: postData,
                success: function (response, textStatus, xhr)
                {
                    var statusCode = xhr.status;
                    if (statusCode === 201 && !response.error) {

                        window.location.href = 'panel.php?success=true';
                    } else {
                        window.location.href = 'panel.php?error=true';
                    }
                },
                error: function (response) {
                    console.log(response.status)

                    if (response.status === 401 || response.status === 403) {
                        window.location.href = 'create_session.php?logout=true';
                    }
                }
            });
        }
    });
    
    function eliminarPub(id) {   
        var token = '<?= $_SESSION["token"]; ?>';
      
        var postData = {
            "id_product": id,
            "status_id": 8        
         };
        $.ajax({
            type: "PUT",
            url: '<?= $baseUrl ?>/update_publication_status',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: postData,
            success: function (response, textStatus, xhr)
            {
                var statusCode = xhr.status;
                if (statusCode === 200 && !response.error) {
                   window.location.href = 'panel.php';
                } else {
                    window.location.href = 'detalle-publicaciones.php?error=true';
                }
            },
            error: function (response) { 
                if (response.status === 401 || response.status === 403) {
                    window.location.href = 'create_session.php?logout=true';
                 }
               }
            });
        }   
         function resetearFormulario() {
        document.getElementById("formulariofiltro").reset();
      }
</script>
<?php include 'footer.php' ?>

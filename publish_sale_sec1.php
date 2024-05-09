<?php 
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
    $host = $_SERVER['HTTP_HOST']; 
    $uri = $_SERVER['REQUEST_URI']; 
    $url_publi = $protocol . '://' . $host; 
  
    $baseUrl = getenv('URL_API'); 
    //list industria
    
    $count_industry = 0;
    $url55 = $baseUrl.'/list_industry'; 
    $response55= file_get_contents($url55);
    if ($response55 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response55, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $industry = $data['data'];
           $count_industry = $data['count'];
       } else {
           echo 'Error: ' . $data['msg'];
       }
    } else {
        echo 'Error al realizar la solicitud a la API';
    }

    $count_m = 0;
    $url99 = $baseUrl.'/list_machine'; 
    $response599= file_get_contents($url99);
    if ($response599 !== false) {
       // Decodificar la respuesta JSON
       $data = json_decode($response599, true);
       if (!$data['error']) {
           // Obtener la lista de $categories
           $maquina = $data['data'];

           $count_m = $data['count'];
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
    }  
    ?>
<div class="container">
          <div class="category-product">
            <h1>Categoría y tipo de producto</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button  onclick="setCategorySale(1,'Maquinaria y vehículos')"  class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="true"><img
                    src="./assets/img/excavator.png" alt="excavator" />
                  <p>Maquinaria y<br /> vehículos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategorySale(5,'Equipos y herramientas')" class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="false"><img
                    src="./assets/img/hand-drill.png" alt="hand-drill" />
                  <p>Equipos y<br /> herramientas </p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategorySale(4,'Productos y accesorios')"  class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="false"><img
                    src="./assets/img/helmet.png" alt="helmet" />
                  <p>Productos y<br /> accesorios </p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategorySale(2,'Repuestos')" class="nav-link" id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="false"><img
                    src="./assets/img/timing-belt.png" alt="timing-belt" />
                  <p>Repuestos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategorySale(3,'Neumáticos')" class="nav-link" id="pills-publish3-tab" data-bs-toggle="pill" data-bs-target="#pills-publish3"
                  type="button" role="tab" aria-controls="#pills-publish5" aria-selected="false"
                  style="margin-right:0px !important;"><img src="./assets/img/tire.png" alt="tire" />
                  <p>Neumáticos</p>
                </button>
              </li>
            </ul>

            <p>Tipo de producto</p>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <?php  
                      if ($count_industry > 0) { 
                          echo '<select required   id="industria" name="industria"   >';
                          echo '<option value="0">Seleccionar industria*</option>'; 
                          foreach ($industry as $field) {
                              $id = $field['id_product_type'];
                              $industryName = $field['description'];
                              echo '<option value="' . $id . '"'; 
                              if ($id == $industry) {
                                  echo ' selected';
                              }  
                              echo '>' . $industryName. '</option>';
                          }
                          echo '</select> ';
                
                        }  ?>   

                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <?php  
                      if ($count_m > 0) { 
                          echo '<select required  id="id_machine" name="id_machine" >';
                          echo '<option value="0"> Tipo Maquinas*</option>'; 
                          foreach ($maquina as $field) {
                              $id = $field['id_machine'];
                              $maquinaName = $field['description'];
                              echo '<option value="' . $id . '"'; 
                              if ($id == $maquinaName) {
                                  echo ' selected';
                              }  
                              echo '>' . $maquinaName. '</option>';
                          }
                          echo '</select> ';
                
                        }  ?>   
                </div>
              </div>
            </div>
            <div class="warning-wrapper" id="error-container-tipo">
             <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        <p class="error-heading">Campos faltan completar</p>
                        <p class="sm-text">Campos requeridos faltan completar: CATEGORIA O TIPO DE PRODUCTO.</p>
                    </div>
           </div>
          </div>
          
        </div>
       

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade " id="pills-publish1" role="tabpanel" aria-labelledby="pills-publish1-tab"
            tabindex="0">
            <?php include 'publish_sale1.php' ?>
          </div> 
          <div class="tab-pane fade" id="pills-publish3" role="tabpanel" aria-labelledby="pills-publish3-tab"
            tabindex="0">
            <?php include 'publish_sale5.php' ?>>
          </div>
        </div>

        
 <script> 
    $(document).ready(function() {
  
  }); 

 var id_categoria = 0;
 var categoria = '';

  // Función para asignar un valor a la variable global
  function setCategorySale(value,text) {
  id_categoria = value;
  categoria = text;
 
  console.log("la categoria de venta es",id_categoria)

  if (id_categoria==1 || id_categoria==2) {
    $('.engine_number, .chasis_number, .patente,#PesoNeto,#Potencia,#Cilindrada,#Torque,#mixed_consumption').show(); 
    $('#title-transmission,#t-transmission,#t-tranx').show(); 
  }else{
    
    $('.engine_number, .chasis_number, .patente,#PesoNeto,#Potencia,#Cilindrada,#Torque,#mixed_consumption').hide(); 
    $('#title-transmission,#t-transmission,#t-tranx').hide(); // Ocultar los elementos de entrada// Ocultar los elementos de entrada
  }

  if(id_categoria==1){ 
     $('.factory_code').hide(); 
  }  
  
  if(id_categoria==2){
     $('.patente').hide(); 
     $('.factory_code').show(); 
  }  
  if(id_categoria==5){
     $('.factory_code').hide(); 
  }  
  if(id_categoria==4){
    $('.factory_code').show(); 
  }


  if (id_categoria==4 || id_categoria==2 ) {
     $('#factory_code').prop('type', 'number'); 
  }

  
  if (id_categoria==4   || id_categoria==2) {    
    $('#category-product, #t-combustible,#kilometer-box-wrapper').hide(); 
  }else{
    $('#category-product, #t-combustible,#kilometer-box-wrapper').show(); 
  }
}  
 

</script>
 
<script>
    $('#industria').selectize({ normalize: true });
    $('#id_machine').selectize({ normalize: true });
    $('#anios').selectize({ normalize: true });
    $('#marca').selectize({ normalize: true });
    $('#region').selectize({ normalize: true });
    $('#city').selectize({ normalize: true });

    $('#anios5').selectize({ normalize: true });
    $('#marca5').selectize({ normalize: true });
    $('#region5').selectize({ normalize: true });
    $('#city5').selectize({ normalize: true });
    
</script>
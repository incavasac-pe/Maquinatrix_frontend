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
                <button  onclick="setCategory(1,'Maquinaria y vehículos')"  class="nav-link " id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="true"><img
                    src="./assets/img/excavator.png" alt="excavator" />
                  <p>Maquinaria y<br /> vehículos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategory(2,'Equipos y herramientas')" class="nav-link" id="pills-publish2-tab" data-bs-toggle="pill" data-bs-target="#pills-publish2"
                  type="button" role="tab" aria-controls="pills-publish2" aria-selected="false"><img
                    src="./assets/img/hand-drill.png" alt="hand-drill" />
                  <p>Equipos y<br /> herramientas </p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategory(3,'Productos y accesorios')"  class="nav-link" id="pills-publish3-tab" data-bs-toggle="pill" data-bs-target="#pills-publish3"
                  type="button" role="tab" aria-controls="pills-publish3" aria-selected="false"><img
                    src="./assets/img/helmet.png" alt="helmet" />
                  <p>Productos y<br /> accesorios </p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategory(4,'Repuestos')" class="nav-link" id="pills-publish4-tab" data-bs-toggle="pill" data-bs-target="#pills-publish4"
                  type="button" role="tab" aria-controls="pills-publish4" aria-selected="false"><img
                    src="./assets/img/timing-belt.png" alt="timing-belt" />
                  <p>Repuestos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button  onclick="setCategory(5,'Neumáticos')" class="nav-link" id="pills-publish5-tab" data-bs-toggle="pill" data-bs-target="#pills-publish5"
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
                          echo '<select required   id="industria" name="industria"  onchange="searchTypeMachine(this.value)">';
                          echo '<option value="">Seleccionar industria*</option>'; 
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
                <select required  id="maquinaria" name="maquinaria">
                 </select>   
                </div>
              </div>
            </div>
          </div>
         
        </div>
       

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade " id="pills-publish1" role="tabpanel" aria-labelledby="pills-publish1-tab"
            tabindex="0">
            <?php include 'publish_sale1.php' ?>
          </div>

          <div class="tab-pane fade" id="pills-publish2" role="tabpanel" aria-labelledby="pills-publish2-tab"
            tabindex="0">
            <?php include 'publish_sale2.php' ?>
          </div>
          <div class="tab-pane fade" id="pills-publish3" role="tabpanel" aria-labelledby="pills-publish3-tab"
            tabindex="0">
            <?php include 'publish_sale3.php' ?>
          </div>
          <div class="tab-pane fade" id="pills-publish4" role="tabpanel" aria-labelledby="pills-publish4-tab"
            tabindex="0">
            <?php include 'publish_sale4.php' ?>
          </div>
          <div class="tab-pane fade" id="pills-publish5" role="tabpanel" aria-labelledby="pills-publish5-tab"
            tabindex="0">
            <?php include 'publish_sale5.php' ?>
          </div>
        </div>

        
 <script>   
 var id_categoria = 0;
 var categoria = '';

  // Función para asignar un valor a la variable global
  function setCategory(value,text) {
  id_categoria = value;
  categoria = text;
  console.log("la categoria es",id_categoria)
  if (id_categoria==2) {
    $('#engine_number, #chasis_number, #patente').hide(); // Ocultar los elementos de entrada
 }
}
  function searchTypeMachine(industria){
   
   var url = '<?=$baseUrl?>/list_machine?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#maquinaria');

              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option>').prop('selected', true).text('Tipo de Máquina *');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.id_machine+' >').text(element.description);
              selectElement.append(option);             
                });
           searchTypeMarca(industria);
           searchTypeModelo(industria);
      },
      error: function(error) {
      console.error('Error al enviar los datos actualizados');
      }
  });
}

function searchTypeMarca(industria){
   
   var url = '<?=$baseUrl?>/list_marca?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#marca');

              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option>').prop('selected', true).text('Marca*');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.id_marca+' >').text(element.description);
              selectElement.append(option);             
          });
  
      },
      error: function(error) {

      console.error('Error al enviar los datos actualizados');
      }
  });
}

function searchTypeModelo(industria){
   
   var url = '<?=$baseUrl?>/list_model?id_product_type=' + industria;  
   $.ajax({
      url: url,
      method: 'GET', 
      contentType: "application/json",
    
      success: function(res) {
          var selectElement = $('#modelo'); 
              // Limpiar las opciones existentes
              selectElement.empty(); 
                // Agregar la opción por defecto
              var defaultOption = $('<option>').prop('selected', true).text('Modelo*');
              selectElement.append(defaultOption);
              res.data.forEach(function(element) { 
              var option = $('<option value='+element.id_model+' >').text(element.description);
              selectElement.append(option);             
          });
  
      },
      error: function(error) {
        
      console.error('Error al enviar los datos actualizados');
      }
  });
}

</script>
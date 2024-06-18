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
                <label for="exampleDataList" class="form-label">Tipo industria*</label>
                <select id="industria" required name="industria"  class="industria-select"></select>   

                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                <label for="exampleDataList" class="form-label">Tipo maquinaria*</label>
                <select id="id_machine" required name="id_machine"  class="maquina-select"></select>   
 
                </div>
              </div>
            </div>
            <div class="warning-wrapper" id="error-container-tipo-cc">
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
    formatPrice('#price,#price5,#PesoNeto,#Potencia,#Cilindrada,#Torque,#mixed_consumption,#KilometrosRecorridos,#Horometro');  
  });

  function formatPrice(selector) {
  $(document).on('input', selector, function() {
    var value = $(this).val().replace(/\D/g, '');
    var formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    $(this).val(formattedValue);
  });
}

 var id_categoria = 0;
 var categoria = '';

  // Función para asignar un valor a la variable global
  function setCategorySale(value,text) {
  id_categoria = value;
  categoria = text;
 
  console.log("la categoria de venta es",id_categoria)

  if (id_categoria==1 || id_categoria==2) {
    $('.engine_number, .chasis_number, .patente,#PesoNeto,#Potencia,#Cilindrada,#Torque,#mixed_consumption').show(); 
    $('#inputGroupSelectPeso,#inputGroupSelectPotencia,#inputGroupSelectCilindrada,#inputGroupSelectTorque,#inputGroupSelectConsumo').show(); 
    $('#title-transmission,#t-transmission,#t-tranx').show(); 
  }else{
    
    $('.engine_number, .chasis_number, .patente,#PesoNeto,#Potencia,#Cilindrada,#Torque,#mixed_consumption').hide(); 
    $('#inputGroupSelectPeso,#inputGroupSelectPotencia,#inputGroupSelectCilindrada,#inputGroupSelectTorque,#inputGroupSelectConsumo').hide(); 
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
     $('#factory_code').prop('type', 'text'); 
  }

  
  if (id_categoria==4   || id_categoria==2) {    
    $('#category-product, #t-combustible,#kilometer-box-wrapper').hide(); 
  }else{
    $('#category-product, #t-combustible,#kilometer-box-wrapper').show(); 
  }
}  
 

</script>
  
<script>
  $(document).ready(function() {
    const regiones = [
  { id: 1, nombre: 'Arica y Parinacota' },
  { id: 2, nombre: 'Tarapacá' },
  { id: 3, nombre: 'Antofagasta' },
  { id: 4, nombre: 'Atacama' },
  { id: 5, nombre: 'Coquimbo' },
  { id: 6, nombre: 'Valparaíso' },
  { id: 7, nombre: 'Metropolitana de Santiago' },
  { id: 8, nombre: 'Libertador General Bernardo O\'Higgins' },
  { id: 9, nombre: 'Maule' },
  { id: 10, nombre: 'Ñuble' },
  { id: 11, nombre: 'Biobío' },
  { id: 12, nombre: 'Araucanía' }
];

const comunas = [
  { id: 'Arica', region_id: 1, nombre: 'Arica' },
  { id: 'Camarones', region_id: 1, nombre: 'Camarones' },
  { id: 'Putre', region_id: 1, nombre: 'Putre' },
  { id: 'General Lagos', region_id: 1, nombre: 'General Lagos' },
  { id: 'Iquique', region_id: 2, nombre: 'Iquique' },
  { id: 'Alto Hospicio', region_id: 2, nombre: 'Alto Hospicio' },
  { id: 'Pozo Almonte', region_id: 2, nombre: 'Pozo Almonte' },
  { id: 'Camiña', region_id: 2, nombre: 'Camiña' },
  { id: 'Colchane', region_id: 2, nombre: 'Colchane' },
  { id: 'Huara', region_id: 2, nombre: 'Huara' },
  { id: 'Pica', region_id: 2, nombre: 'Pica' },
  { id: 'Antofagasta', region_id: 3, nombre: 'Antofagasta' },
  { id: 'Mejillones', region_id: 3, nombre: 'Mejillones' },
  { id: 'Sierra Gorda', region_id: 3, nombre: 'Sierra Gorda' },
  { id: 'Taltal', region_id: 3, nombre: 'Taltal' },
  { id: 'Calama', region_id: 3, nombre: 'Calama' },
  { id: 'Ollagüe', region_id: 3, nombre: 'Ollagüe' },
  { id: 'San Pedro de Atacama', region_id: 3, nombre: 'San Pedro de Atacama' },
  { id: 'Copiapó', region_id: 4, nombre: 'Copiapó' },
  { id: 'Caldera', region_id: 4, nombre: 'Caldera' },
  { id: 'Tierra Amarilla', region_id: 4, nombre: 'Tierra Amarilla' },
  { id: 'Chañaral', region_id: 4, nombre: 'Chañaral' },
  { id: 'Diego de Almagro', region_id: 4, nombre: 'Diego de Almagro' },
  { id: 'Vallenar', region_id: 4, nombre: 'Vallenar' },
  { id: 'Alto del Carmen', region_id: 4, nombre: 'Alto del Carmen' },
  { id: 'Freirina', region_id: 4, nombre: 'Freirina' },
  { id: 'Huasco', region_id: 4, nombre: 'Huasco' },
  { id: 'La Serena', region_id: 5, nombre: 'La Serena' },
  { id: 'Coquimbo', region_id: 5, nombre: 'Coquimbo' },
  { id: 'Andacollo', region_id: 5, nombre: 'Andacollo' },
  { id: 'La Higuera', region_id: 5, nombre: 'La Higuera' },
  { id: 'Paiguano', region_id: 5, nombre: 'Paiguano' },
  { id: 'Vicuña', region_id: 5, nombre: 'Vicuña' },
  { id: 'Illapel', region_id: 5, nombre: 'Illapel' },
  { id: 'Canela', region_id: 5, nombre: 'Canela' },
  { id: 'Los Vilos', region_id: 5, nombre: 'Los Vilos' },
  { id: 'Salamanca', region_id: 5, nombre: 'Salamanca' },
  { id: 'Ovalle', region_id: 5, nombre: 'Ovalle' },
  { id: 'Combarbalá', region_id: 5, nombre: 'Combarbalá' },
  { id: 'Monte Patria', region_id: 5, nombre: 'Monte Patria' },
  { id: 'Punitaqui', region_id: 5, nombre: 'Punitaqui' },
  { id: 'Río Hurtado', region_id: 5, nombre: 'Río Hurtado' },
  { id: 'Valparaíso', region_id: 6, nombre: 'Valparaíso' },
  { id: 'Casablanca', region_id: 6, nombre: 'Casablanca' },
  { id: 'Concón', region_id: 6, nombre: 'Concón' },
  { id: 'Juan Fernández', region_id: 6, nombre: 'Juan Fernández' },
  { id: 'Puchuncaví', region_id: 6, nombre: 'Puchuncaví' },
  { id: 'Quintero', region_id: 6, nombre: 'Quintero' },
  { id: 'Viña del Mar', region_id: 6, nombre: 'Viña del Mar' },
  { id: 'Isla de Pascua', region_id: 6, nombre: 'Isla de Pascua' },
  { id: 'Los Andes', region_id: 6, nombre: 'Los Andes' },
  { id: 'Calle Larga', region_id: 6, nombre: 'Calle Larga' },
  { id: 'Rinconada', region_id: 6, nombre: 'Rinconada' },
  { id: 'San Esteban', region_id: 6, nombre: 'San Esteban' },
  { id: 'La Ligua', region_id: 6, nombre: 'La Ligua' },
  { id: 'Cabildo', region_id: 6, nombre: 'Cabildo' },
  { id: 'Papudo', region_id: 6, nombre: 'Papudo' },
  { id: 'Petorca', region_id: 6, nombre: 'Petorca' },
  { id: 'Zapallar', region_id: 6, nombre: 'Zapallar' },
  { id: 'Quillota', region_id: 6, nombre: 'Quillota' },
  { id: 'Calera', region_id: 6, nombre: 'Calera' },
  { id: 'Hijuelas', region_id: 6, nombre: 'Hijuelas' },
  { id: 'La Cruz', region_id: 6, nombre: 'La Cruz' },
  { id: 'Nogales', region_id: 6, nombre: 'Nogales' },
  { id: 'San Antonio', region_id: 6, nombre: 'San Antonio' },
  { id: 'Algarrobo', region_id: 6, nombre: 'Algarrobo' },
  { id: 'Cartagena', region_id: 6, nombre: 'Cartagena' },
  { id: 'El Quisco', region_id: 6, nombre: 'El Quisco' },
  { id: 'El Tabo', region_id: 6, nombre: 'El Tabo' },
  { id: 'Santo Domingo', region_id: 6, nombre: 'Santo Domingo' },
  { id: 'Santiago', region_id: 7, nombre: 'Santiago' },
  { id: 'Cerrillos', region_id: 7, nombre: 'Cerrillos' },
    { id: 'Cerro Navia', region_id: 7, nombre: 'Cerro Navia' },
    { id: 'Conchalí', region_id: 7, nombre: 'Conchalí' },
    { id: 'El Bosque', region_id: 7, nombre: 'El Bosque' },
    { id: 'Estación Central', region_id: 7, nombre: 'Estación Central' },
    { id: 'Huechuraba', region_id: 7, nombre: 'Huechuraba' },
    { id: 'Independencia', region_id: 7, nombre: 'Independencia' },
    { id: 'La Cisterna', region_id: 7, nombre: 'La Cisterna' },
    { id: 'La Florida', region_id: 7, nombre: 'La Florida' },
    { id: 'La Granja', region_id: 7, nombre: 'La Granja' },
    { id: 'La Pintana', region_id: 7, nombre: 'La Pintana' },
    { id: 'La Reina', region_id: 7, nombre: 'La Reina' },
    { id: 'Las Condes', region_id: 7, nombre: 'Las Condes' },
    { id: 'Lo Barnechea', region_id: 7, nombre: 'Lo Barnechea' },
    { id: 'Lo Espejo', region_id: 7, nombre: 'Lo Espejo' },
    { id: 'Lo Prado', region_id: 7, nombre: 'Lo Prado' },
    { id: 'Macul', region_id: 7, nombre: 'Macul' },
    { id: 'Maipú', region_id: 7, nombre: 'Maipú' },
    { id: 'Ñuñoa', region_id: 7, nombre: 'Ñuñoa' },
    { id: 'Pedro Aguirre Cerda', region_id: 7, nombre: 'Pedro Aguirre Cerda' },
    { id: 'Peñalolén', region_id: 7, nombre: 'Peñalolén' },
    { id: 'Providencia', region_id: 7, nombre: 'Providencia' },
    { id: 'Pudahuel', region_id: 7, nombre: 'Pudahuel' },
    { id: 'Quilicura', region_id: 7, nombre: 'Quilicura' },
    { id: 'Quinta Normal', region_id: 7, nombre: 'Quinta Normal' },
    { id: 'Recoleta', region_id: 7, nombre: 'Recoleta' },
    { id: 'Renca', region_id: 7, nombre: 'Renca' },
    { id: 'San Joaquín', region_id: 7, nombre: 'San Joaquín' },
    { id: 'San Miguel', region_id: 7, nombre: 'San Miguel' },
    { id: 'San Ramón', region_id: 7, nombre: 'San Ramón' },
    { id: 'Vitacura', region_id: 7, nombre: 'Vitacura' },
    { id: 'Puente Alto', region_id: 7, nombre: 'Puente Alto' },
    { id: 'Pirque', region_id: 7, nombre: 'Pirque' },
    { id: 'San José de Maipo', region_id: 7, nombre: 'San José de Maipo' },
    { id: 'Colina', region_id: 7, nombre: 'Colina' },
    { id: 'Lampa', region_id: 7, nombre: 'Lampa' },
    { id: 'Til Til', region_id: 7, nombre: 'Til Til' },
    { id: 'San Bernardo', region_id: 7, nombre: 'San Bernardo' },
    { id: 'Buin', region_id: 7, nombre: 'Buin' },
    { id: 'Calera de Tango', region_id: 7, nombre: 'Calera de Tango' },
    { id: 'Paine', region_id: 7, nombre: 'Paine' },
    { id: 'Melipilla', region_id: 7, nombre: 'Melipilla' },
    { id: 'Alhué', region_id: 7, nombre: 'Alhué' },
    { id: 'Curacaví', region_id: 7, nombre: 'Curacaví' },
    { id: 'María Pinto', region_id: 7, nombre: 'María Pinto' },
    { id: 'San Pedro', region_id: 7, nombre: 'San Pedro' },
    { id: 'Talagante', region_id: 7, nombre: 'Talagante' },
    { id: 'El Monte', region_id: 7, nombre: 'El Monte' },
    { id: 'Isla de Maipo', region_id: 7, nombre: 'Isla de Maipo' },
    { id: 'Padre Hurtado', region_id: 7, nombre: 'Padre Hurtado' },
    { id: 'Peñaflor', region_id: 7, nombre: 'Peñaflor' },
    
    { id: 'Rancagua', region_id: 8, nombre: 'Rancagua' },
      { id: 'Codegua', region_id: 8, nombre: 'Codegua' },
      { id: 'Coinco', region_id: 8, nombre: 'Coinco' },
      { id: 'Coltauco', region_id: 8, nombre: 'Coltauco' },
      { id: 'Doñihue', region_id: 8, nombre: 'Doñihue' },
      { id: 'Graneros', region_id: 8, nombre: 'Graneros' },
      { id: 'Las Cabras', region_id: 8, nombre: 'Las Cabras' },
      { id: 'Machalí', region_id: 8, nombre: 'Machalí' },
      { id: 'Malloa', region_id: 8, nombre: 'Malloa' },
      { id: 'Mostazal', region_id: 8, nombre: 'Mostazal' },
      { id: 'Olivar', region_id: 8, nombre: 'Olivar' },
      { id: 'Peumo', region_id: 8, nombre: 'Peumo' },
      { id: 'Pichidegua', region_id: 8, nombre: 'Pichidegua' },
      { id: 'Quinta de Tilcoco', region_id: 8, nombre: 'Quinta de Tilcoco' },
      { id: 'Rengo', region_id: 8, nombre: 'Rengo' },
      { id: 'Requínoa', region_id: 8, nombre: 'Requínoa' },
      { id: 'San Vicente', region_id: 8, nombre: 'San Vicente' },
      { id: 'Pichilemu', region_id: 8, nombre: 'Pichilemu' },
      { id: 'La Estrella', region_id: 8, nombre: 'La Estrella' },
      { id: 'Litueche', region_id: 8, nombre: 'Litueche' },
      { id: 'Marchihue', region_id: 8, nombre: 'Marchihue' },
      { id: 'Navidad', region_id: 8, nombre: 'Navidad' },
      { id: 'Paredones', region_id: 8, nombre: 'Paredones' },
      { id: 'San Fernando', region_id: 8, nombre: 'San Fernando' },
      { id: 'Chépica', region_id: 8, nombre: 'Chépica' },
      { id: 'Chimbarongo', region_id: 8, nombre: 'Chimbarongo' },
      { id: 'Lolol', region_id: 8, nombre: 'Lolol' },
      { id: 'Nancagua', region_id: 8, nombre: 'Nancagua' },
      { id: 'Palmilla', region_id: 8, nombre: 'Palmilla' },
      { id: 'Peralillo', region_id: 8, nombre: 'Peralillo' },
      { id: 'Placilla', region_id: 8, nombre: 'Placilla' },
      { id: 'Pumanque', region_id: 8, nombre: 'Pumanque' },
      { id: 'Santa Cruz', region_id: 8, nombre: 'Santa Cruz' },

      { id: 'Talca', region_id: 9, nombre: 'Talca' },
      { id: 'Constitución', region_id: 9, nombre: 'Constitución' },
      { id: 'Curepto', region_id: 9, nombre: 'Curepto' },
      { id: 'Empedrado', region_id: 9, nombre: 'Empedrado' },
      { id: 'Maule', region_id: 9, nombre: 'Maule' },
      { id: 'Pelarco', region_id: 9, nombre: 'Pelarco' },
      { id: 'Pencahue', region_id: 9, nombre: 'Pencahue' },
      { id: 'Río Claro', region_id: 9, nombre: 'Río Claro' },
      { id: 'San Clemente', region_id: 9, nombre: 'San Clemente' },
      { id: 'San Rafael', region_id: 9, nombre: 'San Rafael' },
      { id: 'Cauquenes', region_id: 9, nombre: 'Cauquenes' },
      { id: 'Chanco', region_id: 9, nombre: 'Chanco' },
      { id: 'Pelluhue', region_id: 9, nombre: 'Pelluhue' },
      { id: 'Curicó', region_id: 9, nombre: 'Curicó' },
      { id: 'Hualañé', region_id: 9, nombre: 'Hualañé' },
      { id: 'Licantén', region_id: 9, nombre: 'Licantén' },
      { id: 'Molina', region_id: 9, nombre: 'Molina' },
      { id: 'Rauco', region_id: 9, nombre: 'Rauco' },
      { id: 'Romeral', region_id: 9, nombre: 'Romeral' },
      { id: 'Sagrada Familia', region_id: 9, nombre: 'Sagrada Familia' },
      { id: 'Teno', region_id: 9, nombre: 'Teno' },
      { id: 'Vichuquén', region_id: 9, nombre: 'Vichuquén' },
      { id: 'Linares', region_id: 9, nombre: 'Linares' },
      { id: 'Colbún', region_id: 9, nombre: 'Colbún' },
      { id: 'Longaví', region_id: 9, nombre: 'Longaví' },
      { id: 'Parral', region_id: 9, nombre: 'Parral' },
      { id: 'Retiro', region_id: 9, nombre: 'Retiro' },
      { id: 'San Javier', region_id: 9, nombre: 'San Javier' },
      { id: 'Villa Alegre', region_id: 9, nombre: 'Villa Alegre' },
      { id: 'Yerbas Buenas', region_id: 9, nombre: 'Yerbas Buenas' },

      { id: 'Chillán', region_id: 10, nombre: 'Chillán' },
      { id: 'Chillán Viejo', region_id: 10, nombre: 'Chillán Viejo' },
      { id: 'Quirihue', region_id: 10, nombre: 'Quirihue' },
      { id: 'Cobquecura', region_id: 10, nombre: 'Cobquecura' },
      { id: 'Coelemu', region_id: 10, nombre: 'Coelemu' },
      { id: 'Ninhue', region_id: 10, nombre: 'Ninhue' },
      { id: 'Portezuelo', region_id: 10, nombre: 'Portezuelo' },
      { id: 'Ranquil', region_id: 10, nombre: 'Ranquil' },
      { id: 'Treguaco', region_id: 10, nombre: 'Treguaco' },
      { id: 'Bulnes', region_id: 10, nombre: 'Bulnes' },
      { id: 'Cabrero', region_id: 10, nombre: 'Cabrero' },
      { id: 'Los Ángeles', region_id: 10, nombre: 'Los Ángeles' },
      { id: 'Mulchén', region_id: 10, nombre: 'Mulchén' },
      { id: 'Nacimiento', region_id: 10, nombre: 'Nacimiento' },
      { id: 'Negrete', region_id: 10, nombre: 'Negrete' },
      { id: 'Quilaco', region_id: 10, nombre: 'Quilaco' },
      { id: 'Quilleco', region_id: 10, nombre: 'Quilleco' },
      { id: 'San Rosendo', region_id: 10, nombre: 'San Rosendo' },
      { id: 'Santa Bárbara', region_id: 10, nombre: 'Santa Bárbara' },
      { id: 'Tucapel', region_id: 10, nombre: 'Tucapel' },
      { id: 'Yumbel', region_id: 10, nombre: 'Yumbel' },
      { id: 'Alto Biobío', region_id: 10, nombre: 'Alto Biobío' },
      { id: 'Concepción', region_id: 11, nombre: 'Concepción' },
      { id: 'Coronel', region_id: 11, nombre: 'Coronel' },
      { id: 'Chiguayante', region_id: 11, nombre: 'Chiguayante' },
      { id: 'Florida', region_id: 11, nombre: 'Florida' },
      { id: 'Hualqui', region_id: 11, nombre: 'Hualqui' },
      { id: 'Lota', region_id: 11, nombre: 'Lota' },
      { id: 'Penco', region_id: 11, nombre: 'Penco' },
      { id: 'San Pedro de la Paz', region_id: 11, nombre: 'San Pedro de la Paz' },
      { id: 'Santa Juana', region_id: 11, nombre: 'Santa Juana' },
      { id: 'Talcahuano', region_id: 11, nombre: 'Talcahuano' },
      { id: 'Tomé', region_id: 11, nombre: 'Tomé' },
      { id: 'Hualpén', region_id: 11, nombre: 'Hualpén' },
      { id: 'Arauco', region_id: 11, nombre: 'Arauco' },
      { id: 'Cañete', region_id: 11, nombre: 'Cañete' },
      { id: 'Contulmo', region_id: 11, nombre: 'Contulmo' },
      { id: 'Curanilahue', region_id: 11, nombre: 'Curanilahue' },
      { id: 'Lebu', region_id: 11, nombre: 'Lebu' },
      { id: 'Los Álamos', region_id: 11, nombre: 'Los Álamos' },
      { id: 'Tirúa', region_id: 11, nombre: 'Tirúa' },
      { id: 'Los Ángeles', region_id: 11, nombre: 'Los Ángeles' },
      { id: 'Antuco', region_id: 11, nombre: 'Antuco' },
      { id: 'Cabrero', region_id: 11, nombre: 'Cabrero' },
      { id: 'Laja', region_id: 11, nombre: 'Laja' },
      { id: 'Mulchén', region_id: 11, nombre: 'Mulchén' },
      { id: 'Nacimiento', region_id: 11, nombre: 'Nacimiento' },
      { id: 'Negrete', region_id: 11, nombre: 'Negrete' },
      { id: 'Quilaco', region_id: 11, nombre: 'Quilaco' },
      { id: 'Quilleco', region_id: 11, nombre: 'Quilleco' },
      { id: 'San Rosendo', region_id: 11, nombre: 'San Rosendo' },
      { id: 'Santa Bárbara', region_id: 11, nombre: 'Santa Bárbara' },
      { id: 'Tucapel', region_id: 11, nombre: 'Tucapel' },
      { id: 'Yumbel', region_id: 11, nombre: 'Yumbel' },
      { id: 'Alto Biobío', region_id: 11, nombre: 'Alto Biobío' },
      
      { id: 'Temuco', region_id: 12, nombre: 'Temuco' },
      { id: 'Carahue', region_id: 12, nombre: 'Carahue' },
      { id: 'Cunco', region_id: 12, nombre: 'Cunco' },
      { id: 'Curarrehue', region_id: 12, nombre: 'Curarrehue' },
      { id: 'Freire', region_id: 12, nombre: 'Freire' },
      { id: 'Galvarino', region_id: 12, nombre: 'Galvarino' },
      { id: 'Gorbea', region_id: 12, nombre: 'Gorbea' },
      { id: 'Lautaro', region_id: 12, nombre: 'Lautaro' },
      { id: 'Loncoche', region_id: 12, nombre: 'Loncoche' },
      { id: 'Melipeuco', region_id: 12, nombre: 'Melipeuco' },
      { id: 'Nueva Imperial', region_id: 12, nombre: 'Nueva Imperial' },
      { id: 'Padre las Casas', region_id: 12, nombre: 'Padre las Casas' },
      { id: 'Perquenco', region_id: 12, nombre: 'Perquenco' },
      { id: 'Pitrufquén', region_id: 12, nombre: 'Pitrufquén' },
      { id: 'Pucón', region_id: 12, nombre: 'Pucón' },
      { id: 'Saavedra', region_id: 12, nombre: 'Saavedra' },
      { id: 'Teodoro Schmidt', region_id: 12, nombre: 'Teodoro Schmidt' },
      { id: 'Toltén', region_id: 12, nombre: 'Toltén' },
      { id: 'Vilcún', region_id: 12, nombre: 'Vilcún' },
      { id: 'Villarrica', region_id: 12, nombre: 'Villarrica' },
      { id: 'Cholchol', region_id: 12, nombre: 'Cholchol' },
      { id: 'Imperial', region_id: 12, nombre: 'Imperial' },
      { id: 'Angol', region_id: 12, nombre: 'Angol' },
      { id: 'Collipulli', region_id: 12, nombre: 'Collipulli' },
      { id: 'Curacautín', region_id: 12, nombre: 'Curacautín' },
      { id: 'Ercilla', region_id: 12, nombre: 'Ercilla' },
      { id: 'Lonquimay', region_id: 12, nombre: 'Lonquimay' },
      { id: 'Los Sauces', region_id: 12, nombre: 'Los Sauces' },
      { id: 'Lumaco', region_id: 12, nombre: 'Lumaco' },
      { id: 'Purén', region_id: 12, nombre: 'Purén' }  
];


// Inicializar los selectize
const $regionSelect = $('.region-select').selectize({
  options: regiones,
  items: [],
  valueField: 'id',
  labelField: 'nombre',
  searchField: 'nombre',
  create: false,
  maxItems: 1,  
  onChange: function(value) {
    // Obtener el objeto de la región seleccionada
    const selectedRegion = regiones.find(r => r.id == value);
    
    // Obtener el nombre de la región seleccionada
    const selectedRegionName = selectedRegion ? selectedRegion.nombre : '';
    
    // Actualizar el select de comunas
    updateComunaSelect(value, selectedRegionName);
  }
});

const $comunaSelect = $('.comuna-select').selectize({
  labelField: 'nombre',
  valueField: 'id',
  hideSelected: true,
  persist: false,
  create: false,
  placeholder: "Comunas"
});

// Función para actualizar las comunas cuando se selecciona una región
function updateComunaSelect(regionId,regionName) { 

    region = regionName;
 
  const comunasDeRegion = comunas.filter(c => c.region_id == regionId);
  const $comunaSelectize = $comunaSelect[0].selectize;
  $comunaSelectize.setValue(null);
  $comunaSelectize.clearOptions();
  comunasDeRegion.forEach(comuna => { 
    $comunaSelectize.addOption({ id: comuna.id, nombre: comuna.nombre });
  });
  $comunaSelectize.refreshOptions();
}


// Inicializar los selectize
const $regionSelect5 = $('.region-select5').selectize({
  options: regiones,
  items: [],
  valueField: 'id',
  labelField: 'nombre',
  searchField: 'nombre',
  create: false,
  maxItems: 1,  
  onChange: function(value) {
    // Obtener el objeto de la región seleccionada
    const selectedRegion = regiones.find(r => r.id == value);
    
    // Obtener el nombre de la región seleccionada
    const selectedRegionName = selectedRegion ? selectedRegion.nombre : '';
    
    // Actualizar el select de comunas
    updateComunaSelect5(value, selectedRegionName);
  }
});

const $comunaSelect5 = $('.comuna-select5').selectize({
  labelField: 'nombre',
  valueField: 'id',
  hideSelected: true,
  persist: false,
  create: false,
  placeholder: "Comunas"
});

// Función para actualizar las comunas cuando se selecciona una región
function updateComunaSelect5(regionId,regionName) { 

    region5 = regionName;
 
  const comunasDeRegion5 = comunas.filter(c => c.region_id == regionId);
  const $comunaSelectize5 = $comunaSelect5[0].selectize;
  $comunaSelectize5.clearOptions();
  comunasDeRegion5.forEach(comuna => { 
    $comunaSelectize5.addOption({ id: comuna.id, nombre: comuna.nombre });
  });
  $comunaSelectize5.refreshOptions();
}




const industria = [
  { id: 1, nombre: 'CONSTRUCCIÓN' },
  { id: 2, nombre: 'MINERÍA' },
  { id: 3, nombre: 'FORESTAL' },
  { id: 4, nombre: 'AGRÍCULTURA' },
  { id: 5, nombre: 'CAMIONES Y BUSES' },
  { id: 6, nombre: 'OTROS' }, 
];

const maquinas = [
  { id: 1, region_id: 1, nombre: 'Bulldozers' },
  { id: 25, region_id: 1, nombre: 'Otro' },
  { id: 2, region_id: 1, nombre: 'Cargadores' },
  { id: 3, region_id: 1, nombre: 'Chancadores, Seleccionadoras y Similares' },
  { id: 4, region_id: 1, nombre: 'Compactadores' },
  { id: 5, region_id: 1, nombre: 'Dumpers de Obra' },
  { id: 6, region_id: 1, nombre: 'Elevadores, Plataformas y Articulados' },
  { id: 7, region_id: 1, nombre: 'Excavadoras' },
  { id: 8, region_id: 1, nombre: 'Grúas Horquillas y Similares' },
  { id: 9, region_id: 1, nombre: 'Grúas' },
  { id: 10, region_id: 1, nombre: 'Manipulador de Materiales' },
  { id: 11, region_id: 1, nombre: 'Manipuladores Telescópicos' },
  { id: 12, region_id: 1, nombre: 'Minicargadores' },
  { id: 13, region_id: 1, nombre: 'Miniexcavadoras' },
  { id: 14, region_id: 1, nombre: 'Motoniveladoras' },
  { id: 15, region_id: 1, nombre: 'Mototraíllas' },
  { id: 16, region_id: 1, nombre: 'Pavimentadoras' },
  { id: 17, region_id: 1, nombre: 'Perfiladoras de pavimento' },
  { id: 18, region_id: 1, nombre: 'Perforadoras' },
  { id: 19, region_id: 1, nombre: 'Recicladores y Estabilizadores' },
  { id: 20, region_id: 1, nombre: 'Recuperadoras de caminos' },
  { id: 21, region_id: 1, nombre: 'Retroexcavadora' },
  { id: 22, region_id: 1, nombre: 'Rodillos y Compactadores' },
  { id: 23, region_id: 1, nombre: 'Tiendetubos' },
  { id: 24, region_id: 1, nombre: 'Autohormigoneras y Mezcladores' },
  { id: 26, region_id: 2, nombre: 'Bulldozers Mineros' },
  { id: 27, region_id: 2, nombre: 'Camiones Dumpers Superficie' },
  { id: 28, region_id: 2, nombre: 'Camiones Mineros' },
  { id: 29, region_id: 2, nombre: 'Camiones Mineros: Subterráneos' },
  { id: 30, region_id: 2, nombre: 'Cargadores Híbridos (LHD): Subterráneos' },
  { id: 31, region_id: 2, nombre: 'Cargadores Mineros' },
  { id: 32, region_id: 2, nombre: 'Desatadores de Roca: Subterráneos' },
  { id: 33, region_id: 2, nombre: 'Dragas Mineras' },
  { id: 34, region_id: 2, nombre: 'Equipos de Apoyo: Subterráneo' },
  { id: 35, region_id: 2, nombre: 'Equipos Especiales: Subterráneo' },
  { id: 36, region_id: 2, nombre: 'Excavadora minera' },
  { id: 37, region_id: 2, nombre: 'Jumbos Mineros' },
  { id: 38, region_id: 2, nombre: 'Jumbos: Subterráneos' },
  { id: 39, region_id: 2, nombre: 'Motoniveladoras Mineras' },
  { id: 40, region_id: 2, nombre: 'Niveladores: Subterráneo' },
  { id: 41, region_id: 2, nombre: 'Palas Mineras' },
  { id: 42, region_id: 2, nombre: 'Perforadoras Mineras' },
  { id: 43, region_id: 2, nombre: 'Scalers Mineros' },
  { id: 44, region_id: 2, nombre: 'Tractores Mineros' },
  { id: 45, region_id: 2, nombre: 'Vehículos Utilitarios' },
  { id: 46, region_id: 2, nombre: 'Otro' },
  { id: 47, region_id: 3, nombre: 'Arrastradores' },
  { id: 48, region_id: 3, nombre: 'Autocargador' },
  { id: 49, region_id: 3, nombre: 'Bulldozer' },
  { id: 50, region_id: 3, nombre: 'Cabezales' },
  { id: 51, region_id: 3, nombre: 'Cargadores Estacionarios' },
  { id: 52, region_id: 3, nombre: 'Chipeadoras' },
  { id: 53, region_id: 3, nombre: 'Cosechadoras con cadenas' },
  { id: 54, region_id: 3, nombre: 'Cosechadoras con ruedas' },
  { id: 55, region_id: 3, nombre: 'Desbrozadoras' },
  { id: 56, region_id: 3, nombre: 'Grúas forestales' },
  { id: 57, region_id: 3, nombre: 'Máquinas forestales' },
  { id: 58, region_id: 3, nombre: 'Plantadoras' },
  { id: 59, region_id: 3, nombre: 'Procesadoras' },
  { id: 60, region_id: 3, nombre: 'Retroexcavadoras' },
  { id: 61, region_id: 3, nombre: 'Skidders' },
  { id: 62, region_id: 3, nombre: 'Taladores Apiladores con Cadenas' },
  { id: 63, region_id: 3, nombre: 'Taladores Apiladores con Ruedas' },
  { id: 64, region_id: 3, nombre: 'Transportadores de Troncos' },
  { id: 65, region_id: 3, nombre: 'Trituradoras' },
  
  { id: 67, region_id: 4, nombre: 'Abonadoras' },
  { id: 68, region_id: 4, nombre: 'Agricultura de Precisión' },
  { id: 69, region_id: 4, nombre: 'Aplicadores de Químicos' },
  { id: 70, region_id: 4, nombre: 'Arrancadoras de papas' },
  { id: 71, region_id: 4, nombre: 'Aspersoras' },
  { id: 72, region_id: 4, nombre: "Barredoras, Podadoras y Desmalezadoras" },
  { id: 73, region_id: 4, nombre: "Bulldozers y Excavadoras" },
  { id: 74, region_id: 4, nombre: "Cargadores de Caña" },
  { id: 75, region_id: 4, nombre: "Cargadores Frontales y Minicargadores" },
  { id: 76, region_id: 4, nombre: "Cosechadoras" },
  { id: 77, region_id: 4, nombre: "Equipos de Compostaje" },
  { id: 78, region_id: 4, nombre: "Equipos de Forraje" },
  { id: 79, region_id: 4, nombre: "Equipos de Irrigación" },
  { id: 80, region_id: 4, nombre: "Equipos de Labranza y Trabajos de Suelo" },
  { id: 81, region_id: 4, nombre: "Manipuladores Telescópicos" },
  { id: 82, region_id: 4, nombre: "Preparación de suelos" },
  { id: 83, region_id: 4, nombre: "Pulverizadoras" },
  { id: 84, region_id: 4, nombre: "Retroexcavadoras cargadores" },
  { id: 85, region_id: 4, nombre: "Sembradoras y Cultivadores" },
  { id: 86, region_id: 4, nombre: "Tolvas Autodescargables" },
  { id: 87, region_id: 4, nombre: "Tractores" },
  { id: 88, region_id: 4, nombre: "Trituradoras" },
  { id: 89, region_id: 4, nombre: "Vehículos Utilitarios" },
 
  { id: 91, region_id: 5, nombre: "Bus" },
  { id: 92, region_id: 5, nombre: "Bus Urbano" },
  { id: 93, region_id: 5, nombre: "Bus Interurbano" },
  { id: 94, region_id: 5, nombre: "Bus Turístico" },
  { id: 95, region_id: 5, nombre: "Midibús" },
  { id: 96, region_id: 5, nombre: "Minibús" },
  { id: 97, region_id: 5, nombre: "Microbús" },
  { id: 98, region_id: 5, nombre: "Camión" },
  { id: 99, region_id: 5, nombre: "Camión Aljibe" },
  { id: 100, region_id: 5, nombre: "Camión Articulado" },
  { id: 101, region_id: 5, nombre: "Camión Cisterna" },
  { id: 102, region_id: 5, nombre: "Camión Grúa" },
  { id: 103, region_id: 5, nombre: "Camión Grúa con Aguilón" },
  { id: 104, region_id: 5, nombre: "Camión Ligero" },
  { id: 105, region_id: 5, nombre: "Camión Pluma" },
  { id: 106, region_id: 5, nombre: "Camión Tolva" },
  { id: 107, region_id: 5, nombre: "Camión Tracto" },
  { id: 108, region_id: 5, nombre: "Camiones de Obras" },
  { id: 109, region_id: 5, nombre: "Camiones Mineros" },
  { id: 110, region_id: 5, nombre: "Camión Mixer" },
  { id: 111, region_id: 5, nombre: "Camas Bajas / Remolques / semirremolques" },
  { id: 112, region_id: 5, nombre: "Otro" },
  { id: 113, region_id: 6, nombre: "Compresores" },
  { id: 114, region_id: 6, nombre: "Equipos de Corte y Soldadura" },
  { id: 115, region_id: 6, nombre: "Equipos industriales" },
  { id: 116, region_id: 6, nombre: "Grupos Electrógenos" },
  { id: 117, region_id: 6, nombre: "Motobombas" },
  
];

// Inicializar los selectize
const $industriaSelect = $('.industria-select').selectize({
  options: industria,
  items: [],
  valueField: 'id',
  labelField: 'nombre',
  searchField: 'nombre',
  create: false,
  maxItems: 1,  
  onChange: function(value) { 
    const industriaRegion = industria.find(r => r.id == value);
     
    const selectedIndustrianName = industriaRegion ? industriaRegion.nombre : '';
     
    updateMaquinaSelect(value, selectedIndustrianName);
  }
});

const $maquinasSelect = $('.maquina-select').selectize({
  labelField: 'nombre',
  valueField: 'id',
  hideSelected: true,
  persist: false,
  create: false,
  placeholder: "Tipo Maquinas"
});
 
function updateMaquinaSelect(industriaId,industriaName) {  
  const maquinassDeRegion = maquinas.filter(c => c.region_id == industriaId);
  const $maqSelectize = $maquinasSelect[0].selectize;
  $maqSelectize.setValue(null);
  $maqSelectize.clearOptions();
  maquinassDeRegion.forEach(maq => { 
    $maqSelectize.addOption({ id: maq.id, nombre: maq.nombre });
  });
  $maqSelectize.refreshOptions();
}
 
}); 
    
</script>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <img src="img/logo-white.png" alt="logo">
            </div>
            <div class="col-md-12">
                <div class="row justify-content-between">
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">CONTENIDO</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="tienda.php?category=2">Repuestos</a>
                            </li>
                            <li>
                                <a href="tienda.php?category=3">Neumaticos</a>
                            </li>
                            <li>
                                <a href="tienda.php?category=4">Productos y Accesorios</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">SERVICIOS</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="#" onclick="filtroFooter('1')">Arriendo</a>
                            </li>
                            <li>
                                <a href="#" onclick="filtroFooter('2')">Compra</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">CONTACTO</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="#">contacto@maquinatrix.cl</a>
                            </li>
                            <li>
                                <a href="#">8877 6655 44</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5 mb-3">
                <div class="linea"></div>
            </div>
            <div class="col-md-12 mb-2">
                <p class="text-white m-0">
                    Copyright ® Maquinatrix 2023. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".carrucel", {
        cssMode: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
        on: {
            slideChange: function () {
                // Obtén el índice del slide actual
                var currentIndex = swiper.activeIndex;

                // Cambia el color del contenedor y de sus hijos según el índice
                document.querySelector('.bg-carrucel').style.backgroundColor = getContainerColor(currentIndex);
                document.querySelectorAll('.slider-item').forEach(function (item) {
                    item.style.backgroundColor = getItemColor(currentIndex);
                });
            },
        },
    });

    // Define las funciones para obtener el color del contenedor y de los ítems según el índice
    function getContainerColor(index) {
        if (index === 0) {
            return '#FFD140';
        } else if (index === 1) {
            return '#1D8EFF';
        } else {
            return '#552E88';
        }
    }

    function getItemColor(index) {
        if (index === 0) {
            return '#FFD140';
        } else if (index === 1) {
            return '#1D8EFF';
        } else {
            return '#552E88';
        }
    }
    
    
  function buscarInicial(type) { 
    var category = type === "2" ? document.getElementById("category_compra").value: document.getElementById("category").value;
    var mov =  type === "2" ? 'comprar':'arrendar';
    var buscar = type === "2" ? document.getElementById("buscar-compra").value : document.getElementById("buscar").value; 
    var url = "tienda.php?typep="+type+"&category=" + encodeURIComponent(category) + "&buscar=" + encodeURIComponent(buscar)+"&"+mov;   
    window.location.href = url;
}
      
  function buscarTienda(type) { 
    var category = obtenerValorRadio();
    var mov =  type === "2" ? 'comprar':'arrendar';
    var buscar = document.getElementById("buscar").value; 
    var url = "tienda.php?typep="+type+"&category=" + encodeURIComponent(category) + "&buscar=" + encodeURIComponent(buscar)+"&"+mov;   
    window.location.href = url;
}
    
 
  function filtroFooter(type) { 
    var mov =  type === "2" ? 'comprar':'arrendar';
    var url = "tienda.php?typep="+type+"&"+mov; 
    window.location.href = url;
}
  function filtrotienda(type,categoria,otros,buscar) {  
    var url = "tienda.php?typep="+type+"&category=" + encodeURIComponent(categoria) + "&buscar=" + encodeURIComponent(buscar)+"&"+ otros; 
      window.location.href = url;
}
 
function conocemas(category){
    const tabList = document.querySelectorAll('.nav-link');
    var typep = '1';
    var mov = 'arrendar';
    // Iterar sobre los elementos de la lista de pestañas
    tabList.forEach(tab => {
      // Verificar si la pestaña está activa
      if (tab.classList.contains('active')) {
        // Obtener el ID del panel activo
        const activeTab = tab.getAttribute('href');
        console.log('La pestaña activa es:', activeTab);
        if(activeTab === '#comprar'){
            typep ='2';
            mov = 'comprar';
         } 
        var url = "tienda.php?category="+category+"&typep="+typep+"&"+mov;  
        window.location.href = url;
       }
    });
 } 
   function whats(type,id,name,url) {   
    <?php  $contact = getenv('WHATSAPP');   ?>
     
      var url1 = url+"/detalle.php?typep="+type+"&id=" + encodeURIComponent(id) + "&" + encodeURIComponent(name); 
      var text = document.getElementById("mensaje")?.value; 
      var text_ini = '¡Hola! Estoy interesado en el anuncio que vi en  Maquinatrix.';
      
      if(text!=='' && text){
          text_ini= text;
      }
      var redir = 'https://api.whatsapp.com/send?phone=<?=$contact?>&text=' + encodeURIComponent(text_ini) + ' ' + id + ' ' + encodeURIComponent(name) +
        '%20aquí:%20' + encodeURIComponent(url1);
        window.open(redir, '_blank');
}


function obtenerValorRadio() {
  var radios = document.getElementsByName('category');
  var valorSeleccionado = '';

  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      valorSeleccionado = radios[i].value;
      break;
    }
  } 
  return valorSeleccionado;
}
</script>

</body>
</html>

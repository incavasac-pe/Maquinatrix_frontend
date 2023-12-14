<div class="navbar navbar-light bg-maquinatrix navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="img/logo.svg" alt="logo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">☰</button>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav menu font-family-Roboto-Regular">
                <li class="dropdown menu-large nav-item">
                    <a href="#" onclick="redireccionarMenu('2','comprar')" class="nav-link">Comprar </a>
                </li>
                <li class="dropdown menu-large nav-item">
                    <a href="#" onclick="redireccionarMenu('1','arrendar')" class="nav-link">Arrendar </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    
  function redireccionarMenu(type,mov) {  
    var url = "tienda.php?page=1&typep="+type+"&"+mov;  
    window.location.href = url;
} 
</script>
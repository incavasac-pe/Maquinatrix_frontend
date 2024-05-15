<?php 
session_start(); 
if (isset($_SESSION['loggedIn'])) {
    $token = $_SESSION['token'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $photo = $_SESSION['photo'];
    $id_user_ext = $_SESSION['id_user_ext'];
}
  
?>
<?php include './header.php' ?>
<div class="navbar navbar-light bg-maquinatrix navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="./index.php">
            <img src="./assets/img/logo.svg" alt="logo">
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
        <?php if (!isset($_SESSION['loggedIn'])) { ?>
            <a class="login-link" href="./login.php"> INICIAR SESIÓN </a>
        <?php } ?> 
        <?php if (!isset($_SESSION['loggedIn'])) { ?>
            <a class="login-link" href="./login.php"> PUBLICA TU MAQUINARIA </a>
        <?php } ?> 
        <?php if (isset($_SESSION['loggedIn'])) { ?>
            <div class="publish-btn-wrapper">
                <a class="publish-btn" data-bs-toggle="modal" data-bs-target="#exampleModalPublication" >PUBLICA TU MAQUINARIA </a>
            </div>
     <?php } ?> 
<?php if (isset($_SESSION['loggedIn'])) { ?>
    <div class="dropdown">
        <button class="btn btn-secondary" onclick="showMwnu()" type="button" >
            <i class="fa-solid fa-bars"></i> <img class="profile-img" src="./assets/img/profile.png" alt="profile" />
        </button>
 
      <ul class="dropdown-menu main-menu">
            <li>
                <div class="profile-info">
                <p class="profile-name"> <?= $username ?? ''; ?> </p>
                <p class="profile-identity">ID usuario:  <?= $id_user_ext ?? ''; ?></p>
                </div>
            </li>
            <li><a class="dropdown-item" href="./user_details.php?tab=publication">Mis Publicaciones</a></li>
            <!-- <li><a class="dropdown-item" href="#">Solicitudes Hechas</a></li>
            <li><a class="dropdown-item" href="#">Solicitudes Recibidas</a></li> -->
            <li><a class="dropdown-item" href="./user_details.php?tab=profile">Mi Cuenta</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ayuda">Ayuda</a></li>  
            <li><a class="dropdown-item"  href="#" data-bs-toggle="modal" data-bs-target="#signout">Cerrar sesión</a></li>
            <li><a class="dropdown-item"></a></li>
            </ul>
      </div>
      <?php } ?>
    </div>
   
</div>
<div class="modal fade" id="signout" tabindex="-1" aria-labelledby="exampleModalLabel11" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header base-modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body base-modal-body">
      <img src="./assets/img/logout.png" alt="logout">
       <p>¿Deseas Cerrar Sesión y salir de tu cuenta?</p>
      </div>
      <div class="modal-footer base-modal-footer">
        <button type="button" class="grey-btn" data-bs-dismiss="modal">No</button>
        <a type="button"  href="create_session_portal.php?logout=true"  class="yellow-btn">Sí</a>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script> 
    function showMwnu(){
        var dropdownMenu = $(".main-menu");
        if (!dropdownMenu.hasClass("show")) {
            dropdownMenu.addClass("show");
        }else{
            dropdownMenu.removeClass("show");
        }
    }
    function redireccionarMenu(type,mov) {  
        var url = "tienda.php?page=1&typep="+type+"&"+mov;  
        window.location.href = url;
    } 
 
</script>

<?php include './ayuda.php' ?>
<?php include './publication_type.php' ?> 
<?php 
session_start(); 
if (isset($_SESSION['loggedIn'])) {
    $token = $_SESSION['token'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $photo = $_SESSION['photo'];
} else{
     header('location: index.php');
}
  
?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-5 font-family-Inter-SemiBold">
                <a href="javascript:void(0)" class="btn-navegador mobil" id="abrirnav">
                    <i class="fas fa-bars"></i>
                </a>
                Publicaciones
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-7 d-flex align-items-center justify-content-end">
                <div class="perfil position-relative">
                    <!-- cuadro para hacer click ocultar / aparecer -->
                    <div class="" id="abrirperfil">
                        <img src="../img/profile.jpeg" alt="perfil">
                        <span class="font-family-Roboto-Regular">
                           <?= $username; ?> <i class="fas fa-angle-down"></i>
                        </span>
                    </div>
                    <!-- cuadro oculto -->
                    <div class="perfil_abs" id="perfil_abs">
                        <div class="d-flex align-items-center justify-content-between con_perfil">
                            <div class="">
                                <img src="../img/profile.jpeg" alt="perfil">
                            </div>
                            <div class="">
                                <span class="font-family-Inter-Bold">   <?= $username; ?> </span>
                                <p class="font-family-Inter-Regular m-0">   <?= $email; ?> </p>
                                <a href="#" class="font-family-Inter-SemiBold">Ver mi perfil</a>
                            </div>
                        </div>
                        <div class="salir">
                            <a href="create_session.php?logout=true" class="font-family-Inter-Medium">
                                <i class="fas fa-sign-out mr-2"></i> Cerrar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 
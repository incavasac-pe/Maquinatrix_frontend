 <?php include 'header.php' ?>
<section class="bg_login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 cuadro2 d-flex align-items-center justify-content-center flex-column m-auto">
                <div class="box_login">
                    <div class="cuadro_login" id="cuadro_login">
                        <div class="text-center mb-3">
                            <img src="../img/logo-black.svg" alt="logo" class="logo">
                        </div>
                        <span class="text-danger align-middle" id="Msg"></span>
                        <h1 class="font-family-Inter-SemiBold">
                            Bienvenido administradora
                        </h1>
                        <p class="font-family-Inter-Regular text-gris">Ingresa los datos para continuar.</p>
                        <form action="" id="loginform" method="POST">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" name="email" id="email" placeholder="ejemplo@gmail.com">
                            </div>
                            <div class="form-group position-relative">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" id="password" name="password"
                                       placeholder="* * * * * * *">
                                <button id="mostrarOcultar" type="button"><i class="fas fa-eye"></i></button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_enviar font-family-Inter-Medium mt-3 w-100" name="redireccionar">
                                    Iniciar Sesión
                                </button>
                            </div>
                            <div class="form-group text-center">
                                <button type="button" class="btn_blanco font-family-Inter-SemiBold"
                                        id="recuperar">Olvide mi contraseña
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="cuadro_recuperar d-none" id="cuadro_recuperar">
                        <a href="javascript:void(0);" class="cerrar"><i class="far fa-arrow-left"></i></a>
                        <span class="text-danger align-middle" id="Msg_resert"></span>
                        <h1 class="font-family-Outfit-SemiBold">
                            Recupera tu contraseña
                        </h1>
                        <div>
                            <p class="font-family-Outfit-SemiBold">
                                Ingresa tu correo para enviar tu contraseña.
                            </p>
                        </div>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" id="correo" name="correo" placeholder="ejemplo@gmail.com">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn_enviar font-family-Inter-Medium w-100 mt-3" id="nextConfirma">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="d-none" id="confirma">
                        <h1 class="font-family-Outfit-SemiBold">
                            Enviamos la contraseña a tu correo
                        </h1>
                        <div>
                            <p class="font-family-Outfit-SemiBold text-gris">
                                No olvides de revisar tu carpeta de Correos no deseados o Spam.
                            </p>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn_enviar font-family-Inter-Medium w-100 mt-3 cerrar"
                                    data-toggle="modal">
                                Volver a Iniciar Sesión
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn_blanco font-family-Inter-SemiBold w-100" data-toggle="modal" data-target="#error"
                                    id="reenviar">Reenviar contraseña
                            </button>
                        </div>
                    </div>
                </div>

                <div class="copy">
                    <p class="font-family-Inter-Regular">
                        Panel v1.01 <br>
                        Copyright © 2022 Maquinatrix Company
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!-- Modal exitosa-->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none !important;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img src="../img/confirma.png" alt="confirma" class="mt-5">
                <p class="font-family-Inter-Regular text-center mt-3">
                    Contraseña reenviada
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn-black w-25 font-family-Roboto-Regular" data-dismiss="modal" aria-label="Close">
                    CONTINUAR
                </button>
            </div>
        </div>
    </div>
</div>
 
<?php include 'footer.php' ?>

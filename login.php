<?php include './header.php' ?>


<div class="login">
<div class="one-color"></div>
<div class="two-color"></div>
<div class="login-main">
<div class="login-container">
<div class="login-wrapper">
    <h1>Ingresa tus datos para iniciar</h1>
    <div class="mb-3">
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo electrónico">
</div>
<div class="mb-3">
<div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" placeholder="Crear contraseña"
                                id="exampleInputPassword1">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
</div>
<div class="login-btn-wrapper">
<a class="login-btn" href="./index.php">Ingresar </a>
</div>
<div class="register-btn-wrapper">
<a class="register-btn" href="./userType.php">Registrarse </a>
</div>
<div class="forget-link-wrapper">
<a class="forget-link" href="./forget_password.php">Olvidaste tu contraseña? </a>
</div>
<div class="hr-text">
    <hr> </hr>
    <p>O bien</p>
    <hr> </hr>
</div>
<div class="social-btns">
    <div class="linkedin-btn"> 
        <a class="linkedin" href="./index.php"><i class="fa-brands fa-facebook"></i> Con Facebook </a>
    </div>
    <div class="google-btn"> 
    <a href="./index.php" class="google"> <img src="./assets/img/google.png" alt="google" /> Con Google</a>
    </div>
</div>
</div>
</div>
</div>

</div>

<script> $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
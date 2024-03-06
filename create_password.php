<?php include 'header.php' ?>
<?php include 'menu.php' ?>


<div class="create-pwd-main">
    <div class="create-pwd-container">
        <h1>Olvidaste tu contraseña</h1>
        <p>Ingresa tu correo electrónico y te enviaremos un código para crear una nueva contraseña.</p>
        <div class="input-group" id="show_hide_password" style="margin-bottom: 20px;">
        <input type="password" class="form-control" placeholder="Crear contraseña" id="exampleInputPassword1" >
        <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
        </div>
        <div class="input-group" id="show_hide_confirm_password">
        <input type="password" class="form-control" placeholder="Confirmar contraseña" id="exampleInputPassword2">
        <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
        </div>
        <div class="create-pwd-btn-wrapper">
        <a class="create-pwd-btn" href="./login.php">Ingresar </a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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



$(document).ready(function() {
    $("#show_hide_confirm_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_confirm_password input').attr("type") == "text"){
            $('#show_hide_confirm_password input').attr('type', 'password');
            $('#show_hide_confirm_password i').addClass( "fa-eye-slash" );
            $('#show_hide_confirm_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_confirm_password input').attr("type") == "password"){
            $('#show_hide_confirm_password input').attr('type', 'text');
            $('#show_hide_confirm_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_confirm_password i').addClass( "fa-eye" );
        }
    });
});

</script>
<?php include './header.php' ?>
<?php  $baseUrl = getenv('URL_API');   

//Include Configuration File
include('config.php');

$login_button = '';
  
if(!isset($_SESSION['token']))
{ 
 $login_button = '<a href="'.$google_client->createAuthUrl().'" class="google"><img src="./assets/img/google.png" alt="google" /> Con Google</a>';
 }
?>


<div class="login">
<div class="one-color">  
        <img id="start" src="./assets/img/logo.svg" alt="logo">     
</div>
<div class="two-color"></div>
<div class="login-main">
<div class="login-container">
<div class="login-wrapper"> 
    <span class="text-danger align-middle" id="Msg"></span>
    <?php
// Otras líneas de código...

if (isset($_GET['register'] ) ) {
    $parametro = $_GET['register'];
    if ($parametro == true) {
        echo ' <span class="text-success align-middle" id="Msg"><div class="alert alert-success" role="alert">Registro Exitoso.</div></span>';
    }else{
        echo ' <span class="text-success align-middle" id="Msg"><div class="alert alert-danger" role="alert">No se pudo completar el registro.</div></span>';  
    }
}

// Otras líneas de código...
?>
    <h1>Ingresa tus datos para iniciar</h1>
    <form action="" id="loginform" method="POST">
    <div class="mb-3">
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Correo electrónico">
</div>
<div class="mb-3">
<div class="input-group" id="show_hide_password">
            <input type="password" class="form-control" placeholder="Contraseña"
                id="exampleInputPassword1">
            <div class="input-group-addon">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
        </div>
</div>
        <div class="login-btn-wrapper">
            <button type="submit" id="login-account" class="login-btn">Ingresar </button>
        </div>
</form>
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
    <?php  echo '  <div class="google-btn"> '.$login_button . '</div>';   ?>
    
</div>
</div>
</div>
</div>

</div>

<script> 
 
$(document).ready(function() {
    console.log( "ready nuew!" );
    validarToken(); 
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

    ('#start').submit(function(e) {  
        window.location.href = './index.php';
    }); 
 
    $('#loginform').submit(function(e) {  
        console.log("se inicia sesion")     
        e.preventDefault();
        login();
    });  
});

function validarToken() {
        console.log("se valida el token");
        // Obtener el valor del parámetro "token" de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        $('#login-account').prop('disabled', true);
        if (token) { 
            $("#Msg").html("");
            // Deshabilitar el botón 
            var url = '<?=$baseUrl?>/activate_account?token='+encodeURIComponent(token);

                $.ajax({
                    url: url,
                    type: "GET", 
                    contentType: "application/json",
                    success: function(response) {
                        $('#login-account').prop('disabled', false);
                        $("#Msg").html("<div class='alert alert-success' role='alert'>Se ha activado la cuenta. Puede iniciar sesión.</div>");         
                    // Manejar la respuesta del servidor en 'response'
                    console.log(response);  
                    },
                    error: function(xhr, status, error) { 
                    $("#Msg").html("<div class='alert alert-danger' role='alert'>Error al validar la cuenta.</div>");         
                    console.log(error);
                    }
                }); 
        
            } else {
                $('#login-account').prop('disabled', false);
                console.log('No se encontró el parámetro "token" en la URL.');
       
            }
        } 

               
 //inicio de sesion    
    function login() { 
        $("#Msg").html("");
        $('#login-account').prop('disabled', true);
         // Obtener los valores de los campos de entrada
            var email = $('#exampleFormControlInput1').val();
            var password = $('#exampleInputPassword1').val();

            var formData = {
                email: email,
                password: password,
                credencials : 1
            }; 
         $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/login_account',
            data: JSON.stringify(formData),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {             
                  window.location.href = 'create_session_portal.php?email=' + response.data.email_User+'&token='+response.data.token+'&loggin=true&username='+response.data.full_name+'&photo='+response.data?.photo+'&id_user_ext='+response.data?.id_user_ext+'&id_user='+response.data?.id_user;
                 } else {
                 $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                 $('#login-account').prop('disabled', false);              
                }
           },
           error: function(response,xhr, textStatus, errorThrown) {
               var statusCode = xhr.status;  
                $("#Msg").html("<div class='alert alert-danger' role='alert'>Ha ocurrido un error.</div>");
                $('#login-account').prop('disabled', false);
           }
       });
     }
</script>
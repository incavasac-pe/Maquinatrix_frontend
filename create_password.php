<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php  $baseUrl = getenv('URL_API'); ?>
<?php  $email = $_POST['email'];?>

<div class="create-pwd-main">
    <div class="create-pwd-container">
    <span class="text-success align-middle" id="Msg"></span>
        <h1>Crea tu nueva contraseña</h1>
        <p>Crea una nueva contraseña con la que ingresarás de ahora en adelante a tu cuenta Maquinatrix.</p>
        <form action="" id="passwordform" method="POST"> 
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
         <button class="create-pwd-btn" id="new_password"  >Continuar </button>
        </div>
        </form>
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

<script>  
    $(document).ready(function() {
        $('#passwordform').submit(function(e) {  
              e.preventDefault();  
            $("#Msg").html("");   

            
            var new_password = $("#exampleInputPassword1").val();
            var conf_password = $("#exampleInputPassword2").val();
 
            if(new_password!=conf_password ){
                $("#Msg").html("<div class='alert alert-danger' role='alert'>Las contraseñas deben coincidir.</div>"); 
                return
            }

            $('#new_password').prop('disabled', true); 
            var data = {
                email:'<?= $email?>',
                new_password: new_password,
                password: conf_password
            };

            $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/resetPassword',
            data: JSON.stringify(data),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {
                    $("#Msg").html("<div class='alert alert-success' role='alert'>" + response.msg  + "</div>");      
                    login();
                  } else {
                   $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                   $('#new_password').prop('disabled', false);              
                }
             },
                error: function(response,xhr, textStatus, errorThrown) {
                    console.log(response.responseJSON.msg)
                    var statusCode = xhr.status;  
                        $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
                        $('#new_password').prop('disabled', false);
                }
            });
           
        });  
    });
                   
 //inicio de sesion    
 function login() { 
        $("#Msg").html("");       
         // Obtener los valores de los campos de entrada
            var email = $('#exampleFormControlInput1').val();
            var password = $('#exampleInputPassword2').val();

            var formData = {
                email:'<?= $email?>',
                password: password
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
                    
                }
           },
           error: function(response,xhr, textStatus, errorThrown) {
               var statusCode = xhr.status;  
                $("#Msg").html("<div class='alert alert-danger' role='alert'>Ha ocurrido un error.</div>"); 
           }
       });
     }
</script> 
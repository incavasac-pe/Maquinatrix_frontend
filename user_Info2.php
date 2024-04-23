<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 
   $baseUrl = getenv('URL_API'); 
    if (isset($_GET['type']) && $_GET['type']!='') {
          $type_user  = $_GET['type']; 
    }  
  ?>

<div class="user-info-main">
    <div class="user-info-container">
    <span class="text-success align-middle" id="Msg"></span>
        <h1>Hola Empresa, ingresa tus datos</h1>
        <form id="myForm" action="location.php" method="POST">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">
                    <input type="hidden" class="form-control" id="type_user"  name="type_user" value="<?=$type_user?>" >
                        <input type="text" class="form-control" id="exampleInputRazonSocial"  name="exampleInputRazonSocial" placeholder="Razón Social">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputRutEmpresa" name="exampleInputRutEmpresa" placeholder="RUT empresa">

                    </div>
                </div>
            </div>
            <p class="input-heading">Datos representante legal</p>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputName" name="exampleInputName" 
                            placeholder="Nombres representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">
 
                        <input type="text" class="form-control" id="exampleInputSurname" name="exampleInputSurname" 
                            placeholder="Apellidos representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputRutRP" name="exampleInputRutRP" 
                            placeholder="Rut representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" 
                            placeholder="Correo electrónico" aria-describedby="emailHelp">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" placeholder="Crear contraseña"
                                id="exampleInputPassword1" name="exampleInputPassword1" >
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <div class="input-group" id="show_hide_confirm_password">
                            <input type="password" class="form-control" placeholder="Confirmar contraseña"
                                id="exampleInputPassword2" name="exampleInputPassword2">
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Estoy de acuerdo con nuestros <span>Términos de
                        Servicio</span> y <span> Políticas de Privacidad </span></label>
            </div>

            <button type="button" id="continue-btn" class="btn btn-primary ">Continuar</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    });



    $(document).ready(function () {
        $("#show_hide_confirm_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_confirm_password input').attr("type") == "text") {
                $('#show_hide_confirm_password input').attr('type', 'password');
                $('#show_hide_confirm_password i').addClass("fa-eye-slash");
                $('#show_hide_confirm_password i').removeClass("fa-eye");
            } else if ($('#show_hide_confirm_password input').attr("type") == "password") {
                $('#show_hide_confirm_password input').attr('type', 'text');
                $('#show_hide_confirm_password i').removeClass("fa-eye-slash");
                $('#show_hide_confirm_password i').addClass("fa-eye");
            }
        });
    });
 
    $(document).ready(function () {
    $('#continue-btn').click(function() {
         // event.preventDefault(); 
         var form = $(this).closest('form');
          $("#Msg").html("");    
          if(  $('#exampleInputRazonSocial').val() =='' ||  $('#exampleInputRutEmpresa').val() =='' || $('#exampleInputName').val() =='' ||  $('#exampleInputSurname').val()  =='' ||    $('#exampleInputEmail1').val()  =='' 
          || $('#exampleInputRutRP').val() ==''  ){
              $("#Msg").html("<div class='alert alert-danger' role='alert'>Debe completar todos los campos.</div>");
              return;
          } 
          if( $('#exampleInputPassword1').val() != $('#exampleInputPassword2').val() ){
              $("#Msg").html("<div class='alert alert-danger' role='alert'>Las contraseñas no coinciden.</div>");
              return;
          } 
       
          var isChecked = $('#exampleCheck1').is(":checked");
          if(!isChecked){
            $("#Msg").html("<div class='alert alert-danger' role='alert'>Debe aceptar los Términos y Políticas.</div>");
              return;
          }
        
            $('#continue-btn').prop('disabled', true); 
            var data = { 
                email: $('#exampleInputEmail1').val()  
            };
            $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/validateEmail',
            data: JSON.stringify(data),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error) {    
                  console.log("se envia formulario")
                  form.submit(); // Enviar el formulario utilizando la referencia almacenada
                  } else {
                   $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                   $('#continue-btn').prop('disabled', false);              
                }
           },
                error: function(response,xhr, textStatus, errorThrown) {
                    console.log(response.responseJSON.msg)
                    var statusCode = xhr.status;  
                        $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
                        $('#continue-btn').prop('disabled', false);
                }
            });
           
        });  
      });
</script>
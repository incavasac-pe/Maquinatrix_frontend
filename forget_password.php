<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php  $baseUrl = getenv('URL_API'); ?>

<div class="forget-pwd-main">
    <div class="forget-pwd-container">
     <span class="text-danger align-middle" id="Msg"></span>
        <h1>Olvidaste tu contraseña</h1>
        <p>Ingresa tu correo electrónico y te enviaremos un código para crear una nueva contraseña.</p>
        <form action="" id="forgotform" method="POST">
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electrónico" aria-describedby="emailHelp">
            <div class="forget-pwd-btn-wrapper">
                <button type="submit" id="forget-pwd"  class="forget-pwd-btn" href="./verification_code.php">Ingresar </button> 
            </div>
        </form> 
    </div>
</div>
<script>  
    $(document).ready(function() {
        $('#forgotform').submit(function(e) {  
              e.preventDefault();  
            $("#Msg").html("");   
            $('#forget-pwd').prop('disabled', true);
            var email = $('#exampleInputEmail1').val();

            $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/generateDigPassword',
            data: JSON.stringify({email:email}),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {     
                 var form = $('<form></form>');
                        form.attr('method', 'post');
                        form.attr('action', './verification_code.php');

                        // Agregar parámetros al formulario
                        var input = $('<input type="hidden" name="email" />');
                        input.val(email);
                        form.append(input);

                        // Agregar el formulario al cuerpo del documento
                        form.appendTo('body');

                        // Enviar el formulario
                        form.submit();     
                  } else {
                   $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                   $('#forget-pwd').prop('disabled', false);              
                }
           },
                error: function(response,xhr, textStatus, errorThrown) {
                    var statusCode = xhr.status;  
                    $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
                        $('#forget-pwd').prop('disabled', false);
                }
            });
           
        });  
    });
</script>

   
 
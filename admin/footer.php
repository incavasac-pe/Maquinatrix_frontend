<script>
    $(document).ready(function () {
        $("#mostrarOcultar").click(function () {
            var tipo = $("#password").attr("type");
            if (tipo === "password") {
                $("#password").attr("type", "text");
                $(this).html('<i class="fas fa-eye-slash"></i>');
            } else {
                $("#password").attr("type", "password");
                $(this).html('<i class="fas fa-eye"></i>');
            }
        });

        $('#recuperar').click(function () {
            $('#cuadro_login').addClass('d-none');
            $('#cuadro_recuperar').removeClass('d-none');
        })
        $('.cerrar').click(function () {
            $('#cuadro_login').removeClass('d-none');
            $('#cuadro_recuperar').addClass('d-none');
            $('#confirma').addClass('d-none');
        })
        $('#abrirperfil').click(function () {
            $('#perfil_abs').toggle();
            $(this).find("i").toggleClass("fa-angle-down fa-angle-up");
        })
        //envio de contraseña
        $('#nextConfirma').click(function () {
            $("#Msg_resert").html(""); 
            var email = $('#correo').val(); 
            resetPassword(email);           
        })
            //reenvio de contraseña
        $('#reenviar').click(function () {
            $("#Msg_resert").html(""); 
            var email = $('#correo').val(); 
            resetPassword(email);           
        })
        $('#abrirnav').click(function () {
            $('#sidebar').css('width','250px');
            $('#sidebar').css('display','inline-block');
        });
        $('#cerrarnav').click(function () {
            $('#sidebar').css('width','0');
            $('#sidebar').css('display','none');
        })
        $('#filtros').click(function () {
            $('#filtroabs').removeClass('d-none');
            $(this).find("i").removeClass("fa-chevron-down").addClass('fa-chevron-up');
        })
        $('#closefiltros').click(function () {
            $('#filtroabs').addClass('d-none');
            $('#filtros').find("i").removeClass("fa-chevron-up").addClass('fa-chevron-down');
        })
         
        //inicio de sesion
      $('#loginform').submit(function(e) {       
        e.preventDefault();
        $("#Msg").html("");
        $.ajax({
            type: "POST",
            url: '<?= getenv('URL_API_DEV') ?>/login_account',
            data: $(this).serialize(),
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {             
                  window.location.href = 'create_session.php?email=' + response.data.email+'&token='+response.data.token+'&loggin=true&username='+response.data.full_name+'&photo='+response.data.photo;
                 } else {
                 $("#Msg").html("<div class='alert alert-danger' role='alert'>Credenciales inválidas</div>");                  
                }
           },
           error: function(response,xhr, textStatus, errorThrown) {
               var statusCode = xhr.status; 
               console.log("re",response.responseJSON.msg) 
                $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.responseJSON.msg  + "</div>");

           }
       });
     });
    });
    function resetPassword(email){
     $.ajax({
            type: "POST",
            url: '<?= getenv('URL_API_DEV') ?>/resetPassword',
            data:{email:email },
            success: function(response, textStatus, xhr)
                    {
                        var statusCode = xhr.status; 
                        if (statusCode === 200 && !response.error) {
                             $('#confirma').removeClass('d-none');
                             $('#cuadro_recuperar').addClass('d-none');
                        }else {
                            alert('Error');
                        }
                   },
                   error: function(response,xhr, textStatus, errorThrown) {
                       var statusCode = xhr.status;  
                        $("#Msg_resert").html("<div class='alert alert-danger' role='alert'>" + response.responseJSON.msg  + "</div>");
                         }
               });
     }
     
</script>

</body>
</html>

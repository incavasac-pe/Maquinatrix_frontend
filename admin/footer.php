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
        $('#nextConfirma').click(function () {
            $('#confirma').removeClass('d-none');
            $('#cuadro_recuperar').addClass('d-none');
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
           $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'http://localhost:3500/login_account',
            data: $(this).serialize(),
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)
                {
                  console.log("loggin sii",response)   
                  console.log("loggin sii",response.data.email)                 
                  window.location.href = 'create_session.php?email=' + response.data.email+'&token='+response.data.token+'&loggin=true&username='+response.data.full_name+'&photo='+response.data.photo;
                
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           },
           error: function(response,xhr, textStatus, errorThrown) {
               var statusCode = xhr.status;
               alert('Error: ' + response.responseJSON.msg);
               console.log("re",response.responseJSON.msg) 
                $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.responseJSON.msg  + "</div>");

           }
       });
     });
    });
</script>

</body>
</html>

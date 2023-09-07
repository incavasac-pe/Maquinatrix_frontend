<script>
    $(document).ready(function () {
        $("#mostrarOcultar").click(function () {
            var tipo = $("#contrasena").attr("type");
            if (tipo === "password") {
                $("#contrasena").attr("type", "text");
                $(this).html('<i class="fas fa-eye-slash"></i>');
            } else {
                $("#contrasena").attr("type", "password");
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
    });
</script>

</body>
</html>

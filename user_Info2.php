<?php include 'header.php' ?>
<?php include 'menu.php' ?>


<div class="user-info-main">
    <div class="user-info-container">
        <h1>Hola Empresa, ingresa tus datos</h1>
        <form>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputName" placeholder="Razón Social">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputSurname" placeholder="RUT empresa">

                    </div>
                </div>
            </div>
            <p class="input-heading">Datos representante legal</p>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputName"
                            placeholder="Nombres representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputSurname"
                            placeholder="Apellidos representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <input type="text" class="form-control" id="exampleInputSurname"
                            placeholder="Rut representante legal">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Correo electrónico" aria-describedby="emailHelp">

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="mb-3">

                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" placeholder="Crear contraseña"
                                id="exampleInputPassword1">
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
                                id="exampleInputPassword2">
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



    document.getElementById('continue-btn').addEventListener('click', function () {
    window.location.href = 'location.php';
  });


</script>
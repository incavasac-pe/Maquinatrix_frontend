<?php include 'header.php' ?>
<?php include 'menu2.php' ?>
<?php 
 
    if (isset($_GET['type']) && $_GET['type']!='') {
          $type_user  = $_GET['type']; 
    }  
  ?>

<div class="user-info-main">
  <div class="user-info-container">
    <h1>Ahora, puedes ingresar tus datos</h1>
    <form action="location.php" method="POST">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">
              <input type="hidden" class="form-control" id="type_user"  name="type_user" value="<?=$type_user?>" >
              <input type="text" class="form-control" id="exampleInputName"  name="exampleInputName" placeholder="Nombres">

            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <input type="text" class="form-control" id="exampleInputSurname"  name="exampleInputSurname" placeholder="Apellidos">

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Correo electrónico"
                aria-describedby="emailHelp">

            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="mb-3"> 
              <select id="exampleInputTypeDoc" name="exampleInputTypeDoc" required>
                <option value="" selected disabled hidden>Documento</option>
                <option value="1">RUT</option>
                <option value="2">Pasaporte</option> 
              </select>

            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="mb-3">

              <input type="number" class="form-control" id="exampleInputDocNumber" name="exampleInputDocNumber" placeholder="Núm. documento">

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control" placeholder="Crear contraseña" id="exampleInputPassword1" name="exampleInputPassword1">
                <div class="input-group-addon">
                  <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <div class="input-group" id="show_hide_confirm_password">
                <input type="password" class="form-control" placeholder="Confirmar contraseña" id="exampleInputPassword2">
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
      <button type="submit" id="continueButton" class="btn btn-primary ">Continuar</button>
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

</script>
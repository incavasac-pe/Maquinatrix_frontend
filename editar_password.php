
<?php include 'header.php' ?>

<div class="modal fade pwd-modal" id="pwd-editar-modal" tabindex="-1" aria-labelledby="exampleModalLabel66" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered ">
    <div class="modal-content">
    <div class="modal-header ">
   
        <h1 class="dir-heading">Cambiar contraseña</h1>  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body base-modal-body">
      <form action="location.php" method="POST">
        <div class="row mb-3">
            <p class="pwd-title">Cambia tu contraseña. Te recomendamos usar una contraseña segura que no uses en ningún otro sitio.</p>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <div class="input-group" id="show_hide_password_old">
                <input type="password" class="form-control" placeholder="Contraseña actual" id="exampleInputPasswordold" name="exampleInputPasswordold">
                <div class="input-group-addon">
                  <i class="fa fa-eye-slash see1" aria-hidden="true"></i> 
                </div>
              </div>
            </div>
          </div>
        </div>
    
      <div class="row">

      <p class="pwd-title">Ahora, Ingresa una contraseña nueva.</p>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control" placeholder="Crear contraseña" id="exampleInputPassword1" name="exampleInputPassword1">
                <div class="input-group-addon">
                  <i class="fa fa-eye-slash see2" aria-hidden="true"></i> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="mb-3">

              <div class="input-group" id="show_hide_confirm_password">
                <input type="password" class="form-control" placeholder="Confirmar contraseña" id="exampleInputPassword2">
                <div class="input-group-addon">
                 <i class="fa fa-eye-slash see3" aria-hidden="true"></i> 
                </div>
              </div>

            </div>
          </div>
        </div>      <span class="text-danger align-middle" id="Msg2"></span>
      </form>
      </div>
      <div class="modal-footer ">
      <button type="button" id="continueButtonLocation" class="btn btn-primary edit-pwd-cancel-btn" >Cancelar</button>
      <button type="button" id="continueButtonLocation" class="btn btn-primary edit-pwd-continue-btn" onclick="setValuePassword(8)" >Guardar Cambios</button>

      </div>
    </div>
  </div>
</div>


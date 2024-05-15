<?php include 'header.php' ?>


<div class="modal fade" id="signOut" tabindex="-1" aria-labelledby="signOut" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header base-modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body base-modal-body">
       <img src="./assets/img/logout.png" alt="logout">
       <p>¿Deseas Cerrar Sesión y salir de tu cuenta?</p>
      </div>
      <div class="modal-footer base-modal-footer">
        <button type="button" class="grey-btn" data-bs-dismiss="modal">No</button>
        <a type="button"  href="create_session_portal.php?logout=true"  class="yellow-btn">Sí</a>
      </div>
    </div>
  </div>
</div>
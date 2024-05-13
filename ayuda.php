<?php include 'header.php' ?>


<div class="modal fade" id="ayuda" tabindex="-1" aria-labelledby="exampleModalLabelAyuda" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabelAyuda">Ayuda</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ayuda-body">
      Si necesitas asistencia contáctanos con un mensaje directo, estamos para ayudarte.
      </div>
      <div class="modal-footer ayuda-footer">
        <button  class="whatsapp-btn" type="button" data-bs-dismiss="modal"><img src="./assets/img/whatsapp.png" alt="whatsapp">WhatsApp de Soporte</button>
      
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {    
  $('.whatsapp-btn').click(function () {    
  
   <?php $contact = getenv('WHATSAPP'); ?>      
    var text_ini = '¡Hola! Estoy interesado contactar con soporte.'; 
    var redir = 'https://api.whatsapp.com/send?phone=<?=$contact?>&text=' + encodeURIComponent(text_ini);
      window.open(redir, '_blank');
  });
});
</script>
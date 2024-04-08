<?php include 'header.php' ?>


<!-- Modal -->
<div class="modal  fade" id="exampleModalPublication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tipo de Publicación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body publication-modal">
                <p>Selecciona el tipo de publicación que deseas crear</p>
                <div class="custom-select" id="customSelect">


                    <div class="custom-option" onclick="selectOption(this,'Arriendo')">
                        <img src="./assets/img/Arriendo.png" alt="Arriendo">
                        <p>Arriendo</p>
                    </div>
                    <div class="custom-option" onclick="selectOption(this,'Venta')">
                        <img src="./assets/img/Venta.png" alt="Venta">
                        <p>Venta</p>
                    </div>

                </div>

            </div>
            <div class="modal-footer publication-footer">
               
                    <a class="publication-type-btn" id="loginRedirectPub" href="#">Continuar </a>
                
            </div>
        </div>
    </div>
</div>

<script>
 

 function selectOption(element, value) {
     
     if(value === "Arriendo" || value==="Venta") {
        const options = document.querySelectorAll('.custom-option');
        options.forEach(option => option.classList.remove('selected'));

      
        element.classList.add('selected');
     }
       
     const loginRedirect = document.getElementById('loginRedirectPub');
        if (value === 'Arriendo') {
            loginRedirect.href = 'Arriendo_sale.php';
        } else if (value === 'Venta') {
            loginRedirect.href = 'publish_sale.php';
        }
       
    }
</script>
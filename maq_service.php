<?php include 'header.php' ?>


<div class="modal maq_service_modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel99" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel99">Servicios de Maquinatrix</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-box-wrapper" style="border-bottom: 1px solid #E4E5E7;
opacity: 1;">
                    <img src="./assets/img/garuntee.png" alt="garuntee">
                    <div>
                        <p class="box-main-heading">Garantía Maquinatrix</p>
                        <p class="box-sub-heading">Ahorra dinero que usarías en reparaciones imprevistas que podrían
                            ocurrir durante el período de alquiler. Sólo define qué monto de garantía necesitas y
                            Maquinatrix dejará el dinero en custodia para la seguridad y transparencia de ambas partes.
                            Cuando se termine el arriendo, revisarás tu equipo y determinarás si se devuelve la
                            totalidad de la garantía o un monto parcial o nada de ésta. En tanto, el arrendatario podrá
                            calificar y comentar tu servicio.</p>
                    </div>
                </div>
                <div class="modal-box-wrapper" style="border-bottom: 1px solid #E4E5E7;
opacity: 1;">
                    <img src="./assets/img/pay.png" alt="pay">
                    <div>
                        <p class="box-main-heading">Paga Ahora o Después</p>
                        <p class="box-sub-heading">Asegura liquidez y seguridad en tus negocios. Pide desde el 20% hasta
                            el 100% de la renta adelantada, o bien, deja el pago para el final del período de arriendo.
                            El pago lo recibirás a medida que se cumplan las horas de arriendo equivalentes al adelanto.
                            Así ambas partes estarán protegidas en la transacción mientras el dinero es retenido en
                            nuestra plataforma. En tanto, el arrendatario tendrá la opción de pagar en cuotas con
                            tarjeta de crédito.</p>
                    </div>
                </div>
                <div class="modal-box-wrapper">
                    <img src="./assets/img/finance.png" alt="finance">
                    <div>
                        <p class="box-main-heading">Financiamiento Maquinatrix</p>
                        <p class="box-sub-heading">Consigue el financiamiento de una factura de alquiler, o bien, el
                            crédito para la compra de un vehículo o maquinaria. Contactanos al whatsapp al +56 9 3370
                            1381, o bien, a ventas@maquinatrix.com y averigua si hay factibilidad para lo que deseas.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="maq_ser-cancel-btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="maq_ser-learn-btn" onclick="redirectToServices()">Conoce más</button>
                </div>
            </div>
        </div>
    </div> 



    <script>
function redirectToServices() {
  window.location.href = 'https://empresa.maquinatrix.com/servicios/';
}
</script>
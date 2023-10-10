<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <img src="img/logo-white.png" alt="logo">
            </div>
            <div class="col-md-12">
                <div class="row justify-content-between">
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">CONTENIDO</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="#">Repuestos</a>
                            </li>
                            <li>
                                <a href="#">Neumaticos</a>
                            </li>
                            <li>
                                <a href="#">Productos y Accesorios</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">SERVICIOS</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="#">Arriendo</a>
                            </li>
                            <li>
                                <a href="#">Compra</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h3 class="font-family-Roboto-Medium">CONTACTO</h3>
                        <ul class="font-family-Roboto-Regular">
                            <li>
                                <a href="#">contacto@maquinatrix.cl</a>
                            </li>
                            <li>
                                <a href="#">8877 6655 44</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5 mb-3">
                <div class="linea"></div>
            </div>
            <div class="col-md-12 mb-2">
                <p class="text-white m-0">
                    Copyright ® Maquinatrix 2023. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".carrucel", {
        cssMode: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
        on: {
            slideChange: function () {
                // Obtén el índice del slide actual
                var currentIndex = swiper.activeIndex;

                // Cambia el color del contenedor y de sus hijos según el índice
                document.querySelector('.bg-carrucel').style.backgroundColor = getContainerColor(currentIndex);
                document.querySelectorAll('.slider-item').forEach(function (item) {
                    item.style.backgroundColor = getItemColor(currentIndex);
                });
            },
        },
    });

    // Define las funciones para obtener el color del contenedor y de los ítems según el índice
    function getContainerColor(index) {
        if (index === 0) {
            return '#FFD140';
        } else if (index === 1) {
            return '#1D8EFF';
        } else {
            return '#552E88';
        }
    }

    function getItemColor(index) {
        if (index === 0) {
            return '#FFD140';
        } else if (index === 1) {
            return '#1D8EFF';
        } else {
            return '#552E88';
        }
    }
</script>

</body>
</html>

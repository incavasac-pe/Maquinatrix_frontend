<?php include 'header.php' ?>
<?php include 'menu.php' ?>


<div class="verification-code-main">
    <div class="verification-code-container">
        <h1>Ingresa el código que enviamos</h1>
        <p>Hemos enviado un código de 4 dígitos al correo que ingresaste. Escríbelo a continuación.</p>
        <div class="input-field">
            <input type="number" />
            <input type="number" disabled />
            <input type="number" disabled />
            <input type="number" disabled />
        </div>
        <p class="seconds">Podrás reenviarlo en 30 segundos.</p>
        <div class="login-btn-wrapper">
<a class="login-btn" href="./create_password.php">Iniciar Sesión </a>
</div>
<div class="resend-btn-wrapper">
<a class="resend-btn" href="./index.php">Reenviar Código </a>
</div>
    </div>
</div>


<script>
    const inputs = document.querySelectorAll("input"),
        button = document.querySelector("button");

    // iterate over all inputs
    inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {

            const currentInput = input,
                nextInput = input.nextElementSibling,
                prevInput = input.previousElementSibling;


            if (currentInput.value.length > 1) {
                currentInput.value = "";
                return;
            }

            if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }


            if (e.key === "Backspace") {

                inputs.forEach((input, index2) => {

                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }
                });
            }

            if (!inputs[3].disabled && inputs[3].value !== "") {
                button.classList.add("active");
                return;
            }
            button.classList.remove("active");
        });
    });


    window.addEventListener("load", () => inputs[0].focus());
</script>
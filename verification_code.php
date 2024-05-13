<?php include 'menu.php' ?>
<?php  $baseUrl = getenv('URL_API'); ?>
<?php  $email = $_POST['email'];?>

<div class="verification-code-main">
    <div class="verification-code-container">
    <span class="text-success align-middle" id="Msg"></span>
        <h1>Ingresa el código que enviamos</h1>
        <p>Hemos enviado un código de 4 dígitos al correo que ingresaste. Escríbelo a continuación.</p>
        <form action="" id="codeform" method="POST"> 
            <div class="input-field">
                <input type="number" id="code1" />
                <input type="number" id="code2"  disabled />
                <input type="number"  id="code3"  disabled />
                <input type="number" id="code4"  disabled />
            </div>
            <p class="seconds"0>Podrás reenviarlo en 30 segundos.</p>
            <div class="login-btn-wrapper">
              <button type="submit" id="validate_code"  class="login-btn">Iniciar Sesión </button>  
            </div>
        </form> 
<div class="resend-btn-wrapper">
    <a class="resend-btn" id="resend-btn" href="javascript:void(0);">Reenviar Código </a>

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

<script>  
    $(document).ready(function() {
        $('#codeform').submit(function(e) {  
              e.preventDefault();  
            $("#Msg").html("");   
            $('#validate_code').prop('disabled', true); 
            var data = {
                email:'<?= $email?>',
                code: $('#code1').val() +  $('#code2').val() + $('#code3').val()+ $('#code4').val()
            };
            $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/validateDigPassword',
            data: JSON.stringify(data),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {    
                    var form = $('<form></form>');
                        form.attr('method', 'post');
                        form.attr('action', './create_password.php');

                        // Agregar parámetros al formulario
                        var input = $('<input type="hidden" name="email" />');
                        input.val('<?= $email?>');
                        form.append(input);

                        // Agregar el formulario al cuerpo del documento
                        form.appendTo('body');

                        // Enviar el formulario
                        form.submit();   
                  } else {
                   $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                   $('#validate_code').prop('disabled', false);              
                }
           },
                error: function(response,xhr, textStatus, errorThrown) {
                    console.log(response.responseJSON.msg)
                    var statusCode = xhr.status;  
                        $("#Msg").html("<div class='alert alert-danger' role='alert'>"+response.responseJSON.msg+"</div>");
                        $('#validate_code').prop('disabled', false);
                }
            });
           
        });  


        $('#resend-btn').click(function(e) {  
              e.preventDefault();   
            var email =  '<?=$email?>';

            $.ajax({
            type: "POST",
            url: '<?=$baseUrl?>/generateDigPassword',
            data: JSON.stringify({email:email}),
             contentType: "application/json",
            success: function(response, textStatus, xhr)
            {
                var statusCode = xhr.status; 
                if (statusCode === 200 && !response.error)  {     
                    $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");  
                  } else {
                    $("#Msg").html("<div class='alert alert-danger' role='alert'>" + response.msg  + "</div>");            
                }
           },
                error: function(response,xhr, textStatus, errorThrown) {
                    var statusCode = xhr.status;  
                     
                }
            });
           
        });  
    });
</script>
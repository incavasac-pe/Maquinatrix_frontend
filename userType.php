<?php include 'menu2.php' ?>


<div class="user-type-main">
    <div class="user-type-container">
    <h1>Ingresa tus datos para iniciar</h1>
    <p>Selecciona el tipo de usuario que eres</p>
    <div class="custom-select" id="customSelect">
 
  
    <div class="custom-option" onclick="selectOption(this,'Particular')">
<img src="./assets/img/Particular.png" alt="particular">
<p>Particular</p>
</div>
    <div class="custom-option" onclick="selectOption(this,'Company')">
    <img src="./assets/img/Company.png" alt="Company">
<p>Empresa</p>
</div>
   
</div>
<div class="user-type-btn-wrapper">
<a class="user-type-btn"  id="loginRedirect" href="#">Ingresar </a>
</div>
    </div>
</div>

<script>
 

 function selectOption(element, value) {
     
     if(value === "Particular" || value==="Company") {
        const options = document.querySelectorAll('.custom-option');
        options.forEach(option => option.classList.remove('selected'));

      
        element.classList.add('selected');
     }
       
     const loginRedirect = document.getElementById('loginRedirect');
        if (value === 'Particular') {
            loginRedirect.href = 'account_method.php?type=Particular';
        } else if (value === 'Company') {
            loginRedirect.href = 'user_Info2.php?type=Company';
        }
       
    }
</script>

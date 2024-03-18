<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 
 
    if (isset($_GET['type']) && $_GET['type']!='') {
       echo $type  = $_GET['type']; 
    }  
  ?>


<div class="acc-method-main">
    <div class="acc-method-container">
        <h1>Hola Particular, selecciona un método para crear tu cuenta:</h1>
        <div class="acc-social-btns">
  
    <div class="acc-btn"> 
    <a href="./user_info.php?type=<?=$type?>" class="email"> <img src="./assets/img/email.png" alt="email" /> Registro con Correo</a>
    </div>
    <div class="acc-btn"> 
    <a href="./user_info.php?type=<?=$type?>" class="google"> <img src="./assets/img/google.png" alt="google" /> Registro con Google</a>
    </div>
    <div class="acc-btn"> 
        <a class="facebook" href="./user_info.php?type=<?=$type?>"><i class="fa-brands fa-facebook"></i> Registro con Facebook </a>
    </div>
    
</div>
    </div>
</div>
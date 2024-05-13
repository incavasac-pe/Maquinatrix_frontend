<?php  session_start();?>
<?php include 'menu2.php' ?>
<?php include 'config.php' ?>
 
<?php 
    if (isset($_GET['type']) && $_GET['type']!='') {
         $type  = $_GET['type']; 
       if($type =='Particular'){
          $_SESSION['type'] = 1;
        }else{
          $_SESSION['type'] = 2;
        }
    }  
    $login_button = '<a href="'.$google_client->createAuthUrl().'" class="google"><img src="./assets/img/google.png" alt="google" />  Registro con Google</a>';
  ?>

<div class="acc-method-main">
    <div class="acc-method-container">
        <h1>Hola Particular, selecciona un método para crear tu cuenta:</h1>
        <div class="acc-social-btns">
  
    <div class="acc-btn"> 
    <a href="./user_info.php?type=<?=$type?>" class="email"> <img src="./assets/img/email.png" alt="email" /> Registro con Correo</a>
    </div>
    <div class="acc-btn"> 
    <?php  echo '  <div class="acc-btn"> '.$login_button . '</div>';   ?>
    </div>
    <div class="acc-btn"> 
        <!--a class="facebook" href="./user_info.php?type=<?=$type?>"><i class="fa-brands fa-facebook"></i> Registro con Facebook </a-->
    </div>
    
</div>
    </div>
</div>

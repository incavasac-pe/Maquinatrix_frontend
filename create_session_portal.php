<?php
session_start();
 
if (isset($_GET['email']) && isset($_GET['token']) &&  isset($_GET['loggin']) ) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['email'] = $_GET['email'];    
    $_SESSION['username'] =  $_GET['username'];   
    $_SESSION['photo'] =  $_GET['photo'] ?? '';   
    $_SESSION['token'] =  $_GET['token'];   
    $_SESSION['id_user_ext'] =  $_GET['id_user_ext']; 
    $_SESSION['id_user'] =  $_GET['id_user']; 
  print_r($_SESSION); 
    header('location: index.php');
}
if (isset($_GET['logout']) ) {
  session_destroy();  
  header('location: index.php'); 
}
?>
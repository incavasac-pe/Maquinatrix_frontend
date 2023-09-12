<?php
session_start();
 
if (isset($_GET['email']) && isset($_GET['token']) &&  isset($_GET['loggin']) ) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['email'] = $_GET['email'];    
    $_SESSION['username'] =  $_GET['username'];   
    $_SESSION['photo'] =  $_GET['photo'] ?? '';   
    $_SESSION['token'] =  $_GET['token'];   
  print_r($_SESSION); 
     header('location: panel.php');
}
if (isset($_GET['logout']) ) {
    session_destroy();  
 header('location: index.php');
 
}
?>
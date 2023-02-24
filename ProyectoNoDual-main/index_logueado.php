<?php

session_start();
$user_logged = false;

if( isset($_SESSION['usuario'])){
    $user_logged = true;
} 


include("fragment/cabecera.html");

include("fragment/menu_logueado.php");

include("fragment/portada_logueado.html");
include("fragment/pie2.html");

?>
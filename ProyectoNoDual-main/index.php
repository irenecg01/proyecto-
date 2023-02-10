<?php

session_start();
$user_logged = false;

if( isset($_SESSION['usuario'])){
    $user_logged = true;
} 


include("fragment/cabecera.html");

include("fragment/menu.php");

include("fragment/portada.html");
include("fragment/pie.html");

?>
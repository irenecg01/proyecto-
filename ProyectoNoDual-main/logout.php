<?php

session_start();
session_destroy();
$user_logged = false;


include("fragment/cabecera.html");
include("fragment/menu.php");
include("fragment/portada.html");
include("fragment/pie.html");

?>
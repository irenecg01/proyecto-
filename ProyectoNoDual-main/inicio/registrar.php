<?php
    include("conexion.php");
    $nombre=$_GET["nombre"];
    $usuario=$_GET["usuario"];
    $contraseña=$_GET["contraseña"];
    $correo=$_GET["correo"];

    $base->query("INSERT INTO usuarios (nombre,usuario,contraseña,correo) VALUES ('$nombre', '$usuario','$contraseña', '$correo');");
    header("Location:/");



?>
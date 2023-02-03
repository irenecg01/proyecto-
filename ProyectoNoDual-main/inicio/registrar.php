<?php
    include("conexion.php");
    $nombre=$_GET["nombre"];
    $correo=$_GET["correo"];
    $usuario=$_GET["usuario"];
    $contrasena=$_GET["contrasena"];

    $base->query("INSERT INTO usuarios (nombre,correo,usuario,contrasena) VALUES ('$nombre', '$correo', '$usuario', '$contrasena')");
    header("Location:/");



?>
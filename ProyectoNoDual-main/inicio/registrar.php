<?php
    $validate = true;

    if( !isset($_POST["nombre"]) ) $validate = false;
    if( !isset($_POST["usuario"]) ) $validate = false;
    if( !isset($_POST["correo"]) ) $validate = false;
    if( !isset($_POST["contraseña"]) || (strlen($_POST["contraseña"])<2) ) $validate = false;

    if( $validate ){

        $nombre=$_POST["nombre"];
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contraseña"];
        $correo=$_POST["correo"];

        include("conexion.php");

        $query = "INSERT INTO usuarios (nombre,usuario,contrasena,correo) VALUES ( ?, ? ,? , ?) ";

        $q = $conn->prepare($query);
        $q->bind_param("ssss", $nombre, $usuario, $contrasena, $correo);
        $q->execute();

        echo $q->affected_rows;

        if( $q->affected_rows == 1){
            // Usuario insertado correctamente
            header("location: /index.php");

        } else {

        }

    }

?>
<?php

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

try {

  include("conexion.php");
  
  $sql = "SELECT * FROM usuarios WHERE (correo=:correo  or usuario=:correo) AND contraseña=:contraseña";
  $resultado = $base->prepare($sql);
  $login = htmlentities(addslashes($_POST['correo']));
  $password = htmlentities(addslashes($_POST['contraseña']));
  $resultado->bindValue(":correo", $correo);
  $resultado->bindValue(":contraseña", $contraseña);
  $resultado->execute();
  
  $numero_registro = $resultado->rowCount();
  
  if ($numero_registro != 0) {
    session_start();
    $_SESSION['usuario'] = $_POST['correo'];
    echo "usuario login";
    header("Location: /");
  } else {
    echo "usuario incorrecto";
    header("Location: /inicio");
  }

} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}



?>
<?php
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "ipet";
$conn = mysqli_connect($servername, $username, $contraseña, $dbname);
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
//echo "Conexión exitosa";
?>
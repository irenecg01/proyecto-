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

function getPerros() {

  global $conn;
  
  $sql = "SELECT nombre, tipo, raza, genero, estado, descripcion,chip,imagen FROM animales";
  $stmt = $conn->prepare($sql); 
  $stmt->execute();
  $result = $stmt->get_result();

  $perros = array();
  while ($row = $result->fetch_assoc()) {
    $perros[] = $row;
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $perros;
}


//funcion con los valores del filtro 
function getPerrosFiltrado($tipo, $raza, $estado) {

  global $conn;
  
  $sql = "SELECT nombre, tipo, raza, genero, estado, descripcion,chip,imagen FROM animales WHERE tipo=? AND raza=? AND estado=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("sss", $tipo, $raza, $estado);
  $stmt->execute();
  $result = $stmt->get_result();

  $perros = array();
  while ($row = $result->fetch_assoc()) {
    $perros[] = $row;
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $perros;
}


function getPerrosTipo($tipo) {

  global $conn;
  
  $sql = "SELECT nombre, tipo, raza, genero, estado, descripcion,chip,imagen FROM animales WHERE tipo=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $tipo );
  $stmt->execute();
  $result = $stmt->get_result();

  $perros = array();
  while ($row = $result->fetch_assoc()) {
    $perros[] = $row;
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $perros;
}

?>
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

function getPerros() { // esta funcion lo que hace es coger la tabla con todo 

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
function getPerrosFiltrado($tipo, $raza, $estado) { // esta funcion hace un select con el tipo , la raza y el estado que hayas escogido 

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


function getPerrosTipo($tipo) { // funcion que hace que coge el tipo de ha escogido , el tipo es perro o gato 

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



function getTipos(){ // agruparlo en tipo 
    
  global $conn;
  
  $sql = "SELECT tipo FROM `animales` GROUP by tipo";
  $stmt = $conn->prepare($sql); 
   $stmt->execute();
  $result = $stmt->get_result();

  $tipos = array();
  while ($row = $result->fetch_assoc()) {
    $tipos[] = $row["tipo"];
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $tipos;

}

function getPerrosRaza($raza) { // funcion que hace que coge el tipo de ha escogido , el tipo es perro o gato 

  global $conn;
  
  $sql = "SELECT nombre, tipo, raza, genero, estado, descripcion,chip,imagen FROM animales WHERE raza=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $raza );
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


function getRazas($tipo){ // esta funcion hace que cuando tenga el tipo , enseñe la raza de este 
  
  global $conn;
  
  $sql = "SELECT raza FROM `animales` where tipo = ? GROUP by raza";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $tipo );
  $stmt->execute();
  $result = $stmt->get_result();

  $razas = array();
  while ($row = $result->fetch_assoc()) {
    $razas[] = $row["raza"];
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $razas;

}

/*function getEdad($tipo){ // funcion filtro edad (estado es edad )
  global $conn;

   
  $sql = "SELECT raza FROM `animales` where tipo = ? GROUP by estado";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $tipo );
  $stmt->execute();
  $result = $stmt->get_result();

  $edades = array();
  while ($row = $result->fetch_assoc()) {
    $edaddes[] = $row["edad"];
  }

  // 5. Cerrar la conexión a la base de datos y retornar el arreglo de perros
  $stmt->close();
  return $edades;
}*/

?>
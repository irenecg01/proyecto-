<?php
include("inicio/conexion.php");

if (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['chip'])  && isset($_POST['raza']) && isset($_POST['genero']) && isset($_POST['estado'])&& isset($_POST['lugar'])  && isset($_FILES["imagen"]) && isset($_POST['descripcion'])) {

    $nombre= $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $chip = $_POST['chip'];
    $raza = $_POST['raza'];
    $genero = $_POST['genero'];
    $estado = $_POST['estado'];
    $lugar = $_POST['lugar'];
    $imagen=$_POST[''];
    $descripcion = $_POST['descripcion'];
    try {
        if ($conn) {

            $query = "INSERT INTO animalesperdidos (nombre, tipo,chip, raza, genero, estado,lugar, imagen, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssssssss', $nombre, $tipo,$chip, $raza, $genero, $estado,$lugar, $imagen, $descripcion);
            $stmt->execute();


            echo "Los datos se han guardado correctamente.";
        } else {
            echo "Error en la conexión a la base de datos.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn->close();

} else {
    echo "Error. Faltan datos en el formulario.";
}

?>
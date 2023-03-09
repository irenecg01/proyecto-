<?php
include("inicio/conexion.php");

if (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['raza']) && isset($_POST['genero']) && isset($_POST['estado']) && isset($_FILES["imagen"]) && isset($_POST['descripcion'])) {

    $nombre_mascota = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $raza = $_POST['raza'];
    $genero = $_POST['genero'];
    $estado = $_POST['estado'];
    //$imagen = "img/uploads/" . $_FILES["imagen"]["name"];
    $descripcion = $_POST['descripcion'];
    $ruta_temporal = $_FILES['imagen']['tmp_name'];
    $carpeta = 'img/uploads/';
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_destino = $carpeta . $nombre_archivo;

    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
        $imagen = "img/uploads/" . $nombre_archivo;

    } else {
        echo "Error al mover el archivo.";
    }

    // Convertir la imagen en formato binario
    $imagen = file_get_contents($ruta_destino);
    try {
        if ($conn) {

            $query = "INSERT INTO animales (nombre, tipo, raza, genero, estado, imagen, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssssss', $nombre_mascota, $tipo, $raza, $genero, $estado, $imagen, $descripcion);
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
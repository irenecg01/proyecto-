<?php
include("inicio/conexion.php");

if (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['raza']) && isset($_POST['genero']) && isset($_POST['estado'])&& isset($_POST['chip'])&& isset($_FILES["imagen"]) && isset($_POST['descripcion'])) {

    $nombre_mascota = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $raza = $_POST['raza'];
    $genero = $_POST['genero'];
    $estado = $_POST['estado'];
    $chip = $_POST['chip'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_archivo = "img/uploads/" . $nombre_archivo;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_archivo);

    $descripcion = $_POST['descripcion'];
    try {
        if ($conn) {

            $query = "INSERT INTO animales (nombre, tipo, raza, genero, estado,chip, imagen, descripcion) VALUES (?, ?, ?, ?, ? , ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssssss', $nombre_mascota, $tipo, $raza, $genero, $estado,$chip, $ruta_archivo, $descripcion);
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

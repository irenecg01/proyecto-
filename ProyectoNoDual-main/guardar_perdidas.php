<?php
include("inicio/conexionperdidas.php");

if (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['raza'])&& isset($_POST['chip']) && isset($_POST['genero']) && isset($_POST['estado']) && isset($_FILES["imagen"]) && isset($_POST['descripcion']) && isset($_POST['telefono']) && isset($_POST['correo'])) {

    $nombre_mascota = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $raza = $_POST['raza'];
    $chip = $_POST['chip'];
    $genero = $_POST['genero'];
    $estado = $_POST['estado'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_archivo = "img/uploads/" . $nombre_archivo;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_archivo);

    $descripcion = $_POST['descripcion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    try {
        if ($conn) {

            $query = "INSERT INTO animalesperdidos (nombre, tipo, raza,chip, genero, estado, imagen, descripcion,telefono,correo) VALUES (?, ? ,  ?, ?, ?, ?, ?, ?, ? , ? )";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssssssss', $nombre_mascota, $tipo, $raza,$chip, $genero, $estado, $ruta_archivo, $descripcion,$telefono,$correo);
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


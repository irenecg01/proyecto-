
<?php

session_start();
$user_logged = false;

if( isset($_SESSION['usuario'])){
    $user_logged = true;
} 


$mascotas = [];

$mascotas[] = [
    'nombre' => 'Nieve',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];
$mascotas[] = [
    'nombre' => 'Nieve',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];
$mascotas[] = [
    'nombre' => 'Andres',
    'raza' => 'Husky',
    'chip' => 'Si',
    'descripion' => 'Perro muy obediente y tranquilo. No tiene problema al relacionarse con otros perros o humanos.',
    'imagen' => "img/adoptar1.png"
];

$mascotas_json = json_encode($mascotas);

include("fragment/cabecera.html");
include("fragment/menu_logueado.php");

?>

<script>
    var mascotas = <?php echo $mascotas_json ?>
</script>

<?php
include("fragment/adoptar_logueado.html");
include("fragment/pie2.html");

?>
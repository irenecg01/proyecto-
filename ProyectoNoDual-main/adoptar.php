
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
    'nombre' => 'Nieve',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];

$mascotas_json = json_encode($mascotas);

include("fragment/cabecera.html");
include("fragment/menu.php");

?>

<script>
    var mascotas = <?php echo $mascotas_json ?>
</script>

<?php
include("fragment/adoptar.html");
include("fragment/pie2.html");
?>
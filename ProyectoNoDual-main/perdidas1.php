<?php

$mascotas= [];

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
    'nombre' => 'Perro',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];

$mascotas_json = json_encode($mascotas);

include("fragment/cabecera.html");
include("fragment/menu_invitado.html");

?>

<script>
    var mascotas = <?php echo $mascotas_json ?>
</script>

<?php
include("fragment/perdidas1.html");
include("fragment/pie2.html");
?>
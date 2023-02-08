<?php

$mascotas = [];

$mascotas[] = [
    'nombre' => 'Nieve',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];
$mascotas[] = [
    'nombre' => 'Irene',
    'raza' => 'Husky',
    'chip' => 'Si',
    'imagen' => "img/adoptar1.png"
];
$mascotas[] = [
    'nombre' => 'Cerezo',
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
include("fragment/adoptar.html");
include("fragment/pie2.html");
?>
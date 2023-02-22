
<?php

//var_dump($_GET);

include("inicio/conexion.php");
session_start();
$user_logged = false;

if( isset($_SESSION['usuario'])){
    $user_logged = true;
} 

if( !isset($_GET["tipo"] )){
    $perritos = getPerros();
} else {
    $tipo = $_GET["tipo"];
    
    if($tipo=="todos") {
        $perritos = getPerros();
    }else $perritos = getPerrosTipo($tipo);

}


//var_dump($perritos);

$perritos_json = json_encode($perritos);
//print_r($perritos_json);

include("fragment/cabecera.html");
include("fragment/menu.php");

?>

<script>
    var mascotas = <?php echo $perritos_json ?>
</script>
<?php
include("fragment/adoptar_logueado.html");
include("fragment/pie2.html");
?>
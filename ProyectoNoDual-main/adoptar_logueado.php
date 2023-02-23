
<?php

//var_dump($_GET);

include("inicio/conexion.php");
session_start();
$user_logged = false;

if( isset($_SESSION['usuario'])){
    $user_logged = true;
} 

$tipos = getTipos();

$razas = [];
$tipo = null;
$raza = null;
$edades=null;

if( !isset($_GET["tipo"] )){
    $perritos = getPerros();
} else {
    $tipo = $_GET["tipo"];
    $razas = getRazas($tipo);

    if($tipo=="Todos") {
        $perritos = getPerros();
    }else $perritos = getPerrosTipo($tipo);

}

if( isset($_GET["raza"] )){
    $raza=$_GET["raza"];
}
//var_dump($perritos);

$perritos_json = json_encode($perritos);
//print_r($perritos_json);

include("fragment/cabecera.html");
include("fragment/menu_logueado.php");

?>

<script>
    var tipo = <?php echo  json_encode($tipo) ?>;
    var tipos = <?php echo  json_encode($tipos) ?>;
    var razas = <?php echo  json_encode($razas) ?>;

    var mascotas = <?php echo $perritos_json ?>;
    var filtroraza = null;
    <?php if($raza) echo("filtroraza = '".$raza."';"); ?>
</script>
<?php
include("fragment/adoptar_logueado.html");
include("fragment/pie2.html");
?>
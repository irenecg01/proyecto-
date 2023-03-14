
<?php

//var_dump($_GET);

include("inicio/conexionperdidas.php");
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
   

    if($tipo=="Todos") {
        $perritos = getPerros();
    }else $perritos = getPerrosTipo($tipo);
   
}

$perritos_json = json_encode($perritos);

include("fragment/cabecera.html");
include("fragment/menu.php");

?>

<script>
    var tipo = <?php echo  json_encode($tipo) ?>;
    var tipos = <?php echo  json_encode($tipos) ?>;
    var razas = <?php echo  json_encode($razas) ?>;

    var raza = <?php echo json_encode($raza) ?>;
    <?php if($raza) echo("filtroraza = '".$raza."';"); ?>

    var mascotas = <?php echo $perritos_json ?>;

</script>
<?php
include("fragment/perdidas1.html");
include("fragment/pie.html");
?>
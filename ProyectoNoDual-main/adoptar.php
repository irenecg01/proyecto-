
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
   // echo("ho hay tipo");
} else {
    $tipo = $_GET["tipo"];
   // $razas = getRazas($tipo);
    //echo("hay tipo");
   //echo($tipo);
    //echo("<hr>");
   // var_dump($razas);

    if($tipo=="Todos") {
        $perritos = getPerros();
    }else $perritos = getPerrosTipo($tipo);
   // echo("<hr>");

  //  var_dump($perritos);
}
//echo("<hr>");
/*
if( isset($_GET["raza"] )){
    $raza=$_GET["raza"];
  //  echo("hay raza");
    //echo($raza);
   // echo("<hr>");
    if($raza=="Todos") {
        //$perritos = getPerrosTipo($tipo);
    }else $perritos = getPerrosRaza($raza);   
   // echo("<hr>");
    //var_dump($perritos);
}
//var_dump($perritos);
*/
$perritos_json = json_encode($perritos);
//print_r($perritos_json);

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
include("fragment/adoptar.html");
include("fragment/pie2.html");
?>
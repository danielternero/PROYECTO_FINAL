<?php
session_start();
if ($_GET['tema']==="clasico") {
unset($_SESSION["tema"]);
    $_SESSION["tema"]=array("planes","instalaciones","carrusel","carrusel_automatico","cuerpo","contenidodatos","contenidoplan","contenidoplan2","arriba","debajo","centro");
}
if ($_GET['tema']==="privameral") {
unset($_SESSION["tema"]);
 $_SESSION["tema"]=array("planes2","instalaciones2","carrusel2","carrusel_automatico2","cuerpo2","contenidodatos2","contenidoplan3","contenidoplan3b","arriba2","debajo2","centro2");
}
header("location: proyecto1.php");
?>
<?php
session_start();
if ($_GET['tema']==="clasico") {
unset($_SESSION["tema"]);
    $_SESSION["tema"]=array("planes","instalaciones","carrusel","carrusel_automatico","cuerpo","contenidodatos","contenidoplan","contenidoplan2","arriba","debajo","centro","formulario");
}
if ($_GET['tema']==="privameral") {
unset($_SESSION["tema"]);
	
 $_SESSION["tema"]=array("planes2","instalaciones2","carrusel2","carrusel_automatico2","cuerpo2","contenidodatos2","contenidoplan3","contenidoplan3b","arriba2","debajo2","centro2","formulario");
}

if ($_GET['tema']==="sombrio") {
unset($_SESSION["tema"]);
$_SESSION["tema"]=array("planes3","instalaciones3","carrusel3","carrusel_automatico3","cuerpo3","contenidodatos3","contenidoplan4","contenidoplan4b","arriba3","debajo3","centro2","formulario3");
}

header("location: Proyecto1.php");
?>
<?php
session_start();
if ($_GET['tema']==="clasico") {
unset($_SESSION["tema"]);
    $_SESSION["tema"]=array("planes","instalaciones","carrusel","carrusel_automatico","cuerpo");
}
if ($_GET['tema']==="privameral") {
unset($_SESSION["tema"]);
 $_SESSION["tema"]=array("planes2","instalaciones2","carrusel2","carrusel_automatico2","cuerpo2");
}
header("location: proyecto1.php");
?>
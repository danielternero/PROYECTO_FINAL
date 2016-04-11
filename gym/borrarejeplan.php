<?php
include_once("./configuraciondb.php");
session_start();

if (isset($_GET['idplan'])){
	
 $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	$result = $connection->query("DELETE FROM conforma WHERE FKID_PLAN=".$_GET['idplan']." and FKID_EJERCICIO=".$_GET['idejer'].";");

}
header("Location: adminplan.php");



?>
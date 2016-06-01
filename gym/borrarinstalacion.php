<?php
   include_once("./configuraciondb.php");
   if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    
    $connection->query("DELETE FROM instalaciones WHERE instalaciones.SALA='".$_GET['id']."';");
   
     	unset($connection);
        header("Location: admininstalacion.php");
         
         
    ?>
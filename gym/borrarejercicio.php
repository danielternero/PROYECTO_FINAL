<?php
   include_once("./configuraciondb.php");
   if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    
    $connection->query("DELETE FROM ejercicios WHERE ejercicios.NOMBRE_EJER='".$_GET['id']."';");
   
     unset($obj);
     unset($connection);
        header("Location: adminejercicio.php");
         
          
    ?>
<?php
   include_once("./configuraciondb.php");
if (!isset($db_name)){
header('Location:formulario_instalador.php');
}
   
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    
        
    $consulta=$connection->query("select ID_PLAN from plan where plan.FKDNI='".$_GET['id']."';");
     while($obj = $consulta->fetch_object()){
            
            $idplan=$obj->ID_PLAN;

     }
	//PARA PODER BORRAR LOS USUARIOS TENEMOS QUE BORRAR EL CONFORMA Y EL PLAN SI LOS TUVIERA..

    $connection->query("DELETE FROM conforma WHERE conforma.FKID_PLAN='".$idplan."';");
    $connection->query("DELETE FROM plan WHERE plan.FKDNI='".$_GET['id']."';");
    $connection->query("DELETE FROM usuario WHERE usuario.DNI='".$_GET['id']."';");
   
     unset($obj);
     unset($connection);

        header("Location: adminusuario.php");
         
          
    ?>
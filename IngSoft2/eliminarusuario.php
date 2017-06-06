<?php

	#hacer la conexion con mysqli con a base de datos
$conexion = new mysqli("localhost", "root", "", "toptapas");



#Comprobar la conexión

$miVariable =  $_COOKIE["variable"];
$admin ='admin';

if($miVariable != $admin){
	#Insertar datos a través de la sentencia INSERT
//}
$consulta = "DELETE  FROM registrarse WHERE Alias= '".$miVariable."' ";

$resultado = $conexion -> query($consulta)|| die("No se ha podido realizar el alta");
}


header ("Location: admin.php");
//
?>
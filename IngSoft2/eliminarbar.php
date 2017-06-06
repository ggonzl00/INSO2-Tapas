<?php

	#hacer la conexion con mysqli con a base de datos
$conexion = new mysqli("localhost", "root", "", "toptapas");



#Comprobar la conexión

$miVariable =  $_COOKIE["variable"];


	#Insertar datos a través de la sentencia INSERT
$consulta = "DELETE  FROM restaurantes WHERE Nombre= '".$miVariable."' ";

$resultado = $conexion -> query($consulta)|| die("No se ha podido realizar el alta");


header ("Location: admin.php");
//echo " La reserva se ha realizado correctamente </br>";
//echo " <a href=' admin.php '> Admin</a>";
//
?>
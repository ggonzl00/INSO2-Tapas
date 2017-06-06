<?php

	#hacer la conexion con mysqli con a base de datos
$conexion = new mysqli("localhost", "root", "", "toptapas");



#Comprobar la conexión
if ($conexion->connect_errno) {
printf("Conexión fallida: %s", $conexion->connect_error);
exit();
}
	
	#Variables sacadas del formulario de la calse practica2.php
	$nombre=$_POST['nombre'];
	//$valoracion=$_POST['valoracion'];
	$valoracion=NULL;
	$mesas=$_POST['mesas'];
	$direccion = $_POST['direccion'];
	$telefono=$_POST['telefono'];
	
	//echo $nombre;

	//foreach ($_POST['checkbox'] as $id){ 
   

	//$asiento=$_POST['checkbox'];

	//$resultado=$asiento;

	#Insertar datos a través de la sentencia INSERT
$consulta = "INSERT INTO restaurantes VALUES('$nombre', '$valoracion', '$mesas','$direccion','$telefono')";

$resultado = $conexion -> query($consulta)|| die("No se ha podido realizar el alta");



header ("Location: admin.php");
//
?>
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
	$apellido=$_POST['apellido'];
	$alias=$_POST['alias'];
	$pass = $_POST['psw'];
	$telefono=$_POST['telefono'];
	$dni = $_POST['dni'];
	//echo $nombre;

	//foreach ($_POST['checkbox'] as $id){ 
   

	//$asiento=$_POST['checkbox'];

	//$resultado=$asiento;

	#Insertar datos a través de la sentencia INSERT
$consulta = "INSERT INTO registrarse VALUES('$nombre', '$alias', '$apellido','$telefono','$pass','$dni')";

$resultado = $conexion -> query($consulta)|| die("No se ha podido realizar el alta");



echo " La reserva se ha realizado correctamente </br>";
echo " <a href=' Login.html '> Ingresar</a>";
//
?>
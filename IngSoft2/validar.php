<?php

	#hacer la conexion con mysqli con a base de datos
$conexion = new mysqli("localhost", "root", "", "toptapas");



#Comprobar la conexión
if ($conexion->connect_errno) {
printf("Conexión fallida: %s", $conexion->connect_error);
exit();
}
	
	#Variables sacadas del formulario de la calse practica2.php
	$uname=$_POST['uname'];
	$pass=$_POST['psw'];
	
	//echo $nombre;

	//foreach ($_POST['checkbox'] as $id){ 
   

	//$asiento=$_POST['checkbox'];

	//$resultado=$asiento;

	#Insertar datos a través de la sentencia INSERT
$consulta = "SELECT pass FROM registrarse  WHERE Alias= ";

$resultado = $conexion -> query($consulta)|| die("No se ha podido realizar el alta");
$solucion[]=0;
 while($valores = mysqli_fetch_array($resultado)){
  //  echo $valores;
    $solucion[]= $valores['Pass'];
    

    //$resultado=$uno[$contador];
    
  } 
echo $solucion[0];

//echo " La reserva se ha realizado correctamente </br>";
//echo " <a href=' Login.html '> Ingresar</a>";
//
?>
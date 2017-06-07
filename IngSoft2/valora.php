<?php

$conexion = new mysqli("localhost", "root", "", "toptapas");

$poner= "SELECT valoracion FROM restaurantes WHERE nombre='".$_GET['nombre']."'";

$resu =$conexion->query($poner);


$me = mysqli_fetch_array($resu);
$media= ($me['valoracion'] + $_GET['numero'])/2;

$consulta2 = "UPDATE restaurantes SET valoracion ='$media' WHERE nombre='".$_GET['nombre']."'";
$cambio =$conexion->query($consulta2);
$var = mysqli_fetch_array($cambio);
echo round($var,2);

?>
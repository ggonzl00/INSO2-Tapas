<?php
$conexion = new mysqli("localhost", "root", "", "toptapas");
$poner= "SELECT * FROM restaurantes WHERE nombre='".$_GET['nombre']."'";
$resu =$conexion->query($poner);


$me = mysqli_fetch_array($resu);

if($me['mesas']>0){


    $consulta2 = "UPDATE restaurantes SET mesas = mesas - 1  WHERE nombre='".$_GET['nombre']."'";
    $cambio =$conexion->query($consulta2);

}
//echo $me['mesas'];
//echo $consulta2;
//$resultado= mysqli_fetch_array($cambio);
//echo $resultado;
?>
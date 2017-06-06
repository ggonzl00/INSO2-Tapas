<?php
$conexion = new mysqli("localhost", "root", "", "toptapas");
?>
<!DOCTYPE html>
<html>
<head>
    <h2>Pagina Principal</h2>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function reservar() {
            var nombrereserva = document.getElementById('botonreserva').name;
            alert(nombrereserva);
            <?php
            $quitar = "SELECT mesas FROM restaurantes WHERE nombre=nombrereserva";

            $resu = $conexion->query($quitar);

            while ($tabla = mysqli_fetch_array($resu)) {
                echo $tabla;
                $tabla['mesas'] = -1;
            }
            ?>
        }
    </script>
</head>
<style>
    #form {
        width: 250px;
        margin: 0 auto;
        height: 50px;
    }

    #form p {
        text-align: center;
    }

    #form label {
        font-size: 20px;
    }

    input[type="radio"] {
        display: none;
    }

    label {
        color: grey;
    }

    .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
    }

    label:hover,
    label:hover ~ label {
        color: orange;
    }

    input[type="radio"]:checked ~ label {
        color: orange;
    }
    #productos{
    text-align:center;
    }
    #valoracion{
        text-align: right;
    }
    #botonreserva{
        align-content: center;
    }
</style>
<body>
<?php
$consulta = "SELECT * FROM restaurantes";
$consulpro ="SELECT * FROM productos";
$resultado = $conexion -> query($consulta);
$resultadopro = $conexion -> query($consulpro);
while($tabla = mysqli_fetch_array($resultado)){
    echo "<div class='restaurantes'>";


    echo "<div><img src=".$tabla['nombre'].".jpg alt=Avatar class=avatar>";
    echo "<h3 href=#".$tabla['nombre']." class=btn btn-info data-toggle=collapse>".$tabla['nombre']."</h3></div>";

    echo "<div id=".$tabla['nombre']." class=collapse>";
    echo "<a>Direccion:    ".$tabla['direccion'].  "</a></br>";
    echo "<a>Telefono de Consulta:    ".$tabla['telefono'].  "</a></br>";
    echo "<a>Mesas disponibles:    ".$tabla['mesas'].  "</a></br>";


    echo "<div id=productos>Productos:                  Precio:</br>";
    while($tablapro = mysqli_fetch_array($resultadopro)){

        echo"<b>".$tablapro['nombre']. "</b>";
        echo"<b>".$tablapro['precio']. "</b></br>";
    }

    echo "</div>";
    echo "<input type=button id=botonreserva value=reserva name=".$tabla['nombre']." onclick=reservar()>";
    ?>
    <form>
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5">
        <label for="radio1">&#9733;</label>
    <input id="radio2" type="radio" name="estrellas" value="4">
        <label for="radio2">&#9733;</label>
    <input id="radio3" type="radio" name="estrellas" value="3">
        <label for="radio3">&#9733;</label>
    <input id="radio4" type="radio" name="estrellas" value="2">
        <label for="radio4">&#9733;</label>
    <input id="radio5" type="radio" name="estrellas" value="1">
        <label for="radio5">&#9733;</label>


</form>

<?php
    echo "<div id=valoracion><c>Valoracion de los Clientes:    ".$tabla['valoracion'].  "</c></br>";
    echo "</p></div></div></div>";
}
?>
</body>
</html>

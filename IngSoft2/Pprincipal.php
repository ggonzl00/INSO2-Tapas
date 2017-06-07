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
        function valora(id,nombre,numero){
            var nombre =nombre;
            //alert(nombre);
            $.ajax({
                // aqui va la ubicación de la página PHP


                url:'valora.php',
                type:'GET',

                data:{nombre:nombre,numero:numero},
                success:function(resultado){


                    $('#valoracion').html(resultado);


                }
            });
        }
        function reservar(mesas,nombre) {
          //  alert (nombre);

            //var nombrereserva = document.getElementById(nombre);
           // alert (nombrereserva);
           // alert(mesas);
            if(mesas<=0){
               alert("No hay mesas disponibles para la reserva");
            }else {
                alert("Ha reservado una mesa");
                mesas -= 1;
            }
            $.ajax({
                // aqui va la ubicación de la página PHP


                url:'reserva.php',
                type:'GET',

                data:{nombre:nombre,mesas:mesas},
                success:function(resultado){


                    $('#nombre').html(resultado);


                }
            });
          //  alert(mesas);
          //  return mesas;

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
$resultado = $conexion -> query($consulta);

//SELECCIONAMOS LOS BARES DE LA BASE DE DATOS
while($tabla = mysqli_fetch_array($resultado)){
    echo "<div class='restaurantes'>";


    echo "<div><img src=".$tabla['nombre'].".jpg alt=Avatar class=avatar>";
    echo "<h3 href=#".$tabla['nombre']." class=btn btn-info data-toggle=collapse>".$tabla['nombre']."</h3></div>";

    echo "<div id=".$tabla['nombre']." class=collapse>";
    echo "<a>Direccion:    ".$tabla['direccion'].  "</a></br>";
    echo "<a>Telefono de Consulta:    ".$tabla['telefono'].  "</a></br>";
    echo " Mesas disponibles:    <a id=".$tabla['nombre'].">".$tabla['mesas'].  "</a></br>";


    echo "<div id=productos>Productos:                  Precio:</br>";


    //SELECCIONAMOS LOS PRODUCTOS DE LA BASE DE DATOS PARA IMPRIMIRLOS EN CADA BAR
    $consulpro ="SELECT * FROM productos";
    $resultadopro = $conexion -> query($consulpro);
    while($tablapro = mysqli_fetch_array($resultadopro)){

        echo"<b>".$tablapro['nombre']. "</b>";
        echo"<b>".$tablapro['precio']. "</b></br>";
    }

    echo "</div>";

            $quitar = "SELECT mesas FROM restaurantes WHERE nombre=.$tabla[nombre]";

            $resu = $conexion->query($quitar);
            $nombre=$tabla['nombre'];
    echo "<input type=button id=$nombre value=reserva name=".$tabla['nombre']." onclick=reservar($tabla[mesas],'".$nombre."')>";

    ?>
    <form>
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5" >
        <label for="radio1" onclick="valora('radio1','<?php echo $nombre;?>','5')">&#9733;</label>
    <input id="radio2" type="radio" name="estrellas" value="4" >
        <label for="radio2" onclick="valora('radio2','<?php echo $nombre;?>','4')">&#9733;</label>
    <input id="radio3" type="radio" name="estrellas" value="3" >
        <label for="radio3" onclick="valora('radio3','<?php echo $nombre;?>','3')">&#9733;</label>
    <input id="radio4" type="radio" name="estrellas" value="2" >
        <label for="radio4" onclick="valora('radio4','<?php echo $nombre;?>','2')">&#9733;</label>
    <input id="radio5" type="radio" name="estrellas" value="1">
        <label for="radio5" onclick="valora('radio5','<?php echo $nombre;?>','1')">&#9733;</label>


</form>

<?php
    $variable=$tabla['valoracion'];
    echo " Valoracion de los Clientes:    <div id=$nombre >";
    echo round($variable,2);
    echo "</br></p></div></div></div>";
}
?>
</body>
</html>

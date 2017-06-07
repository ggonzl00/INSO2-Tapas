<!DOCTYPE html>
<html>
 <head>  
           <title>ADMINISTRADOR </title>  
          
          
          
    
 <!--///////////////////////////////////////////////////////////////////////////////////////////-->
      </head> 

      <style type="text/css">
        
        <style>

form {
    border: 3px solid #f1f1f1;
    width: 50%;
}

input[type=text], input[type=password], input[type=file]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
body{
  background: #DDFFDD;
}

button {

    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
}

button:hover {
    opacity: 0.8;
}
h1 {
 
  color: green;
  font: oblique bold 120% cursive;
}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}


img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
    width: 50%;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>



     
      <body>
 

<h1 align="center"> ElIMINAR USUARIO </h1>
<center>
 <?php 

$conexion = new mysqli("localhost", "root", "", "toptapas");


$consulta = "SELECT Alias FROM registrarse";

$resultado=$conexion->query($consulta);

   echo "<table class='table'> "; 
  
while ($row = mysqli_fetch_array($resultado)){ 

  
   echo "<tr>"; 
   echo "<td> <input type =checkbox value=".$row['Alias']." ></td>";
   echo "<td>".$row['Alias']."</td> "; 
   echo "</tr>";
} 
  echo "</table> "; 

?> 

<a href="eliminarusuario.php" > <button type="button" >Eliminar Usuario</button></a></br>

</br>
<h1 align="center"> ElIMINAR RESTAURANTE </h1>
</br>

<?php 

$conexion = new mysqli("localhost", "root", "", "toptapas");


$consulta = "SELECT Nombre FROM restaurantes";

$resultado=$conexion->query($consulta);

   echo "<table class='table'> "; 
  
while ($row = mysqli_fetch_array($resultado)){ 

  
   echo "<tr>"; 
   echo "<td> <input type =checkbox value=".$row['Nombre']." name=boton></td>";
   echo "<td>".$row['Nombre']."</td> "; 
   echo "</tr>";
} 
  echo "</table> "; 

?> 
  <a href="eliminarbar.php"> <button type="button" >Eliminar Bar</button></a>
</br></br>
<script type="text/javascript">
  

  checkboxes = document.getElementsByTagName("input"); 

for (var i = 0; i < checkboxes.length; i++) {
    var checkbox = checkboxes[i];
    checkbox.onclick = function() {
        var currentRow = this.parentNode.parentNode;
        var secondColumn = currentRow.getElementsByTagName("td")[1];
        document.cookie ='variable='+secondColumn.textContent+'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
       // alert("My text is: " + secondColumn.textContent );
      //window.location.href = window.location.href + "?w1=" + secondColumn.textContent ;
    };
} 

</script>


</br></br>


 <h1 align="center"> ALTA DE RESTAURANTES </h1>
<form action="agregarbar.php" method="post">
  <div class="imgcontainer">
   <!-- <img src="coche.jpg" alt="Avatar" class="avatar">-->
  </div>

  <div class="container">
    <label><b>Nombre Restaurante </b></label>
    <input type="text" placeholder="Enter Username" name="nombre" id="nombre" required>

   <!-- <label><b>Valoracion</b></label>
    <input type="text" placeholder="Enter valoracion" name="valoracion" id ="valoracion" required>
-->
     <label><b>Mesas</b></label>
    <input type="text" placeholder="Enter mesas" name="mesas" id ="mesas" required>

     <label><b>Direccion </b></label>
    <input type="text" placeholder="Enter direccion" name="direccion" id ="direccion" required>

     <label><b>Telefono</b></label>
    <input type="text" placeholder="Enter telefono" name="telefono" id ="telefono" required>

     <label><b>Foto</b></label>
    <input type="file" name="archivo" ></br >
  <!--<input type="submit" value="Subir" name="subir" >-->
    


    <button type="submit">Dar de alta</button>
    <!-- <a href="Formulario.html"><button type="button" >Registrarse</button></a>-->
  

   
  </div>

  
</form>


</center>


      </body>

      </html>



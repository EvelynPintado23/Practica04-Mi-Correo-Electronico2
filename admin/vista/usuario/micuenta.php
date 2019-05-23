<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../../../css/estilos.css' type= 'text/css'/>

 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
 <script type="text/javascript" src="ajax.js"></script>
 <a href="indexUsuario.php">Inicio</a>  
<a href="enviarMensaje.html">Mensaje Nuevo</a>    
<a href="mensajesEnviados.php">Mensajes Enviados</a>
<a href="micuenta.php">Mi cuenta</a>
<a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
<label for="btn_menu"><img class="menuIm" src=    "images/perf1.png" alt=""></label>

</head>
<body> 
 <table style="width:100%">
 <tr>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Telefono</th>
 <th>Correo</th>
 <th>Fecha Nacimiento</th>
 </tr>
 <?php
 session_start();
 include '../../../config/conexionBD.php';
    $id_usuario= $_SESSION['codigoUsr'];
    $origen= $_SESSION['origen'];
    $sql = "SELECT * FROM usuario WHERE usu_codigo=$id_usuario";
    $result = $conn->query($sql);
  
    
    if ($result->num_rows > 0) {
   
       while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo " <td>" . $row["usu_cedula"] . "</td>";
           echo " <td>" . $row['usu_nombres'] ."</td>";
           echo " <td>" . $row['usu_apellidos'] . "</td>";
           echo " <td>" . $row['usu_direccion'] . "</td>";
           echo " <td>" . $row['usu_telefono'] . "</td>";
           echo " <td>" . $row['usu_correo'] . "</td>";
           echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
           echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
           echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
           echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
          contraseña</a> </td>";
           echo "</tr>";
       }
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }

    
    $conn->close();    

    


 
 ?>

</body>
</html>
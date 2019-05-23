

<?php

 session_start();
 include '../../../config/conexionBD.php';
 $codigoEnviador=$_SESSION['codigoUsr'];
 $origen = $_SESSION['origen'];
 $destinatario = isset($_POST["destino"]) ? trim($_POST["destino"]) : null;
 $asunto= isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;
 $mensaje = isset($_POST["mensaje"]) ? trim($_POST["mensaje"]) : null;
 $time = time();
 $fecha = date("Y-m-d", $time);

$S_SESSION['asuntoEnv']=$asunto;
$S_SESSION['msjEnv']=$mensaje;
 $sql = "SELECT usu_codigo, usu_rol FROM usuario WHERE usu_correo ='$destinatario';";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc(); 
 
 
 $codigoDestino = $row["usu_codigo"];
 $rol = $row["usu_rol"];
if($rol != 'Administrador'){
    $sqlMsj = "INSERT INTO mensaje VALUES (0, '$fecha', '$origen', '$destinatario', '$asunto', '$mensaje', 'enviado', '$codigoEnviador','$codigoDestino');";
    if ($conn->query($sqlMsj) == true) {
       echo "<h2>Mensaje enviado con exito</h2>";
       echo '<i class="far fa-check-circle"></i>';
       echo '<a href="../../vista/usuario/indexUsuario.php">Regresar</a>';
   } else {
   
       echo "<h2>Error al enviar el mensaje: " . mysqli_error($conn) . "</h2>";
       echo '<i class="fas fa-exclamation-circle"></i>';
       echo '<a href="../../vista/usuario/indexUsuario.php">Regresar</a>';
   }
   
   $sqlMsjRec = "INSERT INTO mensajerec VALUES (0, '$fecha', '$origen', '$destinatario', '$asunto', '$mensaje', 'recibido', '$codigoEnviador','$codigoDestino');";
    if ($conn->query($sqlMsjRec) == true) {
      
       echo '<i class="far fa-check-circle"></i>';
     
   } else {
   
       echo "<h2>Error al enviar el mensaje: " . mysqli_error($conn) . "</h2>";
       echo '<i class="fas fa-exclamation-circle"></i>';
       echo '<a href="../../vista/usuario/indexUsuario.php">Regresar</a>';
   }
 }
 else{
     T_EXIT;
     echo "<h1 id='errorAdm'>La direccion de Correo no puede recibir mensajes.'</h1>";
     echo "<a href='../../vista/usuario/indexUsuario.php'>Regresar</a>";
 }

$conn->close();

 ?>



 
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Mensaje</title>
</head>
<body>
<a href="indexUsuario.php">Regresar</a>
<?php

session_start();
include '../../../config/conexionBD.php';
$origen= $_SESSION['origen'];
$id=$_SESSION['idmensaje'];
echo $id;
$sqlM = "SELECT * FROM mensajerec WHERE menRe_id='$id' ";
$result = $conn->query($sqlM);
if ($result->num_rows >= 0) {
                        
    while($row = $result->fetch_assoc()) {
        $asunto = $row["menRe_asunto"];
        $mensaje = $row["menRe_texto"] ;
        
        
    }
 }
 
 
echo "<form id='formulario03' method='POST' action=''>";
 echo"<label for='origen'>De: </label>";
 echo "<input type='text' name='origen' value=$origen";
 echo "<br>";
 echo"<label for='asunto'>Asunto: </label>";
 echo "<input type='text' name='mensaje' value=$asunto";
 echo "<br>";
 echo"<label for='mensaje'>Contenido: </label>";
 echo "<input type='text' name='mensaje' value=$mensaje";
$conn->close();
 ?>




</body>
</html>
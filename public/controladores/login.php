<?php
 session_start();
 
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 
 $sqlROL = "SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
$resultROL=$conn->query($sqlROL);
while($rowROL = $resultROL->fetch_assoc()) {
    $logROL= $rowROL["usu_rol"];
    echo $logROL;
}

$sqlID = "SELECT usu_codigo FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
$resultID=$conn->query($sqlID);
while($rowID = $resultID->fetch_assoc()) {
    $id= $rowID["usu_codigo"];
    echo $id;
}


if($logROL=='Usuario'){
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
    MD5('$contrasena')";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     $_SESSION['isLogged'] = TRUE;
     $_SESSION['codigoUsr'] = $id;
     $_SESSION['origen']=$usuario;
     header("Location: ../../admin/vista/usuario/indexUsuario.php");
     
     } else {
     header("Location: ../vista/login.html");
     echo'no entra';
     }
}
else{
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
    MD5('$contrasena')";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     $_SESSION['isLogged'] = TRUE;
     $_SESSION['codigoUsr'] = $id;
     $_SESSION['origen']=$usuario;
     header("Location: ../../admin/vista/usuario/indexAdministrador.php");
     
     } else {
     header("Location: ../vista/login.html");
     echo'no entra';
     }
    
}

?>


 
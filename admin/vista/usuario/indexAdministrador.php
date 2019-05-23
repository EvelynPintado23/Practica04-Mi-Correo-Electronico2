<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Gestión de usuarios</title>
 <script type="text/javascript" src="ajax.js"></script>
 <link rel="stylesheet" href="../../../css/estilos.css" type= "text/css"/>

 <a href="indexUsuario.php">Inicio</a>  
<a href="enviarMensaje.html">Mensaje Nuevo</a>    
<a href="mensajesEnviados.php">Mensajes Enviados</a>
<a href="micuenta.php">Mi cuenta</a>
<a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script>
                   $(document).ready(function() {
                     $("#ok").click(function() {
                       var valores = "";
               
                       $(this).parents("tr").find("#numero").each(function() {
                         valores += $(this).html() + "\n";
                       });
                       console.log(valores);
                       alert(valores);
                     });
               
               
                     $(".boton").click(function() {
               
                       var valores = "";
               
                       // Obtenemos todos los valores contenidos en los <td> de la fila
                       // seleccionada
                       $(this).parents("tr").find("#numero").each(function() {
                         valores += $(this).html() + "\n";
                       });
                       console.log(valores);
                       alert(valores);
                     });
                   });
                 </script>
  <script>
    $(document).ready(function() {
      $("#ok").click(function() {
        var valores = "";

        $(this).parents("tr").find("#numero").each(function() {
          valores += $(this).html() + "\n";
        });
        console.log(valores);
        alert(valores);
        
      });


      $(".boton").click(function() {

        var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("#numero").each(function() {
          valores += $(this).html() + "\n";
        });
        console.log(valores);
        var Var_JavaScript = valores;    
        $var_PHP = <script> document.writeln(Var_JavaScript); </script>;
    echo 'aqui va';
    echo $var_PHP;
        alert(valores);
       
      });
    });
  </script>


 <br>

 
 <?php
 session_start();
 include '../../../config/conexionBD.php';
    $id_usuario= $_SESSION['codigoUsr'];
    $origen= $_SESSION['origen'];
   
 ?>


 </table>

<div class="buscar">
    <input type="search" id="buscarRemitente" name="remitente" value="" onkeyup="buscarRemitente(this)">
</div>
 <div id="contenedor">
    
        <h2>Mensajes Recibidos</h2>
        <section>

            <table>
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Remitente</td>
                        <td> Destinatario </td>
                        <td>Asunto</td>
                        <td> Eliminar </td>
                        <td></td>
                     
                    </tr>
                </thead>
                
                <tbody id="data">
                   
                    <?php
                    
                  
                    include '../../../config/conexionBD.php';
                    $origen = $_SESSION['origen'];
                    //echo $origen;
                     

                    $sqlM = "SELECT * FROM mensaje  ORDER BY 'men_id' ASC;";
                    $result = $conn->query($sqlM);
                   // echo $result;
                  

                  
                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            
                            echo "<tr>";
                            echo "<td >". $row['men_fecha_hora'] . "</td>";
                            echo "<td>" . $row["men_remitente"] . "</td>";
                            echo "<td>" . $row['men_destinatario'] . "</td>";
                            echo "<td>" . $row["men_asunto"] . "</td>";
                            echo "<td id='numero' style ='visibility:hidden'>" .$row["men_texto"] . "</td>";
                            $_SESSION['idmensaje']=$row['men_id'];
                            echo "<td class='boton' > Leer Mensaje </td>";
                            echo "<td class='boton'> Leer Mensaje </td>";
                             echo "</tr>";
                        }
                     }
                    else {
                        echo "<tr>";
                        echo '<td colspan="10" class="db_null"><p>No tienes mensajes recibidos</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>




</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
<link rel='stylesheet' href='../../../css/estilos.css' type= 'text/css'/>

    <meta charset="UTF-8">
    <script type="text/javascript" src="ajax2.js"></script>
 <!--    <script src="js/search.js"></script>-->
    <title>Mensajes enviados</title>
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
       // alert(valores);
      });
    });
  </script>

 <br>



<div class="buscar">
    <input type="search" id="buscarRemitente" name="remitente" value="" onkeyup="buscarRemitente(this)">
</div>
    <div id="contenedor">
        <h2>Mensajes Enviados</h2>
        <section>

            <table>
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Destino</td>
                        <td>Asunto</td>
                        <td></td>
                    </tr>
                </thead>
                
                <tbody id="data">
                    <?php
                    session_start();
                    include '../../../config/conexionBD.php';
                    $origen = $_SESSION['origen'];
                    //echo $origen;
                     

                    $sqlM = "SELECT * FROM mensaje WHERE men_remitente = '$origen'  ORDER BY 'men_codigo' DESC;";
                    $result = $conn->query($sqlM);
                   // echo $result;



                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                           echo "<tr>";
                            echo "<td >". $row['men_fecha_hora'] . "</td>";
                            echo "<td>" . $row["men_destinatario"] . "</td>";
                            echo "<td>" . $row["men_asunto"] . "</td>";
                            echo "<td id='numero' style ='visibility:hidden'>" .$row["men_texto"] . "</td>";
                            $_SESSION['idmensaje']=$row['men_id'];
                            echo "<td class='boton'> Leer Mensaje </td>";
                             echo "</tr>";
                            
                            echo "</tr>";
                        }
                     }
                   else {
                        echo "<tr>";
                        echo '<td colspan="10" class="db_null"><p>Aun no has enviado ningun mensaje</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>


                </tbody>
            </table>

        </section>
    </div>
    <footer class="red">
        
    </footer>
</body>

</html>
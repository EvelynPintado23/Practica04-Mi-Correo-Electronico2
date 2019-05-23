<?php
session_start();

include '../../../config/conexionBD.php';
$origen= $_SESSION['origen'];
if ($_GET != '') {

    $sqlM = "SELECT * FROM mensaje WHERE men_remitente = '$origen' AND men_remitente LIKE '" . $_GET['key'] . "%';";
                    $result = $conn->query($sqlM);

                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<tr>";
                            echo "<td >". $row['men_fecha_hora'] . "</td>";
                            echo "<td>" . $row["men_remitente"] . "</td>";
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
                        echo '<td colspan="10" class="db_null"><p>No tienes mensajes recibidos</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                
} else {
    $sqlM = "SELECT * FROM mensaje WHERE men_remitente = '$origen'  ORDER BY 'men_id' DESC;";
    $result = $conn->query($sqlM);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                            echo "<td >". $row['men_fecha_hora'] . "</td>";
                            echo "<td>" . $row["men_remitente"] . "</td>";
                            echo "<td>" . $row["men_asunto"] . "</td>";
                            echo "<td id='numero' style ='visibility:hidden'>" .$row["menRe_texto"] . "</td>";
                            $_SESSION['idmensaje']=$row['men_id'];
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
}
$conn->close();
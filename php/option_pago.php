<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM forma_pago";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='carro'>Forma de pago:</label>";
echo "<select name='f_p' id='f_p'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['forma_de_pago_id'] . "'>" .$row['Descripcion'] . "</option>";
    }
} else {
    echo "<option value=''>No hay carros disponibles</option>";
}   
echo "</select>";



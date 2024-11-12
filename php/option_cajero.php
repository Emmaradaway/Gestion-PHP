<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM cajero";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='carro'>Cajero:</label>";
echo "<select name='cajero' id='cajero'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['id_cajero'] . "'>"  .$row['Nombre'] . "</option>";
    }
} else {
    echo "<option value=''>No hay carros disponibles</option>";
}   
echo "</select>";



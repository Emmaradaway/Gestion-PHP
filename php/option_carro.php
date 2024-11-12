<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM option_carro";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='carro'>Carro:</label>";
echo "<select name='carro' id='carro'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['id_carro'] . "'>" . $row['Modelo'] . "-" .$row['Placas'] . "</option>";
    }
} else {
    echo "<option value=''>No hay carros disponibles</option>";
}   
echo "</select>";



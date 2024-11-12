<?php
include "conexion.php";

$sql_doctores = "SELECT * FROM option_cliente_for_carro";


$result_doctores = $conexion->query($sql_doctores);


echo "<label for='cliente'>Cliente:</label>";
echo "<select name='cliente' id='cliente'>";
if ($result_doctores->num_rows > 0) {
    while ($row = $result_doctores->fetch_assoc()) {
        
        echo "<option value='" . $row['ID_CLIENTE'] . "'>" . $row['Nombre'] . "</option>";
    }
} else {
    echo "<option value=''>No hay clientes disponibles</option>";
}   
echo "</select>";



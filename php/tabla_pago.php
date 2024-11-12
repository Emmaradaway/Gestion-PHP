<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT * FROM forma_pago";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID Pago</th>
                    <th>Decripcion</th>
                    <th>Acciones</th>                  
                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['forma_de_pago_id']}</td>
        <td>{$row['Descripcion']}</td>
        <td>
           <button type='button' class='btn-editar3' data-id='{$row['forma_de_pago_id']}' title='Editar'>
        <i class='fas fa-edit'></i>
    </button>
            
        </td>
      </tr>";
    }
    echo "</tbody>
        </table>";
} else {
    echo "No se encontraron especialidades en la base de datos.";
}

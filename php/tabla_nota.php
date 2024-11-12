<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT * FROM tabla_nota";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID Nota</th>
                    <th>Servicio</th>
                    <th>Cajero</th>
                    <th>Fecha</th>
                    <th>Forma de pago</th>
                    <th>Total</th>         
                    <th>Acciones</th>                  

                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id_nota']}</td>
        <td>{$row['servicio_id']}: {$row['Servicio']}</td>
        <td>{$row['Nombre']}</td>
        <td>{$row['fecha']}</td>
        <td>{$row['Descripcion']}</td>
        <td>{$row['total']}</td>
        <td>
           <button type='button' class='btn-editar' data-id='{$row['id_nota']}' title='Editar'>
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

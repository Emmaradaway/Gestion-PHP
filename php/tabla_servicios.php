<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT * FROM tabla_servicios  ORDER BY ID_SERVICIO ASC";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID servicios</th>
                    <th>Nombre</th>
                    <th>Carro</th>
                    <th>Mecanico</th>
                    <th>Fecha de ingreso</th>
                    <th>Servicio</th>
                    <th>Fecha de salida</th>
                    <th>Acciones</th>                  
                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['ID_SERVICIO']}</td>
        <td>{$row['Nombre']}</td>
        <td>{$row['Placas']}</td>
        <td>{$row['Nombre_mecanico']}</td>
        <td>{$row['Fecha_de_ingreso']}</td>
        <td>{$row['Servicio']}</td>
        <td>{$row['Fecha_de_salida']}</td>
        <td>
           <button type='button' class='btn-editar' data-id='{$row['ID_SERVICIO']}' title='Editar'>
        <i class='fas fa-edit'></i>
    </button>
            <button type='button' class='btn-eliminar' data-id='{$row['ID_SERVICIO']}' title='Eliminar'>
                <i class='fas fa-trash'></i>
            </button>
        </td>
      </tr>";
    }
    echo "</tbody>
        </table>";
} else {
    echo "No se encontraron especialidades en la base de datos.";
}

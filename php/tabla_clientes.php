<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT * FROM cliente";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Acciones</th>                  
                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['ID_CLIENTE']}</td>
        <td>{$row['Nombre']}</td>
        <td>{$row['Telefono']}</td>
        <td>{$row['Direccion']}</td>
        <td>{$row['correo']}</td>

        <td>
           <button type='button' class='btn-editar' data-id='{$row['ID_CLIENTE']}' title='Editar'>
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

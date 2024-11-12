<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT * FROM mecanico";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID Mecanico</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>RFC</th>
                    <th>Nivel de estudios</th>         
                    <th>CURP</th>         
                    <th>Carrera</th>         
                    <th>Acciones</th>                  
                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id_mecanico']}</td>
        <td>{$row['Nombre_mecanico']}</td>
        <td>{$row['telefono']}</td>
        <td>{$row['DIreccion']}</td>
        <td>{$row['RFC']}</td>
        <td>{$row['N_estudios']}</td>
        <td>{$row['CURP']}</td>
        <td>{$row['Carrera']}</td>

        <td>
           <button type='button' class='btn-editar' ' data-id='{$row['id_mecanico']}' title='Editar'>
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

<?php
include 'conexion.php';  // Archivo con la conexión a la base de datos

// Consulta para obtener todos los doctores y el nombre de su especialidad
$query = "SELECT 
carro.id_carro,
    carro.Placas,
    carro.Año,
    carro.Modelo,
    carro.Marca,
    carro.Color,
    cliente.Nombre  
    FROM
    carro
INNER JOIN 
    cliente ON carro.cliente_id = cliente.ID_CLIENTE;
";
          
$result = $conexion->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID carro</th>
                    <th>Dueño</th>
                    <th>Placas</th>
                    <th>Año</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>  
                    <th>Acciones</th>                  


                </tr>
            </thead>
            <tbody>";

    // Itera sobre cada registro y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id_carro']}</td>
        <td>{$row['Nombre']}</td>
        <td>{$row['Placas']}</td>
        <td>{$row['Año']}</td>
        <td>{$row['Modelo']}</td>
        <td>{$row['Marca']}</td>
        <td>{$row['Color']}</td>
        <td>
           <button type='button' class='btn-editar' data-id='{$row['id_carro']}' title='Editar'>
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

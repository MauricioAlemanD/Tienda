<?php

include 'conexion.php';

$busqueda = $_POST['txtBusqueda'];

$busqueda = $conn->real_escape_string($busqueda);

$sql = "SELECT * FROM producto WHERE id_producto = '$busqueda' OR nombre LIKE '%$busqueda%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-hover table-bordered'>
    <tr class='table-dark'>
        <th>ID Producto</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Descripción</th>
    </tr>";
while ($row = $result->fetch_assoc()) {
echo "<tr>
        <td>" . $row["id_producto"] . "</td>
        <td>" . $row["nombre"] . "</td>
        <td>" . $row["precio"] . "</td>
        <td>" . $row["cantidad"] . "</td>
        <td>" . $row["descripcion"] . "</td>
      </tr>";
}
} else {
 
    echo "No se encontraron resultados.";
}

$conn->close();
?>

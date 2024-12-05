<?php
include 'conexion.php';

// Obtener los archivos de la base de datos
$sql = "SELECT * FROM archivos ORDER BY fecha_subida DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
    <h1>Archivos subidos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ruta</th>
            <th>Fecha de subida</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td><a href='" . $row['ruta'] . "' target='_blank'>Ver archivo</a></td>";
                echo "<td>" . $row['fecha_subida'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay archivos subidos</td></tr>";
        }
        ?>
    </table>
</body>
</html>

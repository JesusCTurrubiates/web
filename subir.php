<?php
include 'conexion.php';

// Verificar si se ha subido un archivo
if (isset($_FILES['file'])) {
    $archivo = $_FILES['file'];

    // Verificar el tipo de archivo
    $extensiones_permitidas = ['pdf', 'doc', 'docx'];
    $nombre_archivo = $archivo['name'];
    $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

    if (in_array($ext, $extensiones_permitidas)) {
        // Mover el archivo al directorio de subida
        $directorio_subida = "uploads/";
        if (!is_dir($directorio_subida)) {
            mkdir($directorio_subida, 0777, true);
        }

        $ruta_archivo = $directorio_subida . basename($nombre_archivo);

        if (move_uploaded_file($archivo['tmp_name'], $ruta_archivo)) {
            // Guardar la información en la base de datos
            $sql = "INSERT INTO archivos (nombre, ruta) VALUES ('$nombre_archivo', '$ruta_archivo')";
            if ($conn->query($sql) === TRUE) {
                echo "El archivo se ha subido exitosamente.";
            } else {
                echo "Error al guardar el archivo en la base de datos: " . $conn->error;
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Formato de archivo no permitido.";
    }
} else {
    echo "No se ha enviado ningún archivo.";
}
?>

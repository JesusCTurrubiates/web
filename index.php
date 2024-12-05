<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo</title>
</head>
<body>
    <h1>Subir archivo PDF o Word</h1>
    <form action="subir.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecciona un archivo:</label>
        <input type="file" name="file" accept=".pdf, .doc, .docx" required>
        <button type="submit">Subir</button>
    </form>
</body>
</html>

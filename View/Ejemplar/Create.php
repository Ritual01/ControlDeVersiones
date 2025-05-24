<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Ejemplar</title>
    <style>
        form {
            width: 40%;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 16px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Agregar Nuevo Ejemplar</h2>

<form action="../Controller/EjemplarController.php" method="POST">
    <input type="hidden" name="action" value="create">
    
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" required>

    <label for="localizacion">Localización:</label>
    <input type="text" id="localizacion" name="localizacion" required>

    <label for="libro_codigo">Código de Libro:</label>
    <input type="text" id="libro_codigo" name="libro_codigo" required>

    <input type="submit" value="Guardar">
    <br>
    <a href="List.php">← Volver a la lista</a>
</form>

</body>
</html>

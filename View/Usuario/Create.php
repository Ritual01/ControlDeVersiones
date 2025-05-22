
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h1 { text-align: center; color: #2c3e50; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 8px; color: #333; }
        input[type="text"] { width: 100%; padding: 10px; margin-bottom: 18px; border: 1px solid #ccc; border-radius: 4px; }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background: #2980b9;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover { background: #1abc9c; }
        .back-link { display: inline-block; margin-top: 15px; color: #2980b9; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Crear Usuario</h1>
    <form action="../../Controller/UsuarioController.php?action=create" method="post">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <button type="submit" class="btn">Guardar</button>
    </form>
    <a href="List.php" class="back-link">Volver a la lista de usuarios</a>
</div>
</body>
</html>
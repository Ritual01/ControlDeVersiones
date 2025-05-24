<?php
// filepath: c:\xampp\htdocs\GuiaControVersionMVC\ControlDeVersiones\View\Prestamo\Create.php

// Si se pasa un préstamo para editar, se llenan los campos, si no, quedan vacíos para crear
$id = isset($prestamo['id']) ? $prestamo['id'] : '';
$Usuario_Codigo = isset($prestamo['Usuario_Codigo']) ? $prestamo['Usuario_Codigo'] : '';
$Ejemplar_Codigo = isset($prestamo['Ejemplar_Codigo']) ? $prestamo['Ejemplar_Codigo'] : '';
$FechaPres = isset($prestamo['FechaPres']) ? $prestamo['FechaPres'] : '';
$FechaDev = isset($prestamo['FechaDev']) ? $prestamo['FechaDev'] : '';
$estado = isset($prestamo['estado']) ? $prestamo['estado'] : 'true'; // Por defecto activo
$editando = !empty($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $editando ? 'Editar Préstamo' : 'Nuevo Préstamo' ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h1 { text-align: center; color: #2c3e50; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 8px; color: #333; }
        input[type="text"], input[type="date"], select {
            width: 100%; padding: 10px; margin-bottom: 18px; border: 1px solid #ccc; border-radius: 4px;
        }
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
    <h1><?= $editando ? 'Editar Préstamo' : 'Nuevo Préstamo' ?></h1>
    <form action="../../Controller/PrestamoController.php?action=<?= $editando ? 'update' : 'create' ?>" method="post">
        <?php if ($editando): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <?php endif; ?>

        <label for="Usuario_Codigo">Código de Usuario:</label>
        <input type="text" id="Usuario_Codigo" name="Usuario_Codigo" value="<?= htmlspecialchars($Usuario_Codigo) ?>" required>

        <label for="Ejemplar_Codigo">Código de Ejemplar:</label>
        <input type="text" id="Ejemplar_Codigo" name="Ejemplar_Codigo" value="<?= htmlspecialchars($Ejemplar_Codigo) ?>" required>

        <label for="FechaPres">Fecha de Préstamo:</label>
        <input type="date" id="FechaPres" name="FechaPres" value="<?= htmlspecialchars($FechaPres) ?>" required>

        <label for="FechaDev">Fecha de Devolución:</label>
        <input type="date" id="FechaDev" name="FechaDev" value="<?= htmlspecialchars($FechaDev) ?>" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="true" <?= $estado == 'true' || $estado == 1 ? 'selected' : '' ?>>Activo</option>
            <option value="false" <?= $estado == 'false' || $estado == 0 ? 'selected' : '' ?>>Devuelto</option>
        </select>

        <button type="submit" class="btn"><?= $editando ? 'Actualizar' : 'Guardar' ?></button>
    </form>
    <a href="List.php" class="back-link">Volver a la lista de préstamos</a>
</div>
</body>
</html>
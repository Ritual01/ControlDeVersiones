<?php
require_once __DIR__ . '/../../Controller/UsuarioController.php';
$controller = new UsuarioController();
$usuarios = $controller->getUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 800px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h1 { text-align: center; color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #2980b9; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .btn {
            padding: 7px 16px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
        }
        .btn-edit { background: #27ae60; }
        .btn-delete { background: #c0392b; }
        .btn-create { background: #2980b9; margin-bottom: 18px; display: inline-block; }
    </style>
</head>
<body>
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="Create.php" class="btn btn-create">Nuevo Usuario</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['Codigo']) ?></td>
                    <td><?= htmlspecialchars($usuario['Nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['Telefono']) ?></td>
                    <td><?= htmlspecialchars($usuario['Direccion']) ?></td>
                    <td>
                        <a href="Edit.php?codigo=<?= urlencode($usuario['Codigo']) ?>" class="btn btn-edit">Editar</a>
                        <a href="Delete.php?codigo=<?= urlencode($usuario['Codigo']) ?>" class="btn btn-delete" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">No hay usuarios registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
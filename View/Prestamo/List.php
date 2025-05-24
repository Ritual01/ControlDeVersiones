<?php
// filepath: c:\xampp\htdocs\GuiaControVersionMVC\ControlDeVersiones\View\Prestamo\List.php
require_once __DIR__ . '/../../Controller/PrestamoController.php';
$controller = new PrestamoController();
$prestamos = $controller->getPrestamos();

// Separar préstamos activos y devueltos
$activos = [];
$devueltos = [];
foreach ($prestamos as $prestamo) {
    // Si estado es true, activo; si es false, devuelto
    if ($prestamo['estado'] == 'true' || $prestamo['estado'] == 1) {
        $activos[] = $prestamo;
    } else {
        $devueltos[] = $prestamo;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamos de Libros</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 1100px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h1 { text-align: center; color: #2c3e50; margin-bottom: 40px; }
        .listas { display: flex; justify-content: space-between; gap: 40px; }
        .lista { width: 48%; }
        h2 { text-align: center; color: #2980b9; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #2980b9; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
            font-size: 14px;
        }
        .btn-edit { background: #27ae60; }
        .btn-delete { background: #c0392b; }
        .btn-create { background: #2980b9; margin-bottom: 18px; display: inline-block; }
    </style>
</head>
<body>
<div class="container">
    <h1>Préstamos de Libros</h1>
    <a href="Create.php" class="btn btn-create">Nuevo Préstamo</a>
    <div class="listas">
        <!-- Lista de Devueltos -->
        <div class="lista">
            <h2>Devueltos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cód. Usuario</th>
                        <th>Cód. Ejemplar</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($devueltos)): ?>
                    <?php foreach ($devueltos as $prestamo): ?>
                        <tr>
                            <td><?= htmlspecialchars($prestamo['id']) ?></td>
                            <td><?= htmlspecialchars($prestamo['codigo_usuario']) ?></td>
                            <td><?= htmlspecialchars($prestamo['codigo_ejemplar']) ?></td>
                            <td><?= htmlspecialchars($prestamo['fecha_prestamo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['fecha_devolucion']) ?></td>
                            <td>
                                <a href="Edit.php?id=<?= urlencode($prestamo['id']) ?>" class="btn btn-edit">Editar</a>
                                <a href="Delete.php?id=<?= urlencode($prestamo['id']) ?>" class="btn btn-delete" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align:center;">No hay préstamos devueltos.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Lista de Activos -->
        <div class="lista">
            <h2>Activos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cód. Usuario</th>
                        <th>Cód. Ejemplar</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Devolución</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($activos)): ?>
                    <?php foreach ($activos as $prestamo): ?>
                        <tr>
                            <td><?= htmlspecialchars($prestamo['id']) ?></td>
                            <td><?= htmlspecialchars($prestamo['codigo_usuario']) ?></td>
                            <td><?= htmlspecialchars($prestamo['codigo_ejemplar']) ?></td>
                            <td><?= htmlspecialchars($prestamo['fecha_prestamo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['fecha_devolucion']) ?></td>
                            <td>
                                <a href="Edit.php?id=<?= urlencode($prestamo['id']) ?>" class="btn btn-edit">Editar</a>
                                <a href="Delete.php?id=<?= urlencode($prestamo['id']) ?>" class="btn btn-delete" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align:center;">No hay préstamos activos.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
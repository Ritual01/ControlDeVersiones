<?php
// filepath: c:\xampp\htdocs\GuiaControVersionMVC\ControlDeVersiones\View\Prestamo\List.php
require_once __DIR__ . '/../../Controller/PrestamoController.php';
$controller = new PrestamoController();
$prestamos = $controller->getPrestamos();

// Separar préstamos activos y devueltos
$activos = [];
$devueltos = [];
foreach ($prestamos as $prestamo) {
    // Si Estado es 'Activo', es préstamo activo; si es 'Devuelto', es devuelto
    if ($prestamo['Estado'] === 'Activo') {
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
        th, td { 
            padding: 18px 14px;
            border-bottom: 1.5em solid transparent;
            text-align: left;
            vertical-align: middle;
        }
        th { background: #2980b9; color: #fff; }
        tr:hover { background: #f1f1f1; }
        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 8px;
            font-size: 20px;
            vertical-align: middle;
            margin-right: 4px;
        }
        .icon-edit { color: #27ae60; }
        .icon-delete { color: #c0392b; }
        .btn-create { background: #2980b9; margin-bottom: 18px; display: inline-block; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; }
        .btn-create:hover { background: #1abc9c; }
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
                            <td><?= htmlspecialchars($prestamo['Usuario_Codigo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['Ejemplar_Codigo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['FechaPres']) ?></td>
                            <td><?= htmlspecialchars($prestamo['FechaDev']) ?></td>
                            <td>
                                <a href="Create.php?id=<?= urlencode($prestamo['id']) ?>" class="icon-btn" title="Editar">
                                    <span class="icon-edit">&#9998;</span>
                                </a>
                                <a href="Delete.php?id=<?= urlencode($prestamo['id']) ?>" class="icon-btn" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">
                                    <span class="icon-delete">&#128465;</span>
                                </a>
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
                            <td><?= htmlspecialchars($prestamo['Usuario_Codigo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['Ejemplar_Codigo']) ?></td>
                            <td><?= htmlspecialchars($prestamo['FechaPres']) ?></td>
                            <td><?= htmlspecialchars($prestamo['FechaDev']) ?></td>
                            <td>
                                <a href="Create.php?id=<?= urlencode($prestamo['id']) ?>" class="icon-btn" title="Editar">
                                    <span class="icon-edit">&#9998;</span>
                                </a>
                                <a href="Delete.php?id=<?= urlencode($prestamo['id']) ?>" class="icon-btn" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar este préstamo?');">
                                    <span class="icon-delete">&#128465;</span>
                                </a>
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
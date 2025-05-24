<?php

require_once __DIR__ . '/../../Model/AutorModel.php';
$conn = new mysqli("localhost", "root", "", "libreria");
$model = new AutorModel($conn);
$resultado = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Autores</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        a, button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Autores</h2>
    <a href="Create.php">Crear nuevo autor</a>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['Codigo']; ?></td>
            <td><?php echo $fila['Nombre']; ?></td>
            <td>
                <a href="Create.php?editar=<?php echo $fila['Codigo']; ?>">Editar</a>
                <a href="../../Controller/AutorController.php?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Deseas eliminar este autor?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
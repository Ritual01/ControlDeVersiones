<?php
require_once '../Model/EjemplarModel.php';

$model = new EjemplarModel();
$ejemplares = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Ejemplares</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
        }
        .boton {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Lista de Ejemplares</h2>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Localización</th>
            <th>Código de Libro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ejemplares as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e['Codigo']) ?></td>
            <td><?= htmlspecialchars($e['Localizacion']) ?></td>
            <td><?= htmlspecialchars($e['Libro_Codigo']) ?></td>
            <td>
                <a href="../Controller/EjemplarController.php?action=edit&codigo=<?= $e['Codigo'] ?>">Editar</a> |
                <a href="../Controller/EjemplarController.php?action=delete&codigo=<?= $e['Codigo'] ?>" onclick="return confirm('¿Estás seguro de eliminar este ejemplar?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: center;">
    <a class="boton" href="../View/Create.php">Agregar Nuevo Ejemplar</a>
</div>

</body>
</html>

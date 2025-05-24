<?php
require_once __DIR__ . '/../../Model/LibroModel.php';
$conn = new mysqli("localhost", "root", "", "libreria");
$model = new LibroModel($conn);
$resultado = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Libros</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        a, button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Libros</h2>
    <a href="Create.php">Crear nuevo libro</a>
    <table>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Páginas</th>
            <th>Autores</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['Codigo']; ?></td>
            <td><?php echo $fila['Titulo']; ?></td>
            <td><?php echo $fila['ISBN']; ?></td>
            <td><?php echo $fila['Editorial']; ?></td>
            <td><?php echo $fila['Paginas']; ?></td>
            <td>
                <?php
                $autores = $model->getAutores($fila['Codigo']);
                $links = [];
                while ($autor = $autores->fetch_assoc()) {
                    $links[] = '<a href="../Autor/Create.php?editar=' . $autor['Codigo'] . '">' . htmlspecialchars($autor['Nombre']) . '</a>';
                }
                echo implode(', ', $links);
                ?>
            </td>
            <td>
                <a href="Create.php?editar=<?php echo $fila['Codigo']; ?>">Editar</a>
                <a href="../../Controller/LibroController.php?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Eliminar este libro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
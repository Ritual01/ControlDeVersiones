<?php
require_once __DIR__ . '/../../Model/LibroModel.php';
$conn = new mysqli("localhost", "root", "", "libreria");
$model = new LibroModel($conn);

$editando = false;
$libro = ['Codigo'=>'', 'Titulo'=>'', 'ISBN'=>'', 'Editorial'=>'', 'Paginas'=>''];

if (isset($_GET['editar'])) {
    $editando = true;
    $libro = $model->getById($_GET['editar']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $editando ? 'Editar' : 'Crear'; ?> Libro</title>
    <style>
        body { font-family: Arial; }
        form { margin-top: 20px; }
        input[type="text"], input[type="number"] { padding: 5px; width: 180px; margin-bottom: 8px; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>
    <h2><?php echo $editando ? 'Editar' : 'Crear'; ?> Libro</h2>
    <form method="POST" action="../../Controller/LibroController.php">
        <input type="text" name="codigo" placeholder="Código" value="<?php echo $libro['Codigo']; ?>" required <?php if($editando) echo 'readonly'; ?>><br>
        <input type="text" name="titulo" placeholder="Título" value="<?php echo $libro['Titulo']; ?>" required><br>
        <input type="text" name="isbn" placeholder="ISBN" value="<?php echo $libro['ISBN']; ?>"><br>
        <input type="text" name="editorial" placeholder="Editorial" value="<?php echo $libro['Editorial']; ?>"><br>
        <input type="number" name="paginas" placeholder="Páginas" value="<?php echo $libro['Paginas']; ?>"><br>
        <button type="submit" name="<?php echo $editando ? 'actualizar' : 'crear'; ?>">
            <?php echo $editando ? 'Actualizar' : 'Crear'; ?>
        </button>
        <a href="List.php">Volver</a>
    </form>
</body>
</html>
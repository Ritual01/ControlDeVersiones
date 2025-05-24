<?php

require_once __DIR__ . '/../../Model/AutorModel.php';
$conn = new mysqli("localhost", "root", "", "libreria");
$model = new AutorModel($conn);

$editando = false;
$autor = ['Codigo'=>'', 'Nombre'=>''];

if (isset($_GET['editar'])) {
    $editando = true;
    $autor = $model->getById($_GET['editar']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $editando ? 'Editar' : 'Crear'; ?> Autor</title>
    <style>
        body { font-family: Arial; }
        form { margin-top: 20px; }
        input[type="text"] { padding: 5px; width: 200px; margin-bottom: 8px; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>
    <h2><?php echo $editando ? 'Editar' : 'Crear'; ?> Autor</h2>
    <form method="POST" action="../../Controller/AutorController.php">
        <input type="text" name="codigo" placeholder="Código" value="<?php echo $autor['Codigo']; ?>" required <?php if($editando) echo 'readonly'; ?>><br>
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $autor['Nombre']; ?>" required><br>
        <button type="submit" name="<?php echo $editando ? 'actualizar' : 'crear'; ?>">
            <?php echo $editando ? 'Actualizar' : 'Crear'; ?>
        </button>
        <a href="List.php">Volver</a>
    </form>
</body>
</html>
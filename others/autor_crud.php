<?php
// --- CONEXIÓN ---
$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// --- OPERACIONES ---

// Crear
if (isset($_POST['crear'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO AUTOR (Codigo, Nombre) VALUES ('$codigo', '$nombre')";
    $conn->query($sql);
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $sql = "UPDATE AUTOR SET Nombre='$nombre' WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $codigo = $_GET['eliminar'];
    $sql = "DELETE FROM AUTOR WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Leer
$resultado = $conn->query("SELECT * FROM AUTOR");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de AUTOR</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 5px; width: 200px; }
        button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Autores</h2>

    <form method="POST">
        <input type="text" name="codigo" placeholder="Código" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

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
                <a href="?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Deseas eliminar este autor?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

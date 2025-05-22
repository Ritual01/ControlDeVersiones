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
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO USUARIO (Codigo, Nombre, Telefono, Direccion) 
            VALUES ('$codigo', '$nombre', '$telefono', '$direccion')";
    $conn->query($sql);
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE USUARIO SET Nombre='$nombre', Telefono='$telefono', Direccion='$direccion' 
            WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $codigo = $_GET['eliminar'];
    $sql = "DELETE FROM USUARIO WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Leer
$resultado = $conn->query("SELECT * FROM USUARIO");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de USUARIO</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 90%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 5px; width: 180px; }
        button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Usuarios</h2>

    <form method="POST">
        <input type="text" name="codigo" placeholder="Código" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="telefono" placeholder="Teléfono">
        <input type="text" name="direccion" placeholder="Dirección">
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['Codigo']; ?></td>
            <td><?php echo $fila['Nombre']; ?></td>
            <td><?php echo $fila['Telefono']; ?></td>
            <td><?php echo $fila['Direccion']; ?></td>
            <td>
                <a href="?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Deseas eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

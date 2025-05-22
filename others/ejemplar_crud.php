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
    $codigoLibro = $_POST['codigo_libro'];
    $ubicacion = $_POST['ubicacion'];

    $sql = "INSERT INTO EJEMPLAR (Codigo, Libro_Codigo, Localizacion) 
            VALUES ('$codigo', '$codigoLibro', '$ubicacion')";
    $conn->query($sql);
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $codigo = $_POST['codigo'];
    $codigoLibro = $_POST['codigo_libro'];
    $ubicacion = $_POST['ubicacion'];

    $sql = "UPDATE EJEMPLAR 
            SET Libro_Codigo='$codigoLibro', Localizacion='$ubicacion' 
            WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $codigo = $_GET['eliminar'];
    $sql = "DELETE FROM EJEMPLAR WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Leer
$resultado = $conn->query("SELECT * FROM EJEMPLAR");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de EJEMPLAR</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 5px; width: 180px; }
        button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Ejemplares</h2>

    <form method="POST">
        <input type="text" name="codigo" placeholder="Código" required>
        <input type="text" name="codigo_libro" placeholder="Código del Libro" required>
        <input type="text" name="ubicacion" placeholder="Ubicación" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <table>
        <tr>
            <th>Código</th>
            <th>Código del Libro</th>
            <th>Ubicación</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['Codigo']; ?></td>
            <td><?php echo $fila['Libro_Codigo']; ?></td>
            <td><?php echo $fila['Localizacion']; ?></td>
            <td>
                <a href="?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Eliminar este ejemplar?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

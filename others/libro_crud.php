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
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $editorial = $_POST['editorial'];
    $paginas = $_POST['paginas'];

    $sql = "INSERT INTO LIBRO (Codigo, Titulo, ISBN, Editorial, Paginas) 
            VALUES ('$codigo', '$titulo', '$isbn', '$editorial', $paginas)";
    $conn->query($sql);
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $editorial = $_POST['editorial'];
    $paginas = $_POST['paginas'];

    $sql = "UPDATE LIBRO 
            SET Titulo='$titulo', ISBN='$isbn', Editorial='$editorial', Paginas=$paginas 
            WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $codigo = $_GET['eliminar'];
    $sql = "DELETE FROM LIBRO WHERE Codigo='$codigo'";
    $conn->query($sql);
}

// Leer
$resultado = $conn->query("SELECT * FROM LIBRO");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de LIBRO</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        form { margin-bottom: 20px; }
        input[type="text"], input[type="number"] { padding: 5px; width: 180px; }
        button { padding: 6px 12px; margin-right: 5px; }
    </style>
</head>
<body>
    <h2>Gestión de Libros</h2>

    <form method="POST">
        <input type="text" name="codigo" placeholder="Código" required>
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="isbn" placeholder="ISBN">
        <input type="text" name="editorial" placeholder="Editorial">
        <input type="number" name="paginas" placeholder="Páginas">
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <table>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Páginas</th>
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
                <a href="?eliminar=<?php echo $fila['Codigo']; ?>" onclick="return confirm('¿Eliminar este libro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

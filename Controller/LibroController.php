<?php
require_once __DIR__ . '/../Model/LibroModel.php';

// Conexión
$conn = new mysqli("localhost", "root", "", "libreria");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$model = new LibroModel($conn);

// Crear
if (isset($_POST['crear'])) {
    $model->create($_POST['codigo'], $_POST['titulo'], $_POST['isbn'], $_POST['editorial'], $_POST['paginas']);
    header("Location: ../View/Libro/List.php");
    exit;
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $model->update($_POST['codigo'], $_POST['titulo'], $_POST['isbn'], $_POST['editorial'], $_POST['paginas']);
    header("Location: ../View/Libro/List.php");
    exit;
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $model->delete($_GET['eliminar']);
    header("Location: ../View/Libro/List.php");
    exit;
}
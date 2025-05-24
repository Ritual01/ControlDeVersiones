<?php

require_once __DIR__ . '/../Model/AutorModel.php';

$conn = new mysqli("localhost", "root", "", "libreria");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$model = new AutorModel($conn);

// Crear
if (isset($_POST['crear'])) {
    $model->create($_POST['codigo'], $_POST['nombre']);
    header("Location: ../View/Autor/List.php");
    exit;
}

// Actualizar
if (isset($_POST['actualizar'])) {
    $model->update($_POST['codigo'], $_POST['nombre']);
    header("Location: ../View/Autor/List.php");
    exit;
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $model->delete($_GET['eliminar']);
    header("Location: ../View/Autor/List.php");
    exit;
}
<?php

require_once __DIR__ . '/../Model/Autor_LibroModel.php';

$conn = new mysqli("localhost", "root", "", "libreria");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$model = new Autor_LibroModel($conn);

// Asociar autor a libro
if (isset($_POST['asociar'])) {
    $model->asociar($_POST['autor_codigo'], $_POST['libro_codigo']);
    header("Location: ../View/Autor_Libro/List.php");
    exit;
}

// Desasociar autor de libro
if (isset($_GET['desasociar_autor']) && isset($_GET['desasociar_libro'])) {
    $model->desasociar($_GET['desasociar_autor'], $_GET['desasociar_libro']);
    header("Location: ../View/Autor_Libro/List.php");
    exit;
}
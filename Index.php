<?php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/biblioteca.jpg'); /* Cambia la ruta según tu imagen */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }
        .container {
            background: rgba(255,255,255,0.85);
            max-width: 500px;
            margin: 80px auto;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .btn {
            display: block;
            width: 100%;
            margin: 12px 0;
            padding: 14px;
            font-size: 18px;
            border: none;
            border-radius: 6px;
            background: #2980b9;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s;
            text-decoration: none;
        }
        .btn:hover {
            background: #1abc9c;
        }
        .btn-main {
            background: #27ae60;
            font-weight: bold;
        }
        .btn-main:hover {
            background: #16a085;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Biblioteca</h1>
        <a href="View/Prestamo/List.php`" class="btn btn-main">Realizar Préstamos</a>
        <a href="View/Autor/List.php" class="btn">Autor</a>
        <a href="View/Libro/List.php" class="btn">Libro</a>
        <a href="View/Ejemplar/List.php" class="btn">Ejemplar</a>
        <a href="View/Usuario/List.php" class="btn">Usuario</a>
    </div>
</body>
</html>
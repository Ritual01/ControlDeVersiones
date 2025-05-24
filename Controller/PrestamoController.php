<?php
// filepath: c:\xampp\htdocs\GuiaControVersionMVC\ControlDeVersiones\Controller\PrestamoController.php

require_once __DIR__ . '/../Model/PrestamoModel.php';

class PrestamoController {
    private $model;

    public function __construct() {
        $this->model = new PrestamoModel();
    }

    public function index() {
        $prestamos = $this->model->getAll();
        include __DIR__ . '/../View/Prestamo/List.php';
    }

    public function show($id) {
        $prestamo = $this->model->getById($id);
        include __DIR__ . '/../View/Prestamo/Show.php';
    }

    public function create($data) {
        if (
            isset($data['codigo_usuario']) &&
            isset($data['codigo_ejemplar']) &&
            isset($data['fecha_prestamo']) &&
            isset($data['fecha_devolucion']) &&
            isset($data['estado'])
        ) {
            $this->model->create(
                $data['codigo_usuario'],
                $data['codigo_ejemplar'],
                $data['fecha_prestamo'],
                $data['fecha_devolucion'],
                $data['estado']
            );
        }
        header("Location: PrestamoController.php?action=index");
        exit();
    }

    public function update($data) {
        if (
            isset($data['id']) &&
            isset($data['codigo_usuario']) &&
            isset($data['codigo_ejemplar']) &&
            isset($data['fecha_prestamo']) &&
            isset($data['fecha_devolucion']) &&
            isset($data['estado'])
        ) {
            $this->model->update(
                $data['id'],
                $data['codigo_usuario'],
                $data['codigo_ejemplar'],
                $data['fecha_prestamo'],
                $data['fecha_devolucion'],
                $data['estado']
            );
        }
        header("Location: PrestamoController.php?action=index");
        exit();
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: PrestamoController.php?action=index");
        exit();
    }

    public function getPrestamos() {
        return $this->model->getAll();
    }
}

// Enrutador simple
$controller = new PrestamoController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($_GET['id']);
        break;
    case 'create':
        $controller->create($_POST);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}
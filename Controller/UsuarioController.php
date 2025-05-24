<?php

require_once __DIR__ . '/../Model/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function index() {
        $usuarios = $this->model->getAll();
        include __DIR__ . '/../View/Usuario/List.php';
    }

    public function show($codigo) {
        $usuario = $this->model->getByCodigo($codigo);
        include __DIR__ . '/../View/Usuario/Show.php';
    }

    public function create($data) {
        if (
            isset($data['codigo']) && isset($data['nombre']) &&
            isset($data['telefono']) && isset($data['direccion'])
        ) {
            $this->model->create(
                $data['codigo'],
                $data['nombre'],
                $data['telefono'],
                $data['direccion']
            );
        }
        header("Location: UsuarioController.php?action=index");
        exit();
    }

    public function update($data) {
        if (
            isset($data['codigo']) && isset($data['nombre']) &&
            isset($data['telefono']) && isset($data['direccion'])
        ) {
            $this->model->update(
                $data['codigo'],
                $data['nombre'],
                $data['telefono'],
                $data['direccion']
            );
        }
        header("Location: UsuarioController.php?action=index");
        exit();
    }

    public function delete($codigo) {
        $this->model->delete($codigo);
        header("Location: UsuarioController.php?action=index");
        exit();
    }

    public function getUsuarios() {
        return $this->model->getAll();
    }
}

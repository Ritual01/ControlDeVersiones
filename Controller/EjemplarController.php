<?php
require_once './Model/EjemplarModel.php';

class EjemplarController {
    private $model;

    public function __construct() {
        $this->model = new EjemplarModel();
    }

    // Listar todos los ejemplares
    public function index() {
        $ejemplares = $this->model->getAll();
        include './View/List.php';
    }

    // Mostrar formulario para crear nuevo ejemplar
    public function create() {
        include './View/Create.php';
    }

    // Guardar nuevo ejemplar
    public function store($data) {
        $this->model->insert($data);
        header("Location: ejemplar_crud.php?action=index");
    }

    // Mostrar formulario para editar un ejemplar
    public function edit($codigo) {
        $ejemplar = $this->model->getById($codigo);
        include './View/Create.php';
    }

    // Actualizar ejemplar existente
    public function update($codigo, $data) {
        $this->model->update($codigo, $data);
        header("Location: ejemplar_crud.php?action=index");
    }

    // Eliminar un ejemplar
    public function delete($codigo) {
        $this->model->delete($codigo);
        header("Location: ejemplar_crud.php?action=index");
    }
}
?>

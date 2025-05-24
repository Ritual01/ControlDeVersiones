<?php
// filepath: c:\xampp\htdocs\GuiaControVersionMVC\ControlDeVersiones\Model\PrestamoModel.php

class PrestamoModel {
    private $conn;

    public function __construct() {
        // Configuración por defecto de XAMPP
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "libreria"; // Cambia por el nombre de tu base de datos

        $this->conn = new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM prestamo";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM prestamo WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res ? $res->fetch_assoc() : null;
    }

    public function create($codigo_usuario, $codigo_ejemplar, $fecha_prestamo, $fecha_devolucion, $estado) {
        $stmt = $this->conn->prepare("INSERT INTO prestamo (codigo_usuario, codigo_ejemplar, fecha_prestamo, fecha_devolucion, estado) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $codigo_usuario, $codigo_ejemplar, $fecha_prestamo, $fecha_devolucion, $estado);
        return $stmt->execute();
    }

    public function update($id, $codigo_usuario, $codigo_ejemplar, $fecha_prestamo, $fecha_devolucion, $estado) {
        $stmt = $this->conn->prepare("UPDATE prestamo SET codigo_usuario = ?, codigo_ejemplar = ?, fecha_prestamo = ?, fecha_devolucion = ?, estado = ? WHERE id = ?");
        $stmt->bind_param("iisssi", $codigo_usuario, $codigo_ejemplar, $fecha_prestamo, $fecha_devolucion, $estado, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM prestamo WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
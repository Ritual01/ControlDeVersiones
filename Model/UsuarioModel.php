<?php

class UsuarioModel {
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
        $sql = "SELECT * FROM usuario";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getByCodigo($codigo) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE codigo = ?");
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res ? $res->fetch_assoc() : null;
    }

    public function create($codigo, $nombre, $telefono, $direccion) {
        $stmt = $this->conn->prepare("INSERT INTO usuario (codigo, nombre, telefono, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $codigo, $nombre, $telefono, $direccion);
        return $stmt->execute();
    }

    public function update($codigo, $nombre, $telefono, $direccion) {
        $stmt = $this->conn->prepare("UPDATE usuario SET nombre = ?, telefono = ?, direccion = ? WHERE codigo = ?");
        $stmt->bind_param("ssss", $nombre, $telefono, $direccion, $codigo);
        return $stmt->execute();
    }

    public function delete($codigo) {
        $stmt = $this->conn->prepare("DELETE FROM usuario WHERE codigo = ?");
        $stmt->bind_param("s", $codigo);
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
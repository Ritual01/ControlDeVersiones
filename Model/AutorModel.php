<?php

class AutorModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM AUTOR";
        return $this->conn->query($sql);
    }

    public function getById($codigo) {
        $sql = "SELECT * FROM AUTOR WHERE Codigo='$codigo'";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function create($codigo, $nombre) {
        $sql = "INSERT INTO AUTOR (Codigo, Nombre) VALUES ('$codigo', '$nombre')";
        return $this->conn->query($sql);
    }

    public function update($codigo, $nombre) {
        $sql = "UPDATE AUTOR SET Nombre='$nombre' WHERE Codigo='$codigo'";
        return $this->conn->query($sql);
    }

    public function delete($codigo) {
        $sql = "DELETE FROM AUTOR WHERE Codigo='$codigo'";
        return $this->conn->query($sql);
    }
}
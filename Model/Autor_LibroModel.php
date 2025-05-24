<?php

class Autor_LibroModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Obtener todas las asociaciones autor-libro
    public function getAll() {
        $sql = "SELECT al.Autor_Codigo, a.Nombre AS Autor_Nombre, al.Libro_Codigo, l.Titulo AS Libro_Titulo
                FROM AUTOR_LIBRO al
                JOIN AUTOR a ON al.Autor_Codigo = a.Codigo
                JOIN LIBRO l ON al.Libro_Codigo = l.Codigo";
        return $this->conn->query($sql);
    }

    // Asociar un autor a un libro
    public function asociar($autor_codigo, $libro_codigo) {
        $sql = "INSERT INTO AUTOR_LIBRO (Autor_Codigo, Libro_Codigo) VALUES ('$autor_codigo', '$libro_codigo')";
        return $this->conn->query($sql);
    }

    // Desasociar un autor de un libro
    public function desasociar($autor_codigo, $libro_codigo) {
        $sql = "DELETE FROM AUTOR_LIBRO WHERE Autor_Codigo='$autor_codigo' AND Libro_Codigo='$libro_codigo'";
        return $this->conn->query($sql);
    }
}
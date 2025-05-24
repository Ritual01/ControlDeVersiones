<?php

class LibroModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM LIBRO";
        return $this->conn->query($sql);
    }

    public function getById($codigo) {
        $sql = "SELECT * FROM LIBRO WHERE Codigo='$codigo'";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function create($codigo, $titulo, $isbn, $editorial, $paginas) {
        $sql = "INSERT INTO LIBRO (Codigo, Titulo, ISBN, Editorial, Paginas) 
                VALUES ('$codigo', '$titulo', '$isbn', '$editorial', $paginas)";
        return $this->conn->query($sql);
    }

    public function update($codigo, $titulo, $isbn, $editorial, $paginas) {
        $sql = "UPDATE LIBRO SET Titulo='$titulo', ISBN='$isbn', Editorial='$editorial', Paginas=$paginas 
                WHERE Codigo='$codigo'";
        return $this->conn->query($sql);
    }

    public function delete($codigo) {
        // Elimina ejemplares relacionados primero
        $this->conn->query("DELETE FROM EJEMPLAR WHERE Libro_Codigo='$codigo'");
        // Luego elimina el libro
        $sql = "DELETE FROM LIBRO WHERE Codigo='$codigo'";
        return $this->conn->query($sql);
    }

    public function getAutores($libro_codigo) {
        $sql = "SELECT a.Codigo, a.Nombre
                FROM AUTOR_LIBRO al
                JOIN AUTOR a ON al.Autor_Codigo = a.Codigo
                WHERE al.Libro_Codigo = '$libro_codigo'";
        return $this->conn->query($sql);
    }
}
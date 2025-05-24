<?php
class EjemplarModel {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=libreria;charset=utf8', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    // Obtener todos los ejemplares
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM EJEMPLAR");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un ejemplar por su código
    public function getById($codigo) {
        $stmt = $this->pdo->prepare("SELECT * FROM EJEMPLAR WHERE Codigo = ?");
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo ejemplar
    public function insert($data) {
        $stmt = $this->pdo->prepare("INSERT INTO EJEMPLAR (Codigo, Localizacion, Libro_Codigo) VALUES (?, ?, ?)");
        return $stmt->execute([$data['Codigo'], $data['Localizacion'], $data['Libro_Codigo']]);
    }

    // Actualizar un ejemplar
    public function update($codigo, $data) {
        $stmt = $this->pdo->prepare("UPDATE EJEMPLAR SET Localizacion = ?, Libro_Codigo = ? WHERE Codigo = ?");
        return $stmt->execute([$data['Localizacion'], $data['Libro_Codigo'], $codigo]);
    }

    // Eliminar un ejemplar
    public function delete($codigo) {
        $stmt = $this->pdo->prepare("DELETE FROM EJEMPLAR WHERE Codigo = ?");
        return $stmt->execute([$codigo]);
    }
}
?>

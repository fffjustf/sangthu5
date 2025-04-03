<?php
class NganhhocModel {
    private $conn;
    private $table_name = "nganhhoc";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNganhhocs() {
        $query = "SELECT MaNganh, TenNganh FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNganhhocByMaNganh($manganh) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaNganh = :manganh";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':manganh', $manganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addNganhhoc($manganh, $tennganh) {
        $query = "INSERT INTO " . $this->table_name . " (MaNganh, TenNganh) VALUES (:manganh, :tennganh)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':manganh', $manganh);
        $stmt->bindParam(':tennganh', $tennganh);

        return $stmt->execute();
    }

    public function updateNganhhoc($manganh, $tennganh) {
        $query = "UPDATE " . $this->table_name . "SET TenNganh = :tennganh WHERE MaNganh = :manganh";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':manganh', $manganh);
        $stmt->bindParam(':tennganh', $tennganh);

        return $stmt->execute();
    }

    public function deleteNganhhoc($manganh) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaNganh = :manganh";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':manganh', $manganh);

        return $stmt->execute();
    }
}
?>

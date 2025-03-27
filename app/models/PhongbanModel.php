<?php
class PhongbanModel {
    private $conn;
    private $table_name = "phongban";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPhongbans() {
        $query = "SELECT Ma_Phong, Ten_Phong FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPhongbanById($ma_phong) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Ma_Phong = :ma_phong";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_phong', $ma_phong);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addPhongban($ma_phong, $ten_phong) {
        $query = "INSERT INTO " . $this->table_name . " (Ma_Phong, Ten_Phong) VALUES (:ma_phong, :ten_phong)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ma_phong', $ma_phong);
        $stmt->bindParam(':ten_phong', $ten_phong);

        return $stmt->execute();
    }

    public function updatePhongban($ma_phong, $ten_phong) {
        $query = "UPDATE " . $this->table_name . " SET Ten_Phong = :ten_phong WHERE Ma_Phong = :ma_phong";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ma_phong', $ma_phong);
        $stmt->bindParam(':ten_phong', $ten_phong);

        return $stmt->execute();
    }

    public function deletePhongban($ma_phong) {
        $query = "DELETE FROM " . $this->table_name . " WHERE Ma_Phong = :ma_phong";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_phong', $ma_phong);

        return $stmt->execute();
    }
}
?>

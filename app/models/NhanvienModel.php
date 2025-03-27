<?php
class NhanvienModel {
    private $conn;
    private $table_name = "nhanvien";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNhanviens() {
        $query = "SELECT Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNhanvienById($ma_nv) {
        $query = "SELECT Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong FROM " . $this->table_name . " WHERE Ma_NV = :ma_nv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_nv', $ma_nv, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addNhanvien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong) {
        $query = "INSERT INTO " . $this->table_name . " (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
                  VALUES (:ma_nv, :ten_nv, :phai, :noi_sinh, :ma_phong, :luong)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ma_nv', $ma_nv, PDO::PARAM_STR);
        $stmt->bindParam(':ten_nv', $ten_nv, PDO::PARAM_STR);
        $stmt->bindParam(':phai', $phai, PDO::PARAM_STR);
        $stmt->bindParam(':noi_sinh', $noi_sinh, PDO::PARAM_STR);
        $stmt->bindParam(':ma_phong', $ma_phong, PDO::PARAM_STR);
        $stmt->bindParam(':luong', $luong, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function updateNhanvien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong) {
        $query = "UPDATE " . $this->table_name . " 
                  SET Ten_NV = :ten_nv, Phai = :phai, Noi_Sinh = :noi_sinh, Ma_Phong = :ma_phong, Luong = :luong
                  WHERE Ma_NV = :ma_nv";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ma_nv', $ma_nv, PDO::PARAM_STR);
        $stmt->bindParam(':ten_nv', $ten_nv, PDO::PARAM_STR);
        $stmt->bindParam(':phai', $phai, PDO::PARAM_STR);
        $stmt->bindParam(':noi_sinh', $noi_sinh, PDO::PARAM_STR);
        $stmt->bindParam(':ma_phong', $ma_phong, PDO::PARAM_STR);
        $stmt->bindParam(':luong', $luong, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteNhanvien($ma_nv) {
        $query = "DELETE FROM " . $this->table_name . " WHERE Ma_NV = :ma_nv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ma_nv', $ma_nv, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>

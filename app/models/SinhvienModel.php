<?php
class SinhvienModel {
    private $conn;
    private $table_name = "sinhvien";

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function getSinhviens() {
        $query = "SELECT MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getSinhvienByMaSV($masv) {
        $query = "SELECT MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh FROM " . $this->table_name . " WHERE MaSV = :masv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':masv', $masv);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    
    public function addSinhvien($masv, $hoten, $gioitinh, $ngaysinh, $hinh, $manganh)
    {
        $query = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:masv, :hoten, :gioitinh, :ngaysinh, :hinh, :manganh)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':masv', $masv, PDO::PARAM_STR);
        $stmt->bindParam(':hoten', $hoten, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        $stmt->bindParam(':ngaysinh', $ngaysinh, PDO::PARAM_STR);
        // Sử dụng bindParam() thay vì bindValue() cho BLOB
        $stmt->bindParam(':hinh', $hinh, PDO::PARAM_LOB, strlen($hinh));
        $stmt->bindParam(':manganh', $manganh, PDO::PARAM_STR);
    
        
    
        return $stmt->execute();
    }
    
    public function updateSinhvien($masv, $hoten, $gioitinh, $ngaysinh, $hinh, $manganh) {
        $query = "UPDATE " . $this->table_name . " 
                  SET HoTen = :hoten, GioiTinh = :gioitinh, NgaySinh = :ngaysinh, Hinh = :hinh, MaNganh = :manganh
                  WHERE MaSV = :masv";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':masv', $masv, PDO::PARAM_STR);
        $stmt->bindParam(':hoten', $hoten, PDO::PARAM_STR);
        $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_STR);
        $stmt->bindParam(':ngaysinh', $ngaysinh, PDO::PARAM_STR);
        $stmt->bindParam(':hinh', $hinh, PDO::PARAM_LOB, strlen($hinh));
        $stmt->bindParam(':manganh', $manganh, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteSinhvien($masv) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaSV = :masv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':masv', $masv, PDO::PARAM_STR);
        return $stmt->execute();
    }

}
?>

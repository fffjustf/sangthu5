<?php
require_once('app/config/database.php');

if (isset($_GET['masv'])) {
    $db = (new Database())->getConnection();
    $masv = $_GET['masv'];

    $query = "SELECT Hinh FROM sinhvien WHERE MaSV = :masv";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':masv', $masv);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && !empty($result['Hinh'])) {
        header("Content-Type: image/jpeg");
        echo $result['Hinh'];
    } else {
        echo "No Image";
    }
}
?>

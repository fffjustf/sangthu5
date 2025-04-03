<?php
session_start();
require_once('app/config/database.php');
require_once('app/models/SinhvienModel.php');

$db = (new Database())->getConnection();
$sinhvienModel = new SinhvienModel($db);
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $masv = $_POST['masv'] ?? '';
    $password = $_POST['password'] ?? '';

    $sinhvien = $sinhvienModel->checkLogin($masv, $password);

    if ($sinhvien) {
        $_SESSION['masv'] = $sinhvien->MaSV;
        $_SESSION['hoten'] = $sinhvien->HoTen;
        header('Location: index.php'); // Chuyển hướng đến trang chính sau khi đăng nhập
        exit();
    } else {
        $error = "Sai Mã Sinh Viên hoặc Mật Khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f4f4; }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h3 class="text-center">Đăng Nhập</h3>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="masv" class="form-label">Mã Sinh Viên</label>
                    <input type="text" name="masv" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật Khẩu</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
            </form>
        </div>
    </div>
</body>
</html>

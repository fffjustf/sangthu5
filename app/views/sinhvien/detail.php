<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .info {
            text-align: left;
            margin-top: 20px;
        }
        .info strong {
            display: inline-block;
            width: 100px;
        }
        .student-img {
            margin-top: 10px;
            max-width: 200px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .links {
            margin-top: 20px;
        }
        .links a {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Thông tin chi tiết</h2>
    <h3>SinhViên</h3>

    <div class="info">
        <p><strong>Họ Tên:</strong> <?= htmlspecialchars($sinhvien->HoTen) ?></p>
        <p><strong>Giới Tính:</strong> <?= htmlspecialchars($sinhvien->GioiTinh) ?></p>
        <p><strong>Ngày Sinh:</strong> <?= date("d/m/Y", strtotime($sinhvien->NgaySinh)) ?></p>
        <p><strong>Hình:</strong></p>
        <img class="student-img" src="data:image/jpeg;base64,<?= base64_encode($sinhvien->Hinh) ?>" alt="Hình ảnh sinh viên">
        <p><strong>Ngành Học:</strong> <?= htmlspecialchars($sinhvien->MaNganh) ?></p>
    </div>

    <div class="links">
        <a href="/kiemtrasang5/Sinhvien/edit/<?= htmlspecialchars($sinhvien->MaSV) ?>">Edit</a> |
        <a href="/kiemtrasang5/Sinhvien">Back to List</a>
    </div>
</div>

</body>
</html>

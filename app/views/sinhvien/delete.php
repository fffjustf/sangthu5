<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Thông Tin</title>
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
            color: red;
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
        .links a, .delete-btn {
            text-decoration: none;
            color: blue;
            margin-right: 10px;
        }
        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background-color: darkred;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>XÓA THÔNG TIN</h2>
    <p>Are you sure you want to delete this?</p>

    <div class="info">
        <p><strong>Họ Tên:</strong> <?= htmlspecialchars($sinhvien->HoTen) ?></p>
        <p><strong>Giới Tính:</strong> <?= htmlspecialchars($sinhvien->GioiTinh) ?></p>
        <p><strong>Ngày Sinh:</strong> <?= date("d/m/Y", strtotime($sinhvien->NgaySinh)) ?></p>
        <p><strong>Hình:</strong></p>
        <img class="student-img" src="data:image/jpeg;base64,<?= base64_encode($sinhvien->Hinh) ?>" alt="Hình ảnh sinh viên">
        <p><strong>Ngành Học:</strong> <?= htmlspecialchars($sinhvien->MaNganh) ?></p>
    </div>

    <div class="links">
        <form action="/kiemtrasang5/Sinhvien/delete/<?= htmlspecialchars($sinhvien->MaSV) ?>" method="POST" style="display:inline;">
            <button type="submit" class="delete-btn">Delete</button>
        </form>
        <a href="/kiemtrasang5/Sinhvien">| Back to List</a>
    </div>
</div>

</body>
</html>

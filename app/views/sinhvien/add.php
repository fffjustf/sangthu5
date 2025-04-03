<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 25px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .form-group {
            text-align: left;
        }
        label {
            font-weight: 500;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #007BFF;
        }
        #preview {
            border-radius: 5px;
            border: 1px solid #ddd;
            max-width: 100px;
            margin-top: 10px;
            display: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-submit {
            background: #007BFF;
            color: white;
            border: none;
        }
        .btn-submit:hover {
            background: #0056b3;
        }
        .btn-cancel {
            background: #dc3545;
            color: white;
            margin-left: 10px;
        }
        .btn-cancel:hover {
            background: #c82333;
        }
    </style>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Thêm Sinh Viên</h2>

    <form action="/kiemtrasang5/Sinhvien/save" method="POST" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="masv">📌 Mã sinh viên:</label>
            <input type="text" id="masv" name="masv" required placeholder="Nhập mã sinh viên">
        </div>

        <div class="form-group">
            <label for="hoten">👤 Họ và tên:</label>
            <input type="text" id="hoten" name="hoten" required placeholder="Nhập họ và tên">
        </div>

        <div class="form-group">
            <label>⚥ Giới tính:</label>
            <select name="gioitinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ngaysinh">📅 Ngày sinh:</label>
            <input type="date" id="ngaysinh" name="ngaysinh" required>
        </div>

        <div class="form-group">
            <label for="hinh">📷 Ảnh đại diện:</label>
            <input type="file" id="hinh" name="hinh" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Xem trước ảnh">
        </div>

        <div class="form-group">
            <label for="manganh">📚 Ngành học:</label>
            <select name="manganh" required>
                <?php foreach ($nganhhocs as $nganh) : ?>
                    <option value="<?= $nganh->MaNganh ?>"><?= $nganh->TenNganh ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-submit">➕ Thêm sinh viên</button>
            <a href="/kiemtrasang5/Sinhvien" class="btn btn-cancel">❌ Hủy</a>
        </div>
    </form>
</div>

</body>
</html>

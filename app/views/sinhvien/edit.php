<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Chỉnh Sửa Sinh Viên</h2>

        <?php if ($sinhvien): ?>
            <form action="/kiemtrasang5/Sinhvien/update" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
                <input type="hidden" name="masv" value="<?php echo htmlspecialchars($sinhvien->MaSV); ?>">

                <!-- Họ tên -->
                <div class="mb-3">
                    <label class="form-label">Họ Tên</label>
                    <input type="text" name="hoten" class="form-control" required value="<?php echo htmlspecialchars($sinhvien->HoTen); ?>">
                </div>

                <!-- Giới tính -->
                <div class="mb-3">
                    <label class="form-label">Giới Tính</label>
                    <select name="gioitinh" class="form-select">
                        <option value="Nam" <?php echo ($sinhvien->GioiTinh == "Nam") ? "selected" : ""; ?>>Nam</option>
                        <option value="Nữ" <?php echo ($sinhvien->GioiTinh == "Nữ") ? "selected" : ""; ?>>Nữ</option>
                    </select>
                </div>

                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label class="form-label">Ngày Sinh</label>
                    <input type="date" name="ngaysinh" class="form-control" required value="<?php echo date('Y-m-d', strtotime($sinhvien->NgaySinh)); ?>">
                </div>

                <!-- Ảnh sinh viên -->
                <div class="mb-3">
                    <label class="form-label">Ảnh Sinh Viên</label>
                    <?php if (!empty($sinhvien->Hinh)): ?>
                        <br>
                        <img src="<?php echo htmlspecialchars($sinhvien->Hinh); ?>" class="img-thumbnail mb-2" width="150">
                    <?php endif; ?>
                    <input type="file" name="hinh" class="form-control">
                    <input type="hidden" name="old_hinh" value="<?php echo htmlspecialchars($sinhvien->Hinh); ?>">
                </div>

                <!-- Ngành học -->
                <div class="mb-3">
                    <label class="form-label">Ngành Học</label>
                    <select name="manganh" class="form-select" required>
                        <?php foreach ($nganhhocs as $nganh): ?>
                            <option value="<?php echo htmlspecialchars($nganh->MaNganh); ?>" 
                                <?php echo ($sinhvien->MaNganh == $nganh->MaNganh) ? "selected" : ""; ?>>
                                <?php echo htmlspecialchars($nganh->TenNganh); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Nút Lưu -->
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                <a href="/kiemtrasang5/Sinhvien" class="btn btn-secondary">Hủy</a>
            </form>
        <?php else: ?>
            <p class="text-danger">Không tìm thấy thông tin sinh viên!</p>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include 'app/views/shares/header.php'; ?>

<h1 class="text-center">Chỉnh sửa Nhân Viên</h1>

<?php if (isset($nhanvien)): ?>
    <form action="/kiemtrasang5/Nhanvien/update" method="POST">
        <input type="hidden" name="ma_nv" value="<?php echo htmlspecialchars($nhanvien->Ma_NV, ENT_QUOTES, 'UTF-8'); ?>">

        <div class="mb-3">
            <label class="form-label">Tên Nhân Viên</label>
            <input type="text" name="ten_nv" class="form-control" value="<?php echo htmlspecialchars($nhanvien->Ten_NV, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <select name="phai" class="form-control" required>
                <option value="Nam" <?php echo ($nhanvien->Phai == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($nhanvien->Phai == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nơi Sinh</label>
            <input type="text" name="noi_sinh" class="form-control" value="<?php echo htmlspecialchars($nhanvien->Noi_Sinh, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phòng Ban</label>
            <select name="ma_phong" class="form-control" required>
                <?php foreach ($phongbans as $phongban): ?>
                    <option value="<?php echo htmlspecialchars($phongban->Ma_Phong, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($nhanvien->Ma_Phong == $phongban->Ma_Phong) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($phongban->Ten_Phong, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Lương</label>
            <input type="number" name="luong" class="form-control" value="<?php echo htmlspecialchars($nhanvien->Luong, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/kiemtrasang5/Nhanvien" class="btn btn-secondary">Hủy</a>
    </form>
<?php else: ?>
    <p class="text-danger">Không tìm thấy nhân viên.</p>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
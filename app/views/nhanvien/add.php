<?php include 'app/views/shares/header.php'; ?>

<h2 class="text-center">Thêm Nhân Viên</h2>

<form action="/kiemtrasang5/Nhanvien/save" method="POST" class="w-50 mx-auto">
    <div class="mb-3">
        <label for="ma_nv" class="form-label">Mã Nhân Viên</label>
        <input type="text" id="ma_nv" name="ma_nv" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="ten_nv" class="form-label">Tên Nhân Viên</label>
        <input type="text" id="ten_nv" name="ten_nv" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <div>
            <input type="radio" id="nam" name="phai" value="Nam" required>
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="phai" value="Nữ" required>
            <label for="nu">Nữ</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="noi_sinh" class="form-label">Nơi Sinh</label>
        <input type="text" id="noi_sinh" name="noi_sinh" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="ma_phong" class="form-label">Mã Phòng</label>
        <select id="ma_phong" name="ma_phong" class="form-control" required>
            <?php foreach ($phongbans as $phongban): ?>
                <option value="<?php echo htmlspecialchars($phongban->Ma_Phong); ?>">
                    <?php echo htmlspecialchars($phongban->Ten_Phong); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="luong" class="form-label">Lương</label>
        <input type="number" id="luong" name="luong" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    <a href="/kiemtrasang5/Nhanvien" class="btn btn-secondary">Hủy</a>
</form>

<?php include 'app/views/shares/footer.php'; ?>
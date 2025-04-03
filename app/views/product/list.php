<!-- <?php include 'app/views/shares/header.php'; ?>

<h1>Danh sách Nhân Viên</h1>
<a href="/kiemtrasang5/Nhanvien/add" class="btn btn-success mb-2">Thêm Nhân Viên</a>

<ul class="list-group">
    <?php foreach ($nhanviens as $nhanvien): ?>
        <li class="list-group-item">
            <h2>
                <a href="/kiemtrasang5/Nhanvien/show/<?php echo $nhanvien->Ma_NV; ?>">
                    <?php echo htmlspecialchars($nhanvien->Ten_NV, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </h2>
            <p><strong>Giới tính:</strong> <?php echo ($nhanvien->Phai == 'Nam') ? 'Nam' : 'Nữ'; ?></p>
            <p><strong>Nơi sinh:</strong> <?php echo htmlspecialchars($nhanvien->Noi_Sinh, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Mã phòng:</strong> <?php echo htmlspecialchars($nhanvien->Ma_Phong, ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Lương:</strong> <?php echo number_format($nhanvien->Luong); ?> VNĐ</p>

            <a href="/kiemtrasang5/Nhanvien/edit/<?php echo $nhanvien->Ma_NV; ?>" class="btn btn-warning">Sửa</a>
            <a href="/kiemtrasang5/Nhanvien/delete/<?php echo $nhanvien->Ma_NV; ?>" 
               class="btn btn-danger" 
               onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">
               Xóa
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include 'app/views/shares/footer.php'; ?> -->

<?php include '../app/views/shares/header.php'; ?>

<h1>Danh sách sản phẩm</h1>
<a href="/WEBBANHANG/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>
<ul class="list-group">
    <?php foreach ($products as $product): ?>
    <li class="list-group-item">
        <h2> 
            <a href="/WEBBANHANG/Product/show/<?php echo $product->id; ?>" >
                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        </h2>
        <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?></p>

        <a href="/WEBBANHANG/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
        <a href="/WEBBANHANG/Product/delete/<?php echo $product->id; ?>" 
           class="btn btn-danger" 
           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
    </li>
    <?php endforeach; ?>
</ul>

<?php include '../app/views/shares/footer.php'; ?>

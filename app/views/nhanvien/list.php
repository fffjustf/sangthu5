<?php include 'app/views/shares/header.php'; ?>

<h1 class="text-center">Danh sách Nhân Viên</h1>
<a href="/kiemtrasang5/Nhanvien/add" class="btn btn-success mb-2">Thêm Nhân Viên</a>

<?php
// Thiết lập số nhân viên trên mỗi trang
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn tổng số nhân viên
$total_nhanviens = count($nhanviens);
$total_pages = ceil($total_nhanviens / $limit);

// Lấy danh sách nhân viên theo phân trang
$nhanviens_paged = array_slice($nhanviens, $offset, $limit);
?>

<table class="table table-bordered text-center">
    <thead class="table-danger">
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($nhanviens_paged as $nhanvien): ?>
            <tr class="<?php echo ($nhanvien->Ma_NV[0] == 'A') ? 'table-secondary' : ''; ?>">
                <td><?php echo htmlspecialchars($nhanvien->Ma_NV, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($nhanvien->Ten_NV, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <img src="public/images/<?php echo ($nhanvien->Phai == 'NU') ? 'woman.jpg' : 'man.jpg'; ?>" 
                         alt="<?php echo $nhanvien->Phai; ?>" width="40">
                </td>
                <td><?php echo htmlspecialchars($nhanvien->Noi_Sinh, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($nhanvien->Ma_Phong, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo number_format($nhanvien->Luong); ?> VNĐ</td>
                <td>
                    <a href="/kiemtrasang5/Nhanvien/edit/<?php echo $nhanvien->Ma_NV; ?>" class="btn btn-warning">Sửa</a>
                    <a href="/kiemtrasang5/Nhanvien/delete/<?php echo $nhanvien->Ma_NV; ?>" 
                       class="btn btn-danger" 
                       onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">
                       Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Phân trang -->
<nav>
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"> <?php echo $i; ?> </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php include 'app/views/shares/footer.php'; ?>
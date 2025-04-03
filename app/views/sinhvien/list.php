<?php include 'app/views/shares/header.php'; ?>     
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .student-img { width: 100px; height: auto; border-radius: 5px; }
        .pagination { justify-content: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">TRANG SINH VIÊN</h2>
        <a href="/kiemtrasang5/Sinhvien/add" class="btn btn-primary mb-3">Add Student</a>

        <?php
        // Cấu hình số sinh viên trên mỗi trang
        $limit = 4;
        $totalSinhviens = count($sinhviens); // Tổng số sinh viên
        $totalPages = ceil($totalSinhviens / $limit); // Tổng số trang

        // Xác định trang hiện tại
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $totalPages) $page = $totalPages;

        // Xác định vị trí bắt đầu của dữ liệu trong mảng
        $offset = ($page - 1) * $limit;
        $sinhviensOnPage = array_slice($sinhviens, $offset, $limit); // Cắt mảng dữ liệu
        ?>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>MaSV</th>
                    <th>HoTen</th>
                    <th>GioiTinh</th>
                    <th>NgaySinh</th>
                    <th>Hinh</th>
                    <th>MaNganh</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhviensOnPage as $sv): ?>
                <tr>
                    <td><?php echo htmlspecialchars($sv->MaSV); ?></td>
                    <td><?php echo htmlspecialchars($sv->HoTen); ?></td>
                    <td><?php echo htmlspecialchars($sv->GioiTinh); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($sv->NgaySinh)); ?></td>
                    <td>
                        <?php if (!empty($sv->Hinh)): ?>
                            <img src="<?php echo htmlspecialchars($sv->Hinh); ?>" class="student-img">
                        <?php else: ?>
                            <span>No Image</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($sv->MaNganh); ?></td>
                    <td>
                        <a href="/kiemtrasang5/Sinhvien/edit/<?php echo $sv->MaSV; ?>" class="text-primary">Edit</a> |
                        <a href="/kiemtrasang5/Sinhvien/show/<?php echo $sv->MaSV; ?>" class="text-info">Details</a> |
                        <a href="/kiemtrasang5/Sinhvien/confirmDelete/<?php echo $sv->MaSV; ?>" class="text-danger">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Phân trang -->
        <nav>
            <ul class="pagination">
                <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

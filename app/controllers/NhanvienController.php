<?php
// Require necessary files
require_once('app/config/database.php');
require_once('app/models/NhanvienModel.php');
require_once('app/models/PhongbanModel.php');

class NhanvienController
{
    private $nhanvienModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->nhanvienModel = new NhanvienModel($this->db);
    }

    // Hiển thị danh sách nhân viên
    public function index()
    {
        $nhanviens = $this->nhanvienModel->getNhanviens();
        include 'app/views/nhanvien/list.php';
    }

    // Hiển thị chi tiết nhân viên
    public function show($ma_nv)
    {
        $nhanvien = $this->nhanvienModel->getNhanvienById($ma_nv);

        if ($nhanvien) {
            include 'app/views/nhanvien/show.php';
        } else {
            echo "Không tìm thấy nhân viên.";
        }
    }

    // Hiển thị form thêm nhân viên
    public function add()
    {
        $phongbans = (new PhongbanModel($this->db))->getPhongbans();
        include 'app/views/nhanvien/add.php';
    }

    // Lưu nhân viên vào database
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_nv = $_POST['ma_nv'] ?? '';
            $ten_nv = $_POST['ten_nv'] ?? '';
            $phai = $_POST['phai'] ?? '';
            $noi_sinh = $_POST['noi_sinh'] ?? '';
            $ma_phong = $_POST['ma_phong'] ?? null;
            $luong = $_POST['luong'] ?? 0;

            // Lưu nhân viên vào database
            if ($this->nhanvienModel->addNhanvien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)) {
                header('Location: /kiemtrasang5/Nhanvien');
                exit();
            } else {
                echo "Đã xảy ra lỗi khi thêm nhân viên.";
            }
        }
    }

    // Hiển thị form sửa nhân viên
    public function edit($ma_nv)
    {
        $nhanvien = $this->nhanvienModel->getNhanvienById($ma_nv);
        $phongbans = (new PhongbanModel($this->db))->getPhongbans();

        if ($nhanvien) {
            include 'app/views/nhanvien/edit.php';
        } else {
            echo "Không tìm thấy nhân viên.";
        }
    }

    // Cập nhật thông tin nhân viên
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ma_nv = $_POST['ma_nv'];
            $ten_nv = $_POST['ten_nv'];
            $phai = $_POST['phai'];
            $noi_sinh = $_POST['noi_sinh'];
            $ma_phong = $_POST['ma_phong'];
            $luong = $_POST['luong'];

            if ($this->nhanvienModel->updateNhanvien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)) {
                header('Location: /kiemtrasang5/Nhanvien');
            } else {
                echo "Đã xảy ra lỗi khi cập nhật nhân viên.";
            }
        }
    }

    // Xóa nhân viên
    public function delete($ma_nv)
    {
        if ($this->nhanvienModel->deleteNhanvien($ma_nv)) {
            header('Location: /kiemtrasang5/Nhanvien');
        } else {
            echo "Đã xảy ra lỗi khi xóa nhân viên.";
        }
    }
}
?>

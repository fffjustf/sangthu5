<?php
// Require necessary files
require_once('app/config/database.php');
require_once('app/models/SinhvienModel.php');
require_once('app/models/NganhhocModel.php');

class SinhvienController
{
    private $sinhvienModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->sinhvienModel = new SinhvienModel($this->db);
    }

    // Hiển thị danh sách sinh viên
    public function index()
    {
        $sinhviens = $this->sinhvienModel->getSinhviens();
        include 'app/views/sinhvien/list.php';
    }

    // Hiển thị chi tiết sinh viên
    public function show($masv)
    {
        $sinhvien = $this->sinhvienModel->getSinhvienByMaSV($masv);

        if ($sinhvien) {
            include 'app/views/sinhvien/detail.php';
        } else {
            echo "Không tìm thấy sinh viên.";
        }
    }

    // Hiển thị form thêm sinh viên
    public function add()
    {
        $nganhhocs = (new NganhhocModel($this->db))->getNganhhocs();
        include 'app/views/sinhvien/add.php';
    }

    // Lưu sinh viên vào database
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masv = $_POST['masv'] ?? '';
            $hoten = $_POST['hoten'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            $ngaysinh = $_POST['ngaysinh'] ?? '';
            $hinh = $_POST['hinh'] ?? 0;
            $manganh = $_POST['manganh'] ?? null;

            // Lưu nhân viên vào database
            if ($this->sinhvienModel->addSinhvien($masv, $hoten, $gioitinh, $ngaysinh, $hinh, $manganh)) {
                header('Location: /kiemtrasang5/Sinhvien');
                exit();
            } else {
                echo "Đã xảy ra lỗi khi thêm sinh viên.";
            }
        }
    }

    // Hiển thị form sửa sinh viên
    public function edit($masv)
    {
        $sinhvien = $this->sinhvienModel->getSinhvienByMaSV($masv);
        $nganhhocs = (new NganhhocModel($this->db))->getNganhhocs();

        if ($sinhvien) {
            include 'app/views/sinhvien/edit.php';
        } else {
            echo "Không tìm thấy sinh viên.";
        }
    }

    // Cập nhật thông tin sinh viên
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masv = $_POST['masv'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $hinh = $_POST['hinh'];
            $manganh = $_POST['manganh'];

            if ($this->sinhvienModel->updateSinhvien($masv, $hoten, $gioitinh, $ngaysinh, $hinh, $manganh)) {
                header('Location: /kiemtrasang5/Sinhvien');
            } else {
                echo "Đã xảy ra lỗi khi cập nhật sinh viên.";
            }
        }
    }

    // Xóa nhân viên
    public function delete($masv)
    {
        if ($this->sinhvienModel->deleteSinhvien($masv)) {
            header('Location: /kiemtrasang5/Sinhvien');
        } else {
            echo "Đã xảy ra lỗi khi xóa sinh viên.";
        }
    }
    public function confirmDelete($masv)
{
    $sinhvien = $this->sinhvienModel->getSinhvienByMaSV($masv);
    if ($sinhvien) {
        include 'app/views/sinhvien/delete.php';
    } else {
        echo "Không tìm thấy sinh viên.";
    }
}

}
?>

<?php
require_once('app/config/database.php');
require_once('app/models/PhongbanModel.php');

class PhongbanController
{
    private $phongbanModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->phongbanModel = new PhongbanModel($this->db);
    }

    // Hiển thị danh sách phòng ban
    public function list()
    {
        $phongbans = $this->phongbanModel->getPhongbans();
        include 'app/views/phongban/list.php';
    }

    // Hiển thị form thêm phòng ban
    public function add()
    {
        include 'app/views/phongban/add.php';
    }

    // Lưu phòng ban vào database
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ma_phong = $_POST['ma_phong'] ?? '';
            $ten_phong = $_POST['ten_phong'] ?? '';

            if (empty($ma_phong) || empty($ten_phong)) {
                $error = "Mã phòng và Tên phòng không được để trống!";
                include 'app/views/phongban/add.php';
                return;
            }

            if ($this->phongbanModel->addPhongban($ma_phong, $ten_phong)) {
                header('Location: /kiemtrasang5/Phongban/list');
            } else {
                echo "Lỗi khi thêm phòng ban.";
            }
        }
    }

    // Hiển thị form sửa phòng ban
    public function edit($ma_phong)
    {
        $phongban = $this->phongbanModel->getPhongbanById($ma_phong);

        if ($phongban) {
            include 'app/views/phongban/edit.php';
        } else {
            echo "Phòng ban không tồn tại.";
        }
    }

    // Cập nhật phòng ban
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ma_phong = $_POST['ma_phong'];
            $ten_phong = $_POST['ten_phong'];

            if (empty($ten_phong)) {
                echo "Tên phòng không được để trống!";
                return;
            }

            if ($this->phongbanModel->updatePhongban($ma_phong, $ten_phong)) {
                header('Location: /kiemtrasang5/Phongban/list');
            } else {
                echo "Lỗi khi cập nhật phòng ban.";
            }
        }
    }

    // Xóa phòng ban
    public function delete($ma_phong)
    {
        if ($this->phongbanModel->deletePhongban($ma_phong)) {
            header('Location: /kiemtrasang5/Phongban/list');
        } else {
            echo "Lỗi khi xóa phòng ban.";
        }
    }
}
?>

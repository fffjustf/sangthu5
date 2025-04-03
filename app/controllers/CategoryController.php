<?php
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Hiển thị danh sách danh mục
    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm danh mục
    public function add()
    {
        include 'app/views/category/add.php';
    }

    // Lưu danh mục vào database
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($name)) {
                $error = "Tên danh mục không được để trống!";
                include 'app/views/category/add.php';
                return;
            }

            if ($this->categoryModel->addCategory($name, $description)) {
                header('Location: /webbanhang/Category/list');
            } else {
                echo "Lỗi khi thêm danh mục.";
            }
        }
    }

    // Hiển thị form sửa danh mục
    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);

        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Danh mục không tồn tại.";
        }
    }

    // Cập nhật danh mục
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            if (empty($name)) {
                echo "Tên danh mục không được để trống!";
                return;
            }

            if ($this->categoryModel->updateCategory($id, $name, $description)) {
                header('Location: /webbanhang/Category/list');
            } else {
                echo "Lỗi khi cập nhật danh mục.";
            }
        }
    }

    // Xóa danh mục
    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /webbanhang/Category/list');
        } else {
            echo "Lỗi khi xóa danh mục.";
        }
    }
    public function checkLogin($masv, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :masv";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':masv', $masv, PDO::PARAM_STR);
        $stmt->execute();
        $sinhvien = $stmt->fetch(PDO::FETCH_OBJ);
    
        if ($sinhvien && password_verify($password, $sinhvien->password)) {
            return $sinhvien; // Đăng nhập thành công
        }
        return false; // Đăng nhập thất bại
    }
    
}
?>

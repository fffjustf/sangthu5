<?php
class DefaultController {
    public function index() {
        // Chuyển hướng đến danh sách sản phẩm
        header("Location: /kiemtrasang5/Nhanvien");
        exit();
    }
}
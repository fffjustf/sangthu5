<?php include 'app/views/shares/header.php'; ?>

<h2>Thêm danh mục</h2>
<form method="POST" action="/webbanhang/Category/save">
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    <a href="/webbanhang/Category/list" class="btn btn-secondary">Quay lại</a>
</form>

<?php include 'app/views/shares/footer.php'; ?>

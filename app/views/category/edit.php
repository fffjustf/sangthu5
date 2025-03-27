<?php include 'app/views/shares/header.php'; ?>

<h2>Sửa danh mục</h2>
<form method="POST" action="/webbanhang/Category/update">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>">
    
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="/webbanhang/Category/list" class="btn btn-secondary">Quay lại</a>
</form>

<?php include 'app/views/shares/footer.php'; ?>

<h3>Thêm loại hàng</h3>
<form action="" method="POST">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Mã loại</label>
        <input type="text" class="form-control disabled" disabled id="formGroupExampleInput" placeholder="Auto number">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Tên loại</label>
        <input required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Tên loại">
    </div>
    <div class="col-12">
        <button type="submit" name="add-c" value="add-c" class="btn btn-primary">Thêm</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="layout.php?action=category" type="submit" class="btn btn-primary">Danh sách</a>
  </div>
</form>
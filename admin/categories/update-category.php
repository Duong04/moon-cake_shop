<?php 
    extract($list_new);
?>
<h3>Cập nhật loại hàng</h3>
<form action="layout.php?action=update-c" method="POST">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Mã loại</label>
        <input type="text" value="<?=$category_id?>" class="form-control disabled" disabled id="formGroupExampleInput" placeholder="Auto number">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Tên loại</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Tên loại" value="<?=$category_name?>">
    </div>
    <div class="col-12">
        <input type="hidden" name="id" value="<?=$category_id?>">
        <button type="submit" name="update-c" value="update" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="layout.php?action=category" type="submit" class="btn btn-primary">Danh sách</a>
  </div>
</form>
<?php
    extract($list_new);
    $id = $category_id;
?>
<h3>Cập nhật sản phẩm</h3>
<form action="layout.php?action=update-p" method="POST" enctype="multipart/form-data" id="form-p">
    <div class="form-child">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control disabled" disabled id="formGroupExampleInput" value="<?=$product_id?>" placeholder="Auto number">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Tên sản phẩm</label>
            <input value="<?=$product_name?>" required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Tên loại">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input value="<?=$price?>" required class="form-control" type="price" name="price" class="price" id="price" placeholder="Giá sản phẩm">
        </div>
        <div class="mb-3">
            <label for="sale" class="form-label">Phần trăm giảm giá</label>
            <input value="<?=$sale?>" class="form-control" type="sale" name="sale" class="sale" id="sale" placeholder="Phần trăm giảm giá tại đây">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload hình</label>
            <input name="hinh" class="form-control" type="file" id="formFile">
        </div>
        <div class="flex mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="special" value="0" checked>
                <label class="form-check-label" for="radio1">Bình thường</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="special" value="1">
                <label class="form-check-label" for="radio2">Đặc biệt</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="desciption" class="form-label">Mô tả sản phẩm</label>
            <textarea required name="desciption" class="desciption" id="textarea2" rows="5"><?=$description?></textarea>
        </div>
        <select name="category_id" class="form-select" aria-label="Default select example">
            <?php 
            $list_c = selectAll_category();
            foreach ($list_c as $list) {
                extract($list);
                if($id == $category_id){
            ?>
                <option value="<?=$category_id?>" selected><?=$category_name?></option>
                <?php }else{ ?>
                <option value="<?=$category_id?>"><?=$category_name?></option>
            <?php }} ?>
        </select>
    </div>
    <div class="col-12">
        <input type="hidden" name="id" value="<?=$product_id?>">
        <button type="submit" name="update-p" value="update-p" class="btn btn-primary">Cập nhật</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="layout.php?action=products" type="submit" class="btn btn-primary">Danh sách</a>
    </div>
</form>
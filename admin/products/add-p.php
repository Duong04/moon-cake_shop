<h3>Thêm mới sản phẩm</h3>
<form action="" method="POST" enctype="multipart/form-data" id="form-p">
    <div class="form-child">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control disabled" disabled id="formGroupExampleInput" placeholder="Auto number">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Tên sản phẩm</label>
            <input required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Tên loại">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input required class="form-control" type="price" name="price" class="price" id="price" placeholder="Giá sản phẩm">
        </div>
        <div class="mb-3">
            <label for="sale" class="form-label">Phần trăm giảm giá</label>
            <input class="form-control" type="sale" name="sale" class="sale" id="sale" placeholder="Phần trăm giảm giá tại đây">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload hình</label>
            <input required name="hinh" class="form-control" type="file" id="formFile">
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
            <textarea name="desciption" class="desciption" id="textarea" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label style="margin-bottom: 10px;" for="">Danh mục sản phẩm</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <?php 
                $list_c = selectAll_category();
                foreach ($list_c as $list) {
                    extract($list);
                ?>
                <option value="<?=$category_id?>"><?=$category_name?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" name="add-p" value="add-p" class="btn btn-primary">Thêm</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="layout.php?action=products" type="submit" class="btn btn-primary">Danh sách</a>
    </div>
</form>
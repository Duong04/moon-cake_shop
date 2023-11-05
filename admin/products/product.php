        <h3>Quản lý sản phẩm</h3>
        <form action="layout.php?action=products" class="form-grid" method="post">
          <div class="col-auto">
            <input type="text" name="key" class="form-control" id="autoSizingInput" placeholder="Tìm sản phẩm">
          </div>
          <div class="col-auto">
            <label class="visually-hidden" for="autoSizingSelect">Preference</label>
            <select name="category" class="form-select" id="autoSizingSelect">
              <option value="0" selected>Tất cả</option>
              <?php 
                  $list_c = selectAll_category();
                  foreach($list_c as $list){
                    extract($list);
              ?>
              <option value="<?=$category_id?>"><?=$category_name?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-auto">
            <button type="submit" name="ok" value="ok" class="btn btn-primary">Lọc</button>
          </div>
        </form>
        <table class="table table-bordered">
            <thead class="table-success">
              <tr>
                <th scope="col"></th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá gốc</th>
                <th scope="col">% giảm giá</th>
                <th scope="col">Giá mới</th>
                <th scope="col">Ảnh</th>
                <th style="width: 120px;" scope="col">Ngày thêm</th>
                <th scope="col">Loại hàng</th>
                <th scope="col">Lượt xem</th>
                <th scope="col">Người thêm</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($list_p as $list){
                  extract($list);
                  $price_new = $price - ($price * ($sale /100));
                  $formattedPrice = number_format($price, 0, ',', '.');
                  $formattedprice_new = number_format($price_new, 0, ',', '.');
              ?>
              <tr>
                <td style="width: 50px; text-align: center;"><input type="checkbox" name="" id=""></td>
                <th scope="row"><?=$product_id?></th>
                <td><?=$product_name?></td>
                <td><?=$formattedPrice.'đ'?></td>
                <td><?=$sale.'%'?></td>
                <td><?=$formattedprice_new.'đ'?></td>
                <td class="img"><img src="../uploads/<?=$product_image?>" alt=""></td>
                <td><?=$create_date?></td>
                <td><?=$category_name?></td>
                <td><?=$view?></td>
                <td><?=$fullname?></td>
                <td>
                  <a href="layout.php?action=update-product&id=<?=$product_id?>" class="btn btn-success" href="">Sửa</a>
                  <a href="layout.php?action=delete-p&id=<?=$product_id?>" class="btn btn-danger" href="">Xóa</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class="container mt-3">
          <a href="" class="btn btn-outline-success">Chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Bỏ chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Xóa các mục đã chọn</a>
          <a href="layout.php?action=add-product" class="btn btn-outline-success">Thêm mới</a>
        </div>

        <h3>Quản lý loại hàng</h3>
        <table class="table table-bordered">
            <thead class="table-success">
              <tr>
                <th scope="col"></th>
                <th scope="col">Mã loại</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Tên người thêm</th>
                <th scope="col">Số lượng sản phẩm</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($list_c as $list){
                  extract($list);
              ?>
              <tr>
                <td style="width: 50px; text-align: center;"><input type="checkbox" name="" id=""></td>
                <th scope="row"><?=$category_id?></th>
                <td><?=$category_name?></td>
                <td><?=$fullname?></td>
                <td><?=count_product_of_category($category_id);?></td>
                <td>
                  <a href="layout.php?action=update-category&id=<?=$category_id?>" class="btn btn-success" href="">Sửa</a>
                  <a href="layout.php?action=delete-c&id=<?=$category_id?>" class="btn btn-danger" href="">Xóa</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class="container mt-3">
          <a href="" class="btn btn-outline-success">Chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Bỏ chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Xóa các mục đã chọn</a>
          <a href="layout.php?action=add-category" class="btn btn-outline-success">Thêm mới</a>
        </div>

        
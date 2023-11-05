<h3>Thống kê sản phẩm</h3>
        <table class="table table-bordered">
            <thead class="table-success">
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Loại hàng</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá cao nhất</th>
                <th scope="col">Giá thấp nhất</th>
                <th scope="col">Giá trung bình</th>
                <th scope="col">Lượt xem</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($list as $list_tk){
                  extract($list_tk);
              ?>
              <tr>
                <th scope="row"><?=$id_c?></th>
                <td><?=$name_c?></td>
                <td><?=$countP?></td>
                <td><?=$maxP?></td>
                <td><?=$minP?></td>
                <td><?=$avgP?></td>
                <td><?=$total_views?></td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class="container mt-3">
            <a href="layout.php?action=chart" class="btn btn-outline-success">Biểu đồ</a>
        </div>

        
<h3>Quản lý bình luận</h3>
        <table class="table table-bordered">
            <thead class="table-success">
              <tr>
                <th scope="col"></th>
                <th scope="col">Mã bình luận</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Người bình luận</th>
                <th scope="col">Ngày bình luận</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($list as $list_c){
                    extract($list_c);
                ?>
              <tr>
                <td></td>
                <td><?=$comment_id?></td>
                <td><?=$content?></td>
                <td><?=$fullname?></td>
                <td><?=$comment_date?></td>
                <td><?=$product_name?></td>
                <td><a href="layout.php?action=delete-comment&id=<?=$comment_id?>" class="btn btn-danger" href="">Xóa</a></td>
              </tr>
              <?php } ?>
            </tbody>
        </table>

        
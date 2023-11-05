<h3>Quản lý khách hàng</h3>
        <table class="table table-bordered">
            <thead class="table-success">
              <tr>
                <th scope="col"></th>
                <th scope="col">Mã user</th>
                <th scope="col">Email</th>
                <th scope="col">Tên user</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Hình</th>
                <?php if($_SESSION['role'] == 'Admin'){ ?>
                <th scope="col">Phân quyền</th>
                <?php } ?>
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
                <th scope="row"><?=$user_id?></th>
                <td scope="row"><?=$email?></td>
                <td><?=$fullname?></td>
                <td><?=$status?></td>
                <td><?=$role?></td>
                <td class="img"><img src="../uploads/<?=$user_image?>" alt=""></td>
                <?php 
                if($_SESSION['role'] == 'Admin'){
                if($role !== 'Admin'){
                ?>
                <td>
                  <a href="layout.php?action=update-role&id=<?=$user_id?>" class="btn btn-info" href="" style='color: #fff;'>user</a>
                  <a href="layout.php?action=update-role2&id=<?=$user_id?>" class="btn btn-warning" href="" style='color: #fff;'>staff</a>
                </td>
                <?php }else{ ?>
                <td></td>
                <?php } } ?>
                <td>
                  <?php if($role !== 'Admin'){ ?>
                  <a href="layout.php?action=update-status&id=<?=$user_id?>" class="btn btn-success" href="">Kích hoạt</a>
                  <a href="layout.php?action=update-status2&id=<?=$user_id?>" class="btn btn-danger" href="">Vô hiệu hóa</a>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class="container mt-3">
          <a href="" class="btn btn-outline-success">Chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Bỏ chọn tất cả</a>
          <a href="" class="btn btn-outline-success">Xóa các mục đã chọn</a>
          <a href="layout.php?action=add-user" class="btn btn-outline-success">Thêm mới</a>
        </div>

        
<h3>Thêm tài khoản</h3>
<form class="row g-3" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" required>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Họ và tên</label>
        <input name="fullname" type="text" class="form-control" id="inputPassword4" required>
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Mật khẩu</label>
        <input name="psw" type="password" class="form-control" id="inputPassword4" required>
    </div>
    <div class="col-md-6">
        <label for="formFile" class="form-label">Upload hình</label>
        <input required name="hinh" class="form-control" type="file" id="formFile">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nhập lại mật khẩu</label>
        <input name="confirm-psw" type="password" class="form-control" id="inputPassword4" required>
        <span style="color: red;"><?php if(isset($error)) echo $error; ?></span>
    </div>
    <div class="col-12">
        <button type="submit" name="add-u" value="add-u" class="btn btn-primary">Thêm</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="layout.php?action=user" type="submit" class="btn btn-primary">Danh sách</a>
    </div>
</form>

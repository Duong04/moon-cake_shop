<?php 
require ('../global.php');
require ('../dao/dao_user.php');
require ('../dao/pdo.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

select_by_id_user($id);
extract(select_by_id_user($id));

if(isset($_POST['fullname']) && isset($_POST['psw']) && isset($_POST['email']) && isset($_POST['old-psw']) && isset($_FILES['up-images'])) {
    $name = $_POST['fullname'];
    $psw = $_POST['psw'];
    $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $oldPsw = $_POST['old-psw'];
    $image = $_FILES['up-images']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["up-images"]["name"]);
    if (empty($name)) {
        $errorName = "Họ và tên không được bỏ trống";
    }else if (empty($email)) {
        $errorEmail = "Email không được bỏ trống.";
    }else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
        $errorEmail = "Vui lòng nhập email có đuôi @";
    }else if (empty($psw)) {
        $errorConfirm = "Mật khẩu không được bỏ trống";
    }else if (strlen($psw) < 6) {
        $errorConfirm = "Kí tự phải hơn 6";
    }else if (empty($oldPsw)) {
        $errorPsw = "Xác nhận mật khẩu không được bỏ trống";
    }else if (!password_verify($oldPsw, $password)) {
        $errorPsw = "Mật khẩu không chính xác";
    }else {
        move_uploaded_file($_FILES["up-images"]["tmp_name"], $target_file);
        $result = update_user($name, $hashedPsw, $email, $image, $id);
        if (!$result) {
            header('Location: home.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Inclusive+Sans&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/signup.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
</head>
<body>
    <div class="main">
        <!-- header -->
        <?php 
            include('header.php');
        ?>
        <!-- banner -->
        <div class="banner">
            <div class="banner-content">
                <h1>Cập nhật tài khoản</h1>
                <div class="link"><a href="./home.php">Trang chủ</a> <span>/ Đăng ký</span></div>
            </div>
        </div>
        <!-- article -->
        <article>
            <div class="form">
                <h3>Cập nhật</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="full-name">
                        <label for="fullname"><span>*</span> Họ và tên</label>
                        <input value="<?=$fullname?>" type="text" id="fullname" name="fullname" placeholder="Họ và tên">
                        <span class="error"><?php if(isset($errorName)){ echo $errorName; } ?></span>
                    </div>
                    <div class="psw">
                        <label for="psw"><span>*</span> Mật khẩu cũ</label>
                        <input id="psw" type="password" name="old-psw" placeholder="Mật khẩu">
                        <span class="error"><?php if(isset($errorPsw)){ echo $errorPsw; } ?></span>
                    </div>
                    <div class="email">
                        <label for="email"><span>*</span> Email</label>
                        <input value="<?=$email?>" id="email" type="email" name="email" placeholder="email">
                        <span class="error"><?php if(isset($errorEmail)){ echo $errorEmail; } ?></span>
                    </div>
                    <div class="confirm-psw">
                        <label for="confirm-psw"><span>*</span> Mật khẩu mới</label>
                        <input id="confirm-psw" type="password" name="psw" placeholder="Nhập lại mật khẩu">
                        <span class="error"><?php if(isset($errorConfirm)){ echo $errorConfirm; } ?></span>
                    </div>
                    <div class="up-img">
                        <label for="up-images"><span>*</span> Tải ảnh lên</label>
                        <input type="file" id="up-images" name="up-images">
                        <span class="error"><?php if(isset($errorImages)){ echo $errorImages; } ?></span>
                    </div>
                    <div class="btn-signup">
                        <button>Cập nhật</button>
                    </div>
                </form>
            </div>
        </article>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
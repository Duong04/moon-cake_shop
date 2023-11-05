<?php
    require('../global.php');
    require('../dao/dao_user.php');
    require('../dao/pdo.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $psw = trim($_POST['psw']);
            if(empty($email) && empty($psw)) {
                $errorPsw = 'Vui lòng nhập đủ các trường';
            }else {
                $query = select_by_email_user($email);
                if ($query !== false) {
                    extract($query);
                    if ($status === 'Chưa kích hoạt') {
                        $errorEmail = 'Tài khoản chưa được kích hoạt';
                    }else if ($status === 'Vô hiệu hóa') {
                        $errorEmail = 'Tài khoản đã bị vô hiệu hóa';
                    }else{
                        if (password_verify($psw, $password)) {
                            $_SESSION['fullname'] = $fullname;
                            $_SESSION['role'] = $role;
                            $_SESSION['user_id'] = $user_id;
                            header('Location: home.php');
                            exit; 
                        } else {
                            $errorPsw = 'Mật khẩu không đúng';
                        }
                    }
                } else {
                    $errorEmail = 'Tài khoản không tồn tại';
                }
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
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/login.css">
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
                <h1>Đăng nhập</h1>
                <div class="link"><a href="./home.php">Trang chủ</a> <span>/ Đăng nhập</span></div>
            </div>
        </div>
        <!-- article -->
        <article>
            <div class="login-images">
                <img src="../assets/img/banner/slider-2.png" alt="">
            </div>
            <div class="form">
                <h3>Đăng nhập</h3>
                <form action="" method="post">
                    <div class="email">
                        <input type="email" name="email" placeholder="email của bạn">
                        <span class="error"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                    </div>
                    <div class="psw">
                        <div class="input-psw">
                            <div class="eye"><i class="fa-solid fa-eye-slash"></i></div>
                            <input id="psw" type="password" name="psw" placeholder="Mật khẩu của bạn">
                        </div>
                        <span class="error"><?php if(isset($errorPsw)) echo $errorPsw; ?></span>
                    </div>
                    <div class="link-forgotPsw"><a href="./forgotPsw.php">Bạn quên mật khẩu?</a></div>
                    <div class="btn-login"><button name="submit">Đăng nhập</button></div>
                    <div class="or">
                        <span></span>
                        <span>Hoặc</span>
                        <span></span>
                    </div>
                    <div class="login-other">
                        <div class="login-fb">
                            <img src="../assets/img/logo/fb.png" alt="">
                            <span>Đăng nhập bằng facebook</span>
                        </div>
                        <div class="login-gg">
                            <img src="../assets/img/logo/gg.png" alt="">
                            <span>Đăng nhập bằng facebook</span>
                        </div>
                    </div>
                    <div class="link-signup">Bạn chưa có tài khoản? <a href="./signup.php">Đăng ký</a></div>
                </form>
            </div>
        </article>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
    <script src="../assets/js/login.js"></script>
</body>
</html>
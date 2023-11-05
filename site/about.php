<?php 
require ('../global.php');
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
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/about.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
</head>
<body>
    <div class="main">
        <?php 
        include "./header.php";
        ?>
        <div class="banner">
            <div class="banner-content">
                <h1>Giới thiệu</h1>
                <div class="link"><a href="./home.php">Trang chủ</a> <span>/ Giới thiệu</span></div>
            </div>
        </div>
        <section>
            <div class="video">
                <img src="../assets/img/about/get-image-v3.jpg" alt="">
            </div>
            <div class="conten1">
                <div class="conten1-0">
                    <h2>Về chúng tôi</h2>
                    <p>Chúng tôi xin chân thành cảm ơn sự quan tâm của quý khách hàng trong suốt thời <br>
                    gian qua đã ủng hộ tin tưởng sản phẩm của chúng tôi! <br> <br>
                    Trung Thu năm nay, ấn tượng nhất về sự đầu tư, sáng tạo của Kinh Đô là dòng sản <br>
                    phẩm thượng hạng Trăng Vàng. Với ý nghĩa châu báu của đời người là tình thân và <br>
                    các mối giao hảo, Kinh Đô ra mắt bộ sưu tập Trăng Vàng với các bộ sản phẩm <br>
                    hoàn toàn mới: Trăng Vàng Kim Cương, Trăng Vàng Bạch Kim, Trăng Vàng Hoàng <br>
                    Kim, Trăng Vàng Hồng Ngọc cùng các hương vị bánh mới với thành phần nguyên <br>
                    liệu thượng hạng như: Sò điệp Nhật xốt X.O, Cua Huỳnh Đế, Tôm Càng Bách Hoa,<br>
                    Gà quay Tứ Quý.</p>
                </div>
            </div>
            <div class="conten2">
                <div class="conten2-0">
                    <div class="logo-img-1 boder">
                        <img src="../assets/img/about/logo-mordanhoian.png" alt="">
                    </div>
                    <div class="logo-img-1">
                        <img src="../assets/img/about/maison.png" alt="">
                    </div>
                    <div class="logo-img-1">
                        <img src="../assets/img/about/hy-lam-mon.jpg" alt="">
                    </div>
                    <div class="logo-img-1">
                        <img src="../assets/img/about/dk.png" alt="">
                    </div>
                    <div class="logo-img-1 boder-1">
                        <img src="../assets/img/about/kinh-do.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="conten3">
                <h2>Đội ngủ nhân viên</h2>
                <p>Không quá cầu kì, bánh trung thu mang nét mộc mạc, đặc trưng làm say lòng không biết bao thế hệ <br>người thưởng thức</p>
            </div>
            <div class="conten4">
                <div class="conten4-0">
                    <div class="conten4-1">
                        <img src="../assets/img/about/db111.jpg" alt="">
                        <div class="overlay"></div>
                    </div>
                    <div class="conten4-1">
                        <img src="../assets/img/about/db100.jpg" alt="">
                    </div>
                    <div class="conten4-1">
                        <img src="../assets/img/about/db122.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <?php 
        include "./footer.php";
        ?>
    </div>
</body>
</html>
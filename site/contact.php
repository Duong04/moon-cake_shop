<?php 
require ('../global.php');
require ('../dao/dao_product.php');
require ('../dao/pdo.php');
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
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/contact.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
</head>
<body>
    <div class="main">
        <?php 
        require 'header.php';
        ?>
        <!-- Banner -->
        <div class="banner">
            <div class="banner-content">
                <h1>Liên hệ</h1>
                <div class="link"><a href="./home.php">Trang chủ</a> <span>/ Liên hệ</span></div>
            </div>
        </div>
        <div class="container">
            <aside>
                <h2>Thông tin liên hệ</h2>
                <p class="noidung">
                    Trân trọng ý nghĩa Tết Trung Thu, chúng tôi luôn không
                    ngừng sáng tạo, đầu tư để mỗi năm đều giới thiệu và phục 
                    vụ thị trường những dòng sản phẩm mới với chất lượng và 
                    mẫu mã tốt nhất, góp phần tạo nên lễ hội Trung Thu đậm đà 
                    bản sắc Việt Nam.
                </p>
                <div class="noidung-1">
                    <a href=""><i class="fa-solid fa-location-dot"></i> &nbsp; 344 Huỳnh Tấn Phát, Phường Bình Thuận, Quận 7, TP.HCM</a>
                    <a href=""><i class="fa-solid fa-mobile"></i> &nbsp;   1900 9477</a>
                    <a href=""><i class="fa-solid fa-envelope"></i> &nbsp;  admin@demo037172.web30s.vn</a>
    
                </div>
            </aside>
            <article>
                <form action="">
                    
                        <input class="input" type="text" placeholder="Họ và tên" required><br>
                        <input class="input" type="email"  placeholder="Email" required><br>
                        <input class="input" type="text"  placeholder="Số điện thoại" required><br>
                        <textarea class="input" type="text"  placeholder="Nội dung"></textarea><br>
                        <button class="button">Gửi liên hệ</button>
                   
                </form>
            </article>
            
        </div>
            <div class="map">
                <iframe class="map-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8979505619413!2d108.15153727468422!3d16.07078453939719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218d7f04cbdf7%3A0x857184c4b5f176fa!2zNTcgxJAuIE5nw7QgVGjDrCBOaOG6rW0sIEhvw6AgS2jDoW5oIE5hbSwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1696662787032!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        <?php 
        require 'footer.php';
        ?>
    </div>
</body>
</html>
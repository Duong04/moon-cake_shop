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
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Inclusive+Sans&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/home.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
</head>
<body>
    <div class="main">
        <!-- header -->
        <?php  
            include("header.php");
        ?>
        <!-- Banner -->
        <div class="banner">
            <div class="banner-content">
                <div class="banner-text">
                    <h3>Giảm giá 50%</h3>
                    <p>Tất cả các loại bánh trung thu mới</p>
                    <div class="btn-link">
                        <a href=""><span>SẢN PHẨM</span></a>
                    </div>
                </div>
                <div class="banner-img">
                    <div class="mySlides">
                        <a href=""><img src="../assets/img/banner/slider-1.png" alt=""></a>
                    </div>
                    <div class="mySlides">
                        <a href=""><img src="../assets/img/banner/slider-2.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="btn-cricle">
                <button onclick="currentDiv(1)" class="cricle"><i class="fa-solid fa-circle"></i></button>
                <button onclick="currentDiv(2)" class="cricle"><i class="fa-solid fa-circle"></i></button>
            </div>
        </div>
        <!-- section 1 -->
        <section class="section1">
            <div class="box-title">
                <a href="./categories.php?action=category_id=1">
                    <div class="box-title-image">
                        <img src="../assets/img/section1/trang-vang-hong-ngoc-an-phu-vang-2.png" alt="">
                    </div>
                    <h3>BÁNH TRĂNG VÀNG CAO CẤP</h3>
                </a>
            </div>
            <div class="box-title">
                <a href="./categories.php?action=category_id=2">
                    <div class="box-title-image2">
                        <img src="../assets/img/section1/2-trung-db.png" alt="">
                    </div>
                    <h3>BÁNH NƯỚNG 2 TRỨNG ĐB</h3>
                </a>
            </div>
            <div class="box-title">
                <a href="./categories.php?action=category_id=3">
                    <div class="box-title-image2">
                        <img src="../assets/img/section1/xanh.png" alt="">
                    </div>
                    <h3>BÁNH XANH</h3>
                </a>
            </div>
            <div class="box-title">
                <a href="./categories.php?action=category_id=5">
                    <div class="box-title-image">
                        <img src="../assets/img/section1/banh-trung-thu-oreo-4-banh-2.png" alt="">
                    </div>
                    <h3>BÁNH TRUNG THU OREO</h3>
                </a>
            </div>
        </section>
        <!-- section 2 -->
        <section class="section2">
            <div class="section-banner">
                <div class="section-banner-content">
                    <h4>Giảm giá 50%</h4>
                    <p>Bánh trung thu Young</p>
                    <div class="banner-link">
                        <a href="./categories.php?action=category_id=6"><span>SẢN PHẨM</span></a>
                    </div>
                </div>
            </div>
            <div class="section-banner2">
                <div class="section-banner-content">
                    <h4>Giảm giá 25%</h4>
                    <p>Bánh nướng 1 trứng</p>
                    <div class="banner-link">
                        <a href="./categories.php?action=category_id=4"><span>SẢN PHẨM</span></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section5">
            <h2>Top 10 sản phẩm được yêu thích</h2>
            <div class="slide-product">
                <?php 
                    $value = 1;
                    $list = select_top10_product();
                    foreach ($list as $list_p) {
                        extract($list_p);
                        $price_new = $price - ($price * ($sale /100));
                        $formattedPrice = number_format($price, 0, ',', '.');
                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                ?>
                <div class="slide-product-item">
                    <a href="product-detail.php?product_id=<?=$product_id?>">
                        <div class="product-img">
                            <img src="../uploads/<?=$product_image?>" alt="">
                        </div>
                        <h3><?=$product_name?></h3>
                        <div class="product-price">
                            <?php if($sale > 0){ ?>
                            <span class="new-price"><?=$formattedprice_new?> <sup>đ</sup></span>
                            <del class="old-price"><?=$formattedPrice?> <sup>đ</sup></del>
                            <?php }else { ?>
                            <span class="new-price"><?=$formattedPrice?> <sup>đ</sup></span>
                            <?php } ?>
                        </div>
                    </a>
                    <form action="cart.php" method="post" class="tab-link2">
                        <input type="hidden" name="product_id" value="<?=$product_id?>">
                        <a href="product-detail.php?product_id=<?=$product_id?>"><i class="fa-solid fa-eye"></i></a>
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                        <a href=""><i class="fa-regular fa-heart"></i></a>
                    </form>
                </div>
                <?php } ?>
            </div>
        <!-- section 3 -->
        <section class="section3">
            <h2>SẢN PHẨM CHÍNH</h2>
            <div class="tab">
                <div class="tab-item active">
                    Bánh trăng vàng cao cấp
                </div>
                <div class="tab-item">
                    Bánh nướng 2 trứng đb
                </div>
                <div class="tab-item">
                    Bánh xanh
                </div>
                <div class="tab-line"></div>
            </div>
            <!-- tab conntent -->
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="tab-pane-child">
                        <?php 
                        $id = 1;
                        $list = select_id_category_of_p($id);
                        foreach ($list as $list_p) {
                            extract($list_p);
                            $price_new = $price - ($price * ($sale /100));
                            $formattedPrice = number_format($price, 0, ',', '.');
                            $formattedprice_new = number_format($price_new, 0, ',', '.');
                        ?>
                        <div class="tab-pane-item">
                            <a href="product-detail.php?product_id=<?=$product_id?>">
                                <div class="tab-img">
                                    <img src="../uploads/<?=$product_image?>" alt="">
                                </div>
                                <h3><?=$product_name?></h3>
                                <div class="product-price">
                                    <?php if($sale > 0){ ?>
                                    <span class="new-price"><?=$formattedprice_new?> <sup>đ</sup></span>
                                    <del class="old-price"><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else { ?>
                                    <span class="new-price"><?=$formattedPrice?> <sup>đ</sup></span>
                                    <?php } ?>
                                </div>
                            </a>
                            <form action="cart.php" method="post" class="tab-pane-link">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <a href="product-detail.php?product_id=<?=$product_id?>"><i class="fa-solid fa-eye"></i></a>
                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                <a href=""><i class="fa-regular fa-heart"></i></a>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- -------------------------- -->
                <div class="tab-pane">
                    <div class="tab-pane-child">
                        <?php 
                        $id = 2;
                        $list = select_id_category_of_p($id);
                        foreach ($list as $list_p) {
                            extract($list_p);
                            $price_new = $price - ($price * ($sale /100));
                            $formattedPrice = number_format($price, 0, ',', '.');
                            $formattedprice_new = number_format($price_new, 0, ',', '.');
                        ?>
                        <div class="tab-pane-item">
                            <a href="product-detail.php?product_id=<?=$product_id?>">
                                <div class="tab-img">
                                    <img src="../uploads/<?=$product_image?>" alt="">
                                </div>
                                <h3><?=$product_name?></h3>
                                <div class="product-price">
                                    <?php if($sale > 0){ ?>
                                    <span class="new-price"><?=$formattedprice_new?> <sup>đ</sup></span>
                                    <del class="old-price"><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else { ?>
                                    <span class="new-price"><?=$formattedPrice?> <sup>đ</sup></span>
                                    <?php } ?>
                                </div>
                            </a>
                            <form action="cart.php" method="post" class="tab-pane-link">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <a href="product-detail.php?product_id=<?=$product_id?>"><i class="fa-solid fa-eye"></i></a>
                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                <a href=""><i class="fa-regular fa-heart"></i></a>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- ------------------------- -->
                <div class="tab-pane">
                <div class="tab-pane-child">
                        <?php 
                        $id = 3;
                        $list = select_id_category_of_p($id);
                        foreach ($list as $list_p) {
                            extract($list_p);
                            $price_new = $price - ($price * ($sale /100));
                            $formattedPrice = number_format($price, 0, ',', '.');
                            $formattedprice_new = number_format($price_new, 0, ',', '.');
                        ?>
                        <div class="tab-pane-item">
                            <a href="product-detail.php?product_id=<?=$product_id?>">
                                <div class="tab-img">
                                    <img src="../uploads/<?=$product_image?>" alt="">
                                </div>
                                <h3><?=$product_name?></h3>
                                <div class="product-price">
                                    <?php if($sale > 0){ ?>
                                    <span class="new-price"><?=$formattedprice_new?> <sup>đ</sup></span>
                                    <del class="old-price"><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else { ?>
                                    <span class="new-price"><?=$formattedPrice?> <sup>đ</sup></span>
                                    <?php } ?>
                                </div>
                            </a>
                            <form action="cart.php" method="post" class="tab-pane-link">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <a href="product-detail.php?product_id=<?=$product_id?>"><i class="fa-solid fa-eye"></i></a>
                                <button><i class="fa-solid fa-cart-shopping"></i></button>
                                <a href=""><i class="fa-regular fa-heart"></i></a>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- section 4 -->
        <section class="section4">
            <div class="section4-content">
                <h3>GIẢM GIÁ 50%</h3>
                <h2>Tất cả các loại bánh của chúng tôi</h2>
                <p>Đến với chúng tôi, bạn không chỉ có được những loại bánh ngon hạng nhất, mà được nhiều ưu đãi nhất!</p>
                <div class="banner-link2">
                    <a href=""><span>SẢN PHẨM</span></a>
                </div>
            </div>
        </section>
        <!-- section 5 -->
        <section class="section5">
            <h2>Sản phẩm khuyến mãi</h2>
            <div class="description-title">Không quá cầu kì, bánh trung thu mang nét mộc mạc, đặc trưng làm say lòng không biết bao thế hệ người thưởng thức.</div>
            <div class="slide-product">
                <?php 
                    $value = 1;
                    $list = select_special_product($value);
                    foreach ($list as $list_p) {
                        extract($list_p);
                        $price_new = $price - ($price * ($sale /100));
                        $formattedPrice = number_format($price, 0, ',', '.');
                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                ?>
                <div class="slide-product-item">
                    <a href="product-detail.php?product_id=<?=$product_id?>">
                        <div class="product-img">
                            <img src="../uploads/<?=$product_image?>" alt="">
                        </div>
                        <h3><?=$product_name?></h3>
                        <div class="product-price">
                            <?php if($sale > 0){ ?>
                            <span class="new-price"><?=$formattedprice_new?> <sup>đ</sup></span>
                            <del class="old-price"><?=$formattedPrice?> <sup>đ</sup></del>
                            <?php }else { ?>
                            <span class="new-price"><?=$formattedPrice?> <sup>đ</sup></span>
                            <?php } ?>
                        </div>
                    </a>
                    <form action="cart.php" method="post" class="tab-link2">
                        <input type="hidden" name="product_id" value="<?=$product_id?>">
                        <a href="product-detail.php?product_id=<?=$product_id?>"><i class="fa-solid fa-eye"></i></a>
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                        <a href=""><i class="fa-regular fa-heart"></i></a>
                    </form>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- section6 -->
        <section class="section6">
            <div class="slide-trademark">
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/logo-mordanhoian.png" alt="">
                </div>
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/maison.png" alt="">
                </div>
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/hy-lam-mon.jpg" alt="">
                </div>
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/dk.png" alt="">
                </div>
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/kinh-do.jpg" alt="">
                </div>
                <div class="slide-trademark-item">
                    <img src="../assets/img/trademark/hy-lam-mon.jpg" alt="">
                </div>
            </div>
        </section>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="<?=$ASSETS_URL?>/js/jquery.js"></script>
    <script src="<?=$ASSETS_URL?>/js/home.js"></script>
</body>
</html>
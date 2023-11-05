<?php 
require ('../global.php');
require ('../dao/dao_product.php');
require ('../dao/dao_category.php');
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
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/categories.css">
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
                <h1>Sản phẩm</h1>
                <div class="link"><a href="./home.php">Trang chủ</a> <span>/ sản phẩm</span></div>
            </div>
        </div>
        <div class="container">
            <aside>
                <div class="categories1">
                    <h3>DANH MỤC SẢN PHẨM</h3>
                    <ul>
                        <?php
                        $list = selectAll_category();
                        foreach ($list as $listC){
                            extract($listC);
                            $link = "categories.php?action=category_id=$category_id";
                        ?>
                        <li><a href="<?=$link?>"><?=$category_name?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="categories-1">
                    <h3>SẢN PHẨM HOT</h3>
                    <?php 
                    $list_hot = select_hot_5_product();
                    foreach ($list_hot as $list_p) {
                        extract($list_p);
                        $price_new = $price - ($price * ($sale /100));
                        $formattedPrice = number_format($price, 0, ',', '.');
                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                    ?>
                    <div class="categories-2">
                        <a href="product-detail.php?product_id=<?=$product_id?>">
                            <div class="categories-2-1">
                                <img class="" src="../uploads/<?=$product_image?>" alt="">
                            </div>
                            <div class="categories-2-2">
                                <h4><?=$product_name?></h4>
                                <p>
                                    <?php 
                                    if($sale > 0){
                                    ?>
                                    <span><?=$formattedprice_new?> <sup>đ</sup></span><del><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else { ?>
                                    <span><?=$formattedPrice?> <sup>đ</sup></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </a>
                        <hr>
                    </div>
                    <?php } ?>
                </div>
                <div class="sale">
                    <a href="">
                        <img class="sale-img" src="../assets/img/product-sidaber-banner.png" alt="">
                    </a>
                </div>
            </aside>
            <?php 
            if(isset($_GET['action'])) {
                $action = $_GET['action'];
                switch ($action) {
                    case 'category_id=1':
                        $id = 1;
                        $list = select_product_by_C($id);
                        include './categories/trang-vang-cao-cap.php';
                        break;
                    case 'category_id=2':
                        $id = 2;
                        $list = select_product_by_C($id);
                        include './categories/banh-nuong-2-trung.php';
                        break;
                    case 'category_id=3':
                        $id = 3;
                        $list = select_product_by_C($id);
                        include './categories/banh-xanh.php';
                        break;
                    case 'category_id=4':
                        $id = 4;
                        $list = select_product_by_C($id);
                        include './categories/banh-nuong-1-trung.php';
                        break;
                    case 'category_id=5':
                        $id = 5;
                        $list = select_product_by_C($id);
                        include './categories/banh-trung-thu-oreo.php';
                        break;
                    case 'category_id=6':
                        $id = 6;
                        $list = select_product_by_C($id);
                        include './categories/banh-trung-thu-khac.php';
                        break;
                    default:
                        include './categories/trang-vang-cao-cap.php';
                }
            }
            
            ?>
        </div>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
<?php
require('../global.php');
require('../dao/dao_product.php');
require('../dao/pdo.php');
if (isset($_GET['search'])) {
    $query = select_keyword_product($_GET['search']);
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
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/search.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
</head>
<body>
    <div class="main">
        <!-- header -->
        <?php 
            include('header.php');
        ?>
        <!-- article -->
        <article>
            <h2>Kết quả tìm kiếm: <?=$_GET['search']?></h2>
            <?php 
            if($query !== null) {?>
            <div class="tab-pane-child">
            <?php 
            foreach ($query as $list) {
                extract($list);
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
            <?php }else { ?>
                <p>Không tìm thấy kết quả phù hợp!</p>
            <?php } ?>
        </article>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
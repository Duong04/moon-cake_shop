<?php
    require('../global.php');
    require('../dao/dao_product.php');
    require('../dao/pdo.php');

    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $query = select_by_id_product($product_id);
        $product = $query; // Lấy thông tin sản phẩm từ truy vấn
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    
        $product_exists = false;
    
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                $_SESSION['cart'][$key]['count']++; // Tăng số lượng nếu sản phẩm đã tồn tại
                $product_exists = true;
                break;
            }
        }
    
        if (!$product_exists) {
            $cart_item = array(
                'product_image' => $product['product_image'],
                'product_id' => $product['product_id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                'sale' => $product['sale'],
                'count' => 1, 
            );
    
            $_SESSION['cart'][] = $cart_item; // Thêm sản phẩm mới nếu chưa tồn tại
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/cart.css">
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
            <div class="content">
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                ?>
                <div class="cart-far">
                    <div class="cart-product">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="table-light">
                                    <th style="width: 150px;" scope="col">Sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalPrice = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $cart_item) {  
                                        $sale = $cart_item['sale'];
                                        $price = $cart_item['price'];
                                        $price_new = $price - ($price * ($sale / 100));
                                        $count = isset($cart_item['count']) ? $cart_item['count'] : 1;
                                        $price_2 = $sale > 0 ? $price_new : $price;
                                        $price_3 = $count * $price_2;
                                        $totalPrice += $price_3;
                                        $formattedPrice = number_format($price, 0, ',', '.');
                                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                                        
                                ?>
                                <tr>
                                    <td><img src="../uploads/<?=$cart_item['product_image']?>" alt=""></td>
                                    <td><?=$cart_item['product_name']?></td>
                                    <td><?php $formattedPriceNew = $sale > 0 ? $formattedprice_new : $formattedPrice; echo $formattedPriceNew; ?></td>
                                    <th scope="row"><?=$count?></th>
                                    <th scope="row"><h5><?=number_format($price_3, 0, ',', '.')?></h5></th>
                                    <td><a style="color: #f7a825;" href="removeCart.php?product_id=<?=$cart_item['product_id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pay-product">
                    <div class="price-pay">
                            <span>Tổng tiền</span>
                            <p><span id="total-price"><?php 
                               echo number_format($totalPrice, 0, ',', '.');;
                            ?></span><sup>đ</sup></p>
                        </div>
                        <div class="btn-pay">
                            <a href="./pay.php">Thanh toán</a>
                        </div>
                    </div>
                </div>
                <?php }else { ?>
                <div class="cart-empty">
                    <div class="icon-cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <p>Không có sản phẩm nào trong giỏ hàng</p>
                    <div class="return-home">
                        <a href="home.php">Quay về trang chủ</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- footer -->
        <?php 
            include('footer.php');
        ?>
    </div>
</body>
</html>
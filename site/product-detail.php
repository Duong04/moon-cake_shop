<?php 
require ('../global.php');
require ('../dao/dao_product.php');
require ('../dao/dao_comment.php');
require ('../dao/pdo.php');

if(isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
}
view_product($id);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/product-detail.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        <section>
            <div class="body">
                <div class="container-body-1">
                    <?php 
                        $result = select_by_id_product($id);
                        extract($result);
                        $price_new = $price - ($price * ($sale /100));
                        $formattedPrice = number_format($price, 0, ',', '.');
                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                    ?>
                    <div class="container-body-01">
                        <div class="img-sp">
                        <div class="slideshow-container">
                            <img src="../uploads/<?=$product_image?>" alt="">
                        </div>
                        </div>
                        <div class="container-ctsp">
                            <div class="container-ctsp-1">
                                <h2><?=$product_name?></h2>
                                <div class="price">
                                    <?php if($sale > 0){ ?>
                                    <h3><?=$formattedprice_new?> <sup>đ</sup></h3>
                                    <del><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else { ?>
                                    <h3><?=$formattedPrice?> <sup>đ</sup></h3>
                                    <?php } ?>
                                </div>
                                <hr>
                                <h4><strong>Thương hiệu: </strong> Kinh đô</h4>
                                <h4><strong>Mã sản phẩm: </strong> 0000<?=$product_id?></h4>
                                <p>Quý giá và đầy quyền năng như viên Pha Lê, mối giao hảo bền lâu chính là <br>
                                nguồn mạnh vô giá và thắm đỏ ân tình mà chỉ người thân quý mới nhận ra <br>
                                nhau, kề vai sát cánh cùng nhau.
                                </p>
                                <div class="gio-hang">
                                    <div class="quantity">
                                        <button class="decrease">-</button>
                                        <input type="text" class="count" value="1">
                                        <button class="increase">+</button>
                                    </div>
                                    <form action="cart.php" method="post" class="add-to-cart">
                                    <input type="hidden" name="product_id" value="<?=$product_id?>">
                                        <button>Thêm vào giỏ hàng</button>
                                    </form>
                                    <div class="hai-icon"><i class="fa-regular fa-circle-check"></i></div>
                                    <div class="hai-icon"><i class="fa-regular fa-heart"></i></div>
                                </div>
                                <div class="tags">
                                    <div class="tags-1">
                                        <h2>Tags : </h2><button> Bánh</button> <button>Trung thu</button> <button> Bánh trung thu</button> <button>Bánh trung thu trăng vàng</button>
                                    </div>
                                    <div class="tags-2">
                                        <img src="../assets/img/Ảnh chụp màn hình 2023-10-04 143425.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Mo-ta-san-pham">
                <button class="btn button-1 active">MÔ TẢ SẢN PHẨM</button>
                <button class="btn button-2">BÌNH LUẬN</button>
            </div>
            <div class="tab-item">
                <div class="tab Noi-dung-san-pham">
                    <?=$description?>
                </div>
                <div id="comment" class="tab comment">
                <?php 
                $count = exist_comment($product_id);
                ?>
                <p><?php $input = $count > 0 ? $count : 0; echo $input; ?> bình luận</p>
                    <div class="content-comment">
                        <div class="form">
                            <img src="../assets/img/143086968_2856368904622192_1959732218791162458_n.png" alt="">
                            <?php 
                            if (isset($_POST['content'])){
                                insert_comment($_POST['content'], $_SESSION['user_id'], $product_id);
                            }
                            ?>
                            <form action="" method="post">
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <div class="mb-3 mt-3">
                                    <input required type="text" class="form-control" id="email" placeholder="Nhập bình luận tại đây..." name="content">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php } else{ ?>
                                <div class="mb-3 mt-3">
                                    <input disabled type="text" class="form-control" id="email" placeholder="Vui lòng đăng nhập để bình luận!" name="content">
                                </div>
                                <?php } ?>
                            </form>
                        </div>
                        <?php 
                        $query = selectAll_comment2($product_id);
                        foreach ($query as $list){
                            extract($list);
                        ?>
                        <div class="content-user">
                            <img src="../assets/img/143086968_2856368904622192_1959732218791162458_n.png" alt="">
                            <div class="text">
                                <h6><?=$fullname?></h6>
                                <p><?=$content?></p>
                                <div class="delete">
                                    <span>Thích</span>
                                    <?php 
                                    if(isset($_SESSION['user_id'])){
                                    if($_SESSION['user_id'] == $user_id){
                                    ?>
                                    <a href="deleteComment.php?comment_id=<?=$comment_id?>">Xóa</a>
                                    <?php }} ?>
                                    <span><?=$comment_date?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div> 
                </div>
            </div>
            <div class="San-pham-lien-quan">
                <h2>Sản phẩm liên quan</h2>
                    <p>Không quá cầu kì , bánh được thiết kế theo yêu cầu của khách hàng …Bánh Sinh Nhật Đẹp mang nét mộc mạc, <br>
                    đặc trưng làm say lòng không biết bao thế hệ người thưởng thức.</p>
                </div>
                <div class="siled">
                <div class="slide-san-pham">
                    <?php 
                        $list = select_product_by_C($category_id);
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
                                <?php } else { ?>
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
    <script src="../assets/js/ChiTietSanPham.js"></script>
</body>
</html
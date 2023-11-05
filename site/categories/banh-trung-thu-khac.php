            <article>
                <div class="product">
                    <?php 
                    foreach ($list as $list_p) {
                        extract($list_p);
                        $price_new = $price - ($price * ($sale /100));
                        $formattedPrice = number_format($price, 0, ',', '.');
                        $formattedprice_new = number_format($price_new, 0, ',', '.');
                    ?>
                    <div class="product-1">
                        <a href="product-detail.php?product_id=<?=$product_id?>">
                            <div class="product-1-1">
                                <img src="../uploads/<?=$product_image?>" alt="">
                            </div>
                            <div class="product-1-2">
                                <h4><?=$product_name?></h4>
                                <div class="price">
                                    <?php if ($sale > 0) { ?>
                                    <h3><?=$formattedprice_new?> <sup>đ</sup></h3>
                                    <del><?=$formattedPrice?> <sup>đ</sup></del>
                                    <?php }else {?>
                                    <h3><?=$formattedPrice?> <sup>đ</sup></h3>
                                    <?php } ?>
                                </div> 
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
            </article>
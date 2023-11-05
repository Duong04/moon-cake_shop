        <header>
            <section class="header-top">
                <div class="header-text">
                    <div class="header-text-left">HỖ TRỢ GIAO HÀNG MIỄN PHÍ TRONG VÒNG 2H</div>
                    <div class="header-text-right">
                        <div class="link-phone"><a href="tel:19009477">1900 9477</a></div>
                        <div class="line">|</div>
                        <div class="accout">
                            <?php 
                            if(isset($_SESSION['fullname'])){
                            ?>
                            <p><?=$_SESSION['fullname']?></p>
                            <?php }else { ?>
                                <p>Tài khoản</p>
                                <?php } ?>
                            <ul>
                                <?php 
                                if(isset($_SESSION['fullname'])){
                                ?>
                                <li><a href="updateAcc.php?id=<?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id'] ?>">Cập nhật tài khoản</a></li>
                                <?php
                                if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Nhân viên'){
                                ?>
                                <li><a href="../admin/layout.php?action=category">Admin</a></li>
                                <?php } ?>
                                <li><a href="./logout.php">Đăng xuất</a></li>
                                <?php }else { ?>
                                <li><a href="./login.php">Đăng nhập</a></li>
                                <li><a href="./signup.php">Đăng ký</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="line">|</div>
                        <div class="check-oder">Tra cứu đơn hàng</div>
                    </div>
                </div>
            </section>
            <nav>
                <div class="logo">
                    <a href="">
                        <img src="<?=$ASSETS_URL?>/img/logo/logo.png" alt="">
                    </a>
                </div>
                <menu>
                    <ul>
                        <li><a href="./home.php">Trang chủ</a></li>
                        <li><a href="./categories.php?action=category_id=1">Sản phẩm</a></li>
                        <li><a href="./about.php">Giới thiệu</a></li>
                        <li><a href="./contact.php">Liên hệ</a></li>
                        <li><a href="">Tin tức</a></li>
                    </ul>
                </menu>
                <div class="search-cart">
                    <div class="search">
                        <form action="./search.php" method="GET">
                            <input name="search" type="text" placeholder="Tìm kiếm tại đây...">
                            <button><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="cart">
                        <a href="cart.php">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <?php 
                        $countCart = 0;
                        if (isset($_SESSION['cart'])){
                            $countCart = count($_SESSION['cart']); 
                        }
                        ?>
                        <span class="cart-item"><?=$countCart?></span>
                    </div>
                </div>
            </nav>
        </header>
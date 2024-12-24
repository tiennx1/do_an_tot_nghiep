<head>

    <script src="https://kit.fontawesome.com/95e5404ede.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles_using/main.css">
    <link rel="stylesheet" href="styles_using/profile_setting.css">
    <link rel="website icon" type="png" href="images/logo2.png.jpeg">

    <style>
        input[type="search"]::-webkit-search-cancel-button {
            -webkit-appearance: none;
            appearance: none;
        }

        .dropdown-menu li a:hover {
            background-color: rgb(1, 34, 25);
            color: white
        }

        header {
            background-color: rgb(1, 34, 25);
        }
    </style>

</head>
<html>
<div class="layout">
    <div class="layout-body">
        <div class="diachi-phone-layout">
            <div class="diachi-phone">
                <div class="diachi">
                    <p><a href="#"><i class="fa-solid fa-location-dot" style="margin-right:5px;"></i>QL55, TT.Đất Đỏ, Đất Đỏ, Bà Rịa - Vũng Tàu </a></p>
                </div>
                <div class="phone">
                    <p><a href=""><i class="fa-solid fa-phone" style="margin-right:5px;"></i>+84 1800 123</a></p>
                </div>
            </div>
        </div>
        <header>
            <div class="logo">
                <a href="../do_an_tot_nghiep/home.php"><?php
                                                        $path_to_image = 'images/logo.png';
                                                        echo '<img src="' . $path_to_image . '" alt="Logo">';
                                                        ?></a>
            </div>
            <div class="menu">
                <li><a href="home.php">Trang Chủ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="menu.php" style="color:aliceblue;">Sản Phẩm</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="menu.php">Tất cả</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Cà phê">Cà Phê</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Nước ép">Nước ép</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Trà sữa">Trà Sữa</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Trà">Trà</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Soda">Soda</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Đá xay">Đá Xay</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Topping">Topping</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Sữa chua">Sữa chua</a></li>
                        <li><a class="dropdown-item" href="category.php?category=Khác">Ăn vặt</a></li>
                    </ul>
                </li>
                </li>
                <li><a href="order.php">Đơn hàng</a></li>
                <li><a href="lienhe.php">Liên Hệ</a></li>
                <li><a href="thuvien.php">Thư Viện</a>

            </div>

            <div class="search">
                <form method="post" action="search.php">
                    <input type="search" name="search_box" placeholder="Tìm kiếm sản phẩm..." required>
                    <button id="timkiem" name="search_btn"><a href=""><i class="fa-solid fa-magnifying-glass" style="color: rgba(0, 0, 0, 0.6); font-weight: bold;font-size: 17px ;"></i></a></button>
                </form>
            </div>

            <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
            ?>
            <div class="other">
                <button style="position: relative;">
                    <a href="user_cart.php" style="display: inline-block;">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <span style="position: absolute; top: -10px; font-size: 12px; line-height: 1; color:white;">(<?= $total_cart_items; ?>)</span>
                </button> <button id="users"><i class="fa-solid fa-user"></i></a></button>
                <i class="fa-regular fa-sun icon-large" onclick="toggleTheme('light')" style="transform: translateX(60px);"></i>
                <i class="fa-regular fa-moon icon-large" onclick="toggleTheme('dark')" style="transform: translateX(80px);"></i>
            </div>

            <div class="menu1">
                <ul>
                    <li><a href="user_profile.php"><i class="fas fa-user"></i>&nbsp;Profile</a></li>
                    <li><a href="ketnoi/user_logout.php" onclick="return confirm('Bạn có muốn thoát không?');"><i class="fas fa-sign-out-alt"></i>&nbsp;Thoát</a></li>
                </ul>
                <div class="profile">
                    <?php
                    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_profile->execute([$user_id]);
                    if ($select_profile->rowCount() > 0) {
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <?php
                    } else {
                    ?>
                    <?php
                    }
                    ?>

                    <script>
                        let profile = document.querySelector('#users');
                        let menu1 = document.querySelector('.menu1');
                        let isLoggedIn = <?= json_encode(isset($fetch_profile)) ?>; // Đặt cờ đăng nhập

                        profile.onclick = function() {
                            if (!isLoggedIn) {
                                window.location.href = '../do_an_tot_nghiep/user/user_login.php'; // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                            } else {
                                let profile = document.querySelector('#users');
                                let menu1 = document.querySelector('.menu1');

                                profile.onclick = function() {
                                    menu1.classList.toggle('active');
                                }
                            }
                        }
                    </script>

        </header>
    </div>
</div>
</div>

</html>
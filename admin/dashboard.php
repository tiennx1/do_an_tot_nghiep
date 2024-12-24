<?php
// Kết nối cơ sở dữ liệu thông qua file ketnoi.php
include '../ketnoi/ketnoi.php';

// Khởi động phiên làm việc của session
session_start();

// Lấy ID quản trị viên từ session
$admin_id = $_SESSION['admin_id'];

// Kiểm tra nếu không có ID quản trị viên trong session
if (!isset($admin_id)) {
    // Chuyển hướng đến trang đăng nhập nếu không có quyền truy cập
    header('location:admin_login.php');
}
?>

<?php
// Chuẩn bị câu lệnh SQL để chọn profile của admin dựa trên ID
$select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
// Thực thi câu lệnh SQL với giá trị ID của admin
$select_profile->execute([$admin_id]);
// Lấy dữ liệu từ kết quả truy vấn
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../styles_admin/nav.css">


</head>

<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <img style="width: 80px;" src="../images/08052021-05_generated-removebg-preview.png" alt="Cafe Shop 😋">
                    <P style="font-size: 1.8rem; margin-top: 1.2rem;"><span class="title">Tinky Coffee</span></P>

                </a>

            </li>

            <li>
                <a href="dashboard.php">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Trang chủ</span>
                </a>
            </li>

            <li>
                <a href="products.php">
                    <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="title">Sản phẩm</span>
                </a>
            </li>

            <li>
                <a href="place_order.php">
                    <span class="icon">
                        <ion-icon name="receipt-outline"></ion-icon>
                    </span>
                    <span class="title">Đơn hàng</span>
                </a>
            </li>

            <li>
                <a href="admin_account.php">
                    <span class="icon">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </span>
                    <span class="title">Quản trị</span>
                </a>
            </li>

            <li>

            </li>

            <li>
                <a href="users_account.php">
                    <span class="icon">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Khách hàng</span>
                </a>
            </li>

            <li>
                <a href="messages.php">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title">Tin nhắn</span>
                </a>
            </li>

            <li>
                <a href="dashboard.php">
                    <span class="icon">
                        <ion-icon name="star-outline"></ion-icon>
                    </span>
                    <span class="title">Đánh giá</span>
                </a>
            </li>

            <li>
                <a href="news.php">
                    <span class="icon">
                        <ion-icon name="newspaper-outline"></ion-icon>
                    </span>
                    <span class="title">Tin tức</span>
                </a>
            </li>

            <li>
                <a href="../ketnoi/admin_logout.php" onclick="return confirm('Bạn có muốn thoát?');" class="delete-btn"><span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Thoát</span></a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <a href="dashboard.php" class="logo">
                <h1 style="text-align: center;">Quản lý<span style="color: blue;"> Thông tin</span></h1>
            </a>

            <div class="">
                <div class="icons">
                    <div id="user-btn" class="fas fa-user"></div>
                </div>
            </div>


        </div>

        <section class="dashboard">
            <h1 class="heading" style="text-align: center; margin-top:3rem">Bảng thông tin</h1>

            <div class="cardBox">
                <!-- Card cho các đơn hàng đang chờ thanh toán -->
                <div class="card">
                    <?php
                    // Tính tổng giá trị của các đơn hàng đang chờ
                    $total_pendings = 0;

                    // Chuẩn bị và thực hiện truy vấn để lấy các đơn hàng đang chờ thanh toán
                    $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                    $select_pendings->execute(['Đã đặt hàng']);

                    // Duyệt qua các kết quả và cộng tổng giá trị
                    while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                        $total_pendings += $fetch_pendings['total_price'];
                    }
                    ?>
                    <div>
                        <!-- Hiển thị số tiền của các đơn hàng đang chờ -->
                        <div class="numbers"><span></span><?= number_format($total_pendings, 0, ',', '.'); ?><span> đ</span></div>
                        <div class="cardName">Đã đặt hàng</div>
                    </div>

                    <div class="iconBx">
                        <a href="place_order.php">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho các đơn hàng đã hoàn tất -->
                <div class="card">
                    <?php
                    // Tính tổng giá trị của các đơn hàng đã hoàn tất
                    $total_completes = 0;

                    // Chuẩn bị và thực hiện truy vấn để lấy các đơn hàng đã hoàn tất
                    $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                    $select_completes->execute(['Hoàn tất']);

                    // Duyệt qua các kết quả và cộng tổng giá trị
                    while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                        $total_completes += $fetch_completes['total_price'];
                    }
                    ?>
                    <div>
                        <!-- Hiển thị số tiền của các đơn hàng đã hoàn tất -->
                        <div class="numbers"><span></span><?= number_format($total_completes, 0, ',', '.'); ?><span> đ</span></div>
                        <div class="cardName">Đã hoàn tất</div>
                    </div>

                    <div class="iconBx">
                        <a href="place_order.php" class="ho">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho tổng tiền -->
                <div class="card">
                    <?php
                    // Lấy tổng số lượng các đơn hàng
                    $select_orders = $conn->prepare("SELECT * FROM `orders`");
                    $select_orders->execute();
                    $numbers_of_orders = $select_orders->rowCount();

                    // Tính tổng tiền bằng cách cộng tổng các đơn hàng đang chờ và đã hoàn tất
                    $total_completes_plus_pendings = $total_completes + $total_pendings;
                    ?>
                    <div>
                        <!-- Hiển thị tổng tiền -->
                        <div class="numbers"><span></span><?= number_format($total_completes_plus_pendings, 0, ',', '.'); ?><span> đ</span></div>
                        <div class="cardName">Tổng tiền</div>
                    </div>

                    <div class="iconBx">
                        <a href="place_order.php">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho số lượng sản phẩm -->
                <div class="card">
                    <?php
                    // Lấy số lượng sản phẩm trong database
                    $select_products = $conn->prepare("SELECT * FROM `products`");
                    $select_products->execute();
                    $numbers_of_products = $select_products->rowCount();
                    ?>
                    <div>
                        <!-- Hiển thị số lượng sản phẩm -->
                        <div class="numbers"><?= $numbers_of_products; ?></div>
                        <div class="cardName">Sản phẩm đã được thêm</div>
                    </div>

                    <div class="iconBx">
                        <a href="products.php">
                            <ion-icon name="grid-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho số lượng khách hàng -->
                <div class="card">
                    <?php
                    // Lấy số lượng khách hàng trong database
                    $select_users = $conn->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    $numbers_of_users = $select_users->rowCount();
                    ?>
                    <div>
                        <!-- Hiển thị số lượng khách hàng -->
                        <div class="numbers"><?= $numbers_of_users; ?></div>
                        <div class="cardName">Khách hàng</div>
                    </div>

                    <div class="iconBx">
                        <a href="users_account.php">
                            <ion-icon name="people-circle-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho số lượng người quản trị -->
                <div class="card">
                    <?php
                    // Lấy số lượng người quản trị trong database
                    $select_admins = $conn->prepare("SELECT * FROM `admin`");
                    $select_admins->execute();
                    $numbers_of_admins = $select_admins->rowCount();
                    ?>
                    <div>
                        <!-- Hiển thị số lượng người quản trị -->
                        <div class="numbers"><?= $numbers_of_admins; ?></div>
                        <div class="cardName">Người quản trị</div>
                    </div>

                    <div class="iconBx">
                        <a href="admin_account.php">
                            <ion-icon name="accessibility-outline"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Card cho số lượng tin nhắn mới -->
                <div class="card">
                    <?php
                    // Lấy số lượng tin nhắn mới trong database
                    $select_messages = $conn->prepare("SELECT * FROM `messages`");
                    $select_messages->execute();
                    $numbers_of_messages = $select_messages->rowCount();
                    ?>
                    <div>
                        <!-- Hiển thị số lượng tin nhắn mới -->
                        <div class="numbers"><?= $numbers_of_messages; ?></div>
                        <div class="cardName">Tin nhắn mới</div>
                    </div>

                    <div class="iconBx">
                        <a href="messages.php">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
</div>
</div>
</div>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
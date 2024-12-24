<?php

include 'ketnoi/ketnoi.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $msg = $_POST['msg'];
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);

    $checkUserId = $conn->prepare("SELECT * FROM `users` WHERE `id` =?");
    $checkUserId->execute([$user_id]);
    $userIdExists = $checkUserId->rowCount() > 0;

    if (!$userIdExists) {
        $error_msg[] = 'Vui lòng đăng nhập.';
    } else {
        $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name =? AND email =? AND number =? AND message =?");
        $select_message->execute([$name, $email, $number, $msg]);

        if ($select_message->rowCount() > 0) {
            $warning_msg[] = 'Nội dung bạn nhập bị trùng với tin nhắn trước đó';
        } else {
            $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
            $insert_message->execute([$user_id, $name, $email, $number, $msg]);

            $success_msg[] = 'Gửi tin nhắn thành công';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>

    <!-- font awesome cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles_using/font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles_using/home_giaodien.css">
    <link rel="stylesheet" href="styles_using/oder-slider.css">
    <link rel="website icon" type="png" href="images/logo2.png.jpeg">

    <style>
        /***************** Team ******************/
        .teamHSK {
            text-align: center;
        }

        .col-lg-4-swiper-slide {
            flex: 1 1 250px;
            /* Mỗi slide chiếm 1 phần của container, có thể co giãn */
            margin: auto;
            /* Căn chỉnh slide ở giữa */
            text-align: center;
            /* Trung tâm nội dung bên trong slide */
        }

        .team-slider {
            display: flex;
            /* Sử dụng flexbox để căn chỉnh */
            justify-content: center;
            /* Căn chỉnh các item nằm giữa */
            align-items: center;
            /* Căn chỉnh các item theo trục dọc */
            flex-wrap: wrap;
            /* Cho phép các item.wrap nếu không đủ space */
            gap: 1em;
            /* Tạo khoảng cách giữa các item */
        }

        .team-box {
            height: 380px;
            padding: 1.5em;
            border-radius: 30px;
            background: linear-gradient(145deg, #ececec, #ffffff);

            transition: 0.8s cubic-bezier(0.22, 0.78, 0.45, 1.02);
        }

        .team-img {
            width: 85%;
            height: 200px;
            border-radius: 20px;
            margin-bottom: 20px;
            box-shadow: 9px 9px 18px rgb(194 194 194 /0.5), -9px -9px 18px rgb(255 255 255 / 0.5);
            background-position: center;
            background-size: cover;
        }

        .team-box .h3-title {
            text-transform: capitalize;
            color: #0d0d25;
            font-weight: 600;
        }

        .team-slider .social-icon {
            margin: 15px 0px 10px;
        }

        .team-slider .social-icon ul li {
            display: inline-block;
            margin: 0 6px;
        }

        .team-slider .social-icon ul li:last-child {
            margin-right: 0;
        }

        .team-slider .social-icon ul li:first-child {
            margin-left: 0;
        }

        .team-slider .social-icon ul li a {
            width: 50px;
            height: 50px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: linear-gradient(145deg, #e6e6e6, #ffffff);
            box-shadow: 4px 4px 8px #d0d0d0, -4px -4px 8px #ffffff;
            color: #0d0d25;
            font-size: 2rem;
        }

        .team-slider .social-icon ul li a:hover {
            background: #ff8243;
        }

        .team-slider .social-icon ul li a:hover i {
            color: #ffffff !important;
        }

        .hidden-input {
            position: absolute;
            left: -9999px;
        }
    </style>

    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>

</head>

<body>


    <?php include 'user/user_header.php'; ?>
    <?php include 'ketnoi/thongbao.php'; ?>
  
    <?php include 'darklight.php'; ?>
    <div class="teamHSK" style="transform:translateY(150px);">

        <h3 class="sub-headingg" data-aos="fade-up"><b> Team </b></h3>
        <h1 class="headingg" data-aos="fade-up"><b style="color:gray;">Đội Ngũ Phát Triển</b> </h1>
        <div class="row team-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden aos-init aos-animate" data-aos="fade-up">
            <div class="swiper-wrapper" id="swiper-wrapper-427b1b810e19748a9" aria-live="polite" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">



                <div class="col-lg-4-swiper-slide" role="group" aria-label="1 / 4" style="width: 323px; margin-right: 10px;">
                    <div class="team-box text-center">
                        <img src="images/hieu.png" class="team-img">

                        <h3 class="h3-title">Đặng Chí Hiếu</h3>
                        <h4> Người xây dựng dự án </h4>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4-swiper-slide" role="group" aria-label="2 / 4" style="width: 323px; margin-right: 10px;">
                    <div class="team-box text-center">
                        <img src="images/sang.jpg" class="team-img">

                        <h3 class="h3-title">Bùi Quang Sang</h3>
                        <h4> Nhà sáng lập dự án </h4>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4-swiper-slide" role="group" aria-label="3 / 4" style="width: 323px; margin-right: 10px;">
                    <div class="team-box text-center">
                        <img src="images/khaa.png" class="team-img">

                        <h3 class="h3-title">Nguyễn Đình Kha</h3>
                        <h4> Nhà sáng lập công ty </h4>
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
    <section class="contact" style="transform:translateY(150px);">

        <div class="row">

            <div class="image">
                <img src="images/lien-he2.jpg" alt="">
            </div>

            <!-- Bắt đầu form để gửi tin nhắn -->
            <form action="" method="post">
                <h3>Liên hệ với chúng tôi</h3>

                <!-- Lưu trữ tên người dùng dưới dạng hidden input -->
                <input type="hidden" name="name" value="<?php echo $fetch_profile['name']; ?>">

                <!-- Lưu trữ số điện thoại người dùng dưới dạng hidden input -->
                <input type="hidden" name="number" value="<?php echo $fetch_profile['number']; ?>">

                <!-- Lưu trữ email người dùng dưới dạng hidden input -->
                <input type="hidden" name="email" value="<?php echo $fetch_profile['email']; ?>">

                <!-- Area textarea cho người dùng nhập tin nhắn -->
                <textarea name="msg" class="box" required placeholder="Nhập tin nhắn" maxlength="500" cols="30" rows="10"></textarea>

                <!-- Nút submit để gửi tin nhắn -->
                <input type="submit" value="Gửi" name="send" class="btn">
            </form>
            <!-- Kết thúc form -->


        </div>

    </section>
</body>

</html>
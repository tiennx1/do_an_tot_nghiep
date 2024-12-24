<?php

// Include file kết nối cơ sở dữ liệu
include '../ketnoi/ketnoi.php';

// Khởi động phiên session
session_start();

// Kiểm tra xem biến session 'user_id' đã được thiết lập chưa
if (isset($_SESSION['user_id'])) {
    // Nếu đã thiết lập, gán giá trị cho $user_id
    $user_id = $_SESSION['user_id'];
} else {
    // Nếu chưa thiết lập, gán giá trị rỗng cho $user_id
    $user_id = '';
};

// Kiểm tra xem form đăng nhập đã được submit chưa
if (isset($_POST['submit'])) {

    // Lấy dữ liệu từ form đăng nhập
    $email = $_POST['email'];
    // Xử lý dữ liệu email để loại bỏ các ký tự không mong muốn
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']); // Mã hóa mật khẩu bằng SHA1
    // Xử lý dữ liệu mật khẩu để loại bỏ các ký tự không mong muốn
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    // Thực hiện truy vấn SQL để kiểm tra email và mật khẩu
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email =? AND password =?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem có người dùng nào phù hợp với email và mật khẩu vừa nhập không
    if ($select_user->rowCount() > 0) {
        // Nếu có, thiết lập session 'user_id' và chuyển hướng người dùng đến trang chủ
        $_SESSION['user_id'] = $row['id'];
        header('location:../home.php');
    } else {
        // Nếu không, thêm thông báo lỗi
        $warning_msg[] = 'Sai tên đăng nhập hoặc mật khẩu';
    }
}

// Kiểm tra xem form đăng ký đã được submit chưa
if (isset($_POST['enter'])) {

    // Lấy dữ liệu từ form đăng ký
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING); // Xử lý dữ liệu tên để loại bỏ các ký tự không mong muốn
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING); // Xử lý dữ liệu email để loại bỏ các ký tự không mong muốn
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING); // Xử lý dữ liệu số điện thoại để loại bỏ các ký tự không mong muốn
    $pass = sha1($_POST['pass']); // Mã hóa mật khẩu bằng SHA1
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); // Xử lý dữ liệu mật khẩu để loại bỏ các ký tự không mong muốn
    $cpass = sha1($_POST['cpass']); // Mã hóa mật khẩu.confirmation bằng SHA1
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING); // Xử lý dữ liệu mật khẩu.confirmation để loại bỏ các ký tự không mong muốn

    // Thực hiện truy vấn SQL để kiểm tra email hoặc số điện thoại đã tồn tại
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email =? OR number =?");
    $select_user->execute([$email, $number]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem có người dùng nào phù hợp với email hoặc số điện thoại vừa nhập không
    if ($select_user->rowCount() > 0) {
        // Nếu có, thêm thông báo lỗi
        $warning_msg[] = 'Email hoặc số điện thoại đã tồn tại';
    } else {
        // Nếu không, kiểm tra xem mật khẩu và mật khẩu.confirmation có khớp không
        if ($pass != $cpass) {
            // Nếu không khớp, thêm thông báo lỗi
            $warning_msg[] = 'Mật khẩu nhập lại không chính xác';
        } else {
            // Nếu khớp, thực hiện việc đăng ký mới
            $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
            $insert_user->execute([$name, $email, $number, $cpass]); // Chèn người dùng mới vào cơ sở dữ liệu
            // Kiểm tra xem người dùng mới có được tạo thành công không
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE email =? AND password =?");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if ($select_user->rowCount() > 0) {
                // Nếu thành công, thiết lập session 'user_id' và chuyển hướng người dùng đến trang đăng nhập
                $_SESSION['user_id'] = $row['id'];
                header('location:user_login.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập và đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="../styles_using/login.css">
    <script>
        // Hàm kiểm tra số lượng ký tự trong trường input
        function limitInput(event) {
            var input = event.target;
            var maxLength = 10;
            var currentLength = input.value.length;
            var currentValue = input.value;
            var firstChar = currentValue.charAt(0);
            if (event.target.value.length > maxLength) {
                event.preventDefault(); // Ngăn chặn việc nhập thêm
                alert("Bạn chỉ được nhập tối đa 10 số.");
            } else if (firstChar !== '0' && currentLength === 1) {
                // Nếu chưa, ngăn chặn hoàn toàn việc nhập số đầu tiên nếu nó không phải là số 0
                event.preventDefault();
            } else if (currentLength > maxLength) {
                // Nếu đã nhập quá 10 số, ngăn chặn việc nhập thêm
                event.preventDefault();
            } else if (currentLength === maxLength && currentValue.slice(1) !== '0123456789') {
                // Nếu đã nhập đủ 10 số nhưng không phải là số điện thoại hợp lệ, ngăn chặn việc nhập thêm
                event.preventDefault();
            }
            // Kiểm tra xem người dùng đã nhập hai số 0 liên tiếp chưa
            else if (currentLength > 1 && currentValue.charAt(currentLength - 1) === '0' && currentValue.charAt(currentLength - 2) === '0') {
                event.preventDefault();
                input.value = currentValue.slice(0, -1); // Remove the last entered zero
            }

            // Kiểm tra xem người dùng đang cố gắng nhập một ký tự không phải là số chưa
            else if (typeof event.key === "string" && !/\d/.test(event.key)) {
                event.preventDefault(); // Ngăn chặn việc nhập ký tự không phải số
                alert("Chỉ được nhập số từ 0 đến 9.");
            }
        }

        // Hàm kiểm tra khi người dùng nhấp vào nút Đăng ký
        function checkNumber() {
            var numberInput = document.querySelector('input[name="number"]').value;
            var regex = /^\d{10}$/; // Kiểm tra xem có phải là 10 số hay không
            if (!regex.test(numberInput)) {
                alert("Bạn phải nhập số điện thoại đủ 10 số.");
                return false; // Tránh hành động mặc định của form
            }
            return true; // Cho phép gửi form nếu đã đúng
        }
    </script>
</head>

<body>
    <?php include '../ketnoi/thongbao.php'; ?>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" onsubmit="return checkNumber()">
                <h2>Đăng ký tài khoản</h2>
                <div class="social-icons">
                    <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dgmail%26oq%3Dgmail%26gs_lcrp%3DEgZjaHJvbWUyBggAEEUYOTIHCAEQABiPAjIHCAIQABiPAtIBCDEzNTJqMGo0qAIAsAIA%26sourceid%3Dchrome%26ie%3DUTF-8&ddm=0&ec=futura_gmv_dt_so_72586115_e&flowEntry=ServiceLogin&flowName=GlifWebSignIn&hl=vi&ifkv=Ab5oB3r-RcXwWYRZhxRV2HVm3CQtL3z2mOcmrQAegAdInYJnozLw89lzCuMt-IFyaZCpr6TpCiHEDA&passive=true&dsh=S-585539894%3A1725128268500185" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="https://www.facebook.com/?locale=vi_VN" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/?lang=vi" class="icon"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <!-- <span>or use your email for registeration</span> -->
                <input type="text" placeholder="Tên của bạn" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="number" placeholder="Số điện thoại" name="number" onkeypress="limitInput(event)" maxlength="10" required />
                <input type="password" placeholder="Mật khẩu" name="pass" required>
                <input type="password" placeholder="Nhập lại mật khẩu" name="cpass" required>
                <button name="enter">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post">
                <h1>Đăng Nhập</h1>
                <div class="social-icons">
                    <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dgmail%26oq%3Dgmail%26gs_lcrp%3DEgZjaHJvbWUyBggAEEUYOTIHCAEQABiPAjIHCAIQABiPAtIBCDEzNTJqMGo0qAIAsAIA%26sourceid%3Dchrome%26ie%3DUTF-8&ddm=0&ec=futura_gmv_dt_so_72586115_e&flowEntry=ServiceLogin&flowName=GlifWebSignIn&hl=vi&ifkv=Ab5oB3r-RcXwWYRZhxRV2HVm3CQtL3z2mOcmrQAegAdInYJnozLw89lzCuMt-IFyaZCpr6TpCiHEDA&passive=true&dsh=S-585539894%3A1725128268500185" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="https://www.facebook.com/?locale=vi_VN" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/" class="icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/?lang=vi" class="icon"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <!-- <span>or use your email password</span> -->
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mật khẩu" name="pass" required>
                <a href="../home.php">Quay về trang chủ</a>
                <button name="submit">Đăng nhập</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào mừng bạn</h1>
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="login">Đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào bạn</h1>
                    <p>Chào mừng bạn đến với Tinky Coffee</p>
                    <button class="hidden" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../javascript/user_login1.js"></script>
</body>
</html>
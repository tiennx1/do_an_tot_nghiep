<?php
// Include file kết nối cơ sở dữ liệu
include '../ketnoi/ketnoi.php';

// Khởi động phiên session
session_start();

// Lấy ID của admin từ session
$admin_id = $_SESSION['admin_id'];

// Kiểm tra xem ID admin có tồn tại không
if (!isset($admin_id)) {
   // Nếu không, chuyển hướng đến trang đăng nhập
   header('location:admin_login.php');
};

// Kiểm tra xem có thao tác thêm tin tức mới không
if (isset($_POST['add_news'])) {
   // Lấy dữ liệu từ form
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING); // Xử lý dữ liệu đầu vào
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING); // Xử lý dữ liệu đầu vào
   $date = date('Y-m-d H:i:s'); // Tạo ngày hiện tại

   // Lấy hình ảnh từ form
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING); // Xử lý dữ liệu đầu vào
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../upload_images/' . $image;

   // Kiểm tra kích thước hình ảnh
   if ($image_size > 2000000) {
      // Nếu kích thước lớn hơn 2MB, thêm thông báo lỗi
      $warning_msg[] = 'Kích thước ảnh quá lớn';
   } else {
      // Nếu kích thước hợp lệ, di chuyển tệp hình ảnh lên thư mục upload
      move_uploaded_file($image_tmp_name, $image_folder);

      // Chèn tin tức mới vào cơ sở dữ liệu
      $insert_news = $conn->prepare("INSERT INTO `news`(title, content, date, image) VALUES(?,?,?,?)");
      $insert_news->execute([$title, $content, $date, $image]);

      // Thêm thông báo thành công
      $success_msg[] = 'Tin tức đã được thêm';
   }
}

// Kiểm tra xem có thao tác xóa tin tức không
if (isset($_GET['delete'])) {
   // Lấy ID của tin tức cần xóa
   $delete_id = $_GET['delete'];
   // Lấy thông tin hình ảnh của tin tức cần xóa
   $delete_news_image = $conn->prepare("SELECT * FROM `news` WHERE id =?");
   $delete_news_image->execute([$delete_id]);
   $fetch_delete_image = $delete_news_image->fetch(PDO::FETCH_ASSOC);
   // Xóa hình ảnh từ thư mục
   unlink('../upload_images/' . $fetch_delete_image['image']);
   // Xóa tin tức khỏi cơ sở dữ liệu
   $delete_news = $conn->prepare("DELETE FROM `news` WHERE id =?");
   $delete_news->execute([$delete_id]);
   // Chuyển hướng trở lại trang danh sách tin tức
   header('location:news.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tin Tức</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" href="../styles_admin/admin_tintuc.css">
   <link rel="stylesheet" href="../styles_admin/admin_giaodien.css">
   <link rel="stylesheet" href="../styles_using/font.css">
</head>

<body>
   <?php include '../ketnoi/thongbao.php' ?>
   <?php include '../ketnoi/admin_header.php' ?>
 
   <!-- add news section starts  -->

   <section class="add-news">
      <form action="" method="POST" enctype="multipart/form-data">
         <h3>Thêm tin tức</h3>
         <input type="text" required placeholder="Nhập tiêu đề" name="title" maxlength="100" class="box">
         <textarea required placeholder="Nhập nội dung tin tức" name="content" class="box"></textarea>
         <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
         <input type="submit" value="Thêm tin tức" name="add_news" class="btn">
      </form>
   </section>

   <!-- add news section ends -->

   <!-- show news section starts  -->

   <section class="show-news">
      <div class="box-container">
         <?php
         // Chuẩn bị truy vấn SQL để lấy tất cả tin tức từ bảng `news`
         $show_news = $conn->prepare("SELECT * FROM `news`");
         // Thực thi truy vấn
         $show_news->execute();
         // Kiểm tra xem có bất kỳ bản ghi nào được trả về không
         if ($show_news->rowCount() > 0) {
            // Nếu có, lặp qua từng bản ghi
            while ($fetch_news = $show_news->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <!-- Hiển thị hình ảnh của tin tức -->
                  <img src="../upload_images/<?= $fetch_news['image']; ?>" alt="">
                  <!-- Bố cục để sắp xếp các thông tin theo chiều dọc -->
                  <div class="flex">
                     <!-- Hiển thị ngày tạo của tin tức -->
                     <div class="date"><?= $fetch_news['date']; ?></div>
                  </div>
                  <!-- Hiển thị tiêu đề của tin tức -->
                  <div class="title"><?= $fetch_news['title']; ?></div>
                  <!-- Hiển thị nội dung của tin tức -->
                  <div class="content"><?= $fetch_news['content']; ?></div>
                  <!-- Bố cục cho nút cập nhật và xóa -->
                  <div class="flex-btn">
                     <!-- Liên kết để cập nhật tin tức -->
                     <a href="update_news.php?update=<?= $fetch_news['id']; ?>" class="option-btn">cập nhật</a>
                     <!-- Liên kết để xóa tin tức, yêu cầu xác nhận trước khi thực hiện -->
                     <a href="news.php?delete=<?= $fetch_news['id']; ?>" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa tin tức này không?');">xóa</a>
                  </div>
               </div>
         <?php
            }
         } else {
            // Nếu không có bản ghi nào, hiển thị thông báo
            echo '<p class="empty">Chưa có tin tức nào cập nhật</p>';
         }
         ?>
      </div>
   </section>


   <!-- show news section ends -->

   <script src="../javascript/admin_login.js"></script>
</body>

</html>
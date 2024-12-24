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

// Kiểm tra xem có tham số GET 'delete' không?
if (isset($_GET['delete'])) {
   // Lấy ID của tin nhắn cần xóa từ tham số GET
   $delete_id = $_GET['delete'];

   // Chuẩn bị câu lệnh SQL để xóa tin nhắn dựa trên ID
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   // Thực thi câu lệnh SQL với ID của tin nhắn
   $delete_message->execute([$delete_id]);

   // Chuyển hướng về trang danh sách tin nhắn sau khi xóa
   header('location:messages.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tin nhắn</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../styles_admin/admin_giaodien.css">
   <link rel="stylesheet" href="../styles_admin/table.css">

</head>

<body>

   <?php include '../ketnoi/admin_header.php' ?>

   <!-- messages section starts  -->

   <section class="messages">

      <h1 class="heading">Tin nhắn từ khách hàng</h1>

      <!-- <div class="table_header">
         <p>Message Details</p>
         <div>
            <input placeholder="customer name">
            <button class="add_new">search</button>
         </div>
      </div> -->

      </div>
      <div>
         <table class="table">
            <thead>
               <tr>
                  <th>Tên</th>
                  <th>Số điện thoại</th>
                  <th>Email</th>
                  <th>Tin nhắn</th>
                  <th>Thao tác</th>
               </tr>
            </thead>
            <tbody>
               <?php
               // Chuẩn bị truy vấn SQL để lấy tất cả tin nhắn từ bảng `messages`
               $select_messages = $conn->prepare("SELECT * FROM `messages`");
               // Thực thi truy vấn
               $select_messages->execute();
               // Kiểm tra xem có bất kỳ bản ghi nào được trả về không
               if ($select_messages->rowCount() > 0) {
                  // Nếu có, lặp qua từng bản ghi
                  while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
               ?>
                     <tr>
                        <!-- Hiển thị tên người gửi tin nhắn -->
                        <td><span><?= $fetch_messages['name']; ?></span></td>
                        <!-- Hiển thị số điện thoại của người gửi -->
                        <td><span><?= $fetch_messages['number']; ?></span></td>
                        <!-- Hiển thị email của người gửi -->
                        <td><span><?= $fetch_messages['email']; ?></span></td>
                        <!-- Hiển thị nội dung tin nhắn -->
                        <td><span><?= $fetch_messages['message']; ?></span></td>
                        <!-- Tạo liên kết xóa tin nhắn, hiển thị biểu tượng thùng rác và yêu cầu xác nhận trước khi xóa -->
                        <td>
                           <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" onclick="return confirm('Xác nhận xóa tin nhắn này?');">
                              <button><i class="fa-solid fa-trash"></i></button>
                           </a>
                        </td>
                     </tr>
               <?php
                  }
               } else {
                  // Nếu không có bản ghi nào, hiển thị thông báo
                  echo '<p class="empty">Bạn chưa có tin nhắn nào</p>';
               }
               ?>
            </tbody>

         </table>
      </div>

   </section>

   <!-- messages section ends -->

   <!-- custom js file link  -->
   <script src="../javascript/admin_login.js"></script>

</body>

</html>
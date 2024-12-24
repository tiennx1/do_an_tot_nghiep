<?php
// Include file kết nối cơ sở dữ liệu
include '../ketnoi/ketnoi.php';

// Lấy thông tin từ form gửi lên
$news_id = $_POST['news_id']; // ID của tin tức cần cập nhật
$title = $_POST['title']; // Tiêu đề mới
$content = $_POST['content']; // Nội dung mới
$old_image = $_POST['old_image']; // Hình ảnh cũ (đường dẫn)
$image = $_FILES['image']['name']; // Tên file hình ảnh mới
$image_size = $_FILES['image']['size']; // Kích thước hình ảnh mới
$image_tmp_name = $_FILES['image']['tmp_name']; // Tên file tạm thời của hình ảnh
$image_folder = '../upload_images/' . $image; // Thư mục lưu trữ hình ảnh mới

// Kiểm tra nếu có ảnh mới được tải lên
if (!empty($image)) {
    // Kiểm tra kích thước hình ảnh
    if ($image_size > 2000000) {
        // Nếu kích thước quá lớn, thêm thông báo lỗi vào mảng thông báo
        $warning_msg[] = 'Kích thước ảnh quá lớn';
    } else {
        // Di chuyển hình ảnh mới từ thư mục tạm vào thư mục lưu trữ
        move_uploaded_file($image_tmp_name, $image_folder);
        // Xóa hình ảnh cũ để không chiếm dung lượng
        unlink('../upload_images/' . $old_image);
        // Cập nhật tên hình ảnh mới vào cơ sở dữ liệu
        $update_image = $conn->prepare("UPDATE `news` SET image = ? WHERE id = ?");
        $update_image->execute([$image, $news_id]);
        // Thêm thông báo cập nhật hình ảnh thành công vào mảng thông báo
        $success_msg[] = 'Cập nhật ảnh thành công';
    }
}

// Cập nhật tin tức mà không thay đổi hình ảnh nếu không có ảnh mới
$update_news = $conn->prepare("UPDATE `news` SET title = ?, content = ? WHERE id = ?");
$update_news->execute([$title, $content, $news_id]); // Thực hiện cập nhật tiêu đề và nội dung

// Chuyển hướng người dùng về trang tin tức sau khi cập nhật thành công
header('Location: news.php');
exit; // Dừng thực thi mã sau khi chuyển hướng
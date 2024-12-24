<?php
// Kết nối cơ sở dữ liệu thông qua file ketnoi.php
include '../ketnoi/ketnoi.php';

// Lấy ID của bài viết từ URL thông qua tham số GET 'update'
$news_id = isset($_GET['update']) ? $_GET['update'] : '';

// Kiểm tra xem ID có tồn tại không
if ($news_id) {
    // Chuẩn bị câu lệnh SQL để lấy thông tin bài viết dựa trên ID
    $get_news = $conn->prepare("SELECT * FROM `news` WHERE id =?");
    // Thực thi câu lệnh SQL với ID của bài viết
    $get_news->execute([$news_id]);
    // Lấy dữ liệu từ kết quả truy vấn
    $fetch_news = $get_news->fetch(PDO::FETCH_ASSOC);

    // Nếu không tìm thấy bài viết, chuyển hướng về trang quản lý tin tức
    if (!$fetch_news) {
        header('Location: news.php');
        exit;
    }
} else {
    // Nếu không có ID bài viết trong URL, chuyển hướng về trang quản lý tin tức
    header('Location: news.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tin tức</title>
    <link rel="stylesheet" href="../styles_admin/admin_giaodien.css">
    <link rel="stylesheet" href="../styles_using/font.css">
    <link rel="stylesheet" href="../styles_admin/admin_capnhat_giaodien.css">
</head>

<body>

    <?php include '../ketnoi/admin_header.php' ?>

    <section class="update-news">
        <h2>Cập nhật Tin Tức</h2>
        <form action="update_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="news_id" value="<?= $news_id; ?>">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" id="title" name="title" value="<?= $fetch_news['title']; ?>" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea id="content" name="content"><?= $fetch_news['content']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" id="image" name="image" accept="image/jpg, image/jpeg, image/png, image/webp">
            </div>

            <button type="submit" name="update_news" class="btn-update center-button">Cập nhật Tin Tức</button>
        </form>
    </section>

    <script src="../javascript/admin_script.js"></script>
</body>

</html>
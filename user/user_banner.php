<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tag để chỉ định mã hóa trang web và thiết kế responsive -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tiêu đề trang web -->
  <title>Document</title>

  <!-- Liên kết tới CSS của Bootstrap để áp dụng các style mặc định -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Liên kết tới JS của Bootstrap để áp dụng các tính năng tương tác như carousel -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- Bắt đầu phần Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicator/dot cho Carousel, cho phép người dùng nhấp vào để di chuyển slide -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- Nội dung chính của Carousel, mỗi div với class "carousel-item" đại diện cho một slide -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <!-- Hình ảnh đầu tiên của Carousel -->
        <img src="../images/Tinky Coffee.jpg" style="width:100%; height: 450px;">
      </div>
      <div class="carousel-item">
        <!-- Hình ảnh thứ hai của Carousel -->
        <img src="../images/Minimalist Coffee Banner.jpg" alt="" class="d-block" style="width:100%; height: 450px; ">
      </div>
      <div class="carousel-item">
        <!-- Hình ảnh thứ ba của Carousel -->
        <img src="../images/banner3.png" alt="" class="d-block" style="width:100%; height: 450px; ">
      </div>
    </div>

    <!-- Nút điều khiển bên trái và phải cho Carousel, cho phép người dùng di chuyển giữa các slide -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</body>

</html>
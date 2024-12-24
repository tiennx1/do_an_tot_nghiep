<?php

// Xác định đường dẫn đến tập tin kết nối cơ sở dữ liệu
include 'ketnoi/ketnoi.php';

// Khởi động phiên làm việc
session_start();

// Kiểm tra xem session 'user_id' đã được thiết lập
if(isset($_SESSION['user_id'])) {
    // Nếu đã được thiết lập, lấy giá trị user_id từ session
    $user_id = $_SESSION['user_id'];
} else {
    // Nếu chưa được thiết lập, đặt user_id thành rỗng
    $user_id = '';
};

// Xác định đường dẫn đến tập tin xử lý việc thêm sản phẩm vào giỏ hàng
include 'ketnoi/add_cart.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles_using/font.css">
    <link rel="stylesheet" href="styles_using/home_giaodien.css">
    <link rel="stylesheet" href="styles_using/oder-slider.css">
    <link rel="stylesheet" href="styles_using/aside.css">
    <link rel="website icon" type="png" href="images/logo2.png.jpeg">
    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>

    <style>
      /*********************** About ***********************/

.about .about-info {
    display: flex;
    flex-wrap: wrap;
    gap:1.5rem;
    align-items: center;
    width:100%;
    margin-bottom: 7em;
  }
  
  .about .about-info .image {
    flex: 1 1 40rem;
    height:50em;
  }
  
  .about .about-info .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .about .about-info .content {
    flex: 1 1 40rem;
  }
  
  .about .about-info .content h3 {
    color: var(--black);
    font-size: 4rem;
    padding: 0.5rem 0;
  }
  
  .about .about-info .content p {
    color: var(--light-color);
    font-size: 1.5rem;
    padding: 0.5rem 0;
    line-height: 2;
  }
  
  .about .about-info .content .icons-container {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    padding: 1rem 0;
    margin-top: 0.5rem;
  }
  
  .about .about-info .content .icons-container .icons {
    background: #eee;
    border-radius: 0.5rem;
    border: 0.1rem solid rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex: 1 1 17rem;
    padding: 1.5rem 1rem;
  }
  
  .about .about-info .content .icons-container .icons i {
    font-size: 2.5rem;
    color: var(--pink);
  }
  
  .about .about-info .content .icons-container .icons span {
    font-size: 1.5rem;
    color: var(--black);
  }

  .headingg {
        background-color: #eee;
        text-align: center;
        padding: 20px;
  }

  /*********************** Map & Reviews ***********************/

  .contact-map-container {
           display: flex;
           gap: 20px;
           align-items: flex-start;
       }
       .contact-map-container .map {
           flex: 1;
       }
       .contact-map-container {
           display: flex;
           justify-content: space-between; /* Đặt khoảng cách giữa các phần tử */
       }
        .map,.contact-form {
           flex: 1; /* Cho phép cả hai phần tử mở rộng để chiếm toàn bộ chiều rộng của container */
       }
       .news-section{
           margin-top: 20px;
       }
       @font-face {
        font-family:fontst1;
        src: url('font/BT_Beau_Sans/BT-BeauSans-BoldItalic.ttf');
       }
       @font-face {
        font-family:fontst2;
        src: url('font/BT_Beau_Sans/BT-BeauSans-Bold.ttf');
       }
       @font-face {
        font-family:fontst3;
        src: url('font/BT_Beau_Sans/BT-BeauSans-Light.ttf');
       }
       .tintuc .news-section h1{
        font-family: fontst1;
        font-weight: bold;
       }
       .tintuc .news-section .news-date,.news-title{
        font-family: fontst2;
       }
       .tintuc .news-section .news-content{
        font-family: fontst3;
        font-weight: bold;
       }

    </style>
    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>
    <!-- swiper css file -->
    <link rel="stylesheet" href="./plugins/swiper-8.0.7/css/swiper.min.css">

    <!-- font awesome css cdn link -->
 

    <!-- bootstrap css file -->

    <!-- aos css file -->
    <link rel="stylesheet" href="./plugins/aos-2.3.4/css/aos.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style1.css">
 
    <link rel="stylesheet" href="./css/review.css">

</head>
<body>
<?php include 'user/user_header.php';?>
    <?php include 'ketnoi/thongbao.php' ;?>
   
    <section class="hero">
      
<?php include 'darklight.php';?>

<div class="swiper hero-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="content">
            <span>Đặt hàng online</span>
            <h3 style="font-family:font1;">Tinky Coffee</h3>
           <a href="menu.php" class="btn">Menu</a>
         </div>
         <div class="image">
            <img src="images/home-img-1.1.png" alt="">
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="content">
            <span>Đặt hàng online</span>
            <h3>Những Thức Uống Ngon Tuyệt!</h3>
            <a href="menu.php" class="btn">Menu</a>
         </div>
         <div class="image">
            <img src="images/dessert-3 copy 2.png" alt="">
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="content">
            <span>Đặt hàng online</span>
            <h3>Sữa Tươi Chân Châu ĐƯờng Đen</h3>
            <a href="menu.php" class="btn">Menu</a>
         </div>
         <div class="image">
            <img src="images/Best Seller.png" alt="">
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="content">
            <span>Đặt hàng online</span>
            <h3>Sản Phẩm Trà Độc Đáo!</h3>
            <a href="menu.php" class="btn">Menu</a>
         </div>
         <div class="image">
            <img src="images/Best Seller2.png" alt="">
         </div>
      </div>

   </div>

   <!-- <div class="swiper-pagination"></div> -->

</div>

</section>

<!-- category Area -->

    <section class="products">
    <aside class="aside-layout">
            <div class="aside-body">
               <div class="img"> 
                     <img src="images/Minimalist Coffee Banner copy.jpg" alt="">  
               </div>
               <div class="text-button">
                  <h1>Đặt hàng ngay</h1>
                  <p>Tinky Coffee nổi tiếng với cách pha chế độc đáo, 
                     kết hợp giữa kỹ thuật truyền thống và sáng tạo hiện đại để tạo nên những ly cà phê thơm ngon. 
                     Mỗi ly cà phê tại đây được làm từ những hạt cà phê chọn lọc, rang xay kỹ lưỡng, 
                     đảm bảo giữ nguyên hương vị tinh túy. Đặc biệt, 
                     Tinky Coffee còn sử dụng các phương pháp pha chế đặc biệt như cold brew, 
                     siphon, và pour-over, mang đến trải nghiệm thưởng thức cà phê đa dạng và thú vị. 
                     Không chỉ chú trọng vào chất lượng, Tinky Coffee còn chăm chút từng chi tiết nhỏ trong cách trình bày, 
                     tạo nên những tác phẩm nghệ thuật từ cà phê. Hãy đặt hàng ngay hôm nay để trải nghiệm hương vị tuyệt vời và 
                     độc đáo của Tinky Coffee.
</p>
                  <div class="button">
                        <a href="menu.php">Tìm Hiểu Thêm</a>
                  </div>
               </div>
            </div>
</aside>

<h1 class="title">Nước uống</h1>
<!-- Bắt đầu phần hiển thị sản phẩm nổi bật -->
<section class="quick-view">
<div class="box-container">

   <?php
      // Chuẩn bị truy vấn để lấy 4 sản phẩm đầu tiên từ cơ sở dữ liệu
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 4");
      
      // Thực thi truy vấn
      $select_products->execute();
      
      // Kiểm tra xem có sản phẩm nào được trả về không
      if($select_products->rowCount() > 0){
         // Duyệt qua từng sản phẩm được trả về
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
  ?>
   <form action="" method="post" class="box">
      <!-- Lưu trữ thông tin sản phẩm dưới dạng hidden input -->
      <input type="hidden" name="pid" value="<?= $fetch_products['id'];?>">
      <input type="hidden" name="name" value="<?= $fetch_products['name'];?>">
      <input type="hidden" name="price" value="<?= $fetch_products['price'];?>">
      <input type="hidden" name="image" value="<?= $fetch_products['image'];?>">
      
      <!-- Link để xem chi tiết sản phẩm -->
      <a href="View.php?pid=<?= $fetch_products['id'];?>" class="fas fa-eye"></a>
      
      <!-- Nút thêm sản phẩm vào giỏ hàng -->
      <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
      
      <!-- Hiển thị hình ảnh sản phẩm -->
      <img src="upload_images/<?= $fetch_products['image'];?>" alt="">
      
      <!-- Link đến danh mục sản phẩm tương ứng -->
      <a href="category.php?category=<?= $fetch_products['category'];?>" class="cat"><?= $fetch_products['category'];?></a>
      
      <!-- Tên sản phẩm -->
      <div class="name"><?= $fetch_products['name'];?></div>
      
      <!-- Giá sản phẩm -->
      <div class="flex">
          <div class="price"><span></span><?= number_format($fetch_products['price'], 0, ',', '.');?><span> đ</span></div>
          
          <!-- Số lượng muốn mua -->
          <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
      </div>
      
      <!-- Nút thêm sản phẩm vào giỏ hàng -->
      <button type="submit" name="add_to_cart" class="cart-btn">Thêm vào giỏ hàng</button>

   </form>
   <?php
         }
      }else{
         // Thông báo khi không có sản phẩm nào
         echo '<p class="empty">Sản phẩm chưa thêm</p>';
      }
  ?>

</div>
</div>
<!-- Kết thúc phần hiển thị sản phẩm nổi bật -->

<!-- Bắt đầu phần hiển thị nút xem tất cả sản phẩm -->
<div class="more-btn">
   <a href="menu.php" class="btn">Xem tất cả</a>
</div>
</section>
<!-- Kết thúc phần hiển thị nút xem tất cả sản phẩm -->

</div>
      <h1 class="title">BEST SELLER</h1>
      <!-- Bắt đầu phần hiển thị sản phẩm nổi bật -->
<section class="quick-view">

<div class="box-container">
    <?php
    // Chuẩn bị truy vấn để lấy 4 sản phẩm nổi bật nhất từ cơ sở dữ liệu
    $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY popularity DESC LIMIT 4");
    
    // Thực thi truy vấn
    $select_products->execute();
    
    // Kiểm tra xem có sản phẩm nào được trả về không
    if ($select_products->rowCount() > 0) {
        // Duyệt qua từng sản phẩm được trả về
        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            // Bắt đầu form để thêm sản phẩm vào giỏ hàng
           ?>
            <form action="" method="post" class="box">
                <!-- Lưu trữ thông tin sản phẩm dưới dạng hidden input -->
                <input type="hidden" name="pid" value="<?= $fetch_products['id'];?>">
                <input type="hidden" name="name" value="<?= $fetch_products['name'];?>">
                <input type="hidden" name="price" value="<?= $fetch_products['price'];?>">
                <input type="hidden" name="image" value="<?= $fetch_products['image'];?>">
                
                <!-- Link để xem chi tiết sản phẩm -->
                <a href="view.php?pid=<?= $fetch_products['id'];?>" class="fas fa-eye"></a>
                
                <!-- Nút thêm sản phẩm vào giỏ hàng -->
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                
                <!-- Hiển thị hình ảnh sản phẩm -->
                <img src="upload_images/<?= $fetch_products['image'];?>" alt="">
                
                <!-- Link đến danh mục sản phẩm tương ứng -->
                <a href="category.php?category=<?= $fetch_products['category'];?>" class="cat"><?= $fetch_products['category'];?></a>
                
                <!-- Tên sản phẩm -->
                <div class="name"><?= $fetch_products['name'];?></div>
                
                <!-- Giá sản phẩm -->
                <div class="flex">
                    <div class="price"><span></span><?= number_format($fetch_products['price'], 0, ',', '.');?><span> đ</span></div>
                    
                    <!-- Số lượng muốn mua -->
                    <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                </div>
                
                <!-- Nút thêm sản phẩm vào giỏ hàng -->
                <button type="submit" name="add_to_cart" class="cart-btn">Thêm vào giỏ hàng</button>
            </form>
            <?php
        }
    } else {
        // Thông báo khi không có sản phẩm nào
        echo '<p class="empty">no products added yet!</p>';
    }
   ?>

</div>
</section>

<!-- Kết thúc phần hiển thị sản phẩm nổi bật -->

<!-- Bắt đầu phần hiển thị tin tức mới nhất -->
<div class="tintuc">
<section class="news-section">
    <h1 class="title9">Tin tức</h1>
    <div class="box-container2">
        <?php
        // Chuẩn bị truy vấn để lấy 6 tin tức mới nhất từ cơ sở dữ liệu
        $select_news = $conn->prepare("SELECT * FROM `news` ORDER BY date DESC LIMIT 6");
        
        // Thực thi truy vấn
        $select_news->execute();
        
        // Kiểm tra xem có tin tức nào được trả về không
        if($select_news->rowCount() > 0){
            // Duyệt qua từng tin tức được trả về
            while($fetch_news = $select_news->fetch(PDO::FETCH_ASSOC)){
                // Bắt đầu div để hiển thị tin tức
               ?>
                <div class="news-box"><a href="home.php" style="color: darkgray;">
                    <img src="upload_images/<?= $fetch_news['image'];?>" alt="">
                    <div class="title-box">
                        <div class="news-date"><?= $fetch_news['date'];?> </div>
                        <div class="news-title"><?= $fetch_news['title'];?></div>
                        <div class="news-content"><?= substr($fetch_news['content'], 0, 150);?>...</div> <!-- Hiển thị phần trích dẫn của nội dung -->
                    </a>
                </div>
                
                </div>
                <?php
            }
        }else{
            // Thông báo khi không có tin tức nào
            echo '<p class="empty">Chưa có tin tức được thêm</p>';
        }
       ?>
    </div>
</section>
</section>
</div>
<!-- Kết thúc phần hiển thị tin tức mới nhất -->

<section class="about">

         <div class="headingg">
   <h1 class="headingg" style="background-color: #eee;" data-aos="fade-up"> Tại sao lại chọn chúng tôi? </h1>

    <div class="about-info">
        <div class="image" data-aos="fade-right">
            <img src="images/trongphong.jpg" alt="">
        </div>

        <div class="content" data-aos="fade-left">
            <h3>Đội ngũ chuyên nghiệp</h3>
            <p>Chúng tôi tự hào giới thiệu thực đơn phong phú với các món nước và đồ ăn nhẹ ngon miệng,
               bổ dưỡng, được chế biến từ trái cây tươi mới,đảm bảo chất lượng và giá cả hợp lý.</p>
            <p>Những món nước của chúng tôi được làm tươi ngay khi đặt hàng,
               và chế biến từ trái cây tươi thay vì làm sẵn - điều mà các quán khác thường hay sử dụng.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Giao hàng nhanh</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Thanh toán đơn giản</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>Hỗ trợ 24/7</span>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<?php include 'review.php';?>
<script src="./plugins/jquery-3.6.0/jquery.min.js"></script>
<script src="./plugins/swiper-8.0.7/js/swiper.min.js"></script>
<script src="./plugins/aos-2.3.4/js/aos.js"></script>
<script src="js/slide_review.js"></script>
<script src="js/addToCart.js"></script>
<SCript src="js/review.js"></SCript>
<section class="about">
    <d class="contact-map-container">
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13195.889735577875!2d107.24851748209423!3d10.487932769491453!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175753a71456ec1%3A0x9527d0ccc44f20ef!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgVGh14bqtdCBDw7RuZyBOZ2jhu4cgQsOgIFLhu4thIC0gVsWpbmcgVMOgdS1DxqEgc-G7nyAx!5e0!3m2!1svi!2s!4v1715831468481!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
      </div>
    </div>
</section>
          <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <!-- custom js file link  -->
   <script src="javascript/script.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <!-- custom js file link  -->
   <script src="javascript/script.js"></script>
   <script>
    var swiper = new Swiper('.hero-slider', {
    loop: true,
    grabCursor: true,
    speed: 1000,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    effect: 'flip',
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
    },
});

</script>


<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Customer_Advisor"
  agent-id="c68a0088-564c-4827-874c-5a62dc7cdcd2"
  language-code="vi"
></df-messenger>
<?php include 'ketnoi/user_footer.php';?>


</body>
</html>
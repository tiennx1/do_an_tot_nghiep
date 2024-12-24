<?php

include 'ketnoi/ketnoi.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'ketnoi/add_cart.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles_using/cn.css">
    <link rel="stylesheet" href="styles_using/font.css">
    <link rel="stylesheet" href="styles_using/main1.css">
    <link rel="stylesheet" href="styles_using/home_giaodien.css">
    <link rel="stylesheet" href="styles_using/oder-slider.css">
    <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>
    <style>
       
    </style>
</head>
<body>
    <?php include 'user/user_header.php';?>
    <?php include 'ketnoi/thongbao.php' ;?>
  
    <?php include 'darklight.php';?>
    <div class="images">
        <img src="images/Tinky Coffee background.jpg" alt="">
    </div>
    <div class="chuyenha">
        <h1>Chuyện nhà của tôi</h1>
    </div>
</body>
</html>
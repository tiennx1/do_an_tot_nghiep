<?php
try {
    $db_name = 'mysql:host=localhost;dbname=food';
    $user_name = 'root';
    $user_password = '';
    $conn = new PDO($db_name, $user_name, $user_password);

} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>

<?php
$hostname = 'localhost'; //Địa chỉ lưu trữ database
$user_data = 'root'; //tài khoản đăng nhập phpmyadmin
$pass_data = ''; //mật khẩu đăng nhập phpmyadmin
$database = 'ass2'; //tên database cần kết nối
$conn = new mysqli($hostname, $user_data, $pass_data, $database);

if (!empty($conn->connect_error)) {
    die("Lỗi kết nối. <br>" . $conn->connect_error);
}
echo "";
?>
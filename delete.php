<?php
require 'connect.php';
// Lấy id cần xóa
$id = $_GET['id'];

// Truy vấn xóa sản phẩm
$sql = "DELETE FROM sanpham WHERE id = $id";
mysqli_query($conn, $sql);

// Chuyển hướng trở lại trang danh sách
header("Location: qlsp.php");
?>
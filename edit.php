<?php require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="themsp.css" />
    <style>
        form {
            width: 70%;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id=$id");
        $row = mysqli_fetch_array($result); ?>
        <h2>Chỉnh sửa sản phẩm</h2>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <label for="tensp">Tên Sản phẩm</label>
            <input type="text" name="tensp" value="<?= $row['tensp'] ?>">
            <label for="mota">Mô tả</label>
            <input type="text" name="mota" value="<?= $row['mota'] ?>">
            <label for="gia">Giá</label>
            <input type="text" name="gia" value="<?= $row['gia'] ?>">
            <label for="soluong">Số lượng</label>
            <input type="text" name="soluong" value="<?= $row['soluong'] ?>">
            <label for="fileToUpload">Ảnh sản phẩm</label>
            <input type="file" name="fileToUpload">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="submit" name="submit" value="Lưu">
        </form>
    <?php } ?>
</body>

</html>
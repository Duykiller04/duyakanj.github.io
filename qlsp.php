<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="qlsp.css">
</head>

<body>
    <div class="nd-td">
        <h1>Quản Lý Sản Phẩm</h1>
    </div>
    <div class="trang-chu">
        <button class="them-sp"><a href="themsp.php">THÊM SẢN PHẨM</a></button>
        <button class="truy-cap">
            <a href="index.php">Truy Cập Trang WEB</a>
        </button>
    </div>
    <table border="1">
        <tr>
            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Số lượng trong kho</th>
            <th colspan="2">Hành Động</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM sanpham");
        // Lặp danh sách sản phẩm từ CSDL
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $row['id'] ?>
                </td>
                <td>
                    <?php echo $row['tensp'] ?>
                </td>
                <td>
                    <img style="height: 70px;" class="imgsp" src="<?php
                    echo $row['sanpham'];
                    ?>">
                </td>
                <td>
                    <?php echo $row['mota'] ?>
                </td>
                <td>
                    <?php echo $row['gia'] ?>
                </td>
                <td>
                    <?php echo $row['soluong'] ?>
                </td>
                <td><a href="edit.php?id=<?php echo $row['id'] ?>">Sửa</a></td>
                <td>
                    <a onclick="return confirm('Bạn có muốn xóa không ?')"
                        href="delete.php?id=<?php echo $row['id'] ?>">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
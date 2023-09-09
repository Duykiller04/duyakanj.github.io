<?php
require 'connect.php';

if (isset($_POST['themsanpham'])) {

    $tensp = $_POST['tensp'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    if (empty($tensp)) {
        $tenspErr = "Tên sản phẩm không được bỏ trống";
    }

    if (empty($mota)) {
        $motaErr = "Mô tả không được bỏ trống";
    }

    if (empty($gia)) {
        $giaErr = "Giá không được bỏ trống";
    } elseif ($gia < 0) {
        $giaErr = "Giá không được bé hơn 0";
    }

    if (empty($soluong)) {
        $soluongErr = "Số lượng không được bỏ trống";
    } elseif ($soluong < 0) {
        $soluongErr = "Số lượng không được bé hơn 0";
    }

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $hasError = false;

    if ($_FILES['upload']['size'] == 0) {
        $uploadErr = "Vui lòng thêm ảnh sản phẩm";
        $hasError = true;
    } else {

        $allowedImageExts = ["jpg", "jpeg", "gif", "png", "svg"];
        $extension = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, $allowedImageExts)) {
            $uploadErr = "Chỉ được upload file có đuôi JPG, JPEG, GIF, PNG hoặc SVG.";
            $hasError = true;
        }

        if ($_FILES["upload"]["size"] > 500000) {
            $uploadErr = "File upload quá lớn.";
            $hasError = true;
        }
    }

    if ($hasError == false) {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            $linkanh = $target_file;
        }
    }

    if (empty($tenspErr) && empty($giaErr) && empty($soluongErr) && empty($uploadErr)) {
        $sql = "INSERT INTO sanpham (tensp, mota, gia, soluong, sanpham) 
          VALUES('$tensp', '$mota', '$gia', '$soluong', '$target_file')";
        mysqli_query($conn, $sql);
        header("Location: qlsp.php");
    }
}
?>


<!-- html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="themsp.css" />
</head>

<body>
    <div class="container">
        <div class="nd-chinh">
            <h1>Thêm Sản Phẩm</h1>
        </div>
        <div class="trang-chu">
            <button><a href="qlsp.php">Quản lý sản phẩm</a></button>
            <button><a href="index.php">Truy Cập Trang WEB</a></button>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="product-name">Tên sản phẩm:</label>
                <input type="text" name="tensp" id="product-name">
                <?php
                if (!empty($tenspErr)) { ?>
                    <p style="color:red;">
                        <?= $tenspErr ?>
                    </p>
                <?php } ?>
            </div>
            <div>
                <label for="product-desc">Mô tả:</label>
                <textarea id="product-desc" name="mota"></textarea>
                <?php if (!empty($motaErr)) { ?>
                    <p style="color:red;">
                        <?= $motaErr ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="product-price">Giá:</label>
                <input type="number" id="product-price" name="gia" />
                <?php if (!empty($giaErr)) { ?>
                    <p style="color:red;">
                        <?= $giaErr ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="product-quantity">Số lượng trong kho:</label>
                <input type="number" id="product-quantity" name="soluong" />
                <?php if (!empty($soluongErr)) { ?>
                    <p style="color:red;">
                        <?= $soluongErr ?>
                    </p>
                <?php } ?>
            </div>

            <div>
                <label for="product-image">Hình ảnh:</label>
                <input type="file" name="upload" id="product-image">
                <?php if (!empty($uploadErr)) { ?>
                    <p style="color:red;">
                        <?= $uploadErr ?>
                    </p>
                <?php } ?>
            </div>
            <div class="them">
                <input type="submit" name="themsanpham" value="Thêm">
            </div>
        </form>
    </div>
</body>

</html>
<?php require 'connect.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tensp = $_POST['tensp'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    // Xử lý upload ảnh
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Xin lỗi, file upload của bạn bị lỗi.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $linkanh = $target_file;
        }
    }

    $query = "UPDATE sanpham SET tensp = '$tensp', mota = '$mota', gia = '$gia', soluong = '$soluong', sanpham ='$linkanh' WHERE id = $id";
    mysqli_query($conn, $query);
    header("Location: qlsp.php");
} ?>
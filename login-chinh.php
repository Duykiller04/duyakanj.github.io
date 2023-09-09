<?php
require 'connect.php';
?>
<?php
//Sử lí cache
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
//--------------------------------------------------------------


if (isset($_POST['btnsend'])) {
    //lấy gtrị từ form
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // Câu lệnh sql kiểm tra thông tin vừa nhập
    $sql = "Select * from user
        Where email = '$email' and password = '$pass'";
    //chạy câu lệnh sql
    $ketqua = $conn->query($sql);
    if ($ketqua->num_rows > 0) {
        header("Location: index.php");
        if ($email == "admin@admin" && $pass == "admin123") {
            header("Location: qlsp.php");
        }
    } else {
        echo '<script>alert("Sai tài khoản hoặc mật khẩu")</script>';
    }



    //Sử lí cache
    header_remove("Cache-Control");
    header_remove("Pragma");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    //---------------------------------------------------------------------

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Sử lí cache -->
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!--------------------->


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="login-chinh.css">
    <style>
        body {
            background-image: url('/test/ass2/img/3dc449b04d9ace524a0ecd247e1fdc83.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="relative">
                <input type="email" placeholder="" id="input1" class="input-cal input-base input" name="email"
                    required />
                <label id="label-input">Email</label>
            </div>
            <div class="relative">
                <input type="password" placeholder="" id="input2" class="input-cal input-base input" name="password"
                    required />
                <label id="label-input">Password</label>
            </div>
            <div class="lay-lai-mk">
                <h3><a href="laylaimk.php">Forgot Password ?</a></h3>
            </div>
            <button type="submit" name="btnsend">Đăng Nhập</button>
            <h3>Don't have an account? <a href="dki.php">Sign up</a></h3>
        </form>
    </div>

</body>

</html>
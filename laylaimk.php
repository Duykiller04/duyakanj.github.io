<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="laylaimk.css" />
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
        <form action="" method="post">
            <div class="relative">
                <input type="text" placeholder="" id="input" class="input-cal input-base" name="username" required />
                <label id="label-input">Username</label>
            </div>
            <div class="relative">
                <input type="email" placeholder="" id="input" class="input-cal input-base" name="email" required />
                <label id="label-input">Email</label>
            </div>
            <button type="submit" name="btn_forgot">Lấy Lại Mật Khẩu</button>
            <h3>Already have an account? <a href="login-chinh.php">Sign in</a></h3>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['btn_forgot'])) {
    // Lấy giá trị username và email từ POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    //Xử lí lấy lại mật khẩu 
    if (isset($_POST['btn_forgot'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM user WHERE username = '$username' AND email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Username và email tồn tại
            // Lấy dòng đầu tiên trả về
            $row = $result->fetch_assoc();

            // Lấy password từ row
            $password = $row['password'];

            // Hiển thị mật khẩu
            echo "<script>alert('Your password is: $password')</script>";
        } else {
            echo "Username hoặc email không chính xác";
        }
    }
}
?>
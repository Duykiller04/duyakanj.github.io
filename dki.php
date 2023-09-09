<?php
require 'connect.php';
?>
<?php
if (isset($_POST['btn_dk'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate username  
    if (empty($username)) {
        $error['username'] = "Vui lòng nhập username";
    } else {
        if (strlen($username) < 6) {
            $error['username'] = "Username quá ngắn (ít nhất 6 kí tự)";
        }
    }
    $sql = "Select * from user Where username = '$username'";
    $ketqua = $conn->query($sql);
    if ($ketqua->num_rows > 0) {
        $error['username'] = "Username đã tồn tại";
    }

    // Validate email
    if (empty($email)) {
        $error['email'] = "Vui lòng nhập email";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email không hợp lệ";
        }
    }
    $sql = "Select * from user Where email = '$email'";
    $ketqua = $conn->query($sql);
    if ($ketqua->num_rows > 0) {
        $error['email'] = "Email đã tồn tại";
    }

    // Validate password
    if (strlen($password) < 6) {
        $error['password'] = "Password quá ngắn (ít nhất 6 kí tự)";
    }
    // Validate password
    if ($password != $_POST['c_password']) {
        $error['password'] = "Mật khẩu không trùng khớp";
    }



    if (!empty($error)) {
        //Trả về thông báo lỗi
        if (!empty($error['username'])) {
            echo $error['username'];
        }

        if (!empty($error['email'])) {
            echo $error['email'];
        }

        if (!empty($error['password'])) {
            echo $error['password'];
        }
    } else {
        // Đăng ký người dùng
        $sql = "
                Insert Into user (username, email, password)
                Values ('$username', '$email', '$password')
            ";
        if ($conn->query($sql)) {
            header("Location: login-chinh.php");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="dki.css" />
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
                <?php if (!empty($error['username']))
                    echo '<span class="error">' . $error['username'] . '</span>' ?>
                </div>
                <div class="relative">
                    <input type="email" placeholder="" id="input" class="input-cal input-base" name="email" required />
                    <label id="label-input">Email</label>
                <?php if (!empty($error['email']))
                    echo '<span class="error">' . $error['email'] . '</span>' ?>
                </div>
                <div class="relative">
                    <input type="password" placeholder="" id="input" class="input-cal input-base" name="password"
                        required />
                    <label id="label-input">Password</label>
                <?php if (!empty($error['password']))
                    echo '<span class="error">' . $error['password'] . '</span>' ?>
                </div>
                <div class="relative">
                    <input type="password" placeholder="" id="input" class="input-cal input-base" name="c_password"
                        required />
                    <label id="label-input">Confirm Password</label>
                </div>
                <button type="submit" name="btn_dk">Đăng Ký</button>
                <h3>Already have an account? <a href="login-chinh.php">Sign in</a></h3>
            </form>
        </div>
    </body>

    </html>
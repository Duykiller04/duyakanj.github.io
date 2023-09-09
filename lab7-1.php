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
    <style>
        form {
            margin: 0 auto;
            width: 350px;
            height: 430px;
            border: 2px solid black;
            background: #ccc;
            text-align: left;
            padding-top: 50px;
            padding-left: 20px;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        form input {
            width: 320px;
            height: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Register form</h1>
        <form action="" method="post">
            <div class="relative">
                <label id="label-input">Username</label>
                <input type="text" placeholder="" id="input" class="input-cal input-base" name="username" required />

                <?php if (!empty($error['username']))
                    echo '<span class="error">' . $error['username'] . '</span>' ?>
                </div>
                <div class="relative">
                    <label id="label-input">Email</label>
                    <input type="email" placeholder="" id="input" class="input-cal input-base" name="email" required />

                <?php if (!empty($error['email']))
                    echo '<span class="error">' . $error['email'] . '</span>' ?>
                </div>
                <div class="relative">
                    <label id="label-input">Password</label>
                    <input type="password" placeholder="" id="input" class="input-cal input-base" name="password"
                        required />

                <?php if (!empty($error['password']))
                    echo '<span class="error">' . $error['password'] . '</span>' ?>
                </div>
                <div class="relative">
                    <label id="label-input">Confirm Password</label>
                    <input type="password" placeholder="" id="input" class="input-cal input-base" name="c_password"
                        required />

                </div>
                <button type="submit" name="btn_dk">Register</button>
            </form>
        </div>
    </body>

    </html>
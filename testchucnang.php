<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            padding: 0px 140px;
            margin-top: 30px;
        }

        .sanpham {
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --main-color: #323232;
            --main-focus: #2d8cf0;
            width: 230px;
            height: 300px;
            background: var(--bg-color);
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px;
            gap: 10px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .card:last-child {
            justify-content: flex-end;
        }

        .card-img {
            transition: all 0.5s;
            display: flex;
            justify-content: center;
        }

        .card-img .img {
            height: 100px;
            width: 200px;
        }

        .card-img .img img {
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    require 'connect.php';

    // Truy vấn dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);

    // Kiểm tra số lượng dữ liệu
    $count = $result->num_rows;

    // In dữ liệu ra HTML
    if ($count > 0) {
        // Tạo biến đếm
        $counter = 1;

        while ($row = $result->fetch_assoc()) {
            // Kiểm tra số lượng id
            if ($counter == 1) {
                echo '<div class="my-pham">';
            }

            echo '<div class="card">';
            // In link ảnh sản phẩm từ cơ sở dữ liệu
            echo '<div class="card-img">
            <div class="img">
            <img src="' . $row["sanpham"] . '" alt="Sản phẩm">
            </div>
            </div>';
            // In thông tin sản phẩm từ cơ sở dữ liệu
            echo '<div class="card-title">' . $row["tensp"] . '</div>';
            echo '<div class="card-subtitle">' . $row["mota"] . '</div>';
            echo '<div class="card-footer">';
            echo '<div class="card-price">' . $row["gia"] . '</div>';
            echo '<button class="card-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z">
                </path>
                <path
                    d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                </path>
                <path
                    d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                </path>
                <path
                    d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z">
                </path>
            </svg>
        </button>';
            echo '</div>';
            echo '</div>';

            // Kiểm tra số lượng id
            if ($counter == 4 || $counter == $count) {
                echo '</div>';
            }

            // Tăng biến đếm
            $counter++;

            // Kiểm tra số lượng id
            if ($counter > 4 && $counter <= $count) {
                echo '<div class="my-pham">';
            }
        }
    } else {
        echo "Không có dữ liệu";
    }


    // Đóng kết nối cơ sở dữ liệu
    $conn->close();
    ?>
</body>

</html>
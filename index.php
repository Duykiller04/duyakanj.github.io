<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <img src="/test/ass2/img/heart-2501404_1280.png" alt="" />
                </div>
                <div class="shearch">
                    <div class="group">
                        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                        <input placeholder="Search" type="search" class="input" />
                    </div>
                </div>
                <div class="nav-nd">
                    <ul>
                        <li>
                            <a href="#" id="a-fist"> Trang Chủ </a>
                        </li>
                        <li>
                            <a href="#"> Sản Phẩm </a>
                        </li>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Tin Tức</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="card-gio-hang">
                    <a href="login-chinh.php"><img src="/test/ass2/img/user.png" alt="" /></a>
                    <a href="#"><img src="/test/ass2/img/Shopping Cart.png" alt="" /></a>
                </div>
            </nav>
            <main>
                <div class="banner">
                    <div class="mua-ngay">
                        <button><a href="#">mua ngay</a></button>
                    </div>
                    <img src="/test/ass2/img/s22.gif" alt="" />
                </div>
                <div class="content-1"></div>
                <div class="content-2">
                    <div class="text-content-2">
                        <h1>Vẻ Đẹp Là Sự Tự Tin Của Người Phụ Nữ</h1>
                    </div>
                    <!-- start-hanghoa -->
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

                            echo '<div class="card" style="text-align: center;">';
                            // In link ảnh sản phẩm từ cơ sở dữ liệu
                            echo '<div class="card-img">
                            <div class="img">
                            <img src="' . $row["sanpham"] . '" style="max-width: 200px; max-height: 100px;">
                            </div>
                            </div>';
                            // In thông tin sản phẩm từ cơ sở dữ liệu
                            echo '<div class="card-title">' . $row["tensp"] . '</div>';
                            echo '<div class="card-subtitle">' . $row["mota"] . '</div>';
                            echo '<hr class="card-divider" />';
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
                            if ($counter == 4) {
                                echo '</div>';
                                $counter = 0;
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
                    <!-- end-hanghoa -->
                </div>
            </main>
            <hr id="hr-end" />
            <footer>
                <div class="content-1-footer">
                    <h3>Tìm Hiểu</h3>
                    <br />
                    <ul>
                        <li><a href="#">Lịch Sử</a></li>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Xuất Xứ</a></li>
                        <li><a href="#">Nhà Cung Cấp</a></li>
                        <li><a href="#">Dịch Vụ</a></li>
                    </ul>
                </div>
                <div class="content-1-footer">
                    <h3>Cơ Hội Nghề Nghiệp</h3>
                    <br />
                    <ul>
                        <li><a href="#">Thông Tin Tuyển Dụng</a></li>
                    </ul>
                </div>
                <div class="content-1-footer">
                    <h3>Chính Sách</h3>
                    <br />
                    <ul>
                        <li><a href="#">Các Câu Hỏi Thường Gặp</a></li>
                        <li><a href="#">Điều Khoản Và Điều Kiện</a></li>
                        <li><a href="#">Chính Sách Về Quyền Riêng Tư</a></li>
                    </ul>
                    <br />
                    <h3>Ngôn Ngữ</h3>
                    <div class="img-nn">
                        <img src="/test/ass2/img/vietnam.png" alt="" />
                        <img src="/test/ass2/img/united-states.png" alt="" />
                    </div>
                </div>
                <div class="content-1-footer">
                    <h3>Liên Hệ Với Chúng Tôi</h3>
                    <br />
                    <ul>
                        <li><a href="#">Liên Hệ</a></li>
                        <li><a href="#">Phản Hồi Chất Lượng Dịch Vụ</a></li>
                    </ul>
                    <div class="img-lh">
                        <a href="https://www.facebook.com/Duyphan04"><img src="/test/ass2/img/facebook.png"
                                alt="facebook" /></a>
                        <a class="ig" href="https://www.instagram.com/orinx04/"><img src="/test/ass2/img/instagram.png"
                                alt="instagram" /></a>
                        <a href="https://www.youtube.com/channel/UCEODmjhchAirxOC-E_2Ln4g"><img
                                src="/test/ass2/img/youtube.png" alt="youtube" /></a>
                    </div>
                </div>
            </footer>
        </header>
    </div>
</body>

</html>
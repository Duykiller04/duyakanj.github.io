-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 07, 2023 lúc 12:18 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ass2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `sanpham` varchar(50) NOT NULL,
  `mota` longtext NOT NULL,
  `gia` int(50) NOT NULL,
  `soluong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `sanpham`, `mota`, `gia`, `soluong`) VALUES
(1, 'Son môi cao cấp', '/test/ass2/img/son-moi-han-quoc-1.jpg', 'Son môi', 100000, 60),
(2, 'Sữa  rửa mặt trà xanh', '/test/ass2/img/srm-greentea.jpg', 'Sữa Rửa mặt', 120000, 120),
(3, 'Sữa  rửa mặt Gạo Hàn Quốc', '/test/ass2/img/images.jpg', 'Sữa rửa mặt', 130000, 88),
(4, 'Nước Tẩy  trang không cồn', 'img/744778dc2f2ece0172d5409a1f42178f.jpg', 'Nước Tẩy trang', 90000, 342),
(11, 'Sữa tắm bọt', 'img/sua-tam-nuoc-hoa-tesori-d-oriente-3.jpg', 'Sữa tắm', 300000, 50),
(13, 'Bộ mỹ phẩm', 'img/banner-my-pham.jpg', 'Mỹ phẩm', 300000, 87),
(14, 'test', 'img/sms-marketing.jpg', 'test', 700000, 234),
(15, 'ass2', 'img/tải xuống.png', 'hjsdhfjds', 66666, 66666),
(17, 'Bộ mỹ phẩmfsd', 'img/thiet-ke-logo-my-pham-10_1584438206.jpg', 'dsfdsf', 66666, 66666);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin', 'admin123'),
(2, 'duykv', 'haijano04@gmail.com', '12345678'),
(16, 'Duykiller04', 'hoanghuytocontacts@gmail.com', '123456'),
(17, 'Duykop', 'nwognq1735@mimpi99.com', '12345678'),
(18, 'Kienhh', 'kien@gmail.com', 'kien123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

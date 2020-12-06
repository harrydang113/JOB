-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2020 lúc 02:19 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `congviec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `id` int(11) NOT NULL,
  `linh_vuc_id` int(11) NOT NULL,
  `cong_ty` varchar(255) NOT NULL,
  `chuc_danh` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `luong` varchar(255) NOT NULL,
  `vi_tri` varchar(255) NOT NULL,
  `lien_he` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`id`, `linh_vuc_id`, `cong_ty`, `chuc_danh`, `mo_ta`, `luong`, `vi_tri`, `lien_he`, `email`, `ngay_dang`) VALUES
(1, 1, 'Ngân hàng VCb', 'Giao dịch viên', 'Lorem ipsum is simply damiry text of the printing a', '20 triệu', 'Cà mau', 'Lê Thanh Công', 'Cong@yahoo.com', '2020-10-14 07:17:53'),
(2, 2, 'Meosoft', 'CEO1', 'Lorem ipsum is simply damiry text of the printing a', '50 triệu', 'Tp Hồ Chí Minh', 'Nguyễn Thanh Nhàn', 'Thanhnhan@yahoo.com', '2020-10-14 07:17:53'),
(13, 2, 'TNHH Lâm Tâm', 'Giám đốc công nghệ', 'Phát triển hệ thống thông tin', '25 triệu', 'Cà Mau', 'Lamtam@gmail.com', 'nhodf123@gmail.com', '2020-11-23 07:07:23'),
(14, 3, 'TNHH Lâm Tâm', 'Giám đốc Cây trồng', 'Phát triển hệ thống nông nghiệp', '25 triệu', 'Cà Mau', 'Lamtam@gmail.com', 'nhodf123@gmail.com', '2020-11-23 07:15:50'),
(15, 4, 'TNHH Lâm Tâm', 'ki sư xây dựng1', 'Phát triển và điều hành nhà máy', '25 triệu', 'Cà Mau', 'Lamtam@gmail.com', 'nhodf123@gmail.com', '2020-11-23 07:16:27'),
(17, 2, 'TNHH Lâm Tâm', 'Trưởng phòng thông tin1', 'Phát triển ứng dụng đa điểm', '25 triệu', 'Cà Mau', 'Lamtam@gmail.com', 'nhodf123@gmail.com', '2020-11-23 09:20:42'),
(18, 4, 'TNHH Lâm Tâm', 'Phó phòng hành chinh3', '', '15 triệu', 'Cà Mau', 'Lamtam@gmail.com', 'nhodf123@gmail.com', '2020-11-23 09:27:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(11) NOT NULL,
  `ten_linh_vuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `ten_linh_vuc`) VALUES
(1, 'Kinh tế'),
(2, 'Công nghệ'),
(3, 'Nông nghiệp'),
(4, 'Xây dựng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `congviec`
--
ALTER TABLE `congviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

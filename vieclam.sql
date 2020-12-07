-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2020 lúc 03:47 AM
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
-- Cơ sở dữ liệu: `vieclam`
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
(45, 1, 'sdfsadfasdfasd', 'sdfasfasdfdsaf', '', '', '', '', '', '2020-12-06 12:22:10'),
(50, 0, 'sdfsadfsadfasdfasdf', 'sdfasfasdfdsaf', '', '', '', '', '', '2020-12-06 13:06:32'),
(51, 1, 'asdfadsfasdfasd', 'adfgadfhagadga', '', '', '', '', '', '2020-12-06 13:07:12'),
(52, 1, 'sdfsadfasdfasd', 'adfgadfhagadga12', '', '', '', '', '', '2020-12-06 13:09:34'),
(53, 0, 'asdfadsfasdfasd', 'adfgadfhagadga', '', '', '', '', '', '2020-12-06 13:24:13'),
(54, 2, 'asdfadsfasdfasd', 'asdfasdfasdfadsfasd', '', '', '', '', '', '2020-12-06 13:25:40'),
(55, 2, 'asdfadsfasdfasd', 'asdfasdfasdfadsfasd', '', '', '', '', '', '2020-12-06 13:28:57'),
(57, 0, 'asdfadsfasdfasd', 'adfgadfhagadga', '', '', '', '', '', '2020-12-06 13:29:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `idTK` int(11) NOT NULL,
  `TenTK` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`idTK`, `TenTK`, `MatKhau`) VALUES
(1, 'admin', '123456');

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
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`idTK`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  MODIFY `idTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

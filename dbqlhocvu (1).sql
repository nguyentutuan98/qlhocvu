-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 22, 2021 lúc 11:44 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbqlhocvu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baikiemtra`
--

CREATE TABLE `baikiemtra` (
  `makt` int(10) NOT NULL,
  `tenkt` varchar(255) DEFAULT NULL,
  `ngaylam` datetime(6) DEFAULT NULL,
  `thoigianlam` time(6) DEFAULT NULL,
  `soluongcau` int(10) DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `mamh` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baikiemtra`
--

INSERT INTO `baikiemtra` (`makt`, `tenkt`, `ngaylam`, `thoigianlam`, `soluongcau`, `magv`, `mamh`) VALUES
(1, 'cuoiky', '2021-07-18 16:30:00.000000', '00:00:05.000000', 1, 1, NULL),
(2, 'giuaky', '2021-08-22 14:57:00.000000', '00:00:45.000000', 2, 1, NULL),
(3, 'cuoiky', '2021-08-21 22:27:00.000000', '00:00:05.000000', NULL, 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

CREATE TABLE `baitap` (
  `mabt` int(10) NOT NULL,
  `tenbt` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `mamh` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baitap`
--

INSERT INTO `baitap` (`mabt`, `tenbt`, `noidung`, `magv`, `mamh`, `url`) VALUES
(13, 'Java', 'ghgfh', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `mach` int(10) NOT NULL,
  `noidung` text DEFAULT NULL,
  `luachon1` varchar(255) DEFAULT NULL,
  `luachon2` varchar(255) DEFAULT NULL,
  `luachon3` varchar(255) DEFAULT NULL,
  `luachon4` varchar(255) DEFAULT NULL,
  `dapan` varchar(255) DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `mamh` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`mach`, `noidung`, `luachon1`, `luachon2`, `luachon3`, `luachon4`, `dapan`, `magv`, `mamh`) VALUES
(3, 'adasd', 'adasd', 'adasd', 'asdasd', 'adasdasd', '2', 1, 5),
(4, '1+1=', '2', '3', '4', '5', '1', 1, 10),
(5, '2+2=', '3', '4', '5', '6', '2', 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbaikiemtra`
--

CREATE TABLE `chitietbaikiemtra` (
  `mach` int(10) NOT NULL,
  `makt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietbaikiemtra`
--

INSERT INTO `chitietbaikiemtra` (`mach`, `makt`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietlophoc`
--

CREATE TABLE `chitietlophoc` (
  `malop` int(10) NOT NULL,
  `mamh` int(10) NOT NULL,
  `ngaybd` date DEFAULT NULL,
  `ngaykt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietlophoc`
--

INSERT INTO `chitietlophoc` (`malop`, `mamh`, `ngaybd`, `ngaykt`) VALUES
(1, 5, NULL, NULL),
(1, 10, '2021-08-22', '2021-08-23'),
(1, 11, '2021-08-22', '2021-08-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmon`
--

CREATE TABLE `chitietmon` (
  `mamh` int(10) NOT NULL,
  `magv` int(10) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietmon`
--

INSERT INTO `chitietmon` (`mamh`, `magv`, `url`) VALUES
(5, 1, NULL),
(5, 2, NULL),
(5, 3, NULL),
(10, 1, NULL),
(10, 2, NULL),
(10, 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diembt`
--

CREATE TABLE `diembt` (
  `madiembt` int(10) NOT NULL,
  `diem` int(10) DEFAULT NULL,
  `mabt` int(10) DEFAULT NULL,
  `masv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemkt`
--

CREATE TABLE `diemkt` (
  `madiemkt` int(10) NOT NULL,
  `diem` int(10) DEFAULT NULL,
  `makt` int(10) DEFAULT NULL,
  `masv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan`
--

CREATE TABLE `doan` (
  `madoan` int(10) NOT NULL,
  `tendoan` varchar(255) DEFAULT NULL,
  `mieuta` text DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `mamh` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `doan`
--

INSERT INTO `doan` (`madoan`, `tendoan`, `mieuta`, `magv`, `mamh`, `url`) VALUES
(6, 'ssdf', 'sadasd', 1, 5, 'BaoCaoLV (3).21.docx'),
(7, 'xây dựng web bằng java', 'Sử dụng ngôn ngữ java xây dựng 1 web bán hàng', 1, 10, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `magv` int(10) NOT NULL,
  `idgv` varchar(255) DEFAULT NULL,
  `tengv` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `congviec` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`magv`, `idgv`, `tengv`, `taikhoan`, `matkhau`, `sdt`, `congviec`) VALUES
(1, NULL, 'Nguyễn Ngọc Lâm', 'gv1', '123', 909090909, NULL),
(2, NULL, 'Lương An Vinh', 'gv2', '123', NULL, NULL),
(3, NULL, 'Ngô Xuân Bách', 'gv3', '123', NULL, NULL),
(4, NULL, 'Bùi Nhật Bằng', 'gv4', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `makq` int(10) NOT NULL,
  `masv` int(10) DEFAULT NULL,
  `loai` varchar(255) DEFAULT NULL,
  `mamh` int(10) DEFAULT NULL,
  `diemgk` int(10) DEFAULT NULL,
  `diemck` int(10) DEFAULT NULL,
  `tongdiem` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lambaitap`
--

CREATE TABLE `lambaitap` (
  `mabt` int(10) NOT NULL,
  `masv` int(10) NOT NULL,
  `noidungbailam` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lamkiemtra`
--

CREATE TABLE `lamkiemtra` (
  `makt` int(10) NOT NULL,
  `masv` int(10) NOT NULL,
  `mach` int(10) NOT NULL,
  `dapan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `malop` int(10) NOT NULL,
  `tenlop` varchar(255) DEFAULT NULL,
  `soluongsv` varchar(255) DEFAULT NULL,
  `chunhiem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`malop`, `tenlop`, `soluongsv`, `chunhiem`) VALUES
(1, 'D16_TH03', '4', 'Nguyễn Ngọc Lâm'),
(7, 'D16_TH06', NULL, 'Ngô Xuân Bách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` int(10) NOT NULL,
  `tenmonhoc` text DEFAULT NULL,
  `sotiet` int(10) DEFAULT NULL,
  `sotinchi` int(10) DEFAULT NULL,
  `hocky` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `tenmonhoc`, `sotiet`, `sotinchi`, `hocky`) VALUES
(5, 'Lập trình hướng đối tượng', 45, 3, 1),
(10, 'Toán A2', 45, 3, 1),
(11, 'Toán A1', 45, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `manhom` int(10) NOT NULL,
  `tennhom` varchar(255) DEFAULT NULL,
  `soluong` int(10) DEFAULT NULL,
  `madoan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`manhom`, `tennhom`, `soluong`, `madoan`) VALUES
(3, 'Xây dựng web 2', NULL, 7),
(4, 'Xây dựng web 1', NULL, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `maph` int(10) NOT NULL,
  `mayc` int(10) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `masv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` int(10) NOT NULL,
  `idsv` varchar(255) DEFAULT NULL,
  `tensv` varchar(255) DEFAULT NULL,
  `malop` int(10) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(255) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `idsv`, `tensv`, `malop`, `taikhoan`, `matkhau`, `gioitinh`, `sdt`) VALUES
(3, NULL, 'Lê Phước Sang', 1, 'sv5', '123', 'Nữ', 999999999),
(4, NULL, 'Lê Phước Sang', 1, 'sv3', '123', 'Nam', 999999999),
(5, NULL, 'Lê Phước Sang', 1, 'sv4', '123', 'Nam', 999999999),
(6, NULL, 'Lê Phước Sang', 1, 'sv6', '123', 'Nam', 999999999),
(7, NULL, 'Nguyễn Hoàng Phúc', 7, 'sv7', '123', 'Nam', 909862164);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhviennhom`
--

CREATE TABLE `thanhviennhom` (
  `manhom` int(10) NOT NULL,
  `masv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhviennhom`
--

INSERT INTO `thanhviennhom` (`manhom`, `masv`) VALUES
(3, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thaoluan`
--

CREATE TABLE `thaoluan` (
  `matl` int(10) NOT NULL,
  `detaitl` varchar(255) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `ngaydang` date DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `masv` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucau`
--

CREATE TABLE `yeucau` (
  `mayc` int(10) NOT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `masv` int(10) DEFAULT NULL,
  `magv` int(10) DEFAULT NULL,
  `phanhoi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baikiemtra`
--
ALTER TABLE `baikiemtra`
  ADD PRIMARY KEY (`makt`),
  ADD KEY `magv` (`magv`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`mabt`),
  ADD KEY `magv` (`magv`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`mach`) USING BTREE,
  ADD KEY `magv` (`magv`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `chitietbaikiemtra`
--
ALTER TABLE `chitietbaikiemtra`
  ADD PRIMARY KEY (`mach`,`makt`) USING BTREE,
  ADD KEY `mach` (`mach`),
  ADD KEY `makt` (`makt`);

--
-- Chỉ mục cho bảng `chitietlophoc`
--
ALTER TABLE `chitietlophoc`
  ADD PRIMARY KEY (`malop`,`mamh`),
  ADD KEY `malop` (`malop`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `chitietmon`
--
ALTER TABLE `chitietmon`
  ADD PRIMARY KEY (`mamh`,`magv`) USING BTREE,
  ADD KEY `magv` (`magv`);

--
-- Chỉ mục cho bảng `diembt`
--
ALTER TABLE `diembt`
  ADD PRIMARY KEY (`madiembt`),
  ADD KEY `mabt` (`mabt`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `diemkt`
--
ALTER TABLE `diemkt`
  ADD PRIMARY KEY (`madiemkt`),
  ADD KEY `makt` (`makt`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`madoan`),
  ADD KEY `magv` (`magv`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magv`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`makq`),
  ADD KEY `masv` (`masv`),
  ADD KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `lambaitap`
--
ALTER TABLE `lambaitap`
  ADD PRIMARY KEY (`mabt`,`masv`),
  ADD KEY `mabt` (`mabt`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `lamkiemtra`
--
ALTER TABLE `lamkiemtra`
  ADD PRIMARY KEY (`makt`,`masv`,`mach`) USING BTREE,
  ADD KEY `masv` (`masv`),
  ADD KEY `makt` (`makt`),
  ADD KEY `mach` (`mach`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`) USING BTREE;

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`manhom`),
  ADD KEY `manhom` (`manhom`),
  ADD KEY `madoan` (`madoan`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`maph`),
  ADD KEY `masv` (`masv`),
  ADD KEY `mayc` (`mayc`),
  ADD KEY `magv` (`magv`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `malop` (`malop`);

--
-- Chỉ mục cho bảng `thanhviennhom`
--
ALTER TABLE `thanhviennhom`
  ADD PRIMARY KEY (`manhom`,`masv`) USING BTREE,
  ADD KEY `manhom` (`manhom`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD PRIMARY KEY (`matl`),
  ADD KEY `magv` (`magv`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD PRIMARY KEY (`mayc`),
  ADD KEY `masv` (`masv`),
  ADD KEY `magv` (`magv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baikiemtra`
--
ALTER TABLE `baikiemtra`
  MODIFY `makt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `baitap`
--
ALTER TABLE `baitap`
  MODIFY `mabt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `mach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `doan`
--
ALTER TABLE `doan`
  MODIFY `madoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `magv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `makq` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `malop` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mamh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhom`
--
ALTER TABLE `nhom`
  MODIFY `manhom` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `maph` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `masv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  MODIFY `matl` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `mayc` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baikiemtra`
--
ALTER TABLE `baikiemtra`
  ADD CONSTRAINT `baikiemtra_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `baikiemtra_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD CONSTRAINT `baitap_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `baitap_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `cauhoi_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `chitietbaikiemtra`
--
ALTER TABLE `chitietbaikiemtra`
  ADD CONSTRAINT `chitietbaikiemtra_ibfk_1` FOREIGN KEY (`mach`) REFERENCES `cauhoi` (`mach`),
  ADD CONSTRAINT `chitietbaikiemtra_ibfk_2` FOREIGN KEY (`makt`) REFERENCES `baikiemtra` (`makt`);

--
-- Các ràng buộc cho bảng `chitietlophoc`
--
ALTER TABLE `chitietlophoc`
  ADD CONSTRAINT `chitietlophoc_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lophoc` (`malop`),
  ADD CONSTRAINT `chitietlophoc_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `chitietmon`
--
ALTER TABLE `chitietmon`
  ADD CONSTRAINT `chitietmon_ibfk_1` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`),
  ADD CONSTRAINT `chitietmon_ibfk_2` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`);

--
-- Các ràng buộc cho bảng `diembt`
--
ALTER TABLE `diembt`
  ADD CONSTRAINT `diembt_ibfk_1` FOREIGN KEY (`mabt`) REFERENCES `baitap` (`mabt`),
  ADD CONSTRAINT `diembt_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Các ràng buộc cho bảng `diemkt`
--
ALTER TABLE `diemkt`
  ADD CONSTRAINT `diemkt_ibfk_1` FOREIGN KEY (`makt`) REFERENCES `baikiemtra` (`makt`),
  ADD CONSTRAINT `diemkt_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Các ràng buộc cho bảng `doan`
--
ALTER TABLE `doan`
  ADD CONSTRAINT `doan_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `doan_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`);

--
-- Các ràng buộc cho bảng `lambaitap`
--
ALTER TABLE `lambaitap`
  ADD CONSTRAINT `lambaitap_ibfk_1` FOREIGN KEY (`mabt`) REFERENCES `baitap` (`mabt`),
  ADD CONSTRAINT `lambaitap_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Các ràng buộc cho bảng `lamkiemtra`
--
ALTER TABLE `lamkiemtra`
  ADD CONSTRAINT `lamkiemtra_ibfk_1` FOREIGN KEY (`makt`) REFERENCES `baikiemtra` (`makt`),
  ADD CONSTRAINT `lamkiemtra_ibfk_3` FOREIGN KEY (`mach`) REFERENCES `cauhoi` (`mach`),
  ADD CONSTRAINT `lamkiemtra_ibfk_4` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `phanhoi_ibfk_1` FOREIGN KEY (`mayc`) REFERENCES `yeucau` (`mayc`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lophoc` (`malop`);

--
-- Các ràng buộc cho bảng `thanhviennhom`
--
ALTER TABLE `thanhviennhom`
  ADD CONSTRAINT `thanhviennhom_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `thanhviennhom_ibfk_3` FOREIGN KEY (`manhom`) REFERENCES `nhom` (`manhom`);

--
-- Các ràng buộc cho bảng `thaoluan`
--
ALTER TABLE `thaoluan`
  ADD CONSTRAINT `thaoluan_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `thaoluan_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`);

--
-- Các ràng buộc cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD CONSTRAINT `yeucau_ibfk_1` FOREIGN KEY (`masv`) REFERENCES `sinhvien` (`masv`),
  ADD CONSTRAINT `yeucau_ibfk_2` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

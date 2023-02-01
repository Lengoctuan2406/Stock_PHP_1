-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2023 at 06:59 PM
-- Server version: 5.7.36
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprises`
--

-- --------------------------------------------------------

--
-- Table structure for table `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
CREATE TABLE IF NOT EXISTS `enterprises` (
  `enterprise_id` varchar(50) NOT NULL,
  `enterprise_code` varchar(20) DEFAULT NULL,
  `enterprise_name` tinytext,
  `enterprise_nam_thanh_lap` varchar(50) DEFAULT NULL,
  `enterprise_von_dieu_le` varchar(50) DEFAULT NULL,
  `enterprise_so_luong_nhan_su` varchar(50) DEFAULT NULL,
  `enterprise_so_luong_chi_nhanh` varchar(50) DEFAULT NULL,
  `enterprise_so_luong_cong_ty_con_lien_ket` varchar(50) DEFAULT NULL,
  `enterprise_ngay_niem_yet` varchar(50) DEFAULT NULL,
  `enterprise_noi_niem_yet` tinytext,
  `enterprise_gia_chao_san` varchar(50) DEFAULT NULL,
  `enterprise_gia_ngay_giao_dich_dau_tien` varchar(50) DEFAULT NULL,
  `enterprise_ngay_phat_hanh_cuoi` varchar(50) DEFAULT NULL,
  `enterprise_khoi_luong_niem_yet_lan_dau` varchar(50) DEFAULT NULL,
  `enterprise_khoi_luong_dang_niem_yet` varchar(50) DEFAULT NULL,
  `enterprise_khoi_luong_co_phieu_dang_luu_hanh` varchar(50) DEFAULT NULL,
  `enterprise_tong_quan` mediumtext,
  PRIMARY KEY (`enterprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enterprises`
--

INSERT INTO `enterprises` (`enterprise_id`, `enterprise_code`, `enterprise_name`, `enterprise_nam_thanh_lap`, `enterprise_von_dieu_le`, `enterprise_so_luong_nhan_su`, `enterprise_so_luong_chi_nhanh`, `enterprise_so_luong_cong_ty_con_lien_ket`, `enterprise_ngay_niem_yet`, `enterprise_noi_niem_yet`, `enterprise_gia_chao_san`, `enterprise_gia_ngay_giao_dich_dau_tien`, `enterprise_ngay_phat_hanh_cuoi`, `enterprise_khoi_luong_niem_yet_lan_dau`, `enterprise_khoi_luong_dang_niem_yet`, `enterprise_khoi_luong_co_phieu_dang_luu_hanh`, `enterprise_tong_quan`) VALUES
('1', 'MAMAA', 'Moneyy', '2001', '200001', '21', '2', '1', '20/10/2002', 'Lam son, Ninh Son', '20001', '20000', '20/10/2010', '10', '10', '100000', '');

-- --------------------------------------------------------

--
-- Table structure for table `financial_reports`
--

DROP TABLE IF EXISTS `financial_reports`;
CREATE TABLE IF NOT EXISTS `financial_reports` (
  `financial_report_id` varchar(50) NOT NULL,
  `enterprise_id` varchar(50) DEFAULT NULL,
  `financial_type` varchar(20) DEFAULT NULL,
  `financial_year` int(11) DEFAULT NULL,
  `financial_quarter` int(11) DEFAULT NULL,
  `financial_doanh_thu_thuan` float DEFAULT NULL,
  `financial_loi_nhuan_gop` float DEFAULT NULL,
  `financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh` float DEFAULT NULL,
  `financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep` float DEFAULT NULL,
  `financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me` float DEFAULT NULL,
  `financial_tai_san_ngan_han` float DEFAULT NULL,
  `financial_tong_tai_san` float DEFAULT NULL,
  `financial_no_phai_tra` float DEFAULT NULL,
  `financial_no_ngan_han` float DEFAULT NULL,
  `financial_von_chu_so_huu` float DEFAULT NULL,
  `financial_eps_4_quy_gan_nhat` float DEFAULT NULL,
  `financial_bvps_co_ban` float DEFAULT NULL,
  `financial_pe_co_ban` float DEFAULT NULL,
  `financial_ros_co_ban` float DEFAULT NULL,
  `financial_roea` float DEFAULT NULL,
  `financial_roaa` float DEFAULT NULL,
  PRIMARY KEY (`financial_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_reports`
--

INSERT INTO `financial_reports` (`financial_report_id`, `enterprise_id`, `financial_type`, `financial_year`, `financial_quarter`, `financial_doanh_thu_thuan`, `financial_loi_nhuan_gop`, `financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh`, `financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep`, `financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me`, `financial_tai_san_ngan_han`, `financial_tong_tai_san`, `financial_no_phai_tra`, `financial_no_ngan_han`, `financial_von_chu_so_huu`, `financial_eps_4_quy_gan_nhat`, `financial_bvps_co_ban`, `financial_pe_co_ban`, `financial_ros_co_ban`, `financial_roea`, `financial_roaa`) VALUES
('BC1_2020_Q1', '1', NULL, 2020, 1, 19232700000000, 3763060000000, 2635680000000, 2304760000000, 2285290000000, 34134100000000, 107109000000000, 57045600000000, 29619300000000, 50063400000000, 3031, 18132, 5.36, NULL, 4.67, 2.19),
('BC1_2020_Q2', '1', NULL, 2020, 2, 20422200000000, 3705500000000, 3095720000000, 2755560000000, 2742830000000, 39021200000000, 112644000000000, 60063600000000, 33561300000000, 52580600000000, 3151, 19044, 8.51, 13.49, 5.34, 2.5),
('BC1_2020_Q3', '1', NULL, 2020, 3, 24685600000000, 5169070000000, 4240990000000, 3785120000000, 3772710000000, 43319400000000, 117472000000000, 62485000000000, 35959300000000, 54987300000000, 3774, 16596, 7, 15.33, 7.01, 3.28),
('BC1_2020_Q4', '1', NULL, 2020, 4, 25778100000000, 6267240000000, 5331720000000, 4660720000000, 4637850000000, 56800300000000, 131511000000000, 72291600000000, 51975200000000, 59219800000000, 4503, 17873, 9.21, 18.08, 8.12, 3.72),
('BC1_2021_Q1', '1', NULL, 2021, 1, 31176900000000, 8183040000000, 7683340000000, 7005560000000, 6977550000000, 63943200000000, 138982000000000, 72760700000000, 51504100000000, 66221600000000, 5824, 19987, 8.04, 22.47, 11.12, 5.16),
('BC1_2021_Q2', '1', NULL, 2021, 2, 35118400000000, 11477100000000, 10323700000000, 9745150000000, 9721410000000, 82425700000000, 159809000000000, 85824700000000, 66589900000000, 73984400000000, 7545, 16541, 6.83, 27.75, 13.87, 6.51),
('BC1_2021_Q3', '1', NULL, 2021, 3, 38673800000000, 11860900000000, 10961100000000, 10350800000000, 10351700000000, 95958400000000, 174643000000000, 90317600000000, 71995600000000, 84325700000000, 8590, 18852, 6.16, 26.76, 13.08, 6.19),
('BC1_2021_Q4', '1', NULL, 2021, 4, 44710700000000, 9578410000000, 8040290000000, 7419400000000, 7427440000000, 94154900000000, 178236000000000, 87455800000000, 73459300000000, 90780200000000, 8630, 20295, 5.38, 16.59, 8.48, 4.21),
('BC1_2022_Q1', '1', NULL, 2022, 1, 44058100000000, 10108300000000, 8924400000000, 8206330000000, 8216960000000, 100440000000000, 185847000000000, 86889200000000, 72447600000000, 98957900000000, 8376, 22124, 5.38, 18.63, 8.66, 4.51),
('BC1_2022_Q2', '1', NULL, 2022, 2, 374221000000, 6539620000000, 4312600000000, 4022570000000, 4032230000000, 120221000000000, 207497000000000, 107581000000000, 93614200000000, 99915400000000, 6689, 17183, 3.33, 10.75, 4.06, 2.05),
('BC1_2022_Q3', '1', NULL, 2022, 3, 34103300000000, 1000730000000, 1351520000000, 1785710000000, 1774130000000, 96870600000000, 183805000000000, 85729600000000, 72529800000000, 98075500000000, 3705, 16867, 5.72, -5.24, -1.76, -0.91),
('BC2_2021_Q1', '2', NULL, 2021, 1, 2613680, 178673000, 178471000, 163745000, 144609000, 15090100, 24600700, 11563000, 8038890, 13037700, 1388, 27277, 16.57, 6.26, 1.12, 0.57),
('BC2_2021_Q2', '2', NULL, 2021, 2, 3063170, 260686000, 196609000, 183294000, 163594000, 15203400, 24588600, 11652100, 8172370, 12936500, 1212, 27066, 23.77, 5.98, 1.26, 0.67),
('BC2_2021_Q3', '2', NULL, 2021, 3, 3980460, 204227000, 227370000, 240354000, 221141000, 15492500, 24882500, 11794800, 8229880, 13087800, 1262, 27382, 22.42, 6.04, 1.7, 0.89),
('BC2_2021_Q4', '2', NULL, 2021, 4, 4569910, 254390000, 10242000, 102452000, 84458000, 15445600, 24693000, 12171700, 8625940, 12521300, 1284, 26197, 21.26, 2.24, 0.66, 0.34),
('BC3_2021_Q1', '3', NULL, 2021, 1, 1903820, 353867000, 1065480, 861823000, 863803000, 37788900, 56307500, 18060500, 3238930, 38247000, 459, 17569, 160.74, 45.27, 2.28, 1.53),
('BC3_2021_Q2', '3', NULL, 2021, 2, 1571960, 74470000, 615157000, 507290000, 510084000, 38205100, 56368500, 18103200, 3727360, 38265300, 856, 17578, 87.95, 32.27, 1.33, 0.91),
('BC3_2021_Q3', '3', NULL, 2021, 3, 370502000, 1003720, -885557000, -856393000, -855402000, 37713900, 55359000, 17890300, 3728430, 37468700, 398, 17212, 208.56, -231.14, -2.26, -1.53),
('BC3_2021_Q4', '3', NULL, 2021, 4, 960128000, -62546000, 406001000, 333255000, 329640000, 37278100, 54840200, 17168000, 3528140, 37672200, 390, 17305, 223.31, 34.71, 0.88, 0.6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

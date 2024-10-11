-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 06:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_foods`
--

CREATE TABLE `category_foods` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_foods`
--

INSERT INTO `category_foods` (`category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mỳ', NULL, '2024-06-05 03:46:33'),
(2, 'Phở', NULL, '2024-06-05 03:47:07'),
(3, 'Bún', NULL, '2024-06-05 03:47:01'),
(4, 'Xôi', NULL, '2024-06-05 03:46:55'),
(5, 'Nước', NULL, '2024-06-05 03:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `table_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `date`, `content`, `customer_id`, `table_type_id`, `created_at`, `updated_at`) VALUES
(3, 'thangtran', 'thangtran@gmail.com', '2024-06-06', 'Bàn khá riêng tư, phù hợp cho các cặp đôi đi date', 60, 1, '2024-06-06 00:03:33', '2024-06-06 00:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `email`, `created_at`, `updated_at`, `password`) VALUES
(1, 'Nguyễn Yến Vy', '0372586032', 'nguyenvy@gmail.com', NULL, NULL, NULL),
(2, 'Nguyễn Yến Nhi4536', '0372503947', 'nguyennhi@gmail.com', NULL, '2024-05-16 08:02:19', NULL),
(3, 'Nguyễn Quốc Đạt', '0372586999', 'nguyedat@gmail.com', NULL, NULL, NULL),
(4, 'Nguyễn Hoàng Mai', '0303986032', 'nguyenmai@gmail.com', NULL, NULL, NULL),
(5, 'Nguyễn Hữu Hùng', '0372558323', 'nguyenhung@gmail.com', NULL, NULL, NULL),
(6, 'Nguyễn Tiến Dũng', '03725802945', 'nguyendung@gmail.com', NULL, NULL, NULL),
(7, 'Nguyễn Thị Mai', '0372589385', 'nguyenmai@gmail.com', NULL, NULL, NULL),
(8, 'Nguyễn Kiều Ly', '0372582222', 'nguyenly0183@gmail.com', NULL, NULL, NULL),
(9, 'Nguyễn Yến Hạnh', '0379384732', 'nguyenhanh1234@gmail.com', NULL, NULL, NULL),
(10, 'Bùi Đức Minh', '0379386032', 'nguyenminhinh12@gmail.com', NULL, NULL, NULL),
(11, 'Lê Yến Hà', '0372586009', 'nguyenhaha@gmail.com', NULL, NULL, NULL),
(12, 'Nguyễn Trùng Quân', '0372586980', 'nguyenquannh@gmail.com', NULL, NULL, NULL),
(13, 'Hồ Ngọc Vy', '0372583856', 'nguyenvyyyai@gmail.com', NULL, NULL, NULL),
(14, 'Bùi Xuân Trường', '0386986032', 'nguyentruongf@gmail.com', NULL, NULL, NULL),
(15, 'Hoàng Văn Minh', '0372509573', 'nguyenmynh@gmail.com', NULL, NULL, NULL),
(16, 'Nguyễn Thị Minh', '0372592842', 'nguyenminh9876@gmail.com', NULL, NULL, NULL),
(17, 'Triệu Hữu Chung', '0372582632', 'nguyenchung1234@gmail.com', NULL, NULL, NULL),
(18, 'Đào Lê Quang Huy', '033250396', 'nguyenhuy183@gmail.com', NULL, NULL, NULL),
(19, 'Nguyễn Tiến Thiệp', '0332873622', 'nguyenhung193@gmail.com', NULL, NULL, NULL),
(20, 'Lâm Vỹ Dạ', '0372580972', 'nguyenda019@gmail.com', NULL, NULL, NULL),
(21, 'Nguyễn Thị Hạnh', '0373384032', 'nguyenhanh2074@gmail.com', NULL, NULL, NULL),
(22, 'Nguyễn Hoàng Mai', '0303986032', 'nguyenmai908@gmail.com', NULL, NULL, NULL),
(23, 'Nguyễn Hữu Hùng', '0372558323', 'nguyenhung12a@gmail.com', NULL, NULL, NULL),
(24, 'Nguyễn Tiến Dũng', '0323332945', 'nguyendung0980@gmail.com', NULL, NULL, NULL),
(25, 'Nguyễn Thị Mai', '0372583335', 'nguyenmmai917@gmail.com', NULL, NULL, NULL),
(26, 'Nguyễn Kiều Trinh', '0374442222', 'nguyentrinhinh@gmail.com', NULL, NULL, NULL),
(27, 'Bùi Thị Hằng', '0378794732', 'nguyenhangng@gmail.com', NULL, NULL, NULL),
(28, 'Bùi Quang Minh', '0323386032', 'nguyenminh12@gmail.com', NULL, NULL, NULL),
(29, 'Huỳnh Thị Hà', '0372586709', 'nguyenhahi@gmail.com', NULL, NULL, NULL),
(30, 'Nguyễn Anh Quân', '0372656980', 'nguyenquannap@gmail.com', NULL, NULL, NULL),
(31, 'Hồ Ngọc Hà', '0372583856', 'nguyenvy@gmail.com', NULL, NULL, NULL),
(32, 'Bùi Xuân Vinh', '0386986032', 'nguyenvy@gmail.com', NULL, NULL, NULL),
(33, 'Hoàng Văn Công', '0372235573', 'nguyencongkin@gmail.com', NULL, NULL, NULL),
(34, 'Nguyễn Thị Linh', '0372457842', 'nguyenlinhinhinh@gmail.com', NULL, NULL, NULL),
(35, 'Triệu Hữu Đạt', '0372582975', 'nguyendatw2q@gmail.com', NULL, NULL, NULL),
(36, 'Đào Lê Quang Thiệp', '037376396', 'nguyenvy@gmail.com', NULL, NULL, NULL),
(37, 'Nguyễn Tiến Lên', '0371763622', 'nguyenlen92@gmail.com', NULL, NULL, NULL),
(38, 'Lâm Vỹ Vỹ', '0372582352', 'nguyenvy193@gmail.com', NULL, NULL, NULL),
(39, 'Nguyễn Thị Cúc', '0379583202', 'nguyencu827@gmail.com', NULL, NULL, NULL),
(40, 'Trần Hoàng Mai', '0301980965', 'nguyenmai193@gmail.com', NULL, NULL, NULL),
(41, 'Lê Hữu Hùng', '0372552212', 'nguyenhungg@gmail.com', NULL, NULL, NULL),
(42, 'Bùi Tiến Dũng', '03722802955', 'nguyendung@gmail.com', NULL, NULL, NULL),
(43, 'Mạc Thị Mai', '0372523385', 'nguyenmaiii@gmail.com', NULL, NULL, NULL),
(44, 'Bùi Kiều Ly', '0372582219', 'nguyenlyyy@gmail.com', NULL, NULL, NULL),
(45, 'Lê Yến Hạnh', '0379388732', 'nguyenhanh897@gmail.com', NULL, NULL, NULL),
(46, 'Bùi Xuân Minh', '0379385832', 'nguyenminh@gmail.com', NULL, NULL, NULL),
(47, 'Lê Yến Trang', '0372584359', 'nguyentrang12@gmail.com', NULL, NULL, NULL),
(48, 'Nguyễn Trung Quân', '0372486980', 'nguyenquan@gmail.com', NULL, NULL, NULL),
(49, 'Hồ Ngọc Kim', '0372512356', 'nguyenkim@gmail.com', NULL, NULL, NULL),
(50, 'Bùi Xuân An', '0386988692', 'nguyenanxnuan@gmail.com', NULL, NULL, NULL),
(51, 'Hoàng Văn Đức', '0372123573', 'nguyenduc23@gmail.com', NULL, NULL, NULL),
(52, 'Nguyễn Thị Lâm', '0371232842', 'nguyenlam12@gmail.com', NULL, NULL, NULL),
(53, 'Triệu Thị Trinh', '0372598732', 'nguyentrinh67@gmail.com', NULL, NULL, NULL),
(54, 'Hoàng Hữu Nam', '0372509577', 'nguyennam09@gmail.com', NULL, NULL, NULL),
(55, 'Nguyễn Thị Hương', '0372147842', 'nguyenhương23@gmail.com', NULL, NULL, NULL),
(56, 'Triệu Minh Anh', '0372582631', 'nguyenanh12@gmail.com', NULL, NULL, NULL),
(57, 'Tran Tuan Anh', '0387654345', 'tuananh@gmail.com', '2024-04-26 19:51:56', '2024-04-26 19:51:56', '$2y$12$pCa7.HLnmaK6ybsKv5HpW.B0xJn6NoWlGw0By9rXanhJxWUWGHVOK'),
(59, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-05-16 21:36:08', '2024-05-17 23:00:59', NULL),
(60, 'thangtranxyz', '3493893587', 'thangtran@gmail.com', '2024-05-17 02:45:42', '2024-06-12 01:41:44', '$2y$12$PZBYJM8NSc9xK2ZWXEwgg.y.fSmIUb/cQ6hl3RiYEXxPL5nW9mqsK'),
(61, 'êr', '0931444443', 'ryeuy@gmail.com', '2024-05-17 03:24:26', '2024-05-17 03:24:26', NULL),
(62, 'Thắng Trần', '0931657128', 'tytr@gmail.com', '2024-05-18 00:39:54', '2024-05-18 00:39:54', NULL),
(63, 'Thắng Trần', '0923482443', 'gst@gmail.com', '2024-05-18 01:56:04', '2024-05-18 01:56:04', NULL),
(78, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-06 23:39:46', '2024-06-06 23:39:46', NULL),
(86, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-06 23:58:27', '2024-06-06 23:58:27', NULL),
(87, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:07:07', '2024-06-07 00:07:07', NULL),
(88, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:34:11', '2024-06-07 00:34:11', NULL),
(89, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:35:22', '2024-06-07 00:35:22', NULL),
(90, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:56:15', '2024-06-07 00:56:15', NULL),
(91, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:57:27', '2024-06-07 00:57:27', NULL),
(92, 'Thắng Trần', '0931657128', 'tranthangvui360@gmail.com', '2024-06-07 00:58:52', '2024-06-07 00:58:52', NULL),
(94, 'chou', '0948374893', 'nguyenvunganchau2403@gmail.com', '2024-06-08 06:55:53', '2024-06-08 06:55:53', NULL),
(95, 'Châu', '0948374893', 'nguyenvunganchau2403@gmail.com', '2024-06-08 07:22:55', '2024-06-08 07:22:55', NULL),
(96, 'Châu', '0948374893', 'nguyenvunganchau2403@gmail.com', '2024-06-09 06:08:59', '2024-06-09 06:08:59', NULL),
(97, 'Chauu', '0948504590', 'nguyenvu@gmail.com', '2024-06-09 06:34:28', '2024-06-12 02:30:26', '$2y$12$Kfo6BGAytYYzf4q9c5ufqem6/6hikMv.SH73HJjTHBPUg1xr28J4G'),
(98, 'Châu', '0948374893', 'phuctoan08012000@gmail.com', '2024-06-09 06:41:48', '2024-06-09 06:41:48', NULL),
(99, 'Nguyễn Văn Mười', '1234567898', 'nguyenvunganchau2403@gmail.com', '2024-06-12 02:32:23', '2024-06-12 02:32:23', NULL),
(100, 'Chou', '0923482443', 'nguyenvunganchau2403@gmail.com', '2024-06-12 02:33:20', '2024-06-12 02:33:20', NULL),
(101, 'Chau', '0948504590', 'nguyenvunganchau2403@gmail.com', '2024-06-12 02:38:15', '2024-06-12 02:38:15', '$2y$12$1DdqA2flxxJID70BCkSs.OEDat10qE3vZffGEsvrnX.kLYx0qchfW'),
(102, 'Chou', '0923482443', 'nguyenvunganchau2403@gmail.com', '2024-06-13 09:04:48', '2024-06-13 09:04:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `address`, `phone`, `email`, `role_id`, `created_at`, `updated_at`, `password`) VALUES
(1, 'Nguyen Huy66', '123 Main Street, Cityville, State 123456', '666', 'huy6@gmail.com', 2, NULL, '2024-05-15 09:51:52', NULL),
(3, 'Tran Bao', '789 Oak Road, Villagetown, State 13579', '(345) 678-9012', 'sample11@hotmail.com', 3, NULL, NULL, NULL),
(4, 'Nguyen Luong', '101 Maple Lane, Suburbia, State 24680', '(456) 789-0123', 'admin@gmail.com', 4, NULL, NULL, '$2a$12$BbucqypzJv56LYtjlIAVre.52oLECe2eZKDJnhFWV/nRdL0zc7mMG\n'),
(5, 'Minh Ngoc', '202 Pine Street, Hamletville, State 86420', '(567) 890-1234', 'fake13@gmail.com', 5, NULL, NULL, NULL),
(6, 'Xuan Khang', '303 Birch Road, Countryside, State 97531', '(678) 901-2345', 'notarealperson14@yahoo.com', 6, NULL, NULL, NULL),
(7, 'Thao Lý', '404 Cedar Avenue, Riverside, State 80246', '(789) 012-3456', 'email15@hotmail.com', 1, NULL, '2024-05-16 06:49:33', NULL),
(8, 'Thu Huyen', '505 Walnut Way, Lakeside, State 64209', '(890) 123-4567', 'fictional16@outlook.com', 1, NULL, NULL, NULL),
(9, 'Tran Nhung', '606 Sycamore Drive, Hillside, State 71358', '(901) 234-5678', 'test17@gmail.com', 2, NULL, NULL, NULL),
(10, 'Hoang Chau', '808 Spruce Road, Mountainview, State 54682', '(012) 345-6789', 'imaginary18@yahoo.com', 3, NULL, NULL, NULL),
(11, 'Duong Hung', '707 Redwood Lane, Beachtown, State 32974', '(112) 233-4455', 'example19@hotmail.com', 5, NULL, NULL, NULL),
(12, 'Quang Minh', '909 Magnolia Avenue, Meadowville, State 17893', '(223) 344-5566', 'fake20@outlook.com', 4, NULL, NULL, '$2a$12$BbucqypzJv56LYtjlIAVre.52oLECe2eZKDJnhFWV/nRdL0zc7mMG'),
(13, 'Thu Hoai', '210 Lilac Lane, Parkside, State 46230', '(334) 455-6677', 'user21@gmail.com', 2, NULL, NULL, NULL),
(14, 'Hoa Minzy', '511 Laurel Street, Suburbia, State 73921', '(445) 566-7788', 'madeup22@yahoo.com', 2, NULL, NULL, NULL),
(15, 'Do Minzy', '712 Cherry Road, Woodland, State 62517', '(556) 677-8899', 'notreal23@hotmail.com', 3, NULL, NULL, NULL),
(16, 'Do Mixi', '913 Acacia Avenue, Laketown, State 98136', '(667) 788-9900', 'testuser24@outlook.com', 6, NULL, NULL, NULL),
(17, 'Nhism', '114 Bluebonnet Way, Riverside, State 57389', '(778) 899-0011', 'bogus25@gmail.com', 4, NULL, NULL, '$2a$12$BbucqypzJv56LYtjlIAVre.52oLECe2eZKDJnhFWV/nRdL0zc7mMG'),
(18, 'Dev Nguyen', '315 Marigold Drive, Hillcrest, State 20548', '(889) 900-1122', 'example1@gmail.com', 2, NULL, NULL, NULL),
(19, 'Luu Hung Thang', '616 Tulip Road, Orchardville, State 68974', '(900) 011-2233', 'testuser2@yahoo.com', 1, NULL, NULL, NULL),
(20, 'Nguyen Phuong Anh', '817 Hyacinth Lane, Riverdale, State 42673', '(010) 122-3344', 'fake_email3@hotmail.com', 2, NULL, NULL, NULL),
(21, 'Tran Binh Nguyen', '118 Sunflower Street, Meadowbrook, State 75931', '(121) 233-4455', 'user4@outlook.com', 3, NULL, NULL, NULL),
(22, 'Nguyen Trung Hieu', '419 Daffodil Avenue, Parkview, State 63480', '(232) 344-5566', 'imaginary5@gmail.com', 3, NULL, NULL, NULL),
(23, 'Duong Bao Lam', '520 Dahlia Road, Lakeshore, State 91325', '(343) 455-6677', 'notreal6@yahoo.com', 4, NULL, NULL, '$2a$12$BbucqypzJv56LYtjlIAVre.52oLECe2eZKDJnhFWV/nRdL0zc7mMG'),
(24, 'Tran Quynh Trang', '721 Rosewood Drive, Beachside, State 38014', '(454) 566-7788', 'madeupemail7@hotmail.com', 5, NULL, NULL, NULL),
(25, 'Nguyen Thao Nguyen', '822 Petunia Way, Hilltop, State 54792', '(565) 677-8899', 'fictitious8@outlook.com', 1, NULL, NULL, NULL),
(26, 'Super Admin', 'SG', '0909090992', 'superadmin@gmail.com', 4, NULL, NULL, '$2y$12$hY0AdB.buvf.dbh3Jfo83.pgYB5JQHFvurgHzhyqdcdMZhOfnzmlC'),
(27, '3ru38r', 'e', 'rr3', '33@gmail.com', 3, '2024-05-15 07:13:12', '2024-05-15 07:13:12', NULL),
(28, 'Xuan Khang4', '303 Birch Road, Countryside, State 97531', '(678) 901-2345', 'notarealperson14@yahoo.com', 6, '2024-05-15 09:22:35', '2024-05-15 09:22:35', NULL),
(29, 'Nguyen Huy', '123 Main Street, Cityville, State 12345', '0985676545', 'adminee@gmail.com', 6, '2024-05-15 09:23:33', '2024-05-15 09:23:33', NULL),
(30, 'Nguyen Huy', '123 Main Street, Cityville, State 12345', '4555334', 'adminee@gmail.com', 1, '2024-05-15 09:28:23', '2024-05-15 09:28:23', NULL),
(31, 'Nguyen Huy', '123 Main Street, Cityville, State 12345', '144444', 'adminee@gmail.com', 1, '2024-05-15 09:30:24', '2024-05-15 09:30:24', NULL),
(32, 'Nguyen Huy', '123 Main Street, Cityville, State 12345', '888888', 'adminee@gmail.com', 1, '2024-05-15 09:30:37', '2024-05-15 09:30:37', NULL),
(33, 'Chou', '12 Cầu Kho', '0923482443', 'chou@gmail.com', 2, '2024-06-12 02:27:51', '2024-06-12 02:27:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'máy tính', 10, NULL, NULL),
(2, 'máy in hóa đơn', 2, NULL, NULL),
(3, 'bộ đàm', 10, NULL, NULL),
(4, 'quầy lễ tân', 1, NULL, NULL),
(5, 'bàn đôi', 20, NULL, NULL),
(6, 'bàn 4', 80, NULL, NULL),
(7, 'bàn lớn', 50, NULL, NULL),
(8, 'ghế', 600, NULL, NULL),
(9, 'khăn trải bàn', 350, NULL, NULL),
(10, 'lọ hoa', 200, NULL, NULL),
(11, 'tranh ảnh', 20, NULL, NULL),
(12, 'rèm cửa', 20, NULL, NULL),
(13, 'tủ trưng bày', 4, NULL, NULL),
(14, 'loa đài', 4, NULL, NULL),
(15, 'micro', 10, NULL, NULL),
(16, 'điều hòa', 10, NULL, NULL),
(17, 'hệ thống ánh sáng', 4, NULL, NULL),
(18, 'đĩa 15', 1000, NULL, NULL),
(19, 'đĩa 20', 1000, NULL, NULL),
(20, 'bát ăn', 1000, NULL, NULL),
(21, 'bát lớn', 1000, NULL, NULL),
(22, 'chén', 600, NULL, NULL),
(23, 'cốc', 600, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `image_menu` varchar(255) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`item_id`, `item_name`, `image_menu`, `description`, `price`, `discount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mỳ pate', 'menu/1717583464_banh-mi-pate-2.jpg', 'Bánh mỳ, pate, dưa chuột, rau, cà rốt', 30000.00, NULL, 1, '2023-11-06 20:50:48', '2024-06-05 03:31:04'),
(2, 'Bánh mỳ lạp xưởng', 'menu/1717583503_cach-lam-banh-mi-lap-xuong.jpg', 'Bánh mỳ, lạp xưởng, rau thơm', 30000.00, NULL, 1, '2023-11-06 20:50:48', '2024-06-05 03:31:43'),
(3, 'Bánh mỳ trứng', 'menu/1717583534_banh-mi-trung-ngon-lanh.jpg', 'Bánh mỳ, trứng, rau thơm', 25000.00, NULL, 1, '2023-11-06 20:50:48', '2024-06-05 03:32:14'),
(4, 'Bánh mỳ giò', 'menu/1717583563_banh-mi-cha-lua-1000x565.jpg', 'Bánh mỳ, giò lụa, rau thơm', 30000.00, NULL, 1, '2023-11-06 20:50:48', '2024-06-05 03:32:43'),
(5, 'Phở bò', 'menu/1717583602_cach-nau-pho-bo-ha-noi-thom-ngon-chuan-vi-tai-nha-cuc-don-gian-14-1689214964-384-width700height482.jpg', 'Phở, thịt bò, rau thơm', 60000.00, NULL, 2, '2023-11-06 20:50:48', '2024-06-05 03:33:22'),
(6, 'Phở gà', 'menu/1717582607_Buoc-9-Thanh-pham-9-6844-1692350463.jpg', 'Phở, thịt gà, rau thơm, nước dùng', 60000.00, NULL, 2, '2023-11-06 20:50:48', '2024-06-05 03:16:47'),
(7, 'Phở trộn', 'menu/1717582663_foody-upload-api-foody-mobile-pho-tron-210227095936.jpg', 'Phở, thịt bò, rau thơm, nước dùng', 60000.00, NULL, 2, '2023-11-06 20:50:48', '2024-06-05 03:17:43'),
(8, 'Phở cuốn', 'menu/1717582702_111122-pho-cuon-buffet-poseidon-1.jpg', 'Phở, thịt bò, rau thơm', 65000.00, NULL, 2, '2023-11-06 20:50:48', '2024-06-05 03:18:22'),
(9, 'Bún đậu', 'menu/1717582797_an-bao-lau-nay-ban-co-biet-bun-dau-mam-tom-la-dac-san-o-dau-202206021309408488.jpeg', 'Bún, đậu rán, nem chả, mắm tôm, rau, dồi', 60000.00, NULL, 3, '2023-11-06 20:50:48', '2024-06-05 03:19:57'),
(10, 'Bún chả', 'menu/1717582849_20231204-SEA-VyTran-BunChaHanoi-19-f623913c6ef34a9185bcd6e5680c545f.jpg', 'Bún, chả thịt, chả miếng, cà rốt, su hào', 50000.00, NULL, 3, '2023-11-06 20:50:48', '2024-06-05 03:20:49'),
(11, 'Bún cá', 'menu/1717582920_Bc8Thnhphm8-1697018008-5620-1697018044.jpg', 'Bún, cá chiên giòn, rau', 60000.00, NULL, 3, '2023-11-06 20:50:48', '2024-06-05 03:22:00'),
(12, 'Bún ngan', 'menu/1717582964_cach-nau-bun-ngan-mang-tuoi-1.jpg', 'Bún, thịt ngan, hành phi, rau', 60000.00, NULL, 3, '2023-11-06 20:50:48', '2024-06-05 03:22:44'),
(13, 'Xôi giò', 'menu/1717583008_xoi-vo-final1.jpg', 'Xôi, giò lụa, tương, hành', 40000.00, NULL, 4, '2023-11-06 20:50:48', '2024-06-05 03:23:28'),
(14, 'Xôi xúc xích', 'menu/1717583255_cach-lam-xoi-lap-xuong-ngon-mem-sieu-nhanh-bang-lo-vi-song-202109062233093121.jpg', 'Xôi, xúc xích, tương, hành', 40000.00, NULL, 4, '2023-11-06 20:50:48', '2024-06-05 03:27:35'),
(15, 'Xôi thịt kho', 'menu/1717583124_cach-lam-xoi-thit-kho-trung.png', 'Xôi, thịt kho, hành, dưa chuột', 40000.00, NULL, 4, '2023-11-06 20:50:48', '2024-06-05 03:25:24'),
(16, 'Xôi chim', 'menu/1717583161_chia-se-bi-quyet-nau-xoi-bo-cau-chien-gion-thom-nuc-mui-202111132138003000.jpg', 'Xôi, thịt chim, dưa chuột', 40000.00, NULL, 4, '2023-11-06 20:50:48', '2024-06-05 03:26:01'),
(17, 'Nước lọc', 'menu/1717583174_nuoc-khoang-la-vie-350ml-2.jpg', 'Nước lọc', 20000.00, NULL, 5, '2023-11-06 20:50:48', '2024-06-05 03:26:14'),
(18, 'Coca', 'menu/1717583183_COCA.png', 'Nước coca', 30000.00, NULL, 5, '2023-11-06 20:50:48', '2024-06-05 03:26:23'),
(19, 'Trà chanh', 'menu/1717583196_dung-cu-can-thiet-de-mo-quan-tra-chanh-1.jpg', 'Trà chanh', 20000.00, NULL, 5, '2023-11-06 20:50:48', '2024-06-05 03:26:36'),
(20, 'Tra dao', 'menu/1717853325_images (2).jpg', 'Trà đào', 20000.00, NULL, 5, '2023-11-06 20:50:48', '2024-06-08 06:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_customer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name_customer`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dieu han', 'dieuhan@gmail.com', 'Hỗ trợ', 'Cho mình thời gian nhà hàng đóng cửa và mình muốn đặt bàn lúc 20h ngày mai', 'success', '2024-05-17 01:50:34', '2024-06-02 03:49:19'),
(2, 'acv', 'abc@gmail.com', 'ib', 'nhắn tin với mình', 'cancel', '2024-05-17 01:50:34', '2024-06-02 03:50:55'),
(3, 'yeu', 'yewu@gmail.com', 'rư', '232', 'pending', '2024-06-06 20:33:16', '2024-06-06 20:33:16'),
(4, 't', 'tr@gmail.com', 'r', 'r4', 'cancel', '2024-06-06 20:35:26', '2024-06-06 20:36:15'),
(5, 'cho', 'chou@gmail.com', 'Phản hồi', 'quán đẹp quá trời!', 'pending', '2024-06-08 06:53:11', '2024-06-08 06:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_04_084108_create_category_foods_table', 1),
(6, '2023_11_04_084108_create_customers_table', 1),
(7, '2023_11_04_084108_create_employees_table', 1),
(8, '2023_11_04_084108_create_facilities_table', 1),
(9, '2023_11_04_084108_create_menus_table', 1),
(10, '2023_11_04_084108_create_order_details_table', 1),
(11, '2023_11_04_084108_create_orders_table', 1),
(12, '2023_11_04_084108_create_reservations_table', 1),
(13, '2023_11_04_084108_create_roles_table', 1),
(14, '2023_11_04_084108_create_table_types_table', 1),
(15, '2023_11_04_194907_add_amount_to_tables', 1),
(16, '2023_11_04_194907_add_category_id_to_menus', 1),
(17, '2023_11_04_194907_add_foreign_key_to_order_details', 1),
(18, '2023_11_04_194907_add_passwordt_to_empoloyees', 1),
(19, '2023_11_04_194907_add_role_id_to_employees', 1),
(20, '2023_11_04_194907_add_time_out_to_reservations', 1),
(21, '2023_11_15_190801_create_tables_table', 1),
(22, '2023_11_15_203258_add_table_type_id_to_orders', 1),
(23, '2023_11_15_203258_add_table_type_id_to_reservations', 1),
(24, '2023_11_16_084108_create_messages_table', 1),
(25, '2023_11_16_1949010_add_is_active_to_table_items', 1),
(26, '2023_11_16_194907_add_foreign_key_to_orders', 1),
(27, '2023_11_16_194908_add_foreign_key_to_reservations', 1),
(28, '2023_11_19_1949010_add_password_to_customers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_news` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `title`, `description`, `image_news`, `created_at`, `updated_at`) VALUES
(1, 'Chương trình khuyến mãi khi đặt bàn ngay hôm nay', 'Chúng tôi có menu bạn có thể xem và trải nghiệm món mới bên DÉLICAT1', 'news/1717391602_bo-tri-ban-ghe-nha-hang.jpg', '2024-06-02 21:53:05', '2024-06-08 08:06:19'),
(2, 'Sinh nhật nhận voucher 500K', 'Từng năm qua đi, khi trưởng thành hơn, chúng ta dần quên lãng những lời chúc và niềm vui khi đón tuổi mới. Năm nay hãy để DÉLICAT trao tặng bạn câu chúc ý nghĩa cùng món quà tuyệt vời: Voucher 500k áp dụng cho nhóm 4 người lớn.\r\n\r\nĐến DÉLICAT, khám phá ẩm thực Á - Âu, đắm chìm trong mỹ vị thế giới, đa dạng món ngon trong không gian nhà hàng sang trọng, đặc trưng qua từng đường nét kiến trúc. Một trải nghiệm hoàn hảo chỉ có tại DÉLICAT.\r\n\r\nĐón tuổi mới hoành tráng đừng quên tới DÉLICAT đón tiệc vui, nhận quà đáng yêu và lưu lại những khoảnh đáng nhớ bạn nhé!\r\n\r\n*Ưu đãi áp dụng từ 15/03 - 30/06/2024*', 'news/1718295158_z5520483756483_8e7bbf4dc1429aa7f9d6b38571d7d56a.jpg', '2024-06-08 07:40:38', '2024-06-13 09:12:38'),
(3, 'Món mới - Trải nghiệm mới', 'Sau thời gian dài nghiên cứu và điều chỉnh các công thức, đội ngũ bếp DÉLICAT đã đưa ra MENU MỚI với:\r\n\r\n- Hơn 60 MÓN NHẬU MỚI trứ danh từ Tây Bắc, Thái Lan, Trung Quốc,… như Pa Pỉnh Tộp, Nộm Da Trâu, Gà Đen H’Mông,… anh em cứ phải gọi là “đã miệng” luôn.\r\n\r\n- Nguyên liệu TƯƠI, đảm bảo nhập - bán trong ngày\r\n\r\n- Giá món ăn được tối ưu hợp lý, chi phí chỉ từ 250k/ng\r\n\r\nBên cạnh đó, không gian rộng rãi, thoáng mát: ban công, sân vườn, trong nhà, phòng riêng cùng đội ngũ nhân viên luôn say yes chắc chắn sẽ mang đến trải nghiệm tốt cho mọi người.\r\n\r\nThân mời mọi người ghé thưởng thức nhé!\r\n\r\n\r\nBạn có thể liên hệ qua hotline 0948 504590 để đặt bàn và nhận hỗ trợ nhanh nhất !', 'news/1718295145_z5520454770425_69b91c70757ac826769cfa3f7e96def2.jpg', '2024-06-08 07:50:07', '2024-06-13 09:12:25'),
(4, 'Nhà hàng tổ chức tiệc 8/3 2024', 'Với không gian rộng rãi, thực đơn phong phú, ưu đãi giảm giá lên tới 15% cùng hàng loạt các hạng mục hỗ trợ tổ chức sự kiện, DÉLICAT là nhà hàng tổ chức tiệc 8/3 lý tưởng nhất tại Hà Nội cho các công ty, doanh nghiệp nhân dịp Quốc Tế Phụ Nữ.\r\n\r\nQuý khách có thể thoải mái lựa chọn không gian cho bữa tiệc của mình: từ không gian ngoài trời rộng mở hay trong nhà thoáng mát cho đến phòng private riêng tư, lịch sự...\r\n\r\nKhông gian tổ chức tiệc 8/3 Sân Vườn\r\nThưởng tiệc ngoài trời với phong cách rất \"tự do\" \r\nThưởng tiệc ngoài trời với phong cách rất \"tự do\" \r\nKhông gian tổ chức tiệc 8/3 Phòng riêng\r\nPhòng Private (VIP) riêng tư, lịch sự từ 8-100 người \r\nPhòng Private (VIP) riêng tư, lịch sự từ 8-100 người \r\nKhông gian tổ chức tiệc 8/3 Rooftop\r\nView quán nhậu Rooftop ăn tiệc cực đã cho hội chị em check-in lung linh\r\nView quán nhậu Rooftop ăn tiệc cực đã cho hội chị em check-in lung linh\r\nXem thêm: Không gian nhà hàng tổ chức tiệc 8/3 tại Hà Nội tại đây.\r\n\r\nMột trong những điều quan trọng mà khách hàng quan tâm khi lựa chọn nhà hàng tổ chức tiệc 8/3 đó chính là menu có phù hợp với bữa tiệc của họ hay không. Menu nhà hàng hơn 300 món đa dạng cả về hương vị và màu sắc chắc chắn sẽ làm hài lòng cả thị giác và vị giác của khách dự tiệc.\r\n\r\nĐặt tiệc tại nhà hàng, quý khách sẽ tiết kiệm được thời gian lên thực đơn cho bữa tiệc của mình. Bởi thực đơn của Tự Do luôn có sẵn những combo đã được thiết kế dành riêng cho các bàn tiệc từ 6-7 người. Bên cạnh đó, với mong muốn mang đến trải nghiệm tốt nhất khi quý khách đặt tiệc, nhà hàng còn hỗ trợ miễn phí việc thiết kế menu riêng biệt với mức chi phí chỉ từ 189k/người.\r\n\r\nCác hạng mục hỗ trợ tổ chức tiệc 8/3 tại DÉLICAT\r\nHỗ trợ Thiết kế - In ấn Backdrop\r\nNhà hàng DÉLICAT sẽ hỗ trợ khách hàng từ a-z cả các khâu trước buổi tiệc: chuẩn bị thiết kế hình ảnh, in ấn backdrop chụp hình, thiết kế, chỉnh sửa video theo nhu cầu tổ chức tiệc của quý khách.\r\n\r\nHỗ trợ Màn led - Loa Mic - Thảm đỏ\r\nLà nhà hàng tổ chức tiệc 8/3 lý tưởng tại Hà Nội,  có đầy đủ thiết bị hỗ trợ để ngày của các chị em diễn ra một cách ý nghĩa và trọn vẹn nhất: Màn led 400 inch nét căng thuận tiện trình chiếu các video, clip lời chúc từ hội anh em hoặc sử dụng như backdrop đều có thể sử dụng; loa mic dùng phát biểu,…\r\n\r\nHỗ trợ MC - Ca sĩ - Dancer - Ban nhạc,...\r\nHoạt động văn nghệ đóng vai trò quan trọng trong việc tạo không khí cho buổi tiệc mừng ngày Quốc tế Phụ nữ của các chị em. Nhà hàng sẽ hỗ trợ từ a-z các hạng mục này khi quý khách lựa chọn đặt tiệc liên hoan tại nhà hàng tổ chức tiệc 8/3 số 1 Hà Nội.\r\n\r\nHoạt động văn nghệ diễn ra giữa buổi tiệc dưới sự hỗ trợ của Tự Do\r\nHỗ trợ các thủ tục Hợp đồng - Xuất VAT cho công ty, doanh nghiệp\r\n\r\n- Thủ tục pháp lý đầy đủ.\r\n\r\n- Đặt cọc cam kết rõ ràng quyền lợi 2 bên.\r\n\r\n- Hoá đơn xử lý nhanh gọn, linh hoạt.\r\n\r\n- Hỗ trợ tận tình, chu đáo cả trước và sau tiệc.\r\n\r\nƯu đãi đặt tiệc liên hoan 8/3 lên tới 15%\r\nKhi đặt tiệc liên hoan Ngày Quốc Tế Phụ Nữ 8/3, quý khách sẽ được nhận Ưu Đãi giảm giá theo chính sách của Nhà hàng:\r\n\r\nGiảm 50% Lẩu Bò Cay cho đoàn dưới 10 khách.\r\nGiảm 10% cho đoàn 10-29 khách.\r\nGiảm 13% cho đoàn 30-49 khách.\r\nGiảm 15% cho đoàn trên 50 khách.\r\nLưu ý: Chiết khấu áp dụng cho hoá đơn đồ ăn từ mùng 6/3 - 10/3 với bàn đặt trước trên toàn bộ hệ thống Quán Nhậu Tự Do.', 'news/1718295130_202305130953384784.jpg.thumbw.1200.jpg', '2024-06-08 08:03:10', '2024-06-13 09:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `table_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `table_id`, `reservation_id`, `order_date`, `total_amount`, `time`, `created_at`, `updated_at`, `table_type_id`) VALUES
(34, 63, 2, 57, '2024-05-15', 280000.00, 14, '2024-06-05 00:04:23', '2024-06-05 01:10:37', 1),
(35, 61, 3, 57, '2024-05-17', 300000.00, 21, '2024-06-05 00:15:46', '2024-06-05 00:15:46', 1),
(36, 61, 3, 57, '2024-05-17', 280000.00, 21, '2024-06-05 00:16:47', '2024-06-05 00:16:47', 1),
(37, 63, 2, 57, '2024-05-15', 100000.00, 14, '2024-06-05 00:20:54', '2024-06-05 01:09:09', 1),
(38, 98, 1, 57, '2024-06-10', 200000.00, 9, '2024-06-12 02:24:54', '2024-06-12 02:24:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `menu_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(37, 34, 16, 4, 160000.00, '2024-06-05 00:04:23', '2024-06-05 00:04:23'),
(38, 35, 15, 3, 120000.00, '2024-06-05 00:15:46', '2024-06-05 00:15:46'),
(39, 35, 7, 3, 180000.00, '2024-06-05 00:15:46', '2024-06-05 00:15:46'),
(40, 36, 17, 4, 80000.00, '2024-06-05 00:16:47', '2024-06-05 00:16:47'),
(41, 36, 10, 4, 200000.00, '2024-06-05 00:16:47', '2024-06-05 00:16:47'),
(42, 37, 18, 2, 60000.00, '2024-06-05 00:20:54', '2024-06-05 01:07:25'),
(44, 37, 14, 1, 40000.00, '2024-06-05 01:08:57', '2024-06-05 01:08:57'),
(45, 34, 18, 4, 120000.00, '2024-06-05 01:10:37', '2024-06-05 01:10:37'),
(46, 38, 13, 5, 200000.00, '2024-06-12 02:24:54', '2024-06-12 02:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'pending',
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time_out` int(11) NOT NULL,
  `table_type_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `name`, `note`, `status`, `customer_id`, `number_of_guests`, `table_id`, `reservation_date`, `time`, `created_at`, `updated_at`, `time_out`, `table_type_id`) VALUES
(57, 'D57', NULL, 'completed', 59, 4, 1, '2024-05-17', 9, '2024-05-16 21:36:08', '2024-05-28 03:28:13', 11, 1),
(58, 'D58', NULL, 'pending', 60, 4, 2, '2024-05-17', 8, '2024-05-17 03:22:34', '2024-05-17 03:22:34', 10, 2),
(59, 'D59', NULL, 'pending', 61, 9, 3, '2024-05-17', 21, '2024-05-17 03:24:26', '2024-05-17 03:24:26', 23, 3),
(60, 'D60', NULL, 'pending', 63, 2, 2, '2024-05-15', 14, '2024-05-18 01:56:04', '2024-06-04 20:05:09', 16, 2),
(75, 'D75', NULL, 'pending', 78, 4, 2, '2024-06-13', 8, '2024-06-06 23:39:46', '2024-06-06 23:39:46', 10, 2),
(83, 'D83', 'ềw', 'pending', 86, 4, 2, '2024-06-14', 8, '2024-06-06 23:58:27', '2024-06-06 23:58:27', 10, 2),
(84, 'D84', NULL, 'pending', 87, 5, 2, '2024-06-14', 12, '2024-06-07 00:07:07', '2024-06-07 00:07:07', 14, 2),
(85, 'D85', NULL, 'pending', 88, 5, 2, '2024-06-21', 9, '2024-06-07 00:34:11', '2024-06-07 00:34:11', 11, 2),
(86, 'D86', NULL, 'pending', 89, 5, 2, '2024-06-08', 9, '2024-06-07 00:35:22', '2024-06-07 00:35:22', 11, 2),
(87, 'D87', NULL, 'pending', 90, 4, 2, '2024-06-20', 10, '2024-06-07 00:56:15', '2024-06-07 00:56:15', 12, 2),
(88, 'D88', NULL, 'pending', 91, 5, 2, '2024-06-13', 8, '2024-06-07 00:57:27', '2024-06-07 00:57:27', 10, 2),
(89, 'D89', NULL, 'pending', 92, 4, 2, '2024-06-14', 8, '2024-06-07 00:58:52', '2024-06-07 00:58:52', 10, 2),
(90, 'D90', NULL, 'pending', 94, 4, 3, '2024-06-19', 10, '2024-06-08 06:55:53', '2024-06-08 06:55:53', 12, 3),
(91, 'D91', NULL, 'pending', 95, 4, 1, '2024-06-12', 11, '2024-06-08 07:22:55', '2024-06-08 07:22:55', 13, 1),
(92, 'D92', NULL, 'pending', 96, 2, 1, '2024-06-11', 9, '2024-06-09 06:08:59', '2024-06-09 06:08:59', 11, 1),
(93, 'D93', NULL, 'completed', 97, 2, 1, '2024-06-11', 9, '2024-06-09 06:36:22', '2024-06-12 02:26:58', 11, 1),
(94, 'D94', NULL, 'completed', 98, 2, 1, '2024-06-10', 9, '2024-06-09 06:41:48', '2024-06-12 02:26:34', 11, 1),
(95, 'D95', NULL, 'pending', 97, 4, 2, '2024-06-13', 10, '2024-06-12 02:29:42', '2024-06-12 02:29:42', 12, 2),
(96, 'D96', NULL, 'pending', 99, 4, 2, '2024-06-13', 11, '2024-06-12 02:32:23', '2024-06-12 02:32:23', 13, 2),
(97, 'D97', NULL, 'pending', 100, 2, 1, '2024-06-13', 10, '2024-06-12 02:33:20', '2024-06-12 02:33:20', 12, 1),
(98, 'D98', NULL, 'pending', 102, 2, 1, '2024-06-14', 9, '2024-06-13 09:04:48', '2024-06-13 09:04:48', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nv_order', 'Order đồ', NULL, NULL),
(2, 'Nv_phucvu', 'Phục vụ khách', NULL, NULL),
(3, 'Lao_Cong', 'Quét dọn', NULL, NULL),
(4, 'Quan_ly', 'Quản lý', NULL, NULL),
(5, 'Dau_bep', 'Nấu ăn', NULL, NULL),
(6, 'Phu_bep', 'Phụ bếp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `table_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `name`, `table_type_id`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'BD01', 1, NULL, NULL, NULL),
(2, 'BD02', 1, NULL, NULL, NULL),
(3, 'BD03', 1, NULL, NULL, NULL),
(4, 'BD04', 1, NULL, NULL, NULL),
(5, 'BD05', 1, NULL, NULL, NULL),
(6, 'BN01', 2, NULL, NULL, NULL),
(7, 'BN02', 2, NULL, NULL, NULL),
(8, 'BN03', 2, NULL, NULL, NULL),
(10, 'BN05', 2, NULL, NULL, NULL),
(11, 'PR01', 3, NULL, NULL, NULL),
(12, 'PR02', 3, NULL, NULL, NULL),
(13, 'PR03', 3, NULL, NULL, NULL),
(14, 'PR04', 3, NULL, NULL, NULL),
(15, 'PR05', 3, NULL, NULL, NULL),
(16, 'DT01', 4, NULL, NULL, NULL),
(17, 'DT02', 4, NULL, NULL, NULL),
(18, 'DT03', 4, NULL, NULL, NULL),
(19, 'DT04', 4, NULL, NULL, NULL),
(20, 'DT05', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_types`
--

CREATE TABLE `table_types` (
  `table_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image_table_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_types`
--

INSERT INTO `table_types` (`table_type_id`, `name`, `price`, `image_table_type`, `description`, `created_at`, `updated_at`, `amount`) VALUES
(1, 'Bàn đôi', NULL, 'table_type/1717386573_nhà-hàng-lãng-mạn-để-tỏ-tình.jpg', 'Ban doi', NULL, '2024-06-02 20:49:33', 5),
(2, 'Bàn nhóm', NULL, 'table_type/1717386662_top-10-nha-hang-sang-chanh-o-sai-gon-danh-cho-cap-doi-3.jpg', 'Ban nhom', NULL, '2024-06-02 20:51:02', 5),
(3, 'Phòng riêng', NULL, 'table_type/1717386703_Landmark-Restaurant-4.jpg', 'Phong rieng', NULL, '2024-06-02 20:51:43', 5),
(4, 'Đặt tiệc(10-20 người)', NULL, 'table_type/1717586290_tiec.jpg', 'Trong không gian nhỏ bé này, chúng ta xây dựng một thế giới riêng, nơi mà chỉ có tình yêu và sự hiểu biết. Bàn ăn trở thành biểu tượng của một cuộc sống hạnh phúc và an lành, nơi chúng ta luôn đồng hành bên nhau.', NULL, '2024-06-05 04:18:10', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'đa', 'admin@gmail.com', NULL, '$2a$12$BbucqypzJv56LYtjlIAVre.52oLECe2eZKDJnhFWV/nRdL0zc7mMG', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_foods`
--
ALTER TABLE `category_foods`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employees_role_id_foreign` (`role_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_table_type_id_foreign` (`table_type_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_table_id_foreign` (`table_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservations_table_type_id_foreign` (`table_type_id`),
  ADD KEY `reservations_customer_id_foreign` (`customer_id`),
  ADD KEY `reservations_table_id_foreign` (`table_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`),
  ADD KEY `tables_table_type_id_foreign` (`table_type_id`);

--
-- Indexes for table `table_types`
--
ALTER TABLE `table_types`
  ADD PRIMARY KEY (`table_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_foods`
--
ALTER TABLE `category_foods`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_types`
--
ALTER TABLE `table_types`
  MODIFY `table_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_foods` (`category_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`),
  ADD CONSTRAINT `orders_table_type_id_foreign` FOREIGN KEY (`table_type_id`) REFERENCES `table_types` (`table_type_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`item_id`),
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `reservations_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`),
  ADD CONSTRAINT `reservations_table_type_id_foreign` FOREIGN KEY (`table_type_id`) REFERENCES `table_types` (`table_type_id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_table_type_id_foreign` FOREIGN KEY (`table_type_id`) REFERENCES `table_types` (`table_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

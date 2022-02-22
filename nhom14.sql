-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Jan 14, 2021 at 11:06 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom14`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quanlity` int(11) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `User_ID`, `Product_ID`, `Quanlity`) VALUES
(3, 0, 1, 2),
(4, 0, 2, 3),
(5, 0, 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `manu_Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `manu_Image` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_Name`, `manu_Image`) VALUES
(1, 'Apple', 'apple-logo.png'),
(2, 'Oppo', 'Oppo.jpg'),
(3, 'Samsung', 'samsung-logo-4.png'),
(4, 'Asus', 'asus.png'),
(5, 'Sony', 'sony.png'),
(6, 'Test Manu ', '73409279_529593817607889_7498548823304699904_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Image` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `Description` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Price` int(150) NOT NULL,
  `Manu_ID` int(11) NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Feature` tinyint(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Image`, `Description`, `Price`, `Manu_ID`, `Type_ID`, `Feature`) VALUES
(1, 'Iphone X 64GB', 'x.png', 'Thông số kỹ thuật\r\nMàn hình:	OLED, 5.8\", Super Retina\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A11 Bionic 6 nhân\r\nRAM:	3 GB\r\nBộ nhớ trong:	64 GB', 22015000, 1, 1, 0),
(2, 'OPPO Reno 10x Zoom Edition', 'oppo.png', 'Thông số kỹ thuật\r\nMàn hình:	AMOLED, 6.6\", Full HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 48 MP & Phụ 13 MP, 8 MP\r\nCamera trước:	16 MP\r\nCPU:	Snapdragon 855 8 nhân 64-bit\r\nRAM:	8 GB\r\nBộ nhớ trong:	256 GB', 17990000, 2, 1, 0),
(5, 'Sony Xperia 1 2 SIM', '1_1559964356.png.png', 'Thông số kỹ thuật\r\nThông số kỹ thuật của Sony Xperia 1 2 SIM - Mới nguyên hộp\r\nHệ điều hành	Android 9 Pie\r\nNgôn ngữ	Đa ngôn ngữ\r\nMàn hình	6.5 inches P-OLED\r\nCamera sau	Triple 12 MP\r\nCamera trước	8 MP, f/2.0\r\nChụp ảnh nâng cao	Chống rung kỹ thuật số (EIS), Zoom quang học, Chụp ảnh xóa phông, Chế độ chụp ban đêm (ánh sáng yếu), Lấy nét theo pha, Super Slow Motion (quay siêu chậm), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Làm\r\nQuay phim	2160p@30fps, 1080p@60fps, 1080p@30fps (5-axis gyro-EIS), 1080p@960fps, HDR\r\nChipset (CPU)	Snapdragon 855 (7 nm)\r\nRAM	6GB', 19990000, 5, 1, 0),
(4, 'ASUS ROG Phone 2 (12GB | 512GB)', '256gb_0qad-dm.jpg', 'Thông số sản phẩm\r\nMặt kính cảm ứng:\r\nCorning Gorilla Glass 6\r\nĐộ phân giải:\r\nFull HD+ (1080 x 2340 Pixels)\r\nMàn hình rộng:\r\n6.59\"\r\nCamera sau:\r\nChính 48 MP & Phụ 13 MP\r\nQuay Phim:\r\nQuay phim HD 720p@240fps, Quay phim FullHD 1080p@30fps, Quay phim HD 720p@480fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps\r\nHệ điều hành:\r\nAndroid 9.0 (Pie)\r\nChipset:\r\nQualcomm Snapdragon 855 Plus 8 nhân\r\nRAM:\r\n12 GB\r\nBộ nhớ trong ( Rom):\r\n512 GB\r\nDung lượng pin:\r\n6000 mAh', 21990000, 4, 1, 0),
(6, 'Laptop Apple Macbook Air 2017', 'mac.jpg', 'Thông số kỹ thuật\r\nCPU:	Intel Core i5 Broadwell, 1.80 GHz\r\nRAM:	8 GB, DDR3L(On board), 1600 MHz\r\nỔ cứng:	SSD: 128 GB\r\nMàn hình:	13.3 inch, WXGA+(1440 x 900)\r\nCard màn hình:	Card đồ họa tích hợp, Intel HD Graphics 6000\r\nCổng kết nối:	MagSafe 2, 2 x USB 3.0, Thunderbolt 2\r\nHệ điều hành:	Mac OS\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 17 mm, 1.35 Kg', 21990000, 1, 2, 0),
(7, 'Laptop Oppo', 'lapoppo.jpg', 'Thông số kỹ thuật\r\nCPU:	Intel Core i5 Coffee Lake, 8250U, 1.60 GHz\r\nRAM:	4 GB, DDR4 (On board +1 khe), 2400 MHz\r\nỔ cứng:	HDD: 1 TB, Hỗ trợ khe cắm SSD M.2 PCIe\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® HD Graphics 620\r\nCổng kết nối:	HDMI 2.0, 2 x USB 3.1, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 18.9 mm, 1.67 kg', 12290000, 2, 2, 0),
(8, 'Laptop Samsung NC210\r\n', 'Samsung-NC210-185.jpg', 'hông số kỹ thuật\r\nCPU:	N550, 1.50 GHz\r\nRAM:	3 GB, DDR3, 800 MHz\r\nMàn hình:	10.1 inch, WSVGA (1024 x 600)\r\nCard màn hình:	\r\nCổng kết nối:	3 x USB 2.0, LAN (RJ45), VGA (D-Sub)', 11000000, 3, 2, 0),
(9, 'Laptop Asus X507MA', 'lapasus.jpg', 'Thông số kỹ thuật\r\nCPU:	Intel Celeron, N4000, 1.10 GHz\r\nRAM:	4 GB, DDR4 (1 khe), 2400 MHz\r\nỔ cứng:	SSD: 256 GB M2\r\nMàn hình:	15.6 inch, HD (1366 x 768)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® UHD Graphics 600\r\nCổng kết nối:	2 x USB 3.0, HDMI, USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 21.9 mm, 1.75 kg', 6490000, 4, 2, 0),
(12, 'Oppo Tab 8A\r\n', 'oppomtb.png', 'Thông số kỹ thuật\r\nMàn hình	IPS LCD, 8\"\r\nHệ điều hành	Android 8.1\r\nCPU	MTK 8321 4 nhân, 1.3 GHz\r\nRAM	1 GB\r\nBộ nhớ trong	8 GB\r\nCamera sau	5 MP\r\nCamera trước	2 MP\r\nKết nối mạng	WiFi, 3G, Không hỗ trợ 4G', 2190000, 2, 3, 0),
(13, 'Samsung Galaxy Tab S6\r\n', 'samsung-galaxy-tab.png', 'Thông số kỹ thuật\r\nMàn hình	Super AMOLED, 10.5\"\r\nHệ điều hành	Android 9.0 (Pie)\r\nCPU	Qualcomm Snapdragon 855 8 nhân, 1 nhân 2.84 GHz, 3 nhân 2.41 GHz & 4 nhân 1.78 GHz\r\nRAM	6 GB\r\nBộ nhớ trong	128 GB\r\nCamera sau	Chính 13 MP & Phụ 5 MP\r\nCamera trước	8 MP\r\nKết nối mạng	WiFi, 3G, 4G LTE\r\nHỗ trợ SIM\r\nNano Sim\r\nHOTSIM Mobi Data 5GB (5GB data/tháng). Giá từ 150.000đ\r\nĐàm thoại	Có', 18490000, 3, 3, 0),
(14, 'ASUS ZenPad 7.0 (Z370CG)\r\n', 'asus-zenpad-c-70.png', 'Thông số kỹ thuật\r\nMàn hình	IPS LCD, 7\"\r\nHệ điều hành	Android 5.0\r\nCPU	Intel Atom x3-C3230 4 nhân, 1.2 GHz\r\nRAM	2 GB\r\nBộ nhớ trong	16 GB\r\nCamera sau	8 MP\r\nCamera trước	2 MP\r\nKết nối mạng	Không hỗ trợ 4G\r\nHỗ trợ SIM\r\nMicro sim\r\nHOTSIM Mobi Data 5GB (5GB data/tháng). Giá từ 150.000đ\r\nĐàm thoại	Có', 3400000, 4, 3, 0),
(15, 'Sony Tablet S 16Gb\r\n', 'sony-tablet-s1-L.jpg', 'Thông số kỹ thuật\r\nMàn hình	TFT LCD, 9.4\"\r\nHệ điều hành	Android 3.1\r\nCPU	1 GHz\r\nRAM	1 GB\r\nBộ nhớ trong	16 GB\r\nCamera sau	5 MP\r\nCamera trước	0.3 MP\r\nKết nối mạng	Không hỗ trợ 4G\r\nTrọng lượng	598', 3200000, 5, 3, 0),
(16, 'Earpods Apple MNHF2', 'tai-nghe-earpods.jpg', 'Thông số kỹ thuật\r\nJack cắm:	\r\n3.5mm\r\nĐộ dài dây:	\r\n1.1 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nChuyển bài hát\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\nXuất xứ	\r\nTrung Quốc', 711000, 1, 4, 0),
(17, 'TAI NGHE NHÉT TAI OPPO F5', '7d54bf19cf.jpeg', 'Tai nghe OPPO F5 ZIN Theo Máy Chính Hãng, dùng tốt cho tất cả các model OPPO..\r\nHàng ZIN đi theo máy Oppo R9, R9 Plus, F1s, F1 Plus, Neo 9, Neo 9s, Neo 7, Neo 7s....\r\nTai Nghe dạng earbud, thoải mái khi đeo lâu\r\nCó phím Play/Call trên tai nghe, có thể bấm qua bài & trả lời cuộc gọi tiện lợi.\r\nTương thích: tất cả các Smartphone Android & iOS sử dụng tai nghe Jack 3.5mm\r\nHàng chính hãng Oppo tháo máy', 37000, 2, 4, 0),
(18, 'Tai nghe nhét trong Samsung EG920B\r\n', 'tai-nghe-nhet-trong.jpg', 'Thông số kỹ thuật\r\nJack cắm:	\r\n3.5 mm\r\nĐộ dài dây:	\r\n1.2 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\n3 cặp đệm tai nghe\r\n1 móc vành tai\r\nXuất xứ	\r\nTrung Quốc', 280000, 3, 4, 0),
(19, 'Tai nghe Asus\r\n', 'tai-nghe-ep-den.jpg', 'Thông số kỹ thuật\r\nJack cắm:	\r\n3.5mm\r\nĐộ dài dây:	\r\n1.2 m\r\nPhím điều khiển:	\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\n2 cặp đệm tai nghe\r\nXuất xứ	\r\nTrung Quốc', 112000, 4, 4, 0),
(20, 'Tai nghe Sony IER-Z1R\r\n', 'tai-nghe-sony-ier-z1r(3).jpg', '- Đặc tính: Cable tháo rời; Chân cắm chữ L\r\n- Loại giắc cắm: 3.5mm; 4.4mm\r\n- Kiểu tai nghe: In-ear\r\n- Chiều dài dây: 1m2\r\n- Dải tần: 3Hz - 100kHz', 41990000, 5, 4, 0),
(21, 'Sạc dự phòng dung lượng cao - Hỗ trợ sạc nhanh Power Bank Chính Hãng', '1df3120cdb7eab2eb8ae8e06de94dcb6.jpg', 'Kích thước siêu nhỏ 81x81mm, độ mỏng 13mm\r\n\r\nĐược làm từ nhôm cao cấp\r\n\r\nMặt gương cao cấp siêu bóng, chống chầy xước\r\n\r\nCông nghệ đột phá dung lượng lên đến 10.000 mAh\r\n\r\nHiển thị dữ liệu thông minh, thông báo chính xác số pin còn lại\r\n\r\nCông nghệ sạc nhanh thông minh, không nóng máy', 399000, 1, 5, 0),
(22, 'Pin dự phòng OPPO 10000 mAh(PK.133)\r\n', 'pin-du-phong-tekin-10.000-mah-02.png', 'Thông số kỹ thuật\r\nHãng sản xuất	Hãng khác\r\nDòng điện ra	2A\r\nCổng/Khe cắm	MicroUSB', 500000, 2, 5, 0),
(23, 'Pin dự phòng Samsung EB-P1100 10.000 Mah cổng USB-C', '201904060127355908_EB-p1100-5.jpg', 'Cổng sạc ra	5V-2A (sạc thường)\r\n9V-1.67A (sạc nhanh)\r\nKích thước	5V-2A (sạc thường)\r\n9V-1.67A (sạc nhanh)\r\nSạc nhanh	Yes\r\nPin	10000 mAh', 290000, 3, 5, 0),
(24, 'Sạc Dự Phòng Asus ABTU005 ZEN POWER - 10050mAh - Hàng Chính Hãng\r\n', '51_yg4asifl._sl1024_.jpg', 'Thương hiệu	Asus\r\nSản xuất tại	Trung Quốc\r\nKích thước	90.5 x 59 x 22mm\r\nSKU	5002202809868', 340000, 4, 5, 0),
(25, 'Pin sạc dự phòng Polymer 5.800 mAh Sony CP-E6-BC Đen', 'pin-sac-du-phong-polymer.jpg', 'Thông số kỹ thuật\r\nHiệu suất sạc:	\r\n64%\r\nDung lượng pin:	\r\n5.800 mAh\r\nThời gian sạc đầy pin:	\r\n5 - 6 giờ (dùng Adapter 1A)\r\nNguồn vào:	\r\n5V - 1.5A Max\r\nLõi pin:	\r\nPin Polymer (Li-Po)\r\nKích thước:	\r\nDài 11 cm - ngang 6.46 cm - dày 1.52 cm\r\nSản xuất tại:	\r\nTrung Quốc', 350000, 5, 5, 0),
(28, 'Laptop ASUS Rog', 'laptop_asus_rog.jpg', 'Sản phẩm LAPTOP ASUS GAMING ROG STRIX G731GT-H7114T I7-9750H/8GB/512GB PCIE/17.3 IPS 120HZ/VGA 4GB GTX1650/WIN10/ĐEN giá giảm còn 22.850.000 được Tặng chuột chơi game có dây Ausus Cerberus', 22850000, 4, 2, 1),
(26, 'Apple iPhone 2G - 8GB', 'ip2g.jpg', 'Hãng sản xuất: Apple iPhone 2G	Kiểu dáng: Kiểu thẳng\r\nKích thước màn hình: 3.5inch	Bộ nhớ trong: 8GB\r\nRAM: 128MB	Số sim : 1 Sim - -\r\nCamera: 2Megapixel	Màu: Đen\r\nThời gian đàm thoại: 8giờ', 1650000, 1, 1, 0),
(27, 'iPhone 3GS 8GB', 'ip3gs.jpg', 'Kết nối	Công nghệ	GSM / HSPA\r\n2G bands	GSM 850 / 900 / 1800 / 1900\r\n3G bands	HSDPA 850 / 1900 / 2100\r\nTốc độ	HSPA\r\nGPRS	Yes\r\nEDGE	Yes\r\nRa mắt	Announced	2008, June. Released 2008, July\r\nStatus	Discontinued\r\nThân máy	Kích Thước	115.5 x 62.1 x 12.3 mm (4.55 x 2.44 x 0.48 in)\r\nKhối Lượng	133 g (4.69 oz)\r\nSIM	Mini-SIM\r\nMàn hình	Công nghệ	TFT capacitive touchscreen, 16M colors\r\nKích thước	3.5 inches, 36.5 cm2 (~50.9% screen-to-body ratio)\r\nĐộ phân giải	320 x 480 pixels, 3:2 ratio (~165 ppi density)\r\nCảm ứng đa điểm	Yes\r\nKính bảo vệ	Corning Gorilla Glass, oleophobic coating\r\nNền tảng	OS	iOS, upgradable to iOS 4.2.1\r\nCPU	412 MHz ARM 11\r\nGPU	PowerVR MBX\r\nBộ nhớ	Khe cắm thẻ	No\r\nBộ nhớ trong	8/16 GB, 128 MB RAM\r\nCamera chính	Single	2 MP\r\nVideo	No\r\nCamera phụ		No\r\nÂm thanh	Alert types	Vibration, proprietary ringtones\r\nLoudspeaker	Yes\r\n3.5mm jack	Yes\r\nCổng kết nối	WLAN	Wi-Fi 802.11b/g\r\nBluetooth	2.0, A2DP (headset support only)\r\nGPS	Yes, with A-GPS\r\nRadio	No\r\nUSB	2.0\r\nTính năng	Cảm biến	Accelerometer, proximity\r\nTin nhắn	SMS(threaded view), MMS(threaded view), Email\r\nTrình duyệt	HTML (Safari)\r\n– Audio/video player\r\n– TV-out\r\n– Organizer\r\n– Document viewer\r\n– Photo viewer\r\n– Predictive text input\r\nPin		Non-removable Li-Ion battery\r\nStand-by	Up to 300 h\r\nTalk time	Up to 10 h\r\nMusic play	Up to 24 h', 2500000, 1, 1, 0),
(29, 'iPhone 4 8GB', 'ip4.jpg', 'Màn hình: LED-backlit IPS LCD, 3.5\", DVGA.\r\nCamera sau: 5 MP.\r\nCamera trước: VGA (0.3 MP)\r\nBộ nhớ trong: 8 GB.\r\nThẻ SIM: 1 Micro SIM.\r\nDung lượng pin: 1420 mAh.\r\n', 5400000, 1, 1, 0),
(30, 'iPhone 5 16GB', 'ip5s 16gb.jpg', 'Công nghệ màn hình:LED-backlit IPS LCD.\r\nĐộ phân giải:qHD (640 x 1136 Pixels)\r\nMàn hình rộng:4\"\r\nMặt kính cảm ứng:Kính cường lực.\r\nCamera sau.\r\nĐộ phân giải:8 MP.\r\nQuay phim:FullHD 1080p@30fps.', 5900000, 1, 1, 0),
(34, 'test file size', '53478486_775193706180384_7046072347928821760_n.jpg', '<p>dasdasdasd</p>\r\n', 500000, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `type_Image` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_Name`, `type_Image`) VALUES
(1, 'Cellphone', 'smart_phone.png'),
(2, 'Laptop', 'laptop.jpg'),
(3, 'Tablet', 'mtb.png'),
(4, 'Speaker', 'tai_nghe.png'),
(5, 'Sạc dự phòng', 'sac.png'),
(28, 'aaaaaaaaaaaa', '58713309_2169583586469721_4158257456176168960_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Password`, `Role`) VALUES
(2, 'SuperAdmin', '0b28a5799a32c687dad2c5183718ceac', 1),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', 1),
(17, 'user1', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(16, 'aaaaa', 'e10adc3949ba59abbe56e057f20f883e', 1),
(27, 'testnewuser', '13fd5851bad16ea5d4942cf5fa0545f3', 0),
(30, 'TeoUser', 'ebdfa63108034fd3bb8325b9b3d032bf', 2),
(31, 'TeoUser1', '8a42111ab7d76ae90f9a6280d37b5e67', 2),
(32, 'TeoUser2222', '15a288927a9fc62456869691b109ea80', 0),
(33, 'newUser2', '91414cf74aa2de3a0cc59214188b61fc', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

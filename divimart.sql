-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2020 lúc 03:56 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `divimart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_his`
--

CREATE TABLE `admin_his` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_his`
--

INSERT INTO `admin_his` (`id`, `action`, `module`, `order_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 1, 1, NULL, NULL),
(2, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 2, 1, NULL, NULL),
(3, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(4, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(5, 'Đã thay đổi trạng thái thành: Mới', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(6, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(7, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(8, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 3, 1, NULL, NULL),
(9, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 4, 1, NULL, NULL),
(10, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 5, 1, NULL, NULL),
(11, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 6, 1, NULL, NULL),
(12, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 7, 1, NULL, NULL),
(13, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 8, 1, NULL, NULL),
(14, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 9, 1, NULL, NULL),
(15, 'Đã thay đổi trạng thái thành: Mới', 'ChangeStatusOrder', 10, 1, NULL, NULL),
(16, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 10, 1, NULL, NULL),
(17, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 11, 1, NULL, NULL),
(18, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 12, 1, NULL, NULL),
(19, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 13, 1, NULL, NULL),
(20, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 14, 1, NULL, NULL),
(21, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 15, 1, NULL, NULL),
(22, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 16, 1, NULL, NULL),
(23, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 17, 1, NULL, NULL),
(24, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 18, 1, NULL, NULL),
(25, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 19, 1, NULL, NULL),
(26, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 20, 1, NULL, NULL),
(27, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 21, 1, NULL, NULL),
(28, 'Đã thay đổi trạng thái thành: Đã chuyển', 'ChangeStatusOrder', 22, 1, NULL, NULL),
(29, 'Đã thay đổi trạng thái thành: Đang xử lý', 'ChangeStatusOrder', 22, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `description`, `content`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hướng dẫn giặt là quần áo', 'Hướng dẫn giặt là quần áo', '<p>H&agrave;ng hiệu l&agrave; m&oacute;n kh&ocirc;ng thế thiếu của mọi t&iacute;n đồ thời trang. Việc giặt ủi v&agrave; bảo quản những m&oacute;n đồ n&agrave;y kh&ocirc;ng phải chuyện dễ d&agrave;ng v&igrave; chỉ cần một sơ &yacute; nhỏ sẽ khiến quần &aacute;o biến dạng, phai m&agrave;u.</p>\r\n\r\n<p><strong>Lưu &yacute; khi giặt ủi v&agrave; bảo quản h&agrave;ng hiệu&nbsp;</strong></p>\r\n\r\n<p><strong>Giặt quần &aacute;o h&agrave;ng hiệu</strong></p>\r\n\r\n<ul>\r\n	<li>Đọc kỹ c&aacute;c chỉ dẫn tr&ecirc;n nh&atilde;n m&aacute;c của quần &aacute;o để biết c&aacute;ch giặt ph&ugrave; hợp đối với từng loại sản phẩm.</li>\r\n	<li>Ch&uacute; &yacute; những trang phục được chỉ định giặt kh&ocirc; &ldquo;Dry Cleaning&rdquo;.</li>\r\n	<li>Ph&acirc;n loại đồ m&agrave;u v&agrave; đồ trắng trước khi giặt để tr&aacute;nh trường hợp lem m&agrave;u từ quần &aacute;o n&agrave;y sang quần &aacute;o kh&aacute;c.</li>\r\n	<li>Kh&ocirc;ng sử dụng nước n&oacute;ng để giặt đồ v&igrave; dễ l&agrave;m gi&atilde;n chất vải, phai m&agrave;u quần &aacute;o.</li>\r\n	<li>Kh&ocirc;ng đổ trực tiếp x&agrave; ph&ograve;ng, chất tẩy rửa trực tiếp l&ecirc;n quần &aacute;o.</li>\r\n	<li>Kh&ocirc;ng ng&acirc;m quần &aacute;o với nước xả vải qu&aacute; 15 ph&uacute;t.</li>\r\n	<li>Cẩn thận khi giặt những trang phục l&agrave;m từ voan, ren, len, dệt kim; trang phục c&oacute; đ&iacute;nh đ&aacute;, đ&iacute;nh cườm, kim loại&hellip; n&ecirc;n l&agrave;m sạch bằng phương ph&aacute;p giặt hấp sấy, kh&ocirc;ng n&ecirc;n giặt m&aacute;y hoặc giặt tay tr&aacute;nh hư hỏng.</li>\r\n	<li>Đối với trang phục từ tơ tằm, gấm, nhung n&ecirc;n giặt kh&ocirc; để tr&aacute;nh bị co r&uacute;t, gi&atilde;n vải.</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/lg-styler-product-photos-5.jpg\" style=\"height:409px; width:727px\" /></p>\r\n\r\n<p><strong>Ủi quần &aacute;o</strong></p>\r\n\r\n<ul>\r\n	<li>Sử dụng th&ecirc;m b&igrave;nh xịt nước khi ủi/ l&agrave; quần &aacute;o để tiết kiệm thời gian v&agrave; gi&uacute;p bạn ủi dễ d&agrave;ng hơn.</li>\r\n	<li>Đối với vải thun mỏng, voan, dệt kim, lụa, gấm, nhung&hellip; bạn n&ecirc;n l&oacute;t một lớp vải l&ecirc;n tr&ecirc;n quần &aacute;o rồi hẳn ủi để tr&aacute;nh bị ch&aacute;y, hư hỏng trang phục.</li>\r\n	<li>Kh&ocirc;ng ủi trực tiếp l&ecirc;n bề mặt in h&igrave;nh của quần &aacute;o, h&atilde;y lộn ngược đồ lại rồi hẳn bắt đầu ủi.</li>\r\n	<li>Kh&ocirc;ng n&ecirc;n tăng giảm nhiệt độ đột ngột, bạn n&ecirc;n ph&acirc;n loại trang phục rồi sau đ&oacute; tiến h&agrave;nh ủi từ nhiệt thấp đến cao.</li>\r\n	<li>Điều chỉnh nhiệt độ của b&agrave;n ủi/ b&agrave;n l&agrave; ph&ugrave; hợp theo từng chất liệu vải:</li>\r\n	<li>Cotton: Điều chỉnh nhiệt độ đến 200 độ C.</li>\r\n	<li>Tơ nh&acirc;n tạo (Elastane/ Spandex/ Lycra) : Điều chỉnh nhiệt độ đến 190 độ C.</li>\r\n	<li>Len v&agrave; lụa: Điều chỉnh nhiệt độ đến 150 độ C.</li>\r\n	<li>Nylon, Polyester: Điều chỉnh nhiệt độ đến 130 độ C.</li>\r\n</ul>\r\n\r\n<p><strong>Bảo quản quần &aacute;o h&agrave;ng hiệu</strong></p>\r\n\r\n<ul>\r\n	<li>Treo quần &aacute;o ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t, tr&aacute;nh những vị tr&iacute; ẩm ướt. Quần &aacute;o n&ecirc;n treo thay v&igrave; gấp để giữ nguy&ecirc;n phom d&aacute;ng, kh&ocirc;ng bị nhăn.</li>\r\n	<li>Sau khi mặc xong n&ecirc;n giặt ngay kh&ocirc;ng n&ecirc;n để l&acirc;u 3 &ndash; 4 ng&agrave;y sẽ g&acirc;y m&ugrave;i ẩm mốc kh&oacute; chịu hoặc vết ố b&aacute;m v&agrave;o rất kh&oacute; l&agrave;m sạch.</li>\r\n	<li>Đối với quần t&acirc;y, &aacute;o thun mỏng, dệt kim, len&hellip; n&ecirc;n l&oacute;t giấy v&agrave;o thanh ngang của m&oacute;c đồ rồi hẳn treo quần &aacute;o l&ecirc;n để tr&aacute;nh tạo nếp hẳn sau một thời gian kh&ocirc;ng sử dụng.</li>\r\n	<li>Sử dụng s&aacute;p thơm, vi&ecirc;n h&uacute;t ẩm&hellip; trong tủ đồ để tạo hương thơm dễ chịu v&agrave; tr&aacute;nh g&acirc;y ẩm mốc.</li>\r\n</ul>\r\n\r\n<p><strong>M&aacute;y giặt hấp sấy LG Styler &ndash; m&aacute;y giặt h&agrave;ng hiệu ngay tại nh&agrave;</strong></p>\r\n\r\n<p>Thấu hiểu nhu cầu mặc đẹp ng&agrave;y c&agrave;ng được ưa chuộng, LG đ&atilde; cho ra mắt sản phẩm m&aacute;y giặt hơi nước ti&ecirc;n tiến nhất thế giới. Thay v&igrave; mất thời gian mang quần &aacute;o tới tiệm giặt l&agrave;, bạn c&oacute; thể tự giữ g&igrave;n trang phục của m&igrave;nh ngay tại nh&agrave;.</p>\r\n\r\n<p><a href=\"http://styler.vn/\">M&aacute;y giặt LG Styler</a>&nbsp;kh&ocirc;ng sử dụng h&oacute;a chất hay dung m&ocirc;i giặt tẩy. M&aacute;y hoạt động dựa tr&ecirc;n nguy&ecirc;n l&iacute; rung quần &aacute;o kết hợp với nước n&oacute;ng thẩm thấu s&acirc;u gi&uacute;p khử tr&ugrave;ng 100%, loại bỏ m&ugrave;i h&ocirc;i v&agrave; bụi bẩn, đồng thời giảm vết nhăn, l&agrave;m mới sợi vải.</p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/IMG_3024-2.jpg\" style=\"height:711px; width:400px\" /></p>\r\n\r\n<p><a href=\"https://lamsachkhongkhi.vn/pg/may-giat-hap-say\">LG Styler</a>&nbsp;t&iacute;ch hợp 3 chức năng ưu việt: giặt &ndash; sấy &ndash; ủi quần &aacute;o. Đ&acirc;y l&agrave; phương ph&aacute;p được ứng dụng phổ biến trong việc l&agrave;m sạch trang phục xa xỉ. M&aacute;y giặt hấp sấy LG Styler chăm s&oacute;c tối ưu cho mọi loại chất liệu cao cấp như l&ocirc;ng th&uacute;, lụa, tơ tằm, vest, đầm, v&aacute;y dạ hội&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/may-giat-LG-Styler-1-4.jpg\" style=\"height:525px; width:700px\" /></p>\r\n\r\n<p>Đặc biệt hơn, t&iacute;nh năng Easy Pants Crease Care gi&uacute;p quần &acirc;u c&oacute; thể được l&agrave;m sạch v&agrave; tạo nếp gấp cho li quần ho&agrave;n hảo chỉ trong v&ograve;ng 20 ph&uacute;t. Chế độ giặt nhanh rất ph&ugrave; hợp với những người c&oacute; cuộc sống bận rộn như: doanh nh&acirc;n, ch&iacute;nh kh&aacute;ch, người nổi tiếng,&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/loading-blazer-into-lg-styler.jpg\" style=\"height:534px; width:800px\" /></p>\r\n\r\n<p><strong>H&igrave;nh ảnh m&aacute;y giặt hấp sấy LG Styler</strong></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/IMG_4551-1.jpg\" style=\"height:800px; width:600px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/laundry-1.jpg\" style=\"height:467px; width:700px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/using-pants-crease-care-system-lg-styler-5.jpg\" style=\"height:825px; width:550px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/800-widt-1.jpg\" style=\"height:822px; width:548px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/12-S3RFBN-1.jpg\" style=\"height:552px; width:700px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://styler.vn/wp-content/uploads/2018/12/turning-on-lg-styler-steam-closet-clothing-care-system-1.jpg\" style=\"height:825px; width:550px\" /></p>', 'PpDk_2Uwc_bg-2.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `parent_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quần áo bé trai', 'quan-ao-be-trai', 0, 'Áo dài nam', 1, '2020-03-29 01:20:52', '2020-03-29 01:21:21'),
(2, 'Áo sơ mi bé trai', 'ao-so-mi-be-trai', 1, 'Áo sơ mi bé trai', 1, '2020-03-29 01:21:41', '2020-03-29 01:21:41'),
(3, 'Áo thun bé trai', 'ao-thun-be-trai', 1, 'Áo thun bé trai', 1, '2020-03-29 01:21:57', '2020-03-29 01:21:57'),
(4, 'Áo khoác bé trai', 'ao-khoac-be-trai', 1, 'Áo khoác bé trai', 1, '2020-03-29 01:22:12', '2020-03-29 01:22:12'),
(5, 'Quần jean bé trai', 'quan-jean-be-trai', 1, 'Quần jean bé trai', 1, '2020-03-29 01:22:33', '2020-03-29 01:22:33'),
(6, 'Quần áo bé gái', 'quan-ao-be-gai', 0, 'Quần áo bé gái', 1, '2020-03-29 01:23:02', '2020-03-29 01:23:02'),
(7, 'Váy đầm công chúa', 'vay-dam-cong-chua', 6, 'Váy đầm công chúa', 1, '2020-03-29 01:23:15', '2020-03-29 01:23:15'),
(8, 'Áo khoác bé gái', 'ao-khoac-be-gai', 6, 'Áo khoác bé gái', 1, '2020-03-29 01:23:32', '2020-03-29 01:23:32'),
(9, 'Đồ bộ bé gái', 'do-bo-be-gai', 6, 'Đồ bộ bé gái', 1, '2020-03-29 01:23:52', '2020-03-29 01:23:52'),
(10, 'Quần bé gái', 'quan-be-gai', 6, 'Quần bé gái', 1, '2020-03-29 01:24:11', '2020-03-29 01:24:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `img_logo`, `icon`, `email`, `address`, `phone`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '2Ryh_5Tnp_logo-1.png', 'ldej_OAHB_logo-1.png', 'divimart@gmail.com', 'Hà Nội', '19001998', 'Divimart', 'Divimart', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Hà Mạnh Tuấn', 'tuanhanb98@gmail.com', 'Có nhu cầu mua hàng số lượng lớn', 'Tôi có nhu cầu mua hàng với số lượng lớn', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `expiry_date`, `amount`, `amount_type`, `created_at`, `updated_at`) VALUES
(2, 'Tháng 5', '31-05-2020', '10', 'Persentage', NULL, NULL),
(3, '1234', '09-04-2020', '10', 'Persentage', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `coupon`, `created_at`, `updated_at`) VALUES
(1, 'Hà Mạnh Tuấn', 'tuanhanb98@gmail.com', '$2y$10$vetJ71d44HK8qF1Pj4McpOPuP3KCTyvgLt..XqiBsBy429sV/v4cW', '0979587821', 'Ninh Bình', '', '2020-03-29 12:30:33', '2020-03-29 12:30:33'),
(2, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', '$2y$10$JQfW54ki/Ef8pX5sJcLPyemGG1CPgKPrSxhSAsOQ6Gk98MGfSg4.G', '190011234', 'Số 20/120, Đường Đinh Tiên Hoàng', '', '2020-05-10 01:20:09', '2020-05-10 01:20:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, '0uWO_bZkt_1290x400-02.jpg', NULL, NULL),
(2, NULL, 'ID9s_CqkV_1290x400-01.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_03_29_063103_create_categories_table', 1),
(12, '2020_03_29_065211_create_config_table', 1),
(13, '2020_03_29_065405_create_media_table', 1),
(14, '2020_03_29_070642_create_products_table', 1),
(29, '2020_03_29_070752_create_product_img_table', 2),
(30, '2020_03_29_070807_create_product_size_table', 2),
(33, '2020_03_29_070900_create_customers_table', 2),
(34, '2020_03_29_070913_create_coupon_table', 2),
(35, '2020_03_29_070924_create_contact_table', 2),
(36, '2020_03_29_070936_create_blog_table', 2),
(37, '2020_03_29_070947_create_admin_log_table', 2),
(38, '2020_03_29_070958_create_admin_his_table', 2),
(42, '2020_03_29_070716_create_product_attr_table', 3),
(46, '2020_03_29_070824_create_orders_table', 4),
(47, '2020_03_29_070842_create_orderdetail_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `product_id`, `customer_id`, `product_name`, `size`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn Thêu Hình Đại Bàng', '1', 129000.00, 10, NULL, NULL),
(2, 2, 5, '', 'Áo Sơ Mi Dài Tay Cho Bé Trai Nhiều Họa Tiết Dễ Thương (1 - 7 tuổi)', '1', 129000.00, 10, NULL, NULL),
(3, 3, 6, '', 'Áo Thun Sát Nách Cho Bé Trai In Chữ YEAH! Sành Điệu', '1', 80000.00, 10, '2020-03-29 09:31:59', '2020-03-29 09:31:59'),
(4, 4, 2, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn Thêu Hình Đại Bàng', '2', 129000.00, 10, '2020-03-29 12:31:43', '2020-03-29 12:31:43'),
(5, 5, 3, '', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '1', 139000.00, 3, '2020-04-04 04:31:39', '2020-04-04 04:31:39'),
(6, 6, 3, '', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '2', 139000.00, 2, '2020-04-15 02:50:53', '2020-04-15 02:50:53'),
(7, 7, 6, '', 'Áo Thun Sát Nách Cho Bé Trai In Chữ YEAH! Sành Điệu', '3', 80000.00, 2, '2020-04-17 03:34:08', '2020-04-17 03:34:08'),
(8, 8, 3, '', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '1', 139000.00, 1, '2020-04-17 05:01:00', '2020-04-17 05:01:00'),
(9, 9, 2, '', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn Thêu Hình Đại Bàng', '2', 129000.00, 1, '2020-04-17 05:13:06', '2020-04-17 05:13:06'),
(10, 10, 3, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '3', 139000.00, 5, '2020-04-28 13:27:45', '2020-04-28 13:27:45'),
(11, 11, 35, '1', 'Áo Đầm Trẻ Em Cao Cấp Vải Voan Đính Kim Sa Sang Chảnh', '1', 259000.00, 3, '2020-04-28 13:37:07', '2020-04-28 13:37:07'),
(12, 12, 45, '1', 'Áo Khoác Kaki Màu Trơn Phối Túi Cho Bé', '3', 210000.00, 3, '2020-04-28 13:49:11', '2020-04-28 13:49:11'),
(13, 13, 19, '1', 'Thời Trang Bé Trai Áo Khoác Dù In Logo Phối Nón', '1', 159000.00, 1, '2020-04-28 13:59:07', '2020-04-28 13:59:07'),
(14, 14, 6, '1', 'Áo Thun Sát Nách Cho Bé Trai In Chữ YEAH! Sành Điệu', '1', 80000.00, 1, '2020-04-28 14:20:19', '2020-04-28 14:20:19'),
(15, 14, 4, '1', 'Áo Sơ Mi Sọc Ngắn Tay Cho Bé Trai Size Đại Cồ (10 - 13 tuổi)', '1', 159000.00, 1, '2020-04-28 14:20:19', '2020-04-28 14:20:19'),
(16, 15, 7, '1', 'Áo Thun Ba Lỗ Cho Bé Trai Nhiều Màu Giá Rẻ', '1', 40000.00, 1, '2020-05-09 06:48:06', '2020-05-09 06:48:06'),
(17, 16, 5, '1', 'Áo Sơ Mi Dài Tay Cho Bé Trai Nhiều Họa Tiết Dễ Thương (1 - 7 tuổi)', '2', 129000.00, 1, '2020-05-09 06:50:30', '2020-05-09 06:50:30'),
(18, 17, 3, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '4', 139000.00, 1, '2020-05-09 06:54:52', '2020-05-09 06:54:52'),
(19, 18, 57, '1', 'Bộ Pyjama Dành Cho Mẹ Tay Ngắn Quần Ngắn', '1', 139000.00, 9, '2020-05-09 07:01:35', '2020-05-09 07:01:35'),
(20, 19, 3, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '1', 139000.00, 5, '2020-05-10 07:06:49', '2020-05-10 07:06:49'),
(21, 19, 4, '1', 'Áo Sơ Mi Sọc Ngắn Tay Cho Bé Trai Size Đại Cồ (10 - 13 tuổi)', '1', 159000.00, 4, '2020-05-10 07:06:49', '2020-05-10 07:06:49'),
(22, 20, 3, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', '2', 139000.00, 3, '2020-05-10 07:49:10', '2020-05-10 07:49:10'),
(23, 20, 5, '1', 'Áo Sơ Mi Dài Tay Cho Bé Trai Nhiều Họa Tiết Dễ Thương (1 - 7 tuổi)', '1', 129000.00, 1, '2020-05-10 07:49:10', '2020-05-10 07:49:10'),
(24, 21, 2, '1', 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn Thêu Hình Đại Bàng', '1', 129000.00, 1, '2020-05-10 09:03:13', '2020-05-10 09:03:13'),
(25, 22, 6, '', 'Áo Thun Sát Nách Cho Bé Trai In Chữ YEAH! Sành Điệu', '1', 80000.00, 2, '2020-05-10 09:06:38', '2020-05-10 09:06:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` float NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `email`, `total_price`, `name`, `phone`, `note`, `address`, `order_status`, `coupon_code`, `coupon_amount`, `coupon_price`, `created_at`, `updated_at`) VALUES
(1, '', 'dat@gmail.com', 1290000, 'Đinh Nguyễn Thành Đạt', '0979587831', 'Thanh toàn sau giờ hành chính', 'Hoài Đức, Hà Nội', '4', '0', '0', 1290000, '2020-03-29 09:29:44', '2020-03-29'),
(2, '', 'dat@gmail.com', 1290000, 'Đinh Nguyễn Thành Đạt', '0979587831', NULL, 'Hoai Duc, Ha Noi', '4', '0', '0', 1290000, '2020-03-29 09:29:53', '2020-03-29'),
(3, '', 'dat@gmail.com', 800000, 'Đinh Nguyễn Thành Đạt', '0979587831', NULL, 'Hoai Duc, Ha Noi', '4', '0', '0', 800000, '2020-03-29 09:31:59', '2020-03-29'),
(4, '1', 'tuanhanb98@gmail.com', 1290000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 1290000, '2020-03-29 12:31:43', '2020-03-29'),
(5, '', 'dat@gmail.com', 417000, 'Đinh Nguyễn Thành Đạt', '0979587821', NULL, 'Ha Noi', '4', '0', '0', 417000, '2020-04-04 04:31:39', '2020-04-04'),
(6, '', 'dat@gmail.com', 278000, 'Đinh Nguyễn Thành Đạt', '0979587821', NULL, '1234', '4', '0', '0', 278000, '2020-04-15 02:50:53', '2020-04-15'),
(7, '', 'dat@gmail.com', 160000, 'Đinh Nguyễn Thành Đạt', '0979587821', NULL, 'HN', '4', '0', '0', 160000, '2020-04-17 03:34:08', '2020-04-17'),
(8, '', 'dat@gmail.com', 139000, 'Đinh Nguyễn Thành Đạt', '0979587821', NULL, '1234', '4', '0', '0', 139000, '2020-04-17 05:01:00', '2020-04-17'),
(9, '', 'dat@gmail.com', 129000, 'Đinh Nguyễn Thành Đạt', '0979587821', NULL, '1234', '4', '0', '0', 129000, '2020-04-17 05:13:06', '2020-04-17'),
(10, '1', 'tuanhanb98@gmail.com', 695000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 695000, '2020-04-28 13:27:45', '2020-04-28'),
(11, '1', 'tuanhanb98@gmail.com', 777000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 777000, '2020-04-28 13:37:07', '2020-04-28'),
(12, '1', 'tuanhanb98@gmail.com', 630000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 630000, '2020-05-06 13:49:11', '2020-05-07'),
(13, '1', 'tuanhanb98@gmail.com', 159000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', 'Tháng 4', '15900', 143100, '2020-05-08 13:59:07', '2020-05-07'),
(14, '1', 'tuanhanb98@gmail.com', 239000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 239000, '2020-05-08 14:20:19', '2020-05-08'),
(15, '1', 'tuanhanb98@gmail.com', 40000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 40000, '2020-05-09 06:48:06', '2020-05-09'),
(16, '1', 'tuanhanb98@gmail.com', 129000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', 'Tháng 4', '12900', 116100, '2020-05-09 06:50:30', '2020-05-09'),
(17, '1', 'tuanhanb98@gmail.com', 139000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 139000, '2020-05-09 06:54:52', '2020-05-09'),
(18, '1', 'tuanhanb98@gmail.com', 1251000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 1251000, '2020-05-09 07:01:35', '2020-05-09'),
(19, '1', 'tuanhanb98@gmail.com', 1331000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 1331000, '2020-05-10 07:06:49', '2020-05-10'),
(20, '1', 'tuanhanb98@gmail.com', 546000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 546000, '2020-05-10 07:49:10', '2020-05-10'),
(21, '1', 'tuanhanb98@gmail.com', 129000, 'Hà Mạnh Tuấn', '0979587821', NULL, 'Ninh Bình', '4', '0', '0', 129000, '2020-05-10 09:03:13', '2020-05-10'),
(22, '', 'dat@gmail.com', 160000, 'Nguyen Van A', '09123355', NULL, 'Ha Noi', '2', '0', '0', 160000, '2020-05-10 09:06:38', '2020-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `promotional_price` float NOT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `infor` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_count` int(11) DEFAULT 0,
  `count_view` int(11) DEFAULT 0,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `color`, `category_id`, `description`, `status`, `image`, `price`, `promotional_price`, `sale`, `count`, `content`, `infor`, `buy_count`, `count_view`, `author_id`, `created_at`, `updated_at`) VALUES
(2, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn Thêu Hình Đại Bàng', 'ao-so-mi-ngan-tay-cho-be-trai-mau-tron-theu-hinh-dai-bang', 'Vàng, Nâu, Xanh', 2, '<p><strong>&Aacute;o sơ mi cho b&eacute; trai&nbsp;</strong>chất liệu kaki thun co gi&atilde;n, phối t&uacute;i giả về 5 m&agrave;u: đỏ, xanh, v&agrave;ng, trắng v&agrave; xanh đen c&oacute; size từ 20kg - 35kg.</p>', 1, 'wTOk_ao-so-mi-ngan-tay-cho-be-trai-mau-tron-theu-hinh-dai-bang-5-9-tuoi (1).jpg', 129000, 0, '99.9', '10', '<h2>Thời trang &aacute;o sơ mi cho b&eacute; trai m&agrave;u trơn, phối t&uacute;i giả mặc đi chơi, đi tiệc&nbsp;sang trọng, lịch l&atilde;m</h2>\r\n\r\n<p>Thiết kế đơn giản nhưng độ sang trọng, bảnh bao th&igrave; kh&ocirc;ng hề k&eacute;m cạnh những mẫu kiểu d&aacute;ng kh&aacute;c đ&acirc;u nh&eacute;. Chỉ 1 ch&uacute;t họa tiết in, phối th&ecirc;m chiếc t&uacute;i giả c&ugrave;ng h&ograve;a phối tr&ecirc;n nền vải kaki thun co gi&atilde;n với những gam m&agrave;u trẻ trung đ&atilde; tạo n&ecirc;n một bộ sưu tập&nbsp;<strong><a href=\"https://babi.vn/thoi-trang-be-trai-183/ao-so-mi-220.html\">&aacute;o sơ mi cho trai</a></strong>&nbsp;y&ecirc;u nh&agrave; m&igrave;nh rồi đ&acirc;y n&agrave;y. Sản phẩm ph&ugrave; hợp trong mọi ho&agrave;n cảnh từ việc đi học hằng ng&agrave;y, đi chơi với bạn b&egrave; v&agrave; lu&ocirc;n cả mặc đi tiệc với gia đ&igrave;nh. Mẫu về size đại từ 20kg - 35kg chỉ với gi&aacute; 129.00đ. Mua ngay nha mẹ ơi.&nbsp;</p>', NULL, 2, 6, 1, '2020-03-27 03:42:05', NULL),
(3, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Chim Én', 'ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-hinh-chim-en', 'Màu trơn, In hình cánh én', 2, '<p>&Aacute;o sơ mi cho b&eacute; trai ngắn tay kiểu d&aacute;ng năng động m&agrave; vẫn lịch sự, phong c&aacute;ch so&aacute;i ca cho b&eacute; nh&agrave; m&igrave;nh đ&acirc;y mẹ ơi.</p>', 1, 'mfVt_ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-hinh-chim-en-1-8-tuoi (5).jpg', 139000, 0, '99.9', '10', '<h2>&Aacute;o sơ mi cho b&eacute; trai từ 1 - 8 tuổi in h&igrave;nh chim &eacute;n, thiết kế ngắn tay thoải m&aacute;i cho b&eacute; mặc dễ thương, năng động.</h2>\r\n\r\n<p>&nbsp;Mẹ sắm&nbsp;<strong><a href=\"https://babi.vn/t/ao-so-mi-cho-be-trai/\">&aacute;o sơ mi cho b&eacute;</a></strong>&nbsp;đi chơi những dịp cuối năm nh&eacute;, Babi đ&atilde; về mẫu &aacute;o sơ mi ngắn tay thoải m&aacute;i năng động m&agrave; vẫn đảm bảo lịch sự cho b&eacute; n&egrave;. B&eacute; c&oacute; thể mặc chung với quần jean, quần lửng hay quần kaki d&agrave;i đều đẹp mẹ nha. Chất vải cotton mịn đẹp, kiểu d&aacute;ng tho&aacute;ng m&aacute;t thoải m&aacute;i cho b&eacute;, mẹ đặt h&agrave;ng ngay v&agrave; lu&ocirc;n đi nha.&nbsp;</p>', NULL, 20, 10, 1, '2020-03-27 03:42:05', NULL),
(4, 'Áo Sơ Mi Sọc Ngắn Tay Cho Bé Trai Size Đại Cồ (10 - 13 tuổi)', 'ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-10-13-tuoi', 'Màu trơn, In hình cánh én', 2, '<p><strong>&Aacute;o sơ mi cho b&eacute; trai</strong>&nbsp;size đại cồ cho anh lớn nh&agrave; ta, m&agrave;u trơn họa tiết caro s&agrave;nh điệu lắm mẹ nh&eacute;.</p>', 1, 'NmoN_ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-hinh-chim-en-1-8-tuoi.jpg', 159000, 0, '99.9', '10', '<h2>Thời trang v&agrave; lịch l&atilde;m hơn với &aacute;o sơ mi tay ngắn họa tiết caro.</h2>\r\n\r\n<p>Trong những dịp cuối năm, &aacute;o sơ mi lu&ocirc;n l&agrave; mẫu đồ mẹ ưu ti&ecirc;n lựa chọn cho b&eacute; khi đi tiệc, đi học hay dạo phố v&igrave; tr&ocirc;ng rất lịch sự v&agrave; ph&ugrave; hợp với mọi ho&agrave;n cảnh? Chỉ cần mix chiếc &aacute;o sơ mi lịch l&atilde;m n&agrave;y với quần d&agrave;i đ&oacute;ng th&ugrave;ng l&agrave; đ&atilde; bảnh bao rồi mẹ.&nbsp;<strong><a href=\"https://babi.vn/thoi-trang-be-trai-183/ao-so-mi-220.html\">&Aacute;o sơ mi cho b&eacute; trai</a></strong>&nbsp;dưới đ&acirc;y chất liệu vải kate mềm m&aacute;t,&nbsp;tay ngắn, m&agrave;u trơn họa tiết caro phong c&aacute;ch. 3 m&agrave;u ph&ugrave; hợp cho b&eacute; 10 - 13 tuổi, mẹ click mua ngay cho b&eacute; nh&eacute;!</p>', NULL, 5, 3, 1, '2020-03-27 03:42:05', NULL),
(5, 'Áo Sơ Mi Dài Tay Cho Bé Trai Nhiều Họa Tiết Dễ Thương (1 - 7 tuổi)', 'ao-so-mi-dai-tay-cho-be-trai-nhieu-hoa-tiet-de-thuong-1-7-tuoi', 'Nhiều màu', 2, '<p><strong>&Aacute;o sơ mi tay d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc phong c&aacute;ch, dễ thương với nhiều họa tiết, c&oacute; size cho b&eacute; từ 1 - 7 tuổi.</p>', 1, 'Q22v_9075.JPG', 129000, 0, '99.9', '10', '<h2>Thời trang v&agrave; lịch l&atilde;m c&ugrave;ng &aacute;o sơ mi d&agrave;i tay cho b&eacute; trai.</h2>\r\n\r\n<p>B&eacute; trai sẽ tr&ocirc;ng lịch l&atilde;m nhưng kh&ocirc;ng k&eacute;m phần năng động với bộ trang phục kết hợp &aacute;o sơ mi với quần jeans, shorts hay quần d&agrave;i đ&acirc;u. Đi học hay đi tiệc chỉ cần chiếc &aacute;o sơ mi d&agrave;i tay với một chiếc quần bất k&igrave;&nbsp; l&agrave; đẹp nhất.&nbsp;<strong><a href=\"https://babi.vn/thoi-trang-be-trai-183/ao-so-mi-220.html\">&Aacute;o sơ mi d&agrave;i cho b&eacute; trai</a></strong>&nbsp;dưới đ&acirc;y chất liệu vải cotton mịn đẹp,&nbsp;tay d&agrave;i k&egrave;m họa tiết dinh động đủ size cho b&eacute; 1 - 7 tuổi. Mẹ mua ngay th&ocirc;i n&agrave;o.</p>', NULL, 2, 3, 1, '2020-03-27 03:42:05', NULL),
(6, 'Áo Thun Sát Nách Cho Bé Trai In Chữ YEAH! Sành Điệu', 'ao-thun-sat-nach-cho-be-trai-in-chu-yeah-sanh-dieu', 'Đỏ, cam', 3, '<p>&nbsp;<strong>&Aacute;o thun s&aacute;t n&aacute;ch thun cotton&nbsp;</strong>kiểu d&aacute;ng tho&aacute;ng m&aacute;t&nbsp;nhiều m&agrave;u sắc</p>', 1, 'V3sc_ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-11-14-tuoi-vi (5).jpg', 80000, 0, '99.9', '10', '<h2><strong>&Aacute;o thun s&aacute;t n&aacute;ch&nbsp;</strong>mạnh mẽ năng động cho b&eacute; trai phối c&ugrave;ng quần short jean, kaki đi chơi, đi học đều ph&ugrave; hợp.</h2>\r\n\r\n<p><a href=\"https://babi.vn/t/ao-thun-sat-nach-cho-be-trai/\"><strong>&Aacute;o thun s&aacute;t n&aacute;ch</strong></a>&nbsp;chắc chắn l&agrave; trang phục cần cho mọi b&eacute; trai trong m&ugrave;a h&egrave; n&oacute;ng nực n&agrave;y.&nbsp;<strong>&Aacute;o s&aacute;t n&aacute;ch cổ tr&ograve;n&nbsp;</strong>với chất liệu thun cotton tho&aacute;ng m&aacute;t v&agrave; thấm h&uacute;t tốt gi&uacute;p b&eacute; tha hồ vận động m&agrave; kh&ocirc;ng lo ướt đẫm mồ h&ocirc;i. Ngo&agrave;i ra c&ograve;n c&oacute; thể phối với quần short jean, kaki cho b&eacute; mặc đi học h&egrave; đầy khỏe mạnh v&agrave; năng động. C&aacute;c mẹ xem v&agrave; chọn lựa ngay m&agrave;u sắc, k&iacute;ch thước ph&ugrave; hợp cho b&eacute; nh&agrave; m&igrave;nh nha.</p>', NULL, 15, 4, 1, '2020-03-27 03:42:05', NULL),
(7, 'Áo Thun Ba Lỗ Cho Bé Trai Nhiều Màu Giá Rẻ', 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re', 'Vàng, đỏ, cam', 3, '<p><strong>&Aacute;o thun ba lỗ cho b&eacute; trai từ 6 th&aacute;ng đến 3 tuổi</strong>&nbsp;mặc gọn g&agrave;ng, m&aacute;t mẻ. Mẹ cho b&eacute; mặc h&egrave;.</p>', 1, 'u8pn_ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi (2).jpg', 40000, 0, '99.9', '10', '<h2>&Aacute;o thun ba lỗ cho b&eacute; trai mặc m&aacute;t mẻ m&ugrave;a h&egrave;</h2>\r\n\r\n<p>M&ugrave;a h&egrave; đến, những chiếc &aacute;o ba lỗ rất cần thiết để b&eacute; mặc m&aacute;t, lu&ocirc;n cảm thấy dễ chịu để b&eacute; thoải m&aacute;i vui đ&ugrave;a, chay nhảy khi ở nh&agrave;. Babi về &aacute;o thun ba lỗ&nbsp;m&agrave;u trơn, nhiều m&agrave;u sắc ngẫu nhi&ecirc;n ph&ugrave; hợp với b&eacute; trai.&nbsp;Thun cotton 4 chiều dễ thấm h&uacute;t mồ h&ocirc;i, b&eacute; mặc th&iacute;ch. Gi&aacute; rẻ 39.000đ mẹ mua v&agrave;i c&aacute;i cho b&eacute; mặc nh&agrave; nh&eacute; mẹ ơi</p>', NULL, 1, 1, 1, '2020-03-27 03:42:05', NULL),
(8, 'Áo Thun Ba Lỗ Cho Bé Trai Size Đại Nhiều Họa Tiết Đẹp', 'ao-thun-ba-lo-cho-be-trai-size-dai-nhieu-hoa-tiet-dep', 'Màu trơn, In hình cánh én', 3, '<p><strong>&Aacute;o thun ba lỗ cho b&eacute; trai&nbsp;</strong>từ 4 - 12 tuổi nhiều m&agrave;u sắc họa tiết đa dạng cho b&eacute; trai mặc nh&agrave;</p>', 1, 'KzQG_ao-thun-ba-lo-cho-be-trai-size-dai-nhieu-hoa-tiet-dep-4-12-tuoi (1).jpg', 80000, 0, '99.9', '10', '<h2>&nbsp;&Aacute;o thun ba lỗ cho b&eacute; trai mặc nh&agrave; hoặc vận động, chơi thể thao thoải m&aacute;i m&aacute;t mẻ, thấm h&uacute;t mồ h&ocirc;i cho b&eacute; từ 4 - 12 tuổi.</h2>\r\n\r\n<p>&nbsp;M&ugrave;a n&oacute;ng sắp trở lại rồi, mẹ đ&atilde; sắm đồ m&aacute;t mẻ cho b&eacute; nh&agrave; m&igrave;nh chưa? Đặt ngay &aacute;o thun ba lỗ n&agrave;y cho b&eacute; trai nh&agrave; m&igrave;nh nh&eacute;, &aacute;o thun cotton 3 lỗ với nhiều m&agrave;u sắc v&agrave; họa tiết kh&aacute;c nhau đa dạng cho b&eacute; lựa chọn v&agrave; phối đồ. Ph&ugrave; hợp cho b&eacute; mặc nh&agrave; cũng như mặc đi chơi, vận động c&ugrave;ng bạn b&egrave;, đảm bảo mang lại sự thoải m&aacute;i, năng động cho b&eacute;.</p>', NULL, 0, 0, 1, '2020-03-27 03:42:05', NULL),
(9, 'Áo Thun Cho Bé Trai Cổ Sơ Mi Phối Sọc Sành Điệu', 'ao-thun-cho-be-trai-co-so-mi-phoi-soc-sanh-dieu', 'Màu trơn, In hình cánh én', 3, '<p><strong>&Aacute;o thun cho b&eacute; trai từ 3 tuổi đến 8 tuổi</strong>&nbsp;cổ sơ mi, phối sọc, mặc kết hợp với quần jeans, kaki, quần short s&agrave;nh điệu</p>', 1, 'Wxjq_ao-thun-cho-be-trai-co-so-mi-phoi-soc-sanh-dieu-3-8-tuoi (2).jpg', 109000, 0, '99.9', '10', '<h2>&Aacute;o thun cho b&eacute; trai phối sọc, b&eacute; mặc thời trang, s&agrave;nh điệu.&nbsp;</h2>\r\n\r\n<p>Thời trang c&aacute; t&iacute;nh v&agrave; s&agrave;nh điệu c&ugrave;ng với &aacute;o thun phối sọc cho b&eacute; trai, kiểu &aacute;o ngắn tay, cổ sơ mi c&agrave;i n&uacute;t trước. Vải thun cotton 100% mềm mại, dễ thấm h&uacute;t mồ h&ocirc;i, mặc tho&aacute;ng. C&aacute;c b&eacute; trai trong độ tuổi từ 3 tuổi đến 8 tuổi mặc kết hợp với quần jeans, kaki, quần d&agrave;i, quần short rất phong c&aacute;ch, s&agrave;nh điệu. M&agrave;u trắng sọc, xanh đen đỏ, xanh đen xanh l&aacute;, mẹ chọn ngay m&agrave;u th&iacute;ch hợp cho b&eacute; mẹ nh&eacute;!</p>', NULL, 0, 0, 1, '2020-03-27 03:42:05', NULL),
(10, 'Áo Khoác Cho Bé Trai Thêu Số 9', 'ao-khoac-cho-be-trai-theu-so-9', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o Kho&aacute;c B&eacute; Trai&nbsp;</strong>phối m&agrave;u c&aacute; t&iacute;nh cho b&eacute; từ 2 đến 8 tuổi, c&oacute; n&oacute;n che chắn, mang lại cho b&eacute; trai phong c&aacute;ch thể thao khỏe khoắn.</p>', 1, '0m6x_ao-khoac-theu-so-9-phoi-mau-ca-tinh-cho-be-trai-2-8-tuoi_(2).jpg', 149000, 0, '99.9', '10', '', '<h2>&Aacute;o Kho&aacute;c Th&ecirc;u Số 9 Phối M&agrave;u C&aacute; T&iacute;nh Cho Cho B&eacute; Trai Từ 2 đến 8 tuổi n&egrave; mẹ ơi</h2>\r\n\r\n<p>Thiết kế khỏe khoắn v&agrave; c&aacute; t&iacute;nh, c&oacute; n&oacute;n thời trang. Chất vải thun da c&aacute; d&agrave;y dặn, tho&aacute;ng m&aacute;t, b&eacute; sẽ kh&ocirc;ng bị b&iacute; b&aacute;ch, kh&oacute; chịu. Một sản phẩm&nbsp;<strong><a href=\"https://babi.vn/\">thời trang trẻ em</a></strong>&nbsp;kh&ocirc;ng thể thiếu khi b&eacute; ra ngo&agrave;i n&egrave; mẹ ơi.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(11, 'Áo Khoác Jeans Cho Bé In Hình Ngôi Sao Dễ Thương', 'ao-khoac-jeans-cho-be-in-hinh-ngoi-sao-de-thuong', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;phối đồ thời trang s&agrave;nh điệu. Sản phẩm ph&ugrave; hợp cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i. Ch&uacute;ng con muốn diện cặp. Mẹ ơi, mua cho con nh&eacute;!</p>', 1, 'f2aw_ao-khoac-jeans-cho-be-in-hinh-ngoi-sao-de-thuong-3-14-tuoi_(2).jpg', 139000, 0, '99.9', '10', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;phối đồ thời trang s&agrave;nh điệu. Sản phẩm ph&ugrave; hợp cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i. Ch&uacute;ng con muốn diện cặp. Mẹ ơi, mua cho con nh&eacute;!</p>', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;phối đồ thời trang s&agrave;nh điệu. Sản phẩm ph&ugrave; hợp cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i. Ch&uacute;ng con muốn diện cặp. Mẹ ơi, mua cho con nh&eacute;!</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(12, 'Áo Khoác Cho Bé Trai Caro Phối Nón In Hình Sư Tử', 'ao-khoac-cho-be-trai-caro-phoi-non-in-hinh-su-tu', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o kho&aacute;c cho b&eacute; trai&nbsp;</strong>vải kaki caro c&oacute; n&oacute;n in logo v&agrave; sư tử s&agrave;nh điệu mạnh mẽ cho b&eacute; từ 1 - 11 tuổi.</p>', 1, 'H6F9_ao-khoac-cho-be-caro-phoi-non-in-hinh-su-tu-1-11-tuoi_(4).jpg', 169000, 0, '99.9', '10', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute; trai&nbsp;</strong>vải kaki caro c&oacute; n&oacute;n in logo v&agrave; sư tử s&agrave;nh điệu mạnh mẽ cho b&eacute; từ 1 - 11 tuổi.</p>', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute; trai&nbsp;</strong>vải kaki caro c&oacute; n&oacute;n in logo v&agrave; sư tử s&agrave;nh điệu mạnh mẽ cho b&eacute; từ 1 - 11 tuổi.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(13, 'Áo Khoác Kaki Thể Thao Cho Bé Trai In Chữ Sành Điệu', 'ao-khoac-kaki-the-thao-cho-be-trai-in-chu-sanh-dieu', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o kho&aacute;c kaki thể thao cho b&eacute; trai từ 1 tuổi đến 8 tuổi</strong>&nbsp;kh&ocirc;ng n&oacute;n, b&eacute; mặc kho&aacute;c ngo&agrave;i phong c&aacute;ch.</p>', 1, 'Ku2T_ao-khoac-kaki-the-thao-cho-be-trai-in-chu-sanh-dieu-1-8-tuoi_(3).jpg', 159000, 0, '99.9', '10', '<p><strong>&Aacute;o kho&aacute;c kaki thể thao cho b&eacute; trai từ 1 tuổi đến 8 tuổi</strong>&nbsp;kh&ocirc;ng n&oacute;n, b&eacute; mặc kho&aacute;c ngo&agrave;i phong c&aacute;ch.</p>', '<p><strong>&Aacute;o kho&aacute;c kaki thể thao cho b&eacute; trai từ 1 tuổi đến 8 tuổi</strong>&nbsp;kh&ocirc;ng n&oacute;n, b&eacute; mặc kho&aacute;c ngo&agrave;i phong c&aacute;ch.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(14, 'Áo Khoác Phao Tay Dài Phối Nón Cho Bé Màu Trơn Đơn Giản', 'ao-khoac-phao-tay-dai-phoi-non-cho-be-mau-tron-don-gian', 'Màu trơn, In hình cánh én', 4, '<p><strong>&nbsp;&Aacute;o kho&aacute;c phao cho b&eacute;</strong>&nbsp;ấm &aacute;p si&ecirc;u dễ thương cho những ng&agrave;y se lạnh, những chuyến đi xa về qu&ecirc; m&ugrave;a cuối năm.</p>', 1, 'X1e8_ao-khoac-kaki-the-thao-cho-be-trai-in-chu-sanh-dieu-1-8-tuoi_(3).jpg', 279000, 0, '99.9', '10', '<p><strong>&nbsp;&Aacute;o kho&aacute;c phao cho b&eacute;</strong>&nbsp;ấm &aacute;p si&ecirc;u dễ thương cho những ng&agrave;y se lạnh, những chuyến đi xa về qu&ecirc; m&ugrave;a cuối năm.</p>', '<p><strong>&nbsp;&Aacute;o kho&aacute;c phao cho b&eacute;</strong>&nbsp;ấm &aacute;p si&ecirc;u dễ thương cho những ng&agrave;y se lạnh, những chuyến đi xa về qu&ecirc; m&ugrave;a cuối năm.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(15, 'Áo Khoác Thun Da Cá Cho Bé Trai In Chữ Cá Tính (1 - 12 tuổi)', 'ao-khoac-thun-da-ca-cho-be-trai-in-chu-ca-tinh-1-12-tuoi', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o Kho&aacute;c Da C&aacute; Cho B&eacute; Trai In Chữ C&aacute; T&iacute;nh (1 - 12 tuổi)&nbsp;</strong>với chất thun da c&aacute; d&agrave;y dặn mặc đi chơi, phối đồ, đi nắng rất ph&ugrave; hợp c&oacute; th&ecirc;m size đại. Xem ngay cho n&eacute;</p>', 1, '0fx3_ao-khoac-thun-da-ca-cho-be-trai-in-chu-ca-tinh-1-12-tuoi_(4).jpg', 129000, 0, '99.9', '10', '<p><strong>&Aacute;o Kho&aacute;c Da C&aacute; Cho B&eacute; Trai In Chữ C&aacute; T&iacute;nh (1 - 12 tuổi)&nbsp;</strong>với chất thun da c&aacute; d&agrave;y dặn mặc đi chơi, phối đồ, đi nắng rất ph&ugrave; hợp c&oacute; th&ecirc;m size đại. Xem ngay cho n&eacute;</p>', '<p><strong>&Aacute;o Kho&aacute;c Da C&aacute; Cho B&eacute; Trai In Chữ C&aacute; T&iacute;nh (1 - 12 tuổi)&nbsp;</strong>với chất thun da c&aacute; d&agrave;y dặn mặc đi chơi, phối đồ, đi nắng rất ph&ugrave; hợp c&oacute; th&ecirc;m size đại. Xem ngay cho n&eacute;</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(16, 'Áo Khoác Siêu Nhân Nhện Cho Bé Trai (1 tuổi - 5 tuổi)', 'ao-khoac-sieu-nhan-nhen-cho-be-trai-1-tuoi-5-tuoi', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o Kho&aacute;c B&eacute; Trai&nbsp;</strong>phối m&agrave;u c&aacute; t&iacute;nh cho b&eacute; từ 1 đến 5 tuổi, c&oacute; n&oacute;n che chắn c&ugrave;ng họa tiết si&ecirc;u nh&acirc;n nhện tinh nghịch, mang lại cho b&eacute; trai phong c&aacute;ch thể thao khỏe khoắn.</p>', 1, 'bE7R_ao-khoac-sieu-nhan-nhen-cho-be-trai-1-tuoi-5-tuoi_(2).jpg', 129000, 0, '99.9', '10', '<p><strong>&Aacute;o Kho&aacute;c B&eacute; Trai&nbsp;</strong>phối m&agrave;u c&aacute; t&iacute;nh cho b&eacute; từ 1 đến 5 tuổi, c&oacute; n&oacute;n che chắn c&ugrave;ng họa tiết si&ecirc;u nh&acirc;n nhện tinh nghịch, mang lại cho b&eacute; trai phong c&aacute;ch thể thao khỏe khoắn.</p>', '<p><strong>&Aacute;o Kho&aacute;c B&eacute; Trai&nbsp;</strong>phối m&agrave;u c&aacute; t&iacute;nh cho b&eacute; từ 1 đến 5 tuổi, c&oacute; n&oacute;n che chắn c&ugrave;ng họa tiết si&ecirc;u nh&acirc;n nhện tinh nghịch, mang lại cho b&eacute; trai phong c&aacute;ch thể thao khỏe khoắn.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(17, 'Áo Khoác Phối Màu Sành Điệu Cho Bé Trai', 'ao-khoac-phoi-mau-sanh-dieu-cho-be-trai', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o Kho&aacute;c Cho B&eacute; Trai (1 -6 tuổi)</strong>&nbsp;- Chất liệu thun da c&aacute; vừa vặn, thấm h&uacute;t mồ h&ocirc;i tốt, tay phối m&agrave;u thời trang, trẻ trung, l&agrave; lựa chọn số 1 cho b&eacute; trong m&ugrave;a h&egrave; ch&oacute;i chang.</p>', 1, 'ApKr_ao-khoac-phoi-mau-sanh-dieu-cho-be-trai-1-6-tuoi_(6).jpg', 139000, 0, '99.9', '10', '<p><strong>&Aacute;o Kho&aacute;c Cho B&eacute; Trai (1 -6 tuổi)</strong>&nbsp;- Chất liệu thun da c&aacute; vừa vặn, thấm h&uacute;t mồ h&ocirc;i tốt, tay phối m&agrave;u thời trang, trẻ trung, l&agrave; lựa chọn số 1 cho b&eacute; trong m&ugrave;a h&egrave; ch&oacute;i chang.</p>', '<p><strong>&Aacute;o Kho&aacute;c Cho B&eacute; Trai (1 -6 tuổi)</strong>&nbsp;- Chất liệu thun da c&aacute; vừa vặn, thấm h&uacute;t mồ h&ocirc;i tốt, tay phối m&agrave;u thời trang, trẻ trung, l&agrave; lựa chọn số 1 cho b&eacute; trong m&ugrave;a h&egrave; ch&oacute;i chang.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(18, 'Áo Khoác Dù Cho Bé Trai 1-6 Tuổi In Hình Xe 3D', 'ao-khoac-du-cho-be-trai-1-6-tuoi-in-hinh-xe-3d', 'Màu trơn, In hình cánh én', 4, '<p><strong>&Aacute;o Kho&aacute;c D&ugrave; Cho B&eacute; Trai 1-6 Tuổi</strong>, Họa Tiết In H&igrave;nh Xe 3D B&eacute; N&agrave;o Cũng Th&iacute;ch Th&uacute; - Mẹ Gh&eacute; Babi Mua Ngay Cho B&eacute; Nh&eacute;!</p>', 1, '7ex5_ao-khoac-du-cho-be-trai-in-hinh-xe-3d_(3).jpg', 158000, 0, '99.9', '10', '<p><strong>&Aacute;o Kho&aacute;c D&ugrave; Cho B&eacute; Trai 1-6 Tuổi</strong>, Họa Tiết In H&igrave;nh Xe 3D B&eacute; N&agrave;o Cũng Th&iacute;ch Th&uacute; - Mẹ Gh&eacute; Babi Mua Ngay Cho B&eacute; Nh&eacute;!</p>', '<p><strong>&Aacute;o Kho&aacute;c D&ugrave; Cho B&eacute; Trai 1-6 Tuổi</strong>, Họa Tiết In H&igrave;nh Xe 3D B&eacute; N&agrave;o Cũng Th&iacute;ch Th&uacute; - Mẹ Gh&eacute; Babi Mua Ngay Cho B&eacute; Nh&eacute;!</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(19, 'Thời Trang Bé Trai Áo Khoác Dù In Logo Phối Nón', 'thoi-trang-be-trai-ao-khoac-du-in-logo-phoi-non', 'Màu trơn, In hình cánh én', 4, '<p><strong>Thời Trang B&eacute; Trai &Aacute;o Kho&aacute;c D&ugrave; In Logo Phối N&oacute;n</strong>&nbsp;- Thiết kế &aacute;o 2 lớp, b&ecirc;n ngo&agrave;i l&agrave; vải d&ugrave; bền đẹp v&agrave;&nbsp; b&ecirc;n trong được l&oacute;t lưới tho&aacute;ng m&aacute;t cho c&aacute;c b&eacute;.</p>', 1, 'JKjs_thoi-trang-be-trai-ao-khoac-du-in-logo-phoi-non_(2).jpg', 159000, 0, '99.9', '10', '<p><strong>Thời Trang B&eacute; Trai &Aacute;o Kho&aacute;c D&ugrave; In Logo Phối N&oacute;n</strong>&nbsp;- Thiết kế &aacute;o 2 lớp, b&ecirc;n ngo&agrave;i l&agrave; vải d&ugrave; bền đẹp v&agrave;&nbsp; b&ecirc;n trong được l&oacute;t lưới tho&aacute;ng m&aacute;t cho c&aacute;c b&eacute;.</p>', '<p><strong>Thời Trang B&eacute; Trai &Aacute;o Kho&aacute;c D&ugrave; In Logo Phối N&oacute;n</strong>&nbsp;- Thiết kế &aacute;o 2 lớp, b&ecirc;n ngo&agrave;i l&agrave; vải d&ugrave; bền đẹp v&agrave;&nbsp; b&ecirc;n trong được l&oacute;t lưới tho&aacute;ng m&aacute;t cho c&aacute;c b&eacute;.</p>', 1, 2, 1, '2020-03-27 03:42:05', NULL),
(20, 'Áo Sơ Mi Trắng Dài Tay Phối Túi Cho Bé Trai Đơn Giản', 'ao-so-mi-trang-dai-tay-phoi-tui-cho-be-trai-don-gian', 'Trắng', 2, '<p><strong>&Aacute;o sơ mi trắng&nbsp;(7 - 14 tuổi)&nbsp;</strong>thiết kế d&agrave;i tay, phối t&uacute;i. B&eacute; mặc đi học, đi tiệc rất ph&ugrave; hợp. Mẫu về size đại với số lượng &iacute;t. Đặt ngay mẹ nh&eacute;.</p>', 1, '6taZ_ao-so-mi-trang-dai-tay-phoi-tui-cho-be-trai-don-gian-size-dai-6-14-tuoi.jpg', 159000, 0, '99.9', '10', '<p><strong>&Aacute;o sơ mi trắng&nbsp;(7 - 14 tuổi)&nbsp;</strong>thiết kế d&agrave;i tay, phối t&uacute;i. B&eacute; mặc đi học, đi tiệc rất ph&ugrave; hợp. Mẫu về size đại với số lượng &iacute;t. Đặt ngay mẹ nh&eacute;.</p>', '<p><strong>&Aacute;o sơ mi trắng&nbsp;(7 - 14 tuổi)&nbsp;</strong>thiết kế d&agrave;i tay, phối t&uacute;i. B&eacute; mặc đi học, đi tiệc rất ph&ugrave; hợp. Mẫu về size đại với số lượng &iacute;t. Đặt ngay mẹ nh&eacute;.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(21, 'Áo Sơ Mi Dài Tay Cho Bé Trai Màu Trơn In Logo Ngựa Đơn Giản', 'ao-so-mi-dai-tay-cho-be-trai-mau-tron-in-logo-ngua-don-gian', 'Trắng', 2, '<p><strong>&Aacute;o sơ mi tay d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc phong c&aacute;ch, m&agrave;u trơn in h&igrave;nh logo ngựa c&oacute; size cho b&eacute; từ 9 th&aacute;ng đến 11 tuổi.</p>', 1, 'mD6x_ao-so-mi-dai-tay-cho-be-trai-mau-tron-in-logo-ngua-don-gian-9-thang-11-tuoi_(5).jpg', 119000, 109000, '8.4', '10', '<p><strong>&Aacute;o sơ mi tay d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc phong c&aacute;ch, m&agrave;u trơn in h&igrave;nh logo ngựa c&oacute; size cho b&eacute; từ 9 th&aacute;ng đến 11 tuổi.</p>', '<p><strong>&Aacute;o sơ mi tay d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc phong c&aacute;ch, m&agrave;u trơn in h&igrave;nh logo ngựa c&oacute; size cho b&eacute; từ 9 th&aacute;ng đến 11 tuổi.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(22, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai In Logo', 'ao-so-mi-ngan-tay-cho-be-trai-in-logo', 'Màu trơn, In hình cánh én', 2, '<p><strong>&Aacute;o sơ mi cho b&eacute; trai&nbsp;(8 - 12 tuổi)</strong>&nbsp;ngắn tay in logo về size đại cho b&eacute; từ 26kg - 50kg. B&eacute; mặc đi chơi, đi học, dự tiệc rất sang trọng.</p>', 1, 'tte4_ao-khoac-jeans-cho-be-phoi-tui-sanh-dieu-size-dai-5-8-tuoi_(1).jpg', 129000, 0, '99.9', '10', '<p><strong>&Aacute;o sơ mi cho b&eacute; trai&nbsp;(8 - 12 tuổi)</strong>&nbsp;ngắn tay in logo về size đại cho b&eacute; từ 26kg - 50kg. B&eacute; mặc đi chơi, đi học, dự tiệc rất sang trọng.</p>', '<p><strong>&Aacute;o sơ mi cho b&eacute; trai&nbsp;(8 - 12 tuổi)</strong>&nbsp;ngắn tay in logo về size đại cho b&eacute; từ 26kg - 50kg. B&eacute; mặc đi chơi, đi học, dự tiệc rất sang trọng.</p>', 0, 0, 1, '2020-03-27 03:42:05', '2020-04-27 07:18:05'),
(23, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Logo Ngựa', 'ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-logo-ngua', 'Nhiều màu', 2, '<p><strong>&Aacute;o sơ mi tay ngắn cho b&eacute; trai</strong>&nbsp;nhiều size từ size nh&iacute; đến size đại (9 th&aacute;ng - 11 tuổi), mẹ mua để b&eacute; mặc đi học, đi chơi hay đi tiệc rất phong c&aacute;ch.</p>', 1, 'DmRt_ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-logo-ngua-don-gian-9-thang-11-tuoi_(2).jpg', 110000, 0, '99.9', '10', '<p><strong>&Aacute;o sơ mi tay ngắn cho b&eacute; trai</strong>&nbsp;nhiều size từ size nh&iacute; đến size đại (9 th&aacute;ng - 11 tuổi), mẹ mua để b&eacute; mặc đi học, đi chơi hay đi tiệc rất phong c&aacute;ch.</p>', '<p><strong>&Aacute;o sơ mi tay ngắn cho b&eacute; trai</strong>&nbsp;nhiều size từ size nh&iacute; đến size đại (9 th&aacute;ng - 11 tuổi), mẹ mua để b&eacute; mặc đi học, đi chơi hay đi tiệc rất phong c&aacute;ch.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(24, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Màu Trơn In Hình Xe Dễ Thương', 'ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-hinh-xe-de-thuong', 'Xám, Xanh, Trắng', 2, '<p>&Aacute;o sơ mi b&eacute; trai ngắn tay in h&igrave;nh xe, m&aacute;y bay b&eacute; cực th&iacute;ch chất vải cotton mềm mịn mặc thoải m&aacute;i&nbsp;</p>', 1, 'NvlL_ao-so-mi-ngan-tay-cho-be-trai-mau-tron-in-hinh-xe-de-thuong-1-10-tuoi_(4).jpg', 129000, 0, '99.9', '10', '<p>&Aacute;o sơ mi b&eacute; trai ngắn tay in h&igrave;nh xe, m&aacute;y bay b&eacute; cực th&iacute;ch chất vải cotton mềm mịn mặc thoải m&aacute;i&nbsp;</p>', '<p>&Aacute;o sơ mi b&eacute; trai ngắn tay in h&igrave;nh xe, m&aacute;y bay b&eacute; cực th&iacute;ch chất vải cotton mềm mịn mặc thoải m&aacute;i&nbsp;</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(25, 'Áo Sơ Mi Ngắn Tay Cho Bé Trai Nhìu Họa Tiết', 'ao-so-mi-ngan-tay-cho-be-trai-nhiu-hoa-tiet', 'Nhiều màu', 2, '<p><strong>&Aacute;o Sơ Mi B&eacute; Trai</strong>&nbsp;Ngắn Tay Nhiều Họa Tiết cho b&eacute; từ 1 đến 11 tuổi - &Aacute;o phối t&uacute;i trước cho b&eacute;, chất thun cotton mịn đẹp mẹ y&ecirc;n t&acirc;m tha hồ diện cho ch&agrave;ng</p>', 1, 'zRlD_ao-so-mi-ngan-tay-cho-be-trai-nhiu-hoa-tiet-1-11-tuoi_(4).jpg', 119000, 0, '99.9', '10', '<p><strong>&Aacute;o Sơ Mi B&eacute; Trai</strong>&nbsp;Ngắn Tay Nhiều Họa Tiết cho b&eacute; từ 1 đến 11 tuổi - &Aacute;o phối t&uacute;i trước cho b&eacute;, chất thun cotton mịn đẹp mẹ y&ecirc;n t&acirc;m tha hồ diện cho ch&agrave;ng</p>', '<p><strong>&Aacute;o Sơ Mi B&eacute; Trai</strong>&nbsp;Ngắn Tay Nhiều Họa Tiết cho b&eacute; từ 1 đến 11 tuổi - &Aacute;o phối t&uacute;i trước cho b&eacute;, chất thun cotton mịn đẹp mẹ y&ecirc;n t&acirc;m tha hồ diện cho ch&agrave;ng</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(26, 'Quần Jean Lửng Bé Trai Đắp Rách Sành Điệu', 'quan-jean-lung-be-trai-dap-rach-sanh-dieu', 'Xanh', 5, '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun c&oacute; tui, chất jean co gi&atilde;n mặc phối c&ugrave;ng &aacute;o thun, sơ mi đi học, dạo phố, mặc nh&agrave; c&aacute; t&iacute;nh.</p>', 1, 'AjXs_quan-jeans-lung-be-trai-dap-rach-sanh-dieu-size-dai-5-9-tuoi_(2).jpg', 139000, 0, '99.9', '10', '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun c&oacute; tui, chất jean co gi&atilde;n mặc phối c&ugrave;ng &aacute;o thun, sơ mi đi học, dạo phố, mặc nh&agrave; c&aacute; t&iacute;nh.</p>', '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun c&oacute; tui, chất jean co gi&atilde;n mặc phối c&ugrave;ng &aacute;o thun, sơ mi đi học, dạo phố, mặc nh&agrave; c&aacute; t&iacute;nh.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(27, 'Quần Jean Lửng Bé Trai Wax Đắp Rách Siêu Ngầu', 'quan-jean-lung-be-trai-wax-dap-rach-sieu-ngau', 'Xanh', 5, '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun mặc đi chơi, học th&ecirc;m, dễ phối với &aacute;o thun, sơ mi mặc thoải m&aacute;i, s&agrave;nh điệu.</p>', 1, 'SZV3_quan-jeans-lung-be-trai-wax-dap-rach-sieu-ngau-size-dai-5-9-tuoi_(3).jpg', 139000, 0, '99.9', '10', '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun mặc đi chơi, học th&ecirc;m, dễ phối với &aacute;o thun, sơ mi mặc thoải m&aacute;i, s&agrave;nh điệu.</p>', '<p><strong>Quần b&eacute; trai&nbsp;</strong>lưng thun mặc đi chơi, học th&ecirc;m, dễ phối với &aacute;o thun, sơ mi mặc thoải m&aacute;i, s&agrave;nh điệu.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(28, 'Quần Jeans Màu Trơn Wax Rách Cho Bé Trai Sành Điệu', 'quan-jeans-mau-tron-wax-rach-cho-be-trai-sanh-dieu', 'Nhiều màu', 5, '<p><strong>Quần jeans wax r&aacute;ch cho b&eacute; trai từ 5 tuổi đến 8 tuổi</strong>&nbsp;hoặc c&aacute;c b&eacute; từ 17kg đến 30kg mặc s&agrave;nh điệu</p>', 1, 'hNTS_quan-jeans-mau-tron-wax-rach-cho-be-trai-sanh-dieu-5-8-tuoi_(3).jpg', 229000, 0, '99.9', '10', '<p><strong>Quần jeans wax r&aacute;ch cho b&eacute; trai từ 5 tuổi đến 8 tuổi</strong>&nbsp;hoặc c&aacute;c b&eacute; từ 17kg đến 30kg mặc s&agrave;nh điệu</p>', '<p><strong>Quần jeans wax r&aacute;ch cho b&eacute; trai từ 5 tuổi đến 8 tuổi</strong>&nbsp;hoặc c&aacute;c b&eacute; từ 17kg đến 30kg mặc s&agrave;nh điệu</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(29, 'Quần Jeans Lửng Bé Trai Màu Trơn Phong Cách Đơn Giản', 'quan-jeans-lung-be-trai-mau-tron-phong-cach-don-gian', 'Màu trơn', 5, '<p><strong>Quần jeans lửng b&eacute; trai size đại cồ 50kg đến 60 kg</strong>, phong c&aacute;ch đơn giản nhưng b&eacute; mặc cực dễ thương</p>', 1, 'ju7d_quan-jeans-lung-be-trai-mau-tron-phong-cach-don-gian-size-dai-co-50kg-65kg_(2).jpg', 239000, 0, '99.9', '10', '<p><strong>Quần jeans lửng b&eacute; trai size đại cồ 50kg đến 60 kg</strong>, phong c&aacute;ch đơn giản nhưng b&eacute; mặc cực dễ thương</p>', '<p><strong>Quần jeans lửng b&eacute; trai size đại cồ 50kg đến 60 kg</strong>, phong c&aacute;ch đơn giản nhưng b&eacute; mặc cực dễ thương</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(30, 'Quần Jeans Lửng Bé Trai Màu Trơn Phong Cách Đơn Giản', 'quan-jeans-lung-be-trai-mau-tron-phong-cach-don-gian', 'Xanh', 5, '<p>Quần jeans lửng cho b&eacute; trai từ 8 - 13 tuổi lưng thun m&agrave;u trơn tiện lợi năng động cho b&eacute;</p>', 1, '6clK_quan-jeans-lung-be-trai-mau-tron-phong-cach-don-gian-size-dai-co-50kg-65kg_(2).jpg', 179000, 0, '99.9', '10', '<p>Quần jeans lửng cho b&eacute; trai từ 8 - 13 tuổi lưng thun m&agrave;u trơn tiện lợi năng động cho b&eacute;</p>', '<p>Quần jeans lửng cho b&eacute; trai từ 8 - 13 tuổi lưng thun m&agrave;u trơn tiện lợi năng động cho b&eacute;</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(31, 'Quần Jeans Dài Cho Bé Trai Mộc Màu Trơn Wash Nhẹ Năng Động', 'quan-jeans-dai-cho-be-trai-moc-mau-tron-wash-nhe-nang-dong', 'Trắng, Đen', 5, '<p><strong>&nbsp;Quần jeans d&agrave;i cho b&eacute; trai</strong>&nbsp;từ 1 - 6 tuổi mộc trơn wash r&aacute;ch nhẹ s&agrave;nh điệu, 2 m&agrave;u trắng đen cơ bản cho b&eacute; lựa chọn dễ phối đồ.</p>', 1, 'URDZ_quan-jeans-moc-mau-tron-wash-nhe-cho-be-trai-nang-dong-1-6-tuoi_(3).jpg', 179000, 0, '99.9', '10', '<p><strong>&nbsp;Quần jeans d&agrave;i cho b&eacute; trai</strong>&nbsp;từ 1 - 6 tuổi mộc trơn wash r&aacute;ch nhẹ s&agrave;nh điệu, 2 m&agrave;u trắng đen cơ bản cho b&eacute; lựa chọn dễ phối đồ.</p>', '<p><strong>&nbsp;Quần jeans d&agrave;i cho b&eacute; trai</strong>&nbsp;từ 1 - 6 tuổi mộc trơn wash r&aacute;ch nhẹ s&agrave;nh điệu, 2 m&agrave;u trắng đen cơ bản cho b&eacute; lựa chọn dễ phối đồ.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(32, 'Quần Jeans Dài Lưng Thun Cho Bé Trai Wax Nhẹ Thời Trang', 'quan-jeans-dai-lung-thun-cho-be-trai-wax-nhe-thoi-trang', 'Xám', 5, '<p><strong>Quần jean d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc đi chơi tết, dự tiệc phối c&ugrave;ng &aacute;o thun, sơ mi tr&ocirc;ng bảnh bao lắm mẹ nha.</p>', 1, '3NGY_quan-jeans-dai-lung-thun-cho-be-trai-wax-nhe-thoi-trang-size-dai-5-8-tuoi_(2).jpg', 229000, 0, '99.9', '10', '<p><strong>Quần jean d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc đi chơi tết, dự tiệc phối c&ugrave;ng &aacute;o thun, sơ mi tr&ocirc;ng bảnh bao lắm mẹ nha.</p>', '<p><strong>Quần jean d&agrave;i cho b&eacute; trai</strong>&nbsp;mặc đi chơi tết, dự tiệc phối c&ugrave;ng &aacute;o thun, sơ mi tr&ocirc;ng bảnh bao lắm mẹ nha.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(33, 'Quần Jeans Lửng Bé Trai In Logo Kèm Khóa Sành Điệu', 'quan-jeans-lung-be-trai-in-logo-kem-khoa-sanh-dieu', 'Xanh', 5, '<p>&nbsp;Quần jeans lửng cho b&eacute; trai từ 5 - 10 tuổi lưng thun, in logo k&egrave;m theo kh&oacute;a h&igrave;nh ngẫu nhi&ecirc;n cực ngầu v&agrave; s&agrave;nh điệu.</p>', 1, 'e1Bs_quan-jeans-lung-be-trai-in-logo-kem-khoa-sanh-dieu-5-10-tuoi-(3).jpg', 179000, 0, '99.9', '10', '<p>&nbsp;Quần jeans lửng cho b&eacute; trai từ 5 - 10 tuổi lưng thun, in logo k&egrave;m theo kh&oacute;a h&igrave;nh ngẫu nhi&ecirc;n cực ngầu v&agrave; s&agrave;nh điệu.</p>', '<p>&nbsp;Quần jeans lửng cho b&eacute; trai từ 5 - 10 tuổi lưng thun, in logo k&egrave;m theo kh&oacute;a h&igrave;nh ngẫu nhi&ecirc;n cực ngầu v&agrave; s&agrave;nh điệu.</p>', 0, 1, 1, '2020-03-27 03:42:05', NULL),
(34, 'Quần Jeans Mộc Cho Bé Trai Màu Trơn Wax Rách Năng Động', 'quan-jeans-moc-cho-be-trai-mau-tron-wax-rach-nang-dong', 'Xanh', 5, '<p><strong>Quần jeans mộc cho b&eacute; trai 5 tuổi đến 8 tuổi</strong>&nbsp;m&agrave;u trơn wax r&aacute;ch s&agrave;nh điệu, b&eacute; mặc c&aacute; tinh, năng động.</p>', 1, 'teLz_quan-jeans-moc-mau-tron-wax-rach-cho-be-trai-nang-dong-5-8-tuoi_(1).jpg', 219000, 0, '99.9', '10', '<p><strong>Quần jeans mộc cho b&eacute; trai 5 tuổi đến 8 tuổi</strong>&nbsp;m&agrave;u trơn wax r&aacute;ch s&agrave;nh điệu, b&eacute; mặc c&aacute; tinh, năng động.</p>', '<p><strong>Quần jeans mộc cho b&eacute; trai 5 tuổi đến 8 tuổi</strong>&nbsp;m&agrave;u trơn wax r&aacute;ch s&agrave;nh điệu, b&eacute; mặc c&aacute; tinh, năng động.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(35, 'Áo Đầm Trẻ Em Cao Cấp Vải Voan Đính Kim Sa Sang Chảnh', 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh', 'Đỏ, Hồng, Trắng', 7, '<p><strong>&Aacute;o đầm cao cấp trẻ em 2 tuổi đến 8 tuổi</strong>&nbsp;vải voan đ&iacute;nh kim sa sang chảnh, b&eacute; mặc x&uacute;ng x&iacute;nh dễ thương</p>', 1, 'gMDZ_quan-jeans-moc-mau-tron-wax-rach-cho-be-trai-nang-dong-5-8-tuoi_(1).jpg', 259000, 0, '99.9', '10', '<p><strong>&Aacute;o đầm cao cấp trẻ em 2 tuổi đến 8 tuổi</strong>&nbsp;vải voan đ&iacute;nh kim sa sang chảnh, b&eacute; mặc x&uacute;ng x&iacute;nh dễ thương</p>', '<p><strong>&Aacute;o đầm cao cấp trẻ em 2 tuổi đến 8 tuổi</strong>&nbsp;vải voan đ&iacute;nh kim sa sang chảnh, b&eacute; mặc x&uacute;ng x&iacute;nh dễ thương</p>', 3, 1, 1, '2020-03-27 03:42:05', NULL),
(36, 'Áo Đầm Trẻ Em Cao Cấp Vải Voan Đính Kim Sa Sang Chảnh', 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh', 'Đỏ, Hồng, Trắng', 7, '<p><strong>&Aacute;o đầm trẻ em cao cấp</strong>, vải voan, họa tiết h&igrave;nh sao đ&iacute;nh kim sa sang trọng. B&eacute; mặc x&uacute;ng x&iacute;nh dễ thương.</p>', 1, 'gHpd_ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi_(3).jpg', 259000, 0, '99.9', '10', '<p><strong>&Aacute;o đầm trẻ em cao cấp</strong>, vải voan, họa tiết h&igrave;nh sao đ&iacute;nh kim sa sang trọng. B&eacute; mặc x&uacute;ng x&iacute;nh dễ thương.</p>', '<p><strong>&Aacute;o đầm trẻ em cao cấp</strong>, vải voan, họa tiết h&igrave;nh sao đ&iacute;nh kim sa sang trọng. B&eacute; mặc x&uacute;ng x&iacute;nh dễ thương.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(37, 'Đầm Voan Dự Tiệc Cho Bé Gái Thêu Hoa 3D Sang Chảnh', 'dam-voan-du-tiec-cho-be-gai-theu-hoa-3d-sang-chanh', 'Đỏ, Vàng, Hồng', 7, '<p><strong>Đầm voan cho b&eacute; g&aacute;i 1 tuổi đến 8 tuổi</strong>&nbsp;mặc đi dự tiệc, đi chơi, đi lễ th&ecirc;u hoa 3 D sang chảnh rất đ&aacute;ng y&ecirc;u.</p>', 1, 'fkXd_dam-voan-du-tiec-cho-be-gai-theu-hoa-3d-sang-chanh-1-8-tuoi_(2).jpg', 249000, 0, '99.9', '7', '<p><strong>Đầm voan cho b&eacute; g&aacute;i 1 tuổi đến 8 tuổi</strong>&nbsp;mặc đi dự tiệc, đi chơi, đi lễ th&ecirc;u hoa 3 D sang chảnh rất đ&aacute;ng y&ecirc;u.</p>', '<p><strong>Đầm voan cho b&eacute; g&aacute;i 1 tuổi đến 8 tuổi</strong>&nbsp;mặc đi dự tiệc, đi chơi, đi lễ th&ecirc;u hoa 3 D sang chảnh rất đ&aacute;ng y&ecirc;u.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(38, 'Đầm Nhung Cho Bé Gái Phối Voan Tầng Viền Ren Xinh Xắn', 'dam-nhung-cho-be-gai-phoi-voan-tang-vien-ren-xinh-xan', 'Đỏ, Trắng, Đen', 7, '<p><strong>Đầm c&ocirc;ng ch&uacute;a cho b&eacute; g&aacute;i đi chơi&nbsp;(2 - 8 tuổi)</strong>&nbsp;th&acirc;n &aacute;o vải nhung, c&oacute; l&oacute;t vải kate b&ecirc;n trong, t&ugrave;ng v&aacute;y 4 lớp điệu đ&agrave; x&uacute;ng x&iacute;nh c&ugrave;ng b&eacute; xuống phố.</p>', 1, 'zC4u_quan-jeans-moc-mau-tron-wax-rach-cho-be-trai-nang-dong-5-8-tuoi_(1).jpg', 239000, 0, '99.9', '10', '<p><strong>Đầm c&ocirc;ng ch&uacute;a cho b&eacute; g&aacute;i đi chơi&nbsp;(2 - 8 tuổi)</strong>&nbsp;th&acirc;n &aacute;o vải nhung, c&oacute; l&oacute;t vải kate b&ecirc;n trong, t&ugrave;ng v&aacute;y 4 lớp điệu đ&agrave; x&uacute;ng x&iacute;nh c&ugrave;ng b&eacute; xuống phố.</p>', '<p><strong>Đầm c&ocirc;ng ch&uacute;a cho b&eacute; g&aacute;i đi chơi&nbsp;(2 - 8 tuổi)</strong>&nbsp;th&acirc;n &aacute;o vải nhung, c&oacute; l&oacute;t vải kate b&ecirc;n trong, t&ugrave;ng v&aacute;y 4 lớp điệu đ&agrave; x&uacute;ng x&iacute;nh c&ugrave;ng b&eacute; xuống phố.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(39, 'Áo Đầm Trẻ Em Cao Cấp Vải Voan Thêu Hoa Trễ Vai', 'ao-dam-tre-em-cao-cap-vai-voan-theu-hoa-tre-vai', 'Đỏ, Trắng', 7, '<p><strong>&Aacute;o đầm trẻ em cao cấp d&agrave;nh cho b&eacute; g&aacute;i từ 11-26kg</strong>&nbsp;- Kiểu trễ vai hiện đại, chất liệu cao cấp được th&ecirc;u hoa tinh tế cho b&eacute; vẻ ngo&agrave;i xinh như c&ocirc;ng ch&uacute;a.</p>', 1, 'jeLY_ao-dam-tre-em-cao-cap-vai-voan-theu-hoa-tre-vai-11-26-kg_(1).jpg', 245000, 0, '99.9', '10', '<p><strong>&Aacute;o đầm trẻ em cao cấp d&agrave;nh cho b&eacute; g&aacute;i từ 11-26kg</strong>&nbsp;- Kiểu trễ vai hiện đại, chất liệu cao cấp được th&ecirc;u hoa tinh tế cho b&eacute; vẻ ngo&agrave;i xinh như c&ocirc;ng ch&uacute;a.</p>', '<p><strong>&Aacute;o đầm trẻ em cao cấp d&agrave;nh cho b&eacute; g&aacute;i từ 11-26kg</strong>&nbsp;- Kiểu trễ vai hiện đại, chất liệu cao cấp được th&ecirc;u hoa tinh tế cho b&eacute; vẻ ngo&agrave;i xinh như c&ocirc;ng ch&uacute;a.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(40, 'Đầm Dự Tiệc Cho Bé Gái Trễ Vai Đính Hoa', 'dam-du-tiec-cho-be-gai-tre-vai-dinh-hoa', 'Trắng, Đỏ', 7, '<p><strong>Đầm dự tiệc cho b&eacute; g&aacute;i (11-26kg)&nbsp;</strong>- B&eacute; sẽ rất nổi bật trong d&aacute;ng đầm c&ocirc;ng ch&uacute;a n&agrave;y, th&iacute;ch hợp đi dự tiệc cưới, sinh nhật b&eacute; v&agrave; chụp h&igrave;nh cuối năm.</p>', 1, 'QTfj_dam-du-tiec-cho-be-gai-tre-vai-dinh-hoa-11-26-kg_(4).jpg', 300000, 0, '99.9', '10', '<p><strong>Đầm dự tiệc cho b&eacute; g&aacute;i (11-26kg)&nbsp;</strong>- B&eacute; sẽ rất nổi bật trong d&aacute;ng đầm c&ocirc;ng ch&uacute;a n&agrave;y, th&iacute;ch hợp đi dự tiệc cưới, sinh nhật b&eacute; v&agrave; chụp h&igrave;nh cuối năm.</p>', '<p><strong>Đầm dự tiệc cho b&eacute; g&aacute;i (11-26kg)&nbsp;</strong>- B&eacute; sẽ rất nổi bật trong d&aacute;ng đầm c&ocirc;ng ch&uacute;a n&agrave;y, th&iacute;ch hợp đi dự tiệc cưới, sinh nhật b&eacute; v&agrave; chụp h&igrave;nh cuối năm.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(41, 'Đầm Dự Tiệc Cho Bé Gái', 'dam-du-tiec-cho-be-gai', 'Đỏ, Hồng, Trắng', 7, '<p><strong>Đầm Dự Tiệc Cho B&eacute; G&aacute;i 2-8 Tuổi</strong>&nbsp;- Thiết kế đầm tầng sang trọng, tinh tế th&iacute;ch hợp cho b&eacute; diện đi tiệc, chụp h&igrave;nh lễ tết nha mẹ.</p>', 1, '9ami_dam-du-tiec-cho-be-gai-2-8-tuoi-vay-2-tang-xinh-xan_(3).jpg', 245000, 0, '99.9', '10', '<p><strong>Đầm Dự Tiệc Cho B&eacute; G&aacute;i 2-8 Tuổi</strong>&nbsp;- Thiết kế đầm tầng sang trọng, tinh tế th&iacute;ch hợp cho b&eacute; diện đi tiệc, chụp h&igrave;nh lễ tết nha mẹ.</p>', '<p><strong>Đầm Dự Tiệc Cho B&eacute; G&aacute;i 2-8 Tuổi</strong>&nbsp;- Thiết kế đầm tầng sang trọng, tinh tế th&iacute;ch hợp cho b&eacute; diện đi tiệc, chụp h&igrave;nh lễ tết nha mẹ.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(42, 'Áo Đầm Trẻ Em Cao Cấp Vải Gấm Phối Voan', 'ao-dam-tre-em-cao-cap-vai-gam-phoi-voan', 'Xanh, Đỏ, Trắng', 7, '<p><strong>&Aacute;o đầm cao cấp cho b&eacute; g&aacute;i</strong>&nbsp;mặc xinh lung linh như một c&ocirc;ng ch&uacute;a c&aacute;c mẹ ơi. Rinh về cho con liền n&agrave;o.</p>', 1, 'EfVm_ao-dam-tre-em-cao-cap-vai-gam-phoi-voan-tieu-thu-xinh-xan-2-9-tuoi_(1).jpg', 260000, 0, '99.9', '10', '<p><strong>&Aacute;o đầm cao cấp cho b&eacute; g&aacute;i</strong>&nbsp;mặc xinh lung linh như một c&ocirc;ng ch&uacute;a c&aacute;c mẹ ơi. Rinh về cho con liền n&agrave;o.</p>', '<p><strong>&Aacute;o đầm cao cấp cho b&eacute; g&aacute;i</strong>&nbsp;mặc xinh lung linh như một c&ocirc;ng ch&uacute;a c&aacute;c mẹ ơi. Rinh về cho con liền n&agrave;o.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(43, 'Đầm Công Chúa Cho Bé Phối Ren Đuôi Cá Kiêu Sa', 'dam-cong-chua-cho-be-phoi-ren-duoi-ca-kieu-sa', 'Vàng, Hồng, Trắng', 7, '<p><strong>V&aacute;y đầm c&ocirc;ng ch&uacute;a cho b&eacute;</strong>&nbsp;kiểu d&aacute;ng đu&ocirc;i c&aacute; ki&ecirc;u sa, phối th&ecirc;m lớp ren mềm mại bồng bềnh, gi&uacute;p b&eacute; h&oacute;a th&acirc;n th&agrave;nh n&agrave;ng c&ocirc;ng ch&uacute;a xinh đẹp lung linh trong mọi bữa tiệc lu&ocirc;n n&egrave; mẹ ơi</p>', 1, 'r3ZH_dam-cong-chua-cho-be-phoi-ren-duoi-ca-kieu-sa-3-10-tuoi_(4).jpg', 250000, 0, '99.9', '10', '<p><strong>V&aacute;y đầm c&ocirc;ng ch&uacute;a cho b&eacute;</strong>&nbsp;kiểu d&aacute;ng đu&ocirc;i c&aacute; ki&ecirc;u sa, phối th&ecirc;m lớp ren mềm mại bồng bềnh, gi&uacute;p b&eacute; h&oacute;a th&acirc;n th&agrave;nh n&agrave;ng c&ocirc;ng ch&uacute;a xinh đẹp lung linh trong mọi bữa tiệc lu&ocirc;n n&egrave; mẹ ơi</p>', '<p><strong>V&aacute;y đầm c&ocirc;ng ch&uacute;a cho b&eacute;</strong>&nbsp;kiểu d&aacute;ng đu&ocirc;i c&aacute; ki&ecirc;u sa, phối th&ecirc;m lớp ren mềm mại bồng bềnh, gi&uacute;p b&eacute; h&oacute;a th&acirc;n th&agrave;nh n&agrave;ng c&ocirc;ng ch&uacute;a xinh đẹp lung linh trong mọi bữa tiệc lu&ocirc;n n&egrave; mẹ ơi</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(44, 'Đầm mullet trễ vai cho bé thêu tay cực sang', 'dam-mullet-tre-vai-cho-be-theu-tay-cuc-sang', 'Hồng, Cam, Xám Xanh', 7, '<p><strong>Đầm trễ vai cho b&eacute; từ 1 đến 8 tuổi</strong>&nbsp;- Với thiết kế d&aacute;ng đầm mullet (vạt ngắn vạt d&agrave;i) th&ecirc;u hoa cho b&eacute; đi chơi hay dự tiệc cực xinh sang.</p>', 1, 'Rtwt_dam-mullet-theu-tay-tre-vai-cho-be-gai_(1).jpg', 158000, 0, '99.9', '10', '<p><strong>Đầm trễ vai cho b&eacute; từ 1 đến 8 tuổi</strong>&nbsp;- Với thiết kế d&aacute;ng đầm mullet (vạt ngắn vạt d&agrave;i) th&ecirc;u hoa cho b&eacute; đi chơi hay dự tiệc cực xinh sang.</p>', '<p><strong>Đầm trễ vai cho b&eacute; từ 1 đến 8 tuổi</strong>&nbsp;- Với thiết kế d&aacute;ng đầm mullet (vạt ngắn vạt d&agrave;i) th&ecirc;u hoa cho b&eacute; đi chơi hay dự tiệc cực xinh sang.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(45, 'Áo Khoác Kaki Màu Trơn Phối Túi Cho Bé', 'ao-khoac-kaki-mau-tron-phoi-tui-cho-be', 'Vàng, Tím, Trắng', 8, '<p><strong>Quần &aacute;o trẻ em&nbsp;</strong>s&agrave;nh điệu cho b&eacute; g&aacute;i với bộ sưu tập &aacute;o kho&aacute;c in hoạt h&igrave;nh dễ thương.</p>', 1, 'Ii4V_dam-du-tiec-cho-be-gai-tre-vai-dinh-hoa-11-26-kg_(4).jpg', 210000, 0, '99.9', '10', '<p><strong>Quần &aacute;o trẻ em&nbsp;</strong>s&agrave;nh điệu cho b&eacute; g&aacute;i với bộ sưu tập &aacute;o kho&aacute;c in hoạt h&igrave;nh dễ thương.</p>', '<p><strong>Quần &aacute;o trẻ em&nbsp;</strong>s&agrave;nh điệu cho b&eacute; g&aacute;i với bộ sưu tập &aacute;o kho&aacute;c in hoạt h&igrave;nh dễ thương.</p>', 3, 1, 1, '2020-03-27 03:42:05', NULL),
(46, 'Áo Khoác Da Cá Bé Gái Thêu Hình Mèo Đính Nơ Xinh Xắn', 'ao-khoac-da-ca-be-gai-theu-hinh-meo-dinh-no-xinh-xan', 'Đỏ, Xanh, Tím, Hồng', 8, '<p><strong>&Aacute;o kho&aacute;c da c&aacute; cho b&eacute; g&aacute;i 1 tuổi đến 11 tuổi</strong>&nbsp;theo h&igrave;nh m&egrave;o đ&iacute;nh nơ xinh xắn, m&agrave;u sắc tươi tắn, b&eacute; mặc đ&aacute;ng y&ecirc;u</p>', 1, 'cgVj_ao-khoac-da-ca-be-gai-theu-hinh-meo-dinh-no-xinh-xan-1-11-tuoi_(6).jpg', 139000, 0, '99.9', '10', '<p><strong>&Aacute;o kho&aacute;c da c&aacute; cho b&eacute; g&aacute;i 1 tuổi đến 11 tuổi</strong>&nbsp;theo h&igrave;nh m&egrave;o đ&iacute;nh nơ xinh xắn, m&agrave;u sắc tươi tắn, b&eacute; mặc đ&aacute;ng y&ecirc;u</p>', '<p><strong>&Aacute;o kho&aacute;c da c&aacute; cho b&eacute; g&aacute;i 1 tuổi đến 11 tuổi</strong>&nbsp;theo h&igrave;nh m&egrave;o đ&iacute;nh nơ xinh xắn, m&agrave;u sắc tươi tắn, b&eacute; mặc đ&aacute;ng y&ecirc;u</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(47, 'Áo Khoác Dù Cho Bé In Hình Cô Gái Dễ Thương', 'ao-khoac-du-cho-be-in-hinh-co-gai-de-thuong', 'Cam, Xanh, Hồng', 8, '<p><strong>Thời trang &aacute;o kho&aacute;c</strong>&nbsp;d&ugrave; 2 lớp cho b&eacute; g&aacute;i in nhiều họa tiết đ&aacute;ng y&ecirc;u mặc đi nắng, phối kiểu s&agrave;nh điệu.</p>', 1, '3yuE_ao-khoac-du-cho-be-in-hinh-co-gai-de-thuong-1-12-tuoi_(3).jpg', 150000, 0, '99.9', '10', '<p><strong>Thời trang &aacute;o kho&aacute;c</strong>&nbsp;d&ugrave; 2 lớp cho b&eacute; g&aacute;i in nhiều họa tiết đ&aacute;ng y&ecirc;u mặc đi nắng, phối kiểu s&agrave;nh điệu.</p>', '<p><strong>Thời trang &aacute;o kho&aacute;c</strong>&nbsp;d&ugrave; 2 lớp cho b&eacute; g&aacute;i in nhiều họa tiết đ&aacute;ng y&ecirc;u mặc đi nắng, phối kiểu s&agrave;nh điệu.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(48, 'Thời trang áo khoác dù 2 lớp cho bé gái in nhiều họa tiết đáng yêu mặc đi nắng, phối kiểu sành điệu.', 'thoi-trang-ao-khoac-du-2-lop-cho-be-gai-in-nhieu-hoa-tiet-dang-yeu-mac-di-nang-phoi-kieu-sanh-dieu', 'Xám', 8, '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;chất liệu vải nỉ vừa, kh&ocirc;ng d&agrave;y, kh&ocirc;ng mỏng, form l&ecirc;n d&aacute;ng đẹp tạo vẻ cool ngầu cho b&eacute; trai - c&aacute; t&iacute;nh cho b&eacute; g&aacute;i.</p>', 1, 'YyA5_ao-khoac-cho-be-in-logo-phoi-day-keo-don-gian-sanh-dieu-5-13-tuoi_(2).jpg', 160000, 0, '99.9', '10', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;chất liệu vải nỉ vừa, kh&ocirc;ng d&agrave;y, kh&ocirc;ng mỏng, form l&ecirc;n d&aacute;ng đẹp tạo vẻ cool ngầu cho b&eacute; trai - c&aacute; t&iacute;nh cho b&eacute; g&aacute;i.</p>', '<p><strong>&Aacute;o kho&aacute;c cho b&eacute;</strong>&nbsp;chất liệu vải nỉ vừa, kh&ocirc;ng d&agrave;y, kh&ocirc;ng mỏng, form l&ecirc;n d&aacute;ng đẹp tạo vẻ cool ngầu cho b&eacute; trai - c&aacute; t&iacute;nh cho b&eacute; g&aacute;i.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(49, 'Áo Khoác Bé Gái Vải Dù Có Nón Thời Trang', 'ao-khoac-be-gai-vai-du-co-non-thoi-trang', 'Đỏ, Vàng, Hồng', 8, '<p><strong>&Aacute;o Kho&aacute;c B&eacute; G&aacute;i 2-12 Tuổi&nbsp;</strong>- Thiết Kế &Aacute;o C&oacute; N&oacute;n V&ocirc; C&ugrave;ng Tiện Lợi V&agrave; Thời Trang, Chất Liệu Vải D&ugrave; Bền Đẹp Gi&uacute;p B&eacute; Che Chắn Được Mưa Gi&oacute; Mỗi Khi Ra Ngo&agrave;i.</p>', 1, 'TzPf_ao-khoac-be-gai-hinh-buom_(4).jpg', 160000, 0, '99.9', '10', '<p><strong>&Aacute;o Kho&aacute;c B&eacute; G&aacute;i 2-12 Tuổi&nbsp;</strong>- Thiết Kế &Aacute;o C&oacute; N&oacute;n V&ocirc; C&ugrave;ng Tiện Lợi V&agrave; Thời Trang, Chất Liệu Vải D&ugrave; Bền Đẹp Gi&uacute;p B&eacute; Che Chắn Được Mưa Gi&oacute; Mỗi Khi Ra Ngo&agrave;i.</p>', '<p><strong>&Aacute;o Kho&aacute;c B&eacute; G&aacute;i 2-12 Tuổi&nbsp;</strong>- Thiết Kế &Aacute;o C&oacute; N&oacute;n V&ocirc; C&ugrave;ng Tiện Lợi V&agrave; Thời Trang, Chất Liệu Vải D&ugrave; Bền Đẹp Gi&uacute;p B&eacute; Che Chắn Được Mưa Gi&oacute; Mỗi Khi Ra Ngo&agrave;i.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(50, 'Áo Khoác Jeans Cho Bé Phối Túi Sành Điệu', 'ao-khoac-jeans-cho-be-phoi-tui-sanh-dieu', 'Xám', 8, '<p>&Aacute;o kho&aacute;c jeans cho b&eacute; phối t&uacute;i, wash r&aacute;ch nhe, in logo s&agrave;nh điệu phong c&aacute;ch cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i</p>', 1, '1krt_ao-khoac-jeans-cho-be-phoi-tui-sanh-dieu-size-dai-5-8-tuoi_(1).jpg', 190000, 150000, '21.1', '10', '<p>&Aacute;o kho&aacute;c jeans cho b&eacute; phối t&uacute;i, wash r&aacute;ch nhe, in logo s&agrave;nh điệu phong c&aacute;ch cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i</p>', '<p>&Aacute;o kho&aacute;c jeans cho b&eacute; phối t&uacute;i, wash r&aacute;ch nhe, in logo s&agrave;nh điệu phong c&aacute;ch cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(51, 'Áo Khoác Dù Bé Gái Có Nón In Hình Kitty', 'ao-khoac-du-be-gai-co-non-in-hinh-kitty', 'Cam, Xanh, Hồng', 8, '<p>&Aacute;o kho&aacute;c d&ugrave; cho b&eacute; g&aacute;i in h&igrave;nh dễ thương, c&oacute; n&oacute;n, c&oacute; lớp l&oacute;t cho b&eacute; mặc ấm &aacute;p xinh xắn m&ugrave;a cuối năm v&agrave; đầu năm mới.</p>', 1, 'NFzo_ao-khoac-du-be-gai-co-non-in-hinh-kitty-de-thuong-2-11tuoi_(1).jpg', 150000, 0, '99.9', '10', '<p>&Aacute;o kho&aacute;c d&ugrave; cho b&eacute; g&aacute;i in h&igrave;nh dễ thương, c&oacute; n&oacute;n, c&oacute; lớp l&oacute;t cho b&eacute; mặc ấm &aacute;p xinh xắn m&ugrave;a cuối năm v&agrave; đầu năm mới.</p>', '<p>&Aacute;o kho&aacute;c d&ugrave; cho b&eacute; g&aacute;i in h&igrave;nh dễ thương, c&oacute; n&oacute;n, c&oacute; lớp l&oacute;t cho b&eacute; mặc ấm &aacute;p xinh xắn m&ugrave;a cuối năm v&agrave; đầu năm mới.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(52, 'Đồ Bộ Cho Bé Gái Tay Ngắn Quần Ngắn In Hoạt Hình', 'do-bo-cho-be-gai-tay-ngan-quan-ngan-in-hoat-hinh', 'Đen, xám, trắng', 9, '<p>Đồ bộ dễ thương cho b&eacute; g&aacute;i từ 2 - 12 tuổi, tay ngắn quần ngắn m&aacute;t mẻ thoải m&aacute;i cho m&ugrave;a h&egrave; n&oacute;ng bức.</p>', 1, 'KFjo_do-bo-cho-be-tay-ngan-quan-ngan-in-hinh-sieu-de-thuong-2-12-tuoi_(2).jpg', 150000, 139000, '7.3', '10', '<p>Đồ bộ dễ thương cho b&eacute; g&aacute;i từ 2 - 12 tuổi, tay ngắn quần ngắn m&aacute;t mẻ thoải m&aacute;i cho m&ugrave;a h&egrave; n&oacute;ng bức.</p>', '<p>Đồ bộ dễ thương cho b&eacute; g&aacute;i từ 2 - 12 tuổi, tay ngắn quần ngắn m&aacute;t mẻ thoải m&aacute;i cho m&ugrave;a h&egrave; n&oacute;ng bức.</p>', 0, 1, 1, '2020-03-27 03:42:05', NULL);
INSERT INTO `products` (`id`, `name`, `url`, `color`, `category_id`, `description`, `status`, `image`, `price`, `promotional_price`, `sale`, `count`, `content`, `infor`, `buy_count`, `count_view`, `author_id`, `created_at`, `updated_at`) VALUES
(53, 'Đồ Bộ Bé Gái Nhúng Bèo Sát Nách In Hình Lá Xinh Xắn', 'do-bo-be-gai-nhung-beo-sat-nach-in-hinh-la-xinh-xan', 'Vàng, Xanh, Đỏ, Trắng', 9, '<p><strong>Đồ bộ b&eacute; g&aacute;i</strong>&nbsp;họa tiết dễ thương, m&agrave;u sắc tươi s&aacute;ng c&ugrave;ng thiết kế s&aacute;t n&aacute;ch gi&uacute;p b&eacute; mặc đẹp lại rất thoải m&aacute;i. Mua ngay.</p>', 1, 'fWel_do-bo-be-gai-nhung-beo-sat-nach-in-hinh-la-xinh-xan-1-5-tuoi_(5).jpg', 139000, 0, '99.9', '10', '<p><strong>Đồ bộ b&eacute; g&aacute;i</strong>&nbsp;họa tiết dễ thương, m&agrave;u sắc tươi s&aacute;ng c&ugrave;ng thiết kế s&aacute;t n&aacute;ch gi&uacute;p b&eacute; mặc đẹp lại rất thoải m&aacute;i. Mua ngay.</p>', '<p><strong>Đồ bộ b&eacute; g&aacute;i</strong>&nbsp;họa tiết dễ thương, m&agrave;u sắc tươi s&aacute;ng c&ugrave;ng thiết kế s&aacute;t n&aacute;ch gi&uacute;p b&eacute; mặc đẹp lại rất thoải m&aacute;i. Mua ngay.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(54, 'Bộ Thun Mặc Nhà Cho Bé Tay Cánh Tiên Quần Ngắn', 'bo-thun-mac-nha-cho-be-tay-canh-tien-quan-ngan', 'Xám, Đỏ, Hồng', 9, '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; từ 5 tuổi đến 11</strong>&nbsp;tuổi tay c&aacute;nh ti&ecirc;n, quần ngắn in chữ, họa tiết ấn tượng dễ thương</p>', 1, 'aOH9_bo-thun-mac-nha-tay-canh-tien-quan-ngan-in-chu-don-gian-cho-be-yeu-5-11-tuoi_(2).jpg', 110000, 100000, '9.1', '10', '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; từ 5 tuổi đến 11</strong>&nbsp;tuổi tay c&aacute;nh ti&ecirc;n, quần ngắn in chữ, họa tiết ấn tượng dễ thương</p>', '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; từ 5 tuổi đến 11</strong>&nbsp;tuổi tay c&aacute;nh ti&ecirc;n, quần ngắn in chữ, họa tiết ấn tượng dễ thương</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(55, 'Đồ Bộ Thun Ngắn Tay In Chữ Phối Quần Lửng', 'do-bo-thun-ngan-tay-in-chu-phoi-quan-lung', 'Vàng, Hồng, Xanh', 9, '<p><strong>Đồ bộ mặc nh&agrave;</strong>&nbsp;thiết kế &aacute;o cổ tr&ograve;n tay ngắn, in&nbsp;chữ, quần lửng &ocirc;m mặc ngang gối. C&oacute; set cặp cho mẹ v&agrave; b&eacute;. Xem th&ecirc;m th&ocirc;ng tin ph&iacute;a dưới.</p>', 1, 'OU9u_do-bo-ngan-tay-theu-chu-phoi-quan-lung-sanh-dieu-danh-cho-me-45kg-58kg-(2).jpg', 179000, 139000, '22.3', '10', '<p><strong>Đồ bộ mặc nh&agrave;</strong>&nbsp;thiết kế &aacute;o cổ tr&ograve;n tay ngắn, in&nbsp;chữ, quần lửng &ocirc;m mặc ngang gối. C&oacute; set cặp cho mẹ v&agrave; b&eacute;. Xem th&ecirc;m th&ocirc;ng tin ph&iacute;a dưới.</p>', '<p><strong>Đồ bộ mặc nh&agrave;</strong>&nbsp;thiết kế &aacute;o cổ tr&ograve;n tay ngắn, in&nbsp;chữ, quần lửng &ocirc;m mặc ngang gối. C&oacute; set cặp cho mẹ v&agrave; b&eacute;. Xem th&ecirc;m th&ocirc;ng tin ph&iacute;a dưới.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(56, 'Đồ Bộ Bé Gái Cổ Sen Đính Nút Phối Quần', 'do-bo-be-gai-co-sen-dinh-nut-phoi-quan', 'Hồng, Trắng, Xanh', 9, '<p><strong>Đồ bộ cho b&eacute; g&aacute;i</strong>&nbsp;từ 2 - 8 tuổi &aacute;o cổ sen phối quần phồng đ&ugrave;i bo phồng s&agrave;nh điệu cho b&eacute; mặc nh&agrave; mặc đi chơi đều hợp</p>', 1, 'qs8I_do-bo-be-gai-co-sen-dinh-nut-phoi-quan-phong-sanh-dieu-2-8-tuoi_(6).jpg', 160000, 130000, '18.8', '10', '<p><strong>Đồ bộ cho b&eacute; g&aacute;i</strong>&nbsp;từ 2 - 8 tuổi &aacute;o cổ sen phối quần phồng đ&ugrave;i bo phồng s&agrave;nh điệu cho b&eacute; mặc nh&agrave; mặc đi chơi đều hợp</p>', '<p><strong>Đồ bộ cho b&eacute; g&aacute;i</strong>&nbsp;từ 2 - 8 tuổi &aacute;o cổ sen phối quần phồng đ&ugrave;i bo phồng s&agrave;nh điệu cho b&eacute; mặc nh&agrave; mặc đi chơi đều hợp</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(57, 'Bộ Pyjama Dành Cho Mẹ Tay Ngắn Quần Ngắn', 'bo-pyjama-danh-cho-me-tay-ngan-quan-ngan', 'Hồng, Vàng, Đen', 9, '<p><strong>Đồ bộ cho mẹ</strong>&nbsp;thun cotton mặc nh&agrave; thoải m&aacute;i. Xinh xắn hơn khi phối cặp c&ugrave;ng b&eacute;. Mua ngay.</p>', 1, 'HhkR_bo-pyjama-danh-cho-me-tay-ngan-quan-ngan-mau-tron-phoi-tui-nho-xinh-xan-45kg-58kg_(2).jpg', 169000, 139000, '17.8', '10', '<p><strong>Đồ bộ cho mẹ</strong>&nbsp;thun cotton mặc nh&agrave; thoải m&aacute;i. Xinh xắn hơn khi phối cặp c&ugrave;ng b&eacute;. Mua ngay.</p>', '<p><strong>Đồ bộ cho mẹ</strong>&nbsp;thun cotton mặc nh&agrave; thoải m&aacute;i. Xinh xắn hơn khi phối cặp c&ugrave;ng b&eacute;. Mua ngay.</p>', 9, 2, 1, '2020-03-27 03:42:05', NULL),
(58, 'Bộ Thun Mặc Nhà Tay Cánh Tiên Nhiều Họa Tiết Xinh Xắn', 'bo-thun-mac-nha-tay-canh-tien-nhieu-hoa-tiet-xinh-xan', 'Xanh, Hồng, Trắng', 9, '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; g&aacute;i 6 th&aacute;ng đến 4 tuổi</strong>&nbsp;size nh&iacute;, tay c&aacute;nh ti&ecirc;n dễ thương mặc m&aacute;t, họa tiết xinh xắn, đ&aacute;ng y&ecirc;u.</p>', 1, 'zF1W_bo-thun-mac-nha-tay-canh-tien-nhieu-hoa-tiet-xinh-xan-size-nhi-6-thang-4-tuoi-vi_(6).jpg', 70000, 0, '99.9', '10', '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; g&aacute;i 6 th&aacute;ng đến 4 tuổi</strong>&nbsp;size nh&iacute;, tay c&aacute;nh ti&ecirc;n dễ thương mặc m&aacute;t, họa tiết xinh xắn, đ&aacute;ng y&ecirc;u.</p>', '<p><strong>Bộ thun mặc nh&agrave; cho b&eacute; g&aacute;i 6 th&aacute;ng đến 4 tuổi</strong>&nbsp;size nh&iacute;, tay c&aacute;nh ti&ecirc;n dễ thương mặc m&aacute;t, họa tiết xinh xắn, đ&aacute;ng y&ecirc;u.</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(59, 'Đồ Bộ Cho Bé Ngắn Tay Quần Lửng In Chữ', 'do-bo-cho-be-ngan-tay-quan-lung-in-chu', 'Màu trơn', 9, '<p><strong>Bộ đồ ngắn tay cho b&eacute; g&aacute;i 3 tuổi đến 10 tuổi</strong>&nbsp;size đại, quần lửng phối chữ s&agrave;nh điệu, b&eacute; mặc nh&agrave; mặc nh&agrave; thoải m&aacute;i, m&aacute;t mẻ</p>', 1, 's7s0_do-bo-ngan-tay-theu-chu-phoi-quan-lung-sanh-dieu-danh-cho-me-45kg-58kg-(2).jpg', 149000, 0, '99.9', '10', '<p><strong>Bộ đồ ngắn tay cho b&eacute; g&aacute;i 3 tuổi đến 10 tuổi</strong>&nbsp;size đại, quần lửng phối chữ s&agrave;nh điệu, b&eacute; mặc nh&agrave; mặc nh&agrave; thoải m&aacute;i, m&aacute;t mẻ</p>', '<p><strong>Bộ đồ ngắn tay cho b&eacute; g&aacute;i 3 tuổi đến 10 tuổi</strong>&nbsp;size đại, quần lửng phối chữ s&agrave;nh điệu, b&eacute; mặc nh&agrave; mặc nh&agrave; thoải m&aacute;i, m&aacute;t mẻ</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL),
(60, 'Đồ Bộ Cho Bé Tay Ngắn Quần Ngắn In Logo', 'do-bo-cho-be-tay-ngan-quan-ngan-in-logo', 'Trắng, Xanh, Cam', 9, '<p>Đồ bộ cho b&eacute; in logo si&ecirc;u dễ thương, kiểu d&aacute;ng thoải m&aacute;i cho b&eacute; mặc m&aacute;t mẻ m&ugrave;a h&egrave;</p>', 1, 'ktQM_do-bo-cho-be-tay-ngan-quan-ngan-in-chu-sieu-de-thuong-size-dai-5-10-tuoi_(4).jpg', 150000, 0, '99.9', '10', '<p>Đồ bộ cho b&eacute; in logo si&ecirc;u dễ thương, kiểu d&aacute;ng thoải m&aacute;i cho b&eacute; mặc m&aacute;t mẻ m&ugrave;a h&egrave;</p>', '<p>Đồ bộ cho b&eacute; in logo si&ecirc;u dễ thương, kiểu d&aacute;ng thoải m&aacute;i cho b&eacute; mặc m&aacute;t mẻ m&ugrave;a h&egrave;</p>', 0, 0, 1, '2020-03-27 03:42:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attr`
--

CREATE TABLE `product_attr` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `buy_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attr`
--

INSERT INTO `product_attr` (`id`, `product_id`, `size_id`, `stock`, `buy_count`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 9, 1, NULL, '2020-05-10 02:06:25'),
(3, 2, 2, 9, 1, NULL, NULL),
(4, 2, 3, 10, 0, NULL, NULL),
(5, 2, 4, 10, 0, NULL, NULL),
(6, 3, 1, 1, 6, NULL, NULL),
(7, 3, 2, 5, 3, NULL, NULL),
(8, 3, 3, 5, 5, NULL, NULL),
(9, 3, 4, 9, 1, NULL, NULL),
(10, 4, 1, 5, 5, NULL, NULL),
(11, 4, 2, 10, 0, NULL, NULL),
(12, 4, 3, 10, 0, NULL, NULL),
(13, 4, 4, 10, 0, NULL, NULL),
(14, 5, 1, 9, 1, NULL, '2020-05-10 02:06:43'),
(15, 5, 2, 9, 1, NULL, NULL),
(16, 5, 3, 10, 0, NULL, NULL),
(17, 5, 4, 10, 0, NULL, NULL),
(18, 6, 1, 7, 3, NULL, NULL),
(19, 6, 2, 10, 0, NULL, NULL),
(20, 6, 3, 8, 2, NULL, NULL),
(21, 6, 4, 10, 0, NULL, NULL),
(22, 7, 1, 9, 1, NULL, NULL),
(23, 7, 2, 10, 0, NULL, NULL),
(24, 7, 3, 10, 0, NULL, NULL),
(25, 7, 4, 10, 0, NULL, NULL),
(26, 8, 1, 10, 0, NULL, NULL),
(27, 8, 2, 10, 0, NULL, NULL),
(28, 8, 3, 10, 0, NULL, NULL),
(29, 8, 4, 10, 0, NULL, NULL),
(30, 9, 1, 10, 0, NULL, NULL),
(31, 9, 2, 10, 0, NULL, NULL),
(32, 9, 3, 10, 0, NULL, NULL),
(33, 9, 4, 10, 0, NULL, NULL),
(34, 10, 1, 10, 0, NULL, NULL),
(35, 10, 2, 10, 0, NULL, NULL),
(36, 10, 3, 10, 0, NULL, NULL),
(37, 10, 4, 10, 0, NULL, NULL),
(38, 11, 1, 10, 0, NULL, NULL),
(39, 11, 2, 10, 0, NULL, NULL),
(40, 11, 3, 10, 0, NULL, NULL),
(41, 11, 4, 10, 0, NULL, NULL),
(42, 12, 1, 10, 0, NULL, NULL),
(43, 12, 2, 10, 0, NULL, NULL),
(44, 12, 3, 10, 0, NULL, NULL),
(45, 12, 4, 10, 0, NULL, NULL),
(46, 13, 1, 10, 0, NULL, NULL),
(47, 13, 2, 10, 0, NULL, NULL),
(48, 13, 3, 10, 0, NULL, NULL),
(49, 13, 4, 10, 0, NULL, NULL),
(50, 14, 1, 10, 0, NULL, NULL),
(51, 14, 2, 10, 0, NULL, NULL),
(52, 14, 3, 10, 0, NULL, NULL),
(53, 14, 4, 10, 0, NULL, NULL),
(54, 15, 1, 10, 0, NULL, NULL),
(55, 15, 2, 10, 0, NULL, NULL),
(56, 15, 3, 10, 0, NULL, NULL),
(57, 15, 4, 10, 0, NULL, NULL),
(58, 16, 1, 10, 0, NULL, NULL),
(59, 16, 2, 10, 0, NULL, NULL),
(60, 16, 3, 10, 0, NULL, NULL),
(61, 16, 4, 10, 0, NULL, NULL),
(62, 17, 1, 10, 0, NULL, NULL),
(63, 17, 2, 10, 0, NULL, NULL),
(64, 17, 3, 10, 0, NULL, NULL),
(65, 17, 4, 10, 0, NULL, NULL),
(66, 18, 1, 10, 0, NULL, NULL),
(67, 18, 2, 10, 0, NULL, NULL),
(68, 18, 3, 10, 0, NULL, NULL),
(69, 18, 4, 10, 0, NULL, NULL),
(70, 19, 1, 9, 1, NULL, NULL),
(71, 19, 2, 10, 0, NULL, NULL),
(72, 19, 3, 10, 0, NULL, NULL),
(73, 19, 4, 10, 0, NULL, NULL),
(74, 20, 1, 10, 0, NULL, NULL),
(75, 20, 2, 10, 0, NULL, NULL),
(76, 20, 3, 10, 0, NULL, NULL),
(77, 20, 4, 10, 0, NULL, NULL),
(78, 21, 1, 10, 0, NULL, NULL),
(79, 21, 2, 10, 0, NULL, NULL),
(80, 21, 3, 10, 0, NULL, NULL),
(81, 21, 4, 10, 0, NULL, NULL),
(82, 22, 1, 10, 0, NULL, NULL),
(83, 22, 2, 10, 0, NULL, NULL),
(84, 22, 3, 10, 0, NULL, NULL),
(85, 22, 4, 10, 0, NULL, NULL),
(86, 23, 1, 10, 0, NULL, NULL),
(87, 23, 2, 10, 0, NULL, NULL),
(88, 23, 3, 10, 0, NULL, NULL),
(89, 23, 4, 10, 0, NULL, NULL),
(90, 24, 1, 10, 0, NULL, NULL),
(91, 24, 2, 10, 0, NULL, NULL),
(92, 24, 3, 10, 0, NULL, NULL),
(93, 24, 4, 10, 0, NULL, NULL),
(94, 25, 1, 10, 0, NULL, NULL),
(95, 25, 2, 10, 0, NULL, NULL),
(96, 25, 3, 10, 0, NULL, NULL),
(97, 25, 4, 10, 0, NULL, NULL),
(98, 26, 1, 10, 0, NULL, NULL),
(99, 26, 2, 10, 0, NULL, NULL),
(100, 26, 3, 10, 0, NULL, NULL),
(101, 26, 4, 10, 0, NULL, NULL),
(102, 27, 1, 10, 0, NULL, NULL),
(103, 27, 2, 10, 0, NULL, NULL),
(104, 27, 3, 10, 0, NULL, NULL),
(105, 27, 4, 10, 0, NULL, NULL),
(106, 28, 1, 10, 0, NULL, NULL),
(107, 28, 2, 10, 0, NULL, NULL),
(108, 28, 3, 10, 0, NULL, NULL),
(109, 28, 4, 10, 0, NULL, NULL),
(110, 29, 1, 10, 0, NULL, NULL),
(111, 29, 2, 10, 0, NULL, NULL),
(112, 29, 3, 10, 0, NULL, NULL),
(113, 29, 4, 10, 0, NULL, NULL),
(114, 30, 1, 10, 0, NULL, NULL),
(115, 30, 2, 10, 0, NULL, NULL),
(116, 30, 3, 10, 0, NULL, NULL),
(117, 30, 4, 10, 0, NULL, NULL),
(118, 31, 1, 10, 0, NULL, NULL),
(119, 31, 2, 10, 0, NULL, NULL),
(120, 31, 3, 10, 0, NULL, NULL),
(121, 31, 4, 10, 0, NULL, NULL),
(122, 32, 1, 10, 0, NULL, NULL),
(123, 32, 2, 10, 0, NULL, NULL),
(124, 32, 3, 10, 0, NULL, NULL),
(125, 32, 4, 10, 0, NULL, NULL),
(126, 33, 1, 10, 0, NULL, NULL),
(127, 33, 2, 10, 0, NULL, NULL),
(128, 33, 3, 10, 0, NULL, NULL),
(129, 33, 4, 10, 0, NULL, NULL),
(130, 34, 1, 10, 0, NULL, NULL),
(131, 34, 2, 10, 0, NULL, NULL),
(132, 34, 3, 10, 0, NULL, NULL),
(133, 34, 4, 10, 0, NULL, NULL),
(134, 35, 1, 7, 3, NULL, NULL),
(135, 35, 2, 10, 0, NULL, NULL),
(136, 35, 3, 10, 0, NULL, NULL),
(137, 35, 4, 10, 0, NULL, NULL),
(138, 36, 1, 10, 0, NULL, NULL),
(139, 36, 2, 10, 0, NULL, NULL),
(140, 36, 3, 10, 0, NULL, NULL),
(141, 36, 4, 10, 0, NULL, NULL),
(142, 37, 1, 7, 0, NULL, NULL),
(143, 37, 2, 7, 0, NULL, NULL),
(144, 37, 3, 7, 0, NULL, NULL),
(145, 37, 4, 7, 0, NULL, NULL),
(146, 38, 1, 10, 0, NULL, NULL),
(147, 38, 2, 10, 0, NULL, NULL),
(148, 38, 3, 10, 0, NULL, NULL),
(149, 38, 4, 10, 0, NULL, NULL),
(150, 39, 1, 10, 0, NULL, NULL),
(151, 39, 2, 10, 0, NULL, NULL),
(152, 39, 3, 10, 0, NULL, NULL),
(153, 39, 4, 10, 0, NULL, NULL),
(154, 40, 1, 10, 0, NULL, NULL),
(155, 40, 2, 10, 0, NULL, NULL),
(156, 40, 3, 10, 0, NULL, NULL),
(157, 40, 4, 10, 0, NULL, NULL),
(158, 41, 1, 10, 0, NULL, NULL),
(159, 41, 2, 10, 0, NULL, NULL),
(160, 41, 3, 10, 0, NULL, NULL),
(161, 41, 4, 10, 0, NULL, NULL),
(162, 42, 1, 10, 0, NULL, NULL),
(163, 42, 2, 10, 0, NULL, NULL),
(164, 42, 3, 10, 0, NULL, NULL),
(165, 42, 4, 10, 0, NULL, NULL),
(166, 43, 1, 10, 0, NULL, NULL),
(167, 43, 2, 10, 0, NULL, NULL),
(168, 43, 3, 10, 0, NULL, NULL),
(169, 43, 4, 10, 0, NULL, NULL),
(170, 44, 1, 10, 0, NULL, NULL),
(171, 44, 2, 10, 0, NULL, NULL),
(172, 44, 3, 10, 0, NULL, NULL),
(173, 44, 4, 10, 0, NULL, NULL),
(174, 45, 1, 10, 0, NULL, NULL),
(175, 45, 2, 10, 0, NULL, NULL),
(176, 45, 3, 7, 3, NULL, NULL),
(177, 45, 4, 10, 0, NULL, NULL),
(178, 46, 1, 10, 0, NULL, NULL),
(179, 46, 2, 10, 0, NULL, NULL),
(180, 46, 3, 10, 0, NULL, NULL),
(181, 46, 4, 10, 0, NULL, NULL),
(182, 47, 1, 10, 0, NULL, NULL),
(183, 47, 2, 10, 0, NULL, NULL),
(184, 47, 3, 10, 0, NULL, NULL),
(185, 47, 4, 10, 0, NULL, NULL),
(186, 48, 1, 10, 0, NULL, NULL),
(187, 48, 2, 10, 0, NULL, NULL),
(188, 48, 3, 10, 0, NULL, NULL),
(189, 48, 4, 10, 0, NULL, NULL),
(190, 49, 1, 10, 0, NULL, NULL),
(191, 49, 2, 10, 0, NULL, NULL),
(192, 49, 3, 10, 0, NULL, NULL),
(193, 49, 4, 10, 0, NULL, NULL),
(194, 50, 1, 10, 0, NULL, NULL),
(195, 50, 2, 10, 0, NULL, NULL),
(196, 50, 3, 10, 0, NULL, NULL),
(197, 50, 4, 10, 0, NULL, NULL),
(198, 51, 1, 10, 0, NULL, NULL),
(199, 51, 2, 10, 0, NULL, NULL),
(200, 51, 3, 10, 0, NULL, NULL),
(201, 51, 4, 10, 0, NULL, NULL),
(202, 52, 1, 10, 0, NULL, NULL),
(203, 52, 2, 10, 0, NULL, NULL),
(204, 52, 3, 10, 0, NULL, NULL),
(205, 52, 4, 10, 0, NULL, NULL),
(206, 53, 1, 10, 0, NULL, NULL),
(207, 53, 2, 10, 0, NULL, NULL),
(208, 53, 3, 10, 0, NULL, NULL),
(209, 53, 4, 10, 0, NULL, NULL),
(210, 54, 1, 10, 0, NULL, NULL),
(211, 54, 2, 10, 0, NULL, NULL),
(212, 54, 3, 10, 0, NULL, NULL),
(213, 54, 4, 10, 0, NULL, NULL),
(214, 55, 1, 10, 0, NULL, NULL),
(215, 55, 2, 10, 0, NULL, NULL),
(216, 55, 3, 10, 0, NULL, NULL),
(217, 55, 4, 10, 0, NULL, NULL),
(218, 56, 1, 10, 0, NULL, NULL),
(219, 56, 2, 10, 0, NULL, NULL),
(220, 56, 3, 10, 0, NULL, NULL),
(221, 56, 4, 10, 0, NULL, NULL),
(222, 57, 1, 1, 9, NULL, '2020-05-09 06:59:05'),
(223, 57, 2, 10, 0, NULL, NULL),
(224, 57, 3, 10, 0, NULL, NULL),
(225, 57, 4, 10, 0, NULL, NULL),
(226, 58, 1, 10, 0, NULL, NULL),
(227, 58, 2, 10, 0, NULL, NULL),
(228, 58, 3, 10, 0, NULL, NULL),
(229, 58, 4, 10, 0, NULL, NULL),
(230, 59, 1, 10, 0, NULL, NULL),
(231, 59, 2, 10, 0, NULL, NULL),
(232, 59, 3, 10, 0, NULL, NULL),
(233, 59, 4, 10, 0, NULL, NULL),
(234, 60, 1, 10, 0, NULL, NULL),
(235, 60, 2, 10, 0, NULL, NULL),
(236, 60, 3, 10, 0, NULL, NULL),
(237, 60, 4, 10, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img`
--

CREATE TABLE `product_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_img`
--

INSERT INTO `product_img` (`id`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(4, '25315.jpg', 2, '2020-03-29 01:46:46', '2020-03-29 01:46:46'),
(5, '36657.jpg', 2, '2020-03-29 01:46:46', '2020-03-29 01:46:46'),
(6, '93189.jpg', 2, '2020-03-29 01:46:46', '2020-03-29 01:46:46'),
(7, '75786.jpg', 4, '2020-03-29 01:53:56', '2020-03-29 01:53:56'),
(8, '7756.jpg', 4, '2020-03-29 01:53:56', '2020-03-29 01:53:56'),
(9, '18099.jpg', 4, '2020-03-29 01:53:56', '2020-03-29 01:53:56'),
(10, '26759.jpg', 6, '2020-03-29 01:56:28', '2020-03-29 01:56:28'),
(11, '10075.jpg', 6, '2020-03-29 01:56:28', '2020-03-29 01:56:28'),
(12, '85325.jpg', 6, '2020-03-29 01:56:28', '2020-03-29 01:56:28'),
(13, '53100.jpg', 7, '2020-03-29 01:58:00', '2020-03-29 01:58:00'),
(14, '71047.jpg', 7, '2020-03-29 01:58:00', '2020-03-29 01:58:00'),
(15, '12720.jpg', 8, '2020-03-29 01:59:40', '2020-03-29 01:59:40'),
(16, '55036.jpg', 8, '2020-03-29 01:59:40', '2020-03-29 01:59:40'),
(17, '41092.jpg', 8, '2020-03-29 01:59:40', '2020-03-29 01:59:40'),
(18, '98086.jpg', 9, '2020-03-29 02:01:26', '2020-03-29 02:01:26'),
(19, '22864.jpg', 9, '2020-03-29 02:01:26', '2020-03-29 02:01:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'M', NULL, NULL),
(2, 'S', NULL, NULL),
(3, 'L', NULL, NULL),
(4, 'XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `born` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `type` enum('Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_access` int(11) NOT NULL,
  `product_access` int(11) NOT NULL,
  `order_access` int(11) NOT NULL,
  `store_access` int(11) NOT NULL,
  `config_access` int(11) NOT NULL,
  `customer_access` int(11) NOT NULL,
  `user_access` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `born`, `avatar`, `gender`, `admin`, `type`, `category_access`, `product_access`, `order_access`, `store_access`, `config_access`, `customer_access`, `user_access`, `created_at`, `updated_at`) VALUES
(1, 'Hà Mạnh Tuấn', 'tuanhanb98@gmail.com', '0979587821', NULL, '$2y$10$1iegQ9AP6eHp0mCn.e7iCe6X1etMJFkunnDL2QqhYFQaF6ITXqXaG', 'Ninh Bình', '1998-02-10', 'uploads/account/2020-29-03-200055-.png', 'Nam', 1, 'Admin', 1, 1, 1, 1, 1, 1, 1, '2020-03-29 01:03:54', '2020-03-29 13:00:55'),
(2, 'User1', 'user1@gmail.com', NULL, NULL, '$2y$10$X/eVWKOvTO7fLeD8HlAL9O.6aLxIWZuthq9Ih/xcdXFaQSHxGpwEC', NULL, NULL, NULL, NULL, 1, 'User', 1, 1, 1, 1, 0, 0, 0, '2020-03-29 12:56:58', '2020-05-10 01:26:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_his`
--
ALTER TABLE `admin_his`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetail_order_id_index` (`order_id`),
  ADD KEY `orderdetail_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`);

--
-- Chỉ mục cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attr_product_id_index` (`product_id`),
  ADD KEY `product_attr_size_id_index` (`size_id`);

--
-- Chỉ mục cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_img_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_his`
--
ALTER TABLE `admin_his`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT cho bảng `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD CONSTRAINT `product_attr_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attr_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `product_size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

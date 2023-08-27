-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3333
-- Thời gian đã tạo: Th7 28, 2023 lúc 08:42 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lrvshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Oppo', 'oppo', 0, '2023-07-18 20:07:46', '2023-07-27 18:11:51', 2),
(2, 'Apple', 'apple', 0, '2023-07-18 20:09:07', '2023-07-27 18:12:49', 2),
(3, 'Huawei', 'huawei', 0, '2023-07-18 20:23:26', '2023-07-27 19:13:16', 2),
(4, 'Casio', 'casio', 0, '2023-07-18 21:11:09', '2023-07-27 18:14:18', 5),
(7, 'Seiko', 'seiko', 0, '2023-07-21 03:12:20', '2023-07-27 18:14:42', 5),
(8, 'Simple Home', 'simple-home', 0, '2023-07-27 18:17:15', '2023-07-27 18:17:15', 6),
(9, 'Nam Sánh', 'nam-sanh', 0, '2023-07-27 18:18:29', '2023-07-27 18:18:29', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(12, 2, 2, NULL, 1, '2023-07-27 21:09:20', '2023-07-27 21:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Đồng hồ thông minh', 'dong-ho-thong-minh', 'Đồng hồ thông minh', 'uploads/category/1690506433.jpg', 'Đồng hồ thông minh', 'đồng hồ thông minh, smartwatch', 'Đồng hồ thông minh', 0, '2023-07-17 20:20:15', '2023-07-27 18:07:13'),
(5, 'Đồng hồ đeo tay', 'dong-ho-deo-tay', 'Đồng hồ đeo tay thông thường. Sản phẩm chính hãng. Giá cả hợp lý', 'uploads/category/1690506361.jpg', 'Đồng hồ đeo tay', 'Đồng hồ đeo tay', 'Đồng hồ đeo tay', 0, '2023-07-19 02:31:30', '2023-07-27 18:06:01'),
(6, 'Đồng hồ treo tường', 'dong-ho-treo-tuong', 'Đồng hồ treo tường', 'uploads/category/1690506652.jpg', 'Đồng hồ treo tường', 'Đồng hồ treo tường', 'Đồng hồ treo tường', 0, '2023-07-27 18:10:52', '2023-07-27 18:10:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đỏ', 'red', 0, '2023-07-19 22:32:57', '2023-07-19 22:32:57'),
(2, 'Vàng', 'yellow', 0, '2023-07-19 22:36:29', '2023-07-19 22:36:29'),
(4, 'Đen', 'black', 1, '2023-07-19 23:15:43', '2023-07-19 23:15:43'),
(5, 'Trắng', 'white', 0, '2023-07-20 01:19:45', '2023-07-20 01:19:45'),
(6, 'Xám', 'grey', 0, '2023-07-20 01:19:58', '2023-07-20 01:19:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_17_082028_add_details_to_users_table', 2),
(6, '2023_07_17_100006_create_categories_table', 3),
(7, '2023_07_19_015603_create_brands_table', 4),
(8, '2023_07_19_051357_create_products_table', 5),
(9, '2023_07_19_052721_create_images_table', 5),
(11, '2023_07_20_044020_create_colors_table', 6),
(12, '2023_07_20_075417_create_product_colors_table', 7),
(13, '2023_07_20_221756_create_sliders_table', 8),
(14, '2023_07_21_095056_add_category_id_to_brands_table', 9),
(15, '2023_07_22_034004_create_wishlists_table', 10),
(17, '2023_07_23_075922_create_carts_table', 11),
(18, '2023_07_24_053354_create_orders_table', 12),
(19, '2023_07_24_054047_create_order_items_table', 12),
(21, '2023_07_26_054330_create_settings_table', 13),
(22, '2023_07_26_142038_create_user_details_table', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'HNHkORNj3bTA8', 'Admin', 'admin@gmail.com', '11111111111', '111111', '21 Tran Nao', 'completed', 'Cash on Delivery', NULL, '2023-07-24 00:17:47', '2023-07-24 19:39:42'),
(2, 2, 'HNHrZ13PbUohV', 'Admin', 'admin@gmail.com', '2222222222', '222222', '21 TXT', 'in progress', 'Cash on Delivery', NULL, '2023-07-24 01:40:22', '2023-07-24 01:40:22'),
(3, 2, 'HNHH8wGckmfQS', 'Admin', 'admin@gmail.com', '2222222222', '555555', '23 vfd', 'in progress', 'Cash on Delivery', NULL, '2023-07-24 05:33:16', '2023-07-24 05:33:16'),
(4, 2, 'HNHllxZKJ3At1', 'Admin', 'admin@gmail.com', '3334445555', '777755', 'sssd', 'completed', 'Cash on Delivery', NULL, '2023-07-24 05:53:14', '2023-07-24 19:57:46'),
(5, 2, 'HNHG9D1DcP5kI', 'Admin', 'admin@gmail.com', '1111222266', '888800', 'gth', 'in progress', 'Cash on Delivery', NULL, '2023-07-24 16:53:25', '2023-07-24 16:53:25'),
(6, 2, 'HNHgMabDVbuLu', 'Admin', 'admin@gmail.com', '1274334433', '333333', '32 Texas', 'in progress', 'Cash on Delivery', NULL, '2023-07-27 20:39:54', '2023-07-27 20:39:54'),
(7, 2, 'HNHyzEqWPOM67', 'Admin', 'admin@gmail.com', '1274334433', '333333', '32 Texas', 'in progress', 'Cash on Delivery', NULL, '2023-07-27 20:43:15', '2023-07-27 20:43:15'),
(8, 5, 'HNHHr3c919ojG', 'Huy Huỳnh', 'nguyenhuyhuynh.ckd@gmail.com', '6666777722', '456766', '55 Điện Biên Phủ', 'in progress', 'Cash on Delivery', NULL, '2023-07-27 21:29:27', '2023-07-27 21:29:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, 2, 9000, '2023-07-24 00:17:47', '2023-07-24 00:17:47'),
(2, 1, 5, NULL, 2, 12000, '2023-07-24 00:17:47', '2023-07-24 00:17:47'),
(3, 1, 6, 4, 1, 18000, '2023-07-24 00:17:47', '2023-07-24 00:17:47'),
(4, 2, 4, NULL, 1, 9000, '2023-07-24 01:40:22', '2023-07-24 01:40:22'),
(5, 3, 5, NULL, 1, 12000, '2023-07-24 05:33:16', '2023-07-24 05:33:16'),
(6, 4, 5, NULL, 1, 12000, '2023-07-24 05:53:14', '2023-07-24 05:53:14'),
(7, 5, 4, NULL, 2, 9000, '2023-07-24 16:53:25', '2023-07-24 16:53:25'),
(8, 5, 6, 4, 1, 18000, '2023-07-24 16:53:26', '2023-07-24 16:53:26'),
(9, 6, 13, NULL, 1, 5340000, '2023-07-27 20:39:54', '2023-07-27 20:39:54'),
(10, 7, 11, NULL, 1, 345000, '2023-07-27 20:43:15', '2023-07-27 20:43:15'),
(11, 8, 15, NULL, 1, 980000, '2023-07-27 21:29:27', '2023-07-27 21:29:27');

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
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=treding,0=not-trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured, 0=not-featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 5, 'ĐỒNG HỒ NAM SEIKO PROSPEX', 'dong-ho-seiko-prospex', 'Seiko', 'Đồng hồ nam Seiko Prospex. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 2200000, 2000000, 10, 1, 0, 0, 'Đồng hồ nam Seiko Prospex', 'Đồng hồ nam Seiko Prospex', 'Đồng hồ nam Seiko Prospex', '2023-07-19 04:10:45', '2023-07-27 20:25:16'),
(7, 6, 'Đồng Hồ Treo Tường EXACTLY U90', 'dong-ho-treo-tuong-exactly-u90', 'Nam Sánh', 'Đồng hồ treo tường đjp, giá rẻ. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 350000, 320000, 20, 0, 0, 0, 'Đồng hồ treo tường Exactly U90', 'Exactly U90', 'Đồng hồ treo tường đjp, giá rẻ. Đồng hồ treo tường đjp, giá rẻ. Đồng hồ treo tường đjp, giá rẻ', '2023-07-27 18:25:42', '2023-07-27 20:25:39'),
(8, 5, 'Đồng hồ Casio Nam', 'dong-ho-casio-nam', 'Casio', 'Đồng hồ Casio Nam. Sản phaarrm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 1500000, 1360000, 10, 0, 0, 0, 'Đồng hồ Casio Nam', 'Đồng hồ Casio', 'Đồng hồ Casio', '2023-07-27 18:51:48', '2023-07-27 20:26:04'),
(9, 2, 'Đồng hồ thông minh Apple Watch SE 2022 GPS', 'apple-watch-se-2022-gps', 'Apple', 'Đồng hồ thông minh Apple Watch SE 2022 GPS. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 8000000, 7000000, 8, 0, 0, 0, 'Đồng hồ thông minh Apple Watch SE 2022 GPS', 'Đồng hồ thông minh, Apple Watch SE 2022 GPS', 'Đồng hồ thông minh Apple Watch SE 2022 GPS', '2023-07-27 18:56:31', '2023-07-27 20:26:29'),
(10, 2, 'Đồng hồ thông minh Garmin Venu SQ 2 Music', 'garmin-venu-sq2-music', 'Oppo', 'Đồng hồ thông minh Garmin Venu SQ 2 Music. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 7900000, 7800000, 7, 1, 1, 0, 'Đồng hồ thông minh Garmin Venu SQ 2 Music', 'Đồng hồ thông minh, Garmin Venu SQ 2 Music', 'Đồng hồ thông minh Garmin Venu SQ 2 Music', '2023-07-27 19:07:04', '2023-07-27 20:26:55'),
(11, 6, 'Đồng hồ Simplehome', 'dong-ho-simplehome', 'Simple Home', 'Đồng hồ Simplehome. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 378000, 345000, 8, 0, 0, 0, 'Đồng hồ Simplehome', 'Đồng hồ Simplehome', 'Đồng hồ Simplehome', '2023-07-27 19:11:08', '2023-07-27 20:43:15'),
(12, 2, 'Đồng hồ thông minh Huawei Watch GT Cyber', 'huawei-watch-gt-cyber', 'Huawei', 'Đồng hồ thông minh Huawei Watch GT Cyber. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 5300000, 5000000, 6, 0, 1, 0, 'Đồng hồ thông minh Huawei Watch GT Cyber', 'Đồng hồ thông minh Huawei Watch GT Cyber', 'Đồng hồ thông minh Huawei Watch GT Cyber', '2023-07-27 19:17:55', '2023-07-27 20:27:45'),
(13, 2, 'Đồng hồ thông minh Samsung Galaxy Watch5 R905F LTE', 'samsung-galaxy-watch5-r905f-lte', 'Oppo', 'Đồng hồ thông minh Samsung Galaxy Watch5 R905F LTE. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 5700000, 5340000, 5, 0, 0, 0, 'Đồng hồ thông minh Samsung Galaxy Watch5 R905F LTE', 'Đồng hồ thông minh Samsung Galaxy Watch5 R905F LTE', 'Đồng hồ thông minh Samsung Galaxy Watch5 R905F LTE', '2023-07-27 19:24:21', '2023-07-27 20:39:55'),
(14, 2, 'Apple Watch Ultra 49mm (LTE) viền Titan - Dây Trail Loop', 'apple-watch-ultra-49mm-lte', 'Apple', 'Apple Watch Ultra 49mm (LTE) viền Titan - Dây Trail Loop. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 20000000, 19100000, 4, 1, 1, 0, 'Apple Watch Ultra 49mm (LTE) viền Titan - Dây Trail Loop', 'Apple Watch Ultra 49mm (LTE) viền Titan - Dây Trail Loop', 'Apple Watch Ultra 49mm (LTE) viền Titan - Dây Trail Loop', '2023-07-27 19:27:22', '2023-07-27 20:28:58'),
(15, 2, 'Đồng hồ thông minh X6', 'dong-ho-x6', 'Casio', 'Đồng hồ thông minh X6. Sản phẩm chính hãng', '<h1>Đồng hồ thông minh X6</h1>\r\n<p>\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n<p>', 1200000, 980000, 4, 1, 0, 0, 'Đồng hồ thông minh X6', 'Đồng hồ thông minh X6', 'Đồng hồ thông minh X6', '2023-07-27 19:44:24', '2023-07-27 21:29:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 7, 1, 5, '2023-07-27 18:25:42', '2023-07-27 18:25:42'),
(6, 7, 2, 5, '2023-07-27 18:25:44', '2023-07-27 18:25:44'),
(7, 7, 5, 5, '2023-07-27 18:25:46', '2023-07-27 18:25:46'),
(8, 10, 5, 4, '2023-07-27 19:07:04', '2023-07-27 19:07:04'),
(9, 10, 6, 4, '2023-07-27 19:07:04', '2023-07-27 19:07:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(15, 7, 'uploads/products/16905075421.png', '2023-07-27 18:25:42', '2023-07-27 18:25:42'),
(16, 7, 'uploads/products/16905075871.jpg', '2023-07-27 18:26:27', '2023-07-27 18:26:27'),
(17, 7, 'uploads/products/16905075872.jpg', '2023-07-27 18:26:27', '2023-07-27 18:26:27'),
(18, 7, 'uploads/products/16905075873.png', '2023-07-27 18:26:27', '2023-07-27 18:26:27'),
(20, 2, 'uploads/products/16905082651.jpg', '2023-07-27 18:37:45', '2023-07-27 18:37:45'),
(21, 8, 'uploads/products/16905091081.jpg', '2023-07-27 18:51:48', '2023-07-27 18:51:48'),
(22, 9, 'uploads/products/16905093921.png', '2023-07-27 18:56:32', '2023-07-27 18:56:32'),
(23, 10, 'uploads/products/16905100241.png', '2023-07-27 19:07:04', '2023-07-27 19:07:04'),
(24, 11, 'uploads/products/16905102681.jpg', '2023-07-27 19:11:08', '2023-07-27 19:11:08'),
(25, 12, 'uploads/products/16905106751.png', '2023-07-27 19:17:55', '2023-07-27 19:17:55'),
(26, 13, 'uploads/products/16905110611.png', '2023-07-27 19:24:21', '2023-07-27 19:24:21'),
(27, 14, 'uploads/products/16905112421.png', '2023-07-27 19:27:22', '2023-07-27 19:27:22'),
(28, 15, 'uploads/products/16905122641.png', '2023-07-27 19:44:24', '2023-07-27 19:44:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'HNH Shop', 'http://lrvshop.com', 'HNH Shop', 'lrvshop', 'lrvshop', '32 Lê Văn Việt, TP.Thủ Đức, TP.HCM', '0911111110', '0922222278', 'hnhshop@gmail.com', 'hnhshop.admin@gmail.com', 'fb.com', 'twitter.com', 'instagram.com', 'youtube.com', '2023-07-25 23:52:48', '2023-07-27 21:08:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slider1', 'slider1', 'uploads/slider/1690452982.png', 0, '2023-07-20 16:17:12', '2023-07-27 03:16:22'),
(3, 'Smart Watch', 'Đồng hồ thông minh mới', 'uploads/slider/1690453032.jpg', 0, '2023-07-20 18:45:38', '2023-07-27 03:17:12'),
(4, 'Slider3', 'slider 3', 'uploads/slider/1690453052.png', 0, '2023-07-20 18:46:56', '2023-07-27 03:17:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'User 1', 'user1@gmail.com', NULL, '$2y$10$YRG74xFVJdl2TSHS.dMhPOn5n1ef5ldPDbAz32ykHcHS0YdaCjRIe', NULL, '2023-07-16 21:15:59', '2023-07-26 16:08:03', 0),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$.UGm2V3btE8t9WI9RAqkjeFReFyHVUSclPn6dTyUO4XUonHI2zNQC', NULL, '2023-07-17 01:48:19', '2023-07-17 01:48:19', 1),
(3, 'Minh update', 'minh@gmail.com', NULL, '$2y$10$g37cb2Fo/oQQ0DC4b./r2ueHSQlXJpYi0uy/T0QK9XOoeoRaf8IPu', NULL, '2023-07-26 02:21:29', '2023-07-26 02:47:38', 0),
(5, 'Huy Huỳnh', 'nguyenhuyhuynh.ckd@gmail.com', NULL, '$2y$10$GDd6YUE9vPELyj2bm9Hvzu8uYh8SrQ.S5AW8pandTT7iCD7D4dqk.', NULL, '2023-07-27 21:12:20', '2023-07-27 21:12:20', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `pin_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '1274334433', '333333', '32 Texas', '2023-07-26 08:14:37', '2023-07-26 08:14:37'),
(2, 5, '3456783490', '780909', '45 Sư Vạn Hạnh', '2023-07-27 23:24:54', '2023-07-27 23:24:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2, 5, '2023-07-22 19:46:42', '2023-07-22 19:46:42'),
(5, 2, 4, '2023-07-22 20:20:09', '2023-07-22 20:20:09'),
(6, 5, 15, '2023-07-27 21:14:06', '2023-07-27 21:14:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

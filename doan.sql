-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2023 lúc 04:08 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

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
(4, '2023_05_24_134735_create_tbl_admin_table', 1),
(5, '2023_05_26_161303_create_tbl_category_product', 2),
(6, '2023_05_29_132243_create_tbl_brand', 3),
(7, '2023_05_30_025735_create_tbl_product', 4),
(8, '2023_06_07_111249_create_tbl_demand', 5),
(9, '2023_06_13_102539_create_tbl_customer', 6),
(10, '2023_06_13_103125_create_tbl_customer', 7),
(11, '2023_06_16_131933_tbl_shoppingcustomer', 8),
(15, '2023_06_25_091637_tbl_payment', 9),
(16, '2023_06_25_091606_tbl_order', 10),
(17, '2023_06_26_033338_create_tbl_order', 11),
(18, '2023_06_25_091711_tbl_order_detail', 12);

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
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ad_id` int(10) UNSIGNED NOT NULL,
  `ad_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`ad_id`, `ad_email`, `ad_password`, `ad_name`, `ad_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '123456789', 'ADMIN', '032684220', '2023-05-24 14:17:46', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Apple', '2023-06-29 23:09:13', NULL),
(2, 'SamSung', 'SamSung', '2023-06-29 23:09:21', NULL),
(3, 'Sony', 'Sony', '2023-06-29 23:09:32', NULL),
(4, 'Dell', 'Dell', '2023-06-29 23:10:17', NULL),
(5, 'HP', 'HP', '2023-06-29 23:10:30', NULL),
(6, 'Xiaomi', 'Xiaomi', '2023-06-29 23:10:57', NULL),
(7, 'Huawei', 'Huawei', '2023-06-29 23:11:09', NULL),
(8, 'VIVO', 'VIVO', '2023-06-29 23:11:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_desc`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', 'Điện Thoại', '2023-06-29 23:04:17', NULL),
(2, 'LapTop', 'LapTop', '2023-06-29 23:04:26', NULL),
(3, 'Đồng Hồ Thông Minh', 'Đồng Hồ Thông Minh', '2023-06-29 23:04:45', NULL),
(4, 'Tai Nghe', 'Tai Nghe', '2023-06-29 23:05:19', NULL),
(5, 'Bàn Phím', 'Bàn Phím', '2023-06-29 23:06:39', NULL),
(6, 'Chuột', 'Chuột', '2023-06-29 23:06:47', NULL),
(7, 'Màn Hình Máy Tính', 'Màn Hình Máy Tính', '2023-06-29 23:08:08', NULL),
(8, 'Sạc Dự Phòng', 'Sạc Dự Phòng', '2023-06-29 23:08:27', NULL),
(9, 'Loa', 'Loa', '2023-06-29 23:08:36', NULL),
(10, 'Sạc Có Dây', 'Sạc Có Dây', '2023-06-30 21:35:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Hoài Nam', 'nam@gmail.com', '0326684220', '123', 'Hà Nội', NULL, NULL),
(2, 'Mai Anh', 'maianh@gmail.com', '0326645597', '123', 'Thái Nguyên', NULL, NULL),
(3, 'Tùng Tài', 'tungtai@gmail.com', '0987654321', '123', 'Hà Tĩnh', NULL, NULL),
(4, 'Dương Đường', 'duong@gmail.com', '0987656789', '123', 'Nghệ An', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `shoppingcustomer_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `order_total` int(20) NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shoppingcustomer_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 73916000, 'Đã Xác Nhận Đơn Hàng', NULL, NULL),
(2, 4, 2, 2, 18890000, 'Chờ Xác Nhận Đơn Hàng', NULL, NULL),
(3, 2, 3, 3, 228160000, 'Hủy đơn hàng', NULL, NULL),
(4, 3, 4, 4, 347800000, 'Xác Nhận Đơn Hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `orderdetail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`orderdetail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 'HP VICTUS 16-e0175AX 4R0U8PA', 17390000, 3, NULL, NULL),
(2, 1, 9, 'B&O Beosound Explore', 449000, 4, NULL, NULL),
(3, 1, 6, 'Apple AirPods 3', 3990000, 5, NULL, NULL),
(4, 2, 8, 'PISEN Power Station', 530000, 3, NULL, NULL),
(5, 2, 10, 'Acer Gaming Nitro AN515-45-R0B6 NH.QBCSV.001', 17300000, 1, NULL, NULL),
(6, 3, 13, 'Ideapad Gaming 3 15IHU6 82K100FBVN', 13000000, 5, NULL, NULL),
(7, 3, 12, 'HP VICTUS 16-e0175AX 4R0U8PA', 17390000, 4, NULL, NULL),
(8, 3, 11, 'Macbook', 23400000, 4, NULL, NULL),
(9, 4, 12, 'HP VICTUS 16-e0175AX 4R0U8PA', 17390000, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Toán Khi Nhận Hàng', NULL, NULL),
(2, 'Thanh Toán Trực Tuyến', NULL, NULL),
(3, 'Thanh Toán Khi Nhận Hàng', NULL, NULL),
(4, 'Thanh Toán Khi Nhận Hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_imge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_price`, `product_imge`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'IPhone 11', 'IPHONE 11 128GB BLACK MHDH3VN/A', 8000000, '1688080520.jpg', '2023-06-29 23:15:20', NULL),
(2, 1, 2, 'Samsung Galaxy A54', 'Samsung Galaxy A54 5G 8GB/128GB', 5400000, '1688081184.png', '2023-06-29 23:26:24', NULL),
(3, 7, 3, 'Sony C24-20', 'Sony C24-20 62A8KAR1WW 23.8\" FHD 75Hz', 3600000, '1688081403.jpg', '2023-06-29 23:30:03', NULL),
(4, 2, 4, 'Dell Vostro 5410', 'Dell Vostro 5410 V4I5214W (i5-11320H/8GB RAM/512GB SSD/14\"FHD/Win10/Office H&S)', 17900000, '1688081525.jpg', '2023-06-29 23:32:05', NULL),
(5, 2, 5, 'HP 240 G8 518V7PA', 'HP 240 G8 518V7PA (Core i5-1135G7/8GB RAM/512GB SSD/14\"FHD/Win10/Bạc)', 13200000, '1688081633.jpg', '2023-06-29 23:33:53', NULL),
(6, 4, 1, 'Apple AirPods 3', 'Apple AirPods 3 White MME73ZP/A', 3990000, '1688081821.jpg', '2023-06-29 23:37:01', NULL),
(8, 8, 6, 'PISEN Power Station', 'PISEN Power Station 20100mAh( Quick charger, QC3.0, PD3.0, LED )', 530000, '1688082072.jpg', '2023-06-29 23:41:12', NULL),
(9, 9, 7, 'B&O Beosound Explore', 'Loa Bluetooth B&O Beosound Explore Đen', 449000, '1688082162.jpg', '2023-06-29 23:42:42', NULL),
(10, 2, 4, 'Acer Gaming Nitro AN515-45-R0B6 NH.QBCSV.001', 'Ryzen 7 5800H/8GB RAM/512GB SSD/15.6”FHD 144Mhz/VGA RTX3060 6GB/Win10/Đen', 17300000, '1688082306.png', '2023-06-29 23:45:06', NULL),
(11, 2, 1, 'Macbook', '256GB', 23400000, '1688082364.jpg', '2023-06-29 23:46:04', NULL),
(12, 2, 5, 'HP VICTUS 16-e0175AX 4R0U8PA', 'R5-5600H/8GB RAM/512GB SSD/16.1\"FHD/RTX3050 4GB/Win10', 17390000, '1688082430.jpg', '2023-06-29 23:47:10', NULL),
(13, 2, 3, 'Ideapad Gaming 3 15IHU6 82K100FBVN', '(Core i7-11370H/8GB RAM/512GB/15.6\"FHD/RTX3050 4GB/Win 10/Đen)', 13000000, '1688082511.jpg', '2023-06-29 23:48:31', NULL),
(15, 3, 6, 'Xiaomi Mi Watch BHR4583GL', 'Xiaomi Mi Watch BHR4583GL Xanh', 2290000, '1688157159.jpg', '2023-06-30 20:32:39', NULL),
(16, 3, 3, 'Sony Smart Band 6 BHR4951GL', 'Sony Smart Band 6 BHR4951GL', 890000, '1688157268.jpg', '2023-06-30 20:34:28', NULL),
(17, 3, 8, 'Garmin Vivoactive 3 ELEMENT', 'Garmin Vivoactive 3 ELEMENT, SEA, XANH DA TRỜI AZURE 70271632', 2220000, '1688157355.jpg', '2023-06-30 20:35:55', NULL),
(18, 3, 7, 'Series 8 Cellular', 'Series 8 Cellular 41mm Midnight - Viền nhôm, Dây cao su - MNHV3VN/A', 10000000, '1688157468.jpg', '2023-06-30 20:37:48', NULL),
(19, 3, 5, 'Watch Series 8 Cellular 45mm Red', 'Series 8 Cellular 45mm Red - Viền nhôm, Dây cao su - MNKA3VN/A', 9990000, '1688157530.jpg', '2023-06-30 20:38:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shoppingcustomer`
--

CREATE TABLE `tbl_shoppingcustomer` (
  `shoppingcustomer_id` int(10) UNSIGNED NOT NULL,
  `shoppingcustomer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shoppingcustomer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shoppingcustomer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shoppingcustomer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shoppingcustomer`
--

INSERT INTO `tbl_shoppingcustomer` (`shoppingcustomer_id`, `shoppingcustomer_name`, `shoppingcustomer_phone`, `shoppingcustomer_address`, `shoppingcustomer_note`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Hoài Nam', '0326684220', '72 trần đại nghĩa', NULL, '2023-06-30 17:48:25', NULL),
(2, 'Dương', '0371123123', '100 Nguyễn An Ninh', 'giao hàng vào thứ 7', '2023-06-30 18:07:26', NULL),
(3, 'Mai Anh', '0123456789', '2 Cầu Giấy', 'giao sau 5h chiều', '2023-06-30 18:16:05', NULL),
(4, 'Tùng Tài', '0123654987', '34 trần nhân tông', NULL, '2023-06-30 20:17:20', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_order_customer_id_foreign` (`customer_id`),
  ADD KEY `tbl_order_shoppingcustomer_id_foreign` (`shoppingcustomer_id`),
  ADD KEY `tbl_order_payment_id_foreign` (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `tbl_order_detail_order_id_foreign` (`order_id`),
  ADD KEY `tbl_order_detail_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_brand` (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_shoppingcustomer`
--
ALTER TABLE `tbl_shoppingcustomer`
  ADD PRIMARY KEY (`shoppingcustomer_id`);

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
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `orderdetail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_shoppingcustomer`
--
ALTER TABLE `tbl_shoppingcustomer`
  MODIFY `shoppingcustomer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `tbl_order_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`),
  ADD CONSTRAINT `tbl_order_shoppingcustomer_id_foreign` FOREIGN KEY (`shoppingcustomer_id`) REFERENCES `tbl_shoppingcustomer` (`shoppingcustomer_id`);

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`),
  ADD CONSTRAINT `tbl_order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 04, 2022 lúc 08:53 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `danh_sach_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cateprod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_is_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_meta_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateprod_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cateprod_name`, `cateprod_is_status`, `cateprod_meta_keywords`, `cateprod_meta_title`, `cateprod_meta_desc`, `cateprod_meta_url`, `cateprod_icon`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 'on', 'Iphone', 'Iphone', 'Iphone', 'iphone', 'public/cateprod_icon/1641051689_IPhone_Logo_2016.svg.png', '2022-01-01 08:41:29', '2022-01-01 08:41:29'),
(2, 'xiaomi', 'on', 'xiaomi', 'xiaomi', 'xiaomi', 'xiaomi', 'public/cateprod_icon/1641051708_Xiaomi_logo_(2021-).svg.png', '2022-01-01 08:41:48', '2022-01-01 08:41:48'),
(4, 'samsung', 'off', 'samsung', 'samsung', 'samsung', 'samsung', 'public/cateprod_icon/1641051759_Samsung_Logo.svg.png', '2022-01-01 08:42:39', '2022-01-01 08:42:39');

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
-- Cấu trúc bảng cho bảng `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_is_disable` int(11) NOT NULL,
  `user_numPassword_attempts` int(11) NOT NULL,
  `user_time_login` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `managers`
--

INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `verification_code`, `password`, `user_avatar`, `user_is_active`, `user_is_disable`, `user_numPassword_attempts`, `user_time_login`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'TRẦN TIẾN THẠCH', 'trantienthach', 'disneychannel1505171008@gmail.com', NULL, 'da1321909dbce2fb85d6725c0fdd1704789d14d3', '$2y$10$vVLRSmfdjs2dEL4ZHn.bUeuJLQR0CgSN7iFAQ/X4MWaIGp3HrIhl.', '1641051570_thach.jpg', 'on', 1, 0, 1, NULL, '2022-01-01 08:39:31', '2022-01-01 08:39:31', 0),
(2, 'pham dinh hung', 'trantienthach0810@gmail.com', 'thachttps14525@fpt.edu.vn', NULL, '9553175fbe89b0fbe5a641b3670d86877b96d00d', '$2y$10$gw5cZyKTMAki.fpnBZaH3.vhvIlKqfJF57vW4vYhPWx6Th/EFvV22', 'public/avatar_manager/1641207761_poco-x3-gt-azul-mobile-store-ecuador.jpg', 'on', 1, 0, 1, NULL, '2022-01-03 04:02:41', '2022-01-03 04:02:41', 1);

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
(5, '2021_11_14_090142_manager', 1),
(6, '2021_12_05_111757_cate', 1),
(7, '2021_12_07_043255_products', 1),
(8, '2022_01_01_153256_order', 1),
(9, '2022_01_01_153341_info_customer', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_cus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `prod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_is_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_meta_seourl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price_current` int(11) NOT NULL,
  `prod_price_old` int(11) NOT NULL,
  `prod_cate_id` int(11) NOT NULL,
  `prod_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `prod_name`, `prod_is_status`, `prod_meta_keywords`, `prod_meta_title`, `prod_short_desc`, `prod_meta_desc`, `prod_meta_seourl`, `prod_price_current`, `prod_price_old`, `prod_cate_id`, `prod_img`, `new`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 12 64GB I Chính hãng VN/A', 'on', 'iPhone 12 64GB I Chính hãng VN/A', 'iPhone 12 64GB I Chính hãng VN/A', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'iPhone 12 64GB I Chính hãng VN/A', 'iphone-12-64gb-i-chinh-hang-vn-a', 18590000, 22990000, 1, 'public/prod_img/1641052433_iphone11.jpg', 0, '2022-01-01 08:53:53', '2022-01-01 08:53:53'),
(2, 'iPhone 12 mini I Chính hãng VN/A', 'on', 'iPhone 12 mini I Chính hãng VN/A', 'iPhone 12 mini I Chính hãng VN/A', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'iPhone 12 mini I Chính hãng VN/A', 'iphone-12-mini-i-chinh-hang-vn-a', 15500000, 18990000, 1, 'public/prod_img/1641052505_iphone12mini.jpg', 0, '2022-01-01 08:55:05', '2022-01-01 08:55:05'),
(3, 'iPhone XR 128GB I Chính hãng VN/A', 'on', 'iPhone XR 128GB I Chính hãng VN/A', 'iPhone XR 128GB I Chính hãng VN/A', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'iPhone XR 128GB I Chính hãng VN/A', 'iphone-xr-128gb-i-chinh-hang-vn-a', 14500000, 16990000, 1, 'public/prod_img/1641052602_iphone XR.jpg', 0, '2022-01-01 08:56:42', '2022-01-01 08:56:42'),
(4, 'iPhone 11 128GB I Chính hãng VN/A', 'on', 'iPhone 11 128GB I Chính hãng VN/A', 'iPhone 11 128GB I Chính hãng VN/A', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'iPhone 11 128GB I Chính hãng VN/A', 'iphone-11-128gb-i-chinh-hang-vn-a', 16900000, 19900000, 1, 'public/prod_img/1641052652_iphone-11_2_.jpg', 0, '2022-01-01 08:57:32', '2022-01-01 08:57:32'),
(5, 'Xiaomi Poco X3 GT', 'on', 'Xiaomi Poco X3 GT', 'Xiaomi Poco X3 GT', 'Bảo hành 18 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. Gia hạn bảo hành thời gian giãn các', 'Xiaomi Poco X3 GT', 'xiaomi-poco-x3-gt', 7490000, 7990000, 2, 'public/prod_img/1641052788_poco-x3-gt-azul-mobile-store-ecuador.jpg', 0, '2022-01-01 08:59:48', '2022-01-01 08:59:48'),
(6, 'Xiaomi Redmi Note 10 Pro 8GB', 'on', 'Xiaomi Redmi Note 10 Pro 8GB', 'Xiaomi Redmi Note 10 Pro 8GB', 'Sách hướng dẫn, Hộp máy, Cáp Type C - Type A, Củ sạc nhanh rời đầu Type A', 'Xiaomi Redmi Note 10 Pro 8GB', 'xiaomi-redmi-note-10-pro-8gb', 7300000, 7500000, 2, 'public/prod_img/1641052872_xiaomi-redmi-note-10-pro-8gb-128gb_1.jpg', 0, '2022-01-01 09:01:12', '2022-01-01 09:01:12'),
(7, 'Xiaomi Pad 5', 'off', 'Xiaomi Pad 5', 'Xiaomi Pad 5', 'Xiaomi Pad 5', 'Xiaomi Pad 5', 'xiaomi-pad-5', 8990000, 9990000, 2, 'public/prod_img/1641052923_mi-pad-5-02.jpg', 1, '2022-01-01 09:02:03', '2022-01-01 09:02:03'),
(8, 'Xiaomi Redmi Note 10S', 'on', 'Xiaomi Redmi Note 10S', 'Xiaomi Redmi Note 10S', 'Bảo hành 18 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'Xiaomi Redmi Note 10S', 'xiaomi-redmi-note-10s', 6150000, 6450000, 2, 'public/prod_img/1641052994_xiaomi-redmi-note-10s-xanh-1.jpg', 0, '2022-01-01 09:03:14', '2022-01-01 09:03:14'),
(9, 'Xiaomi Pad 5 (6GB/256GB)', 'on', 'Xiaomi Pad 5 (6GB/256GB)', 'Xiaomi Pad 5 (6GB/256GB)', 'Bảo hành 18 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. Gia hạn bảo hành thời gian giãn cách', 'Xiaomi Pad 5 (6GB/256GB)', 'xiaomi-pad-5-6gb-256gb', 9990000, 10490000, 2, 'public/prod_img/1641053058_mi-pad-5-02.jpg', 0, '2022-01-01 09:04:18', '2022-01-01 09:04:18');

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
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cateprod_name_unique` (`cateprod_name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_username_unique` (`username`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
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
  ADD UNIQUE KEY `products_prod_name_unique` (`prod_name`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

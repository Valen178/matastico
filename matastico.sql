-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2024 a las 05:19:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matastico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mates', '2024-08-07 02:19:52', '2024-08-09 06:01:09'),
(2, 'Bombillas', '2024-08-07 02:19:52', '2024-08-09 06:01:18'),
(3, 'Termo', '2024-08-07 02:19:52', '2024-08-09 06:01:26'),
(4, 'Personalizado', '2024-08-07 02:19:52', '2024-08-09 06:01:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_04_235644_create_categories_table', 1),
(5, '2024_07_04_236924_create_products_table', 1),
(6, '2024_08_06_221010_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`products`)),
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, '[]', 0, 1, '2024-08-07 02:20:49', '2024-08-09 06:18:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `content`, `category_id`, `price`, `main_image`, `created_at`, `updated_at`) VALUES
(1, 'Mate Uruguayo Marrón', 'El mate que probablemente mas veces viste en tu vida, el famoso camionero. Ideal si queres algo simple, economico y liviano. Muy de transportar debido a su forma cómoda para la mano y liviandad.', 1, 38400, 'products/GsFxhYrnRqy9cTrvSt6uAywu7bn1Xo9gSZxpQIYV.jpg', '2024-08-07 02:19:52', '2024-08-09 06:11:02'),
(2, 'Mate Imperial Blanco', 'El famoso imperial. El deseado por todos, el mate con virola hecha artesanalmente, a mano, y que NUNCA vas a ver dos iguales. Definitivamente, de los mejores productos para tu día a día.', 1, 45500, 'products/yfeMblxcgReYox5Dst26UN6Wcz179Bci9z3f1lqC.jpg', '2024-08-07 02:19:52', '2024-08-09 06:11:12'),
(3, 'Bombilla Pico de Loro', 'Bombillas de acero inoxidable, con pico de loro para mas comodidad al tomar mate (posicion mas ergonómica) y mejor fluída del agua al absorber.', 2, 5000, 'products/TZLCXB7jtU5M3r4PTP2eA19A9I1GGxAVFqxzC7nO.jpg', '2024-08-07 02:19:52', '2024-08-09 06:09:08'),
(4, 'Mate Rustico Marrón', 'El mate más cómodo y práctico que hay? Si. Por que? Porque cuenta con una base que se ajusta al tamaño del mate para que puedas apoyar el mate luego de cada cebada, sin miedo a que se caiga o desbalancee.', 1, 15000, 'products/IrVEBXATAiReQlUuieXzTOnR9xwJfHwqLSi5mnm5.jpg', '2024-08-07 02:19:52', '2024-08-09 06:14:49'),
(5, 'Termo de Acero', 'Termos media manija con doble capa de acero inoxidable. Mantiene temperatura de 4 a 6 horas. Manija cómoda para la cebada.', 3, 33000, 'products/YS5fc6uL7HExVMsxyqPvaSFNy2bLvjofZofUccQw.jpg', '2024-08-07 02:19:52', '2024-08-09 06:15:05'),
(6, 'Torpedo Alpaca Cincelado', 'El torpedo cincelado es algo inexplicable, no es muy grande por lo tanto no consume mucha yerba, es muy cómodo de agarrar ya que al ser redondo la mano se adapta muy fácilmente a su forma y el cincelado en los torpedos los hace quedar increíblemente lindos.', 1, 31000, 'products/IrGt1ZTaiUqAH6nxkWJBqUIB08wluXuuT5IW9wju.jpg', '2024-08-09 06:13:30', '2024-08-09 06:15:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rujLN9Oj3dWJhqNd7lyepMjIfAGCkttXlC5okqCK', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVhHMkJVdWZpNXBRelRPeTF0ZUlzSjJoTjBYVnhNNURNMUI2bjRtYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyMzE3MTIwNDt9fQ==', 1723173503);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `user_name`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Isai Gislason', 'Mrs. Jewell Satterfield', 'iwilkinson@example.com', '2024-08-07 02:19:51', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Mr. Ray Bosco PhD', 'user', 'Q5G2t4tya6', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(2, 'Dr. Rebecca Beier IV', 'Rylan Lynch', 'ethel.braun@example.com', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Madilyn Baumbach', 'user', 'KNUoaYNw9a', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(3, 'Dr. Elvera Kuhic DVM', 'Sarina Nienow', 'merritt.marvin@example.com', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Mrs. Teresa Yundt DVM', 'user', 'xkOfNQALd9', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(4, 'Ona Wilderman', 'Dolores Macejkovic', 'brennon28@example.net', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Jeff D\'Amore', 'user', 'unzm7dSEa7', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(5, 'Juvenal Pagac', 'Hope Hansen Jr.', 'estella27@example.net', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Dawson Nolan', 'user', 'nnrxqIeK55', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(6, 'Roy Bailey Sr.', 'Alberto Weissnat', 'medhurst.dasia@example.com', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Mrs. Cayla Bradtke III', 'user', 'iBjhgvuckI', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(7, 'Dr. Maxine Gleichner IV', 'Dr. Kaley Farrell', 'nakia.pfeffer@example.com', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Wanda Kuhic V', 'user', 'DNz8lFzrp7', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(8, 'Justen Boyer', 'Judd Friesen PhD', 'florence.jacobson@example.net', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Savanna Okuneva', 'user', 'yO09P7Bw43', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(9, 'Jay Kovacek', 'Felicity Pouros', 'erin.feest@example.com', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Caterina Fritsch', 'user', 'PZzRhV5O5P', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(10, 'Kory Willms', 'Rosina Ryan', 'cherzog@example.org', '2024-08-07 02:19:52', '$2y$12$zabG5NWKZyMsKr9EKaxBzeadavlfVdjANBrwmYcYd7NxILZw.hvhG', 'Prof. Coleman Treutel Jr.', 'user', 'bD3kXmuCgu', '2024-08-07 02:19:52', '2024-08-07 02:19:52'),
(11, 'test', NULL, 'test@test.com', NULL, '$2y$12$ehjNausoz0J.689ZC.jNhORVRlQKGjmvyFkGo3y3.mEUi2Z63eF9C', NULL, 'admin', NULL, '2024-08-07 02:20:44', '2024-08-07 02:20:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

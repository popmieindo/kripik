-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2023 pada 09.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keripik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `qty` varchar(111) DEFAULT NULL,
  `nama` varchar(111) DEFAULT NULL,
  `harga` varchar(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `order_id`, `qty`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(43, 68, '1', 'kripik labu', '3000', '2023-07-15 21:47:40', '2023-07-15 21:47:40'),
(44, 68, '2', 'Keripik Jagung', '6000', '2023-07-15 21:47:40', '2023-07-15 21:47:40'),
(45, 68, '3', 'keripik Bawang', '7000', '2023-07-15 21:47:40', '2023-07-15 21:47:40'),
(46, 68, '5', 'Rempeyek Kribon', '8500', '2023-07-15 21:47:40', '2023-07-15 21:47:40'),
(47, 68, '1', 'Keripik Kentang', '9000', '2023-07-15 21:47:40', '2023-07-15 21:47:40'),
(48, 69, '1', 'kripik labu', '3000', '2023-07-15 23:27:24', '2023-07-15 23:27:24'),
(49, 69, '1', 'Keripik Jagung', '6000', '2023-07-15 23:27:24', '2023-07-15 23:27:24'),
(50, 69, '1', 'keripik Bawang', '7000', '2023-07-15 23:27:24', '2023-07-15 23:27:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` varchar(111) DEFAULT NULL,
  `email` varchar(111) DEFAULT NULL,
  `no_hp` varchar(111) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `nama`, `email`, `no_hp`, `alamat`, `password`, `created_at`, `updated_at`) VALUES
(7, 'Riski Safitri', 'admin@admin.com', '234124', 'zxc', '$2y$10$CcMztCyMMEVucV1ZTLpfnuh7Y.q2hivV6WAOMpwkv8V4/S4TX1ZVK', '2023-07-15 09:25:05', '2023-07-15 09:25:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `kode` varchar(111) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `foto` varchar(111) DEFAULT NULL,
  `pay` varchar(111) DEFAULT NULL,
  `total` varchar(111) DEFAULT NULL,
  `status` varchar(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `kode`, `member_id`, `foto`, `pay`, `total`, `status`, `created_at`, `updated_at`) VALUES
(68, 'Ok6753', 7, NULL, 'on', '87500', 'Cancel', '2023-07-15 21:47:40', '2023-07-15 22:25:55'),
(69, 'WW1970', 7, NULL, 'on', '16000', 'Pending', '2023-07-15 23:27:24', '2023-07-15 23:27:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(11) NOT NULL,
  `nama` varchar(111) DEFAULT NULL,
  `kategori` varchar(111) DEFAULT NULL,
  `harga` varchar(111) DEFAULT NULL,
  `foto` varchar(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama`, `kategori`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'kripik labu', 'labu', '3000', '/storage/img/qMZeDUtsgSu3zxoQHFQp1TqEFzsQ24SoGZ1V3KZn.jpg', NULL, '2023-07-11 10:48:29'),
(2, 'Keripik Jagung', 'Jagung', '6000', '/storage/img/NKuR52fiItUjB1Di9Tfs8SqTLIjjsA2WWjg5RQd9.jpg', NULL, '2023-07-11 21:24:21'),
(3, 'keripik Bawang', 'Bawang', '7000', '/storage/img/mboJoKWYzktMZyQalVeVlOCHOkNPtFVS4tCYmqDU.jpg', NULL, '2023-07-11 10:45:32'),
(4, 'Rempeyek Kribon', 'Peyek', '8500', '/storage/img/l9myy2xrsQvJoxyXwo8TPlpQv3JZxKNI8cSMYo1e.jpg', NULL, '2023-07-11 10:46:06'),
(6, 'Keripik Kentang', 'Kentang', '9000', '/storage/img/6yBQ9aq2bOWRtNM77xzbgmhPVGURHwmfDu0YspSm.jpg', NULL, '2023-07-11 10:47:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'Pending'),
(2, 'Cancel'),
(3, 'Dikirim'),
(4, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(111) DEFAULT NULL,
  `email` varchar(111) DEFAULT NULL,
  `password` varchar(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'a@a.com', '$2y$10$CcMztCyMMEVucV1ZTLpfnuh7Y.q2hivV6WAOMpwkv8V4/S4TX1ZVK', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

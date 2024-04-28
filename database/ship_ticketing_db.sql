-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2024 pada 09.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ship_ticketing_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int(30) NOT NULL,
  `accommodation` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `accommodations`
--

INSERT INTO `accommodations` (`id`, `accommodation`, `description`, `date_created`) VALUES
(1, 'Penumpang I\r\n', 'Ekonomi Dewasa', '2024-04-16 23:00:16'),
(2, 'Penumpang II\r\n', 'Ekonomi Anak', '2024-04-16 23:00:47'),
(3, 'Golongan I', 'Sepeda Kayuh', '2024-04-16 23:01:13'),
(4, 'Golongan II\r\n', 'Sepeda Motor ( 500 CC) & Gerobak', '2024-04-16 23:01:34'),
(5, 'Golongan III\r\n', 'Sepeda Motor (>500 cc) & Roda 3', '2024-04-16 23:01:59'),
(6, 'Golongan IVA\r\n', 'Kendaraan Penumpang (<5 meter)\r\n', '2024-04-16 23:02:35'),
(7, 'Golongan IVB\r\n', 'Kendaraan Barang (<5 Meter)', '2024-04-16 23:02:55'),
(8, 'Golongan VA', 'Kendaraan Penumpang (<7 Meter)', '2024-04-16 23:03:22'),
(9, 'Golongan VB\r\n', 'Kendaraan Barang (<7 Meter)', '2024-04-16 23:19:55'),
(10, 'Golongan VIA\r\n', 'Kendaraan Penumpang (<10 Meter)', '2024-04-16 23:20:19'),
(11, 'Golongan VIB\r\n', 'Kendaraan Barang (<10 Meter)', '2024-04-16 23:21:11'),
(12, 'Golongan VII\r\n', 'Kendaraan (<12 Meter)', '2024-04-16 23:21:36'),
(13, 'Golongan VIII\r\n', 'Kendaraan (<16 Meter)', '2024-04-16 23:21:57'),
(14, 'Golongan IX\r\n', 'Kendaraan (>16 Meter)', '2024-04-16 23:22:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `port_list`
--

CREATE TABLE `port_list` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `gambar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `port_list`
--

INSERT INTO `port_list` (`id`, `name`, `location`, `gambar`, `date_created`) VALUES
(1, 'Bolok', 'Kupang', '', '2024-04-16 20:11:26'),
(2, 'Waibalun', 'Larantuka', '', '2024-04-16 20:11:33'),
(3, 'Pantai Baru', 'Rote', '', '2024-04-16 20:11:42'),
(4, 'Aimere', 'Aimere, Ngada', 'th.jpg', '2024-04-24 21:30:37'),
(5, 'Waingapu', 'Waingapu, Sumba Timur', '', '2024-04-16 20:11:55'),
(6, 'Sabu', 'Sabu Raijua', '', '2024-04-16 20:12:06'),
(7, 'Kalabahi', 'Alor', '', '2024-04-16 20:12:14'),
(8, 'Lewoleba', 'Lembata', '', '2024-04-16 20:12:21'),
(9, 'Tobilota', 'Adonara', '', '2024-04-16 20:12:30'),
(10, 'Hansisi', 'Semau', '', '2024-04-16 20:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `price`
--

CREATE TABLE `price` (
  `id` int(30) NOT NULL,
  `id_lokasi_awal` int(30) NOT NULL,
  `id_lokasi_tujuan` int(30) NOT NULL,
  `accommodation_id` int(30) NOT NULL,
  `price` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `price`
--

INSERT INTO `price` (`id`, `id_lokasi_awal`, `id_lokasi_tujuan`, `accommodation_id`, `price`, `date_created`) VALUES
(1, 1, 3, 1, 150000, '2024-03-26 02:13:41'),
(2, 1, 6, 2, 15000, '2024-03-26 02:14:09'),
(3, 1, 3, 3, 0, '2024-03-26 02:14:30'),
(4, 1, 3, 4, 0, '2024-03-26 02:16:47'),
(5, 1, 3, 5, 0, '2024-03-26 02:17:22'),
(6, 1, 3, 6, 0, '2024-03-26 02:18:27'),
(7, 1, 3, 7, 0, '2024-03-26 02:19:30'),
(8, 1, 3, 8, 0, '2024-03-26 02:20:26'),
(9, 1, 3, 9, 0, '2024-03-26 02:23:20'),
(10, 1, 3, 10, 0, '2024-03-26 02:24:39'),
(11, 1, 3, 11, 0, '2024-03-26 02:25:03'),
(12, 1, 3, 12, 0, '2024-03-26 02:26:27'),
(13, 1, 3, 13, 0, '2024-03-26 02:27:14'),
(14, 1, 3, 14, 0, '2024-03-26 02:28:38'),
(15, 1, 10, 3, 17500, '2024-04-17 00:55:47'),
(30, 1, 6, 1, 25000, '2024-04-27 21:07:20'),
(31, 1, 3, 2, 15000, '2024-04-27 22:03:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `port_from_id` int(30) NOT NULL,
  `port_to_id` int(30) NOT NULL,
  `ship_id` int(30) NOT NULL,
  `departure_datetime` datetime DEFAULT NULL,
  `arrival_datetime` datetime DEFAULT NULL,
  `schedule_status` enum('scheduled','on time','delayed','cancelled','Boarding','gate closed','departed','sailing','arrived','finished') NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `port_from_id`, `port_to_id`, `ship_id`, `departure_datetime`, `arrival_datetime`, `schedule_status`, `date_created`, `date_updated`) VALUES
(60, 1, 10, 2, '2024-04-18 13:06:00', '2024-04-18 14:06:00', '', '2024-04-17 13:06:39', '2024-04-17 17:26:18'),
(61, 1, 7, 2, '2024-04-19 16:08:00', '2024-04-19 17:08:00', '', '2024-04-18 16:08:55', '2024-04-24 00:05:27'),
(62, 1, 4, 2, '2024-04-25 00:05:00', '2024-04-25 01:05:00', '', '2024-04-24 00:05:49', NULL),
(63, 1, 7, 4, '2024-04-27 09:01:00', '2024-04-27 10:01:00', 'finished', '2024-04-25 08:02:07', '2024-04-28 00:28:28'),
(64, 1, 10, 1, '2024-04-29 08:04:00', '2024-04-29 09:04:00', 'scheduled', '2024-04-25 08:05:12', '2024-04-28 00:24:33'),
(65, 10, 1, 4, '2024-04-26 08:09:00', '2024-04-26 11:09:00', 'finished', '2024-04-25 08:09:37', '2024-04-27 13:28:15'),
(66, 1, 10, 4, '2024-04-27 06:50:00', '2024-04-27 07:50:00', 'finished', '2024-04-27 12:50:41', '2024-04-27 14:00:33'),
(67, 1, 10, 3, '2024-04-28 13:27:00', '2024-04-28 14:27:00', 'scheduled', '2024-04-27 13:27:49', '2024-04-28 11:48:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ship_list`
--

CREATE TABLE `ship_list` (
  `id` int(30) NOT NULL,
  `id_code` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `gambar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ship_list`
--

INSERT INTO `ship_list` (`id`, `id_code`, `name`, `description`, `status`, `gambar`, `date_created`) VALUES
(1, '65500', 'KMP. Uma Kalada', 'Feri', 1, '', '2021-08-28 10:22:54'),
(2, '65499', 'KMP. Cakalang II', 'Feri', 0, 'amoeba.jpg', '2021-08-28 10:23:34'),
(3, '65501', 'KMP. Ile Labalekan', 'Feri', 1, '', '2024-03-26 02:44:28'),
(4, '65502', 'KMP. Inerie II', 'Feri', 1, '', '2024-03-26 02:46:00'),
(5, '65503', 'KMP. Lakaan', 'Feri', 1, '', '2024-03-26 02:46:36'),
(6, '65504', 'KMP. Ranaka', 'Feri', 1, '', '2024-03-26 02:46:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Sistem Penjadwalan Kapal'),
(2, 'short_name', 'SPKL - ASDP'),
(3, 'logo', 'images.png'),
(4, 'cover', 'images.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` enum('admin','staff') NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `NIK`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, '1234567890123456', 'Videl', 'Ngefak', 'admin', '$2y$10$.pdGQJuD3IxFU3L3j2pxKuistXUgItS2S/1n2Wv9Lrs.X8bMHrjPG', 'download (4).jfif', NULL, 'admin', '2024-04-22 16:37:08', '2024-04-22 16:37:36'),
(2, '1234567890123456', 'Windah', 'Basudara', 'sasa', '$2y$10$.7YJFe/u.f2CUYGkH7k50uF/nM3c9qo2cgeL2sprX/A0EupNQh6sW', 'th.jpg', NULL, 'admin', '2024-04-18 19:32:23', '2024-04-24 21:03:38'),
(3, '1234567890123456', 'ravel', 'ranen', 'laka', '$2y$10$i3ahNR5GeQDp/9b6OKbpLOhwMCM4hga.MtDcoZmZ6KvDoU0eF9j4y', 'th.jpg', NULL, 'admin', '2024-04-22 16:30:01', '2024-04-22 16:34:58'),
(4, '1234567890123456', 'asem', 'lana', 'sasa', '$2y$10$YbVnYE1rtRNlg1byfyDEYunA459GM8sI9hbcVnE6uzr/ByZqbr8NO', 'download (7).jfif', NULL, 'admin', '2024-04-21 00:48:31', '2024-04-22 16:35:22'),
(5, '1234567890123456', 'rasyah', 'rizky', 'aisyah', '$2y$10$kkeYXlCP9pNYpWAlkdArzOfffNfApgipbgZqVwnlV/HFOvKZNS.9S', 'download (4).jfif', NULL, 'staff', '2024-04-22 16:45:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `port_list`
--
ALTER TABLE `port_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi_awal` (`id_lokasi_awal`),
  ADD KEY `id_lokasi_tujuan` (`id_lokasi_tujuan`),
  ADD KEY `accommodation_id` (`accommodation_id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ship_list`
--
ALTER TABLE `ship_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT untuk tabel `port_list`
--
ALTER TABLE `port_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `price`
--
ALTER TABLE `price`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `ship_list`
--
ALTER TABLE `ship_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_lokasi_awal`) REFERENCES `port_list` (`id`),
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`id_lokasi_tujuan`) REFERENCES `port_list` (`id`),
  ADD CONSTRAINT `price_ibfk_3` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

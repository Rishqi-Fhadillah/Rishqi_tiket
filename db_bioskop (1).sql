-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 01:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'iki@gmail.com', 'iki', '$2y$10$2xIUlxT2HegMgdmIXjaIze8QTzUbPukHxBa0OawGxdeuCNzNRckxa', '2025-02-14 03:33:08'),
(2, 'azrilyusup24@gmail.com', 'azril', '$2y$10$EXjiJaCby.FuOdIWA9f8n.Odqi8D/SqPa9mcDzhlyl9mvi8KAKCSS', '2025-02-14 04:27:40'),
(4, 'eghanvidia@gmail.com', 'SUMANTO', '$2y$10$l2MNMMp9sFGiH3UIz7bY5e/zWzUXWbjUWt4u1P6iz7jVBs6TiFmYW', '2025-02-14 06:15:18'),
(5, 'nurrishqi@gmail.com', 'Rishqi Fhadillah', '$2y$10$KzIlf6HkjDV5UYbYjZaDo.FEwFYIiHwPd0hU9cl4IpBBckdeyHmNa', '2025-02-14 06:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `akun_mall`
--

CREATE TABLE `akun_mall` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_mall` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_mall`
--

INSERT INTO `akun_mall` (`id`, `email`, `password`, `nama_mall`, `nik`) VALUES
(1, 'nurrishqi@gmail.com', '$2y$10$4IY4zTwLeH0V6DzsTmfX4umbzOsWD8aWLImRrd4huVGBYjPobP3gC', 'Plaza Cibubur', '1213'),
(2, 'ibadillahwildan@gmail.com', '$2y$10$IRj3CdsqGjkdxxDVm8L7le0dLDkRZQxbPIuIYwXjNmH4TJlxf0SNu', 'Cibinong City Mall', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `judul` longtext NOT NULL,
  `total_menit` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `dimensi` varchar(255) NOT NULL,
  `Producer` varchar(255) NOT NULL,
  `Director` varchar(255) NOT NULL,
  `Writer` varchar(255) NOT NULL,
  `Cast` varchar(255) NOT NULL,
  `Distributor` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `poster`, `banner`, `trailer`, `nama_film`, `judul`, `total_menit`, `usia`, `genre`, `dimensi`, `Producer`, `Director`, `Writer`, `Cast`, `Distributor`, `harga`) VALUES
(1, 'uploads/poster/vxcxhchro7gc1.jpeg', 'uploads/banner/sonic-the-hedgehog-3-movie-vn-1280x720.jpg', 'uploads/trailer/videoplayback.mp4', 'Sonic the Hedgehog 3', 'Sonic the Hedgehog 3 is a 2024 action-adventure comedy film based on the Sonic the Hedgehog video game series. The third in the Sonic film series, it was directed by Jeff Fowler and written by Pat Casey, Josh Miller, and John Whittington. Jim Carrey, Ben Schwartz, Colleen O\'Shaughnessey, James Marsden, Tika Sumpter, and Idris Elba reprise their roles, with Keanu Reeves joining the cast. In the film, Sonic, Tails and Knuckles face Shadow the Hedgehog, who allies with the mad scientists Ivo and Gerald Robotnik in pursuit of revenge against humanity.', '110', 'SU', 'Action,Adventure', '2D', 'Neal H. Moritz', 'Jeff Fowler', 'bayu', 'bayu', 'lslkms', '20000'),
(2, 'uploads/poster/Spider-Man-_Across_the_Spider-Verse_poster.jpg', 'uploads/banner/kAm52UYrs6ak9BP7ZXJokdQlTgM.jpg', 'uploads/trailer/videoplayback (1).mp4', 'Spider-Man: Across the Spider-Verse', 'Spider-Man: Across the Spider-Verse is a 2023 American animated superhero film featuring the Marvel Comics character Miles Morales / Spider-Man, produced by Columbia Pictures and Sony Pictures Animation in association with Marvel Entertainment, and distributed by Sony Pictures Releasing', '120', '13', 'Action,Adventure,Animation', '2D', 'ewer', 'wer', 'fgdf', 'bxf', 'gerge', '30000'),
(3, 'uploads/poster/vxcxhchro7gc1.jpeg', 'uploads/banner/sword-art-online-3840x2160-10492.jpg', 'uploads/trailer/videoplayback.mp4', 'cinema', 'jhwdhjqwdgqwhdg', '120', '13', 'Drama,Adventure', '2D', 'nana', 'nana', 'nana', 'nana', 'nana', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_film`
--

CREATE TABLE `jadwal_film` (
  `id` int(11) NOT NULL,
  `mall_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `studio` varchar(255) NOT NULL,
  `jam_tayang_1` time NOT NULL,
  `jam_tayang_2` time NOT NULL,
  `jam_tayang_3` time NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `tanggal_akhir_tayang` date NOT NULL,
  `total_menit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_film`
--

INSERT INTO `jadwal_film` (`id`, `mall_id`, `film_id`, `studio`, `jam_tayang_1`, `jam_tayang_2`, `jam_tayang_3`, `tanggal_tayang`, `tanggal_akhir_tayang`, `total_menit`) VALUES
(2, 1, 1, 'Studio 1', '15:55:00', '18:55:00', '20:00:00', '2025-02-18', '2025-02-19', '110'),
(3, 1, 2, 'Studio 1', '17:57:00', '19:57:00', '20:57:00', '2025-02-16', '2025-02-17', '120'),
(4, 1, 1, 'Studio 1', '09:31:00', '12:31:00', '15:31:00', '2025-02-21', '2025-02-28', '110'),
(5, 1, 3, 'Studio 1', '10:39:00', '13:39:00', '15:39:00', '2025-02-21', '2025-02-28', '120'),
(6, 1, 2, 'Studio 1', '10:39:00', '14:39:00', '15:39:00', '2025-02-21', '2025-02-28', '120'),
(7, 2, 2, 'Studio 1', '13:51:00', '16:52:00', '17:52:00', '2025-02-25', '2025-02-28', '120');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `mall_name` varchar(255) NOT NULL,
  `seat_number` varchar(255) NOT NULL,
  `status` enum('available','occupled') NOT NULL,
  `film_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `mall_name`, `seat_number`, `status`, `film_name`) VALUES
(43, 'Plaza Cibubur', 'G8', '', 'Sonic the Hedgehog 3'),
(44, 'Plaza Cibubur', 'G9', '', 'Sonic the Hedgehog 3'),
(45, 'Plaza Cibubur', 'G10', '', 'Sonic the Hedgehog 3'),
(46, 'Plaza Cibubur', 'E8', '', 'Spider-Man: Across the Spider-Verse'),
(47, 'Plaza Cibubur', 'E9', '', 'Spider-Man: Across the Spider-Verse'),
(48, 'Plaza Cibubur', 'E10', '', 'Spider-Man: Across the Spider-Verse'),
(49, 'Plaza Cibubur', 'D8', '', 'Sonic the Hedgehog 3'),
(50, 'Plaza Cibubur', 'D9', '', 'Sonic the Hedgehog 3'),
(51, 'Plaza Cibubur', 'D10', '', 'Sonic the Hedgehog 3'),
(52, 'Plaza Cibubur', 'A8', '', 'Sonic the Hedgehog 3'),
(53, 'Plaza Cibubur', 'A9', '', 'Sonic the Hedgehog 3'),
(54, 'Plaza Cibubur', 'A10', '', 'Sonic the Hedgehog 3'),
(55, 'Plaza Cibubur', 'C1', '', 'Sonic the Hedgehog 3'),
(56, 'Plaza Cibubur', 'C2', '', 'Sonic the Hedgehog 3'),
(57, 'Plaza Cibubur', 'C3', '', 'Sonic the Hedgehog 3'),
(58, 'Plaza Cibubur', 'A1', '', 'Sonic the Hedgehog 3'),
(59, 'Plaza Cibubur', 'A2', '', 'Sonic the Hedgehog 3'),
(60, 'Plaza Cibubur', 'A4', '', 'Sonic the Hedgehog 3'),
(61, 'Plaza Cibubur', 'A5', '', 'Sonic the Hedgehog 3'),
(62, 'Plaza Cibubur', 'A6', '', 'Sonic the Hedgehog 3'),
(63, 'Plaza Cibubur', 'A7', '', 'Sonic the Hedgehog 3'),
(64, 'Plaza Cibubur', 'B4', '', 'Sonic the Hedgehog 3'),
(65, 'Plaza Cibubur', 'B5', '', 'Sonic the Hedgehog 3'),
(66, 'Plaza Cibubur', 'C9', '', 'Sonic the Hedgehog 3'),
(67, 'Plaza Cibubur', 'D6', '', 'Sonic the Hedgehog 3'),
(68, 'Plaza Cibubur', 'D7', '', 'Sonic the Hedgehog 3'),
(69, 'Plaza Cibubur', 'A6', '', 'Spider-Man: Across the Spider-Verse'),
(70, 'Plaza Cibubur', 'A7', '', 'Spider-Man: Across the Spider-Verse');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `seat_number` varchar(255) NOT NULL,
  `nama_film` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `status`, `payment_type`, `amount`, `transaction_time`, `username`, `seat_number`, `nama_film`) VALUES
(1, 'TIX-1740189357', 'settlement', 'qris', 60000, '2025-02-22 08:56:05', 'nurrishqi@gmail.com', 'D8,D9,D10', 'Sonic the Hedgehog 3'),
(2, 'TIX-1740189514', 'settlement', 'qris', 60000, '2025-02-22 08:58:36', 'nurrishqi@gmail.com', 'A8,A9,A10', 'Sonic the Hedgehog 3'),
(3, 'TIX-1740189624', 'settlement', 'qris', 60000, '2025-02-22 09:00:25', 'nurrishqi@gmail.com', 'C1,C2,C3', 'Sonic the Hedgehog 3'),
(4, 'TIX-1740190389', 'settlement', 'qris', 40000, '2025-02-22 09:13:12', 'nurrishqi@gmail.com', 'A1,A2', 'Sonic the Hedgehog 3'),
(5, 'TIX-1740190437', 'settlement', 'qris', 40000, '2025-02-22 09:14:05', 'nurrishqi@gmail.com', 'A4,A5', 'Sonic the Hedgehog 3'),
(6, 'TIX-1740190675', 'settlement', 'qris', 40000, '2025-02-22 09:17:58', 'nurrishqi@gmail.com', 'A6,A7', 'Sonic the Hedgehog 3'),
(7, 'TIX-1740190810', 'settlement', 'qris', 40000, '2025-02-22 09:20:12', 'nurrishqi@gmail.com', 'B4,B5', 'Sonic the Hedgehog 3'),
(8, 'TIX-1740396000', 'settlement', 'qris', 40000, '2025-02-24 18:20:02', 'nurrishqi@gmail.com', 'D6,D7', 'Sonic the Hedgehog 3'),
(9, 'TIX-1740396133', 'settlement', 'qris', 60000, '2025-02-24 18:22:14', 'nurrishqi@gmail.com', 'A6,A7', 'Spider-Man: Across the Spider-Verse');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(2, 'nurrishqi@gmail.com', 'Rishqi', '$2y$10$2xIUlxT2HegMgdmIXjaIze8QTzUbPukHxBa0OawGxdeuCNzNRckxa', '2025-02-12 05:58:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_mall`
--
ALTER TABLE `akun_mall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `akun_mall`
--
ALTER TABLE `akun_mall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

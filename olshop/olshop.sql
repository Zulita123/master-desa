-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2018 at 10:15 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`users_id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$FJR2WLtTtlB329Wl72eoieqlwLBmP2MSptrOG2uB0YxSB/NzH302y', 'feKZZJFjBD8XHsyyK6Gwp4hf8hHisKaF7ZCUJCzNT5nBw2TBQmLsepLW3Hnc');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama`, `keterangan`, `kategori_id`, `harga`, `stock`, `status_id`) VALUES
(21, 'Celana Sirwal Jogger', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 3, 85000, 20, 1),
(22, 'Celana Cino Cream', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 3, 55000, 12, 1),
(23, 'celana cino hitam', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 3, 56000, 0, 1),
(24, 'Celana cino coklat', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 3, 45000, 123, 2),
(25, 'gamis wanita', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 4, 123000, 20, 1),
(26, 'gamis wanita biru', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 4, 34000, 12, 1),
(27, 'gamis wanita navy', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 4, 234000, 0, 1),
(28, 'hijab merah', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 5, 23000, 12, 1),
(29, 'hijab abu abu', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 5, 33000, 3, 1),
(30, 'hijab coklat susu', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 5, 45000, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `base64`
--

CREATE TABLE `base64` (
  `base64_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base64`
--

INSERT INTO `base64` (`base64_id`, `barang_id`, `nama`) VALUES
(1, 20, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL29wcG8uanBlZw=='),
(2, 21, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL3NpcndhbGpvZ2dlci5qcGVn'),
(3, 22, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgyKS5qcGVn'),
(4, 23, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkLmpwZWc='),
(5, 24, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2NlbGFuYV9wcmlhX1RSS18xOF83Ny5qcGc='),
(6, 25, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI5MDk2MTM0XzE0MjgxNjkxODA2MjcwODJfMzk4NzIwMjM2NDkwOTAyNzMyOF9uLmpwZw=='),
(7, 26, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgxKS5qcGVn'),
(8, 27, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgzKS5qcGVn'),
(9, 28, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI4NzYyOTk2XzE1ODM5OTQ0NjgzMDIzODBfMTY0Njg5MDQwMDYwMzk2MzM5Ml9uLmpwZw=='),
(10, 29, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzE3NTk2MTE2Xzk5Mjk1NDgxNDE3NTE3M183MzcxMjA1Nzg3NDYyNDAyMDQ4X24uanBn'),
(11, 30, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI5MDkzNTY3XzU2NzMwNDA1Njk3Njk2M184ODg1NDgwODQzNjQ1MDI2MzA0X24uanBn');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama`) VALUES
(3, 'Celana Pria'),
(4, 'gamis wanita'),
(5, 'hijab');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`konfirmasi_id`, `users_id`, `pesanan_id`, `photo`) VALUES
(1, 1, 2, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbmZiLmpwZw=='),
(2, 1, 2, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlLzI5NDE2ODY2XzIwNDI0MTg4NTYwNzk5MjlfODEzMTQ1NjQ3NTM1MzU3OTUyMF9uLmpwZw=='),
(3, 1, 3, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbjIuanBlZw=='),
(4, 1, 1, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkLmpwZWc='),
(5, 1, 4, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbmZiMi5qcGVn');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `status_invoice_id` int(11) NOT NULL DEFAULT '1',
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `users_id`, `nama_penerima`, `alamat`, `total_bayar`, `status_invoice_id`, `tanggal`) VALUES
(1, 1, 'Fadly', 'kp. pedurenan bekasi', '85000.00', 3, NULL),
(2, 1, 'Pida', 'Kp. Sawah Bekasi', '170000.00', 3, NULL),
(3, 1, 'sdfsdf', 'sdfjdkgdfgfdgdfgfd', '79000.00', 4, NULL),
(4, 1, 'Shafa', 'Kp. Sawah', '45000.00', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `pesanan_barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`pesanan_barang_id`, `pesanan_id`, `barang_id`, `qty`, `subtotal`) VALUES
(1, 1, 21, 1, '85000.00'),
(2, 2, 21, 2, '170000.00'),
(3, 3, 23, 1, '56000.00'),
(4, 3, 28, 1, '23000.00'),
(5, 4, 30, 1, '45000.00');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `barang_id`, `nama`) VALUES
(1, 13, 'sirwaljogger.jpeg'),
(2, 14, 'sirwaljogger.jpeg'),
(3, 15, 'levis.jpeg'),
(4, 16, 'jogger.jpeg'),
(5, 17, 'levis-wanita.jpeg'),
(6, 18, 'levis.jpeg'),
(8, 20, 'oppo.jpeg'),
(9, 21, 'sirwaljogger.jpeg'),
(10, 22, 'download (2).jpeg'),
(11, 23, 'download.jpeg'),
(12, 24, 'celana_pria_TRK_18_77.jpg'),
(13, 25, '29096134_1428169180627082_3987202364909027328_n.jpg'),
(14, 26, 'download (1).jpeg'),
(15, 27, 'download (3).jpeg'),
(16, 28, '28762996_1583994468302380_1646890400603963392_n.jpg'),
(17, 29, '17596116_992954814175173_7371205787462402048_n.jpg'),
(18, 30, '29093567_567304056976963_8885480843645026304_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `nama`) VALUES
(1, 'Ditampilkan'),
(2, 'Disembunyikan');

-- --------------------------------------------------------

--
-- Table structure for table `status_invoice`
--

CREATE TABLE `status_invoice` (
  `status_invoice_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_invoice`
--

INSERT INTO `status_invoice` (`status_invoice_id`, `nama`) VALUES
(1, 'Belum Dibayar'),
(2, 'Menunggu Verifikasi'),
(3, 'Dibayar'),
(4, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'Fadly', 'fadly@fadly.com', '$2y$10$FJR2WLtTtlB329Wl72eoieqlwLBmP2MSptrOG2uB0YxSB/NzH302y', 'iszUzXZNWaRLUKNdHU8448ABbSLnAeWxpLHvF15Vodsb1UQEf08h2QsR7egz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `base64`
--
ALTER TABLE `base64`
  ADD PRIMARY KEY (`base64_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD PRIMARY KEY (`pesanan_barang_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_invoice`
--
ALTER TABLE `status_invoice`
  ADD PRIMARY KEY (`status_invoice_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `base64`
--
ALTER TABLE `base64`
  MODIFY `base64_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  MODIFY `pesanan_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_invoice`
--
ALTER TABLE `status_invoice`
  MODIFY `status_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

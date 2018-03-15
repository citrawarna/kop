-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mar 2018 pada 03.51
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `nama_angsuran` varchar(20) NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `nama_angsuran`, `bulan`) VALUES
(1, 'Pendek', 12),
(2, 'Menengah', 24),
(3, 'Panjang', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_angsuran`
--

CREATE TABLE `detail_angsuran` (
  `id_da` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_angsur` date NOT NULL,
  `jumlah_angsur` int(11) NOT NULL,
  `sisa_pinjaman` int(11) NOT NULL,
  `keterangan_angsuran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_angsuran`
--

INSERT INTO `detail_angsuran` (`id_da`, `id_peminjaman`, `tanggal_angsur`, `jumlah_angsur`, `sisa_pinjaman`, `keterangan_angsuran`) VALUES
(2, 1, '2018-03-15', 500, 9999500, ''),
(14, 6, '2018-03-15', 5, 5, 'Bayar'),
(17, 6, '2018-03-15', 2, 3, 'Bayar'),
(19, 6, '2018-03-15', 3, 0, 'Lunas'),
(20, 1, '2018-03-15', 500, 9999000, 'Bayar'),
(21, 1, '2018-03-15', 9999000, 0, 'Lunas'),
(22, 7, '2018-03-15', 50, 50, 'Bayar'),
(23, 7, '2018-03-15', 50, 0, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `ktp` int(11) NOT NULL,
  `nama_nasabah` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `ktp`, `nama_nasabah`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status`) VALUES
(1, 51756876, 'Refo Junior', 'Denpasar', '1998-06-09', 'Laki - Laki', 'Andakasa', '1'),
(3, 5175765, 'Ruby Da Cherry', 'New Orleans', '2017-05-05', 'Laki - Laki', 'Ruby was a motherfucking reject', '1'),
(4, 11232155, 'Scrim', 'New Orleans', '2017-05-05', 'Laki - Laki', 'Rapper', '0'),
(5, 1123212, 'Mafumafu', 'Japan', '2017-05-05', 'Laki - Laki', 'Toko Cat Citra Warna', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `id_angsuran` int(11) NOT NULL,
  `nama_peminjaman` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lunas` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_nasabah`, `id_angsuran`, `nama_peminjaman`, `jumlah`, `hutang`, `tanggal`, `keterangan`, `lunas`) VALUES
(1, 2, 1, 1, 'Kredit Motor', 10000000, 0, '2018-03-14', 'Kredit Dulu bos', 'y'),
(6, 1, 3, 2, 'Test', 10, 0, '2018-03-14', 'Test', 'y'),
(7, 1, 5, 1, 'Utang Dagang', 100, 0, '2018-03-15', 'Untuk investasi', 'y'),
(8, 1, 4, 1, 'kasbon', 500, 500, '2018-03-15', 'Untuk ngutang', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `email`, `level`) VALUES
(1, 'refo', '9009337cf16333f07109b593405cf7552ed8059a', 'Refo', '', '0000-00-00', '', '', '', ''),
(2, 'yui', 'c5c3d3536d8b96333528862801c22e0d0ba2c563', 'YUI Yoshioka', 'Fukuoka', '1998-09-06', 'Perempuan', 'Jl. Teuku Umar Barat No. 343 (Toko Cat Citra Warna)', 'yui@gmail.com', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD PRIMARY KEY (`id_da`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_angsuran` (`id_angsuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD CONSTRAINT `detail_angsuran_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_angsuran`) REFERENCES `angsuran` (`id_angsuran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

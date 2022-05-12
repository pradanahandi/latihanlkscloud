-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Des 2020 pada 19.34
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental-mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konfirmasi`
--

CREATE TABLE `t_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ket` char(2) NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_konfirmasi`
--

INSERT INTO `t_konfirmasi` (`id_konfirmasi`, `id_transaksi`, `id_user`, `gambar`, `ket`, `tgl_konfirmasi`) VALUES
(1, 1, 2, '4a05bcfb05231fc4ffd47d428a87ac25b710400b.png', '1', '2020-12-24 09:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_lacak`
--

CREATE TABLE `t_lacak` (
  `id_lacak` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `x` varchar(50) NOT NULL,
  `y` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_lacak`
--

INSERT INTO `t_lacak` (`id_lacak`, `id_mobil`, `x`, `y`, `tanggal`) VALUES
(1, 1, '-6.50962268058314', '106.86087542596557', '2020-12-29 01:07:20'),
(2, 2, '-6.507809582257444', '106.85774888640246', '2020-12-29 01:07:27'),
(3, 3, '-6.512076748563778', '106.85893589274971', '2020-12-29 01:28:42'),
(4, 4, '-6.512380984177646', '106.86125799560541', '2020-12-29 01:28:55'),
(5, 5, '-6.5114302472720285', '106.86411596835086', '2020-12-29 01:29:30'),
(6, 6, '-6.510276684075405', '106.8653280550063', '2020-12-29 01:29:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mobil`
--

CREATE TABLE `t_mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_mobil` char(10) NOT NULL,
  `merk_mobil` varchar(20) NOT NULL,
  `nama_mobil` varchar(20) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `status_mobil` char(2) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_mobil`
--

INSERT INTO `t_mobil` (`id_mobil`, `no_mobil`, `merk_mobil`, `nama_mobil`, `harga_sewa`, `status_mobil`, `gambar`) VALUES
(1, 'B 4321 BA', 'Daihatsu', 'Xenia', 150000, '0', 'cba8af79de1255a645976afa50028171ba22fbd6.jpeg'),
(2, 'F 1234 AB', 'Toyota', 'Avanza', 155000, '0', 'cedf1bdc77c06c1f40844939fb78303630a02493.jpeg'),
(3, 'F 1122 AA', 'Daihatsu', 'Luxio', 125000, '0', '5be8a381f1502a10a2efe063c82321f0773bc978.jpeg'),
(4, 'B 2233 BB', 'Daihatsu', 'Terios', 135000, '0', '5442669b1c3750a5687d924a2bb9085fe1eff763.jpeg'),
(5, 'B 3344 CC', 'Suzuki', 'APV', 125000, '0', 'd419bae87261ce6e79ef4abf0bf06cc342ae9c24.jpeg'),
(6, 'F 4455 DD', 'Toyota', 'Innova', 160000, '0', '3f9db6c487382fda0fdea32cd0bf82994ebbaf40.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `lama` int(2) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_harga` int(10) NOT NULL,
  `tgl_sewa` datetime NOT NULL,
  `status_sewa` char(2) NOT NULL,
  `status_bayar` char(2) NOT NULL,
  `ket` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_user`, `id_mobil`, `lama`, `tgl_ambil`, `tgl_kembali`, `total_harga`, `tgl_sewa`, `status_sewa`, `status_bayar`, `ket`) VALUES
(1, 2, 1, 3, '2020-12-23', '2020-12-26', 450000, '2020-12-23 00:24:31', '2', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nik_ktp` char(20) NOT NULL,
  `no_sim` char(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nik_ktp`, `no_sim`, `nama_user`, `email_user`, `no_hp`, `alamat`, `password`, `level_user`, `akses`) VALUES
(1, '1111111111111111', '111111111111', 'Administration', 'admin@email.com', '081212345678', 'Bogor', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'on'),
(2, '3201032801960004', '112233445566', 'Bimo M Ramdhan', 'bimomuhamadr@gmail.com', '089640539221', 'Kabupaten Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'on'),
(3, '3201032801960005', '223344556677', 'Novinda Nuruliyah', 'vindanurull@gmail.com', '089640539221', 'Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'off'),
(5, '3201032801960006', '334455667788', 'Dida Zulul', 'didazulul@gmail.com', '089640539221', 'Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'off'),
(6, '3201032801960007', '445566778899', 'Triyoga Ginanjar', 'triyogaginanjar@gmail.com', '089640539221', 'Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'off'),
(8, '3201032801960008', '556677889911', 'M. Fadli', 'm.fadli@gmail.com', '089640539221', 'Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'off'),
(11, '3201032801960009', '667788991122', 'Pahmi', 'pahmi@gmail.com', '089640539221', 'Bogor', '7488e331b8b64e5794da3fa4eb10ad5d', 'customer', 'off');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_konfirmasi`
--
ALTER TABLE `t_konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `t_lacak`
--
ALTER TABLE `t_lacak`
  ADD PRIMARY KEY (`id_lacak`);

--
-- Indexes for table `t_mobil`
--
ALTER TABLE `t_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_konfirmasi`
--
ALTER TABLE `t_konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_lacak`
--
ALTER TABLE `t_lacak`
  MODIFY `id_lacak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_mobil`
--
ALTER TABLE `t_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

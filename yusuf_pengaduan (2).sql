-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2023 pada 09.05
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yusuf_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Lingkungan Hidup'),
(2, 'Perhubungan'),
(3, 'Kesehatan'),
(4, 'Pelanggaran Peraturan Daerah'),
(5, 'Perizinan'),
(6, 'Sosial'),
(7, 'Perpajakan'),
(8, 'Komunikasi dan Informatika'),
(9, 'Kepegawaian'),
(10, 'Prasarana Umum'),
(12, 'Pelayanan Kecamatan Kelurahan'),
(13, 'Pendidikan'),
(14, 'Sarana umum	');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `is_active` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `active` enum('active','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `no_telp`, `is_active`, `level`, `active`) VALUES
(1, '5735467345634574', 'Yusuf Daffa Putra P', 'dvaysf', '$2y$10$nuptrYdani5Ix1AAhHlgO.AmwriFHF8mi7D/tnLu.oZOLP2eeH9nO', '08782355773', 1, 3, 'active'),
(2, '123123', 'Ridho', 'aceng', '$2y$10$okqjNprKSrF8UIRbcuKTUODvU4ZZQDLA5SLvTZI1bSwsw0IbD0zPK', '08773456334', 1, 3, 'active'),
(3, '3458234234', 'raihan', 'raihansanuya', '$2y$10$0yytaihdy5HEfd3X.QVfF.PnbK7GdedGL5vs7r1OsxpZFfnvcyGNu', '08129292132', 1, 3, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('segera','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_kategori`, `id_subkategori`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, 1, 0, '2023-03-14', '123123', 'asd', '', 'segera'),
(2, 0, 0, '2023-03-14', '123123', 'as', '', 'segera'),
(3, 1, 0, '2023-03-14', '123123', 'asd', '', 'segera'),
(4, 1, 0, '2023-03-14', '123123', 'sda', '', 'segera'),
(5, 2, 0, '2023-03-14', '123123', 'as', '', 'segera'),
(6, 1, 9, '2023-03-14', '123123', 'www', '', 'segera'),
(7, 1, 9, '2023-03-14', '123123', 'wqwqw', '', 'segera'),
(8, 1, 9, '2023-03-14', '123123', 'asas', '4fcd3fc846ef2d265ea28aa902cafbf7.jpg', 'segera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `nama` varchar(35) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` int(1) NOT NULL,
  `status` enum('admin','petugas') NOT NULL,
  `is_active` int(11) NOT NULL,
  `active` enum('active','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`nama`, `id_petugas`, `username`, `password`, `no_telp`, `level`, `status`, `is_active`, `active`) VALUES
('Putra oi', 1, 'Putra', '$2y$10$mb0YZVM1G6yGfJ69t9I0iugGPsklqc4mv.qL6gUVZFADEODdmnzwq', '08773456334', 0, 'petugas', 1, 'active'),
('Yusuf Daffa Putra P', 2, 'Daffa', '$2y$10$7gtOkavlsH.4u6oMGMgpKufkUMSGt1CDiU3XEoLWzWGWCsl2gO7Sa', '08782355773', 1, 'admin', 1, 'active'),
('wisang', 4, 'kadal', '$2y$10$cWm966v2NzT5oCJPL7jPIeahVPQGYfY97zXxCJVDz0H223r6U4PJq', '45773622664', 0, 'petugas', 1, 'suspended');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `subkategori_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`subkategori_id`, `id_kategori`, `sub_kategori`) VALUES
(9, 1, 'yuyu'),
(10, 2, 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`subkategori_id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

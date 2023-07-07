-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2023 pada 15.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukutamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttamu`
--

CREATE TABLE `ttamu` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nope` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttamu`
--

INSERT INTO `ttamu` (`id`, `tanggal`, `nama`, `alamat`, `tujuan`, `nope`) VALUES
(1, '2023-04-01', 'Riski', 'Desa Pagojengan', 'Memperbaiki Kartu Keluarga', '082313052453'),
(2, '2023-04-09', 'Ridho', 'Kretek', 'Membuat KTP', '082314121356'),
(7, '2023-06-11', 'Alvian Mubarok', 'Desa Wanatirta', 'Membuat Surat Pengantar Kehilangan KTP', '081318975071'),
(8, '2023-06-01', 'Aniq Khanafilah', 'Ds Pagojengan', 'Membuat Surat Keterangan Pindah ', '081336984337'),
(9, '2023-06-11', 'Ahmad Arifin', 'warga mulya 2', 'Mengurus Surat Izin Survei Sosial Ekonomi Politik', '087832560042'),
(10, '2023-06-11', 'Ridho Maulana', 'Ds. Pandansari', 'Mengurus Surak Kehilangan KTP', '082348721092'),
(11, '2023-06-08', 'Sofiyana Andriani', 'Desa Pakujati', 'Mengurus KK Baru', '081345679068'),
(12, '2023-06-12', 'Ahror Andhara ', 'Bantarkawung, Desa Bangbayang', 'Mengurus Surat Pindah', '082354678890'),
(13, '2023-06-12', 'Ridho Maulana', 'Desa Pagojengan', 'Membuat Surat Pengantar Kehilangan KTP', '082313049201'),
(14, '2023-06-12', 'Irfan syafii', 'Desa Pandansari', 'meminta surat izin Penggunaan Gedung Serbaguna', '082354678890'),
(15, '2023-06-15', 'adam', 'pagojengan', 'membuat surat pengantar legalisir', '098765432343444'),
(20, '2023-07-07', 'Aldo', 'Pagojengan', 'MEMBUAT KTP', '085646347890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`id_user`, `username`, `password`, `nama_pengguna`, `status`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'administrator', 'Aktif', 'admin'),
(32, 'ridho', '6ad14ba9986e3615423dfca256d04e3f', 'ridho maulana', 'aktif', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ttamu`
--
ALTER TABLE `ttamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ttamu`
--
ALTER TABLE `ttamu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2022 pada 19.37
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_administrasi`
--

CREATE TABLE `pembayaran_administrasi` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_riwayat` int(11) NOT NULL,
  `pembayaran_by` int(11) NOT NULL,
  `pembayaran_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_administrasi`
--

INSERT INTO `pembayaran_administrasi` (`pembayaran_id`, `pembayaran_riwayat`, `pembayaran_by`, `pembayaran_total`) VALUES
(2, 1, 7, '1000'),
(5, 2, 7, '20000'),
(6, 3, 7, '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('dokter','pegawai','pasien') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'dr. ribbiyun', 'dokter@robith.mr', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dokter', 1),
(6, 'Muhammad Robith R', 'pasien@gmail.com', 'pasien', '43b39eea8ff4885aa49ec46c39a08178', 'pasien', 1),
(7, 'qisthi', 'pegawai@gmail.com', 'pegawai', 'b69706c80477d3d04ecc1d8f62cdb35a', 'pegawai', 1),
(8, 'dr. Muhammad', 'm.robithribbiyun@gmail.com', 'dokter', 'cab2d8232139ee4f469a920732578f71', 'dokter', 1),
(9, 'kamil', 'kamil@gmail.com', 'kamil', 'dd570f63d729c53bf669bd1d49a5cdd2', 'pasien', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `penyakit_id` int(11) NOT NULL,
  `penyakit_nama` varchar(255) NOT NULL,
  `penyakit_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`penyakit_id`, `penyakit_nama`, `penyakit_desc`) VALUES
(1, 'Influenzaa', ' Infeksi saluran pernapasan yang disebabkan oleh virus influenzaa'),
(3, 'Alergi', 'reaksi sistem kekebalan tubuh manusia terhadap benda tertentu, yang seharusnya tidak menimbulkan reaksi di tubuh orang lain.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_medik`
--

CREATE TABLE `riwayat_medik` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_dokter` int(11) NOT NULL,
  `riwayat_pasien` int(11) NOT NULL,
  `riwayat_penyakit` int(11) NOT NULL,
  `riwayat_tindakan` varchar(255) NOT NULL,
  `riwayat_resep` varchar(255) NOT NULL,
  `riwayat_status` enum('belum','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_medik`
--

INSERT INTO `riwayat_medik` (`riwayat_id`, `riwayat_dokter`, `riwayat_pasien`, `riwayat_penyakit`, `riwayat_tindakan`, `riwayat_resep`, `riwayat_status`) VALUES
(1, 1, 6, 3, 'Konsultasi', 'Paracetamol', 'lunas'),
(2, 1, 9, 1, 'rawat inap', 'obat flu', 'lunas'),
(3, 1, 6, 1, 'rawat inap', 'Paracetamol,Antibiotik', 'lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran_administrasi`
--
ALTER TABLE `pembayaran_administrasi`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`penyakit_id`);

--
-- Indeks untuk tabel `riwayat_medik`
--
ALTER TABLE `riwayat_medik`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran_administrasi`
--
ALTER TABLE `pembayaran_administrasi`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `penyakit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `riwayat_medik`
--
ALTER TABLE `riwayat_medik`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

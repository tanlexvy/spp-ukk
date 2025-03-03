-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2025 pada 03.42
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppgak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tagihan`
--

CREATE TABLE `detail_tagihan` (
  `id_detail` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idtagihan` int(11) NOT NULL,
  `idtahun` int(11) NOT NULL,
  `status_tagihan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_tagihan`
--

INSERT INTO `detail_tagihan` (`id_detail`, `idsiswa`, `idtagihan`, `idtahun`, `status_tagihan`) VALUES
(4, 1, 21, 1, 'Lunas'),
(5, 1, 23, 1, 'Lunas'),
(6, 1, 24, 1, 'Lunas'),
(7, 1, 25, 1, 'Lunas'),
(8, 1, 26, 1, 'Pending'),
(9, 1, 21, 1, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII'),
(6, 'XII RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `ta_id` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `foto_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `ta_id`, `nama_siswa`, `nisn`, `kelas`, `tanggal_lahir`, `alamat`, `nohp`, `email`, `foto_siswa`) VALUES
(1, 1, 'Dodi Alfa', '13345', 1, '2016-05-11', 'Empat Negeri', '+6283877654098', 'dodi20@gmail.com', 'siswa/3.png'),
(2, 1, 'Reza', '22334', 1, '2016-06-11', 'lima puluh', '+6282274568095', 'reza@gmail.com', 'siswa/d3.jpg'),
(3, 1, 'SASA', '14567', 2, '2016-06-09', 'Empat Negeri', '+6282361676990', 'sasa@gmail.com', 'siswa/agent2.jpg'),
(4, 2, 'Gilang', '13367', 3, '2016-07-12', 'Empat Negeri', '+6283877654098', 'gilang20@gmail.com', 'siswa/2.jpg'),
(5, 2, 'Vivi', '24545', 2, '2016-06-15', 'Lima Puluh', '+6282245607980', 'vivi@gmail.com', 'siswa/2.png'),
(6, 2, 'Tantaha Ramadhan', '00620025', 3, '2006-10-21', 'Jalan Dahu Legoso Raya', '085921212724', 'tanta@gmail.com', 'siswa/RobloxScreenShot20250125_151809534.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `taid` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` varchar(30) NOT NULL,
  `tahun_bayar` year(4) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `verification_status` enum('Pending','Verified','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `siswa_id`, `taid`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `jumlah_bayar`, `metode_bayar`, `status_bayar`, `verification_status`) VALUES
(25, 1, 1, '2023-07-31', '2023-07', 2023, 20000, 'Tunai', 1, 'Pending'),
(26, 1, 1, '2023-08-31', '2023-08', 2023, 20000, 'Tunai', 1, 'Pending'),
(27, 2, 1, '2023-07-31', '2023-07', 2023, 20000, 'Tunai', 1, 'Pending'),
(28, 1, 1, '2025-02-10', '2023-01', 2023, 320000, 'Tunai', 1, 'Pending'),
(29, 1, 1, '2025-02-10', '2023-02', 2023, 320000, 'Tunai', 1, 'Pending'),
(30, 1, 1, '2025-02-10', '2023-03', 0000, 320000, 'Tunai', 0, 'Pending'),
(31, 1, 1, '2025-02-10', '2023-03', 2023, 320000, 'Tunai', 0, 'Pending'),
(32, 1, 1, '2025-02-11', '2023-04', 2023, 320000, 'Tunai', 1, 'Pending'),
(33, 1, 1, '2025-02-11', '2023-05', 2023, 4168461, 'Kredit', 2, 'Pending'),
(34, 1, 1, '2025-02-12', '2023-01', 2023, 320000, 'Tunai', 2, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `ta`) VALUES
(1, '2023/2024'),
(2, '2024/2025'),
(3, '2025/2026'),
(4, '2026/2027'),
(5, '2027/2028');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `idta` int(11) NOT NULL,
  `bulan_tagihan` varchar(30) NOT NULL,
  `tahun_tagihan` year(4) NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `idta`, `bulan_tagihan`, `tahun_tagihan`, `jumlah_tagihan`) VALUES
(21, 1, '2023-01', 2023, 320000),
(23, 1, '2023-02', 2023, 320000),
(24, 1, '2023-03', 2023, 320000),
(25, 1, '2023-04', 2023, 320000),
(26, 1, '2023-05', 2023, 4168461);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `peran` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `peran`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Bu Marni', ''),
(3, 'siswa', 'bcd724d15cde8c47650fda962968f102', 'siswa', ''),
(4, 'siswa1', '013f0f67779f3b1686c604db150d12ea', 'siswasiswaan', 'siswa'),
(5, 'sp', '1952a01898073d1e561b9b4f2e42cbd7', 'SP', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_tagihan_siswa` (`idsiswa`),
  ADD KEY `fk_detail_tagihan_tagihan` (`idtagihan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_siswa_kelas` (`kelas`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `fk_spp_siswa` (`siswa_id`),
  ADD KEY `fk_spp_ta` (`taid`);

--
-- Indeks untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `fk_tagihan_ta` (`idta`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD CONSTRAINT `fk_detail_tagihan_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_tagihan_tagihan` FOREIGN KEY (`idtagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD CONSTRAINT `fk_spp_siswa` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_spp_ta` FOREIGN KEY (`taid`) REFERENCES `tb_ta` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `fk_tagihan_ta` FOREIGN KEY (`idta`) REFERENCES `tb_ta` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

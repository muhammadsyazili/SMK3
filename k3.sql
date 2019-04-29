-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2019 pada 10.04
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `role`) VALUES
(1, 'vendor', '7c3613dba5171cb6027c67835dd3b9d4', 'vendor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apd`
--

CREATE TABLE `apd` (
  `id_pengajuan` int(11) NOT NULL,
  `id_apd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_pengajuan` int(11) NOT NULL,
  `id_aplikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahaya_pekerjaan`
--

CREATE TABLE `bahaya_pekerjaan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_bahaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pekerjaan`
--

CREATE TABLE `detail_pekerjaan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_apd`
--

CREATE TABLE `d_apd` (
  `id_apd` int(11) NOT NULL,
  `n_apd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_apd`
--

INSERT INTO `d_apd` (`id_apd`, `n_apd`) VALUES
(1, 'Helm Keselamatan'),
(2, 'Sarung Tangan Katun'),
(3, 'Tali Keselamatan'),
(4, 'Sepatu Keselamatan'),
(5, 'Sarung Tangan Karet'),
(6, 'Masker'),
(7, 'Sarung Tangan Kulit'),
(8, 'Pelindung Pendengaran'),
(9, 'Pelindung Muka/Las'),
(10, 'Baju Kulit'),
(11, 'Kacamata Debu'),
(12, 'Rompi Keselamatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_aplikasi`
--

CREATE TABLE `d_aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `n_aplikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_aplikasi`
--

INSERT INTO `d_aplikasi` (`id_aplikasi`, `n_aplikasi`) VALUES
(1, 'Pekerjaan Umum'),
(2, 'Ruang Terkurung'),
(3, 'Pengangkatan Kritikal'),
(4, 'Kerja Panas'),
(5, 'Penggalian'),
(6, 'Listrik'),
(7, 'Bekerja Diketinggian'),
(8, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_bahaya`
--

CREATE TABLE `d_bahaya` (
  `id_bahaya` int(11) NOT NULL,
  `n_bahaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_bahaya`
--

INSERT INTO `d_bahaya` (`id_bahaya`, `n_bahaya`) VALUES
(1, 'Lantai Licin'),
(2, 'Bahaya Alat Listrik'),
(3, 'Ketinggian'),
(4, 'Lingkungan Yang Sesak/Ramai'),
(5, 'Percikan/Leburan Besi Panas'),
(6, 'Bahaya Kebakaran'),
(7, 'Objek Ayunan'),
(8, 'Pekerjaan Lain Yang Terdekat'),
(9, 'Beban Berat'),
(10, 'Asap'),
(11, 'Percikan Palu'),
(12, 'Pekerjaan Diatas Kepala'),
(13, 'Sambungan Selang (Gas/Tekanan)'),
(14, 'Tangga Yang Kokoh'),
(15, 'Benda Tajam'),
(16, 'Penanganan Radio Aktif'),
(17, 'Gas'),
(18, 'Tindakan Dari Pihak Ketiga'),
(19, 'Berangin'),
(20, 'Bising'),
(21, 'Jalan Darurat'),
(22, 'Jepit/Perangkap'),
(23, 'Orang Masuk Tanpa Izin'),
(24, 'Tabrakan/Benturan Benda Yang Bergerak'),
(25, 'Vibrasi/Getaran'),
(26, 'Polusi Alam'),
(27, 'Bahaya Cedera Tulang Belakang'),
(28, 'Gelap (Malam)'),
(29, 'Salah Komunikasi'),
(30, 'Debu'),
(31, 'Tersandung/Jatuh'),
(32, 'Cuaca Buruk'),
(33, 'Terhantam Benda'),
(34, 'Kegagalan Peralatan'),
(35, 'Salah Penyetelan'),
(36, 'Ergonomic'),
(37, 'Lantai Yang Berlubang'),
(38, 'Kegagalan Struktur/Alat Bantu'),
(39, 'Keseleo'),
(40, 'Kejatuhan Benda Atau Material'),
(41, 'Tepian Bangunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_jperalatan`
--

CREATE TABLE `d_jperalatan` (
  `id_jPeralatan` int(11) NOT NULL,
  `n_jPeralatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_jperalatan`
--

INSERT INTO `d_jperalatan` (`id_jPeralatan`, `n_jPeralatan`) VALUES
(1, 'Mesin'),
(2, 'Listrik'),
(3, 'Peralatan Tangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_tpencegahan`
--

CREATE TABLE `d_tpencegahan` (
  `id_tPencegahan` int(11) NOT NULL,
  `n_tPencegahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_tpencegahan`
--

INSERT INTO `d_tpencegahan` (`id_tPencegahan`, `n_tPencegahan`) VALUES
(1, 'Proteksi/Perlindungan Dari Jatuh'),
(2, 'Rambu-Rambu'),
(3, 'Pemadam Api/Kebakaran'),
(4, 'Buddy Sistem'),
(5, 'Selimut Penghambat Api/Percikan'),
(6, 'Penyinaran Yang Memuaskan'),
(7, 'Pintu Masuk/Pintu Keluar'),
(8, 'Sertifikat Kompetensi'),
(9, 'Penyangga'),
(10, 'Wajib Mengikuti Penjelasan JSA'),
(11, 'Pagar/Barikade'),
(12, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_peralatan`
--

CREATE TABLE `jenis_peralatan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_jPeralatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `langkah_pengerjaan`
--

CREATE TABLE `langkah_pengerjaan` (
  `id_pengajuan` int(11) NOT NULL,
  `lKerja` varchar(255) NOT NULL,
  `pBahaya` varchar(255) NOT NULL,
  `apd` varchar(255) NOT NULL,
  `pRekomendasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_pekerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `id_penyulang` int(11) NOT NULL,
  `no_dok` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `tindakan_keselamatan` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `single_line` varchar(40) NOT NULL,
  `catatan_peralatan` text NOT NULL,
  `status_pemadaman` varchar(255) NOT NULL,
  `status_p_a1` char(1) NOT NULL,
  `status_p_a2` char(1) NOT NULL,
  `status_p_a3` char(1) NOT NULL,
  `status_p_a4` char(1) NOT NULL,
  `status_pengajuan` char(1) NOT NULL,
  `catatan_pengajuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_pengawas` varchar(255) NOT NULL,
  `kontraktor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyulang`
--

CREATE TABLE `penyulang` (
  `id_penyulang` int(11) NOT NULL,
  `nama_penyulang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penyulang`
--

INSERT INTO `penyulang` (`id_penyulang`, `nama_penyulang`) VALUES
(1, 'Onta'),
(2, 'Musang'),
(3, 'Beruang'),
(4, 'Badak'),
(5, 'Domba'),
(6, 'Rusa'),
(7, 'Kijang'),
(8, 'Kancil'),
(9, 'Banteng'),
(10, 'Macan (Residu)'),
(11, 'Harimau'),
(12, 'Surabaya'),
(13, 'Bandung'),
(14, 'Manado'),
(15, 'Yogya'),
(16, 'Padang'),
(17, 'Jambi'),
(18, 'Tarakan'),
(19, 'Kiwi'),
(20, 'Belimbing'),
(21, 'Apel'),
(22, 'Durian'),
(23, 'Kurma'),
(24, 'Anggur'),
(25, 'Jeruk'),
(26, 'Lematang'),
(27, 'Enim (Tembaga)'),
(28, 'Kikim'),
(29, 'Kelingi'),
(30, 'Kacer'),
(31, 'Beo'),
(32, 'Kenari'),
(33, 'Merak'),
(34, 'Pipit'),
(35, 'Murai'),
(36, 'Merpati'),
(37, 'Walet'),
(38, 'Kutilang'),
(39, 'Pandu'),
(40, 'Bima'),
(41, 'Arjuna'),
(42, 'Nakula'),
(43, 'Srikandi'),
(44, 'Krisna'),
(45, 'Semar'),
(46, 'Yudistira'),
(47, 'Sadewa'),
(48, 'Kunti'),
(49, 'Sinta'),
(50, 'Rama'),
(51, 'Poso'),
(52, 'Maninjau'),
(53, 'Singkarak'),
(54, 'Ranau'),
(55, 'Kalimantan'),
(56, 'Sulawesi'),
(57, 'Seribu'),
(58, 'Borang'),
(59, 'Natuna'),
(60, 'Batam'),
(61, 'Jawa'),
(62, 'Bali'),
(63, 'Papua'),
(64, 'Akasia'),
(65, 'Sungkai'),
(66, 'Tembesu'),
(67, 'Cendana'),
(68, 'Unglen'),
(69, 'Meranti'),
(70, 'Pule'),
(71, 'Gurami'),
(72, 'Belido'),
(73, 'Arwana'),
(74, 'Tenggiri'),
(75, 'Cungkediro'),
(76, 'Tomat'),
(77, 'Kentang'),
(78, 'Brokoli'),
(79, 'Salada'),
(80, 'Wortel'),
(81, 'Dieng'),
(82, 'Kerinci'),
(83, 'Seminung'),
(84, 'Galunggung'),
(85, 'Merapi'),
(86, 'Kelud'),
(87, 'Krakatau'),
(88, 'Merbabu'),
(89, 'Semeru'),
(90, 'Kawi'),
(91, 'Singgalang'),
(92, 'Kinibalu'),
(93, 'Pempek'),
(94, 'Model'),
(95, 'Lenggang'),
(96, 'Bakwan'),
(97, 'Burgo'),
(98, 'Laksan'),
(99, 'Celimpungan'),
(100, 'Tempoyak'),
(101, 'Kencur'),
(102, 'Laos'),
(103, 'Jahe'),
(104, 'Serai'),
(105, 'Bawang'),
(106, 'Lempuyang'),
(107, 'Cabe'),
(108, 'Ketumbar'),
(109, 'Merica'),
(110, 'Kargo'),
(111, 'Ferry'),
(112, 'Roro'),
(113, 'Vinisi'),
(114, 'Mataram'),
(115, 'Kutai'),
(116, 'Pajaran'),
(117, 'Sriwijaya'),
(118, 'Timbal'),
(119, 'Seng'),
(120, 'Natrium'),
(121, 'Hidrogen'),
(122, 'Neon'),
(123, 'Helium'),
(124, 'Borobudur'),
(125, 'Mendut'),
(126, 'Rencong'),
(127, 'Keris'),
(128, 'Sumpit'),
(129, 'Kujang'),
(130, 'Solar'),
(131, 'Avtur'),
(132, 'Residu (Macan)'),
(133, 'Premium'),
(134, 'Premik'),
(135, 'Platina'),
(136, 'Emas'),
(137, 'Tembaga (Enim)'),
(138, 'Perak'),
(139, 'Poker'),
(140, 'Boeing'),
(141, 'Airbus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan_kerja_k2`
--

CREATE TABLE `peralatan_kerja_k2` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rayon`
--

CREATE TABLE `rayon` (
  `id_rayon` int(11) NOT NULL,
  `nama_rayon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `nama_rayon`) VALUES
(4, 'Ampera'),
(9, 'Indralaya'),
(5, 'Kayu agung'),
(2, 'Kenten'),
(6, 'Mariana'),
(11, 'Palembang'),
(8, 'Pangkalan Balai'),
(1, 'Rivai'),
(7, 'Sekayu'),
(3, 'Sukarame'),
(10, 'Tugumulyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_pencegahan`
--

CREATE TABLE `tindakan_pencegahan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_tPencegahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `id_akun`) VALUES
(1, 'pt. angkasa cipta', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `apd`
--
ALTER TABLE `apd`
  ADD KEY `id_pekerjaan` (`id_pengajuan`),
  ADD KEY `id_apd` (`id_apd`);

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD KEY `id_pekerjaan` (`id_pengajuan`),
  ADD KEY `id_aplikasi` (`id_aplikasi`);

--
-- Indeks untuk tabel `bahaya_pekerjaan`
--
ALTER TABLE `bahaya_pekerjaan`
  ADD KEY `id_pekerjaan` (`id_pengajuan`),
  ADD KEY `id_bahaya` (`id_bahaya`);

--
-- Indeks untuk tabel `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  ADD KEY `detail_pekerjaan_ibfk_1` (`id_pengajuan`);

--
-- Indeks untuk tabel `d_apd`
--
ALTER TABLE `d_apd`
  ADD PRIMARY KEY (`id_apd`);

--
-- Indeks untuk tabel `d_aplikasi`
--
ALTER TABLE `d_aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indeks untuk tabel `d_bahaya`
--
ALTER TABLE `d_bahaya`
  ADD PRIMARY KEY (`id_bahaya`);

--
-- Indeks untuk tabel `d_jperalatan`
--
ALTER TABLE `d_jperalatan`
  ADD PRIMARY KEY (`id_jPeralatan`);

--
-- Indeks untuk tabel `d_tpencegahan`
--
ALTER TABLE `d_tpencegahan`
  ADD PRIMARY KEY (`id_tPencegahan`);

--
-- Indeks untuk tabel `jenis_peralatan`
--
ALTER TABLE `jenis_peralatan`
  ADD KEY `id_pekerjaan` (`id_pengajuan`),
  ADD KEY `id_jPeralatan` (`id_jPeralatan`);

--
-- Indeks untuk tabel `langkah_pengerjaan`
--
ALTER TABLE `langkah_pengerjaan`
  ADD KEY `langkah_pengerjaan_ibfk_1` (`id_pengajuan`);

--
-- Indeks untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD KEY `id_pekerjaan` (`id_pengajuan`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_vendor` (`id_vendor`),
  ADD KEY `id_rayon` (`id_rayon`),
  ADD KEY `id_penyulang` (`id_penyulang`);

--
-- Indeks untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  ADD KEY `id_pekerjaan` (`id_pengajuan`);

--
-- Indeks untuk tabel `penyulang`
--
ALTER TABLE `penyulang`
  ADD PRIMARY KEY (`id_penyulang`);

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD KEY `id_pekerjaan` (`id_pengajuan`);

--
-- Indeks untuk tabel `peralatan_kerja_k2`
--
ALTER TABLE `peralatan_kerja_k2`
  ADD KEY `peralatan_kerja_k2_ibfk_1` (`id_pengajuan`);

--
-- Indeks untuk tabel `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id_rayon`),
  ADD UNIQUE KEY `nama_rayon` (`nama_rayon`);

--
-- Indeks untuk tabel `tindakan_pencegahan`
--
ALTER TABLE `tindakan_pencegahan`
  ADD KEY `id_pekerjaan` (`id_pengajuan`),
  ADD KEY `id_tPencegahan` (`id_tPencegahan`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `id_login` (`id_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `d_apd`
--
ALTER TABLE `d_apd`
  MODIFY `id_apd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `d_aplikasi`
--
ALTER TABLE `d_aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `d_bahaya`
--
ALTER TABLE `d_bahaya`
  MODIFY `id_bahaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `d_jperalatan`
--
ALTER TABLE `d_jperalatan`
  MODIFY `id_jPeralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `d_tpencegahan`
--
ALTER TABLE `d_tpencegahan`
  MODIFY `id_tPencegahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyulang`
--
ALTER TABLE `penyulang`
  MODIFY `id_penyulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT untuk tabel `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `apd`
--
ALTER TABLE `apd`
  ADD CONSTRAINT `apd_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apd_ibfk_2` FOREIGN KEY (`id_apd`) REFERENCES `d_apd` (`id_apd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplikasi_ibfk_2` FOREIGN KEY (`id_aplikasi`) REFERENCES `d_aplikasi` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bahaya_pekerjaan`
--
ALTER TABLE `bahaya_pekerjaan`
  ADD CONSTRAINT `bahaya_pekerjaan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bahaya_pekerjaan_ibfk_2` FOREIGN KEY (`id_bahaya`) REFERENCES `d_bahaya` (`id_bahaya`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pekerjaan`
--
ALTER TABLE `detail_pekerjaan`
  ADD CONSTRAINT `detail_pekerjaan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_peralatan`
--
ALTER TABLE `jenis_peralatan`
  ADD CONSTRAINT `jenis_peralatan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_peralatan_ibfk_2` FOREIGN KEY (`id_jPeralatan`) REFERENCES `d_jperalatan` (`id_jPeralatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `langkah_pengerjaan`
--
ALTER TABLE `langkah_pengerjaan`
  ADD CONSTRAINT `langkah_pengerjaan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `pekerja_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_rayon`) REFERENCES `rayon` (`id_rayon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_penyulang`) REFERENCES `penyulang` (`id_penyulang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengawas`
--
ALTER TABLE `pengawas`
  ADD CONSTRAINT `pengawas_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `peralatan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peralatan_kerja_k2`
--
ALTER TABLE `peralatan_kerja_k2`
  ADD CONSTRAINT `peralatan_kerja_k2_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_pencegahan`
--
ALTER TABLE `tindakan_pencegahan`
  ADD CONSTRAINT `tindakan_pencegahan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_pencegahan_ibfk_2` FOREIGN KEY (`id_tPencegahan`) REFERENCES `d_tpencegahan` (`id_tPencegahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

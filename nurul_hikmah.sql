-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2022 pada 19.12
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurul_hikmah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_tambahan`
--

CREATE TABLE `barang_tambahan` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_tambahan`
--

INSERT INTO `barang_tambahan` (`id_barang`, `nama_barang`, `satuan`, `harga`, `stok`) VALUES
('001', 'Kursi', 'buah', '2000004', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tenda`
--

CREATE TABLE `jenis_tenda` (
  `id_jenis` int(11) NOT NULL,
  `tenda_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_tenda`
--

INSERT INTO `jenis_tenda` (`id_jenis`, `tenda_jenis`) VALUES
(1, 'Tenda 4 x 4'),
(2, 'Tenda 8 x 8'),
(3, 'Tenda Sisir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(2) NOT NULL,
  `nama_keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `nama_keterangan`) VALUES
(1, 'belum dp'),
(2, 'sudah dp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kode_paket` int(2) NOT NULL,
  `nama_paket` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga`) VALUES
(1, 'Paket A', '12000000'),
(2, 'Paket B', '6450000'),
(3, 'Paket C', '2800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `notelp`, `alamat`, `username`, `password`, `id_level`) VALUES
(1, 'admin', '', '', 'admin', 'admin', 1),
(28, 'Ibnu Saiful', '08997399423', 'Desa Jatisawit Blok Karang Malang ', '2103014', '2103014', 2),
(29, 'Anisa Putriani', '085328923781', 'Bandung', '2103004', '2103004', 2),
(30, 'Nasikkah', '0853472482634', 'Singajaya', '2103021', '2103021', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `i_penilaian` varchar(20) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_pengguna`, `i_penilaian`, `pesan`) VALUES
(2, 'septian yoga prawira', 'cukup', 'beberapa fitur masih mengalami bug'),
(3, 'Ibnu Saiful', 'sangat baik', 'sangat bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenda`
--

CREATE TABLE `tenda` (
  `id_tenda` varchar(3) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tenda`
--

INSERT INTO `tenda` (`id_tenda`, `id_jenis`, `satuan`, `harga`, `stok`) VALUES
('02', '1', 'set', 200000, 19),
('03', '2', 'set', 270000, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `paket` varchar(50) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `id_keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `notelp`, `alamat`, `tanggal_awal`, `tanggal_akhir`, `paket`, `warna`, `harga`, `pesan`, `id_keterangan`) VALUES
(17, 'dayat', '08763936323', 's', '2022-06-06', '2022-06-08', 'Paket A', '', '2000000', 'asds', 'BELUM LUNAS'),
(19, 'yor', '089999998887', 'msa', '2022-06-29', '2022-06-30', 'Paket A', '', '2000000', 'Nurul Hikmah adalah salah satu usaha yang bergerak di bidang jasa penyewaan yang terletak di Desa Singajaya, Blok Kalen Senen, Jl. Ir. H. Juanda, KM 4. Nurul Hikmah menawarkan jasa penyewaan berbagai macam produk-produk seperti tenda, kursi, sarung kursi, panggung, dekorasi, alat-alat dapur, background/tirai, blower, karpet, sound system, dan terakhir rias pengantin. Nurul Hikmah menyewakan peralatan pesta tersebut untuk keperluan berbagai acara pernikahan, khitanan,dan peringatan hari besar lainnya.', 'LUNAS'),
(42, 'Ibnu Saiful', '08997399423', 'Desa Jatisawit Blok Karang Malang ', '2022-06-15', '2022-06-18', 'Paket C', '', '2700000', 'ygduyadlhadhad', 'LUNAS'),
(44, 'halim mahmud ajis', '971496', 'fae', '2022-06-24', '2022-06-27', 'Paket B', 'putih pink', '2300000', 'chaos', 'LUNAS'),
(48, 'Ibnu Saiful', '08997399423', 'Desa Jatisawit Blok Karang Malang ', '2022-06-20', '2022-06-22', 'Paket A', 'Pilih', '12000000', 'n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_satuan`
--

CREATE TABLE `transaksi_satuan` (
  `id_transaksis` int(3) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `tenda4x4` varchar(20) NOT NULL,
  `tenda8x8` varchar(20) NOT NULL,
  `tendasisir` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_satuan`
--

INSERT INTO `transaksi_satuan` (`id_transaksis`, `id_pengguna`, `notelp`, `alamat`, `tanggal_awal`, `tanggal_akhir`, `tenda4x4`, `tenda8x8`, `tendasisir`, `warna`, `harga`, `pesan`, `keterangan`) VALUES
(1, 'yor', '089999998887', 'm', '2022-06-24', '2022-06-25', '2', '5', '6', 'moca', '3670000', 'k', 'LUNAS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_tambahan`
--
ALTER TABLE `barang_tambahan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `jenis_tenda`
--
ALTER TABLE `jenis_tenda`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `tenda`
--
ALTER TABLE `tenda`
  ADD PRIMARY KEY (`id_tenda`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_keterangan` (`id_keterangan`);

--
-- Indeks untuk tabel `transaksi_satuan`
--
ALTER TABLE `transaksi_satuan`
  ADD PRIMARY KEY (`id_transaksis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_tenda`
--
ALTER TABLE `jenis_tenda`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `kode_paket` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `transaksi_satuan`
--
ALTER TABLE `transaksi_satuan`
  MODIFY `id_transaksis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

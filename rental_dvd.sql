-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 14.28
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_dvd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `pemain` text NOT NULL,
  `tahun_produksi` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `sutradara` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `judul`, `sinopsis`, `pemain`, `tahun_produksi`, `genre`, `durasi`, `sutradara`) VALUES
(1, 'Titanic', 'A young couple from different social classes fall in love aboard the ill-fated voyage of the RMS Titanic.', ' Leonardo DiCaprio Jack Dawson, Kate Winslet Rose DeWitt Bukater, Billy Zane Caledon Hockley, Kathy Bates Molly Brown, Frances Fisher Ruth DeWitt Bukater, Bill Paxton Brock Lovett, Victor Garber Thomas Andrews, Gloria Stuart Old Rose DeWitt Bukater, and Bernard Hill Captain Edward Smith.', 1997, 'Romance/Drama', 195, 'James Cameron'),
(2, 'Ada Apa Dengan Cinta?', 'Cinta, a teenager in suburban Jakarta, spends all of her time with her four girlfriends, Maura, Alya, Carmen, and Milly. That is, until she falls for Rangga, the unassuming winner of the school poetry contest. Rangga\'s presence triggers the jealousy of Cinta\'s best friends, and things get more challenging for the couple when the girls pressure Cinta to choose between them and Rangga.', 'Dian Sastrowardoyo, Nicholas Saputra, Titi Kamal, Ladya Cheryl, Adinia Wirasti', 2002, 'Romantis', 112, 'Rudi Soedjarwo'),
(3, 'Avatar', 'On the lush alien world of Pandora live the Na\'vi, beings who appear primitive but are highly evolved. Because the planet\'s environment is poisonous, human/Na\'vi hybrids, called Avatars, must link to human minds to allow for free movement on Pandora. Jake Sully, a paralyzed former Marine, becomes mobile again through one such Avatar and falls in love with a Na\'vi woman. As a bond with her grows, he is drawn into a battle for the survival of her world.', 'Sam Worthington, Zoe Saldana, Stephen Lang, Sigourney Weaver, Michelle Rodriguez', 2009, 'Sci-Fi', 162, 'James Cameron'),
(4, 'Laskar Pelangi', 'A group of 10 students struggles to pursue their dreams at an impoverished elementary school in Gantong Village on the island of Belitung. Their school is threatened with closure unless they can increase their number of students to at least 10. The film portrays their journey through childhood and the inspiring story of their friendship.', 'Cut Mini, Ikranagara, Zulfanny, Ferdian', 2008, 'Drama', 124, 'Riri Riza'),
(5, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Hugo Weaving', 1999, 'Sci-Fi', 136, 'Lana Wachowski, Lilly Wachowski'),
(6, 'Perempuan Berkalung Sorban', 'Anissa\'s life changes dramatically when she is forced to marry a man she doesn\'t love. She struggles with the role of women in her community and seeks to find her own identity and happiness.', 'Revalina S. Temat, Oka Antara, Widyawati', 2009, 'Drama', 120, 'Hanung Bramantyo'),
(7, 'The Dark Knight Rises', 'Eight years after the Joker\'s reign of anarchy, Batman, with the help of the enigmatic Selina, is forced from his exile to save Gotham City, now on the edge of total annihilation, from the brutal guerrilla terrorist Bane.', 'Christian Bale, Tom Hardy, Anne Hathaway, Gary Oldman', 2012, 'Action', 165, 'Christopher Nolan'),
(8, 'Rumah Dara', 'A group of friends travels to the countryside to find a traditional healer, but their trip takes a deadly turn when they become prey to a family of cannibals.', 'Shareefa Daanish, Julie Estelle, Ario Bayu, Sigi Wimala', 2009, 'Horror', 95, 'The Mo Brothers'),
(9, 'Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'John Travolta, Uma Thurman, Samuel L. Jackson, Bruce Willis', 1994, 'Crime', 154, 'Quentin Tarantino'),
(10, 'Sang Pemimpi', 'The film follows the journey of two boys, Ikal and Arai, from a small village in Belitung as they strive to achieve their dreams. Despite numerous obstacles, they remain determined to pursue higher education and a better future.', 'Vikri Septiawan, Lukman Sardi, Rendy Ahmad, Landung Simatupang', 2009, 'Drama', 120, 'Riri Riza');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_dvd`
--

CREATE TABLE `tabel_dvd` (
  `id_dvd` int(11) NOT NULL COMMENT 'Kunci utama untuk DVD',
  `judul` varchar(100) NOT NULL COMMENT 'Judul dari DVD',
  `genre` varchar(50) NOT NULL COMMENT 'Genre dari DVD',
  `tahun_rilis` int(11) NOT NULL COMMENT 'Tahun rilis DVD',
  `status_ketersediaan` tinyint(1) NOT NULL COMMENT 'Status ketersediaan DVD',
  `gambar` varchar(255) DEFAULT NULL,
  `biaya` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_dvd`
--

INSERT INTO `tabel_dvd` (`id_dvd`, `judul`, `genre`, `tahun_rilis`, `status_ketersediaan`, `gambar`, `biaya`) VALUES
(1, 'Inception', 'Sci-Fi', 2019, 0, NULL, '13000'),
(2, 'The Shawshank Redemption', 'Drama', 1994, 1, NULL, '15000'),
(3, 'The Dark Knight', 'Action', 2008, 1, NULL, '18000'),
(4, 'Pulp Fiction', 'Crime', 1994, 1, NULL, '15000'),
(5, 'Fight Club', 'Drama', 1999, 1, NULL, '13000'),
(6, 'Forrest Gump', 'Drama', 1994, 1, NULL, '15000'),
(7, 'The Matrix', 'Sci-Fi', 1999, 1, NULL, '19000'),
(8, 'The Lord of the Rings: The Fellowship of the Ring', 'Adventure', 2001, 1, NULL, '14000'),
(9, 'The Godfather', 'Crime', 1972, 1, NULL, '16000'),
(10, 'The Dark Knight Rises', 'Action', 2012, 1, NULL, '19000'),
(11, 'Avatar', 'Sci-Fi', 2009, 1, NULL, '15000'),
(12, 'Gladiator', 'Action', 2000, 1, NULL, '12000'),
(13, 'Inglourious Basterds', 'War', 2009, 1, NULL, '15000'),
(14, 'Titanic', 'Romance', 1997, 1, NULL, '14000'),
(15, 'The Silence of the Lambs', 'Thriller', 1991, 1, NULL, '15000'),
(16, 'The Green Mile', 'Drama', 1999, 1, NULL, '18000'),
(17, 'The Departed', 'Crime', 2006, 1, NULL, '15000'),
(18, 'Interstellar', 'Sci-Fi', 2014, 1, NULL, '16000'),
(19, 'The Prestige', 'Drama', 2006, 1, NULL, '15000'),
(20, 'Laskar Pelangi', 'Drama', 2008, 1, 'gambar_laskar_pelangi.jpeg', '15000'),
(21, 'Ada Apa Dengan Cinta?', 'Romantis', 2002, 1, 'gambar_ada_apa_dengan_cinta.jpeg', '12000'),
(22, 'Ayat-Ayat Cinta', 'Romantis', 2008, 1, 'gambar_ayat_ayat_cinta.jpeg', '13000'),
(23, 'Rumah Dara', 'Horor', 2009, 1, 'gambar_rumah_dara.jpeg', '14000'),
(24, 'Perempuan Berkalung Sorban', 'Drama', 2009, 1, 'gambar_perempuan_berkalung_sorban.jpeg', '13000'),
(25, 'Sang Pemimpi', 'Drama', 2009, 1, 'gambar_sang_pemimpi.jpeg', '14000'),
(26, 'Merry Riana: Mimpi Sejuta Dolar', 'Biografi', 2014, 1, 'gambar_merry_riana.jpeg', '15000'),
(27, 'Pengabdi Setan', 'Horor', 2017, 1, 'gambar_pengabdi_setan.jpeg', '14000'),
(28, 'Dilan 1990', 'Romantis', 2018, 1, 'gambar_dilan_1990.jpeg', '12000'),
(29, 'Gundala', 'Action', 2019, 1, 'gambar_gundala.jpeg', '16000'),
(30, 'Perempuan Tanah Jahanam', 'Horor', 2019, 1, 'gambar_perempuan_tanah_jahanam.jpeg', '14000'),
(31, 'Imperfect', 'Drama', 2019, 1, 'gambar_imperfect.jpeg', '13000'),
(32, 'Bumi Manusia', 'Drama', 2019, 1, 'gambar_bumi_manusia.jpeg', '15000'),
(33, 'Gundala Putra Petir', 'Action', 2020, 1, 'gambar_gundala_putra_petir.jpeg', '16000'),
(34, 'Sekala Niskala', 'Drama', 2019, 1, 'gambar_sekala_niskala.jpeg', '13000'),
(35, 'Filosofi Kopi', 'Drama', 2015, 1, 'gambar_filosofi_kopi.jpeg', '14000'),
(36, 'Marlina Si Pembunuh dalam Empat Babak', 'Drama', 2017, 1, 'gambar_marlina.jpeg', '15000'),
(37, 'Posesif', 'Drama', 2017, 1, 'gambar_posesif.jpeg', '13000'),
(38, 'Si Doel The Movie', 'Drama', 2018, 1, 'gambar_si_doel.jpeg', '14000'),
(39, 'Gundala 2: Kentut Kosmik', 'Action', 2023, 1, 'gambar_gundala_2.jpeg', '16000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sci-Fi\r\n'),
(2, 'Drama\r\n'),
(3, 'Action\r\n'),
(4, 'Crime'),
(5, 'Romance'),
(6, 'Thriller'),
(7, 'Adventure\r\n'),
(8, 'War\r\n'),
(9, 'Biografi'),
(11, 'Komedi'),
(12, 'Fantasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_peminjaman`
--

CREATE TABLE `tabel_peminjaman` (
  `nama_peminjam` varchar(11) NOT NULL COMMENT 'Kunci asing yang merujuk ke tabel Anggota',
  `no_telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_dvd` int(11) NOT NULL COMMENT 'Kunci asing yang merujuk ke tabel DVD',
  `tanggal_peminjaman` date NOT NULL COMMENT 'Tanggal peminjaman DVD',
  `tanggal_pengembalian` date NOT NULL COMMENT 'Tanggal pengembalian DVD',
  `biaya` decimal(10,2) NOT NULL COMMENT 'Biaya total transaksi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_peminjaman`
--

INSERT INTO `tabel_peminjaman` (`nama_peminjam`, `no_telepon`, `email`, `id_dvd`, `tanggal_peminjaman`, `tanggal_pengembalian`, `biaya`) VALUES
('dani', '08888888', 'ramadhany.harisma@gmail.com', 14, '2024-07-20', '2024-07-27', '15.00'),
('Melan', '0854444444', 'nurmaj23@gmail.com', 21, '2024-08-03', '2024-08-10', '12000.00'),
('Siti', '0854444444', 'khusnul141100@gmail.com', 4, '2024-07-20', '2024-07-27', '15000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'user', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_dvd`
--
ALTER TABLE `tabel_dvd`
  ADD PRIMARY KEY (`id_dvd`);

--
-- Indeks untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indeks untuk tabel `tabel_peminjaman`
--
ALTER TABLE `tabel_peminjaman`
  ADD PRIMARY KEY (`nama_peminjam`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

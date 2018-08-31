-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2018 pada 10.03
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunung_salak`
--
CREATE DATABASE IF NOT EXISTS `gunung_salak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gunung_salak`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `nik` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `hak_akses` text NOT NULL,
  `status_admin` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `admin`:
--

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nik`, `username`, `password`, `nama`, `jabatan`, `foto`, `hak_akses`, `status_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Administrator', 'user_1.png', 'Super Admin', 1),
(2, 'agus_fc', '202cb962ac59075b964b07152d234b70', 'Agus', 'Supervisor', '', 'Admin', 1),
(3, 'Kades_Cimelati', '202cb962ac59075b964b07152d234b70', 'Ahmad Hari', 'Kepala Desa', '', 'Kepala Desa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `alat`;
CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `kategori_alat` int(6) NOT NULL,
  `gambar` text NOT NULL,
  `gambar_besar` text NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_alat` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `alat`:
--

--
-- Truncate table before insert `alat`
--

TRUNCATE TABLE `alat`;
--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `deskripsi`, `harga_sewa`, `kategori_alat`, `gambar`, `gambar_besar`, `tgl_post`, `status_alat`) VALUES
(1, 'Aguila 40', 'Feature :\nLarge Main Compartement\nHydration Compatible\nVertical Front Pocket\nSide Mesh Pocket\nSternum Strap\nPadded Hip Belt\nReflective 3M\nIce Axe Loops\nRaincover\n\nSpecifications :\nAverage Weight : 1 Kg\nVolume : 20 to 40 Ltr\nDimensions : 30cm x 52cm x 20cm', 67500, 2, 'aguila-40-bk.jpg', 'aguila-40-bk-large.jpg', '2017-11-17 03:48:36', 1),
(2, 'Inflatable Sofa Bed', 'Ringan dan mudah dibawa\r\nMudah digunakan\r\nUntuk penggunaan di taman, pantai, luar ruang', 28500, 6, 'air bed-grn.jpg', 'air bed-grn-large.jpg', '2017-11-17 04:17:19', 1),
(3, 'Air Pump', 'Inflates and deflates - just change air flow direction\r\nHi-volume air flow\r\nAccordion hose with 3 different nozzles\r\nSize : 33x23x7cm\r\nWeight : 1 kg\r\n', 17000, 6, 'air-pump.jpg', 'air-pump-large.jpg', '2017-11-17 04:20:35', 1),
(4, 'Alumunium Table', 'Dimension : 70cm x 70cm x 67cm\r\nPacking Size : 85cm x 15 cm\r\nWeight : 3,2 kg\r\n', 55000, 6, 'alloy-table.jpg', 'alloy-table-large.jpg', '2017-11-17 04:21:25', 1),
(5, 'Alpine Men', 'Warna Coklat\r\nUkuran 39,40,41', 54500, 4, 'alpine-men.png', 'alpine-men-large.jpg', '2017-11-17 04:12:58', 1),
(6, 'Alpine Woman', 'Warna: Merah Muda\r\nUkuran: 37,39', 54500, 4, 'alpine-women-pink.png', 'alpine-women-pink-large.png', '2017-11-17 04:14:30', 1),
(7, 'Angelica 60', 'Feature :\nLarge Main Compartement\nHydration Compatible\nVertical Front Pocket\nSide Mesh Pocket\nSternum Strap\nPadded Hip Belt\nReflective 3M\nIce Axe Loops\nRaincover\n\nSpecifications :\nAverage Weight : 1 Kg\nVolume : 40 to 60 Ltr\nDimensions : 30cm x 52cm x 20cm', 65500, 2, 'angelica-60-bl.jpg', 'angelica-60-bl-large.jpg', '2017-11-17 04:08:12', 1),
(8, 'Pulley Speed Tandem', 'Warna: Biru\r\nMax Size Rope: 12mm\r\nMax Daya: 14KN\r\n', 86400, 5, 'apb-04-87x2was pulley speed tandem bl.jpg', 'apb-04-87x2was pulley speed tandem bl-large.png', '2017-11-17 04:16:07', 1),
(9, 'Kingdom 8', 'Size:(95+150+150+95)x300x200 cm\r\nMaterial: 300x300D oxford pu coated 3000mm\r\nPacking: each one put in each carry bag\r\nWeight: 13,6 kg\r\nCapacity: 8 persons on room + 8\r\n\r\n', 425000, 3, 'tenda-kingdom.jpg', 'tenda-kingdom-large.jpg', '2017-11-17 04:10:12', 1),
(10, 'Summer Time', 'Warna: Biru\r\nSize: 205*150*105CM\r\nFly: 190T polyester PU 800MM\r\nInner: polyester B/R\r\nFloor: PE 10*10\r\nPole: F/G DIA6.9MM\r\nFrame : Fiber 2 Set, 7 Ruas/set. (56.6 Cm x 8 mm)\r\nWeight: 2.10kgs\r\nCapacity: 3 persons\r\n', 60000, 3, 'summer-time-bl.jpg', 'summer-time-bl-large.jpg', '2017-11-17 04:11:34', 1),
(11, 'Summit Attack', 'Warna: Hitam<br>\nUkuran: L', 57500, 1, 'summit-attack-BK.jpg', 'summit-attack-BK-large.jpg', '2017-07-23 09:18:19', 1),
(12, 'Edelweiss Women Series', 'Warna: Merah\r\nUkuran: L\r\n', 31000, 1, 'edelweiss-DPU.jpg', 'edelweiss-DPU-large.jpg', '2017-11-17 03:45:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` text NOT NULL,
  `tgl_artikel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi_artikel` text NOT NULL,
  `gambar_artikel1` text NOT NULL,
  `gambar_artikel2` text NOT NULL,
  `gambar_artikel3` text NOT NULL,
  `status_artikel` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `artikel`:
--

--
-- Truncate table before insert `artikel`
--

TRUNCATE TABLE `artikel`;
--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `tgl_artikel`, `isi_artikel`, `gambar_artikel1`, `gambar_artikel2`, `gambar_artikel3`, `status_artikel`) VALUES
(1, 'Latihan Fisik Perwira Marinir, Kebut-Kebutan di Gunung Salak', '2017-08-13 22:07:48', '<div><div>Belasan perwira Marinir wilayah Jakarta mendaki di Gunung Salak, Jumat (12/5). Mereka kebut-kebutan di gunung yang berlokasi di perbatasan Kabupaten Sukabumi dan Kabupaten Bogor, Jawa Barat itu.</div></div><div>Latihan lintas medan ini dipimpin langsung Komandan Pasmar-2 (Danpasmar-2) Brigadir Jenderal TNI (Mar) Nur Alamsyah, juga ikut Aspers Dankormar Kolonel Marinir Edang Taryo dan para Asisten Danpasmar-2.</div><div>Kegiatan dalam rangka untuk menjaga dan membina kemampuan fisik serta menjaga soliditas ini merupakan bagian dari program latihan Pasmar-2 pada Triwulan II tahun 2017.</div><div>Limed dengan menempuh jarak kurang lebih 22 kilometer tersebut diawali dari garis start di Javana Spa, Kecamatan Cidahu, Sukabumi, melalui rute naik Gunung Salak, Kawah Ratu, kemudian turun Gunung Bunder untuk melaksanakan salat Jumat. Usai salat jamaah, peserta lanjut perjalanan menuju finish di Pusat Pendidikan Tempur dan Latihan TNI AD di Desa Pasirreugit Bogor.</div><br>', 'artikel_1.jpeg', '', '', 1),
(6, 'Pecinta Alam Gak Bikin Gunung Penuh Sampah', '2017-08-13 21:52:04', 'Di dalam artikel-artikel itu banyak sekali timbunan sampah yang ada di gunung-gunung dan mereka ingin bergerak menyuarakan ulah buang sampah sembarangan oleh para pendaki itu. Maka dilakukanlah aksi membersihkan gunung dan timbul menjadi aksi ''sapu gunung''.<br>"Tahun 2013 banyak yang nanya cara gabung Sapu Gunung Indonesia. Sampai saat ini kami bilang kalian enggak perlu daftar jadi member. Kalian cukup melakukan prinsip yang kami lakukan, yakni enggak buang sampah sembarangan di gunung," ucap Deny.<br>Sejak pendirian di tahun 2013, komunitas ini hanya ingin menularkan kesadaran lingkungan teman-teman mendaki agar tidak buang sampah sembarangan. Lalu diadakanlah aksi bersih gunung di Gunung Salak namun kurang memuaskan.', 'artikel_61.jpg', '', '', 1),
(7, 'Bawa Turun Sampahmu ', '2017-08-23 19:24:48', '', 'artikel_7.png', '', '', 1),
(8, 'Wajib Baca dan Laksanakan', '2017-08-23 19:26:43', 'Khusus Para Pendakian Gunung Salak', 'artikel_8.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `author_artikel`
--
-- Pembuatan: 13 Nov 2017 pada 10.13
--

DROP TABLE IF EXISTS `author_artikel`;
CREATE TABLE `author_artikel` (
  `id_artikel` int(11) NOT NULL,
  `nik` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `author_artikel`:
--

--
-- Truncate table before insert `author_artikel`
--

TRUNCATE TABLE `author_artikel`;
--
-- Dumping data untuk tabel `author_artikel`
--

INSERT INTO `author_artikel` (`id_artikel`, `nik`) VALUES
(1, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `author_berita`
--
-- Pembuatan: 13 Nov 2017 pada 10.13
--

DROP TABLE IF EXISTS `author_berita`;
CREATE TABLE `author_berita` (
  `id_berita` int(11) NOT NULL,
  `nik` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `author_berita`:
--

--
-- Truncate table before insert `author_berita`
--

TRUNCATE TABLE `author_berita`;
--
-- Dumping data untuk tabel `author_berita`
--

INSERT INTO `author_berita` (`id_berita`, `nik`) VALUES
(3, 1),
(4, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id_banner` int(3) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `text_button` text NOT NULL,
  `status_banner` text NOT NULL,
  `urutan` text NOT NULL,
  `link` text NOT NULL,
  `kat_banner` smallint(1) NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `banner`:
--

--
-- Truncate table before insert `banner`
--

TRUNCATE TABLE `banner`;
--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `isi`, `gambar`, `text_button`, `status_banner`, `urutan`, `link`, `kat_banner`, `tgl_post`) VALUES
(1, 'Flora Gunung Salak', 'Keindahan flora Gunung Salak', 'banner_Panorama_Gunung_Salak2.jpg', 'Pesan Sekarang', 'active', 'first-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/pendakian', 1, '2017-09-08 21:28:33'),
(2, 'Puncak Gunung Salak', 'Keindahan eksotis penuh mistis', 'banner_Puncak_Gunung_Salak.jpg', 'Pesan Sekarang', '#', 'third-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/pendakian', 1, '2017-09-08 21:14:25'),
(3, 'Habitat Fauna', 'Keasrian Gunung Salak yang menyimpan keberagaman floura dan fauna', 'banner_Habitat_Fauna.jpg', 'Pesan Sekarang', '#', 'second-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/pendakian', 1, '2017-09-08 21:17:30'),
(4, 'Jacket Series Consina', 'Promo Harga Sewa Murah IDR 20.000 per Day', 'jacket series.jpg', 'Sewa Sekarang', 'active', 'first-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/sewaalat', 2, '2017-09-05 10:40:35'),
(5, 'Backpack Consina', 'Promo Harga Sewa Murah IDR 40.000 per Day', 'expert-series.jpg', 'Sewa Sekarang', '#', 'second-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/sewaalat', 2, '2017-09-05 10:40:56'),
(6, 'Tent Consina', 'Promo Harga Sewa Murah IDR 20.000 per Day', 'family-tent.jpg', 'Sewa Sekarang', '#', 'third-slide', 'http://localhost/sistem_informasi_gunungsalak/welcome/sewaalat', 2, '2017-09-05 10:41:14'),
(7, 'Ketentuan Umum Pendakian Gunung Salak', 'Wajib di baca dan Mengikuti aturan mendaki gunung salak', 'banner_Pendaki_Wajib_Membaca_dan_Mengikuti_Aturan_Pendakian_Gunung_Salak.jpg', 'Pesan Sekarang', '#', '', 'http://localhost/sistem_informasi_gunungsalak/welcome/pendakian', 1, '2017-09-08 21:23:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` text NOT NULL,
  `tgl_berita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi_berita` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `status_berita` smallint(1) NOT NULL COMMENT 'if 1 is Berita, else is Artikel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `berita`:
--

--
-- Truncate table before insert `berita`
--

TRUNCATE TABLE `berita`;
--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `tgl_berita`, `isi_berita`, `gambar_berita`, `status_berita`) VALUES
(3, 'Sempat Dinyatakan Hilang, Peziarah di Gunung Salak Ditemukan Kehabisan Bekal', '2017-08-13 21:48:35', 'Puluhan orang peziarah asal Bogor, Jawa Barat dikabarkan terjebak di Pos 4 Gunung Salak. Informasi yang diterima pihak Pos SAR Basarnas Sukabumi puluhan orang tersebut naik melalui jalur Cimalati, Cicurug, Sukabumi dan sempat tiba dilokasi ziarah di Puncak Manik sekitar pukul 18.00 WIB, Sabtu (13/8/2016).<br><br>"Keterangan yang kami terima rombongan yang naik ada 50 orang terbagi dalam dua rombongan. Rombongan satu 30 orang dan rombongan dua 15 orang sementara 5 orang lainnya bertahan di Basecamp. Tujuan mereka ke lokasi ziarah di puncak Manik," kata Aulia Solihanto Anggota Pos SAR Basarnas Sukabumi kepada detikcom, Minggu (14/8/2016).<br><br>Dikatakan Aulia, setelah sampai di puncak Manik, rombongan dua turun lebih dulu ke bawah dan beristirahat di pos 7 karena ada anggota rombongan yang sakit. Sementara rombongan satu melanjutkan perjalanan, karena kondisi minim penerangan sebanyak 10 orang anggota rombongan sempat dinyatakan hilang.<br><br>"Kondisi sekitar lokasi tadi malam sempat diguyur hujan dan minim penerangan. Setelah dilakukan kontak melalui perangkat radio akhirnya 10 orang yang sempat dinyatakan hilang ternyata ditemukan berada di Pos 4 kondisinya kelelahan dan kehabisan perbekalan," lanjutnya.<br><br>Sementara itu di lokasi saat ini sejumlah anggota kepolisian dari Polsek Cicurug, anggota SAR dan sejumlah sukarelawan dari Aqua Rescue telah berada di Basecamp kaki Gunung Salak untuk proses penjemputan anggota rombongan yang sakit dan kelelahan.<br><br><span>"Saat ini relawan sudah ada yang berhasil menjemput mereka, ada yang kita bawa pakai tandu karena sakit. Selain seorang ibu yang sudah sepuh, ada anak kecil juga yang kita berikan pertolongan," ujar Andre salah seorang anggota SAR Aqua Rescue.<br></span>Wahyu, salah seorang anggota rombongan yang menunggu di Basecamp menyebut jika puluhan rombongan yang melakukan ziarah ke Puncak Manik adalah keluarga besarnya dari Bogor dan Bekasi.<br><br>"Semuanya keluarga pak, tujuan kita memang mau ziarah. Pada bawa ponsel tapi namanya digunung sinyalnya suka hilang, komunikasi radio juga terbatas bisa receive nggak bisa transmit," ujarnya.<br><br>Pada pukul 13.00 WIB, satu persatu peziarah berhasil diturunkan ke Basecamp yang berlokasi di pintu masuk kaki Gunung Salak. Beberapa dari antara mereka ditandu karena kelelahan.<br><br><span>"Sebagian korban kita bawa menggunakan tandu, ada beberapa anggota relawan SAR yang menjemput keatas karena kondisi para peziarah ini ada yang sakit dan kelelahan. Mereka tak sanggup untuk turun kebawah dan bertahan semalaman di Pos 7 dan Pos 4," kata Andre.<br></span>Sementara itu, Kapolsek Cicurug Resor Sukabumi Kompol Sumaryoto mengaku sempat menerima laporan jika ada korban tersesat di Gunung Salak dari salah seorang ketua rombongan yang berada di Basecamp kaki gunung. Menerima laporan itu, sejumlah anggota kepolisian kemudian berusaha melakukan komunikasi dengan sejumlah pendaki yang dilaporkan tersesat.<br><br>"Mereka berangkat dengan 12 orang Guide penduduk setempat, yang manjat ke atas itu ada 47 orang keseluruhannya. Diantara rombongan ada yang berusia lanjut dan anak-anak, saat manjat mereka tidak dibekali peralatan pendakian seperti senter dan perbekalan yang cukup," terang Sumaryoto.<br><br>Menurut Sumaryoto, perangkat komunikasi yang dibawa rombongan tidak berfungsi maksimal karena buruknya cuaca diatas gunung hingga menghambat penyelamatan.<br><br>"Kita akhirnya menunggu tim SAR yang langsung menjemput ke Pos 4 dan Pos 7 karena berdasar komunikasi terakhir mereka berada disana. Sekarang Alhamdulillah, semua berhasil dievakuasi tanpa kekurangan satu apapun," tandasnya. <br>', 'berita_3.jpg', 1),
(4, 'Satu Pendaki Tewas, Kepala Balai Kembali Ingatkan Dilarang Naik ke Gunung Salak', '2017-08-13 21:14:00', '<b></b><span>Kepala Balai Gunung Salak, Ugur Gursala, membenarkan ada wisatawan yang meninggal dunia di jalur pendakian ke <a href="http://indeks.kompas.com/tag/Gunung-Salak" target="_blank" rel="">Gunung Salak </a>melalui jalur Cidahu.</span>Korban meninggal bernama Ruslan (54), warga Gerunggang, Pangkalpinang, Provinsi Kepulauan Bangka Belitung.Korban mendaki Gunung Salak bersama rombongan dari pencinta alam YPS-45 Jakarta yang berjumlah 14 pria dewasa. Mereka masuk melalui jalur Cidahu pada Jumat (27/1/2017) sekitar pukul 17.00 WIB."Mereka hanya diizinkan berkemah biasa di camping ground. Karena saat ini wisata minat khusus pendakian ke Gunung Salak sedang ditutup. Namun mereka nekat memaksakan diri masuk jalur pendakian," kata Ugur dalam pesan singkat, Senin (30/1/2017) siang.<span>Menurut dia, pada tanggal 28 Januari 2017 sekira jam 20.00 WIB, petugas menerima SMS minta bantuan evakuasi karena satu orang dalam keadaan kritis.<br></span>"Akhirnya kami mengirimkan tim evakuasi. Namun ternyata korban sudah meninggal di tempat di HM 33 jalur puncak Gunung Salak," tuturnya.Jenazah korban setelah dievakuasi dari ketinggian sekitar 2.000 meter dari permukaan laut (m dpl) langsung dibawa ke Rumah Sakit Sekarwangi, Cibadak."Hasil visum korban meninggal akibat serangan jantung," imbuh dia.', 'berita_41.jpg', 1),
(6, 'Menikmati Senja dan Semburat Jingga Gunung Salak', '2017-08-13 21:51:09', 'Matahari tenggelam di antara bukit kebun teh memiliki ciri khasnya tersendiri. Senja berkabut berlatar kebun teh dan Gunung Salak menjadikan matahari tenggelam di sana teramat syahdu.<br><br>Kabut awan kiriman dari Kota Sukabumi perlahan berarak menyusuri kaki Gunung Salak untuk menyejukkan si kota hujan. Awan dan kabut seputih kapas pun menjadi jingga keemasan ketika matahari senja memancar. Saat itulah keindahan matahari tenggelam menjadi syahdu.<br>', 'berita_61.jpg', 1),
(7, 'Pendaki Angkut 696 Kg Sampah Turun Gunung Salak', '2017-08-23 18:36:42', 'Gunung Salak dikenal memiliki keraragaman hayati, seperti habitat bagi Elang Jawa, maupun mamalia langka, yaitu Surili.Letaknya yang dekat dengan pusat kota Jakarta membuat Gunung Halimun Salak menjadi lokasi favorit para pendaki yang berasal dari Jabodetabek.<span>Sayangnya, kepopuleran dan keindahan Gunung Salak tak diiringi dengan kesadaran menjaga dan merawatnya oleh banyak oknum pendaki. Sudah menjadi rahasia umum, jika jalur pendakian di Gunung Salak kerap dipenuhi <a href="http://suara.com/tag/sampah" target="" rel="">sampah</a> para pendaki.<br></span><span>Acara di arena Gunung Salak dimulai sejak 18 Agustus lalu, dan telah mengumpulkan 696 kilogram kantong sampah.<br></span>Peserta yang terdiri dari lapisan masyarakat, anggota komunitas TrashBag, maupun perwakilan dari Aqua, telah memilah sampah yang didapat menjadi lima kategori. Yaitu, sampah plastik, kain, botol plastik, kaleng dan sterofoam.<span>"Ini acara tahunan, dua tahun sekali. Secara keseluruhan ada sekitar 1.300 peserta di seluruh Indonesia," tambah perempuan yang akrab disapa Nunu tersebut.<br></span>Sebagai salah satu pihak yang mendukung acara "Sapu Jagat 17 Gunung" secara serentak, Aqua melalui Senior Manager Sustainable Development AQUA Grup, Arif Fatullah mengatakan, kegiatan ini dapat menggugah kesadaran berbagai pihak baik pihak jajaran pemerintahan, swasta, kelompok masyarakat dan pihak lainnya.Dia juga mengatakan, keterlibatan Aqua Grup dalam aksi ini adalah sebagai bagian dari tanggung jawab perusahaan agar untuk bertanggung jawab terhadap sampah plastiknya."Sampah botol plastik dapat bermanfaat jika dikelola dengan baik. Sayangnya, masih banyak masyarakat yang membuang sampah sembarangan," tutup Arif.', 'berita_7.jpg', 1),
(8, 'ProsedurPendakian Gunung Salak yang Wajib Pendaki Ketahui', '2017-08-23 19:12:44', '<b>Prosedur Pendakian Gunung Salak: <br>A.  Kuota</b><br>Jumlah pengunjung pendakian di Gunung Salak sampai dengan saat ini belum adanya pembatasan/kuota, karena jumlah pengunjung yang masih relative kecil (± 10.000 pengunjung/tahun) serta kawasan masih  cukup untuk aktifitas dari pengunjung dengan nyaman.<br><br><b>B.  Pengajuan Ijin Pendakian</b><br>Pengunjung yang akan melakukan pendakian/trekking ke Gunung Salak diwajibkan untuk mendapatkan ijin. Perijinan ini bertujuan untuk mewujudkan tertib administrasi sebagai salah satu bentuk pelayanan kepada pengunjung, legalitas/keabsahan sebagai pengunjung Gunung Salak serta untuk memudahkan mengontrol dan memonitor aktifitas pengunjung.<br>Perijinan untuk pendakian di Gunung Salak dilaksanakan dengan sistem Booking (Reservasi), dengan ketentuan sebagai berikut :<br><br>a.     Reservasi diberlakukan bagi pendaki yang berasal dari dalam negeri (WNI) atau pendaki luar negeri yang memliki KITAS dan bertempat tinggal (residen) di Indonesia.<br><br>b.    Atau Warga Negara Asing (WNA) dengan diwakili oleh Trek Organizer (TO) yang ditunjuk.<br><br>c.     Reservasi dipusatkan di kantor Balai Taman Nasional Gunung Rinjani Jl. Raya Cipanas, Kec. Kabandungan, Malasari, Nanggung, Sukabumi, Jawa Barat 43368, Indonesia<br> Tel/Fax 0881-181-123<br> E-mail : adventurer.gnsalak@gmail.com<br> Atau juga dapat dilakukan di :<br><br>d.    Apabila pada saat reservasi tidak ada staf, reservasi dapat dilakukan oleh Petugas Piket (Petugas TN, Petugas Koperasi, atau Volunteer) yang ditugaskan, dengan catatan sesudahnya menulis data visitor tersebut pada buku tamu yang tersedia.<br><br>e.    Pengunjung wajib membayar tiket sesuai dengan besarnya biaya yang tertera.<br>Pengunjung pemula (baru pertama pendakian ke Gunung Salak) disarankan untuk mempelajari karakteristik dari medan pendakian, untuk mengetahuinya dapat dengan membaca di media informasi yang disediakan oleh pengelola, mengajak pendaki yang pernah melakukan pendakian ke Gunung Salak, serta bertanya pada petugas.<br><br>2.    Pemanduan<br>Setiap pengunjung/kelompok dsarankan untuk dapat memanfaatkan jasa pemanduan (Guide/Porter) dari masyarakat setempat yang direkomendasikan oleh petugas.<br><br>3.    Perubahan/Pembatalan Surat Ijin Pendakian/SIMAKSI Pendakian<br>Perubahan jadwal pendakian, dapat dilakukan dengan sebelumnya memberitahukan kepada petugas setempat, paling lambat sebelum kegiatan pendakian dilaksanakan.<br><br>Bagi calon pendaki yang sudah memegang Surat Ijin Pendakian / SIMAKSI pendakian tidak dapat menambah, jumlah, dan penambahan peserta pendakian diberlakukan sama seperti pengajuan Surat Ijin Pendakian / SIMAKSI Pendakian dari awal.<br><br>Pembatalan oleh calon pendaki dapat diterima, tetapi karcis masuk serta biaya-biaya lainnya yang telah dibayarkan tidak dapat dikembalikan (segala biaya menjadi resiko pendaki);<br><br>Pembatalan Surat Ijin Pendakian/ SIMAKSI pendakian dapat dilakukan jika terjadi Force Majeur, yaitu terjadinya bencana alam, seperti gunung meletus, angin kencang, hujan lebat, kebakaran hutan dan lain-lain yang dapat mengancam keselamatan pendaki, sehingga Gunung Salak perlu menutup kegiatan pendakian tanpa pemberitahuan terlebih dahulu. Dalam hal ini, tiket masuk yang telah dibayarkan oleh pendaki dapat ditarik dan diuangkan kembali;<br><br>4.    Batas Lama Pendakian<br>a.     Batas lama pendakian yang diijinkan di Gunung Salak untuk wisatawan antara 3 s/d 5 Hari, apabila lebih dari batas yang telah ditentukan agar dikomunikasikan dengan petugas;<br><br>b.    Jika ada tujuan khusus seperti ziarah, ritual budaya, dll dapat diberikan kelonggaran masalah waktu/lama pendakian (dengan menyesuaikan lamanya waktu yang dibutuhkan), serta dapat dikomunikasikan dengan petugas serta mendapatkan ijin dari Kepala Balai Gunung Salak;<br><br>c.     Bila pendaki melanggar ketentuan batas lama pendakian maka dianggap melanggar dan akan dikenakan sanksi.', 'berita_8.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `ci_sessions`:
--

--
-- Truncate table before insert `ci_sessions`
--

TRUNCATE TABLE `ci_sessions`;
--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0479ce81c2b1fec79d70707d0c3f328578371a04', '::1', 1510817306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831373330363b),
('04f5f7bc0d3158e880224028042506ceaa32381b', '::1', 1513235151, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531333233353135313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('080fb7d34ac23cb744c56e47553c962ea1889a04', '::1', 1510826269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832363236393b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('0be0eaff32dc048bfc3e58c2709b346272237b6b', '::1', 1510835255, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833353235343b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('0ccb00afcf86826cb21359bec1151e6618579fc3', '::1', 1510914961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931343638363b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('1243dce9fec8daf995ea6bbe481b5d3cbda65546', '::1', 1510889600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303838393430353b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('16f86bca6888b057941d7ab71a821c674243936c', '::1', 1510890351, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839303333383b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('1c119fcb29b49b53ac6a90347f71547893a67a94', '::1', 1510818793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831383531313b),
('2057b6df5e620d577da2df73211550236bab6494', '::1', 1515574961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531353537343733373b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('25d41439b837e13d326c0c785f0a45cc78215780', '::1', 1510899735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839393535373b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a36303030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226433643934343638303261343432353937353564333865366431363365383230223b613a363a7b733a323a226964223b733a323a223130223b733a333a22717479223b643a313b733a353a227072696365223b643a36303030303b733a343a226e616d65223b733a31313a2253756d6d65722054696d65223b733a353a22726f776964223b733a33323a226433643934343638303261343432353937353564333865366431363365383230223b733a383a22737562746f74616c223b643a36303030303b7d7d),
('279dae649efb11b4ee263861902258b4be82174e', '::1', 1510819088, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831383833303b),
('286923d325cfea26f380ad78556cf3677255734f', '::1', 1510898788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839383738303b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a36303030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226433643934343638303261343432353937353564333865366431363365383230223b613a363a7b733a323a226964223b733a323a223130223b733a333a22717479223b643a313b733a353a227072696365223b643a36303030303b733a343a226e616d65223b733a31313a2253756d6d65722054696d65223b733a353a22726f776964223b733a33323a226433643934343638303261343432353937353564333865366431363365383230223b733a383a22737562746f74616c223b643a36303030303b7d7d),
('2bf16a5bc63db2d3f33f21f121405f6f01930df0', '::1', 1510820469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832303436393b),
('2f3784c3d4a2d3fce381967125f285280804e10d', '::1', 1510832812, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833323633343b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('42de073a9a2003d5cb9b87c4bc07fe1d79826a09', '::1', 1513234724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531333233343638343b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('46c48476577ea29f959fc7f871364ecec2588b90', '::1', 1512808242, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323830383137303b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('4c1ce006fc559b3e3d06b7a9f4cd0d581187bdff', '::1', 1510892507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839323235303b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('4f3fd2260fc16501b41bcb8c578d73ba5e766c0e', '::1', 1510833050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833333035303b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('51ccdc360a00ba3c486cd07af17d8261f2b7755e', '::1', 1510827171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832373134373b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('56ea6a1336baadcb9ce1290088a60c7859b6c04b', '::1', 1510916462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931363230383b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('5c691ffada0a04916c35ec64d4ab84fa58e394f4', '::1', 1510915816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931353831363b),
('5ffd02500eca56862a16d0420cb8ef390279f9c6', '::1', 1510916730, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931363536323b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a33313030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a363a7b733a323a226964223b733a323a223132223b733a333a22717479223b643a313b733a353a227072696365223b643a33313030303b733a343a226e616d65223b733a32323a224564656c776569737320576f6d656e20536572696573223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a33313030303b7d7d),
('60556ce215b307b77cc64e1d627178b3dadeea03', '::1', 1510827110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832363832323b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('705bad4b98cc66f7048eb683c78815ab244459d8', '::1', 1510816940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831363638363b),
('77105d7ff3dafd96867286acfe3f709cbedc2eee', '::1', 1510914165, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931333839333b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('7b197aae6b8a5be46438f8c848ad06d7e456a546', '::1', 1510891820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839313539323b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('7d31e63fd372afaebed48ee78848f5a43ce58670', '::1', 1511667052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313636373035323b),
('826ba9c58c708956833ef16aa421c90f96fceefe', '::1', 1510837184, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833363839313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('8bd519298499baadb074a7abcdeee1cb5d1f5ba0', '::1', 1510892174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303839313930313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('8e12aa10941512b08c75fc7589b036dade51af10', '::1', 1510821252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832303936343b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('8f3ff1df9e1ffc906512d195b1dc1f059974bbad', '::1', 1511666663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313636363632343b),
('903965f1c0e6fd917d3b2240769456758cc5aa96', '::1', 1510825821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832353631373b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('9457ee7244bfc3705de9bcc935f488cc6e0497d7', '::1', 1510915793, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931353530363b),
('9c57ae1d23312db0b1854840c58903aded66fdb7', '::1', 1510900708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303930303538313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('a063fc3601cd7d54cbb7f381b4585d699efe7c6c', '::1', 1510907111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303930363834353b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a33313030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b613a363a7b733a323a226964223b733a323a223132223b733a333a22717479223b643a313b733a353a227072696365223b643a33313030303b733a343a226e616d65223b733a32323a224564656c776569737320576f6d656e20536572696573223b733a353a22726f776964223b733a33323a226332306164346437366665393737353961613237613063393962666636373130223b733a383a22737562746f74616c223b643a33313030303b7d7d),
('a42e799172ad69aad1f589d4921811b49d6836a3', '::1', 1510817873, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831373738393b),
('a66996f832b28d6a2ba1b4587063f854d75668d7', '::1', 1510825405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832353131333b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('a7ba3dd6dd3fdd771bdbf777ce97df0086d0af62', '::1', 1513238061, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531333233373939313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('add91673fafcb77b2579ff6458cbb9ddb8a07891', '::1', 1510834806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833343639343b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('bab37e9cfe1a49bab6e09ab77d921171a9e17faa', '::1', 1510837244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833373233353b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('bff5ccaa39678867a23ed17c3d5bd16b00f43cea', '127.0.0.1', 1513234498, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531333233343335393b),
('c0a4956f6808238715367b6227207ef92b06215f', '::1', 1510834562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833343239393b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('c1ed789d9e767c39514a12a6b6cb100e04e4d9c0', '::1', 1510830655, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833303635353b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('c4372f0d23e5e31e70c8987c0a46ad62f0fb21bf', '::1', 1510830553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303833303334383b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('cae28b1d011cb902c49120f492354552e43ee2d8', '::1', 1510886353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303838363335323b),
('cc48eafa8b32b4d458fd59e3017fb3cc87342207', '::1', 1510915029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931353030313b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('d0da12b01495594e429dcbd4aea212c7634ab12c', '::1', 1510915945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931353831363b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('d4fab6040e06a27f0ffd76b32d1768c84b4e1b18', '::1', 1510821500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303832313238333b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('d7f46d2cccce4cafd6d335d97edd74dab58911cc', '::1', 1510819797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831393533373b),
('de0b9b9c171dcdeb039b3f92cd3161200e25399d', '::1', 1510818224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831383134383b),
('ebdb1927d8ac8b8f29e5603d90aefc91f0c327eb', '::1', 1510914265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303931343236353b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b),
('f8d95bf6db56de6e02cb1e5e7218ead880ef1a10', '::1', 1510819880, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303831393838303b),
('fab56807a1e93187b3f8cee9d1e5baf0ba067eea', '::1', 1510907169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303930373135393b757365726e616d657c733a353a2261646d696e223b6e616d617c733a31333a2241646d696e6973747261746f72223b6e696b7c733a313a2231223b6a61626174616e7c733a31333a2241646d696e6973747261746f72223b666f746f7c733a31303a22757365725f312e706e67223b68616b7c733a31313a2253757065722041646d696e223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_peserta`
--
-- Pembuatan: 13 Nov 2017 pada 10.13
--

DROP TABLE IF EXISTS `daftar_peserta`;
CREATE TABLE `daftar_peserta` (
  `id_reg` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `daftar_peserta`:
--

--
-- Truncate table before insert `daftar_peserta`
--

TRUNCATE TABLE `daftar_peserta`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `nama_galeri` text NOT NULL,
  `foto_galeri` text NOT NULL,
  `kat_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `galeri`:
--

--
-- Truncate table before insert `galeri`
--

TRUNCATE TABLE `galeri`;
--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_galeri`, `foto_galeri`, `kat_galeri`) VALUES
(1, 'bunga soka', 'galeri_1.jpg', 'flora'),
(2, 'Edelweis', 'galeri_2.jpg', 'flora'),
(3, 'GALERI 3', '3.jpg', 'flora'),
(4, 'GALERI 4', '4.jpg', 'flora'),
(5, 'GALERI 5', '5.jpg', 'flora'),
(6, 'GALERI 6', '6.jpg', 'flora'),
(7, 'Elang', '7.jpg', 'fauna'),
(8, 'Burung', '8.jpg', 'fauna'),
(9, 'Babi Hutan', 'galeri_9.jpg', 'fauna'),
(10, 'Kumang Di Pohon', '10.jpg', 'fauna'),
(11, 'Monyet Liar', '11.jpg', 'fauna'),
(12, 'macan tutul', 'galeri_12.jpg', 'fauna'),
(13, 'kodok', 'galeri_13.jpg', 'fauna'),
(14, 'cacing besar', 'galeri_14.jpg', 'fauna'),
(15, 'kupu-kupu', '15.jpg', 'fauna'),
(16, 'Macan Hitam', 'galeri_16.jpeg', 'fauna'),
(17, 'Jalan Perkampungan Gunung Salak', 'galeri_17.jpg', 'panorama'),
(18, 'Rambu Peringatan Mendaki Gunung Salak', 'galeri_18.jpg', 'panorama'),
(19, 'papan keterangan lokasi dan habitat satwa liar', 'galeri_19.jpg', 'panorama'),
(20, 'Banner Mendaki Gunung Salak', 'galeri_20.jpg', 'panorama'),
(21, 'Puncak Gunung Salak', 'galeri_21.jpg', 'panorama'),
(22, 'Plang Pemberitahuan Mendaki Gunung Salak', 'galeri_22.jpg', 'panorama'),
(23, 'Plang Menuju Puncak Gunung Salak', 'galeri_23.jpg', 'panorama'),
(24, 'Plang Pemberitahuan Buat Para Pendaki Gunung', 'galeri_24.jpg', 'panorama'),
(25, 'orang yang tinggal di sekitar gunung salak', '25.jpg', 'budaya'),
(26, 'Penjaga Budaya di Kaki Gunung Salak', 'galeri_26.jpg', 'budaya'),
(27, 'GALERI 27', '27.jpg', 'budaya'),
(28, 'Palahlar (Dipterocarpus Hasseltii)', 'galeri_281.jpg', 'flora'),
(29, 'Tanjakan Iblis', 'galeri_29.jpg', 'panorama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `informasi`;
CREATE TABLE `informasi` (
  `id_info` int(11) NOT NULL,
  `judul_info` text NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar_info` text NOT NULL,
  `isi_info` text NOT NULL,
  `kategori` text NOT NULL,
  `tgl_agenda` date NOT NULL,
  `status_info` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `informasi`:
--

--
-- Truncate table before insert `informasi`
--

TRUNCATE TABLE `informasi`;
--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_info`, `judul_info`, `tgl_post`, `gambar_info`, `isi_info`, `kategori`, `tgl_agenda`, `status_info`) VALUES
(2, 'in house training Pengenalan dan Penggunaan Alat Pemantauan Kukang', '2017-08-13 22:16:13', 'agenda_2.jpg', 'Hari ini, Selasa 26 April 2016, bertempat di Kantor Balai Taman Gunung Salak, dilakukan&nbsp;in house training&nbsp;Pengenalan dan Penggunaan Alat Pemantauan Kukang. Kegiatan pelatihan yang merupakan kerjasama dengan Yayasan Inisiasi Alam Rehabilitasi telah dilakukan untuk ketiga kalinya. Sebelumnya dilaksanakan Pelatihan Konservasi Kukang dan Permasalahannya pada tahun 2012 serta Pelatihan Teknik Monitoring dan&nbsp;Handling&nbsp;Kukang pada tahun 2014.Agenda acara pelatihan ini dibuka dengan sambutan dan arahan Kepala Balai yang dilanjutkan dengan paparan dari Robithotul Huda mengenai Hasil Pemantauan Kukang di Gunung Salak. Pada paparan ini dijelaskan mengenai hasil pemantauan terhadap kukang lepasliar dengan alat radio telemetri serta hasil analisis melalui software Arc.GIS. Selanjutnya adalah paparan dari Muhidin mengenai Pengenalan Alat Pemantauan Kukang. Dijelaskan mengenai alat pemantauan berupa transmitter, antena dan receiver beserta cara penggunaannya. Pada kesempatan ini juga dilakukan praktek penggunaan alat.', 'Agenda', '2017-07-25', 1),
(3, 'Pembukaan Jalur Pendakian Gunung Salak', '2017-08-13 21:07:12', 'SE-pembukaan-jalur-pendakian-2017.jpg', 'Kepala Balai Gunung gunung pada 23 Maret 2017 menerbitkan Surat Edaran SE.459/T.14/TU/HMS/3/2017 yang memberlakukan pembukaan jalur pendakian Gunung Salak terhitung mulai tanggal 25 Maret 2017 pukul 00.00 WIB.\r\n\r\ngunung salak menghimbau kepada para pengunjung yang akan melakukan pendakian agar mematuhi peraturan yang berlaku dan menggunakan jalur resmi melalui pintu masuk Pasir Reungit, Cidahu, Cimelati, Girijaya. Jaga selalu keselamatan dan lengkapi dengan peralatan dan perbekalan yang cukup. Take nothing but picture, kill nothing but time and leave nothing but footprint. (woe)', 'Informasi Pendakian', '0000-00-00', 1),
(4, 'Jalur Resmi Pendakian Gunung Salak', '2017-08-23 19:29:19', 'informasi_4.jpg', 'Balai Taman Nasional Gunung gunung_salak Salak (gunung_salak salak-red) pada 23 Maret 2017 menerbitkan Surat Edaran SE.459/T.14/TU/HMS/3/2017 yang memberlakukan pembukaan jalur pendakian Gunung Salak terhitung mulai tanggal 25 Maret 2017 pukul 00.00 WIB.\r\n\r\ngunung_salak salak menghimbau kepada para pendaki gunung&nbsp;yang akan melakukan pendakian agar mematuhi peraturan yang berlaku dan menggunakan jalur resmi melalui pintu masuk Pasir Reungit,Cidahu, Desa Girijaya, Cimelati. Jaga selalu keselamatan dan lengkapi dengan peralatan dan perbekalan yang cukup. Take nothing but picture, kill nothing but time and leave nothing but footprint. (woe).', 'Informasi Pendakian', '0000-00-00', 1),
(7, 'Penutupan Jalur Pendakian Gunung Salak', '2017-08-13 21:05:35', 'informasi_7.jpg', 'Dalam rangka pemulihan kembali ekosistem hutan pada jalur pendakian puncak Gunung Salak serta memenuhi ketentuan keselamatan pengunjung berkaitan dengan kondisi cuaca yang ekstrim, Gunung Salak memberlakukan Penutupan Sementara Pendakian Gunung Salak terhitung mulai 1 Januari 2017 pukul 00:00 WIB hingga kondisi sudah memungkinkan untuk dibuka kembali. (woe)', 'Informasi Pendakian', '0000-00-00', 1),
(8, 'Informasi Jika Pendakian di Tutup Karena Cuaca Buruk', '2017-08-23 19:16:55', 'informasi_8.jpg', 'Informasi&nbsp;Penutupan Pendakian:<br>Penutupan jalur pendakian merupakan salah satu bentuk pengelolaan pendakian yang dilakukan dalam rangka pemulihan (recovery) ekosistem, antisipasi bahaya kebakaran akibat musim kemarau, dan antisipasi cuaca dingin akibat musim hujan yang disertai angin yang dapat membahayakan para pendaki.<br><br>Mekanisme penutupan ada 2 yaitu rutin dan insidentil (sewaktu-waktu bila dibutuhkan) yang kepastian penutupannya akan dikeluarkan oleh Balai Gunung Salak dan diumumkan melalui pintu-pintu masuk dan di Kantor Balai Gunung Salak).<br><br>A.    Penutupan Rutin<br><br>Penutupan jalur pendakian secara rutin direncanakan dilakukan selama 1 kali dalam 1 tahunnya yaitu pada waktu musim penghujan pada waktu puncak-puncaknya (biasanya terjadi pada bulan Desember s/ bulan Maret), selain hujan biasanya bahaya angin kencang menyertai pada waktu-waktu tersebut.<br><br>B.    Penutupan Insidentil<br><br>Penutupan pendakian dapat juga dilakukan sewaktu-waktu oleh Balai Gunung Salak bila diperlukan. Pendakian akan ditutup sementara bila terjadi bahaya gunung meletus, tanah longsor, angin ribut, dan kebakaran hutan untuk melindungi pengunjung dari bahaya kecelakaan.', 'Informasi Pendakian', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `bukti_gambar` text NOT NULL,
  `metode_pembayaran` text NOT NULL,
  `nama_bank` text NOT NULL,
  `no_rekening` text NOT NULL,
  `tgl_invoice` datetime NOT NULL,
  `status_invoice` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `invoice`:
--

--
-- Truncate table before insert `invoice`
--

TRUNCATE TABLE `invoice`;
--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_reg`, `bukti_gambar`, `metode_pembayaran`, `nama_bank`, `no_rekening`, `tgl_invoice`, `status_invoice`) VALUES
(9, 9, '', 'ATM BCA', '', '', '2017-08-11 19:08:42', 3),
(10, 10, 'konfirm_10.jpg', 'ATM MANDIRI', '', '', '2017-07-26 13:27:27', 3),
(11, 11, 'konfirm_11.jpeg', 'ATM MANDIRI', '', '', '2017-07-26 13:49:01', 3),
(16, 16, '', 'ATM BCA', '', '', '2017-11-17 11:51:30', 3),
(17, 17, '', 'ATM BCA', '', '', '0000-00-00 00:00:00', 0),
(18, 18, '', 'ATM BCA', '', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_sewa_alat`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `invoice_sewa_alat`;
CREATE TABLE `invoice_sewa_alat` (
  `id_inv_alat` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_gambar` text NOT NULL,
  `metode_pembayaran` text NOT NULL,
  `nama_bank` text NOT NULL,
  `no_rekening` text NOT NULL,
  `tgl_inv_alat` datetime NOT NULL,
  `status_inv_alat` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `invoice_sewa_alat`:
--

--
-- Truncate table before insert `invoice_sewa_alat`
--

TRUNCATE TABLE `invoice_sewa_alat`;
--
-- Dumping data untuk tabel `invoice_sewa_alat`
--

INSERT INTO `invoice_sewa_alat` (`id_inv_alat`, `id_sewa`, `total_bayar`, `bukti_gambar`, `metode_pembayaran`, `nama_bank`, `no_rekening`, `tgl_inv_alat`, `status_inv_alat`) VALUES
(1, 1, 120000, 'konfirm_penyewaan11.jpeg', 'ATM BCA', '', '', '2017-07-29 01:13:43', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_kuota`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `isi_kuota`;
CREATE TABLE `isi_kuota` (
  `id_isi` int(11) NOT NULL,
  `id_kuota` int(11) NOT NULL,
  `pintu_masuk` int(11) NOT NULL,
  `volume_kuota` int(5) NOT NULL,
  `kuota` int(5) NOT NULL,
  `status_isi` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `isi_kuota`:
--

--
-- Truncate table before insert `isi_kuota`
--

TRUNCATE TABLE `isi_kuota`;
--
-- Dumping data untuk tabel `isi_kuota`
--

INSERT INTO `isi_kuota` (`id_isi`, `id_kuota`, `pintu_masuk`, `volume_kuota`, `kuota`, `status_isi`) VALUES
(17, 5, 1, 69, 0, 1),
(18, 5, 2, 70, 0, 1),
(19, 5, 3, 72, 0, 1),
(20, 5, 4, 0, 0, 1),
(21, 7, 1, 8, 0, 1),
(22, 7, 2, 9, 0, 1),
(23, 7, 3, 10, 0, 1),
(24, 7, 4, 11, 0, 1),
(25, 8, 1, 10, 0, 1),
(26, 8, 2, 10, 0, 1),
(27, 8, 3, 10, 0, 1),
(28, 8, 4, 10, 0, 1),
(29, 9, 1, 57, 0, 1),
(30, 9, 2, 65, 0, 1),
(31, 9, 3, 65, 0, 1),
(32, 9, 4, 0, 0, 1),
(33, 10, 1, 1, 0, 1),
(34, 10, 2, 2, 0, 1),
(35, 10, 3, 3, 0, 1),
(36, 10, 4, 0, 0, 1),
(37, 11, 1, 53, 0, 0),
(38, 11, 2, 49, 0, 0),
(39, 11, 3, 50, 0, 0),
(40, 11, 4, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_alat`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `kategori_alat`;
CREATE TABLE `kategori_alat` (
  `id_kat` int(6) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kategori_alat`:
--

--
-- Truncate table before insert `kategori_alat`
--

TRUNCATE TABLE `kategori_alat`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_outdoor`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `kategori_outdoor`;
CREATE TABLE `kategori_outdoor` (
  `id_kat` int(6) NOT NULL,
  `nama_kategori` text NOT NULL,
  `filter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kategori_outdoor`:
--

--
-- Truncate table before insert `kategori_outdoor`
--

TRUNCATE TABLE `kategori_outdoor`;
--
-- Dumping data untuk tabel `kategori_outdoor`
--

INSERT INTO `kategori_outdoor` (`id_kat`, `nama_kategori`, `filter`) VALUES
(1, 'Jacket', 'jacket'),
(2, 'Backpack', 'backpack'),
(3, 'Tent', 'tent'),
(4, 'Tracking Shoes', 'shoes'),
(5, 'Climbing & Safety', 'safety'),
(6, 'Outdoor Living', 'outdoor_living');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id_komen` int(11) NOT NULL,
  `nama` text NOT NULL,
  `subject` text NOT NULL,
  `email` text NOT NULL,
  `pesan` text NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_baca` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `komentar`:
--

--
-- Truncate table before insert `komentar`
--

TRUNCATE TABLE `komentar`;
--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `nama`, `subject`, `email`, `pesan`, `tgl_post`, `status_baca`) VALUES
(1, 'agus', 'Info Persiapan Pendakian', 'agusfahrurroji@gmail.com', 'Kepada Adventurer Gn Salak. Saya dan teman teman akan mendaki Gunung Salak. Mohon informasinya untuk persiapan apa saja yang perlu kami siapkan. Terima Kasih', '2017-07-22 16:01:31', 1),
(2, 'Ali', 'Info Persiapan Pendakian', 'agusfahrurroji@gmail.com', 'Kepada Adventurer Gn Salak. Saya dan teman teman akan mendaki Gunung Salak. Mohon informasinya untuk persiapan apa saja yang perlu kami siapkan. Terima Kasih', '2017-07-22 16:01:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `konfirmasi`;
CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `bukti_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `konfirmasi`:
--

--
-- Truncate table before insert `konfirmasi`
--

TRUNCATE TABLE `konfirmasi`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota_pendakian`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `kuota_pendakian`;
CREATE TABLE `kuota_pendakian` (
  `id_kuota` int(11) NOT NULL,
  `tgl_kuota` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kuota_pendakian`:
--

--
-- Truncate table before insert `kuota_pendakian`
--

TRUNCATE TABLE `kuota_pendakian`;
--
-- Dumping data untuk tabel `kuota_pendakian`
--

INSERT INTO `kuota_pendakian` (`id_kuota`, `tgl_kuota`) VALUES
(5, '2017-08-14'),
(7, '2017-08-24'),
(8, '2017-08-25'),
(9, '2017-08-29'),
(10, '2017-08-31'),
(11, '2018-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_alat`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `orders_alat`;
CREATE TABLE `orders_alat` (
  `id_order` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `harga_sewa_satuan` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `tgl_sewa` datetime NOT NULL,
  `tgl_akhir_sewa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `orders_alat`:
--

--
-- Truncate table before insert `orders_alat`
--

TRUNCATE TABLE `orders_alat`;
-- --------------------------------------------------------

--
-- Struktur dari tabel `order_alat`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `order_alat`;
CREATE TABLE `order_alat` (
  `id_order_alat` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `harga_unit_sewa` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `order_alat`:
--

--
-- Truncate table before insert `order_alat`
--

TRUNCATE TABLE `order_alat`;
--
-- Dumping data untuk tabel `order_alat`
--

INSERT INTO `order_alat` (`id_order_alat`, `id_sewa`, `id_alat`, `harga_unit_sewa`, `qty`) VALUES
(1, 1, 5, 54500, 1),
(2, 1, 7, 65500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_wisata`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `pemesanan_wisata`;
CREATE TABLE `pemesanan_wisata` (
  `id_reg` int(11) NOT NULL,
  `nama_pengorder` text NOT NULL,
  `ktp_pengorder` text NOT NULL,
  `tlp_pengorder` text NOT NULL,
  `email_pengorder` text NOT NULL,
  `alamat_pengorder` text NOT NULL,
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `jml_peserta` smallint(3) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `pemesanan_wisata`:
--

--
-- Truncate table before insert `pemesanan_wisata`
--

TRUNCATE TABLE `pemesanan_wisata`;
--
-- Dumping data untuk tabel `pemesanan_wisata`
--

INSERT INTO `pemesanan_wisata` (`id_reg`, `nama_pengorder`, `ktp_pengorder`, `tlp_pengorder`, `email_pengorder`, `alamat_pengorder`, `tgl_order`, `jam_order`, `jml_peserta`, `subject`) VALUES
(1, 'a', '4234', '423432', 'agus_fahrurroji@ymail.com', 'sdfgv', '2017-07-13', '15:45:00', 2, 'pendakian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `peserta`;
CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `nama_peserta` varchar(30) NOT NULL,
  `ttl_peserta` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `pekerjaan_peserta` text NOT NULL,
  `alamat_peserta` text NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
  `kartu_identitas` text NOT NULL,
  `no_identitas` text NOT NULL,
  `tlp_peserta` text NOT NULL,
  `tlp_rumah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `peserta`:
--

--
-- Truncate table before insert `peserta`
--

TRUNCATE TABLE `peserta`;
--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_reg`, `nama_peserta`, `ttl_peserta`, `jenis_kelamin`, `pekerjaan_peserta`, `alamat_peserta`, `kota`, `provinsi`, `kartu_identitas`, `no_identitas`, `tlp_peserta`, `tlp_rumah`) VALUES
(1, 1, 'Agus Fahrurroji', '0000-00-00', 'Laki-Laki', 'Mahasiswa', 'Jl. Pahlawan Revolusi, RT.03/RW.03, Klender', 'Jakarta Timur', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181231'),
(2, 1, 'Ali Nurohaman', '0000-00-00', 'Laki-Laki', 'Mahasiswa', 'Jl. Naronggong, RT.03/RW.03, Rawalumbu', 'Bekasi', 'Jawa Barat', 'KTP', '3275051910920010', '081565219631', '0218775123'),
(3, 2, 'Abdurrahman Yusuf', 'Brebes, 20 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'Jl. Narogong, RT.03/RW.03, Rawalumbu', 'Bekasi', 'Jawa Barat', 'KTP', '3275052001920010', '081542219835', '0881181223'),
(4, 3, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'ghjgh', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181231'),
(5, 4, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'GFHF', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181223'),
(6, 5, 'Agus Fahrurroji', 'Brebes, 20 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'fhgfh', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181231'),
(7, 6, 'Abdurrahman Yusuf', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'gfh', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181223'),
(8, 7, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'gh', 'Bekasi', 'Jawa Barat', 'KTP', '3275052001920010', '081542219834', '0881181223'),
(9, 8, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'jh', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181231'),
(10, 9, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'vjh', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181223'),
(11, 10, 'Agus Fahrurroji', 'Brebes, 18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'hjjjjjjjk', 'Bekasi', 'Jawa Barat', 'KTP', '3275051801920008', '081542219834', '0881181231'),
(12, 11, 'Abdurrahman Yusuf', 'Brebes, 20 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'ssfd', 'Bekasi', 'Jawa Barat', 'KTP', '3275052001920010', '081542219835', '0881181223'),
(13, 12, 'riandi muhammad zaen', 'jakarta, 14-10-1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah utara 2, rt 002 rw 05 no.12 jakarta barat', 'Jakarta Barat', 'DKI Jakarta', 'KTP', '02134171919122324', '089674341547', '0215359958'),
(14, 12, 'adit', 'jakarta, 10-05-1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah utara 2, rt 003 rw 05 no.9 jakarta barat', 'Jakarta Barat', 'DKI Jakarta', 'KTP', '02132312123213', '08134382828', '0215359958'),
(15, 13, 'riandi muhammad zaen', 'jakarta, 14-10-1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah utara 2 RT002 RW005 no.12, kec.palmerah, kel.palmerah, jakarta barat. kodepos 11480', 'Jakarta Barat', 'DKI Jakarta', 'KTP', '02121331230001', '089674341547', '0215359958'),
(16, 13, 'miftahul fauzy', 'jakarta, 05-06-1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah utara 2, RT003 RW05 no.9, kec.palmerah, kel.palmerah, jakarta barat, kodepos 11480', 'Jakarta Barat', 'DKI Jakarta', 'KTP', '021311231310007', '081223243423', '0215359958'),
(17, 14, 'riandi muhammad zaen', '14 oktober 1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah utara 2', 'jakarta', 'jakarta ', 'KTP', '2134233423411', '089674341547', '0215359958'),
(18, 14, 'adit', 'jakarta 15 oktober 1995', 'Laki-Laki', 'mahasiswa', 'jalan palmerah ', 'jakarta', 'jakarta', 'KTP', '12131331212312', '089121212121', '02155533335'),
(19, 15, 'Agus Fahrurroji', 'Brebes,18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'Jakarta', 'Jakarta', 'Jawa Barat', 'KTP', '345646454', '08145422', '021211'),
(20, 16, 'Agus Fahrurroji', 'Brebes,18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'Jl. Chober, duren sawit', 'Jakarta Timur', 'DKI Jakarta', 'SIM', '30089709342498', '081542219834', '0216317446'),
(21, 17, 'Agus Fahrurroji', 'Brebes,18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'jajsg', 'sdf', 'fdsf', 'KTP', '235235234', '122', '12334'),
(22, 18, 'Agus Fahrurroji', 'Brebes,18 Januari 1992', 'Laki-Laki', 'Mahasiswa', 'Jakarta', 'Jakarta Timur', 'DKI Jakarta', 'KTP', '30089709342498', '081542219834', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pintu_masuk`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `pintu_masuk`;
CREATE TABLE `pintu_masuk` (
  `id_pintu` int(11) NOT NULL,
  `nama_pintu` text NOT NULL,
  `status_pintu` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `pintu_masuk`:
--

--
-- Truncate table before insert `pintu_masuk`
--

TRUNCATE TABLE `pintu_masuk`;
--
-- Dumping data untuk tabel `pintu_masuk`
--

INSERT INTO `pintu_masuk` (`id_pintu`, `nama_pintu`, `status_pintu`) VALUES
(1, 'Cidahu', 1),
(2, 'Cimelati', 1),
(3, 'Pasir Rengit', 1),
(4, 'Giri Jaya Cidahu', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `register`
--
-- Pembuatan: 16 Nov 2017 pada 12.47
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id_reg` int(11) NOT NULL,
  `nama_reg` text NOT NULL,
  `tlp_reg` text NOT NULL,
  `email_reg` text NOT NULL,
  `alamat_reg` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_order` datetime NOT NULL,
  `jml_peserta` smallint(3) NOT NULL,
  `pintu_masuk` text NOT NULL,
  `pintu_keluar` text NOT NULL,
  `tarif_per_orang` int(11) NOT NULL,
  `id_isi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `register`:
--

--
-- Truncate table before insert `register`
--

TRUNCATE TABLE `register`;
--
-- Dumping data untuk tabel `register`
--

INSERT INTO `register` (`id_reg`, `nama_reg`, `tlp_reg`, `email_reg`, `alamat_reg`, `tgl_masuk`, `tgl_order`, `jml_peserta`, `pintu_masuk`, `pintu_keluar`, `tarif_per_orang`, `id_isi`) VALUES
(9, 'Agus Fahrurroji', '081542219834', 'agusfahrurroji@gmail.com', 'ads', '2017-07-26', '0000-00-00 00:00:00', 1, 'Cimelati', 'Pasir Rengit', 5000, 37),
(10, 'Abdurahman yusuf', '081564328776', 'agusfahrurroji@gmail.com', 'adsad', '2017-07-27', '0000-00-00 00:00:00', 1, 'Pasir Rengit', 'Cimelati', 5000, 37),
(11, 'Abdurahman yusuf', '081542219834', 'yusufakbar341@gmail.com', 'adsad', '2017-07-26', '0000-00-00 00:00:00', 1, 'Pasir Rengit', 'Cidahu', 5000, 37),
(16, 'Agus Fahrurroji', '081542219834', 'agusfahrurroji@gmail.com', 'Jakarta', '2017-11-30', '2017-11-17 11:47:50', 1, 'Cidahu', 'Pasir Rengit', 5000, 0),
(17, 'Agus Fahrurroji', '123', 'agusfahrurroji@gmail.com', 'jakarta', '2018-01-30', '2017-12-14 08:54:13', 1, 'Cimelati', 'Pasir Rengit', 5000, 0),
(18, 'Agus Fahrurroji', '081542219834', 'agusfahrurroji@gmail.com', 'Jakarta', '2018-01-20', '2018-01-10 10:02:32', 1, 'Cidahu', 'Pasir Rengit', 5000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_alat`
--
-- Pembuatan: 17 Nov 2017 pada 06.32
--

DROP TABLE IF EXISTS `sewa_alat`;
CREATE TABLE `sewa_alat` (
  `id_sewa` int(11) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `tgl_sewa` date NOT NULL,
  `jam_cekin` time NOT NULL,
  `tgl_akhir_sewa` date NOT NULL,
  `jam_cekout` time NOT NULL,
  `nama_penyewa` text NOT NULL,
  `kartu_identitas` text NOT NULL,
  `no_identitas` text NOT NULL,
  `tlp` text NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `status_sewa` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `sewa_alat`:
--

--
-- Truncate table before insert `sewa_alat`
--

TRUNCATE TABLE `sewa_alat`;
--
-- Dumping data untuk tabel `sewa_alat`
--

INSERT INTO `sewa_alat` (`id_sewa`, `tgl_order`, `tgl_sewa`, `jam_cekin`, `tgl_akhir_sewa`, `jam_cekout`, `nama_penyewa`, `kartu_identitas`, `no_identitas`, `tlp`, `email`, `alamat`, `status_sewa`) VALUES
(1, '2017-07-28 00:00:00', '2017-08-01', '05:00:00', '2017-08-02', '05:00:00', 'Agus', 'KTP', '300321801922008', '081542219834', 'agusfahrurroji@gmail.com', 'Jl. Pahlawan Revolusi,RT.03/RW.03, Klender,Jakarta Timur', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif_wisata`
--
-- Pembuatan: 13 Nov 2017 pada 10.14
--

DROP TABLE IF EXISTS `tarif_wisata`;
CREATE TABLE `tarif_wisata` (
  `kode_tarif` varchar(6) NOT NULL,
  `jenis_wisata` text NOT NULL,
  `satuan` text NOT NULL,
  `jenis_kegiatan` text NOT NULL,
  `tarif` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `tarif_wisata`:
--

--
-- Truncate table before insert `tarif_wisata`
--

TRUNCATE TABLE `tarif_wisata`;
--
-- Dumping data untuk tabel `tarif_wisata`
--

INSERT INTO `tarif_wisata` (`kode_tarif`, `jenis_wisata`, `satuan`, `jenis_kegiatan`, `tarif`) VALUES
('Adv-w1', 'Wisata Alam', 'Per orang,Per paket', 'Tracking/Hicking/Climbing', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `invoice_sewa_alat`
--
ALTER TABLE `invoice_sewa_alat`
  ADD PRIMARY KEY (`id_inv_alat`);

--
-- Indexes for table `isi_kuota`
--
ALTER TABLE `isi_kuota`
  ADD PRIMARY KEY (`id_isi`);

--
-- Indexes for table `kategori_alat`
--
ALTER TABLE `kategori_alat`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `kategori_outdoor`
--
ALTER TABLE `kategori_outdoor`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kuota_pendakian`
--
ALTER TABLE `kuota_pendakian`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `orders_alat`
--
ALTER TABLE `orders_alat`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_alat`
--
ALTER TABLE `order_alat`
  ADD PRIMARY KEY (`id_order_alat`);

--
-- Indexes for table `pemesanan_wisata`
--
ALTER TABLE `pemesanan_wisata`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `pintu_masuk`
--
ALTER TABLE `pintu_masuk`
  ADD PRIMARY KEY (`id_pintu`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `sewa_alat`
--
ALTER TABLE `sewa_alat`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tarif_wisata`
--
ALTER TABLE `tarif_wisata`
  ADD PRIMARY KEY (`kode_tarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `invoice_sewa_alat`
--
ALTER TABLE `invoice_sewa_alat`
  MODIFY `id_inv_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `isi_kuota`
--
ALTER TABLE `isi_kuota`
  MODIFY `id_isi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `kategori_alat`
--
ALTER TABLE `kategori_alat`
  MODIFY `id_kat` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_outdoor`
--
ALTER TABLE `kategori_outdoor`
  MODIFY `id_kat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kuota_pendakian`
--
ALTER TABLE `kuota_pendakian`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `orders_alat`
--
ALTER TABLE `orders_alat`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_alat`
--
ALTER TABLE `order_alat`
  MODIFY `id_order_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemesanan_wisata`
--
ALTER TABLE `pemesanan_wisata`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pintu_masuk`
--
ALTER TABLE `pintu_masuk`
  MODIFY `id_pintu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sewa_alat`
--
ALTER TABLE `sewa_alat`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

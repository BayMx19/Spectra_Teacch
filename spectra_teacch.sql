-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2025 pada 03.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spectra_teacch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lessons`
--

INSERT INTO `lessons` (`id`, `module_id`, `title`, `description`, `order`, `created_at`, `updated_at`) VALUES
(6, 2, 'Bagian 1 - Pengantar Toilet Training dengan TEACCH', 'Toilet training merupakan salah satu tonggak perkembangan penting bagi setiap anak. Namun, bagi anak dengan gangguan spektrum autisme, toilet training seringkali menghadirkan tantangan berat yang memerlukan pendekatan khusus. Metode Treatment and Education of Autistic and Related Communication-Handicapped Children (TEACCH) menawarkan pembelajaran dan pengajaran yang terstruktur dan berpusat pada visual, yang terbukti efektif dalam mendukung anak dengan gangguan spektrum autisme.', 1, '2025-05-30 22:06:32', '2025-05-30 22:14:29'),
(7, 2, 'Bagian 2 - Tahap Persiapan: Membangun Fondasi Keberhasilan', 'Sebelum memulai toilet training, tahap persiapan yang matang adalah kunci untuk membangun fondasi keberhasilan. Persiapan melibatkan penilaian kesiapan anak, pengumpulan data awal, penetapan tujuan, penyesuaian lingkungan toilet, dan pengumpulan materi visual yang diperlukan.', 2, '2025-05-30 22:06:32', '2025-05-30 22:06:32'),
(8, 2, 'Bagian 3 - Implementasi TEACCH dalam Toilet Training', '', 3, '2025-05-30 22:06:32', '2025-05-30 22:06:32'),
(9, 2, 'Bagian 4 - Visual Pendukung, Contoh, dan Panduan Penyusunan', '', 4, '2025-05-30 22:06:32', '2025-05-30 22:06:32'),
(10, 2, 'Bagian 5 - Generalisasi', 'Setelah anak dengan gangguan spektrum autisme mulai menunjukkan keberhasilan dalam menggunakan toilet secara konsisten di satu lingkungan utama (di rumah), tujuan selanjutnya adalah membantu menggeneralisasi keterampilan toileting ke lingkungan lain dan mempertahankannya dalam jangka panjang. Generalisasi dan pemeliharaan adalah tahap krusial yang seringkali memerlukan perencanaan dan pengajaran yang sama sistematisnya dengan tahap awal.', 5, '2025-05-30 22:06:32', '2025-05-30 22:06:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_29_145752_create_modules_table', 1),
(5, '2025_05_29_145807_create_lessons_table', 1),
(6, '2025_05_31_024840_create_sub_lessons_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `title`, `description`, `pdf_path`, `created_at`, `updated_at`) VALUES
(2, 'Modul TEACCH Toilet Training Bagi Orang Tua Anak Dengan Gangguan Spektrum Autisme', NULL, 'modules/x7BeVaXMKUFgYlkZU3Bhv4H6ptogH6cp5d8trfQF.pdf', '2025-05-30 22:02:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7FfVZWQ2tF2z7CqSqS2wNYY5qu2EdJzni2doPRc1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHRSOE1uOVhXQVZzeDRUTlRNT3dodUN0V0ZsWmt0Z1BjbmszZExjMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9tYXN0ZXJfdXNlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0ODY2Njc4Njt9fQ==', 1748689184),
('oXUzp3eAHP5VUfwp5lpBBY1NSBi6xv9rrQ2Y357M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHNGSUxIdmZUaDR2ck9ZTWtGSmM1dnN6dnZ4bmdVUVNDaW5oNUpXWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748848794),
('S2y1ZFAXFvkdJZFBmPsPs3BLRc2Q6XbS6X0t7PEi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0tYMGpERVNITTM3dzNHZjlOMG5nRkozRjdtRkxXR1dPcUI0Y0lueiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748689110),
('SRLP9HwZviL2Br7dfuQqguXIstsD4bMpWEfMyuyw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1lQUW96RkdHZnlqbkI5ZHdqUklIb2xvaEdpdkZIczZJOEI4U1l3RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748848795),
('TqNSZ16RmdNVge0F9JkzTBJ65ceeP4KgcHRlRBhM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid0R3WlNkb0ZWbnhOOUhpSU8zcVhyNGV2Z0tpRDVOMGk2RG0xSURNVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sZXNzb25zLzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0ODg0ODk4ODt9fQ==', 1748850456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_lessons`
--

CREATE TABLE `sub_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `table_data` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_lessons`
--

INSERT INTO `sub_lessons` (`id`, `lesson_id`, `title`, `description`, `table_data`, `image_path`, `order`, `created_at`, `updated_at`) VALUES
(11, 6, '1.	Memahami Anak dengan Gangguan Spektrum Autisme dan Kebutuhan Toilet Training', 'Anak dengan gangguan spektrum autisme sering mengalami kesulitan dalam toilet training bukan karena kurangnya kemauan, melainkan karena perbedaan dalam cara mereka memproses informasi, berkomunikasi, dan berinteraksi dengan lingkungan. Toilet training yang umum digunakan untuk anak neurotipikal seringkali tidak efektif dan justru dapat menimbulkan frustrasi bagi anak dengan gangguan spektrum autisme dan orang tua. Beberapa faktor yang berkontribusi terhadap hambatan toilet training meliputi.\r\na.	Kesulitan Pemrosesan Sensorik\r\n		Anak dengan gangguan spektrum autisme mungkin sangat sensitif atau kurang sensitif terhadap rangsangan sensorik di kamar mandi, seperti suara siraman (flush) yang keras, suhu dudukan toilet yang dingin, bau tertentu, atau cahaya yang terlalu terang. Ketidaknyamanan ini dapat menyebabkan penolakan atau kecemasan terhadap dan saat di kamar mandi.\r\nb.	Kesulitan Komunikasi\r\n	Beberapa anak dengan gangguan spektrum autisme mungkin mengalami kesulitan dalam memahami instruksi verbal.\r\nc.	Preferensi terhadap Rutinitas dan Prediktabilitas\r\n	Perubahan dalam rutinitas, seperti transisi dari popok ke toilet, dapat menjadi sumber stres bagi anak dengan gangguan spektrum autisme yang sangat rigid.\r\nd.	Kesulitan Memahami Isyarat Tubuh\r\n	Anak dengan gangguan spektrum autisme kurang menyadari atau kesulitan menginterpretasikan sensasi tubuh yang menandakan kandung kemih telah penuh.\r\n	Hambatan tersebut bukanlah sekadar \"tidak mau ke toilet\", melainkan seringkali berakar pada kesulitan yang lebih fundamental dalam memahami isyarat tubuh, mengatasi kecemasan terhadap hal baru, atau menghadapi ketidaknyamanan sensorik di lingkungan toilet. Oleh karena itu, intervensi toilet training tidak hanya berfokus pada tindakan fisik \"duduk di toilet\", tetapi juga mengatasi akar hambatan.', NULL, NULL, 1, '2025-05-30 23:11:32', '2025-05-30 23:11:32'),
(12, 6, '2.	Struktur TEACCH dalam Toilet Training', 'a.	Struktur Fisik (Physical Structure)\r\n	Mengacu pada pengaturan lingkungan fisik yang jelas dan terorganisir. Dalam konteks toilet training, struktur fisik berarti menciptakan lingkungan kamar mandi yang minim distraksi, dengan batas-batas yang jelas, dan semua perlengkapan mudah dijangkau. Misalnya, mainan yang tidak perlu harus disingkirkan, dan area untuk setiap aktivitas (misalnya, duduk di toilet, mencuci tangan) ditandai secara visual.\r\nb.	Jadwal Visual (Visual Schedules)\r\n	Anak dengan gangguan spektrum autisme berkembang dengan baik dalam rutinitas yang dapat diprediksi. Jadwal yang konsisten untuk kunjungan ke toilet membantu mengantisipasi kapan waktu berikutnya untuk ke kamar mandi, mengurangi resistensi terhadap transisi, dan membangun pola. Jadwal dikomunikasikan melalui gambar, objek, atau bahkan tulisan, tergantung pada tingkat pemahaman. Jadwal visual yang terkonsistensi membantu mengembangkan kemandirian dalam manajemen waktu dan mengurangi kecemasan yang seringkali muncul akibat ketidakpastian.\r\nc.	Independent Work System (IWS) dan Penetapan Ekspektasi (Establishment of Expectations)\r\n	Penting untuk mengkomunikasikan dengan jelas apa yang diharapkan darinya selama proses toilet training mencakup perilaku di kamar mandi, langkah-langkah yang harus diikuti dan diselesaikan, dan hasil yang diharapkan. Penetapan ekspetasi paling baik disampaikan melalui visual dengan kesepakatan (persetujuan) bersama. Ketika ekspektasi jelas, anak dengan gangguan spektrum autisme lebih mudah memahami tugas, dan orang tua lebih mudah memberikan serta konsekuensi dan reinforcement yang sesuai.\r\nd.	Struktur Visual\r\nVisual seperti gambar, foto, , atau objek, digunakan untuk mengkomunikasikan informasi atau tugas, memberikan instruksi, menjelaskan urutan langkah-langkah tugas, dan membantu memahamkan konsep abstrak.\r\n	Penting untuk dipahami bahwa struktur TEACCH bekerja secara sinergis dan saling terkait. Struktur fisik yang baik akan memudahkan implementasi jadwal visual yang konsisten. Jadwal visual yang konsisten, pada gilirannya, akan membantu memperjelas ekspektasi. Kegagalan dalam menerapkan satu aspek dapat melemahkan efektivitas keseluruhan pendekatan. Sebagai contoh, jika lingkungan kamar mandi kacau dan penuh distraksi (struktur fisik buruk), jadwal visual yang telah disiapkan mungkin akan sulit diikuti. Demikian pula, tanpa jadwal yang jelas, ekspektasi mengenai kapan harus ke toilet menjadi tidak pasti, meskipun sudah ada visualisasi langkah-langkahnya. Interdependensi yang kuat antar prinsip ini menunjukkan bahwa TEACCH memerlukan perencanaan dan implementasi yang cermat.', NULL, NULL, 2, '2025-05-30 23:11:32', '2025-05-30 23:11:32'),
(13, 6, '3.	Manfaat TEACCH dalam Toilet Training', 'a.	Mengurangi Kecemasan dan Perilaku Menantang\r\n	Dengan membuat proses toilet training lebih dapat diprediksi dan mudah dipahami, kecemasan dapat berkurang secara signifikan, yang pada akhirnya dapat mengurangi perilaku menantang yang mungkin muncul sebagai respons terhadap kebingungan atau stres.\r\nb.	Meningkatkan Kemandirian\r\n	Tujuan akhir dari toilet training adalah kemandirian.\r\nc.	Memanfaatkan Kekuatan Belajar Visual\r\n	Banyak anak dengan gangguan spektrum autisme memiliki kekuatan dalam memproses informasi visual. TEACCH secara langsung memanfaatkan gaya belajar tersebut, membuat informasi lebih mudah dicerna dan diingat.\r\nd.	Meningkatkan Kepercayaan Diri\r\n	Setiap keberhasilan kecil dalam toilet training, akan membangun rasa pencapaian dan meningkatkan kepercayaan diri.', NULL, NULL, 3, '2025-05-30 23:11:32', '2025-05-30 23:11:32'),
(14, 7, '1.	Mengidentifikasi Kesiapan Anak dengan Gangguan Spektrum Autisme', 'Mengidentifikasi indikasi kesiapan adalah langkah awal yang perlu dilaksanakan oleh orang tua. Memulai toilet training sebelum anak siap secara fisik, kognitif, atau emosional dapat menyebabkan frustrasi bagi orang tua bahkan dapat memperlambat kemajuan. Beberapa indikasi kesiapan yang perlu diobservasi meliputi.\r\na.	Menyadari atau menunjukkan ketidaknyamanan ketika popoknya (fase peralihan popok ke toilet) basah atau kotor (misalnya, menarik-narik popok, memberitahu pengasuh).\r\nb.	Menunjukkan minat pada toilet atau perilaku orang lain saat menggunakan toilet (misalnya, mengikuti pengasuh ke kamar mandi, bertanya tentang toilet).\r\nc.	Mampu mengikuti instruksi sederhana, seperti \"Duduk\" atau \"Ayo ke kamar mandi\".\r\nd.	Anak dapat tetap kering (tidak BAK atau BAB) selama periode waktu tertentu, idealnya minimal 1 hingga 2 jam.\r\ne.	Telah memiliki pola BAB yang relatif teratur dan dapat diprediksi.\r\nf.	Telah mampu berjalan ke atau dan dari kamar mandi secara mandiri dan memiliki keseimbangan yang cukup untuk duduk di toilet selama 2-5 menit.\r\n	Penting untuk diingat bahwa kesiapan pada anak dengan autisme mungkin tidak selalu tampak jelas atau mengikuti pola yang sama seperti anak neurotipikal. Beberapa diantaranya mungkin tidak menunjukkan semua tanda kesiapan secara spontan uhuy. Dalam kasus seperti tersebut, kesiapan perlu dibangun atau diciptakan melalui pengenalan konsep toilet training secara bertahap dan pembiasaan terhadap rutinitas ke kamar mandi.', NULL, NULL, 1, '2025-05-30 23:14:32', '2025-05-30 23:14:32'),
(16, 7, '3.	Menetapkan Tujuan Jangka Pendek', 'Penting untuk memahami bahwa toilet training merupakan proses yang panjang dan bertahap. Setiap langkah kecil menuju kemandirian adalah sebuah pencapaian yang patut dirayakan. Tujuan awal mungkin tidak langsung berupa anak bisa BAK dan BAB di toilet secara mandiri. Penyusunan tujuan dapat mengadaptasi dari S-M-A-R-T. SMART adalah akronim yang membantu orang tua memastikan tujuan terstruktur dan memiliki peluang lebih besar untuk tercapai. Berikut adalah deskripsi.\r\na.	S - Spesifik (Specific)\r\n	Tujuan harus jelas dan tidak ambigu. Hindari pernyataan yang terlalu umum.\r\n1.	Apa yang ingin dicapai secara spesifik?\r\n2.	Mengapa tujuan ini penting?\r\n3.	Siapa saja yang terlibat?\r\n4.	Di mana ini akan terjadi?\r\n5.	Batasan atau persyaratan apa yang ada?\r\nb.	M - Terukur (Measurable)\r\n	Orang tua harus memiliki cara untuk mencatat kemajuan dan mengetahui kapan anak dengan gangguan spektrum autisme telah mencapai tujuan. Pertimbangkan hal sebagai berikut.\r\n1.	Bagaimana orang tua akan tahu bahwa anak dengan gangguan spektrum autisme telah mencapai tujuan?\r\n2.	Indikator spesifik apa yang akan digunakan untuk mengukur kemajuan?\r\n3.	Berapa banyak? Berapa sering?\r\nc.	A - Dapat Dicapai (Achievable)\r\n	Tujuan harus realistis dan dapat dicapai dengan sumber daya dan waktu yang orang tua miliki. Pertimbangkan hal sebagai berikut.\r\n1.	Apakah tujuan mungkin untuk dicapai?\r\n2.	Apakah anak dengan gangguan spektrum autisme telah memiliki keterampilan, pengetahuan, dan sumber daya yang dibutuhkan?\r\nd.	R - Relevan (Relevant)\r\n	Tujuan harus sesuai dengan tujuan jangka panjang dan taraf kemampuan. Pertimbangkan:\r\n1.	Apakah tujuan penting bagi dan sesuai dengan urgensi?\r\n2.	Apakah sekarang waktu yang tepat untuk mencapai tujuan?\r\n3.	Bagaimana tujuan akan membantu anak dengan gangguan spektrum mencapai visi yang lebih besar?\r\ne.	T - Terikat Waktu (Time-bound)\r\n	Tujuan harus memiliki kerangka waktu yang jelas, termasuk tanggal mulai dan tanggal selesai. Pertimbangkan:\r\n1.	Kapan melaksanakan mencapai tujuan?\r\n2.	Apa tenggat waktu spesifik memulai dan selesai?\r\n	Mari kita kaitkan tentukan tujuan toilet training dengan kerangka SMART.\r\na.	S - Spesifik (Specific)\r\n	Perilaku spesifik yang diharapkan adalah sebagai berikut.\r\n1.	Mengkomunikasikan kebutuhan untuk ke toilet (verbal atau isyarat).\r\n2.	Duduk di toilet atau pispot untuk waktu yang ditentukan.\r\n3.	Melepaskan dan memakai celana.\r\n4.	Menyiram toilet (jika mampu dan aman).\r\nb.	M - Terukur (Measurable)\r\n1.	Frekuensi Keberhasilan\r\n	Mencatat berapa kali keberhasilan BAK dan BAB di toilet atau pispot dibandingkan dengan kejadian mengompol atau mengotori celana dalam periode waktu tertentu (misalnya, catatan keberhasilan per hari atau per minggu).\r\n2.	Tingkat Kemandirian\r\n	Mengukur tingkat bantuan yang dibutuhkan dalam setiap langkah (misalnya, membutuhkan bantuan penuh, verbal, atau pengawasan saja).\r\n3.	Pengurangan Insiden\r\n	Memantau penurunan frekuensi kejadian mengompol atau mengotori celana dari waktu ke waktu.\r\nc.	A - Dapat Dicapai (Achievable)\r\n	Tujuan dianggap dapat dicapai apabila anak menunjukkan indikasi kesiapan toilet training.\r\nd.	R - Relevan (Relevant)\r\n	Toilet training dianggap relevan dengan perkembangan dan kebutuhan diri dan praktis mengurangi ketergantungan pada popok.\r\ne.	T - Terikat Waktu (Time-bound)\r\n1.	Periode Waktu Fleksibel\r\n	Menetapkan perkiraan rentang waktu untuk mencapai tujuan, sambil tetap fleksibel terhadap perkembangan. Misalnya, dalam 2-4 bulan ke depan, anak dengan gangguan spektrum autisme diharapkan dapat BAK/BAB di toilet dengan sedikit bantuan.\r\n2.	Target Jangka Pendek\r\n	Menetapkan target-target kecil dalam kerangka waktu yang lebih singkat. Misalnya, minggu ini, orang tua akan fokus membiasakan duduk di toilet selama 5 menit setelah bangun tidur dan sebelum tidur.\r\n	Penetapan tujuan jangka pendek toilet training dengan kerangka SMART adalah sebagai berikut.\r\n\"Dalam waktu 3 bulan ke depan (Terikat Waktu), anak dengan gangguan spektrum autisme akan dapat mengkomunikasikan kebutuhan untuk BAK dan BAB serta duduk di toilet dengan keberhasilan setidaknya 5 dari 7 hari dalam seminggu (Spesifik dan Terukur) dengan pengawasan minimal dan bantuan verbal (Dapat Dicapai), yang merupakan area penting dalam kemandirian (Relevan).\"', NULL, NULL, 3, '2025-05-30 23:14:32', '2025-05-30 23:14:32'),
(17, 7, '4.	Mempersiapkan Lingkungan Toilet Training', 'a.	Struktur Fisik yang Jelas\r\n1.	Ciptakan lingkungan kamar mandi yang terorganisir dengan baik dan minim distraksi visual maupun auditori.\r\n2.	Gunakan pembatas visual jika perlu, seperti sekat.\r\n3.	Singkirkan barang-barang yang tidak relevan.\r\n4.	Sediakan wadah penyimpanan untuk mainan (untuk reinforcement) atau perlengkapan toilet.\r\nb.	Keamanan dan Kenyamanan\r\n1.	Pastikan toilet aman dan nyaman.\r\n2.	Gunakan dudukan toilet khusus (potty seat atau reducer ring) agar tidak merasa takut jatuh ke lubang toilet.\r\n3.	Sediakan pijakan kaki (footstool) jika kaki belum dapat mencapai lantai. Pijakan kaki tidak hanya memberikan rasa stabil dan aman, tetapi juga membantu mencapai posisi jongkok yang lebih alami dan efektif untuk BAB.\r\nc.	Pertimbangan Hambatan Sensori\r\n	Anak dengan gangguan spektrum autisme sering memiliki sensitivitas sensori yang unik. Modifikasi lingkungan untuk mengatasi potensi pemicu stres sensori adalah krusial.\r\n1.	Suara\r\n	Suara flush yang keras bisa sangat mengganggu. Kenalkan suara flush secara bertahap, misalnya dengan membiarkan anak menyiram saat tidak ada apa-apa di toilet, atau menyiram saat anak berada agak jauh dari toilet.\r\n2.	Cahaya\r\n	Hindari pencahayaan yang terlalu terang, berkedip, atau menghasilkan suara dengung (seperti beberapa lampu neon). Sebaiknya gunakan lampu dengan dimmer, lampu tambahan dengan cahaya lembut, atau biarkan pintu sedikit terbuka untuk pencahayaan alami jika memungkinkan.\r\n3.	Suhu dan Bau\r\n	Jaga suhu kamar mandi agar tetap nyaman dan tidak terlalu berbeda dengan suhu ruangan lain di rumah. Jika anak sensitif terhadap bau, pastikan ventilasi baik atau gunakan pengharum ruangan yang sangat lembut dan alami (jika dapat ditoleransi anak).\r\n4.	Sentuhan\r\n	Beberapa anak dengan gangguan spektrum autisme mungkin tidak suka dengan dudukan toilet yang terasa dingin atau keras. Pertimbangkan untuk menggunakan dudukan toilet yang empuk atau dilapisi.\r\nd.	Menjadikan Toilet Tempat yang Positif\r\na.	Ciptakan asosiasi positif dengan kamar mandi.\r\nb.	Sediakan beberapa mainan, atau aktivitas menarik yang hanya boleh diakses hanya saat berada di toilet atau sedang dalam sesi toilet training.\r\n	Modifikasi lingkungan bukan hanya sekadar tentang menciptakan kenyamanan, tetapi secara pro aktif bertujuan untuk menghilangkan atau meminimalkan hambatan sensori yang dapat menggagalkan seluruh upaya toilet training. Anak dengan gangguan spektrum autisme yang merasa tidak aman, terancam, atau terganggu secara sensori di kamar mandi tidak akan berada dalam kondisi optimal untuk belajar keterampilan baru. Oleh karena itu, penyesuaian lingkungan berdasarkan kebutuhan sensori adalah prasyarat fundamental sebelum memulai pengajaran.', NULL, NULL, 4, '2025-05-30 23:14:32', '2025-05-30 23:14:32'),
(18, 7, '5.	Menyusun Visual', 'a.	Pastikan gambar, foto, atau objek yang akan digunakan untuk membuat jadwal visual, Independent Work System (IWS), dan struktur visual disusun dari yang nyata ke abstrak.\r\nb.	Pastikan gambar, foto, atau objek jelas dan mudah dipahami.', NULL, NULL, 5, '2025-05-30 23:14:32', '2025-05-30 23:14:32'),
(22, 7, '2.	Asesmen Awal', 'Setelah ada indikasi kesiapan, langkah selanjutnya adalah asesmen awal. Asesmen dilaksanakan selama satu hingga dua minggu atau sampai anak dengan gangguan spektrum autisme konsisten dengan indikasi kesiapan. Asesmen bertujuan untuk sebagai berikut.\r\na.	Mengidentifikasi frekuensi dan waktu rutinitas BAK dan BAB.\r\nb.	Mengetahui interval waktu rata-rata anak tetap kering.\r\nc.	Mencatat asupan cairan, karena ini dapat memengaruhi frekuensi BAK.\r\nd.	Mengamati apakah ada perilaku tertentu yang ditunjukkan sebelum BAK dan BAB.\r\n	Data yang terkumpul akan menjadi dasar untuk menentukan jadwal kunjungan ke toilet. Selama periode asesmen, orang tua juga dapat mengobservasi reaksi anak terhadap kamar mandi, keterampilan memakai dan melepas celana, serta rentang perhatian. Berikut adalah format asesmen beserta pengisian yang dapat digunakan.\r\n	Tabel tersebut menyediakan data untuk mengidentifikasi pola, yang seringkali tidak terlihat jelas tanpa pencatatan sistematis. Tabel dapat mengungkapkan waktu-waktu tertentu dalam sehari ketika anak dengan gangguan spektrum autisme paling mungkin BAK, misalnya setelah makan atau minum dalam jumlah banyak. Waktu-waktu dapat dikostumisasi apabila perlu dengan mengubah rentang waktu menjadi 30 menit sekali.', '{\r\n  \"headers\": [\r\n    \"Waktu\",\r\n    \"Status Celana / Popok\",\r\n    \"Minum (Jumlah / Jenis)\",\r\n    \"Catatan Indikasi\"\r\n  ],\r\n  \"rows\": [\r\n    {\r\n      \"Waktu\": \"aa\",\r\n      \"Status Celana / Popok\": \"bb\",\r\n      \"Minum (Jumlah / Jenis)\": \"cc\",\r\n      \"Catatan Indikasi\": \"dd\"\r\n    },\r\n    {\r\n      \"Waktu\": \"ee\",\r\n      \"Status Celana / Popok\": \"ff\",\r\n      \"Minum (Jumlah / Jenis)\": \"gg\",\r\n      \"Catatan Indikasi\": \"hh\"\r\n    }\r\n  ]\r\n}', NULL, 1, '2025-05-30 23:47:15', '2025-06-02 00:47:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$LMkbowq3sgiGoIQco.5RPOiD1bYzSVJXHqbyAfZOqbKba87mgM0D2', 'Admin', 'ACTIVE', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_module_id_foreign` (`module_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sub_lessons`
--
ALTER TABLE `sub_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_lessons_lesson_id_foreign` (`lesson_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sub_lessons`
--
ALTER TABLE `sub_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_lessons`
--
ALTER TABLE `sub_lessons`
  ADD CONSTRAINT `sub_lessons_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

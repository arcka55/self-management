-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2024 at 04:44 PM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `self_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi_pribadi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `gender`, `nomor_telp`, `alamat`, `deskripsi_pribadi`, `gambar`, `id_user`) VALUES
(1, 'Nurpitasari', 'nurpitasari754@gmail.com', 'Wanita', '082123123123', 'Jalan Masamba Affair No. 193', 'Saya adalah seorang pekerja kreatif yang senang membaca', 'admin_default1682430865_a1foto-profile.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applied_kuesioner_responden`
--

CREATE TABLE `applied_kuesioner_responden` (
  `id` int NOT NULL,
  `id_responden` int NOT NULL,
  `pretest_kontrol` tinyint(1) NOT NULL,
  `pretest_kontrol_datetime_created` datetime DEFAULT NULL,
  `pretest_intervensi` tinyint(1) NOT NULL,
  `pretest_intervensi_datetime_created` datetime DEFAULT NULL,
  `postest_kontrol` tinyint(1) NOT NULL,
  `postest_kontrol_datetime_created` datetime DEFAULT NULL,
  `postest_intervensi` tinyint(1) NOT NULL,
  `postest_intervensi_datetime_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applied_kuesioner_responden`
--

INSERT INTO `applied_kuesioner_responden` (`id`, `id_responden`, `pretest_kontrol`, `pretest_kontrol_datetime_created`, `pretest_intervensi`, `pretest_intervensi_datetime_created`, `postest_kontrol`, `postest_kontrol_datetime_created`, `postest_intervensi`, `postest_intervensi_datetime_created`) VALUES
(1, 1, 1, '2023-05-19 00:31:01', 1, '2023-05-19 00:35:35', 1, '2023-04-25 20:45:44', 1, '2023-04-26 01:47:54'),
(2, 2, 1, '2023-04-27 09:32:05', 0, NULL, 1, '2023-04-27 09:34:52', 0, NULL),
(3, 3, 1, '2023-04-27 11:07:55', 0, NULL, 1, '2023-04-27 11:11:11', 0, NULL),
(4, 4, 1, '2023-04-30 23:47:35', 0, NULL, 1, '2023-04-30 23:51:30', 0, NULL),
(5, 5, 1, '2023-05-01 03:56:32', 0, NULL, 1, '2023-05-01 04:21:21', 0, NULL),
(6, 6, 1, '2023-05-02 01:17:42', 0, NULL, 1, '2023-05-02 01:21:13', 0, NULL),
(7, 7, 1, '2023-05-02 01:37:33', 0, NULL, 1, '2023-05-02 01:40:01', 0, NULL),
(8, 8, 1, '2023-05-02 02:05:16', 0, NULL, 1, '2023-05-02 02:33:21', 0, NULL),
(9, 9, 1, '2023-05-02 18:03:30', 0, NULL, 1, '2023-05-02 18:06:47', 0, NULL),
(10, 10, 1, '2023-05-03 23:41:44', 0, NULL, 1, '2023-05-03 23:50:02', 0, NULL),
(11, 11, 1, '2023-05-05 02:01:13', 0, NULL, 1, '2023-05-05 02:33:39', 0, NULL),
(12, 12, 1, '2023-05-05 02:45:09', 0, NULL, 0, NULL, 0, NULL),
(13, 13, 1, '2023-05-06 02:13:23', 0, NULL, 1, '2023-05-06 02:17:47', 0, NULL),
(14, 14, 1, '2023-05-06 02:33:04', 0, NULL, 1, '2023-05-06 02:41:34', 0, NULL),
(15, 15, 1, '2023-05-06 02:53:16', 0, NULL, 1, '2023-05-06 02:57:33', 0, NULL),
(16, 16, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(17, 17, 1, '2023-05-06 19:10:51', 0, NULL, 1, '2023-05-06 18:52:19', 0, NULL),
(18, 18, 1, '2023-05-06 19:31:18', 1, '2023-05-06 19:30:52', 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `judul`, `tahun`) VALUES
(1, 'Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Pretest Kontrol)', '2023'),
(2, 'Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Pretest Intervensi)', '2023'),
(3, 'Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Postest Kontrol)\n', '2023'),
(4, 'Self Management Hipertensi Pada Ibu Hamil Puskesmas Masamba Tahun 2023 (Postest Intervensi)\r\n', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_postest_intervensi`
--

CREATE TABLE `kuesioner_postest_intervensi` (
  `id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  `jawaban3` varchar(255) NOT NULL,
  `jawaban4` varchar(255) NOT NULL,
  `jawaban5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_postest_intervensi`
--

INSERT INTO `kuesioner_postest_intervensi` (`id`, `pertanyaan`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(1, 'Nama :', '', '', '', '', ''),
(2, 'Usia :', '', '', '', '', ''),
(3, 'Pendidikan :', 'SD', 'SMP', 'SMA', 'Perguruan Tinggi', 'Tidak Sekolah'),
(4, 'Pekerjaan :', 'Bertani', 'Pegawai Swasta', 'PNS', 'IRT', 'Wiraswasta'),
(5, 'Riwayat Merokok :', 'Pernah Merokok', 'Masih Merokok', 'Tidak Pernah', '', ''),
(6, 'Konsumsi Alkohol :', '2-4x/bulan', '2-3x/minggu', '>4x/minggu', 'Setiap Hari', 'Tidak Pernah'),
(7, 'Apakah anda memiliki komplikasi penyakit lain selain hipertensi :', 'Ya', 'Tidak', '', '', ''),
(8, 'Tekanan Darah', '', '', '', '', ''),
(9, 'Saya mempertimbangkan porsi dan pilihan makanan ketika saya makan.', '', '', '', '', ''),
(10, 'Saya makan buah, sayur, gandum, dan kacang-kacangan lebih banyak dari yang saya makan saat saya tidak mengalami hipertensi.', '', '', '', '', ''),
(11, 'saya mengurangi makanan yang mengandung lemak jenuh (misalnya keju, minyak kelapa, daging kambing dan lain-lain) semenjak didiagnosa hipertensi.', '', '', '', '', ''),
(12, 'saya memikirkan tekanan darah saya saat memilih makanan.', '', '', '', '', ''),
(13, 'Saya memilih makanan rendah garam', '', '', '', '', ''),
(14, 'saya berolahraga (misalnya jalan, joging, atau bersepeda) sekitar 30-60 menit setiap hari.', '', '', '', '', ''),
(15, 'Saya berhenti merokok / saya mencoba berhenti merokok', '', '', '', '', ''),
(16, 'Saya mengontrol jenis makanan yang saya komsusmsi dirumah maupun diluar rumah serta mempertimbangakan pengaruh terhadap tekanna darah', '', '', '', '', ''),
(17, 'Saya melakukan rutinitas saya sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke dokter)', '', '', '', '', ''),
(18, 'Saya mencoba mengontrol emosi saya dengan mendengarkan musik, istirahat, dan berbicara dngan keluarga', '', '', '', '', ''),
(19, 'Saya mengetahui kenapa tekanan darah saya berubah', '', '', '', '', ''),
(20, 'Saya mengenali tanda dan gejala tekanan darah tinggi', '', '', '', '', ''),
(21, 'Saya mengontrol tanda dan gejala hipertensi dengan tepat', '', '', '', '', ''),
(22, 'Saya membuat rencana tindakan untuk mencapai tujuan saya mengontrol tekanan darah', '', '', '', '', ''),
(23, 'Saya mengontrol keadaan yang mungkin dapat meningkatkan tekanan darah saya.', '', '', '', '', ''),
(24, 'Saya membandingkan tekanan darah saya saat ini dengan tekanan darah yang saya targetkan (inginkan)', '', '', '', '', ''),
(25, 'Saya mengontrol tanda dan gejala hipotensi (tekanan darah rendah) dengan tepat', '', '', '', '', ''),
(26, 'saya dapat memahami gejala perubahan tekanan darah baik itu peningkatan atau penurunan tekanan darah', '', '', '', '', ''),
(27, 'Saya menganggap gejala perubahan tekanan darah itu hal yang penting (kepala pusing, pandangan kabur, \r\nirama detak jantung tidak teratur, dll )', '', '', '', '', ''),
(28, 'Saya menganggap semua hal penyebab peningkatan atau penurunan tekanan darah merupakan hal yang penting', '', '', '', '', ''),
(29, 'Saya mendiskusikan rencana pengobatan saya dengan dokter atau perawat', '', '', '', '', ''),
(30, 'Saya bertanya pada dokter atau perawat ketika ada hal-hal yang tidak saya pahami', '', '', '', '', ''),
(31, 'Saya mendiskusikan dengan dokter atau perawat saat tekanan darah saya terlalu tinggi atau rendah', '', '', '', '', ''),
(32, 'Saya memberikan masukan pada dokter untuk mengubah rencana pengobatan jika saya tidak bisa menyesuaikan diri dengan rencana tersebut.', '', '', '', '', ''),
(33, 'Saya bertanya pada dokter atau perawat darimana saya bisa belajar lebih jauh tentang hipertensi', '', '', '', '', ''),
(34, 'Saya menerima saran yang diberikan oleh dokter atau tenaga kesehatan mengenai terapi pengobatan tekanan darah yang diberikan', '', '', '', '', ''),
(35, 'Saya berkomunikasi secara nyaman dengan dokter atau tenaga kesehatan yang terkait perubahan jadwal kontrol yang akan dilakukan', '', '', '', '', ''),
(36, 'Saya mengajukan pertanyaan kepada dokter terkait dokter mengenai prosedur terapi yang disarankan', '', '', '', '', ''),
(37, 'Saya meminta bantuan orang lain (misal tema, tetangga atau pasien lain) untuk membantu mengontrol tekanan darah saya', '', '', '', '', ''),
(38, 'Saya bertanya pada orang lain (misal teman tetangga atau pasien lain) apa cara yang mereka gunakan untuk mengontrol tekana darah', '', '', '', '', ''),
(39, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah tinggi', '', '', '', '', ''),
(40, 'Saya pergi ke dokter untuk mengetahui tekanan darah saya saat saya merasa sakit.', '', '', '', '', ''),
(41, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', ''),
(42, 'Saya mengecek tekanan darah saya secara teratur untuk membantu saya membuat keputusan manajemen diri (self Management)', '', '', '', '', ''),
(43, 'saya melakukan rutinitas yang sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke doker).', '', '', '', '', ''),
(44, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi', '', '', '', '', ''),
(45, 'Saya meminta orang lain ( keluarga, saudara, teman, tetangga ) untuk membimbing saya dalam mengontrol tekana darah', '', '', '', '', ''),
(46, 'Saya percaya dan yakin terhadap saran orang lain mengenai cara mengontrol tekanan darah yang telah diberikan', '', '', '', '', ''),
(47, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi', '', '', '', '', ''),
(48, 'Ketika saya mengalami peningkatan atau penururan tekanan darah, saya mengunjungi dokter', '', '', '', '', ''),
(49, 'Saya sangat ketat dalam minum obat anti-hipertensi.', '', '', '', '', ''),
(50, 'Saya minum obat anti-hipertensi sesuai dengan dosis yang diberikan dokter', '', '', '', '', ''),
(51, 'Saya minum obat anti-hipertensi dalam waktu yang benar', '', '', '', '', ''),
(52, 'Saya periksa ke dokter sesuai dengan waktu yang dijadwalkan', '', '', '', '', ''),
(53, 'Saya mengikuti saran dokter atau perawat dalam mengontrol tekanan darah saya', '', '', '', '', ''),
(54, 'Saya patuh terhadap aturan yang telah dianjurkan oleh dokter', '', '', '', '', ''),
(55, 'Setiap bulan saya mengunjungi dokter untuk pemeriksaan 1-3 kali', '', '', '', '', ''),
(56, 'Saya melakukan rutinitas sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya', '', '', '', '', ''),
(57, 'Saya tidak pernah menggunakan garam berlebihan', '', '', '', '', ''),
(58, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_postest_kontrol`
--

CREATE TABLE `kuesioner_postest_kontrol` (
  `id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  `jawaban3` varchar(255) NOT NULL,
  `jawaban4` varchar(255) NOT NULL,
  `jawaban5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_postest_kontrol`
--

INSERT INTO `kuesioner_postest_kontrol` (`id`, `pertanyaan`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(1, 'Nama :', '', '', '', '', ''),
(2, 'Usia :', '', '', '', '', ''),
(3, 'Pendidikan :', 'SD', 'SMP', 'SMA', 'Perguruan Tinggi', 'Tidak Sekolah'),
(4, 'Pekerjaan :', 'Bertani', 'Pegawai Swasta', 'PNS', 'IRT', 'Wiraswasta'),
(5, 'Riwayat Merokok :', 'Pernah Merokok', 'Masih Merokok', 'Tidak Pernah', '', ''),
(6, 'Konsumsi Alkohol :', '2-4x/bulan', '2-3x/minggu', '>4x/minggu', 'Setiap Hari', 'Tidak Pernah'),
(7, 'Apakah anda memiliki komplikasi penyakit lain selain hipertensi :', 'Ya', 'Tidak', '', '', ''),
(8, 'Tekanan Darah', '', '', '', '', ''),
(9, 'Saya mempertimbangkan porsi dan pilihan makanan ketika  saya makan.', '', '', '', '', ''),
(10, 'Saya makan buah, sayur, gandum, dan kacang-kacangan lebih banyak dari yang saya makan saat saya tidak mengalami hipertensi.', '', '', '', '', ''),
(11, 'saya mengurangi makanan yang mengandung lemak jenuh (misalnya keju, minyak kelapa, daging kambing dan lain-lain) semenjak didiagnosa hipertensi.', '', '', '', '', ''),
(12, 'saya memikirkan tekanan darah saya saat  memilih makanan.', '', '', '', '', ''),
(13, 'Saya memilih makanan rendah garam.', '', '', '', '', ''),
(14, 'saya berolahraga (misalnya jalan, joging, atau bersepeda) sekitar 30-60 menit setiap hari.', '', '', '', '', ''),
(15, 'Saya berhenti merokok / saya mencoba berhenti merokok.', '', '', '', '', ''),
(16, 'Saya mengontrol jenis makanan yang saya komsusmsi dirumah maupun diluar rumah serta mempertimbangakan pengaruh terhadap tekanna darah.', '', '', '', '', ''),
(17, 'Saya melakukan rutinitas saya sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke dokter).', '', '', '', '', ''),
(18, 'Saya mencoba mengontrol emosi saya dengan mendengarkan musik, istirahat, dan berbicara dngan keluarga.', '', '', '', '', ''),
(19, 'Saya mengetahui kenapa tekanan darah saya berubah.', '', '', '', '', ''),
(20, 'Saya mengenali tanda dan gejala tekanan darah tinggi.', '', '', '', '', ''),
(21, 'Saya mengontrol tanda dan gejala hipertensi dengan tepat.', '', '', '', '', ''),
(22, 'Saya membuat rencana tindakan untuk mencapai tujuan saya mengontrol tekanan darah', '', '', '', '', ''),
(23, 'Saya mengontrol keadaan yang mungkin dapat meningkatkan tekanan darah saya.', '', '', '', '', ''),
(24, 'Saya membandingkan tekanan darah saya saat ini dengan tekanan darah yang saya targetkan (inginkan).', '', '', '', '', ''),
(25, 'Saya mengontrol tanda dan gejala hipotensi (tekanan darah rendah) dengan tepat.', '', '', '', '', ''),
(26, 'saya dapat memahami gejala perubahan tekanan darah baik itu peningkatan atau penurunan tekanan darah.', '', '', '', '', ''),
(27, 'Saya menganggap gejala perubahan tekanan darah itu hal yang penting (kepala pusing, pandangan kabur, \r\nirama detak jantung tidak teratur, dll ).', '', '', '', '', ''),
(28, 'Saya menganggap semua hal penyebab peningkatan atau penurunan tekanan darah merupakan hal yang penting.', '', '', '', '', ''),
(29, 'Saya mendiskusikan rencana pengobatan saya dengan dokter atau perawat.', '', '', '', '', ''),
(30, 'Saya bertanya pada dokter atau perawat ketika ada hal-hal yang tidak saya pahami.', '', '', '', '', ''),
(31, 'Saya mendiskusikan dengan dokter atau perawat saat tekanan darah saya terlalu tinggi atau rendah.', '', '', '', '', ''),
(32, 'Saya memberikan masukan pada dokter untuk mengubah rencana pengobatan jika saya tidak bisa menyesuaikan diri dengan rencana tersebut. ', '', '', '', '', ''),
(33, 'Saya bertanya pada dokter atau perawat darimana saya bisa belajar lebih jauh tentang hipertensi .', '', '', '', '', ''),
(34, 'Saya menerima saran yang diberikan oleh dokter atau tenaga kesehatan mengenai terapi pengobatan tekanan darah yang diberikan.', '', '', '', '', ''),
(35, 'Saya berkomunikasi secara nyaman dengan dokter atau tenaga kesehatan yang terkait perubahan jadwal kontrol yang akan dilakukan.', '', '', '', '', ''),
(36, 'Saya mengajukan pertanyaan kepada dokter terkait dokter mengenai prosedur terapi yang disarankan.', '', '', '', '', ''),
(37, 'Saya meminta bantuan orang lain (misal tema, tetangga atau pasien lain) untuk membantu mengontrol tekanan darah saya.', '', '', '', '', ''),
(38, 'Saya bertanya pada orang lain (misal teman tetangga atau pasien lain) apa cara yang mereka gunakan untuk mengontrol tekana darah.', '', '', '', '', ''),
(39, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah tinggi.', '', '', '', '', ''),
(40, 'Saya pergi ke dokter untuk mengetahui tekanan darah saya saat saya merasa sakit.', '', '', '', '', ''),
(41, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', ''),
(42, 'Saya mengecek tekanan darah saya secara teratur untuk membantu saya membuat keputusan manajemen diri (self Management).', '', '', '', '', ''),
(43, 'saya melakukan rutinitas yang sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke doker).', '', '', '', '', ''),
(44, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi.', '', '', '', '', ''),
(45, 'Saya meminta orang lain ( keluarga, saudara, teman, tetangga ) untuk membimbing saya dalam mengontrol tekana darah.', '', '', '', '', ''),
(46, 'Saya percaya dan yakin terhadap saran orang lain mengenai cara mengontrol tekanan darah yang telah diberikan.', '', '', '', '', ''),
(47, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi.', '', '', '', '', ''),
(48, 'Ketika saya mengalami peningkatan atau penururan tekanan darah, saya mengunjungi dokter.', '', '', '', '', ''),
(49, 'Saya sangat ketat dalam minum obat anti-hipertensi.', '', '', '', '', ''),
(50, 'Saya minum obat anti-hipertensi sesuai dengan dosis yang diberikan dokter.', '', '', '', '', ''),
(51, 'Saya minum obat anti-hipertensi dalam waktu yang benar.', '', '', '', '', ''),
(52, 'Saya periksa ke dokter sesuai dengan waktu yang dijadwalkan.', '', '', '', '', ''),
(53, 'Saya mengikuti saran dokter atau perawat dalam mengontrol tekanan darah saya.', '', '', '', '', ''),
(54, 'Saya patuh terhadap aturan yang telah dianjurkan oleh dokter.', '', '', '', '', ''),
(55, 'Setiap bulan saya mengunjungi dokter untuk pemeriksaan 1-3 kali.', '', '', '', '', ''),
(56, 'Saya melakukan rutinitas sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya.', '', '', '', '', ''),
(57, 'Saya tidak pernah menggunakan garam berlebihan.', '', '', '', '', ''),
(58, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_pretest_intervensi`
--

CREATE TABLE `kuesioner_pretest_intervensi` (
  `id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  `jawaban3` varchar(255) NOT NULL,
  `jawaban4` varchar(255) NOT NULL,
  `jawaban5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_pretest_intervensi`
--

INSERT INTO `kuesioner_pretest_intervensi` (`id`, `pertanyaan`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(1, 'Nama :', '', '', '', '', ''),
(2, 'Usia :', '', '', '', '', ''),
(3, 'Pendidikan :', 'SD', 'SMP', 'SMA', 'Perguruan Tinggi', 'Tidak Sekolah'),
(4, 'Pekerjaan :', 'Bertani', 'Pegawai Swasta', 'PNS', 'IRT', 'Wiraswasta'),
(5, 'Riwayat Merokok :', 'Pernah Merokok', 'Masih Merokok', 'Tidak Pernah', '', ''),
(6, 'Konsumsi Alkohol :', '2-4x/bulan', '2-3x/minggu', '>4x/minggu', 'Setiap Hari', 'Tidak Pernah'),
(7, 'Apakah anda memiliki komplikasi penyakit lain selain hipertensi :', 'Ya', 'Tidak', '', '', ''),
(8, 'Tekanan Darah', '', '', '', '', ''),
(9, 'Saya mempertimbangkan porsi dan pilihan makanan ketika saya makan.', '', '', '', '', ''),
(10, 'Saya makan buah, sayur, gandum, dan kacang-kacangan lebih banyak dari yang saya makan saat saya tidak mengalami hipertensi.', '', '', '', '', ''),
(11, 'saya mengurangi makanan yang mengandung lemak jenuh (misalnya keju, minyak kelapa, daging kambing dan lain-lain) semenjak didiagnosa hipertensi.', '', '', '', '', ''),
(12, 'saya memikirkan tekanan darah saya saat memilih makanan.', '', '', '', '', ''),
(13, 'Saya memilih makanan rendah garam', '', '', '', '', ''),
(14, 'saya berolahraga (misalnya jalan, joging, atau bersepeda) sekitar 30-60 menit setiap hari.', '', '', '', '', ''),
(15, 'Saya berhenti merokok / saya mencoba berhenti merokok', '', '', '', '', ''),
(16, 'Saya mengontrol jenis makanan yang saya komsusmsi dirumah maupun diluar rumah serta mempertimbangakan pengaruh terhadap tekanna darah', '', '', '', '', ''),
(17, 'Saya melakukan rutinitas saya sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke dokter)', '', '', '', '', ''),
(18, 'Saya mencoba mengontrol emosi saya dengan mendengarkan musik, istirahat, dan berbicara dngan keluarga', '', '', '', '', ''),
(19, 'Saya mengetahui kenapa tekanan darah saya berubah', '', '', '', '', ''),
(20, 'Saya mengenali tanda dan gejala tekanan darah tinggi', '', '', '', '', ''),
(21, 'Saya mengontrol tanda dan gejala hipertensi dengan tepat', '', '', '', '', ''),
(22, 'Saya membuat rencana tindakan untuk mencapai tujuan saya mengontrol tekanan darah', '', '', '', '', ''),
(23, 'Saya mengontrol keadaan yang mungkin dapat meningkatkan tekanan darah saya.', '', '', '', '', ''),
(24, 'Saya membandingkan tekanan darah saya saat ini dengan tekanan darah yang saya targetkan (inginkan)', '', '', '', '', ''),
(25, 'Saya mengontrol tanda dan gejala hipotensi (tekanan darah rendah) dengan tepat', '', '', '', '', ''),
(26, 'saya dapat memahami gejala perubahan tekanan darah baik itu peningkatan atau penurunan tekanan darah', '', '', '', '', ''),
(27, 'Saya menganggap gejala perubahan tekanan darah itu hal yang penting (kepala pusing, pandangan kabur, \r\nirama detak jantung tidak teratur, dll )', '', '', '', '', ''),
(28, 'Saya menganggap semua hal penyebab peningkatan atau penurunan tekanan darah merupakan hal yang penting', '', '', '', '', ''),
(29, 'Saya mendiskusikan rencana pengobatan saya dengan dokter atau perawat', '', '', '', '', ''),
(30, 'Saya bertanya pada dokter atau perawat ketika ada hal-hal yang tidak saya pahami', '', '', '', '', ''),
(31, 'Saya mendiskusikan dengan dokter atau perawat saat tekanan darah saya terlalu tinggi atau rendah', '', '', '', '', ''),
(32, 'Saya memberikan masukan pada dokter untuk mengubah rencana pengobatan jika saya tidak bisa menyesuaikan diri dengan rencana tersebut.', '', '', '', '', ''),
(33, 'Saya bertanya pada dokter atau perawat darimana saya bisa belajar lebih jauh tentang hipertensi', '', '', '', '', ''),
(34, 'Saya menerima saran yang diberikan oleh dokter atau tenaga kesehatan mengenai terapi pengobatan tekanan darah yang diberikan', '', '', '', '', ''),
(35, 'Saya berkomunikasi secara nyaman dengan dokter atau tenaga kesehatan yang terkait perubahan jadwal kontrol yang akan dilakukan', '', '', '', '', ''),
(36, 'Saya mengajukan pertanyaan kepada dokter terkait dokter mengenai prosedur terapi yang disarankan', '', '', '', '', ''),
(37, 'Saya meminta bantuan orang lain (misal tema, tetangga atau pasien lain) untuk membantu mengontrol tekanan darah saya', '', '', '', '', ''),
(38, 'Saya bertanya pada orang lain (misal teman tetangga atau pasien lain) apa cara yang mereka gunakan untuk mengontrol tekana darah', '', '', '', '', ''),
(39, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah tinggi', '', '', '', '', ''),
(40, 'Saya pergi ke dokter untuk mengetahui tekanan darah saya saat saya merasa sakit.', '', '', '', '', ''),
(41, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', ''),
(42, 'Saya mengecek tekanan darah saya secara teratur untuk membantu saya membuat keputusan manajemen diri (self Management)', '', '', '', '', ''),
(43, 'saya melakukan rutinitas yang sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke doker).', '', '', '', '', ''),
(44, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi', '', '', '', '', ''),
(45, 'Saya meminta orang lain ( keluarga, saudara, teman, tetangga ) untuk membimbing saya dalam mengontrol tekana darah', '', '', '', '', ''),
(46, 'Saya percaya dan yakin terhadap saran orang lain mengenai cara mengontrol tekanan darah yang telah diberikan', '', '', '', '', ''),
(47, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi', '', '', '', '', ''),
(48, 'Ketika saya mengalami peningkatan atau penururan tekanan darah, saya mengunjungi dokter', '', '', '', '', ''),
(49, 'Saya sangat ketat dalam minum obat anti-hipertensi.', '', '', '', '', ''),
(50, 'Saya minum obat anti-hipertensi sesuai dengan dosis yang diberikan dokter', '', '', '', '', ''),
(51, 'Saya minum obat anti-hipertensi dalam waktu yang benar', '', '', '', '', ''),
(52, 'Saya periksa ke dokter sesuai dengan waktu yang dijadwalkan', '', '', '', '', ''),
(53, 'Saya mengikuti saran dokter atau perawat dalam mengontrol tekanan darah saya', '', '', '', '', ''),
(54, 'Saya patuh terhadap aturan yang telah dianjurkan oleh dokter', '', '', '', '', ''),
(55, 'Setiap bulan saya mengunjungi dokter untuk pemeriksaan 1-3 kali', '', '', '', '', ''),
(56, 'Saya melakukan rutinitas sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya', '', '', '', '', ''),
(57, 'Saya tidak pernah menggunakan garam berlebihan', '', '', '', '', ''),
(58, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_pretest_kontrol`
--

CREATE TABLE `kuesioner_pretest_kontrol` (
  `id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban1` varchar(255) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  `jawaban3` varchar(255) NOT NULL,
  `jawaban4` varchar(255) NOT NULL,
  `jawaban5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_pretest_kontrol`
--

INSERT INTO `kuesioner_pretest_kontrol` (`id`, `pertanyaan`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(1, 'Nama :', '', '', '', '', ''),
(2, 'Usia :', '', '', '', '', ''),
(3, 'Pendidikan :', 'SD', 'SMP', 'SMA', 'Perguruan Tinggi', 'Tidak Sekolah'),
(4, 'Pekerjaan :', 'Bertani', 'Pegawai Swasta', 'PNS', 'IRT', 'Wiraswasta'),
(5, 'Riwayat Merokok :', 'Pernah Merokok', 'Masih Merokok', 'Tidak Pernah', '', ''),
(6, 'Konsumsi Alkohol :', '2-4x/bulan', '2-3x/minggu', '>4x/minggu', 'Setiap Hari', 'Tidak Pernah'),
(7, 'Apakah anda memiliki komplikasi penyakit lain selain hipertensi :', 'Ya', 'Tidak', '', '', ''),
(8, 'Tekanan Darah', '', '', '', '', ''),
(9, 'Saya mempertimbangkan porsi dan pilihan makanan ketika  saya makan.', '', '', '', '', ''),
(10, 'Saya makan buah, sayur, gandum, dan kacang-kacangan lebih banyak dari yang saya makan saat saya tidak mengalami hipertensi.', '', '', '', '', ''),
(11, 'saya mengurangi makanan yang mengandung lemak jenuh (misalnya keju, minyak kelapa, daging kambing dan lain-lain) semenjak didiagnosa hipertensi.', '', '', '', '', ''),
(12, 'saya memikirkan tekanan darah saya saat  memilih makanan.', '', '', '', '', ''),
(13, 'Saya memilih makanan rendah garam.', '', '', '', '', ''),
(14, 'saya berolahraga (misalnya jalan, joging, atau bersepeda) sekitar 30-60 menit setiap hari.', '', '', '', '', ''),
(15, 'Saya berhenti merokok / saya mencoba berhenti merokok.', '', '', '', '', ''),
(16, 'Saya mengontrol jenis makanan yang saya komsusmsi dirumah maupun diluar rumah serta mempertimbangakan pengaruh terhadap tekanna darah.', '', '', '', '', ''),
(17, 'Saya melakukan rutinitas saya sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke dokter).', '', '', '', '', ''),
(18, 'Saya mencoba mengontrol emosi saya dengan mendengarkan musik, istirahat, dan berbicara dngan keluarga.', '', '', '', '', ''),
(19, 'Saya mengetahui kenapa tekanan darah saya berubah.', '', '', '', '', ''),
(20, 'Saya mengenali tanda dan gejala tekanan darah tinggi.', '', '', '', '', ''),
(21, 'Saya mengontrol tanda dan gejala hipertensi dengan tepat.', '', '', '', '', ''),
(22, 'Saya membuat rencana tindakan untuk mencapai tujuan saya mengontrol tekanan darah', '', '', '', '', ''),
(23, 'Saya mengontrol keadaan yang mungkin dapat meningkatkan tekanan darah saya.', '', '', '', '', ''),
(24, 'Saya membandingkan tekanan darah saya saat ini dengan tekanan darah yang saya targetkan (inginkan).', '', '', '', '', ''),
(25, 'Saya mengontrol tanda dan gejala hipotensi (tekanan darah rendah) dengan tepat.', '', '', '', '', ''),
(26, 'saya dapat memahami gejala perubahan tekanan darah baik itu peningkatan atau penurunan tekanan darah.', '', '', '', '', ''),
(27, 'Saya menganggap gejala perubahan tekanan darah itu hal yang penting (kepala pusing, pandangan kabur, \r\nirama detak jantung tidak teratur, dll ).', '', '', '', '', ''),
(28, 'Saya menganggap semua hal penyebab peningkatan atau penurunan tekanan darah merupakan hal yang penting.', '', '', '', '', ''),
(29, 'Saya mendiskusikan rencana pengobatan saya dengan dokter atau perawat.', '', '', '', '', ''),
(30, 'Saya bertanya pada dokter atau perawat ketika ada hal-hal yang tidak saya pahami.', '', '', '', '', ''),
(31, 'Saya mendiskusikan dengan dokter atau perawat saat tekanan darah saya terlalu tinggi atau rendah.', '', '', '', '', ''),
(32, 'Saya memberikan masukan pada dokter untuk mengubah rencana pengobatan jika saya tidak bisa menyesuaikan diri dengan rencana tersebut. ', '', '', '', '', ''),
(33, 'Saya bertanya pada dokter atau perawat darimana saya bisa belajar lebih jauh tentang hipertensi .', '', '', '', '', ''),
(34, 'Saya menerima saran yang diberikan oleh dokter atau tenaga kesehatan mengenai terapi pengobatan tekanan darah yang diberikan.', '', '', '', '', ''),
(35, 'Saya berkomunikasi secara nyaman dengan dokter atau tenaga kesehatan yang terkait perubahan jadwal kontrol yang akan dilakukan.', '', '', '', '', ''),
(36, 'Saya mengajukan pertanyaan kepada dokter terkait dokter mengenai prosedur terapi yang disarankan.', '', '', '', '', ''),
(37, 'Saya meminta bantuan orang lain (misal tema, tetangga atau pasien lain) untuk membantu mengontrol tekanan darah saya.', '', '', '', '', ''),
(38, 'Saya bertanya pada orang lain (misal teman tetangga atau pasien lain) apa cara yang mereka gunakan untuk mengontrol tekana darah.', '', '', '', '', ''),
(39, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah tinggi.', '', '', '', '', ''),
(40, 'Saya pergi ke dokter untuk mengetahui tekanan darah saya saat saya merasa sakit.', '', '', '', '', ''),
(41, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', ''),
(42, 'Saya mengecek tekanan darah saya secara teratur untuk membantu saya membuat keputusan manajemen diri (self Management).', '', '', '', '', ''),
(43, 'saya melakukan rutinitas yang sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya (misalnya pekerjaan dan periksa ke doker).', '', '', '', '', ''),
(44, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi.', '', '', '', '', ''),
(45, 'Saya meminta orang lain ( keluarga, saudara, teman, tetangga ) untuk membimbing saya dalam mengontrol tekana darah.', '', '', '', '', ''),
(46, 'Saya percaya dan yakin terhadap saran orang lain mengenai cara mengontrol tekanan darah yang telah diberikan.', '', '', '', '', ''),
(47, 'Saya teratur mengukur dan mengontrol tekanan darah untuk menghindari komplikasi hipertensi.', '', '', '', '', ''),
(48, 'Ketika saya mengalami peningkatan atau penururan tekanan darah, saya mengunjungi dokter.', '', '', '', '', ''),
(49, 'Saya sangat ketat dalam minum obat anti-hipertensi.', '', '', '', '', ''),
(50, 'Saya minum obat anti-hipertensi sesuai dengan dosis yang diberikan dokter.', '', '', '', '', ''),
(51, 'Saya minum obat anti-hipertensi dalam waktu yang benar.', '', '', '', '', ''),
(52, 'Saya periksa ke dokter sesuai dengan waktu yang dijadwalkan.', '', '', '', '', ''),
(53, 'Saya mengikuti saran dokter atau perawat dalam mengontrol tekanan darah saya.', '', '', '', '', ''),
(54, 'Saya patuh terhadap aturan yang telah dianjurkan oleh dokter.', '', '', '', '', ''),
(55, 'Setiap bulan saya mengunjungi dokter untuk pemeriksaan 1-3 kali.', '', '', '', '', ''),
(56, 'Saya melakukan rutinitas sesuai dengan hal-hal yang harus saya lakukan untuk mengontrol hipertensi saya.', '', '', '', '', ''),
(57, 'Saya tidak pernah menggunakan garam berlebihan.', '', '', '', '', ''),
(58, 'Saya pergi ke dokter untuk mengecek tekanan darah saya saat merasakan tanda dan gejala tekanan darah rendah.', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_responden_postest_intervensi`
--

CREATE TABLE `kuesioner_responden_postest_intervensi` (
  `id` int NOT NULL,
  `id_responden` int NOT NULL,
  `qk1_d` varchar(255) NOT NULL,
  `qk2_d` varchar(255) NOT NULL,
  `qk3_d` varchar(255) NOT NULL,
  `qk4_d` varchar(255) NOT NULL,
  `qk5_d` varchar(255) NOT NULL,
  `qk6_d` varchar(255) NOT NULL,
  `qk7_d` varchar(255) NOT NULL,
  `qk8_d` varchar(255) NOT NULL,
  `qk9_sm` varchar(255) NOT NULL,
  `qk10_sm` varchar(255) NOT NULL,
  `qk11_sm` varchar(255) NOT NULL,
  `qk12_sm` varchar(255) NOT NULL,
  `qk13_sm` varchar(255) NOT NULL,
  `qk14_sm` varchar(255) NOT NULL,
  `qk15_sm` varchar(255) NOT NULL,
  `qk16_sm` varchar(255) NOT NULL,
  `qk17_sm` varchar(255) NOT NULL,
  `qk18_sm` varchar(255) NOT NULL,
  `qk19_sm` varchar(255) NOT NULL,
  `qk20_sm` varchar(255) NOT NULL,
  `qk21_sm` varchar(255) NOT NULL,
  `qk22_sm` varchar(255) NOT NULL,
  `qk23_sm` varchar(255) NOT NULL,
  `qk24_sm` varchar(255) NOT NULL,
  `qk25_sm` varchar(255) NOT NULL,
  `qk26_sm` varchar(255) NOT NULL,
  `qk27_sm` varchar(255) NOT NULL,
  `qk28_sm` varchar(255) NOT NULL,
  `qk29_sm` varchar(255) NOT NULL,
  `qk30_sm` varchar(255) NOT NULL,
  `qk31_sm` varchar(255) NOT NULL,
  `qk32_sm` varchar(255) NOT NULL,
  `qk33_sm` varchar(255) NOT NULL,
  `qk34_sm` varchar(255) NOT NULL,
  `qk35_sm` varchar(255) NOT NULL,
  `qk36_sm` varchar(255) NOT NULL,
  `qk37_sm` varchar(255) NOT NULL,
  `qk38_sm` varchar(255) NOT NULL,
  `qk39_sm` varchar(255) NOT NULL,
  `qk40_sm` varchar(255) NOT NULL,
  `qk41_sm` varchar(255) NOT NULL,
  `qk42_sm` varchar(255) NOT NULL,
  `qk43_sm` varchar(255) NOT NULL,
  `qk44_sm` varchar(255) NOT NULL,
  `qk45_sm` varchar(255) NOT NULL,
  `qk46_sm` varchar(255) NOT NULL,
  `qk47_sm` varchar(255) NOT NULL,
  `qk48_sm` varchar(255) NOT NULL,
  `qk49_sm` varchar(255) NOT NULL,
  `qk50_sm` varchar(255) NOT NULL,
  `qk51_sm` varchar(255) NOT NULL,
  `qk52_sm` varchar(255) NOT NULL,
  `qk53_sm` varchar(255) NOT NULL,
  `qk54_sm` varchar(255) NOT NULL,
  `qk55_sm` varchar(255) NOT NULL,
  `qk56_sm` varchar(255) NOT NULL,
  `qk57_sm` varchar(255) NOT NULL,
  `qk58_sm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_responden_postest_intervensi`
--

INSERT INTO `kuesioner_responden_postest_intervensi` (`id`, `id_responden`, `qk1_d`, `qk2_d`, `qk3_d`, `qk4_d`, `qk5_d`, `qk6_d`, `qk7_d`, `qk8_d`, `qk9_sm`, `qk10_sm`, `qk11_sm`, `qk12_sm`, `qk13_sm`, `qk14_sm`, `qk15_sm`, `qk16_sm`, `qk17_sm`, `qk18_sm`, `qk19_sm`, `qk20_sm`, `qk21_sm`, `qk22_sm`, `qk23_sm`, `qk24_sm`, `qk25_sm`, `qk26_sm`, `qk27_sm`, `qk28_sm`, `qk29_sm`, `qk30_sm`, `qk31_sm`, `qk32_sm`, `qk33_sm`, `qk34_sm`, `qk35_sm`, `qk36_sm`, `qk37_sm`, `qk38_sm`, `qk39_sm`, `qk40_sm`, `qk41_sm`, `qk42_sm`, `qk43_sm`, `qk44_sm`, `qk45_sm`, `qk46_sm`, `qk47_sm`, `qk48_sm`, `qk49_sm`, `qk50_sm`, `qk51_sm`, `qk52_sm`, `qk53_sm`, `qk54_sm`, `qk55_sm`, `qk56_sm`, `qk57_sm`, `qk58_sm`) VALUES
(1, 1, 'Neo Leaderz', '24', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Ya, Diabetes', '', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu'),
(2, 2, 'Nur apida', '37', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 3, 'Nurafni puddin', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 4, 'Sunarti', '42', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 5, 'Nurhidayah', '19', 'SMP', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 6, 'Sucianti', '20', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 7, 'Masni', '28', 'SMA', 'Bertani', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 8, 'Winda Ashari', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 9, 'Erni', '32', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 10, 'rahmawati', '32', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 11, 'Nuryanti', '29', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 12, 'Rusna rustamin', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 13, 'Nadila', '27', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 14, 'Fatma', '28', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 15, 'Haslinda', '33', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 16, 'Erika', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 17, 'Elisia', '35', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 18, 'namira', '25', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_responden_postest_kontrol`
--

CREATE TABLE `kuesioner_responden_postest_kontrol` (
  `id` int NOT NULL,
  `id_responden` int NOT NULL,
  `qk1_d` varchar(255) NOT NULL,
  `qk2_d` varchar(255) NOT NULL,
  `qk3_d` varchar(255) NOT NULL,
  `qk4_d` varchar(255) NOT NULL,
  `qk5_d` varchar(255) NOT NULL,
  `qk6_d` varchar(255) NOT NULL,
  `qk7_d` varchar(255) NOT NULL,
  `qk8_d` varchar(255) NOT NULL,
  `qk9_sm` varchar(255) NOT NULL,
  `qk10_sm` varchar(255) NOT NULL,
  `qk11_sm` varchar(255) NOT NULL,
  `qk12_sm` varchar(255) NOT NULL,
  `qk13_sm` varchar(255) NOT NULL,
  `qk14_sm` varchar(255) NOT NULL,
  `qk15_sm` varchar(255) NOT NULL,
  `qk16_sm` varchar(255) NOT NULL,
  `qk17_sm` varchar(255) NOT NULL,
  `qk18_sm` varchar(255) NOT NULL,
  `qk19_sm` varchar(255) NOT NULL,
  `qk20_sm` varchar(255) NOT NULL,
  `qk21_sm` varchar(255) NOT NULL,
  `qk22_sm` varchar(255) NOT NULL,
  `qk23_sm` varchar(255) NOT NULL,
  `qk24_sm` varchar(255) NOT NULL,
  `qk25_sm` varchar(255) NOT NULL,
  `qk26_sm` varchar(255) NOT NULL,
  `qk27_sm` varchar(255) NOT NULL,
  `qk28_sm` varchar(255) NOT NULL,
  `qk29_sm` varchar(255) NOT NULL,
  `qk30_sm` varchar(255) NOT NULL,
  `qk31_sm` varchar(255) NOT NULL,
  `qk32_sm` varchar(255) NOT NULL,
  `qk33_sm` varchar(255) NOT NULL,
  `qk34_sm` varchar(255) NOT NULL,
  `qk35_sm` varchar(255) NOT NULL,
  `qk36_sm` varchar(255) NOT NULL,
  `qk37_sm` varchar(255) NOT NULL,
  `qk38_sm` varchar(255) NOT NULL,
  `qk39_sm` varchar(255) NOT NULL,
  `qk40_sm` varchar(255) NOT NULL,
  `qk41_sm` varchar(255) NOT NULL,
  `qk42_sm` varchar(255) NOT NULL,
  `qk43_sm` varchar(255) NOT NULL,
  `qk44_sm` varchar(255) NOT NULL,
  `qk45_sm` varchar(255) NOT NULL,
  `qk46_sm` varchar(255) NOT NULL,
  `qk47_sm` varchar(255) NOT NULL,
  `qk48_sm` varchar(255) NOT NULL,
  `qk49_sm` varchar(255) NOT NULL,
  `qk50_sm` varchar(255) NOT NULL,
  `qk51_sm` varchar(255) NOT NULL,
  `qk52_sm` varchar(255) NOT NULL,
  `qk53_sm` varchar(255) NOT NULL,
  `qk54_sm` varchar(255) NOT NULL,
  `qk55_sm` varchar(255) NOT NULL,
  `qk56_sm` varchar(255) NOT NULL,
  `qk57_sm` varchar(255) NOT NULL,
  `qk58_sm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_responden_postest_kontrol`
--

INSERT INTO `kuesioner_responden_postest_kontrol` (`id`, `id_responden`, `qk1_d`, `qk2_d`, `qk3_d`, `qk4_d`, `qk5_d`, `qk6_d`, `qk7_d`, `qk8_d`, `qk9_sm`, `qk10_sm`, `qk11_sm`, `qk12_sm`, `qk13_sm`, `qk14_sm`, `qk15_sm`, `qk16_sm`, `qk17_sm`, `qk18_sm`, `qk19_sm`, `qk20_sm`, `qk21_sm`, `qk22_sm`, `qk23_sm`, `qk24_sm`, `qk25_sm`, `qk26_sm`, `qk27_sm`, `qk28_sm`, `qk29_sm`, `qk30_sm`, `qk31_sm`, `qk32_sm`, `qk33_sm`, `qk34_sm`, `qk35_sm`, `qk36_sm`, `qk37_sm`, `qk38_sm`, `qk39_sm`, `qk40_sm`, `qk41_sm`, `qk42_sm`, `qk43_sm`, `qk44_sm`, `qk45_sm`, `qk46_sm`, `qk47_sm`, `qk48_sm`, `qk49_sm`, `qk50_sm`, `qk51_sm`, `qk52_sm`, `qk53_sm`, `qk54_sm`, `qk55_sm`, `qk56_sm`, `qk57_sm`, `qk58_sm`) VALUES
(1, 1, 'Neo Leaderz', '24', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Ya, Diabetes', '', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(2, 2, 'Nur apida', '37', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang'),
(3, 3, 'Nurafni puddin', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang'),
(4, 4, 'Sunarti', '42', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang'),
(5, 5, 'Nurhidayah', '19', 'SMP', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang'),
(6, 6, 'Sucianti', '20', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang'),
(7, 7, 'Masni', '28', 'SMA', 'Bertani', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang'),
(8, 8, 'Winda Ashari', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang'),
(9, 9, 'Erni', '32', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(10, 10, 'rahmawati', '32', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang'),
(11, 11, 'Nuryanti', '29', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang'),
(12, 12, 'Rusna rustamin', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 13, 'Nadila', '27', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(14, 14, 'Fatma', '28', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang'),
(15, 15, 'Haslinda', '33', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(16, 16, 'Erika', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 17, 'Elisia', '35', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Selalu', 'Selalu'),
(18, 18, 'namira', '25', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_responden_pretest_intervensi`
--

CREATE TABLE `kuesioner_responden_pretest_intervensi` (
  `id` int NOT NULL,
  `id_responden` int NOT NULL,
  `qk1_d` varchar(255) NOT NULL,
  `qk2_d` varchar(255) NOT NULL,
  `qk3_d` varchar(255) NOT NULL,
  `qk4_d` varchar(255) NOT NULL,
  `qk5_d` varchar(255) NOT NULL,
  `qk6_d` varchar(255) NOT NULL,
  `qk7_d` varchar(255) NOT NULL,
  `qk8_d` varchar(255) NOT NULL,
  `qk9_sm` varchar(255) NOT NULL,
  `qk10_sm` varchar(255) NOT NULL,
  `qk11_sm` varchar(255) NOT NULL,
  `qk12_sm` varchar(255) NOT NULL,
  `qk13_sm` varchar(255) NOT NULL,
  `qk14_sm` varchar(255) NOT NULL,
  `qk15_sm` varchar(255) NOT NULL,
  `qk16_sm` varchar(255) NOT NULL,
  `qk17_sm` varchar(255) NOT NULL,
  `qk18_sm` varchar(255) NOT NULL,
  `qk19_sm` varchar(255) NOT NULL,
  `qk20_sm` varchar(255) NOT NULL,
  `qk21_sm` varchar(255) NOT NULL,
  `qk22_sm` varchar(255) NOT NULL,
  `qk23_sm` varchar(255) NOT NULL,
  `qk24_sm` varchar(255) NOT NULL,
  `qk25_sm` varchar(255) NOT NULL,
  `qk26_sm` varchar(255) NOT NULL,
  `qk27_sm` varchar(255) NOT NULL,
  `qk28_sm` varchar(255) NOT NULL,
  `qk29_sm` varchar(255) NOT NULL,
  `qk30_sm` varchar(255) NOT NULL,
  `qk31_sm` varchar(255) NOT NULL,
  `qk32_sm` varchar(255) NOT NULL,
  `qk33_sm` varchar(255) NOT NULL,
  `qk34_sm` varchar(255) NOT NULL,
  `qk35_sm` varchar(255) NOT NULL,
  `qk36_sm` varchar(255) NOT NULL,
  `qk37_sm` varchar(255) NOT NULL,
  `qk38_sm` varchar(255) NOT NULL,
  `qk39_sm` varchar(255) NOT NULL,
  `qk40_sm` varchar(255) NOT NULL,
  `qk41_sm` varchar(255) NOT NULL,
  `qk42_sm` varchar(255) NOT NULL,
  `qk43_sm` varchar(255) NOT NULL,
  `qk44_sm` varchar(255) NOT NULL,
  `qk45_sm` varchar(255) NOT NULL,
  `qk46_sm` varchar(255) NOT NULL,
  `qk47_sm` varchar(255) NOT NULL,
  `qk48_sm` varchar(255) NOT NULL,
  `qk49_sm` varchar(255) NOT NULL,
  `qk50_sm` varchar(255) NOT NULL,
  `qk51_sm` varchar(255) NOT NULL,
  `qk52_sm` varchar(255) NOT NULL,
  `qk53_sm` varchar(255) NOT NULL,
  `qk54_sm` varchar(255) NOT NULL,
  `qk55_sm` varchar(255) NOT NULL,
  `qk56_sm` varchar(255) NOT NULL,
  `qk57_sm` varchar(255) NOT NULL,
  `qk58_sm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_responden_pretest_intervensi`
--

INSERT INTO `kuesioner_responden_pretest_intervensi` (`id`, `id_responden`, `qk1_d`, `qk2_d`, `qk3_d`, `qk4_d`, `qk5_d`, `qk6_d`, `qk7_d`, `qk8_d`, `qk9_sm`, `qk10_sm`, `qk11_sm`, `qk12_sm`, `qk13_sm`, `qk14_sm`, `qk15_sm`, `qk16_sm`, `qk17_sm`, `qk18_sm`, `qk19_sm`, `qk20_sm`, `qk21_sm`, `qk22_sm`, `qk23_sm`, `qk24_sm`, `qk25_sm`, `qk26_sm`, `qk27_sm`, `qk28_sm`, `qk29_sm`, `qk30_sm`, `qk31_sm`, `qk32_sm`, `qk33_sm`, `qk34_sm`, `qk35_sm`, `qk36_sm`, `qk37_sm`, `qk38_sm`, `qk39_sm`, `qk40_sm`, `qk41_sm`, `qk42_sm`, `qk43_sm`, `qk44_sm`, `qk45_sm`, `qk46_sm`, `qk47_sm`, `qk48_sm`, `qk49_sm`, `qk50_sm`, `qk51_sm`, `qk52_sm`, `qk53_sm`, `qk54_sm`, `qk55_sm`, `qk56_sm`, `qk57_sm`, `qk58_sm`) VALUES
(1, 1, 'Neo Leaderz', '24', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Ya, Diabetes', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang'),
(2, 2, 'Nur apida', '37', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 3, 'Nurafni puddin', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 4, 'Sunarti', '42', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 5, 'Nurhidayah', '19', 'SMP', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 6, 'Sucianti', '20', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 7, 'Masni', '28', 'SMA', 'Bertani', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 8, 'Winda Ashari', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 9, 'Erni', '32', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 10, 'rahmawati', '32', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 11, 'Nuryanti', '29', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 12, 'Rusna rustamin', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 13, 'Nadila', '27', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 14, 'Fatma', '28', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 15, 'Haslinda', '33', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 16, 'Erika', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 17, 'Elisia', '35', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 18, 'namira', '25', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_responden_pretest_kontrol`
--

CREATE TABLE `kuesioner_responden_pretest_kontrol` (
  `id` int NOT NULL,
  `id_responden` int NOT NULL,
  `qk1_d` varchar(255) NOT NULL,
  `qk2_d` varchar(255) NOT NULL,
  `qk3_d` varchar(255) NOT NULL,
  `qk4_d` varchar(255) NOT NULL,
  `qk5_d` varchar(255) NOT NULL,
  `qk6_d` varchar(255) NOT NULL,
  `qk7_d` varchar(255) NOT NULL,
  `qk8_d` varchar(255) NOT NULL,
  `qk9_sm` varchar(255) NOT NULL,
  `qk10_sm` varchar(255) NOT NULL,
  `qk11_sm` varchar(255) NOT NULL,
  `qk12_sm` varchar(255) NOT NULL,
  `qk13_sm` varchar(255) NOT NULL,
  `qk14_sm` varchar(255) NOT NULL,
  `qk15_sm` varchar(255) NOT NULL,
  `qk16_sm` varchar(255) NOT NULL,
  `qk17_sm` varchar(255) NOT NULL,
  `qk18_sm` varchar(255) NOT NULL,
  `qk19_sm` varchar(255) NOT NULL,
  `qk20_sm` varchar(255) NOT NULL,
  `qk21_sm` varchar(255) NOT NULL,
  `qk22_sm` varchar(255) NOT NULL,
  `qk23_sm` varchar(255) NOT NULL,
  `qk24_sm` varchar(255) NOT NULL,
  `qk25_sm` varchar(255) NOT NULL,
  `qk26_sm` varchar(255) NOT NULL,
  `qk27_sm` varchar(255) NOT NULL,
  `qk28_sm` varchar(255) NOT NULL,
  `qk29_sm` varchar(255) NOT NULL,
  `qk30_sm` varchar(255) NOT NULL,
  `qk31_sm` varchar(255) NOT NULL,
  `qk32_sm` varchar(255) NOT NULL,
  `qk33_sm` varchar(255) NOT NULL,
  `qk34_sm` varchar(255) NOT NULL,
  `qk35_sm` varchar(255) NOT NULL,
  `qk36_sm` varchar(255) NOT NULL,
  `qk37_sm` varchar(255) NOT NULL,
  `qk38_sm` varchar(255) NOT NULL,
  `qk39_sm` varchar(255) NOT NULL,
  `qk40_sm` varchar(255) NOT NULL,
  `qk41_sm` varchar(255) NOT NULL,
  `qk42_sm` varchar(255) NOT NULL,
  `qk43_sm` varchar(255) NOT NULL,
  `qk44_sm` varchar(255) NOT NULL,
  `qk45_sm` varchar(255) NOT NULL,
  `qk46_sm` varchar(255) NOT NULL,
  `qk47_sm` varchar(255) NOT NULL,
  `qk48_sm` varchar(255) NOT NULL,
  `qk49_sm` varchar(255) NOT NULL,
  `qk50_sm` varchar(255) NOT NULL,
  `qk51_sm` varchar(255) NOT NULL,
  `qk52_sm` varchar(255) NOT NULL,
  `qk53_sm` varchar(255) NOT NULL,
  `qk54_sm` varchar(255) NOT NULL,
  `qk55_sm` varchar(255) NOT NULL,
  `qk56_sm` varchar(255) NOT NULL,
  `qk57_sm` varchar(255) NOT NULL,
  `qk58_sm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuesioner_responden_pretest_kontrol`
--

INSERT INTO `kuesioner_responden_pretest_kontrol` (`id`, `id_responden`, `qk1_d`, `qk2_d`, `qk3_d`, `qk4_d`, `qk5_d`, `qk6_d`, `qk7_d`, `qk8_d`, `qk9_sm`, `qk10_sm`, `qk11_sm`, `qk12_sm`, `qk13_sm`, `qk14_sm`, `qk15_sm`, `qk16_sm`, `qk17_sm`, `qk18_sm`, `qk19_sm`, `qk20_sm`, `qk21_sm`, `qk22_sm`, `qk23_sm`, `qk24_sm`, `qk25_sm`, `qk26_sm`, `qk27_sm`, `qk28_sm`, `qk29_sm`, `qk30_sm`, `qk31_sm`, `qk32_sm`, `qk33_sm`, `qk34_sm`, `qk35_sm`, `qk36_sm`, `qk37_sm`, `qk38_sm`, `qk39_sm`, `qk40_sm`, `qk41_sm`, `qk42_sm`, `qk43_sm`, `qk44_sm`, `qk45_sm`, `qk46_sm`, `qk47_sm`, `qk48_sm`, `qk49_sm`, `qk50_sm`, `qk51_sm`, `qk52_sm`, `qk53_sm`, `qk54_sm`, `qk55_sm`, `qk56_sm`, `qk57_sm`, `qk58_sm`) VALUES
(1, 1, 'Neo Leaderz', '24', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Ya, Diabetes', '', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah'),
(2, 2, 'Nur apida', '37', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Tidak Pernah', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Kadang-kadang', 'Selalu', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang'),
(3, 3, 'Nurafni puddin', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang'),
(4, 4, 'Sunarti', '42', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang'),
(5, 5, 'Nurhidayah', '19', 'SMP', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang'),
(6, 6, 'Sucianti', '20', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang'),
(7, 7, 'Masni', '28', 'SMA', 'Bertani', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang'),
(8, 8, 'Winda Ashari', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(9, 9, 'Erni', '32', 'Perguruan Tinggi', 'PNS', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(10, 10, 'rahmawati', '32', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang'),
(11, 11, 'Nuryanti', '29', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang'),
(12, 12, 'Rusna rustamin', '31', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang'),
(13, 13, 'Nadila', '27', 'SMA', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Jarang', 'Jarang', 'Tidak Pernah', 'Tidak Pernah', 'Tidak Pernah'),
(14, 14, 'Fatma', '28', 'SMA', 'Wiraswasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang'),
(15, 15, 'Haslinda', '33', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang'),
(16, 16, 'Erika', '28', 'Perguruan Tinggi', 'Pegawai Swasta', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 17, 'Elisia', '35', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Selalu', 'Jarang', 'Jarang', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Selalu', 'Kadang-kadang', 'Kadang-kadang'),
(18, 18, 'namira', '25', 'Perguruan Tinggi', 'IRT', 'Tidak Pernah', 'Tidak Pernah', 'Tidak', '', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Tidak Pernah', 'Jarang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Kadang-kadang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang', 'Jarang');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`) VALUES
(1, '1648695082490a1.png');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_waktu_upload` datetime NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul_materi`, `file`, `tgl_waktu_upload`, `id_admin`) VALUES
(1, 'Self Management', 'MATERI_SELF_MANAGEMENT1682425531_a1file-materi.docx', '2023-04-25 20:52:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi_log`
--

CREATE TABLE `materi_log` (
  `id` int NOT NULL,
  `id_materi` int NOT NULL,
  `downloaded_by` varchar(255) NOT NULL,
  `downloaded_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materi_log`
--

INSERT INTO `materi_log` (`id`, `id_materi`, `downloaded_by`, `downloaded_datetime`) VALUES
(1, 1, 'Neo Leaderz', '2023-04-25 20:40:14'),
(2, 1, 'Neo Leaderz', '2023-04-26 01:48:53'),
(3, 1, 'namira', '2023-05-06 19:32:01'),
(4, 1, 'Neo Leaderz', '2023-05-19 09:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `usia` int NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `deskripsi_pribadi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id`, `nama`, `usia`, `pendidikan`, `pekerjaan`, `gender`, `email`, `deskripsi_pribadi`, `gambar`, `id_user`) VALUES
(1, 'Neo Leaderz', 24, 'Perguruan Tinggi', 'PNS', 'Pria', 'neoleaderz@gmail.com', 'Saya adalah seorang pengajar di suatu lembaga kursus komputer', '1648542523535a11682426851_r1foto-profile.jpg', 2),
(2, 'Nur apida', 37, 'SMA', 'Wiraswasta', 'Wanita', 'nurapida580@gmail.com', '', 'responden_default.png', 3),
(3, 'Nurafni puddin', 28, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'nurafnipuddin13@gmail.com', '', 'responden_default.png', 4),
(4, 'Sunarti', 42, 'SMA', 'IRT', 'Wanita', 'sunarti04071981@gmail.com', '', 'responden_default.png', 5),
(5, 'Nurhidayah', 19, 'SMP', 'IRT', 'Wanita', 'nh4901879@gmail.com', '', 'responden_default.png', 6),
(6, 'Sucianti', 20, 'SMA', 'IRT', 'Wanita', 'sucianti338@gmail.com', '', 'responden_default.png', 7),
(7, 'Masni', 28, 'SMA', 'Bertani', 'Wanita', 'masni4960@gmail.com', '', 'responden_default.png', 8),
(8, 'Winda Ashari', 31, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'windaashari38@gmail.com', '', 'responden_default.png', 9),
(9, 'Erni', 32, 'Perguruan Tinggi', 'PNS', 'Wanita', 'e289477@gmail.com', '', 'responden_default.png', 10),
(10, 'rahmawati', 32, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'rahmawati292810@gmail.com', '', 'responden_default.png', 11),
(11, 'Nuryanti', 29, 'SMA', 'IRT', 'Wanita', 'nuryantii180517@gmail.com', '', 'responden_default.png', 12),
(12, 'Rusna rustamin', 31, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'rusnarustamin@gmail.com', '', 'responden_default.png', 13),
(13, 'Nadila', 27, 'SMA', 'IRT', 'Wanita', 'n139195@gmail.com', '', 'responden_default.png', 14),
(14, 'Fatma', 28, 'SMA', 'Wiraswasta', 'Pria', 'fatma16082991@gmail.com', '', 'responden_default.png', 15),
(15, 'Haslinda', 33, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'haslinda10728@gmail.com', '', 'responden_default.png', 16),
(16, 'Erika', 28, 'Perguruan Tinggi', 'Pegawai Swasta', 'Wanita', 'erika72943@gmail.com', '', 'responden_default.png', 17),
(17, 'Elisia', 35, 'Perguruan Tinggi', 'IRT', 'Wanita', 'srinurainun273@gmail.com', '', 'responden_default.png', 18),
(18, 'namira', 25, 'Perguruan Tinggi', 'IRT', 'Wanita', 'srinurainunsakaria@gmail.com', '', 'responden_default.png', 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `date_created`, `id_admin`) VALUES
(1, 'ita123', 'nurpitasari754@gmail.com', 'ita123', 1, '2023-04-25 20:14:10', 1),
(2, 'neo123', 'neoleaderz@gmail.com', 'neo123', 2, '2023-04-25 20:36:32', 1),
(3, 'Nur apida270423092210', 'nurapida580@gmail.com', '123', 2, '2023-04-27 09:22:10', 1),
(4, 'Nurafni puddin270423110213', 'nurafnipuddin13@gmail.com', '123', 2, '2023-04-27 11:02:13', 1),
(5, 'Sunarti300423234305', 'sunarti04071981@gmail.com', '123', 2, '2023-04-30 23:43:05', 1),
(6, 'Nurhidayah010523032517', 'nh4901879@gmail.com', '123', 2, '2023-05-01 03:25:17', 1),
(7, 'Sucianti020523010950', 'sucianti338@gmail.com', '123', 2, '2023-05-02 01:09:50', 1),
(8, 'Masni020523013140', 'masni4960@gmail.com', '123', 2, '2023-05-02 01:31:40', 1),
(9, 'Winda Ashari020523015711', 'windaashari38@gmail.com', '123', 2, '2023-05-02 01:57:11', 1),
(10, 'Erni020523175706', 'e289477@gmail.com', '123', 2, '2023-05-02 17:57:06', 1),
(11, 'rahmawati030523233452', 'rahmawati292810@gmail.com', '123', 2, '2023-05-03 23:34:52', 1),
(12, 'Nuryanti040523223358', 'nuryantii180517@gmail.com', '123', 2, '2023-05-04 22:33:58', 1),
(13, 'Rusna rustamin050523024135', 'rusnarustamin@gmail.com', '123', 2, '2023-05-05 02:41:35', 1),
(14, 'Nadila060523015617', 'n139195@gmail.com', '123', 2, '2023-05-06 01:56:17', 1),
(15, 'Fatma060523022630', 'fatma16082991@gmail.com', '123', 2, '2023-05-06 02:26:30', 1),
(16, 'Haslinda060523024504', 'haslinda10728@gmail.com', '123', 2, '2023-05-06 02:45:04', 1),
(17, 'Erika060523030114', 'erika72943@gmail.com', '123', 2, '2023-05-06 03:01:14', 1),
(18, 'Elisia060523184746', 'srinurainun273@gmail.com', '1234', 2, '2023-05-06 18:47:46', 1),
(19, 'namira060523190800', 'srinurainunsakaria@gmail.com', '1234', 2, '2023-05-06 19:08:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Adminstrator'),
(2, 'Responden');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`id_user`);

--
-- Indexes for table `applied_kuesioner_responden`
--
ALTER TABLE `applied_kuesioner_responden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_postest_intervensi`
--
ALTER TABLE `kuesioner_postest_intervensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_postest_kontrol`
--
ALTER TABLE `kuesioner_postest_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_pretest_intervensi`
--
ALTER TABLE `kuesioner_pretest_intervensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_pretest_kontrol`
--
ALTER TABLE `kuesioner_pretest_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_responden_postest_intervensi`
--
ALTER TABLE `kuesioner_responden_postest_intervensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_responden` (`id_responden`);

--
-- Indexes for table `kuesioner_responden_postest_kontrol`
--
ALTER TABLE `kuesioner_responden_postest_kontrol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_responden` (`id_responden`);

--
-- Indexes for table `kuesioner_responden_pretest_intervensi`
--
ALTER TABLE `kuesioner_responden_pretest_intervensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_responden` (`id_responden`);

--
-- Indexes for table `kuesioner_responden_pretest_kontrol`
--
ALTER TABLE `kuesioner_responden_pretest_kontrol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_responden` (`id_responden`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_log`
--
ALTER TABLE `materi_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_kuesioner_responden`
--
ALTER TABLE `applied_kuesioner_responden`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuesioner_postest_intervensi`
--
ALTER TABLE `kuesioner_postest_intervensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kuesioner_postest_kontrol`
--
ALTER TABLE `kuesioner_postest_kontrol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kuesioner_pretest_intervensi`
--
ALTER TABLE `kuesioner_pretest_intervensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kuesioner_pretest_kontrol`
--
ALTER TABLE `kuesioner_pretest_kontrol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kuesioner_responden_postest_intervensi`
--
ALTER TABLE `kuesioner_responden_postest_intervensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kuesioner_responden_postest_kontrol`
--
ALTER TABLE `kuesioner_responden_postest_kontrol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kuesioner_responden_pretest_intervensi`
--
ALTER TABLE `kuesioner_responden_pretest_intervensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kuesioner_responden_pretest_kontrol`
--
ALTER TABLE `kuesioner_responden_pretest_kontrol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi_log`
--
ALTER TABLE `materi_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

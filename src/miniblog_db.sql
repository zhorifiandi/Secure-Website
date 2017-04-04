-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 04:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `content` text NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` enum('draft','posted') NOT NULL COMMENT 'Posted,Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `created_date`, `content`, `last_updated`, `status`) VALUES
(29, 1, '5 Alat Canggih Doraemon yang Jadi Kenyataan', '2016-10-27 11:31:40', '<p>Doraemon&nbsp;adalah salah satu film anime legendaris yang pernah ada. Film ini menceritakan sebuah robot ajaib yang bisa mengeluarkan alat-alat unik dari dalam kantongnya. Pernahkah kamu membayangkan alat-alat yang ada di kantong Doraemon menjadi kenyataan?</p><p>Sepertinya hal tersebut benar-benar terjadi. Percaya atau tidak, beberapa alat yang ada di serial fiksi ilmiah buatan Jepang tersebut sudah mulai bisa digunakan di dunia nyata. Apa saja alat Doraemon yang ternyata ada dan bisa digunakan di dunia nyata?&nbsp;</p><h2>Alat Doraemon yang Jadi Kenyataan</h2><h3>1. Printer 3D</h3><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-1.jpeg"><br><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-2.jpeg"><br>Doraemon memiliki sebuah alat yang bisa menciptakan benda hanya dengan digambar. Alat tersebut kini benar-benar tercipta. Dinamakan sebagai&nbsp;Printer 3D, kamu bisa menciptakan beragam hal seperti&nbsp;kaca,&nbsp;jembatan,&nbsp;supercar,&nbsp;pancake&nbsp;dan masih banyak lagi. Kamu bisa menciptakan rangkaian bendanya, lalu menggabungkannya sendiri. Dengan adanya Printer 3D, tentu&nbsp;5 benda ini tidak akan dijual lagi.<br><h3><br></h3><h3>2. Konyaku Penerjemah</h3><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-3.jpeg"><br><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-4.jpeg"><br>Konyaku Penerjemah (jelly penerjemah)<span>&nbsp;adalah alat Doraemon yang bisa menerjemahkan berbagai bahasa secara cepat ketika sudah dimakan. Alat tersebut kini sudah bisa digunakan secara langsung di dunia nyata. Yap, Google Translate! Aplikasi buatan Google ini mampu menerjemahkan bahasa asing hanya dengan difoto ataupun direkam suara.<br></span><br><h3>3. Baling-Baling Bambu</h3><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-5.jpeg"><br><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-6.jpeg"><br>Baling-baling Bambu adalah salah satu alat Doraemon yang paling fenomenal. Alat ini bisa mempermudah kamu terbang hanya dengan meletakkannya di atas kepala. Alat yang berfungsi mirip seperti baling-baling bambu di dunia nyata adalah&nbsp;JetPack. Salah satu contoh JetPack yang baru-baru diperkenalkan bernama&nbsp;JetPack Aviation JB-10<span>. JB-10 bisa berada di atas udara selama 10 menit dengan kecepatan hingga 160Kmph.<br></span><br><h3>4. Kain Tak Terlihat</h3><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-7.jpeg"><br><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-8.jpeg"><br>Kain tak terlihat adalah alat Doraemon untuk membuat penggunanya menghilang. Alat yang berfungsi mirip seperti kain tak terlihat ada pada&nbsp;mobil yang satu ini<span>. Alat tersebut rupanya berupa proyektor yang akan membuat seakan-akan kursi belakang dari mobil kamu menjadi transparan sehingga kamu dapat melihat objek di belakang mobil dengan jelas. Karena masih berbentuk prototipe, tentu masih banyak kekurangan dari alat ini.<br></span><br><h3>5. Mesin Pembuat Hujan</h3><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-9.jpeg"><br><img alt="" src="https://assets.jalantikus.com/assets/cache/0/0/userfiles/2016/10/25/alat-doraemon-yang-jadi-nyata-10.jpeg"><br>Mesin pembuat hujan adalah salah satu alat Doraemon yang berfungsi untuk membuat awan dan hujan secara otomatis. Alat yang mirip seperti mesin pembuat hujan sudah diciptakan oleh&nbsp;Billions in Change. Alat ini bisa mengubah air laut atau air tercemar lainnya menjadi air tawar yang bisa diminum dan cocok untuk pertanian.<br>', '2016-10-29 12:22:32', 'posted'),
(30, 1, '8 Aplikasi Android Buatan Anak Bangsa Paling Populer di Dunia', '2016-10-29 20:34:46', 'Nggak ada habis-habisnya kalau ngomongin soal perkembangan teknologi, salah satunya adalah smartphone. Pertumbuhan pengguna smartphone di Indonesia memang sangat besar, baik itu Android maupun iOS dan menciptakan peluang bagi developer lokal untuk turut unjuk kebolehan dalam menciptakan aplikasi berkualitas.Kemampuan orang Indonesia di bidang teknologi informasi, memang tidak perlu diragukan. Ya,&nbsp;developer&nbsp;lokal juga enggak kalah bagusnya dalam mengembangkan aplikasi&nbsp;mobile. Maka dari itu, JalanTikus rangkum nih sederet aplikasi lokal inovatif yang punya fitur bermanfaat dan telah banyak digunakan untuk menunjang berbagai aspek kehidupan.Aplikasi Lokal Android Terbaik Paling Populer<br><br>1.&nbsp;Qlue<br><br>Selain macet ada juga banjir, sampah, kebersihan lingkungan, premanisme, dan lain sebagainya. Itulah masalah yang kerap di hadapi di Jakarta. Nah ada aplikasi yang dapat memberikan pengaduan dengan cara yang mudah bernama Qlue.Qlue adalah aplikasi media sosial yang memungkinkan kamu menyampaikan pengaduan atau keluhan secara real time, hingga mem-follow teman dan berkirim pesan dengan lurah atau RT di daerahnya. Qlue bekerja sama dengan Pemerintah Provinsi DKI Jakarta dan Google untuk dapat menjalankan operasinya.<br><br>2. Catfiz Messenger<br><br>Ramainya persaingan aplikasi&nbsp;chatting&nbsp;global, seperti BBM, WhatsApp, Messenger, dan LINE, karya developer lokal asal Surabaya, Catfiz, tetap mendapat porsi cukup besar dari para penggunanya yang kebanyakan tersebar di Timur Tengah.<br><br>3. Ruang Guru<br>Khusus buat kamu nih yang masih sekolah dan kuliah, wajib banget install aplikasi&nbsp;Ruang Guru. Dimana jika ada PR dan kamu engga ngerti, kamu bisa tanya di situ. Bahkan kamu juga bisa cari pengajar berkualitas untuk menjadi guru privat, meningkatkan nilai, maupun mempelajari keahlian baru.<br><br>4. Alfacart<br><br>Sekarang engga perlu bingung lagi belanja bulanan kalau lagi sibuk, karena sudah ada Alfamart versi&nbsp;onlineyakni&nbsp;Alfacart. Siap melayani buat kamu yang engga sempat dan engga ada waktu. Karena Alfacart berada di satu perusahaan yang sama dengan Alfamart, kamu juga bisa mengambil barang belanjaan promo yang kamu beli secara&nbsp;online&nbsp;di gerai Alfamart terdekat. Intinya sih, belanja&nbsp;online&nbsp;menjadi lebih dekat.<br><br>5. BaBe - Baca Berita Indonesia<br><br>Membaca berita di koran atau menontonnya di TV sepertinya sudah ketinggalan jaman deh. Di internet, kamu bisa membaca jutaaan berita berbeda setiap harinya. Tapi repot juga kan kalau harus&nbsp;browsing&nbsp;banyak website berita? Makanya, kamu butuh aplikasi&nbsp;BaBe - Baca Berita Indonesia, aplikasi berita no. 1 di Indonesia yang menyediakan berita-berita pilihan terbaik langsung di smartphone kamu. Menariknya, kamu bisa mengatur sendiri berita yang muncul sesuai dengan tema favorit kamu.<br><br>6. Pawoon: POS Application dan Pawoon Waiter<br><br>Buat kamu yang&nbsp;entrepreneur&nbsp;atau pebisnis yang memiliki gerai cabang di berbagai daerah, mengakses hasil penjualan secara&nbsp;real time&nbsp;adalah suatu kebutuhan dasar. Hal ini adalah suatu tantangan tersendiri mengingat berbagai&nbsp;software&nbsp;atau&nbsp;hardware&nbsp;kasir yang beredar saat ini masih belum mendukung sistem tersebut. Tenang saja, sekarang sudah aplikasi yang menjawab tantangan tersebut. Jadi, kamu engga perlu lagi beli mesin kasir.&nbsp;Pawoon Waiter&nbsp;merupakan aplikasi bagi pramusaji dan&nbsp;Pawoon POS&nbsp;untuk kasirnya.<br><br>7. Minutes Barber<br><br>Minutes Barber&nbsp;adalah sebuah aplikasi yang diperuntukkan untuk mem-booking slot&nbsp;cukur di&nbsp;barber shop&nbsp;yang mulai marak digandrungi. Bukan hanya mempermudah masyarakat yang ingin bercukur, aplikasi ini juga ampuh mendorong pendapatan pemilik&nbsp;barber shop. Jadi, kamu engga perlu lagi tuh yang namanya mengantri entah sampai berapa lama menunggu giliran.<br><br>8. Wavoo<br><br><p>Wavoo&nbsp;adalah aplikasi yang bisa memudahkan kamu dalam menemukan teman baru berdasarkan paras yang menarik, minat, dan lokasi yang dekat dengan kamu. Pengguna Wavoo pun bisa mengunggah foto dan melakukan check in di tempat-tempat tertentu.</p><p>Aplikasi saingan Tinder ini dibekali teknologi augmented reality pada fitur “nearby”. Jadi yang mempermudah kamu mengenali kandidat pasangan melalui kisaran jarak dan antarmuka yang lebih jelas</p><br><br>        <br>', '2016-11-02 09:23:03', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1:admin;0:user',
  `passwd_expdate` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `role`, `passwd_expdate`, `status`, `login_attempt`) VALUES
(1, 'foobar1', 'foobar1', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 0, '2017-01-27', 1, 0),
(2, 'foobar2', 'foobar2', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 0, '2016-11-24', 1, 0),
(3, 'foobar3', 'foobar3', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 1, '2016-11-24', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

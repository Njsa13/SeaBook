-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 07:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seabook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin`, `nama`, `username`, `password`) VALUES
(1, 'Joko', 'admin1', '123'),
(2, 'Jito', 'admin2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok_buku` int(20) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `gambar`, `penulis`, `harga`, `tanggal_terbit`, `penerbit`, `kategori`, `bahasa`, `deskripsi`, `stok_buku`) VALUES
(3, 'Pengantar Oseanografi', '../assets/img/buku/oseanografi.jpg', 'Ahmad Yani', 80000, '2021-12-03', 'Intimedia', 'Alam', 'Indonesia', 'Pengantar Oseanografi', 100),
(4, '22 Desain Kamar Mandi Mungil', '../assets/img/buku/desainkamarmandi.jpg', 'Imelda Akmal', 60000, '2013-02-03', 'Gramedia Pustaka Utama', 'Arsitektur', 'Indonesia', 'Anda pasti akan setuju, kamar mandi yang bersih dan sehat akan mencerminkan keapikan dari rumah dan penghuninya. Oleh karena itu, sudah sepantasnya ruang paling privat untuk membersihkan dan merawat diri ini dibuat dan merawat diri tersebut, untuk dibuat dan ditata sebaik mungkin. Selain untuk penghuni rumah, kenyamanan para tamu saat menggunakannya pun patut dipikirkan. Desain yang atraktif akan menjadi nilai plus.\r\nUntuk menjawab kebutuhan tersebut, berikut ini kami hadirkan berbagai macam desain kamar mandi mungil yang bukan hanya kompak dan efektif, tetapi juga akan menambah nilai estetis rumah Anda. Dengan kisaran ukuran yang mulai dari 1 x 2 m, sampai dengan 2 x 2 m, desain-desain yang ditampilkan di sini pun dengan mudah diterapkan di mana saja, termasuk di area yang sangat terbatas sekalipun.\r\nSelain itu, Buku 22 Desain Kamar Mandi Mungil ini juga dilengkapi dengan perhitungan harga, yang Anda bebas menentukan pilihan berdasarkan;\r\nElemen penutup lantai (keramik/ batu alam)\r\nMaterial dinding, serta\r\nWarna dan corak\r\nNikmati 22 pilihan atmosfer berbeda dan silakan terapkan untuk kamar mandi Anda!', 100),
(5, 'Catatan Pinggir 15', '../assets/img/buku/catatanpinggir15.jpg', 'Goenawan Mohamad', 100000, '2023-06-23', 'Tempo Publishing', 'Fiksi', 'Indonesia', '46 TAHUN, 2,027 tulisan, 1,5 juta kata, 15. pla buku dan rubrik Catatan Pinggir di majalah Tempo pun beristirahat. Saya memutuskan untuk tal akan menuliskannya lagi tiap minggu. Tentu ada yang bisa disyukuri dan ada yang bisa disesali dari kerja terus-menerus itu. Tapi yang saya capai pada akhirnya terbatas.', 90),
(6, 'Suluh Rindu', '../assets/img/buku/CD-suluh-rindu-1.jpg', 'Habiburrahman El Shirazy', 130000, '2022-08-29', 'Republika Penerbit', 'Fiksi', 'Indonesia', '', 82),
(7, 'Kalkulus Untuk Perguruan Tinggi', '../assets/img/buku/kalkulus_untuk_perguruan_tinggi_mhd_daud_pinem_v.jpg', 'Mhd. Daud Pinem', 110000, '2015-04-19', 'Rekayasa Sains', 'Matematika', 'Indonesia', 'Buku Kalkulus untuk Perguruan Tinggi ini merupakan buku yang disajikan dalam bentuk yang sangat sederhana. Buku ini ditujukan untuk semua mahasiswa Indonesia yang duduk di Perguruan Tinggi, baik swasta maupun negeri. Materi kalkulus untuk mahasiswa yang kuliah di jurusan IPA (ilmu eksak) pasti senantiasa dijumpai. Dan mata kuliah ini merupakan mata kuliah yang banyak ditakuti oleh mahasiswa dikarenakan dalam mempelajarinya sangat sulit sekali. Kenapa mahasiswa sangat kewalahan dalam belajar kalkulus walaupun mereka sudah belajar ekstra? Jawaban dari pertanyaan ini adalah karena buku-buku referensi yang mereka gunakan untuk belajar belum sesuai dengan yang mereka harapkan. Jika dilihat sekarang ini, buku-buku kalkulus yang ada menyajikan materi dan teori memang sudah sangat lengkap, akan tetapi contoh soal yang bervariasi dan pembahasan yang diberikan tidak terlalu banyak. Hal inilah salah satu yang membuat mahasiswa menjadi tetap bingung dalam belajar kalkulus.', 95),
(8, 'Koleksi Aplikasi Web Laravel', '../assets/img/buku/laravel.jpg', 'Ir. Yuniar Supardi', 76000, '2023-06-19', 'Elex Media Komputindo', 'Komputer', 'Indonesia', 'Membahas beberapa aplikasi web yang dibuat dengan Laravel 9. Laravel merupakan framework PHP yang paling populer saat ini. Dengan pemrograman modern MVC (Model-View-Controller) dapat membuat struktur program yang lebih terorganisasi dan memudahkan pengembang (programmer) dalam membuat aplikasi web. Laravel terkenal dengan perintah artisan, memudahkan pengembang menjalankan perintah-perintah pembuatan web. Topik yang dibahas dalam buku ini mencakup: • Instalasi Perangkat Lunak • Memodifikasi File View • Membuat View dan Route • Melihat Versi Laravel • Web Login dengan MySQL • Web CRUD dengan MySQL • Web Sistem Restoran • Web Sistem Coffee Shop • Web Upload dan Menampilkan Gambar • Web Blog Sederhana • Web Toko Online • dan lain-lain.', 100),
(11, 'Panduan Praktis Budidaya Kakao', '../assets/img/buku/Panduan_Praktis_Budidaya_Kakao.jpg', 'TUMPAL H.S.SIREGAR', 50000, '2021-10-22', 'PENEBAR SWADAYA', 'Berkebun', 'Indonesia', 'Sebagai komoditas yang menyumbang devisa negara, perkebunan cokelat atau kakao terus dikembangkan. Hal itu karena cokelat menjadi komoditas ekspor yang permintaannya selalu meningkat setiap tahunnya. Bahkan, cokelat menjadi komoditas yang hampir sejajar dengan kelapa sawit. Pada tahun 2020, tercatat Indonesia mampu mengekspor biji kakao dalam jumlah besar ke 5 negara, meliputi Malaysia, Amerika, India, Cina, dan Belanda dengan total lebih dari 200.000 ton. Hal ini juga menjadi dasar bahwa selain kuantitas, kualitas kakao harus ditingkatkan.', 80),
(12, 'Sepasang Sepatu Tua', '../assets/img/buku/6s8qxvxkejspyyz29crf3k.jpg', 'Sapardi Djoko Damono', 71000, '2023-05-30', 'Gramedia Pustaka Utama', 'Fiksi', 'Indonesia', 'Pada suatu malam, ketika keluargaku kebetulan pulang kampung, aku dikagetkan oleh suara keras mereka. Apa mereka bertengkar? Kudengarkan baik-baik yang kiri mengatakan dengan lantang bahwa mereka sebenarnya tidak berasal dari kulit sapi yang sama.\r\n\r\n“Mana mungkin!” Ucap yang kanan menegaskan. “Kita berasal dari seekor sapi. Kulitnya yang lebar itu disamak, lalu dipotong-potong dengan mesin untuk membuat kita. Kulit seekor sapi cukup lebar untuk membuat beberapa sepatu, tahu!” Ucap yang kiri menegaskan.\r\n\r\n“Ya, tapi bisa saja potongan-potongan itu bercampur sehingga tidak jelas lagi berasal dari kulit sapi yang mana. Kita ini asalnya berbeda. Aku jelas sapi Jerman, kau entah sapi apa, mungkin sapi Prancis.” Ucap yang kanan menjelaskan.\r\n\r\nSepasang sepatu yang bertengkar, arak-arakan kertas yang berjalan di malam hari, rumah yang saling menyindir adalah beberapa cerita dari buku ini. Cerita dalam buku ini, beberapa benda menjelma menjadi pencerita yang piawai. Lewat benda-benda mati yang berkisah itu, manusia seakan diingatkan kembali akan kemanusiaannya.', 99),
(13, 'Tokyo Ghoul : Re 15', '../assets/img/buku/9786230304569_tokyo_ghoul_re_15_1-1.jpg', 'Sui Ishida', 50000, '2021-06-30', 'ShounenJump', 'Fiksi', 'Indonesia', 'Tokyo Ghoul berlatar dalam realitas alternatif di mana hantu adalah makhluk yang terlihat seperti manusia normal, tetapi makhluk ini hanya bisa bertahan hidup dengan memakan daging manusia. Hantu ini hidup secara diam-diam di antara populasi manusia. Mereka menyembunyikan sifat asli mereka untuk menghindari pengejaran dari pihak berwenang.\r\nGhoul memiliki kekuatan, seperti peningkatan kekuatan dan kemampuan regeneratif, di mana hantu biasa menghasilkan energi kinetik 4-7 kali lebih banyak di otot mereka daripada manusia normal. Ghoul juga memiliki beberapa kali sel RC, yaitu sel yang mengalir seperti darah dan dapat menjadi padat seketika. Kulit hantu tahan terhadap senjata penusuk biasa, dan ia memiliki setidaknya satu organ pemangsa khusus yang disebut kagune.\r\nSinopsis Buku\r\n\r\n\"Aku ada di sini, karena semuanya sudah kau makan\" Ghoul dan CCG bekerja sama untuk menyelamatkan Ken Kaneki dan Tokyo. Dengan mempersatukan seluruh tenaga para penghuni Tokyo, akhirnya 15 mereka mendapatkan petunjuk letak tubuh asli Kaneki. Toru Mutsuki yang mengejar fatamorgana sosok \"Haise Sasaki\" dan Toka Kirishima yang menjadi pengikat \"Ken Kaneki\". Eksistensi tim Quinx yang mempertanyakan arti keberadaan mereka, kini memasuki babak akhir. Lalu, di dalam benak Kaneki, ada sang gadis pecinta sastra dan makanan.', 47),
(14, 'Moonbound', '../assets/img/buku/xacbz5jqa7gnnbqgvwazqa.jpg', 'Jang Ryujin', 65000, '2023-06-06', 'Gramedia Pustaka Utama', 'Fiksi', 'Indonesia', 'Da-hae, Eun-sang, dan Ji-song adalah tiga sahabat sekaligus karyawan level bawah di Maron di Seoul. Meski mereka sudah bekerja keras, rela lembur, patuh pada atasan-atasan menyebalkan, dan berkontribusi banyak terhadap perusahaan, gaji mereka tidak pernah naik karena hasil evaluasi kinerja mereka setiap tahun tidak pernah lebih dari “Cukup”. Gaji mereka yang kecil hanya cukup untuk menyewa tempat tinggal kecil dan murah, serta untuk menyambung hidup seadanya selama sebulan sampai akhirnya menerima gaji lagi. Situasi hidup yang mendesak membuat mereka memutuskan terjun ke dunia mata uang kripto. Mereka mempertaruhkan segala yang dimiliki, mengosongkan tabungan, bahkan mengambil pinjaman tambahan dari bank, dengan harapan nilai mata uang kripto yang mereka beli akan “meroket ke bulan” dan menjadikan mereka kaya raya. Namun, mengarungi ombak mata uang virtual bagaikan berada di kapal yang mengarungi ombak ganas di tengah badai. Akankah ketiga sahabat itu tiba di darat dengan selamat, atau apakah kapal yang mereka tumpangi karam di tengah badai?', 79),
(15, 'Semu (Fake)', '../assets/img/buku/eqptxkmwhsxdeaeuu6a8gc.jpg', 'Ele Fountain, ELE FOUNTAIN', 60000, '2023-06-05', 'Gramedia Pustaka Utama', 'Fiksi', 'Indonesia', '', 38),
(16, 'Kondensasi', '../assets/img/buku/5ita6ep4mhyy6ywaj6cc2z.jpg', 'Poppy D. Chusfani', 50000, '2023-04-02', 'Gramedia Pustaka Utama', 'Fiksi', 'Indonesia', 'Kemampuan Aislin menyerap berbagai emosi dari orang lain mengharuskan dia mendirikan tembok dalam hatinya agar tidak terpengaruh. Itu sebabnya Aislin jengkel sekali ketika atasannya menyuruhnya dan empat orang lain menyepi ke pulau pribadi agar pekerjaan mereka menulis naskah lekas selesai. Terlebih lagi, bukan hanya terjangan emosi rekan-rekannya yang membuat Aislin kewalahan. Sesuatu yang jahat bangkit di pulau itu dan mengusik mereka. Komunikasi ke dunia luar terputus, kabut menelan pulau, halusinasi akan ketakutan terbesar mereka memorak-porandakan benak. Di tengah tabrakan emosi dan teror yang mencekik, Aislin tidak tahu apakah kewarasannya bisa bertahan.', 50),
(17, 'Level Comic: Attack on Titan 30', '../assets/img/buku/9786230026683_Attack_on_Titan_30_1.jpg', 'Hajime Isayama', 27000, '2021-06-16', 'ShounenJump', 'Fiksi', 'Indonesia', 'Zeke yang sudah lepas dari jeratan kapten Levi kembali menjalankan rencana utamanya, eutanasia atau pelenyapan massal ras Eldia adalah cara terakhir yang dipikirkan Zeke. Tindakan ini, untuk menghapus kebencian dunia terhadap rasnya sendiri. Di lain tempat, Pulau Paradise yang sedang diserang mempertemukan kembali Eren dengan rivalnya, yaitu Reiner.\r\n\r\nPertempuran yang mempertaruhkan kelangsungan dunia pun menggelegar di pulau itu. Mampukah Zeke sang Titan yang memiliki darah bangsawan melakukan kontak fisik dengan adiknya Eren sang pemegang Founding Titan untuk menjalankan rencana eutanasianya?\r\n\r\nRencana yang diceritakan oleh Zeke pada Eren adalah eutanasia bagi seluruh orang Eldia. Pemegang kunci rencana tersebut adalah Eren, yang memiliki kekuatan Titan Perintis, dan Zeke, Titan yang mewarisi darah keluarga raja. Setelah berhasil menerobos jaring pengepungan Levi dan Pasukan Penyelidik, Zeke akhirnya bebas, tapi muncullah Pasukan Marley. Dapatkah Eren dan Zeke melakukan kontak fisik?', 50),
(18, 'Si Anak Pintar', '../assets/img/buku/9786025734502_si-anak-pinta.jpg', 'Tere Liye', 60000, '2018-12-07', 'REPUBLIKA PENERBIT', 'Fiksi', 'Indonesia', '“Kitalah yang paling tahu seperti apa kita, sepanjang kita jujur terhadap diri sendiri. Sepanjang kita terbuka dengan pendapat orang lain, mau mendengarkan masukan dan punya sedikit selera humor, menertawakan diri sendiri. Dengan itu semua kita bisa memperbaiki perangai.” kutipan dari buku berjudul Si Anak Pintar adalah salah satu fiksi sastra jenis novel Karya Tere Liye. Tere Liye sendiri merupakan nama pena penulis novel Indonesia. Tere Liye lahir di Lahat, Indonesia, 21 Mei 1979 dengan nama Darwis. Beberapa karya Tere Liye yang diangkat ke layar lebar yaitu Hafalan Shalat Delisa dan Moga Bunda Disayang Allah. Meski berhasil dalam dunia literasi Indonesia, kegiatan menulis hanya sekedar hobi karena sehari-hari ia masih bekerja di kantor sebagai seorang akuntan, ia merupakan anak dari seorang petani biasa yang tumbuh dewasa di pedalaman Sumatera. Kehidupan masa kecil yang dilalui Tere Liye penuh dengan kesederhanaan yang membuatnya tetap sederhana hingga kini. Sosok Tere Liye terlihat tidak banyak gaya dan tetap rendah hati dalam menjalani kehidupannya.', 99),
(19, 'Sepotong Hati Yang Baru', '../assets/img/buku/sepotonght.jpg', 'Tere Liye', 72000, '2021-01-19', 'PENERBIT SABAK GRIP', 'Fiksi', 'Indonesia', 'Buku novel yang berjudul Sepotong Hati Yang Baru ini merupakan karya dari novelis terkenal yaitu Tere Liye. Novel ini dapat dinikmati oleh pembaca baik dari kalangan remaja maupun orang dewasa. Membaca tulisan-tulisan Tere Liye, pembaca akan langsung terbawa irama. Karena pemilik nama asli Darwis itu cukup pandai bermain alur. Termasuk di kumpulan tulisan “Sepotong Hati yang Baru”.\r\n\r\nKelahiran 21 Mei 1979 di daerah pedalaman Sumatera Selatan, tepatnya Lahat, lebih dikenal sebagai penulis novel melalui beberapa karyanya yang pernah diangkat ke layar kaca karena mudah membawa khalayak terseret arus. Sebut saja; Hafalan Shalat Delisa dan Moga Bunda Disayang Allah. Tak hanya itu saja masih banyak lagi karya-karya Tere Liye yang lainnya seperti Hujan, Rindu, #AboutLove, Berjuta Rasanya, hingga Tentang Kamu.\r\n\r\nDi buku berjudul “Sepotong Hati yang Baru” ini Tere Liye menyajikan berbagai macam cerita pendek. Sesuai dengan judulnya cerpen ini mengkisahkan tentang sepotong hati yang baru. Sepotong hati yang baru saja hilang. Di dalamnya terdapat suatu kisah cinta legenda dan terdapat pula kisah cinta kalangan manusia biasa pada umumnya.', 58),
(20, 'Remuk Redam', '../assets/img/buku/9786025129001_Remuk-Redam.jpg', 'Christian Simamora', 77000, '2018-04-15', 'Roro Raya Sejahtera', 'Fiksi', 'Indonesia', 'Christian Simamora merupakan seorang penulis kelahiran 9 Juni 1983. Pria asal Jakarta ini sudah menyukai dunia tulis-menulis sejak masih kecil. Pelopornya adalah sang ibu yang setiap tahunnya rutin menulis puisi. Christian Simamora pun memutuskan untuk serius menulis ketika dirinya beranjak dewasa. Di sela-sela menyelesaikan skripsinya, Christian Simamora menghilangkan stres dengan menulis. Pada tahun 2006, dia pun menerbitkan beberapa novel seperti Boylicious, Kissing Me Softly, dan Jangan Bilang Siapa-Siapa.\r\n\r\nRemuk Redam bercerita tentang Olivia yang kesal karena pendapatan butiknya semakin menipis dan dia diundang untuk datang ke MagCon, sebuah festival untuk anak muda masa kini. Rencana Olivia adalah untuk bertemu Mahir Siregar, tetapi dia malah bertemu dengan Lucas Wolfe. Di sisi lain, Lucas juga memiliki rahasia yang sangat rahasia tentang keintimannya dengan Olivia. Sama-sama cinta, sama-sama terluka, itulah keajaiban hubungan Lucas dan Olivia.', 100),
(21, 'Saga dari Samudra', '../assets/img/buku/la6bjhefmuksgptcjgggbimm.jpg', 'Ratih Kumala', 75000, '2023-06-06', 'Gramedia Pustaka Utama', 'Fiksi', 'Indonesia', 'Hidup Nyai Ageng Pinatih berubah saat dia menemukan bayi kecil di tengah laut yang dengan magis menghentikan kapal dagangnya. Bayi ini ia beri nama Jaka Samudra. Kelak, bocah ini tak cuma mengubah hidup ibu angkatnya, lebih dari itu, juga dunia yang disentuhnya. Sementara, Jaka Samudra sendiri selalu mempertanyakan tentang asal-usulnya. Lewat novel Saga dari Samudra, Ratih Kumala akan mengajak Kisanak mengunjungi tanah Jawa pada abad ke-15. Saat hidup lebih sederhana, rasa takut lebih nyata, keberanian punya harga, dan Sang Pencipta punya banyak rencana.', 90),
(22, 'Akuntansi Untuk Bisnis Pemula', '../assets/img/buku/9nhqlvaeczyjbq7p9ltxjpakun.jpg', 'Harsono Yoewono', 74000, '2023-07-07', 'Thema Publishing', 'Bisnis & Ekonomi', 'Indonesia', 'Akuntansi untuk Bisnis Pemula\" adalah buku panduan yang dirancang khusus untuk para pemilik bisnis baru yang ingin memahami dasar-dasar akuntansi dan mengelola keuangan bisnis mereka dengan baik.\r\nDalam buku ini, pembaca akan diperkenalkan pada konsep dasar akuntansi, mulai dari pencatatan transaksi keuangan hingga penyusunan laporan keuangan. Buku ini disusun dengan bahasa yang sederhana dan disertai contoh-contoh praktis yang relevan dengan bisnis pemula.\r\nPertama-tama, pembaca akan belajar tentang pentingnya mencatat transaksi keuangan secara teratur dan akurat. Mereka akan mempelajari bagaimana membuat jurnal transaksi, mencatat pendapatan, pengeluaran, dan penghasilan lainnya, serta bagaimana mengorganisasi dokumen keuangan yang penting.\r\nSelanjutnya, buku ini akan menjelaskan tentang penyusunan laporan keuangan dasar, seperti laporan laba rugi, neraca, dan arus kas. Pembaca akan diberikan panduan langkah demi langkah dalam memahami dan menyusun laporan-laporan ini, serta memahami arti dan tujuan di balik setiap laporan.\r\nSelain itu, buku ini juga memberikan penjelasan mengenai konsep penting dalam akuntansi bisnis, seperti pengenalan terhadap konsep aset, kewajiban, ekuitas pemilik, serta bagaimana melakukan analisis keuangan sederhana untuk mengevaluasi kinerja bisnis.\r\nBuku \"Akuntansi untuk Bisnis Pemula\" juga mencakup topik-topik lain yang penting, seperti manajemen kas, perencanaan anggaran, dan pajak bisnis. Pembaca akan mendapatkan pengetahuan praktis yang dapat diterapkan langsung dalam mengelola keuangan bisnis mereka sehari-hari.\r\nBuku ini sangat cocok bagi pemilik bisnis pemula yang ingin membangun dasar pengetahuan akuntansi yang kuat untuk mengelola keuangan bisnis mereka secara efektif. Dengan pemahaman yang baik tentang akuntansi, pembaca akan dapat membuat keputusan yang informasional dan strategis untuk pertumbuhan bisnis mereka.', 30),
(23, 'Kesalahan-Kesalahan Investor Saham Pemula', '../assets/img/buku/722060210_KESALAHAN_KESALAHAN_INVESTOR_SAHAM_PEMULA (1).jpg', 'Raymond Budiman', 58000, '2022-03-27', 'Elex Media Komputindo', 'Bisnis & Ekonomi', 'Indonesia', 'Jangan Diulangi Kesalahan-Kesalahan Investor Saham Pemula Karya Raymond Budiman, adalah buku yang penuh dengan tips dan nasihat untuk para investor pemula. Belajar dari kesalahan tentu merupakan salah satu cara untuk meningkatkan kemampuan. Tidak hanya dari kesalahan sendiri, kita pun dapat belajar dari kesalahan orang lain sehingga kita tidak perlu terjatuh pada lubang yang sama.\r\nKita semua pernah memulai investasi saham sebagai pemula, membuat kesalahan-kesalahan, dan seiring berjalannya waktu semakin memperbaiki diri serta strategi investasi. Setelah bergelut di industri pasar modal selama bertahun-tahun, ternyata dapat disimpulkan bahwa investor saham pemula cenderung melakukan kesalahan yang sama dari waktu ke waktu.\r\nOleh karena itu, buku ini mencoba merangkum kesalahan-kesalahan yang sering dilakukan oleh investor saham pemula, sehingga Anda dapat terhindar dari kesalahan tersebut dan tidak perlu terjatuh pada lubang yang sama. Derasnya investor pemula yang masuk pasar saham, memang merupakan pencapaian yang patut diacungi jempol.\r\nNamun, edukasi dan literasi mengenai pasar modal juga harus dibarengi dengan prestasi tersebut. Hal ini penting, agar target investasi bisa tercapai, dan mengurangi potensi risiko yang terjadi akibat keputusan investor. “Ada 8 kesalahan umum yang dilakukan investor pemula, yakni investasi dengan dana utang, memborong habis di awal, Fear of Missing Out (FoMO), menelan rekomendasi mentah-mentah, panik atau kalap terhadap fluktuasi, tidak punya trading atau investing plan, tidak mau upgrade diri dan tidak melakukan diversifikasi,”', 50),
(24, '7 in 1 Pemrograman Web untuk Pemula (Update Version)', '../assets/img/buku/yclnbqxoyzs2crzzazwsrk7in.jpg', 'Rohi Abdulloh', 130000, '2023-03-22', 'Elex Media Komputindo', 'Komputer', 'Indonesia', 'Teknologi pemrograman web terus berkembang begitu cepat. Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejar. Buku ini membahas 7 materi pemrograman web sekaligus yang menjadi materi utama dalam mempelajari pemrograman web. Dengan demikian, akan sangat membantu pemula yang ingin menguasai pemrograman web untuk mengejar ketertinggalanya dan menjadi web programmer dalam waktu singkat.\r\n\r\nPembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web satu per satu, dilengkapi contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi. Untuk menunjang latihan pembaca, diberikan puluhan bonus skrip aplikatif sehingga dengan menguasai buku ini diharapkan benar-benar menjadi web programmer yang siap untuk membuat aplikasi web secara mandiri.', 60),
(25, 'HTML, PHP, dan MySQL untuk Pemula (Update Version)', '../assets/img/buku/4it8hfv6f7sjwrtnewlllqhtml.jpg', ' Jubilee Enterprise', 76000, '2023-06-03', 'Elex Media Komputindo', 'Komputer', 'Indonesia', 'Website kekinian yang fungsional dibentuk minimal menggunakan tiga macam pemrograman dasar, yaitu HTML, PHP, dan MySQL. HTML digunakan untuk mendesain layout dan bentuk website, sedangkan PHP digunakan untuk membuat website dengan konten yang dinamis dan interaktif. Jika ingin agar website itu dapat menyimpan data, maka Anda membutuhkan MySQL. Buku ini merupakan versi terbaru dari edisi pertama yang terbukti laris di pasaran. Didesain untuk orang awam, pembahasan di dalam buku ini bebas jargon teknis yang sulit sehingga cocok dibaca bagi semua orang. Untuk kepentingan belajar dari nol maka buku ini cocok dipelajari sebab dalam sekali waktu, Anda bisa mempelajari tiga macam pemrograman sekaligus. Diharapkan, sebuah website yang berfungsi dengan baik bisa dibuat dengan memanfaatkan HTML, PHP, dan MySQL. Tool apa saja yang dibutuhkan untuk mempelajari buku ini telah tersedia dan dapat dimiliki secara gratis. Dengan demikian, tak ada halangan untuk dapat mempelajari isi buku ini. Selain itu, buku ini diperkaya dengan materi tentang query MySQL yang tidak dapat ditemukan di dalam buku edisi pertama. Semoga buku ini bisa membantu Anda menjadi seorang web developer yang handal dan sukses!', 73),
(26, '24 Desain Rumah di Bawah 80 Juta', '../assets/img/buku/9789796612178_24-Desain-Rum.jpg', 'Dmaximus', 90000, '2013-01-03', 'Griya Kreasi', 'Arsitektur', 'Indonesia', 'Jumlah penduduk di Indonesia yang semakin bertambah, kenaikan harga tanah, dan biaya pembangunan sebuah rumah yang tidak sebanding dengan pendapatan masyarakat yang menyebabkan kepemilikan rumah menjadi hal yang sulit untuk dijangkau, khususnya bagi masyarakat dengan golongan kelas menengah ke bawah.\r\n\r\nPadahal, tidak mudah mencari sebidang tanah di sekitar daerah perkotaan untuk didirikan sebuah rumah impian yang nyaman, sehat, indah dan juga dengan dana yang terjangkau. Membangun perencanaan yang matang, mendesain dan mengatur bangunan yang fungsional, pemilihan material yang efektif dan juga efisien, serta pelaksanaan pembangunan yang disiplin.\r\n\r\nBuku 24 Desain Rumah di Bawah 80 Juta menjadi solusi bagi anda yang ingin membangun rumah impian, buku ini menyediakan 24 desain rumah yang dapat dijadikan sebagai inspirasi dalam mendesain rumah dengan dana yang terbatas atau di bawah 80 juta rupiah. Setiap desain rumah yang disajikan di dalam buku ini dilengkapi dengan tampilan fasad yang menarik, denah yang realistik, dan RAB (Rencana Anggaran Biaya). Tunggu apalagi, segera miliki buku ini, dan bangun rumah impian Anda segera!', 30);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `jumlah_buku` int(20) NOT NULL DEFAULT 0,
  `harga_beli` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `jumlah_buku`, `harga_beli`, `id_user`, `id_buku`, `id_transaksi`) VALUES
(1, 1, 130000, 4, 6, 2),
(2, 2, 50000, 4, 13, 2),
(3, 2, 72000, 4, 19, 2),
(4, 2, 60000, 4, 18, 3),
(5, 1, 71000, 4, 12, 3),
(6, 2, 130000, 4, 6, 3),
(7, 1, 65000, 4, 14, 3),
(8, 1, 60000, 1, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `waktu_pembayaran` time DEFAULT NULL,
  `virtual_account` varchar(50) NOT NULL,
  `status_pembayaran` enum('Dibayar','Belum Dibayar') NOT NULL DEFAULT 'Belum Dibayar',
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_pembayaran`, `tanggal_pembayaran`, `waktu_pembayaran`, `virtual_account`, `status_pembayaran`, `id_transaksi`) VALUES
(2, 'Transfer Bank BRI', '2023-07-18', '19:12:30', '8372645391', 'Belum Dibayar', 2),
(3, 'Transfer Bank Mandiri', '2023-07-18', '19:18:05', '8018563391', 'Belum Dibayar', 3),
(4, 'Transfer Bank BNI', '2023-07-18', '19:18:59', '8379362539', 'Belum Dibayar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `waktu_transaksi` time NOT NULL DEFAULT current_timestamp(),
  `metode_pengiriman` varchar(50) NOT NULL,
  `biaya_kirim` int(20) NOT NULL,
  `status_transaksi` enum('Menunggu','Dikemas','Dikirim','Sampai') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `alamat`, `tanggal_transaksi`, `waktu_transaksi`, `metode_pengiriman`, `biaya_kirim`, `status_transaksi`) VALUES
(2, 'Banjarnegara', '2023-07-18', '19:12:30', 'JNE', 10000, 'Sampai'),
(3, 'Banjarnegara', '2023-07-18', '19:18:05', 'Sicepat', 20000, 'Sampai'),
(4, 'Cilacap', '2023-07-18', '19:18:59', 'Pos Indonesia', 30000, 'Sampai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `jenis_kelamin`, `tanggal_lahir`, `nomor_telepon`) VALUES
(1, 'paijo', 'paijo@gmail.com', 'paijo1234', 'Laki-laki', '2004-05-29', '082423428240'),
(2, 'Jito', 'sujito@gmail.com', 'sujito123', 'Laki-laki', '2003-05-24', '081298327642'),
(3, 'Paikun', 'paimin@gmail.com', 'blabla', 'Laki-laki', NULL, '081298327642'),
(4, 'Najib Sauqi Rubbayani', 'najib.sauqi@students.amikom.ac.id', 'najib123', 'Laki-laki', '2003-02-24', '082324994934'),
(5, 'yanti', 'yanti@gmail.com', 'yanti123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `transaksi_id` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `transaksi_id` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

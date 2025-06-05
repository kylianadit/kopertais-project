/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kopertais
-- ------------------------------------------------------
-- Server version	10.11.11-MariaDB-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ptkis`
--

DROP TABLE IF EXISTS `ptkis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ptkis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `akreditasi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptkis`
--

LOCK TABLES `ptkis` WRITE;
/*!40000 ALTER TABLE `ptkis` DISABLE KEYS */;
INSERT INTO `ptkis` VALUES
(4,'Universitas Islam An Nur Lampung','Baik','Jl. Pesantren No.01, Sidoharjo, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365','https://pddikti.kemdiktisaintek.go.id/detail-pt/BdSojXO3sL1sMlY1BXmCJ-keMQmJ55lWXNm24H-pVcLDUDGSqMMznt-tOeU9EeQdq5Nz0w==','logo/1749102561_univ_an_nur_lampung.png','2025-05-20 22:25:12','2025-06-04 22:49:21'),
(5,'Universitas Islam Lampung','-','Jl. Jenderal Sutiyoso No.7, Metro, Kec. Metro Pusat, Kota Metro, Lampung 34124','https://pddikti.kemdiktisaintek.go.id/detail-pt/mmrUKFJCtvJIPPMeSWJZk20l8O4cBXOEhmvgWsZiVcy3A4b-fvbSgGcKWfHb4L4oVagj5w==','logo/1749104413_univ_islam_lampung.png','2025-05-20 23:02:45','2025-06-04 23:20:13'),
(6,'Universitas Ma\'arif Lampung','Baik Sekali','Jl. RA Kartini No.28, Purwosari, Kec. Metro Utara, Kota Metro, Lampung 34114','https://pddikti.kemdiktisaintek.go.id/detail-pt/nQEnc9nArrScJnGw1wjhc-H0LpsLT_WC5eZZBBFHYkUAVCbzrK_vcrSAR_2vSlWCqw1gOQ==','logo/1749104377_univ_ma_arif.png','2025-05-20 23:09:41','2025-06-04 23:19:37'),
(7,'Institut Agama Islam Darul A\'mal Lampung','Baik','Jl. Pesantren No.16b, Mulyojati, Kec. Metro Barat, Kota Metro, Lampung 34125','https://pddikti.kemdiktisaintek.go.id/detail-pt/So13amcThXiEljgwyur6kj-STMDKdqAZC69xd-xRhGL2tAHSeW8bYt-A9m4BkxdhAbExEA==','logo/1749104354_darul_amal.png','2025-05-20 23:22:09','2025-06-04 23:19:14'),
(8,'Institut Agama Islam Darul Fattah Lampung','Baik','Jl. Kopi No.23 Gedung Meneng, Rajabasa Bandar Lampung 35145',NULL,'logo/1749104306_darul_fatah.png','2025-05-20 23:26:40','2025-06-04 23:18:26'),
(9,'Institut Agama Islam Tulang Bawang','Baik','Cahyou Randu, Kec. Pagar Dewa, Kab. Tulang Bawang Barat, Lampung 34682','https://pddikti.kemdiktisaintek.go.id/detail-pt/HDVBF0l_YrCU7rCxS52yR7QWAn2MWIYTtVROchcCTQEfJH0OdkuA7pud_Ag78GQF_ABktg==','logo/1749104269_iai_tulangbawang.png','2025-05-21 01:26:51','2025-06-04 23:17:49'),
(10,'Institut Al-Ma\'Arif Way Kanan','Baik','Jl. Veteran No.03 Bhakti Negara Kec. Baradatu, Kab. Way Kanan, Lampung 34761','https://pddikti.kemdiktisaintek.go.id/detail-pt/V5K6M6PUMmn0K-n0706lJ9Y0IXFV2GOzRMjO1Eq2fLxL1lBikojfo7dfXMnjnd4kEY2AWg==','logo/1749104214_Institut_al_maarif.png','2025-05-21 01:29:10','2025-06-04 23:16:54'),
(11,'Sekolah Tinggi Agama Islam Ma’arif Kalirejo Lampung','-','Jl. Jendral Sudirman No. 50 Kaliwungu, Kalirejo, Lampung Tengah, Lampung 34174',NULL,'logo/1749104173_STAI_Ma_arif_Kalirejo.png','2025-05-21 01:30:20','2025-06-04 23:16:13'),
(12,'Sekolah Tinggi Agama Islam Darussalam Lampung','-','Jl. Cendrawasih No.1, Labuhan Ratu Satu, Kec. Way Jepara, Kabupaten Lampung Timur, Lampung 34396',NULL,'logo/1749104151_Stai_darusalam.png','2025-05-21 01:31:42','2025-06-04 23:15:51'),
(13,'Sekolah Tinggi Agama Islam Yasba Kalianda','-','Jl. Lettu Rochan No. l, Kedaton Katianda Lamplng Setaran 35513',NULL,'logo/1749104128_stai_yasba.png','2025-05-21 01:33:19','2025-06-04 23:15:28'),
(14,'Sekolah Tinggi Agama Islam Ibnu Rusyd Kotabumi','-','Jl. Betik Hati No.73, Tj. Aman, Kec. Kotabumi, Kabupaten Lampung Utara, Lampung 34516',NULL,'logo/1749104075_stai_ibnu.png','2025-05-21 01:34:28','2025-06-04 23:14:35'),
(15,'Sekolah Tinggi Agama Islam Nahdlatul Ulama Kotabumi','-','Jl.Alamsyah Ratu Perwira Negara Kalibening, Kotabumi, Lampung Utara 34581',NULL,'logo/1749104051_stai_nahdatul.png','2025-05-21 01:36:15','2025-06-04 23:14:11'),
(16,'Sekolah Tinggi Ekonomi dan Bisnis Islam Lampung','Baik','Jl. Ahmad Yani No.67, Gedung Tataan, Kec. Gedong Tataan, Kabupaten Pesawaran, Lampung 35368','https://pddikti.kemdiktisaintek.go.id/detail-pt/mvWTAf707xxeGlZFl9AQn5ZytjvO4HSloiWeJ_8etj7vyeT79nZxKEnX9fi91WjxmyEuZQ==','logo/1749104019_stebi_lampung.png','2025-05-21 01:37:23','2025-06-04 23:13:39'),
(17,'Sekolah Tinggi Ekonomi Bisnis Islam Liwa','Baik','Jl. Jendral Sudirman, Sebarus, Kec. Balik Bukit, Kabupaten Lampung Barat, Lampung 34811','https://pddikti.kemdiktisaintek.go.id/detail-pt/WADHa0j4JR3JM7knXLwYdNrCI0D38ihw784pAnFkkxtGctAUk2Hnw2pJWmjKIoBSKfNyug==','logo/1749103997_stebi_liwa.png','2025-05-21 01:38:01','2025-06-04 23:13:17'),
(18,'Sekolah Tinggi Ekonomi dan Bisnis Islam Tanggamus Lampung','Baik','Jl. Soekarno Hatta, Terbaya, Kec. Kota Agung, Kabupaten Tanggamus, Lampung 35384','https://pddikti.kemdiktisaintek.go.id/detail-pt/FPloRSaZphym4MJ9p8G2n0RWb4nZLgpWkUiDV6yZA1co5Vto52-3lhbGbSk7vm1pRsWBBQ==','logo/1749103977_stebi_tanggamus.png','2025-05-21 01:38:42','2025-06-04 23:12:57'),
(21,'Sekolah Tinggi Ekonomi dan Bisnis Islam Nur Ilmi Al-Ismailiyun','-','Sukadamai, Kec. Natar, Kabupaten Lampung Selatan, Lampung 35362','https://pddikti.kemdiktisaintek.go.id/detail-pt/vAzQgBMiPilWMOmnFQcxPgmaO1gbsWraTy3nwHPo8hPe_7srRb8I7j1uK29I_51han3S0A==','logo/1749103928_stebis_nurul_ilmu.jpg','2025-05-24 07:45:38','2025-06-04 23:12:08'),
(22,'Sekolah Tinggi Ekonomi Islam Darul Qur\'an Minak Selebah','Baik','Braja Harjosari, Braja Slebah, Lampung Timur, Lampung 34196','https://pddikti.kemdiktisaintek.go.id/detail-pt/7NzWkmL1S4HBwa7wKqevy6tShhOj80QX5wC6sgWyTvug3SKELdb3-hHFRpqyN1-Iz4Gz8w==','logo/1749103875_stei_darul_quran.png','2025-06-01 05:11:33','2025-06-04 23:11:15'),
(23,'Sekolah Tinggi Ekonomi Syariah Tunas Palapa Lampung Tengah','-','Daya Murni, Tumi Jajar, West Tulang Bawang Regency, Lampung 34691','https://pddikti.kemdiktisaintek.go.id/detail-pt/hRT3mvIAYmrzhUKoSF_W8Z094RafyZTMHum2jtooQJrs2gfInFu0BLNzJddF14bJa0Gdcg==','logo/1749103820_stes_tunas_palapa.png','2025-06-01 05:16:05','2025-06-04 23:10:20'),
(24,'Sekolah Tinggi Ilmu Ekonomi Syari\'ah Alifa Pringsewu Lampung','Baik','Gg. Gn. Sari No.83, Sidoharjo, Kec. Pringsewu, Kabupaten Pringsewu, Lampung 35373','https://pddikti.kemdiktisaintek.go.id/detail-pt/T7benPdeUV-0lmn8nvoBDSgqpn7pVuPo_Hdx5NviONBQaZbMn3mOylbf-N7sh73LdLfA8A==','logo/1749103775_sties_alifa.png','2025-06-01 05:18:03','2025-06-04 23:09:35'),
(25,'Sekolah Tinggi Ilmu Ekonomi Syariah Darul Huda Mesuji Lampung','Baik','Bangun Jaya, Kec. Tanjung Raya, Kabupaten Mesuji, Lampung 34697','https://pddikti.kemdiktisaintek.go.id/detail-pt/GbBf8GUBZ5ftxt4Ar5r9C-6w-sib3vbFqbZREobLJn2_HCRP-7Fr054akPkJ5jae5UGnAg==','logo/1749103749_sties_darul_huda.png','2025-06-01 05:20:55','2025-06-04 23:09:09'),
(26,'Sekolah Tinggi Ilmu Shuffah Al-Qur\'an Abdullah Bin Mas\'ud Online Lampung Selatan','Baik','Jl. At-Taqwa Muhajirun, Negara Ratu, Kec. Natar, Kabupaten Lampung Selatan, Lampung 35362','https://pddikti.kemdiktisaintek.go.id/detail-pt/s64NvkdzS3NeNiyhFwoyBuNsTX-d_7gINV8ky1m8eqgD28ymTj4mr_f_hzNi4VvfwY8lZA==','logo/1749103726_sti_shuffah.png','2025-06-01 05:23:14','2025-06-04 23:08:46'),
(27,'Sekolah Tinggi Ilmu Syariah (STIS) Darul Ulum Lampung Timur','Baik','Sumber Gede, Sekampung, Kabupaten Lampung Timur, Lampung 34382','https://pddikti.kemdiktisaintek.go.id/detail-pt/ay64zaXLVt0bOvkOtWanQUKds2DxFjrrtWpmdIeA7_Ob6yd0oap-HcdpEnMilrSSnHzeRQ==','logo/1749103637_stis_darul_ulum.png','2025-06-01 05:25:23','2025-06-04 23:07:17'),
(28,'Sekolah Tinggi Ilmu Syariah Darusy Syafaah Lampung Tengah','-','Jl. Jendral Sudirman, Kauman, Kotagajah, Lampung Tengah, Lampung 34153',NULL,'logo/1749103614_stis_darusy.png','2025-06-01 05:28:32','2025-06-04 23:06:54'),
(29,'Sekolah Tinggi Ilmu Syari\'ah Sultan Fatah Lampung Utara','-','Muara Aman, Kec. Bukit Kemuning, Kabupaten Lampung Utara, Lampung 34766',NULL,'logo/1749103588_stis_sultan_fatah.png','2025-06-01 05:30:09','2025-06-04 23:06:28'),
(30,'Sekolah Tinggi Ilmu Tarbiyah Al Hikmah Bumi Agung Way Kanan','Baik','Jl. Protokol Nomor 62 Pisang Baru, Kec. Bumi Agung, Kabupaten Way Kanan, Lampung 34782','https://pddikti.kemdiktisaintek.go.id/detail-pt/UpUMrAGBDSBL6jUujbtVCo5FrFFVc7PjLeoBcTbY08vFNpRDnRzTFS06OooIFwnEGBIcWA==','logo/1749103545_stit_al_hikmah.png','2025-06-01 05:35:57','2025-06-04 23:05:45'),
(31,'Sekolah Tinggi Ilmu Tarbiyah Al Mubarok Bandar Mataram','Baik','Sendang Agung Mataram, Bandar Mataram, Lampung Tengah, Lampung 34164','https://pddikti.kemdiktisaintek.go.id/detail-pt/sNgi16QQJlpTjeYskMXRaCzdS-waH3qD3AedO3NDmp_6bsnsYZXMdXd_4z079gg1Xoz72Q==','logo/1749103512_stit_almubarok.png','2025-06-02 06:32:27','2025-06-04 23:05:12'),
(32,'Sekola Tinggi Ilmu Tarbiyah Al Mutazam','Baik','Jl. Jenderal Sudirman, Bandar Dalam, Bengkunat, Pesisir Barat, Lampung 34874','https://pddikti.kemdiktisaintek.go.id/detail-pt/exAVUvex0Iea72eIZHyomgEGXnTMkzKgFoestOx39JCzhiz8aO5HowpPk4JHsxH6B70L0g==','logo/1749103493_stit_al_mutazam2.png','2025-06-02 06:35:17','2025-06-04 23:04:53'),
(33,'Sekolah Tinggi Ilmu Tarbiyah Bustanul `Ulum Lampung Tengah','Baik','Jaya Sakti, Anak Tuha, Lampung Tengah, Lampung 34173','https://pddikti.kemdiktisaintek.go.id/detail-pt/0DbUF7E05OImHi2yLPUMBtJwc-yG4Y8peOzacpKKvgf0TWTFh6ZHUTJjVm37RL4yk2zWyA==','logo/1749103462_stit_bustanul_ulum.png','2025-06-02 06:37:28','2025-06-04 23:04:22'),
(34,'Sekolah Tinggi Ilmu Tarbiyah Darul Ishlah Tulang Bawang','-','Jl. Pesanggrahan, Simpang 5, Kec. Banjar Margo, Kab. Tulang Bawang, Provinsi Lampung 34684',NULL,'logo/1749103445_stit_darul_ishlah.jpg','2025-06-02 06:42:02','2025-06-04 23:04:05'),
(35,'Sekolah Tinggi Ilmu Tarbiyah Diniyyah Lampung','-','Jl. Raya N. Sakti Desa Negeri Sakti, Kec. Gd. Tataan Pesawaran Lampung','https://pddikti.kemdiktisaintek.go.id/detail-pt/VRaxvV79pkOS87xKBS6lR9F2Z-00VuaI5TEvLqOy7gleZ4KdEOX8QZ9_ftPPrZe6AqEdfg==','logo/1749103391_stit_diniyah.png','2025-06-02 06:48:08','2025-06-04 23:03:11'),
(36,'Sekolah Tinggi Ilmu Tarbiyah Pringsewu Lampung Selatan','Baik','Jl. Raya Wonokriyo, Kec. Gading Rejo, Kab. Pringsewu, Lampung 35372','https://pddikti.kemdiktisaintek.go.id/detail-pt/U3LZjrmuMSmjLVwYI1FPN7ou_P4zqgT81W-_GevQYqMeQnwCgisqgsBoHpT9Vurn5FrbTA==','logo/1749103349_stit_pringsewu.png','2025-06-02 06:51:36','2025-06-04 23:02:29'),
(37,'Sekolah Tinggi Ilmu Tarbiyah Tanggamus','-','Campang, Gisting, Kabupaten Tanggamus, Lampung 35378','https://pddikti.kemdiktisaintek.go.id/detail-pt/rTn1rUOkwStkMdmeOAPmLJR7-uRSDPXjLGRW3hbeLDNMf9_6GdJqQ-wjeSw_OynAqs94IA==','logo/1749103328_stit_tanggamus.png','2025-06-02 06:54:25','2025-06-04 23:02:08'),
(38,'Universitas Muhammadiyah Metro','Baik Sekali','Jl. Ki Hajar Dewantara No. 116 Kota Metro Lampung 34111','https://pddikti.kemdiktisaintek.go.id/detail-pt/x9EKo4FWpRYZId9DkHBzCFZi2EGz_ATgxw_i5GT1nE8_W9ah3IYPoLOs0-_-iNAvPfUPVg==','logo/1749103307_um_metro.png','2025-06-02 06:56:46','2025-06-04 23:01:47'),
(39,'Universitas Muhammadiyah Lampung','B','Jl. ZA. Pagar Alam No.14, Labuhan Ratu, Kec. Kedaton, Kota Bandar Lampung, Lampung 35132','https://pddikti.kemdiktisaintek.go.id/detail-pt/PIxlWH8fJRHYU_-VIy88p-e50-QUwwTcu_Z2dIa2BVS-YJExzxnYlz0kEmLAKDu_wk8KRw==','logo/1749103289_um_lampung.png','2025-06-02 07:00:14','2025-06-04 23:01:29'),
(40,'Universitas Muhammadiyah Pringsewu','Baik Sekali','Jl. KH. Ahmad Dahlan No.112, Pringsewu Utara, Kec. Pringsewu, Kabupaten Pringsewu, Lampung 35373','https://pddikti.kemdiktisaintek.go.id/detail-pt/Ei6gMN9PtnjVh1mTtFGlJ_nCDydTuHcmwmcs7AIBxg7cXLy-tRuZ0M7qgDDpdvYpwJGyvw==','logo/1749103269_um_pringsewu.png','2025-06-02 07:02:02','2025-06-04 23:01:09');
/*!40000 ALTER TABLE `ptkis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-05 14:12:25

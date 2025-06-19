-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 May 2025, 15:02:10
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecolibrary`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `community_comments`
--

CREATE TABLE `community_comments` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `community_comments`
--

INSERT INTO `community_comments` (`id`, `topic_id`, `content_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 3, 84, 1, 'Bu konuda daha fazla kaynak var mı?', '2024-11-01 10:15:32'),
(2, 3, 84, 2, 'Bence yeşil dönüşüm artık zorunluluk.', '2024-11-01 11:22:10'),
(3, 2, 85, 2, 'Paylaştığınız tablo çok açıklayıcı olmuş.', '2024-11-02 09:47:05'),
(4, 4, 86, 1, 'Lütfen daha sade bir dil kullanın.', '2024-11-03 13:05:48'),
(5, 1, 86, 1, 'Ek dosyaları indiremedim, tekrar yükler misiniz?', '2024-11-04 08:30:19'),
(6, 2, 87, 2, 'Bu başlık altında vergi teşvikleri de değerlendirilmeli.', '2024-11-04 14:12:22'),
(7, 5, 85, 2, 'Sunum çok güzeldi, teşekkürler.', '2024-11-05 16:45:33'),
(8, 3, 87, 1, 'Karbon fiyatlaması hakkında detaylı açıklama yapılabilir mi?', '2024-11-05 17:12:51'),
(9, 4, 84, 1, 'Sisteme girişte problem yaşadım, düzeltildi mi?', '2024-11-06 09:01:09'),
(10, 5, 88, 1, 'Bu konu ileride tez konusu olabilir, takipteyim.', '2024-11-06 10:40:55'),
(11, 4, 84, 1, 'asd', '2025-05-23 15:40:46'),
(12, 5, 85, 1, 'deneme', '2025-05-23 15:45:14'),
(24, 5, 85, 1, 'ddd', '2025-05-23 15:57:41'),
(25, 5, 85, 1, '123', '2025-05-23 15:58:31'),
(26, 5, 85, 1, '666', '2025-05-23 16:07:26'),
(27, 5, 85, 1, 'vvv', '2025-05-23 16:09:32'),
(28, 5, 85, 1, 't', '2025-05-23 16:13:39'),
(29, 5, 85, 1, 't', '2025-05-23 16:13:59'),
(30, 4, 84, 1, 'vvv', '2025-05-23 16:14:35'),
(31, 4, 84, 1, 'hhh', '2025-05-23 16:16:36'),
(32, 5, 85, 1, 'dsa', '2025-05-23 16:17:27'),
(33, 4, 84, 1, 'wq', '2025-05-23 16:18:57'),
(34, 1, 93, 1, 'ws', '2025-05-23 16:19:35'),
(35, 1, 93, 1, 's', '2025-05-23 16:20:08'),
(36, 1, 93, 1, 'j', '2025-05-23 16:22:26'),
(37, 1, 93, 1, 'y', '2025-05-23 16:23:55'),
(38, 1, 93, 1, '777', '2025-05-23 16:27:29'),
(39, 1, 93, 1, '777', '2025-05-23 16:28:26'),
(40, 1, 93, 1, '888', '2025-05-23 16:30:15'),
(41, 1, 93, 1, '111', '2025-05-23 16:31:19'),
(42, 3, 92, 1, 'deneme', '2025-05-23 16:32:17'),
(43, 3, 92, 1, 'y', '2025-05-23 16:42:01'),
(44, 3, 92, 1, '555', '2025-05-23 16:45:24'),
(45, 3, 92, 1, '666', '2025-05-23 16:47:27'),
(46, 3, 92, 1, '777', '2025-05-23 16:49:16'),
(47, 3, 92, 1, '444', '2025-05-23 16:56:54'),
(48, 3, 92, 1, '3', '2025-05-23 16:57:26'),
(49, 3, 92, 1, 'c', '2025-05-23 17:01:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `community_contents`
--

CREATE TABLE `community_contents` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `content_primary` text COLLATE utf8_turkish_ci,
  `content_secondary` text COLLATE utf8_turkish_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `community_contents`
--

INSERT INTO `community_contents` (`id`, `topic_id`, `content_primary`, `content_secondary`, `user_id`, `created_at`) VALUES
(84, 1, 'What are the effects of inflation on emerging markets?', NULL, 1, '2025-05-23 16:18:57'),
(85, 2, 'Discussion about fiscal policies and economic growth.', NULL, 2, '2025-05-23 16:17:27'),
(86, 2, 'Stock market trends in 2025.', NULL, 3, '2025-05-03 12:45:00'),
(87, 2, 'Impact of currency fluctuations on international trade.', NULL, 1, '2025-05-04 14:00:00'),
(88, 3, 'Renewable energy investments and their economic implications.', NULL, 2, '2025-05-05 15:30:00'),
(89, 3, 'Policies promoting green economy development.', NULL, 1, '2025-05-06 16:15:00'),
(90, 1, 'The role of central banks during economic crises.', NULL, 2, '2025-05-07 09:00:00'),
(91, 2, 'Cryptocurrency regulation and market impact.', NULL, 2, '2025-05-08 10:30:00'),
(92, 3, 'Sustainable urban development strategies.', NULL, 1, '2025-05-23 17:01:23'),
(93, 1, 'Global trade agreements and economic consequences.', NULL, 1, '2025-05-23 16:31:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `community_topics`
--

CREATE TABLE `community_topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `community_topics`
--

INSERT INTO `community_topics` (`id`, `title`, `subtitle`) VALUES
(1, 'Macroeconomic Trends', 'Discuss the latest trends in global macroeconomics and their impact'),
(2, 'Financial Markets', 'Analysis and discussions on stock, bond, and commodity markets'),
(3, 'Monetary Policy', 'Debate central banks’ policies and their effects on inflation and growth'),
(4, 'Economic Theories', 'Explore classical and modern economic theories and their applications'),
(5, 'International Trade', 'Talk about trade policies, tariffs, and globalization effects'),
(6, 'Development Economics', 'Discuss economic growth and development challenges in emerging markets'),
(7, 'Behavioral Economics', 'Examine the psychological factors affecting economic decision-making'),
(8, 'Sustainable Economics', 'Focus on green growth, environmental economics, and sustainability'),
(9, 'Fiscal Policy', 'Discuss government spending, taxation, and budget deficits'),
(10, 'Cryptocurrency and Blockchain', 'Explore the economics behind cryptocurrencies and decentralized finance');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosya`
--

CREATE TABLE `dosya` (
  `id` int(11) NOT NULL,
  `yer` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `alt_id` int(11) NOT NULL,
  `dosya_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dosya`
--

INSERT INTO `dosya` (`id`, `yer`, `alt_id`, `dosya_adi`) VALUES
(18, 'news', 10, '682c46f232633_2025.05.20_12.10.10.jpg'),
(19, 'news', 10, '682c46f5b2d06_2025.05.20_12.10.13.jpg'),
(20, 'news', 10, '682c46f9da2a8_2025.05.20_12.10.17.jpg'),
(21, 'news', 10, '682c46fd83d17_2025.05.20_12.10.21.jpg'),
(22, 'news', 10, '682c47010d93c_2025.05.20_12.10.25.jpg'),
(23, 'news', 11, '682c5a5b878f3_2025.05.20_13.32.59.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `level_info` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `topic_title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `extra_materials` text COLLATE utf8_turkish_ci,
  `lang_tr` text COLLATE utf8_turkish_ci,
  `lang_en` text COLLATE utf8_turkish_ci,
  `lang_fr` text COLLATE utf8_turkish_ci,
  `lang_lit` text COLLATE utf8_turkish_ci,
  `lang_nl` text COLLATE utf8_turkish_ci,
  `lang_ro` text COLLATE utf8_turkish_ci,
  `lang_sp` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `library`
--

INSERT INTO `library` (`id`, `level_info`, `topic_title`, `extra_materials`, `lang_tr`, `lang_en`, `lang_fr`, `lang_lit`, `lang_nl`, `lang_ro`, `lang_sp`) VALUES
(1, '1', 'abc', '', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', NULL, 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ='),
(2, '2', 'asqwe', '', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', NULL, 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ='),
(3, '2', 'asqwe', '', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=', NULL, 'https://codepen.io/tag/table?cursor=ZD0xJm89MCZwPTQ=');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `subheading_1` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `subheading_2` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `subheading_3` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `content_1` varchar(600) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `content_2` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `content_3` varchar(600) COLLATE utf8_turkish_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `category`, `title`, `subheading_1`, `subheading_2`, `subheading_3`, `content_1`, `content_2`, `content_3`, `author`, `tags`, `created_at`) VALUES
(10, 'library', 'Students in France Take Action to Protect the Air and Reduce Their Carbon Footprint!', 'Students in France Take Action to Protect the Air and Reduce Their Carbon Footprint!', 'Students Take the Lead', 'Key Outcomes and Impact', 'In March 2025, Gabriel Péri Vocational High School in France hosted an important event as part of the Erasmus+ project “My Digital Ecological Library”. The activity brought together students and teachers to raise awareness about environmental issues, focusing on the carbon footprint and its connection to climate change.\r\n\r\nThe main goal was to help students understand how their daily actions impact the environment and to encourage them to adopt eco-friendly habits. Additionally, students worked on a digital library to promote environmental protection and share knowledge with others.', 'The activity was carried out in several steps:\r\nTeachers explained what the carbon footprint is and how it affects the climate.\r\nStudents worked in groups to create slides on carbon footprints and climate change. They produced short, 60-second videos to explain these concepts in a clear and engaging way.\r\n\r\nStudents presented their work and discussed practical ways to reduce their carbon footprint.', 'This activity not only raised awareness but also helped students develop essential skills:\r\n\r\n Students gained a deeper understanding of climate issues and sustainability.\r\nThey became more aware of small daily habits that can help reduce pollution and protect the planet.\r\nBy using digital tools to create educational materials, students enhanced their technical and collaborative abilities.\r\n\r\nThroughout the event, students contributed valuable content to the “My Eco Lab” digital guide, which will be shared with young people to promote air protection and climate awareness.', 'erol berk yetiker', '123', '2025-05-20'),
(11, 'library', 'erol berk yetiker', 'aaa', '', '', 'sfsdfsd', '', '', 'erol berk yetiker', '123', '2025-05-20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `role` tinyint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone_number`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@adm.com', '123456789', '123', 2, '2025-05-14 21:00:00'),
(2, 'user', 'user', 'user', 'user@usr.com', '12345678', '123', 0, '2025-05-14 21:00:00'),
(3, 'EROL', 'YETİKER', 'deneme', 'eroberk1997@hotmail.com', '', '123', 0, '2025-05-16 20:45:18'),
(4, 'emel', 'YETİKER', 'eml', '123@123.com', '', '123', 1, '2025-05-20 16:24:30');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `community_comments`
--
ALTER TABLE `community_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `community_contents`
--
ALTER TABLE `community_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `community_topics`
--
ALTER TABLE `community_topics`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dosya`
--
ALTER TABLE `dosya`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `community_comments`
--
ALTER TABLE `community_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `community_contents`
--
ALTER TABLE `community_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Tablo için AUTO_INCREMENT değeri `community_topics`
--
ALTER TABLE `community_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `dosya`
--
ALTER TABLE `dosya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `community_comments`
--
ALTER TABLE `community_comments`
  ADD CONSTRAINT `community_comments_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `community_topics` (`id`),
  ADD CONSTRAINT `community_comments_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `community_contents` (`id`),
  ADD CONSTRAINT `community_comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `community_contents`
--
ALTER TABLE `community_contents`
  ADD CONSTRAINT `community_contents_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `community_topics` (`id`),
  ADD CONSTRAINT `community_contents_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

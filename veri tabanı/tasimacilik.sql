-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 17 Oca 2023, 17:05:02
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tasimacilik`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `ayar_id` int(1) NOT NULL AUTO_INCREMENT,
  `ayar_site_baslik` varchar(200) NOT NULL,
  `ayar_telefon` varchar(50) NOT NULL,
  `ayar_eposta` varchar(50) NOT NULL,
  `ayar_adres` varchar(200) NOT NULL,
  PRIMARY KEY (`ayar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_site_baslik`, `ayar_telefon`, `ayar_eposta`, `ayar_adres`) VALUES
(1, 'İlayda Evden Eve Taşımacılık', '0 212 514 26 66', 'ilayda@tasimacilik.com', 'adres bilgisi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

DROP TABLE IF EXISTS `hizmetler`;
CREATE TABLE IF NOT EXISTS `hizmetler` (
  `hizmet_id` int(11) NOT NULL AUTO_INCREMENT,
  `hizmet_resim_yol` varchar(200) NOT NULL,
  `hizmet_adi` varchar(200) NOT NULL,
  `hizmet_detay` text NOT NULL,
  PRIMARY KEY (`hizmet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_email` varchar(50) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `kullanici_soyadi` varchar(50) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_email`, `kullanici_adi`, `kullanici_soyadi`, `kullanici_sifre`) VALUES
(1, 'ilayda@tasimacilik.com', 'İlayda ', 'Kahraman', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE IF NOT EXISTS `sayfalar` (
  `sayfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_baslik` varchar(200) NOT NULL,
  `sayfa_detay` text NOT NULL,
  `sayfa_sira` int(11) NOT NULL,
  PRIMARY KEY (`sayfa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_baslik`, `sayfa_detay`, `sayfa_sira`) VALUES
(2, 'Sayfa 1', 'Sayfa 1 Detay', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `talepler`
--

DROP TABLE IF EXISTS `talepler`;
CREATE TABLE IF NOT EXISTS `talepler` (
  `talep_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(200) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `nakliyat_turu` varchar(50) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`talep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `talepler`
--

INSERT INTO `talepler` (`talep_id`, `ad_soyad`, `telefon`, `nakliyat_turu`, `tarih`, `durum`) VALUES
(1, 'İlayda Kahraman', '0 212 566 33 63', 'Şehirler Arası', '2023-01-15 01:49:17', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

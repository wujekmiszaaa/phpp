-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 06 Cze 2013, 12:55
-- Wersja serwera: 5.0.45
-- Wersja PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `ib1_projekt_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `domy`
--

CREATE TABLE `domy` (
  `id_domu` int(11) NOT NULL,
  `d_nr_budynku` int(11) default NULL,
  `d_pokoje` int(11) default NULL,
  `powierzchnia_dzialki` int(11) default NULL,
  `d_rok` int(11) default NULL,
  `d_liczba_pieter` int(11) default NULL,
  `d_stan_domu` varchar(45) default NULL,
  `d_garaz` tinyint(1) default NULL,
  `Materialy_id` int(11) NOT NULL,
  PRIMARY KEY  (`id_domu`,`Materialy_id`),
  KEY `fk_Domy_Materialy1` (`Materialy_id`),
  KEY `fk_Domy_Oferta1` (`id_domu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `domy`
--

INSERT INTO `domy` (`id_domu`, `d_nr_budynku`, `d_pokoje`, `powierzchnia_dzialki`, `d_rok`, `d_liczba_pieter`, `d_stan_domu`, `d_garaz`, `Materialy_id`) VALUES
(15, 12, 2, 1000, 1999, NULL, '3', 0, 1),
(19, 50, 3, 1000, 2001, NULL, '3', 1, 3),
(20, 12, 2, 1000, 1990, NULL, 'nnn', 0, 1),
(21, 12, 2, 1000, 1990, NULL, 'nnn', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `grunty`
--

CREATE TABLE `grunty` (
  `id_gruntu` int(11) NOT NULL,
  `parcela` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_gruntu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `grunty`
--

INSERT INTO `grunty` (`id_gruntu`, `parcela`) VALUES
(18, '20'),
(23, '12'),
(24, '12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `grupy`
--

CREATE TABLE `grupy` (
  `id_grupy` int(5) NOT NULL,
  `nazwa_g` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_grupy`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `grupy`
--

INSERT INTO `grupy` (`id_grupy`, `nazwa_g`) VALUES
(1, 'Doradca'),
(2, 'Manager'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `informacje_dodatkowe`
--

CREATE TABLE `informacje_dodatkowe` (
  `id` int(11) NOT NULL,
  `telefon` tinyint(1) default NULL,
  `internet` tinyint(1) default NULL,
  `tv` tinyint(1) default NULL,
  `domofon` tinyint(1) default NULL,
  `tereny` tinyint(1) default NULL,
  `plac_zabaw` tinyint(1) default NULL,
  `sport` tinyint(1) default NULL,
  `kino` tinyint(1) default NULL,
  `basen` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `informacje_dodatkowe`
--

INSERT INTO `informacje_dodatkowe` (`id`, `telefon`, `internet`, `tv`, `domofon`, `tereny`, `plac_zabaw`, `sport`, `kino`, `basen`) VALUES
(15, 0, 1, 0, 0, 0, 1, 0, 1, 0),
(17, 0, 1, 0, 0, 1, 0, 1, 0, 0),
(18, 1, 0, 0, 1, 0, 1, 0, 1, 0),
(19, 1, 0, 0, 0, 0, 1, 0, 1, 0),
(22, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(23, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(24, 1, 0, 0, 0, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `koszyk`
--

CREATE TABLE `koszyk` (
  `id_k` int(11) NOT NULL auto_increment,
  `id_sesji` varchar(50) character set utf8 collate utf8_polish_ci NOT NULL,
  `id_oferty` int(11) NOT NULL,
  PRIMARY KEY  (`id_k`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_k`, `id_sesji`, `id_oferty`) VALUES
(82, '66f04333907a429551e730225c42e482', 6),
(81, '66f04333907a429551e730225c42e482', 8),
(80, '66f04333907a429551e730225c42e482', 3),
(79, '66f04333907a429551e730225c42e482', 1),
(78, 'fd783f21a2ebc67b8b621ee205a29080', 5),
(76, 'fd783f21a2ebc67b8b621ee205a29080', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `log_koszyk`
--

CREATE TABLE `log_koszyk` (
  `id` int(11) NOT NULL auto_increment,
  `id_oferty` int(11) NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `przegladarka` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Zrzut danych tabeli `log_koszyk`
--

INSERT INTO `log_koszyk` (`id`, `id_oferty`, `data`, `ip`, `przegladarka`) VALUES
(1, 1, '2013-01-16 16:21:39', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(2, 2, '2013-01-16 16:21:39', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(3, 3, '2013-01-16 16:21:39', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(4, 4, '2013-01-16 16:21:41', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(5, 5, '2013-01-16 16:21:41', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(6, 6, '2013-01-16 16:21:43', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(7, 19, '2013-01-16 16:21:45', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(8, 18, '2013-01-16 16:21:46', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(9, 17, '2013-01-16 16:21:46', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(10, 25, '2013-01-16 16:21:48', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(11, 24, '2013-01-16 16:21:48', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(12, 23, '2013-01-16 16:21:49', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(13, 22, '2013-01-16 16:21:50', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(14, 22, '2013-01-16 16:22:11', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(15, 23, '2013-01-16 16:22:11', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(16, 26, '2013-01-16 16:22:13', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(17, 25, '2013-01-16 16:22:14', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(18, 24, '2013-01-16 16:22:14', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(19, 3, '2013-01-16 16:22:16', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(20, 1, '2013-01-16 16:22:17', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(21, 11, '2013-01-16 16:22:17', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(22, 10, '2013-01-16 16:22:18', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(23, 9, '2013-01-16 16:22:19', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(24, 15, '2013-01-16 16:22:20', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(25, 16, '2013-01-16 16:22:21', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(26, 17, '2013-01-16 16:22:22', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(27, 24, '2013-01-16 16:24:11', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `log_oferty`
--

CREATE TABLE `log_oferty` (
  `id` int(11) NOT NULL auto_increment,
  `id_oferty` int(11) NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `przegladarka` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Zrzut danych tabeli `log_oferty`
--

INSERT INTO `log_oferty` (`id`, `id_oferty`, `data`, `ip`, `przegladarka`) VALUES
(1, 1, '2013-01-16 15:50:24', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(2, 1, '2013-01-16 15:50:25', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(3, 1, '2013-01-16 15:50:26', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(4, 1, '2013-01-16 15:50:27', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(5, 1, '2013-01-16 15:50:31', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(6, 2, '2013-01-16 15:50:32', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(7, 2, '2013-01-16 15:50:33', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(8, 3, '2013-01-16 15:50:34', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(9, 3, '2013-01-16 15:50:34', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(10, 3, '2013-01-16 15:50:34', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(11, 4, '2013-01-16 15:50:35', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(12, 4, '2013-01-16 15:50:35', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(13, 7, '2013-01-16 15:50:36', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(14, 7, '2013-01-16 15:50:37', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(15, 13, '2013-01-16 15:50:38', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(16, 13, '2013-01-16 15:50:38', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(17, 12, '2013-01-16 15:50:39', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(18, 11, '2013-01-16 15:50:40', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(19, 75, '2013-01-16 15:51:25', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(20, 75, '2013-01-16 15:51:25', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(21, 75, '2013-01-16 15:51:25', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(22, 75, '2013-01-16 15:51:25', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(23, 75, '2013-01-16 15:51:26', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(24, 73, '2013-01-16 15:51:26', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(25, 73, '2013-01-16 15:51:26', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(26, 73, '2013-01-16 15:51:27', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(27, 72, '2013-01-16 15:51:27', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(28, 72, '2013-01-16 15:51:27', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(29, 72, '2013-01-16 15:51:28', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(30, 72, '2013-01-16 15:51:28', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(31, 69, '2013-01-16 15:51:29', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(32, 69, '2013-01-16 15:51:29', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(33, 69, '2013-01-16 15:51:30', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(34, 66, '2013-01-16 15:51:32', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(35, 66, '2013-01-16 15:51:32', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(36, 66, '2013-01-16 15:51:32', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(37, 83, '2013-01-16 15:51:33', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(38, 83, '2013-01-16 15:51:33', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(39, 83, '2013-01-16 15:51:34', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(40, 83, '2013-01-16 15:51:34', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(41, 82, '2013-01-16 15:51:35', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(42, 82, '2013-01-16 15:51:35', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(43, 96, '2013-01-16 15:51:37', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(44, 95, '2013-01-16 15:51:38', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(45, 94, '2013-01-16 15:51:39', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(46, 93, '2013-01-16 15:51:40', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(47, 99, '2013-01-16 15:51:41', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(48, 99, '2013-01-16 15:51:41', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(49, 99, '2013-01-16 15:51:41', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(50, 99, '2013-01-16 15:51:42', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(51, 98, '2013-01-16 15:51:42', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(52, 98, '2013-01-16 15:51:43', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(53, 1, '2013-01-16 16:16:49', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(54, 1, '2013-01-16 16:16:49', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'),
(55, 1, '2013-01-16 16:18:46', '::1', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `log_wejscia`
--

CREATE TABLE `log_wejscia` (
  `id` int(11) NOT NULL auto_increment,
  `id_uzytkownika` int(11) NOT NULL,
  `ip` text collate latin1_general_ci NOT NULL,
  `przegladarka` text collate latin1_general_ci NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `log_wejscia`
--

INSERT INTO `log_wejscia` (`id`, `id_uzytkownika`, `ip`, `przegladarka`, `data`) VALUES
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36', '2013-06-06 12:05:04'),
(3, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36', '2013-06-06 12:54:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `lokalizacja`
--

CREATE TABLE `lokalizacja` (
  `id` int(11) NOT NULL,
  `Wojewodztwa_id` int(11) NOT NULL,
  `Powiaty_id` int(11) NOT NULL,
  `Miasta_id` int(11) NOT NULL,
  `ulica` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Oferta_Wojewodztwa` (`Wojewodztwa_id`),
  KEY `fk_Oferta_Powiaty1` (`Powiaty_id`),
  KEY `fk_Oferta_Miasta1` (`Miasta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `lokalizacja`
--

INSERT INTO `lokalizacja` (`id`, `Wojewodztwa_id`, `Powiaty_id`, `Miasta_id`, `ulica`) VALUES
(15, 1, 1, 1, 'Kwiatowa'),
(17, 1, 1, 1, 'Warszawska'),
(18, 1, 1, 1, 'Podlaska'),
(19, 1, 1, 1, 'Lipowa'),
(20, 1, 1, 1, 'Kwiatowa'),
(21, 1, 1, 1, 'Kwiatowa'),
(22, 1, 1, 1, 'Kolorowa'),
(23, 2, 1, 1, 'Kolorowa'),
(24, 1, 1, 1, 'Polna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `materialy`
--

CREATE TABLE `materialy` (
  `id_mat` int(11) NOT NULL auto_increment,
  `nazwa_mat` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_mat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `materialy`
--

INSERT INTO `materialy` (`id_mat`, `nazwa_mat`) VALUES
(1, 'cegla'),
(2, 'plyta'),
(3, 'pustak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `miasta`
--

CREATE TABLE `miasta` (
  `id` int(11) NOT NULL auto_increment,
  `m_nazwa` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `miasta`
--

INSERT INTO `miasta` (`id`, `m_nazwa`) VALUES
(1, 'Warszawa'),
(2, 'Milanowek'),
(3, 'Wolomin'),
(4, 'Pruszkow');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mieszkania`
--

CREATE TABLE `mieszkania` (
  `id_miesz` int(11) NOT NULL,
  `m_nr_budynku` int(11) default NULL,
  `nr_lokalu` int(11) default NULL,
  `m_pokoje` int(11) default NULL,
  `m_rok` int(11) default NULL,
  `m_pietro` int(11) default NULL,
  `m_liczba_pieter` int(11) default NULL,
  `m_winda` tinyint(1) default NULL,
  `m_stan_lokalu` varchar(45) default NULL,
  `m_stan_budynku` varchar(45) default NULL,
  `m_garaz` tinyint(1) default NULL,
  `m_osiedle` varchar(45) default NULL,
  `Materialy_id` int(11) NOT NULL,
  PRIMARY KEY  (`id_miesz`,`Materialy_id`),
  KEY `fk_Mieszkania_Materialy1` (`Materialy_id`),
  KEY `fk_Mieszkania_Oferta1` (`id_miesz`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `mieszkania`
--

INSERT INTO `mieszkania` (`id_miesz`, `m_nr_budynku`, `nr_lokalu`, `m_pokoje`, `m_rok`, `m_pietro`, `m_liczba_pieter`, `m_winda`, `m_stan_lokalu`, `m_stan_budynku`, `m_garaz`, `m_osiedle`, `Materialy_id`) VALUES
(17, 100, 1, 2, 2000, 2, 5, 0, '0', '1', 0, NULL, 2),
(22, 1, 0, 1, 2000, 1, 5, 0, '5', '3', 0, 'ogrodzone', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `nieruchomosci`
--

CREATE TABLE `nieruchomosci` (
  `id_n` int(11) NOT NULL auto_increment,
  `powierzchnia` int(11) default NULL,
  `cena` int(11) default NULL,
  `typ_oferty` varchar(45) default NULL,
  `zdjecie` varchar(50) character set utf8 collate utf8_polish_ci default NULL,
  PRIMARY KEY  (`id_n`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `nieruchomosci`
--

INSERT INTO `nieruchomosci` (`id_n`, `powierzchnia`, `cena`, `typ_oferty`, `zdjecie`) VALUES
(15, 100, 1000000, 'S', '1364594314.jpg'),
(17, 70, 70000, 'S', '1364597074.jpg'),
(18, 200, 200000, 'S', '1364597166.jpg'),
(19, 150, 150000, 'W', '1364633027.jpg'),
(20, 58, 50000, 'S', NULL),
(21, 100, 1000000, 'S', NULL),
(22, 10, 1000, 'W', '1364649877.jpg'),
(23, 100, 200000, 'S', '1364763895.jpg'),
(24, 1000, 15000, 'S', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `n_klienci`
--

CREATE TABLE `n_klienci` (
  `id_k` int(11) NOT NULL auto_increment,
  `k_typ_oferty` varchar(15) default NULL,
  `k_wojewodztwo` int(11) default NULL,
  `k_powiat` int(11) default NULL,
  `k_miasto` int(11) default NULL,
  `k_pokoje` int(11) default NULL,
  `k_powmiesz` int(11) default NULL,
  `k_rokod` int(11) default NULL,
  `k_rokdo` int(11) default NULL,
  `k_pietro` int(11) default NULL,
  `k_wysokoscbud` int(11) default NULL,
  `k_winda` int(11) default NULL,
  `k_material` int(11) default NULL,
  `k_stanlokalu` int(11) default NULL,
  `k_stanbudynku` int(11) default NULL,
  `k_garaz` int(11) default NULL,
  `k_cenaod` int(11) default NULL,
  `k_cenado` int(11) default NULL,
  `k_imie` varchar(30) default NULL,
  `k_nazwisko` varchar(50) default NULL,
  `k_ulica` varchar(100) default NULL,
  `k_nrdomu` int(11) default NULL,
  `k_nrlokalu` int(11) default NULL,
  `k_kod` varchar(10) default NULL,
  `k_miejscowosc` varchar(100) default NULL,
  `k_telstac` varchar(20) default NULL,
  `k_telkom` varchar(20) default NULL,
  `k_emailg` varchar(50) default NULL,
  `k_emaila` varchar(50) default NULL,
  `k_status` varchar(1) default NULL,
  `k_nrklienta` varchar(20) default NULL,
  `k_agent` int(11) default NULL,
  `k_data` date default NULL,
  `k_typn` varchar(15) default NULL,
  `k_powdzial` int(11) default NULL,
  PRIMARY KEY  (`id_k`),
  KEY `kl_woj_FK` (`k_wojewodztwo`),
  KEY `kl_pow_FK` (`k_powiat`),
  KEY `kl_mia_FK` (`k_miasto`),
  KEY `kl_mat_FK` (`k_material`),
  KEY `kl_age_FK` (`k_agent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `n_klienci`
--

INSERT INTO `n_klienci` (`id_k`, `k_typ_oferty`, `k_wojewodztwo`, `k_powiat`, `k_miasto`, `k_pokoje`, `k_powmiesz`, `k_rokod`, `k_rokdo`, `k_pietro`, `k_wysokoscbud`, `k_winda`, `k_material`, `k_stanlokalu`, `k_stanbudynku`, `k_garaz`, `k_cenaod`, `k_cenado`, `k_imie`, `k_nazwisko`, `k_ulica`, `k_nrdomu`, `k_nrlokalu`, `k_kod`, `k_miejscowosc`, `k_telstac`, `k_telkom`, `k_emailg`, `k_emaila`, `k_status`, `k_nrklienta`, `k_agent`, `k_data`, `k_typn`, `k_powdzial`) VALUES
(10, 'S', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 200000, 'Anna', 'Wysocki', 'Kwiatowa', 15, 2, '01-111', 'Warszawa', '226440000', '0600600600', 'awielc@poczta.pl', '', 'U', 'Kl_nr_10', 1, '2013-03-30', 'G', 1000),
(11, 'S', 1, 1, 1, 2, 100, 1990, 2013, NULL, NULL, NULL, 1, NULL, 3, 0, 980000, 999999, 'Marian', 'Kowalski', 'Majowa', 18, 44, '01-111', 'Pruszków', '226440000', '0600600600', 'mkowal@poczta.pl', '', 'M', 'Kl_nr_11', 1, '2013-04-23', 'D', 1000),
(12, 'W', 1, 2, 2, 2, 99, 1990, 2004, NULL, NULL, NULL, 1, NULL, 3, 0, 1000, 100000000, 'Adam', 'Potocki', 'Marecka', 15, 9, '01-111', 'Pruszków', '226440000', '0600600600', 'awysoc@poczta.pl', '', 'M', 'Kl_nr_12', 1, '2013-04-23', 'D', 1000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `n_oferty`
--

CREATE TABLE `n_oferty` (
  `id_n` int(11) NOT NULL,
  `Status` varchar(5) NOT NULL,
  `Id_agenta` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Nr_oferty` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_n`),
  KEY `n_oferty_agent_FK` (`Id_agenta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `n_oferty`
--

INSERT INTO `n_oferty` (`id_n`, `Status`, `Id_agenta`, `Data`, `Nr_oferty`) VALUES
(15, 'R', 1, '2013-03-29', 'Of_nr_15'),
(17, 'R', 1, '2013-03-29', 'Of_nr_17'),
(18, 'R', 1, '2013-03-29', 'Of_nr_18'),
(19, 'U', 1, '2013-03-30', 'Of_nr_19'),
(22, 'Z', 1, '2013-03-30', 'Of_nr_22'),
(23, 'Z', 1, '2013-03-31', 'Of_nr_23'),
(24, 'Z', 1, '2013-04-11', 'Of_nr_24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `n_preferencje`
--

CREATE TABLE `n_preferencje` (
  `klient` int(11) NOT NULL,
  `p_osiedle` varchar(20) NOT NULL,
  `p_telefon` int(11) NOT NULL,
  `p_internet` int(11) NOT NULL,
  `p_tv` int(11) NOT NULL,
  `p_domofon` int(11) NOT NULL,
  `p_tereny` int(11) NOT NULL,
  `p_plac` int(11) NOT NULL,
  `p_sport` int(11) NOT NULL,
  `p_kino` int(11) NOT NULL,
  `p_basen` int(11) NOT NULL,
  PRIMARY KEY  (`klient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `n_preferencje`
--

INSERT INTO `n_preferencje` (`klient`, `p_osiedle`, `p_telefon`, `p_internet`, `p_tv`, `p_domofon`, `p_tereny`, `p_plac`, `p_sport`, `p_kino`, `p_basen`) VALUES
(10, '', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(11, '', 1, 0, 0, 0, 1, 0, 0, 0, 1),
(12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `n_wystawiajacy`
--

CREATE TABLE `n_wystawiajacy` (
  `ID_n` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(100) NOT NULL,
  `Ulica` varchar(100) NOT NULL,
  `Nr_domu` int(11) NOT NULL,
  `Nr_lokalu` int(11) NOT NULL,
  `Kod_pocztowy` varchar(10) NOT NULL,
  `Miejscowosc` varchar(100) NOT NULL,
  `Tel_stac` varchar(10) NOT NULL,
  `Tel_kom` varchar(11) NOT NULL,
  `Mail_g` varchar(50) NOT NULL,
  `Mail_a` varchar(50) NOT NULL,
  PRIMARY KEY  (`ID_n`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `n_wystawiajacy`
--

INSERT INTO `n_wystawiajacy` (`ID_n`, `Imie`, `Nazwisko`, `Ulica`, `Nr_domu`, `Nr_lokalu`, `Kod_pocztowy`, `Miejscowosc`, `Tel_stac`, `Tel_kom`, `Mail_g`, `Mail_a`) VALUES
(15, 'Anna', 'Lewicka', 'Warszawska', 15, 2, '00-000', 'Warszawa', '226440000', '0600600600', 'awielc@poczta.pl', ''),
(17, 'Adam', 'Wysocki', 'Wiejska', 14, 9, '01-111', 'Wolomin', '226440000', '999666777', 'awysoc@poczta.pl', ''),
(18, 'Waldemar', 'Kazanecki', 'Kolejowa', 99, 8, '01-111', 'Warszawa', '229998888', '111999888', 'wkazan@poczta.pl', ''),
(19, 'Adam', 'Wysocki', 'Kolejowa', 15, 2, '00-000', 'Wolomin', '226440000', '0600600600', 'awysoc@poczta.pl', ''),
(22, 'Adam', 'Wysocki', 'Aluzyjna', 15, 1, '00-000', 'Warszawa', '226440000', '0600600600', 'awysoc@poczta.pl', ''),
(23, 'Anna', 'Wysocki', 'Aluzyjna', 8, 9, '01-111', 'Wolomin', '226440000', '0600600600', 'awielc@poczta.pl', ''),
(24, 'Adam', 'Wielgosz', 'Warszawska', 11, 2, '00-000', 'Warszawa', '226440000', '0500500500', 'awysoc@poczta.pl', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `n_zdjecia`
--

CREATE TABLE `n_zdjecia` (
  `Nazwa` varchar(100) NOT NULL,
  `ID_n` int(11) NOT NULL,
  PRIMARY KEY  (`Nazwa`),
  KEY `zdjecia_nier_FK` (`ID_n`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `n_zdjecia`
--

INSERT INTO `n_zdjecia` (`Nazwa`, `ID_n`) VALUES
('1364594314.jpg', 15),
('1364594326.jpg', 15),
('1364594971.jpg', 15),
('1364655517.jpg', 15),
('1365069287.jpg', 15),
('1364597074.jpg', 17),
('1364597079.jpg', 17),
('1364597166.jpg', 18),
('1364597169.jpg', 18),
('1364633027.jpg', 19),
('1364633031.jpg', 19),
('1364649877.jpg', 22),
('1364649882.jpg', 22),
('1364763895.jpg', 23),
('1364763899.jpg', 23);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `powiaty`
--

CREATE TABLE `powiaty` (
  `id` int(11) NOT NULL auto_increment,
  `p_nazwa` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `powiaty`
--

INSERT INTO `powiaty` (`id`, `p_nazwa`) VALUES
(1, 'Warszawa'),
(2, 'Grodziski'),
(3, 'Wolominski'),
(4, 'Pruszkowski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `propozycje`
--

CREATE TABLE `propozycje` (
  `id_prop` int(11) NOT NULL auto_increment,
  `id_of` varchar(5) NOT NULL,
  `id_us` varchar(50) NOT NULL,
  `id_kl` varchar(50) NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_prop`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `propozycje`
--

INSERT INTO `propozycje` (`id_prop`, `id_of`, `id_us`, `id_kl`, `data`) VALUES
(1, '17', '1', '10', '2013-06-06 12:22:53'),
(2, '24', '1', '10', '2013-06-06 12:22:53'),
(3, '17', '1', '10', '2013-06-06 12:22:53'),
(4, '15', '1', '10', '2013-06-06 12:22:53'),
(5, '17', '1', '10', '2013-06-06 12:22:53'),
(6, '22', '1', '10', '2013-06-06 12:22:53'),
(7, '21', '1', '10', '2013-06-06 12:22:53'),
(8, '22', '1', '10', '2013-06-06 12:22:53'),
(9, '17', '1', '10', '2013-06-06 12:22:53'),
(10, '22', '1', '10', '2013-06-06 12:22:53'),
(12, '17', '1', '10', '2013-06-06 12:22:53'),
(13, '17', '1', '10', '2013-06-06 12:22:53'),
(14, '17', '1', '10', '2013-06-06 12:22:53'),
(16, '22', '1', '10', '2013-06-06 12:22:53'),
(17, '20', '1', '10', '2013-06-06 12:22:53'),
(18, '21', '1', '10', '2013-06-06 12:22:53'),
(20, '24', '1', '10', '2013-06-06 12:22:53'),
(21, '20', '1', '10', '2013-06-06 12:22:53'),
(22, '', '1', '10', '2013-06-06 12:22:53'),
(23, '17', '1', '10', '2013-06-06 12:22:53'),
(24, '17', '1', '10', '2013-06-06 12:22:53');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `specjalne`
--

CREATE TABLE `specjalne` (
  `id` int(11) NOT NULL auto_increment,
  `id_oferty` int(11) NOT NULL,
  `data_dodania` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `kolejnosc` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `specjalne`
--

INSERT INTO `specjalne` (`id`, `id_oferty`, `data_dodania`, `kolejnosc`) VALUES
(1, 1, '2012-01-10 20:54:23', 4),
(2, 2, '2012-01-10 20:54:23', 3),
(3, 3, '2012-01-10 20:55:08', 1),
(4, 4, '2012-01-10 20:55:28', 2),
(5, 5, '2012-01-10 20:55:28', 1),
(7, 4, '2013-01-08 16:41:43', 2),
(8, 1, '2013-01-08 16:47:23', 2),
(9, 7, '2013-01-08 16:50:02', 1),
(10, 3, '2013-01-08 16:55:51', 3),
(11, 7, '2013-01-08 16:56:06', 2),
(12, 1, '2013-01-08 17:03:16', 3),
(13, 7, '2013-01-08 17:03:24', 2),
(14, 8, '2013-01-08 17:03:51', 1),
(15, 1, '2013-03-29 23:02:31', 1),
(16, 15, '2013-03-29 23:16:44', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `spotkania`
--

CREATE TABLE `spotkania` (
  `id` int(11) NOT NULL auto_increment,
  `id_uzytkownika` int(11) NOT NULL,
  `id_poszukujacego` int(11) NOT NULL,
  `id_oferty` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `notatka_wstepna` varchar(255) NOT NULL,
  `notatka_koncowa` varchar(255) NOT NULL,
  `data_dodania` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `data_usuniecia` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `spotkania`
--

INSERT INTO `spotkania` (`id`, `id_uzytkownika`, `id_poszukujacego`, `id_oferty`, `data`, `notatka_wstepna`, `notatka_koncowa`, `data_dodania`, `data_usuniecia`) VALUES
(1, 1, 12, 15, '2013-05-23 19:10:00', 'spotkanie34', '', '2013-05-02 19:36:53', '2013-05-02 19:37:29'),
(2, 1, 10, 15, '2013-05-24 12:51:00', 'bla bla bla', '', '2013-05-16 12:18:58', NULL),
(3, 4, 10, 17, '2013-05-31 12:24:00', 'spotkanie 2', '', '2013-05-16 12:19:30', NULL),
(4, 1, 10, 15, '2013-05-23 11:44:00', 'jjjjj', '', '2013-05-23 11:30:48', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_user` int(5) NOT NULL auto_increment,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `stanowisko` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `id_grupy` int(11) NOT NULL,
  PRIMARY KEY  (`id_user`),
  KEY `id_grupy` (`id_grupy`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_user`, `imie`, `nazwisko`, `login`, `haslo`, `stanowisko`, `email`, `telefon`, `id_grupy`) VALUES
(1, 'Jan', 'Kowalski', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Glowny Admin', 'kowalski@mail.pl', '600-700-800', 3),
(2, 'Adam', 'Markowski', 'adam', '1d7c2923c1684726dc23d2901c4d8157', 'Nowy Manager', 'markowski@mail.pl', '900-100-200', 2),
(4, 'Radek', 'Baran', 'radek', '6656910800c58e1e9e6bc8230805a381', 'Nowy User', 'baran@malpa.pl', '444-666-777', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `wojewodztwa`
--

CREATE TABLE `wojewodztwa` (
  `id` int(11) NOT NULL auto_increment,
  `w_nazwa` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `wojewodztwa`
--

INSERT INTO `wojewodztwa` (`id`, `w_nazwa`) VALUES
(1, 'Mazowieckie'),
(2, 'Opolskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `zapytania`
--

CREATE TABLE `zapytania` (
  `id_zap` varchar(5) NOT NULL,
  `id_of` varchar(5) NOT NULL,
  `dane` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tresc` varchar(300) NOT NULL,
  PRIMARY KEY  (`id_zap`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zapytania`
--

 

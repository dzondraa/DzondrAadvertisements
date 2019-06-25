-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 03:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `night_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id_kat` int(5) NOT NULL,
  `naziv` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kat`, `naziv`) VALUES
(1, 'Garsonjera'),
(2, 'Dvosoban stan'),
(3, 'Trosoban stan'),
(4, 'Cetvorosoban stan'),
(5, 'Petosoban+ stan'),
(6, 'Dupleks'),
(7, 'Stan u kuci'),
(8, 'Dvorisni stan');

-- --------------------------------------------------------

--
-- Table structure for table `lokacije`
--

CREATE TABLE `lokacije` (
  `ID` int(5) NOT NULL,
  `grad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lokacije`
--

INSERT INTO `lokacije` (`ID`, `grad`, `ulica`) VALUES
(25, '', ''),
(27, 'Vlasotince', 'Nemanjina'),
(28, '', ''),
(29, 'Beograd', 'Nemanjina'),
(30, 'Beograd', 'Maksima Gorkog'),
(31, 'Beograd', ''),
(32, 'Beograd', 'Hercegovačka'),
(33, 'Beograd', 'Telep'),
(34, 'Beograd', 'Zvezdara'),
(35, 'Beograd', 'Bulevar Arsenija Čarnojevića');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(5) NOT NULL,
  `text` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(1) NOT NULL,
  `level` int(5) NOT NULL,
  `position` int(25) NOT NULL,
  `hasChilds` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `text`, `href`, `parent`, `level`, `position`, `hasChilds`) VALUES
(2, 'Gallery', 'index.php?page=gallery', 0, 2, 10, 1),
(3, 'Night Gallery', 'index.php?page=ngallery', 2, 2, 10, 0),
(4, 'Day Gallery', 'index.php?page=dgallery', 2, 2, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slikestanova`
--

CREATE TABLE `slikestanova` (
  `ID` int(5) NOT NULL,
  `malaSlika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `VelikaSlika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stanId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slikestanova`
--

INSERT INTO `slikestanova` (`ID`, `malaSlika`, `VelikaSlika`, `stanId`) VALUES
(26, 'assets/images/stanovi/nova_1560092061kosar.jpg', 'assets/images/stanovi/1560092061kosar.jpg', 25),
(27, 'assets/images/stanovi/nova_1560163061nk_orig_9748808_.jpg', 'assets/images/stanovi/1560163061nk_orig_9748808_.jpg', 26),
(28, 'assets/images/stanovi/nova_1560163153nk_orig_9795270_phpalIBbB.jpg', 'assets/images/stanovi/1560163153nk_orig_9795270_phpalIBbB.jpg', 27),
(29, 'assets/images/stanovi/nova_1560163288nk_orig_9817208_phpahcalK.jpg', 'assets/images/stanovi/1560163288nk_orig_9817208_phpahcalK.jpg', 28),
(30, 'assets/images/stanovi/nova_1560244437nk_orig_9885353_.jpg', 'assets/images/stanovi/1560244437nk_orig_9885353_.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `stanovi`
--

CREATE TABLE `stanovi` (
  `ID` int(5) NOT NULL,
  `naslov` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `transakcija` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` int(5) NOT NULL,
  `kategorijaId` int(5) NOT NULL,
  `lokacijaId` int(5) NOT NULL,
  `usersId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stanovi`
--

INSERT INTO `stanovi` (`ID`, `naslov`, `opis`, `transakcija`, `cena`, `kvadratura`, `kategorijaId`, `lokacijaId`, `usersId`) VALUES
(25, 'Odlican namesten stan', 'Odlican stan namesten u fullu', 'Izdavanje', '300', 33, 1, 29, 6),
(26, 'Jedinstven trosoban stan 123 m2; BW Residences kula B', 'Stan se nalazi na 13 spratu i dvostrano je orijentisan, ima pogled ka reci i starom delu grada. Grejna površina stana iznosi 88m2, terasa iznosi 35 m2, sa terase se proteže pogled na ceo grad, stan je jako lepo orijentisan, svetao. Svaka soba je klimatizovana, centralno grejanje po utrošku, ktv, telefon, internet, interfon, tri lifta. Najluksuzniji rezidencijalni objekat na najprestižnijoj lokaciji u Beogradu. U sklopu objekta su zatvoreni bazeni sa spasiocem, teretana sa trenerom, dečija igraon', 'Prodaja', '500000', 50, 3, 32, 6),
(27, 'Blizu Limana,bez ulaganja,kvalitetan stan!', 'Lep jednoiposoban stan u zgradi novije gradnje na svega par minuta laganog hoda do Limana 4. Idealno za život , a isto tako za izdavanje. Stan odmah useljiv. Kljucevi stana su u agenciji , pa tako vreme za gledanje se prilagođava Vama.Mirna ulica , odlična lokacija garancija su za dobru investiciju!!Dobrodošli ste da pogledate ! Pozovite nas! Agencijska šifra: 1039410 (Kodeks i Dunav Nekretnine-Đorđević Nekretnine DOO Novi Sad upisan u Reg. Pos. Broj 183)+38121 426-699\r\n', 'Prodaja', '38000', 34, 4, 33, 6),
(28, 'ZVEZDARA, Dimitrija Tucovića - 1.5 stan', 'Za izdavanje - namešten stan sa odvojenom spavaćom sobom u zgradi novije gradnje, u blizini Gradske bolnice. Useljiv od 1. jula. Uslovi plaćanja: mesečno + depozit + agencijska provizija 50%.\r\n', 'Prodaja', '280', 45, 3, 34, 6),
(29, 'Novi Beograd, Bulevar Arsenija Čarnojevića', 'Izuzetno funkcionalan dupleks sa mogućnošću podele u dve stambene jedinice. Odlicna zvucna izolacija. Donji nivo sastoji se od dnevnog boravka koji izlazi na prostranu terasu, kuhinje, trpezarije, zastakljene lođe, gostinskog toaleta, odvojenog spavaćeg bloka sa dve spavaće sobe I kupatilo. Gornji nivo sa Velux krovnim prozorima I malim bočnim prozorima daje dodatnu osvetljenost u dve spavaće sobe, dnevnim boravcima I kupatilu. Mogućnost kupovine garaže u zgradi. Extremely functional duplex apar', 'Prodaja', '385000', 190, 2, 35, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(5) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo_id` int(5) NOT NULL,
  `uloga` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'korisnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `lastName`, `username`, `email`, `password`, `photo_id`, `uloga`) VALUES
(2, 'Djordje', 'Nikolic', 'dzondraa', 'djole.nic@gmail.com', 'af1acab4e2a1537cb4b79dba204bce09', 1, 'administrator'),
(4, 'Djordje', 'Nikolic', 'djolenzi', 'djole.nic@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', 0, 'korisnik'),
(5, 'Dusan', 'Pavlovic', 'dzondraaaaa', 'djole.nic@gmail.com', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', 0, 'korisnik'),
(6, 'Djordje', 'Nikolic', 'dzondraKorisnik', 'djole.niccc@gmail.com', 'af1acab4e2a1537cb4b79dba204bce09', 0, 'korisnik'),
(7, 'Maja', 'Nikolic', 'maja97', 'maja@gmail.com', 'af1acab4e2a1537cb4b79dba204bce09', 0, 'korisnik'),
(8, 'Dakur', 'Stanicic', 'darence', 'dare@gmail.com', 'af1acab4e2a1537cb4b79dba204bce09', 0, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `lokacije`
--
ALTER TABLE `lokacije`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `slikestanova`
--
ALTER TABLE `slikestanova`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `stanId` (`stanId`);

--
-- Indexes for table `stanovi`
--
ALTER TABLE `stanovi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kategorijaId` (`kategorijaId`),
  ADD KEY `lokacijaId` (`lokacijaId`),
  ADD KEY `usersId` (`usersId`),
  ADD KEY `lokacijaId_2` (`lokacijaId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `photo_id` (`photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id_kat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lokacije`
--
ALTER TABLE `lokacije`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slikestanova`
--
ALTER TABLE `slikestanova`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stanovi`
--
ALTER TABLE `stanovi`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `slikestanova`
--
ALTER TABLE `slikestanova`
  ADD CONSTRAINT `slikestanova_ibfk_1` FOREIGN KEY (`stanId`) REFERENCES `stanovi` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stanovi`
--
ALTER TABLE `stanovi`
  ADD CONSTRAINT `stanovi_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stanovi_ibfk_2` FOREIGN KEY (`lokacijaId`) REFERENCES `lokacije` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stanovi_ibfk_3` FOREIGN KEY (`kategorijaId`) REFERENCES `kategorije` (`id_kat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2024 alle 16:20
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s5_l5_progetto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `fragrances` varchar(100) DEFAULT NULL,
  `description` varchar(800) DEFAULT NULL,
  `price` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `fragrances`, `description`, `price`) VALUES
(1, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Ffiles%2FPDP_SummerSplash_832ff810-0cc8-486d-80fe-da1da24cf677.jpg%3Fv%3D1715270422', 'Borraccia Gen 2, Summer Splash, 600 ml + 3 pod', 'La confezione include 3 pod: Lemon Lime Soda, Trop', 'Capacità: 600 ml. Adatta per acqua liscia e frizzante.\r\nPeso: 262 g\r\nI materiali del sistema di idratazione air up®:\r\n\r\nBorraccia: Tritan™ Renew 50 con il 50% di contenuto riciclato certificato*\r\nAdattatore: Tritan™ Renew 50 con il 50% di contenuto riciclato certificato*\r\nBoccaglio: silicone alimentare di marca, lo stesso dei ciucci per bambini\r\nCinturino: silicone\r\nCoperchio: ABS, una plastica resistente\r\nPod: in materiali riciclabili. Ogni Pod contiene al suo interno un tessuto imbevuto di un\'', '43,98'),
(2, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Ffiles%2FPDP_Flav5_vol2.jpg%3Fv%3D1701198288', 'Selezione 5 Pod vol. 2', 'Kola\r\nAnguria\r\nAranciata\r\nMela\r\nAnanas', 'Cinque gusti unici, oltre 25 litri di aroma, una ricca opportunità per scambiare e sorseggiare alcuni dei nostri gusti più pop!\r\nSorseggia e passa da un gusto all\'altro come vuoi tu, senza limitarti a sceglierne uno solo. Ti abbiamo già parlato della confezione completamente riciclabile e più piccola del 48%? Beh, ora l\'abbiamo fatto.', '12,99'),
(3, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Ffiles%2FPDP_Flav5_vol2.jpg%3Fv%3D1701198288', 'Selezione 5 Pod vol. 2', 'KolaAnguriaAranciataMelaAnanas', 'mklemflkwmefm', '12,99'),
(9, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Fproducts%2FPDP_Flavor_Lifestyle_Featureshot__0021_WildBerry.jpg%3Fv%3D1674203914', 'venlkrnlvern', 'evklrnlkernven', ' ,bjbbkjkkkkkkkkkkkkkkkkkkkkkkkkkk', '14,26'),
(13, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Fproducts%2FAirUp_PDP_flying_fruits_all_0005_Wild_Berry.jpg%3Fv%3D1674203914', 'Frutti rossi', 'evklrnlkernven', 'bla bla vla', '19,99'),
(15, 'https://it.air-up.com/_ipx/f_webp,w_1800,q_75/https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0580%2F3389%2F7621%2Fproducts%2FAirUp_PDP_flying_fruits_all_0005_Wild_Berry.jpg%3Fv%3D1674203914', 'venlkrnlvern', 'evklrnlkernven', '', '9');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'io', 'io@io.com', 'io'),
(2, 'bla', 'bla@bla.com', 'bla'),
(3, 'zia', 'zia@zia.com', 'zia'),
(4, 'mia', 'mia@mia.com', 'mia'),
(5, 'cia', 'cia@cia.it', 'cia'),
(6, 'bi', 'bi@bi.it', 'bi'),
(7, 'oi', 'oi@oi.com', 'oi'),
(8, 'tu', 'tu@tu.it', 'tu');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

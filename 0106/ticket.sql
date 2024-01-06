-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-06 08:52:31
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ticket`
--

-- --------------------------------------------------------

--
-- 資料表結構 `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `ordertime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num` int(5) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `records`
--

INSERT INTO `records` (`id`, `firstname`, `lastname`, `ordertime`, `num`, `price`) VALUES
(5, '陳', '小美', '2024-01-10 06:00:00', 3, 300),
(6, '張', '大同', '2024-10-01 01:10:00', 10, 1000),
(7, '吳', '大美', '2024-12-30 06:50:00', 5, 500),
(9, '陳', '大美', '0000-00-00 00:00:00', 1, 500),
(10, '陳', '大美', '0000-00-00 00:00:00', 1, 500),
(11, '張', '大同', '2024-10-01 01:10:00', 10, 1000),
(12, '張', '大同', '2024-10-01 01:10:00', 10, 1000),
(13, '王', '風成', '2024-01-25 06:10:00', 10, 10000),
(16, '王', '風成', '2024-01-25 06:10:00', 10, 10000);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

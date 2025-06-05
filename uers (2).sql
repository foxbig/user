-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-04 23:26:24
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `uers`
--

-- --------------------------------------------------------

--
-- 資料表結構 `commodity`
--

CREATE TABLE `commodity` (
  `c_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `money` varchar(50) NOT NULL,
  `seller_id` varchar(25) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `commodity`
--

INSERT INTO `commodity` (`c_id`, `img`, `c_name`, `money`, `seller_id`, `category`) VALUES
(8, '立牌.jpg', '壓克力立牌', '550', '1', 'electronics'),
(10, '巨人漫畫.jpg', '一本漫畫', '150', '3', 'clothing'),
(12, '筆記本.jpg', '筆記本', '150', '6', 'clothing'),
(13, '吊飾.jpg', '壓克力吊飾', '350', '6', 'electronics');

-- --------------------------------------------------------

--
-- 資料表結構 `jam`
--

CREATE TABLE `jam` (
  `jam_id` int(11) NOT NULL,
  `jam_name` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `jam_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `jam`
--

INSERT INTO `jam` (`jam_id`, `jam_name`, `jam`, `jam_img`) VALUES
(7, '尤米爾', '始祖巨人', '尤米爾.jpg'),
(8, '尤米爾', '顎之巨人', '尤米爾.png'),
(9, '古利夏', '進擊的巨人', '古利夏.png'),
(10, '皮克', '車力巨人', '皮克.jpg'),
(11, '吉克', '獸之巨人', '吉克.jpg'),
(12, '艾連', '進擊的巨人', '艾連.jpg'),
(13, '艾連', '始祖巨人', '艾連.jpg'),
(14, '貝爾托特', '超大型巨人', '貝爾托特.jpg'),
(15, '亞妮', '女巨人', '亞妮.jpg'),
(16, '波爾柯', '顎之巨人', '波爾柯.png'),
(17, '阿爾敏', '超大型巨人', '阿爾敏.png'),
(18, '庫沙瓦', '獸之巨人', '庫沙瓦.png'),
(19, '馬賽', '顎之巨人', '馬賽.png'),
(20, '梟', '進擊的巨人', '梟.jpg'),
(21, '萊納', '鎧之巨人', '萊納.jpg'),
(22, '拉拉·戴巴', '戰槌巨人', '拉拉·戴巴.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `items` text NOT NULL,
  `total` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `s_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `items`, `total`, `created_at`, `s_id`, `buyer_id`) VALUES
(8, '陳先生', '高雄市', '02-28444405', '[{\"name\":\"\\u7b46\\u8a18\\u672c\",\"price\":150,\"seller_id\":\"6\"},{\"name\":\"\\u58d3\\u514b\\u529b\\u540a\\u98fe\",\"price\":350,\"seller_id\":\"6\"}]', 500, '2025-06-05 04:15:23', 6, 3),
(11, '陳廷文', '高雄市', '3548515', '[{\"name\":\"\\u58d3\\u514b\\u529b\\u540a\\u98fe\",\"price\":350,\"seller_id\":\"6\"},{\"name\":\"\\u7b46\\u8a18\\u672c\",\"price\":150,\"seller_id\":\"6\"}]', 500, '2025-06-05 05:20:12', 6, 1),
(12, '李至恒', '地鐵市', '09878875426', '[{\"name\":\"\\u58d3\\u514b\\u529b\\u540a\\u98fe\",\"price\":350,\"seller_id\":\"6\"}]', 350, '2025-06-05 05:23:08', 6, 3),
(13, '李至恒', '地鐵市', '09878875426', '[{\"name\":\"\\u58d3\\u514b\\u529b\\u7acb\\u724c\",\"price\":550,\"seller_id\":\"1\"}]', 550, '2025-06-05 05:23:08', 1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `acc` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `acc`, `pass`, `type`) VALUES
(1, '始祖', '1234', '5678', 'a'),
(2, '平民', '2234', '5678', 'u'),
(3, '賣家', '9487', '9487', 'p'),
(6, '豪大大雞排', '5678', '4567', 'p'),
(7, 'ray', 'ray', 'ray', 'u');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `commodity`
--
ALTER TABLE `commodity`
  ADD PRIMARY KEY (`c_id`);

--
-- 資料表索引 `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`jam_id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `commodity`
--
ALTER TABLE `commodity`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `jam`
--
ALTER TABLE `jam`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

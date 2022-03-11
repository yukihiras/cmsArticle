-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 05:41 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_title`) VALUES
(25, 'PHP'),
(26, 'HTML5'),
(27, 'CSS3'),
(28, 'JAVASCRIPT'),
(29, 'MSSQL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draff',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(73, 28, 'javascript tips', 'edwin', '2022-03-11', 'javascriptimgae.jpeg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Integer sit amet feugiat arcu. Suspendisse faucibus suscipit pharetra. Nam eleifend viverra lectus in volutpat. Aenean maximus, massa eget egestas maximus, orci elit dictum turpis, at efficitur est risus eget arcu. Curabitur sagittis efficitur ipsum ut iaculis. Quisque pharetra sodales urna, nec suscipit diam interdum sed. Pellentesque at mauris a quam iaculis semper. Nulla congue tincidunt leo, eu dapibus velit vehicula scelerisque. Sed condimentum ex sed magna eleifend vehicula. Vivamus sit amet felis sit amet sapien pulvinar consequat. Duis venenatis sem ut accumsan tincidunt. Integer ut gravida mauris.</span><br></p>', 'javascript, tips, js', 0, 'publish', 0),
(74, 25, 'foreach loop and more', 'thanhs', '2022-03-11', 'phpimage.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium volutpat pellentesque. Sed id hendrerit velit. Morbi nulla sapien, tincidunt quis tincidunt quis, consectetur nec erat. Nunc molestie libero et nunc laoreet, nec convallis neque lacinia. Aliquam id fermentum mauris. Vestibulum convallis dictum ultrices. Vivamus convallis vulputate tortor, ac vulputate orci tempus eget. Ut placerat elit a dui tempus tincidunt. Aenean nunc leo, tempor at turpis sed, egestas egestas sem. Nam maximus augue sit amet sem porttitor tincidunt. Proin dictum at tellus sed malesuada. Praesent lacinia tempus metus, nec placerat risus interdum a. Donec et molestie ligula. Morbi diam nulla, porttitor eget dui ultrices, faucibus blandit mauris. Sed in vestibulum dui.</span><br></p>', 'php, foreach, loop', 0, 'publish', 0),
(75, 29, 'Tips for MSSQL', 'thanhs', '2022-03-11', 'mssqlimage.png', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Quisque rutrum risus accumsan ornare elementum. Praesent a erat vitae quam pretium ullamcorper. Donec arcu purus, porta ut efficitur vel, maximus sed tortor. Fusce aliquet, leo in ultrices convallis, orci metus suscipit diam, sed varius ipsum nunc ut ipsum. Ut a dolor ullamcorper, iaculis enim quis, pretium leo. Ut ac diam diam. Vivamus interdum massa non turpis ornare, sed lobortis est varius. Duis porttitor dui non lorem condimentum, id placerat libero pellentesque. Sed lectus nisl, condimentum eget consectetur quis, euismod sit amet purus. In consequat lectus id mi sollicitudin egestas.</span><br></p>', 'mssql, tips', 0, 'publish', 0),
(76, 25, 'PHP PDO and more', 'justin', '2022-03-11', 'pdo.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Quisque rutrum risus accumsan ornare elementum. Praesent a erat vitae quam pretium ullamcorper. Donec arcu purus, porta ut efficitur vel, maximus sed tortor. Fusce aliquet, leo in ultrices convallis, orci metus suscipit diam, sed varius ipsum nunc ut ipsum. Ut a dolor ullamcorper, iaculis enim quis, pretium leo. Ut ac diam diam. Vivamus interdum massa non turpis ornare, sed lobortis est varius. Duis porttitor dui non lorem condimentum, id placerat libero pellentesque. Sed lectus nisl, condimentum eget consectetur quis, euismod sit amet purus. In consequat lectus id mi sollicitudin egestas.</span><br></p>', 'pdo, php, tips', 0, 'publish', 2),
(77, 27, 'CSS and a couple things you may not know', 'saijma', '2022-03-11', 'cssimage.jpeg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Donec porta est quis commodo tempus. Cras fermentum neque nec lacinia consectetur. Curabitur nec nibh in massa facilisis dignissim vitae ut neque. Proin ut odio libero. Aenean sit amet velit eget sem faucibus fringilla congue eget diam. Proin ac massa tellus. In elit quam, dapibus in lacinia eu, gravida sit amet erat. Vestibulum cursus sit amet urna vitae fringilla. In fermentum eros tortor, eget tristique arcu condimentum sed. Nam iaculis porta pharetra. Aenean suscipit suscipit ipsum a vehicula. Nullam fermentum leo nec leo dignissim pretium.</span><br></p>', 'css, tips,', 0, 'publish', 0),
(78, 26, 'tips for HTML 5', 'john', '2022-03-11', 'html5image.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sed sem lacus, finibus nec ullamcorper id, ullamcorper a leo. Nullam rhoncus lobortis quam et porta. Phasellus vel leo nec risus vestibulum mattis. Curabitur cursus sem eget ex imperdiet maximus. Sed lobortis neque at consectetur luctus. Aliquam dictum fermentum eros et porttitor. Vivamus tincidunt id justo a dictum. Vivamus fermentum ipsum vel vulputate bibendum. Suspendisse ornare facilisis purus id rhoncus. Phasellus nec interdum nibh. Vivamus eget convallis ipsum. Cras facilisis sollicitudin arcu maximus laoreet. Fusce quis neque luctus, aliquet erat ac, convallis nisl. Pellentesque ut risus tortor. Donec sit amet nisi quis sem finibus efficitur.</span><br></p>', 'html5, tips', 0, 'publish', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `user_image`, `role`, `randSalt`) VALUES
(63, 'zoro', '$2y$10$l5ED6iRBNsc6sDLl4AuEiuu7efrcO3msR.CWJPeloOUom11pgbhOK', 'Phạm', 'Sang', 'tuanlaai123@gmail.com', '2712750_1.png', 'admin', '$2y$10$iusesomecrazystrings22'),
(64, 'sanji', '$2y$10$/ThWzljfVQah.HQw1E/yseDupNp89hZ0Qo9eYArUn1zewTJGInap6', 'Lã', 'Mạnh', 'manhcoi@gmail.com', '44e91b47743e592f494fb9427a3cd35a.jpg', 'admin', '$2y$10$iusesomecrazystrings22'),
(66, 'Nami', '$2y$10$XXAAqi9Xj3y2tEJhsLs82eTNsLlfqpj47Qbtvy8n/zGsFpH4YgB5K', 'Diệu', 'Vy', 'nami123@gmail.com', 'f017852eca7b3977c8e45bd7a4a221bc.jpg', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(67, 'ussop', '$2y$10$W817sCWFmgoVFyu.odDosOj5FBBHgp96/VKuVWalzJg5tq44JXnoi', 'Lê', 'Nhật', 'ussop2342@gmail.com', 'ussop.png', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(68, 'robin ', '$2y$10$3M61tUrnzCHBsCZcIMywKOpEEnXIvro9CIQpJIHPadV2YnicFKDJ6', 'Vân', 'Nga', 'robin2342@gmail.com', '515-5154437_one-piece-logo-one-piece-nico-robin-flag.png', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(78, 'jimbei', '$2y$10$9WLs5bafcKer38IuT8wF2uREo5Poa0A0MBwjlob/.a87JhYci26Z6', 'Thanh', 'Tuấn', 'jimbei234@gmai.com', 'jimbei.png', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(79, 'luffy', '$2y$10$BcsfzMcGhiUR9rDnh1P.7u1qVu1uqmXbwML4xTwCYHdCR9L28Poiu', 'Đỗ', 'Thành', 'luffy132@gmail.com', '560.jpg', 'admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'n7kvqa4s93udi6oefrqoaani8d', 1646230936),
(2, 'pkfbrgf8jcpma00j12ptda7cv6', 1646230855),
(3, 'f34aagpvc883a3bfp15n19qoge', 1646279349),
(4, 'ehc2v3dd665tvh45dagom6solh', 1646318514),
(5, '', 1646314321),
(6, '1g75b2slvj7fhqh76brbvinno8', 1646318032),
(7, 'mo0colm9cn68qbg3qdens4hq1h', 1646385645),
(8, 'si0ehvt7ma3rohr81lb60lv48l', 1646472090),
(9, 'u6kd67651pspc9qmbghjtjfgmp', 1646537465),
(10, 'fpsenjkm8iffkjrt4r59pm8jsf', 1646632432),
(11, 'kiuichp40j2uh6n3edibm0u89f', 1646646088),
(12, '9ck1ivok919lenqk3lqlf16pm7', 1646710392),
(13, 'qitm74pj88ckuqt92lqtuipj1r', 1646820965),
(14, 'm4mett152387e3umaib0fcss0t', 1646973289);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

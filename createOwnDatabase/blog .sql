-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2023 at 10:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `visibility` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `label`, `contact`, `visibility`) VALUES
(1, 'phone_number', '+380989234737', 1),
(2, 'email_address', 'viktoriia_herchanivska@gmail.com', 1),
(3, 'facebook_link', 'https://facebook.com/profile.php?id=100008948389333', 1),
(4, 'instagram_link', 'https://www.instagram.com/exo_xaocy/', 1),
(5, 'twitter_link', 'twitter.com', 1),
(6, 'youtube_link', 'youtube.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `info_text` text NOT NULL,
  `visibility` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `label`, `info_text`, `visibility`) VALUES
(1, 'footer_info', 'This is some text about blog. I write here anything just to fill up some lines. And one another sentence. It is almost done. I need just a little more text. And some text here. Suggest this sentence could be the last, perhaps, I don\'t sure.', 1),
(2, 'dashboard_info', 'We recommend to use dashboard function via PC since it is not suitable for other device such as phone or tablet etc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `header` tinyint(4) NOT NULL,
  `user_menu` tinyint(4) NOT NULL,
  `footer` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `header`, `user_menu`, `footer`) VALUES
(2, 'Home', '/index.php', 1, 0, 1),
(3, 'Contact Us', '/contact.php', 1, 0, 0),
(4, 'Dashboard', '/admin/dashboard.php', 0, 1, 1),
(5, 'Logout', '/logout.php', 0, 1, 1),
(6, 'Gallery', '/gallery.php', 0, 0, 1),
(7, 'Sign Up', '/register.php', 1, 0, 1),
(8, 'Log In', '/login.php', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated_by` int(11) DEFAULT NULL,
  `last_update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `body`, `user_id`, `published`, `created_at`, `last_updated_by`, `last_update_date`) VALUES
(1, 'Post 1', '1683649656_Cat_August_2010-4.jpg', '&lt;p&gt;dfh kf vdkj udlk jifmk dok nj kbm ifmk lnfdj n ikbdvjkvnl jfdo bn ibnj lbn kj fjv jovbjk kmdjk j knfkjn jk j kcn kd njmvk ji &amp;nbsp;jifvok j ilkdn kdk ifj nj kovdkj mb jdbj &amp;nbsp;jjd nilk jlkjnbjvn jcn jnkv fjmb knj njfmk kjfmjk njkldm nkfkn jkv &amp;nbsp;fj hfkl hjukfn hjvj jf nhfjk nj vg &amp;nbsp;vfd &amp;nbsp;v g&lt;/p&gt;', 1, 1, '2023-05-09 19:27:36', NULL, '2023-10-05 18:01:25'),
(2, 'fvhhu jf  hkfj fjji hjf huifvn fkjl hjkff ff', '1691149958_Cat.jpg', '&lt;p&gt;dfghj yugyuv hg fghvfghj d gh bgyt rdfyt h trr ftgb ytr d tyg trf ufre5 gfr6578 rdtg fr tuygtygft g 74rtg y ft ytf r gf rt gy ty uhytf rgu hjfty gytcdrf drt y rdtftg rft g ftg g t fvyt fgy h 6 yhnj&lt;/p&gt;', 1, 1, '2023-05-09 19:28:17', NULL, '2023-10-05 15:33:30'),
(3, 'gbg gbf fgbffv', '1683649759_domestic-cat-lies-in-a-basket-with-a-knitted-royalty-free-image-1592337336.jpg', '&lt;p&gt;fbvg tf fbh vytghb tfchj bjf cvgh v tf gh b gfv bh byti rdfgn iv gtfgi yui ktiyfyt uih utfyg uh ft ygu huycrf fyg &amp;nbsp;vyuty ghb ig &amp;nbsp;gvfv g ucv guk hi njguf gbh &amp;nbsp;v uy bv fyt iu vf g uig yb &amp;nbsp;fcf vhb gyi b hbv guk bu v hv b n iyh n b u yh&lt;/p&gt;', 1, 1, '2023-05-09 19:29:19', NULL, '2023-10-05 15:33:30'),
(4, 'hbn bnnh', '1683649790_642a80d98c090.jpg', '&lt;p&gt;bv &amp;nbsp;bnhjnjkhg vghg jj g kgf b jc gfbh &amp;nbsp;kvgu h kgv hj khbh &amp;nbsp;vf bv igb n bu hjb hjf cv ghv g bjg yvkh gg bt &amp;nbsp;ghjb gv gb jyt g jv vj fcv h b bv vg &amp;nbsp;vvbg ghgd&lt;/p&gt;', 1, 1, '2023-05-09 19:29:50', NULL, '2023-10-05 15:33:30'),
(5, 'ghnji nh ghybf', '1683649849_Cat.jpg', '&lt;p&gt;&amp;nbsp;vvhgm45 hu7jhg gtrty6rivu ghfggvb ngthgvyu yt 5ty furtf rdf drfcgh dfgc hdcgdf rdf trguyjdfgh butryg gh bgf b hmg &amp;nbsp;gf jcv g kcvg h hggy j &amp;nbsp;v ghj hg hnfgjkg jh gv vgh vgh vh g gjh jgftgh jjcfygtjhk. l ugty guhk fc fh j&lt;/p&gt;', 1, 1, '2023-05-09 19:30:49', NULL, '2023-10-05 15:33:30'),
(6, 'vb nb mgv ghc vbc gb  bbvcbv v', '1683649920_140372563.jpg', '&lt;p&gt;vgnfcb fg jyjhhkfy jfgy hjjc uv y fvh jkvjg yh v uyb hgu tkjb jhv kyh jc vg bh hj jk bhj v hj vg vg liu hjvgkuy hfc hgfdh gikldnko; hdkv fkkfhk jk fj ighxuv hgfhj ihjjk gfxjk hjdkj hj bhcjk khg cjj kfdhuvjfv bb&amp;nbsp;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;vbg&lt;/li&gt;&lt;li&gt;jjfcd&lt;/li&gt;&lt;li&gt;hngh&lt;/li&gt;&lt;li&gt;hb&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;hth nhj bgnhn &amp;nbsp;hnhh&amp;nbsp;&lt;/p&gt;', 1, 1, '2023-05-09 19:32:00', NULL, '2023-10-05 15:33:30'),
(7, ' vb  n mbh vb bvbgvn mnv  hd', '1683649983_los-10-sonidos-principales-del-gato-fa.jpg', '&lt;p&gt;bbgbvgn gn&amp;nbsp;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;g&lt;/li&gt;&lt;li&gt;h&lt;/li&gt;&lt;li&gt;f&lt;/li&gt;&lt;li&gt;i&lt;/li&gt;&lt;li&gt;g&lt;/li&gt;&lt;li&gt;fh&lt;/li&gt;&lt;li&gt;hgghgh&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;hghkjnjnj ythgf fbgfh&lt;/p&gt;&lt;ul&gt;&lt;li&gt;ghnjj&lt;/li&gt;&lt;li&gt;fghh&lt;/li&gt;&lt;li&gt;ghhhj&lt;/li&gt;&lt;li&gt;eryuikk&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;hfghjkng&amp;nbsp;&lt;/p&gt;&lt;p&gt;hhhfjg ghjkuhgfgdhjk hfddgjklb jhj kkgg&lt;/p&gt;', 1, 1, '2023-05-09 19:33:03', NULL, '2023-10-05 15:33:30'),
(8, 'bgnbh j khg', '1683650018_Cat_August_2010-4.jpg', '&lt;blockquote&gt;&lt;p&gt;ghjhgjufhjkjtgghmjkl;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;ggghjihtf &amp;nbsp;hh fhjk hh kgfd f jkfjlkfcf j dliugyh j lkgvx fjhgjlih gvh bm&lt;/p&gt;&lt;p&gt;jhyju&lt;/p&gt;', 1, 1, '2023-05-09 19:33:38', NULL, '2023-10-05 15:33:30'),
(9, 'bfghbg hj', '1683650039_best-breeds-of-house-cats-memphis-vet-1-1.jpeg', '&lt;p&gt;ghjjg khbg jvgj h kjgv&amp;nbsp;&lt;/p&gt;', 1, 1, '2023-05-09 19:34:00', NULL, '2023-10-05 15:33:30'),
(10, 'nnm, kh gh,h hguk ', '1683650098_140372563.jpg', '&lt;p&gt;jhjjk, kv lhjh kgyjhf khj jghf hkkg kjg lhgghg n kygf fcddfgjkl hjhlkfjgc ffghjk hdfh urtg hv fyg h fyt h &amp;nbsp;trfgh iyg frt uyg ftfgh kj &amp;nbsp;hgvcgf hv fhg hb ghc fdhg hcgf hbm vgbn nfg hgcfv fg hf ghv jfcvg cfgh fvhgb vfg h vg fvgbh hfd cgf gf &amp;nbsp;ghjh kljbgj bkv gh khcf v hgb j vgh hjf hcd v b jhj. n lvjf gjh kj. kj cg b b hj bhj cg f v fcv b vcg hg&amp;nbsp;&lt;/p&gt;', 1, 1, '2023-05-09 19:34:58', NULL, '2023-10-05 15:33:30'),
(11, 'hnhg  ghn hn vb nbv nhf', '1683650139_domestic-cat-lies-in-a-basket-with-a-knitted-royalty-free-image-1592337336.jpg', '&lt;p&gt;nhnnn &amp;nbsp;hgn &amp;nbsp;hf gd &amp;nbsp;hgmjk,ljk b fdniu,ln dbnyuijhb kjc cbn hj,kk, nhmjjklj&lt;/p&gt;', 1, 1, '2023-05-09 19:35:39', NULL, '2023-10-05 15:33:30'),
(12, 'v m,nm nfmn jnb v', '1683650260_140372563.jpg', '&lt;p&gt;vm,dn k mn mn &amp;nbsp;jnnm m njn,k hbfkjhb mnhb kjdfbh n hbnjv fbj dmf b hn jhbfd gbgb hftv fdrrh fbfsdt tfds hjj rrtvh gb &lt;i&gt;gbdb f&lt;/i&gt;&lt;/p&gt;', 1, 1, '2023-05-09 19:37:40', NULL, '2023-10-05 15:33:30'),
(13, 'gfhj ku', '1683650320_642a80d98c090.jpg', '&lt;p&gt;&lt;i&gt;jhjlkg&lt;/i&gt; l h l j k; y jhilkhfh l j hl t k &amp;nbsp;klg &amp;nbsp;jl gj &amp;nbsp;fghgk l jgkhuy kuygj hkjf lgjk lk gk&lt;/p&gt;', 1, 1, '2023-05-09 19:38:40', NULL, '2023-10-05 15:33:30'),
(14, 'update topic', '1691150097_140372563.jpg', '&lt;p&gt;ghjgh&lt;strong&gt;ghjjjhhjjhj hh&lt;/strong&gt;hh hhhjh t&lt;/p&gt;&lt;p&gt;hjjhjj kjhj jhbkjg hjhjj&lt;/p&gt;', 1, 1, '2023-05-09 19:39:56', NULL, '2023-10-05 15:33:30'),
(15, 'ghh', '1683981426_642a80d98c090.jpg', '&lt;p&gt;OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO&lt;/p&gt;', 1, 1, '2023-05-13 15:37:06', NULL, '2023-10-05 15:33:30'),
(16, 'New post with multiple topic', '1690909310_Cat.jpg', '&lt;p&gt;Add some body to my new post make it useless, u read it it is your choice okay, bye&lt;/p&gt;', 1, 0, '2023-08-01 20:01:50', NULL, '2023-10-05 17:56:51');

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `update_post` BEFORE UPDATE ON `posts` FOR EACH ROW SET NEW.last_update_date = CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `post_topics`
--

CREATE TABLE `post_topics` (
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_topics`
--

INSERT INTO `post_topics` (`post_id`, `topic_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 6),
(4, 6),
(5, 4),
(6, 3),
(7, 1),
(7, 3),
(8, 2),
(9, 2),
(10, 4),
(11, 3),
(11, 5),
(12, 2),
(13, 3),
(13, 4),
(13, 6),
(14, 1),
(14, 3),
(14, 5),
(15, 2),
(16, 2),
(16, 3),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `answered` tinyint(4) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `email`, `message`, `answered`, `admin_id`, `created_at`) VALUES
(3, 'fdf@f.n', 'f', 1, 1, '2023-05-09 14:05:40'),
(4, 'fdf@f.n', 'vv', 0, 0, '2023-05-09 14:12:03'),
(5, 'b@s.j', 'f', 1, 1, '2023-05-09 14:13:04'),
(6, 'some@s.d', 'I want to try a longer message bacause i need to deside whether i need request-preview or not', 0, 0, '2023-08-01 15:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Moderator'),
(3, 'Administrator'),
(4, 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `label`, `title`, `visibility`) VALUES
(1, 'site_name', 'Somename', 1),
(2, 'site_name_second_part', 'Blog', 1),
(3, 'carousel_name', 'Main Posts', 1),
(4, 'carousel_topic', '1', 1),
(5, 'recent_posts_title', 'Recent Posts', 1),
(6, 'search_bar_title', 'Search', 1),
(7, 'topic_bar_title', 'Topics', 1),
(8, 'footer_links_title', 'Quick Links', 1),
(9, 'contact_form_title', 'Contact Us', 1),
(16, 'footer_blog_name', NULL, 1),
(18, 'c_sign', 'Created by Viktoriia Herchanivska | viktoriia.herchanivska@gmail.com', 1),
(19, 'open_post', 'Read More', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `published`, `user_id`) VALUES
(1, 'Main', '<p>Main to see on post carousel</p>', 1, 1),
(2, 'aaaaaaaaa', '<p>a</p>', 1, 1),
(3, 'sdf', '<p>s</p>', 1, 2),
(4, 'topic', '<p>f</p>', 1, 1),
(5, 'iiiiiiiiiii', '', 0, 1),
(6, 'aaaar', '<p>ttttt</p>', 0, 1),
(7, 'qqqqqqqqqq', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'FirstUser', 'some.email@gmail.com', '$2y$10$JEm2ROdNlBGQ4hw6bWypk.9Br76k0IL8bHQRUUQNF3EgwSU7QJ.bC', 4, '2023-05-09 12:25:25'),
(3, 'SecondUser', 'manager@g.com', '$2y$10$YA8SyWFys39R3rrl3ATsOOljcfYbd8t42u5PZNutFDkj4tLLT6d8W', 2, '2023-10-05 18:16:42'),
(4, 'ThirdUser', 'user@g.com', '$2y$10$V72KkG5uSQ8Z8YM.q8i8yukENsHmarYAc4OR9LG6iGVZ2dNaiGtwm', 1, '2023-10-08 13:12:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `last_updated_by` (`last_updated_by`);

--
-- Indexes for table `post_topics`
--
ALTER TABLE `post_topics`
  ADD PRIMARY KEY (`post_id`,`topic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `topics_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `post_topics`
--
ALTER TABLE `post_topics`
  ADD CONSTRAINT `post_topics_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_topics_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

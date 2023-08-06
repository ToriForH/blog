-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2023 at 02:55 PM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `topic_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `body`, `topic_id`, `user_id`, `published`, `created_at`) VALUES
(1, 'Post 1', '1683649656_Cat_August_2010-4.jpg', '&lt;p&gt;dfh kf vdkj udlk jifmk dok nj kbm ifmk lnfdj n ikbdvjkvnl jfdo bn ibnj lbn kj fjv jovbjk kmdjk j knfkjn jk j kcn kd njmvk ji &amp;nbsp;jifvok j ilkdn kdk ifj nj kovdkj mb jdbj &amp;nbsp;jjd nilk jlkjnbjvn jcn jnkv fjmb knj njfmk kjfmjk njkldm nkfkn jkv &amp;nbsp;fj hfkl hjukfn hjvj jf nhfjk nj vg &amp;nbsp;vfd &amp;nbsp;v g&lt;/p&gt;', '1', 1, 1, '2023-05-09 19:27:36'),
(2, 'fvhhu jf  hkfj fjji hjf huifvn fkjl hjkff ff', '1691149958_Cat.jpg', '&lt;p&gt;dfghj yugyuv hg fghvfghj d gh bgyt rdfyt h trr ftgb ytr d tyg trf ufre5 gfr6578 rdtg fr tuygtygft g 74rtg y ft ytf r gf rt gy ty uhytf rgu hjfty gytcdrf drt y rdtftg rft g ftg g t fvyt fgy h 6 yhnj&lt;/p&gt;', '1', 1, 1, '2023-05-09 19:28:17'),
(3, 'gbg gbf fgbffv', '1683649759_domestic-cat-lies-in-a-basket-with-a-knitted-royalty-free-image-1592337336.jpg', '&lt;p&gt;fbvg tf fbh vytghb tfchj bjf cvgh v tf gh b gfv bh byti rdfgn iv gtfgi yui ktiyfyt uih utfyg uh ft ygu huycrf fyg &amp;nbsp;vyuty ghb ig &amp;nbsp;gvfv g ucv guk hi njguf gbh &amp;nbsp;v uy bv fyt iu vf g uig yb &amp;nbsp;fcf vhb gyi b hbv guk bu v hv b n iyh n b u yh&lt;/p&gt;', '1, 6', 1, 1, '2023-05-09 19:29:19'),
(4, 'hbn bnnh', '1683649790_642a80d98c090.jpg', '&lt;p&gt;bv &amp;nbsp;bnhjnjkhg vghg jj g kgf b jc gfbh &amp;nbsp;kvgu h kgv hj khbh &amp;nbsp;vf bv igb n bu hjb hjf cv ghv g bjg yvkh gg bt &amp;nbsp;ghjb gv gb jyt g jv vj fcv h b bv vg &amp;nbsp;vvbg ghgd&lt;/p&gt;', '6', 1, 1, '2023-05-09 19:29:50'),
(5, 'ghnji nh ghybf', '1683649849_Cat.jpg', '&lt;p&gt;&amp;nbsp;vvhgm45 hu7jhg gtrty6rivu ghfggvb ngthgvyu yt 5ty furtf rdf drfcgh dfgc hdcgdf rdf trguyjdfgh butryg gh bgf b hmg &amp;nbsp;gf jcv g kcvg h hggy j &amp;nbsp;v ghj hg hnfgjkg jh gv vgh vgh vh g gjh jgftgh jjcfygtjhk. l ugty guhk fc fh j&lt;/p&gt;', '4', 1, 1, '2023-05-09 19:30:49'),
(6, 'vb nb mgv ghc vbc gb  bbvcbv v', '1683649920_140372563.jpg', '&lt;p&gt;vgnfcb fg jyjhhkfy jfgy hjjc uv y fvh jkvjg yh v uyb hgu tkjb jhv kyh jc vg bh hj jk bhj v hj vg vg liu hjvgkuy hfc hgfdh gikldnko; hdkv fkkfhk jk fj ighxuv hgfhj ihjjk gfxjk hjdkj hj bhcjk khg cjj kfdhuvjfv bb&amp;nbsp;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;vbg&lt;/li&gt;&lt;li&gt;jjfcd&lt;/li&gt;&lt;li&gt;hngh&lt;/li&gt;&lt;li&gt;hb&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;hth nhj bgnhn &amp;nbsp;hnhh&amp;nbsp;&lt;/p&gt;', '3', 1, 1, '2023-05-09 19:32:00'),
(7, ' vb  n mbh vb bvbgvn mnv  hd', '1683649983_los-10-sonidos-principales-del-gato-fa.jpg', '&lt;p&gt;bbgbvgn gn&amp;nbsp;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;g&lt;/li&gt;&lt;li&gt;h&lt;/li&gt;&lt;li&gt;f&lt;/li&gt;&lt;li&gt;i&lt;/li&gt;&lt;li&gt;g&lt;/li&gt;&lt;li&gt;fh&lt;/li&gt;&lt;li&gt;hgghgh&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;hghkjnjnj ythgf fbgfh&lt;/p&gt;&lt;ul&gt;&lt;li&gt;ghnjj&lt;/li&gt;&lt;li&gt;fghh&lt;/li&gt;&lt;li&gt;ghhhj&lt;/li&gt;&lt;li&gt;eryuikk&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;hfghjkng&amp;nbsp;&lt;/p&gt;&lt;p&gt;hhhfjg ghjkuhgfgdhjk hfddgjklb jhj kkgg&lt;/p&gt;', '1, 3', 1, 1, '2023-05-09 19:33:03'),
(8, 'bgnbh j khg', '1683650018_Cat_August_2010-4.jpg', '&lt;blockquote&gt;&lt;p&gt;ghjhgjufhjkjtgghmjkl;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;ggghjihtf &amp;nbsp;hh fhjk hh kgfd f jkfjlkfcf j dliugyh j lkgvx fjhgjlih gvh bm&lt;/p&gt;&lt;p&gt;jhyju&lt;/p&gt;', '2', 1, 1, '2023-05-09 19:33:38'),
(9, 'bfghbg hj', '1683650039_best-breeds-of-house-cats-memphis-vet-1-1.jpeg', '&lt;p&gt;ghjjg khbg jvgj h kjgv&amp;nbsp;&lt;/p&gt;', '2', 1, 1, '2023-05-09 19:34:00'),
(10, 'nnm, kh gh,h hguk ', '1683650098_140372563.jpg', '&lt;p&gt;jhjjk, kv lhjh kgyjhf khj jghf hkkg kjg lhgghg n kygf fcddfgjkl hjhlkfjgc ffghjk hdfh urtg hv fyg h fyt h &amp;nbsp;trfgh iyg frt uyg ftfgh kj &amp;nbsp;hgvcgf hv fhg hb ghc fdhg hcgf hbm vgbn nfg hgcfv fg hf ghv jfcvg cfgh fvhgb vfg h vg fvgbh hfd cgf gf &amp;nbsp;ghjh kljbgj bkv gh khcf v hgb j vgh hjf hcd v b jhj. n lvjf gjh kj. kj cg b b hj bhj cg f v fcv b vcg hg&amp;nbsp;&lt;/p&gt;', '4', 1, 1, '2023-05-09 19:34:58'),
(11, 'hnhg  ghn hn vb nbv nhf', '1683650139_domestic-cat-lies-in-a-basket-with-a-knitted-royalty-free-image-1592337336.jpg', '&lt;p&gt;nhnnn &amp;nbsp;hgn &amp;nbsp;hf gd &amp;nbsp;hgmjk,ljk b fdniu,ln dbnyuijhb kjc cbn hj,kk, nhmjjklj&lt;/p&gt;', '3, 5', 1, 1, '2023-05-09 19:35:39'),
(12, 'v m,nm nfmn jnb v', '1683650260_140372563.jpg', '&lt;p&gt;vm,dn k mn mn &amp;nbsp;jnnm m njn,k hbfkjhb mnhb kjdfbh n hbnjv fbj dmf b hn jhbfd gbgb hftv fdrrh fbfsdt tfds hjj rrtvh gb &lt;i&gt;gbdb f&lt;/i&gt;&lt;/p&gt;', '2', 1, 1, '2023-05-09 19:37:40'),
(13, 'gfhj ku', '1683650320_642a80d98c090.jpg', '&lt;p&gt;&lt;i&gt;jhjlkg&lt;/i&gt; l h l j k; y jhilkhfh l j hl t k &amp;nbsp;klg &amp;nbsp;jl gj &amp;nbsp;fghgk l jgkhuy kuygj hkjf lgjk lk gk&lt;/p&gt;', '3, 4', 1, 1, '2023-05-09 19:38:40'),
(14, 'update topic', '1691150097_140372563.jpg', '&lt;p&gt;ghjgh&lt;strong&gt;ghjjjhhjjhj hh&lt;/strong&gt;hh hhhjh t&lt;/p&gt;&lt;p&gt;hjjhjj kjhj jhbkjg hjhjj&lt;/p&gt;', '1, 3, 4', 1, 1, '2023-05-09 19:39:56'),
(15, 'ghh', '1683981426_642a80d98c090.jpg', '&lt;p&gt;OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO&lt;/p&gt;', '2', 1, 1, '2023-05-13 15:37:06'),
(16, 'New post with multiple topic', '1690909310_Cat.jpg', '&lt;p&gt;Add some body to my new post make it useless, u read it it is your choice okay, bye&lt;/p&gt;', '2, 4', 1, 1, '2023-08-01 20:01:50');

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
  `admin` tinyint(4) NOT NULL,
  `moder` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `moder`, `role`, `created_at`) VALUES
(1, 'FirstUser', 'some.email@gmail.com', '$2y$10$JEm2ROdNlBGQ4hw6bWypk.9Br76k0IL8bHQRUUQNF3EgwSU7QJ.bC', 1, 1, 'Admin', '2023-05-09 12:25:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2017 at 03:38 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `peridowningdb`
--
CREATE DATABASE IF NOT EXISTS `peridowningdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `peridowningdb`;

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

CREATE TABLE `symbols` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `tweet` text NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `name`, `tweet`, `likes`, `dislikes`) VALUES
(12, '@adown', 'I love New Twitter', 7, 1),
(24, '@adown', 'hello', 0, 0),
(28, '@shrim101', 'I love New Twitter', 0, 0),
(30, '@shrim101', 'raph is #notmymoderator', 1, 0),
(32, '@shrim101', '#notmymod boooo raph', 0, 0),
(34, '@realKadMerad', 'Come to my new movie Bienvenue Chez Les Chiti', 3, 0),
(37, '@KingAnsh', 'Hey hows it going new twitter people', 3, 1),
(38, '@reelNeel', 'Hey hows it going new twitter people', 0, 0),
(39, '@realKadMerad', 'Hey New Twitter, I am Kad Merad', 4, 0),
(41, '@cemmutlu', '68q', 0, 0),
(42, '@reelNeel', '68q', 0, 0),
(43, '@adown', '68q', 0, 1),
(44, '@newguy', 'Hey new twitter people', 0, 0),
(45, '@adown2', 'Wow new twitter exceeds expectations', 0, 0),
(47, '@senseibyers', 'I love New Twitter', 0, 0),
(48, '@senseibyers', '#love&peace', 0, 0),
(49, '@senseibyers', 'Join my new dojo opening May 28th #ad #plug', 0, 0),
(56, '@poopypants', 'loveing it here on NewTwitter', 1, 1),
(83, '@poopypants', 'love it', 0, 0),
(87, '@adown', 'I love New Twitter', 2, 0),
(92, '@rods', 'hey dudz', 1, 0),
(93, '@rods', 'loving new twitter', 0, 0),
(95, '@potato', 'hate speech', 0, 3),
(96, '@shrim101', 'hey newtwits', 1, 0),
(97, '@math', 'loving new twitter', 0, 0),
(98, '@math', 'Also loving Math', 0, 0),
(99, '@newguy', 'How is everyones day', 0, 0),
(100, '@KingAnsh', 'DeezNutz ha goteem', 0, 0),
(101, '@reelNeel', 'new twitter is my fav #great', 0, 0),
(102, '@robperi', 'Hey I love NewTwitter™', 0, 0),
(103, '@robperi', '#loving the New Twitter experience', 0, 0),
(104, '@poopypants', '#loving New Twitter so far', 0, 0),
(105, '@rods', '#loving everything about New Twitter', 0, 0),
(106, '@mhoel', '#loving this project Rob and Andrew really are the best coders', 2, 0),
(107, '@potato', '#hate new twitter', 0, 3),
(108, '@adown2', '#loving it here', 0, 0),
(109, '@EMcDrizzle', 'You know what I love....NEW TWITTER', 1, 0),
(110, '@EMcDrizzle', '#LOVING New Twitter', 1, 0),
(111, '@cemmutlu', '#loving jokes I hate new Twitter', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `following` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `img`, `bio`, `following`, `admin`) VALUES
(1, 'NewTwitter', '0dd5c05f249ee3d9d0bd47e8a72c933fce2db7d2cf4fbc5c056f89131a0a35ba', '4c500db044770907', 'newtwit@twit.org', '', '', '', 1),
(8, 'adown', '2aa29fbee3560d7f2f6a4ee54af1249b895606c2b215d333a61a403da8f92a0a', '13f295e26cf6166b', 'andrew.downing@ucc.on.ca', 'https://www.w3schools.com/css/trolltunga.jpg', 'Co-Founder, NewTwitter Inc™', '1,11,12,14,15,16,20,21,22', 1),
(9, 'adown2', '4cc5ee91e412c18ed6755e89fca1c7b914a261c6bc55eac3e182a1c48c146999', '1d93c4e56053a91', 'aa@g.ca', 'https://s-media-cache-ak0.pinimg.com/736x/54/7a/9c/547a9cc6b93e10261f1dd8a8af474e03.jpg', 'The second greatest', '1', 0),
(11, 'shrim101', 'a2dba15bef7877b82824814a313cbf0f9d799bbd209180b2c84a88a288e330c2', '36f93985170d9ec0', 'shirm@gmail.com', 'http://hdwallpaperbackgrounds.net/wp-content/uploads/2017/01/images-tiger.jpg', 'Wow, Just WOW', '1,12', 0),
(12, 'realKadMerad', '7644529b2d441f2678552debde5a1109c50c15df4429d28e3454e2ea9981e613', '289920b3f436328', 'kadmerad@gmail.com', 'http://mediamass.net/jdd/public/documents/celebrities/1451.jpg', 'Bonjours les mecs I am Kad Merad aka Mad Kerad. ', '1,8,9,11,14', 0),
(14, 'KingAnsh', '21a2ac6b9056d92eb42d0035748dd712f47438b88fb84356f990a5a8ef7dcb89', '5a3a7b055d7ea5d3', 'asd@gna.com', 'https://i.ytimg.com/vi/5LlQNty_C8s/hqdefault.jpg', 'I love new twitter its better than other competing social networks', '1,9,12,11,8', 0),
(15, 'reelNeel', 'ec4f4b4b6469633dbf91cf6e6854d2594c2e49e8db3375b14a186a8fe7be678d', '2c77e47722b060a5', 'aile@gmail.com', 'http://toriavey.com/images/2011/01/Falafel-10-640x480.jpg', 'Artist, Inventor, Saxy Guy', '1,14,9,11,12,8', 0),
(16, 'math', '2d2beeaddca3eb14a8ebb6fbf41c125c896bbfee85b6766e42eb83f3dd53a4f1', '2379671e406ceaa5', 'asdsd@fna.ca', 'http://blog.edx.org/wp-content/uploads/2016/04/Math-1.jpg', 'Hey I hate math but love New Twitter', '1,9', 0),
(17, 'newguy', '7225c8f69ed6e2bc07cf33c0daf2be5deebc19dc7df17a437c23f32254b5002c', '7fb5d257777ea9a0', 'a@fns.com', 'https://static.pexels.com/photos/3247/nature-forest-industry-rails.jpg', 'i<3 New Twitter', '1,19', 0),
(18, 'heydude', '86bed5837a99d8655f514b5ee94197de35acf8fa09a836fb84294539b8194a73', '1c90d19a3975700c', 'ab@g.c', 'http://www.ihop.com/-/media/DineEquity/IHop/Images/Menu/MenuItems/Belgian-Waffles/belgium_waff.ashx', 'Boi, NewTwitter is great', '1', 0),
(19, 'cemmutlu', '4911b84567e3151a5eaae24f3df4075a06fcad177915b4df7c6b8edde73625ab', '27b556ad6f09d182', 'a@fndfs.ca', 'http://elelur.com/data_images/mammals/horse/horse-03.jpg', 'Funny thing I also love new twitter', '1,8', 0),
(20, 'robperi', '9c00e7b7b07cbeb8dc597fbed29a3eebdaf3024b7888cb22b951387a99321468', '6468d0b47faa6b64', 'rob@rob.com', 'https://images.template.net/wp-content/uploads/2015/09/15194733/Collision-Cool-Space-Backgrounds.jpg', 'Co-Founder, NewTwitter Inc™', '1', 0),
(21, 'senseibyers', '7b70e981f48025d242e02b66d611596e5fe898dd33bfa87e7429aa7259a851ed', '449dd709445d4878', 'sensei@sudo.ku', 'https://i.ytimg.com/vi/AiZToTxBERQ/hqdefault.jpg', 'Join my dojo opening may 24th', '1,8', 0),
(22, 'poopypants', '82db51545a8102de90bd0fb2aac5c4c395742e5639f72323b830a21c434567fb', '45a101dc50b087', 'poopy@pants.com', 'https://www.rubysinn.com/wp-content/uploads/2014/11/things-to-do-in-bryce-canyon-rodeo.jpg', 'I love NewTwitter and rodeos', '1,8', 0),
(23, 'coolnewuser', 'a358bcbd441a9a1d8af72757b93c5107bfb84d488fb29e6310e7571dc58c7f5a', '5d515ffa3825ca23', 'ad@c.ca', 'https://static.pexels.com/photos/8700/wall-animal-dog-pet.jpg', 'Hey im new here but it seems cool...', '1,12,20,8,15,11,14', 0),
(24, 'mhoel', '91422dbd11b47fb26778f1d36f48a409e6fd7d4e7591ac9b65bf2a28ff887528', '772be828534d7dcc', 'mhoel@hoel.com', 'https://media.licdn.com/mpr/mpr/shrinknp_200_200/p/4/000/158/0ed/2e01274.jpg', 'New Twitter is the best project, maybe ever', '1', 1),
(25, 'rods', 'd9a08f37d0b8d95a43a905b4d062f6d79ebd02e9ee9d84117f0e2bac7c77f13b', '7c11d9d2c22834c', 'rod@s.ca', 'https://www.dreamhost.com/blog/wp-content/uploads/2015/10/DHC_blog-image-01-300x300.jpg', 'New guy here....loving it', '1,12,8', 0),
(26, 'potato', '412047a4e416d88dac2ff9cb09f5fcb6952b41a5325195c44b221b9a4a3f3cce', '6a47063e40957872', 'jeremy@ucc.ca', 'https://www.deltaco.com/files/menu/item/flatbreadtaco.png', 'not so sure about new twitter', '1,12,11,15,8', 0),
(27, 'EMcDrizzle', '86c78e2e4dba94420dc0a96b662345ca80c7d073a4570ea42a11e4801733f258', '75a9a54c125abc5c', 'emd@me.com', 'https://cdn.instructables.com/ORIG/F3C/JGYF/IB226ATC/F3CJGYFIB226ATC.jpg', 'I LOVE NEW TWITTER', '1,8,12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `symbols`
--
ALTER TABLE `symbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `symbols`
--
ALTER TABLE `symbols`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
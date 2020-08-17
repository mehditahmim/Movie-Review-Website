-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 12:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_review_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmnt_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `movie_name` varchar(40) DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `comment` varchar(249) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmnt_id`, `id`, `movie_name`, `review_id`, `comment`, `date`) VALUES
(24, 11, 'Arrival', 15, 'hey Tahmim!', NULL),
(25, 11, 'Arrival', 23, 'what did u wrote?', NULL),
(26, 11, 'Arrival', 25, 'nah', NULL),
(27, 11, 'Arrival', 24, 'hey there do u remember me?', NULL),
(28, 11, 'Arrival', 31, 'wait what?', NULL),
(29, 16, 'Arrival', 23, 'what?', NULL),
(30, 16, 'Arrival', 23, 'what?', NULL),
(31, 4, 'Arrival', 15, 'I am mehdi', NULL),
(32, 4, 'Arrival', 29, 'what is qw?\r\n', NULL),
(33, 4, 'Arrival', 15, 'Mehdi is writing', NULL),
(34, 4, 'Arrival', 27, 'ki likso?', NULL),
(35, 16, 'Avatar', 33, 'qwdwqdw', NULL),
(36, 4, 'john', 38, 'yeah', NULL),
(37, 4, 'john wick', 42, 'Yeah', '2020-05-09 12:44:59'),
(38, 4, 'john wick', 43, 'I agree', '2020-05-09 12:45:13'),
(39, 4, 'john wick', 43, 'I agree', '2020-05-09 12:45:13'),
(40, 4, 'john wick', 45, 'Ohh really?', '2020-05-09 02:03:03'),
(41, 11, 'john wick', 45, 'yes!', '2020-05-09 03:30:40'),
(42, 11, 'john wick', 42, 'the story was goo too\r\n', '2020-05-09 03:31:02'),
(43, 20, 'john wick', 45, 'indeed!', '2020-05-09 03:49:40'),
(44, 4, 'Arrival', 15, 'Hey there', '2020-05-09 03:21:40'),
(45, 12, 'john wick', 46, 'is it?', '2020-05-09 03:25:28'),
(46, 4, 'Arrival', 53, 'Nice movie indeed', '2020-05-22 03:46:52'),
(51, 4, 'Avatar', 57, 'Noooo', '2020-05-22 03:55:43'),
(52, 12, 'Avatar', 58, 'Hey!, you watch movies this days?', '2020-05-22 03:56:38'),
(53, 11, 'Dark knight', 54, 'My favourite movie!', '2020-05-22 03:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_name` varchar(40) NOT NULL,
  `poster` varchar(100) DEFAULT NULL,
  `genre` varchar(15) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_name`, `poster`, `genre`, `description`) VALUES
('Andhadhun', '\'movie posters/Andhadhun.jpg\'', 'Drama', 'Andhadhun is a 2018 Indian black comedy crime thriller film co-written and directed by Sriram Raghavan, produced by Matchbox Pictures, and distributed by Viacom18 Motion Pictures. The film stars Tabu, Ayushmann Khurrana, and Radhika Apte, and tells the story of a blind piano player who unwittingly becomes embroiled in the murder of a former film actor.'),
('Arrival', '\'movie posters/arrival.jpg\'', 'Action', 'Arrival is a 2016 American science fiction film directed by Denis Villeneuve and written by Eric Heisserer. Based on the 1998 short story Story of Your Life by Ted Chiang, it stars Amy Adams, Jeremy Renner and Forest Whitaker. The film follows a linguist enlisted by the United States Army to discover how to communicate with extraterrestrial aliens who have arrived on Earth, before tensions lead to war.'),
('Avatar', '\'movie posters/Avatar.jpg\'', 'Fantasy', 'Avatar (marketed as James Cameron is a 2009 American epic science fiction film directed, written, produced, and co-edited by James Cameron and stars Sam Worthington, Zoe Saldana, Stephen Lang, Michelle Rodriguez, and Sigourney Weaver. The film is set in the mid-22nd century when humans are colonizing Pandora, a lush habitable moon of a gas giant in the Alpha Centauri star system, in order to mine the mineral unobtanium, a room-temperature superconductor.'),
('Avengers', '\'movie posters/Avengers.jpg\'', 'Fiction', 'The film\'s development began when Marvel Studios received a loan from Merrill Lynch in April 2005. After the success of the film Iron Man in May 2008, Marvel announced that The Avengers would be released in July 2011 and would bring together Tony Stark (Downey), Steve Rogers (Evans), Bruce Banner (Ruffalo), and Thor (Hemsworth) from Marvel\'s previous films.'),
('Bigil', '\'movie posters/bigil.jpg\'', 'Action', 'Bigil  is a 2019 Indian Tamil-language sports action film written and directed by Atlee Kumar and produced by Kalpathi S. Aghoram under the banner AGS Entertainment.[7][8] The film stars Vijay in dual lead roles as Michael, a mobster and former footballer and Rayappan, a gangster and Michael\'s father, alongside Nayanthara, Jackie Shroff, Vivek and Kathir in other prominent roles.'),
('Dark Knight', '\'movie posters/DarkKnight.jpg\'', 'Thriller', 'The Dark Knight is a 2008 superhero film directed, co-produced, and co-written by Christopher Nolan. Based on the DC Comics character Batman, the film is the second installment of Nolan\'s The Dark Knight Trilogy and a sequel to 2005\'s Batman Begins, starring Christian Bale and supported by Michael Caine, Heath Ledger, Gary Oldman, Aaron Eckhart, Maggie Gyllenhaal, and Morgan Freeman. '),
('Ford vs Ferrari', '\'movie posters/fordvsferrari.jpg\'', 'Action', 'Ford v Ferrari (titled Le Mans \'66 in some European territories)[4] is a 2019 American sports drama film[5] directed by James Mangold and written by Jez Butterworth, John-Henry Butterworth, and Jason Keller. The film stars Matt Damon and Christian Bale, with Jon Bernthal, Caitriona Balfe, Tracy Letts, Josh Lucas, Noah Jupe, Remo Girone, and Ray McKinnon in supporting roles'),
('Imitation game', '\'movie posters/imitation game.jpg\'', 'Drama', 'The Imitation Game is a 2014 American historical drama film directed by Morten Tyldum and written by Graham Moore, based on the 1983 biography Alan Turing: The Enigma by Andrew Hodges. The title of the film quotes the name of the game Alan Turing proposed for answering the question \"Can machines think?\", in his 1950 seminal paper \"Computing Machinery and Intelligence\"'),
('Inception', '\'movie posters/inception.jpg\'', 'Thriller', 'Inception is a 2010 science fiction action film[4][5] written and directed by Christopher Nolan, who also produced the film with his wife, Emma Thomas. The film stars Leonardo DiCaprio as a professional thief who steals information by infiltrating the subconscious of his targets. He is offered a chance to have his criminal history erased as payment for the implantation of another person\'s idea into a target\'s subconscious.'),
('john wick', '\'movie posters/john wick.jpg\'', 'action', 'John Wick (retroactively known as John Wick: Chapter 1) is a 2014 American neo-noir action thriller film directed by Chad Stahelski, in his directorial debut, and written by Derek Kolstad. It stars Keanu Reeves, Michael Nyqvist, Alfie Allen, Adrianne Palicki, Bridget Moynahan, Dean Winters, Ian McShane, John Leguizamo, and Willem Dafoe. It is the first installment in the John Wick film series.'),
('Ninety Six', '\'movie posters/96.jpg\'', 'Action', '\'96 is a 2018 Indian Tamil-language romantic drama film written and directed by C. Premkumar, starring Vijay Sethupathi and Trisha in lead roles.[3] The film revolves around, two high school sweethearts from the batch of 1996 who meet at a reunion, 22 years after they parted.'),
('Rang De Basanti', '\'movie posters/Rangdebasanti.jpg\'', 'comedy', 'The story is about five young men from Delhi whose lives and perceptions change as they act in a documentary film on five revolutionary Indian freedom fighters. Inspired from the freedom fighters, they assassinate the Indian Defence Minister for his act of corruption that was responsible for the death of their friend, an Indian Air Force pilot'),
('Robot', '\'movie posters/robot2.jpg\'', 'Fiction', 'Robot is a 2018 Indian Tamil-language science fiction action film[3][6] written and directed by S. Shankar, and co-written by B. Jeyamohan. Produced by Subaskaran under the banner of Lyca Productions. As the second instalment in the Enthiran franchise, 2.0 is a standalone sequel to Enthiran (2010), featuring Rajinikanth reprising the roles of Vaseegaran and Chitti, alongside Akshay Kumar and Amy Jackson'),
('Saathiya', '\'movie posters/saathiya_.jpg\'', 'Romance', 'Saathiya (English: Companion) is a 2002 Indian Hindi-language romantic drama film directed by Shaad Ali and produced by Mani Ratnam and Yash Chopra under the banner of Yash Raj Films. The film stars Rani Mukerji and Vivek Oberoi in lead roles, with Shah Rukh Khan and Tabu appearing in extended special appearances.'),
('Three idiots', '\'movie posters/three_idiots.jpg\'', 'Drama', '3 Idiots is a 2009 Indian Hindi-language coming-of-age comedy-drama film co-written (with Abhijat Joshi) and directed by Rajkumar Hirani. Starring Aamir Khan, R. Madhavan, Sharman Joshi, Kareena Kapoor, Boman Irani and Omi Vaidya in the lead roles, the film follows the friendship of three students at an Indian engineering college and is a satire about the social pressures under an Indian education system.'),
('Villain', '\'movie posters/the_villain.jpg\'', 'Action', 'Villain is a 2002 Indian Tamil-language action masala film written and directed by K. S. Ravikumar and produced by S. S. Chakravarthy. The film stars Ajith Kumar in a dual role, alongside Meena and Kiran. Sujatha, FEFSI Vijayan, Karunaas and Ramesh Khanna appear in other significant roles, while Vidyasagar composed the score and soundtrack for the film');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `r_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie` varchar(30) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`r_id`, `user_id`, `movie`, `rating`) VALUES
(23, 20, 'Arrival', 4),
(24, 4, 'Arrival', 3),
(25, 14, 'Arrival', 5),
(26, 14, 'Avatar', 3),
(28, 14, 'john wick', 5),
(29, 12, 'john wick', 4),
(30, 11, 'john wick', 4),
(31, 22, 'Arrival', 5),
(32, 4, 'Dark knight', 5),
(33, 20, 'Avatar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `movie_name` varchar(40) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  `review` varchar(249) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `id`, `movie_name`, `DATE`, `review`) VALUES
(42, 20, 'john wick', NULL, 'Ohh the action was too good\r\n'),
(43, 16, 'john wick', NULL, 'good film!'),
(45, 11, 'john wick', '2020-05-08 03:36:24', 'Very impressive!'),
(46, 12, 'john wick', '2020-05-09 03:25:17', 'This is a nice movie!'),
(52, 14, 'john wick', '2020-05-19 12:27:35', 'Ohh man loved it'),
(53, 22, 'Arrival', '2020-05-19 04:36:16', 'What a film!'),
(54, 4, 'Dark knight', '2020-05-22 02:55:10', 'Indeed one of the best creations from Christopher Nolan'),
(55, 4, 'Arrival', '2020-05-22 03:51:21', 'Does anyone know? When is the next show?'),
(56, 20, 'Arrival', '2020-05-22 03:53:07', 'Great film!'),
(57, 20, 'Avatar', '2020-05-22 03:55:04', 'I like this film '),
(58, 14, 'Avatar', '2020-05-22 03:56:11', 'Good movie!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`) VALUES
(4, 'Tahmim', 'Mehdi', 'tahmim.mehdi@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, 'Abhash', 'Ahmed', 'abhash@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'Nasif', 'Latif', 'nasif@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 'Azmyne ', 'Wasif', 'wasif@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'Rahat', 'Ahmed', 'rahat@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'Faruqui', 'Ahmed', 'faruqui@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'Farzana', 'Ahmed', 'farzana@gmail.com', '202cb962ac59075b964b07152d234b70'),
(19, 'Karim', 'Mohammad', 'karim@gmail.com', '202cb962ac59075b964b07152d234b70'),
(20, 'Samina', 'Mumu', 'mumu@gmail.com', '202cb962ac59075b964b07152d234b70'),
(21, 'Kamal', 'uddin', 'kamal@gmail.com', '202cb962ac59075b964b07152d234b70'),
(22, 'wasif', 'mugdho', 'azmyne@gmail.com', '202cb962ac59075b964b07152d234b70'),
(23, 'jamil', 'ahmed', 'jamil@gmail.com', '202cb962ac59075b964b07152d234b70'),
(24, 'Nazmul', 'Alam', 'nazmul@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_name`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

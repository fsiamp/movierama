-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2022 at 08:48 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movierama`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` varchar(255) CHARACTER SET utf8 NOT NULL,
  `uploader` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(5000) CHARACTER SET utf8 NOT NULL,
  `likes` int(11) NOT NULL,
  `hates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `uploader`, `date`, `description`, `likes`, `hates`) VALUES
(1, 'Top Gun: Maverick', 'qwerty', '2022-07-08 04:40:09', 'American military action drama film directed by Joseph Kosinski and written by Ehren Kruger, Eric Warren Singer, and Christopher McQuarrie, from a story by Peter Craig and Justin Marks.', 3, 0),
(2, 'Jurassic World Dominion', 'ponnynoob', '2022-07-08 04:40:07', 'Science fiction action film directed by Colin Trevorrow, who co-wrote the screenplay with Emily Carmichael. Based on a story by Trevorrow and Derek Connolly, the film is a sequel to Jurassic World: Fallen Kingdom (2018) and the third film in the Jurassic World franchise.', 2, 1),
(3, 'Doctor Strange in the Multiverse of Madness', 'qwerty', '2022-07-08 04:40:13', 'While searching for help, Strange and Chavez are apprehended by Earth-838\'s Sorcerer Supreme, Karl Mordo, and brought before the Illuminati, a group consisting of Mordo, Peggy Carter, Blackagar Boltagon, Maria Rambeau, Reed Richards, and Charles Xavier. They explain that through reckless use of their universe\'s Darkhold in an attempt to defeat Thanos, Earth-838\'s Strange triggered a universe-destroying \"incursion\"', 0, 2),
(4, 'Sonic the Hedgehog 2', 'mario', '2022-07-08 04:40:11', 'Eight months after defeating Doctor Robotnik and being adopted by Tom and Maddie Wachowski as their son, Sonic the Hedgehog attempts to help the public as a vigilante to little success. Tom advises Sonic to remain patient for the day his powers will be needed before he and Maddie depart for her sister Rachel\'s wedding in Hawaii. Sonic plans to have fun while home alone but is attacked by Robotnik, who has returned with the help of Knuckles the Echidna.', 2, 1),
(5, 'The Lost City', 'ponnynoob', '2022-07-08 04:09:11', 'After a disastrous start, mostly due to the popularity of Alan\'s Dash persona, Loretta is taken by Abigail Fairfax, a billionaire who realizes that Loretta based her books on actual historic research she did with her late archaeologist husband. He discovered a lost city on a remote Atlantic island and is convinced the Crown of Fire, a priceless treasure, is located there.', 3, 0),
(6, 'The Batman', 'james', '2022-07-08 04:09:38', 'On Halloween, Gotham City mayor Don Mitchell Jr. is murdered by a masked psychopath calling himself the Riddler. Reclusive billionaire Bruce Wayne, who has operated for two years as the vigilante Batman, investigates the murder alongside the Gotham City Police Department (GCPD). Lieutenant James Gordon discovers a message that the Riddler left for Batman. The following night, the Riddler kills commissioner Pete Savage and leaves another message for Batman.', 1, 2),
(7, 'Minions: The Rise of Gru', 'ponnynoob', '2022-07-08 04:10:21', 'In 1976, 11-year-old Gru plans to become a supervillain, assisted by the Minions, whom he has hired to work for him. Gru\'s is ecstatic when he receives an audition invitation from the Vicious 6, a supervillain team led by Belle Bottom, who hope to find a new member to replace their founder, the supervillain Wild Knuckles, following their betrayal and the presumed death of Knuckles during a heist to steal the Zodiac Stone, a stone connected to the Chinese zodiac.', 0, 3),
(8, 'The Five Devils', 'ponnynoob', '2022-07-09 14:51:16', 'French drama fantasy film directed by Léa Mysius, who wrote the screenplay with Paul Guilhaume. The film stars Adèle Exarchopoulos and Sally Dramé. It screened in the Directors\' Fortnight section at the 2022 Cannes Film Festival on May 23, 2022.', 0, 0),
(9, 'The King\'s Daughter', 'james', '2022-07-09 14:51:28', 'American action-adventure fantasy film directed by Sean McNamara from a screenplay by Barry Berman and James Schamus. It is based on the 1997 novel The Moon and the Sun by Vonda N. McIntyre. The film stars Pierce Brosnan as King Louis XIV, Kaya Scodelario as Marie-Josèphe, and Benjamin Walker as Yves De La Croix. It was William Hurt\'s final film, the last of his screen performances to be released before his death in March 2022.', 2, 0),
(10, 'A Fairy Tale After All', 'ponnynoob', '2022-07-09 14:52:24', 'Musical fantasy film produced, written and directed by Erik Peter Carlson. The film stars Emily Shenaut, Brian Hull, Gabriel Burrafato, Bridget Winder, Timothy N. Kopacz, and Anna Brisbin. The film was released theatrical and VOD by Vertical Entertainment on February 18, 2022.', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

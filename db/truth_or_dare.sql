-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 okt 2024 om 15:37
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truth_or_dare`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `truth_or_dare_questions`
--

CREATE TABLE `truth_or_dare_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `truth_or_dare_questions`
--

INSERT INTO `truth_or_dare_questions` (`id`, `question`) VALUES
(1, 'Drink if you have kissed someone in the room.'),
(2, 'The group votes on most likely to get back with an ex. That person drinks.'),
(3, 'Drink your body count. If it’s over than 10, finish your drink.'),
(4, 'Pick someone from the group to take a shot with you.'),
(5, 'Whoever has the most drink left has to finish it.'),
(6, 'Take a sip for every ex you’ve had. More than 5, take a shot.'),
(7, 'Add a shot of choice to someone else’s drink.'),
(8, 'Group votes on the one most likely to end up in bed with a stranger. That person drinks.'),
(9, 'The group is allowed to post any photo on your story. If you refuse, take a shot.'),
(10, 'Go around the group, each person says the weirdest place they’ve had sex.'),
(11, 'Blindfold your eyes and let the group give you random item. You have one try to guess what it is. If you fail, you drink.'),
(12, 'Tell each player in the group their most attractive features, or take a shot.'),
(13, 'Lie down and have the second person on your right lay on you for a round.'),
(14, 'Everyone who hasn’t had sex in a week drinks.'),
(15, 'Name 3 things you pay attention to when you meet new people. If you fail to name them in 10 seconds, you drink.'),
(16, 'Give the player on your right a massage for one minute or you drink.'),
(17, 'Try your best pick up line on someone in the group. The person you picked decides if it’s good enough to save you from drinking.'),
(18, 'Each player has to put a number from 1 to 5 in their notes app. Reveal it to everyone at the same time. Whoever has matching numbers kisses each other on the cheek.'),
(19, 'Name 2 people here you would most likely have a threesome with. Or take a shot.'),
(20, 'Blindfold yourself and guess every player by feeling their bodies. You must drink for each time you’re wrong.'),
(21, 'Name 3 things you would say to a stranger in a hot tub. If you fail to name them in 10 seconds, you drink.'),
(22, 'You have 3 job offers for the position of a cow milker, pornstar and a priest. Choose 3 people here who you’d hire for each position.'),
(23, 'For the next round, everyone that makes eye contact with you has to drink.'),
(24, 'Spin a bottle and feed the player it points to only using your mouth.'),
(25, 'Sit on the lap of the person opposite you and say the 5 things you want for Christmas or drink.'),
(26, 'All ladies drink.'),
(27, 'Who do you think is the hottest in the group? Answer or drink.'),
(28, 'Spin a bottle and take a picture with the person it points to. Now post it on your story with the caption \"the love of my life\" or take a shot.'),
(29, 'Switch a clothing piece with the third person on your left.'),
(30, 'Say a word and going in a circle everyone has to say a word that rhymes with it. Whoever takes too long must drink.'),
(31, 'Let the group give you a fuck, marry, kill. Make a decision or drink.'),
(32, 'All gentlemen drink.'),
(33, 'Lick the earlobe of the player to your left or drink.'),
(34, 'Everyone votes for the person who is most likely to steal a street sign. That person must drink.'),
(35, 'Guess which person lost their virginity first. If you’re right they drink. If you’re wrong you drink.'),
(36, 'Challenge another player to an arm wrestling. The loser drinks.'),
(37, 'Let the group pick someone who you have to kiss on the lips. If either of you refuse, you have to take a shot.'),
(38, 'Everyone who has a piercing somewhere other than their ears must drink.'),
(39, 'Let someone go through your phone for a minute or take a shot.'),
(40, 'Spin the bottle, whoever it lands on you can either kiss or slap.'),
(41, 'Touch tongues with the player opposite you or both drink.'),
(42, 'How did you lose your virginity? Tell the story or drink.'),
(43, 'Would you rather kiss the person on your left or right. Answer or drink.'),
(44, 'Sit on the lap of the second person to your left.'),
(45, 'The group has to choose someone to slap your butt as hard as they want or you must drink.'),
(46, 'Go out the room with the person opposite you for 7 minutes.'),
(47, 'Group chooses who you should kiss or drink.'),
(48, 'Which player do you think is the best in bed?'),
(49, 'Do a trust fall with the person on your right.'),
(50, 'Swap clothing with the person on your left.'),
(51, 'Lick the earlobe of everyone from the opposite gender.'),
(52, 'Text your ex you miss them.'),
(53, 'Recreate a sex position with the third person to your right.'),
(54, 'Make the group guess the color of your underwear. Take a sip for every person that was correct.'),
(55, 'Kiss the player you’d most likely sleep with.'),
(56, 'French kiss a player the group chooses.'),
(57, 'On the count of three everyone point to who they think is the biggest flirt. That player drinks.'),
(58, 'Do 10 push ups.'),
(59, 'Spin in a circle 10 times and kiss the person in front of you.'),
(60, 'Hold hands with the person on your right.'),
(61, 'On the count of three point to the person who’s most likely to get turned on by the idea of getting caught.'),
(62, 'What’s the easiest way to get you horny?'),
(63, 'Let the person in front of you search their name in your phone.'),
(64, 'What’s one public place you’d like to have sex in?'),
(65, 'What turns you off?'),
(66, 'Kiss everyone on the cheek.'),
(67, 'If you could swap lives with anyone in the group for a day who would it be and why?'),
(68, 'Wear all your clothes inside out till the end of the game or take a shot.'),
(69, 'Body tequila shot off the person opposite you or take two shots.'),
(70, 'Flip a coin. If it lands on heads, you drink. If it lands on tails, everyone else drinks.'),
(71, 'Make a rule that everyone has to follow for the next 5 rounds.'),
(72, 'Spin the bottle and let the person it points to give you a hickey or take a shot.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `truth_or_dare_questions`
--
ALTER TABLE `truth_or_dare_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `truth_or_dare_questions`
--
ALTER TABLE `truth_or_dare_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

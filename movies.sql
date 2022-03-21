-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2022 at 02:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkhanna1_movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `pc_name` varchar(100) NOT NULL,
  `pc_website` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `male_lead` varchar(100) NOT NULL,
  `female_lead` varchar(100) NOT NULL,
  `child_lead` varchar(10) NOT NULL,
  `runtime` varchar(30) NOT NULL,
  `movie_desc` text NOT NULL,
  `genre` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `music` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `imdb` float(10,1) NOT NULL,
  `review` text NOT NULL,
  `deletedYN` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `pc_name`, `pc_website`, `release_date`, `male_lead`, `female_lead`, `child_lead`, `runtime`, `movie_desc`, `genre`, `category`, `music`, `director`, `imdb`, `review`, `deletedYN`) VALUES
(1, 'Army of Thieves', 'TheStoneQuarry', 'http://www.cruelfilms.com/', '2021-10-28', 'Matthias Schweig, Stuart Martin', 'Ruby O. Fee, Nathalie Emmanuel', 'no', '127', 'In this prequel to \'Army of the Dead,\' a mysterious woman recruits bank teller Dieter to assist in a heist of impossible-to-crack safes across Europe.', 'thriller', 'fictional', 'Hans Zimmer', ' Matthias SchweighÃ¶fer', 6.4, 'A prequel that benefits from being only loosely connected to anything weâ€™ve already seen, this is a fun, light romp that leans on likeable characters rather than CG spectacle.', 'N'),
(2, 'Free Guy', '20th Century Studios', 'https://www.20thcenturystudios.com/', '2021-08-13', 'Ryan Reynolds', 'Jodie Comer', 'no', '115', 'When a bank teller discovers he\'s actually a background player in an open-world video game, he decides to become the hero of his own story -- one that he can rewrite himself. In a world where there\'s no limits, he\'s determined to save the day his way before it\'s too late, and maybe find a little romance with the coder who conceived him.', 'action', 'fictional', 'Christophe Beck', 'Shawn Levy', 7.2, 'This film is so beautiful even if there is no follow up. The characters are likeable to the T. I even enjoyed the villain of the story, Antwan (AKA Korg AKA Taika Waititi) due to his charisma, jokes and his character being what a lot of people believe most companies have become, being all about the numbers and not about the people or workers but mostly his charm and jokes are what make him a funny, comedic character.', 'N'),
(3, 'Paranormal Activity: Next of Kin', 'Blumhouse Productions', 'https://www.blumhouse.com/', '2021-10-29', 'Dan Lippert', 'Emily Bader', 'no', '108', 'Margot, a young woman who was abandoned by her mother as a baby, travels to a secluded Amish community with a documentary film crew seeking answers about her mother and extended family.', 'horror', 'fictional', ' Lucas Fink', 'William Eubank', 5.2, 'Dear lord every time my friend takes us to see another of these movies we keep trying to tell him it won\'t get any better and this movie proves it yet again. Seriously this footage horror movies craze should have stopped years ago because the camera turning and spinning around would drive many annoyed and others sick and not because of any feelings of horror. ', 'N'),
(4, 'The Alpinist', 'Sender Films', 'https://www.senderfilms.com/', '2021-09-10', 'Marcâ€‘Andre Leclerc', 'Brette Harrington', 'yes', '93', 'Marc-AndrÃ© Leclerc climbs alone, far from the limelight. On remote alpine faces, the free-spirited 23-year-old Canadian makes some of the boldest solo ascents in history. Yet, he draws scant attention. With no cameras, no rope, and no margin for error, Leclerc\'s approach is the essence of solo adventure.', 'documentary', 'non-fictional', 'Jon Cooper', 'Ben Bryan', 7.8, 'It\'s Marc-Andre\'s birthday today! So glad I caught this testament to life lived brilliantly. Beautiful climber, beautiful person, beautiful film work. His 2 girls, Michelle Kuipers and  Brette Harrington stand shoulder to shoulder with the achievements of the remarkable Marc-Andre in grace and goodness, as they face peaks as challenging as any he climbed.', 'N'),
(5, 'Old', 'Universal Pictures', 'https://www.universalpictures.com/', '2021-07-23', 'M. Night Shyamalan', 'Thomasin McKenzie', 'no', '108', 'A thriller about a family on a tropical holiday who discover that the secluded beach where they are relaxing for a few hours is somehow causing them to age rapidly reducing their entire lives into a single day.', 'horror', 'fictional', 'Old/Music composed by Trevor Gureckis', 'M. Night Shyamalan', 5.8, 'I really liked this film and appreciated the deeper meaning and messages behind it which made me think long after I\'d left the theatre.\r\n\r\nSo often now at the cinema/on streaming platforms I watch films and series that are boring or predictable and I find myself scrolling Instagram halfway through, but I genuinely didn\'t know where this film was going right up until the end which was really refreshing.', 'N'),
(6, 'Voyagers', 'AGC Studios', 'https://www.agcstudios.com/', '2021-04-08', 'Neil Burger', 'Lilyâ€‘Rose Depp', 'no', '108', 'With the future of the human race at stake, a group of young men and women -- bred for intelligence and obedience -- embark on an expedition to colonize a distant planet. When they uncover disturbing secrets about the mission, they defy their training and begin to explore their most primitive nature', 'scifi', 'fictional', 'Trevor Gureckis', 'Neil Burger', 5.4, 'I havenâ€™t seen Colin Farrell for a while so it was good to see heâ€™s still around. He suited the role of being a kind of father figure for a crew of socially controlled young space geeks. This flick had the makings of a really good sci fi space saga and the concept which left you open to imagination. It also played on the notion of an experiment on human behaviour and how natural urges need to be kept controlled if you want to maintain discipline, conformity and cooperation to achieve your aim which in this case was making the lengthy time journey to a planet 80 odd years away that will be their new Eden for the survival of the human species. ', 'N'),
(7, 'Nine Days', ' Juniper Productions', 'https://juniper.agency/', '2021-07-30', 'Winston Duke', 'Zazie Beetz', 'no', '110', 'A man interviews five unborn souls to determine which one should be given a new life on Earth, with the unchosen ones facing oblivion.', 'drama', 'fictional', 'Antonio Pinto', 'Edson Oda', 7.2, 'Five unborn souls go through a nine day interview to see who will be selected for life on earth in the movie \'Nine Day\'s\'.\r\n\r\nThis might be one of the most well done movies I have seen this year. the writing, story, message, lighting, cinematography, cast, and acting all aligned to deliver an emotional and beautiful film. ', 'N'),
(8, 'After We Fell', 'Wattpad', 'https://www.wattpad.com/login', '2021-09-10', 'Hero Fiennes Tiffin', 'Josephine Langford', 'no', '99', 'As Tessa makes a life-changing decision, revelations about her family and Hardin\'s past threaten to derail her plans and end the couple\'s intense relationship.', 'romance', 'fictional', 'George Kallis', 'Castille Landon', 4.8, 'I haven\'t read the book or have any knowledge of it other than wasting an hour and a half of my time on Netflix, so I have no attachment to anyone or anything. This is a raw review that I wrote after struggling to keep my composure until the very end.', 'N'),
(9, 'Hitman\'s Wife\'s Bodyguard', 'Millennium Media', 'http://millennium-media.net/', '2021-06-16', 'Ryan Reynolds', 'Salma Hayek', 'no', '117', 'Michael runs into the Kincaids again when Sonia saves his life. He unwillingly agrees to rescue her notorious husband again and soon gets involved in saving Europe from a vengeful man.', 'action', 'fictional', 'Atli Ã–rvarsson', 'Patrick Hughes', 6.1, 'Hitman\'s Wife\'s Bodyguard is epic,I liked the first movie but this is cherry on the cake ...\r\nSuperb Actors, Ryan Reynolds, Samuel L. Jackson, Salma Hayek, Antonio Banderas, Morgan Freeman, Frank Grillo\r\nI have to say that I adore Salma Hayek\'s accent, I adore her, she\'s crazy, Cucaracho :)\r\nAntonio Banderas is gorgeous in film and a very well structured villain...', 'N'),
(10, 'Jungle Cruise', 'Seven Bucks Productions', 'https://sevenbucks.com/', '2021-07-30', 'Dwayne Johnson', 'Emily Blunt', 'no', '127', 'Dr. Lily Houghton enlists the aid of wisecracking skipper Frank Wolff to take her down the Amazon in his ramshackle boat. Together, they search for an ancient tree that holds the power to heal -- a discovery that will change the future of medicine.', 'adventure', 'fictional', 'James Newton Howard', 'Jaume Collet-Serra', 6.6, 'I totally agreed with Ebert\'s review! This movie is not complicated, just pure fantasy enjoyable escapist entertainment! Isn\'t that what we go to the movies for? I know that I do and I have been an avid movie fan for nearly all of my 74 years! It\'s nice to see a true story at the movies, at least once in a while. But often times they are sad and depressing, although some true stories have good endings and can be uplifting! It\'s like watching the news, some news is good news, and some news is not good!', 'N'),
(11, 'Love Hard', 'Wonderland Sound and Vision', 'https://www.wonderlandsoundandvision.com/', '2021-11-05', 'Darren Barnet', 'Nina Dobrev', 'no', '115', 'After meeting her perfect match on a dating app, an L.A. writer learns she\'s been catfished when she flies 3,000 miles to surprise him for Christmas.', 'romance', 'fictional', 'Mark Orton', 'HernÃ¡n JimÃ©nez', 6.5, 'one of the best movies beacause it has a new concept and reality is shown like how people end up loving people they care about!\r\nthe line : truth in a relationship matters a alot ! \r\nand it shows that you have to be yourself ! \r\nsomepeople will find you so much attractive beacause you are being yourself! so worth watching,drama,funny and emotional a perfect combo of all the emotions ! i enjoyed every minute of this movie!\r\ni really felt bad about tap but its ok he will also a get a one !\r\nmust watch!', 'N'),
(12, 'Dune', 'Warner Bros', 'https://www.warnerbroscanada.com/movies/dune', '2021-10-22', 'TimothÃ©e Chalamet', 'Zendaya', 'no', '155', 'Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, must travel to the most dangerous planet in the universe to ensure the future of his family and his people. As malevolent forces explode into conflict over the planet\'s exclusive supply of the most.', 'scifi', 'fictional', 'Hans Zimmer', 'Denis Villeneuve', 8.2, 'Hands down the best thing going for Dune is the stunning visuals from beginning to end. Director Denis Villeneuve compiled a beautiful collection of scenes that are truly a sight to see. One thing youâ€™ll notice is how the cinematography seamlessly compliments so many elements in the film.  Dune is so masterfully shot, that you could watch this movie on mute and still be entertained.', 'N'),
(13, 'Eternals', 'Marvel Studios', 'https://www.marvel.com/movies', '2021-11-05', 'Kit Harington', 'Angelina Jolie', 'no', '157', 'The Eternals, a race of immortal beings with superhuman powers who have secretly lived on Earth for thousands of years, reunite to battle the evil Deviants.', 'action', 'fictional', ' Ramin Djawadi', ' ChloÃ© Zhao', 6.9, 'â€œEternalsâ€ is not your typical MCU film. Itâ€™s definitely something out of the Marvel norm. Darker and more mature, but without losing the lighter moments that maintain the Marvel magic.', 'N'),
(14, 'Last Night in Soho', 'Perfect World Pictures', 'http://www.pwpic.com/about/en_about.htm', '2021-10-29', 'Matt Smith', 'Anya Taylorâ€‘Joy', 'no', '116', 'An aspiring fashion designer is mysteriously able to enter the 1960s, where she encounters a dazzling wannabe singer. However, the glamour is not all it appears to be, and the dreams of the past start to crack and splinter into something far darker.', 'horror', 'fictional', 'Steven Price', 'Edgar Wright', 7.5, 'The best way to describe this film is that it is essentially a modern-day Hitchcock thriller.\r\nA slow burn, intimate story that suddenly descends into mind games and terror.\r\n\r\nFantastic costume design, crazy cool choreography that, combined with the killer groovy \'60s soundtrack, makes you want to get up and cut a rug Daddy O!', 'N'),
(15, 'Halloween Kills', 'Blumhouse Productions', 'https://www.blumhouse.com/', '2021-10-15', 'James Jude Courtney', 'Jamie Lee Curtis', 'no', '106', 'The nightmare isn\'t over as unstoppable killer Michael Myers escapes from Laurie Strode\'s trap to continue his ritual bloodbath. Injured and taken to the hospital, Laurie fights through the pain as she inspires residents of Haddonfield, Ill., to rise up against Myers. Taking matters into their own hands, the Strode women and other survivors form a vigilante mob to hunt down Michael and end his reign of terror once and for all.', 'horror', 'fictional', 'John Carpenter', 'David Gordon Green', 5.7, 'I will say this film did not disappoint me at all. Halloween Kills was worth the wait. I was excited to see the sequel movie last year but Covid put a stop to all that unfortunately. \r\n\r\nI really liked the vision that David Gordon Green and Danny Mcbride and John Carpenter brought to life to Bring Michael back to our screens once again. It tied in with the Original movie it portrayed the story very well and Michael Myer was electrifyingly sinister once again.', 'N'),
(16, 'Test', 'Test', 'https://www.example.com', '2021-10-01', 'Test', 'Test', 'no', '44', 'Test dfg f hdfhf', 'horror', 'fictional', 'Test', 'Test', 5.0, 'Test s fgdh dfh dfhdf hdf f', 'Y'),
(17, 'a', 'p', 'http://www.aaaaa.com', '2009-04-04', 'some male', 'some female', 'yes', '152', 'testing description', 'adventure', 'fictional', 'don\\\'t know', 'unknown', 8596585.0, 'this is a review', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

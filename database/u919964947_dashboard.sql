-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2021 at 05:28 PM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u919964947_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_image` text DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `token` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `content`, `category_id`, `user_id`, `image`, `alt_image`, `views`, `token`, `url`, `created_at`, `updated_at`, `status`) VALUES
(13, 'Tourism in Sweden', 'Tourism in Sweden', '<p>Sweden is one of the Scandinavian countries located in northern Europe. Sweden has land borders with Norway to the west, Finland to the northeast, sea borders with Denmark, Germany, and Poland to the south, and Estonia, Latvia, Lithuania, and Russia to the east.<br /><br />Sweden is the third-largest country in the European Union in terms of area (450,295 km2) and a population of about 10.0 million. Sweden has a low population density, with a rate of 21 people per square kilometer.<br />Stockholm, the capital of Sweden, is the largest city in the country (with a population of 1.3 million in the metropolitan area and 22 million in the metropolitan area).<br /><br /><br />The official language in Sweden is the Swedish language, which is one of the North Germanic languages. It is very similar to the Danish language and the Norwegian language, but the difference lies in the pronunciation and spelling.<br /><br /><strong>- Culture and history in Sweden:<br /></strong><br />Sweden has a rich musical tradition ranging from medieval folk tales to hip-hop. Pre-Christian Norse music has been lost in history, despite attempts to revive it through musical instruments being discovered at Viking sites. The instruments used were loris (a kind of trumpet), simple stringed instruments, wooden flutes, and drums. It is possible that the musical heritage of the Vikings has persisted in the ancient Swedish folk musical heritage.<br />Swedish cuisine, like other countries in Scandinavia (Denmark, Norway, and Finland) is traditionally simple. Fish (especially herring), meat, and potatoes play the role of the main ingredients. As for the spices, they were few. Popular dishes include Swedish meatballs, traditionally added to the broth with boiled potatoes in cranberry jam; Add pancakes, lotvesk, smorgasbord, or lavish buffet.<br /><br /><br /><strong>- Tourist areas in Sweden:<br /></strong><br /><strong>1- Kingdom of Crystal</strong><br />The Kingdom of Crystal is considered one of the most touristic places in Sweden, which receives a large percentage of tourists annually. The Kingdom of Crystal is located in Sm&aring;land forests, which have an area of ​​20 kilometers. The tourist places that can be visited in the Kingdom of Crystal are the glass workshops, which consist of 11 workshops that allow visitors to learn about the glass industry.<br /><br /><br /><strong>2- Lapland</strong><br />Lapland is one of the most wonderful tourist places in Sweden, in which visitors can enjoy the most beautiful times to enjoy nature and watch the mountains with high peaks that descend from the waters of the glaciers, which are a real pleasure for visitors, as well as pine forests and meadows in the northern part of Sweden, and there is in Lapland an ice hotel with a design Lovely who offers carriage outings to see the aurora borealis.<br /><br /><br /><strong>3- Gotland Island</strong><br />The island of Gotland is one of the most prominent tourist places in Sweden that tourists can visit all days of the year and includes the city of Visby, which is one of the most beautiful islands of great beauty and has been classified on the UNESCO World Heritage List as a unique historical environment, and it is an important destination for those wishing for calm and tranquility And stay away from the noise.<br /><br /><br /><strong>4- Dormancy</strong><br />The Skouna area is one of the most wonderful tourist places that allow the tourist a unique experience to do the various activities that are held on it, such as vacationing on the seashore, staying in a country house overlooking the lake, or visiting one of the cities in it.<br /><br /><br /><strong>5- Stockholm</strong><br />The Swedish capital, Stockholm, is one of the most wonderful places that can be visited, as it is one of the most beautiful capitals in the world, which was built on 14 islands connected to each other by 57 bridges, which made some call it the Venice of the North, Stockholm contains many international museums, tourist attractions and private shopping centers and is distinguished by its old buildings Its greenness and fresh air, as well as its presence near the water, distinguishes it.</p>', 16, 4, 'images/blogs/YhPtP6aWtjydfXX3kyb8FceOQ0zxvbpx1M0wRgSp.jpeg', 'sweden', 90, '60275d985c24e', '', '2021-02-13 05:03:20', '2021-02-13 05:03:20', 1),
(14, 'Tourism in Tanzania', 'Tourism in Tanzania', '<p>Tanzania is located in the east of the middle of the continent of Africa and shares its borders from the north with the State of Kenya and the State of Uganda, while from the south it shares its borders with the countries of Mozambique, Zambia, and Malawi, and it shares from the western side the borders with the Democratic Republic of the Congo and the states of Rwanda and Burundi, as for its borders Eastern stretches along the Indian Ocean.<br /><br />It is called the Republic of Tanzania, and the reason for calling it Tanzania is due to the joining of both Tanganyika and Zanzibar to form the Federal Republic of Tanganyika and Zanzibar in 1964 AD, its main coastal center, Dar es Salaam, remained the official capital of the country until 1996 AD, then Dodoma was chosen to be the official capital of the Republic, amounting to The area of ​​the republic is 945.203 km2 and its population is approximately 44 million.<br /><br /><strong>- Tourist places in Tanzania<br /><br />1. Zanzibar Island</strong><br /><br />Unguja, also known as the island of Zanzibar, is the main island in the Tanzania archipelago of Zanzibar. It is an old commercial center, with mosques and winding paths. There is also the former Sultan\'s Palace with the clock tower. The ancient fortress now houses a cultural center and stone amphitheater. The underground water channels feed hot water to the Persian hammam baths from the late nineteenth century.<br />In Drajani Market since the early 1900, locals have gathered to buy products, spices, and seafood. The Anglican Cathedral is located on the site of the ancient slave market. Just off Stone Town, Morongo and Pang Islands are famous for their coral reefs and diving sites. The waters surrounding the small island of Minimba, located off the northeastern coast of Unguja, also feature a diverse marine and flora marine life. Where dolphins swim off the beaches in the south. The Jozani Forest Reserve is home to red monkeys and other indigenous wildlife.<br /><br /><br /><strong>2. Arusha<br /></strong><br />Arusha is a city in eastern Africa Tanzania, located on the base of a volcanic mountain. It is known as a gateway to safari destinations and to Kilimanjaro, the highest peak in Africa located 100 km northeast.<br /><br />To the west lies Serengeti National Park, home to wildlife including lions, rhinoceroses, giraffes, leopards, and many other animals. It is characterized by annual migrations with large flocks of wildlife crossing its plains.<br />The park is home to many wild animals such as elephants, zebras, wild animals, and deer, many of which are attracted to underground currents during the dry season.<br /><br /><br /><strong>3. Ngorongoro Crater<br /></strong><br />Ngorongoro Crater is one of Africa\'s most popular sites and is said to have the highest wildlife density in Africa. The crater is sometimes described as the \"eighth wonder of the world\", and has achieved worldwide fame, attracting an increasing number of visitors each year. Since there is no other place in Africa to see wildlife like Ngorongoro!<br /><br />The \"Ngorongoro Crater\" is the largest volcanic basin in the world. It forms a stunning bowl of about 265 square kilometers, with sides up to 600 meters deep. It is home to about 30,000 animals. Large areas of cloud revolve around the rocky edge on most days of the year, and it is also one of the few places in Tanzania that can be cold at night.</p>', 16, 1, 'images/blogs/GaVzmCrIKdzlCewXlzJ9yl2tP6clPoxDDIR8Dscj.jpeg', 'Tanzania', 77, '60275f91dee87', 'Tourism_in_Tanzania', '2021-02-13 05:11:45', '2021-02-13 05:11:45', 1),
(15, 'Tourism in Norway', 'Tourism in Norway', '<p>Tourism guide in Norway. We review a detailed report on the most important tourist destinations and landmarks in Norway, the Scandinavian country with mountains, glaciers, and deep coastal fjords. The land with the most scenic landscapes in the world. Norway is also popular for fishing, hiking, and skiing.<br /><br />Norway is located in the continent of Europe, and its lands extend over an area of ​​304,282 square kilometers, in addition to its water area of ​​about 19,520 square kilometers, and it ranks No. 68 among the largest countries in the world in terms of area, with a total area of ​​about 323,802 square kilometers, and borders Norway The northern side is the Barents Sea, to the south is the Skagerak Strait, and to the west is the Norwegian Sea and the North Sea, and it connects land borders from the eastern side with Finland, Russia, and Sweden.<br /><br /><strong>- Tourist places in Norway:<br /></strong><br />The traveler can see a number of the most scenic landscapes in the world during his trip to Norway. Where the west coast of the south of the country and the coast of its north includes some charming and unique scenes globally. Norway\'s fjords have been rated by the National Geographic Society as the world\'s top tourist attraction.<br /><br /><strong>1. Oslo<br /></strong>The capital of Norway, located on the south coast of the country at the head of Oslofjord. It is famous for its green spaces and museums. Many are located on the Bygd&oslash;y Peninsula, including the Norwegian Maritime Museum and the Viking Ship Museum, with Viking ships from the ninth century. There is also Holmenkollbakken hill, which is a hiking and skiing hill with panoramic views of the fjord. It also has a ski museum.<br /><br /><strong>2. Bergen<br /></strong>It is a city located on the southwest coast of Norway. Surrounded by mountains and fjords. Bryggen features colorful wooden houses on the old pier and was once the center of the Hanseatic mercantile empire.<br /><br />About the Lillegeg&aring;rdsvannet park and lake, KODE art museums occupy many buildings and include works by Norwegian painters such as Edvard Munch and Johan Christian Dahl. The Bergen City Museum houses many heritage sites, including Old Bergen, a reconstructed townhouse with historic wooden houses. In the port area, the vibrant fish market also offers fruit, flowers, and crafts. Fantoft Stavkirke is a 12th-century wooden church reconstructed with distinctive sculptures and dragon heads.<br /><br /><strong>3. Tromso<br /></strong>It is a city in northern Norway, a major cultural hub over the Arctic Circle. It is famous as a viewing point for the colorful northern lights that illuminate the night sky at some point. The historic city center, on Troms&oslash; Island, is characterized by its centuries-old wooden houses. The skyline is dominated by the Arctic Cathedral in 1965, with its distinctive roof and raised glass windows.</p>', 16, 5, 'images/blogs/zhWG0xmecTqPLnfLcPFJDxLF3gmvIteXeM8S0BTt.jpeg', NULL, 45, '60275ff9d85bf', 'Tourism_in_Norway', '2021-02-13 05:13:29', '2021-02-13 05:13:29', 1),
(16, 'Latest fashion trends .. Designer produce colorful wedding dresses', 'Latest fashion trends .. Designer produce colorful wedding dresses', '<p>Every artist has a different story about how he became an artist, yet almost all artistic methods share one thing in design and will, and also moments of surrender, Taylor Ann Linko dreamed of becoming an artist since she was in elementary school when she started decorating and selling fruit baskets To her mother\'s friends, after many failed attempts, she finally succeeded a few months after her wedding with her gorgeous wedding dress.<br /><br /><br />Months before her wedding, Taylor Ann Linko decided that she would not wear a traditional white wedding dress and instead would paint it, went to a few clothing stores and found a beautiful dress, and began applying her art and talent to her, as the process was slow and it took almost a week before she committed By testing the dress.<br /><br />A week before her wedding, the dress was finished in the end and the result was beautiful, the dress reflects her colorful personality, and after months of her wedding, others began to appreciate her talent, so one day, her idea and pictures began to spread on Facebook and Instagram in a big way and her dress was shared on the first page of Great blog in the UK and people love it.<br /><br /><br />The artist revealed to Bored Panda, that she started the art of drawing wedding dresses when her dress spread, and said, \"I tried and thought about me how to combine my passion for art and color in my wedding.\"<br /><br /><br />Hundreds of people began asking her to paint their dresses and Linko agreed, then, she rented a studio and started a small business to paint wedding dresses, and most importantly, her dream of becoming a full-time artist finally came true, although the process was slow, she was certainly worth it.</p>', 15, 1, 'images/blogs/8SzNml3TMuGPdoAw6MwPKOzy2SjzNToOoUdjG1Ek.jpeg', NULL, 25, '60276072d7390', 'Latest_fashion_trends_.._Designer_produce_colorful_wedding_dresses', '2021-02-13 05:15:30', '2021-02-13 05:15:30', 1),
(17, 'Lady Gaga named Ambassador for Valentino', 'Lady Gaga named Ambassador for Valentino', '<p>The international superstar Lady Gaga was chosen as a source of inspiration and ambassador of the famous brand \"Valentino\" due to her role as a symbol of her generation, which is the news that has been shared by many artistic sites \"HOLA\".<br /><br />The website revealed that the official relationship between Lady Gaga and Valentino will be through the new fragrance \"Voce Viva,\" which is scheduled to be launched in September 2020.<br /><br />The official page of the famous social networking site \"Instagram\" revealed that the vibrant Lady Gaga is the propaganda face of \"Valentino Voce Viva\" for the new fragrance that welcomes the spirit of freedom and difference<br /><br />&ldquo;Lady Gaga represents freedom, self-awareness, and a pure heart, and her participation in this campaign increases the power of this project and pushes it to the highest level,&rdquo; said Lady Gaga Picioli, Creative Director of Valentino. The freedom and passion for art, self-awareness and equality is the same as the message of the Valentino community ... I am very proud to host it. \"<br /><br />Lady Gaga recently decided to postpone the series of her concert tour \"Chromatica\" to the summer of 2021, which surprised a large segment of Gaga fans and fans of all ages, as some expected that the concerts will take place at the end of the year, specifically after the end of the virus that threatens the world.<br /><br />The 34-year-old Lady Gaga revealed the dates of the Gaga concerts, which will be attended by a large number of her fans and lovers, the first of these concerts will be in Paris on July 25, and Gaga will perform another concert in London on July 30.<br /><br />As for Lady Gaga\'s concert in Boston, it is scheduled to be held on August 7, and the famous star will perform another concert in Toronto on August 16, in addition to a huge concert that will be performed by Gaga in New Jersey on August 19, and Lady Gaga will perform another concert on August 27 in Chicago.</p>', 2, 6, 'images/blogs/n8trba9qn5D09HbFZemqqW6yrgNt11YP6U28bJYY.jpeg', NULL, 76, '602760ec4ea3c', 'Lady_Gaga_named_Ambassador_for_Valentino', '2021-02-13 05:17:32', '2021-02-13 05:17:32', 1),
(18, 'John Wick returns with a fifth part before the fourth edition', 'John Wick returns with a fifth part before the fourth edition', '<p>The famous Lionsgate company gave the green light to the famous action series John Wick, starring Keanu Reeves, for completing it in a new fifth part, although filming the fourth part, scheduled for release in 2022, has not finished.<br /><br />The company that produced the John Wick series decided to shoot the fifth part after the completion of the fourth part filming next year. The fourth part will be presented on May 27, 2022, and the fifth part will be presented the following year.<br /><br />The famous series succeeded in achieving high revenues after the launch of the final third part, with total revenues of $ 584.2 million, which prompted the company to produce two new parts to complete the famous series.<br /><br />The production company is studying the launch of the television series that tells the story of the film and comes titled Starz John Wick The Continental after the completion of the fourth part, which will push to postpone the fifth part for another time.<br /><br />International star Keanu Reeves is currently filming the fourth part of the Matrix series for Warner Bros and Village Roadshow in Berlin, and the completion of filming of the fourth part of John Wick is scheduled for the end of this year.</p>', 2, 1, 'images/blogs/ssfqRCzsH86kFHAfPAeeNHHPtoLjEjDPLiMNMXoF.jpeg', NULL, 62, '6027617a19a47', 'John_Wick_returns_with_a_fifth_part_before_the_fourth_edition', '2021-02-13 05:19:54', '2021-02-13 05:19:54', 1),
(19, 'Italian-style Neapolitan pizza', 'Italian-style Neapolitan pizza', '<div>We promise you one thing on this topic: You will learn how to work an Italian Neapolitan pizza in your house. That\'s all. Here\'s the most important thing to consider in making this pizza look perfect!<br /><br /><strong>- First the ingredients :</strong><br />what really distinguishes Italian pizza is the flour used, and the reason why it is important to use a specific flour is that it is the most important factor in making pizza bread crunchy and porous. And the talk here is mainly about white flour known as &ldquo;00&rdquo; which is a degree of grinding in which The flour is very fine. If this flour is not available, flour No. 1 can be used, but it is very important to own the dough well.<br /><br /><strong>Salt</strong>, Italians put very large quantities of salt on the pizza and in fact unhealthy quantities (some of them put 30 grams of salt for less than a kilo of flour), but what we found was that it was sufficient to have about 3 grams of salt per half a kilo of flour.<br /><br /><strong>Yeast</strong>, in principle about one gram of yeast, can be added to every half kilo of flour. Oil is not essential, but a little of it can be added to the dough.<br /><br /><strong>Sugar</strong>, a little more can be added to aid in fermentation, but not necessary.<br /><br /><strong>Secondly, the sauce</strong>&nbsp;should prefer that the sauce be as little water as possible so that the pizza is not kneaded (i.e., so that the dough is not immature under the sauce in particular), and this can be done by heating the sauce well on low heat.<br /><br /><strong>Finally the oil,</strong>&nbsp;it is recommended to add a little olive oil over the pizza before putting it in the oven, and this gives it a delicious taste.<br /><br /><br />-&nbsp;<strong>Dough ingredients:</strong></div>\r\n<ul>\r\n<li>&nbsp;a kilo and a half of flour 00 or 1;</li>\r\n<li>&nbsp;900 milliliters of water;</li>\r\n<li>&nbsp;9 to 10 grams of salt;&nbsp;</li>\r\n<li>&nbsp;3 grams of yeast;</li>\r\n<li>&nbsp;1 tablespoon of olive oil (optional)</li>\r\n</ul>\r\n<div><br />-&nbsp;<strong>Kneading method:<br />First:</strong>&nbsp;In a large bowl, put water and melt salt in it. Then we add about a third of the flour to the water. Then we add the yeast and we may soak it with a little water. We can add a little oil. Stir the ingredients well.<br /><br /><strong>Second:</strong>&nbsp;Add the rest of the flour and move by hand or kneading well. After we have a bit sticky dough, we hold it well on the surface of the sink for 5 to 10 minutes (this is an important step).<br /><br /><strong>Third:</strong>&nbsp;Cover the dough with a nylon film or a cloth and let it ferment for two hours.<br /><br /><strong>Fourth:</strong>&nbsp;Half an hour before baking, cut the dough into pieces of 200 to 250 grams and cover with nylon or a half-hour cloth.<br /><br />-&nbsp;<strong>The method of slavery:</strong><br />We can decorate the dough with a rolling pin (a pineapple) and be satisfied with that. In the video below, we show how to roll the dough on the style of pizza chefs as follows:<br />- We press the dough ball with a fist well.<br />With the tips of the fingers, we extend the dough from the inside out, so that the fingers push the dough from its edges.<br />- We grab the tip of the dough and wrap it a little and the dough hangs in the air so that it softens as we make this move.<br /><br />Put the sauce For the sauce, put a portion of it, as much as two tablespoons, in the center and move the spoon or scoop in a circular motion until the sauce covers the dough.<br /><br /><strong>- Ingredients of the Margarita Pizza<br /></strong>Margarita is the simplest and most delicious form of pizza and is the most common pizza in Naples, the mother city of this pizza. Pizza chefs often put a little sauce and then fresh or dried mozzarella cheese followed by parmesan or grated Badana grana cheese, in addition to green basil leaf.<br /><br /><strong>- Baking method:<br /></strong>The main and important step to getting the perfect home-made pizza is baking. In short, the oven should be heated to the highest temperature available (often household ovens are less than 300 degrees Celsius). To obtain the best result, the heat source in the oven should be from above and below (usually electric ovens in this case). In this case, we can place the oven in the heat position from above and below (not in the grill position). If the oven is not electric, and the heat source is only from above, there are several alternatives, whose primary goal is to make sure that the pizza bread is heated and roasted from the bottom:<br /><br />1- A piece of marble: You can bring a clean piece of marble and put it at the bottom of the oven and leave the oven running for a while so that it warms the marble well and helps to roast pizza from the bottom (roasting the pizza from the bottom helps to fully mature it so that the pizza is not kneading). In this case, the pizza should be on marbles directly, not on a tray.<br /><br />2- Cast iron fried: The fry can be heated well and put the dough on it before applying the sauce. In this case, it is preferable to put a small amount of sauce, then put the rest of the ingredients and put the fried in the oven. It can be placed on top of a quiet gas fire at first until the pizza roasts a little below.<br /><br />3- An ordinary tray: the tray can be put on gas with medium heat, then put the pizza dough topped on it and put a little sauce, then the rest of the ingredients, and after it is leveled from the bottom, we transfer the pizza to the oven and bake it.<br /><br /><strong>- How to make the sauce:<br /></strong>In short, we come with a box of whole tomatoes and mash them by hand and add a little oil, garlic, and mashed basil. After boiling for a few minutes on medium heat, we add half a kilo of crushed tomatoes (found in some supermarkets, or you can puree the tomatoes at home using a strainer). Bring the mixture to a boil over medium heat for ten minutes, then reduce the heat to another for another ten minutes so that the tomatoes lose half or more of the water.</div>', 1, 4, 'images/blogs/1p9fZt6vtlMa6K6B0s2NRXVnTe045le74Gsj7sxU.jpeg', 'pizza', 47, '60276206c1d4a', 'Italian_style_Neapolitan_pizza', '2021-02-13 05:22:14', '2021-02-13 05:22:14', 1),
(20, 'A Muffins with bananas and cinnamon', 'A Muffins with bananas and cinnamon', '<div>From the beginning of its appearance in the United States at the end of the eighteenth century, muffins and cupcakes occupy a place in the hearts of candy lovers. A small cake is no longer exclusive to the Americans, and if they are one of its biggest lovers, you will find shops selling them scattered throughout their small and big cities. If a store is best known for its work, you find the long, regular lines at its doors, day and night.<br />&nbsp;<br />This recipe, in its simplicity, will make you change your mind about cupcake shops and restaurants, and it will make you proud of your abilities in your skill in making something with this master. The method is with bananas and cinnamon, but you can replace them with any other ingredients, such as chocolate, strawberry, etc.<br /><br /><br /><strong>- The Ingredients:<br /></strong></div>\r\n<ul>\r\n<li>115 grams of all-purpose flour.</li>\r\n<li>65 gm melted butter.</li>\r\n<li>75 grams of sugar.</li>\r\n<li>1 egg, beaten with a spoon.</li>\r\n<li>just over half a teaspoon of baking powder.</li>\r\n<li>A pinch of salt.</li>\r\n<li>Two well-squeezed medium bananas.</li>\r\n<li>Half a teaspoon of cinnamon powder.</li>\r\n<li>Half a teaspoon of vanilla extract.</li>\r\n</ul>\r\n<div><br /><br /><strong>- Steps:<br /></strong><br /><strong>First:&nbsp;</strong>Preheat the oven to 180 degrees. We prepare the tray of muffin and grease it with butter or put in it the paper cups of the artifact.<br /><br /><strong>Second:</strong>&nbsp;In a large bowl of food, put flour, sugar, baking powder, salt, and cinnamon.<br /><br /><strong>Third:</strong>&nbsp;In another bowl, mix mashed bananas, eggs, melted butter, and vanilla.<br /><br /><strong>Fourth:</strong>&nbsp;Add the moist ingredients (banana mixture) to the dry ingredients and mix them well until the dough is firm. Care must be taken not to overstate the mixture so that it does not become pastry.<br /><br /><strong>Fifth:&nbsp;</strong>We distribute the dough over the cups of the muffin so that we fill each cup in half or a little more.<br /><br /><strong>Sixth:</strong>&nbsp;We tell the tray in the preheated oven for 25 minutes.<br /><br /><strong>Seventh:</strong>&nbsp;After being completely flat, remove the tray from the oven and let it cool for five minutes, then remove the glasses of the muffin from it. Serve warm or at room temperature.</div>', 1, 1, 'images/blogs/wV4qEVo2SzyyQK28DH3gZfy0H2KFTARoFmlj1eOc.jpeg', 'muffins', 33, '6027628dd933c', 'A_Muffins_with_bananas_and_cinnamon', '2021-02-13 05:24:29', '2021-02-13 05:24:29', 1),
(21, 'Hamilton smashes Schumacher\'s record', 'Hamilton smashes Schumacher\'s record', '<p><strong>Britain\'s Lewis Hamilton, Mercedes driver, broke the legend, Michael Schumacher, by winning the Spanish Grand Prix, the sixth round of the F1 World Championship, on Sunday, by climbing to the podium for the 156th time against 155 for German driver history.</strong><br /><br /><br />Hamilton led Dutchman Max Verstappen (Red Bull) and his Finnish colleague Valtteri Bottas (Mercedes) to extend his lead in the World Championship standings to 37 points against Verstappen.<br /><br />Hamilton has 132 points against 95 for Verstappen and 89 for Potas.<br /><br />On the other hand, the Mexican Sergio Perez (Racing Bonnet), who missed the last two races after being infected with the Corona virus, finished fourth.<br /><br />The victory is the fourth this season in 6 races for Hamilton, who started from first place in today\'s race, and it is the 88th victory in his career that is only 3 victories away from the equalization of the record for German legend Michael Schumacher.<br /><br />The Brit seeks to equal Schumacher by winning his seventh world title this season.<br /><br />Hamilton got off to a good start to keep his first place while Verstappen managed to overtake Bottas, who slipped to fourth at the first corner.<br /><br />\"I felt good during the race,\" Hamilton said after the race. \"The team put in a lot of effort. I was a bit surprised after we ran into tires in the last race but it looks like we handled better this time.\"<br /><br />\"We have studied well the best strategy that can be adopted during the race, especially in terms of preserving the tires of the car as soon as possible,\" he added.<br /><br />The Austrian Mercedes manager Tutu Wolf praised him as saying, \"At the moment, Louis is out of tune.\"<br /><br />The Mercedes team suffered its first loss this season last week when Verstappen put an end to his control of the first four races (3 for Hamilton and one for Bottas), but he regained the lead in the Spanish race.<br /><br />As for Verstappen, he said, \"We could not have been better than this result (solutions, second). I did not have the speed of Lewis and it was very important for me to skip Bottas on launch and this is what happened.\"<br /><br />\"In the second part of the race, I was happy with my tires, and Bottas could not catch me, so I felt comfortable.\"<br /><br />\"We are always trying to improve the performance of the car, but Mercedes continues to work in this regard as well,\" he added.<br /><br />Bottas, who scored the fastest lap in the race, said only, \"I lost a place at the start of the race and it is difficult to overtake here.\"<br /><br />Hamilton managed to set a new record by ascending to the podium for the 156th time in his career in 256 races after he was sharing this record with Schumacher as well.<br /><br />Hamilton has already crossed two numbers for Schumacher as well: starting from the first position (92 versus 68), and from the first line (146 versus 116).<br /><br />As usual this season, Ferrari did not fulfill its hopes, as driver Charles Leclerc exited from Monaco shortly after the middle of the race due to his engine failure, while the other German driver Sebastian Vettel finished the race in seventh place.<br /><br />Drivers rest for a week before competing in the Belgian Grand Prix at Spa-Francorchamps on the current 30th, behind closed doors, as is the case for all races.</p>', 17, 5, 'images/blogs/wpMDo1LxlGndUuZevBZVMpeEGswqIhqKwdFec0DZ.jpeg', NULL, 0, '602763142933b', 'Hamilton_smashes_Schumacher\'s_record', '2021-02-13 05:26:44', '2021-02-13 05:26:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(5, 13, 4, '2021-02-13 05:03:20', '2021-02-13 05:03:20'),
(6, 14, 3, '2021-02-13 05:11:45', '2021-02-13 05:11:45'),
(7, 14, 4, '2021-02-13 05:11:45', '2021-02-13 05:11:45'),
(8, 15, 3, '2021-02-13 05:13:29', '2021-02-13 05:13:29'),
(9, 16, 1, '2021-02-13 05:15:30', '2021-02-13 05:15:30'),
(10, 17, 2, '2021-02-13 05:17:32', '2021-02-13 05:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `cardelements`
--

CREATE TABLE `cardelements` (
  `id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2020-12-21 23:01:01', '2020-12-21 23:01:01'),
(2, 'Art', '2020-12-21 23:36:00', '2020-12-22 00:05:18'),
(15, 'Fashion', '2021-02-11 18:05:02', '2021-02-12 02:08:23'),
(16, 'Travel', '2021-02-13 04:58:36', '2021-02-13 04:58:36'),
(17, 'Sport', '2021-02-13 04:58:44', '2021-02-13 04:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `clientType` text CHARACTER SET utf8 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `page` text CHARACTER SET utf8 NOT NULL,
  `section` text CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, '123 Street, Old Trafford, New South London , UK', '(+20) 33383949', 'info@sitename.com.eg', '2020-12-29 01:48:08', '2020-12-29 01:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `class_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `start_date`, `end_date`, `class_name`, `created_at`, `updated_at`) VALUES
(13, 1, 'Test', NULL, '2021-02-02', '2021-02-05', 'bg-purple', '2021-02-20 19:32:00', '2021-02-20 19:32:00'),
(14, 1, 'Test2', NULL, '2021-02-08', '2021-02-10', 'bg-success', '2021-02-20 19:32:21', '2021-02-20 19:32:30'),
(15, 1, 'Test3', NULL, '2021-02-17', '2021-02-20', 'bg-warning', '2021-02-20 19:32:45', '2021-02-20 19:32:45'),
(16, 1, 'Test4', NULL, '2021-02-21', '2021-02-23', 'bg-info', '2021-02-20 19:32:55', '2021-02-20 19:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'images/logo/7jVRtdg8XB99F8kjpihBDp79pjfm8WgsBGQyu9Ry.png', '2021-02-21 21:46:42', '2021-02-21 21:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `open` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `open`, `created_at`, `updated_at`) VALUES
(38, 'test', 'elkholuy@gmail.com', 'GET IN TOUCH', 'test', 1, '2020-12-29 21:43:06', '2021-01-27 02:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_12_17_160401_create_messages_table', 2),
(10, '2020_12_17_170218_create_subscribers_table', 3),
(11, '2020_12_17_220555_create_social_table', 4),
(12, '2020_12_18_191717_create_receiver_email_table', 5),
(13, '2020_12_19_010424_craete_logo_table', 6),
(15, '2020_12_16_195333_create_blogs_table', 7),
(16, '2020_12_19_233029_create_seo_table', 8),
(17, '2020_12_20_191702_create_visits_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(4, 1, 'test colors', '<ol>\r\n<li><span style=\"color: #e03e2d;\">Red.</span></li>\r\n<li><span style=\"color: #3598db;\">Blue.</span></li>\r\n<li><span style=\"color: #2dc26b;\">Green.</span></li>\r\n<li><span style=\"color: #f1c40f;\">Yellow.</span></li>\r\n</ol>', '2021-02-17 01:02:17', '2021-02-17 04:20:27'),
(6, 1, 'Test 5', '<ul>\r\n<li>Android</li>\r\n<li>IOS</li>\r\n<li>Flutter</li>\r\n</ul>', '2021-02-17 04:10:41', '2021-02-17 04:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `link`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'a298cc33-460a-11eb-9127-ac1f6ba4c446', '2020-12-24 19:07:06', '2020-12-24 19:07:06'),
(2, 'About', 'about', 'a298d8cb-460a-11eb-9127-ac1f6ba4c446', '2020-12-24 17:08:25', '2020-12-24 17:08:25'),
(4, 'Contact', 'contact', 'd122bd53-460a-11eb-9127-ac1f6ba4c446', '2020-12-24 17:09:43', '2020-12-24 17:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('elkholuy@gmail.com', '$2y$10$b09AqO/tuClYek8q2MLCvuEo1JQxw6qZn/OA6Q97UsDstZLplfTSq', '2020-12-29 23:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `token` text NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `checked` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'testy', '2021-02-21 20:28:44', '2021-02-21 20:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `alt` text DEFAULT NULL,
  `selected` tinyint(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_email`
--

CREATE TABLE `receiver_email` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiver_email`
--

INSERT INTO `receiver_email` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'info@gmail.com', '2020-12-21 14:08:52', '2020-12-21 14:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_token` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `page_token`, `title`, `description`, `keywords`, `canonical`, `image`, `created_at`, `updated_at`) VALUES
(4, '602738228c94f', 'test8', 'test7 d', 'test7 k', NULL, 'images/blogs/E52nguz5DAIT9Tm8H35FYAA94OW1NcjRP2fAFntr.jpeg', '2021-02-13 02:23:31', '2021-02-13 02:23:31'),
(5, '60275d985c24e', 'Tourism in Sweden', 'Tourism in Sweden', 'test', NULL, 'images/blogs/YhPtP6aWtjydfXX3kyb8FceOQ0zxvbpx1M0wRgSp.jpeg', '2021-02-13 05:03:20', '2021-02-13 05:03:20'),
(6, '60275f91dee87', 'Tourism in Tanzania', 'Tourism in Tanzania', 'test, test2', NULL, 'images/blogs/GaVzmCrIKdzlCewXlzJ9yl2tP6clPoxDDIR8Dscj.jpeg', '2021-02-13 05:11:45', '2021-02-13 05:11:45'),
(7, '60275ff9d85bf', 'Tourism in Norway', 'Tourism in Norway', 'test1,test2,test3', NULL, 'images/blogs/zhWG0xmecTqPLnfLcPFJDxLF3gmvIteXeM8S0BTt.jpeg', '2021-02-13 05:13:29', '2021-02-13 05:13:29'),
(8, '60276072d7390', 'Latest fashion trends .. Designer produce colorful wedding dresses', 'Latest fashion trends .. Designer produce colorful wedding dresses', 'test1, test2', NULL, 'images/blogs/8SzNml3TMuGPdoAw6MwPKOzy2SjzNToOoUdjG1Ek.jpeg', '2021-02-13 05:15:30', '2021-02-13 05:15:30'),
(9, '602760ec4ea3c', 'Lady Gaga named Ambassador for Valentino', 'Lady Gaga named Ambassador for Valentino', 'test1, test2', NULL, 'images/blogs/n8trba9qn5D09HbFZemqqW6yrgNt11YP6U28bJYY.jpeg', '2021-02-13 05:17:32', '2021-02-13 05:17:32'),
(10, '6027617a19a47', 'John Wick returns with a fifth part before the fourth edition', 'John Wick returns with a fifth part before the fourth edition', 'movies, john wick', NULL, 'images/blogs/ssfqRCzsH86kFHAfPAeeNHHPtoLjEjDPLiMNMXoF.jpeg', '2021-02-13 05:19:54', '2021-02-13 05:19:54'),
(11, '60276206c1d4a', 'Italian-style Neapolitan pizza', 'Italian-style Neapolitan pizza', 'pizza', NULL, 'images/blogs/1p9fZt6vtlMa6K6B0s2NRXVnTe045le74Gsj7sxU.jpeg', '2021-02-13 05:22:14', '2021-02-13 05:22:14'),
(12, '6027628dd933c', 'A Muffins with bananas and cinnamon', 'A Muffins with bananas and cinnamon', 'bananas, muffins', NULL, 'images/blogs/wV4qEVo2SzyyQK28DH3gZfy0H2KFTARoFmlj1eOc.jpeg', '2021-02-13 05:24:29', '2021-02-13 05:24:29'),
(13, '602763142933b', 'Hamilton smashes Schumacher\'s record', 'Hamilton smashes Schumacher\'s record', 'sport, cars,', NULL, 'images/blogs/wpMDo1LxlGndUuZevBZVMpeEGswqIhqKwdFec0DZ.jpeg', '2021-02-13 05:26:44', '2021-02-13 05:26:44'),
(14, '602fde31048d8', 'Test', 'test', 'test', NULL, 'images/blogs/u2xkat8ffI86aBG0MXVaHQ58UBKpVoVuionJuDzZ.jpeg', '2021-02-19 15:50:09', '2021-02-19 15:50:09'),
(15, '6030762f39642', 'Test', 'test', 'test', NULL, 'images/blogs/tW2YvTccrrDg791vfBtOuIsDvxbi5tys1aKcYdDm.jpeg', '2021-02-20 02:38:40', '2021-02-20 02:38:40'),
(16, '603076e8db199', 'Test', 'test', 'test', NULL, 'images/blogs/WNhtGMsu4cCvAjowwhbGUmvrcAWL1Iq3A2BpN3vM.jpeg', '2021-02-20 02:41:45', '2021-02-20 02:41:45'),
(17, '60307dbc5463e', 'test', 'test', 'test', NULL, 'images/blogs/aLXoh74LPCOaKFO5kXDiiE28qcwDJtfrxURMTFyM.jpeg', '2021-02-20 03:10:53', '2021-02-20 03:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platform` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `off` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `platform`, `link`, `off`, `created_at`, `updated_at`) VALUES
(1, 'Linkedin', 'https://www.linkedin.com/', 1, NULL, NULL),
(2, 'Instagram', 'https://www.instagram.com/', 0, NULL, NULL),
(3, 'Twitter', 'https://www.twitter.com/', 0, NULL, NULL),
(4, 'Facebook', 'https://www.facebook.com/', 1, NULL, NULL),
(5, 'Messenger', NULL, 0, NULL, NULL),
(6, 'Pinterest', 'https://www.pinterest.com/', 0, NULL, NULL),
(7, 'Youtube', 'https://www.youtube.com/', 0, NULL, NULL),
(8, 'Telegram', 'https://www.telegram.com/', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `subscriber_email`, `created_at`, `updated_at`) VALUES
(1, 'elkholuy@gmail.com', '2020-12-17 17:14:41', '2020-12-17 17:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', '2021-02-07 15:00:37', '2021-02-07 15:00:37'),
(2, 'Social', '2021-02-11 22:46:28', '2021-02-13 05:00:06'),
(3, 'Lifestyle', '2021-02-11 22:49:08', '2021-02-13 04:59:59'),
(4, 'Weekend', '2021-02-13 05:00:17', '2021-02-13 05:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `done` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `user_id`, `task`, `done`, `created_at`, `updated_at`) VALUES
(6, 1, 'test', 0, '2021-02-16 22:50:10', '2021-02-17 04:21:32'),
(7, 1, 'test2', 1, '2021-02-20 19:31:35', '2021-02-20 19:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `gender`, `avatar`, `role`, `enable`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$493ltZvyx9BQcv1WJgmQ7.zJdlsUst1xZjwqWvwZmLy1mUp5EjtJi', NULL, '2020-12-16 20:31:14', '2020-12-24 02:04:09', '01001617656', 'Male', 'admin_assets/img/theme/avatar.png', 'Admin', 1),
(4, 'Muzna', 'muzna@gmail.com', NULL, '$2y$10$iQJwwXJo2XBIRAlRsCe0turx9CQHG5c0kytvRTiWM7B6cinBVGTYW', NULL, '2020-12-25 08:43:13', '2021-02-07 18:47:57', '01274117815', 'Female', 'admin_assets/img/theme/avatar2.png', 'Admin', 1),
(5, 'Mohamed', 'mohamed@gmail.com', NULL, '$2y$10$493ltZvyx9BQcv1WJgmQ7.zJdlsUst1xZjwqWvwZmLy1mUp5EjtJi', NULL, '2020-12-16 20:31:14', '2020-12-24 02:04:09', '01001617656', 'Male', 'admin_assets/img/theme/avatar.png', 'Moderator', 1),
(6, 'Basma', 'basma@gmail.com', NULL, '$2y$10$iQJwwXJo2XBIRAlRsCe0turx9CQHG5c0kytvRTiWM7B6cinBVGTYW', NULL, '2020-12-25 08:43:13', '2021-02-07 18:47:57', '01274117815', 'Female', 'admin_assets/img/theme/avatar2.png', 'Moderator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `page_token` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `ip`, `page_token`, `views`, `created_at`, `updated_at`) VALUES
(72, '1', '60275d985c24e', 90, NULL, NULL),
(73, '2', '60275f91dee87', 77, NULL, NULL),
(74, '3', '60275ff9d85bf', 45, NULL, NULL),
(75, '4', '60276072d7390', 25, NULL, NULL),
(77, '1', '602760ec4ea3c', 76, NULL, NULL),
(78, '2', '6027617a19a47', 62, NULL, NULL),
(79, '3', '60276206c1d4a', 47, NULL, NULL),
(80, '4', '6027628dd933c', 33, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardelements`
--
ALTER TABLE `cardelements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver_email`
--
ALTER TABLE `receiver_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cardelements`
--
ALTER TABLE `cardelements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `receiver_email`
--
ALTER TABLE `receiver_email`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardelements`
--
ALTER TABLE `cardelements`
  ADD CONSTRAINT `cardelements_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

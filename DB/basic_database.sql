-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2014 at 12:24 dop.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `COLUMNS` int(11) NOT NULL,
  `PAGE_ID` int(11) NOT NULL,
  `MODIFIED` datetime NOT NULL,
  `DISPLAY_NAME` tinyint(4) NOT NULL DEFAULT '0',
  `GALERY` tinyint(4) NOT NULL DEFAULT '0',
  `WEIGHT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`ID`, `NAME`, `COLUMNS`, `PAGE_ID`, `MODIFIED`, `DISPLAY_NAME`, `GALERY`, `WEIGHT`) VALUES
(16, 'reklam méhek', 1, 23, '2013-03-31 19:21:18', 0, 0, 1),
(18, 'home', 2, 18, '2013-03-31 20:07:29', 0, 0, -3),
(19, '2013.III.20.', 2, 20, '2013-03-31 19:21:09', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TITLE` text CHARACTER SET ucs2 COLLATE ucs2_czech_ci NOT NULL,
  `TEXT` text CHARACTER SET utf8 COLLATE utf8_czech_ci,
  `FOOTER` text CHARACTER SET utf8 COLLATE utf8_czech_ci,
  `PAGE_ID` int(11) NOT NULL,
  `TYPE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `LANG_ID` varchar(2) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `MODIFIED` datetime DEFAULT NULL,
  `CREATED` datetime NOT NULL,
  `DISPLAY_TITLE` tinyint(4) NOT NULL DEFAULT '1',
  `WEIGHT` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `TITLE`, `TEXT`, `FOOTER`, `PAGE_ID`, `TYPE_ID`, `USER_ID`, `LANG_ID`, `MODIFIED`, `CREATED`, `DISPLAY_TITLE`, `WEIGHT`) VALUES
(7, 'Betekintés a méhészetünkbe ', 'Méhészetünket 2012 tavaszán alapítottuk Magyarország északnyugati részén. Fõ célkitûzésünk az volt, hogy magas színvonalon, jó minõségû méhészetet fejlesszünk ki, ami az év végéig sikerült is. Ennek alapja a jó szakmai ismeretek, gyakorlat és szorgalmas munka és ez az, ami összességében mindig meghozza a gyümölcsét. Jelenleg több mint 800 családdal sikeresen teleltünk be és várjuk az újév kezdetét, hogy újult erõvel nekilássunk e nemes munka folytatásának.<br />\r\n<br />\r\nA kaptár típusának kiválasztásakor a nagyvilágban jól bevált Langstroth méretet választottuk, figyelembe véve, hogy ez a típus nagyon jól megfelel a nagyipari méhészkedésre a rakodókaptáras rendszerével.<br />\r\nFontos volt számunkra, hogy méheink a jó tulajdonságokkal bíró krajnai méh (Apis Mellifica Carnica) családjába tartozzanak, amik a Kárpát medence területén õshonosak, nektár gyûjtésében kiválóak és jó szaporodási képességûek. Nagy hangsúlyt fektettünk a méhek egészségi állapotára, fõleg a méheket erõsen legyengítõ atkafertõzés idõben történõ kezelésére. Kezelésünk eredményeként az õszi utolsó kezelés idején, viszonylag elenyészõ volt a lehullott atkák száma, és ez jó eredménynek mondható ebben az évben, mikor sok panaszt hallhatunk a magas fertõzöttségekre. Nagy figyelmet fektetünk a méheket fenyegetõ egyéb betegségek megelõzésére, úgy mint a nosema megfékezésére, vagy a fiasítások rendszeres vizsgálatára.<br />\r\n<br />\r\nA jó méhész mindig úgy áll a méhek mellé, mintha a legkedvesebb házi kedvence lenne és együtt érez minden rezzenésével mintha a család tagja volna.<br />\r\n', NULL, 19, 9, 1, 'HU', '2013-01-11 16:27:59', '2013-01-11 16:27:59', 1, 0),
(8, 'Nahliadnutie do nášho vèelárstva', 'Naše vèelárstvo sme založili na zaèiatku roka 2012 na severozápadnej èasti Maïarska. Hlavným našim zámerom bolo, aby sme vytvorili vèelárstvo na vysokej úrovni a kvality, èo sa nám aj podarilo realizova do konca roka. Základom toho bola odborné znalosti, skúsenosti a svedomitá práca, ktoré prinášali svoje ovocie. V súèasnosti sme zazimovali s viac ako 800 rodinami a èakáme na zaèiatok nového roka, aby s novou silu mohli pokraèova v tej úžasnej práce.<br />\r\n<br />\r\nPri výbere typu ú¾ov sme sa spoliehali na celosvetovo osvedèené Langstroth rozmerov, nako¾ko tento typ ve¾mi dobre vyhovuje pre väèšie vèelárenie nadstavkovým spôsobom.<br />\r\nDôležité bolo pre nás, aby vèely boli z krajanskej (Apis Mellifica Carnica) línii, pre jeho výborné vlastnosti pri znášaní, dobré schopnosti rozmnožovania sa a nako¾ko sú v Karpatskej kotline dobre udomácnený. Dôraz sme dávali na zdravotný stav vèelstva, hlavne na zabránenie rozmnoženia klieštikov. Výsledkom vèasného ošetrenia bolo, že pri poslednom jesennom ošetrení bol už ve¾mi malý poèet popadaných klieštikov, a to v súèasnosti je úspech, nako¾ko v tomto roku boli hlásené znaèné rozšírenia tejto parazity. Zvláštnu pozornos venujeme aj ostatným ochoreniam ktoré zoslabujú vèelstvá, ako nosema a pravidelne kontrolujeme aj nový plod. <br />\r\n<br />\r\nDobrý vèelár keï príde k ú¾om, pristaví sa ako domácemu maznáèikovi a cíti sa s ním ako by bol èlenom ich rodiny.<br />\r\n', NULL, 19, 9, 1, 'SK', '2013-01-11 17:13:27', '2013-01-11 17:13:27', 1, 0),
(11, 'Méheket kínálunk', '2013 tavaszi átvétellel kínálunk méheket.<br />\r\n<br />\r\nLangstroth kereteken új, 2012 júniusi, anyával, erõs egészséges állományból.<br />\r\n<br />\r\nÁra :	<br />\r\n8 kereten, áprilisi átvétellel, 100 €,  családonként<br />\r\n6 kereten, áprilisi átvétellel, 80 €,  családonként<br />\r\n<br />\r\nKésõbbi idõpontokban az ár lehet alacsonyabb is, megegyezés szerint és ha még lesz kínálatban.<br />\r\n<br />\r\nÉrdemes idõben jelezni az igényt, mert a kínálat korlátozott számban van.<br />\r\nA minimális mennyiség 20 család, eladásonként.<br />\r\n', NULL, 21, 10, 1, 'HU', '2013-01-11 18:35:43', '2013-01-11 18:32:52', 1, 0),
(12, 'Ponúkame vèely', 'S odberom na jar 2013 ponúkame na predaj včely.<br />\r\n<br />\r\nNa Langstroth rámikoch s novými matkami, z júna 2012, zo zdravého a silného včelstva.<br />\r\n<br />\r\nCena:	<br />\r\nna 8 rámikoch, s odberom v apríli, za cenu 100€ za rodinu<br />\r\nna 6 rámikoch, s odberom v apríli, za cenu 80€ za rodinu<br />\r\n<br />\r\nV neskorších termínoch cena podľa dohody môže byť nižšia, za predpokladu, že ešte bude v ponuke.<br />\r\n<br />\r\nOdporúčame rezerváciu včas, nakoľko ponuka je obmedzená.<br />\r\nMinimálny odber je 20 rodín.<br />\r\n', NULL, 21, 10, 1, 'SK', '2013-03-31 19:24:08', '2013-01-11 18:36:45', 1, 0),
(13, 'Tekintse meg !', 'Méheket kínálunk 2013 tavaszi átvétellel.', '<a target=''_blank'' href=''http://www.sunlightapiary.eu/offers.php?lang=HU''>továbbiak a kínálat oldalon</a>', 23, 10, 1, 'HU', '2013-01-11 21:03:46', '2013-01-11 18:41:25', 1, 0),
(14, 'KONTAKT', '<a href="mailto:info@sunlightapiary.eu">info@sunlightapiary.eu</a>', 'mobil +421 905 400589', 22, 9, 1, 'HU', '2013-03-07 16:21:23', '2013-01-11 20:47:08', 1, 0),
(15, 'KONTAKT', '<a href="mailto:info@sunlightapiary.eu">info@sunlightapiary.eu</a>', 'mobil +421 905 400589', 22, 9, 1, 'SK', '2013-03-07 16:21:06', '2013-01-13 13:53:27', 1, 0),
(16, 'CONTACT', '<a href="mailto:info@sunlightapiary.eu">info@sunlightapiary.eu</a>', 'mobil +421 905 400589', 22, 9, 1, 'EN', '2013-03-07 16:20:38', '2013-01-13 13:54:07', 1, 0),
(17, 'KONTAKT', '<a href="mailto:info@sunlightapiary.eu">info@sunlightapiary.eu</a><br />\r\n', 'mobil +421 905 400589', 22, 9, 1, 'DE', '2013-03-07 16:19:45', '2013-01-13 13:54:50', 1, 0),
(18, 'DO POZORNOSTI !', 'Ponúkame na predaj vèely s odberom na jar 2013 ...', 'pozri v Našej ponuke', 23, 9, 1, 'SK', '2013-01-13 15:22:23', '2013-01-13 15:22:23', 1, 0),
(19, 'Üdvözöljük', 'Oldalunkon  méhészetünk bemutatásával foglakozunk, ismertetni szeretnénk tapasztalatainkat és szeretnénk, ha mások is csatlakoznának a méhészkedéshez.<br />\r\n<br />\r\nA méhészet régóta az emberiség egyik meghatározó tevékenysége, ami fejlõdésünk meghatározó pillére volt, ha ezt sokan nem is tudatosítják. Elég csak rámutatni arra a tényre, hogy a táplálékforrásaink bebiztosításánál mekkora jelentõséggel bír a méhek által történõ beporzás, ami a bõséges termések alapja nagyon sok növénynél. <br />\r\n<br />\r\nA méhészetben az ember megtalálhatja a természethez való kapcsolatát, és a környezete alakításának aktív résztvevõje lehet. <br />\r\nBátorítani és támogatni szeretnénk mindenkit, aki ezt a szép tevékenységet választja.<br />\r\n', NULL, 18, 9, 1, 'HU', '2013-01-21 20:52:05', '2013-01-21 20:29:17', 1, 0),
(21, 'Vítame Vás', 'Na tejto stránke by sme chceli  predstavi naše vèelárstvo, zdie¾a naše skúsenosti a inšpirova všetkých aby sa pripojili k vèeláreniu.<br />\r\n<br />\r\nVèelárenie je od pradávna jedným rozhodujúcim èinnosou ¾udstva, ktorá bola podstatným pilierom nášho vývoja, keï si to ani neuvedomujeme. Staèí len pozrie na skutoènos, že ope¾ovanie akým významným spôsobom ovplyvòuje zabezpeèenia potravín s zvýšením úrody u mnohých druhov rastlín.  <br />\r\n<br />\r\nVo vèelárení èlovek nájde blízky vzah k prírode a stane sa aktívnym èlánkom pri vytváraní okolia.<br />\r\n<br />\r\nChceme podpori každého, kto zvolí túto prácu a stane sa vèelárom, alebo chce rozšíri svoje vèelstva.<br />\r\n', NULL, 18, 9, 1, 'SK', '2013-01-23 16:12:52', '2013-01-23 16:09:56', 1, 0),
(22, 'BEES FOR SALE!', '<font size=''+1''>In the beginning of spring 2013 we are offering <b>BEES FOR SALE!</b></font><br />\r\n<br />\r\nOn Lanstroth frames new, from 2012 of June, including queen from strong, healthy staff.<br />\r\n<br />\r\nPrice list:<br />\r\n<br />\r\n<span style=''text-align:center;''><font size=''+2''>On 8 frames, takeover in April, 100 €/Colony</font></span><br />\r\n<span style=''text-align:center;''><font size=''+2''>On 6 frames, takeover in April, 80 €/Colony</font></span><br />\r\n<br />\r\n<em>In later terms the price can be lower, by arrangement if colonies will be still in offer.</em>', 'We are recommending to book the colonies in time! Our offer is limited.<br />Minimal amount is 20 colonies/sale.', 21, 9, 1, 'EN', '2013-02-10 11:40:49', '2013-02-10 11:40:49', 1, 0),
(23, 'BEES 4 SALE!', 'We are offering <font size=''+1''>bees for sale!</font>', '<font size=''+1''>Please <a target=''_blank'' href=''http://www.sunlightapiary.eu/offers.php?lang=EN''>take a look into our offers</a>!</font>', 23, 9, 1, 'EN', '2013-02-10 11:50:32', '2013-02-10 11:47:27', 1, 0),
(24, 'Take a look inside!', 'Our apiary was founded in spring 2012 on the north-western coast of Hungary. Our main goal was to create and develop a high quality apiary, in which we have succeed. This is based on good working knowledge, practice and hard work. We have successfully finished our last year with more than 800 bee-colonies, waiting the beginning of the next season to continue in this work with renewed energy.<br />\r\n<br />\r\nBy choosing the type of our beehives we have decided to use the well-known Langstroth size, keeping in mind that this type is well suited to industrial beekeeping with it''s packing system.<br />\r\n<br />\r\nIt was very important to us to choose our bees from the Apis Mellifica Carnica families, which are which are native in the Carpatian Basin, excellent in collecting of nectar and they have good reproductive abilities. We have put our focus on the health of our bees, especially to prevent the dangerous mite-infection. Thanks to our technique at our last treatment in the fall we have noticed just an insignificant amount of fallen mites, which is a good result in this year in which we heard lot of beekeepers complaining to the infection. We are also paying attention to prevent other harmful diseases, like nosema oftenly examine the egg layings.<br />\r\n<br />\r\nThe good beekeeper takes care of his or her bees like best pets in his or her house. We can say: each bee is the part of our family.', NULL, 19, 9, 1, 'EN', '2013-02-10 11:54:09', '2013-02-10 11:52:23', 1, 0),
(25, 'Wir begrüßen Sie', 'Auf dieser Seite möchten wir unsere Imkerei vorstellen, unsere Erfahrungen Ihnen mitzuteilen und alle zur Verbindung mit der Imkerei zu inspirieren.<br />\r\n<br />\r\nDie Imkerei ist seit geraumer Zeit eine der entscheidenden Tätigkeiten der Menschheit. Sie wurde der Grundpfeiler unserer Entwicklung, obwohl wir es nicht bewußt sind. Es genügt, sich  die Wirklichkeit anzusehen, dass die Bestäubung maßgeblich die Sicherung von Lebensmitteln mit der Erhöhung der Ernte bei einigen Pflanzenarten beeinflusst. <br />\r\n<br />\r\nBei der Imkerei findet man eine nahe Beziehung zur Natur und wird ein aktiver Teil bei der Bildung der Gegend.Wir wollen jeglichen unterstützen, der sich für diese Arbeit entscheidet, oder seine Imkereien erweitern will.<br />\r\n', NULL, 18, 9, 1, 'DE', '2013-02-23 11:13:50', '2013-02-19 20:07:23', 1, 0),
(26, 'Der Einblick in unsere Imkerei', 'Wir haben unsere Imkerei anfangs des Jahres 2012 im Nordwesten von Ungarn gegründet. Unsere Hauptansicht war, die Imkerei auf dem hohen Niveau und der Qualität zu bilden, was wir auch bis Ende des Jahres realisiert haben. Der Grund dafür waren die Fachkenntnisse, Erfahrungen und tüchtige Arbeit, die ihre Früchte getragen haben. In der Gegenwart haben wir mehr als 800 Bienenvölker eingewintert und warten auf den Beginn des neuen Jahres, um in dieser staunenswerten Arbeit fortsetzen zu können.<br />\r\n<br />\r\nBei der Auswahl des Typs der Bienenbeuten haben wir uns auf weltweit bewährte Maße Langstroth verlassen, inwiefern dieser Typ besonders für die größere Imkerei der Aufbauart geeignet ist.Es war uns wichtig, damit die Bienen aus der Linie Apis Mellifica Carnica stammen. Der Grund dafür sind gute Eigenschaften bei der Ablage,  gute Fähigkeit der Vermehrung und der Einbürgerung im Karpatental. Wir haben die Betonung auf den Gesundheitszustand des Bienenvolkes, besonders auf die Verhinderung der Reproduktion der Bienenmilben gelegt. Das Ergebnis der frühzeitigen Pflege war bei der letzten herbstlichen Pflege geringere Anzahl von fallenden Bienenmilben, was zur Zeit ein Erfolg wegen der Verbreitung dieses Parasites ist. Wir richten unsere Sonderaufmerksamkeit auf sonstige Erkrankungen, die eine Schwächung des Bienenvolkes wie Nosematose verursachen. Wir kontrolieren regelmäßig die Eier. <br />\r\n<br />\r\nEin guter Imker verhält sich zu seiner Bienenbeute wie zum einheimischen Hätschelkind und fühlt sich bei der wie ein Familienmitglied.<br />\r\n', NULL, 19, 9, 1, 'DE', '2013-02-23 11:13:08', '2013-02-19 20:10:46', 1, 0),
(27, 'Wir bieten die Bienen', '<font size=''+1''>Zum Verkauf: Mit der Abnahme im Frühling 2013<b>!!!</b></font><br />\r\n<br />\r\nLangstroth Rämchen, mit neuen Königen aus dem Juni 2012,  aus der gesunden und starken Imkerei.<br />\r\n<br />\r\nPreis:<br />\r\n<br />\r\n<span style=''text-align:center;''><font size=''+1''>100 Euro für ein Bienenvolk,  8 Rämchen, mit der Abnahme im April</font></span><br />\r\n<span style=''text-align:center;''><font size=''+1''> 80 Euro für ein Bienenvolk,  6 Rämchen, mit der Abnahme im April.</font></span><br />\r\n<br />\r\n<em>In den Spätterminen kann den Preis noch unter der Voraussetzung senken, dass die Bienenvölker noch im Angebot sind.Wir empfehlen eine frühzeitige Reservierung, inwiefern das Angebot beschränkt ist.</em><br />\r\n <br />\r\n<em>  Minimalabnahme: 20 Bienenvölker</em> <br />\r\n<br />\r\n', NULL, 21, 9, 1, 'DE', '2013-02-19 20:51:59', '2013-02-19 20:12:10', 1, 0),
(28, 'sehen Sie auch', 'Zum Verkauf: Mit der Abnahme im Frühling 2013.', '<font size=''+1''><a target=''_blank'' href=''http://www.sunlightapiary.eu/offers.php?lang=DE''>mehr info in Angebot', 23, 9, 1, 'DE', '2013-03-20 21:02:27', '2013-02-19 20:23:33', 1, 0),
(29, 'Welcome', 'In our sites we would like to introduce our apiary together with our experiences. Please, take our invitation to join us in beekeeping!<br />\r\n<br />\r\nAs we know from history, beekeeping is one of the major activities of mankind. We shouldn’t forget, that It was a main pillar in our evolution. The fact is that pollination done by millions and millions of bees ensure our needed nutrition day by day.  It’s the basis of plentiful crops provided by lot of plants and herbs.<br />\r\n<br />\r\nMoreover beekipng puts the connection between human and nature to the front. Using this knowledge we are able to actively form our natural environment.<br />\r\n<br />\r\nWe would like to encourage and support those,  who are decided to join our world of interests.', NULL, 18, 9, 1, 'EN', '2013-02-23 11:08:33', '2013-02-23 11:08:33', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_types`
--

CREATE TABLE IF NOT EXISTS `article_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `MODIFIED` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `article_types`
--

INSERT INTO `article_types` (`ID`, `NAME`, `MODIFIED`) VALUES
(9, 'MAIN', '2013-01-10 21:20:35'),
(10, 'kínál', '2013-01-11 18:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(256) COLLATE utf8_czech_ci DEFAULT NULL,
  `URL` varchar(512) COLLATE utf8_czech_ci NOT NULL,
  `ALBUM_ID` int(11) NOT NULL,
  `THUMB_URL` varchar(512) COLLATE utf8_czech_ci DEFAULT NULL,
  `CREATED` datetime NOT NULL,
  `MODIFIED` datetime NOT NULL,
  `DESCRIPTION` tinyint(4) NOT NULL DEFAULT '0',
  `WIDTH` int(11) NOT NULL,
  `HEIGHT` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `NAME`, `URL`, `ALBUM_ID`, `THUMB_URL`, `CREATED`, `MODIFIED`, `DESCRIPTION`, `WIDTH`, `HEIGHT`) VALUES
(33, 'bee', '[@server]/uploads/50fd9957c0860.jpg', 18, '[@server]/uploads/thumbs/thumb_50fd9957c0860.jpg', '2013-01-21 20:39:03', '2013-01-21 20:39:03', 0, 287, 220),
(35, 'bee3', '[@server]/uploads/50fd9ae15e3a7.jpg', 18, '[@server]/uploads/thumbs/thumb_50fd9ae15e3a7.jpg', '2013-01-21 20:45:37', '2013-01-21 20:45:37', 0, 500, 375),
(36, 'reklám', '[@server]/uploads/514a10f51485b.jpg', 16, '[@server]/uploads/thumbs/thumb_514a10f51485b.jpg', '2013-03-20 20:41:43', '2013-03-20 20:41:43', 0, 1024, 682),
(37, '2013mar1', '[@server]/uploads/514a129cbca2f.jpg', 19, '[@server]/uploads/thumbs/thumb_514a129cbca2f.jpg', '2013-03-20 20:48:46', '2013-03-20 20:48:46', 0, 1024, 682),
(38, '2013mar2', '[@server]/uploads/514a12eaf0377.jpg', 19, '[@server]/uploads/thumbs/thumb_514a12eaf0377.jpg', '2013-03-20 20:50:06', '2013-03-20 20:50:06', 0, 1024, 682),
(39, '2013mar3', '[@server]/uploads/514a133b008d1.jpg', 19, '[@server]/uploads/thumbs/thumb_514a133b008d1.jpg', '2013-03-20 20:51:26', '2013-03-20 20:51:26', 0, 1024, 682),
(40, '2013mar4', '[@server]/uploads/514a137e2645f.jpg', 19, '[@server]/uploads/thumbs/thumb_514a137e2645f.jpg', '2013-03-20 20:52:31', '2013-03-20 20:52:31', 0, 1024, 682),
(41, '2013mar5', '[@server]/uploads/514a13b2315ff.jpg', 19, '[@server]/uploads/thumbs/thumb_514a13b2315ff.jpg', '2013-03-20 20:53:26', '2013-03-20 20:53:26', 0, 1024, 682),
(42, '2013mar6', '[@server]/uploads/514a1484be719.jpg', 19, '[@server]/uploads/thumbs/thumb_514a1484be719.jpg', '2013-03-20 20:56:56', '2013-03-20 20:56:56', 0, 1024, 682);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `ID` varchar(2) COLLATE utf8_czech_ci NOT NULL,
  `NAME` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `MODIFIED` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`ID`, `NAME`, `MODIFIED`) VALUES
('DE', 'Deutch', '2013-01-08 19:22:40'),
('EN', 'English', '2013-01-08 19:22:47'),
('HU', 'Magyar', '2013-01-08 19:22:58'),
('SK', 'Slovenský', '2013-01-08 19:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `MODIFIED` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `NAME`, `MODIFIED`) VALUES
(18, 'index.php', '2013-01-10 21:16:23'),
(19, 'apiary.php', '2013-01-08 19:17:50'),
(20, 'galery.php', '2013-01-10 21:15:22'),
(21, 'offers.php', '2013-01-08 19:18:31'),
(22, 'contact.php', '2013-01-08 19:18:43'),
(23, 'advertisement.php', '2013-01-08 19:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `FAMILY_NAME` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `USER_NAME` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `CREATED` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `FAMILY_NAME`, `USER_NAME`, `EMAIL`, `PASSWORD`, `CREATED`) VALUES
(3, 'asdf', 'asdf', 'asdf', 'asdf', '*7F0C90A004C46C64A0EB9DDDCE5DE0DC437A635C', '2013-01-06 20:45:37'),
(4, NULL, NULL, 'konczi', NULL, '*D73280988E8F00272EEFD62CACCD66370A673AA2', '2013-01-08 19:14:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

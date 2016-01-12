-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 13:50
-- Version du serveur :  5.5.46-0+deb8u1-log
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbnasayarh`
--

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`login`, `mdp`, `role`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 13:44
-- Version du serveur :  5.5.46-0+deb8u1-log
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbnasayarh`
--

-- --------------------------------------------------------

--
-- Structure de la table `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `indexNews` int(11) NOT NULL,
  `titre` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `pathImage` varchar(2000) DEFAULT NULL,
  `resume` varchar(1000) NOT NULL,
  `contenu` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `News`
--

INSERT INTO `News` (`indexNews`, `titre`, `date`, `pathImage`, `resume`, `contenu`) VALUES
(1, 'Et ils vÃ©curent heureux Ã  tout jamais (Episode de NoÃ«l)', '2016-01-11 11:58:09', 'images/imageActualite/image1.jpg', 'Suite Ã  un malentendu, le Docteur croise la route de River Song qui sâ€™apprÃªte Ã  commettre lâ€™irrÃ©parable. Seulement, quand son plan tombe Ã  lâ€™eau et quâ€™elle se retrouve pourchassÃ©e par un dangereux robot, le Docteur va une fois de plus se jouer du temps et de lâ€™espace pour lui venir en aide.', 'Suite Ã  un malentendu, le Docteur croise la route de River Song qui sâ€™apprÃªte Ã  commettre lâ€™irrÃ©parable. Seulement, quand son plan tombe Ã  lâ€™eau et quâ€™elle se retrouve pourchassÃ©e par un dangereux robot, le Docteur va une fois de plus se jouer du temps et de lâ€™espace pour lui venir en aide.\r\n2015 aura Ã©tÃ© une trÃ¨s bonne annÃ©e pour Doctor Who qui a dÃ©livrÃ© lâ€™une de ses saisons les plus solides depuis un moment et qui, avec The Husbands of River Song, clÃ´t lâ€™aventure sur une note positive. Si lâ€™Ã©pisode de NoÃ«l nâ€™est trÃ¨s certainement pas le meilleur ayant Ã©tÃ© fait jusquâ€™Ã  prÃ©sent, il est certain quâ€™il est lâ€™un de ceux dont il ne sera pas difficile de se rappeler, en particulier parce quâ€™il marque le grand retour de River Song, figure emblÃ©matique du show quâ€™on pensait ne jamais revoir.\r\nIl est dâ€™ailleurs Ã©tonnant que les diffÃ©rentes bandes-annonces nâ€™aient pas essayÃ©s de garder secrÃ¨te la prÃ©sence dâ€™Alex Kingston pour lâ€™Ã©pisode Ã©vÃ©nement de lâ€™annÃ©e, bien quâ€™il soit comprÃ©hensible, au vu de son temps dâ€™Ã©cran, quâ€™il fut difficile de faire autrement. Bien sÃ»r, cela ne gÃ¢che en rien le plaisir de la retrouver pour une nouvelle aventure et dâ€™autant plus face Ã  Peter Capaldi qui semble se dÃ©lecter de chaque instant devant la camÃ©ra, au point que Ã§a bonne humeur en devienne rapidement communicative.\r\nIl faut dire que, dÃ¨s le dÃ©part, The Husbands of River Song est placÃ© sous le signe de cet humour absurde propre Ã  lâ€™univers du show et le fait majoritairement bien. Les diffÃ©rents Ã©changes entre Peter Capaldi et Alex Kingston font mouche et sont aidÃ©s par une alchimie entre les deux acteurs qui ne perd pas de temps avant de devenir Ã©vidente. Ce qui est dâ€™autant plus soulignÃ© par les prestations de Matt Lucas et Greg Davies dont les brefs parasitages viennent ajouter une couche comique non nÃ©gligeable et dÃ©finitivement apprÃ©ciable. Le seul bÃ©mol est que, pour la premiÃ¨re fois, la musique de Murray Gold alourdit les deux tiers du rÃ©cit par son insistance sur ce qui est censÃ© Ãªtre drÃ´le. La volontÃ© dâ€™ajouter des signaux musicaux nâ€™est en rien reprochable, mais leur profusion force parfois Ã  sortir du rÃ©cit, ce qui est dommage.\r\nCe qui nâ€™est pourtant pas le cas dans le dernier quart dâ€™heure de The Husbands of River Song qui fait un tour de force narratif en changeant complÃ¨tement de ton. Cela nâ€™est pas totalement surprenant de la part de Steven Moffat, mais avec une premiÃ¨re partie extravagante qui ne recule devant rien pour faire rire, la conclusion apparaÃ®t comme le rÃ©el diamant brut de lâ€™Ã©pisode et comme lâ€™un des points les plus Ã©motionnellement chargÃ©s, malgrÃ© le peu de temps qui lui est imparti.\r\nEn soit, The Husbands of River Song est un Ã©pisode de NoÃ«l un peu Ã©trange qui sâ€™Ã©loigne sans conteste de la thÃ©matique festive pour dÃ©livrer du pur divertissement et, surtout, pour mettre en avant ses deux tÃªtes dâ€™affiche. Le tout est que lâ€™ensemble remplit sans problÃ¨me les objectifs quâ€™il sâ€™est fixÃ©s, en nâ€™Ã©tant ni trop ambitieux ou alambiquÃ©. Peut-Ãªtre est-ce la nostalgie de revoir River Song qui aide Ã  passer outre les dÃ©fauts, ou peut-Ãªtre seulement ces brefs moments attentionnÃ©s de la part du Docteur, devenus si prÃ©cieux Ã  cause de sa froideur habituelle, mais ce dernier Ã©pisode de Docteur Who de lâ€™annÃ©e marque dÃ©finitivement par la simplicitÃ© de son intrigue et par sa conclusion douce et amÃ¨re.'),
(2, 'Doctor Who saison 9 : Steven Moffat parle de la saison 10 et du problÃ¨me de la saison 9 !', '2016-01-11 11:59:59', 'images/imageActualite/image2.jpg', 'Doctor Who a encore de beaux jours devant elle sur la BBC et Steven Moffat en a profitÃ© pour parler de lâ€™avenir de la sÃ©rie.', 'Doctor Who a encore de beaux jours devant elle sur la BBC et Steven Moffat en a profitÃ© pour parler de lâ€™avenir de la sÃ©rie.\r\nPas touche Ã  ma saison ! Dans une interview accordÃ©e Ã  RadioTimes, le showrunner de Doctor Who Steven Moffat a confirmÃ© que la saison 10 de la sÃ©rie serait comme les deux prÃ©cÃ©dentes, Ã  savoir : une saison de 12 Ã©pisodes et un Ã©pisode de NoÃ«l. Si certains journaux avancaient lâ€™idÃ©e que la saison serait dÃ©coupÃ© en 2, diffusÃ©e Ã  des mois dâ€™Ã©cart pour permettre Ã  Peter Capaldi de tourner autre chose, Moffat a dÃ©menti et enterrÃ© la rumeur : Â« câ€™est nâ€™importe quoi. Il nâ€™y aura pas de saison raccourcie Â» a-t-il dÃ©clarÃ©. Ce commentaire a Ã©tÃ© appuyÃ© par lâ€™interprÃ¨te du Docteur, Peter Capaldi himself. Â« Ce nâ€™est pas ce pourquoi jâ€™ai Ã©tÃ© employÃ© Â» a-t-il commentÃ© en parlant des demies saisons. Nous voilÃ  donc rassurÃ©s. Pour lâ€™instant, le seul vÃ©ritable souci câ€™est que la diffusion sÃ©rie devrait sÃ»rement commencer un plus tard que septembre car aucune annonce de tournage nâ€™a encore Ã©tÃ© faite contrairement aux annÃ©es prÃ©cÃ©dentes.\r\nCette saison connaÃ®t quelques problÃ¨mes en termes dâ€™audience, sÃ»rement en partie Ã  cause des lunettes et d&#39;un tournevis, et Peter Capaldi et Steven Moffat ont trouvÃ© le coupable. Si les Anglais regardent moins Doctor Who cette annÃ©e, câ€™est la faute de lâ€™horaire. Pour le showrunner comme pour lâ€™acteur, la sÃ©rie dÃ©bute trop tard dans la soirÃ©e, vers 20h25 cette annÃ©e et Ã§a lui joue des tours. Â« Je connais des familles qui adorent Doctor Who et qui veulent le regarder ensemble. Mais voilÃ , aprÃ¨s 20h15, câ€™est plus un horaire adaptÃ© pour les adultes que pour toute la famille, qui est clairement la cible. DÃ©buter Ã  cette heure tardive ne nous aide pas Â», a affirmÃ© Peter Capaldi. Un sentiment que partage Steven Moffat, qui se rassure avec les audiences consolidÃ©es (sur les players) de chaque Ã©pisode. Bref, mÃªme si cette saison anniversaire des 10 ans de Doctor Who est lâ€™une des meilleures de lâ€™Ã¨re Moffat, elle connaÃ®t quelques remous que lâ€™on espÃ¨re voir disparaÃ®tre avec la saison 10 ! Combien de temps pensez-vous que la sÃ©rie peut continuer ?'),
(3, 'Doctor Who saison 9 : Peter Capaldi ne veut pas d&#39;un compagnon', '2016-01-11 12:01:06', 'images/imageActualite/image3.jpg', 'Alors que le monde whovian attend le nom du prochain compagnon ou prochaine compagne du Docteur, Peter Capaldi, lui, nâ€™a pas envie dâ€™avoir un compagnon !', 'Â« Goodbye Doctor Â» Les derniers mots de Clara auraient pu Ãªtre ceux de Jenna Coleman et ils lâ€™ont sÃ»rement Ã©tÃ© dâ€™ailleurs ! Mais voilÃ , maitenant nous avons tous le regard tournÃ© vers la saison 10 et les fans de Doctor Who, comme Peter Capaldi, nous sommes impatients de dÃ©couvrir le nom et le visage du nouvel habitant du Tardis. Pour l&#39;instant le rÃ´le du compagnon du Docteur n&#39;a pas Ã©tÃ© castÃ©. Sera-t-il un homme ? Une femme ? La tradition voudrait que cela soit encore une jeune femme comme Rose, Martha, Donna, Amy et Clara. Mais ne serait-il pas tant de changer un peu, dâ€™offrir une petite rÃ©volution Ã  Doctor Who ? Et si un homme voyageait avec Peter Capaldi ? Nous, nous apprÃ©cierions, Peter moins. Â« Je ne veux pas dâ€™un compagnon, a dÃ©clarÃ© Capaldi Ã  RadioTimes, jâ€™ai peur que sâ€™ils me donnent un compagnon il aura tout lâ€™action et moi, je serai lÃ , statique, Ã  dÃ©biter du charabia scientifiqueâ€¦ Genre Â« Oh Peter nâ€™est pas capable de chasser les Zygons dans le couloir, laissons Ã§a au nouveau Â». Ã‡a serait affreux. Je veux courir aprÃ¨s les Zygons, moi ! Â». Sinon Peter a une idÃ©e de comment devrait Ãªtre sa nouvelle compagne donc. Â« Je pense que Ã§a serait bien que cela soit quelquâ€™un de lÃ©ger et fun. Le Docteur peut Ãªtre trÃ¨s sombre des fois donc il a besoin de quelquâ€™un qui peut contrecarrer Ã§a. Il faut aussi quelquâ€™un qui peut courir, crier et Ãªtre glamour ! Â»\r\nCette remarque arrive Ã  un moment crucial pour la sÃ©rie, elle dont chaque changement de casting pose la question de changement de sexe des personnages. Certains se demandent quand un Docteur deviendra une femme. Alex Kingston, la fameuse River Song, que nous retrouverons dans lâ€™Ã©pisode de NoÃ«l intitulÃ© Â« The Husbands of River Song Â», a pris position rÃ©cemment sur le sujet : Â« Je ne peux pas imaginer le Docteur Ãªtre une femme. Je pense quâ€™il y a trop eu de Docteurs interprÃ©tÃ©s par des hommes. Historiquement, Doctor Who est une sÃ©rie pour les petits garÃ§ons. Les femmes vont me dÃ©tester pour Ã§a. Mais je pense vraiment que le Docteur doit Ãªtre un homme. Cependant, Ã§a serait trÃ¨s intÃ©ressant pour River que cela soit une femme ! Â» Sur cette derniÃ¨re remarque, nous ne pouvons quâ€™Ãªtre dâ€™accord avec Alex Kingston dont il nous tarde de la voir revenir dans Doctor Who ! ÃŠtes-vous surpris par la position de Peter Capaldi ?');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `News`
--
ALTER TABLE `News`
 ADD PRIMARY KEY (`indexNews`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 13:50
-- Version du serveur :  5.5.46-0+deb8u1-log
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbnasayarh`
--

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE IF NOT EXISTS `Commentaire` (
  `indexCom` int(11) NOT NULL,
  `indexNews` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Commentaire`
--

INSERT INTO `Commentaire` (`indexCom`, `indexNews`, `pseudo`, `contenu`, `date`) VALUES
(1, 1, 'kevin79', 'FIRST', '2016-01-11 11:58:47'),
(2, 1, 'pw9476', 'Un Ã©pisode de NoÃ«l avec ses dÃ©fauts et ses incohÃ©rences, mais le tout est largement gommÃ© par un duo trÃ¨s drÃ´le et Ã©mouvant (la fin est juste magique !).\r\n', '2016-01-11 11:58:57'),
(3, 1, 'Sha', '&#34;Bon Ã©pisode et joli cadeau de NoÃ«l que de nous offrir River Song en duo avec le Docteur pour un rendez-vous impromptu, nÃ©anmoins attendu et entendu depuis si longtemps. La boucle est bouclÃ©e et pourtant qui sait... Bonne fÃªte de fin d&#39;annÃ©es et profitez bien de l&#39;Ã©pisode, certaines rÃ©pliques sont de petites perles.', '2016-01-11 11:59:08'),
(1, 2, 'nono452', 'normalement doctor who sarrete dÃ©finitivement en 2020 donc il doi y avoir encore 5 saison', '2016-01-11 12:00:09'),
(2, 2, 'Louptin', 'Nono, Citation de Moffat. â€Cela sera un minimum de 15 ans, mais Ã§a peut aussi Ãªtre 26 ansâ€&#39; En autre, la sÃ©rie peux durer encore un bon moment mais pour l&#39;instant c&#39;est sur qu&#39;elle va durÃ© jusqu&#39;en 2020, mais elle peux trÃ¨s bien continuÃ© aprÃ¨s et il y a des chances qu&#39;aprÃ¨s la saison 10, Cappaldi sera peut Ãªtre remplacÃ©. En tout cas, je me demande qui prendra la place de Clara.', '2016-01-11 12:00:22'),
(3, 2, 'nono450', 'ok', '2016-01-11 12:00:30'),
(3, 3, 'Genovese', 'Tg', '2016-01-11 12:01:36'),
(1, 3, 'Genovese1', ' Elle a raison, le docteur doit Ãªtre un homme point final ', '2016-01-11 12:01:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 13:50
-- Version du serveur :  5.5.46-0+deb8u1-log
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbnasayarh`
--

-- --------------------------------------------------------

--
-- Structure de la table `Personnage`
--

CREATE TABLE IF NOT EXISTS `Personnage` (
  `indexPerso` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `planeteOrigine` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `imagePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Personnage`
--

INSERT INTO `Personnage` (`indexPerso`, `nom`, `age`, `planeteOrigine`, `description`, `imagePath`) VALUES
(1, 'Amelia Pond, aussi appelÃ©e Amy Williams', '23 ans lors de sa premiÃ¨re aventure', 'Terre', 'Amelia Amy Jessica Pond, plus tard appelÃ©e Amy Williams Ã©tait une jeune femme Ã©cossaise qui fut la premiÃ¨re compagne du OnziÃ¨me Docteur. Elle rencontra celui-ci Ã  l&#39;Ã¢ge de 7 ans, et le rejoignit dans ses aventures 16 ans plus tard. \r\nElle fut la petite amie puis l&#39;Ã©pouse de Rory Williams et la mÃ¨re de Melody Pond, qui fut capturÃ©e Ã  sa naissance, laissant Amy dÃ©sespÃ©rÃ©e. Elle fut plus tard dÃ©crite comme ayant la fÃ©rocitÃ© et la tristesse d&#39;une mÃ¨re dans ses yeux. \r\nAmy mourut Ã  l&#39;Ã¢ge de 87 ans, ayant Ã©tÃ© envoyÃ©e dans le passÃ© par un Ange Pleureur pour retrouver son mari avec qui elle put passer le restant de sa vie. Ils furent tous les deux enterrÃ©s Ã  New York.', 'images/imagePersonnage/image1.jpg'),
(2, 'Rose Tyler', '19 ans lors de sa premiÃ¨re aventure', 'Terre', 'Rose Tyler fut la premiÃ¨re compagne des NeuviÃ¨me et DixiÃ¨me Docteur. Initialement vendeuse dans un magasin de Londres, elle rencontra le Docteur Ã  l&#39;occasion d&#39;une invasion orchestrÃ©e par la Conscience Nestene.\r\nAprÃ¨s de nombreuses aventures avec le Docteur, Rose est transportÃ©e dans un monde parallÃ¨le oÃ¹ son pÃ¨re est encore vivant. Elle reste alors sÃ©parÃ©e du Docteur pendant de nombreuses annÃ©es. Ils se retrouvent lorque les Daleks tentent de dÃ©truire la rÃ©alitÃ© et cassent les murs entre les mondes parallÃ¨les.\r\nRose restera pendant toute la bataille aux cÃ´tÃ©s du Docteur, tentant de le soutenir moralement. Cependant, un autre Docteur sera crÃ©Ã©, Ã  partir de la main du Docteur et de Donna Noble. Un Docteur plus belliqueux qui sauvera le Tardis et Donna et qui, au bout du compte, dÃ©truira les Daleks.\r\nUn Docteur nÃ© dans une bataille. Un Docteur Ã  moitiÃ© humain, qui n&#39;a qu&#39;un seul coeur et qu&#39;une seule vie. Le vrai Docteur sait tout cela. Il sait que Rose vieillira et mourra, tout comme son double. Alors, aprÃ¨s la victoire contre Davros, ils font une halte dans l&#39;autre monde, Ã  la baie du MÃ©chant Loup, et le Docteur dÃ©cide d&#39;y laisser Rose avec le Docteur mortel.', 'images/imagePersonnage/image2.jpg'),
(3, 'Rory Williams', '24 ans lors de sa premiÃ¨re aventure', 'Terre', 'Rory Williams Ã©tait le mari de Amy Pond. Il devint un compagnon du OnziÃ¨me Docteur la veille de leur mariage, mais mourrut et fut effacÃ© de l&#39;histoire aprÃ¨s avoir Ã©tÃ© absorbÃ© par une fissure. Peu avant que la Pandorica ne soit ouverte, Rory rÃ©apparut, transformÃ© en rÃ©plique Auton. Lorsque les Ã©toiles s&#39;Ã©teignirent suite Ã  l&#39;explosion du TARDIS, il attendit patiemment prÃ¨s de la boÃ®te qu&#39;Amy en sorte pendant 1894 ans et revint enfin Ã  la normale aprÃ¨s le Big Bang 2. Il se maria avec Amy et ils reprirent leurs voyages avec le Docteur.\r\nPeu aprÃ¨s, Amy mit au monde une fille, Melody. Mais celle-ci fut capturÃ©e par le Silence pour en faire une arme contre le Docteur, et devint River Song.\r\nEn 2012, Rory fut renvoyÃ© dans le passÃ© par un Ange Pleureur, trÃ¨s vite suivit par sa femme. Il mourrut Ã  l&#39;Ã¢ge de 82 ans.', 'images/imagePersonnage/image3.jpg'),
(4, 'Le MaÃ®tre, aussi appelÃ© Missy', 'On ne le compte plus', 'Gallifrey', 'Le MaÃ®tre Ã©tait un Seigneur du Temps renÃ©gat et l&#39;ennemi jurÃ© du Docteur.\r\nBien qu&#39;ils aient Ã©tÃ© Ã  l&#39;origine des amis d&#39;enfance, l&#39;un des buts du MaÃ®tre Ã©tait de dÃ©truire le Docteur ainsi que de contrÃ´ler le monde par n&#39;importe quel moyen.\r\nLe MaÃ®tre revient dans l&#39;Ã©pisode La NÃ©crosphÃ¨re, cette fois-ci sous les traits de Missy. Elle dÃ©signe le Docteur comme son petit-ami, ou simplement son ami. Elle l&#39;embrasse langoureusement alors qu&#39;il ignore qu&#39;elle est le MaÃ®tre et est la seule Ã  se souvenir de son anniversaire.\r\nMissy est un personnage assez ambigu, qui est Ã  cheval entre la sÃ©duction et le machiavÃ©lisme. De la mÃªme faÃ§on que dans sa prÃ©cÃ©dente incarnation, le MaÃ®tre de Michelle Gomez prend un malin plaisir Ã  faire du sarcasme ou de l&#39;humour noir.', 'images/imagePersonnage/image4.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Personnage`
--
ALTER TABLE `Personnage`
 ADD PRIMARY KEY (`indexPerso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Octobre 2017 à 15:33
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `biographie`
--

CREATE TABLE `biographie` (
  `BioId` int(11) NOT NULL COMMENT 'Biographie Id',
  `FirstName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'FirstName of teaher',
  `LastName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'LasntName of teacher',
  `BioUser` int(11) NOT NULL COMMENT 'Teacher Boigraphie',
  `AboutMe` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'About Me',
  `Skills` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Skills',
  `Biographie` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Biographie ',
  `Adresse` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Adresse',
  `Web` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Site Web',
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Emal',
  `Facebook` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Facebook',
  `LinkedIn` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Linked In',
  `Youtube` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Youtube',
  `Twitter` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Twitter',
  `Phone` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Phone',
  `Image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Image of Teacher',
  `Public` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Allow view'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `biographie`
--

INSERT INTO `biographie` (`BioId`, `FirstName`, `LastName`, `BioUser`, `AboutMe`, `Skills`, `Biographie`, `Adresse`, `Web`, `Email`, `Facebook`, `LinkedIn`, `Youtube`, `Twitter`, `Phone`, `Image`, `Public`) VALUES
(2, 'Abdellatif', 'RAHMOUN', 19, 'Abdlatif RAHMOUN associate professor .                                                    ', '     - Equipe de recherche :\r\n Directeur, Computational Intelligence and Soft Computing .                                                                                                                                        \r\n     - Enseignement : \r\n -Ar', '- Equipe de recherche :\r\n       - CISCO                                                                                                                           \r\n                                                                                           ', 'Sidi Bel abbes', '', 'a.rahmoun@esi-sba.dz', '', '', '', '', '', 'images/RAhmoun_130_130.jpg', 1),
(5, 'Mimoune', 'MALKI', 42, 'Malki Mimoune professeur de l\'ecole superieur d\'informatique .\r\n', '\r\n    + E-mail : m.malki@esi-sba.dz\r\n    + Grade : Professeur .\r\n    + Domaine : Informatique .\r\n    + Equipe de Recherche : ISEWD .\r\n', 'Structure de ratachement :\r\n - Ecole Supèrieur en Informatique de Sidi Bel Abbès .\r\nEquipe de recherche : Directeur,  Information Systems .       ', 'Sidi Bel abbes', '', 'm.malki@esi-sba.dz', '', '', '', '', '', 'images/malki3030.png', 1),
(6, 'Badia', 'KELOUCHE', 71, 'KELOUCHE Badia professeur de l\'ecole superieur d\'informatique .', '+ E-mail: b.klouche@esi-sba.dz\r\n+ Grade: MAB\r\n+ Domaine: Informatique\r\n+ Equipe de Recherche: SOC', '    Structure de ratachement:\r\n ESI SBA - Ecole Supèrieur en Informatique de Sidi Bel Abbès\r\n    Equipe de recherche :\r\n Service Oriented Computing .\r\n     Enseignements: \r\n  -Bureautique et Web                          ', '', '', 'b.kelouche@esi-sba.dz', '', '', '', '', '', 'images/f3030_130_130.png', 1),
(7, 'Nabil', 'KESKES', 72, '                                  KESKES Nabil enseignant dans l\'ecole superieur d\'informatique                                 ', '                                  + E-mail: n.keskes@esi-sba.dz\r\n+ Grade: MCA\r\n+ Domaine: Informatique\r\n+ Equipe de Recherche: DASE                                ', '                                  Structure de ratachement :\r\n  ESI SBA - Ecole Supèrieur en Informatique de Sidi   Bel Abbès .\r\nEquipe de recherche : \r\n Data and Software Engineering\r\nEnseignements :\r\n -Structure fichiers et structures de données.\r\n -Alg', '', '', 'n.keskes@esi-sba', '', '', '', '', '', 'images/keskes_130-130.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `ClasseId` int(11) NOT NULL COMMENT 'To Identifier',
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `A_University` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`ClasseId`, `Name`, `A_University`) VALUES
(1, '1 Année', '2016/2017'),
(2, '2 Année', '2016/2017'),
(3, '3 Année', '2016/2017'),
(4, '4 Année', '2016/2017'),
(5, '5 Année', '2016/2017');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `EventId` int(11) NOT NULL COMMENT 'To Identifier Events',
  `Title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'The Title of Events',
  `Description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'The Description of Events',
  `Image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Path of the Picture',
  `Adresse` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Addresse',
  `Facebook` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` datetime NOT NULL COMMENT 'Start Date',
  `EndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`EventId`, `Title`, `Description`, `Image`, `Adresse`, `Facebook`, `Date`, `EndDate`) VALUES
(1, 'LEAD', 'Le Club Scientifique AlphaBit, organise des journées sur l\'Entrepreneuriat et le Leadership le 15 et 16 Avril 2017 au niveau de la Bibliothèque Central de l’Université Djillali Liabes de Sidi Bel Abbes. ', 'images/alpha1304.jpg', 'Bibliothèque Central de l’Université Djillali Liabes de Sidi Bel Abbes. ', 'www.fb.com', '2017-05-26 10:10:00', '2017-05-28 10:10:00'),
(2, 'تهنئة بمناسبة عيد العمال العالمي 01 ماي ', ' بمناسبة اليوم العالمي للشغل والذي يصادف الأول من شهر مــاي لكل سنة، يتقدم السيد مدير المدرسة العـلـيا للإعـلام الآلـــي 08 ماي 1945 بسـيــدي بـلعــبـاس، إلى كـافة أسرة المدرسة من أساتذة وموظفين إداريين وتقنيين بأحر التهــاني وأطـيب الأمنيـات بالنجـاح في ', 'images/1mai.png', 'ESI SBA', 'www.facebook.com', '2017-05-01 10:12:00', '2017-05-01 10:12:00');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `NewsId` int(11) NOT NULL COMMENT 'To Identifier news',
  `Title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'The Title of News',
  `Description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'The Description of News',
  `Details` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Details of News',
  `Type` varchar(255) NOT NULL COMMENT 'Image of News',
  `InSlider` tinyint(1) NOT NULL DEFAULT '0',
  `PostedBy` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Ajouter Par',
  `Image` varchar(255) NOT NULL COMMENT 'Image of Article',
  `Date` date NOT NULL COMMENT 'The Date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`NewsId`, `Title`, `Description`, `Details`, `Type`, `InSlider`, `PostedBy`, `Image`, `Date`) VALUES
(14, 'Visite culturelle', 'Le Mardi 09 Mai 2017, un groupe d’étudiant(e)s de l’ESI de Sidi Bel Abbes a effectué une visite culturelle à la Wilaya de Tlemcen.\r\n', 'Le Mardi 09 Mai 2017, un groupe d’étudiant(e)s de l’ESI de Sidi Bel Abbes a effectué une visite culturelle à la Wilaya de Tlemcen.\r\nAu programme :\r\n\r\nLes grottes de Beni Add\r\nLes cascades de Lourit\r\nLes Vestiges de la Mansourah', 'General', 0, 'WebMaster', 'images/Visite_300-215.jpg', '2017-05-17'),
(15, 'LEAD: Leadership-Entrepreneurship-Ambition-Development', 'Le Club Scientifique AlphaBit, organise des journées sur l\'Entrepreneuriat et le Leadership le 15 et 16 Avril 2017 au niveau de la Bibliothèque Central de l’Université Djillal', 'Samedi 15 Avril 2017 :\r\n09h00 : Lancement de l’évènement et présentation du club AlphaBit.\r\n09h30 : Conférence « Comment atteindre ses objectifs et avoir une vision positive de son avenir » par Mr. TAHIMI Yassine.\r\n10h00 : Conférence « Le coté professionn', 'Pedagogique', 0, 'WebMaster', 'images/lead1.jpg', '2017-05-17'),
(16, 'تهنئة بمناسبة عيد العمال العالمي 01 ماي 2017‎', 'بمناسبة اليوم العالمي للشغل والذي يصادف الأول من شهر مــاي لكل سنة، يتقدم السيد مدير المدرسة العـلـيا للإعـلام الآلـــي 08 ماي 1945 بسـيــدي بـلعــبـاس، إلى كـافة أسرة المدرسة', '', 'General', 0, 'WebMaster', 'images/1mai.png', '2017-05-17'),
(17, 'اجتماع مجلس الإدارة للمدرسة العليا للإعلام الآلي -08 ماي 1945-بسيدي بلعباس', 'اجتمع يوم الخميس 2017/04/06 مجلس إدارة المدرسة العليا للإعلام الآلي -08 ماي 1945-بسيدي بلعباس\r\n:جدول الأعمال', '.المناقشة والمصادقة على القانون الداخلي لمجلس الإدارة-\r\n.عرض حصيلة النشاطات البيداغوجية والعلمية لسنة 2016-\r\n.المناقشة والمصادقة على حصيلة الميزانية وكذا الحصيلة العامة للتوظيف لسنة 2016-\r\n.المناقشة والمصادقة على الميزانية الأولية وكذا مخطط التوظيف لسنة', 'Pedagogique', 0, 'WebMaster', 'images/esi-cover7.jpg', '2017-04-10'),
(18, 'Séminaires 5 - LabRI-SBA', 'Dans le cadre de son plan d’action pour 2017, le Laboratoire de Recherche en Informatique de Sidi Bel-Abbes.', 'Dans le cadre de son plan d’action pour 2017, le Laboratoire de Recherche en Informatique de Sidi Bel-Abbes (LabRI-SBA), lance une série de Séminaires.\r\n\r\nPour le mois de Mai, quelques séminaires sont prévus :', 'Pedagogique', 1, 'WebMaster', 'images/esi-cover7.jpg', '2017-05-28'),
(19, 'Delibération finale', 'Liste nominative des étudiant(e)s admis(es) affectées à l \'ESI de Sidi Bel Abbès (concours d\'accès au cycle supérieur en Informatique)  ', 'Liste nominative des étudiant(e)s admis(es) affectées à l \'ESI de Sidi Bel Abbès (concours d\'accès au cycle supérieur en Informatique)  ', 'General', 1, 'WebMaster', 'images/28ae5ec.jpg', '2017-05-25');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `NotId` int(11) NOT NULL COMMENT 'To Identifier Notifications',
  `Type` varchar(255) NOT NULL COMMENT 'Type of Notification',
  `Subject` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Subject of Notifacation',
  `NotDestina` int(11) NOT NULL COMMENT 'Notification Destinaton',
  `NotGroupId` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Notification Group Id',
  `Date` datetime NOT NULL COMMENT 'Date of Notification',
  `Valabe` date NOT NULL COMMENT 'Valabe Date',
  `File` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notifications`
--

INSERT INTO `notifications` (`NotId`, `Type`, `Subject`, `NotDestina`, `NotGroupId`, `Date`, `Valabe`, `File`) VALUES
(3, 'Etude', 'le concours d\'accès au cycle superieurs aura lieu le 19 juin 2017', 2, 'students', '2017-04-27 23:12:50', '2017-05-12', 'files/'),
(4, 'Etude', 'Vous Avez Un test le mercredi prochain En Probabilité ', 2, 'students', '2017-04-29 14:31:06', '0000-00-00', ''),
(5, 'Etude', 'Une nouvelle formation de réseau est disponible ', 2, 'teahcers', '2017-04-29 15:00:22', '0000-00-00', ''),
(6, 'Etude', 'Le Concours d\'accée au lieu le 19 juin 2017', 2, 'students', '2017-04-29 15:01:45', '0000-00-00', ''),
(7, 'Felicitation ', 'Vous Avez Admis en troisième Année', 2, 'students', '2017-04-29 19:00:14', '0000-00-00', ''),
(8, 'Felicitaion', 'Aidloom Moubarek', 2, 'All', '2017-05-03 09:13:16', '2017-05-18', 'files/admin_files_esi-program_cpi.pdf'),
(14, 'Note POO', 'Voice les note du module orienté objet du 1 er examen', 1, 'students', '2017-05-09 09:40:46', '0000-00-00', 'files/admin_files_esi-program_cpi(1).pdf'),
(17, 'Note', 'Notes projet', 2, 'students', '2017-05-29 02:58:08', '2017-05-19', 'files/deug_ecrit_mecanique.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `study`
--

CREATE TABLE `study` (
  `StudyId` int(11) NOT NULL COMMENT 'To Identifier Study',
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Name of its',
  `Description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Description',
  `Type` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'the Type',
  `Level` int(11) NOT NULL,
  `Module` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Year` varchar(255) CHARACTER SET utf8 NOT NULL,
  `File` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Path of file',
  `Date` date NOT NULL COMMENT 'Adding Time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `study`
--

INSERT INTO `study` (`StudyId`, `Name`, `Description`, `Type`, `Level`, `Module`, `Year`, `File`, `Date`) VALUES
(2, 'Intégrale impropre', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/admin_files_esi-program_cpi (1).pdf', '2017-05-09'),
(3, 'Dérivation', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(5, 'Integrale', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(6, 'Les nombres réelles', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(7, 'Les suites', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(8, 'Développement limité', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/admin_files_esi-program_cpi.pdf', '2017-05-09'),
(9, 'Equation différentiel', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(10, 'Les fonctions', 'Voici le cour d\'analyse pour les 1 er année', 'Cour', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(20, 'Les Ensembles', 'Voici le cour d\'algèbre pour les 1er année', 'Cour', 1, 'Algebre', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(21, 'Espace Vectoriel', 'Voici le cour d\'algèbre pour les 1 er année', 'Cour', 1, 'Algebre', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(22, 'Polynomes', 'Voici le cour d\'algèbre pour les 1 er année', 'Cour', 1, 'Algebre', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(23, 'Les matrices', 'Voici le cour d\'algèbre pour les 1 er année', 'Cour', 1, 'Algebre', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(24, 'Structure algebrique', 'Voici le cour d\'algèbre pour les 1 er année', 'Cour', 1, 'Algebre', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(25, 'Les Piles', 'Voice le cour d\'algorithme', 'Cour', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(32, 'Les Arbres', 'Voice le cour d\'algorithme', 'Cour', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(33, 'Les Fonctions', 'Voice le cour d\'algorithme', 'Cour', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(34, 'Les Files', 'Voice le cour d\'algorithme', 'Cour', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(35, 'Analyse 1', 'Voici l\'examen d\'analyse pour les 1e année', 'Exam', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(36, 'Analyse 1', 'Voici le corrigée d\'analyse pour les 1e anné', 'Exam', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(37, 'Analyse 2 ', 'Voici l\'examen d\'analyse pour les 1e année', 'Exam', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(38, 'Analyse 2', 'Voici le corrigée d\'analyse pour les 1e anné', 'Exam', 1, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(39, 'TD sur Les Piles', 'Voici la fiche TD numero 2', 'Td', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(40, 'TP sur les Piles', 'Voici la fiche TP numero ', 'Td', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(41, 'TP sur La récursivité', 'Voici la fiche TP numero 3', 'Td', 1, 'Algorithme', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-09'),
(42, 'Les Listes Chainées', 'Voici la fiche TD n3 pour les 1er Année', 'Td', 1, 'Algorithme', '2016/2017', 'files/admin_files_esi-program_cpi (1).pdf', '2017-05-10'),
(43, 'Class et Object', 'Voici le cour de POO', 'Cour', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-28'),
(44, 'Héritage', 'Voice le cour de POO', 'Cour', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(45, 'Collection', 'Voice le cour de POO', 'Cour', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(46, 'JavaFx', 'Voice le cour de POO', 'Cour', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-23'),
(47, 'Flux et Fichiers', 'Voice le cour de POO', 'Cour', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-24'),
(48, 'Collection', 'Voice le cour de POO', 'Td', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(50, 'Heritage', 'Voice le cour de POO', 'Td', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(51, 'Class et Object', 'Voice le cour de POO', 'Td', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(52, 'Collection', 'Voice le cour de POO', 'Td', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-04-22'),
(54, '1er Examen', 'Sujet Examen de OOP', 'Exam', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(55, '1er Examen', 'Solution Examen de OOP', 'Exam', 2, 'Orienté Object', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-22'),
(56, 'Les series', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(57, 'Les serier de Fourrier', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-11'),
(58, 'Les Topologie', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-10'),
(59, 'Intégrale multiple', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(61, 'Les serier de Fourrier', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-11'),
(62, 'Les Topologie', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-10'),
(63, 'Intégrale multiple', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(64, 'Seie Geometique', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(65, 'Les serier de Fourrier', 'Voici le cour d\'analyse', 'Cour', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-11'),
(68, 'Les serier de Fourrier', 'Voici le td d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-11'),
(69, 'Les Topologie', 'Voici le td d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-10'),
(70, 'Intégrale multiple', 'Voici le td d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(71, 'Seie Geometique', 'Voici le td d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-05-16'),
(72, 'Examen S1 N1', 'Sujet exam d d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-02-11'),
(73, 'Examen S1 N1', 'Solution exam d d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-02-10'),
(74, 'Examen S1 N2', 'Sujet exam d d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-03-11'),
(75, 'Examen S1 N2', 'Solution exam d d\'analyse', 'Td', 2, 'Analyse', '2016/2017', 'files/esi-program_cpi.pdf', '2017-02-10'),
(78, 'Examen S1 N1', 'Voici le sujet d\'examen ', 'Exam', 2, 'SFD', '2016/2017', 'files/esi-program_cpi.pdf', '2016-11-15'),
(79, 'Examen S1 N1', 'Voici la solution  d\'examen ', 'Exam', 2, 'SFD', '2016/2017', 'files/esi-program_cpi.pdf', '2016-11-15'),
(80, 'Examen S1 N2', 'Voici le sujet d\'examen ', 'Exam', 2, 'SFD', '2016/2017', 'files/esi-program_cpi.pdf', '2016-11-18'),
(81, 'Examen S1 N2', 'Voici la solution  d\'examen ', 'Exam', 2, 'SFD', '2016/2017', 'files/esi-program_cpi.pdf', '2016-11-17'),
(82, 'ORGANISATION DES FICHIERS', 'un cours d\'ORGANISATION DES FICHIERS', 'Cour', 2, 'SFD', '2016/2017', 'files/3-ORGANISATION DES FICHIERS --Structure simple -2-.pdf', '2017-05-29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL COMMENT 'To Identifier users',
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Email to login',
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Password to login',
  `Hash` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Redirection',
  `FirstName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'FirstName of User',
  `LastName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'LastName of User',
  `Grade` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Grade of teacher',
  `Level` int(11) NOT NULL COMMENT 'Level of Student',
  `Date` datetime NOT NULL,
  `RegStatus` tinyint(1) NOT NULL DEFAULT '0',
  `GroupId` smallint(6) DEFAULT '0' COMMENT 'Group of users',
  `Approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`UserId`, `Email`, `Password`, `Hash`, `FirstName`, `LastName`, `Grade`, `Level`, `Date`, `RegStatus`, `GroupId`, `Approved`) VALUES
(1, 'c.lokbani@esi-sba.dz', '1e70d493f036636c9af282e53b4513d28c018e62', '', 'Chouaib', 'LOKBANI', '', 1, '2017-04-15 11:56:32', 1, 0, 0),
(19, 'a.rahmoun@esi-sba.dz', '2d25f63d38235289afa4462de3353eb2df6f9180', '', 'Abdellatif', 'RAHMOUN', 'Professeur', 1, '2017-04-16 22:53:37', 1, 1, 0),
(35, 'w.lokbani@esi-sba.dz', '1e70d493f036636c9af282e53b4513d28c018e62', '', 'LOKBANI', 'WASSIM', '', 1, '2017-04-16 23:23:11', 1, 0, 0),
(39, 'i.saidi@esi-sba.dz', '3403855029fb83b0d063ce20664098ef653d1040', '', 'SAIDI', 'IMENE', 'DOCTORAT', 2, '2017-04-18 19:17:22', 1, 1, 0),
(40, 't.lokbani@esi-sba.dz', '243fad2125b703b6e06c163de9bc1f108deb8225', '', 'LOKBANI', 'TARIK', '', 2, '2017-04-20 19:45:25', 1, 2, 0),
(42, 'm.malki@esi-sba.dz', '40d72880632fc533d3d7b5e4d3f8aef30661dc3d', '', 'Mimoune', 'MALKI', 'Professeur', 3, '2017-04-20 22:50:28', 1, 1, 0),
(43, 't.lok@esi-sba.dz', 'da425b25504da7c005ea6f3d7b1b1c583fed70ed', '3435c378bb76d4357324dd7e69f3cd18', 'test', 'test', '', 2, '2017-04-29 00:45:23', 1, 2, 0),
(47, 'ayma@esi-sba.dz', 'b01c81f1aa7ba92d8065ad2c7c1143ff99393210', '', 'Chouaib', 'ayman', '', 1, '2017-04-29 02:32:02', 0, 2, 0),
(49, 's.salam@esi-sba.dz', '55490cd891a0e41ed5babc203cbb6a98c7424f02', '', 'salam', 'salam', '', 1, '2017-04-29 03:23:52', 1, 2, 0),
(52, 'a.belhadj@esi-sba.dz', '1e70d493f036636c9af282e53b4513d28c018e62', '', 'ALI', 'BELHDAJ', '', 2, '2017-04-29 19:08:32', 1, 2, 0),
(55, 'hicham@esi-sba.dz', 'a25758bf71c5fb5e2e9e8eafd4d8ce2b836bff3d', '', 'hicham', 'hicham', '', 2, '2017-04-29 19:15:44', 1, 2, 0),
(56, 'a.hamouda@esi-sba.dz', '$2y$10$DiS5Gj5orP.ojac5W4ZdAumM2t.IBg4ZHPn3NUiYKmfvRwaJWptm.', '32bb90e8976aab5298d5da10fe66f21d', 'Ahmed', 'Hamouda', '', 1, '2017-05-07 23:04:01', 1, 2, 0),
(59, 's.sofi@esi-sba.dz', '$2y$10$3fQfieT44fr/Yh3fRGE03OAMfWsE2gPy23KsdMvPayL9YzA.ubQsG', '757b505cfd34c64c85ca5b5690ee5293', 'Sofiane', 'soifi', '', 2, '2017-05-07 23:49:38', 1, 2, 0),
(61, 'y.grimes@esi-sba.dz', '8ea7111ae752f0c4f3971599cb8ddde7fb4fb618', '94c7bb58efc3b337800875b5d382a072', 'yasser', 'grimes', '', 2, '2017-05-08 10:39:28', 1, 2, 0),
(63, 'h.benali@esi-sba.dz', '61a45a869cfdbeec146d2a94b10b6146f248a9e4', '7143d7fbadfa4693b9eec507d9d37443', 'Benali', 'Hicham', '', 2, '2017-05-20 13:43:30', 0, 2, 0),
(71, 'b.klouche@esi-sba.dz', 'da6e9a591d7c5d73917ef19028d85c6c6d48d11c', '', 'Badia', 'KELOUCHE', ' MAB', 1, '2017-05-27 23:49:54', 1, 1, 0),
(72, 'n.keskes@esi-sba.dz', '34859dea7a9ce6222725e4366071166a9e89f0e9', '', 'Nabil', 'KESKES', 'Professeur', 2, '2017-05-27 23:57:43', 1, 1, 0),
(73, 'o.lahreche@esi-sba.dz', '3f86ec76df6fd2086b0401875696ee04d44a42d8', '0d0fd7c6e093f7b804fa0150b875b868', 'lahreche', 'otmane', '', 2, '2017-05-28 00:55:09', 0, 2, 0),
(75, 's.chelouf@esi-sba.dz', 'b01c81f1aa7ba92d8065ad2c7c1143ff99393210', '470e7a4f017a5476afb7eeb3f8b96f9b', 'CHELOUF', 'Sofian', '', 2, '2017-05-28 15:59:14', 0, 2, 0),
(77, 'l.belhadj@esi-sba.dz', 'b01c81f1aa7ba92d8065ad2c7c1143ff99393210', '2f55707d4193dc27118a0f19a1985716', 'fdfdff', 'fdfdf', '', 2, '2017-05-28 16:17:42', 1, 2, 0),
(78, 'g.meddour@esi-sba.dz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '57aeee35c98205091e18d1140e9f38cf', 'Meddour', 'Ghiles', '', 2, '2017-05-28 18:43:14', 1, 2, 0),
(79, 'l.dergham@esi-sba.dz', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a3d68b461bd9d3533ee1dd3ce4628ed4', 'BELHADJ', 'Laid', '', 2, '2017-05-29 02:20:51', 1, 2, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `biographie`
--
ALTER TABLE `biographie`
  ADD PRIMARY KEY (`BioId`),
  ADD KEY `BioUser` (`BioUser`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClasseId`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventId`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsId`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotId`),
  ADD KEY `NotDestina` (`NotDestina`);

--
-- Index pour la table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`StudyId`),
  ADD KEY `Level` (`Level`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `users_ibfk_1` (`Level`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `biographie`
--
ALTER TABLE `biographie`
  MODIFY `BioId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Biographie Id', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClasseId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier Events', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `NewsId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier news', AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier Notifications', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `study`
--
ALTER TABLE `study`
  MODIFY `StudyId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier Study', AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'To Identifier users', AUTO_INCREMENT=80;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `biographie`
--
ALTER TABLE `biographie`
  ADD CONSTRAINT `biographie_ibfk_1` FOREIGN KEY (`BioUser`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`NotDestina`) REFERENCES `classes` (`ClasseId`);

--
-- Contraintes pour la table `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `study_ibfk_1` FOREIGN KEY (`Level`) REFERENCES `classes` (`ClasseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Level`) REFERENCES `classes` (`ClasseId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

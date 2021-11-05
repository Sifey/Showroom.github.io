-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 16 avr. 2021 à 15:23
-- Version du serveur :  10.3.9-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zbaylejo0`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_actualite_act`
--

CREATE TABLE `t_actualite_act` (
  `act_numero` int(11) NOT NULL,
  `act_titre` varchar(50) NOT NULL,
  `act_texte` varchar(500) NOT NULL,
  `act_date_publication` varchar(10) NOT NULL,
  `act_etat` char(1) NOT NULL,
  `com_pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_actualite_act`
--

INSERT INTO `t_actualite_act` (`act_numero`, `act_titre`, `act_texte`, `act_date_publication`, `act_etat`, `com_pseudo`) VALUES
(1, 'Un nouvel éditeur de manga en France: Mangetsu', 'Nous apprenons ce matin qu\'un tout nouvel éditeur va se \r\nlancer en 2021 en France: les éditions Mangetsu affilié aux éditions Bragelonne ! Ils nous partagent déjà 5 titres de leurs collection qui \r\narriveront dès le 26 mai prochain avec la sortie simultanée des deux premiers tomes de Aoashi de Yugo Kobayashi, un manga de football très populaire au Japon, \r\nainsi que: Butterfly Beast de Yuka Nagate, Le Mandala de Feu de Chie Shimomoto, Keiji de Tetsuo Hara et Panda Detective Agency de Pump Sawae', '2021-01-28', 'V', 'Gwenole_m'),
(2, 'Nouveauté manga chez Meian !', 'Les éditions Meian annonce un nouveau titre qui rejoindra leur collection en 2021, \r\n Chillin\' Life in a Different World de Akine Itomachi et Miya Kinojo. Adapté d\'un web novel à succès au Japon, le manga raconte l\'arrivée de Banaza dans un \r\n monde d\'heroic-fantasy. Il devait y devenir le grand héros, mais après un test, les invocateurs le rejettent et il est exilé dans la forêt de Delazava.\r\n Un manga prometteur qui fera sont apparition en librairie dès le 24 mars prochain.', '2021-01-29', 'V', 'Quentin_b'),
(3, 'Le manga Shibuya Hell se termine au Japon !', 'C\'est dans le 10ème volume, sorti au Japon vendredi dernier, que l\'on apprend la conclusion imminente du manga Shibuya Hell d\'Aoi Hiroumi. Le manga s\'achèvera avec son 11ème tome qui devrait sortir dans le courant de l\'été au Japon.', '2021-01-25', 'I', 'Mathieu_l'),
(11, 'Saotome chez Doki-Doki !', 'Une romance qui mélange le sport, l\'humour et l\'amour pour un cocktail qui promet d\'être sympathique avec son héroine qui doit assumer son staut d\'espoir de tous mais aussi les nouveaux sentiments amoureux qui l\'envahissent petit à petit. Les deux premiers tomes de Saotome arrivent en librairie simultanément le 9 juin prochain au édition Doki Doki.', '2021-04-13', 'V', 'Katell_r'),
(12, 'Des tatouages aux motifs de Tokyo Revengers !', 'A l\'occasion de la sortie du 12ème tome du manga et du début imminent de son adaptation animé, Glénat a dévoilé une offre spéciale autour du manga Tokyo Revengers de Ken Wakui : une pochette de tatouages offerte pour l\'achat de deux tomes du manga  ! ', '2021-04-13', 'V', 'Merlin_c'),
(13, 'L\'Imprimerie des Sorcières se termine au Japon', 'Après cinq années de publication au Japon, on apprend, par le biais de Soleil Manga, que le manga L\'Imprimerie des Sorcières de Yasuhiro Miyama et Mochinchi atteint sa conclusion au Japon ! Le dernier chapitre sera publié le 30 avril prochain sur le site de publication Comic Walker, et le manga devrait compter un total de 6 tomes.', '2021-04-13', 'V', 'Tenzin_j');

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_utilisateur_com`
--

CREATE TABLE `t_compte_utilisateur_com` (
  `com_pseudo` varchar(50) NOT NULL,
  `com_mot_de_passe` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_compte_utilisateur_com`
--

INSERT INTO `t_compte_utilisateur_com` (`com_pseudo`, `com_mot_de_passe`) VALUES
('Dylan_d', '4b4183864f990e03b0cab4f2dbeecbd4'),
('gestionnaire1', '388d4ca7d89f912a8fe96b04fb3d8e22'),
('Gwenole_m', '2ec9c08ce5d666f50971022abaadb88c'),
('Jonathan_b', '891039eaf9b51335e368e56896ab18fc'),
('Katell_r', '3ffb45f4504a49cd8b21afe6f3a083d6'),
('Lola_r', 'f1bc06fbc96b2bf135769f74a73a2cd5'),
('Mathieu_l', '717f759eb23b2489e66545f013f822c8'),
('Merlin_c', '957bafafcf72b34abfc9ce3f713086de'),
('Quentin_b', '3827bdf1d4c8a1b9c9621f4d0e568193'),
('Tenzin_j', '30e4ab9b552d80d9306eaa4fa10cd148'),
('Theo_r', '6fa0369f4e42df21b88fcdd1e7b672a5'),
('Tom_n', '29193a7e72e20dc9d9e7b73ba6a4550d');

-- --------------------------------------------------------

--
-- Structure de la table `t_element_ele`
--

CREATE TABLE `t_element_ele` (
  `ele_numero` int(11) NOT NULL,
  `ele_intitule` varchar(70) NOT NULL,
  `ele_descriptif` varchar(400) NOT NULL,
  `ele_date_d_ajout` varchar(10) NOT NULL,
  `ele_fichier_image` varchar(100) NOT NULL,
  `ele_etat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_element_ele`
--

INSERT INTO `t_element_ele` (`ele_numero`, `ele_intitule`, `ele_descriptif`, `ele_date_d_ajout`, `ele_fichier_image`, `ele_etat`) VALUES
(1, 'My Hero Academia T.27', 'Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer\r\n à la Hero Academia pour suivre les traces de son idole. Le problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir...\r\n Son destin est bouleversé le jour où sa route croise celle d\'All Might en personne !', '2021-01-07', 'MHA_27_couverture.jpg', 'P'),
(2, 'Jujutsu Kaisen T.07', 'Le héros de Jujutsu Kaisen, Yuji Itadori, un lycéen, se retrouve confronté\r\n aux forces occultes et est enrôlé dans une école d\'exorcisme le jour où il se voit possédé par le démon millénaire Ryomen Sukuna.', '2021-02-04', 'JJK_7_couv.jpg', 'B'),
(3, 'Black Clover T.26', 'Dans un monde où la magie représentait tout, il y avait un garcon incapable d\'utiliser\r\n n\'importe quelle magie, et enfant, il avait été abandonné à une église. Son nom était Asta. Par défi lancé à lui-même et pour garder une promesse \r\n faite à un amis, il cherche à devenir l\'empereur Mage !', '2021-02-17', 'BC_26_couv.jpg', 'P'),
(4, 'Slam Dunk T.15 (Star edition)', 'Hanamichi Sakuragi, grand gaillard un peu voyou,\r\ndébarque en seconde au lycée Shohoku. Il va y rencontrer Haruko, une jolie fille attachante, grande fan de Basket.\r\nPour lui plaire, notre héros va s\'inscrire dans le club de Basket du lycée. C\'est le début d\'une grande aventure humaine et sportive.', '2021-02-05', 'SD_15_couv.jpg', 'B'),
(5, 'Initial D T.42', 'Takumi Fujiwara un lycéen de 18 ans, travaillant dans une station-service avec son meilleur ami \r\nItsuki. Après 5 ans de livraison dans les montagnes, il a appris à maitriser sa voiture à la perfection. Suite à la demande de son ami il va participer pour\r\nla première fois à une course de voiture.', '2021-02-24', 'ID_42_couv.jpg', 'P'),
(6, 'Echoes T.06', 'A 5 ans Senri Nakajô a assisté à l\'assassinat de ses parents et l\'enlèvement de son frère jumeaux, pour lui il est clair\r\nque son frère est encore en vie malgrès l\'opinion de la police, dix ans après il fait tout pour remonter la piste de l\'assassin afin de retrouver son frère', '2021-02-18', 'Echoes_6_couv.jpg', 'P'),
(7, 'Carole & Tuesday T.01', 'L\'histoire se déroule dans un futur proche. Carole une orpheline débrouillarde joueuse \r\nde piano et Tuesday cadette d\'une famille fortunée qui quitte sa deumeure pour vivre de sa passion: la musique.\r\nLorsque les deux adolescentes se rencontrent, un duo musical unique naît.', '2021-02-17', 'CT_couv.jpg', 'B'),
(8, 'Ayako - L\'Enfant de la Nuit T.01', 'Transposée dans des temps plus modernes, la terrible histoire d\'Ayako résonne \r\ntoujours de manière aussi cruelle ! Une version remaniée avec brio par Kubu Kurin qui explore l\'identité des personnages, insuffle une charge érotique sans \r\nprécédent au récit et prolonge ainsi le tragique mythe de l\'enfant illégitime...', '2021-02-10', 'Ayako_couv.jpg', 'P'),
(9, 'Honey Come Honey T.07', 'Kumagaya vient d\'être transféré dans un nouveau lycée, il est surnommé \"le grizzli sauvage\" \r\nà cause de son aura effrayante et de sa grande taille. Il est assis derrière la jolie et gentille Hanasaki, fan invétérée de la marque Honey × Baddy. \r\nMais Hanasaki découvre très vite que la personne derrière la création de mignonnes peluches et accessoires \r\nde mode est en réalité Kumagaya !', '2021-03-03', 'HCH_7_couv.jpg', 'P'),
(10, '100 Jours avant ta Mort T.01', 'Taro a enfin pu avouer à son amie d\'enfance Umi qu\'il l\'aime depuis toujours ! Mais \r\nà cet instant, s\'affiche le nombre 100 devant la jeune fille... Car Taro a un pouvoir spécial : celui de visualiser un compte à rebours sur tous les êtres \r\nvivants qui ont moins de 100 jours à vivre ! Ensemble, le couple va faire face au destin et tenter d\'arrêter le décompte fatidique...', '2021-02-03', '100j_couv.jpg', 'P'),
(11, 'Ça Reste Entre Nous T.03', 'Towako, présidente du conseil des élèves, est autant réputée pour sa moralité irréprochable, qui \r\nlui vaut la confiance des enseignants et des élèves, que pour sa haine apparente des garçons. Sa rencontre avec Yui, un élève plus jeune, va dévoiler un aspect caché \r\nde sa personnalité et engendrer le début d\'une relation « interdite »…', '2021-02-05', 'CREN_3_couv.jpg', 'P'),
(12, 'Irrésistible T.08', 'Un jour, Serina découvre une chanson d\'amour écrite sur sa table de classe. C\'est Mizukawa-senpai, un \r\nélève de première, qui l\'a griffonnée. Serina voudrait se rapprocher de ce garçon mais il est froid et n\'a vraiment pas l\'air intéressé par elle…', '2021-02-05', 'Irres_8_couv.jpg', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `t_lien_lie`
--

CREATE TABLE `t_lien_lie` (
  `lie_numero` int(11) NOT NULL,
  `lie_titre` varchar(100) NOT NULL,
  `lie_url` varchar(200) NOT NULL,
  `lie_auteur` varchar(50) NOT NULL,
  `lie_date_publication` varchar(10) NOT NULL,
  `ele_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_lien_lie`
--

INSERT INTO `t_lien_lie` (`lie_numero`, `lie_titre`, `lie_url`, `lie_auteur`, `lie_date_publication`, `ele_numero`) VALUES
(1, 'MY HERO ACADEMIA - TOME 27', 'http://mangaetanimevuspardespassionnes.over-blog.com/2021/01/my-hero-academia-tome-27.html', 'EDO', '2021-01-10', 1),
(2, 'Carole & Tuesday, le manga sort en France', 'https://www.ledojomanga.com/actualite/article/86043/carole-tuesday-le-manga-sort-en-france', 'Ismaël', '2020-11-18', 7),
(3, 'Le manga Ayako – L\'enfant de la nuit arrive en février chez Delcourt/Tonkam !', 'https://communaute.icotaku.com/news/9591/Le-manga-Ayako-----L---enfant-de-la-nuit-arrive-en-fevrier-chez-Delcourt-Tonkam--.html', 'Hishiro', '2020-10-23', 8),
(4, '100 jours avant ta mort est terminé, mais glénat l\'édite en France', 'https://www.ledojomanga.com/actualite/article/85528/100-jours-avant-ta-mort-est-termine-mais-glenat-l-edite-en-france', 'Ismaël', '2020-10-10', 10);

-- --------------------------------------------------------

--
-- Structure de la table `t_liste_lis`
--

CREATE TABLE `t_liste_lis` (
  `ele_numero` int(11) NOT NULL,
  `sel_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_liste_lis`
--

INSERT INTO `t_liste_lis` (`ele_numero`, `sel_numero`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_presentation_pre`
--

CREATE TABLE `t_presentation_pre` (
  `pre_numero` int(11) NOT NULL,
  `pre_nom_structure` varchar(50) NOT NULL,
  `pre_adresse` varchar(100) NOT NULL,
  `pre_e_mail` varchar(50) NOT NULL,
  `pre_numero_telephone` varchar(10) NOT NULL,
  `pre_horaire_ouverture` varchar(100) NOT NULL,
  `pre_texte_bienvenue` varchar(400) NOT NULL,
  `com_pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_presentation_pre`
--

INSERT INTO `t_presentation_pre` (`pre_numero`, `pre_nom_structure`, `pre_adresse`, `pre_e_mail`, `pre_numero_telephone`, `pre_horaire_ouverture`, `pre_texte_bienvenue`, `com_pseudo`) VALUES
(1, 'L\'escale à mangas', '12 Bis Rue de la 2ème Db, 29200 Brest', 'escale-a-mangas@numericable.fr', '0298332914', 'Du mardi au samedi de 10h à 12h30 et de 14h à 18h', 'Depuis 2003, le Pays du Soleil levant est à portée de page à Brest. Que vous soyez amateurs ou connaisseurs, notre petite jonque (boutique de 30m2) vous fait découvrir la richesse de la Bd asiatique.\r\nL\'Orient sous tous ses visages : mangas, manwas, shojo, seinen, shonen…\r\nL\'Orient sous toutes ses formes : livres, DVD, goodies, affiches, musiques…', 'Tenzin_j');

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_utilisateur_pro`
--

CREATE TABLE `t_profil_utilisateur_pro` (
  `pro_nom` varchar(70) NOT NULL,
  `pro_prenom` varchar(70) NOT NULL,
  `pro_e_mail` varchar(50) NOT NULL,
  `pro_validite_du_profil` char(1) NOT NULL,
  `pro_statut` char(1) NOT NULL,
  `pro_date_de_creation_profil` varchar(10) NOT NULL,
  `com_pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_profil_utilisateur_pro`
--

INSERT INTO `t_profil_utilisateur_pro` (`pro_nom`, `pro_prenom`, `pro_e_mail`, `pro_validite_du_profil`, `pro_statut`, `pro_date_de_creation_profil`, `com_pseudo`) VALUES
('Dovetta', 'Dylan', 'Dylan.dv@gmail.com', 'D', 'A', '2020-06-16', 'Dylan_d'),
('Bronnec', 'Liam', 'gestionnaire1@gmail.com', 'A', 'A', '2020-05-22', 'gestionnaire1'),
('Marrec', 'Gwenole', 'Gwenole.mr@gmail.com', 'A', 'R', '2020-06-05', 'Gwenole_m'),
('Bayle', 'Jonathan', 'jonathan.bayle002@gmail.com', 'A', 'R', '2021-04-06', 'Jonathan_b'),
('Rivoal', 'Katell', 'Katell.rv@gmail.com', 'A', 'R', '2020-06-31', 'Katell_r'),
('Rolland', 'Lola', 'Lola.rl@gmail.com', 'A', 'A', '2020-05-22', 'Lola_r'),
('Lebloa', 'Mathieu', 'Mathieu.lb@gmail.com', 'A', 'A', '2020-05-22', 'Mathieu_l'),
('Caubert', 'Merlin', 'Merlin.cb@gmail.com', 'A', 'R', '2020-06-08', 'Merlin_c'),
('Brelivet', 'Quentin', 'Quentin.bl@gmail.com', 'A', 'R', '2020-06-07', 'Quentin_b'),
('Jhellil', 'Tenzin', 'Tenzin.jl@gmail.com', 'A', 'R', '2020-06-22', 'Tenzin_j'),
('Rival', 'Theo', 'Theo.rv@gmail.com', 'D', 'R', '2020-06-18', 'Theo_r'),
('Nicolas', 'Tom', 'Tom.nm@gmail.com', 'A', 'R', '2020-06-09', 'Tom_n');

-- --------------------------------------------------------

--
-- Structure de la table `t_selection_sel`
--

CREATE TABLE `t_selection_sel` (
  `sel_numero` int(11) NOT NULL,
  `sel_intitule` varchar(50) NOT NULL,
  `sel_texte_introductif` varchar(200) NOT NULL,
  `sel_date_d_ajout` varchar(10) NOT NULL,
  `com_pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_selection_sel`
--

INSERT INTO `t_selection_sel` (`sel_numero`, `sel_intitule`, `sel_texte_introductif`, `sel_date_d_ajout`, `com_pseudo`) VALUES
(1, 'Sortie Shonen', 'Selection de tous les mangas appartenant au genre \"shonen\".', '2020-07-20', 'Tom_n'),
(2, 'Sortie Seinen', 'Selection de tous les mangas appartenant au genre \"seinen\".', '2020-07-21', 'Merlin_c'),
(3, 'Sortie Shojo', 'Selection de tous les mangas appartenant au genre \"shojo\".', '2020-07-21', 'Katell_r'),
(5, 'Sortie josei', 'Selection de tous les mangas appartenant au genre \"josei\".', '2021-02-26', 'Gwenole_m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD PRIMARY KEY (`act_numero`),
  ADD KEY `com_pseudo` (`com_pseudo`);

--
-- Index pour la table `t_compte_utilisateur_com`
--
ALTER TABLE `t_compte_utilisateur_com`
  ADD PRIMARY KEY (`com_pseudo`);

--
-- Index pour la table `t_element_ele`
--
ALTER TABLE `t_element_ele`
  ADD PRIMARY KEY (`ele_numero`);

--
-- Index pour la table `t_lien_lie`
--
ALTER TABLE `t_lien_lie`
  ADD PRIMARY KEY (`lie_numero`),
  ADD KEY `ele_numero` (`ele_numero`);

--
-- Index pour la table `t_liste_lis`
--
ALTER TABLE `t_liste_lis`
  ADD PRIMARY KEY (`ele_numero`,`sel_numero`),
  ADD KEY `t_lis_sel` (`sel_numero`);

--
-- Index pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD PRIMARY KEY (`pre_numero`),
  ADD KEY `com_pseudo` (`com_pseudo`);

--
-- Index pour la table `t_profil_utilisateur_pro`
--
ALTER TABLE `t_profil_utilisateur_pro`
  ADD PRIMARY KEY (`com_pseudo`);

--
-- Index pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  ADD PRIMARY KEY (`sel_numero`),
  ADD KEY `com_pseudo` (`com_pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  MODIFY `act_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `t_element_ele`
--
ALTER TABLE `t_element_ele`
  MODIFY `ele_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_lien_lie`
--
ALTER TABLE `t_lien_lie`
  MODIFY `lie_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  MODIFY `pre_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  MODIFY `sel_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_actualite_act`
--
ALTER TABLE `t_actualite_act`
  ADD CONSTRAINT `t_actualite_act_ibfk_1` FOREIGN KEY (`com_pseudo`) REFERENCES `t_compte_utilisateur_com` (`com_pseudo`);

--
-- Contraintes pour la table `t_lien_lie`
--
ALTER TABLE `t_lien_lie`
  ADD CONSTRAINT `t_lien_lie_ibfk_1` FOREIGN KEY (`ele_numero`) REFERENCES `t_element_ele` (`ele_numero`);

--
-- Contraintes pour la table `t_liste_lis`
--
ALTER TABLE `t_liste_lis`
  ADD CONSTRAINT `t_lis_ele` FOREIGN KEY (`ele_numero`) REFERENCES `t_element_ele` (`ele_numero`),
  ADD CONSTRAINT `t_lis_sel` FOREIGN KEY (`sel_numero`) REFERENCES `t_selection_sel` (`sel_numero`);

--
-- Contraintes pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD CONSTRAINT `t_presentation_pre_ibfk_1` FOREIGN KEY (`com_pseudo`) REFERENCES `t_compte_utilisateur_com` (`com_pseudo`);

--
-- Contraintes pour la table `t_profil_utilisateur_pro`
--
ALTER TABLE `t_profil_utilisateur_pro`
  ADD CONSTRAINT `t_profil_utilisateur_pro_ibfk_1` FOREIGN KEY (`com_pseudo`) REFERENCES `t_compte_utilisateur_com` (`com_pseudo`);

--
-- Contraintes pour la table `t_selection_sel`
--
ALTER TABLE `t_selection_sel`
  ADD CONSTRAINT `t_selection_sel_ibfk_1` FOREIGN KEY (`com_pseudo`) REFERENCES `t_compte_utilisateur_com` (`com_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

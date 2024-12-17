-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : lun. 02 déc. 2024 à 13:32
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_pLecture`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprecier`
--

CREATE TABLE `apprecier` (
  `utilisateur_fk` bigint UNSIGNED NOT NULL,
  `ouvrage_fk` bigint UNSIGNED NOT NULL,
  `note` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_25_072744_create_auteurs_table', 1),
(5, '2024_02_25_073716_create_editeurs_table', 1),
(6, '2024_03_25_074800_create_utilisateurs_table', 1),
(7, '2024_04_25_074747_create_categories_table', 1),
(8, '2024_05_25_074732_create_ouvrages_table', 1),
(9, '2024_06_25_074815_create_appreciers_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4C5NZEWJjsr5LVEdTkoDY4sesmdAfaOU4OlgFJch', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkpGRzVMcDNhOEVHZ281eGlKMFBZYVhBQjd3RTdhS2RVZVdmaWp4RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rcy92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733146093);

-- --------------------------------------------------------

--
-- Structure de la table `t_auteur`
--

CREATE TABLE `t_auteur` (
  `auteur_id` bigint UNSIGNED NOT NULL,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_auteur`
--

INSERT INTO `t_auteur` (`auteur_id`, `nom`, `prenom`) VALUES
(1, 'Saint-Exupéry', 'Antoine de'),
(2, 'Orwell', 'George'),
(3, 'Tolkien', 'J.R.R.'),
(4, 'Proust', 'Marcel'),
(5, 'Dumas', 'Alexandre'),
(6, 'Hugo', 'Victor'),
(7, 'Coelho', 'Paulo'),
(8, 'Hemingway', 'Ernest'),
(9, 'Camus', 'Albert'),
(10, 'Baudelaire', 'Charles'),
(11, 'Brown', 'Dan'),
(12, 'Austen', 'Jane'),
(13, 'Frank', 'Anne'),
(14, 'Maupassant', 'Guy de'),
(15, 'Golden', 'Arthur'),
(16, 'Süskind', 'Patrick'),
(17, 'Gijoan', 'René'),
(18, 'Stoker', 'Bram'),
(19, 'Suskind', 'Patrick'),
(20, 'Golden', 'Arthur');

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `categorie_id` bigint UNSIGNED NOT NULL,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`categorie_id`, `nom`) VALUES
(1, 'Aventure'),
(2, 'Science-fiction'),
(3, 'Fantasy'),
(4, 'Littérature classique'),
(5, 'Historique'),
(6, 'Romance'),
(7, 'Philosophique'),
(8, 'Policier'),
(9, 'Thriller'),
(10, 'Poésie'),
(11, 'Guerre'),
(12, 'Fantastique'),
(13, 'Biographie'),
(14, 'Conte'),
(15, 'Humour');

-- --------------------------------------------------------

--
-- Structure de la table `t_editeur`
--

CREATE TABLE `t_editeur` (
  `editeur_id` bigint UNSIGNED NOT NULL,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_editeur`
--

INSERT INTO `t_editeur` (`editeur_id`, `nom`) VALUES
(1, 'Éditions du Seuil'),
(2, 'Gallimard'),
(3, 'Hachette Livre'),
(4, 'Penguin Random House'),
(5, 'Albin Michel'),
(6, 'Flammarion'),
(7, 'Pocket'),
(8, 'HarperCollins'),
(9, 'Livre de Poche'),
(10, 'Plon'),
(11, 'Editions Actes Sud'),
(12, 'Librio'),
(13, 'Editions Belfond'),
(14, 'Éditions Fayard'),
(15, 'Presses de la Cité');

-- --------------------------------------------------------

--
-- Structure de la table `t_ouvrage`
--

CREATE TABLE `t_ouvrage` (
  `ouvrage_id` bigint UNSIGNED NOT NULL,
  `titre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extrait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbPages` smallint NOT NULL,
  `utilisateur_fk` bigint UNSIGNED NOT NULL,
  `categorie_fk` bigint UNSIGNED NOT NULL,
  `editeur_fk` bigint UNSIGNED NOT NULL,
  `auteur_fk` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_ouvrage`
--

INSERT INTO `t_ouvrage` (`ouvrage_id`, `titre`, `extrait`, `resume`, `annee`, `image`, `nbPages`, `utilisateur_fk`, `categorie_fk`, `editeur_fk`, `auteur_fk`) VALUES
(41, 'Le Petit Prince', 'Un conte poétique...', 'Histoire d’un petit garçon...', 1943, 'petitprince.jpg', 96, 4, 1, 1, 1),
(42, '1984', 'Un roman dystopique...', 'Histoire de la vie de Winston Smith...', 1949, '1984.jpg', 328, 4, 2, 2, 2),
(43, 'Le Seigneur des Anneaux', 'Une épopée fantastique...', 'L’histoire de la quête pour détruire l’anneau...', 1954, 'Le_Seigneur_des_Anneaux.jpg', 1216, 1, 3, 3, 3),
(44, 'À la recherche du temps perdu', 'Un roman de la mémoire...', 'Marcel Proust raconte l’histoire...', 1913, 'temps.png', 1400, 3, 4, 4, 4),
(45, 'Le Comte de Monte-Cristo', 'Un roman d’aventure...', 'L’histoire de vengeance d’Edmond Dantès...', 1844, 'comte.jpg', 1240, 4, 5, 5, 5),
(46, 'Les Misérables', 'Une épopée de la misère...', 'L’histoire de Jean Valjean et de la rédemption...', 1862, 'miserables.jpg', 1464, 4, 1, 2, 1),
(47, 'L’Alchimiste', 'Un conte philosophique...', 'L’histoire de Santiago et sa quête de trésor...', 1988, 'alchimiste.jpg', 208, 3, 2, 3, 2),
(48, 'Le Vieil Homme et la Mer', 'Une fable sur la persévérance...', 'Le combat entre un vieil homme et un marlin...', 1952, 'Le_Vieil_Homme_et_la_Mer.jpg', 127, 1, 3, 4, 3),
(49, 'La Peste', 'Une épidémie qui bouleverse...', 'Le récit de l’épidémie dans une ville...', 1947, 'peste.jpg', 288, 4, 4, 5, 4),
(50, 'Les Fleurs du mal', 'Un recueil de poèmes...', 'La lutte contre l’angoisse et la recherche de beauté...', 1857, 'fleurs_du_mal.jpg', 140, 3, 5, 1, 5),
(51, 'Le Da Vinci Code', 'Un thriller mystérieux...', 'La quête de Robert Langdon...', 2003, 'davinci.jpg', 489, 1, 1, 2, 1),
(52, 'Orgueil et Préjugés', 'Une romance classique...', 'Histoire d’Elizabeth Bennet et Mr Darcy...', 1813, 'orgueil.jpg', 432, 4, 2, 3, 2),
(53, 'Le Journal d’Anne Frank', 'Un témoignage de guerre...', 'Les mémoires d’Anne Frank durant la guerre...', 1947, 'journal_anne_frank.jpg', 283, 4, 3, 4, 3),
(54, 'Le Horla', 'Une nouvelle fantastique...', 'L’histoire d’un homme hanté par un être invisible...', 1887, 'le_horla.jpg', 55, 4, 4, 5, 4),
(55, 'L’Étranger', 'Un roman philosophique...', 'L’histoire de Meursault et de l’absurde...', 1942, 'etranger.jpg', 123, 4, 5, 1, 5),
(56, 'Crime et Châtiment', 'Un roman psychologique...', 'L’histoire de Raskolnikov et de son crime...', 1866, 'crime_et_chatiment.jpg', 430, 3, 1, 2, 1),
(57, 'Le Petit Nicolas', 'Une série de récits humoristiques...', 'Les aventures du Petit Nicolas...', 1959, 'petit_nicolas.jpg', 192, 4, 2, 3, 2),
(58, 'Dracula', 'Un roman gothique...', 'L’histoire du comte vampire et de ses victimes...', 1897, 'dracula.jpg', 418, 1, 3, 4, 3),
(59, 'Le Parfum', 'Un roman sur le pouvoir des odeurs...', 'L’histoire de Grenouille et de son parfum...', 1985, 'parfum.jpg', 263, 1, 4, 5, 4),
(60, 'Mémoires d’une Geisha', 'Une histoire fascinante...', 'La vie d’une geisha au Japon...', 1997, 'memoires_geisha.jpg', 434, 1, 5, 1, 5);


-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `utilisateur_id` bigint UNSIGNED NOT NULL,
  `pseudo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEntree` date NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`utilisateur_id`, `pseudo`, `dateEntree`, `isAdmin`) VALUES
(1, 'Félix', '2024-12-02', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprecier`
--
ALTER TABLE `apprecier`
  ADD PRIMARY KEY (`utilisateur_fk`,`ouvrage_fk`),
  ADD KEY `apprecier_ouvrage_fk_foreign` (`ouvrage_fk`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `t_auteur`
--
ALTER TABLE `t_auteur`
  ADD PRIMARY KEY (`auteur_id`);

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `t_editeur`
--
ALTER TABLE `t_editeur`
  ADD PRIMARY KEY (`editeur_id`);

--
-- Index pour la table `t_ouvrage`
--
ALTER TABLE `t_ouvrage`
  ADD PRIMARY KEY (`ouvrage_id`),
  ADD KEY `t_ouvrage_utilisateur_fk_foreign` (`utilisateur_fk`),
  ADD KEY `t_ouvrage_categorie_fk_foreign` (`categorie_fk`),
  ADD KEY `t_ouvrage_editeur_fk_foreign` (`editeur_fk`),
  ADD KEY `t_ouvrage_auteur_fk_foreign` (`auteur_fk`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_auteur`
--
ALTER TABLE `t_auteur`
  MODIFY `auteur_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `categorie_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_editeur`
--
ALTER TABLE `t_editeur`
  MODIFY `editeur_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_ouvrage`
--
ALTER TABLE `t_ouvrage`
  MODIFY `ouvrage_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `utilisateur_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apprecier`
--
ALTER TABLE `apprecier`
  ADD CONSTRAINT `apprecier_ouvrage_fk_foreign` FOREIGN KEY (`ouvrage_fk`) REFERENCES `t_ouvrage` (`ouvrage_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `apprecier_utilisateur_fk_foreign` FOREIGN KEY (`utilisateur_fk`) REFERENCES `t_utilisateur` (`utilisateur_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `t_ouvrage`
--
ALTER TABLE `t_ouvrage`
  ADD CONSTRAINT `t_ouvrage_auteur_fk_foreign` FOREIGN KEY (`auteur_fk`) REFERENCES `t_auteur` (`auteur_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_ouvrage_categorie_fk_foreign` FOREIGN KEY (`categorie_fk`) REFERENCES `t_categorie` (`categorie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_ouvrage_editeur_fk_foreign` FOREIGN KEY (`editeur_fk`) REFERENCES `t_editeur` (`editeur_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_ouvrage_utilisateur_fk_foreign` FOREIGN KEY (`utilisateur_fk`) REFERENCES `t_utilisateur` (`utilisateur_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

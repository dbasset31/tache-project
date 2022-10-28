-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 oct. 2022 à 02:50
-- Version du serveur : 10.6.7-MariaDB-2ubuntu1.1
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `task_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `chat_message` varchar(500) NOT NULL,
  `message_status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `from_user_id`, `to_user_id`, `chat_message`, `message_status`, `created_at`, `updated_at`) VALUES
(106, 3, 1, 'Salut', 'Read', '2022-10-08 17:05:48', '2022-10-08 17:05:48'),
(107, 1, 3, 'Hello', 'Read', '2022-10-08 17:05:54', '2022-10-08 17:05:54'),
(108, 1, 3, 'TEst', 'Read', '2022-10-08 17:06:01', '2022-10-08 17:06:05'),
(109, 3, 1, 'fdqsdsqd', 'Read', '2022-10-08 17:06:10', '2022-10-08 17:06:17'),
(110, 3, 1, 'fgssdf', 'Read', '2022-10-08 17:07:15', '2022-10-08 17:07:15'),
(111, 1, 3, 'sdfsdf', 'Read', '2022-10-08 17:07:20', '2022-10-08 17:07:20'),
(112, 3, 1, 'dfgfdg', 'Read', '2022-10-08 17:07:25', '2022-10-08 17:07:25'),
(113, 1, 3, 'dfgdfg', 'Read', '2022-10-08 17:07:27', '2022-10-08 17:07:27'),
(114, 3, 1, 'gdfgfdg', 'Read', '2022-10-08 17:08:21', '2022-10-08 17:08:21'),
(115, 1, 3, 'dfgfdg', 'Read', '2022-10-08 17:08:23', '2022-10-08 17:08:23'),
(116, 3, 1, 'fhdgfdfg', 'Read', '2022-10-08 17:09:25', '2022-10-08 17:09:25'),
(117, 1, 3, 'dfgdfgdfg', 'Read', '2022-10-08 17:09:38', '2022-10-08 17:09:38'),
(118, 1, 3, 'dfgd', 'Read', '2022-10-08 19:45:42', '2022-10-08 19:45:45'),
(119, 1, 3, 'gfdgfd', 'Read', '2022-10-08 20:20:08', '2022-10-08 20:26:10'),
(120, 3, 1, 'ssdfdsf', 'Read', '2022-10-08 20:26:12', '2022-10-08 20:26:14'),
(121, 1, 3, 'sdfsf', 'Read', '2022-10-08 20:26:16', '2022-10-08 20:26:16'),
(122, 1, 3, 'sfqsdsqd', 'Read', '2022-10-08 20:26:53', '2022-10-08 20:26:55'),
(123, 3, 1, 'dqsdsqd', 'Read', '2022-10-08 20:26:58', '2022-10-08 20:26:58'),
(124, 3, 1, 'dsqdsqd', 'Read', '2022-10-08 20:27:02', '2022-10-08 20:27:03'),
(125, 3, 1, 'fghgfhfghgfh', 'Read', '2022-10-08 20:27:11', '2022-10-08 20:27:11'),
(126, 3, 1, 'rrrrr', 'Read', '2022-10-08 20:27:15', '2022-10-08 20:27:18'),
(127, 3, 1, 'ygjghj', 'Read', '2022-10-08 20:56:37', '2022-10-08 20:56:37'),
(128, 3, 1, 'fgfdgfd', 'Read', '2022-10-08 20:59:23', '2022-10-08 20:59:40'),
(129, 3, 1, 'gfhfhfg', 'Read', '2022-10-08 20:59:43', '2022-10-08 20:59:43'),
(130, 3, 1, 'fghgfhgfh', 'Read', '2022-10-08 21:02:28', '2022-10-08 21:02:28'),
(131, 1, 3, 'ghfhgfh', 'Read', '2022-10-08 21:02:31', '2022-10-08 21:02:31'),
(132, 1, 3, 'cbvcvbvcbvc', 'Read', '2022-10-08 21:03:16', '2022-10-08 21:03:16'),
(133, 1, 3, 'cvbvcb', 'Read', '2022-10-08 21:03:27', '2022-10-08 21:03:27'),
(134, 1, 3, 'cbvbvcb', 'Read', '2022-10-08 21:03:33', '2022-10-08 21:03:33'),
(135, 1, 3, 'fghfgh', 'Read', '2022-10-08 21:06:14', '2022-10-08 21:06:14'),
(136, 3, 1, 'fhfghgfhgfh', 'Read', '2022-10-08 21:39:32', '2022-10-08 21:39:32'),
(137, 3, 1, 'fghgfhgfgfh', 'Read', '2022-10-08 21:39:34', '2022-10-08 21:39:34'),
(138, 1, 3, 'fghfghgfhgfh', 'Read', '2022-10-08 21:39:35', '2022-10-08 21:39:35'),
(139, 1, 3, 'fghfhfh', 'Read', '2022-10-08 21:39:37', '2022-10-08 21:39:37'),
(140, 1, 3, 'fghfghfgh', 'Read', '2022-10-08 21:39:38', '2022-10-08 21:39:38'),
(141, 3, 1, 'fghgfhgfh', 'Read', '2022-10-08 21:39:40', '2022-10-08 21:39:40'),
(142, 1, 4, 'Test', 'Not Send', '2022-10-09 13:54:32', '2022-10-09 13:54:32'),
(143, 1, 4, 'Hello', 'Not Send', '2022-10-09 13:54:54', '2022-10-09 13:54:54'),
(144, 1, 3, 'Bien ?', 'Read', '2022-10-09 13:55:07', '2022-10-09 13:55:07'),
(145, 1, 3, 'dfgfdg', 'Read', '2022-10-09 17:26:38', '2022-10-09 17:27:01'),
(146, 1, 3, 'fdsfs', 'Read', '2022-10-09 17:27:05', '2022-10-09 17:27:05'),
(147, 1, 3, 'hkhjkykjh', 'Read', '2022-10-09 17:27:34', '2022-10-09 17:27:34'),
(148, 1, 3, 'ghjghjhgghgj', 'Read', '2022-10-09 17:28:22', '2022-10-09 17:28:22'),
(149, 1, 3, 'dfgfdgf', 'Read', '2022-10-09 17:30:01', '2022-10-09 17:30:01'),
(150, 1, 3, 'fdgdfgf', 'Read', '2022-10-09 17:34:35', '2022-10-09 17:34:35'),
(151, 1, 3, 'gjghjghgh', 'Read', '2022-10-09 17:35:17', '2022-10-09 17:35:17'),
(152, 1, 3, 'gjghjhgjhg', 'Read', '2022-10-09 17:36:31', '2022-10-09 17:36:31'),
(153, 1, 3, ',,bn,nb,nb', 'Read', '2022-10-09 17:38:00', '2022-10-09 17:38:00'),
(154, 1, 3, 'bvcvbc', 'Read', '2022-10-09 17:39:32', '2022-10-09 17:39:32'),
(155, 1, 3, 'fghgfh', 'Read', '2022-10-09 17:39:43', '2022-10-09 17:39:43'),
(156, 1, 3, 'fghfhgfh', 'Read', '2022-10-09 17:40:12', '2022-10-09 17:40:12'),
(157, 1, 3, 'fghhgf', 'Read', '2022-10-09 17:40:17', '2022-10-09 17:40:17'),
(158, 1, 3, 'jghjghj', 'Read', '2022-10-09 17:40:23', '2022-10-09 17:40:23'),
(159, 3, 4, 'gjghjhg', 'Not Send', '2022-10-09 17:40:28', '2022-10-09 17:40:28'),
(160, 3, 1, 'gjhgjgj', 'Read', '2022-10-09 17:40:31', '2022-10-09 17:40:31'),
(161, 3, 1, 'gjgj', 'Read', '2022-10-09 17:40:35', '2022-10-09 17:40:35'),
(162, 1, 3, 'sfdsfsdfdfds', 'Read', '2022-10-09 17:41:49', '2022-10-09 17:41:49'),
(163, 1, 3, 'hfghhfh', 'Read', '2022-10-09 17:41:56', '2022-10-09 17:41:56'),
(164, 1, 3, 'ghjgfhgfh', 'Read', '2022-10-09 17:42:04', '2022-10-09 22:21:48'),
(165, 3, 1, 'aaaaa', 'Read', '2022-10-09 22:21:52', '2022-10-09 22:21:52'),
(166, 3, 1, 'xvccxv', 'Read', '2022-10-09 22:22:50', '2022-10-09 22:22:50'),
(167, 3, 1, 'xvcxvcxv', 'Read', '2022-10-09 22:23:09', '2022-10-09 22:23:09'),
(168, 3, 1, 'jghjghjhgj', 'Read', '2022-10-09 22:24:57', '2022-10-09 22:24:57'),
(169, 3, 1, 'fghgfhfh', 'Read', '2022-10-09 22:27:09', '2022-10-09 22:27:09'),
(170, 3, 1, 'gjhgjhghgj', 'Read', '2022-10-09 22:28:07', '2022-10-09 22:28:07'),
(171, 3, 1, 'ghjjhg', 'Read', '2022-10-09 22:28:15', '2022-10-09 22:28:15'),
(172, 1, 3, 'bcvbcvbcvb', 'Read', '2022-10-09 22:28:29', '2022-10-09 22:28:29'),
(173, 1, 3, 'cvbcbcvb', 'Read', '2022-10-09 22:28:32', '2022-10-09 22:28:32'),
(174, 1, 3, 'fhfhghfgh', 'Read', '2022-10-09 22:29:45', '2022-10-09 22:29:49'),
(175, 1, 3, 'gjghjgh', 'Read', '2022-10-09 22:30:17', '2022-10-09 22:30:17'),
(176, 1, 3, 'sdfdsfds', 'Read', '2022-10-09 22:30:59', '2022-10-09 22:30:59'),
(177, 1, 3, 'xvxvc', 'Read', '2022-10-09 22:33:34', '2022-10-09 22:33:34'),
(178, 1, 3, 'gfhgfhfgh', 'Read', '2022-10-09 22:34:47', '2022-10-09 22:34:47'),
(179, 1, 3, 'sdfdsf', 'Read', '2022-10-09 22:36:27', '2022-10-09 22:36:27'),
(180, 1, 3, 'sdfdsfdsfdsf', 'Read', '2022-10-09 22:38:39', '2022-10-09 22:38:39'),
(181, 1, 3, 'fdsfdsfdsf', 'Read', '2022-10-09 22:38:46', '2022-10-09 22:40:02'),
(182, 1, 3, 'dsfsdsdf', 'Read', '2022-10-09 22:40:07', '2022-10-09 22:40:07'),
(183, 1, 3, 'dsfsdfsdf', 'Read', '2022-10-09 22:40:12', '2022-10-09 22:40:19'),
(184, 1, 3, 'fdgfdg', 'Read', '2022-10-09 22:40:21', '2022-10-09 22:40:21'),
(185, 1, 3, 'dfgdfg', 'Read', '2022-10-09 22:40:25', '2022-10-09 22:40:27'),
(186, 1, 3, 'gfhgfhfg', 'Read', '2022-10-09 22:41:02', '2022-10-09 22:41:02'),
(187, 1, 3, 'gfdfgdfgfd', 'Read', '2022-10-09 22:41:22', '2022-10-09 22:43:45'),
(188, 1, 3, 'zerzrez', 'Read', '2022-10-09 22:44:09', '2022-10-09 22:44:09'),
(189, 1, 3, 'etreretr', 'Read', '2022-10-09 22:44:21', '2022-10-09 22:44:21'),
(190, 1, 3, 'fdgfgdg', 'Read', '2022-10-09 22:44:55', '2022-10-09 22:46:21'),
(191, 1, 3, 'dfgfdg', 'Read', '2022-10-09 22:46:20', '2022-10-09 22:46:21'),
(192, 1, 3, 'dfgfdgfdg', 'Read', '2022-10-09 22:46:27', '2022-10-09 22:46:27'),
(193, 1, 3, 'fgdgd', 'Read', '2022-10-09 22:46:33', '2022-10-20 20:11:23'),
(194, 3, 1, 'hfghgdfdgd', 'Read', '2022-10-20 20:11:52', '2022-10-20 20:15:03'),
(195, 3, 1, 'sdfdsfs', 'Read', '2022-10-20 20:14:40', '2022-10-20 20:15:03'),
(196, 3, 1, 'sdfsdf', 'Read', '2022-10-20 20:14:42', '2022-10-20 20:15:03'),
(197, 3, 1, 'gfdgd', 'Read', '2022-10-20 20:15:06', '2022-10-20 20:15:06'),
(198, 3, 1, 'gdfgdgfd', 'Read', '2022-10-20 20:16:36', '2022-10-20 20:16:42'),
(199, 3, 1, 'dfsdfdsf', 'Read', '2022-10-20 20:20:10', '2022-10-20 20:20:10'),
(200, 3, 1, 'dsfsdfsdf', 'Read', '2022-10-20 20:21:05', '2022-10-20 20:21:05'),
(201, 3, 1, 'qsdsqdqsd', 'Read', '2022-10-20 20:23:04', '2022-10-20 20:23:04'),
(202, 3, 1, 'gfhgfhgfh', 'Read', '2022-10-20 20:24:49', '2022-10-20 20:24:49'),
(203, 3, 1, 'fhggfh', 'Read', '2022-10-20 20:24:54', '2022-10-20 20:24:58'),
(204, 3, 1, 'dsfdsfdsf', 'Read', '2022-10-20 20:26:29', '2022-10-20 20:26:29'),
(205, 3, 1, 'dfdsfsdf', 'Read', '2022-10-20 20:28:15', '2022-10-20 20:28:15'),
(206, 3, 1, 'fsdfsdf', 'Read', '2022-10-20 20:29:09', '2022-10-20 20:29:09'),
(207, 3, 1, 'sdfdsfds', 'Read', '2022-10-20 20:29:14', '2022-10-20 20:29:16'),
(208, 3, 1, 'sfdsfdsfdfs', 'Read', '2022-10-20 20:29:23', '2022-10-20 20:29:23'),
(209, 3, 1, 'hfghfh', 'Read', '2022-10-20 20:31:40', '2022-10-20 20:31:40'),
(210, 3, 1, 'gfdgfdg', 'Read', '2022-10-20 20:33:20', '2022-10-20 20:33:20'),
(211, 3, 1, 'dgffdgdfg', 'Read', '2022-10-20 20:33:30', '2022-10-20 20:33:58'),
(212, 3, 1, 'dgfdgf', 'Read', '2022-10-20 20:34:15', '2022-10-20 20:34:15'),
(213, 3, 1, 'fgfdgfdg', 'Read', '2022-10-20 20:34:20', '2022-10-20 20:36:00'),
(214, 3, 1, 'fdsfdsfsfd', 'Read', '2022-10-20 20:35:56', '2022-10-20 20:36:00'),
(215, 3, 1, 'gfdgdg', 'Read', '2022-10-20 20:36:11', '2022-10-20 20:38:15'),
(216, 3, 1, 'fdggdg', 'Read', '2022-10-20 20:38:18', '2022-10-20 20:38:18'),
(217, 3, 1, 'dfgfdg', 'Read', '2022-10-20 20:38:22', '2022-10-20 20:38:28'),
(218, 3, 1, 'fgdfgfd', 'Read', '2022-10-20 20:40:09', '2022-10-20 20:40:09'),
(219, 1, 3, 'bcvbvc', 'Read', '2022-10-28 00:32:13', '2022-10-28 00:33:00');

-- --------------------------------------------------------

--
-- Structure de la table `chat_requests`
--

CREATE TABLE `chat_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','Approve','Reject') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chat_requests`
--

INSERT INTO `chat_requests` (`id`, `from_user_id`, `to_user_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 2, 'Approve', '2022-10-08 12:10:41', '2022-10-08 12:16:03'),
(10, 3, 1, 'Pending', '2022-10-08 12:44:33', '2022-10-08 12:44:33'),
(11, 3, 1, 'Pending', '2022-10-08 13:09:50', '2022-10-08 13:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `civilities`
--

CREATE TABLE `civilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `civilities`
--

INSERT INTO `civilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Madame', NULL, NULL),
(2, 'Monsieur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `logo`, `user_id`, `package_id`, `tel`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', 1, 1, NULL, NULL, NULL),
(3, 'test', 'img/default-logo.svg', 3, 1, '0155555555', '2022-10-08 10:39:04', '2022-10-08 10:39:04');

-- --------------------------------------------------------

--
-- Structure de la table `companies_options`
--

CREATE TABLE `companies_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companie_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `date_active` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `logs_mails`
--

CREATE TABLE `logs_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `objet_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_02_162617_create_companies', 1),
(6, '2022_07_02_162634_create_teams', 1),
(7, '2022_07_02_164035_create_packages', 1),
(8, '2022_07_02_164257_create_options', 1),
(9, '2022_07_02_164414_create_companies_options', 1),
(10, '2022_07_02_172004_create_tasks', 1),
(11, '2022_07_02_172459_create_priorities', 1),
(12, '2022_07_02_172538_create_statuts', 1),
(13, '2022_07_02_172638_create_logs_mails', 1),
(14, '2022_07_02_173459_create_invitations', 1),
(15, '2022_07_02_174914_update_companies', 1),
(16, '2022_07_02_174933_update_teams', 1),
(17, '2022_07_02_175020_update_companies_options', 1),
(18, '2022_07_02_175046_update_tasks', 1),
(19, '2022_07_02_175121_update_invitations', 1),
(20, '2022_07_02_205217_create_civilities', 1),
(21, '2022_07_02_205237_update_users', 1);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, '0 à 50', 0.00, NULL, NULL),
(2, '51 à 100', 3.00, NULL, NULL),
(3, '101 à 250', 4.50, NULL, NULL),
(4, '251 ou plus', 9.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basse', NULL, NULL),
(2, 'Normale', NULL, NULL),
(3, 'Haute', NULL, NULL),
(4, 'Urgente', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'En cours', NULL, NULL),
(2, 'Terminée', NULL, NULL),
(3, 'Annulée', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `statut_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `companie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `deadline`, `user_id`, `statut_id`, `priority_id`, `companie_id`, `created_at`, `updated_at`) VALUES
(6, 'fgftghfg', 'gjtuyt', NULL, 1, 2, 1, 1, '2022-10-08 07:05:08', '2022-10-08 07:05:08'),
(7, 'ftdghgdf', 'dfgfdgdfg', NULL, 3, 1, 1, 3, '2022-10-08 10:41:45', '2022-10-08 10:41:45');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `companie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `name`, `user_id`, `companie_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_activite` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `civility_id` bigint(20) UNSIGNED NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `connection_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_status` enum('Offline','Online') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `email_verified_at`, `password`, `color`, `team_id`, `date_activite`, `active`, `remember_token`, `token`, `created_at`, `updated_at`, `civility_id`, `quality`, `tel`, `companie_id`, `connection_id`, `user_status`) VALUES
(1, 'Basset', 'donovan', 'emerald-dream@live.fr', NULL, '$2y$10$lEFSzXZ.QhHgfSqsYFOjs.BnZcml7PSQDnrghKxDyc7WGREwxYV/e', '#29d6a2', 1, '2022-10-28 00:49:16', 1, '6HvGsQgDZWA8EsdTFuzm2m7ZIE0i42HkPwYoXvDmTbJ1l80ji8Yc1vNBb59a', '1edd41dae16111bbceb3b2f2b00f840f', '2022-10-07 20:16:02', '2022-10-27 22:49:16', 2, NULL, NULL, 1, 0, 'Offline'),
(3, 'test2', 'test2', 'dono.basset@free.fr', NULL, '$2y$10$m3GpL02fqAcFRaRe5hq5m.SxQeYGbLHIF5sxUlq38ZNBCko4e1Y8q', '#d92020', NULL, '2022-10-28 00:33:03', 1, 'EpY9B013cCRwAlXgbuedwKMpMacjpKTIPtV6kgivrr8zuuXkuLu2vIvxfftw', 'f8b6783d36e634c952305ecdaef7c3c8', '2022-10-08 10:39:04', '2022-10-27 22:33:03', 1, NULL, NULL, 1, 0, 'Offline'),
(4, 'testttttt', 'testttttt', 'sdfsdf@sfdsdf.fr', NULL, '147', 'sfd', NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 'Offline');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat_requests`
--
ALTER TABLE `chat_requests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `civilities`
--
ALTER TABLE `civilities`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `companies_name_unique` (`name`) USING BTREE,
  ADD KEY `companies_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `companies_package_id_foreign` (`package_id`) USING BTREE;

--
-- Index pour la table `companies_options`
--
ALTER TABLE `companies_options`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `companies_options_companie_id_foreign` (`companie_id`) USING BTREE,
  ADD KEY `companies_options_option_id_foreign` (`option_id`) USING BTREE;

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Index pour la table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `invitations_team_id_foreign` (`team_id`) USING BTREE;

--
-- Index pour la table `logs_mails`
--
ALTER TABLE `logs_mails`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `packages_name_unique` (`name`) USING BTREE;

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Index pour la table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `tasks_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `tasks_statut_id_foreign` (`statut_id`) USING BTREE,
  ADD KEY `tasks_priority_id_foreign` (`priority_id`) USING BTREE,
  ADD KEY `tasks_companie_id_foreign` (`companie_id`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `teams_user_id_foreign` (`user_id`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `users_civility_id_foreign` (`civility_id`) USING BTREE,
  ADD KEY `users_companie_id_foreign` (`companie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `chat_requests`
--
ALTER TABLE `chat_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `civilities`
--
ALTER TABLE `civilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `companies_options`
--
ALTER TABLE `companies_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs_mails`
--
ALTER TABLE `logs_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `companies_options`
--
ALTER TABLE `companies_options`
  ADD CONSTRAINT `companies_options_companie_id_foreign` FOREIGN KEY (`companie_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `companies_options_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`);

--
-- Contraintes pour la table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_companie_id_foreign` FOREIGN KEY (`companie_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `tasks_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`),
  ADD CONSTRAINT `tasks_statut_id_foreign` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_civility_id_foreign` FOREIGN KEY (`civility_id`) REFERENCES `civilities` (`id`),
  ADD CONSTRAINT `users_companie_id_foreign` FOREIGN KEY (`companie_id`) REFERENCES `companies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

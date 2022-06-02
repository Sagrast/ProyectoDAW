-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2022 at 05:26 PM
-- Server version: 8.0.28
-- PHP Version: 7.4.28

DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE IF NOT EXISTS proyecto;

USE proyecto;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Cafe'),
(2, NULL, NULL, 'Tabaco'),
(3, NULL, NULL, 'Agua'),
(4, NULL, NULL, 'Distribucion');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CIF` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio` enum('Tabaco','Agua','Cafe','Snacks') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `direccion`, `CIF`, `nombre`, `servicio`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, '13 Rue del Percebe', '21154622E', 'Bar Budo', 'Tabaco', '555 24142', 'bar@budo.es', '2022-03-13 13:22:44', '2022-03-13 13:22:44'),
(3, '14 Rue del Percebe', '123456789', 'Bar Tola', 'Tabaco', '555 24142', 'bar@tola.es', '2022-03-13 13:23:38', '2022-03-13 13:23:38'),
(4, 'Calle Pacharan 4', '14452421', 'Alcoholicos Anonimos', 'Agua', '555 12312', 'abstemios@unidos.gal', '2022-03-13 13:23:56', '2022-03-13 13:23:56'),
(5, 'Calle Indeterminada 4', 'B-003143', 'Recreativos Paco', 'Snacks', '555 303510', 'paco@recreativos.alg', '2022-03-13 13:24:20', '2022-03-13 13:24:20'),
(6, 'Calle del Rúben 3', 'B-5436232', 'AdvancedGames', 'Cafe', '555 3158', 'games@advanced.gal', '2022-03-13 14:48:19', '2022-03-13 14:48:19'),
(7, 'Calle Perdida 5', 'B-4533252', 'DonPTickets', 'Cafe', '555 7767', 'DonP@Security.ofc', '2022-03-13 15:25:05', '2022-03-13 15:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `client_machine`
--

CREATE TABLE `client_machine` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `instalacion` date NOT NULL,
  `retirada` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_machine`
--

INSERT INTO `client_machine` (`id`, `client_id`, `machine_id`, `instalacion`, `retirada`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-13', NULL, NULL, NULL),
(2, 3, 2, '2022-03-13', NULL, NULL, NULL),
(3, 4, 4, '2022-03-13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_user`
--

CREATE TABLE `client_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `Albaran` int NOT NULL,
  `Fecha` date NOT NULL,
  `MotivoVisita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `failures`
--

CREATE TABLE `failures` (
  `id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio` enum('cafe','tabaco','snacks','agua') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failures`
--

INSERT INTO `failures` (`id`, `descripcion`, `servicio`, `created_at`, `updated_at`) VALUES
(1, 'Sin Cambio', 'tabaco', '2022-03-13 13:33:28', '2022-03-13 13:33:28'),
(2, 'Sin Cambio', 'cafe', '2022-03-13 13:33:35', '2022-03-13 13:33:35'),
(3, 'Averia Volumétrico', 'cafe', '2022-03-13 13:33:58', '2022-03-13 13:33:58'),
(4, 'Fallo de Selector', 'tabaco', '2022-03-13 13:34:14', '2022-03-13 13:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `failure_machine`
--

CREATE TABLE `failure_machine` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha` date NOT NULL,
  `status` enum('Arreglado','Pendiente') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `failure_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failure_machine`
--

INSERT INTO `failure_machine` (`id`, `created_at`, `updated_at`, `fecha`, `status`, `machine_id`, `failure_id`) VALUES
(2, NULL, NULL, '2022-03-15', 'Arreglado', 1, 4),
(3, NULL, NULL, '2022-03-23', 'Pendiente', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `labelName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `created_at`, `updated_at`, `labelName`, `color`) VALUES
(1, NULL, NULL, 'tabaco', 'pink'),
(2, NULL, NULL, 'agua', 'yellow'),
(3, NULL, NULL, 'distribucion', 'purple'),
(4, NULL, NULL, 'servicios', 'pink'),
(5, NULL, NULL, 'calidad', 'pink'),
(6, NULL, NULL, 'cafe', 'blue'),
(7, NULL, NULL, 'vending', 'pink'),
(8, NULL, NULL, 'eficiencia', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `label_nodo`
--

CREATE TABLE `label_nodo` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nodo_id` bigint UNSIGNED NOT NULL,
  `label_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_nodo`
--

INSERT INTO `label_nodo` (`created_at`, `updated_at`, `nodo_id`, `label_id`) VALUES
(NULL, NULL, 1, 2),
(NULL, NULL, 1, 7),
(NULL, NULL, 2, 1),
(NULL, NULL, 2, 6),
(NULL, NULL, 3, 1),
(NULL, NULL, 3, 5),
(NULL, NULL, 4, 4),
(NULL, NULL, 4, 8),
(NULL, NULL, 5, 2),
(NULL, NULL, 5, 6),
(NULL, NULL, 6, 2),
(NULL, NULL, 6, 8),
(NULL, NULL, 7, 3),
(NULL, NULL, 7, 6),
(NULL, NULL, 8, 4),
(NULL, NULL, 8, 6),
(NULL, NULL, 9, 4),
(NULL, NULL, 9, 6),
(NULL, NULL, 10, 4),
(NULL, NULL, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` bigint UNSIGNED NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('tabaco','agua','cafe','snacks','combi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lectura` int NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('disponible','produccion','averiada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `marca`, `modelo`, `tipo`, `lectura`, `serial`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Azkoyen', 'Max-35', 'tabaco', 0, '09431', 'produccion', '2022-03-13 13:24:51', '2022-03-13 13:29:28'),
(2, 'Jofemar', 'Goya', 'tabaco', 0, '094315', 'produccion', '2022-03-13 13:25:13', '2022-03-13 13:29:38'),
(3, 'Necta', 'Colibri', 'cafe', 4324, '53253', 'disponible', '2022-03-13 13:25:34', '2022-03-13 13:25:34'),
(4, 'Necta', 'AguaViva', 'agua', 0, '515', 'produccion', '2022-03-13 13:26:00', '2022-03-13 13:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `machine_product`
--

CREATE TABLE `machine_product` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `fechaCarga` date NOT NULL,
  `unidades` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine_snacks`
--

CREATE TABLE `machine_snacks` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `espirales` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine_tobaccos`
--

CREATE TABLE `machine_tobaccos` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `carriles` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_tobaccos`
--

INSERT INTO `machine_tobaccos` (`id`, `created_at`, `updated_at`, `machine_id`, `carriles`) VALUES
(1, '2022-03-13 13:24:51', '2022-03-13 13:24:51', 1, 35),
(2, '2022-03-13 13:25:13', '2022-03-13 13:25:13', 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `machine_waters`
--

CREATE TABLE `machine_waters` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `aguaCaliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_waters`
--

INSERT INTO `machine_waters` (`id`, `created_at`, `updated_at`, `machine_id`, `aguaCaliente`) VALUES
(1, '2022-03-13 13:26:00', '2022-03-13 13:26:00', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_02_13_133533_create_categories_table', 1),
(10, '2022_02_15_092002_create_sessions_table', 1),
(11, '2022_02_16_204310_create_nodos_table', 1),
(12, '2022_02_16_204321_create_labels_table', 1),
(13, '2022_02_16_212758_create_label_nodo_table', 1),
(14, '2022_02_19_163719_create_vehicles_table', 1),
(15, '2022_02_20_110450_create_user_vehicle_table', 1),
(16, '2022_02_22_124201_create_clients_table', 1),
(17, '2022_02_22_125120_create_client_user_table', 1),
(18, '2022_02_23_095124_create_machines_table', 1),
(19, '2022_02_23_100317_create_client_machine_table', 1),
(20, '2022_02_23_202911_create_products_table', 1),
(21, '2022_02_24_084738_create_failures_table', 1),
(22, '2022_02_28_132622_create_machine_product_table', 1),
(23, '2022_03_07_205752_create_perfils_table', 1),
(24, '2022_03_08_112453_create_machine_tobaccos_table', 1),
(25, '2022_03_08_112520_create_machine_snacks_table', 1),
(26, '2022_03_08_112527_create_machine_waters_table', 1),
(27, '2022_03_13_141745_create_failure_machine_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nodos`
--

CREATE TABLE `nodos` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contidoHTML` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nodos`
--

INSERT INTO `nodos` (`id`, `created_at`, `updated_at`, `titulo`, `subtitulo`, `contidoHTML`, `data`, `img`, `user_id`, `category_id`) VALUES
(1, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'quidem', 'Laboriosam est excepturi est non odit. Voluptatem aut molestiae minima.', 'Quaerat quos hic autem illum provident iste. Ut vel aut aperiam enim dolorem autem. Eum natus consequatur vel sunt rerum aut aut. Pariatur in omnis dolor fugit accusantium ea labore sint. Eligendi corrupti deleniti accusantium neque vel. Itaque provident eius sit magni et sunt cum. Iste et et dolor numquam. Quo neque ut dolorem ut magnam iusto eveniet doloremque. Veritatis et qui in facilis enim quis. Occaecati eligendi non eveniet similique quos repellendus et quo. Est totam fugiat repudiandae quis. Molestias adipisci aperiam nobis labore velit vel. Hic qui alias ducimus amet. Consequatur magni velit vel doloribus id illum est aperiam. Autem saepe magnam nihil nihil esse repellat. Quia at quos modi officia assumenda inventore. Facere minima mollitia aliquid. Eum minus molestias non laborum voluptatem quasi modi. Nisi omnis et commodi aut eum. Ullam sit nisi est voluptatum quos et. Qui praesentium voluptates natus. Ex magni possimus eveniet velit quos. Sed vitae voluptas nihil suscipit ipsum suscipit. Ad fuga ut ut pariatur magnam. Iusto voluptatem expedita illum accusantium eligendi cupiditate adipisci ullam. Suscipit minima sunt quidem accusantium. Et ut expedita labore ut optio quos dignissimos quia. Rerum eos nostrum ut blanditiis ea. Aperiam asperiores alias recusandae mollitia et. Beatae non doloribus est quidem ipsam tenetur. Consequatur aut eius deserunt odio. Officia velit in quas omnis sit officia. Magnam aliquam atque et et. Est quia similique dolorem quaerat dolore sed nam. Soluta inventore mollitia magni non voluptatum. Aperiam consectetur voluptatibus quibusdam fugit animi praesentium dolores. Pariatur totam sed velit labore in quam iste reiciendis. Suscipit odio voluptatibus sit voluptas et ipsum sequi. Qui vel sit perspiciatis in laboriosam. Non facilis minima tempora rem autem praesentium qui. Fugit alias cum fugit aliquid. Autem sunt et illum rerum ut voluptatem voluptatem.', '2022-01-14', 'azkoyen-step.jpg', 2, 4),
(2, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'atque', 'Eius et non quia hic illum ut rerum. Sed sit quo ab est. Pariatur et ex quisquam dicta laborum.', 'Dolor voluptatum illum occaecati consequatur sint a. Nostrum autem quis non. Sint ut id nihil nihil possimus. Voluptatem nihil dolor aut exercitationem perferendis nihil. Ea eaque rerum magnam provident voluptate qui. Id magni quia tempora magnam ducimus quisquam. Consequuntur consequatur et ad excepturi autem ex libero debitis. Aspernatur sint sint aut et accusamus vel cumque. Tempore qui voluptatem aut quia voluptatem. Quod sit voluptatem sed repellendus ut error. Expedita non repudiandae ducimus beatae cupiditate asperiores alias consequuntur. Voluptas et incidunt quis aut eos voluptatibus consequuntur. Est eveniet ad maiores. Itaque commodi voluptas qui ea nobis. Sint molestiae perferendis aut natus laboriosam sapiente. Sit autem est non praesentium. Quidem tempora labore ut. Rerum quidem nobis nesciunt. Hic expedita aut aut. Aut illo quis deleniti in. Et sed aut ut maiores voluptate. Voluptatem iste reiciendis maiores consequatur. Neque voluptatem dolorem quae ab non. Voluptatibus recusandae blanditiis itaque dolor quam debitis accusamus. Architecto quisquam optio dolore repellat nihil. Quidem et aliquam aut voluptas veritatis ut. Ad rem ut qui ipsam excepturi eaque ducimus qui. Aliquam facere sed hic rem aut. Quaerat accusamus veritatis est accusantium cupiditate. Et eum adipisci eaque beatae. Corporis nihil a earum. Voluptatem ratione qui et. Facilis consequatur quo recusandae alias fuga enim earum ut. Consequuntur repellat eum quae recusandae maxime aliquam eaque. Expedita perferendis excepturi iure consequatur et unde. Rem laborum alias error debitis ab qui quia. Occaecati aliquam adipisci perspiciatis suscipit. Assumenda harum at quae sequi quo accusantium. Suscipit modi maxime repudiandae ullam ratione aut adipisci. Facere enim occaecati ducimus aut magni deserunt doloremque est. Architecto placeat explicabo cumque ratione qui quia et. Ea neque vel explicabo nemo voluptate.', '2021-12-16', 'botella.jpg', 1, 4),
(3, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'et', 'Atque debitis voluptatem sit porro. Sunt et nulla tempora corrupti sunt. Neque delectus quo harum.', 'Qui voluptas deserunt possimus dolor ratione nesciunt et. Fugiat amet dolor autem minus voluptas omnis. Quaerat minima distinctio rerum ut. Sequi iste voluptatem voluptatem dolores autem illum. Laudantium aut deserunt nisi maiores impedit repellendus. Quos eum aut eum aut. Voluptatum nisi autem facilis optio hic fugit officia ea. Eum consequatur impedit voluptas in molestias quo. Recusandae qui similique saepe quaerat et itaque. Neque et ea harum unde quibusdam ipsum rerum. Sed perferendis sed voluptas sequi aut. Quae enim iusto hic. Eum qui enim quo ut. Eligendi officiis ex iste labore est eaque ex. Rerum vitae officia illum aut cum. Excepturi rerum nobis est rerum minus. Voluptatum provident dolor deleniti quaerat. Quia cum maxime qui voluptatum. Impedit nemo ut dolore ut. Dolorem sapiente qui nulla esse voluptatem. Dicta natus sit ducimus deleniti in praesentium praesentium. Doloremque voluptas veniam placeat nihil cum iusto consectetur. Magni aperiam quaerat cupiditate aut. Qui optio labore nemo quo. Repellat et reprehenderit alias ut vitae cumque voluptatum deserunt. Odit ea ipsam aliquam expedita deserunt officia dolores quos. Totam porro quae et eos optio dolores. Est saepe odit nisi repellendus tempora esse fugit. Sunt sed enim adipisci omnis consequuntur repellat. Doloremque iusto debitis non perspiciatis officiis ipsam qui est. Enim non porro molestiae doloremque. Ipsa maiores ut numquam nam itaque. Harum non et non eius impedit blanditiis non. Omnis corrupti et incidunt iure in animi rerum maiores. Doloremque voluptatum consequuntur atque quam quidem aperiam veritatis laborum. Hic sit accusantium distinctio enim. Est commodi accusantium vitae. Nemo ut adipisci dolorum et voluptatem. Non eveniet porro quidem est quia accusamus. Illo asperiores est laborum. Quas est modi et cumque. Non at exercitationem molestiae totam quasi accusantium expedita. Facere aliquam aut illo temporibus.', '2021-12-06', 'botella.jpg', 17, 1),
(4, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'vel', 'Perferendis voluptates velit hic illo. Commodi sint vitae beatae a praesentium laborum.', 'Distinctio ratione qui ut et aut qui sunt. At occaecati in ipsam ut soluta. Et est quia minima est ducimus. Perspiciatis fugit sunt modi. Animi quae in aut quae animi laborum velit. Commodi sit numquam expedita ut eius sit. Quos odit sed enim quia. Qui quidem provident aspernatur nemo accusamus quo iure. Ut porro dolorem est nostrum asperiores. Voluptas nesciunt laborum nesciunt neque sequi inventore totam. Ad in quia consequatur expedita repellat minus. Neque ipsa rerum id. Necessitatibus aliquid quia ea quis eos ducimus. Consectetur veritatis quia dolorum tempore. Voluptate cum sed vero provident. Eaque molestiae dolorum molestias veniam autem consequatur alias quasi. Voluptas illo sed qui reprehenderit voluptas. Modi consequuntur id ut nihil omnis. Qui eligendi nobis architecto ex deleniti nostrum iure consequuntur. Amet eum nihil repellendus ut possimus. Consequuntur sequi pariatur odit est rerum rerum aut. Nam repellendus eaque omnis aut. Hic vero non consectetur dolor accusamus itaque. Ad officiis voluptas odio eos porro neque dolores. Quo nihil quaerat vel excepturi quia quos sit. Veritatis et minus amet corporis quam praesentium quibusdam mollitia. Quia accusamus consectetur voluptatem accusantium laboriosam est. Accusantium vitae ullam dolorem quis fugit. Id ut ex quae saepe libero nesciunt quas praesentium. Quae saepe ipsa sed. Pariatur iste dolor ex dolor quae quis. Suscipit quia eum et adipisci nemo. Est cum sapiente consequatur commodi explicabo voluptatibus voluptatibus. Aperiam tempora voluptates eum adipisci quaerat ad. Pariatur quia velit officiis dolor doloribus aut omnis animi. Laudantium doloremque ex non. Soluta nam officia in et illo sapiente deserunt. Voluptatem in quaerat aut repellat vel sit. Et qui molestias sunt accusamus aut.', '2021-08-22', 'botella.jpg', 10, 3),
(5, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'excepturi', 'Esse sit cum non sunt. Non inventore porro sit sit rem ad accusamus iure.', 'Occaecati et ut perspiciatis in nihil quod ut. Consequatur ratione aut tempora est et nulla. Exercitationem quaerat omnis vitae excepturi cupiditate consectetur. Explicabo eum dolorem quo qui praesentium soluta qui. Itaque vel qui sed in asperiores nihil molestiae. Necessitatibus alias consequuntur iure et quis voluptate. Blanditiis autem alias perferendis quibusdam nemo. Ipsam a error et. Ipsa voluptas repellendus facere ad adipisci totam. Quaerat molestiae veniam qui labore eligendi ad. Et qui voluptatem et dolorem. Omnis et hic voluptas enim. Unde voluptate aliquid officia quam. Vel adipisci sapiente consectetur eius nihil illum. Aut vero ullam iusto. Omnis consequatur et dolores sed rerum. Temporibus iure nesciunt qui doloribus. Quo officiis unde et. Quia quis veniam voluptatum vero qui facere molestias. Nulla quasi accusantium adipisci commodi nemo. Delectus incidunt magni quia totam sunt. Perferendis est explicabo ut quia blanditiis occaecati. Ut asperiores error voluptas. Itaque debitis facilis et quisquam numquam aliquid id nobis. Cupiditate perspiciatis rem sed facere vel. Recusandae ut ab nihil iure et sit. Quaerat sed est doloribus exercitationem soluta suscipit culpa. Sed sequi est blanditiis possimus facere blanditiis. Omnis consequatur quae omnis quam doloribus rerum. Qui et vitae ratione adipisci. Tempore dolorem voluptatem eos earum nihil eligendi quam. Fugiat provident culpa qui odio dolores sint. Quia libero eum architecto. Est cupiditate tenetur est voluptas voluptas harum quas nisi. Repellat ullam nisi unde praesentium repellendus tempora. Ab corrupti voluptatem eius officia velit qui. Cupiditate quaerat qui qui consequuntur. Nobis minima rerum maxime temporibus. Suscipit provident nobis eum consequuntur. Aperiam accusantium repudiandae consequuntur ea autem ab pariatur quae. Iusto sit consequatur in et. Laboriosam a omnis qui ipsum ut. Et repellendus est ut eum enim rerum ex.', '2022-02-24', 'azkoyen-step.jpg', 10, 2),
(6, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'aspernatur', 'Ipsam nostrum sed quo sit qui. Vel ea consequuntur odit quia.', 'Molestias esse ad consequuntur consectetur accusamus minus dolorem. Corrupti error ipsa perferendis velit error incidunt et cumque. Accusantium sint placeat sint aut temporibus dolor quasi. Dolor eos quod dolore. Et molestias ipsum architecto. Numquam accusamus tempore minus nesciunt quas commodi tempora sequi. Non cum est qui. Eos ut fugit autem placeat temporibus. Illo dignissimos nemo quam. Voluptatum inventore nesciunt veniam laboriosam sint voluptas. Est ipsam cumque beatae. Facilis minus omnis repellendus. Rerum qui occaecati doloremque et autem voluptas. Perferendis natus nostrum consequatur. Voluptatibus officia provident unde consequatur culpa doloremque vel. Autem distinctio quod quidem libero in. Aut sunt est voluptates ipsam cumque laboriosam laudantium architecto. Distinctio voluptates omnis voluptatem quia quo nam. Nesciunt et voluptatem laborum officia fuga ipsam et. Alias sed nemo magni. Eveniet reiciendis at ut consequatur sed. Nemo autem harum et et dolor praesentium. Quia quisquam aliquam et provident ea. Earum perferendis tempora ab quos est veritatis ut laboriosam. Iste enim vel cum est molestiae. Qui aut aut et eligendi rerum earum quia. In qui dignissimos quis velit. Quis aut eligendi sapiente est fugit omnis. Alias itaque vitae similique facere tempore veniam. Dicta aperiam in eos quia cum. Molestias a quia architecto ut. Deserunt sit aperiam qui consequuntur. Ut magni error nam officiis facere qui quidem. Pariatur repudiandae enim qui sed nulla id ex. Odit doloremque ut dignissimos explicabo et suscipit atque quo. Quod in commodi in error quo vero. In est dolor maiores molestias officiis consectetur. Atque exercitationem velit voluptates quis reiciendis voluptatem repellendus. Veritatis quas amet deserunt id quia ipsum aut. Beatae excepturi neque eos unde facilis autem ipsum. Id doloremque voluptatem vel dolor et esse. Qui enim esse laborum et est qui. Consectetur accusamus dolorem exercitationem quia non.', '2021-11-24', 'botella.jpg', 9, 2),
(7, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'ad', 'Repellendus dolores est quae et. Consectetur nulla ut qui dolor.', 'Distinctio qui sequi aspernatur voluptatem quo. Vel vero odit at voluptatem. Alias rem quaerat est repellendus dolor. Repudiandae ipsam dolores quo. Quas quidem nam ea sed dolor. Sit voluptatem aspernatur necessitatibus et facere sint aut. Reiciendis ipsum voluptas et vero esse. Veniam ipsam illum voluptas magni doloribus in. Libero necessitatibus temporibus commodi omnis. Iure impedit velit ex eius perferendis debitis. Hic voluptatem iste ut doloribus reprehenderit molestias. Porro minus voluptatum culpa sit. Consequatur magni sed quas nihil maxime. Impedit dolor nisi sequi rerum doloremque ex ex. Rerum deleniti consequatur sunt totam atque tempore voluptas voluptatum. Vel et ut et totam sunt. Fuga dolore sit perferendis sed. Quos nobis officia accusantium voluptatem perferendis voluptatem voluptas. Perspiciatis ea ut quas quo deleniti mollitia. Autem soluta est doloremque ut. Maxime eos sapiente quia praesentium voluptate et eos non. Ipsa atque reiciendis animi recusandae eum animi. Totam veritatis natus at ut nemo explicabo ut. Maxime debitis totam et id. Consequatur non eos suscipit debitis. Et perspiciatis perspiciatis et blanditiis et modi provident sed. Enim voluptatem voluptatem eum ut aperiam placeat. Esse hic sunt unde nihil omnis in. Culpa sed itaque est excepturi facilis sed qui non. Et dolore et et adipisci velit rem. Est repudiandae voluptatum autem nulla voluptas illum sequi praesentium. Aliquam sed est eligendi porro voluptates. Maiores sed et cupiditate ea. Sequi quis ab officia est non in vitae dolor. Doloremque dolorum iusto deserunt qui doloribus eveniet laborum rerum. Explicabo autem nam assumenda ullam ea quo voluptate. Qui quia ad dolorem quo dolore et quo. Magni sunt laboriosam totam beatae. Recusandae eos vitae cum magnam. Nemo excepturi numquam optio sit et veritatis nostrum.', '2021-11-16', 'logistica.jpg', 10, 2),
(8, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'qui', 'Doloremque ut ut a in ut itaque dicta. Odit error laudantium est velit eligendi nesciunt nam.', 'Dolor odit praesentium repudiandae ipsam dolorem aut ut. Corporis voluptatem inventore laudantium consequatur. Ut blanditiis est consequatur id exercitationem voluptas. Aut fuga id error accusamus laboriosam. Ad quidem perspiciatis explicabo perferendis reprehenderit. Commodi cum rerum totam aspernatur molestias. Debitis et odit provident quae itaque ipsa cum. Et perspiciatis dignissimos eos explicabo doloremque autem quos doloremque. Eum optio eum explicabo omnis maiores et voluptate ut. A quia voluptates neque magni. Ut rem odio distinctio quis voluptatum minima maiores esse. Nam qui pariatur possimus et voluptatum et non. Quos iste in perferendis facilis neque alias. Corrupti fugiat ipsum et ut. Quisquam voluptatum et cupiditate ipsam molestiae ullam molestiae. Deserunt id veniam adipisci sit dolorem eum consectetur. Aut aliquid ea error esse eaque quas quasi et. Ullam corporis voluptatem deserunt et assumenda numquam recusandae. Velit et nemo qui et cupiditate magni rerum quas. Possimus quisquam sint voluptatum quisquam voluptates magnam sed. Possimus ut aliquid sit corporis hic et. Rerum eum reprehenderit et dignissimos. Suscipit quas est vero doloremque quidem atque. Sed in et minus eaque architecto. Dolorum voluptatibus rerum voluptas ipsum. Modi iure amet maiores dolorum deleniti eos fuga distinctio. Maxime velit illo quia maiores similique. Tenetur dolores dolores ut. Voluptatibus rerum fugiat quidem libero sapiente eos harum. Sunt sunt atque veritatis autem. Mollitia non dolorem omnis quasi consectetur. Quibusdam non voluptate explicabo et deleniti rerum. Ut quo est qui dolores optio debitis nemo. Quasi est aut occaecati. Quo est sunt veritatis dolor. Eum eos in eligendi magni est quo. Cum vel quos fugit et. Totam architecto in perferendis tenetur sint eum ex. Ipsa voluptatem corrupti voluptatem harum. Sit et accusamus cupiditate molestiae assumenda non accusantium.', '2021-04-09', 'logistica.jpg', 6, 4),
(9, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'laborum', 'Ab voluptatem doloribus ipsum fuga est. Rerum illo dolore et.', 'Omnis minus nulla aut non iste aspernatur. Ullam consequatur sit corrupti quia. Placeat voluptate dolorem amet ex. Rem praesentium illum reprehenderit ipsum et exercitationem praesentium. Velit laudantium est hic dolorum rem et. Mollitia blanditiis quidem alias a ducimus aliquam. Est excepturi quaerat excepturi alias a. Provident tempora esse molestiae nihil. Maxime tenetur laborum nisi aut quibusdam iste. A sint iste quibusdam aut itaque. Officiis cumque voluptas impedit similique inventore. Expedita aperiam quam est eum. Similique molestias voluptatem cumque omnis laborum laboriosam et autem. Fugiat id libero neque. Accusantium voluptatem delectus molestias. Non incidunt ad sapiente aut. Repudiandae commodi aut voluptatem id commodi. Vel blanditiis sunt aut consectetur. Eius magnam laudantium aperiam aut eos sit quas. Rerum animi nam deleniti incidunt similique beatae. Provident et eum nobis mollitia suscipit nostrum. Impedit reiciendis nesciunt aspernatur. Aut omnis libero eum. Quos veniam doloremque quia ipsa doloremque minus. Fuga dolores autem aut et laborum eos fugiat occaecati. Blanditiis soluta placeat temporibus suscipit. Rerum quis aliquam dolor a. Recusandae nihil ipsum ullam qui facere illum. Vel reiciendis reiciendis iusto repudiandae. Quaerat sunt dolorum quam voluptatum nihil soluta. Sunt ut et aperiam voluptatem consequuntur animi fugiat. Possimus ut consectetur beatae sequi. Sit qui ex autem tenetur fuga perspiciatis consequatur. Necessitatibus quia qui iste est. Qui et officiis voluptatem nam rerum. Ut vel adipisci sequi nobis rerum. Aliquam voluptas sed deleniti est eligendi accusamus tempore. Quia natus ratione qui et sequi. Quia reprehenderit modi ut eos dolor. In saepe aliquam delectus consequatur. Aut et repudiandae quisquam ipsam nam et. Optio non provident qui iste eum.', '2021-05-23', 'logistica.jpg', 17, 4),
(10, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'commodi', 'Voluptas laboriosam quasi minus voluptatibus aut. Voluptatem nostrum eius ab.', 'Exercitationem iure ad ea dignissimos consequatur. Tempora quia ut dolores accusamus consequuntur. Voluptas culpa perferendis dolorum. Praesentium in dolorum fugit atque similique quaerat. Cumque rerum delectus aut ut est et. Ipsam possimus et consequatur cumque eveniet minus temporibus. Sit est natus aut eum eos. Soluta officiis suscipit voluptatem mollitia doloremque eveniet occaecati eius. Sit perspiciatis magnam iusto a magni. Ratione quod fugiat voluptatem eius ipsa. Tempora cupiditate harum magnam sit alias non. Facilis ad tempore beatae. Atque et nemo deleniti quam corporis. Quis aut ea molestiae est inventore voluptatum incidunt possimus. Quia ut ratione facere suscipit labore nulla quia. Tempore voluptate consequatur aut dolores doloremque. Eos maxime sunt sed adipisci. Temporibus ut necessitatibus voluptatibus eius quam et ex. Earum sed dolorem quo modi quasi unde. Provident qui rem nisi tempora. Voluptas earum modi totam sed similique provident fugiat. Non qui aut repellat excepturi odit tempora exercitationem perferendis. Id molestiae iste ipsum eos mollitia. Facere illo quidem atque debitis dolore. Nisi ducimus soluta debitis inventore exercitationem. Nam animi inventore numquam dolores sed. Enim hic ut accusamus. Iure nihil quia qui eos est et eos. Qui temporibus fugit animi natus ipsum. Dolorem laboriosam voluptatibus voluptatem consequuntur in sapiente nihil. Est vel dolores quaerat. Consequatur voluptatum eum et corrupti quasi dolorem qui ea. Nihil sed id excepturi aut vero est aut. Voluptatem ea molestiae veniam. Rerum earum quia recusandae doloribus. Non unde optio eaque vel commodi rerum. Sint eos voluptatum quasi molestiae qui non voluptatem. Molestias quia deserunt enim voluptatibus accusamus. Harum qui enim voluptas hic totam atque. Magni pariatur temporibus sed soluta hic non. Ad impedit cumque autem perspiciatis et corrupti. Est facere animi recusandae officiis. Aliquid ut quo rerum expedita.', '2022-01-03', 'cafe.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perfils`
--

CREATE TABLE `perfils` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `DNI` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Tabaco','Agua','Distribucion','Cafe','Snack') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `lote` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nombre`, `tipo`, `stock`, `fechaCaducidad`, `lote`, `created_at`, `updated_at`) VALUES
(1, 'Güinston', 'Tabaco', 2000, '2022-02-28', 3434, '2022-03-13 13:26:21', '2022-03-13 13:26:21'),
(2, 'Trucados', 'Tabaco', 2450, '2022-03-16', 22521, '2022-03-13 13:26:47', '2022-03-13 13:26:47'),
(3, 'Refresco Naranja', 'Snack', 54, '2022-03-15', 56756, '2022-03-13 13:27:11', '2022-03-13 13:27:11'),
(4, 'Chocolate', 'Cafe', 66, '2022-03-09', 665, '2022-03-13 13:28:18', '2022-03-13 13:28:18'),
(5, 'Garrafas Agua', 'Agua', 60, '2022-03-22', 42342, '2022-03-13 13:28:52', '2022-03-13 13:28:52'),
(6, 'Leche', 'Cafe', 44, '2022-03-02', 4234, '2022-03-13 13:29:08', '2022-03-13 13:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('s5YgmzpBPBXnsz3RJeHplAyMJb8Sys0z9B2hKvcK', 17, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaWhSbUZvYUZwT1RUanpJUThXQWExVlp2ekFHakdiUThMdkVES2FXVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9wcm95ZWN0by5lcy9jbGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTc7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ1dWNRMTN1RGdYOFVWNXFBSWNZOC4uTnJDNGdac2VBaW9oRUIwek9zQnJ0ejZ4czJVUEtRLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkNXVjUTEzdURnWDhVVjVxQUljWTguLk5yQzRnWnNlQWlvaEVCMHpPc0JydHo2eHMyVVBLUS4iO30=', 1647188720);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` enum('admin','empleado','comercial','cliente') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'Eduardo Cervántez Tercero', 'nfont@example.com', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'LjDxHTdWpq', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'comercial'),
(2, 'Ángela Caldera Segundo', 'cabrera.sandra@example.org', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XR89Ko6wjX', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(3, 'Unai Pelayo', 'mar82@example.net', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'IYBt1jPz3W', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'comercial'),
(4, 'Lic. Pilar Tijerina', 'olivia96@example.net', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'tEFbm8RRKA', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(5, 'Jimena Echevarría', 'alexandra.sotelo@example.com', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kO0ZZps5n1', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'comercial'),
(6, 'Vera Alonzo Tercero', 'lorena58@example.net', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kfBmTbMIzi', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(7, 'Alexia Villagómez', 'quezada.ignacio@example.org', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'zm8Arpel0I', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'comercial'),
(8, 'Julia Grijalva', 'ymarquez@example.com', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'H3JwcKl6hg', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(9, 'María Andrés', 'focampo@example.net', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'LGox9pevYa', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(10, 'Álvaro Lucas', 'pol29@example.com', '2022-03-13 13:18:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '9pgEt3AcUv', NULL, NULL, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'empleado'),
(11, 'Owen Feeney', 'johanna58@example.org', '2022-03-13 13:18:34', '$2y$10$J4pDp/SMCijuOOLa5eJinOYH.yOaMCWaUVfTo7p6QZFXB/qpT.NBK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(12, 'Kyle Spencer', 'godfrey.hamill@example.org', '2022-03-13 13:18:34', '$2y$10$Wg1qjXmQIepoM/UtchCnpuHxyyVpZGwGF/NTaG73cM1GjN.hjQ9EO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(13, 'Sigmund Keeling DVM', 'marlee.eichmann@example.net', '2022-03-13 13:18:34', '$2y$10$gjG0VtxnNZrbrSHKJJZJ0OkhTZqtlQ3s9YiqsQ6j9Lz7ZjEsY.V1G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(14, 'Yessenia Lubowitz', 'prince18@example.net', '2022-03-13 13:18:34', '$2y$10$UAz6orex2fBswAWM94hkZ.zgUwzhgghHvI5hLsdCXpB4vc45NtWxi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(15, 'Magnus Romaguera Jr.', 'arnoldo97@example.com', '2022-03-13 13:18:34', '$2y$10$0ktpts/AAe/P4v4D5bs6cea3ZYDdbQVJ3sUDcX07uPuRa/LAVxz.C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(16, 'Murray Block', 'uriah15@example.com', '2022-03-13 13:18:34', '$2y$10$jZtrSTw/HkuRi1GPOyIqZO5ghiJuVnmnyJANQhcr1bgztodW7QwsK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(17, 'OscarGM', 'admin@correo.es', NULL, '$2y$10$5ucQ13uDgX8UV5qAIcY8..NrC4gZseAiohEB0zOsBrtz6xs2UPKQ.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_vehicle`
--

CREATE TABLE `user_vehicle` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_vehicle`
--

INSERT INTO `user_vehicle` (`id`, `created_at`, `updated_at`, `user_id`, `vehicle_id`, `fecha`) VALUES
(1, NULL, NULL, 2, 1, NULL),
(2, NULL, NULL, 8, 1, NULL),
(3, NULL, NULL, 2, 2, NULL),
(4, NULL, NULL, 4, 2, NULL),
(5, NULL, NULL, 1, 3, NULL),
(6, NULL, NULL, 6, 3, NULL),
(7, NULL, NULL, 4, 4, NULL),
(8, NULL, NULL, 7, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometros` int NOT NULL,
  `itv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `created_at`, `updated_at`, `descripcion`, `matricula`, `kilometros`, `itv`) VALUES
(1, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'Jumpy', '3294CMS', 9123, '2021-04-03'),
(2, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'C-15', '5704CMS', 5777, '2022-03-10'),
(3, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'Berlingo', '4816CMS', 51405, '2021-10-26'),
(4, '2022-03-13 13:18:34', '2022-03-13 13:18:34', 'Berlingo', '5602CMS', 48847, '2022-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_cif_unique` (`CIF`);

--
-- Indexes for table `client_machine`
--
ALTER TABLE `client_machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_machine_client_id_foreign` (`client_id`),
  ADD KEY `client_machine_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `client_user`
--
ALTER TABLE `client_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_user_user_id_foreign` (`user_id`),
  ADD KEY `client_user_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `failures`
--
ALTER TABLE `failures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failure_machine`
--
ALTER TABLE `failure_machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failure_machine_machine_id_foreign` (`machine_id`),
  ADD KEY `failure_machine_failure_id_foreign` (`failure_id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `label_nodo`
--
ALTER TABLE `label_nodo`
  ADD KEY `label_nodo_nodo_id_foreign` (`nodo_id`),
  ADD KEY `label_nodo_label_id_foreign` (`label_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_product`
--
ALTER TABLE `machine_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_product_machine_id_foreign` (`machine_id`),
  ADD KEY `machine_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `machine_snacks`
--
ALTER TABLE `machine_snacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_snacks_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `machine_tobaccos`
--
ALTER TABLE `machine_tobaccos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_tobaccos_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `machine_waters`
--
ALTER TABLE `machine_waters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_waters_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodos_user_id_foreign` (`user_id`),
  ADD KEY `nodos_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfils_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_vehicle`
--
ALTER TABLE `user_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_vehicle_user_id_foreign` (`user_id`),
  ADD KEY `user_vehicle_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_machine`
--
ALTER TABLE `client_machine`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_user`
--
ALTER TABLE `client_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failures`
--
ALTER TABLE `failures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failure_machine`
--
ALTER TABLE `failure_machine`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `machine_product`
--
ALTER TABLE `machine_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine_snacks`
--
ALTER TABLE `machine_snacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine_tobaccos`
--
ALTER TABLE `machine_tobaccos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `machine_waters`
--
ALTER TABLE `machine_waters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nodos`
--
ALTER TABLE `nodos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_vehicle`
--
ALTER TABLE `user_vehicle`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_machine`
--
ALTER TABLE `client_machine`
  ADD CONSTRAINT `client_machine_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_machine_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_user`
--
ALTER TABLE `client_user`
  ADD CONSTRAINT `client_user_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `failure_machine`
--
ALTER TABLE `failure_machine`
  ADD CONSTRAINT `failure_machine_failure_id_foreign` FOREIGN KEY (`failure_id`) REFERENCES `failures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `failure_machine_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `label_nodo`
--
ALTER TABLE `label_nodo`
  ADD CONSTRAINT `label_nodo_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `label_nodo_nodo_id_foreign` FOREIGN KEY (`nodo_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `machine_product`
--
ALTER TABLE `machine_product`
  ADD CONSTRAINT `machine_product_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `machine_snacks`
--
ALTER TABLE `machine_snacks`
  ADD CONSTRAINT `machine_snacks_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `machine_tobaccos`
--
ALTER TABLE `machine_tobaccos`
  ADD CONSTRAINT `machine_tobaccos_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `machine_waters`
--
ALTER TABLE `machine_waters`
  ADD CONSTRAINT `machine_waters_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nodos`
--
ALTER TABLE `nodos`
  ADD CONSTRAINT `nodos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nodos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perfils`
--
ALTER TABLE `perfils`
  ADD CONSTRAINT `perfils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_vehicle`
--
ALTER TABLE `user_vehicle`
  ADD CONSTRAINT `user_vehicle_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_vehicle_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

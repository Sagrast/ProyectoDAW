-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-03-2022 a las 11:53:21
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Cafe'),
(2, NULL, NULL, 'Tabaco'),
(3, NULL, NULL, 'Agua'),
(4, NULL, NULL, 'Distribucion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CIF` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio` enum('Tabaco','Agua','Cafe','Snacks') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `direccion`, `CIF`, `nombre`, `servicio`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, '13 Rue del Percebe', '43445345F', 'Bar Budo', 'Tabaco', '555 12312', 'bar@budo.es', '2022-03-02 10:33:37', '2022-03-02 10:33:37'),
(2, '14 Rue del Percebe', '95453346C', 'Bar Tola', 'Tabaco', '555 303510', 'bar@tola.es', '2022-03-02 10:34:23', '2022-03-02 10:34:23'),
(3, 'Calle Falsa 1', '9434753F', 'Recreativos Paco', 'Snacks', '555 321321', 'paco@recreativos.alg', '2022-03-02 10:35:52', '2022-03-02 10:35:52'),
(4, 'Calle Indeterminada 4', '455464C', 'Oficina de Relleno', 'Cafe', '555 315841', 'noContestamos@nunca.es', '2022-03-02 10:37:07', '2022-03-02 10:37:07'),
(5, 'Calle Pacharan 4', '21154622E', 'Alcoholicos Anonimos', 'Agua', '555 24142', 'abstemios@unidos.gal', '2022-03-02 10:38:01', '2022-03-02 10:38:01'),
(6, 'Nueva de Caranza 149 Bajo', '32718205S', 'AC Informatica', 'Cafe', '981944614', 'info@acinformatica.es', '2022-03-04 15:14:39', '2022-03-04 15:14:39'),
(7, 'Avenida Castelao', '15687319E', 'paco', 'Cafe', '325689421', 'alberto@p.p', '2022-03-04 16:35:46', '2022-03-04 16:35:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_machine`
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
-- Volcado de datos para la tabla `client_machine`
--

INSERT INTO `client_machine` (`id`, `client_id`, `machine_id`, `instalacion`, `retirada`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-03-03', NULL, NULL, NULL),
(2, 7, 1, '2022-03-04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_user`
--

CREATE TABLE `client_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `Albaran` int NOT NULL,
  `Fecha` date NOT NULL,
  `MotivoVisita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `client_user`
--

INSERT INTO `client_user` (`id`, `user_id`, `client_id`, `Albaran`, `Fecha`, `MotivoVisita`, `created_at`, `updated_at`) VALUES
(1, 15, 7, 125687, '2022-03-16', 'probas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failures`
--

CREATE TABLE `failures` (
  `id` bigint UNSIGNED NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` enum('Arreglado','Pendiente') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labels`
--

CREATE TABLE `labels` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `labelName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `labels`
--

INSERT INTO `labels` (`id`, `created_at`, `updated_at`, `labelName`, `color`) VALUES
(1, NULL, NULL, 'tabaco', 'blue'),
(2, NULL, NULL, 'agua', 'purple'),
(3, NULL, NULL, 'distribucion', 'purple'),
(4, NULL, NULL, 'servicios', 'green'),
(5, NULL, NULL, 'calidad', 'red'),
(6, NULL, NULL, 'cafe', 'purple'),
(7, NULL, NULL, 'vending', 'pink'),
(8, NULL, NULL, 'eficiencia', 'blue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `label_nodo`
--

CREATE TABLE `label_nodo` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nodo_id` bigint UNSIGNED NOT NULL,
  `label_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `label_nodo`
--

INSERT INTO `label_nodo` (`created_at`, `updated_at`, `nodo_id`, `label_id`) VALUES
(NULL, NULL, 1, 4),
(NULL, NULL, 1, 6),
(NULL, NULL, 2, 2),
(NULL, NULL, 2, 7),
(NULL, NULL, 3, 1),
(NULL, NULL, 3, 7),
(NULL, NULL, 4, 4),
(NULL, NULL, 4, 6),
(NULL, NULL, 5, 1),
(NULL, NULL, 5, 6),
(NULL, NULL, 6, 1),
(NULL, NULL, 6, 8),
(NULL, NULL, 7, 4),
(NULL, NULL, 7, 6),
(NULL, NULL, 8, 2),
(NULL, NULL, 8, 7),
(NULL, NULL, 9, 3),
(NULL, NULL, 9, 5),
(NULL, NULL, 10, 4),
(NULL, NULL, 10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machines`
--

CREATE TABLE `machines` (
  `id` bigint UNSIGNED NOT NULL,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('tabaco','agua','cafe','snacks') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lectura` int NOT NULL,
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('disponible','produccion','averiada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `marca`, `modelo`, `tipo`, `lectura`, `serial`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Saeco', 'Dap-10', 'cafe', 0, '09431', 'produccion', '2022-03-02 10:38:40', '2022-03-04 16:36:34'),
(2, 'Azkoyen', 'Step-10', 'tabaco', 0, '09431', 'produccion', '2022-03-02 10:38:58', '2022-03-03 08:12:27'),
(3, 'Azkoyen', 'Max-35', 'tabaco', 0, '34252', 'disponible', '2022-03-02 10:39:15', '2022-03-02 10:39:15'),
(4, 'Saeco', 'Combi', 'snacks', 0, '094313', 'disponible', '2022-03-02 10:41:02', '2022-03-02 10:41:02'),
(5, 'Jofemar', 'Goya', 'tabaco', 0, '3455', 'disponible', '2022-03-03 09:23:13', '2022-03-03 09:23:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machine_product`
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

--
-- Volcado de datos para la tabla `machine_product`
--

INSERT INTO `machine_product` (`id`, `created_at`, `updated_at`, `machine_id`, `product_id`, `fechaCarga`, `unidades`) VALUES
(1, NULL, NULL, 2, 1, '2022-03-03', 2),
(2, NULL, NULL, 2, 2, '2022-03-03', 2),
(3, NULL, NULL, 2, 1, '2022-03-24', 0),
(4, NULL, NULL, 2, 2, '2022-03-24', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
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
(22, '2022_02_28_132622_create_machine_product_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE `nodos` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contidoHTML` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`id`, `created_at`, `updated_at`, `titulo`, `subtitulo`, `contidoHTML`, `data`, `img`, `user_id`, `category_id`) VALUES
(1, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'architecto', 'Rerum voluptas quo nisi autem est rerum. Eveniet ut quia repudiandae.', 'Dolor sit nisi excepturi itaque. Consequatur ad ex consequatur eius. Voluptas corrupti nobis tenetur commodi corrupti. Atque id animi ut aspernatur. Est dolorem nisi repellat ducimus. Occaecati itaque sint fugiat error. Ut quia ea et et iure. Consequatur sequi doloribus id cupiditate ut aut voluptatem. Iusto odit ratione et animi. Ut exercitationem sit similique et. Magni eligendi aspernatur illum omnis voluptate qui. Quod nihil saepe eos quo recusandae similique. Sint quod maiores fuga est sint porro. Doloremque qui atque cupiditate veniam ipsa nulla. Qui vero id adipisci aut labore dignissimos. Voluptatum sequi sit ut quas. Rerum qui natus esse ea et. Nobis magnam iure velit officia tenetur recusandae mollitia. Aut dicta itaque tempore incidunt laboriosam. Consequatur quo sit veniam omnis incidunt quod. Sunt consequuntur qui accusamus consequatur rerum quod ad. Omnis praesentium delectus omnis natus eligendi tempora. Tenetur sapiente ex alias minus officia optio. Commodi ea in quod perferendis nisi. Quis maiores veniam dolores distinctio ab consequatur vel. Nihil iusto omnis ut laudantium ab necessitatibus labore. Officia aliquid laudantium sit suscipit accusamus dolore quia neque. Esse harum dolorum dicta provident voluptatibus cupiditate commodi. Et nihil ut et. Placeat enim est quibusdam ullam ad. Corrupti quos a sit rerum quisquam. Alias id aut est eaque. Quos ipsum ex vero a earum quis. Rem expedita non beatae voluptas molestiae vel ipsum. Illo iusto pariatur ea quo. Necessitatibus ea dignissimos atque cupiditate et sed. Aut iusto exercitationem blanditiis dolores aut rerum. Veniam sunt aliquid doloribus deserunt est quam laudantium. Tempora et nihil in mollitia. Ducimus voluptatem doloremque tenetur mollitia nisi molestias. Accusamus minus esse quis assumenda fuga hic iusto. Ipsum aut ut veritatis ad maiores voluptas minima iusto.', '2021-10-19', 'azkoyen-step.jpg', 9, 1),
(2, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'nemo', 'Est quis iusto quae illum porro earum cupiditate. Dolores natus voluptatem distinctio.', 'Molestiae omnis esse et doloribus nihil non. Ab aut consequuntur nihil eos exercitationem provident. Recusandae necessitatibus et totam voluptatibus exercitationem. Inventore voluptas ut qui magni aliquam ipsa possimus. Soluta dolorum voluptatem harum facere quos est. Alias nemo enim repellat. Ad dolores officia eveniet ea quisquam eveniet repellat. Et dolores eos eum. Fugit eligendi ratione repellat illum delectus et dicta. Sequi rem perferendis voluptatem consequatur qui et. Qui molestiae corrupti id occaecati soluta quod. Quia itaque cum aut aspernatur molestiae sed. Earum quaerat iste cumque ut. Repellat impedit laudantium saepe itaque. Perferendis tempora deserunt exercitationem ut rerum sint voluptatem. Explicabo magni voluptates omnis quia. Nemo fuga autem esse quia voluptatibus. Voluptatem officia vel aut error delectus placeat. Qui sunt nobis beatae cupiditate sequi dolor laborum. Dolor reprehenderit molestiae corporis. Optio officia et numquam ut facere laboriosam. Quia incidunt voluptate qui repellendus porro. Laudantium aliquam enim ut fugit eum hic. Cupiditate natus aspernatur tempore unde. Totam labore quae sed dolorum. Laudantium nostrum et ullam provident dolorem. Qui consequuntur nostrum provident. Est commodi deleniti exercitationem adipisci aut qui. Nisi nobis voluptatum odio aliquid sunt dolorem placeat. Aut qui dolore sit omnis odit delectus qui. Eos impedit sunt alias saepe cupiditate eos. Laudantium qui expedita rerum in et quasi aut optio. Maiores rerum quasi veniam fugiat. Eum autem ut qui. Iure dolorum ipsa et cupiditate ad sunt. Exercitationem debitis sint numquam unde qui aut ratione cupiditate. Sit dolor quia aperiam sed sapiente. Omnis animi ad eveniet sunt. Deleniti veniam quod qui incidunt tempora explicabo. A corporis eligendi molestiae rem voluptatem tenetur nihil aut. Debitis atque veritatis quis sapiente. Ut et maxime eum. Vel quasi rem minus numquam quis ut. Placeat magnam earum magni rerum sunt et et.', '2021-07-03', 'azkoyen-step.jpg', 3, 4),
(3, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'est', 'A ut et est tempore. Incidunt aut minus est soluta quo ab omnis. Eum sunt eos libero impedit sed.', 'Omnis illo voluptas consequatur et. Magnam consequuntur qui et et ut. Et eius voluptatem ab perspiciatis. Corporis corrupti beatae doloribus quia veniam. Quo ut facere laborum dignissimos inventore. Molestias veritatis dolores nostrum aliquid impedit numquam sit ut. Dolore repellat rem tempore officia fuga quasi placeat. Adipisci beatae quisquam dolorem dolor ex voluptatum. Laboriosam qui et quasi voluptatem animi sapiente architecto consequuntur. Suscipit et repudiandae natus. Facere repellendus ut et laborum molestiae. Libero omnis perspiciatis cupiditate quae. Enim sint qui molestiae aut ut. Doloribus velit molestiae blanditiis. Et rerum fugit unde qui. Eius et non facilis placeat aspernatur. Consequatur magni amet nam voluptatem. In aut minus voluptas blanditiis quos est. Sed ullam sint molestiae. Sint voluptatem possimus est hic distinctio inventore dolorem voluptatem. Ratione et perspiciatis doloribus. Aspernatur esse eligendi aut et repellendus consequuntur sint repellendus. Omnis excepturi est enim dolores sapiente fuga. Dolores ratione et voluptatem voluptatibus consectetur. Sed ea omnis voluptas omnis cum ut omnis. Placeat sed sapiente voluptatem est aut laborum. Magnam voluptatem sit veritatis temporibus laudantium. Quam laborum eos corporis voluptatem laudantium. Et molestiae voluptate aut. Facilis molestias dolor laudantium qui labore ducimus. Perspiciatis qui molestiae ea et rem nemo quod. Ad ut expedita pariatur et dignissimos eum. Eos voluptatem nihil corrupti velit illo. Voluptatem veniam non fugiat provident vero qui animi. Incidunt odit illo corrupti minima nihil exercitationem. Alias velit eligendi debitis. Et qui aut est ipsum. Quos iure cupiditate vel quae alias in. Fuga commodi aut modi magnam. Sunt cumque et commodi. Quam minima excepturi iure non necessitatibus velit fugit. Qui sequi mollitia rerum sunt et voluptas. Fugiat eveniet quis quis et quas ipsam quo nesciunt. Ipsa sit molestiae quisquam sit ratione voluptatem illum.', '2021-03-14', 'cafe.jpg', 1, 4),
(4, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'velit', 'Dolor quaerat numquam ea dolores. Et maiores optio quaerat in. Sit veniam est alias sit.', 'Quibusdam ex facilis cum eveniet. Distinctio ex quasi earum repellat maiores odit. Amet consequatur voluptate adipisci non blanditiis. Magni sint nobis est autem ut. Voluptatibus ullam sint mollitia aut. Cumque qui nobis molestiae nam molestias consequatur quidem. Ab non quos voluptatem aut. Quae excepturi tempora provident et. Eos at odio occaecati rem. Ex perferendis et aperiam ratione doloremque. Eligendi qui quidem laudantium non aliquam. Optio dolor aliquam quae. Repudiandae aut vitae est ut est mollitia tempore. Praesentium tempore hic facere laboriosam explicabo libero quidem facilis. Vel unde soluta reprehenderit qui ducimus sint. Aut rerum hic fugit tempora rerum officia maiores. Beatae magnam non praesentium fugiat. Voluptas et odit nisi necessitatibus enim illo ut sequi. Consequuntur rerum ut consequatur nesciunt et autem vitae. Consequatur pariatur sed magni. Eius assumenda id quia asperiores. Quia eum suscipit laboriosam occaecati veniam sed ullam. Quis quisquam animi et dolor eligendi vel maiores cupiditate. Maxime sed sed hic omnis est a. Cum est cum quidem nisi eius perferendis saepe. Aut iusto alias voluptate beatae aperiam reprehenderit nostrum. Aut modi ipsa fugit sit. Quas blanditiis aut cum ut. Enim aliquid et excepturi numquam dolore ut consequatur. Et totam eum consequatur placeat. Nulla quis assumenda deleniti assumenda et assumenda tempora. Aut nisi ea libero omnis. Facilis ad debitis odit ut harum. Aut nemo enim explicabo facere cupiditate. Neque ut est voluptatem deleniti eligendi inventore. Nobis eaque placeat fuga sit quam. Voluptatem modi nobis minus eum incidunt. Tempore dignissimos ut veritatis voluptates. Rerum impedit enim qui impedit unde pariatur. Ab itaque et iusto cumque praesentium fugiat. Quam dolorem non excepturi esse voluptatum est. Libero corrupti et earum. Facere ea quasi dolores consequatur ipsa qui. At doloribus dolor corporis.', '2021-05-28', 'cafe.jpg', 7, 3),
(5, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'dolor', 'Et veritatis nihil atque rerum. Facilis quo facilis eum repellat ea. Consequatur omnis incidunt et.', 'Ratione sapiente alias neque accusamus deserunt atque quibusdam odio. Magnam qui est dicta id. Commodi iusto vel temporibus. Temporibus occaecati voluptatem non modi cupiditate asperiores cum. Sequi enim deserunt vel illum dignissimos asperiores assumenda. Sed iure libero voluptatem sed quis et. Qui perspiciatis sapiente blanditiis. Reprehenderit fuga assumenda sit reiciendis. Consectetur est assumenda quia enim aperiam veniam aspernatur consequatur. Qui voluptatem sit quis quam aliquid. Et animi ad et. Qui cupiditate et perspiciatis ipsam quae quis aut dolore. Sunt architecto omnis rerum voluptatem est. Tempora dolores voluptates nihil non asperiores ea minima. Quos quia eius saepe voluptates. Nesciunt suscipit et quod voluptas. Sit id minus ex quo eum sint cupiditate doloremque. Velit et incidunt cum enim deserunt est. Sed et maxime repudiandae. Omnis voluptas aut expedita quis ut ut a. Quia qui id eos eaque magnam vero doloremque. Dicta occaecati saepe qui quibusdam. Quidem ut ipsam est dolorem hic accusamus quo nulla. Et asperiores incidunt aut omnis eos maxime facilis placeat. Voluptatem aut omnis quisquam omnis est earum perferendis ut. Excepturi deleniti aut neque et vel. Aspernatur qui incidunt eveniet ipsam. Ut nemo velit et dolore. Consequatur architecto nulla sed ut est. Minima et sunt qui. Odit qui natus molestiae. Deleniti vel quae nobis. Harum qui ratione aut. Facilis temporibus est et autem tempore. Officia excepturi sit neque eveniet. Sapiente numquam ex voluptatem quo. Excepturi voluptatem soluta nemo sed reiciendis eveniet et. Laboriosam sequi qui repellendus voluptatibus quod ullam reprehenderit. Numquam voluptatum sit dolor reprehenderit eius quidem ex corporis. Voluptatem eligendi commodi laborum ut praesentium porro. Vel sit perspiciatis voluptate odio rerum dolor officiis dolor. Iste rerum aut minima qui nobis mollitia odio. Repudiandae sint voluptatum nesciunt sequi.', '2021-09-01', 'botella.jpg', 14, 1),
(6, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'quod', 'Mollitia ut deserunt dicta. Error sint eum aliquam et ab.', 'Odio distinctio sit non omnis enim. Voluptas esse dolores asperiores voluptatem totam. Dolores corrupti necessitatibus autem libero. Qui molestiae ut quas similique eos sed iure omnis. Minima dolorum et unde doloribus alias dolor. Et aut laudantium corrupti totam. Sequi sunt unde ipsa laudantium quo. Ipsum inventore maiores explicabo dolores quos. Voluptatem eligendi unde id omnis id. Quam cum expedita quae odit alias ad nihil culpa. Vel et autem exercitationem commodi asperiores. Vel aut amet dolores sed sed corporis quod. Blanditiis quasi a blanditiis aliquid quisquam dolores dolorem laborum. Perferendis sit dolor id quisquam quo perferendis. Nihil dolorum sed adipisci dignissimos quae. Repellendus ad repellat pariatur dolore voluptatibus eum voluptatibus eum. Ducimus asperiores sint sapiente odio architecto occaecati. Aliquam magni iure sit modi error voluptas. Fuga numquam asperiores eum qui maxime. Rerum harum voluptas autem sit sint. Consequuntur veniam consectetur vero vero. Sequi et id nesciunt culpa laborum in corrupti consequuntur. Sit qui sed numquam magni atque repudiandae. Et cum deserunt odit molestiae. Autem dolor molestias voluptatem ducimus id maxime fugit. Voluptas nemo dignissimos delectus corporis quis. Consequatur odio quis quam est dolor impedit. Iure esse iusto pariatur. Quisquam non veniam odit voluptas corrupti voluptatem ut similique. Cum minus veniam sequi sit dolore id. Autem delectus sit voluptatem fugiat. Id soluta quia omnis voluptatem. Nobis officia amet quibusdam doloribus natus assumenda maxime ipsa. Voluptas quia mollitia facilis odio. Eos sed velit et ut. Minus qui qui et non ut similique vero error. Alias similique nihil adipisci nesciunt omnis dolores. Et totam quas minima odio dolores. Eum est voluptas sit aliquid aut quasi atque. Sit ab reiciendis aperiam assumenda nam. Ipsa sunt est voluptatum omnis dolorum.', '2022-01-12', 'logistica.jpg', 10, 1),
(7, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'fugit', 'Nobis pariatur impedit eius reiciendis. In labore sed dolores totam. Nam omnis eius esse labore et.', 'Architecto ratione maxime at sunt omnis neque cum quia. Animi laudantium quia aut doloremque illum. Tempora velit aut ullam. Aspernatur natus nihil quia maxime. Ea amet quisquam quo sint perferendis iusto. Voluptatem rerum provident recusandae corrupti tempora. Omnis aperiam distinctio consequatur voluptate atque perferendis. Amet et dolorem dolores non id aut aperiam id. Unde incidunt perferendis deserunt rerum. Neque quos a eveniet et. Ducimus minima quos vel ea quia. Aut veniam neque excepturi quis cupiditate aut aliquid. Quae temporibus quis porro ex hic. Tenetur et molestiae iusto eius. Quaerat id pariatur atque maxime omnis. Ut rem et molestias aspernatur quo placeat. Accusantium eos quisquam et qui vel occaecati. Qui reprehenderit architecto magni consequuntur. Repellendus iure illum esse in. Sunt aliquid dolores adipisci dolorum velit optio. Repellendus ipsum sequi voluptatem ullam. Qui perferendis natus perspiciatis debitis consequatur commodi. In dolores adipisci occaecati. Quaerat qui veritatis blanditiis harum sapiente voluptas nobis. Eum neque maiores magnam corporis. Ut quis eveniet sit similique et expedita saepe. Vel repellendus consequatur facilis ea et possimus unde. Odio quas inventore perferendis. Est voluptas cupiditate quia dignissimos amet et est tempora. Molestias non officia qui et quasi voluptates. Nostrum enim rerum cupiditate assumenda aut. Et dolor commodi voluptatem eos consequatur ex soluta. Quia ut accusamus aliquam consequatur molestiae aut illo mollitia. Voluptatem autem reiciendis debitis distinctio dolores. Et sequi non consequuntur quia itaque suscipit. Aut necessitatibus voluptatem esse quidem sed molestiae. Exercitationem vero iure porro dolor voluptate minima itaque dolorum. Qui architecto eos iste illo soluta. Molestiae voluptates debitis placeat iure minus. Mollitia omnis nam ratione et sit in.', '2021-08-19', 'azkoyen-step.jpg', 4, 3),
(8, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'doloribus', 'Enim ut delectus incidunt ut quos corporis excepturi ea. Error non ut cumque quia esse nam aut.', 'Maiores quos excepturi ipsam distinctio vel. Vero nisi iure voluptatem ea qui iure distinctio. Autem repellat eius sint vitae impedit nemo tempore. Consequatur est exercitationem saepe iure at. Excepturi cumque blanditiis officiis enim iure adipisci expedita. Omnis consequuntur et quidem quis. Excepturi sapiente tempore est unde nihil est tenetur. Tempora expedita quaerat est necessitatibus repellat adipisci et pariatur. Eaque rerum velit maiores sit aperiam. Cupiditate accusamus iure rerum odit. Sunt possimus quos esse ut adipisci molestiae. Voluptates nam rerum nemo ex in. Soluta et quasi nulla dignissimos reiciendis eius enim. Ut nemo voluptate praesentium perferendis sed similique voluptatem. Temporibus consequatur sunt labore vero assumenda magni. Distinctio aspernatur sapiente non itaque blanditiis nihil in. Rerum tempore dolores et. Quo placeat voluptatem ducimus molestiae sit. Natus voluptatum et dolorum ducimus at quisquam iste eos. Illo natus nam inventore modi quo. Non ea voluptates et asperiores. Doloribus quasi adipisci dolorum quibusdam vitae fugit. Et qui explicabo sunt nulla id nostrum. Doloremque soluta dolor omnis iste delectus ut numquam sint. Rerum est blanditiis ut voluptates quisquam fuga est perspiciatis. Modi deserunt eos velit error libero dolores voluptatem. Consequatur et harum voluptatem. Quod non ipsam nulla facere. Aspernatur provident ea nulla aut aliquid asperiores fugiat. Eius voluptatum rerum sit sit adipisci. Molestiae sapiente qui placeat corrupti ipsum iure. Expedita autem et vel omnis est deserunt assumenda. Reiciendis voluptates voluptatem voluptas cum. Error amet dolorem quia recusandae id eveniet. Perferendis qui repellat at quae sit nostrum quis. In iusto neque sequi vel. Mollitia neque quia deserunt vitae ratione. Possimus dolores non possimus amet quas pariatur et. Est quidem animi quis nemo et perferendis. Tempora et sapiente et officiis et. Et officiis laboriosam omnis odit.', '2021-12-15', 'logistica.jpg', 16, 1),
(9, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'ad', 'Totam dolores dicta asperiores reprehenderit voluptas. Amet tenetur inventore facilis consequatur.', 'Nulla sapiente et in qui. Est omnis repellendus qui libero dolor. Eum aliquid a commodi neque vero praesentium nisi. Et nulla explicabo id voluptatum nisi. Suscipit nihil hic dolores cumque tempore et dolor. Voluptas est voluptate nesciunt ab saepe. Autem ea natus necessitatibus eum in. Doloribus porro porro sed voluptas similique. Unde officiis et animi sed velit ab. Laboriosam rerum repudiandae qui ut doloremque asperiores omnis. Et unde consequatur eius numquam et sunt. Dolorum quod possimus nihil nesciunt dicta voluptatem aspernatur. Sed eligendi eos dolorem est et quia. Quam alias ut ipsum. Repellat pariatur qui voluptate et. Qui alias non animi voluptas cum sit ipsum rerum. Optio assumenda debitis sunt voluptatem aut ut quasi. Ipsum qui error minima omnis ut beatae cum. Vero quis perferendis deleniti quos repellendus nam autem. Ut voluptatem dolores vel quas ea distinctio fugit. Explicabo blanditiis dolore voluptatem consequatur. Culpa corporis magnam ipsa dolor ut. Nihil atque voluptatem qui. Iure voluptates odit labore quos consequatur cum et. Ullam quo cum harum suscipit. Quia tempore beatae earum sunt laudantium recusandae eum omnis. In id est eos aliquam voluptatem omnis voluptas. Consequuntur est numquam consequatur repellendus velit. In quae qui ut tenetur laborum dolorem enim. Est cum aut a fugiat alias dolores fugit. Optio ducimus sunt sed velit praesentium iure. Eos consequuntur et facilis natus. Est deserunt dolor rem maxime qui. Est laudantium officiis dolor qui odio at dignissimos. Nulla hic perspiciatis ex maxime quod atque hic. Quia voluptas officia eos reprehenderit qui. Numquam voluptas quia soluta hic et. Voluptates dolorum ut excepturi maiores cumque omnis. Sunt animi dolorem repellat. Omnis praesentium dignissimos asperiores nihil alias minima et. Et ab molestias inventore minus deleniti non. Odio illum et autem rerum aspernatur. Quod aut soluta at et. Quod quo quibusdam in fuga. Officiis officiis sed qui ipsa.', '2021-11-03', 'cafe.jpg', 10, 2),
(10, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'atque', 'Alias quia veritatis omnis nulla voluptatem. Quam aut blanditiis et ut sit.', 'Nam impedit totam deleniti eum accusamus deserunt. Doloribus et animi eaque quis quibusdam inventore vel quasi. Placeat voluptatum aut aut maxime esse. Ut dolores ut ut. Aut velit quaerat tempora distinctio non reiciendis quisquam ut. Consequatur voluptas repudiandae fugiat voluptatibus. Ullam dolores itaque dolore rerum alias. Quis omnis veritatis quis in dolore id aliquam sit. Qui non voluptas tenetur quia ut maiores quia voluptas. Voluptatum voluptas ut quia rem. Iste sapiente dolor libero. Et nobis minus ducimus veritatis eligendi assumenda pariatur. Odio esse repudiandae explicabo sequi omnis corrupti eligendi. Omnis dolorem rem nemo nisi veniam. Dignissimos et qui necessitatibus eveniet sunt voluptas veritatis. Quas qui qui fugit. Aut ullam ea alias et harum et nostrum. Non incidunt perspiciatis est molestiae quod iusto. Quasi fugit non odio alias excepturi. Rerum numquam accusantium quidem ut odit consequatur. Omnis qui at modi voluptatem. Occaecati illo aliquam quisquam sequi voluptatem nihil. Ipsam expedita fugiat rerum. Beatae minima assumenda dolor qui. Recusandae similique occaecati voluptatem rerum perferendis nam enim aliquam. Amet cumque aut cum dolorum est assumenda provident aliquid. Molestiae cupiditate sit nesciunt minus et. Maxime quos expedita rem natus enim debitis. Quam praesentium consequatur quod nihil voluptatem. Assumenda omnis minima rerum autem nesciunt quos. Repellat excepturi exercitationem enim sequi et et. Ipsum veniam et officia. Ipsam illo tempora exercitationem autem aperiam veniam. Est voluptatum ut consequatur vel. Id doloremque explicabo aut omnis ratione tenetur veniam. Expedita saepe harum perferendis sed a. Rerum accusamus fuga deleniti velit. Laudantium omnis nihil provident qui. Sint similique ex dolor velit voluptas. Eum modi consequatur adipisci voluptatem sunt maxime consequatur.', '2021-09-17', 'azkoyen-step.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Tabaco','Agua','Distribucion','Cafe','Snack') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `lote` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `tipo`, `stock`, `fechaCaducidad`, `lote`, `created_at`, `updated_at`) VALUES
(1, 'Güinston', 'Tabaco', 298, '2022-03-03', 0, '2022-03-03 08:13:19', '2022-03-03 08:13:19'),
(2, 'Ducados', 'Tabaco', 475, '2022-03-17', 0, '2022-03-03 08:14:08', '2022-03-03 08:14:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4JpKG8sTxGQwbuji2K6SKjzJm6sPtNYy2JwijLtr', NULL, '193.144.97.111', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:97.0) Gecko/20100101 Firefox/97.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2JXSFFrUDQyeWVWWGlzZkYwTHdIVmJ3RTJQSDlpMEdkN0laZHhmSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9wcm95ZWN0by5lcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1646415023),
('5A70k1y5qPDIfcnOJ6WasZJaDvnaknO01ZkZDwj4', 17, '83.165.76.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoienhWUHlhVXVMMFl6a2VrOUJhcnYwenU3UG9YMWQ4ZjU3S1NnSVptTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9wcm95ZWN0by5lcy9tYWNoaW5lcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE3O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSjNlQW1xL25nZHBualZhdGxFMTFiZUdCa0JjUGU4NnZ5M0lSZ2Q2MnFwQTFORjlUbVkyU0ciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEozZUFtcS9uZ2RwbmpWYXRsRTExYmVHQmtCY1BlODZ2eTNJUmdkNjJxcEExTkY5VG1ZMlNHIjt9', 1646410510),
('Bt3Tf7bsTmqU4pBKAbMsAegc9JHa65tKZ3jzMVui', 17, '193.144.97.111', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:97.0) Gecko/20100101 Firefox/97.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiakQyMTBwRHBIc2xwYmw2YmpUWEltSTdqSUtrNnBNZ1VxdzJBaGEwYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9wcm95ZWN0by5lcy9uZXdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTc7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRKM2VBbXEvbmdkcG5qVmF0bEUxMWJlR0JrQmNQZTg2dnkzSVJnZDYycXBBMU5GOVRtWTJTRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSjNlQW1xL25nZHBualZhdGxFMTFiZUdCa0JjUGU4NnZ5M0lSZ2Q2MnFwQTFORjlUbVkyU0ciO30=', 1646415785),
('jeE58xBDOIUWzBXSxz1QVQpwdYWbVV02EBHo7esE', 17, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV0lUTVVJQ3l1d0JnVk1KcWFVQnEzbmtoRENYRFkyQU1ZbDNUM3NTVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9wcm95ZWN0by5lcy9pbmZvQ2xpZW50LzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEozZUFtcS9uZ2RwbmpWYXRsRTExYmVHQmtCY1BlODZ2eTNJUmdkNjJxcEExTkY5VG1ZMlNHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRKM2VBbXEvbmdkcG5qVmF0bEUxMWJlR0JrQmNQZTg2dnkzSVJnZDYycXBBMU5GOVRtWTJTRyI7fQ==', 1646649899),
('wKxE2dXUVdDoOWtGoynaBZNmQ5AlSiV4s4zBjUgz', 17, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVzBOMWE5SEVrVnBuYzV3bHFJTzZScUd3a2NnOENBdGJTUmxxT01WYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9wcm95ZWN0by5lcy9jbGllbnRzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTc7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRKM2VBbXEvbmdkcG5qVmF0bEUxMWJlR0JrQmNQZTg2dnkzSVJnZDYycXBBMU5GOVRtWTJTRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSjNlQW1xL25nZHBualZhdGxFMTFiZUdCa0JjUGU4NnZ5M0lSZ2Q2MnFwQTFORjlUbVkyU0ciO30=', 1646410609);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` enum('admin','empleado','comercial','cliente') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'Enrique Salvador', 'cavazos.asier@example.net', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '6B70hDJmH5', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(2, 'Dña Rosa María Varela Tercero', 'qcaraballo@example.com', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'SHzdLA704T', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(3, 'Encarnación Canales Hijo', 'rosa76@example.org', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'J3Ymo7SkIx', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(4, 'Jimena Mateo', 'gael72@example.org', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ZjmMjXUtZe', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(5, 'Dr. Alicia Vigil Tercero', 'alonso.garza@example.net', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'nygmTmcSH9', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(6, 'Adriana Marcos', 'miguel.ocampo@example.com', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Jyyae3D3e9', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(7, 'Gonzalo Gallego', 'mena.victor@example.com', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'cMbbU5XT0W', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(8, 'Dña Gloria Romo', 'scosta@example.com', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'h0DvUzhJWB', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(9, 'Miguel Estrada', 'rangel.adam@example.net', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4qtgKkc3S8', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(10, 'Erik Alemán', 'lsimon@example.net', '2022-03-02 10:32:19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'agtNHsBH0v', NULL, NULL, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'cliente'),
(11, 'Lorena Jast', 'nromaguera@example.org', '2022-03-02 10:32:19', '$2y$10$217Fiad/p8CumLuz/XLO0OTKQJ3OD4PXY2vCVPdgqV8VdZPPpCG6W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(12, 'Schuyler Bashirian', 'holly03@example.org', '2022-03-02 10:32:19', '$2y$10$lviZeb.CpikKUkjdP8DHueJ42KsjMozpY4.W2vzU5AQc4EPeFMpnK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(13, 'Prof. Justyn Kessler', 'casimir.macejkovic@example.net', '2022-03-02 10:32:19', '$2y$10$ZH5hGQ/wLLLxC/LW5ca9WOm49MgzS4rJSXfiftxezU8awU.han.Pi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(14, 'Bart Koepp MD', 'zmueller@example.com', '2022-03-02 10:32:19', '$2y$10$FaNaf8FWiiwaeVMIae3wY.1zN6cRuFQ86oVBDe4w/lQ18bC1UZGx.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(15, 'Anya Bahringer', 'mitchell.aryanna@example.net', '2022-03-02 10:32:19', '$2y$10$dHeiq0S89EUz5rdmS1jkp.T3e84ZrLMP7nKytW6t1e/ZE0owLx/bW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'empleado'),
(16, 'Prof. Zion Emard', 'harmon44@example.com', '2022-03-02 10:32:19', '$2y$10$ZM5xeV5ResKQGrdLKv7uveUxn0R/xWP.yPO6rm.5WsqBBnISYJSmW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'comercial'),
(17, 'OscarGM', 'admin@correo.es', NULL, '$2y$10$J3eAmq/ngdpnjVatlE11beGBkBcPe86vy3IRgd62qpA1NF9TmY2SG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_vehicle`
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
-- Volcado de datos para la tabla `user_vehicle`
--

INSERT INTO `user_vehicle` (`id`, `created_at`, `updated_at`, `user_id`, `vehicle_id`, `fecha`) VALUES
(1, NULL, NULL, 1, 1, NULL),
(2, NULL, NULL, 4, 1, NULL),
(3, NULL, NULL, 3, 2, NULL),
(4, NULL, NULL, 7, 2, NULL),
(5, NULL, NULL, 2, 3, NULL),
(6, NULL, NULL, 6, 3, NULL),
(7, NULL, NULL, 4, 4, NULL),
(8, NULL, NULL, 7, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometros` int NOT NULL,
  `itv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `created_at`, `updated_at`, `descripcion`, `matricula`, `kilometros`, `itv`) VALUES
(1, '2022-03-02 10:32:19', '2022-03-02 10:32:19', 'Jumpy', '2928CMS', 2728, '2021-09-02'),
(2, '2022-03-02 10:32:20', '2022-03-02 10:32:20', 'Jumpy', '7875CMS', 10955, '2021-10-11'),
(3, '2022-03-02 10:32:20', '2022-03-02 10:32:20', 'C-15', '0013CMS', 86102, '2021-10-02'),
(4, '2022-03-02 10:32:20', '2022-03-02 10:32:20', 'C-15', '7294CMS', 51653, '2021-09-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_cif_unique` (`CIF`);

--
-- Indices de la tabla `client_machine`
--
ALTER TABLE `client_machine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_machine_client_id_foreign` (`client_id`),
  ADD KEY `client_machine_machine_id_foreign` (`machine_id`);

--
-- Indices de la tabla `client_user`
--
ALTER TABLE `client_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_user_user_id_foreign` (`user_id`),
  ADD KEY `client_user_client_id_foreign` (`client_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `failures`
--
ALTER TABLE `failures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failures_machine_id_foreign` (`machine_id`);

--
-- Indices de la tabla `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `label_nodo`
--
ALTER TABLE `label_nodo`
  ADD KEY `label_nodo_nodo_id_foreign` (`nodo_id`),
  ADD KEY `label_nodo_label_id_foreign` (`label_id`);

--
-- Indices de la tabla `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `machine_product`
--
ALTER TABLE `machine_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_product_machine_id_foreign` (`machine_id`),
  ADD KEY `machine_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodos_user_id_foreign` (`user_id`),
  ADD KEY `nodos_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_vehicle`
--
ALTER TABLE `user_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_vehicle_user_id_foreign` (`user_id`),
  ADD KEY `user_vehicle_vehicle_id_foreign` (`vehicle_id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `client_machine`
--
ALTER TABLE `client_machine`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `client_user`
--
ALTER TABLE `client_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failures`
--
ALTER TABLE `failures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `machine_product`
--
ALTER TABLE `machine_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `nodos`
--
ALTER TABLE `nodos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `user_vehicle`
--
ALTER TABLE `user_vehicle`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `client_machine`
--
ALTER TABLE `client_machine`
  ADD CONSTRAINT `client_machine_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_machine_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `client_user`
--
ALTER TABLE `client_user`
  ADD CONSTRAINT `client_user_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `failures`
--
ALTER TABLE `failures`
  ADD CONSTRAINT `failures_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `label_nodo`
--
ALTER TABLE `label_nodo`
  ADD CONSTRAINT `label_nodo_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `label_nodo_nodo_id_foreign` FOREIGN KEY (`nodo_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `machine_product`
--
ALTER TABLE `machine_product`
  ADD CONSTRAINT `machine_product_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD CONSTRAINT `nodos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nodos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_vehicle`
--
ALTER TABLE `user_vehicle`
  ADD CONSTRAINT `user_vehicle_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_vehicle_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

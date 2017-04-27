-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2017 às 23:25
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

--
-- Extraindo dados da tabela `criancas`
--

INSERT INTO `criancas` (`id`, `nomecompleto`, `datanascimento`, `foto`, `mae`, `contato`, `sexo`, `projeto_id`, `created_at`, `updated_at`) VALUES
(1, 'Luis Felipe Lessa Mesquita', '15/11/2007', '', 'Maria da Conceição Pinto Lessa', '(85) 8769-2740', 1, 2, '2017-04-23 17:40:55', '2017-04-28 00:18:43'),
(2, 'Rianna de Oliveira Fernandes Vasconcelos', '17/03/2013', '', 'Amanda Fátima de Oliveira', '(85) 8610-3158', 1, 2, '2017-04-23 17:41:49', '2017-04-23 17:41:49'),
(3, 'Alberto Jorge de Carvalho', '17/09/2013', '', 'Hianna de Carvalho Queiroz Lima', '(85) 8940-4634', 0, 2, '2017-04-23 17:46:00', '2017-04-23 17:46:00'),
(4, 'Maria Gabriele Marques de Abreu', '17/04/2012', '', 'Maria Marques de Abreu', '(85) 9961-8411', 1, 2, '2017-04-23 17:47:11', '2017-04-23 17:47:11'),
(5, 'Maria Julia Alves Ferreira', '08/02/2012', '', 'Isabelle Luany Alves', '(85) 8894-6967', 1, 2, '2017-04-23 17:48:16', '2017-04-23 17:48:16'),
(6, 'Ana Livia Ferreira Pereira', '18/02/2010', '', 'Crislaine Ferreira Lessa', '(85) 8528-3349', 1, 2, '2017-04-23 17:49:41', '2017-04-23 17:49:41'),
(7, 'Antony Lahan Melo de Barros', '21/08/2010', '', 'Marcela Melo de Barros', '(85) 8585-4241', 0, 2, '2017-04-23 17:50:34', '2017-04-23 17:50:34'),
(8, 'Artur da Silva Andre de Lemos', '29/06/2006', '', 'Luciana da Silva Moura', '(85) 8644-4423', 0, 2, '2017-04-23 17:52:53', '2017-04-23 17:52:53'),
(9, 'Julio Liberato Nobre', '18/04/2007', '', 'Maria da Socorro Liberato Nobre', '(85) 8613-1110', 0, 2, '2017-04-23 17:54:51', '2017-04-23 17:54:51'),
(10, 'Ismael Rodrigo Morais de Souza', '09/02/2009', '', 'Maria Iranilda Morais dos Santos', '', 0, 2, '2017-04-23 17:56:26', '2017-04-23 17:56:26'),
(11, 'Maria Eduardo Alves Ferreira', '22/01/2009', '', 'Isabelle Luany Alves', '(85) 8894-6967', 1, 2, '2017-04-23 17:57:41', '2017-04-23 17:57:41'),
(13, 'Raielly Vitoria de Oliveira Fernandes Vasconcelos', '03/09/2009', '', 'Amanda Fátima de Oliveira', '(85) 8610-3158', 1, 2, '2017-04-23 18:00:25', '2017-04-23 18:00:25'),
(14, 'Raielly Vitoria de Oliveira Fernandes Vasconcelos', '03/09/2009', '', 'Amanda Fátima de Oliveira', '(85) 8610-3158', 1, 2, '2017-04-23 18:01:41', '2017-04-23 18:01:41'),
(15, 'Nicoly Camelo de Araujo', '20/03/2007', '', 'Maria Camelo Vitoreano', '(85) 8718-0306', 1, 2, '2017-04-23 18:04:00', '2017-04-23 18:04:00'),
(16, 'Anita Araujo de Souza', '26/04/2009', '', 'Geusa Maria Araujo', '(85) 8940-6946', 1, 2, '2017-04-23 18:05:29', '2017-04-23 18:05:29'),
(17, 'Gislayne Pereira Gomes Macêdo', '10/01/2008', '', 'Jorgiana Pereira da Silva', '(85) 3494-3258', 1, 2, '2017-04-23 18:06:51', '2017-04-23 18:06:51'),
(18, 'Yasmin Nayla da Silva Costa', '17/04/2001', '', 'Francisca Naide Gomes da Silva', '(85) 3494-3268', 0, 2, '2017-04-23 18:08:21', '2017-04-28 00:18:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/03/2018 às 12:21
-- Versão do servidor: 5.7.21
-- Versão do PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wdacrud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(12) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `ie` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`) VALUES
(1, 'FFFulano de Tal', '999.999.999-99', '1989-01-01', 'Rua da Web, 123', 'Internet', '12.345-68', 'Teste', 'Teste', '(555) 5555', '(555) 55556', 123456, '2016-05-24 00:00:00', '2018-03-07 14:58:01'),
(4, 'YEAH2', '107.140.446-60', '1996-03-25', 'Rua Visconde de ItaboraÃ­', 'Jardim Leblon', '31.540-460', 'Belo Horizonte', 'MG', '(999) 99999-9999', '(999) 99999-9999', 9, '2018-03-06 15:56:05', '2018-03-07 14:29:29'),
(6, 'Henrique', '107.140.446-60', '1996-03-25', 'Rua Visconde de ItaboraÃ­', 'Jardim Leblon', '31.540-460', 'Belo Horizonte', 'MG', '(031) 99686-3131', '(031) 99686-3131', 1, '2018-03-06 19:37:58', '2018-03-06 19:37:58'),
(7, 'Henrique', '107.140.446-60', '1996-03-25', 'Rua Visconde de Itaborai', 'Jardim Leblon', '31.540-460', 'Belo Horizonte', 'MG', '(031) 99686-3131', '(031) 99686-3131', 1, '2018-03-06 19:41:03', '2018-03-06 19:41:03'),
(9, 'Maria', '107.140.446-60', '1996-03-25', 'Rua Visconde de Itaborai', 'Jardim Leblon', '31.540-460', 'Belo Horizonte', 'MG', '(031) 99686-3131', '(031) 99686-3131', 1, '2018-03-06 19:42:35', '2018-03-06 19:42:35'),
(12, 'Maria2', '107.140.446-60', '1996-03-25', 'Rua Visconde de Itaborai', 'Jardim Leblon', '31.540-460', 'Belo Horizonte', 'MG', '(031) 99686-3131', '(031) 99686-3131', 1, '2018-03-06 19:47:08', '2018-03-06 19:47:08'),
(13, 'TIT', '107.140.446-60', '1996-03-25', 'Rua Damas Ribeiro', 'Eldorado', '32.310-470', 'Contagem', 'MG', '(999) 99999-9999', '(999) 99999-9999', 1, '2018-03-07 16:09:10', '2018-03-07 16:09:10'),
(14, 'titi2', '107.140.446-60', '1970-01-01', 'Rua Damas Ribeiro', 'Eldorado', '32.310-470', 'Contagem', 'MG', '(9', '(9', 9, '2018-03-07 16:13:14', '2018-03-07 16:15:23');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

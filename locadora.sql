-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/01/2026 às 15:49
-- Versão do servidor: 8.4.7
-- Versão do PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `situacao` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`codigo`, `nome`, `cpf`, `situacao`) VALUES
(1, 'Carla', '123', 'A'),
(2, 'Geraldo', '1234', 'A'),
(4, 'Ana', '12345', 'A'),
(5, 'Alan', '45757', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locacao`
--

DROP TABLE IF EXISTS `locacao`;
CREATE TABLE IF NOT EXISTS `locacao` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `data_retirada` date NOT NULL,
  `hora_retirada` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `data_prevista_devolucao` date NOT NULL,
  `hora_prevista_devolucao` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `data_devolucao` date NOT NULL,
  `hora_devolucao` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `cod_produto` int NOT NULL,
  `cod_cliente` int NOT NULL,
  `valor_diaria` float(15,2) NOT NULL,
  `valor_total` float(15,2) NOT NULL,
  `situacao` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locacao`
--

INSERT INTO `locacao` (`codigo`, `data_retirada`, `hora_retirada`, `data_prevista_devolucao`, `hora_prevista_devolucao`, `data_devolucao`, `hora_devolucao`, `cod_produto`, `cod_cliente`, `valor_diaria`, `valor_total`, `situacao`) VALUES
(1, '2026-01-07', '10:00', '2026-01-08', '10:00', '0000-00-00', '', 2, 1, 50.00, 0.00, 'L');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `valor_dia` float(15,2) NOT NULL,
  `situacao` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `nome`, `valor_dia`, `situacao`) VALUES
(1, 'kombi', 80.00, 'A'),
(2, 'Doblo', 50.00, 'A'),
(3, 'Corolla', 65.00, 'A'),
(4, 'Gol', 50.00, 'A'),
(7, 'Kwid', 60.00, 'A'),
(8, 'C3', 75.00, 'A'),
(11, 'Hb20', 80.00, 'A'),
(14, 'Compass', 0.00, 'A'),
(17, 'Celta', 50.00, 'A'),
(34, 'Audi A1', 125.00, 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

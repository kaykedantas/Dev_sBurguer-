-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/10/2024 às 22:14
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `devs_burguer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`) VALUES
(1, 'Wilton', 'wil@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `hr_pedido` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `status_pedido` enum('Sendo preparado',' Pronto para retirada','Pedido concluido') DEFAULT NULL,
  `forma_pagamento` enum('Debito','Credito','Avista','Pix') DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `hr_pedido`, `total`, `observacoes`, `status_pedido`, `forma_pagamento`, `id_cliente`) VALUES
(1, '2024-10-01 15:19:07', 139.70, NULL, 'Sendo preparado', '', 1),
(2, '2024-10-01 15:23:16', 141.40, NULL, 'Sendo preparado', '', 1),
(3, '2024-10-01 15:24:32', 53.80, NULL, 'Sendo preparado', '', 1),
(4, '2024-10-01 15:24:49', 127.30, NULL, 'Sendo preparado', '', 1),
(5, '2024-10-01 15:28:35', 32.50, NULL, 'Sendo preparado', '', 1),
(6, '2024-10-01 15:30:39', 32.50, NULL, 'Sendo preparado', '', 1),
(7, '2024-10-01 15:31:58', 29.90, NULL, 'Sendo preparado', '', 1),
(8, '2024-10-14 16:54:53', 32.50, 'muito gostoso', 'Sendo preparado', 'Credito', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido_produto`
--

INSERT INTO `pedido_produto` (`id_pedido`, `id_produto`, `quantidade`) VALUES
(3, 1, 1),
(4, 1, 2),
(7, 1, 1),
(4, 2, 1),
(5, 2, 1),
(6, 2, 1),
(8, 2, 1),
(4, 3, 1),
(3, 4, 1),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(120) NOT NULL,
  `descricao_produto` varchar(200) DEFAULT NULL,
  `preco_produto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `descricao_produto`, `preco_produto`) VALUES
(1, 'Pizza Marguerita', 'Pizza com molho de tomate, queijo e manjericão.', 29.90),
(2, 'Pizza Calabresa', 'Pizza com calabresa, cebola e azeitonas.', 32.50),
(3, 'Pizza Portuguesa', 'Pizza com presunto, ovos e azeitonas.', 35.00),
(4, 'Hambúrguer Clássico', 'Hambúrguer com carne, queijo, alface e tomate.', 15.90),
(5, 'Cheeseburger', 'Hambúrguer com queijo cheddar e molho especial.', 17.50),
(6, 'Hambúrguer Vegano', 'Hambúrguer de grão-de-bico com molho de mostarda.', 14.00),
(7, 'Batata Frita Clássica', 'Porção de batata frita crocante.', 8.00),
(8, 'Batata Frita Rustica', 'Porção de batata frita com cortes rusticos.', 10.00),
(9, 'Batata Frita com Cheddar e Bacon', 'Porção de batata frita com cheddar e pedaços de bacon.', 12.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id_produto`,`id_pedido`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `pedido_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `pedido_produto_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

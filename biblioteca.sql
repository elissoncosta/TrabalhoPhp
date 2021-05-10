-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2021 às 02:22
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `classificacao_indicativa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`, `classificacao_indicativa`) VALUES
(1, 'FANTASIA', 2),
(2, 'AVENTURA', 3),
(3, 'SUSPENSE', 4),
(4, 'TERROR', 5),
(5, 'ADULTO', 5),
(11, '13132', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` char(14) DEFAULT NULL,
  `celular` char(15) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero_endereco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `celular`, `sexo`, `endereco`, `numero_endereco`) VALUES
(1, 'Gustavo Fc', '085.848.589-37', '(48) 99672-6053', '2', 'TEsteea', '123'),
(2, 'ARNOLD schwarzenegger  ', '14412312311', '99994422', '3', 'AVENIDA DO FUTURO', '1000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `razao_social` varchar(150) NOT NULL,
  `telefone` char(12) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero_endereco` int(11) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cep` char(8) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `razao_social`, `telefone`, `endereco`, `numero_endereco`, `complemento`, `cep`, `email`) VALUES
(1, 'PLAYBOY1', '11', '33444441', 11, '3311', '88', 'gusta'),
(2, 'SARAIVA', 'SARAIVA LTDA', '3344444', 0, '77', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_locacao`
--

CREATE TABLE `item_locacao` (
  `id_item_locacao` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `locacao_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `item_locacao`
--

INSERT INTO `item_locacao` (`id_item_locacao`, `sequence`, `locacao_id`, `titulo_id`) VALUES
(1, 1, 1, 3),
(2, 3, 1, 1),
(3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `id_locacao` int(11) NOT NULL,
  `data_locacao` date NOT NULL,
  `data_entrega` date NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`id_locacao`, `data_locacao`, `data_entrega`, `valor`, `cliente_id`) VALUES
(1, '2021-04-20', '2021-04-20', '201', 1),
(2, '2021-04-01', '2021-04-01', '100', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos`
--

CREATE TABLE `titulos` (
  `id_titulo` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sinopse` varchar(150) NOT NULL,
  `classificacao` char(10) DEFAULT NULL,
  `tipo` char(20) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `editora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `titulos`
--

INSERT INTO `titulos` (`id_titulo`, `titulo`, `sinopse`, `classificacao`, `tipo`, `categoria_id`, `editora_id`) VALUES
(1, 'harry potter e o enigma do NARDO', '1', '1', 'Livro', 1, 2),
(2, 'Revista Playboy 2021', '', '2', 'Revista', 5, 1),
(3, 'HQ TURMA DA MONICA', '', '3', 'Gibi', 3, 1),
(4, 'Programando em PROGRESS', '', '4', 'Livro', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `user`, `senha`, `status`) VALUES
(1, 'Gustavo', 'gustavo', '1', 'A'),
(2, 'Elisson', 'elisson', '123456', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices para tabela `item_locacao`
--
ALTER TABLE `item_locacao`
  ADD PRIMARY KEY (`id_item_locacao`) USING BTREE,
  ADD KEY `fk_item_locacao_locacao` (`locacao_id`),
  ADD KEY `fk_item_locacao_titulo` (`titulo_id`);

--
-- Índices para tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id_locacao`),
  ADD KEY `fk_locacao_cliente` (`cliente_id`);

--
-- Índices para tabela `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id_titulo`),
  ADD KEY `fk_titulo_editora` (`editora_id`),
  ADD KEY `fk_titulo_categoria` (`categoria_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `item_locacao`
--
ALTER TABLE `item_locacao`
  MODIFY `id_item_locacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `fk_locacao_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `titulos`
--
ALTER TABLE `titulos`
  ADD CONSTRAINT `fk_titulo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_titulo_editora` FOREIGN KEY (`editora_id`) REFERENCES `editora` (`id_editora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

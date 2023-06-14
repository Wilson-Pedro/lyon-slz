-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2023 às 22:42
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escolinha_de_futebol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcampeonato`
--

CREATE TABLE `tblcampeonato` (
  `id_campeonato` int(11) UNSIGNED NOT NULL,
  `nome_campeonato` varchar(255) NOT NULL,
  `local_campeonato` varchar(255) NOT NULL,
  `data_campeonato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblcampeonato`
--

INSERT INTO `tblcampeonato` (`id_campeonato`, `nome_campeonato`, `local_campeonato`, `data_campeonato`) VALUES
(13, 'Amistoso', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfotoss`
--

CREATE TABLE `tblfotoss` (
  `id` int(11) UNSIGNED NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblfotoss`
--

INSERT INTO `tblfotoss` (`id`, `arquivo`) VALUES
(60, 'imgTime01.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfotos_noticias`
--

CREATE TABLE `tblfotos_noticias` (
  `id` int(11) UNSIGNED NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblfotos_noticias`
--

INSERT INTO `tblfotos_noticias` (`id`, `arquivo`) VALUES
(19, 'Jogos.PNG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbljogadoress`
--

CREATE TABLE `tbljogadoress` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `gols` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbljogadoress`
--

INSERT INTO `tbljogadoress` (`id`, `nome`, `sobrenome`, `idade`, `posicao`, `gols`) VALUES
(1, 'Julio', 'Silva', 11, 'atacante', 4),
(6, 'Pelé', '', 17, 'atacante', 9),
(12, 'Alberto', '', 10, 'zagueiro', 1),
(13, 'Rivaldo', 'Vitor', 16, 'centrovante', 3),
(14, 'Lucas', '', 14, 'Lateral', 1),
(15, 'Mario', '', 10, 'atacante', 3),
(17, 'Carlos', 'Silva', 12, 'zagueiro', 1),
(19, 'Mario', 'Girlson', 16, 'zagueiro', 1),
(20, 'Roberto', 'Carlos', 9, 'Lateral', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblloginn`
--

CREATE TABLE `tblloginn` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblloginn`
--

INSERT INTO `tblloginn` (`id`, `usuario`, `senha`) VALUES
(6, 'tecnico', '$2y$10$gczQAxVqLMEnl0WKmKlTMe0m63EXOmCRshZG8r06LnsvcmMu2sRS.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblpartidass`
--

CREATE TABLE `tblpartidass` (
  `id` int(11) UNSIGNED NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `adversario` varchar(255) DEFAULT NULL,
  `id_campeonato` int(10) UNSIGNED NOT NULL,
  `data_partida` date NOT NULL,
  `horario` time(6) NOT NULL,
  `gols_lyon` int(11) NOT NULL,
  `gols_adv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblpartidass`
--

INSERT INTO `tblpartidass` (`id`, `localidade`, `adversario`, `id_campeonato`, `data_partida`, `horario`, `gols_lyon`, `gols_adv`) VALUES
(20, 'Quadra', 'Alemanha', 13, '2023-06-21', '19:42:00.000000', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblcampeonato`
--
ALTER TABLE `tblcampeonato`
  ADD PRIMARY KEY (`id_campeonato`);

--
-- Índices para tabela `tblfotoss`
--
ALTER TABLE `tblfotoss`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblfotos_noticias`
--
ALTER TABLE `tblfotos_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbljogadoress`
--
ALTER TABLE `tbljogadoress`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblloginn`
--
ALTER TABLE `tblloginn`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campeonato` (`id_campeonato`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblcampeonato`
--
ALTER TABLE `tblcampeonato`
  MODIFY `id_campeonato` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tblfotoss`
--
ALTER TABLE `tblfotoss`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tblfotos_noticias`
--
ALTER TABLE `tblfotos_noticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbljogadoress`
--
ALTER TABLE `tbljogadoress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tblloginn`
--
ALTER TABLE `tblloginn`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  ADD CONSTRAINT `tblpartidass_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `tblcampeonato` (`id_campeonato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

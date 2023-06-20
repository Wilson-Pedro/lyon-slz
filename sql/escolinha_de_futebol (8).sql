-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2023 às 22:46
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
(13, 'Amistoso', '', '0000-00-00'),
(17, 'Torneio sub-17', 'Castelinho', '2023-06-21'),
(18, 'Torneio sub-11', 'Estácio', '2023-06-23');

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
(78, 'imgTime01.png'),
(79, 'imgTime02.png'),
(80, 'imgTime03.png');

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
(19, 'Jogos.PNG'),
(20, 'imgTime01.png'),
(21, 'imgTime01.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbljogadoress`
--

CREATE TABLE `tbljogadoress` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `id_posicao` int(11) UNSIGNED NOT NULL,
  `gols` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbljogadoress`
--

INSERT INTO `tbljogadoress` (`id`, `nome`, `sobrenome`, `idade`, `id_posicao`, `gols`) VALUES
(22, 'julio', 'Silva', 13, 10, 2),
(24, 'Carlos', 'Alberto', 9, 12, 3),
(25, 'Mario', 'Lucio', 11, 10, 6),
(26, 'Lucas', 'Silva', 15, 9, 3),
(27, 'Rivaldo', 'Vitor', 17, 2, 4);

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
-- Estrutura da tabela `tblnoticias`
--

CREATE TABLE `tblnoticias` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblnoticias`
--

INSERT INTO `tblnoticias` (`id`, `titulo`, `descricao`) VALUES
(1, 'Nota de Esclarecimento.', 'Neste mês de Dezembro disputamos, à @copainterbairrosfut7ma Sub-13, onde chegamos até à final, sendo derrotado nos pênaltis. Onde após o jogo, recebemos denúncias que na equipe adversária teria atletas de forma irregular, com idade que não correspondia com à categoria Sub-13 e sim esse atleta sendo Sub-14. Fizemos todos os procedimentos legais e pôr vim, à verdade chegou.  SOMOS CAMPEÕES🤷‍♂️🏆🥇.  Parabéns atletas, comissão e todos aquele que ajudam nossa equipe...');

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
  `link_fotos` varchar(255) NOT NULL,
  `horario` time(6) NOT NULL,
  `gols_lyon` int(11) NOT NULL,
  `gols_adv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblpartidass`
--

INSERT INTO `tblpartidass` (`id`, `localidade`, `adversario`, `id_campeonato`, `data_partida`, `link_fotos`, `horario`, `gols_lyon`, `gols_adv`) VALUES
(28, 'Estácio', 'Tiger', 13, '2023-06-14', 'https://www.youtube.com/watch?v=i6iBAuwBODA', '12:56:00.000000', 1, 0),
(29, 'Estácio', 'Falcons', 18, '2023-06-23', '', '18:13:00.000000', 0, 0),
(30, 'Estácio', 'Juventus', 13, '2023-06-14', 'https://www.youtube.com/watch?v=8ku-ix0Ezj4', '18:37:00.000000', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblposicao`
--

CREATE TABLE `tblposicao` (
  `id_posicao` int(11) UNSIGNED NOT NULL,
  `nome_posicao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tblposicao`
--

INSERT INTO `tblposicao` (`id_posicao`, `nome_posicao`) VALUES
(1, 'Goleiro'),
(2, 'Zagueiro'),
(3, 'Meio'),
(4, 'Lateral'),
(5, 'Lateral Direito'),
(6, 'Lateral Esquerdo'),
(7, 'Ala'),
(8, 'Ala Direito'),
(9, 'Ala Esquerdo'),
(10, 'Ataquante'),
(11, 'Centroavante'),
(12, 'Pivô');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogador_posicao` (`id_posicao`);

--
-- Índices para tabela `tblloginn`
--
ALTER TABLE `tblloginn`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblnoticias`
--
ALTER TABLE `tblnoticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campeonato` (`id_campeonato`);

--
-- Índices para tabela `tblposicao`
--
ALTER TABLE `tblposicao`
  ADD PRIMARY KEY (`id_posicao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblcampeonato`
--
ALTER TABLE `tblcampeonato`
  MODIFY `id_campeonato` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tblfotoss`
--
ALTER TABLE `tblfotoss`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `tblfotos_noticias`
--
ALTER TABLE `tblfotos_noticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbljogadoress`
--
ALTER TABLE `tbljogadoress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tblloginn`
--
ALTER TABLE `tblloginn`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tblnoticias`
--
ALTER TABLE `tblnoticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tblposicao`
--
ALTER TABLE `tblposicao`
  MODIFY `id_posicao` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbljogadoress`
--
ALTER TABLE `tbljogadoress`
  ADD CONSTRAINT `fk_jogador_posicao` FOREIGN KEY (`id_posicao`) REFERENCES `tblposicao` (`id_posicao`);

--
-- Limitadores para a tabela `tblpartidass`
--
ALTER TABLE `tblpartidass`
  ADD CONSTRAINT `tblpartidass_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `tblcampeonato` (`id_campeonato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

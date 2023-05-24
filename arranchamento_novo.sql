-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Mar-2023 às 15:32
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
-- Banco de dados: `arranchamento_novo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arranchamento`
--

CREATE TABLE `arranchamento` (
  `Id` int(11) NOT NULL,
  `cpf` varchar(12) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `cafe` varchar(1) DEFAULT NULL,
  `almoco` varchar(1) DEFAULT NULL,
  `jantar` varchar(1) DEFAULT NULL,
  `justificativa_sexta` varchar(150) DEFAULT NULL,
  `hierarquia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_app`
--

CREATE TABLE `avaliacao_app` (
  `Id` int(11) NOT NULL,
  `posto` varchar(10) DEFAULT NULL,
  `nome_guerra` varchar(50) DEFAULT NULL,
  `avaliacao_0a5` int(11) DEFAULT NULL,
  `sugestoes` varchar(255) DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloqueia_arranchamento`
--

CREATE TABLE `bloqueia_arranchamento` (
  `Id` int(11) NOT NULL,
  `motivobloqueio` varchar(50) DEFAULT NULL,
  `databloqueio` date DEFAULT NULL,
  `bloqueiacafe` varchar(1) DEFAULT NULL,
  `bloqueiaalmoco` varchar(1) DEFAULT NULL,
  `bloqueiajantar` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `Id` int(11) NOT NULL,
  `versaoatual_app` varchar(10) DEFAULT NULL,
  `url_relatorios` varchar(150) DEFAULT NULL,
  `url_novaversao` varchar(200) DEFAULT NULL,
  `video_usuariocomum` varchar(200) DEFAULT NULL,
  `video_usuarioadm` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `datahora_server`
--

CREATE TABLE `datahora_server` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `datateste`
--

CREATE TABLE `datateste` (
  `idData` int(11) NOT NULL,
  `dataComeco` date NOT NULL,
  `dataFinal` date NOT NULL,
  `companhia` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `datateste`
--

INSERT INTO `datateste` (`idData`, `dataComeco`, `dataFinal`, `companhia`) VALUES
(0, '2023-03-12', '2023-03-17', 'CCAP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `expedientes_diferenciados`
--

CREATE TABLE `expedientes_diferenciados` (
  `Id` int(11) NOT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horalimite` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `limite_arranchamento`
--

CREATE TABLE `limite_arranchamento` (
  `Id` int(11) NOT NULL,
  `horalimite` time DEFAULT NULL,
  `diasemana` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `limite_arranchamento`
--

INSERT INTO `limite_arranchamento` (`Id`, `horalimite`, `diasemana`) VALUES
(1, '10:00:00', 'seg'),
(2, '10:00:00', 'ter'),
(3, '10:00:00', 'qua'),
(4, '10:00:00', 'qui'),
(5, '10:00:00', 'sex'),
(6, '00:00:00', 'sab'),
(7, '00:00:00', 'dom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `militares`
--

CREATE TABLE `militares` (
  `id` int(11) NOT NULL,
  `nomeguerra` varchar(20) DEFAULT NULL,
  `nomecompleto` varchar(80) DEFAULT NULL,
  `companhia` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ativo` char(1) DEFAULT NULL,
  `cpf` varchar(12) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `tipo_acesso` varchar(30) DEFAULT NULL,
  `datacadastro` date DEFAULT NULL,
  `usuario_novo` char(1) DEFAULT NULL,
  `posto` varchar(10) DEFAULT NULL,
  `hierarquia` int(2) DEFAULT NULL,
  `ultimoacesso` date DEFAULT NULL,
  `gradSigla` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `militares`
-- --------------------------------------------------------

--
-- Estrutura da tabela `msgerros`
--

CREATE TABLE `msgerros` (
  `Id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mensagem` varchar(150) DEFAULT NULL,
  `dataerro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arranchamento`
--
ALTER TABLE `arranchamento`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `avaliacao_app`
--
ALTER TABLE `avaliacao_app`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `bloqueia_arranchamento`
--
ALTER TABLE `bloqueia_arranchamento`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `datahora_server`
--
ALTER TABLE `datahora_server`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `datateste`
--
ALTER TABLE `datateste`
  ADD PRIMARY KEY (`idData`);

--
-- Índices para tabela `expedientes_diferenciados`
--
ALTER TABLE `expedientes_diferenciados`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `limite_arranchamento`
--
ALTER TABLE `limite_arranchamento`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `militares`
--
ALTER TABLE `militares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posto` (`posto`);

--
-- Índices para tabela `msgerros`
--
ALTER TABLE `msgerros`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arranchamento`
--
ALTER TABLE `arranchamento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383373;

--
-- AUTO_INCREMENT de tabela `avaliacao_app`
--
ALTER TABLE `avaliacao_app`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de tabela `bloqueia_arranchamento`
--
ALTER TABLE `bloqueia_arranchamento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `datahora_server`
--
ALTER TABLE `datahora_server`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1501;

--
-- AUTO_INCREMENT de tabela `expedientes_diferenciados`
--
ALTER TABLE `expedientes_diferenciados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `limite_arranchamento`
--
ALTER TABLE `limite_arranchamento`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `militares`
--
ALTER TABLE `militares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22445;

--
-- AUTO_INCREMENT de tabela `msgerros`
--
ALTER TABLE `msgerros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

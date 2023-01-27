-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jan-2023 às 18:42
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbatas`
--

CREATE TABLE `tbatas` (
  `cod` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `codsetor` int(11) NOT NULL,
  `participantes` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbatas`
--

INSERT INTO `tbatas` (`cod`, `data`, `descricao`, `codsetor`, `participantes`) VALUES
(1, '2022-07-01', 'Setor Comercial - Reunião Mensal 07/2022', 2, 'Renata, Marana'),
(4, '2022-08-31', 'Reunião Audiplanner 08/2022', 1, 'Priscilla, Marana'),
(5, '2022-08-31', 'Reunião Acompanhamento Diretoria 08/2022', 3, 'Marana, Renan, Josimar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbenvolvidos`
--

CREATE TABLE `tbenvolvidos` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codsetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbenvolvidos`
--

INSERT INTO `tbenvolvidos` (`cod`, `nome`, `codsetor`) VALUES
(1, 'Amanda Araujo', 10),
(2, 'Chayene Nascimento', 4),
(3, 'Dayane Pereira', 1),
(4, 'Edja Patricia', 4),
(5, 'Edson Oliveira', 3),
(6, 'Fernanda Araujo', 7),
(7, 'Gilmara Mesquita', 4),
(8, 'Glauciene Araujo', 4),
(9, 'Helio Lopes', 7),
(10, 'Ismênia', 5),
(11, 'Jessica Roberta', 4),
(12, 'João Victor Oliveira', 4),
(13, 'Jonas Jackson', 4),
(14, 'Jose Carlos', 4),
(15, 'Josimar Gabriel', 9),
(16, 'Josy Fernandes', 4),
(17, 'Jurema Pessoa', 4),
(18, 'Leticia Oliveira', 4),
(19, 'Marana Pontes', 3),
(20, 'Marcia Maria', 5),
(21, 'Max Rocha', 3),
(22, 'Michelle Rocha', 5),
(23, 'Nisy Fernandes', 7),
(24, 'Priscila Mesquita', 1),
(25, 'Rafaella Cavalcante', 4),
(26, 'Raimunda Pimenta', 3),
(27, 'Renan Nunes', 9),
(28, 'Renata Almeida', 7),
(29, 'Renata Araújo', 2),
(30, 'Sabrina Rodrigues', 4),
(31, 'Sandra Nascimento', 5),
(32, 'Skarllet Barros', 4),
(33, 'Tamy Cristine', 5),
(34, 'Vitória Araujo', 7),
(35, 'Wanderson Henrique', 5),
(36, 'Wesley Duarte', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsetores`
--

CREATE TABLE `tbsetores` (
  `cod` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsetores`
--

INSERT INTO `tbsetores` (`cod`, `descricao`) VALUES
(1, 'Audiplanner'),
(2, 'Comercial'),
(3, 'Diretoria/Financeiro'),
(4, 'Fiscon'),
(5, 'Kronos'),
(6, 'Legalização'),
(7, 'Set. Pessoal'),
(8, 'Start BI'),
(9, 'T.I.'),
(10, 'Publicidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatus`
--

CREATE TABLE `tbstatus` (
  `cod` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbstatus`
--

INSERT INTO `tbstatus` (`cod`, `descricao`) VALUES
(1, 'Finalizado'),
(2, 'Em Andamento'),
(3, 'Diretoria'),
(4, 'Informativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtopicos`
--

CREATE TABLE `tbtopicos` (
  `cod` int(11) NOT NULL,
  `codata` int(11) NOT NULL,
  `assunto` varchar(150) NOT NULL,
  `providencia` varchar(255) NOT NULL,
  `codresponsavel` int(11) NOT NULL,
  `codstatus` int(11) NOT NULL,
  `diretoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtopicos`
--

INSERT INTO `tbtopicos` (`cod`, `codata`, `assunto`, `providencia`, `codresponsavel`, `codstatus`, `diretoria`) VALUES
(1, 1, 'Validar o Manual de Parcerias com Max', 'Repassar as novas regras para a ADM', 29, 2, 1),
(2, 1, 'Validar com Renata sobre as funções do comercial que ela passará a exercer', 'Conversado em 04/08/2022', 29, 1, 2),
(3, 1, 'Aguardar contato para falar com o setor financeiro da Adm', 'Solicitado a Eloize', 29, 1, 2),
(4, 1, 'Verificar com a Adm se todo o material foi enviado', 'Solicitado a Eloize', 29, 1, 2),
(18, 4, 'Fardamento: modelos das camisetas', 'Verificar com o Marketing', 24, 2, 2),
(19, 4, 'Alterar a assinatura dos emails', 'Verificar com o Marketing', 24, 1, 2),
(20, 4, 'Mudar o domínio do e-mail', 'Verificar com o Marketing', 24, 2, 2),
(21, 4, 'Cartão Virtual', 'Verificar com o Marketing', 24, 2, 2),
(22, 4, 'Junta Comercial: alteração da razão social e quadro societário', '', 24, 2, 2),
(23, 5, 'Mostrar o preço dos certificados digitais', 'Mostrar o levantamento de Josimar', 19, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`cod`, `nome`, `usuario`, `senha`) VALUES
(1, 'Renan Nunes', 'renannunes', '123456'),
(2, 'Marana Pontes', 'maranapontes', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbatas`
--
ALTER TABLE `tbatas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_setor` (`codsetor`);

--
-- Índices para tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_codigo setor` (`codsetor`);

--
-- Índices para tabela `tbsetores`
--
ALTER TABLE `tbsetores`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `tbtopicos`
--
ALTER TABLE `tbtopicos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_ata` (`codata`),
  ADD KEY `fk_responsavel` (`codresponsavel`),
  ADD KEY `fk_status` (`codstatus`);

--
-- Índices para tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbatas`
--
ALTER TABLE `tbatas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tbsetores`
--
ALTER TABLE `tbsetores`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbtopicos`
--
ALTER TABLE `tbtopicos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbatas`
--
ALTER TABLE `tbatas`
  ADD CONSTRAINT `fk_setor` FOREIGN KEY (`codsetor`) REFERENCES `tbsetores` (`cod`);

--
-- Limitadores para a tabela `tbenvolvidos`
--
ALTER TABLE `tbenvolvidos`
  ADD CONSTRAINT `fk_codigo setor` FOREIGN KEY (`codsetor`) REFERENCES `tbsetores` (`cod`);

--
-- Limitadores para a tabela `tbtopicos`
--
ALTER TABLE `tbtopicos`
  ADD CONSTRAINT `fk_ata` FOREIGN KEY (`codata`) REFERENCES `tbatas` (`cod`),
  ADD CONSTRAINT `fk_responsavel` FOREIGN KEY (`codresponsavel`) REFERENCES `tbenvolvidos` (`cod`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`codstatus`) REFERENCES `tbstatus` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

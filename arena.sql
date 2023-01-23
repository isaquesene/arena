-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jan-2023 às 19:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arena`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviso`
--

CREATE TABLE `aviso` (
  `id_aviso` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_envio` datetime NOT NULL,
  `nao_socio` char(1) NOT NULL,
  `arena` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `planos_associados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aviso`
--

INSERT INTO `aviso` (`id_aviso`, `titulo`, `conteudo`, `data_cadastro`, `data_envio`, `nao_socio`, `arena`, `status`, `id_usuario`, `id_empresa`, `planos_associados`) VALUES
(1, 'dgasdgsdfg', 'gasdgasdg', '2023-01-22 07:31:26', '2023-01-22 07:31:26', '1', '1', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficio`
--

CREATE TABLE `beneficio` (
  `id_beneficio` int(11) NOT NULL,
  `nome_beneficio` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `validade` datetime NOT NULL,
  `recorrencia` int(11) DEFAULT NULL,
  `data_recorrencia` datetime DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  `pontuacao_minima` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `beneficio`
--

INSERT INTO `beneficio` (`id_beneficio`, `nome_beneficio`, `descricao`, `quantidade`, `validade`, `recorrencia`, `data_recorrencia`, `tipo`, `pontuacao_minima`, `status`, `id_empresa`, `id_usuario`, `id_plano`) VALUES
(1, 'Teste', 'Teste benefício', 1, '2023-01-26 10:42:00', 0, '2023-01-26 10:42:00', '1', 100, '1', 1, 1, 1),
(2, 'Teste', 'Teste benefício 2', 2, '2023-01-26 11:12:00', 0, '2023-01-24 11:12:00', '0', 100, '1', 1, 1, 1),
(26, 'teste', 'teste', 1, '2023-01-23 09:38:00', 1, '2023-01-23 09:38:00', '1', 10, '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cep` char(8) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `uf` char(2) NOT NULL,
  `contato_incidente` char(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `telefone`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `municipio`, `uf`, `contato_incidente`, `status`) VALUES
(1, 'Arena Farma Conde', '31204059000125', '12981193983', 'analista1@itaventures.com.br', '12240681', 'R. Winston Churchill', '230', 'NT', 'Jardim das Indústrias', 'São José dos Campos', 'SP', '12981193983', '1'),
(2, 'teste', '24753829000128', '1243234234', 'tdsdgsdf', '12305260', 'Rua das Acacias', '313', 'NA', 'NA', 'Jacarei', 'SP', '12981193983', '0'),
(3, 'teste', '24753829000128', '12981193698', 'analista1@itaventures.com.br', '12305260', 'Rua Moacir Coimbra', '193', 'NA', 'NA', 'NA', 'RO', '12981193983', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_Eventos` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Detalhes` varchar(255) DEFAULT NULL,
  `Inicio` datetime NOT NULL,
  `Fim` datetime NOT NULL,
  `Logradouro` varchar(255) DEFAULT NULL,
  `Numero` varchar(255) DEFAULT NULL,
  `Complemento` varchar(255) DEFAULT NULL,
  `Bairro` varchar(255) DEFAULT NULL,
  `Cidade` varchar(255) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Nome_organizador` varchar(255) DEFAULT NULL,
  `Descricao_organizador` varchar(255) DEFAULT NULL,
  `Classificacao` varchar(255) DEFAULT NULL,
  `Bilheteira` varchar(255) DEFAULT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id_Eventos`, `Nome`, `Detalhes`, `Inicio`, `Fim`, `Logradouro`, `Numero`, `Complemento`, `Bairro`, `Cidade`, `UF`, `Nome_organizador`, `Descricao_organizador`, `Classificacao`, `Bilheteira`, `Link`) VALUES
(1, 'Evento xyz', 'Teste de cadastro de evento', '2023-01-25 11:18:00', '2023-01-26 11:18:00', 'Rua Moacir Coimbra', '313', 'na', 'Jardim Califórnia', 'Jacareí', 'SP', 'Teste', 'Teste ', '18 anos', 'Sympla', 'https://bileto.sympla.com.br/event/74840/d/161409?_gl=1*18ymmzt*_ga*MTMxNjc2OTcxMi4xNjc0MTM3OTcw*_ga_KXH10SQTZF*MTY3NDEzNzk3MC4xLjAuMTY3NDEzNzk3MC4wLjAuMA..'),
(2, 'Teste Evento', 'Teste de cadastro de evento', '2023-01-25 11:18:00', '2023-01-25 19:03:00', '', '313', 'na', 'Jardim Califórnia', 'Jacareí', 'SP', 'leticia carvakgo galdino', 'Teste ', '18 anos', 'Sympla', 'encurtador.com.br/dHKU6'),
(8, 'SHOW ROBERTO CARLOS', 'SHOW 25/01 AS 13 HORAS', '2023-01-26 10:58:00', '2023-01-29 10:58:00', 'ARENA FARMACONDE', '', '', '', 'SAO JOSE DOS CAMPOS', 'SP', 'FARMACONDE', '', '+18', 'SYMPLA', 'http://20.206.66.180/arena/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fila_compra`
--

CREATE TABLE `fila_compra` (
  `id_fila_compra` int(11) NOT NULL,
  `quantidade_max` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `Nome_evento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fila_compra`
--

INSERT INTO `fila_compra` (`id_fila_compra`, `quantidade_max`, `id_plano`, `link`, `Nome_evento`) VALUES
(1, 10, 1, 'encurtador.com.br/dHKU6', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_beneficio`
--

CREATE TABLE `historico_beneficio` (
  `id_historico_beneficio` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_beneficio` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico_beneficio`
--

INSERT INTO `historico_beneficio` (`id_historico_beneficio`, `id_socio`, `id_beneficio`, `status`) VALUES
(1, 1, 1, '0'),
(2, 1, 2, '0'),
(3, 1, 2, '1'),
(4, 1, 2, '0'),
(5, 1, 2, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_fila_compra`
--

CREATE TABLE `historico_fila_compra` (
  `id_historico_fila_compra` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_fila_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_token`
--

CREATE TABLE `historico_token` (
  `id_historico_token` int(11) NOT NULL,
  `data_utilizacao` datetime NOT NULL,
  `id_token` int(11) NOT NULL,
  `id_socio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico_token`
--

INSERT INTO `historico_token` (`id_historico_token`, `data_utilizacao`, `id_token`, `id_socio`) VALUES
(1, '2023-01-19 13:23:00', 1, 1),
(2, '2023-01-19 13:23:00', 1, 1),
(3, '2023-01-20 03:02:00', 1, 1),
(4, '2023-01-23 10:25:00', 1, 1),
(5, '2023-01-23 10:26:00', 1, 1),
(6, '2023-01-23 10:30:00', 1, NULL),
(7, '2023-01-23 10:36:00', 1, NULL),
(8, '2023-01-23 10:38:00', 1, NULL),
(9, '2023-01-23 10:40:00', 1, NULL),
(10, '2023-01-23 10:40:00', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_voucher`
--

CREATE TABLE `historico_voucher` (
  `id_historico_voucher` int(11) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico_voucher`
--

INSERT INTO `historico_voucher` (`id_historico_voucher`, `id_voucher`, `id_socio`, `status`) VALUES
(1, 1, 1, '0'),
(2, 1, 1, '1'),
(5, 1, 1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses`
--

CREATE TABLE `interesses` (
  `id_interesses` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `interesses`
--

INSERT INTO `interesses` (`id_interesses`, `descricao`, `status`, `id_empresa`) VALUES
(1, 'Vôlei', '1', 1),
(9, '123', '1', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses_socios`
--

CREATE TABLE `interesses_socios` (
  `id_interesses_socios` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_interesses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `interesses_socios`
--

INSERT INTO `interesses_socios` (`id_interesses_socios`, `id_socio`, `id_interesses`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lgpd`
--

CREATE TABLE `lgpd` (
  `id_lgpd` int(11) NOT NULL,
  `coleta_dados` char(1) DEFAULT NULL,
  `recebimento_email` char(1) DEFAULT NULL,
  `recebimento_ligacoes` char(1) DEFAULT NULL,
  `recebimento_wpp` char(1) DEFAULT NULL,
  `recebimento_sms` char(1) DEFAULT NULL,
  `aceite` char(1) NOT NULL,
  `data_inclusao` datetime NOT NULL,
  `data_ultima_alteracao` datetime NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lgpd`
--

INSERT INTO `lgpd` (`id_lgpd`, `coleta_dados`, `recebimento_email`, `recebimento_ligacoes`, `recebimento_wpp`, `recebimento_sms`, `aceite`, `data_inclusao`, `data_ultima_alteracao`, `id_socio`) VALUES
(1, '1', '1', '1', '1', '1', '1', '2023-01-19 11:47:00', '2023-01-19 11:47:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `valor` float NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `parcela` int(11) NOT NULL,
  `forma_pagamento` varchar(255) NOT NULL,
  `bandeira` varchar(255) DEFAULT NULL,
  `data_cobranca` datetime DEFAULT NULL,
  `data_prox_cobranca` datetime DEFAULT NULL,
  `cobranca_automatica` char(1) DEFAULT NULL,
  `validade` datetime DEFAULT NULL,
  `id_plano` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pagamento`, `valor`, `periodo`, `parcela`, `forma_pagamento`, `bandeira`, `data_cobranca`, `data_prox_cobranca`, `cobranca_automatica`, `validade`, `id_plano`, `id_socio`, `id_time`) VALUES
(1, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-25 13:12:00', '2023-02-25 01:12:11', '1', '2023-01-19 13:12:00', 1, 1, 1),
(2, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-19 14:56:00', '2023-01-25 00:00:00', '1', '2023-01-19 14:56:00', 1, 1, 1),
(3, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-19 14:56:00', '2023-01-25 00:00:00', '', '2023-01-19 14:56:00', 1, 1, 1),
(4, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-20 15:00:00', '2023-01-24 00:00:00', '1', '2023-01-26 15:00:00', 1, 1, 1),
(5, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-19 15:00:00', '2023-01-19 00:00:00', '1', '2023-01-19 15:00:00', 1, 1, 1),
(6, 10, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-19 15:00:00', '2023-01-19 00:00:00', '1', '2023-01-19 15:00:00', 1, 1, 1),
(7, 155, 'mensal', 1, 'PIX', 'Mastercard', '2023-01-19 07:00:00', '2023-01-19 00:00:00', '1', '2023-01-19 18:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `idParticipantes` int(11) NOT NULL,
  `Ticket` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Sobrenome` varchar(255) DEFAULT NULL,
  `preco_ingresso` decimal(10,0) DEFAULT NULL,
  `id_Eventos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`idParticipantes`, `Ticket`, `Email`, `Nome`, `Sobrenome`, `preco_ingresso`, `id_Eventos`) VALUES
(1, '123456', 'legaldino82@gmail.com', 'leticia', 'galdino', '10', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `desc_perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `desc_perfil`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE `plano` (
  `id_plano` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor_mensal` text NOT NULL,
  `valor_trimestral` text DEFAULT NULL,
  `valor_semestral` text DEFAULT NULL,
  `valor_anual` text DEFAULT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plano`
--

INSERT INTO `plano` (`id_plano`, `nome`, `valor_mensal`, `valor_trimestral`, `valor_semestral`, `valor_anual`, `id_empresa`) VALUES
(1, 'Smart', '10', '0', '0', '0', 1),
(7, 'COMPANY', '10', '30', '99999', '99999999', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE `pontuacao` (
  `id_pontuacao` int(11) NOT NULL,
  `desc_pontuacao` varchar(255) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pontuacao`
--

INSERT INTO `pontuacao` (`id_pontuacao`, `desc_pontuacao`, `pontuacao`, `id_usuario`, `id_empresa`, `id_plano`) VALUES
(1, 'Evento gratuito', 100, 1, 1, 1),
(2, 'sadas', 1, 1, 1, 1),
(3, 'teste', 1, 1, 1, 1),
(4, '12', 12, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `socio`
--

CREATE TABLE `socio` (
  `id_socio` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `uf` varchar(255) DEFAULT NULL,
  `socio` char(1) NOT NULL,
  `kit` char(1) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `id_plano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `socio`
--

INSERT INTO `socio` (`id_socio`, `nome`, `celular`, `email`, `senha`, `cpf`, `logradouro`, `numero`, `complemento`, `bairro`, `municipio`, `uf`, `socio`, `kit`, `pontuacao`, `status`, `id_plano`) VALUES
(1, 'LETÍCIA CARVALHO GALDINO', '12981193983', 'legaldino82@gmail.com', 'senha321@', '44667854812', 'Rua Moacir Coimbra', '193', 'NA', 'Jardim Califórnia', 'Jacarei', 'SP', '1', '1', 100, '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `id_time` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `percentual` float DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id_time`, `nome`, `descricao`, `percentual`, `status`) VALUES
(1, '43534', 'Time de Vôlei Farma Conde', 30, '1'),
(2, 'LETÍCIA CARVALHO GALDINOdsd', 'sdsdsd', 10, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(45) DEFAULT NULL,
  `data_hora` datetime NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `token`
--

INSERT INTO `token` (`id_token`, `token`, `data_hora`, `id_socio`) VALUES
(1, '268296', '2023-01-19 13:20:00', 1),
(2, '1', '2023-01-20 02:59:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cadastra_usuario_adm` char(1) NOT NULL,
  `exclui_usuario_adm` char(1) NOT NULL,
  `edita_usuario_adm` char(1) NOT NULL,
  `visualiza_socio` char(1) NOT NULL,
  `pesquisa_socio` char(1) NOT NULL,
  `exclui_socio` char(1) NOT NULL,
  `gera_voucher` char(1) NOT NULL,
  `visualiza_evento` char(1) NOT NULL,
  `cria_aviso` char(1) NOT NULL,
  `reenvia_aviso` char(1) NOT NULL,
  `visualiza_aviso` char(1) NOT NULL,
  `cadastra_beneficio` char(1) NOT NULL,
  `edita_beneficio` char(1) NOT NULL,
  `exclui_beneficio` char(1) NOT NULL,
  `edita_empresa` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `cpf`, `email`, `telefone`, `senha`, `cadastra_usuario_adm`, `exclui_usuario_adm`, `edita_usuario_adm`, `visualiza_socio`, `pesquisa_socio`, `exclui_socio`, `gera_voucher`, `visualiza_evento`, `cria_aviso`, `reenvia_aviso`, `visualiza_aviso`, `cadastra_beneficio`, `edita_beneficio`, `exclui_beneficio`, `edita_empresa`, `status`, `id_empresa`, `id_perfil`) VALUES
(1, 'Letícia Galdino', '44667854812', 'analista1@itaventures.com.br', '12981193983', '3771a410fbd791168a86295175ffbe50', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1),
(2, 'Tássyla de Melo', '17697568098', 'analista7@itaventures.com.br', '12981193983', '3771a410fbd791168a86295175ffbe50', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `voucher` varchar(255) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `voucher`, `id_evento`, `id_usuario`) VALUES
(1, '185186AB', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `fk_aviso_usuario_adm1_idx` (`id_usuario`),
  ADD KEY `fk_aviso_empresa1_idx` (`id_empresa`),
  ADD KEY `aviso_ibfk_1` (`planos_associados`) USING BTREE;

--
-- Índices para tabela `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`id_beneficio`),
  ADD KEY `id_plano` (`id_plano`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_Eventos`);

--
-- Índices para tabela `fila_compra`
--
ALTER TABLE `fila_compra`
  ADD PRIMARY KEY (`id_fila_compra`),
  ADD KEY `id_plano` (`id_plano`);

--
-- Índices para tabela `historico_beneficio`
--
ALTER TABLE `historico_beneficio`
  ADD PRIMARY KEY (`id_historico_beneficio`),
  ADD KEY `id_beneficio` (`id_beneficio`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Índices para tabela `historico_fila_compra`
--
ALTER TABLE `historico_fila_compra`
  ADD PRIMARY KEY (`id_historico_fila_compra`,`id_socio`,`id_fila_compra`),
  ADD KEY `historico_fila_compra_FK` (`id_socio`),
  ADD KEY `historico_fila_compra_FK_1` (`id_fila_compra`) USING BTREE;

--
-- Índices para tabela `historico_token`
--
ALTER TABLE `historico_token`
  ADD PRIMARY KEY (`id_historico_token`),
  ADD KEY `historico_token_FK` (`id_token`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Índices para tabela `historico_voucher`
--
ALTER TABLE `historico_voucher`
  ADD PRIMARY KEY (`id_historico_voucher`),
  ADD KEY `id_voucher` (`id_voucher`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Índices para tabela `interesses`
--
ALTER TABLE `interesses`
  ADD PRIMARY KEY (`id_interesses`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `interesses_socios`
--
ALTER TABLE `interesses_socios`
  ADD PRIMARY KEY (`id_interesses_socios`),
  ADD KEY `id_socio` (`id_socio`),
  ADD KEY `interesses_socios_FK` (`id_interesses`);

--
-- Índices para tabela `lgpd`
--
ALTER TABLE `lgpd`
  ADD PRIMARY KEY (`id_lgpd`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `id_socio` (`id_socio`),
  ADD KEY `id_plano` (`id_plano`),
  ADD KEY `pagamento_FK` (`id_time`);

--
-- Índices para tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`idParticipantes`),
  ADD KEY `participantes_FK` (`id_Eventos`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`id_plano`),
  ADD KEY `plano_ibfk_1` (`id_empresa`);

--
-- Índices para tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD PRIMARY KEY (`id_pontuacao`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_plano` (`id_plano`);

--
-- Índices para tabela `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id_socio`),
  ADD KEY `socio_ibfk_1` (`id_plano`);

--
-- Índices para tabela `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_time`);

--
-- Índices para tabela `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `voucher_FK` (`id_evento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id_beneficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_Eventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fila_compra`
--
ALTER TABLE `fila_compra`
  MODIFY `id_fila_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `historico_beneficio`
--
ALTER TABLE `historico_beneficio`
  MODIFY `id_historico_beneficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `historico_fila_compra`
--
ALTER TABLE `historico_fila_compra`
  MODIFY `id_historico_fila_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `historico_token`
--
ALTER TABLE `historico_token`
  MODIFY `id_historico_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `historico_voucher`
--
ALTER TABLE `historico_voucher`
  MODIFY `id_historico_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `interesses`
--
ALTER TABLE `interesses`
  MODIFY `id_interesses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `interesses_socios`
--
ALTER TABLE `interesses_socios`
  MODIFY `id_interesses_socios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `lgpd`
--
ALTER TABLE `lgpd`
  MODIFY `id_lgpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `idParticipantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  MODIFY `id_pontuacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `socio`
--
ALTER TABLE `socio`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `time`
--
ALTER TABLE `time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3321314;

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `aviso_FK` FOREIGN KEY (`planos_associados`) REFERENCES `plano` (`id_plano`),
  ADD CONSTRAINT `aviso_ibfk_1` FOREIGN KEY (`planos_associados`) REFERENCES `plano` (`id_plano`),
  ADD CONSTRAINT `fk_aviso_empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_aviso_usuario_adm1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `beneficio`
--
ALTER TABLE `beneficio`
  ADD CONSTRAINT `beneficio_ibfk_1` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`),
  ADD CONSTRAINT `beneficio_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `beneficio_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `fila_compra`
--
ALTER TABLE `fila_compra`
  ADD CONSTRAINT `id_plano` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`);

--
-- Limitadores para a tabela `historico_beneficio`
--
ALTER TABLE `historico_beneficio`
  ADD CONSTRAINT `historico_beneficio_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`),
  ADD CONSTRAINT `id_beneficio` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficio` (`id_beneficio`);

--
-- Limitadores para a tabela `historico_fila_compra`
--
ALTER TABLE `historico_fila_compra`
  ADD CONSTRAINT `historico_fila_compra_FK` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`),
  ADD CONSTRAINT `id_fila_compra` FOREIGN KEY (`id_fila_compra`) REFERENCES `fila_compra` (`id_fila_compra`);

--
-- Limitadores para a tabela `historico_token`
--
ALTER TABLE `historico_token`
  ADD CONSTRAINT `historico_token_FK` FOREIGN KEY (`id_token`) REFERENCES `token` (`id_token`),
  ADD CONSTRAINT `historico_token_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Limitadores para a tabela `historico_voucher`
--
ALTER TABLE `historico_voucher`
  ADD CONSTRAINT `historico_voucher_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`),
  ADD CONSTRAINT `id_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`);

--
-- Limitadores para a tabela `interesses`
--
ALTER TABLE `interesses`
  ADD CONSTRAINT `interesses_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Limitadores para a tabela `interesses_socios`
--
ALTER TABLE `interesses_socios`
  ADD CONSTRAINT `interesses_socios_FK` FOREIGN KEY (`id_interesses`) REFERENCES `interesses` (`id_interesses`),
  ADD CONSTRAINT `interesses_socios_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Limitadores para a tabela `lgpd`
--
ALTER TABLE `lgpd`
  ADD CONSTRAINT `lgpd_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_FK` FOREIGN KEY (`id_time`) REFERENCES `time` (`id_time`),
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`),
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`);

--
-- Limitadores para a tabela `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_FK` FOREIGN KEY (`id_Eventos`) REFERENCES `eventos` (`id_Eventos`);

--
-- Limitadores para a tabela `plano`
--
ALTER TABLE `plano`
  ADD CONSTRAINT `plano_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Limitadores para a tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD CONSTRAINT `pontuacao_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `pontuacao_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pontuacao_ibfk_3` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`);

--
-- Limitadores para a tabela `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`);

--
-- Limitadores para a tabela `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `id_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `id_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Limitadores para a tabela `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `voucher_FK` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_Eventos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

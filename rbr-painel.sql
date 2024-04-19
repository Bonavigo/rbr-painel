-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/04/2024 às 15:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `radiobr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_atualizacoes`
--

CREATE TABLE `radiobr_atualizacoes` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_avisos`
--

CREATE TABLE `radiobr_avisos` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `aviso` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_contas`
--

CREATE TABLE `radiobr_contas` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `datadecriacao` varchar(255) NOT NULL,
  `cargo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `radiobr_contas`
--

INSERT INTO `radiobr_contas` (`id`, `usuario`, `senha`, `datadecriacao`, `cargo`) VALUES
(1, 'UsuarioImpossivelTeste', '266606cbb6a7a0383f839084360dfda7', '19/04/2024', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_forum`
--

CREATE TABLE `radiobr_forum` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_forum_comentarios`
--

CREATE TABLE `radiobr_forum_comentarios` (
  `id_post` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_forum_curtidas`
--

CREATE TABLE `radiobr_forum_curtidas` (
  `id_post` int(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_logs`
--

CREATE TABLE `radiobr_logs` (
  `id` int(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `radiobr_logs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_pilotos`
--

CREATE TABLE `radiobr_pilotos` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_playlists`
--

CREATE TABLE `radiobr_playlists` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_projetos`
--

CREATE TABLE `radiobr_projetos` (
  `id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_tentativas`
--

CREATE TABLE `radiobr_tentativas` (
  `id` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha_inserida` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `radiobr_vinhetas`
--

CREATE TABLE `radiobr_vinhetas` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `radiobr_atualizacoes`
--
ALTER TABLE `radiobr_atualizacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_avisos`
--
ALTER TABLE `radiobr_avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_contas`
--
ALTER TABLE `radiobr_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_forum`
--
ALTER TABLE `radiobr_forum`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_logs`
--
ALTER TABLE `radiobr_logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_pilotos`
--
ALTER TABLE `radiobr_pilotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_playlists`
--
ALTER TABLE `radiobr_playlists`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_projetos`
--
ALTER TABLE `radiobr_projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_tentativas`
--
ALTER TABLE `radiobr_tentativas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `radiobr_vinhetas`
--
ALTER TABLE `radiobr_vinhetas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `radiobr_atualizacoes`
--
ALTER TABLE `radiobr_atualizacoes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_avisos`
--
ALTER TABLE `radiobr_avisos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_contas`
--
ALTER TABLE `radiobr_contas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_forum`
--
ALTER TABLE `radiobr_forum`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_logs`
--
ALTER TABLE `radiobr_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_pilotos`
--
ALTER TABLE `radiobr_pilotos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `radiobr_playlists`
--
ALTER TABLE `radiobr_playlists`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_projetos`
--
ALTER TABLE `radiobr_projetos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_tentativas`
--
ALTER TABLE `radiobr_tentativas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `radiobr_vinhetas`
--
ALTER TABLE `radiobr_vinhetas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

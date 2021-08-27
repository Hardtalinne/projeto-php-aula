-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Tempo de geração: 26-Ago-2021 às 20:33
-- Versão do servidor: 5.7.35
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `php_oo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

CREATE TABLE `estudante` (
  `pessoa_id` bigint(20) NOT NULL,
  `matricula` varchar(200) NOT NULL DEFAULT '',
  `ira` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estudante`
--

INSERT INTO `estudante` (`pessoa_id`, `matricula`, `ira`) VALUES
(1, '20210201', 7),
(3, '20210202', NULL),
(3, '20210202', NULL),
(3, '20210202', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `telefone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `data_nascimento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`ID`, `nome`, `telefone`, `email`, `data_nascimento`) VALUES
(1, 'Paulo Monteiro Mendes', '65 9886-5478', 'paulo@paulo.com.br', '1980-11-09'),
(2, 'Débora Cunha', '87 9886-5487', 'debora@debora.com.br', '1984-11-15'),
(3, 'Mariana Motta Lira', '33 9755-8766', 'mariana@mariana.com.br', '1991-10-10'),
(4, 'Mateus Magalhães', '32 97765-0099', 'mateus@mateus.com.br', '1990-08-05'),
(5, 'Antônio Moreira', '41 96557-0889', 'antonio@antionio.com.br', '1989-02-01'),
(6, 'Carolina Vilela', '91 9887-5566', 'carolina@carolina.com.br', '1980-01-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `pessoa_id` bigint(20) NOT NULL,
  `especialidade` varchar(200) NOT NULL DEFAULT '',
  `salario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`pessoa_id`, `especialidade`, `salario`) VALUES
(2, 'Java', 4000),
(5, 'PHP', 4000);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_email` (`telefone`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

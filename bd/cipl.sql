-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2022 às 13:37
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cipl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aumento`
--

CREATE TABLE `aumento` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `aumento` double DEFAULT NULL,
  `data_d` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aumento`
--

INSERT INTO `aumento` (`id`, `funcionario_id`, `aumento`, `data_d`) VALUES
(1, 1, 50, '2022-11-16 23:00:00'),
(2, 2, 50, '2022-11-16 23:00:00'),
(3, 1, 60000, '2022-11-16 23:00:00'),
(4, 2, 60000, '2022-11-16 23:00:00'),
(5, 1, 20, '2022-11-16 23:00:00'),
(6, 2, 20, '2022-11-16 23:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`id`, `nome`) VALUES
(1, 'Bai'),
(2, 'Bic'),
(3, 'BFA'),
(4, 'Atlântico'),
(5, 'BPC'),
(6, 'BCA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `nome`) VALUES
(1, 'Educador'),
(2, 'Criada'),
(3, 'Operativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crianca`
--

CREATE TABLE `crianca` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `idade` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `f_atestado_medico` varchar(255) DEFAULT NULL,
  `f_c_cedula` varchar(255) DEFAULT NULL,
  `f_c_cartao_vacina` varchar(255) DEFAULT NULL,
  `f_ficha_matricula` varchar(255) DEFAULT NULL,
  `f_comprova_pagamento` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `crianca`
--

INSERT INTO `crianca` (`id`, `nome`, `sexo`, `idade`, `foto`, `f_atestado_medico`, `f_c_cedula`, `f_c_cartao_vacina`, `f_ficha_matricula`, `f_comprova_pagamento`, `data_cadastro`, `estado`) VALUES
(1, 'Midory Sebastian', 'M', '3 anos', '../../img/criancas/perfil/kid-1241817__340.jpg', '../../img/criancas/documentos/ebook-logica-de-programacao-para-iniciantes.pdf', '../../img/criancas/documentos/DocScan_10_25_2021.pdf', '../../img/criancas/documentos/DocScan_11_08_2021.pdf', '../../img/criancas/documentos/Fontee.pdf', '../../img/criancas/documentos/placa mãe.pdf', '2022-11-16 23:51:25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `desconto`
--

CREATE TABLE `desconto` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  `data_d` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `desconto`
--

INSERT INTO `desconto` (`id`, `funcionario_id`, `desconto`, `data_d`) VALUES
(1, 1, 30, '2022-11-16 23:00:00'),
(2, 2, 30, '2022-11-16 23:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encarregado`
--

CREATE TABLE `encarregado` (
  `id` int(11) NOT NULL,
  `nome` varchar(244) DEFAULT NULL,
  `f_bi` varchar(244) DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `parente_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `encarregado`
--

INSERT INTO `encarregado` (`id`, `nome`, `f_bi`, `telefone`, `parente_id`, `estado`) VALUES
(1, 'Sebastian José', '../../img/criancas/encarregados/CONECTORES.pdf', '(+244) 953-456-565', 1, NULL),
(2, 'Laura Filipe', '../../img/criancas/encarregados/Introdução,objectivos e conclusão.pdf', '(+244) 924-345-451', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_saida`
--

CREATE TABLE `entrada_saida` (
  `id` int(11) NOT NULL,
  `crianca_id` int(11) DEFAULT NULL,
  `encarregado_entrada` varchar(255) DEFAULT NULL,
  `data_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `f_bi_1` varchar(255) DEFAULT NULL,
  `encarregado_saida` varchar(255) DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `f_bi_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entrada_saida`
--

INSERT INTO `entrada_saida` (`id`, `crianca_id`, `encarregado_entrada`, `data_entrada`, `f_bi_1`, `encarregado_saida`, `data_saida`, `f_bi_2`) VALUES
(1, 1, 'Laura Filipe', '2022-11-17 00:10:28', NULL, 'Sebastian José', '2022-11-17', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folha_salario`
--

CREATE TABLE `folha_salario` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `n_falta` int(11) DEFAULT NULL,
  `remuneracao_adicional` double DEFAULT NULL,
  `oito_sobre_liquido` double DEFAULT NULL,
  `tres_sobre_liquido` double DEFAULT NULL,
  `n_beneficiario` double DEFAULT NULL,
  `data_admissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `folha_salario`
--

INSERT INTO `folha_salario` (`id`, `funcionario_id`, `n_falta`, `remuneracao_adicional`, `oito_sobre_liquido`, `tres_sobre_liquido`, `n_beneficiario`, `data_admissao`) VALUES
(1, 2, 0, 0, 4000, 1500, 50000, '2022-11-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `f_declaracao` varchar(255) DEFAULT NULL,
  `f_iban` varchar(255) DEFAULT NULL,
  `f_copia_bi` varchar(255) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `iban_escrito` varchar(30) DEFAULT NULL,
  `n_bi` varchar(255) DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `f_atestado_medico` varchar(255) DEFAULT NULL,
  `f_boletim_sanidade` varchar(255) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `salario_base` double DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `sexo`, `foto`, `f_declaracao`, `f_iban`, `f_copia_bi`, `banco_id`, `iban_escrito`, `n_bi`, `data_validade`, `f_atestado_medico`, `f_boletim_sanidade`, `cargo_id`, `telefone`, `salario_base`, `data_cadastro`, `estado`) VALUES
(1, 'Yolanda Da Sílva', 'F', '../../img/funcionarios/perfil/business-woman-2756210__340.jpg', '../../img/funcionarios/documentos/Estrutura do trabalho- SI 2021.pdf', '../../img/funcionarios/documentos/placa mãe.pdf', '../../img/funcionarios/documentos/CONECTORES.pdf', NULL, '82334983497384673', '766235239AL97', '2023-10-18', '../../img/funcionarios/documentos/DocScan_11_08_2021.pdf', '../../img/funcionarios/documentos/DocScan_10_25_2021.pdf', 1, '(+244) 923-564-554', 110040, '2022-11-17 00:01:40', 1),
(2, 'Adelia Bilvana', 'F', '../../img/funcionarios/perfil/images (65).jpg', '../../img/funcionarios/documentos/APONTAMENTOS DAS AULAS TEÓRICAS E PRÁTICAS DE.pdf', '../../img/funcionarios/documentos/MATRIZES_AULA2020.pdf', '../../img/funcionarios/documentos/Programa_ ÁLGA_UMA2021_2022_PPT.pdf', 1, '836472784293234454654', '234234242LA60', '2023-12-18', '../../img/funcionarios/documentos/Trabalho Práctico N° 1 - Física.pdf', '../../img/funcionarios/documentos/gdd-ga-v1.pdf', 1, '(+244) 934-445-454', 110040, '2022-11-17 00:15:16', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `justificativo`
--

CREATE TABLE `justificativo` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `f_justificativo` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id`, `nome`) VALUES
(1, 'Admin'),
(2, 'Gestão de pessoal'),
(3, 'Gestão de criança'),
(4, 'Gestão de salário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivo_falta`
--

CREATE TABLE `motivo_falta` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motivo_falta`
--

INSERT INTO `motivo_falta` (`id`, `nome`) VALUES
(1, 'Doença'),
(2, 'Óbito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_crianca`
--

CREATE TABLE `notificacao_crianca` (
  `id` int(11) NOT NULL,
  `crianca_id` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_n` date DEFAULT NULL,
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao_crianca`
--

INSERT INTO `notificacao_crianca` (`id`, `crianca_id`, `descricao`, `data_n`, `estado`) VALUES
(1, 1, 'Nova criança foi cadastrada no sistema. Encarregados Sebastian José (Pai) e Laura Filipe (Mãe).', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_funcionario`
--

CREATE TABLE `notificacao_funcionario` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_n` date DEFAULT NULL,
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao_funcionario`
--

INSERT INTO `notificacao_funcionario` (`id`, `funcionario_id`, `descricao`, `data_n`, `estado`) VALUES
(1, 1, 'Nova funcionária foi cadastrada no sistema.', NULL, 0),
(2, 2, 'Nova funcionária foi cadastrada no sistema.', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_salario`
--

CREATE TABLE `notificacao_salario` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_n` date DEFAULT NULL,
  `estado` int(11) DEFAULT 0,
  `pesquisa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao_salario`
--

INSERT INTO `notificacao_salario` (`id`, `funcionario_id`, `descricao`, `data_n`, `estado`, `pesquisa`) VALUES
(5, 2, 'Foi efectuado um aumento de 50,00 Kz nos funcionários pertencente na categoria de Educador.', NULL, NULL, 'Cargos'),
(6, 2, 'Foi efectuado um aumento de 60000,00 Kz nos funcionários pertencente na categoria de Educador.', '0000-00-00', 1, 'Cargos'),
(7, 2, 'Foi efectuado um aumento de 20,00 Kz nos funcionários pertencente na categoria de Educador.', NULL, NULL, 'Cargos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizar_crianca`
--

CREATE TABLE `organizar_crianca` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `crianca_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `sala_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `encarregado_id` int(11) DEFAULT NULL,
  `crianca_id` int(11) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `f_talao` varchar(255) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `mes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `encarregado_id`, `crianca_id`, `codigo`, `f_talao`, `data_emissao`, `mes`) VALUES
(2, 1, 1, '44-67-43434', '', '2022-11-16', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parente`
--

CREATE TABLE `parente` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parente`
--

INSERT INTO `parente` (`id`, `nome`) VALUES
(1, 'Pai'),
(2, 'Mãe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `data_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_saida` date DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `total_hora` int(11) DEFAULT NULL,
  `falta` int(11) DEFAULT NULL,
  `motivo_id` text DEFAULT NULL,
  `data_falta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `presenca`
--

INSERT INTO `presenca` (`id`, `funcionario_id`, `data_entrada`, `data_saida`, `observacao`, `total_hora`, `falta`, `motivo_id`, `data_falta`) VALUES
(1, 2, '2022-11-17 00:08:45', '2022-11-17', 'Terminei todos pendentes.', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`) VALUES
(1),
(2),
(3),
(4),
(4),
(5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsidio_d_terceiro_mes`
--

CREATE TABLE `subsidio_d_terceiro_mes` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `subsidio` double DEFAULT NULL,
  `n_beneficiario` double DEFAULT NULL,
  `data_emissao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsidio_feria`
--

CREATE TABLE `subsidio_feria` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `subsidio` double DEFAULT NULL,
  `n_beneficiario` double DEFAULT NULL,
  `data_emissao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uniao`
--

CREATE TABLE `uniao` (
  `id` int(11) NOT NULL,
  `encarregado_id` int(11) DEFAULT NULL,
  `crianca_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `uniao`
--

INSERT INTO `uniao` (`id`, `encarregado_id`, `crianca_id`, `estado`) VALUES
(1, 1, 1, NULL),
(2, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `sexo` char(2) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modulo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `sexo`, `email`, `telefone`, `senha`, `foto`, `data_cadastro`, `id_modulo`, `estado`) VALUES
(1, 'Aniceto J', 'aniceto', 'M', 'aniceto@gmail.com', '935259317', '1f32aa4c9a1d2ea010adcf2348166a04', '../../img/usuarios/IMG_2967.jpg', '2022-11-15 23:29:38', 1, 1),
(2, 'Luzineide Da Sílva', 'luzineide', 'F', 'luzineide@gmail.com', '(+244) 934-567-828', '14e1b600b1fd579f47433b88e8d85291', '../../img/usuarios/IMG_2939.jpg', '2022-11-16 09:51:57', 2, 1),
(3, 'Paulo Da  Graça', 'graca', 'M', 'graca@gmail.com', '(+244) 995-563-435', '1f32aa4c9a1d2ea010adcf2348166a04', '../../img/usuarios/IMG_0744.jpg', '2022-11-16 23:09:32', 3, 1),
(4, 'July Antonio Aurelio', 'july', 'F', 'july@gmail.com', '(+244) 912-234-354', '1f32aa4c9a1d2ea010adcf2348166a04', '../../img/usuarios/IMG_0682.jpg', '2022-11-16 23:11:08', 4, 1),
(5, 'Admin', 'admin', 'M', 'admin@gmail.com', '(+244) 948-289-738', '81dc9bdb52d04dc20036dbd8313ed055', '', '2022-11-17 18:24:50', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aumento`
--
ALTER TABLE `aumento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `crianca`
--
ALTER TABLE `crianca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `encarregado`
--
ALTER TABLE `encarregado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parente_id` (`parente_id`);

--
-- Índices para tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crianca_id` (`crianca_id`);

--
-- Índices para tabela `folha_salario`
--
ALTER TABLE `folha_salario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banco_id` (`banco_id`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Índices para tabela `justificativo`
--
ALTER TABLE `justificativo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `motivo_falta`
--
ALTER TABLE `motivo_falta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notificacao_crianca`
--
ALTER TABLE `notificacao_crianca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crianca_id` (`crianca_id`);

--
-- Índices para tabela `notificacao_funcionario`
--
ALTER TABLE `notificacao_funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `notificacao_salario`
--
ALTER TABLE `notificacao_salario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `organizar_crianca`
--
ALTER TABLE `organizar_crianca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`),
  ADD KEY `crianca_id` (`crianca_id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `sala_id` (`sala_id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encarregado_id` (`encarregado_id`),
  ADD KEY `crianca_id` (`crianca_id`);

--
-- Índices para tabela `parente`
--
ALTER TABLE `parente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `subsidio_d_terceiro_mes`
--
ALTER TABLE `subsidio_d_terceiro_mes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `subsidio_feria`
--
ALTER TABLE `subsidio_feria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `uniao`
--
ALTER TABLE `uniao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encarregado_id` (`encarregado_id`),
  ADD KEY `crianca_id` (`crianca_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aumento`
--
ALTER TABLE `aumento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `crianca`
--
ALTER TABLE `crianca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `desconto`
--
ALTER TABLE `desconto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `encarregado`
--
ALTER TABLE `encarregado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `folha_salario`
--
ALTER TABLE `folha_salario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `justificativo`
--
ALTER TABLE `justificativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `motivo_falta`
--
ALTER TABLE `motivo_falta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notificacao_crianca`
--
ALTER TABLE `notificacao_crianca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notificacao_funcionario`
--
ALTER TABLE `notificacao_funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notificacao_salario`
--
ALTER TABLE `notificacao_salario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `organizar_crianca`
--
ALTER TABLE `organizar_crianca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `parente`
--
ALTER TABLE `parente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `subsidio_d_terceiro_mes`
--
ALTER TABLE `subsidio_d_terceiro_mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subsidio_feria`
--
ALTER TABLE `subsidio_feria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `uniao`
--
ALTER TABLE `uniao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aumento`
--
ALTER TABLE `aumento`
  ADD CONSTRAINT `aumento_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `desconto`
--
ALTER TABLE `desconto`
  ADD CONSTRAINT `desconto_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `encarregado`
--
ALTER TABLE `encarregado`
  ADD CONSTRAINT `encarregado_ibfk_1` FOREIGN KEY (`parente_id`) REFERENCES `parente` (`id`);

--
-- Limitadores para a tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  ADD CONSTRAINT `entrada_saida_ibfk_1` FOREIGN KEY (`crianca_id`) REFERENCES `crianca` (`id`);

--
-- Limitadores para a tabela `folha_salario`
--
ALTER TABLE `folha_salario`
  ADD CONSTRAINT `folha_salario_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`);

--
-- Limitadores para a tabela `justificativo`
--
ALTER TABLE `justificativo`
  ADD CONSTRAINT `justificativo_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `notificacao_crianca`
--
ALTER TABLE `notificacao_crianca`
  ADD CONSTRAINT `notificacao_crianca_ibfk_1` FOREIGN KEY (`crianca_id`) REFERENCES `crianca` (`id`);

--
-- Limitadores para a tabela `notificacao_funcionario`
--
ALTER TABLE `notificacao_funcionario`
  ADD CONSTRAINT `notificacao_funcionario_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `notificacao_salario`
--
ALTER TABLE `notificacao_salario`
  ADD CONSTRAINT `notificacao_salario_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `organizar_crianca`
--
ALTER TABLE `organizar_crianca`
  ADD CONSTRAINT `organizar_crianca_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `organizar_crianca_ibfk_2` FOREIGN KEY (`crianca_id`) REFERENCES `crianca` (`id`),
  ADD CONSTRAINT `organizar_crianca_ibfk_3` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`encarregado_id`) REFERENCES `encarregado` (`id`),
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`crianca_id`) REFERENCES `crianca` (`id`);

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `presenca_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `subsidio_d_terceiro_mes`
--
ALTER TABLE `subsidio_d_terceiro_mes`
  ADD CONSTRAINT `subsidio_d_terceiro_mes_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `subsidio_feria`
--
ALTER TABLE `subsidio_feria`
  ADD CONSTRAINT `subsidio_feria_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `uniao`
--
ALTER TABLE `uniao`
  ADD CONSTRAINT `uniao_ibfk_1` FOREIGN KEY (`encarregado_id`) REFERENCES `encarregado` (`id`),
  ADD CONSTRAINT `uniao_ibfk_2` FOREIGN KEY (`crianca_id`) REFERENCES `crianca` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

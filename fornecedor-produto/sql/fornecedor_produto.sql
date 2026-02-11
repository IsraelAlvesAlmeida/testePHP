-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/02/2026 às 15:47
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
-- Banco de dados: `fornecedor_produto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `email`, `telefone`, `status`, `created_by`, `created_at`) VALUES
(26, 'Comercial Silva Ltda', '12.345.678/0001-90', 'contato@comercialsilva.com', '(11) 98765-4321', 'ativo', 1, '2026-02-11 14:29:16'),
(27, 'Distribuidora Paulista', '98.765.432/0001-12', 'vendas@distribuidora.com', '(11) 91234-5678', 'ativo', 1, '2026-02-11 14:29:16'),
(28, 'Alimentos Bom Sabor', '11.222.333/0001-44', 'suporte@bomsabor.com', '(11) 99876-5432', 'ativo', 1, '2026-02-11 14:29:16'),
(29, 'Tech Solutions ME', '22.333.444/0001-55', 'info@techsolutions.com', '(11) 93456-7890', 'ativo', 1, '2026-02-11 14:29:16'),
(30, 'Construtora Ideal', '33.444.555/0001-66', 'contato@ideal.com', '(11) 97654-3210', 'inativo', 1, '2026-02-11 14:29:16'),
(31, 'Farmácia Vida', '44.555.666/0001-77', 'farmacia@vida.com', '(11) 94567-1234', 'ativo', 1, '2026-02-11 14:29:16'),
(32, 'Supermercado Central', '55.666.777/0001-88', 'compras@supercentral.com', '(11) 98712-3456', 'ativo', 1, '2026-02-11 14:29:16'),
(33, 'Transportadora Rápida', '66.777.888/0001-99', 'logistica@rapida.com', '(11) 95678-4321', 'ativo', 1, '2026-02-11 14:29:16'),
(34, 'Editora Cultura', '77.888.999/0001-00', 'editorial@cultura.com', '(11) 92345-6789', 'inativo', 1, '2026-02-11 14:29:16'),
(35, 'Metalúrgica Forte', '88.999.000/0001-11', 'contato@forte.com', '(11) 93421-5678', 'ativo', 1, '2026-02-11 14:29:16'),
(36, 'Madeireira São Jorge', '99.111.222/0001-33', 'contato@madeireirasj.com', '(11) 91234-1111', 'ativo', 1, '2026-02-11 14:29:16'),
(37, 'Gráfica Expressa', '88.222.333/0001-44', 'orcamentos@graficaexpressa.com', '(11) 92345-2222', 'ativo', 1, '2026-02-11 14:29:16'),
(38, 'Hotel Bela Vista', '77.333.444/0001-55', 'reservas@belavista.com', '(11) 93456-3333', 'inativo', 1, '2026-02-11 14:29:16'),
(39, 'Padaria Pão Quente', '66.444.555/0001-66', 'atendimento@paoquente.com', '(11) 94567-4444', 'ativo', 1, '2026-02-11 14:29:16'),
(40, 'Auto Peças Brasil', '55.555.666/0001-77', 'suporte@autobrasil.com', '(11) 95678-5555', 'ativo', 1, '2026-02-11 14:29:16'),
(41, 'Clínica Saúde Total', '44.666.777/0001-88', 'contato@saudetotal.com', '(11) 96789-6666', 'ativo', 1, '2026-02-11 14:29:16'),
(42, 'Livraria Saber', '33.777.888/0001-99', 'vendas@saber.com', '(11) 97890-7777', 'inativo', 1, '2026-02-11 14:29:16'),
(43, 'Agropecuária Campo Verde', '22.888.999/0001-00', 'campo@verde.com', '(11) 98901-8888', 'ativo', 1, '2026-02-11 14:29:16'),
(44, 'Oficina Mecânica Rápida', '11.999.000/0001-11', 'mecanica@rapida.com', '(11) 99012-9999', 'ativo', 1, '2026-02-11 14:29:16'),
(45, 'Restaurante Sabor Caseiro', '10.000.111/0001-22', 'reservas@saborcaseiro.com', '(11) 90123-0000', 'ativo', 1, '2026-02-11 14:29:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` text DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `codigo`, `status`, `created_at`) VALUES
(10, 'Arroz Tipo 1', 'Pacote de 5kg de arroz branco', 'PRD001', 'ativo', '2026-02-11 14:29:40'),
(11, 'Feijão Carioca', 'Pacote de 1kg de feijão carioca selecionado', 'PRD002', 'ativo', '2026-02-11 14:29:40'),
(12, 'Macarrão Espaguete', 'Macarrão tipo espaguete 500g', 'PRD003', 'ativo', '2026-02-11 14:29:40'),
(13, 'Óleo de Soja', 'Óleo de soja refinado 900ml', 'PRD004', 'ativo', '2026-02-11 14:29:40'),
(14, 'Açúcar Refinado', 'Pacote de 1kg de açúcar refinado', 'PRD005', 'ativo', '2026-02-11 14:29:40'),
(15, 'Sal Refinado', 'Pacote de 1kg de sal refinado', 'PRD006', 'ativo', '2026-02-11 14:29:40'),
(16, 'Café Torrado', 'Pacote de 500g de café torrado e moído', 'PRD007', 'ativo', '2026-02-11 14:29:40'),
(17, 'Leite Integral', 'Caixa de leite integral 1L', 'PRD008', 'ativo', '2026-02-11 14:29:40'),
(18, 'Biscoito Cream Cracker', 'Pacote de 400g de biscoito cream cracker', 'PRD009', 'ativo', '2026-02-11 14:29:40'),
(19, 'Achocolatado em Pó', 'Lata de 400g de achocolatado em pó', 'PRD010', 'ativo', '2026-02-11 14:29:40'),
(20, 'Detergente Líquido', 'Frasco de 500ml de detergente neutro', 'PRD011', 'ativo', '2026-02-11 14:29:40'),
(21, 'Sabão em Pó', 'Pacote de 2kg de sabão em pó', 'PRD012', 'ativo', '2026-02-11 14:29:40'),
(22, 'Amaciante de Roupas', 'Frasco de 2L de amaciante perfumado', 'PRD013', 'ativo', '2026-02-11 14:29:40'),
(23, 'Desinfetante Floral', 'Frasco de 1L de desinfetante aroma floral', 'PRD014', 'ativo', '2026-02-11 14:29:40'),
(24, 'Esponja Multiuso', 'Pacote com 3 esponjas multiuso', 'PRD015', 'ativo', '2026-02-11 14:29:40'),
(25, 'Papel Higiênico', 'Pacote com 12 rolos de papel higiênico', 'PRD016', 'ativo', '2026-02-11 14:29:40'),
(26, 'Guardanapo de Papel', 'Pacote com 50 guardanapos', 'PRD017', 'ativo', '2026-02-11 14:29:40'),
(27, 'Saco de Lixo 50L', 'Pacote com 30 sacos de lixo 50 litros', 'PRD018', 'ativo', '2026-02-11 14:29:40'),
(28, 'Água Sanitária', 'Frasco de 2L de água sanitária', 'PRD019', 'ativo', '2026-02-11 14:29:40'),
(29, 'Sabonete Neutro', 'Unidade de sabonete neutro 90g', 'PRD020', 'ativo', '2026-02-11 14:29:40'),
(30, 'Shampoo Hidratante', 'Frasco de 350ml de shampoo hidratante', 'PRD021', 'ativo', '2026-02-11 14:29:40'),
(31, 'Condicionador Nutritivo', 'Frasco de 350ml de condicionador nutritivo', 'PRD022', 'ativo', '2026-02-11 14:29:40'),
(32, 'Creme Dental', 'Tubo de 90g de creme dental com flúor', 'PRD023', 'ativo', '2026-02-11 14:29:40'),
(33, 'Escova de Dentes', 'Escova de dentes macia', 'PRD024', 'ativo', '2026-02-11 14:29:40'),
(34, 'Desodorante Aerosol', 'Frasco de 150ml de desodorante aerosol', 'PRD025', 'ativo', '2026-02-11 14:29:40'),
(35, 'Hidratante Corporal', 'Frasco de 200ml de hidratante corporal', 'PRD026', 'ativo', '2026-02-11 14:29:40'),
(36, 'Protetor Solar FPS30', 'Frasco de 120ml de protetor solar FPS30', 'PRD027', 'ativo', '2026-02-11 14:29:40'),
(37, 'Fio Dental', 'Caixa com 50m de fio dental', 'PRD028', 'ativo', '2026-02-11 14:29:40'),
(38, 'Álcool em Gel', 'Frasco de 500ml de álcool em gel 70%', 'PRD029', 'ativo', '2026-02-11 14:29:40'),
(39, 'Lenço Umedecido', 'Pacote com 48 lenços umedecidos', 'PRD030', 'ativo', '2026-02-11 14:29:40'),
(40, 'Notebook 15\"', 'Notebook com 8GB RAM e 256GB SSD', 'PRD031', 'ativo', '2026-02-11 14:29:40'),
(41, 'Mouse Óptico', 'Mouse USB óptico com fio', 'PRD032', 'ativo', '2026-02-11 14:29:40'),
(42, 'Teclado USB', 'Teclado padrão ABNT2 USB', 'PRD033', 'ativo', '2026-02-11 14:29:40'),
(43, 'Monitor LED 24\"', 'Monitor LED Full HD 24 polegadas', 'PRD034', 'ativo', '2026-02-11 14:29:40'),
(44, 'Impressora Multifuncional', 'Impressora jato de tinta multifuncional', 'PRD035', 'ativo', '2026-02-11 14:29:40'),
(45, 'Pen Drive 32GB', 'Pen drive USB 3.0 de 32GB', 'PRD036', 'ativo', '2026-02-11 14:29:40'),
(46, 'HD Externo 1TB', 'HD externo portátil 1TB', 'PRD037', 'ativo', '2026-02-11 14:29:40'),
(47, 'Smartphone 128GB', 'Smartphone Android com 128GB de memória', 'PRD038', 'ativo', '2026-02-11 14:29:40'),
(48, 'Carregador Portátil', 'Powerbank 10.000mAh', 'PRD039', 'ativo', '2026-02-11 14:29:40'),
(49, 'Fone de Ouvido Bluetooth', 'Fone de ouvido sem fio Bluetooth', 'PRD040', 'ativo', '2026-02-11 14:29:40'),
(50, 'Camiseta Algodão', 'Camiseta básica 100% algodão', 'PRD041', 'ativo', '2026-02-11 14:29:40'),
(51, 'Calça Jeans', 'Calça jeans masculina azul', 'PRD042', 'ativo', '2026-02-11 14:29:40'),
(52, 'Tênis Esportivo', 'Tênis esportivo unissex', 'PRD043', 'ativo', '2026-02-11 14:29:40'),
(53, 'Jaqueta Corta-Vento', 'Jaqueta leve corta-vento', 'PRD044', 'ativo', '2026-02-11 14:29:40'),
(54, 'Meias Algodão', 'Pacote com 3 pares de meias', 'PRD045', 'ativo', '2026-02-11 14:29:40'),
(55, 'Boné Ajustável', 'Boné de algodão ajustável', 'PRD046', 'ativo', '2026-02-11 14:29:40'),
(56, 'Mochila Escolar', 'Mochila escolar com 2 compartimentos', 'PRD047', 'ativo', '2026-02-11 14:29:40'),
(57, 'Relógio Digital', 'Relógio digital resistente à água', 'PRD048', 'ativo', '2026-02-11 14:29:40'),
(58, 'Óculos de Sol', 'Óculos de sol com proteção UV', 'PRD049', 'ativo', '2026-02-11 14:29:40'),
(59, 'Cinto de Couro', 'Cinto masculino de couro legítimo', 'PRD050', 'ativo', '2026-02-11 14:29:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_fornecedor`
--

CREATE TABLE `produto_fornecedor` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`id`, `produto_id`, `fornecedor_id`, `created_at`) VALUES
(29, 10, 28, '2026-02-11 14:33:07'),
(30, 10, 31, '2026-02-11 14:33:18'),
(31, 10, 35, '2026-02-11 14:33:33'),
(41, 12, 31, '2026-02-11 14:37:37'),
(42, 12, 45, '2026-02-11 14:37:49'),
(43, 12, 32, '2026-02-11 14:37:56'),
(44, 12, 29, '2026-02-11 14:38:38'),
(45, 16, 36, '2026-02-11 14:38:45'),
(46, 16, 45, '2026-02-11 14:38:49'),
(47, 19, 39, '2026-02-11 14:38:54'),
(48, 19, 37, '2026-02-11 14:38:58'),
(49, 42, 37, '2026-02-11 14:39:06'),
(50, 42, 39, '2026-02-11 14:39:09'),
(51, 40, 40, '2026-02-11 14:39:14'),
(53, 51, 40, '2026-02-11 14:39:33'),
(54, 55, 41, '2026-02-11 14:39:38'),
(55, 58, 28, '2026-02-11 14:39:45'),
(56, 58, 35, '2026-02-11 14:39:48'),
(60, 58, 40, '2026-02-11 14:39:55'),
(61, 58, 43, '2026-02-11 14:39:58'),
(62, 33, 41, '2026-02-11 14:40:07'),
(64, 33, 45, '2026-02-11 14:40:12'),
(65, 33, 29, '2026-02-11 14:40:15'),
(66, 32, 26, '2026-02-11 14:40:25'),
(67, 31, 40, '2026-02-11 14:40:29'),
(68, 30, 28, '2026-02-11 14:40:33'),
(69, 30, 43, '2026-02-11 14:40:36'),
(76, 55, 31, '2026-02-11 14:40:53'),
(78, 54, 28, '2026-02-11 14:41:17'),
(80, 51, 28, '2026-02-11 14:41:34'),
(81, 11, 28, '2026-02-11 14:42:32'),
(82, 11, 37, '2026-02-11 14:42:47'),
(83, 11, 44, '2026-02-11 14:43:04'),
(85, 14, 40, '2026-02-11 14:43:38'),
(86, 14, 37, '2026-02-11 14:43:44'),
(87, 17, 28, '2026-02-11 14:43:52'),
(88, 24, 41, '2026-02-11 14:45:01'),
(89, 24, 35, '2026-02-11 14:45:03'),
(90, 24, 45, '2026-02-11 14:45:05'),
(91, 29, 41, '2026-02-11 14:45:08'),
(92, 26, 37, '2026-02-11 14:45:12'),
(93, 26, 31, '2026-02-11 14:45:16'),
(95, 26, 44, '2026-02-11 14:45:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `status`, `created_at`) VALUES
(1, 'Israel Almeida', 'admin@empresa.com', '$2y$10$EMacY96LjiKDcsKROk79AuAz.z4/zoAgd2HBRbyO3HM.PTke25OnC', 'ativo', '2026-02-10 02:36:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Índices de tabela `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produto_id` (`produto_id`,`fornecedor_id`),
  ADD KEY `fornecedor_id` (`fornecedor_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fornecedores_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  ADD CONSTRAINT `produto_fornecedor_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `produto_fornecedor_ibfk_2` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Estrutura para a tabela `usuarios`
--
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('cliente','administrador') NOT NULL DEFAULT 'cliente',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `senha`, `tipo_usuario`, `data_criacao`) VALUES
(1, 'APARECIDA DA SILVA FERREIRA', '44444444444', 'aparecida.ferreira@gmail.com', '45999999999', 'Rua Araucária', 'Cascavel', 'PR', '$2y$10$EryLEtGWwkcc2/Ee5nfv/et9pkl1qcLZuZtgOiXPaWaw8vyzTPKuC', 'cliente', '2025-07-24 17:45:39'),
(2, 'Administrador Principal', '12345678901', 'admin@potulskijoias.com', '45988291234', 'Av. Principal, 123', 'Cascavel', 'PR', '$2y$10$SaFbIr1BQ7L.ZfS8HRShSOSWxI9SosCncChzHGkybH6Z9VkYJ7W1K', 'administrador', NOW());

--
-- Índices para tabelas despejadas
--

--
-- AUTO_INCREMENT para tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
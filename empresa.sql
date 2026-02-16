-- Banco de dados para o projeto BANCO-DE-DADOS-PARA-USUARIOS
-- Crie este banco no phpMyAdmin importando este arquivo

DROP DATABASE IF EXISTS `empresa`;
CREATE DATABASE `empresa` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `empresa`;

-- Tabela: categorias
CREATE TABLE `categorias` (
  `CategoriaID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`CategoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela: produtos
CREATE TABLE `produtos` (
  `ProdutoID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(200) NOT NULL,
  `CategoriaID` INT NOT NULL,
  `Preco` DECIMAL(10,2) DEFAULT 0.00,
  PRIMARY KEY (`ProdutoID`),
  KEY `fk_produtos_categoria` (`CategoriaID`),
  CONSTRAINT `fk_produtos_categoria` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela: cargos
CREATE TABLE `cargos` (
  `CargoID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(150) NOT NULL,
  `TetoSalarial` DECIMAL(10,2) DEFAULT 0.00,
  PRIMARY KEY (`CargoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela: setor
CREATE TABLE `setor` (
  `SetorID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(150) NOT NULL,
  `Andar` VARCHAR(50),
  `Cor` VARCHAR(50),
  PRIMARY KEY (`SetorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela: funcionarios
CREATE TABLE `funcionarios` (
  `FuncionarioID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(200) NOT NULL,
  `DataNascimento` DATE DEFAULT NULL,
  `Email` VARCHAR(200) DEFAULT NULL,
  `Salario` DECIMAL(10,2) DEFAULT 0.00,
  `Sexo` CHAR(1) DEFAULT NULL,
  `CPF` VARCHAR(30) DEFAULT NULL,
  `RG` VARCHAR(30) DEFAULT NULL,
  `CargoID` INT DEFAULT NULL,
  `SetorID` INT DEFAULT NULL,
  PRIMARY KEY (`FuncionarioID`),
  KEY `fk_funcionarios_cargo` (`CargoID`),
  KEY `fk_funcionarios_setor` (`SetorID`),
  CONSTRAINT `fk_funcionarios_cargo` FOREIGN KEY (`CargoID`) REFERENCES `cargos` (`CargoID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_funcionarios_setor` FOREIGN KEY (`SetorID`) REFERENCES `setor` (`SetorID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela: producao
CREATE TABLE `producao` (
  `ProducaoID` INT NOT NULL AUTO_INCREMENT,
  `ProdutoID` INT DEFAULT NULL,
  `FuncionarioID` INT DEFAULT NULL,
  `DataProducao` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProducaoID`),
  KEY `fk_producao_produto` (`ProdutoID`),
  KEY `fk_producao_funcionario` (`FuncionarioID`),
  CONSTRAINT `fk_producao_produto` FOREIGN KEY (`ProdutoID`) REFERENCES `produtos` (`ProdutoID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_producao_funcionario` FOREIGN KEY (`FuncionarioID`) REFERENCES `funcionarios` (`FuncionarioID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserções de exemplo (opcionais)
-- Dados fictícios realistas
INSERT INTO `categorias` (`Nome`) VALUES ('Alimentos'), ('Bebidas');

INSERT INTO `cargos` (`Nome`, `TetoSalarial`) VALUES ('Auxiliar de Produção', 2800.00), ('Supervisor de Produção', 5200.00);

INSERT INTO `setor` (`Nome`, `Andar`, `Cor`) VALUES ('Produção', '1', '#FFAA00'), ('Administração', '2', '#00AACC');

-- Produtos: 20 itens em Alimentos (CategoriaID = 1)
INSERT INTO `produtos` (`Nome`, `CategoriaID`, `Preco`) VALUES
('Arroz Tipo 1 1kg', 1, 12.50),
('Feijão Carioca 1kg', 1, 8.90),
('Macarrão Espaguete 500g', 1, 4.75),
('Açúcar Refinado 1kg', 1, 3.99),
('Farinha de Trigo 1kg', 1, 6.20),
('Óleo de Soja 900ml', 1, 7.80),
('Leite UHT 1L', 1, 4.50),
('Café Torrado e Moído 500g', 1, 18.90),
('Achocolatado 400g', 1, 9.50),
('Biscoito Recheado 200g', 1, 3.75),
('Molho de Tomate 350g', 1, 2.99),
('Leite Condensado 395g', 1, 5.50),
('Creme de Leite 200g', 1, 3.80),
('Queijo Prato 1kg (fatiado)', 1, 28.00),
('Presunto Cozido 1kg', 1, 24.50),
('Margarina 500g', 1, 6.40),
('Sal Refinado 1kg', 1, 2.50),
('Pão de Forma 500g', 1, 7.20),
('Farinha de Mandioca 1kg', 1, 5.00),
('Polpa de Tomate 300g', 1, 3.45);

-- Produtos: 20 itens em Bebidas (CategoriaID = 2)
INSERT INTO `produtos` (`Nome`, `CategoriaID`, `Preco`) VALUES
('Água Mineral 1.5L', 2, 2.50),
('Refrigerante Cola 2L', 2, 8.90),
('Suco de Laranja 1L', 2, 6.50),
('Cerveja Pilsen 350ml (lata)', 2, 3.20),
('Vinho Tinto Seco 750ml', 2, 49.90),
('Isotônico 500ml', 2, 7.25),
('Chá Mate 1L', 2, 5.80),
('Suco de Uva 1L', 2, 9.50),
('Cerveja Artesanal 500ml', 2, 12.00),
('Energético 250ml', 2, 6.00),
('Café Solúvel 200g', 2, 16.90),
('Leite Chocolate 1L', 2, 5.99),
('Água de Coco 500ml', 2, 6.50),
('Refrigerante Laranja 2L', 2, 8.50),
('Chá Verde 330ml', 2, 4.50),
('Suco Detox 500ml', 2, 12.00),
('Sidra 750ml', 2, 22.00),
('Vodka 1L (fictício)', 2, 69.90),
('Cerveja Sem Álcool 330ml', 2, 3.80),
('Ginger Ale 1L', 2, 7.20);

-- Funcionários de exemplo
INSERT INTO `funcionarios` (`Nome`, `DataNascimento`, `Email`, `Salario`, `Sexo`, `CPF`, `RG`, `CargoID`, `SetorID`) VALUES
('João Silva', '1990-05-10', 'joao.silva@empresa.local', 2500.00, 'M', '123.456.789-00', '12.345.678-9', 1, 1),
('Maria Souza', '1988-11-20', 'maria.souza@empresa.local', 3200.00, 'F', '987.654.321-00', '98.765.432-1', 2, 2),
('Carlos Pereira', '1992-02-15', 'carlos.pereira@empresa.local', 2300.00, 'M', '222.333.444-55', '22.333.444-5', 1, 1),
('Ana Oliveira', '1995-07-08', 'ana.oliveira@empresa.local', 2600.00, 'F', '333.444.555-66', '33.444.555-6', 1, 1),
('Lucas Fernandes', '1985-09-30', 'lucas.fernandes@empresa.local', 5400.00, 'M', '444.555.666-77', '44.555.666-7', 2, 2),
('Mariana Costa', '1991-03-22', 'mariana.costa@empresa.local', 2800.00, 'F', '555.666.777-88', '55.666.777-8', 1, 1);

-- Produções de exemplo (associando alguns produtos e funcionários)
INSERT INTO `producao` (`ProdutoID`, `FuncionarioID`, `DataProducao`) VALUES
(1, 1, NOW()),
(2, 3, NOW()),
(5, 4, NOW()),
(21, 2, NOW()),
(22, 5, NOW());

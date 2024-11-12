CREATE DATABASE Financas;

USE Financas;

CREATE TABLE Fornecedor (
    Cod_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
    Nome_fornecedor VARCHAR(50) NOT NULL,
    Telefone VARCHAR(12),
    Email VARCHAR(50),
    Descricao VARCHAR(100),
    Status Boolean
);

CREATE TABLE Usuario (
    Cod_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    Senha VARCHAR(255) NOT NULL,
    Email VARCHAR(50),
    Telefone VARCHAR(12),
    Permissao ENUM('admin', 'funcionario', 'usuario') NOT NULL
);

CREATE TABLE Log (
    Cod_log INT PRIMARY KEY AUTO_INCREMENT,
    Data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Acao VARCHAR(100),
    Cod_usuario INT,
    FOREIGN KEY (Cod_usuario) REFERENCES Usuario (Cod_usuario)
);

-- CREATE TABLE Categoria (
--     Cod_categoria INT PRIMARY KEY AUTO_INCREMENT,
--     Nome_categoria VARCHAR(50) NOT NULL
-- );
CREATE TABLE Produto (
    Cod_produto INT PRIMARY KEY AUTO_INCREMENT,
    Nome_produto VARCHAR(50) NOT NULL,
    Preco DECIMAL(10, 2) NOT NULL,
    Descricao VARCHAR(100),
    Quantidade DECIMAL(10, 2) DEFAULT 0,
    Nivel_minimo INT DEFAULT 0,
    Cod_categoria INT,
    Cod_fornecedor INT,
    FOREIGN KEY (Cod_fornecedor) REFERENCES Fornecedor (Cod_fornecedor) ON DELETE
    SET
        NULL,
        --     FOREIGN KEY (Cod_categoria) REFERENCES Categoria (Cod_categoria) ON DELETE
        -- SET
        --     NULL
);

CREATE TABLE Venda (
    -- Cod_movimentacao INT PRIMARY KEY AUTO_INCREMENT,
    -- Data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    -- Tipo ENUM('entrada', 'saida') NOT NULL,
    -- Cod_produto INT,
    -- Quantidade DECIMAL(10, 2) NOT NULL,
    -- FOREIGN KEY (Cod_produto) REFERENCES Produto (Cod_produto)
    Cod_venda INT PRIMARY KEY AUTO_INCREMENT,
    Tipo_venda VARCHAR(50) NOT NULL,
    Descricao VARCHAR(100),
    Status Boolean,
    Cod_produto INT,
    FOREIGN KEY (Cod_produto) REFERENCES Produto (Cod_produto) ON DELETE
    SET
        NULL
);

CREATE TABLE Comprador (
    Cod_comprador INT PRIMARY KEY AUTO_INCREMENT,
    Nome_comprador VARCHAR(50) NOT NULL,
    Telefone VARCHAR(12),
    Email VARCHAR(50),
    Descricao VARCHAR(100),
    Status Boolean
);

-- Inserindo dados na tabela Fornecedor
INSERT INTO Fornecedor (Nome_fornecedor, Telefone, Email, Descricao, Status) VALUES
('Tropical Foods Ltda', '31987654321', 'contato@tropicalfoods.com', 'Fornecedor de frutas e vegetais frescos.', true),
('Tech Gadgets Inc.', '21987654321', 'suporte@techgadgets.com', 'Fornecedor de eletrônicos e gadgets inovadores.', true),
('Casa do Artesanato', '31912345678', 'artesanato@casadoartesanato.com', 'Fornecedor de produtos artesanais e locais.', true),
('Delícias do Mar', '31976543210', 'vendas@deliciasdomar.com', 'Fornecedor de frutos do mar frescos e congelados.', true),
('Eco Produtos Sustentáveis', '21934567890', 'eco@ecoprodutos.com', 'Fornecedor de produtos ecológicos e sustentáveis.', true);

-- Inserindo dados na tabela Usuario
INSERT INTO Usuario (Nome, login, Senha, Email, Telefone, Permissao) VALUES
('João Silva', 'joao.silva', 'senha123', 'joao.silva@example.com', '31987654321', 'admin'),
('Maria Oliveira', 'maria.oliveira', 'senha123', 'maria.oliveira@example.com', '21987654321', 'funcionario'),
('Carlos Santos', 'carlos.santos', 'senha123', 'carlos.santos@example.com', '31912345678', 'funcionario'),
('Ana Paula', 'ana.paula', 'senha123', 'ana.paula@example.com', '31976543210', 'usuario'),
('Ricardo Lima', 'ricardo.lima', 'senha123', 'ricardo.lima@example.com', '21934567890', 'usuario');

-- Inserindo dados na tabela Log
INSERT INTO Log (Data, Acao, Cod_usuario) VALUES
(NOW(), 'Login de administrador', 1),
(NOW(), 'Adição de novo fornecedor: Tropical Foods Ltda', 1),
(NOW(), 'Atualização de preço do produto: iPhone 13', 2),
(NOW(), 'Registro de venda: 10 unidades de Camarão', 3),
(NOW(), 'Consulta a comprador: Ana Paula', 4);

-- Inserindo dados na tabela Produto
INSERT INTO Produto (Nome_produto, Preco, Descricao, Quantidade, Nivel_minimo, Cod_categoria, Cod_fornecedor) VALUES
('Abacaxi Dourado', 5.50, 'Abacaxi fresco e suculento, ideal para sucos.', 150, 20, NULL, 1),
('Smartwatch Xtreme', 299.99, 'Smartwatch com monitoramento de saúde e GPS.', 75, 10, NULL, 2),
('Cesta de Páscoa Artesanal', 89.90, 'Cesta recheada com chocolates e artesanatos locais.', 50, 5, NULL, 3),
('Camarão Congelado', 45.00, 'Camarão fresco, ideal para pratos sofisticados.', 200, 30, NULL, 4),
('Canudos de Bambu', 15.00, 'Canudos ecológicos, reutilizáveis e sustentáveis.', 300, 50, NULL, 5);

-- Inserindo dados na tabela Venda
INSERT INTO Venda (Tipo_venda, Descricao, Status, Cod_produto) VALUES
('Venda de Abacaxi', 'Venda de 20 unidades de Abacaxi Dourado', true, 1),
('Venda de Smartwatch', 'Venda de 5 unidades de Smartwatch Xtreme', true, 2),
('Venda de Cesta de Páscoa', 'Venda de 10 cestas artesanais', true, 3),
('Venda de Camarão', 'Venda de 15 kg de Camarão Congelado', true, 4),
('Venda de Canudos', 'Venda de 100 canudos de bambu', true, 5);

-- Inserindo dados na tabela Comprador
INSERT INTO Comprador (Nome_comprador, Telefone, Email, Descricao, Status) VALUES
('Fernanda Ribeiro', '31987654321', 'fernanda.ribeiro@example.com', 'Cliente fiel, adora produtos orgânicos.', true),
('Lucas Ferreira', '21987654321', 'lucas.ferreira@example.com', 'Tecnólogo em eletrônicos, sempre em busca de novidades.', true),
('Juliana Costa', '31912345678', 'juliana.costa@example.com', 'Ama artes